<?php
/**
 * Product Categories With Thumbnail Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_widget_product_category_thumbnail' ) ) {
    function hongo_widget_product_category_thumbnail() {
        register_widget( 'Hongo_Widget_Product_Categories_Thumbnail' );
    }
}
add_action( 'widgets_init', 'hongo_widget_product_category_thumbnail' );

/**
 * Product categories with thumbnails widget class.
 *
 * @extends WC_Widget
 */
if( ! class_exists( 'Hongo_Widget_Product_Categories_Thumbnail' ) ) {
    class Hongo_Widget_Product_Categories_Thumbnail extends WC_Widget {

        /**
         * Constructor.
         */
        public function __construct() {
            $this->widget_cssclass    = 'woocommerce widget_product_categories_thumbnail';
            $this->widget_description = __( 'A list of product categories with thumbnails.', 'hongo-addons' );
            $this->widget_id          = 'hongo_widget_product_category_thumbnail';
            $this->widget_name        = __( 'Hongo Product Categories With Thumbnails', 'hongo-addons' );
            $this->settings           = array(
                'title'              => array(
                    'type'  => 'text',
                    'std'   => __( 'Product categories', 'hongo-addons' ),
                    'label' => __( 'Title', 'hongo-addons' ),
                ),
                'order'            => array(
                    'type'    => 'select',
                    'std'     => 'ASC',
                    'label'   => __( 'Order', 'hongo-addons' ),
                    'options' => array(
                        'ASC' => __( 'ASC', 'hongo-addons' ),
                        'DESC'  => __( 'DESC', 'hongo-addons' ),
                    ),
                ),
                'hide_empty'         => array(
                    'type'  => 'checkbox',
                    'std'   => 1,
                    'label' => __( 'Hide empty categories', 'hongo-addons' ),
                ),
                'include'          => array(
                    'type'  => 'text',
                    'std'   => '',
                    'label' => __( 'Include', 'hongo-addons' ),
                ),
                'exclude'          => array(
                    'type'  => 'text',
                    'std'   => '',
                    'label' => __( 'Exclude', 'hongo-addons' ),
                ),
                'number'          => array(
                    'type'  => 'text',
                    'std'   => '',
                    'label' => __( 'Number', 'hongo-addons' ),
                ),
            );

            parent::__construct();
        }

        public function widget( $args, $instance ) {

            $order = isset( $instance['order'] ) ? $instance['order'] : $this->settings['order']['std'];
            $hide_empty = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
            $include = isset( $instance['include'] ) ? $instance['include'] : $this->settings['include']['std'];
            $exclude = isset( $instance['exclude'] ) ? $instance['exclude'] : $this->settings['exclude']['std'];
            $number = isset( $instance['number'] ) ? $instance['number'] : $this->settings['number']['std'];

            $this->widget_start( $args, $instance );
 
                $cat_args = array( 
                    'parent'    => 0,
                    'order'     => $order,
                    'hide_empty'=> $hide_empty,
                    'include'   => $include,
                    'exclude'   => $exclude,
                    'number'    => $number
                );
                $product_categories = get_terms( 'product_cat', $cat_args );
                $i = 1;
                if ( ! empty( $product_categories ) ) {
                    echo '<ul class="product-categories">';
                        foreach ( $product_categories as $product_category ) {
                            if ( empty( $product_category ) || is_wp_error( $product_category ) ) {
                                return;
                            }
                            if( $i <= $number || empty( $number ) ) {
                                echo '<li>';
                                    echo '<a href="' . get_term_link( $product_category, 'product_cat' ) . '">';
                                        $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true );

                                        if ( ! empty( $thumbnail_id ) ) {
                                            echo wp_get_attachment_image( $thumbnail_id, 'hongo-product-icon-image', true, array( 'class' => "product-category-image" ) );
                                        }
                                        echo '<span>'.$product_category->name.'</span>'; 
                                    echo '</a>';
                                    
                                    // Child Category
                                    $child_category = get_terms( 'product_cat', array( 'parent' => $product_category->term_id, 'hide_empty' => $hide_empty, 'include' => $include, 'exclude' => $exclude, 'number' => $number ));
                                    if( ! empty( $child_category ) ) {
                                        echo '<ul class="child-product-categories">';
                                            foreach ( $child_category as $child_category ) {
                                                if ( empty( $child_category ) || is_wp_error( $child_category ) ) {
                                                    return;
                                                }
                                                echo '<li class="child-category">';
                                                    echo '<a href="' . get_term_link( $child_category, 'product_cat' ) . '">';
                                                        $thumbnail_id = get_term_meta( $child_category->term_id, 'thumbnail_id', true );

                                                        if ( ! empty( $thumbnail_id ) ) {
                                                            echo wp_get_attachment_image( $thumbnail_id, 'hongo-product-icon-image', true, array( 'class' => "product-category-image" ) );
                                                        }
                                                        echo '<span>'.$child_category->name.'</span>'; 
                                                    echo '</a>';
                                                echo '</li>';
                                                $i++;
                                            }
                                        echo '</ul>';
                                    }
                                    
                                echo '</li>';
                                $i++;
                            }
                        }
                    echo '</ul>';
                }

            $this->widget_end( $args );
        }
    }
}

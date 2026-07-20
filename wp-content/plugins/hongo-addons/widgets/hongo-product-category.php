<?php
/**
 * Product Categories Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_widget_product_categories' ) ) {
    function hongo_widget_product_categories() {
        register_widget( 'Hongo_Widget_Product_Categories' );
    }
}
add_action( 'widgets_init', 'hongo_widget_product_categories' );

/**
 * Product categories widget class.
 *
 * @extends WC_Widget
 */
if( ! class_exists( 'Hongo_Widget_Product_Categories' ) ) {
    class Hongo_Widget_Product_Categories extends WC_Widget {

        /**
         * Category ancestors.
         *
         * @var array
         */
        public $cat_ancestors;

        /**
         * Current Category.
         *
         * @var bool
         */
        public $current_cat;

        /**
         * Constructor.
         */
        public function __construct() {
            $this->widget_cssclass    = 'woocommerce widget_product_categories';
            $this->widget_description = __( 'A list or dropdown of product categories.', 'hongo-addons' );
            $this->widget_id          = 'hongo_widget_product_categories';
            $this->widget_name        = __( 'Hongo Product Categories', 'hongo-addons' );
            $this->settings           = array(
                'title'              => array(
                    'type'  => 'text',
                    'std'   => __( 'Product categories', 'hongo-addons' ),
                    'label' => __( 'Title', 'hongo-addons' ),
                ),
                'orderby'            => array(
                    'type'    => 'select',
                    'std'     => 'name',
                    'label'   => __( 'Order by', 'hongo-addons' ),
                    'options' => array(
                        'order'     => __( 'Category order', 'hongo-addons' ),
                        'term_id'   => __( 'Term ID', 'hongo-addons' ),
                        'name'      => __( 'Name', 'hongo-addons' ),
                        'count'     => __( 'Count', 'hongo-addons' ),
                    ),
                ),
                'dropdown'           => array(
                    'type'  => 'checkbox',
                    'std'   => 0,
                    'label' => __( 'Show as dropdown', 'hongo-addons' ),
                ),
                'count'              => array(
                    'type'  => 'checkbox',
                    'std'   => 0,
                    'label' => __( 'Show product counts', 'hongo-addons' ),
                ),
                'hierarchical'       => array(
                    'type'  => 'checkbox',
                    'std'   => 1,
                    'label' => __( 'Show hierarchy', 'hongo-addons' ),
                ),
                'show_children_only' => array(
                    'type'  => 'checkbox',
                    'std'   => 0,
                    'label' => __( 'Only show children of the current category', 'hongo-addons' ),
                ),
                'hide_empty'         => array(
                    'type'  => 'checkbox',
                    'std'   => 0,
                    'label' => __( 'Hide empty categories', 'hongo-addons' ),
                ),
                'max_depth'          => array(
                    'type'  => 'text',
                    'std'   => '',
                    'label' => __( 'Maximum depth', 'hongo-addons' ),
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
            );

            parent::__construct();
        }

        /**
         * Output widget.
         *
         * @see WP_Widget
         * @param array $args     Widget arguments.
         * @param array $instance Widget instance.
         */
        public function widget( $args, $instance ) {
            global $wp_query, $post;

            $count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
            $hierarchical       = isset( $instance['hierarchical'] ) ? $instance['hierarchical'] : $this->settings['hierarchical']['std'];
            $show_children_only = isset( $instance['show_children_only'] ) ? $instance['show_children_only'] : $this->settings['show_children_only']['std'];
            $dropdown           = isset( $instance['dropdown'] ) ? $instance['dropdown'] : $this->settings['dropdown']['std'];
            $orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : $this->settings['orderby']['std'];
            $hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
            $include            = isset( $instance['include'] ) ? $instance['include'] : $this->settings['include']['std'];
            $exclude            = isset( $instance['exclude'] ) ? $instance['exclude'] : $this->settings['exclude']['std'];

            $dropdown_args      = array(
                'hide_empty' => $hide_empty,
            );
            $list_args          = array(
                'show_count'   => $count,
                'hierarchical' => $hierarchical,
                'taxonomy'     => 'product_cat',
                'hide_empty'   => $hide_empty,
            );

            if( ! empty( $include ) ) {
                $include = ltrim( $include, ',' );
                $include = rtrim( $include, ',' );
                $list_args['include'] = explode( ',', $include );
            }
            if( ! empty( $exclude ) ) {
                $exclude = ltrim( $exclude, ',' );
                $exclude = rtrim( $exclude, ',' );
                $list_args['exclude'] = explode( ',', $exclude );
            }

            $max_depth          = absint( isset( $instance['max_depth'] ) ? $instance['max_depth'] : $this->settings['max_depth']['std'] );

            $list_args['menu_order'] = false;
            $dropdown_args['depth']  = $max_depth;
            $list_args['depth']      = $max_depth;

            if ( 'order' === $orderby ) {
                $list_args['menu_order'] = 'asc';
            } else {
                $list_args['orderby'] = 'title';
            }

            $this->current_cat   = false;
            $this->cat_ancestors = array();

            if ( is_tax( 'product_cat' ) ) {
                $this->current_cat   = $wp_query->queried_object;
                $this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );

            } elseif ( is_singular( 'product' ) ) {
                $terms = wc_get_product_terms(
                    $post->ID, 'product_cat', apply_filters(
                        'woocommerce_product_categories_widget_product_terms_args', array(
                            'orderby' => 'parent',
                            'order'   => 'DESC',
                        )
                    )
                );

                if ( $terms ) {
                    $main_term           = apply_filters( 'woocommerce_product_categories_widget_main_term', $terms[0], $terms );
                    $this->current_cat   = $main_term;
                    $this->cat_ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                }
            }

            // Show Siblings and Children Only.
            if ( $show_children_only && $this->current_cat ) {
                if ( $hierarchical ) {
                    $include = array_merge(
                        $this->cat_ancestors,
                        array( $this->current_cat->term_id ),
                        get_terms(
                            'product_cat',
                            array(
                                'fields'       => 'ids',
                                'parent'       => 0,
                                'hierarchical' => true,
                                'hide_empty'   => false,
                                'include'      => $include,
                                'exclude'      => $exclude,
                            )
                        ),
                        get_terms(
                            'product_cat',
                            array(
                                'fields'       => 'ids',
                                'parent'       => $this->current_cat->term_id,
                                'hierarchical' => true,
                                'hide_empty'   => false,
                                'include'      => $include,
                                'exclude'      => $exclude,
                            )
                        )
                    );
                    // Gather siblings of ancestors.
                    if ( $this->cat_ancestors ) {
                        foreach ( $this->cat_ancestors as $ancestor ) {
                            $include = array_merge(
                                $include, get_terms(
                                    'product_cat',
                                    array(
                                        'fields'       => 'ids',
                                        'parent'       => $ancestor,
                                        'hierarchical' => false,
                                        'hide_empty'   => false,
                                        'include'      => $include,
                                        'exclude'      => $exclude,
                                    )
                                )
                            );
                        }
                    }
                } else {
                    // Direct children.
                    $include = get_terms(
                        'product_cat',
                        array(
                            'fields'       => 'ids',
                            'parent'       => $this->current_cat->term_id,
                            'hierarchical' => true,
                            'hide_empty'   => false,
                            'include'      => $include,
                            'exclude'      => $exclude,
                        )
                    );
                }

                $list_args['include']     = implode( ',', $include );
                $dropdown_args['include'] = $list_args['include'];

                if ( empty( $include ) ) {
                    return;
                }
            } elseif ( $show_children_only ) {
                $dropdown_args['depth']        = 1;
                $dropdown_args['child_of']     = 0;
                $dropdown_args['hierarchical'] = 1;
                $list_args['depth']            = 1;
                $list_args['child_of']         = 0;
                $list_args['hierarchical']     = 1;
            }

            $this->widget_start( $args, $instance );

            if ( $dropdown ) {
                wc_product_dropdown_categories(
                    apply_filters(
                        'woocommerce_product_categories_widget_dropdown_args', wp_parse_args(
                            $dropdown_args, array(
                                'show_count'         => $count,
                                'hierarchical'       => $hierarchical,
                                'show_uncategorized' => 0,
                                'orderby'            => $orderby,
                                'selected'           => $this->current_cat ? $this->current_cat->slug : '',
                            )
                        )
                    )
                );

                wp_enqueue_script( 'selectWoo' );
                wp_enqueue_style( 'select2' );

                wc_enqueue_js(
                    "
                    jQuery( '.dropdown_product_cat' ).change( function() {
                        if ( jQuery(this).val() != '' ) {
                            var this_page = '';
                            var home_url  = '" . esc_js( home_url( '/' ) ) . "';
                            if ( home_url.indexOf( '?' ) > 0 ) {
                                this_page = home_url + '&product_cat=' + jQuery(this).val();
                            } else {
                                this_page = home_url + '?product_cat=' + jQuery(this).val();
                            }
                            location.href = this_page;
                        } else {
                            location.href = '" . esc_js( wc_get_page_permalink( 'shop' ) ) . "';
                        }
                    });

                    if ( jQuery().selectWoo ) {
                        var wc_product_cat_select = function() {
                            jQuery( '.dropdown_product_cat' ).selectWoo( {
                                placeholder: '" . esc_js( __( 'Select a category', 'hongo-addons' ) ) . "',
                                minimumResultsForSearch: 5,
                                width: '100%',
                                allowClear: true,
                                language: {
                                    noResults: function() {
                                        return '" . esc_js( _x( 'No matches found', 'enhanced select', 'hongo-addons' ) ) . "';
                                    }
                                }
                            } );
                        };
                        wc_product_cat_select();
                    }
                "
                );
            } else {
                include_once WC()->plugin_path() . '/includes/walkers/class-wc-product-cat-list-walker.php';

                $list_args['walker']                     = new WC_Product_Cat_List_Walker();
                $list_args['title_li']                   = '';
                $list_args['pad_counts']                 = 1;
                $list_args['show_option_none']           = __( 'No product categories exist.', 'hongo-addons' );
                $list_args['current_category']           = ( $this->current_cat ) ? $this->current_cat->term_id : '';
                $list_args['current_category_ancestors'] = $this->cat_ancestors;
                $list_args['max_depth']                  = $max_depth;
                $list_args['exclude']                    = $exclude;

                echo '<ul class="product-categories">';

                wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );

                echo '</ul>';
            }

            $this->widget_end( $args );
        }
    }
}

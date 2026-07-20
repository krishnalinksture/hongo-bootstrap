<?php
/**
 * Search Widget
 *
 * @package Hongo
 */

?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_search_widget' ) ) {
    function hongo_search_widget() {
        register_widget( 'hongo_search_widget' );
    }
}
add_action( 'widgets_init', 'hongo_search_widget' );

if( ! class_exists( 'hongo_search_widget' ) ) {

    class hongo_search_widget extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
            parent::__construct(
                'hongo_search_widget', // Base ID
                esc_html__( 'Hongo Search', 'hongo-addons' ), // Name
                array( 'description' => esc_html__( 'Search Widget For Hongo Theme', 'hongo-addons' ), ) // Args
            );
        }

        public function widget( $args, $instance ) {

            $hongo_title = isset( $instance['hongo_search_title'] ) ? apply_filters( 'widget_title', $instance['hongo_search_title'] ) : '';
            $hongo_search_label_text = isset( $instance['hongo_search_label_text'] ) ? $instance['hongo_search_label_text'] : '';
            $hongo_search_placeholder_text = isset( $instance['hongo_search_placeholder_text'] ) ? $instance['hongo_search_placeholder_text'] : '';
            $hongo_product_search = isset( $instance['hongo_product_search'] ) ? $instance['hongo_product_search'] : '';

            echo $args['before_widget'];
                if ( ! empty( $hongo_title ) ){
                    echo $args['before_title'] . esc_attr( $hongo_title ) . $args['after_title'];
                }
                echo '<div class="header-searchbar">';
                    $search_form_class = ' without-popup alt-font';
                    $hongo_search_form_uniqid = uniqid( 'search-header-' );
                    $hongo_header_search_icon = get_theme_mod( 'hongo_header_search_icon', 'icon-magnifier' );
                    echo '<a href="#'.esc_attr($hongo_search_form_uniqid).'" class="header-search-form"><i class="icons search-button '.$hongo_header_search_icon.'"></i></a>';
                        $search_form_class = ' with-popup mfp-hide search-popup';
                    
                    $unique_id = uniqid( 'search-form-' ) ;

                    echo '<form id="'.esc_attr($hongo_search_form_uniqid).'" method="get" action="'.home_url('/').'" name="search-header" class="search-widget-form search-form-result'.esc_attr( $search_form_class ).'">';
                        echo '<div class="search-form">';
                            if( ! empty( $hongo_search_label_text ) ) {
                                echo '<span class="search-label alt-font">' . $hongo_search_label_text . '</span>'
                                ;
                            }
                            echo '<button type="submit" class="icon-magnifier icons search-button close-search"></button>';
                            echo '<input name="s" id="'.esc_attr( $unique_id ).'" class="search-input alt-font" placeholder="'.esc_attr( $hongo_search_placeholder_text ).'" autocomplete="off" type="text">';
                            if( hongo_is_woocommerce_activated() && $hongo_product_search == 'on' ) {
                                echo '<input type="hidden" name="post_type" value="product" />';
                            }
                            if ( function_exists('icl_object_id') ) {
                                echo '<input type="hidden" name="lang" value="'.ICL_LANGUAGE_CODE.'">';
                            }
                        echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            
            $defaults = array(
                'hongo_search_title' => '',
                'hongo_product_search' => 'on',
                'hongo_search_label_text' => esc_html__( 'What are you looking for?', 'hongo-addons' ),
                'hongo_search_placeholder_text' => esc_html__( 'Enter your keywords...', 'hongo-addons' ),
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'hongo_search_title' ) ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hongo_search_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hongo_search_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['hongo_search_title'] ) ; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'hongo_search_label_text' ) ); ?>"><?php esc_html_e( 'Label text:', 'hongo-addons' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hongo_search_label_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hongo_search_label_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['hongo_search_label_text'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'hongo_search_placeholder_text' ) ); ?>"><?php esc_html_e( 'Placeholder text:', 'hongo-addons' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hongo_search_placeholder_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hongo_search_placeholder_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['hongo_search_placeholder_text'] ); ?>">
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance['hongo_product_search'], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'hongo_product_search' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hongo_product_search' ) ); ?>" /> <label for="<?php echo esc_attr( $this->get_field_id( 'hongo_product_search' ) ); ?>"><?php esc_html_e( 'Product search', 'hongo-addons' ); ?></label>
            </p>
            <?php 
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();

            $instance['hongo_search_title'] = ( ! empty( $new_instance['hongo_search_title'] ) ) ? sanitize_text_field( $new_instance['hongo_search_title'] ) : '';
            $instance['hongo_search_placeholder_text'] = ( ! empty( $new_instance['hongo_search_placeholder_text'] ) ) ? sanitize_text_field( $new_instance['hongo_search_placeholder_text'] ) : '';
            $instance['hongo_search_label_text'] = ( ! empty( $new_instance['hongo_search_label_text'] ) ) ? sanitize_text_field( $new_instance['hongo_search_label_text'] ) : '';            
            $instance['hongo_product_search'] = ( ! empty( $new_instance['hongo_product_search'] ) ) ? $new_instance['hongo_product_search'] : '';
            return $instance;
        }
    }
}
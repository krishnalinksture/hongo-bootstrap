<?php
/**
 * Wishlist Link Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_wishlist_link_widget' ) ) {
    function hongo_wishlist_link_widget() {
        register_widget( 'hongo_wishlist_link_widget' );
    }
}
add_action( 'widgets_init', 'hongo_wishlist_link_widget' );
 
// Creating the widget
if( ! class_exists( 'hongo_wishlist_link_widget' ) ) {
	class hongo_wishlist_link_widget extends WP_Widget {
	    function __construct() {
			parent::__construct(
				// Base ID of your widget
				'hongo_wishlist_link_widget', 

				// Widget name will appear in UI
				__( 'Hongo Wishlist Link Menu', 'hongo-addons' ),

				// Widget description
				array( 'description' => __( 'Display the Wishlist Link Menu.', 'hongo-addons' ), )
			);

			// Refersh wishlist via AJAX
			add_action( 'wp_ajax_refresh_wishlist', array( $this, 'refresh_wishlist' ) );
			add_action( 'wp_ajax_nopriv_refresh_wishlist', array( $this, 'refresh_wishlist' ) );
		}

		// Refresh wishlist
		public function refresh_wishlist() {

			$this->hongo_addons_count_wishlist();
            die();
		}

		// Creating widget front-end
		public function widget( $args, $instance ) {

			$title 	= apply_filters( 'widget_title', $instance['title'] );
			$count 	= ! empty( $instance['count'] ) ? '1' : '0';

			$count_wrap = $count == '1' ? ' hongo-wishlist-counter-wrap' : '';

	 		echo $args['before_widget'];
	 			echo '<div class="hongo-top-wishlist-link' . esc_attr( $count_wrap ) . '">';
		            $hongo_wishlist_id =  get_option('woocommerce_wishlist_page_id');
		            $hongo_header_wishlist_icon = get_theme_mod( 'hongo_header_wishlist_icon', 'icon-heart' );
	            	echo '<a class="wishlist-link" href="'. get_permalink( $hongo_wishlist_id ).'">';
	            		echo '<i class="'.$hongo_header_wishlist_icon.' icons"></i>';
	            		if ( $count == '1' ) {
	            			$this->hongo_addons_count_wishlist();
	            		}
	            		if ( ! empty( $title ) ) {
 							echo '<span>'.$title.'</span>';
 						}
 					echo '</a>';
		            
			    echo '</div>';
	 		echo $args['after_widget'];

	    } // Widget Backend

	    public function hongo_addons_count_wishlist(){

	        if( is_user_logged_in() ) {   
	            $user_id    = get_current_user_id();
	            $data       = get_user_meta( $user_id, '_hongo_wishlist', true );
	        } else {
	            $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
	            $cookie_name = 'hongo-wishlist'.$siteid;
	            $data = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
	        }
	        $data = ! empty( $data ) ? explode( ',', $data ) : array();
	        if ( is_array( $data) ) {
	            $data = count( $data );
	            echo sprintf( '<span class="hongo-wishlist-counter alt-font">%s</span>', $data );
	        }
	    } 
	        
	    public function form( $instance ) {

	        $instance 	= wp_parse_args( (array) $instance, array( 'title' => '' ) );
	        $count 		= isset($instance['count']) ? (bool) $instance['count'] : false;
	        // Widget admin form
	    ?>
	        <p>
	            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hongo-addons' ); ?></label> 
	            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" />
	        </p>
	        <p>
	        	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
				<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show wishlist counts', 'hongo-addons' ); ?></label><br />
			</p>
	        <?php 
	    }

	     
	    // Updating widget replacing old instances with new
	    public function update( $new_instance, $old_instance ) {
	        $instance = array();
	        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	        $instance['count'] = ! empty($new_instance['count']) ? 1 : 0;

	        return $instance;
	    }

	} // Class hongo_wishlist_link_widget ends here
}

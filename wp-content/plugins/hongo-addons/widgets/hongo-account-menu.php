<?php
/**
 * Account Menu Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_account_menu_widget' ) ) :
    function hongo_account_menu_widget() {
        register_widget( 'hongo_account_menu_widget' );
    }
endif;
add_action( 'widgets_init', 'hongo_account_menu_widget' );
 
// Creating the widget
if( ! class_exists( 'hongo_account_menu_widget' ) ) {
	class hongo_account_menu_widget extends WP_Widget {
	    function __construct() {
			parent::__construct(
				// Base ID of your widget
				'hongo_account_menu_widget', 

				// Widget name will appear in UI
				__( 'Hongo Account Menu', 'hongo-addons' ),

				// Widget description
				array( 'description' => __( 'Display the Account Menu.', 'hongo-addons' ), ) 
			);
		}
	 
		// Creating widget front-end
		public function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', $instance['title'] );
			$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
			$hongo_enable_submenu_guest_user =  ( isset( $instance['hongo_enable_submenu_guest_user'] ) ) ? $instance['hongo_enable_submenu_guest_user'] : '';

	 		echo $args['before_widget'];
	 			// For Login Logout Link
				if ( hongo_is_woocommerce_activated() ) {
					$myaccount_page_id 	= wc_get_page_id( 'myaccount' );
					$login_page_url 	= get_permalink( $myaccount_page_id );
					$logout_page_url 	= hongo_wc_logout_url();
				} else{
					$login_page_url 	= wp_login_url();
					$logout_page_url 	= wp_logout_url();
				}
				
	 			if( $nav_menu && ( is_user_logged_in() || $hongo_enable_submenu_guest_user == 'on' ) ) {

	 				echo '<div class="hongo-top-account-menu">';

	 					echo '<a class="account-menu-link" href="javascript:void(0);">';
	 						$hongo_header_myaccount_icon = get_theme_mod( 'hongo_header_myaccount_icon', 'icon-user' );
	 						echo '<i class="'.$hongo_header_myaccount_icon.' icons"></i>';
	 					echo '</a>';
 						if ( ! empty( $title ) ) {
	 						echo '<span>'. $title .'</span> <i class="ti-angle-down"></i>';
	 					}

	 					if( is_user_logged_in() ) {

							$login_logout_html = '<li><a class="account-menu-login" href="'. esc_url( $logout_page_url ) . '">'. __( 'Log out', 'hongo-addons' ) .'</a></li>';

	 					} else {

							$login_logout_html = '<li><a class="account-menu-login" href="'. esc_url( $login_page_url ) . '">'. __( 'Log In', 'hongo-addons' ) .'</a></li>';
	 					}

		                $hongo_header_menu_default = array(
                            'menu'  			=> $nav_menu,
                            'menu_class'    	=> 'hongo-account-menu',
                            'container'  		=> 'div',
                            'container_class'	=> 'hongo-account-menu-wrap',
                            'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s '. $login_logout_html .'</ul>',
                            'menu_class' 		=> 'alt-font',
                            'fallback_cb'		=> false,
		                );
		                wp_nav_menu( $hongo_header_menu_default );

		        	echo '</div>';

	            } else {

 					if( is_user_logged_in() ) {

						$login_logout_html = $logout_page_url;

					} else {

						$login_logout_html = $login_page_url;
					}
	            	
	 				echo '<div class="hongo-top-account-menu">';

		            	echo '<a class="account-menu-link" href="'. esc_url( $login_logout_html ) .'">';
		            		$hongo_header_myaccount_icon = get_theme_mod( 'hongo_header_myaccount_icon', 'icon-user' );
		            		echo '<i class="'.$hongo_header_myaccount_icon.' icons"></i>';
		            		if ( ! empty( $title ) ) {
	 							echo '<span>'. $title .'</span>';
	 						}
	 					echo '</a>';

		        	echo '</div>';
	            }

	 		echo $args['after_widget'];
  
	    } // Widget Backend

	    public function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
	        $menus1 = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			$hongo_enable_submenu_guest_user = ( isset( $instance['hongo_enable_submenu_guest_user'] ) && $instance['hongo_enable_submenu_guest_user'] == 'on' ) ? 'checked="checked"' : '';
	        // Widget admin form
	    ?>
	        <p>
	            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'hongo-addons' ); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" />
	        </p>

	        <p>
		        <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e( 'Select menu:', 'hongo-addons' ); ?></label>
		        <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		            <option value=""><?php echo esc_html__( 'Select','hongo-addons' ); ?></option>
		            <?php
		            	if ( ! empty( $menus1 ) && ! is_wp_error( $menus1 ) ) {
		            		
		            		foreach ( $menus1 as $menu1 ) {
			                    echo '<option value="' . $menu1->slug . '"'. selected( $nav_menu, $menu1->slug, false ) . '>'. $menu1->name . '</option>';
			                }
		            	}
		            ?>
		        </select>
		    </p>

			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_enable_submenu_guest_user' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_enable_submenu_guest_user' ); ?>" type="checkbox" <?php echo $hongo_enable_submenu_guest_user; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_enable_submenu_guest_user' ); ?>">
					<?php esc_html_e( 'Display submenu for guest user?', 'hongo-addons' ); ?>
				</label>
			</p>
	        <?php
	    }

	    // Updating widget replacing old instances with new
	    public function update( $new_instance, $old_instance ) {
	        $instance = array();
	        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	        $instance['nav_menu'] = isset( $new_instance['nav_menu'] ) ? $new_instance['nav_menu'] : '';
		  $instance['hongo_enable_submenu_guest_user'] = ( ! empty( $new_instance['hongo_enable_submenu_guest_user'] ) ) ? strip_tags( $new_instance['hongo_enable_submenu_guest_user'] ) : '';
	        return $instance;
	    }

	} // Class hongo_account_menu_widget ends here
}
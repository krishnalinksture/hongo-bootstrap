<?php
/**
 * Contact Information Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'hongo_contact_widget' ) ) {
	function hongo_contact_widget() {
    	register_widget( 'hongo_contact_widget' );
	}
}
add_action( 'widgets_init', 'hongo_contact_widget' );
 
// Creating the widget
if ( ! class_exists( 'hongo_contact_widget' ) ) {
	class hongo_contact_widget extends WP_Widget {
	 
		function __construct() {
			parent::__construct(
			 
			// Base ID of your widget
			'hongo_contact_widget', 
			 
			// Widget name will appear in UI
			__( 'Hongo Contact Information', 'hongo-addons' ), 
			 
			// Widget description
			array( 'description' => __( 'Add a custom contact information', 'hongo-addons' ), ) 
			);
		}
		 
		// Creating widget front-end
		 
		public function widget( $args, $instance ) {
			$title      = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$hongo_address = (isset($instance['address'])) ? $instance['address'] : '';
			$icon       = $instance['icon'] ? true : false;
			$phone      = (isset($instance['phone'])) ? $instance['phone'] : '';
			$mobile 	= (isset($instance['mobile'])) ? $instance['mobile'] : '';
			$fax        = (isset($instance['fax'])) ? $instance['fax'] : ''; 
			$email      = (isset($instance['email'])) ? $instance['email'] : ''; 

			// before and after widget arguments are defined by themes
			echo $args['before_widget'];
			
			echo '<div class="hongo-contact-info-wrap widget">';
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . $title . $args['after_title'];
				}
				if( ! empty( $hongo_address ) ) {
					echo '<div class="hongo-contact-address">' . nl2br( $hongo_address ) . '</div>';
				}
				if ( ! empty( $phone ) ) {
					echo '<div class="hongo-phone-info">';
						if( $icon == 1 ){
							echo '<i class="fa-solid fa-phone" aria-hidden="true"></i>';
						}
						echo '<span>'. __('Phone:', 'hongo-addons') . ' </span><a href="tel:' . str_replace( ' ', '', $phone ) . '">' . $phone .'</a>';
					echo '</div>';
				}
				if ( ! empty( $mobile ) ) {
					echo '<div class="hongo-mobile-info">';
						if( $icon == 1 ){
							echo '<i class="fa-solid fa-mobile-alt" aria-hidden="true"></i>';
						}
						echo '<span>'. __('Mobile:', 'hongo-addons') . ' </span><a href="tel:'. str_replace( ' ', '', $mobile ) .'">' . $mobile.'</a>';
					echo '</div>';
				}	
				if ( ! empty( $fax ) ) {	
					echo '<div class="hongo-fax-info">';
						if( $icon == 1 ){
							echo '<i class="fa-solid fa-fax" aria-hidden="true"></i>';
						}
						echo '<span>' .__('Fax:','hongo-addons'). ' </span>' . $fax;
					echo '</div>';
				}
				if ( ! empty( $email ) ) {	
					echo '<div class="hongo-email-info">';
						if( $icon == 1 ){
							echo '<i class="fa-regular fa-envelope" aria-hidden="true"></i>';
						}
						echo '<span>' .__('Email:','hongo-addons'). ' </span><a href="mailto:'.$email.'">' . $email.'</a>';
					echo '</div>';
				}				
			echo '</div>';
			echo $args['after_widget'];
		}
		         
		// Widget Backend 
		public function form( $instance ) {
			$instance      = wp_parse_args( (array) $instance, array( 'title' => '', 'address' => '', 'icon' => '', 'phone' => '', 'fax' => '', 'email' => '', 'location' => '', 'location_link' => '' ) );
			$title 		   = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
			$address       = ! empty( $instance['address'] )? $instance['address'] :'';
			$icon          = ! empty( $instance['icon'] ) ? $instance['icon'] : false;
			$phone         = ! empty( $instance['phone'] )? $instance['phone'] :'';
			$mobile        = ! empty( $instance['mobile'] )? $instance['mobile'] :'';
			$fax           = ! empty( $instance['fax'] )? $instance['fax'] :'';
			$email         = ! empty( $instance['email'] )? $instance['email'] : '';
		   
			// Widget admin form
		    ?>
		    <p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php echo esc_html__('Title:', 'hongo-addons'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'hongo-addons' ); ?></label>
	            <textarea name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" class="widefat" rows="4" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" ><?php echo esc_attr($instance['address']); ?></textarea>
	        </p>
		    <p>
				<?php $icon = ! empty($instance['icon']) ? $instance['icon'] : ''; ?>
				<input class="checkbox" type="checkbox" <?php checked( $icon, 'on' ); ?> id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php esc_html_e( 'Show icon', 'hongo-addons' ); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'mobile' ); ?>"><?php _e( 'Mobile:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e( 'Fax:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
			</p>			
			<?php 
		}
		     
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] 		   = sanitize_text_field( $new_instance['title'] );
			$instance['address']       = ! empty( $new_instance['address'] ) ? strip_tags( $new_instance['address'] ) : '';
			$instance['icon']          = ! empty( $new_instance['icon'] ) ? $new_instance['icon'] : '';
			$instance['phone']         = ! empty( $new_instance['phone'] ) ? strip_tags( $new_instance['phone'] ) : '';
			$instance['mobile']        = ! empty( $new_instance['mobile'] ) ? strip_tags( $new_instance['mobile'] ) : '';
			$instance['fax']           = ! empty( $new_instance['fax'] ) ? strip_tags( $new_instance['fax'] ) : '';
			$instance['email']         = ! empty( $new_instance['email'] ) ? strip_tags( $new_instance['email'] ) : '';
			return $instance;
		}
	}
}
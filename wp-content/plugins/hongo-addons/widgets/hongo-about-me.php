<?php
/**
 * About Me Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists('hongo_about_widget') ) {

	class hongo_about_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hongo_about_widget',
			esc_html__('Hongo About Me', 'hongo-addons'),
			array( 'description' => esc_html__( 'Your site Author.', 'hongo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) 
		{
			
			$hongo_title = apply_filters( 'widget_title', $instance['title'] );

			// Before widget			
	        echo $args['before_widget'];

	        	// Display the widget title if one was input (before and after defined by themes).
	        	echo $args['before_title'] . esc_attr($hongo_title) . $args['after_title'];
	            $hongo_img_url = (isset($instance['author_image_link'])) ? $instance['author_image_link'] : '';
	            $hongo_discription = (isset($instance['short_description'])) ? $instance['short_description'] : '';
	            $hongo_discription = apply_filters( 'widget_text', $hongo_discription, $instance, $this );
	            $hongo_about_name = (isset($instance['hongo_about_name'])) ? $instance['hongo_about_name'] : '';
	            $hongo_about_name = apply_filters( 'widget_text', $hongo_about_name, $instance, $this );
	            $hongo_about_bottom_url = (isset($instance['about_bottom_url'])) ? $instance['about_bottom_url'] : '';

		    	// Content
		    	
		        echo '<div class="about-sidebar">';
		        	if( ! empty( $hongo_img_url ) ) {
		        		echo '<img class="about-right-banner" src="' . esc_url( $hongo_img_url ) . '" alt=""/>';
		        	}
		        	if( ! empty( $hongo_about_name ) ) {
			    		echo '<span class="alt-font text-dark-gray margin-5px-bottom display-block">'.$hongo_about_name.'</span>';
			    	}
	            	if( ! empty( $hongo_discription ) ) {
	            		echo '<p>'.esc_html($hongo_discription).'</p>';
	            	}
	            	if( $hongo_about_bottom_url ) {
	            		echo '<img src="'.esc_url( $hongo_about_bottom_url ).'" alt="">';
	            	}
	            echo '</div>';
	        // After widget
	        echo $args['after_widget'];

		}
			
		// Widget Backend 
		public function form( $instance ) 
		{ 
	           $defaults = array(
	          	'title'   				=> esc_html__( 'About Me', 'hongo-addons' ),
	          	'author_image_link' 	=> '',
	          	'hongo_about_name'      => '',
	          	'short_description' 	=> '',
	          	'about_bottom_url'	    => '',
	          	);
	        $instance = wp_parse_args( (array) $instance, $defaults );
	        
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'author_image_link' ); ?>"><?php esc_html_e( 'Author image url:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'author_image_link' ); ?>" name="<?php echo $this->get_field_name( 'author_image_link' ); ?>" type="url" value="<?php echo esc_attr( $instance['author_image_link']); ?>" />
			</p>			
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'hongo_about_name' ) ); ?>"><?php esc_html_e( 'Name:', 'hongo-addons' ); ?></label>
	            <br />
	            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'hongo_about_name' ); ?>" name="<?php echo $this->get_field_name( 'hongo_about_name' ); ?>" value="<?php echo esc_attr( $instance['hongo_about_name']); ?>">
	        </p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>"><?php esc_html_e( 'Short description:', 'hongo-addons' ); ?></label>
	            <textarea name="<?php echo esc_attr( $this->get_field_name( 'short_description' ) ); ?>"  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>" ><?php echo esc_attr($instance['short_description']); ?></textarea>
	        </p>

	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'about_bottom_url' ) ); ?>"><?php esc_html_e( 'About bottom url:', 'hongo-addons' ); ?></label>
	            <br />
	            <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'about_bottom_url' ); ?>" name="<?php echo $this->get_field_name( 'about_bottom_url' ); ?>" value="<?php echo esc_attr( $instance['about_bottom_url']); ?>">
	        </p>
	   <?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['author_image_link'] = ( ! empty( $new_instance['author_image_link'] ) ) ? strip_tags( $new_instance['author_image_link'] ) : '';
			$instance['hongo_about_name'] = ( ! empty( $new_instance['hongo_about_name'] ) ) ? $new_instance['hongo_about_name'] : '';
			$instance['short_description'] = ( ! empty( $new_instance['short_description'] ) ) ? $new_instance['short_description'] : '';
			$instance['about_bottom_url'] = ( ! empty( $new_instance['about_bottom_url'] ) ) ? $new_instance['about_bottom_url'] : '';
		    return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'hongo_load_about_widget' ) ) :
	function hongo_load_about_widget() {
		
		register_widget( 'hongo_about_widget' );
	}
endif;
add_action( 'widgets_init', 'hongo_load_about_widget' );

/*******************************************************************************/
/* End About Me Widget */
/*******************************************************************************/
?>
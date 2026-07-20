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

if ( ! function_exists( 'hongo_custom_text_widget' ) ) {
	function hongo_custom_text_widget() {
    	register_widget( 'hongo_custom_text_widget' );
	}
}
add_action( 'widgets_init', 'hongo_custom_text_widget' );
 
// Creating the widget
if ( ! class_exists('hongo_custom_text_widget') ) {
	class hongo_custom_text_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'hongo_custom_text_widget',
				esc_html__('Hongo Custom Text', 'hongo-addons'),
				array( 'description' => esc_html__( 'Add a custom text to your sidebar.', 'hongo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
			$widget_class = ! empty( $instance['class'] ) ? ' ' . $instance['class'] : '';

			$text = apply_filters( 'widget_text', $widget_text, $instance, $this );

			echo str_replace( 'widget_hongo_custom_text_widget', 'widget_hongo_custom_text_widget' . $widget_class, $args['before_widget'] );
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
				<div class="textwidget"><?php echo ! empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
			<?php
			echo $args['after_widget'];
		}
		// Widget Backend 
		public function form( $instance ) {
			
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'class' => '' ) );
			$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
			$title = sanitize_text_field( $instance['title'] );
			$class = sanitize_text_field( $instance['class'] );
			$text = isset( $instance['text'] ) ? $instance['text'] : '';
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'hongo-addons'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html_e( 'Content:', 'hongo-addons' ); ?></label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>

			<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php echo esc_html_e('Automatically add paragraphs', 'hongo-addons'); ?></label></p>

			<p><label for="<?php echo $this->get_field_id('class'); ?>"><?php esc_html_e('Extra class:', 'hongo-addons'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo esc_attr($class); ?>" /></p>

			<?php
		}
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['text'] = $new_instance['text'];
			} else {
				$instance['text'] = wp_kses_post( $new_instance['text'] );
			}
			$instance['filter'] = ! empty( $new_instance['filter'] );
			$instance['class'] = sanitize_text_field( $new_instance['class'] );
			return $instance;
		}
	}
}
/*******************************************************************************/
/* End Custom Text Widget */
/*******************************************************************************/
<?php
/**
 * Newsletter Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_load_widget_newsletter' ) ) {
	function hongo_load_widget_newsletter() {
		register_widget( 'hongo_newsletter' );
	}
}
add_action( 'widgets_init', 'hongo_load_widget_newsletter' );

if (! class_exists('hongo_newsletter')) {
	class hongo_newsletter extends WP_Widget {

		function __construct() {
			parent::__construct( 'hongo_newsletter', esc_html__('Hongo Newsletter', 'hongo-addons'),
				array( 'description' => esc_html__( 'Add a Newsletter.', 'hongo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			$title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$newsletter_style  = ! empty ( $instance['newsletter_style'] ) ? $instance['newsletter_style'] : '';
			( $newsletter_style == 'newsletter-style-3' && ! empty( $title ) ) ? $title = '<span class="newsletter-style3-title alt-font">'.$title.'</span>' : $title;
			$description       = isset( $instance['description'] ) ? $instance['description'] : '';
			$description 	   = apply_filters( 'widget_text', $description, $instance, $this );
			( $newsletter_style == 'newsletter-style-3'  && ! empty( $description ) ) ? $description = '<div class="newsletter-style3-description alt-font">'.$description.'</div>' : $description;
			$contentswitch     = $instance['contentswitch'] ? true : false;
			$buttonhidedetails = $instance['buttonhide'] ? true : false;
			$widget_text       = ! empty( $instance['shortcode'] ) ? $instance['shortcode'] : '';
			$shortcode         = apply_filters( 'widget_text', $widget_text, $instance, $this );

			echo $args['before_widget'];

			$hidetext = ( $buttonhidedetails == 1 ) ? ' hide-text' : '';

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if ( ! empty( $description ) ) {
				if ( $contentswitch != 1 ) {
					echo '<div class="widget-content">' . wpautop($description) . '</div>';
				}
			}

			if ( ! empty( $shortcode ) ) {
				?>
					<div class="textwidget<?php echo ' '. $newsletter_style.$hidetext; ?>"><?php echo ! empty( $instance['shortcode'] ) ? do_shortcode( $shortcode ) : do_shortcode( $shortcode ); ?>
					</div>
				<?php
			}

			echo $args['after_widget'];
		}

		// Widget Backend 
		public function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'description' => '', 'shortcode' => '', 'newsletter_style' => 'newsletter-style-1') );
			$title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
			$newsletter_style = ! empty( $instance['newsletter_style'] ) ? $instance['newsletter_style'] : '';
			$shortcode = ! empty( $instance['shortcode'] ) ? sanitize_text_field( $instance['shortcode'] ) : '';
			$description = ! empty( $instance['description'] )? $instance['description'] :'';
			$contentswitch  = ! empty( $instance['contentswitch'] ) ? $instance['contentswitch'] : false;
			$buttonhidedetails = ! empty( $instance['buttonhide'] ) ? $instance['buttonhide'] : false;
			?>
			<!-- title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php echo esc_html__('Title:', 'hongo-addons'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<!-- Style -->
			<p>
				<label for="<?php echo $this->get_field_id('newsletter_style'); ?>">
					<?php echo esc_html__('Style:', 'hongo-addons'); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'newsletter_style' ); ?>" id="hongo-newsletter" class="widefat">
					<?php $options = array(	                        
	                       			'newsletter-style-1'   => esc_html__('Style 1','hongo-addons'),
                                    'newsletter-style-2'   => esc_html__('Style 2','hongo-addons'),
                                    'newsletter-style-3'   => esc_html__('Style 3','hongo-addons'),
                                    'newsletter-style-4'   => esc_html__('Style 4','hongo-addons'),
                                    'newsletter-style-5'   => esc_html__('Style 5','hongo-addons'),
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['newsletter_style'] == $option ? selected( $instance['newsletter_style'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>	                
				</select>
			</p>

			<!-- Content -->
			<p>
				<label for="<?php echo $this->get_field_id('description'); ?>">
					<?php echo esc_html__('Content:', 'hongo-addons'); ?>
				</label>
				<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $instance['description']; ?></textarea>
			</p>

			<!-- Shortcode -->
			<p>
				<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">
					<?php echo esc_html__('Use the shortcode:', 'hongo-addons'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" type="text" value="<?php echo esc_attr($shortcode); ?>" />
				<?php echo esc_html__('[To display this form inside a post, page or text widget]', 'hongo-addons'); ?>
			</p>

			<!-- Content on/off -->
			<p>
				<?php $contentswitch =  ! empty($instance['contentswitch']) ? $instance['contentswitch'] : ''; ?>
	    		<input class="checkbox" type="checkbox" <?php checked( $contentswitch, 'on' ); ?> id="<?php echo $this->get_field_id( 'contentswitch' ); ?>" name="<?php echo $this->get_field_name( 'contentswitch' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'contentswitch' ); ?>">
					<?php esc_html_e( 'Hide content', 'hongo-addons' ); ?>
				</label>
			</p>

			<!-- Hide button -->
			<p>
				<?php $buttonhide =  ! empty($instance['buttonhide']) ? $instance['buttonhide'] : ''; ?>
	    		<input class="checkbox" type="checkbox" <?php checked( $buttonhide, 'on' ); ?> id="<?php echo $this->get_field_id( 'buttonhide' ); ?>" name="<?php echo $this->get_field_name( 'buttonhide' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'buttonhide' ); ?>">
					<?php esc_html_e( 'Hide button text', 'hongo-addons' ); ?>
				</label>
			</p>
			<?php
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['newsletter_style'] = ( ! empty( $new_instance['newsletter_style'] ) ) ? strip_tags( $new_instance['newsletter_style'] ) : '';
			$instance['description'] =  $new_instance['description'];
			$instance['contentswitch'] = $new_instance['contentswitch'];
			$instance['buttonhide'] = $new_instance['buttonhide'];
			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['shortcode'] = $new_instance['shortcode'];
			} else {
				$instance['shortcode'] = wp_kses_post( $new_instance['shortcode'] );
			}
			return $instance;
		}
	}
}

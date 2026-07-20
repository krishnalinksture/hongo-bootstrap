<?php
/**
 * @package Hongo
 */
?>
<?php
/*******************************************************************************/
/* Start Custom Menu With Slug Widget */
/*******************************************************************************/
if (! class_exists('hongo_custom_menu_widget')) {
	class hongo_custom_menu_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hongo_custom_menu_widget',
			esc_html__('Hongo Custom Menu', 'hongo-addons'),
			array( 'description' => esc_html__( 'Add a custom menu to your sidebar.', 'hongo-addons' ), 'classname' => 'widget_nav_menu' ) // Args
			);
		}

		public function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
			$custom_menu =  isset( $instance['custom_menu'] ) ? $instance['custom_menu'] : '';
			if( ! empty( $custom_menu ) ) {
				echo $args['before_widget'];

				$nav_menu_args = array(
					'fallback_cb' => '',
					'menu'        => $custom_menu,
					'walker'      => new Hongo_Mega_Menu_Walker(),
				);
				echo $args['before_title'] . $title . $args['after_title'];
				
				wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $custom_menu, $args ) );

				echo $args['after_widget'];
			}
		}
			
		// Widget Backend 
		public function form( $instance ) {
			
			$custom_menu = ( isset( $instance['custom_menu'] ) ) ? $instance['custom_menu'] : '';
			// Widget admin form
			$title = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'custom_menu' ); ?>"><?php esc_html_e( 'Select Menu :', 'hongo-addons' ); ?></label> 
				<?php
				echo '<select id="'.$this->get_field_id( 'custom_menu' ).'" name="' . $this->get_field_name( 'custom_menu' ) . '">';
				echo '<option value="">'.esc_html__( 'Select Menu', 'hongo-addons' ).'</option>';
				$menus = wp_get_nav_menus();
				$menu_array = array();
				foreach ( $menus as $key => $value ) {
					if( $custom_menu == $value->slug && $custom_menu != '' ) {
						$selected = 'selected="selected"';
					}else {
						$selected = '';
					}

					echo '<option '.$selected.' value="' . $value->slug . '">' . $value->name . '</option>';
				}
				echo '</select>';
				?>
			</p>
		<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['custom_menu'] = ( ! empty( $new_instance['custom_menu'] ) ) ? strip_tags( $new_instance['custom_menu'] ) : '';
			return $instance;
		}
	}
}
// Register and load the widget
if ( ! function_exists( 'hongo_load_widget_custom_menu' ) ) :
	function hongo_load_widget_custom_menu() {
		register_widget( 'hongo_custom_menu_widget' );
	}
endif;
add_action( 'widgets_init', 'hongo_load_widget_custom_menu' );

/*******************************************************************************/
/* End Custom Menu With Slug Widget */
/*******************************************************************************/
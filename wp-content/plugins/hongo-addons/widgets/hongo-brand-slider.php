<?php
/**
 * WooCommerce Product Brand Slider Widget.
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists('Hongo_Addons_Brand_Slider_Widget') ) {
	$hongo_slider_unique_id = 1;
	/**
	 * Widget brands.
	 */
	class Hongo_Addons_Brand_Slider_Widget extends WC_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->widget_cssclass    = 'woocommerce hongo_widget_brands_slider';
			$this->widget_description = __( "A list of your brands in slider.", 'hongo-addons' );
			$this->widget_id          = 'Hongo_Addons_Brand_Slider_Widget';
			$this->widget_name        = __( 'Hongo Brand Slider', 'hongo-addons' );
			$this->settings           = array(
				'title'       => array(
					'type'  => 'text',
					'std'   => __( 'Brand', 'hongo-addons' ),
					'label' => __( 'Title', 'hongo-addons' ),
				),
				'linkonimage'  => array(
					'type'    => 'checkbox',
					'std'     => '0',
					'label'   => __( 'Link on image', 'hongo-addons' ),
				),
				'slideperview' => array(
					'type'  => 'number',
					'step'  => 1,
					'min'   => 1,
					'max'   => '',
					'std'   => 5,
					'label' => __( 'Slide per view', 'hongo-addons' ),
				),
				'orderby'  => array(
					'type'    => 'select',
					'std'     => 'date',
					'label'   => __( 'Order by', 'hongo-addons' ),
					'options' => array(
						'date'  	=> __( 'Date', 'hongo-addons' ),
						'rand'  	=> __( 'Random', 'hongo-addons' ),
						'term_id'  	=> __( 'Term ID', 'hongo-addons' ),
						'name'  	=> __( 'Name', 'hongo-addons' ),
						'count'  	=> __( 'Count', 'hongo-addons' ),
						'parent'  	=> __( 'Parent', 'hongo-addons' ),
					),
				),
				'order' => array(
					'type'    => 'select',
					'std'     => 'desc',
					'label'   => _x( 'Order', 'Sorting order', 'hongo-addons' ),
					'options' => array(
						'asc'  => __( 'ASC', 'hongo-addons' ),
						'desc' => __( 'DESC', 'hongo-addons' ),
					),
				),
				'loop'  => array(
					'type'    => 'checkbox',
					'std'     => '1',
					'label'   => __( 'Slider loop', 'hongo-addons' ),
				),
				'navigation'  => array(
					'type'    => 'checkbox',
					'std'     => '0',
					'label'   => __( 'Slider navigation', 'hongo-addons' ),
				),
				'autoplay'  => array(
					'type'    => 'checkbox',
					'std'     => '0',
					'label'   => __( 'Slider autoplay', 'hongo-addons' ),
				),
				'autoplay_delay'       => array(
					'type'  => 'text',
					'std'   => __( '2000', 'hongo-addons' ),
					'label' => __( 'Autoplay delay', 'hongo-addons' ),
				),
			);

			parent::__construct();
		}

		/**
		 * Output widget.
		 *
		 * @see WP_Widget
		 *
		 * @param array $args     Arguments.
		 * @param array $instance Widget instance.
		 */
		public function widget( $args, $instance ) {

			$widget_unique_id = $this->id;
			$title = ( isset( $instance['title'] ) ) ?  apply_filters( 'widget_title', $instance['title'] ) : '';

			$terms = get_terms( 'product_brand', array(
			    'orderby' => $instance['orderby'],
    			'order' => $instance['order'], 
			    'hide_empty' => true,
			) );
			global $hongo_slider_script;
			
			echo $args['before_widget'];
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			$output = '';
			if ( ! empty( $terms ) ) {
				$output .= '<div class="swiper-container hongo-widget-brand-list '.$widget_unique_id.'">'; 
					$output .= '<ul class="brand-list-widget swiper-wrapper">';
						foreach( $terms as $term ) {

							$thumb_id = get_term_meta( $term->term_id, 'logo_id', true );
							$term_img = wp_get_attachment_url(  $thumb_id );
							$image = '';
							if( ! empty( $term_img ) ) {
							
								$output .= '<li class="swiper-slide">';
									
									$output .= '<div class="hongo-brand-slider-wrap">';

										$output .= '<div class="hongo-brand-image">';

											$image = '<img src="'.esc_url( $term_img ).'" alt="'.esc_attr( $term->slug ).'" title="'.esc_attr( $term->name ).'" />';

											if ( $instance['linkonimage'] == '1' ) {
												$output .= '<a href="'.get_term_link($term).'">' . $image .'</a>';
											}
											else{
												$output .=  $image;
											}
										$output .= '</div>';
									$output .= '</div>';
								$output .= '</li>';
							}
						}
					$output .= '</ul>';

					$slider_config = '';
					// Loop
					if( $instance['loop'] == '1' ) {
						$slider_config .= 'loop:true,';
					}
					// autoplay
					if( $instance['autoplay'] == '1' ) {
						$slider_config .= 'autoplay: { delay: '.$instance['autoplay_delay'].' },';
					}
					// Navigation
					if( $instance['navigation'] == '1' ) {
						$output .= '<div class="swiper-button-next '.$widget_unique_id.'"><i class="fa-solid fa-chevron-right"></i></div>';
						$output .= '<div class="swiper-button-prev '.$widget_unique_id.'"><i class="fa-solid fa-chevron-left"></i></div>';
						$slider_config .= 'navigation: {nextEl: ".swiper-button-next.'.$widget_unique_id.'", prevEl: ".swiper-button-prev.'.$widget_unique_id.'"},';
					}
				$output .= '</div>';
			}

			echo $output;
			
			if( hongo_load_javascript_by_key( 'swiper' ) ) {
				ob_start(); ?>
					var swiper = new Swiper('.hongo-widget-brand-list.<?php echo $widget_unique_id; ?>', { watchOverflow: true, slidesPerView:<?php echo $instance['slideperview']; ?>, <?php echo $slider_config; ?> });
				<?php
				$hongo_slider_script .= ob_get_contents();
				ob_end_clean();
			}

			echo $args['after_widget'];
			

			wp_reset_postdata();
		}
	}
}
// Register and load the widget
if ( ! function_exists( 'hongo_addons_brand_slider_widget' ) ) {
    function hongo_addons_brand_slider_widget() {
        register_widget( 'Hongo_Addons_Brand_Slider_Widget' );
    }
}
add_action( 'widgets_init', 'hongo_addons_brand_slider_widget' );
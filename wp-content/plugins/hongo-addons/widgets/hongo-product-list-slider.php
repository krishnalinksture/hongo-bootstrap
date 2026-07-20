<?php
/**
 * Woocommerce Products Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_products_list_slider_widget' ) ) {
	function hongo_products_list_slider_widget() {
    	register_widget( 'hongo_products_list_slider_widget' );
	}
}
add_action( 'widgets_init', 'hongo_products_list_slider_widget' );
 
// Creating the widget
if ( ! class_exists( 'hongo_products_list_slider_widget' ) ) {
	class hongo_products_list_slider_widget extends WP_Widget {
	 
		function __construct() {
			parent::__construct(
				 
				// Base ID of your widget
				'hongo_products_list_slider_widget', 
				 
				// Widget name will appear in UI
				__( 'Hongo Products Slider', 'hongo-addons' ), 
				 
				// Widget description
				array( 'description' => __( 'Add a custom contact information', 'hongo-addons' ), ) 
			);
		}

		/**
		 * Query the products and return them.
		 *
		 * @param  array $args     Arguments.
		 * @param  array $instance Widget instance.
		 * @return WP_Query
		 */
		public function get_products( $args, $instance ) {
			$number = ! empty( $instance['hongo_all_products_page'] ) ? $instance['hongo_all_products_page'] : '-1';
			$show = ( isset( $instance['products_show'] ) ) ? $instance['products_show'] : '';
			$orderby = ( isset( $instance['products_order_by'] ) ) ? $instance['products_order_by'] : '';
			$order = ( isset( $instance['products_order'] ) ) ? $instance['products_order'] : '';
			$product_visibility_term_ids = wc_get_product_visibility_term_ids();

			$query_args = array(
				'posts_per_page' => $number,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'no_found_rows'  => 1,
				'order'          => $order,
				'meta_query'     => array(),
				'tax_query'      => array(
					'relation' => 'AND',
				),
			); // WPCS: slow query ok.

			if ( empty( $instance['show_hidden'] ) ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
					'operator' => 'NOT IN',
				);
				$query_args['post_parent'] = 0;
			}

			if ( ! empty( $instance['hide_free'] ) ) {
				$query_args['meta_query'][] = array(
					'key'     => '_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'DECIMAL',
				);
			}

			if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
				$query_args['tax_query'] = array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'term_taxonomy_id',
						'terms'    => $product_visibility_term_ids['outofstock'],
						'operator' => 'NOT IN',
					),
				); // WPCS: slow query ok.
			}

			switch ( $show ) {
				case 'featured':
					$query_args['tax_query'][] = array(
						'taxonomy' => 'product_visibility',
						'field'    => 'term_taxonomy_id',
						'terms'    => $product_visibility_term_ids['featured'],
					);
					break;
				case 'onsale':
					$product_ids_on_sale    = wc_get_product_ids_on_sale();
					$product_ids_on_sale[]  = 0;
					$query_args['post__in'] = $product_ids_on_sale;
					break;
			}

			switch ( $orderby ) {
				case 'price':
					$query_args['meta_key'] = '_price'; // WPCS: slow query ok.
					$query_args['orderby']  = 'meta_value_num';
					break;
				case 'rand':
					$query_args['orderby'] = 'rand';
					break;
				case 'sales':
					$query_args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
					$query_args['orderby']  = 'meta_value_num';
					break;
				default:
					$query_args['orderby'] = 'date';
			}

			return new WP_Query( apply_filters( 'woocommerce_products_widget_query_args', $query_args ) );
		}
		 
		// Creating widget front-end
		public function widget( $args, $instance ) {
			
			global $hongo_slider_script;
			$widget_unique_id = $this->id;

			$hongo_title = ! empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$hongo_all_products_page = ! empty( $instance['hongo_all_products_page'] ) ? $instance['hongo_all_products_page'] : '';
			$hongo_per_page_products = ! empty( $instance['hongo_per_page_products'] ) ? $instance['hongo_per_page_products'] : '3';
			$products_show = ( isset( $instance['products_show'] ) ) ? $instance['products_show'] : '';
			$products_order_by = ( isset( $instance['products_order_by'] ) ) ? $instance['products_order_by'] : '';
			$products_order = ( isset( $instance['products_order'] ) ) ? $instance['products_order'] : '';
			$hide_free = ( isset( $instance['hide_free'] ) ) ? $instance['hide_free'] : '';
			$loop = ( isset( $instance['loop'] ) ) ? $instance['loop'] : 'on';
			$navigation = ( isset( $instance['navigation'] ) ) ? $instance['navigation'] : 'on';
			$autoplay = ( isset( $instance['autoplay'] ) ) ? $instance['autoplay'] : '';
			$autoplay_delay = ( ! empty( $instance['autoplay_delay'] ) ) ? $instance['autoplay_delay'] : '2000';
			$show_hidden = ( isset( $instance['show_hidden'] ) ) ? $instance['show_hidden'] : '';
			$tooltip = ( isset( $instance['tooltip'] ) ) ? $instance['tooltip'] : 'on';

			// before and after widget arguments are defined by themes
			$products = $this->get_products( $args, $instance );
			
			if( $products->have_posts() ) {

				$total_posts = ! empty( $products->post_count ) ? $products->post_count : 0;
				echo $args['before_widget'];

					// Display the widget title if one was input (before and after defined by themes).
					$class = ( ! empty( $hongo_title ) ) ? ' no-padding-top' : '';
					echo '<div class="hongo-product-lists-widget-wrap">';
						echo '<div class="swiper-container hongo-product-lists-widget-slider woocommerce '.$widget_unique_id.$class.'">';
							
							if( ! empty( $hongo_title ) ) {
				        		echo $args['before_title'] . esc_attr( $hongo_title ) . $args['after_title'];
				        	}
				        	
							echo '<div class="products swiper-wrapper product_list_widget">';
								
								$template_args = array(
									//'widget_id' => $args['widget_id'],
									'show_rating' => true,
									'li_wrap' => 'div',
									'tooltip' => $tooltip,
								);

								$i = 0;
								while ( $products->have_posts() ) {
									$products->the_post();

									if( $i == 0 || $i % $hongo_per_page_products == 0 ) { // Each slide open div
										
										echo '<div class="swiper-slide">';
									}

										hongo_addons_get_template( 'product-slider/content-widget-product.php', $template_args );

									if( ( $i + 1 ) % $hongo_per_page_products == 0 && ( $i + 1 ) != $total_posts ) { // Each slide close div
										
										echo '</div>';
									}
									$i++;
								}
								if( $i == $total_posts ) { // Last post close div
									
									echo '</div>';
								}
	            
							echo '</div>';

							// Navigation
							if( $navigation == 'on' ){
								echo '<div class="swiper-button-next '.$widget_unique_id.'"><i class="fa-solid fa-chevron-right"></i></div>';
								echo'<div class="swiper-button-prev '.$widget_unique_id.'"><i class="fa-solid fa-chevron-left"></i></div>';
							}
						echo '</div>';
					echo '</div>';

					if( hongo_load_javascript_by_key( 'swiper' ) ) {
						ob_start();
						?>
							var widgetSwiper = new Swiper('.hongo-product-lists-widget-slider.<?php echo esc_attr( $widget_unique_id ); ?>', { slidesPerView: '1', watchOverflow: true, spaceBetween: 5, on: { slideChange: function() { $( '.hongo-product-lists-widget-slider .product-buttons-wrap' ).each( function( i ) { var tooltip_pos = $( this ).attr( 'data-tooltip-position' ); if( tooltip_pos != '' && tooltip_pos != undefined ) { $( this ).find('a i').attr( 'data-placement', tooltip_pos ).tooltip(); } }); }, init: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } }, <?php if( $navigation == 'on' ){ ?> navigation: { nextEl: '.swiper-button-next.<?php echo esc_attr( $widget_unique_id ); ?>', prevEl: '.swiper-button-prev.<?php echo esc_attr( $widget_unique_id ); ?>', }, <?php } ?> <?php if( $loop == 'on' ){ ?>loop: true,<?php } ?> <?php if( $autoplay == 'on' ) { ?> autoplay: { delay: <?php echo esc_attr( $autoplay_delay ); ?>,},<?php } ?> }); $( document ).on( 'hongo_shop_lists_refresh', function( e ) { var widgetSwiper = new Swiper('.hongo-product-lists-widget-slider.<?php echo esc_attr( $widget_unique_id ); ?>', { slidesPerView: '1', watchOverflow: true, spaceBetween: 5, on: { slideChange: function() { $( '.hongo-product-lists-widget-slider .product-buttons-wrap' ).each( function( i ) { var tooltip_pos = $( this ).attr( 'data-tooltip-position' ); if( tooltip_pos != '' && tooltip_pos != undefined ) { $( this ).find('a i').attr( 'data-placement', tooltip_pos ).tooltip(); } }); }, init: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } }, <?php if( $navigation == 'on' ){ ?> navigation: { nextEl: '.swiper-button-next.<?php echo esc_attr( $widget_unique_id ); ?>', prevEl: '.swiper-button-prev.<?php echo esc_attr( $widget_unique_id ); ?>', }, <?php } ?> <?php if( $loop == 'on' ){ ?>loop: true,<?php } ?> <?php if( $autoplay == 'on' ) { ?> autoplay: { delay: <?php echo esc_attr( $autoplay_delay ); ?>,},<?php } ?> }); });
						<?php
						$hongo_slider_script .= ob_get_contents();
						ob_end_clean();
					}

				echo $args['after_widget'];
			}

			wp_reset_postdata();
		}	

		// Widget Backend
		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'loop' => 'on', 'navigation' => 'on', 'tooltip' => 'on', 'autoplay_delay' => '2000', 'products_show' => 'all', 'products_order_by' => 'date', 'products_order' => 'asc' ) );
			
			$hongo_all_products_page = ( isset( $instance['hongo_all_products_page'] ) ) ? $instance['hongo_all_products_page'] : '';
			$hongo_per_page_products = ( isset( $instance['hongo_per_page_products'] ) ) ? $instance['hongo_per_page_products'] : '';
			$products_show 			 = ( isset( $instance['products_show'] ) ) ? $instance['products_show'] : '';
			$products_order_by 		 = ( isset( $instance['products_order_by'] ) ) ? $instance['products_order_by'] : '';
			$products_order 		 = ( isset( $instance['products_order'] ) ) ? $instance['products_order'] : '';
			$hide_free 			 	 = ( isset( $instance['hide_free'] ) && $instance['hide_free'] == 'on' ) ? 'checked="checked"' : '';
			$loop 		  		 	 = ( isset( $instance['loop'] ) && $instance['loop'] == 'on' ) ? 'checked="checked"' : '';
			$navigation 		     = ( isset( $instance['navigation'] ) && $instance['navigation'] == 'on' ) ? 'checked="checked"' : '';
			$autoplay 		  		 = ( isset( $instance['autoplay'] ) && $instance['autoplay'] == 'on' ) ? 'checked="checked"' : '';
			$autoplay_delay 		 = ( isset( $instance['autoplay_delay'] ) ) ? $instance['autoplay_delay'] : '';
			$show_hidden 		  	 = ( isset( $instance['show_hidden'] ) && $instance['show_hidden'] == 'on' ) ? 'checked="checked"' : '';
			$tooltip 		  	 	 = ( isset( $instance['tooltip'] ) && $instance['tooltip'] == 'on' ) ? 'checked="checked"' : '';

			// Widget admin form
			?>
			<p>
	            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'hongo-addons' ); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" />
	        </p>
	        <p>
	            <label for="<?php echo $this->get_field_id( 'hongo_all_products_page' ); ?>"><?php _e( 'Number of products to show', 'hongo-addons' ); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id( 'hongo_all_products_page' ); ?>" name="<?php echo $this->get_field_name( 'hongo_all_products_page' ); ?>" type="number" min="1" value="<?php if (isset ( $instance['hongo_all_products_page'])) {echo esc_attr( $instance['hongo_all_products_page'] );} ?>" />
	        </p>
	        <p>
	            <label for="<?php echo $this->get_field_id( 'hongo_per_page_products' ); ?>"><?php _e( 'Per page show products', 'hongo-addons' ); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id( 'hongo_per_page_products' ); ?>" name="<?php echo $this->get_field_name( 'hongo_per_page_products' ); ?>" type="number" min="1" value="<?php if (isset ( $instance['hongo_per_page_products'])) {echo esc_attr( $instance['hongo_per_page_products'] );} ?>" />
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'products_show' ); ?>"><?php esc_html_e( 'Show', 'hongo-addons' ); ?></label>
				<select name="<?php echo $this->get_field_name( 'products_show' ); ?>" id="tz-border-color" class="widefat">
					<?php $options = array(
	                       			'all'   => esc_html__('All Products','hongo-addons'),
                                    'featured'   => esc_html__('Featured Products','hongo-addons'),
                                    'onsale'   => esc_html__('On-sale Products','hongo-addons'),
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['products_show'] == $option ? selected( $instance['products_show'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>	                
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'products_order_by' ); ?>"><?php esc_html_e( 'Order by', 'hongo-addons' ); ?></label>
				<select name="<?php echo $this->get_field_name( 'products_order_by' ); ?>" id="tz-border-color" class="widefat">
					<?php $options = array(
	                       			'date'     => esc_html__('Date','hongo-addons'),
                                    'price'    => esc_html__('Price','hongo-addons'),
                                    'random'   => esc_html__('Random','hongo-addons'),
                                    'sales'    => esc_html__('Sales','hongo-addons'),
	                     	); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['products_order_by'] == $option ? selected( $instance['products_order_by'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>

				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( '' ); ?>"><?php esc_html_e( 'Order by', 'hongo-addons' ); ?></label>
				<select name="<?php echo $this->get_field_name( 'products_order' ); ?>" id="tz-border-color" class="widefat">
					<?php $options = array(
	                       			'asc'     => esc_html__('Ascending','hongo-addons'),
                                    'desc'    => esc_html__('Descending','hongo-addons'),
	                     	); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['products_order'] == $option ? selected( $instance['products_order'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'loop' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'loop' ); ?>" type="checkbox" <?php echo $loop; ?> />
				<label for="<?php echo $this->get_field_id( 'loop' ); ?>">
					<?php esc_html_e( 'Slider loop', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'navigation' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'navigation' ); ?>" type="checkbox" <?php echo $navigation; ?> />
				<label for="<?php echo $this->get_field_id( 'navigation' ); ?>">
					<?php esc_html_e( 'Slider navigation', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'autoplay' ); ?>" type="checkbox" <?php echo $autoplay; ?> />
				<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>">
					<?php esc_html_e( 'Slider autoplay', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
	            <label for="<?php echo $this->get_field_id( 'autoplay_delay' ); ?>"><?php _e( 'Autoplay delay', 'hongo-addons' ); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id( 'autoplay_delay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay_delay' ); ?>" type="text" value="<?php echo esc_attr( $autoplay_delay ); ?>" />
	        </p>
	        <p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hide_free' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hide_free' ); ?>" type="checkbox" <?php echo $hide_free; ?> />
				<label for="<?php echo $this->get_field_id( 'hide_free' ); ?>">
					<?php esc_html_e( 'Hide free products', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'show_hidden' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'show_hidden' ); ?>" type="checkbox" <?php echo $show_hidden; ?> />
				<label for="<?php echo $this->get_field_id( 'show_hidden' ); ?>">
					<?php esc_html_e( 'Show hidden products', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tooltip' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'tooltip' ); ?>" type="checkbox" <?php echo $tooltip; ?> />
				<label for="<?php echo $this->get_field_id( 'tooltip' ); ?>">
					<?php esc_html_e( 'Tooltip', 'hongo-addons' ); ?>
				</label>
			</p>

			<?php 
		}

		     
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['hongo_all_products_page'] =  ( ! empty( $new_instance['hongo_all_products_page'] ) ) ? strip_tags( $new_instance['hongo_all_products_page'] ) : '';
			$instance['hongo_per_page_products'] =  ( ! empty( $new_instance['hongo_per_page_products'] ) ) ? strip_tags( $new_instance['hongo_per_page_products'] ) : '';
			$instance['products_show'] =  ( ! empty( $new_instance['products_show'] ) ) ? strip_tags( $new_instance['products_show'] ) : '';
			$instance['products_order_by'] =  ( ! empty( $new_instance['products_order_by'] ) ) ? strip_tags( $new_instance['products_order_by'] ) : '';
			$instance['products_order']	 =  ( ! empty( $new_instance['products_order'] ) ) ? strip_tags( $new_instance['products_order'] ) : '';
			$instance['hide_free'] 	 = ( ! empty( $new_instance['hide_free'] ) ) ? 'on' : '';		
			$instance['show_hidden'] = ( ! empty( $new_instance['show_hidden'] ) ) ? 'on' : '';
			$instance['tooltip'] = ( ! empty( $new_instance['tooltip'] ) ) ? 'on' : '';
			$instance['loop'] = ( ! empty( $new_instance['loop'] ) ) ? 'on' : '';
			$instance['autoplay'] = ( ! empty( $new_instance['autoplay'] ) ) ? 'on' : '';
			$instance['navigation'] = ( ! empty( $new_instance['navigation'] ) ) ? 'on' : '';
			$instance['autoplay_delay'] = ( ! empty( $new_instance['autoplay_delay'] ) ) ? strip_tags( $new_instance['autoplay_delay'] ) : '';
			return $instance;
		}		
	}
}
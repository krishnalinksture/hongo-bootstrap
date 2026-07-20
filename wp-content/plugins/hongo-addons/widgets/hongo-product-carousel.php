<?php
/**
 * WooCommerce Product Slider.
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_addons_product_carousel_widget' ) ) {
    function hongo_addons_product_carousel_widget() {
        register_widget( 'Hongo_Addons_Product_Carousel_Widget' );
    }
}
add_action( 'widgets_init', 'hongo_addons_product_carousel_widget' );

if (! class_exists('Hongo_Addons_Product_Carousel_Widget')) {
	$hongo_slider_unique_id = 1;
	/**
	 * Widget products.
	 */
	class Hongo_Addons_Product_Carousel_Widget extends WC_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->widget_cssclass    = 'woocommerce hongo_widget_products_carousel';
			$this->widget_description = __( "A list of your products in carousel.", 'hongo-addons' );
			$this->widget_id          = 'Hongo_Addons_Product_Carousel_Widget';
			$this->widget_name        = __( 'Hongo Product Carousel', 'hongo-addons' );
			$this->settings           = array(
				'title'       => array(
					'type'  => 'text',
					'std'   => __( 'Products', 'hongo-addons' ),
					'label' => __( 'Title', 'hongo-addons' ),
				),
				'number'      => array(
					'type'  => 'number',
					'step'  => 1,
					'min'   => 1,
					'max'   => '',
					'std'   => 5,
					'label' => __( 'Number of products to show', 'hongo-addons' ),
				),
				'slideperview' => array(
					'type'  => 'number',
					'step'  => 1,
					'min'   => 1,
					'max'   => '',
					'std'   => 1,
					'label' => __( 'Slide per view', 'hongo-addons' ),
				),
				'show' => array(
					'type'    => 'select',
					'std'     => '',
					'label'   => __( 'Show', 'hongo-addons' ),
					'options' => array(
						''         => __( 'All products', 'hongo-addons' ),
						'featured' => __( 'Featured products', 'hongo-addons' ),
						'onsale'   => __( 'On-sale products', 'hongo-addons' ),
					),
				),
				'orderby'  => array(
					'type'    => 'select',
					'std'     => 'date',
					'label'   => __( 'Order by', 'hongo-addons' ),
					'options' => array(
						'date'  => __( 'Date', 'hongo-addons' ),
						'price' => __( 'Price', 'hongo-addons' ),
						'rand'  => __( 'Random', 'hongo-addons' ),
						'sales' => __( 'Sales', 'hongo-addons' ),
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
				'add_to_cart' => array(
					'type'    => 'checkbox',
					'std'     => '1',
					'label'   => __( 'Add to cart button', 'hongo-addons' ),
				),
				'loop'  => array(
					'type'    => 'checkbox',
					'std'     => '0',
					'label'   => __( 'Slider loop', 'hongo-addons' ),
				),
				'navigation'  => array(
					'type'    => 'checkbox',
					'std'     => '1',
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
		 * Query the products and return them.
		 *
		 * @param  array $args     Arguments.
		 * @param  array $instance Widget instance.
		 * @return WP_Query
		 */
		public function get_products( $args, $instance ) {
			$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
			$slideperview = ! empty( $instance['slideperview'] ) ? absint( $instance['slideperview'] ) : $this->settings['slideperview']['std'];
			$show   = ! empty( $instance['show'] ) ? sanitize_title( $instance['show'] ) : $this->settings['show']['std'];
			$orderby = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];
			$order  = ! empty( $instance['order'] ) ? sanitize_title( $instance['order'] ) : $this->settings['order']['std'];
			$navigation    = ( isset( $instance['navigation'] ) && $instance['navigation'] == '1' ) ? $instance['navigation'] : $this->settings['navigation']['std'];
			$loop    	   = ( isset( $instance['loop'] ) && $instance['loop'] == '1' ) ? $instance['loop'] : $this->settings['loop']['std'];
			$autoplay      = ( isset( $instance['autoplay'] ) && $instance['autoplay'] == '1' ) ? $instance['autoplay'] : $this->settings['autoplay']['std'];
			$autoplay_delay = ! empty( $instance['autoplay_delay'] ) ? $instance['autoplay_delay'] : '2000';
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
			$class = '';

			global $hongo_slider_script;

			$title = ( isset( $instance['loop'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : '';	
			
			$add_to_cart_btn = ( isset( $instance['add_to_cart'] ) && $instance['add_to_cart'] == '1' ) ? $instance['add_to_cart'] : '';

			$products = $this->get_products( $args, $instance );
			if ( $products && $products->have_posts() ) {
				
				echo $args['before_widget'];
				
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . $title . $args['after_title'];
				}

				echo '<div class="swiper-container hongo-product-carousel-widget woocommerce '.$widget_unique_id.'">'; 
					echo '<ul class="products swiper-wrapper hongo-product-widget-layout'.$class.'">';

					while ( $products->have_posts() ) {
					
						$products->the_post();

						global $product;

						$defaults = array();
                        
                        /* To Remove alternate image */
						remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_alternate_product_image', 15 );

			            /* To Remove loop product image link close and cover only image & sale falsh */
			            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			            add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );

			            /* To Remove loop product price and change priority */
			            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

			            /* To Remove loop product rating and change priority */
			            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );

			            if( $add_to_cart_btn != '1' ) {
			            	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
			            }

	                        $args = apply_filters( 'hongo_loop_content_product_carousel', wp_parse_args( $args, $defaults ), $product );
	                        hongo_addons_get_template( 'product-carousel/product-carousel.php', $args );

			            if( $add_to_cart_btn != '1' ) {
			            	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
			            }

			            /* To Remove loop product image link close and cover only image & sale falsh */
			            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );

			            /* To Remove loop product price and change priority */
			            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

			            /* To Remove loop product rating and change priority */
			            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
					}

					echo '</ul>';

				echo '</div>';

				if( $instance['navigation'] == '1' ) {
					// Navigation
					echo '<div class="swiper-button-next '.$widget_unique_id.'"><i class="fa-solid fa-chevron-right"></i></div>';
					echo'<div class="swiper-button-prev '.$widget_unique_id.'"><i class="fa-solid fa-chevron-left"></i></div>';
				}

				if( hongo_load_javascript_by_key( 'swiper' ) ) {
					ob_start(); ?>
						var widgetSwiper = new Swiper('.hongo-product-carousel-widget.<?php echo $widget_unique_id; ?>', { slidesPerView:<?php echo $instance['slideperview']; ?>, spaceBetween: 15, watchOverflow: true, <?php if( $instance['navigation'] == '1' ){ ?> navigation: { nextEl: '.swiper-button-next.<?php echo $widget_unique_id; ?>', prevEl: '.swiper-button-prev.<?php echo $widget_unique_id; ?>', }, <?php } ?> <?php if( $instance['loop'] == '1' ){ ?>loop: true,<?php } ?> <?php if( $instance['autoplay'] == '1' ) { ?> autoplay: { delay: <?php echo $instance['autoplay_delay']; ?>,},<?php } ?> on: { init: function() { var _this = this; setTimeout( function () { _this.update(); }, 10 ); } } }); $( document ).on( 'hongo_shop_lists_refresh', function( e ) { var widgetSwiper = new Swiper('.hongo-product-carousel-widget.<?php echo $widget_unique_id; ?>', { slidesPerView:<?php echo $instance['slideperview']; ?>, spaceBetween: 15, watchOverflow: true, <?php if( $instance['navigation'] == '1' ){ ?> navigation: { nextEl: '.swiper-button-next.<?php echo $widget_unique_id; ?>', prevEl: '.swiper-button-prev.<?php echo $widget_unique_id; ?>', }, <?php } ?> <?php if( $instance['loop'] == '1' ){ ?> loop: true, <?php } ?> <?php if( $instance['autoplay'] == '1' ) { ?> autoplay: { delay: <?php echo $instance['autoplay_delay']; ?>,}, <?php } ?> }); }); $('.menu-item').on('hover', function(e){ widgetSwiper.update(); }); $( '.hongo-navigation-menu .menu li:not(.inner-link) .dropdown-toggle' ).on( 'touchstart', function() { widgetSwiper.update(); });
					<?php
					$hongo_slider_script .= ob_get_contents();
					ob_end_clean();
				}

				echo $args['after_widget'];
				wp_reset_postdata();
			}
		}
	}
}
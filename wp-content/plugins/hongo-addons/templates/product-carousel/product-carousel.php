<?php
/**
 * Product Carousel For Widget
 *
 * This template can be overridden by copying it to yourtheme/hongo/product-carousel/product-carousel.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php

	global $product;

	// Ensure visibility
	if ( empty( $product ) || ! $product->is_visible() ) {
		return;
	}
?>
	<li class="product swiper-slide">	
	
		<div class="product-carousel-wrap">
		
			<div class="product-thumb-wrap">

				<?php
					/**
					 * woocommerce_before_shop_loop_item hook.
					 *
					 * @hooked woocommerce_template_loop_product_link_open - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item' );

					/**
					 * woocommerce_before_shop_loop_item_title hook.
					 *
				 	 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 * @hooked woocommerce_template_loop_product_link_close - 100
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>

			</div><!-- .product-thumb-wrap-end -->
		
			<div class="product-title-price-wrap">
				
				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="hongo-LoopProduct-link">

					<?php

						/**
						 * woocommerce_shop_loop_item_title hook.
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */

						do_action( 'woocommerce_shop_loop_item_title' );

					?>
				</a>

				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_price - 5
					 * @hooked woocommerce_template_loop_rating - 10
					 * @hooked hongo_template_loop_product_wishlist - 15
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );

					/**
					 * woocommerce_after_shop_loop_item hook.
					 *
					 */
					do_action( 'woocommerce_after_shop_loop_item' );
				?>

			</div><!-- .product-title-price-wrap -->

		</div><!-- .product-slider-wrap-end -->

	</li>
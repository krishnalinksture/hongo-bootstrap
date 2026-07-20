<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product/shop-metro.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
	<div class="product-thumb-wrap">
		<div class="product-thumb-inner">
			<?php
				/**
				 * woocommerce_before_shop_loop_item hook.
				 *
				 */
				do_action( 'woocommerce_before_shop_loop_item' );

				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 5
				 * @hooked hongo_template_loop_overlay - 5
			 	 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_show_product_loop_sale_flash - 10		 
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 * @hooked hongo_template_loop_product_slider - 12
				 * @hooked hongo_template_loop_alternate_product_image - 15
				 * @hooked woocommerce_template_loop_product_link_close - 100
				 * @hooked woocommerce_template_loop_add_to_cart - 200
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );

				if( $buttons_enable ) {
			?>
					<div class="product-buttons-wrap" data-tooltip-position="<?php echo hongo_get_tooltip_position(); ?>">
						<?php
							/**
							 * hongo_shop_loop_button hook.
							 */
							do_action( 'hongo_shop_loop_button' );
						?>
					</div>
				<?php } ?>
		</div>
		<div class="product-bottom-wrap">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="hongo-LoopProduct-link alt-font">
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
				 * @hooked woocommerce_template_loop_price - 10
				 * @hooked hongo_template_loop_product_deal - 12				 
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
		<?php
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
		?>

	</div><!-- .product-thumb-wrap -->

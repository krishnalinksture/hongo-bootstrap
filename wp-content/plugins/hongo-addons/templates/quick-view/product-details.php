<?php
/**
 * Loop Quick View Product Details
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/product-details.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Remove our custom class for quick view product
do_action( 'hongo_remove_post_class');
?>
<div id="product-quick-view-<?php the_ID(); ?>" <?php post_class( 'quick-view-product ' ); ?>>

	<div class="quick-view-gallery">
	<?php
		/**
		 * hongo_before_quick_view_product_summary hook.
		 *
		 * @hooked hongo_show_quick_view_product_sale_flash - 10
		 * @hooked hongo_show_quick_view_product_image - 20
		 */
		do_action( 'hongo_before_quick_view_product_summary' );
	?>
	</div>

	<div class="summary entry-summary">

		<?php
			/**
			 * hongo_quick_view_product_summary hook.
			 *
			 * @hooked hongo_template_quick_view_product_top_content_wrap_start - 2
			 * @hooked hongo_template_quick_view_product_title - 5
			 * @hooked hongo_template_quick_view_product_price - 9
			 * @hooked hongo_template_quick_view_product_top_content_wrap_middle - 9
	 		 * @hooked hongo_template_quick_view_product_rating - 10
	 		 * @hooked hongo_template_quick_view_product_sku - 11
			 * @hooked hongo_template_quick_view_product_top_content_wrap_end - 12
			 * @hooked hongo_template_quick_view_product_deal - 15
			 * @hooked hongo_template_quick_view_product_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
		     * @hooked hongo_template_quick_view_product_wishlist - 31		     
			 * @hooked hongo_template_quick_view_product_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'hongo_quick_view_product_summary' );
		?>

	</div><!-- .summary -->
	
	<?php
		/**
		 * hongo_after_quick_view_product_summary hook.
		 *
		 */
		do_action( 'hongo_after_quick_view_product_summary' );
	?>

</div>
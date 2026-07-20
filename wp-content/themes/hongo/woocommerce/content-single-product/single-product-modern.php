<?php
/**
 * The template for displaying product content within single product page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product/single-product-modern.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$hongo_single_product_content_position = hongo_option( 'hongo_single_product_content_position', 'middle' );
$class = ( $hongo_single_product_content_position == 'top' ) ? ' align-content-top' : '';
?>
<div class="hongo-modern-content-images-wrap">
	<div class="inner-wrap-modern<?php echo esc_attr( $class ); ?>">
		<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">
			<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked hongo_single_product_breadcrumb - 2
				 * @hooked hongo_single_product_brand - 2
				 * @hooked hongo_single_product_top_content_wrap_start - 2
			 	 * @hooked woocommerce_template_single_title - 5
			 	 * @hooked woocommerce_template_single_price - 6
			 	 * @hooked hongo_single_product_top_content_wrap_middle - 9		 
			 	 * @hooked woocommerce_template_single_rating - 3
			 	 * @hooked hongo_single_product_sku - 11
			 	 * @hooked hongo_single_product_top_content_wrap_end - 12
			 	 * @hooked hongo_template_loop_product_deal - 15
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
</div>
<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 */
	do_action( 'woocommerce_after_single_product_summary' );

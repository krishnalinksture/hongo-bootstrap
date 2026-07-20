<?php
/**
 * The template for displaying product content within single product page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product/single-product-extended-descriptions.php.
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

// Background images
$ed_bg_image = hongo_option( 'hongo_single_product_ed_bg_image', '' );
$bg_image = ! empty( $ed_bg_image ) ? ' style = background-image:url('.$ed_bg_image.');' : '';

echo '<div class="hongo-extended-descriptions-content-images-wrap cover-background" '.$bg_image.' >'; // @codingStandardsIgnoreLine
	do_action( 'hongo_extended_descriptions_content_before' );
	?>
	<div class="extended-descriptions-content-wrap">
		<div class="extended-product-typography-wrap">
			<div class="extended-product-typography-content-area">
				<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
				<div class="summary entry-summary<?php echo esc_attr( $class ); ?>">
					<div class="summary-entry-content">
						<?php
							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked hongo_product_single_main_summary_structure_extended_descriptions_start - 1
							 * @hooked hongo_single_product_breadcrumb - 2
							 * @hooked hongo_single_product_brand - 2
							 * @hooked woocommerce_template_single_rating - 3
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_price - 6
							 * @hooked hongo_template_loop_product_deal - 15
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked hongo_product_single_main_summary_structure_extended_descriptions_middle - 29
							 * @hooked woocommerce_template_single_add_to_cart - 30						 
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked hongo_product_single_main_summary_structure_extended_descriptions_end - 55
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							do_action( 'woocommerce_single_product_summary' );
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		do_action( 'hongo_extended_descriptions_content_after' );
echo '</div>'; // @codingStandardsIgnoreLine

/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked hongo_single_product_tab_extended_descriptions_wrap_start - 5
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked hongo_single_product_tab_extended_descriptions_wrap_end - 12
 
	 */
do_action( 'woocommerce_after_single_product_summary' );

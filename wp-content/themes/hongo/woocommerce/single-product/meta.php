<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$hongo_single_product_enable_sku 			= hongo_option( 'hongo_single_product_enable_sku', '1' );
$hongo_single_product_enable_category 		= hongo_option( 'hongo_single_product_enable_category', '1' );
$hongo_single_product_enable_tag 			= hongo_option( 'hongo_single_product_enable_tag', '1' );
$hongo_single_product_enable_social_share	= hongo_option( 'hongo_single_product_enable_social_share', '1' );

// To get single product style
$hongo_get_single_content_product_style = hongo_get_single_content_product_style();

$left_right_flag = false;
if ( ( $hongo_get_single_content_product_style == 'single-product-classic' || $hongo_get_single_content_product_style == 'single-product-right-content' || $hongo_get_single_content_product_style == 'single-product-left-content' || $hongo_get_single_content_product_style == 'single-product-sticky' ) && $hongo_single_product_enable_social_share == '1' && function_exists( 'hongo_single_product_share_shortcode' ) ) {

	$left_right_flag = true;
}

if( $hongo_single_product_enable_sku || $hongo_single_product_enable_category || $hongo_single_product_enable_tag || $hongo_single_product_enable_social_share ) {
?>
	<div class="product_meta alt-font">

		<?php do_action( 'woocommerce_product_meta_start' ); ?>

		<?php if ( $left_right_flag ) { ?>

			<div class="hongo-product-meta-left">

		<?php } ?>

				<?php do_action( 'hongo_product_meta_left' ); ?>

			<?php if ( $hongo_single_product_enable_category == '1' ) { ?>

				<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'hongo' ) . ' ', '</span>' ); ?>

			<?php } ?>

			<?php if ( $hongo_single_product_enable_tag == '1' ) { ?>

				<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'hongo' ) . ' ', '</span>' ); ?>

			<?php } ?>

		<?php if ( $left_right_flag ) { ?>

			</div>

			<div class="hongo-product-meta-right">

		<?php } ?>

				<?php do_action( 'hongo_product_meta_right' ); ?>
				
		<?php if ( $left_right_flag ) { ?>

			</div>

		<?php } ?>

		<?php do_action( 'woocommerce_product_meta_end' ); ?>

	</div>
	<?php
}

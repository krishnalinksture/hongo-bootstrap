<?php
/**
 * Single Product Meta SKU
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta-sku.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

use Automattic\WooCommerce\Enums\ProductType;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

	$hongo_single_product_enable_sku = hongo_option( 'hongo_single_product_enable_sku', '1' );

	if ( $hongo_single_product_enable_sku == '1' && wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( ProductType::VARIABLE ) ) ) {

		$sku = $product->get_sku() ? $product->get_sku() : esc_html__( 'N/A', 'hongo' );
        ?>
		<span class="sku_wrapper product_meta alt-font">
			<?php esc_html_e( 'SKU:', 'hongo' ); ?> <span class="sku"><?php echo sprintf( '%s', $sku ); ?></span>
		</span>
	<?php
}

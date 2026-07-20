<?php
/**
 * Quick View Product Meta SKU
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/meta-sku.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$hongo_quick_view_product_enable_sku = get_theme_mod( 'hongo_quick_view_product_enable_sku', '1' );

if( $hongo_quick_view_product_enable_sku ) {

	if ( $hongo_quick_view_product_enable_sku == '1' && wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) { ?>
		
		<span class="sku_wrapper product_meta alt-font"><?php esc_html_e( 'SKU:', 'hongo-addons' ); ?> <span class="sku"><?php echo esc_attr( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'hongo-addons' ); ?></span></span>

	<?php }

}
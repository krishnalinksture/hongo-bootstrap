<?php
/**
 * Loop Product SLider Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/product-loop-deal.php.
 *
 * @package Hongo
 * @version 1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="hongo-product-deal-wrap" data-end-date="<?php echo esc_attr( date( 'Y-m-d H:i:s', $pricedate_to ) ); ?>" data-timezone="<?php echo sprintf( '%s', $timezone ); ?>"></div>

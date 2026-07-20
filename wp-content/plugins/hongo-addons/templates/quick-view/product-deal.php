<?php
/**
 * Loop Quick View Product Details
 *
 * This template can be overridden by copying it to yourtheme/hongo/quick-view/product-deal.php.
 *
 * @package Hongo Addons
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="hongo-quick-view-deal-wrap" data-end-date="<?php echo esc_attr( date( 'Y-m-d H:i:s', $pricedate_to ) ); ?>" data-timezone="<?php echo sprintf( '%s', $timezone ); ?>"></div>
<?php
/**
 * Single Product Meta Share
 *
 * This template can be overridden by copying it to yourtheme/hongo/single-product/meta-share.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

	$hongo_single_product_enable_social_share = hongo_option( 'hongo_single_product_enable_social_share', '1' );

	if ( $hongo_single_product_enable_social_share == '1' && function_exists( 'hongo_single_product_share_shortcode' ) ) {

		echo do_shortcode( "[hongo_single_product_share]" );
	}

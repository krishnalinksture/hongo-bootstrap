<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_woocommerce_enable_catalog_mode = get_theme_mod( 'hongo_woocommerce_enable_catalog_mode', '0' );
$hongo_woocommerce_enable_login_mode = get_theme_mod( 'hongo_woocommerce_enable_login_mode', '0' );

if ( $hongo_woocommerce_enable_catalog_mode == '1' || ( $hongo_woocommerce_enable_login_mode == '1' && ! is_user_logged_in() ) ) {
	add_filter( 'woocommerce_loop_add_to_cart_link', '__return_false');
	add_filter( 'woocommerce_is_purchasable', '__return_false');
	remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );

	if( ! function_exists( 'hongo_catalog_mod_action' ) ) {
		function hongo_catalog_mod_action() {

			$cart     = is_page( wc_get_page_id( 'cart' ) );
			$checkout = is_page( wc_get_page_id( 'checkout' ) );

			if ( $cart || $checkout ) {
				$shop_page_url = esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) );
				wp_redirect( $shop_page_url );
				exit;
			}
		}
	}
	add_action( 'wp', 'hongo_catalog_mod_action' );
}

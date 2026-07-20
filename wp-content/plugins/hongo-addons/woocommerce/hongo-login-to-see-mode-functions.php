<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_woocommerce_enable_login_mode = get_theme_mod( 'hongo_woocommerce_enable_login_mode', '0' );
if ( $hongo_woocommerce_enable_login_mode == '1' && ! is_user_logged_in() ) {

	if ( ! function_exists( 'hongo_add_login_notice' ) ) {
	    function hongo_add_login_notice() {
	    	$login_to_view_message = apply_filters( 'hongo_login_to_view_message', sprintf( __( 'Please %s to see price and cart option.', 'hongo-addons' ), '<a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">' . __( 'login', 'hongo-addons' ) . '</a>' ) );
	    	wc_get_template( 'notices/notice.php', array( 'messages' => array( $login_to_view_message ) ) );
		}
	}

	if ( ! function_exists( 'hongo_remove_cart_price_single' ) ) {
		function hongo_remove_cart_price_single() {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );
			add_action( 'woocommerce_single_product_summary', 'hongo_add_login_notice', 30 );
		}
	}
	add_action( 'woocommerce_before_single_product_summary', 'hongo_remove_cart_price_single' );

	if ( ! function_exists( 'hongo_remove_price_shop_loop' ) ) {
		function hongo_remove_price_shop_loop() {
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );
		}
	}
	add_action( 'woocommerce_before_shop_loop_item', 'hongo_remove_price_shop_loop' );
}

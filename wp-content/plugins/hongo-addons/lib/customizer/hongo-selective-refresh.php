<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// if selective refresh is available.
if ( isset( $wp_customize->selective_refresh ) ) {

	/* Header and footer start */

		$wp_customize->selective_refresh->add_partial( 'hongo_mini_header_section', array(
		    'selector' => '.mini-header-main-wrapper',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_header_top_section', array(
		    'selector' => '.top-header-main-wrapper',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_header_section', array(
		    'selector' => '.header-main-wrapper',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_footer_section', array(
		    'selector' => '.footer-main-wrapper',
		) );

	/* Header and footer end */

	/* Title Wrapper start */

		$wp_customize->selective_refresh->add_partial( 'hongo_page_enable_title', array(
		    'selector' => '.hongo-page-title',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_single_post_enable_title', array(
		    'selector' => '.hongo-single-post-title',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_archive_enable_title', array(
		    'selector' => '.hongo-archive-title',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_default_enable_title', array(
		    'selector' => '.hongo-default-title',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_single_product_enable_title', array(
		    'selector' => '.hongo-single-product-title',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_product_archive_enable_title', array(
		    'selector' => '.hongo-product-archive-title',
		) );

	/* Title Wrapper end */

	/* Layout and Content start */

		$wp_customize->selective_refresh->add_partial( 'hongo_page_layout_setting', array(
		    'selector' => '.page .hongo-main-content-wrap',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_single_post_layout_setting', array(
		    'selector' => '.single-post .hongo-main-content-wrap',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_post_layout_setting_archive', array(
		    'selector' => '.category .hongo-main-content-wrap',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_post_layout_setting_default', array(
		    'selector' => '.blog .hongo-main-content-wrap',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_single_product_layout_setting', array(
		    'selector' => '.single-product .hongo-main-content-wrap',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_product_archive_layout_setting', array(
		    'selector' => '.post-type-archive-product .hongo-main-content-wrap',
		) );

	/* Layout and Content end */

	/* Sidebar Settings start */

		$wp_customize->selective_refresh->add_partial( 'hongo_post_widget_style_separator', array(
		    'selector' => '.hongo-blog-sidebar',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_page_widget_style_separator', array(
		    'selector' => '.hongo-page-sidebar',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_product_widget_style_separator', array(
		    'selector' => '.hongo-woocommerce-sidebar',
		) );	

	/* Sidebar Settings end */

	/* WooCommerce start */

		$wp_customize->selective_refresh->add_partial( 'hongo_checkout_separator', array(
		    'selector' => '.woocommerce-checkout .checkout-sidebar',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_cart_heading_separator', array(
		    'selector' => '.woocommerce-cart .checkout-sidebar',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_account_general_separator', array(
		    'selector' => '.woocommerce-account .entry-content',
		) );

		$wp_customize->selective_refresh->add_partial( 'hongo_wishlist_general_separator', array(
		    'selector' => '.hongo-wishlist-page',
		) );

	/* WooCommerce end */

}
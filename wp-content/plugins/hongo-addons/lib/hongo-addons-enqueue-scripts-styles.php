<?php
/**
 * Hongo Addons Register Style Js.
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/*
 * Enqueue scripts and styles.
 */
if( ! function_exists( 'hongo_addons_admin_script_style' ) ) {

	function hongo_addons_admin_script_style() {

		global $pagenow;

		/* To remove other plugin Font Awesome icon */
		wp_deregister_style( 'font-awesome' );
		wp_dequeue_style( 'font-awesome' );

		if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker');

			wp_register_script( 'alpha-color-picker', HONGO_ADDONS_ROOT_DIR.'/assets/js/admin/alpha-color-picker.js', array('jquery', 'wp-color-picker'), '1.0' );
			wp_enqueue_script( 'alpha-color-picker' );
			wp_register_style( 'alpha-color-picker', HONGO_ADDONS_ROOT_DIR.'/assets/css/admin/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
			wp_enqueue_style( 'alpha-color-picker' );
			
			wp_register_style( 'hongo-admin-metabox', HONGO_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
			wp_enqueue_style( 'hongo-admin-metabox' );
		}

		// Link settings
		wp_register_script( 'hongo-addons-link-setting', HONGO_ADDONS_ROOT_DIR.'/hongo-shortcodes/js/link-setting.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );
		wp_enqueue_script( 'hongo-addons-link-setting' );
		wp_localize_script( 'hongo-addons-link-setting', 'hongoAddonsLink', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		) );

		// Dequeue open sans fonts in customize preview
		if( is_customize_preview() && apply_filters( 'hongo_rs_do_not_load_open_sans_font', true ) ) {

			wp_dequeue_style( 'rs-open-sans' );
		}
	}
}

/*
 * Enqueue scripts and styles.
 */
if( ! function_exists( 'hongo_addons_register_style_js' ) ) {
	function hongo_addons_register_style_js() {

		/* To remove other plugin Font Awesome icon */
		wp_deregister_style( 'font-awesome' );
		wp_dequeue_style( 'font-awesome' );
	}
}
add_action( 'wp_enqueue_scripts', 'hongo_addons_register_style_js' );

if( ! function_exists( 'hongo_addons_script_style' ) ) {

	function hongo_addons_script_style() {

		// WpBakery Page Builder front css
		wp_enqueue_style( 'js_composer_front' );

		// Mobile Menu Breakpoint
		$hongo_enable_header_general		= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
		$hongo_header_section				= hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );
		$hongo_header_mobile_menu_breakpoint= hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_breakpoint' );
		$hongo_header_mobile_menu_breakpoint= ! empty( $hongo_header_mobile_menu_breakpoint ) ? $hongo_header_mobile_menu_breakpoint : '991';

		$script_details = hongo_option( 'hongo_disable_script_details', '' );
		$script_details = ! empty( $script_details ) ? explode( ',', $script_details ) : array();

		/*
		 * Load Hongo addons plugin main and other required stylesheet files. 
		 */
		if( hongo_load_stylesheet_by_key( 'justifiedGallery' ) ) {
			wp_register_style( 'justifiedGallery', HONGO_ADDONS_ROOT_DIR.'/assets/css/justifiedGallery.min.css', null, '4.0.4' );
			wp_enqueue_style( 'justifiedGallery' );
		}

		wp_register_style( 'hongo-hotspot', HONGO_ADDONS_ROOT_DIR .'/assets/css/hongo-frontend-hotspot.css' );
		wp_enqueue_style( 'hongo-hotspot' );

		wp_register_style( 'hongo-addons-section-builder', HONGO_ADDONS_ROOT_DIR.'/assets/css/section-builder.css', null, HONGO_ADDONS_PLUGIN_VERSION );
		wp_enqueue_style( 'hongo-addons-section-builder' );

		/*
		 * Load Hongo addons plugin main and other required jquery files. 
		 */
		$moment_timezone = apply_filters( 'hongo_countdown_moment_timezone', true );
		if( hongo_load_javascript_by_key( 'countdown' ) ) {

			wp_register_script( 'countdown', HONGO_ADDONS_ROOT_DIR.'/assets/js/jquery.countdown.min.js', null, '2.2.0', true);

			$product_countdown_dependency = array( 'countdown' );

			if( true === $moment_timezone ) {
            	wp_register_script( 'moment-tz', HONGO_ADDONS_ROOT_DIR.'/assets/js/moment.js', null, HONGO_ADDONS_PLUGIN_VERSION, true );
            	wp_register_script( 'moment-tz-data', HONGO_ADDONS_ROOT_DIR.'/assets/js/moment-timezone-with-data.js', null, HONGO_ADDONS_PLUGIN_VERSION, true );
            	$product_countdown_dependency[] = 'moment-tz';
            	$product_countdown_dependency[] = 'moment-tz-data';
			}
			wp_register_script( 'product-countdown', HONGO_ADDONS_ROOT_DIR.'/assets/js/product-countdown.js', $product_countdown_dependency,HONGO_ADDONS_PLUGIN_VERSION, true  );
		}

		if( hongo_load_javascript_by_key( 'skillbars' ) ) {
			wp_register_script( 'skillbars', HONGO_ADDONS_ROOT_DIR.'/assets/js/skill.bars.jquery.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );
		}

		if( hongo_load_javascript_by_key( 'jquery-justifiedGallery' ) ) {
			wp_register_script( 'jquery-justifiedGallery', HONGO_ADDONS_ROOT_DIR.'/assets/js/jquery.justifiedGallery.min.js', array( 'jquery' ),'3.7.0',true);
		}

		/*
		 * Defind ajaxurl and wp_localize
		 */
		
		$quickview_addtocart_message = $hongo_quick_view_ajax_add_to_cart = $archive_wishlist_text = $single_wishlist_text = $browse_wishlist_text = $remove_wishlist_text = $wishlist_added_message = $wishlist_remove_message = $wishlist_addtocart_message = $wishlist_multi_select_message = $wishlist_empty_message = $hongo_enable_promo_popup = $hongo_display_promo_popup_after = $hongo_delay_time_promo_popup = $hongo_scroll_promo_popup = $hongo_promo_popup_cokkie_expire = $hongo_enable_mobile_promo_popup = $hongo_enable_smart_product = $hongo_display_smart_product_after = $hongo_delay_time_smart_product = $hongo_scroll_smart_product = $hongo_smart_product_cokkie_expire = $hongo_enable_mobile_smart_product = '';

		$compare_text					= apply_filters( 'hongo_addons_compare_text', esc_html__( 'Add To Compare', 'hongo-addons' ) );
		$hongo_compare_added_text		= apply_filters( 'hongo_addons_compare_added_text', esc_html__( 'Compare products', 'hongo-addons' ) );
		$hongo_compare_remove_message	= apply_filters( 'hongo_addons_compare_remove_message', esc_html__( 'Are you sure you want to remove?', 'hongo-addons' ) );

		$hongo_single_product_wishlish_icon = get_theme_mod( 'hongo_single_product_wishlish_icon', 'icon-heart' );
		$hongo_wishlist_id = get_option( 'woocommerce_wishlist_page_id' );

		$wishlist_text	= esc_html__( 'Add to Wishlist', 'hongo-addons' );
		
		if( hongo_is_woocommerce_activated() ) {
			
			// Quick View Text
			$quickview_addtocart_message	= apply_filters( 'hongo_quickview_addtocart_message', esc_html__( 'Product was added to cart successfully', 'hongo-addons' ) );

			$hongo_quick_view_ajax_add_to_cart = get_theme_mod( 'hongo_quick_view_ajax_add_to_cart', '0' );

			// Wishlist Text
			$archive_wishlist_text	= get_theme_mod( 'hongo_product_archive_wishlist_text', __( 'Add to Wishlist', 'hongo-addons' ) );
			$single_wishlist_text	= get_theme_mod( 'hongo_single_product_wishlist_text', __( 'Add to Wishlist', 'hongo-addons' ) );
			$wishlist_text			= is_product() ? $single_wishlist_text : $archive_wishlist_text;
		
			// Custom Filters
			$product_archive_list_style	= hongo_get_product_archive_list_style();

			$browse_wishlist_text		= apply_filters( 'hongo_browse_wishlist_text', esc_html__( 'Browse Wishlist', 'hongo-addons' ) );
			$remove_wishlist_text		= apply_filters( 'hongo_remove_wishlist_text', esc_html__( 'Remove Wishlist', 'hongo-addons' ) );
			
			$wishlist_added_message		= apply_filters( 'hongo_wishlist_added_message', esc_html__( 'Product was added to wishlist successfully', 'hongo-addons' ) );
			$wishlist_remove_message	= apply_filters( 'hongo_wishlist_remove_message', esc_html__( 'Product was removed from wishlist successfully', 'hongo-addons' ) );
			$wishlist_addtocart_message	= apply_filters( 'hongo_wishlist_addtocart_message', esc_html__( 'Product was added to cart successfully', 'hongo-addons' ) );
			$wishlist_multi_select_message = apply_filters( 'hongo_wishlist_multi_select_message', esc_html__( 'Selected Products was removed from wishlist successfully', 'hongo-addons' ) );
			$wishlist_empty_message		= apply_filters( 'wishlist_empty_message', esc_html__( 'Are you sure you want to empty wishlist?', 'hongo-addons' ) );
			$cart_empty_message			= apply_filters( 'cart_empty_message', esc_html__( 'Are you sure you want to empty cart?', 'hongo-addons' ) );

			//Promo Popup
			$hongo_enable_promo_popup	= get_theme_mod( 'hongo_enable_promo_popup', '0' );
			$hongo_enable_promo_popup 	= apply_filters( 'hongo_enable_promo_popup', $hongo_enable_promo_popup );
			$hongo_promo_popup_section	= hongo_option( 'hongo_promo_popup_section', '' );

			// Compare Js
			wp_register_script( 'hongo-addons-compare', HONGO_ADDONS_ROOT_DIR.'/assets/js/compare.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );

			wp_enqueue_script( 'wc-cart-fragments' );
			// Quick View Js
			wp_register_script( 'hongo-addons-quick-view', HONGO_ADDONS_ROOT_DIR.'/assets/js/quick-view.js', array( 'jquery', 'wc-single-product', 'countdown', 'moment-tz','moment-tz-data' ), HONGO_ADDONS_PLUGIN_VERSION, true );
			// Wishlist Js
			wp_register_script( 'hongo-addons-wishlist', HONGO_ADDONS_ROOT_DIR.'/assets/js/wishlist.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );
			
			// Promo popup
			$hongo_display_promo_popup_after = hongo_post_meta_by_id( $hongo_promo_popup_section, 'hongo_display_promo_popup_after' );
			$hongo_display_promo_popup_after = ! empty( $hongo_display_promo_popup_after ) ? $hongo_display_promo_popup_after : 'some-time';
			
			$hongo_delay_time_promo_popup = hongo_post_meta_by_id( $hongo_promo_popup_section, 'hongo_delay_time_promo_popup' );
			$hongo_delay_time_promo_popup = ! empty( $hongo_delay_time_promo_popup ) ? $hongo_delay_time_promo_popup : '100';
			
			$hongo_scroll_promo_popup = hongo_post_meta_by_id( $hongo_promo_popup_section, 'hongo_scroll_promo_popup' );
			$hongo_scroll_promo_popup = ! empty( $hongo_scroll_promo_popup ) ? $hongo_scroll_promo_popup : '500';
			
			$hongo_enable_mobile_promo_popup = hongo_post_meta_by_id( $hongo_promo_popup_section, 'hongo_enable_mobile_promo_popup' );
			
			$hongo_promo_popup_cokkie_expire = hongo_post_meta_by_id( $hongo_promo_popup_section, 'hongo_promo_popup_cokkie_expire' );
			$hongo_promo_popup_cokkie_expire = ! empty( $hongo_promo_popup_cokkie_expire ) ? $hongo_promo_popup_cokkie_expire : '7';
				
			if( $hongo_enable_promo_popup == '1' && $hongo_promo_popup_section ) {
				wp_register_script( 'hongo-addons-promo-popup', HONGO_ADDONS_ROOT_DIR.'/assets/js/promo-popup.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );
			}

			// Smart Product
			$hongo_enable_smart_product = get_theme_mod( 'hongo_enable_smart_product', '0' );
			$hongo_single_smart_product = get_theme_mod( 'hongo_single_smart_product', '' );

			$hongo_display_smart_product_after = get_theme_mod( 'hongo_display_smart_product_after', '' );
			$hongo_delay_time_smart_product = get_theme_mod( 'hongo_delay_time_smart_product', '100' );
			$hongo_scroll_smart_product = get_theme_mod( 'hongo_scroll_smart_product', '200' );
			$hongo_smart_product_cokkie_expire = get_theme_mod( 'hongo_smart_product_cokkie_expire', '7' );
			$hongo_enable_mobile_smart_product = get_theme_mod( 'hongo_enable_mobile_smart_product', '0' );

			if( $hongo_enable_smart_product == '1' && ! empty( $hongo_single_smart_product ) ) {
				wp_register_script( 'hongo-addons-smart-product', HONGO_ADDONS_ROOT_DIR.'/assets/js/smart-product.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION, true );
			}
		}

		wp_register_script( 'hongo-addons-section-builder', HONGO_ADDONS_ROOT_DIR.'/assets/js/section-builder.js', array( 'jquery' ), HONGO_ADDONS_PLUGIN_VERSION , true );

		wp_enqueue_script( 'hongo-addons-section-builder' );

		// For Autocomplete Ajax Search
		wp_register_script( 'hongo-addons-ajax-search', HONGO_ADDONS_ROOT_DIR.'/assets/js/hongo-ajax-search.js', array( 'jquery-ui-autocomplete' ), HONGO_ADDONS_PLUGIN_VERSION , true );
		wp_localize_script( 'hongo-addons-section-builder', 'hongoAddons', array(
			'ajaxurl'						=> admin_url( 'admin-ajax.php' ),
			'site_id'						=> ( is_multisite() ) ? '-'.get_current_blog_id() : '',
			'disable_scripts'				=> $script_details,

			// assets/js/quick-view.js
			'quickview_addtocart_message'	=> $quickview_addtocart_message,
			'quickview_ajax_add_to_cart'	=> $hongo_quick_view_ajax_add_to_cart,

			// assets/js/compare.js
			'compare_text'					=> $compare_text,
			'compare_added_text'			=> $hongo_compare_added_text,
			'compare_remove_message'		=> $hongo_compare_remove_message,

			// assets/js/product-countdown.js && assets/js/quick-view.js
			'moment_timezone'				=> $moment_timezone,
			'product_deal_day'				=> esc_html__( 'Days', 'hongo-addons' ),
			'product_deal_hour'				=> esc_html__( 'Hours', 'hongo-addons' ),
			'product_deal_min'				=> esc_html__( 'Min', 'hongo-addons' ),
			'product_deal_sec'				=> esc_html__( 'Sec', 'hongo-addons' ),

			// assets/js/wishlist.js
			'add_to_wishlist_text'			=> $wishlist_text,
			'browse_wishlist_text'			=> $browse_wishlist_text,
			'remove_wishlist_text'			=> $remove_wishlist_text,
			'wishlist_added_message'		=> $wishlist_added_message,
			'wishlist_remove_message'		=> $wishlist_remove_message,
			'wishlist_addtocart_message'	=> $wishlist_addtocart_message,
			'wishlist_multi_select_message'	=> $wishlist_multi_select_message,
			'wishlist_empty_message'		=> $wishlist_empty_message,
			'wishlist_url'					=> ! empty( $hongo_wishlist_id ) ? get_permalink( $hongo_wishlist_id ) : '',
			'wishlist_icon'					=> $hongo_single_product_wishlish_icon,

			// assets/js/promo-popup.js
			'enable_promo_popup'			=> $hongo_enable_promo_popup,
			'display_promo_popup_after'		=> $hongo_display_promo_popup_after,
			'delay_time_promo_popup'		=> $hongo_delay_time_promo_popup,
			'scroll_promo_popup'			=> $hongo_scroll_promo_popup,
			'expired_days_promo_popup'		=> $hongo_promo_popup_cokkie_expire,
			'enable_mobile_promo_popup'		=> $hongo_enable_mobile_promo_popup,

			// assets/js/smart-product.js
			'enable_smart_product'			=> $hongo_enable_smart_product,
			'display_smart_product_after'	=> $hongo_display_smart_product_after,
			'delay_time_smart_product'		=> $hongo_delay_time_smart_product,
			'scroll_smart_product'			=> $hongo_scroll_smart_product,
			'expired_days_smart_product'	=> $hongo_smart_product_cokkie_expire,
			'enable_mobile_smart_product'	=> $hongo_enable_mobile_smart_product,

			// assets/js/section-builder.js
			'menu_breakpoint' 				=> $hongo_header_mobile_menu_breakpoint,
			'cart_url'						=> hongo_is_woocommerce_activated() ? wc_get_cart_url() : '',

			// assets/js/hongo-ajax-search.js
			'noproductmessage'				=> __( 'No products were found matching your selection.', 'hongo-addons' ),

		) );
	}
}

/* Load meta script and style on edit page */
add_action( 'admin_enqueue_scripts', 'hongo_addons_admin_script_style' );

/* Load front script and style */
add_action( 'hongo_enqueue_scripts_before_main_jquery', 'hongo_addons_script_style' );

if( ! function_exists( 'hongo_addons_load_vc_iframe_js' ) ) :
	function hongo_addons_load_vc_iframe_js() {

		wp_register_script( 'jquery-justifiedGallery', HONGO_ADDONS_ROOT_DIR.'/assets/js/jquery.justifiedGallery.min.js', array( 'jquery' ),'3.7.0',true);

	   	wp_enqueue_script( 'jquery-justifiedGallery' );
	}
endif;
add_action( 'vc_load_iframe_jscss', 'hongo_addons_load_vc_iframe_js' );

<?php
/**
 * Theme Register Style Js.
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/*
 * Enqueue scripts and styles in gutenberg blo.
 */
if( ! function_exists( 'hongo_gutenberg_block_editor_assets' ) ) :
	function hongo_gutenberg_block_editor_assets() {

		/* Google Fonts */
		wp_enqueue_style( 'hongo-google-font', hongo_enqueue_fonts_url(), null, null );

		/* Adobe Fonts */
		wp_enqueue_style( 'hongo-adobe-fonts', hongo_enqueue_abobe_fonts_url(), null, null );
	}
endif;
add_action( 'enqueue_block_editor_assets', 'hongo_gutenberg_block_editor_assets' );

/*
 * Enqueue scripts and styles.
 */
if( ! function_exists( 'hongo_register_style_js' ) ) :
	function hongo_register_style_js() {

		global $post;

		// Mobile Menu Breakpoint
		$hongo_enable_header_general		= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
		$hongo_header_section				= hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );
		$hongo_header_mobile_menu_breakpoint= hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_breakpoint' );
		$hongo_header_mobile_menu_breakpoint= ! empty( $hongo_header_mobile_menu_breakpoint ) ? $hongo_header_mobile_menu_breakpoint : '991';
		$hongo_enable_shop_all_filter_ajax	= get_theme_mod( 'hongo_enable_shop_all_filter_ajax', '1' );
		$hongo_single_product_variation_scroll_animation = get_theme_mod( 'hongo_single_product_variation_scroll_animation', '1' );
		$hongo_single_product_wishlish_icon	= get_theme_mod( 'hongo_single_product_wishlish_icon', 'icon-heart' );
		$hongo_single_product_add_to_cart_fill_icon	= get_theme_mod( 'hongo_single_product_add_to_cart_fill_icon', 'icon-basket-loaded' );

		$script_details		= hongo_option( 'hongo_disable_script_details', '' );
		$script_details		= ! empty( $script_details ) ? explode( ',', $script_details ) : array();
		$enable_zoom_icon	= hongo_option( 'hongo_single_product_page_enable_zoom_icon', '1' );
		$mobileAnimation	= hongo_option( 'hongo_enable_mobile_animation', '0' );

		/* Google Fonts */
		wp_enqueue_style( 'hongo-google-font', hongo_enqueue_fonts_url(), null, null );

		/* Adobe Fonts */
		wp_enqueue_style( 'hongo-adobe-fonts', hongo_enqueue_abobe_fonts_url(), null, null );

		/*
		 * Load Hongo theme main and other required stylesheet files. 
		 */
		if( hongo_load_stylesheet_by_key( 'animate' ) ) {

			$mobileAnimation = hongo_option( 'hongo_enable_mobile_animation', '0' );

			if( ! ( wp_is_mobile() && $mobileAnimation == '0' ) ) {

				wp_register_style( 'animate', HONGO_THEME_CSS_URI . '/animate.min.css', null, '3.5.2' );
				wp_enqueue_style( 'animate' );
			}
		}

		wp_register_style( 'bootstrap', HONGO_THEME_CSS_URI . '/bootstrap.min.css', null, '5.3.8' );
		wp_enqueue_style( 'bootstrap' );

		if( hongo_load_stylesheet_by_key( 'et-line-icons' ) ) {
			wp_register_style( 'et-line-icons', HONGO_THEME_CSS_URI . '/et-line-icons.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'et-line-icons' );
		}

		if( hongo_load_stylesheet_by_key( 'font-awesome' ) ) {
			wp_register_style( 'font-awesome', HONGO_THEME_CSS_URI . '/font-awesome.min.css', null, '6.7.2' );
			wp_enqueue_style( 'font-awesome' );
		}

		if( hongo_load_stylesheet_by_key( 'themify-icons' ) ) {
			wp_register_style( 'themify-icons', HONGO_THEME_CSS_URI . '/themify-icons.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'themify-icons' );
		}

		if( hongo_load_stylesheet_by_key( 'simple-line-icons' ) ) {
			wp_register_style( 'simple-line-icons', HONGO_THEME_CSS_URI . '/simple-line-icons.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'simple-line-icons' );
		}

		if( hongo_load_stylesheet_by_key( 'swiper' ) ) {
			wp_register_style( 'swiper', HONGO_THEME_CSS_URI . '/swiper.min.css', null, '5.4.5' );
			wp_enqueue_style( 'swiper' );
		}

		if( hongo_load_stylesheet_by_key( 'magnific-popup' ) ) {
			wp_register_style( 'magnific-popup', HONGO_THEME_CSS_URI . '/magnific-popup.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'magnific-popup' );
		}

		if( hongo_load_stylesheet_by_key( 'hongo-mCustomScrollbar-style' ) ) {
			wp_register_style( 'hongo-mCustomScrollbar', HONGO_THEME_CSS_URI . '/jquery.mCustomScrollbar.css',null, HONGO_THEME_VERSION);
			wp_enqueue_style( 'hongo-mCustomScrollbar' );
		}

		if( hongo_load_stylesheet_by_key( 'select2' ) ) {
			wp_register_style( 'select2', HONGO_THEME_CSS_URI . '/select2.min.css', null, '4.0.4' );
			wp_enqueue_style( 'select2' );
		}

		/*
		 * Load Hongo theme main and other required jquery files. 
		 */
		wp_register_script( 'bootstrap', HONGO_THEME_JS_URI.'/bootstrap.min.js', array( 'jquery' ), '5.3.8', true);
		wp_enqueue_script( 'bootstrap' );

		wp_register_script( 'jquery-easing', HONGO_THEME_JS_URI.'/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true);
		wp_enqueue_script( 'jquery-easing' );

		if( hongo_load_javascript_by_key( 'smooth-scroll' ) ) {
			wp_register_script( 'smooth-scroll', HONGO_THEME_JS_URI.'/smooth-scroll.min.js', array( 'jquery' ), '2.2.0', true);
			wp_enqueue_script( 'smooth-scroll' );
		}

		if( hongo_load_javascript_by_key( 'select2' ) ) {
			wp_register_script( 'select2', HONGO_THEME_JS_URI . '/select2.js', array( 'jquery' ), '4.0.3', true);
			wp_enqueue_script( 'select2' );
		}

		if( hongo_load_javascript_by_key( 'wow' ) ) {
			wp_register_script( 'wow', HONGO_THEME_JS_URI.'/wow.min.js', array( 'jquery' ), '1.0.3', true );
		wp_enqueue_script( 'wow' );
		}

		/* To hide/show page scrolling effect */
		$hongo_enable_page_scrolling_effect = get_theme_mod( 'hongo_enable_page_scrolling_effect', '0' );

		if( hongo_load_javascript_by_key( 'page-scroll' ) && $hongo_enable_page_scrolling_effect == 1 ) {
			wp_register_script( 'page-scroll', HONGO_THEME_JS_URI.'/page-scroll.js', array( 'jquery' ), '1.4.9', true );
			wp_enqueue_script( 'page-scroll' );
		}

		if( hongo_load_javascript_by_key( 'swiper' ) ) {
			wp_register_script( 'swiper', HONGO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '5.4.5', true );
			wp_enqueue_script( 'swiper' );
		}

		if( hongo_load_javascript_by_key( 'isotope' ) ) {
			wp_register_script( 'isotope', HONGO_THEME_JS_URI.'/isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true );
			wp_enqueue_script( 'isotope' );
		}

		if( hongo_load_javascript_by_key( 'jquery-magnific-popup' ) ) {
			wp_register_script( 'jquery-magnific-popup', HONGO_THEME_JS_URI.'/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_enqueue_script( 'jquery-magnific-popup' );
		}

		if( hongo_load_javascript_by_key( 'jquery-appear' ) ) {
			wp_register_script( 'jquery-appear', HONGO_THEME_JS_URI.'/jquery.appear.js', array( 'jquery' ), '0.4', true );
			wp_enqueue_script( 'jquery-appear' );
		}

		if( hongo_load_javascript_by_key( 'jquery-fitvids' ) ) {
			wp_register_script( 'jquery-fitvids', HONGO_THEME_JS_URI.'/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
			wp_enqueue_script( 'jquery-fitvids' );
		}

		if( hongo_load_javascript_by_key( 'imagesloaded' ) ) {
			wp_enqueue_script( 'imagesloaded' );			
		}

		if( hongo_load_javascript_by_key( 'equalize' ) ) {
			wp_register_script( 'equalize', HONGO_THEME_JS_URI.'/equalize.min.js', array( 'jquery' ), HONGO_THEME_VERSION, true );
			wp_enqueue_script( 'equalize' );
		}

		if( hongo_load_javascript_by_key( 'hongo-mcustomscrollbar' ) ) {
			wp_register_script( 'hongo-mcustomscrollbar', HONGO_THEME_JS_URI.'/jquery.mCustomScrollbar.concat.min.js',array('jquery'),HONGO_THEME_VERSION,true);
			wp_enqueue_script( 'hongo-mcustomscrollbar' );
		}

		if( hongo_load_javascript_by_key( 'infinite-scroll' ) ) {
			wp_register_script( 'infinite-scroll', HONGO_THEME_JS_URI.'/infinite-scroll.js', array( 'jquery' ), '3.6.0', true );
			wp_enqueue_script( 'infinite-scroll' );
		}

		if( hongo_load_javascript_by_key( 'sticky-kit' ) ) {
			wp_register_script( 'sticky-kit', HONGO_THEME_JS_URI.'/jquery.sticky-kit.min.js', array( 'jquery' ), '1.1.2', true );
			wp_enqueue_script( 'sticky-kit' );
		}

		wp_register_script( 'retina', HONGO_THEME_JS_URI.'/retina.js', array( 'jquery' ), '2.1.2', true );
		wp_enqueue_script( 'retina' );

		wp_register_script( 'jquery-parallax', HONGO_THEME_JS_URI.'/jquery.parallax.js', array( 'jquery' ),'1.1.3',true);
		wp_register_script( 'hongo-custom-parallax', HONGO_THEME_JS_URI.'/hongo-parallax.min.js', array( 'jquery', 'jquery-parallax' ), HONGO_THEME_VERSION, true );
		wp_enqueue_script( 'hongo-custom-parallax' );

		if( hongo_load_javascript_by_key( 'threesixty' ) ) {
			wp_register_script( 'threesixty', HONGO_THEME_JS_URI.'/threesixty.js', array( 'jquery' ), '2.0.4', true );
			wp_enqueue_script( 'threesixty' );
		}

		if ( hongo_is_woocommerce_activated() ) {
			$hongo_single_product_ajax_add_to_cart = get_theme_mod( 'hongo_single_product_ajax_add_to_cart', '0' );
			if ( is_product() && $hongo_single_product_ajax_add_to_cart == '1' ) {
				wp_register_script( 'product-ajax-add-to-cart', HONGO_THEME_JS_URI.'/product-ajax-add-to-cart.js', array( 'jquery', 'wc-cart-fragments' ), HONGO_THEME_VERSION, true );
				wp_enqueue_script( 'product-ajax-add-to-cart' );
				wp_localize_script( 'product-ajax-add-to-cart', 'productAddtoCart', array( 
					'ajax_cart_message_show_time' => apply_filters( 'hongo_ajax_cart_message_show_time', '5000' ),
					'redirect_to_cart'			  => get_option( 'woocommerce_cart_redirect_after_add' ),
					'woo_cart_url' 				  => get_permalink( wc_get_page_id( 'cart' ) ),
				) );
			}
		}

		// Enqueue scripts before main.js
		do_action( 'hongo_enqueue_scripts_before_main_jquery' );

		wp_register_script( 'hongo-main', HONGO_THEME_JS_URI.'/main.js', array( 'jquery' ), HONGO_THEME_VERSION, true );
		wp_enqueue_script( 'hongo-main' );

		// Load the html5 shiv.
		wp_enqueue_script( 'html5', HONGO_THEME_JS_URI.'/html5shiv.js', array( 'jquery' ), '3.7.3' );
		// wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		/*
		 * Defind ajaxurl and wp_localize
		 */

		// Custom Filters			
		$hongo_cart_empty_message	= apply_filters( 'cart_empty_message', esc_html__( 'Are you sure you want to empty cart?', 'hongo' ) );

		wp_localize_script( 'hongo-main', 'hongoMain', array( 
			'ajaxurl'							=> admin_url( 'admin-ajax.php' ),
			'site_id'							=> ( is_multisite() ) ? '-'.get_current_blog_id() : '',
			'cart_empty_message'				=> $hongo_cart_empty_message,
			'loading_image'						=> HONGO_THEME_IMAGES_URI.'/loading-black.svg',
			'menu_breakpoint'					=> $hongo_header_mobile_menu_breakpoint,
			'add_to_cart_fill_icon'				=> $hongo_single_product_add_to_cart_fill_icon,
			'product_added_message'				=> apply_filters( 'hongo_cart_message', esc_html__( 'Product was added to cart successfully', 'hongo' ) ),
			'enable_shop_filter_ajax'			=> $hongo_enable_shop_all_filter_ajax,
			'zoom_icon'							=> HONGO_THEME_IMAGES_URI.'/zoom-icon.svg',
			'zoom_tooltip_text'					=> esc_html__( 'Zoom', 'hongo' ),
			'zoom_enabled'						=> apply_filters( 'woocommerce_single_product_zoom_enabled', get_theme_support( 'wc-product-gallery-zoom' ) ),
			'photoswipe_enabled'				=> apply_filters( 'woocommerce_single_product_photoswipe_enabled', get_theme_support( 'wc-product-gallery-lightbox' ) ),
			'flexslider_enabled'				=> apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) ),
			'disable_scripts'					=> $script_details,
			'enable_zoom_icon'					=> $enable_zoom_icon,
			'mobileAnimation'					=> $mobileAnimation ? true : false,
			'popup_disableon'					=> get_theme_mod( 'hongo_magnific_popup_disableon', '700' ),
			'variation_animation'				=> $hongo_single_product_variation_scroll_animation,
		) );

		// Load for wordpress comments
		if ( is_singular() && ( comments_open() || get_comments_number() ) && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'hongo_register_style_js' );

if( ! function_exists( 'hongo_enqueue_main_style' ) ) :
	function hongo_enqueue_main_style() {

		wp_register_style( 'hongo-style', get_stylesheet_uri(), null, HONGO_THEME_VERSION );
		wp_register_style( 'hongo-responsive', HONGO_THEME_CSS_URI . '/responsive.css', null, HONGO_THEME_VERSION );

		/* Main & Responsive style */
		wp_enqueue_style( 'hongo-style' );

		/* Dokan plugin css */
		if( class_exists( 'WeDevs_Dokan' ) ) {

			wp_register_style( 'hongo-dokan', HONGO_THEME_CSS_URI . '/dokan.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'hongo-dokan' );
		}

		wp_enqueue_style( 'hongo-responsive' );

		/* Check Header Image */
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) {
			$hongo_header_image_css = "header { background-image: url( " . esc_url( $header_image ) . " ); background-repeat: no-repeat !important; background-position: 50% 50% !important; -webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important; background-size: cover !important; }";
			wp_add_inline_style( 'hongo-responsive', $hongo_header_image_css );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'hongo_enqueue_main_style', 100 );

/* Enqueue Custom css base on customizer settings */
if( ! function_exists( 'hongo_enqueue_custom_style' ) ) :
	function hongo_enqueue_custom_style() {

		$output_css = '';
		ob_start();
		/* Include navigation css */
		require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/custom-base-color-css.php';
		require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/custom-mobilebreakpoint-css.php';
		require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/custom-css.php';
		// Title
		require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/title-custom-css.php';

		// Sidebar custom css
		require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/sidebar-custom-css.php';

		// My account custom css
		if ( hongo_is_woocommerce_activated() && is_account_page() ) {
			require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/myaccount-custom-css.php';
		}
		// Checkout custom css
		if ( hongo_is_woocommerce_activated() && is_checkout() ) {
			require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/checkout-custom-css.php';
		}
		// Cart custom css
		if ( hongo_is_woocommerce_activated() && is_cart() ) {
			require_once HONGO_THEME_CUSTOMIZER . '/customizer-output/cart-custom-css.php';
		}
		$output_css = ob_get_contents();
		ob_end_clean();

		// apply_filters for custom css so user can add its own custom css
		$output_css = apply_filters( 'hongo_inline_custom_css', $output_css );

		// 1. Remove comments.
		// 2. Remove whitespace.
		// 3. Remove starting whitespace.
		$output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
		$output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
		$output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

		// apply_filters for custom css after minified so user can add its own custom css
		$output_css = apply_filters( 'hongo_inline_custom_css_after_minified', $output_css );

		wp_add_inline_style( 'hongo-responsive', $output_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'hongo_enqueue_custom_style', 999 );

/*
 * Load hongo customizer script.
 */
if( ! function_exists( 'hongo_customizer_scripts_preview' ) ) :
	function hongo_customizer_scripts_preview() {

	   	wp_enqueue_script( 'hongo-customizer', HONGO_THEME_ADMIN_JS_URI.'/hongo-customizer.js', array( 'jquery','customize-preview' ) );
	}
endif;
add_action( 'customize_preview_init','hongo_customizer_scripts_preview' );

/*
 * Load theme admin css and script.
 */
if( ! function_exists( 'hongo_admin_custom_scripts' ) ) :
	function hongo_admin_custom_scripts() {

		global $pagenow, $wp_version;
		
		// Color picker js added for product attribute color
		$screen		= get_current_screen();
		$screen_id	= $screen ? $screen->id : '';

		// load media script
		wp_enqueue_media();

		// admin css
		if ( $wp_version >= '5.3' ) {
			wp_register_style( 'hongo-latest-backend', HONGO_THEME_ADMIN_CSS_URI . '/hongo-latest-backend.css', null, HONGO_THEME_VERSION );
			wp_enqueue_style( 'hongo-latest-backend' );
		}

		wp_register_style( 'et-line-icons', HONGO_THEME_CSS_URI . '/et-line-icons.css', null, HONGO_THEME_VERSION );
		wp_enqueue_style( 'et-line-icons' );

		wp_register_style( 'themify-icons', HONGO_THEME_CSS_URI . '/themify-icons.css', null, HONGO_THEME_VERSION );
		wp_enqueue_style( 'themify-icons' );

		wp_register_style( 'font-awesome', HONGO_THEME_CSS_URI . '/font-awesome.min.css', null, '6.7.2' );
		wp_enqueue_style( 'font-awesome' );

		wp_register_style( 'simple-line-icons', HONGO_THEME_CSS_URI . '/simple-line-icons.css', null, HONGO_THEME_VERSION );
		wp_enqueue_style( 'simple-line-icons' );

		wp_register_style( 'select2', HONGO_THEME_CSS_URI . '/select2.min.css', null, '4.0.4' );
		wp_enqueue_style( 'select2' );

		wp_register_style( 'hongo-admin-custom', HONGO_THEME_ADMIN_CSS_URI . '/hongo-admin-custom.css', null, HONGO_THEME_VERSION);
		wp_enqueue_style( 'hongo-admin-custom' );

		// select2 scripts
		wp_register_script( 'select2', HONGO_THEME_JS_URI . '/select2.js', array( 'jquery' ), '4.0.3', true);
		wp_enqueue_script( 'select2' );

		// Accordian Scripts
		
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker');
		
		wp_register_script( 'hongo-admin-custom', HONGO_THEME_ADMIN_JS_URI . '/hongo-admin-custom.js', array( 'jquery', 'wp-color-picker' ), HONGO_THEME_VERSION, true);
		wp_enqueue_script( 'hongo-admin-custom' );

		wp_register_script( 'hongo-admin-custom-customizer-control', HONGO_THEME_ADMIN_JS_URI . '/hongo-customizer-control.js', array( 'jquery' ), HONGO_THEME_VERSION, true);
		wp_enqueue_script( 'hongo-admin-custom-customizer-control' );

		wp_localize_script( 'hongo-admin-custom-customizer-control', 'hongoadmin', array(
				'removeButtonText'	=> esc_attr__( 'Remove', 'hongo' ),
				'fontNameText'		=> esc_html__( 'Font name', 'hongo' ),
				'woff2Text'			=> esc_html__( 'WOFF2', 'hongo' ),
				'woffText'			=> esc_html__( 'WOFF', 'hongo' ),
				'ttfText'			=> esc_html__( 'TTF', 'hongo' ),
				'eotText'			=> esc_html__( 'EOT', 'hongo' ),
				'removeFontText'	=> esc_html__( 'Remove font', 'hongo' )
			)
		);
	}
endif;
add_action( 'admin_enqueue_scripts', 'hongo_admin_custom_scripts' );

// vc_frontend_editor_enqueue_js_css
if ( ! function_exists( 'hongo_vc_frontend_editor_enqueue_js_css' ) ) :
	function hongo_vc_frontend_editor_enqueue_js_css() {
		
		wp_register_script( 'swiper', HONGO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '5.4.5', true );
		wp_enqueue_script( 'swiper' );
	}
endif;
add_action( 'vc_frontend_editor_enqueue_js_css', 'hongo_vc_frontend_editor_enqueue_js_css' );

if( ! function_exists( 'hongo_load_vc_iframe_js' ) ) :
	function hongo_load_vc_iframe_js() {

		wp_register_style( 'hongo-admin-custom', HONGO_THEME_ADMIN_CSS_URI . '/hongo-admin-custom.css', null, HONGO_THEME_VERSION);
		wp_enqueue_style( 'hongo-admin-custom' );

		wp_register_style( 'bootstrap-frontend', HONGO_THEME_CSS_URI . '/bootstrap.min.css', null, '5.3.8' );
		wp_enqueue_style( 'bootstrap-frontend' );

		if( hongo_load_javascript_by_key( 'smooth-scroll' ) ) {
			wp_register_script( 'smooth-scroll-frontend', HONGO_THEME_JS_URI.'/smooth-scroll.min.js', array( 'jquery' ), '2.2.0', true);
			wp_enqueue_script( 'smooth-scroll-frontend' );
		}

		if( hongo_load_javascript_by_key( 'jquery-appear' ) ) {
			wp_register_script( 'jquery-appear-frontend', HONGO_THEME_JS_URI.'/jquery.appear.js', array( 'jquery' ), '0.4', true );
			wp_enqueue_script( 'jquery-appear-frontend' );
		}

		if( hongo_load_javascript_by_key( 'wow' ) ) {
			wp_register_script( 'wow-frontend', HONGO_THEME_JS_URI.'/wow.min.js', array( 'jquery' ), '1.0.3', true );
			wp_enqueue_script( 'wow-frontend' );
		}

		/* To hide/show page scrolling effect */
		$hongo_enable_page_scrolling_effect = get_theme_mod( 'hongo_enable_page_scrolling_effect', '0' );

		if( hongo_load_javascript_by_key( 'page-scroll' ) && $hongo_enable_page_scrolling_effect == 1 ) {
			wp_register_script( 'page-scroll-frontend', HONGO_THEME_JS_URI.'/page-scroll.js', array( 'jquery' ), '1.4.9', true );
			wp_enqueue_script( 'page-scroll-frontend' );
		}

		if( hongo_load_javascript_by_key( 'swiper' ) ) {
			wp_register_script( 'swiper-frontend', HONGO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '5.4.5', true );
			wp_enqueue_script( 'swiper-frontend' );
		}

		if( hongo_load_javascript_by_key( 'jquery-magnific-popup' ) ) {
			wp_register_script( 'jquery-magnific-popup-frontend', HONGO_THEME_JS_URI.'/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_enqueue_script( 'jquery-magnific-popup-frontend' );
		}

		if( hongo_load_javascript_by_key( 'isotope' ) ) {
			wp_register_script( 'isotope-frontend', HONGO_THEME_JS_URI.'/isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true );
			wp_enqueue_script( 'isotope-frontend' );
		}

		if( hongo_load_javascript_by_key( 'imagesloaded' ) ) {
			wp_enqueue_script( 'imagesloaded' );
		}

		if( hongo_load_javascript_by_key( 'jquery-fitvids' ) ) {
			wp_register_script( 'jquery-fitvids-frontend', HONGO_THEME_JS_URI.'/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
			wp_enqueue_script( 'jquery-fitvids-frontend' );
		}

		if( hongo_load_javascript_by_key( 'equalize' ) ) {
			wp_register_script( 'equalize-frontend', HONGO_THEME_JS_URI.'/equalize.min.js', array( 'jquery' ), HONGO_THEME_VERSION, true );
			wp_enqueue_script( 'equalize-frontend' );
		}

		wp_register_script( 'jquery-parallax-frontend', HONGO_THEME_JS_URI.'/jquery.parallax.js', array( 'jquery' ),'1.1.3',true);
		wp_register_script( 'hongo-custom-parallax-frontend', HONGO_THEME_JS_URI.'/hongo-parallax.min.js', array( 'jquery', 'jquery-parallax-frontend' ), HONGO_THEME_VERSION, true );
		wp_enqueue_script( 'hongo-custom-parallax-frontend' );

		wp_register_script( 'hongo-main-frontend', HONGO_THEME_JS_URI.'/main.js', array( 'jquery' ), HONGO_THEME_VERSION, true );
		wp_enqueue_script( 'hongo-main-frontend' );
	}
endif;
add_action( 'vc_load_iframe_jscss', 'hongo_load_vc_iframe_js' );

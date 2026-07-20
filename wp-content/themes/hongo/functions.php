<?php
/**
 * This file use for define custom function
 * Also include required files.
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Hongo Theme namespace.
 */
define( 'HONGO_THEME_VERSION', '4.2' );
define( 'HONGO_ADDONS_VERSION', '4.2' );
define( 'HONGO_WPBAKERY_VERSION', '8.7.2' );
define( 'HONGO_REVOLUTION_VERSION', '6.7.41' );

/**
 *	Hongo Theme Folders
 */
define( 'HONGO_THEME_DIR',					get_template_directory());
define( 'HONGO_THEME_LANGUAGES',			HONGO_THEME_DIR . '/languages' );
define( 'HONGO_THEME_ASSETS',				HONGO_THEME_DIR . '/assets' );
define( 'HONGO_THEME_JS',					HONGO_THEME_ASSETS . '/js' );
define( 'HONGO_THEME_CSS',					HONGO_THEME_ASSETS . '/css' );
define( 'HONGO_THEME_IMAGES',				HONGO_THEME_ASSETS . '/images' );
define( 'HONGO_THEME_ADMIN_JS',				HONGO_THEME_JS . '/admin' );
define( 'HONGO_THEME_ADMIN_CSS',			HONGO_THEME_CSS . '/admin' );
define( 'HONGO_THEME_LIB',					HONGO_THEME_DIR . '/lib' );
define( 'HONGO_THEME_CUSTOMIZER',			HONGO_THEME_LIB . '/customizer' );
define( 'HONGO_THEME_CUSTOMIZER_MAPS',		HONGO_THEME_CUSTOMIZER . '/customizer-maps' );
define( 'HONGO_THEME_CUSTOMIZER_CONTROLS',	HONGO_THEME_CUSTOMIZER . '/customizer-control' );
define( 'HONGO_THEME_MEGA_MENU',			HONGO_THEME_LIB . '/mega-menu' );
define( 'HONGO_THEME_LEFT_MENU',			HONGO_THEME_LIB . '/left-menu' );
define( 'HONGO_THEME_ACOOUNT_MENU',			HONGO_THEME_LIB . '/account-menu');
define( 'HONGO_THEME_HAMBURGER_MENU',		HONGO_THEME_LIB . '/hamburger-menu');
define( 'HONGO_THEME_TGM',					HONGO_THEME_LIB . '/tgm' );

/**
 *  Hongo Theme Folder URI
 */
define( 'HONGO_THEME_URI',					get_template_directory_uri());
define( 'HONGO_THEME_LANGUAGES_URI',		HONGO_THEME_URI . '/languages' );
define( 'HONGO_THEME_ASSETS_URI',			HONGO_THEME_URI . '/assets' );
define( 'HONGO_THEME_JS_URI',				HONGO_THEME_ASSETS_URI . '/js' );
define( 'HONGO_THEME_CSS_URI',				HONGO_THEME_ASSETS_URI . '/css' );
define( 'HONGO_THEME_IMAGES_URI',			HONGO_THEME_ASSETS_URI . '/images' );
define( 'HONGO_THEME_ADMIN_JS_URI',			HONGO_THEME_JS_URI . '/admin' );
define( 'HONGO_THEME_ADMIN_CSS_URI',		HONGO_THEME_CSS_URI . '/admin' );
define( 'HONGO_THEME_LIB_URI',				HONGO_THEME_URI . '/lib' );
define( 'HONGO_THEME_CUSTOMIZER_URI',		HONGO_THEME_LIB_URI . '/customizer' );
define( 'HONGO_THEME_CUSTOMIZER_MAPS_URI',	HONGO_THEME_CUSTOMIZER_URI . '/customizer-maps' );
define( 'HONGO_THEME_MEGA_MENU_URI',		HONGO_THEME_LIB_URI . '/mega-menu' );
define( 'HONGO_THEME_LEFT_MENU_URI',		HONGO_THEME_LIB_URI . '/left-menu' );
define( 'HONGO_THEME_TGM_URI',				HONGO_THEME_LIB_URI . '/tgm' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'hongo_theme_setup' ) ) {
	function hongo_theme_setup() {

		/*
		 * Text Domain
		 */
		load_theme_textdomain( 'hongo', get_template_directory() . '/languages' );

		/*
		 * To add default posts and comments RSS feed links to theme head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Custom image sizes for posts, pages, gallery, slider.
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'hongo-product-icon-image', 64, 64, true );
		add_image_size( 'hongo-product-small-image', 84, '', true );
		add_image_size( 'hongo-popular-posts-thumb', 200, '', true );
		add_image_size( 'hongo-medium-image', 450, '', true );
		add_image_size( 'hongo-shop-image', 600, 765, true );
		set_post_thumbnail_size( 1200, 790 );

		// Set Custom Header
		add_theme_support( 'custom-header', apply_filters( 'hongo_custom_header_args', array(
			'width' => 1920,
			'height'=> 100,
		) ) );

		// Set Custom Body Background
		add_theme_support( 'custom-background' );

		/*
		 * Register menu for Hongo theme.
		 */
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Menu', 'hongo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image', 'gallery', 'video', 'audio', 'quote', 'link',
		) );

		/* Add support for Block Styles. */
		add_theme_support( 'wp-block-styles' );

		/* Add support for full and wide align images. */
		add_theme_support( 'align-wide' );

		/* This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();

		/* Add support for responsive embedded content. */
		add_theme_support( 'responsive-embeds' );

		/* Add custom editor font sizes. */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'		=> __( 'Small', 'hongo' ),
					'shortName'	=> __( 'S', 'hongo' ),
					'size'		=> 12,
					'slug'		=> 'small',
				),
				array(
					'name'		=> __( 'Normal', 'hongo' ),
					'shortName'	=> __( 'M', 'hongo' ),
					'size'		=> 13,
					'slug'		=> 'normal',
				),
				array(
					'name'		=> __( 'Large', 'hongo' ),
					'shortName'	=> __( 'L', 'hongo' ),
					'size'		=> 16,
					'slug'		=> 'large',
				),
				array(
					'name'		=> __( 'Huge', 'hongo' ),
					'shortName'	=> __( 'XL', 'hongo' ),
					'size'		=> 23,
					'slug'		=> 'huge',
				),
			)
		);

		/* Editor color palette. */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'	=> __( 'Primary', 'hongo' ),
					'slug'	=> 'primary',
					'color'	=> '#6f6f6f',
				),
				array(
					'name'	=> __( 'Secondary', 'hongo' ),
					'slug'	=> 'secondary',
					'color'	=> '#f57250',
				),
				array(
					'name'	=> __( 'Dark Gray', 'hongo' ),
					'slug'	=> 'dark-gray',
					'color'	=> '#232323',
				),
				array(
					'name'	=> __( 'Light Gray', 'hongo' ),
					'slug'	=> 'light-gray',
					'color'	=> '#f1f1f1',
				),
				array(
					'name'	=> __( 'White', 'hongo' ),
					'slug'	=> 'white',
					'color'	=> '#ffffff',
				),
			)
		);

		/*
		 * woocommerce support
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * product gallery features (zoom, swipe, lightbox) 
		 */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * product gallery features ( for mobile device zoom) 
		 */
		if ( wp_is_mobile() ) {
			remove_theme_support( 'wc-product-gallery-zoom' );
		}
	}
}
add_action( 'after_setup_theme', 'hongo_theme_setup' );

/*
 * Content Width (Set the content width based on the theme's design and stylesheet.)
 */
if ( ! function_exists( 'hongo_content_width' ) ) {
	function hongo_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hongo_content_width', 1170 );
	}
}
add_action( 'template_redirect', 'hongo_content_width', 0 );

if ( file_exists( HONGO_THEME_LIB . '/hongo-require-files.php' ) ) {
	require_once( HONGO_THEME_LIB . '/hongo-require-files.php' );
}

// Shop page meta change
if( ! function_exists( 'hongo_shop_archive_page_title' ) ) {
	function hongo_shop_archive_page_title() {
		if ( is_admin() && hongo_is_woocommerce_activated() && get_option( 'hongo_shop_page_title_meta_update' ) != 'yes' ) {
			$post_id = wc_get_page_id( 'shop' );
			update_post_meta( $post_id, '_hongo_page_enable_title_single', 'default');
			update_post_meta( $post_id, '_hongo_page_title_opacity_single', '0.0');
			update_post_meta( $post_id, '_hongo_page_title_color_single', '');
			update_option( 'hongo_shop_page_title_meta_update', 'yes' );
		}
	}
}
add_action( 'welcome_panel', 'hongo_shop_archive_page_title' );

// Blank data for WooCommerce Pages
if ( ! function_exists( 'hongo_woocommerce_create_pages' ) ) {
	function hongo_woocommerce_create_pages() {

		return array();
	}
}

if ( ! function_exists( 'hongo_high_priority_init' ) ) {
	function hongo_high_priority_init() {

		add_filter( 'woocommerce_create_pages', 'hongo_woocommerce_create_pages' );
	}
}
add_action( 'init', 'hongo_high_priority_init', 4 );

// Remove revslider conflict in widget.php
if( ! function_exists( 'hongo_revslider_gutenberg_cgb_editor_assets' ) ) {
	function hongo_revslider_gutenberg_cgb_editor_assets() {
		global $pagenow;
		if( 'widgets.php' == $pagenow ) {
			wp_dequeue_script( 'revslider_gutenberg-cgb-block-js');
		}
	}
}
add_action( 'enqueue_block_editor_assets', 'hongo_revslider_gutenberg_cgb_editor_assets' );

add_filter( 'use_widgets_block_editor', '__return_false' );

if ( hongo_is_woocommerce_activated() ) {
	add_filter( 'woocommerce_layered_nav_count_maybe_cache', '__return_false' );
}

if ( ! function_exists( 'hongo_wc_logout_url' ) ) {
	function hongo_wc_logout_url( $redirect = '' ) {
		if ( hongo_is_woocommerce_activated() ) {

			$redirect = $redirect ? $redirect : apply_filters( 'woocommerce_logout_default_redirect_url', wc_get_page_permalink( 'myaccount' ) );

			if ( get_option( 'woocommerce_logout_endpoint' ) ) {
				return wp_nonce_url( wc_get_endpoint_url( 'customer-logout', '', $redirect ), 'customer-logout' );
			}

		}
		
		return wp_logout_url( $redirect );
	}
}

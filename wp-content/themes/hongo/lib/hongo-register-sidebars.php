<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Register Hongo theme required widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 */
if ( ! function_exists( 'hongo_widgets_init' ) ) {
    function hongo_widgets_init() {

        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'hongo' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Place widgets to show in your sidebar', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-uppercase"><span>',
            'after_title'   => '</span></div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mini Header Left Sidebar', 'hongo' ),
            'id'            => 'mini-header-left-sidebar',
            'description'   => __( 'Place widgets to show in your mini header left side', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mini Header Center Sidebar', 'hongo' ),
            'id'            => 'mini-header-center-sidebar',
            'description'   => __( 'Place widgets to show in your mini header center side', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mini Header Right Sidebar', 'hongo' ),
            'id'            => 'mini-header-right-sidebar',
            'description'   => __( 'Place widgets to show in your mini header right side', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Center Logo Mini Header Left', 'hongo' ),
            'id'            => 'center-logo-mini-header-left',
            'description'   => __( 'Place widgets to show in your center logo mini header left side', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Search Sidebar', 'hongo' ),
            'id'            => 'hongo-search-sidebar',
            'description'   => __( 'Place widgets to show in your search sidebar', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'My Account Sidebar', 'hongo' ),
            'id'            => 'hongo-my-account-sidebar',
            'description'   => __( 'Place widgets to show in your my account sidebar', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Wishlist Sidebar', 'hongo' ),
            'id'            => 'hongo-wishlist-sidebar',
            'description'   => __( 'Place widgets to show in your wishlist sidebar', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Push Menu Sidebar', 'hongo' ),
            'id'            => 'slide-menu-sidebar',
            'description'   => __( 'Place widgets to show in your header push menu', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Hamburger Menu Bottom Sidebar', 'hongo' ),
            'id'            => 'hamburger-menu-sidebar',
            'description'   => __( 'Place widgets to show in your hamburger menu at bottom', 'hongo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        /* if WooCommerce plugin is activated */
        if( hongo_is_woocommerce_activated() ) {

            register_sidebar( array(
                'name'          => __( 'Mini Cart Sidebar', 'hongo' ),
                'id'            => 'hongo-mini-cart',
                'description'   => __( 'Place widgets to show in your mini cart sidebar', 'hongo' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title">',
                'after_title'   => '</div>',
            ) );
            register_sidebar( array(
                'name'          => __( 'Shop Sidebar', 'hongo' ),
                'id'            => 'hongo-shop-1',
                'description'   => __( 'Place widgets to show in your shop pages sidebar', 'hongo' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title alt-font">',
                'after_title'   => '</div>',
            ) );
            register_sidebar( array(
                'name'          => __( 'Shop Top Filter Sidebar', 'hongo' ),
                'id'            => 'hongo-shop-top',
                'description'   => __( 'Place widgets to show in your shop top filter sidebar', 'hongo' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title alt-font">',
                'after_title'   => '</div>',
            ) );
        }

        register_sidebar( array(
            'name'          => __( 'Products Carousel Sidebar', 'hongo' ),
            'id'            => 'products-widget-carousel-1',
            'description'   => __( 'Place widgets to show in your products carousel sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Products Slider 1', 'hongo' ),
            'id'            => 'products-widget-slider-1',
            'description'   => __( 'Place widgets to show in your products slider sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Products Slider 2', 'hongo' ),
            'id'            => 'products-widget-slider-2',
            'description'   => __( 'Place widgets to show in your products slider sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Products Slider 3', 'hongo' ),
            'id'            => 'products-widget-slider-3',
            'description'   => __( 'Place widgets to show in your products slider sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mega Menu 1', 'hongo' ),
            'id'            => 'hongo-mega-menu-1',
            'description'   => __( 'Place widgets to show in your mega menu sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mega Menu 2', 'hongo' ),
            'id'            => 'hongo-mega-menu-2',
            'description'   => __( 'Place widgets to show in your mega menu sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mega Menu 3', 'hongo' ),
            'id'            => 'hongo-mega-menu-3',
            'description'   => __( 'Place widgets to show in your mega menu sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Mega Menu 4', 'hongo' ),
            'id'            => 'hongo-mega-menu-4',
            'description'   => __( 'Place widgets to show in your mega menu sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Top 1', 'hongo' ),
            'id'            => 'footer-top-left',
            'description'   => __( 'Place widgets to show in your footer top 1 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Top 2', 'hongo' ),
            'id'            => 'footer-top-center',
            'description'   => __( 'Place widgets to show in your footer top 2 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Top 3', 'hongo' ),
            'id'            => 'footer-top-right',
            'description'   => __( 'Place widgets to show in your footer top 3 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 1', 'hongo' ),
            'id'            => 'footer-middle-column-1',
            'description'   => __( 'Place widgets to show in your footer middle column 1 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 2', 'hongo' ),
            'id'            => 'footer-middle-column-2',
            'description'   => __( 'Place widgets to show in your footer middle column 2 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 3', 'hongo' ),
            'id'            => 'footer-middle-column-3',
            'description'   => __( 'Place widgets to show in your footer middle column 3 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 4', 'hongo' ),
            'id'            => 'footer-middle-column-4',
            'description'   => __( 'Place widgets to show in your footer middle column 4 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 5', 'hongo' ),
            'id'            => 'footer-middle-column-5',
            'description'   => __( 'Place widgets to show in your footer middle column 5 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 6', 'hongo' ),
            'id'            => 'footer-middle-column-6',
            'description'   => __( 'Place widgets to show in your footer middle column 6 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 7', 'hongo' ),
            'id'            => 'footer-middle-column-7',
            'description'   => __( 'Place widgets to show in your footer middle column 7 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 8', 'hongo' ),
            'id'            => 'footer-middle-column-8',
            'description'   => __( 'Place widgets to show in your footer middle column 8 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 9', 'hongo' ),
            'id'            => 'footer-middle-column-9',
            'description'   => __( 'Place widgets to show in your footer middle column 9 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 10', 'hongo' ),
            'id'            => 'footer-middle-column-10',
            'description'   => __( 'Place widgets to show in your footer middle column 10 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 11', 'hongo' ),
            'id'            => 'footer-middle-column-11',
            'description'   => __( 'Place widgets to show in your footer middle column 11 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 12', 'hongo' ),
            'id'            => 'footer-middle-column-12',
            'description'   => __( 'Place widgets to show in your footer middle column 12 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 13', 'hongo' ),
            'id'            => 'footer-middle-column-13',
            'description'   => __( 'Place widgets to show in your footer middle column 13 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 14', 'hongo' ),
            'id'            => 'footer-middle-column-14',
            'description'   => __( 'Place widgets to show in your footer middle column 14 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 15', 'hongo' ),
            'id'            => 'footer-middle-column-15',
            'description'   => __( 'Place widgets to show in your footer middle column 15 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Middle 16', 'hongo' ),
            'id'            => 'footer-middle-column-16',
            'description'   => __( 'Place widgets to show in your footer middle column 16 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Bottom 1', 'hongo' ),
            'id'            => 'footer-bottom-left',
            'description'   => __( 'Place widgets to show in your footer bottom 1 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Bottom 2', 'hongo' ),
            'id'            => 'footer-bottom-center',
            'description'   => __( 'Place widgets to show in your footer bottom 2 sidebar', 'hongo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font">',
            'after_title'   => '</div>',
        ) );
    }
}
add_action( 'widgets_init', 'hongo_widgets_init' );

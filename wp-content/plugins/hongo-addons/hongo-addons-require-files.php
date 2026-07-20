<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; } 

    // For Import
    require_once( HONGO_ADDONS_IMPORT . '/importer.php' ); 

    require_once( HONGO_ADDONS_ROOT . '/lib/hongo-addons-excerpt.php' );
    require_once( HONGO_ADDONS_ROOT . '/lib/hongo-addons-extra-functions.php' );
    require_once( HONGO_ADDONS_ROOT . '/lib/hongo-addons-meta.php' );
    require_once( HONGO_ADDONS_ROOT . '/lib/customizer/hongo-addons-customizer.php' );

    if( hongo_is_woocommerce_activated() ) {

        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-core-functions.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-woocommerce-global-functions.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-woocommerce-extra-functions.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-ajax-functions.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-template-functions.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-template-hooks.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-hook-filters.php' );
    }

    /* For meta box */
    require_once( HONGO_ADDONS_ROOT.'/meta-box/meta-box.php' );

    /* For Navigation Menus */
    require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/hamburger-menu/hamburger-menu.php' );
    require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/left-menu/left-menu.php' );
    require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/mega-menu/mega-menu.php' );
    require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/shop-menu/shop-menu.php' );

    /* For shortcodes */
    require_once( HONGO_ADDONS_ROOT.'/hongo-shortcodes/hongo-shortcode-addons.php' );

    /* For Widgets */
    require_once( HONGO_ADDONS_WIDGET.'/hongo-custom-menu-widget.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-latest-post.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-social-bar.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-instagram.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-about-me.php' );            
    require_once( HONGO_ADDONS_WIDGET.'/hongo-contact-information.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-newsletter.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-twitter.php' );
    require_once( HONGO_ADDONS_WIDGET.'/hongo-search.php' );

    /* For Extend Options */
    require_once( HONGO_ADDONS_ROOT.'/extend-options/extend-options.php' );

    /* Enqueue scripts and styles. */
    require_once( HONGO_ADDONS_ROOT . '/lib/hongo-addons-enqueue-scripts-styles.php' );

    if( hongo_is_woocommerce_activated() ) {

        require_once( HONGO_ADDONS_ROOT.'/woocommerce/hongo-woocommerce-meta.php' ); // For Alternative Image
        require_once( HONGO_ADDONS_ROOT.'/woocommerce/hongo-brand-functions.php' ); // For WooCommerce Brands
        require_once( HONGO_ADDONS_ROOT.'/woocommerce/hongo-catalog-mode-functions.php' ); // For WooCommerce Catalog Mode
        require_once( HONGO_ADDONS_ROOT.'/woocommerce/hongo-login-to-see-mode-functions.php' ); // For Login to see price mode
        require_once( HONGO_ADDONS_ROOT.'/woocommerce/hongo-variation-swatch.php' ); // For WooCommerce Variation Swatches
        require_once( HONGO_ADDONS_WIDGET.'/hongo-product-category.php' ); // Product Categories widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-product-carousel.php' ); // Product Carousel widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-brand-widget.php' ); // Brand Widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-brand-slider.php' ); // Brand Slider Widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-account-menu.php' ); // For Account Menu Link 
        require_once( HONGO_ADDONS_WIDGET.'/hongo-wishlist.php' ); // For Wishlist
        require_once( HONGO_ADDONS_WIDGET.'/hongo-wishlist-link.php' );  // For Wishlist Menu Link
        require_once( HONGO_ADDONS_WIDGET.'/hongo-filter-taxonomy-widget.php' ); // For Woocommerce Widgets
        require_once( HONGO_ADDONS_WIDGET.'/hongo-product-list-slider.php' ); // Product list slider widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-custom-text.php' ); // Custom text widget
        require_once( HONGO_ADDONS_WIDGET.'/hongo-product-category-thumbnail.php' ); // Product category with thumbnail image

        /* WooCommerce override widgets */
        require_once( HONGO_ADDONS_WIDGET.'/extend-widgets/hongo-widget-color-attribute.php' ); // Product attribute override widget
        require_once( HONGO_ADDONS_WIDGET.'/extend-widgets/hongo-widget-active-filters.php' ); // Product active filter override widget
    }
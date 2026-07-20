<?php
/**
 * Generate css for theme base color.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_base_color = get_theme_mod( 'hongo_base_color', '' );

	// Mobile Menu Breakpoint
	$hongo_enable_header_general 		 = hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
	$hongo_header_section 				 = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );
	$hongo_header_mobile_menu_breakpoint = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_breakpoint' );
	$hongo_header_mobile_menu_breakpoint = ! empty( $hongo_header_mobile_menu_breakpoint ) ? $hongo_header_mobile_menu_breakpoint : '991';
	$hongo_header_min_width_breakpoint   = ( $hongo_header_mobile_menu_breakpoint + 1 ) . 'px';
	$hongo_header_mobile_menu_breakpoint = $hongo_header_mobile_menu_breakpoint . 'px';
?>	

	/* Ipad menu icon breakpoint */
	@media screen and (min-width: <?php echo sprintf( '%s', $hongo_header_min_width_breakpoint ); ?>) and (max-width: 1199px) {
        header .hongo-ipad-icon .nav>li { text-align: right; padding-right: 18px; }
        header .hongo-ipad-icon .nav>li > a { padding: 25px 0 25px 18px; display: inline-block }
        header .hongo-ipad-icon .nav>li:last-child>a { padding-right: 0; }
        header .hongo-ipad-icon .nav>li:first-child>a { padding-left: 0; }
        header .hongo-ipad-icon .nav>li i.dropdown-toggle { display: inline; position: absolute; top: 50%; margin-top: -13px; float: right; padding: 7px 10px; z-index: 1; }
        header .hongo-ipad-icon .nav>li.simple-dropdown i.dropdown-toggle { margin-left: 0; right: -12px; }
	}
	/* Mobile menu breakpoint */
	@media (min-width: <?php echo sprintf( '%s', $hongo_header_min_width_breakpoint ); ?>) {

		header .widget_nav_menu > div:nth-child(2n) { display: block !important; }
		header .widget_nav_menu > div:nth-child(2n) { display: block !important; }
		.hongo-shop-dropdown-menu .navbar-nav > li > a, .hongo-shop-dropdown-menu .navbar-nav > li:first-child > a, .hongo-shop-dropdown-menu .navbar-nav > li:last-child > a { padding: 17px 20px;}
		header .with-categories-navigation-menu .woocommerce.widget_shopping_cart .hongo-cart-top-counter { line-height: 59px; }
		header .with-categories-navigation-menu .widget_hongo_search_widget, header .with-categories-navigation-menu .widget_hongo_account_menu_widget, header .with-categories-navigation-menu .widget_shopping_cart, header .with-categories-navigation-menu .widget_hongo_wishlist_link_widget { line-height: 59px; min-height: 59px; }
		header .with-categories-navigation-menu .woocommerce.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter { top: 13px; }
		.simple-menu-open .simple-menu{ overflow: visible !important;}
	}

	@media (max-width: <?php echo sprintf( '%s', $hongo_header_mobile_menu_breakpoint ); ?>) {

		header .with-categories-navigation-menu .woocommerce.widget_shopping_cart .hongo-cart-top-counter { line-height: 70px; }
		header .with-categories-navigation-menu .widget_hongo_search_widget, header .with-categories-navigation-menu .widget_hongo_account_menu_widget, header .with-categories-navigation-menu .widget_shopping_cart, header .with-categories-navigation-menu .widget_hongo_wishlist_link_widget { line-height: 69px; min-height: 69px; }
		header .with-categories-navigation-menu .woocommerce.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter { top: 20px; }

		/* navbar toggle */
	    .navbar-toggle { background-color: transparent !important; border: none; border-radius: 0; padding: 0; font-size: 18px; position: relative; top: -8px; right: 0; display: inline-block !important; margin:0; float: none !important; vertical-align: middle; }
	    .navbar-toggle .icon-bar { background-color: #232323; display: table }
        .sr-only { border: 0; clip: rect(0,0,0,0); height: auto; line-height: 16px; padding: 0 0 0 5px; overflow: visible; margin: 0; width: auto; float: right; clear: none; display:table; position: relative; font-size: 12px; color: #232323; text-transform: uppercase; left: 0; top: -2px; font-weight: 500; letter-spacing: .5px; cursor: pointer; }
        .navbar-toggle.toggle-mobile .icon-bar+.icon-bar { margin-top: 0; }
        .navbar-toggle.toggle-mobile span { position: absolute; margin: 0; display: block; height: 2px; width: 16px; background-color: #232323; border-radius: 0; opacity: 1; margin: 0 0 3px 0; -webkit-transform: rotate(0deg); -moz-transform: rotate(0deg); -o-transform: rotate(0deg); transform: rotate(0deg); -webkit-transition: .25s ease-in-out; -moz-transition: .25s ease-in-out; -o-transition: .25s ease-in-out; transition: .25s ease-in-out; }
        .navbar-toggle.toggle-mobile { width: 16px; height: 14px; top: -1px }
        .navbar-toggle.toggle-mobile span:last-child { margin-bottom: 0;}
        .navbar-toggle.toggle-mobile span:nth-child(1) { top: 0px; }
        .navbar-toggle.toggle-mobile span:nth-child(2), .navbar-toggle.toggle-mobile span:nth-child(3) { top: 5px; }
        .navbar-toggle.toggle-mobile span:nth-child(4) { top: 10px; }
        .navbar-toggle.toggle-mobile span:nth-child(2) { opacity: 0;}
        .navbar-toggle.toggle-mobile.active span:nth-child(2) { opacity: 1;}
        .navbar-toggle.toggle-mobile.active span:nth-child(1) { top: 8px; width: 0; left: 0; right: 0; opacity: 0; }
        .navbar-toggle.toggle-mobile.active span:nth-child(2) { -webkit-transform: rotate(45deg); -moz-transform: rotate(45deg); -o-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: rotate(45deg); }
        .navbar-toggle.toggle-mobile.active span:nth-child(3) { -webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -o-transform: rotate(-45deg); -ms-transform: rotate(-45deg); transform: rotate(-45deg); }
        .navbar-toggle.toggle-mobile.active span:nth-child(4) { top: 8px; width: 0; left: 0; right: 0; opacity: 0; }
	    
	    /* navigation */
	    .navbar-collapse.collapse { display: none !important; height: auto!important; width: 100%; margin: 0; position: absolute; top: 100%; }
	    .navbar-collapse.collapse.in { display: block !important; overflow-y: hidden !important; }
	    .navbar-collapse { max-height: 400px; overflow-y: hidden !important; left: 0; padding: 0; position: absolute; top: 100%; width: 100%; border-top: 0; } 
	    header .nav { float: none !important; padding-left: 0; padding-right: 0; margin: 0px 0; width: 100%; text-align: left; background-color: rgba(23,23,23,1) !important; }
	    header .nav > li { position: relative; display: block; margin: 0; border-bottom: 1px solid rgba(255,255,255,0.06);  }
	    header .nav > li ul.menu { margin: 5px 0; float: left; width: 100%;}
	    header .nav > li ul.menu > li:last-child > a { border-bottom: 0; }
	    header .nav > li > a > i { top: 4px; min-width: 12px; }
	    header .nav > li > a, header .nav > li:first-child > a, header .nav > li:last-child > a, header .with-categories-navigation-menu .nav > li > a { display: block; width: 100%; border-bottom: 0 solid #e0e0e0; padding: 14px 15px 15px; }
	    header .nav > li > a, header .nav > li:hover > a, header .nav > li > a:hover { color: #fff;}
	    header .nav > li > a.active, header .nav > li.active > a, header .nav > li.current-menu-ancestor > a, header .nav > li.current-menu-item > a, header .nav > li.current-menu-item > a  { color: rgba(255,255,255,0.6);}   
	    header .nav > li:first-child > a { border-top: none; }
	    header .nav > li i.dropdown-toggle { position: absolute; right: 0; top: 0; color: #fff; font-size: 16px; cursor: pointer; display: block; padding: 16px 14px 16px; }
            header .hongo-ipad-icon .nav > li i.dropdown-toggle { color: #fff;}
	    header .nav > li.open i.dropdown-toggle:before { content: "\f106"; }
	    header .nav > li > a .menu-hover-line:after { display: none;}
	    header .nav > li ul.menu li, header .nav>li ul.menu li.menu-title { margin: 0; padding: 0 15px;}
	    header .nav > li ul.menu li a { line-height: 22px; padding: 7px 0 8px; margin-bottom: 0; border-bottom: 1px solid rgba(255,255,255,0.06);}
	    header .nav .mega-menu-main-wrapper, .simple-dropdown .simple-menu, ul.sub-menu { position: static !important; height: 0 !important; width: 100% !important; left: inherit !important; right: inherit !important; padding: 0 !important; }
	    ul.sub-menu { opacity: 1 !important; visibility: visible !important;}
	    .mega-menu-main-wrapper section { padding: 0 !important; left: 0 !important; margin: 0 !important; width: 100% !important; }
	    header .container { width: 100%; }
	    .mega-menu-main-wrapper { opacity: 1 !important; visibility: visible !important;}
	    header .header-main-wrapper > div > section.hongo-stretch-content-fluid { padding: 0; }
	    header .mini-header-main-wrapper > div > section.hongo-stretch-content-fluid { padding: 0; }
	    header .top-header-main-wrapper > div > section.hongo-stretch-content-fluid { padding: 0;}
	    .hongo-shop-dropdown-menu .nav > li i.dropdown-toggle { display: none}
	    .hongo-shop-dropdown-menu .nav { background-color: transparent !important}
	    .hongo-navigation-main-wrapper .hongo-tab.panel { max-height: 400px; overflow-y: auto !important; width: 100%;}
	    .mega-menu-main-wrapper .container { padding: 0;}
	    .simple-dropdown .simple-menu ul.sub-menu { padding: 0 15px !important;}
	    .simple-dropdown ul.sub-menu > li > ul.sub-menu { top: 0; left: 0 }
	    .simple-dropdown ul.sub-menu>li>a { color: #fff; font-size: 13px; }
	    .simple-dropdown ul.sub-menu>li ul.sub-menu { margin-bottom: 10px; }
	    .simple-dropdown ul.sub-menu>li ul.sub-menu>li:last-child a { border-bottom: 0}
	    .simple-dropdown ul.sub-menu>li>ul.sub-menu { padding-left: 0 !important; padding-right: 0 !important;  }
	    .simple-dropdown ul.sub-menu>li>ul.sub-menu>li>a { color: #8d8d8d; font-size: 12px; padding: 10px 0 11px 0; }
	    .simple-dropdown ul.sub-menu>li>ul.sub-menu>li.active > a, .simple-dropdown ul.sub-menu>li>ul.sub-menu>li.current-menu-item > a, .simple-dropdown ul.sub-menu>li>ul.sub-menu>li.current-menu-ancestor > a { color: #fff;}
	    .simple-dropdown ul.sub-menu li a { padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.06); }
	    .simple-dropdown ul.sub-menu li > a i.ti-angle-right { display: none;}
	    .simple-dropdown.open .simple-menu, header .nav > li.open > .mega-menu-main-wrapper, ul.sub-menu { height: auto !important; opacity: 1; visibility: visible; overflow: visible;}
	    .simple-dropdown ul.sub-menu li:last-child > ul > li:last-child > a { border-bottom: 0;}
	    header .header-main-wrapper .woocommerce.widget_shopping_cart .hongo-cart-top-counter { top: 2px; }
	    .header-default-wrapper .simple-dropdown ul.sub-menu li.menu-item > ul { display: block; }
	    header .nav>li ul.menu li .left-icon, header .nav>li .simple-menu ul li .left-icon { top: -1px; position: relative;}
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item>a { padding: 12px 0 13px;}
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item>span { line-height: 43px;}
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a { padding: 6px 0 6px 10px; }   
	    .menu-content-inner-wrap ul .menu-item .dropdown-menu .menu-item .dropdown-menu .menu-item a { padding: 4px 15px; }


	    /* ---- left menu style  ---- */
	    /* left menu */
	    .hongo-main-wrap { padding-left: 0; }
	    .hongo-main-wrap header { left: -290px; transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -o-transition: all 0.2s ease-in-out; }
	    .hongo-main-wrap header.left-mobile-menu-open { left: 0; transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -o-transition: all 0.2s ease-in-out;}
	    .hongo-main-wrap header .header-logo-wrapper { position: fixed; left: 0; top: 0; width: 100%; z-index: 1; text-align: left; background-color: #fff; padding: 20px 15px;}
	    .hongo-left-menu-wrap .navbar-toggle { position: fixed; right: 16px; top: 25px; z-index: 9; margin: 0;}    
	    .hongo-left-menu-wrap .navbar-toggle.sr-only { right: 40px; top: 27px; z-index: 9; cursor: pointer; margin: 0; width: -webkit-fit-content; width: -moz-fit-content; width: fit-content; height: auto; clip: inherit;  padding: 0; text-align: right; left: inherit;}
	    .hongo-left-menu-wrap .toggle-mobile ~ .navbar-toggle.sr-only {top: 24px; }
	    .header-left-wrapper .hongo-left-menu-wrapper { margin-top: 10px; margin-bottom: 50px; }
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item { z-index: 0}
	    .nav.hongo-left-menu { background-color: transparent !important;}
	    .header-left-wrapper > .container { width: 290px; padding: 65px 20px 50px 20px !important; }
	    .header-left-wrapper .widget_hongo_search_widget a, .header-left-wrapper .hongo-cart-top-counter i, header .header-left-wrapper .widget a, header .header-left-wrapper .widget_hongo_wishlist_link_widget a { font-size: 15px; }
	    header .header-left-wrapper .widget { margin-left: 8px; margin-right: 8px; }
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item i { color: #232323;}
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item a:hover { color: #000;}
	    .hongo-left-menu-wrapper .hongo-left-menu li.menu-item.dropdown > a { width: auto;}
	    
	    /* top logo */
	    .hongo-navigation-main-wrapper { width: auto; }
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab { display: block;}
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper { width: 100%; left: 0; position: absolute; top: 100%; max-height: 460px; }
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab { list-style: none; margin: 0; padding: 0; text-align: center;}
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab li { display: inline-block; width: 50%;}
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab li > a { background-color: #000; width: 100%; padding: 20px 10px; display: block; color: #fff; font-size: 13px; text-transform: uppercase;}
	    .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab li > a:hover, .hongo-navigation-main-wrapper .hongo-woocommerce-tabs-wrapper ul.navigation-tab li.active > a { background-color: rgba(23,23,23,1); }
	    .hongo-navigation-main-wrapper .hongo-shop-dropdown-menu, .hongo-navigation-main-wrapper .hongo-shop-dropdown-menu.hongo-tab.panel { width: 100%; margin: 0;}
	    .hongo-navigation-main-wrapper .hongo-tab.panel { padding: 0; margin: 0; display: none; }
	    .hongo-navigation-main-wrapper .hongo-tab.panel.active { display: block;}
	    .hongo-navigation-main-wrapper .hongo-tab .shop-dropdown-toggle { display: none;}
	    .hongo-navigation-main-wrapper .hongo-tab .hongo-shop-dropdown-button-menu { top: 0; height: auto !important; overflow: visible; position: inherit; background-color: rgba(23,23,23,1); border: 0 solid #e5e5e5; margin: 0; padding: 0; min-height: 1px; transform: rotateX(0deg); -webkit-transform: rotateX(0deg); -moz-transform: rotateX(0deg); -ms-transform: rotateX(0deg); -o-transform: rotateX(0deg); }
	    .header-common-wrapper .hongo-shop-dropdown-menu .navbar-nav > li { border-bottom: 1px solid rgba(255,255,255,0.06); }
	    .header-common-wrapper .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li > a, .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li > a:hover, .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li.on > a { color: #fff; }
	    .hongo-shop-dropdown-menu li.menu-item .shop-mega-menu-wrapper, .hongo-shop-dropdown-menu .navbar-nav > li > a:after, .hongo-shop-dropdown-menu .simple-dropdown .sub-menu { display: none !important;}
	    .header-common-wrapper .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li > a:hover, .header-common-wrapper .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li.on > a { background-color: rgba(23,23,23,1) !important; color: #fff; }
	    .header-sticky .hongo-navigation-main-wrapper .hongo-shop-dropdown-menu.hongo-tab.panel { position: relative;  width: 100%; margin: 0;}
    	.header-sticky .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu { width: 100%; left: 0; }
    	header .nav > li > a > img.menu-link-icon, .hongo-shop-dropdown-menu .menu-item.menu-title img.menu-link-icon, .hongo-shop-dropdown-menu .menu-item img.menu-link-icon {  -webkit-filter: brightness(200%); filter: brightness(200%);}
    	.header-main-wrapper .nav > li ul.menu li.menu-title, header .nav>li .wpb_wrapper ul.menu:first-child li.menu-title { padding: 7px 0 8px; margin: 0 15px; width: calc(100% - 30px); border-bottom: 1px solid rgba(255,255,255,0.06);}
    	.header-main-wrapper .nav > li ul.menu li.menu-title a, header .nav > li .wpb_wrapper ul.menu:first-child li.menu-title a { line-height: 22px; padding: 0; margin: 0; border-bottom: 0 solid rgba(255,255,255,0.06);}

    	/* navigation edit */
    	.edit-hongo-section { display: none}
    	.mega-menu-main-wrapper .widget .widget-title { line-height: 22px; padding: 5px 0 6px; margin:0 15px 0; }
    	.widget_product_categories_thumbnail ul, .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget { margin-top: 0; }
    	.widget_product_categories_thumbnail ul li { margin:0 15px 0; width: auto; float: none;}
    	.widget_product_categories_thumbnail ul li a { line-height: 22px; padding: 5px 0 6px; margin-bottom: 0; font-size: 12px; text-align: left; color: #8d8d8d; font-weight: 400; display: block; position: relative; left: 0; }
    	.mega-menu-main-wrapper .widget { margin: 10px 0; float: left; width: 100%;}
    	.mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li, .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li:last-child { margin:0 15px 10px !important; width: auto; float: none;}

    	/* mini header widget */
    	.mini-header-main-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu a > i, header .mini-header-main-wrapper a.wishlist-link > i, .mini-header-main-wrapper .widget div > a > i { top: -2px; }

    	/* default navigation */
    	.header-default-wrapper.navbar-default .accordion-menu { position: inherit;}
    	.header-default-wrapper.navbar-default .navbar-nav>li { width: 100%; }
    	.header-default-wrapper.navbar-default .navbar-nav>li>a { color: #fff; }
    	.header-default-wrapper.navbar-default .navbar-nav>li>ul>li>a, .header-default-wrapper.navbar-default .simple-dropdown ul.sub-menu>li>ul.sub-menu>li>a, .header-default-wrapper.navbar-default .navbar-nav>li>a:hover, .header-default-wrapper.navbar-default .navbar-nav>li:hover>a, .header-default-wrapper.navbar-default .navbar-nav>li>a.active, .header-default-wrapper.navbar-default .navbar-nav>li.urrent-menu-ancestor>a, .header-default-wrapper.navbar-default .navbar-nav>li.current_page_ancestor>a{color:#fff;}
    	.header-default-wrapper.navbar-default .navbar-nav>li>ul>li:last-child a { border:0;}
    	.header-default-wrapper.navbar-default .simple-dropdown ul.sub-menu { display: block; padding: 0 15px !important; }
    	.header-default-wrapper.navbar-default .navbar-collapse.collapse.in { overflow-y: auto !important; }
    	.header-default-wrapper.navbar-default .simple-dropdown ul.sub-menu li.menu-item-has-children:before { display: none;}

    	/* mini header menu */
    	header .widget_nav_menu { position: relative; }
		header .widget_nav_menu .wp-nav-menu-responsive-button { display: block !important; position: relative; border-left: 1px solid #cbc9c7; min-height: 37px !important; line-height: 37px !important; padding: 2px 14px 0; font-size: 11px; text-transform: uppercase; font-weight: 500; color: #232323; }
		header .widget_nav_menu .wp-nav-menu-responsive-button:hover { color: #000; }
		header .widget_nav_menu .active .wp-nav-menu-responsive-button { background-color: #fff; color: #f57250; }
		header .widget_nav_menu .wp-nav-menu-responsive-button:after { content: "\e604"; font-family: 'simple-line-icons'; margin-left: 5px; border: 0; font-weight: 900; font-size: 9px; }
		header .widget_nav_menu.active .wp-nav-menu-responsive-button:after { content: "\e607"; }
		header .widget_nav_menu>div:nth-child(2n) { display: none; width: 160px; background-color: rgba(28, 28, 28, 1); padding: 0; margin: 0; border-top: 0; position: absolute; right: 0; left: inherit; top: 100%; }
		header .widget_nav_menu>div:nth-child(2n) .menu { padding: 0; text-align: left; }
		header .widget_nav_menu>div:nth-child(2n) .menu li { padding: 0; border-bottom: 1px solid rgba(0, 0, 0, 0.1); width: 100%; float: left; margin: 0; }
		header .widget_nav_menu>div:nth-child(2n) .menu li:last-child>a { border-bottom: 0; }
		header .widget_nav_menu>div:nth-child(2n) .menu li a { color: #8d8d8d; padding: 8px 10px; line-height: normal; display: block; border-bottom: 1px solid rgba(255, 255, 255, 0.1); position: relative; font-size: 11px; text-transform: uppercase; font-weight: 400; outline: none; }
		header .widget_nav_menu>div:nth-child(2n) .menu li:after { display: none; }
		header .widget_nav_menu>div:nth-child(2n) .widget.active>a { background-color: #fff; color: #f57250; }
	}

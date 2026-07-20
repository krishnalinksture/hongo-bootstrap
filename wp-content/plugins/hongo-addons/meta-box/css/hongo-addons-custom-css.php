<?php
/**
 * Generate css.
 *
 * @package Hongo
 */
?>
<?php

$hongo_enable_mini_header_general = hongo_builder_customize_option( 'hongo_enable_mini_header_general', '1' );
$hongo_enable_header_general = hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
$hongo_enable_footer_general = hongo_builder_customize_option( 'hongo_enable_footer_general', '1' );

$hongo_mini_header_section = hongo_builder_option( 'hongo_mini_header_section', '', $hongo_enable_mini_header_general );

$hongo_header_top_section = hongo_builder_option( 'hongo_header_top_section', '', $hongo_enable_header_general );

$hongo_header_section = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );

$hongo_footer_section = hongo_builder_option( 'hongo_footer_section', '', $hongo_enable_footer_general );

/* Mini Header Settings */
if ( $hongo_mini_header_section ) {

    // Mini Header Font and Color
    $hongo_mini_header_bg = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_bg' );
    $hongo_mini_header_text_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_text_color' );
    $hongo_mini_header_text_border_color = hongo_hex2rgb ( $hongo_mini_header_text_color );
    $hongo_mini_header_text_hover_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_text_hover_color' );
    $hongo_mini_header_text_hover_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_text_hover_bg_color' );
    $hongo_mini_header_font_size = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_font_size' );
    $hongo_mini_header_line_height = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_line_height' );
    $hongo_mini_header_letter_spacing = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_letter_spacing' );
    $hongo_mini_header_text_transform = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_text_transform' );
    $hongo_mini_header_cart_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_cart_bg_color' );
    $hongo_mini_header_cart_text_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_cart_text_color' );

    // Sticky Mini Header Font and Color
    $hongo_mini_header_sticky_bg = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_sticky_bg' );
    $hongo_sticky_mini_header_text_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_sticky_mini_header_text_color' );
    $hongo_sticky_mini_header_text_hover_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_sticky_mini_header_text_hover_color' );
    $hongo_sticky_mini_header_text_hover_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_sticky_mini_header_text_hover_bg_color' );
    $hongo_sticky_mini_header_cart_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_sticky_mini_header_cart_bg_color' );
    $hongo_sticky_mini_header_cart_text_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_sticky_mini_header_cart_text_color' );

    // Mini Header Submenu Font and Color
    $hongo_mini_header_submenu_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_bg_color' );
    $hongo_mini_header_submenu_text_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_text_color' );
    $hongo_mini_header_submenu_text_hover_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_text_hover_color' );
    $hongo_mini_header_submenu_font_size = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_font_size' );
    $hongo_mini_header_submenu_line_height = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_line_height' );
    $hongo_mini_header_submenu_letter_spacing = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_letter_spacing' );
    $hongo_mini_header_submenu_text_transform = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_submenu_text_transform' );

    // Mini Header Mobile Menu Color
    $hongo_mini_header_mobile_menu_bg_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_mobile_menu_bg_color' );
    $hongo_mini_header_mobile_menu_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_mobile_menu_color' );
    $hongo_mini_header_mobile_menu_hover_color = hongo_post_meta_by_id( $hongo_mini_header_section, 'hongo_mini_header_mobile_menu_hover_color' );
}

/* Top Header Settings */
if ( $hongo_header_top_section ) {

    // Top Header Font and Color
    $hongo_top_header_bg = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_bg' );
    $hongo_top_header_text_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_text_color' );
    $hongo_top_header_text_hover_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_text_hover_color' );
    $hongo_top_header_font_size = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_font_size' );
    $hongo_top_header_line_height = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_line_height' );
    $hongo_top_header_letter_spacing = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_letter_spacing' );
    $hongo_top_header_text_transform = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_text_transform' );
    $hongo_top_header_cart_bg_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_cart_bg_color' );
    $hongo_top_header_cart_text_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_cart_text_color' );

    // Sticky Top Header Font and Color
    $hongo_top_header_sticky_bg = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_sticky_bg' );
    $hongo_sticky_top_header_text_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_sticky_top_header_text_color' );
    $hongo_sticky_top_header_text_hover_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_sticky_top_header_text_hover_color' );
    $hongo_sticky_top_header_cart_bg_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_sticky_top_header_cart_bg_color' );
    $hongo_sticky_top_header_cart_text_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_sticky_top_header_cart_text_color' );

    // Top Header Submenu Font and Color
    $hongo_top_header_submenu_bg_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_bg_color' );
    $hongo_top_header_submenu_text_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_text_color' );
    $hongo_top_header_submenu_text_hover_color = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_text_hover_color' );
    $hongo_top_header_submenu_font_size = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_font_size' );
    $hongo_top_header_submenu_line_height = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_line_height' );
    $hongo_top_header_submenu_letter_spacing = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_letter_spacing' );
    $hongo_top_header_submenu_text_transform = hongo_post_meta_by_id( $hongo_header_top_section, 'hongo_top_header_submenu_text_transform' );

}

/* Header Settings */
if ( $hongo_header_section ) {

    // Header Font and Color
    $hongo_header_bg = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_bg' );
    $hongo_header_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_text_color' );
    $hongo_header_text_hover_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_text_hover_color' );
    $hongo_header_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_font_size' );
    $hongo_header_line_height = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_line_height' );
    $hongo_header_letter_spacing = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_letter_spacing' );
    $hongo_header_text_transform = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_text_transform' );
    $hongo_header_menu_icon_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_menu_icon_font_size' );
    $hongo_header_icon_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_icon_font_size' );
    $hongo_header_icon_line_height = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_icon_line_height' );
    $hongo_header_cart_bg_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_cart_bg_color' );
    $hongo_header_cart_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_cart_text_color' );
    $hongo_header_box_shadow_enable = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_box_shadow_enable' );
    $hongo_header_box_shadow_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_box_shadow_color' );

    // Sticky Header Font and Color
    $hongo_header_sticky_bg = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_sticky_bg' );
    $hongo_sticky_header_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_text_color' );
    $hongo_sticky_header_text_hover_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_text_hover_color' );
    $hongo_sticky_header_cart_bg_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_cart_bg_color' );
    $hongo_sticky_header_icon_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_icon_font_size' );
    $hongo_sticky_header_icon_line_height = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_icon_line_height' );
    $hongo_sticky_header_cart_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_cart_text_color' );
    $hongo_sticky_header_box_shadow_enable = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_box_shadow_enable' );
    $hongo_sticky_header_box_shadow_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_sticky_header_box_shadow_color' );

    // Submenu Font and Color
    $hongo_header_submenu_bg_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_bg_color' );
    $hongo_header_submenu_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_text_color' );
    $hongo_header_submenu_text_hover_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_text_hover_color' );
    $hongo_header_submenu_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_font_size' );
    $hongo_header_submenu_line_height = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_line_height' );
    $hongo_header_submenu_letter_spacing = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_letter_spacing' );
    $hongo_header_submenu_text_transform = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_text_transform' );
    $hongo_header_submenu_font_weight = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_font_weight' );
    $hongo_header_submenu_icon_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_icon_font_size' );

    // Submenu Heading Font and Color
    $hongo_header_submenu_heading_text_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_text_color' );
    $hongo_header_submenu_heading_text_hover_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_text_hover_color' );
    $hongo_header_submenu_heading_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_font_size' );
    $hongo_header_submenu_heading_line_height = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_line_height' );
    $hongo_header_submenu_heading_letter_spacing = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_letter_spacing' );
    $hongo_header_submenu_heading_text_transform = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_text_transform' );
    $hongo_header_submenu_heading_icon_font_size = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_submenu_heading_icon_font_size' );

    // Mobile Menu Color
    $hongo_header_mobile_menu_bg_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_bg_color' );
    $hongo_header_mobile_menu_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_color' );
    $hongo_header_mobile_menu_hover_color = hongo_post_meta_by_id( $hongo_header_section, 'hongo_header_mobile_menu_hover_color' );
}

/* Footer Settings */
if ( $hongo_footer_section ) {

    // Footer Widget Title Font and Color
    $hongo_footer_widget_text_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_widget_text_color' );
    $hongo_footer_widget_font_size = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_widget_font_size' );
    $hongo_footer_widget_line_height = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_widget_line_height' );
    $hongo_footer_widget_letter_spacing = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_widget_letter_spacing' );
    $hongo_footer_widget_text_transform = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_widget_text_transform' );

    // Footer Font and Color
    $hongo_footer_text_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_text_color' );
    $hongo_footer_text_border_color = hongo_hex2rgb ( $hongo_footer_text_color );
    $hongo_footer_text_hover_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_text_hover_color' );
    $hongo_footer_font_size = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_font_size' );
    $hongo_footer_line_height = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_line_height' );
    $hongo_footer_letter_spacing = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_letter_spacing' );
    $hongo_footer_text_transform = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_text_transform' );

    // Footer Newsletter Font and Color
    $hongo_footer_newsletter_background_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_background_color' );
    $hongo_footer_newsletter_border_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_border_color' );
    $hongo_footer_newsletter_place_text_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_place_text_color' );
    $hongo_footer_newsletter_text_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_text_color' );
    $hongo_footer_newsletter_button_text_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_button_text_color' );
    $hongo_footer_newsletter_button_hover_color = hongo_post_meta_by_id( $hongo_footer_section, 'hongo_footer_newsletter_button_hover_color' );
}
?>

<?php if ( $hongo_mini_header_section ) { /* If Mini Header Selected */ ?>

    <?php /* Mini Header Font and Color Start */ ?>
        <?php if( $hongo_mini_header_bg ) : ?>
        /* Mini Header Background */
        .mini-header-main-wrapper > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_mini_header_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_text_color ) : ?>
        /* Mini Header Text Color */
        .mini-header-main-wrapper .widget.widget_text, header .mini-header-main-wrapper .widget.widget_text a, .mini-header-main-wrapper .widget_nav_menu .menu li > a, header .mini-header-main-wrapper a.header-search-form, header .mini-header-main-wrapper a.account-menu-link, header .mini-header-main-wrapper a.wishlist-link, .mini-header-main-wrapper .widget.widget_shopping_cart , header .mini-header-main-wrapper .widget_hongo_social_widget ul li a, .mini-header-main-wrapper a.wp-nav-menu-responsive-button, .mini-header-main-wrapper .hongo-social-links a, .mini-header-main-wrapper .text-block-content, .mini-header-main-wrapper .text-block-content a, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown a, header .mini-header-main-wrapper .woocommerce-currency-switcher-form .dd-selected { color: <?php echo esc_html( $hongo_mini_header_text_color ); ?>; }
        .mini-header-main-wrapper .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_mini_header_text_color ); ?>; }
        .mini-header-main-wrapper .widget_nav_menu .menu li:after { background-color: <?php echo esc_html( $hongo_mini_header_text_border_color ); ?>; }
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget, .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget, .mini-header-main-wrapper .widget.widget_hongo_search_widget, header .mini-header-main-wrapper .woocommerce.widget_shopping_cart, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown a, header .mini-header-main-wrapper .widget-woocommerce-currency-switcher .dd-container .dd-selected, .mini-header-main-wrapper .widget_nav_menu .wp-nav-menu-responsive-button { border-color: <?php echo esc_html( $hongo_mini_header_text_border_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_text_hover_color ) : ?>
        /* Mini Header Text Hover Color */
        header .mini-header-main-wrapper .widget.widget_text a:hover, header .mini-header-main-wrapper .widget_nav_menu .menu li a:hover, header .mini-header-main-wrapper .widget div > a:hover, header .mini-header-main-wrapper .widget div:hover > a, header .mini-header-main-wrapper .widget.widget_shopping_cart:hover, header .mini-header-main-wrapper a.account-menu-link:hover, header .mini-header-main-wrapper a.wishlist-link:hover, header .mini-header-main-wrapper a.header-search-form:hover, header .mini-header-main-wrapper .widget_hongo_social_widget ul li a:hover, .mini-header-main-wrapper a.wp-nav-menu-responsive-button:hover, .mini-header-main-wrapper .hongo-social-links a:hover, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown a:hover, header .mini-header-main-wrapper .woocommerce-currency-switcher-form .dd-selected:hover, header .mini-header-main-wrapper .widget-woocommerce-currency-switcher .dd-container:hover .dd-selected, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a, .mini-header-main-wrapper .widget_nav_menu .menu > li:hover > a, .mini-header-main-wrapper .widget_nav_menu .menu > li.current-page-ancestor > a, .mini-header-main-wrapper .widget_nav_menu .menu > li.current-menu-ancestor > a, .mini-header-main-wrapper .widget_nav_menu .menu > li.current_page_ancestor > a, .mini-header-main-wrapper .widget_nav_menu .menu > li.current-menu-item > a { color: <?php echo esc_html( $hongo_mini_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_text_hover_bg_color ) : ?>
        /* Mini Header Text Hover Background Color */
        header .mini-header-main-wrapper .woocommerce.widget_shopping_cart:hover, header .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget a:hover, header .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a:hover, header .mini-header-main-wrapper .widget.widget_hongo_search_widget a:hover, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown a.wpml-ls-link:hover, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a, header .mini-header-main-wrapper .widget-woocommerce-currency-switcher .dd-container:hover .dd-selected, header .mini-header-main-wrapper .widget_hongo_account_menu_widget > div:hover > a { background-color: <?php echo esc_html( $hongo_mini_header_text_hover_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_font_size ) : ?>
        /* Mini Header Text Font Size */
        .mini-header-main-wrapper .widget.widget_text, header .mini-header-main-wrapper .widget.widget_text a, .mini-header-main-wrapper .widget_nav_menu .menu li > a, .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget a i, .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a, header .mini-header-main-wrapper .widget.widget_hongo_search_widget a, header .mini-header-main-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, header .mini-header-main-wrapper .widget_hongo_social_widget ul li a, header .mini-header-main-wrapper .hongo-social-links ul li a { font-size: <?php echo esc_html( $hongo_mini_header_font_size ); ?>; }
        .mini-header-main-wrapper .widget_nav_menu .menu li:after { height: <?php echo esc_html( $hongo_mini_header_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_line_height ) : ?>
        /* Mini Header Text Line Height */
        .mini-header-main-wrapper .widget.widget_text, header .mini-header-main-wrapper .widget.widget_text a, .mini-header-main-wrapper .widget_nav_menu .menu li > a, .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget a i, .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a i, header .mini-header-main-wrapper .widget.widget_hongo_search_widget a i, header .mini-header-main-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, header .mini-header-main-wrapper .widget_hongo_social_widget ul li a, header .mini-header-main-wrapper .hongo-social-links ul li a { line-height: <?php echo esc_html( $hongo_mini_header_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_letter_spacing ) : ?>
        /* Mini Header Text Letter Spacing */
        .mini-header-main-wrapper .widget.widget_text, header .mini-header-main-wrapper .widget.widget_text a, .mini-header-main-wrapper .widget_nav_menu .menu li > a, header .mini-header-main-wrapper .widget_hongo_social_widget ul li a, header .mini-header-main-wrapper .hongo-social-links ul li a { letter-spacing: <?php echo esc_html( $hongo_mini_header_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_text_transform ) : ?>
        /* Mini Header Text Transform */
        .mini-header-main-wrapper .widget.widget_text, header .mini-header-main-wrapper .widget.widget_text a, .mini-header-main-wrapper .widget_nav_menu .menu li > a { text-transform: <?php echo esc_html( $hongo_mini_header_text_transform ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_cart_bg_color ) : ?>
        /* Mini Header Cart Counter Bg Color */
        header .mini-header-main-wrapper .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { background-color: <?php echo esc_html( $hongo_mini_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_cart_text_color ) : ?>
        /* Mini Header Cart Counter Text Color */
        .mini-header-main-wrapper .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, .mini-header-main-wrapper .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { color: <?php echo esc_html( $hongo_mini_header_cart_text_color ); ?>; }
        <?php endif; ?>
    <?php /* Mini Header Font and Color End */ ?>

    <?php /* Sticky Mini Header Font and Color Start */ ?>
        <?php if( $hongo_mini_header_sticky_bg ) : ?>
        /* Sticky Mini Header Background */
        .mini-header-main-wrapper.sticky-appear > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_mini_header_sticky_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_sticky_mini_header_text_color ) : ?>
        /* Sticky Mini Header Text Color */
        .mini-header-main-wrapper.sticky-appear .widget.widget_text, header .mini-header-main-wrapper.sticky-appear .widget.widget_text a, .mini-header-main-wrapper.sticky-appear .widget_nav_menu .menu li > a, header .mini-header-main-wrapper.sticky-appear a.header-search-form, header .mini-header-main-wrapper.sticky-appear a.account-menu-link, header .mini-header-main-wrapper.sticky-appear a.wishlist-link, .mini-header-main-wrapper.sticky-appear .widget.widget_shopping_cart , header .mini-header-main-wrapper.sticky-appear .widget_hongo_social_widget ul li a, .mini-header-main-wrapper.sticky-appear a.wp-nav-menu-responsive-button, .mini-header-main-wrapper.sticky-appear .hongo-social-links a, .mini-header-main-wrapper.sticky-appear .text-block-content, .mini-header-main-wrapper.sticky-appear .text-block-content a, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown a, header .mini-header-main-wrapper.sticky-appear .woocommerce-currency-switcher-form .dd-selected { color: <?php echo esc_html( $hongo_sticky_mini_header_text_color ); ?>; }
        .mini-header-main-wrapper.sticky-appear .widget_nav_menu .menu li:after, .mini-header-main-wrapper.sticky-appear .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_sticky_mini_header_text_color ); ?>; }
        .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_account_menu_widget, .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget, .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_search_widget, .mini-header-main-wrapper.sticky-appear .widget.widget_shopping_cart, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown a, header .mini-header-main-wrapper.sticky-appear .widget-woocommerce-currency-switcher .dd-container .dd-selected , .mini-header-main-wrapper.sticky-appear .widget_nav_menu .wp-nav-menu-responsive-button { border-color: <?php echo esc_html( $hongo_sticky_mini_header_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_mini_header_text_hover_color ) : ?>
        /* Sticky Mini Header Text Hover Color */
        header .mini-header-main-wrapper.sticky-appear .widget.widget_text a:hover, header .mini-header-main-wrapper.sticky-appear .widget_nav_menu .menu li a:hover, header .mini-header-main-wrapper.sticky-appear .widget div > a:hover, header .mini-header-main-wrapper.sticky-appear .widget div:hover > a, header .mini-header-main-wrapper.sticky-appear .widget.widget_shopping_cart:hover, header .mini-header-main-wrapper.sticky-appear a.account-menu-link:hover, header .mini-header-main-wrapper.sticky-appear a.wishlist-link:hover, header .mini-header-main-wrapper.sticky-appear a.header-search-form:hover, header .mini-header-main-wrapper.sticky-appear .widget_hongo_social_widget ul li a:hover, .mini-header-main-wrapper.sticky-appear a.wp-nav-menu-responsive-button:hover, .mini-header-main-wrapper.sticky-appear .hongo-social-links a:hover, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown a:hover, header .mini-header-main-wrapper.sticky-appear .woocommerce-currency-switcher-form .dd-selected:hover, header .mini-header-main-wrapper.sticky-appear .widget-woocommerce-currency-switcher .dd-container:hover .dd-selected, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a { color: <?php echo esc_html( $hongo_sticky_mini_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_mini_header_text_hover_bg_color ) : ?>
        /* Mini Header Text Hover Background Color */
        header .mini-header-main-wrapper.sticky-appear .woocommerce.widget_shopping_cart:hover, header .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_account_menu_widget a:hover, header .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget a:hover, header .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_search_widget a:hover, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown a.wpml-ls-link:hover, header .mini-header-main-wrapper.sticky-appear .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a, header .mini-header-main-wrapper.sticky-appear .widget-woocommerce-currency-switcher .dd-container:hover .dd-selected, header .mini-header-main-wrapper.sticky-appear .widget_hongo_account_menu_widget > div:hover > a { background-color: <?php echo esc_html( $hongo_sticky_mini_header_text_hover_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_mini_header_cart_bg_color ) : ?>
        /* Sticky Mini Header Cart Counter Bg Color */
        header .mini-header-main-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { background-color: <?php echo esc_html( $hongo_sticky_mini_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_mini_header_cart_text_color ) : ?>
        /* Sticky Mini Header Cart Counter Text Color */
        .mini-header-main-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, .mini-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { color: <?php echo esc_html( $hongo_sticky_mini_header_cart_text_color ); ?>; }
        <?php endif; ?>
    <?php /* Sticky Mini Header Font and Color End */ ?>

    <?php /* Mini Header Submenu Font and Color Start */ ?>
        <?php if( $hongo_mini_header_submenu_bg_color ) : ?>
        /* Mini Header Submenu Background Color */
        header .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul, header .mini-header-main-wrapper .simple-dropdown ul.sub-menu, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, header .mini-header-main-wrapper .woocommerce-currency-switcher-form ul.dd-options, .mini-header-main-wrapper .widget_nav_menu .menu li ul, .mini-header-main-wrapper section { background-color: <?php echo esc_html( $hongo_mini_header_submenu_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_text_color ) : ?>
        /* Mini Header Submenu Text Color */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-sub-menu li a.wpml-ls-link, header .mini-header-main-wrapper .dd-desc, header .woocommerce-currency-switcher-form ul.dd-options li a label, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a { color: <?php echo esc_html( $hongo_mini_header_submenu_text_color ); ?>; }
        header .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-sub-menu li, header .mini-header-main-wrapper .woocommerce-currency-switcher-form ul.dd-options li a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li { border-bottom-color: <?php echo esc_html( $hongo_mini_header_submenu_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_text_hover_color ) : ?>
        /* Mini Header Submenu Text Hover Color */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a:hover, .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a.active, .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li.current-menu-ancestor>a, .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li.current-menu-item>a, header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-sub-menu li a.wpml-ls-link:hover,  header .mini-header-main-wrapper .wpml-ls-legacy-dropdown .wpml-ls-sub-menu li a:hover, header .mini-header-main-wrapper .woocommerce-currency-switcher-form a.dd-option:hover .dd-desc, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a:hover, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a.active, .mini-header-main-wrapper .widget_nav_menu .menu li ul li.current-menu-ancestor>a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li.current-menu-item>a { color: <?php echo esc_html( $hongo_mini_header_submenu_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_font_size ) : ?>
        /* Mini Header Submenu Text Font Size */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a { font-size: <?php echo esc_html( $hongo_mini_header_submenu_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_line_height ) : ?>
        /* Mini Header Submenu Text Line Height */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a { line-height: <?php echo esc_html( $hongo_mini_header_submenu_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_letter_spacing ) : ?>
        /* Mini Header Submenu Text Letter Spacing */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a { letter-spacing: <?php echo esc_html( $hongo_mini_header_submenu_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_mini_header_submenu_text_transform ) : ?>
        /* Mini Header Submenu Text Transform */
        .mini-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .mini-header-main-wrapper .widget_nav_menu .menu li ul li a { text-transform: <?php echo esc_html( $hongo_mini_header_submenu_text_transform ); ?>; }
        <?php endif; ?>
    <?php /* Mini Header Submenu Font and Color End */ ?>

    <?php /* Mini Header Mobile Menu Color Start */ ?>

        <?php if( $hongo_mini_header_mobile_menu_bg_color ) : ?>
        /* Mini Header Mobile Menu Text Color */
        @media (max-width: 991px) { .mini-header-main-wrapper .widget_nav_menu > div:nth-child(2n) { background-color: <?php echo esc_html( $hongo_mini_header_mobile_menu_bg_color ); ?>; border-color: <?php echo esc_html( $hongo_mini_header_mobile_menu_bg_color ); ?>; } }
        <?php endif; ?>

        <?php if( $hongo_mini_header_mobile_menu_color ) : ?>
        /* Mini Header Mobile Menu Text Color */
        @media (max-width: 991px) { .mini-header-main-wrapper .widget_nav_menu > div:nth-child(2n) .menu li a { color: <?php echo esc_html( $hongo_mini_header_mobile_menu_color ); ?>; } }
        <?php endif; ?>

        <?php if( $hongo_mini_header_mobile_menu_hover_color ) : ?>
        /* Mini Header Mobile Menu Hover Color */
        @media (max-width: 991px) { .mini-header-main-wrapper .widget_nav_menu > div:nth-child(2n) .menu li a:hover { color: <?php echo esc_html( $hongo_mini_header_mobile_menu_hover_color ); ?>; } }
        <?php endif; ?>
    <?php /* Mini Header Mobile Menu Color End */ ?>
<?php
}

if ( $hongo_header_top_section ) { /* If Top Header Selected */ ?>

    <?php /* Top Header Font and Color Start */ ?>
        <?php if( $hongo_top_header_bg ) : ?>
        /* Top Header Background */
        .top-header-main-wrapper > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_top_header_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_top_header_text_color ) : ?>
        /* Header Text Color */
        .top-header-main-wrapper .widget.widget_text, header .top-header-main-wrapper .widget.widget_text a, .top-header-main-wrapper .widget_nav_menu .menu li > a, header .top-header-main-wrapper a.header-search-form, header .top-header-main-wrapper a.account-menu-link, header .top-header-main-wrapper a.wishlist-link, .top-header-main-wrapper .widget.widget_shopping_cart , header .top-header-main-wrapper .widget_hongo_social_widget ul li a, .top-header-main-wrapper a.wp-nav-menu-responsive-button, .top-header-main-wrapper .hongo-social-links a, .top-header-main-wrapper .text-block-content{ color: <?php echo esc_html( $hongo_top_header_text_color ); ?>; }
        .top-header-main-wrapper .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_top_header_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_text_hover_color ) : ?>
        /* Top Header Text Hover Color */
        header .top-header-main-wrapper .widget.widget_text a:hover, header .top-header-main-wrapper .widget_nav_menu .menu li a:hover, header .top-header-main-wrapper .widget div > a:hover, header .top-header-main-wrapper .widget div:hover > a, header .top-header-main-wrapper .widget.widget_shopping_cart:hover, header .top-header-main-wrapper a.account-menu-link:hover, header .top-header-main-wrapper a.wishlist-link:hover, header .top-header-main-wrapper a.header-search-form:hover, header .top-header-main-wrapper .widget_hongo_social_widget ul li a:hover, .top-header-main-wrapper a.wp-nav-menu-responsive-button:hover, .top-header-main-wrapper .hongo-social-links a:hover { color: <?php echo esc_html( $hongo_top_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_font_size ) : ?>
        /* Top Header Text Font Size */
        .top-header-main-wrapper .widget.widget_text, header .top-header-main-wrapper .widget.widget_text a, .top-header-main-wrapper .widget_nav_menu .menu li > a, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget a i, .top-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a, header .top-header-main-wrapper .widget.widget_hongo_search_widget a, header .top-header-main-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, header .top-header-main-wrapper .widget_hongo_social_widget ul li a, header .top-header-main-wrapper .hongo-social-links ul li a { font-size: <?php echo esc_html( $hongo_top_header_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_line_height ) : ?>
        /* Top Header Text Line Height */
        .top-header-main-wrapper .widget.widget_text, header .top-header-main-wrapper .widget.widget_text a, .top-header-main-wrapper .widget_nav_menu .menu li > a, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget a i, .top-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a, header .top-header-main-wrapper .widget.widget_hongo_search_widget a, header .top-header-main-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, header .top-header-main-wrapper .widget_hongo_social_widget ul li a, header .top-header-main-wrapper .hongo-social-links ul li a { line-height: <?php echo esc_html( $hongo_top_header_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_letter_spacing ) : ?>
        /* Top Header Text Letter Spacing */
        .top-header-main-wrapper .widget.widget_text, header .top-header-main-wrapper .widget.widget_text a, .top-header-main-wrapper .widget_nav_menu .menu li > a, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget a i, .top-header-main-wrapper .widget.widget_hongo_wishlist_link_widget a, header .top-header-main-wrapper .widget.widget_hongo_search_widget a, header .top-header-main-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, header .top-header-main-wrapper .widget_hongo_social_widget ul li a, header .top-header-main-wrapper .hongo-social-links ul li a { letter-spacing: <?php echo esc_html( $hongo_top_header_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_text_transform ) : ?>
        /* Top Header Text Transform */
        .top-header-main-wrapper .widget.widget_text, header .top-header-main-wrapper .widget.widget_text a, .top-header-main-wrapper .widget_nav_menu .menu li > a { text-transform: <?php echo esc_html( $hongo_top_header_text_transform ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_cart_bg_color ) : ?>
        /* Mini Header Cart Counter Bg Color */
        header .top-header-main-wrapper .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .top-header-main-wrapper .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { background-color: <?php echo esc_html( $hongo_top_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_cart_text_color ) : ?>
        /* Top Header Cart Counter Text Color */
        .top-header-main-wrapper .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, .top-header-main-wrapper .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { color: <?php echo esc_html( $hongo_top_header_cart_text_color ); ?>; }
        <?php endif; ?>
    <?php /* Top Header Font and Color End */ ?>

    <?php /* Sticky Top Header Font and Color Start */ ?>
        <?php if( $hongo_top_header_sticky_bg ) : ?>
        /* Sticky Top Header Background */
        .top-header-main-wrapper.sticky-appear > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_top_header_sticky_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_sticky_top_header_text_color ) : ?>
        /* Sticky Top Header Text Color */
        .top-header-main-wrapper.sticky-appear .widget.widget_text, header .top-header-main-wrapper.sticky-appear .widget.widget_text a, .top-header-main-wrapper.sticky-appear .widget_nav_menu .menu li > a, header .top-header-main-wrapper.sticky-appear a.header-search-form, header .top-header-main-wrapper.sticky-appear a.account-menu-link, header .top-header-main-wrapper.sticky-appear a.wishlist-link, .top-header-main-wrapper.sticky-appear .widget.widget_shopping_cart , header .top-header-main-wrapper.sticky-appear .widget_hongo_social_widget ul li a, .top-header-main-wrapper.sticky-appear a.wp-nav-menu-responsive-button, .top-header-main-wrapper.sticky-appear .hongo-social-links a, .top-header-main-wrapper.sticky-appear .text-block-content { color: <?php echo esc_html( $hongo_sticky_top_header_text_color ); ?>; }
        .top-header-main-wrapper.sticky-appear .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_sticky_top_header_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_top_header_text_hover_color ) : ?>
        /* Sticky Top Header Text Hover Color */
        header .top-header-main-wrapper.sticky-appear .widget.widget_text a:hover, header .top-header-main-wrapper.sticky-appear .widget_nav_menu .menu li a:hover, header .top-header-main-wrapper.sticky-appear .widget div > a:hover, header .top-header-main-wrapper.sticky-appear .widget div:hover > a, header .top-header-main-wrapper.sticky-appear .widget.widget_shopping_cart:hover, header .top-header-main-wrapper.sticky-appear a.account-menu-link:hover, header .top-header-main-wrapper.sticky-appear a.wishlist-link:hover, header .top-header-main-wrapper.sticky-appear a.header-search-form:hover, header .top-header-main-wrapper.sticky-appear .widget_hongo_social_widget ul li a:hover, .top-header-main-wrapper.sticky-appear a.wp-nav-menu-responsive-button:hover, .top-header-main-wrapper.sticky-appear .hongo-social-links a:hover { color: <?php echo esc_html( $hongo_sticky_top_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_top_header_cart_bg_color ) : ?>
        /* Sticky Mini Header Cart Counter Bg Color */
        header .top-header-main-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .top-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { background-color: <?php echo esc_html( $hongo_sticky_top_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_top_header_cart_text_color ) : ?>
        /* Top Header Cart Counter Text Color */
        .top-header-main-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, .top-header-main-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { color: <?php echo esc_html( $hongo_sticky_top_header_cart_text_color ); ?>; }
        <?php endif; ?>
    <?php /* Sticky Top Header Font and Color End */ ?>

    <?php /* Top Header Submenu Font and Color Start */ ?>
        <?php if( $hongo_top_header_submenu_bg_color ) : ?>
        /* Mini Header Submenu Background Color */
        header .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul, header .top-header-main-wrapper .simple-dropdown ul.sub-menu, .top-header-main-wrapper section { background-color: <?php echo esc_html( $hongo_top_header_submenu_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_text_color ) : ?>
        /* Top Header Submenu Text Color */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { color: <?php echo esc_html( $hongo_top_header_submenu_text_color ); ?>; }
        header .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { border-bottom-color: <?php echo esc_html( $hongo_top_header_submenu_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_text_hover_color ) : ?>
        /* Top Header Submenu Text Hover Color */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a:hover, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a.active, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li.current-menu-ancestor>a, .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li.current-menu-item>a { color: <?php echo esc_html( $hongo_top_header_submenu_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_font_size ) : ?>
        /* Top Header Submenu Text Font Size */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { font-size: <?php echo esc_html( $hongo_top_header_submenu_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_line_height ) : ?>
        /* Top Header Submenu Text Line Height */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { line-height: <?php echo esc_html( $hongo_top_header_submenu_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_letter_spacing ) : ?>
        /* Top Header Submenu Text Letter Spacing */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { letter-spacing: <?php echo esc_html( $hongo_top_header_submenu_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_top_header_submenu_text_transform ) : ?>
        /* Top Header Submenu Text Transform */
        .top-header-main-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul li a { text-transform: <?php echo esc_html( $hongo_top_header_submenu_text_transform ); ?>; }
        <?php endif; ?>

    <?php /* Top Header Submenu Font and Color End */ ?>

<?php
}

if ( $hongo_header_section ) { /* If Header Selected */ ?>

    <?php /* Header Font and Color Start */ ?>
        <?php if( $hongo_header_bg ) : ?>
        /* Header Background */
        .header-common-wrapper > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_header_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_header_text_color ) : ?>
        /* Header Text Color */
        .header-common-wrapper .nav > li > a, header .hongo-ipad-icon .nav>li i.dropdown-toggle, header .header-common-wrapper a.header-search-form, header .header-common-wrapper a.account-menu-link, header .header-common-wrapper a.wishlist-link, .header-common-wrapper .widget_shopping_cart, .header-common-wrapper .navbar-toggle .sr-only, .header-common-wrapper .hongo-section-heading, .header-common-wrapper .hongo-section-heading a, .header-common-wrapper .hongo-social-links a, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu > li > span i.ti-angle-down, .header-common-wrapper .hongo-section-heading { color: <?php echo esc_html( $hongo_header_text_color ); ?>; }
        .header-common-wrapper .navbar-toggle .icon-bar , .header-common-wrapper .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_header_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_text_hover_color ) : ?>
        /* Header Text Hover Color */
        .header-common-wrapper .nav > li > a:hover, .header-common-wrapper .nav > li:hover > a, header .header-common-wrapper .widget.widget_shopping_cart:hover, header .header-common-wrapper a.account-menu-link:hover, header .header-common-wrapper a.wishlist-link:hover, header .header-common-wrapper a.header-search-form:hover, .header-common-wrapper .nav > li > a.active, .header-common-wrapper .nav > li.active > a, .header-common-wrapper .nav > li.current-menu-ancestor > a, .header-common-wrapper .nav > li.current-menu-item > a, .header-common-wrapper .widget.widget_hongo_search_widget:hover  > div > a, .header-common-wrapper .widget.widget_hongo_wishlist_link_widget:hover > div > a, .header-common-wrapper .widget.widget_hongo_account_menu_widget:hover > div > a, .header-common-wrapper .widget.widget_shopping_cart:hover, .header-common-wrapper .hongo-section-heading a:hover, .header-common-wrapper .hongo-social-links a:hover, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu > li.menu-item.on > span .ti-angle-down:before, .header-common-wrapper .nav > li.on > a { color: <?php echo esc_html( $hongo_header_text_hover_color ); ?>; }
        .header-common-wrapper .navbar-toggle:hover .icon-bar, .header-common-wrapper .header-menu-button .navbar-toggle:hover span { background-color: <?php echo esc_html( $hongo_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_font_size ) : ?>
        /* Header Text Font Size */
        .header-common-wrapper .nav > li > a, .header-common-wrapper .widget_nav_menu .menu li > a, .header-common-wrapper .widget.widget_hongo_account_menu_widget a i, .header-common-wrapper .widget.widget_hongo_wishlist_link_widget a, header .header-common-wrapper .widget.widget_hongo_search_widget a, header .header-common-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, .header-common-wrapper .hongo-section-heading, .header-common-wrapper .hongo-section-heading a, .header-common-wrapper .hongo-social-links a, .header-left-wrapper .hongo-cart-top-counter i, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu > li > span i { font-size: <?php echo esc_html( $hongo_header_font_size ); ?>; }
        @media (max-width: 991px) { header .header-common-wrapper .nav > li i.dropdown-toggle { font-size: <?php echo esc_html( $hongo_header_font_size ); ?>; } }
        <?php endif; ?>

        <?php if( $hongo_header_line_height ) : ?>
        /* Header Text Line Height */
        .header-common-wrapper .nav > li > a, .header-common-wrapper .widget_nav_menu .menu li > a, .header-common-wrapper .widget.widget_hongo_account_menu_widget a i, .header-common-wrapper .widget.widget_hongo_wishlist_link_widget a, header .header-common-wrapper .widget.widget_hongo_search_widget a, header .header-common-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, .header-common-wrapper .hongo-section-heading, .header-common-wrapper .hongo-section-heading a { line-height: <?php echo esc_html( $hongo_header_line_height ); ?>; }
        @media (max-width: 991px) { header .header-common-wrapper .nav > li i.dropdown-toggle { line-height: <?php echo esc_html( $hongo_header_line_height ); ?>; } }
        <?php endif; ?>

        <?php if( $hongo_header_letter_spacing ) : ?>
        /* Header Text Letter Spacing */
        .header-common-wrapper .nav > li > a, .header-common-wrapper .widget_nav_menu .menu li > a, .header-common-wrapper .widget.widget_hongo_account_menu_widget a i, .header-common-wrapper .widget.widget_hongo_wishlist_link_widget a, header .header-common-wrapper .widget.widget_hongo_search_widget a, header .header-common-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, .header-common-wrapper .hongo-section-heading, .header-common-wrapper .hongo-section-heading a, .header-common-wrapper .hongo-section-heading a { letter-spacing: <?php echo esc_html( $hongo_header_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_text_transform ) : ?>
        /* Header Text Transform */
        .header-common-wrapper .nav > li > a, .header-common-wrapper .widget_nav_menu .menu li > a, .header-common-wrapper .widget.widget_hongo_account_menu_widget a i, .header-common-wrapper .widget.widget_hongo_wishlist_link_widget a, header .header-common-wrapper .widget.widget_hongo_search_widget a, header .header-common-wrapper .widget.widget_shopping_cart .hongo-cart-top-counter, .header-common-wrapper .hongo-section-heading, .header-common-wrapper .hongo-section-heading a { text-transform: <?php echo esc_html( $hongo_header_text_transform ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_menu_icon_font_size ) : ?>
        /* Header Menu Icon Font Size */
        .header-common-wrapper .nav > li > a > i { font-size: <?php echo esc_html( $hongo_header_menu_icon_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_icon_font_size ) : ?>
        /* Header Icon Font Size */
        header .widget_hongo_search_widget a, header .widget_hongo_account_menu_widget a, header .widget_shopping_cart, header .widget_hongo_wishlist_link_widget a, header .woocommerce.widget_shopping_cart, .header-left-wrapper .widget_hongo_search_widget a, .header-left-wrapper .hongo-cart-top-counter i, header .header-left-wrappe .widget_hongo_account_menu_widget a, header .header-left-wrapper .widget_hongo_wishlist_link_widget a, header .header-left-wrapper .widget_hongo_account_menu_widget a { font-size: <?php echo esc_html( $hongo_header_icon_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_icon_line_height ) : ?>
        /* Header Icon Line Height */
        header .widget_hongo_search_widget, header .widget_hongo_account_menu_widget, header .widget_shopping_cart, header .widget_hongo_wishlist_link_widget, header .header-left-wrapper .widget_hongo_search_widget, header .header-left-wrapper .widget, header .header-left-wrapper .widget_shopping_cart, header .header-left-wrapper .widget_hongo_wishlist_link_widget, header .header-left-wrapper .woocommerce.widget_shopping_cart .hongo-cart-top-counter { line-height: <?php echo esc_html( $hongo_header_icon_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_cart_bg_color ) : ?>
        /* Header Cart Counter Bg Color */
        header .woocommerce.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .widget_hongo_wishlist_link_widget .hongo-wishlist-counter-wrap span { background-color: <?php echo esc_html( $hongo_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_cart_text_color ) : ?>
        /* Header Cart Counter Text Color */
        header .woocommerce.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .widget_hongo_wishlist_link_widget .hongo-wishlist-counter-wrap span { color: <?php echo esc_html( $hongo_header_cart_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_box_shadow_enable == '0' ) : ?>
        /* Enable Header Box Shadow */
        header .header-common-wrapper > div > section { box-shadow: none; }
        <?php endif; ?>

        <?php if( $hongo_header_box_shadow_color && $hongo_header_box_shadow_enable != '0' ) : ?>
        /* Header Box Shadow Color */
        header .header-common-wrapper > div > section { -webkit-box-shadow: 0px 1px <?php echo esc_html( $hongo_header_box_shadow_color ); ?>; -moz-box-shadow: 0px 1px <?php echo esc_html( $hongo_header_box_shadow_color ); ?>; box-shadow: 0px 1px <?php echo esc_html( $hongo_header_box_shadow_color ); ?>; }
        <?php endif; ?>
    <?php /* Header Font and Color End */ ?>

    <?php /* Sticky Header Font and Color Start */ ?>
        <?php if( $hongo_header_sticky_bg ) : ?>
        /* Sticky Header Background */
        .header-common-wrapper.sticky-appear > .container > section:first-of-type { background-color: <?php echo esc_html( $hongo_header_sticky_bg ); ?>!important; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_text_color ) : ?>
        /* Sticky Header Text Color */
        .header-common-wrapper.sticky-appear .nav > li > a, header .header-common-wrapper.sticky-appear a.header-search-form, header .header-common-wrapper.sticky-appear a.account-menu-link, header .header-common-wrapper.sticky-appear a.wishlist-link, .header-common-wrapper.sticky-appear .widget.widget_shopping_cart, .header-common-wrapper.sticky-appear .navbar-toggle .sr-only { color: <?php echo esc_html( $hongo_sticky_header_text_color ); ?>; }
        
        .header-common-wrapper.sticky-appear .navbar-toggle .icon-bar , .header-common-wrapper.sticky-appear .header-menu-button .navbar-toggle span { background-color: <?php echo esc_html( $hongo_sticky_header_text_color ); ?>; }

        .header-common-wrapper.sticky-appear .hongo-section-heading, .header-common-wrapper.sticky-appear .hongo-section-heading a, .header-common-wrapper.sticky-appear .hongo-section-heading { color: <?php echo esc_html( $hongo_sticky_header_text_color ); ?> !important; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_text_hover_color ) : ?>
        /* Sticky Header Text Hover Color */
        .header-common-wrapper.sticky-appear .nav > li > a:hover, .header-common-wrapper.sticky-appear .nav > li:hover > a, header .header-common-wrapper.sticky-appear .widget.widget_shopping_cart:hover, header .header-common-wrapper.sticky-appear a.account-menu-link:hover, header .header-common-wrapper.sticky-appear a.wishlist-link:hover, header .header-common-wrapper.sticky-appear a.header-search-form:hover, .header-common-wrapper.sticky-appear .nav > li > a.active, .header-common-wrapper.sticky-appear .nav > li.active > a, .header-common-wrapper.sticky-appear .nav > li.current-menu-ancestor > a, .header-common-wrapper.sticky-appear .nav > li.current-menu-item > a, .header-common-wrapper.sticky-appear .nav > li.current-menu-item > a, .header-common-wrapper.sticky-appear .widget.widget_hongo_search_widget:hover  > div > a, .header-common-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget:hover > div > a, .header-common-wrapper.sticky-appear .widget.widget_hongo_account_menu_widget:hover > div > a, .header-common-wrapper.sticky-appear .widget.widget_shopping_cart:hover, .header-common-wrapper.sticky-appear .hongo-section-heading a:hover{ color: <?php echo esc_html( $hongo_sticky_header_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_icon_font_size ) : ?>
        /* Sticky Header Icon Font Size */
        header .widget_hongo_search_widget a, header .widget_hongo_account_menu_widget a, header .widget_shopping_cart, header .widget_hongo_wishlist_link_widget a, header .woocommerce.widget_shopping_cart, .header-left-wrapper .widget_hongo_search_widget a, .header-left-wrapper .hongo-cart-top-counter i, header .header-left-wrappe .widget_hongo_account_menu_widget a, header .header-left-wrapper .widget_hongo_wishlist_link_widget a, header .header-left-wrapper .widget_hongo_account_menu_widget a { font-size: <?php echo esc_html( $hongo_sticky_header_icon_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_icon_line_height ) : ?>
        /* Sticky Header Icon Line Height */
        header .widget_hongo_search_widget, header .widget_hongo_account_menu_widget, header .widget_shopping_cart, header .widget_hongo_wishlist_link_widget, header .header-left-wrapper .widget_hongo_search_widget, header .header-left-wrapper .widget, header .header-left-wrapper .widget_shopping_cart, header .header-left-wrapper .widget_hongo_wishlist_link_widget, header .header-left-wrapper .woocommerce.widget_shopping_cart .hongo-cart-top-counter { line-height: <?php echo esc_html( $hongo_sticky_header_icon_line_height ); ?>; }
        <?php endif; ?>


        <?php if( $hongo_sticky_header_cart_bg_color ) : ?>
        /* Sticky Header Cart Counter Bg Color */
        header .header-common-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, header .header-common-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { background-color: <?php echo esc_html( $hongo_sticky_header_cart_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_cart_text_color ) : ?>
        /* Sticky Header Cart Counter Text Color */
        .header-common-wrapper.sticky-appear .widget.widget_shopping_cart .hongo-top-cart-wrapper .hongo-mini-cart-counter, .header-common-wrapper.sticky-appear .widget.widget_hongo_wishlist_link_widget .hongo-top-wishlist-link .hongo-wishlist-counter { color: <?php echo esc_html( $hongo_sticky_header_cart_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_box_shadow_enable == '0' ) : ?>
        /* Sticky Enable Header Box Shadow */
        header .header-common-wrapper.sticky-appear > div > section { box-shadow: none; }
        <?php endif; ?>

        <?php if( $hongo_sticky_header_box_shadow_color && $hongo_sticky_header_box_shadow_enable != '0' ) : ?>
        /* Sticky Header Box Shadow Color */
        header .header-common-wrapper.sticky-appear > div > section { -webkit-box-shadow: 0px 1px <?php echo esc_html( $hongo_sticky_header_box_shadow_color ); ?>; -moz-box-shadow: 0px 1px <?php echo esc_html( $hongo_sticky_header_box_shadow_color ); ?>; box-shadow: 0px 1px <?php echo esc_html( $hongo_sticky_header_box_shadow_color ); ?>; }
        <?php endif; ?>
    <?php /* Sticky Header Font and Color End */ ?>

    <?php /* Header Submenu Font and Color Start */ ?>
        <?php if( $hongo_header_submenu_bg_color ) : ?>
        /* Header Submenu Background Color */
        header .header-common-wrapper .widget.widget_hongo_account_menu_widget .hongo-top-account-menu ul, header .header-common-wrapper .simple-dropdown ul.sub-menu, .mega-menu-main-wrapper section { background-color: <?php echo esc_html( $hongo_header_submenu_bg_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_text_color ) : ?>
        /* Header Submenu Text Color */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .hongo-left-menu-wrapper .hongo-left-menu > li span i.ti-angle-down, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li a .product-title, .header-common-wrapper .mega-menu-main-wrapper .widget_product_categories_thumbnail ul li a { color: <?php echo esc_html( $hongo_header_submenu_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_text_hover_color ) : ?>
        /* Header Submenu Text Hover Color */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links:hover, .header-common-wrapper .simple-dropdown ul.sub-menu li a:hover, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a:hover, .header-common-wrapper .simple-dropdown ul.sub-menu li:hover > a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a:hover, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu li ul > li.on > span i.ti-angle-down, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li.on > a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li a:hover .product-title, .header-common-wrapper .mega-menu-main-wrapper .widget_product_categories_thumbnail ul li a:hover, .header-common-wrapper .nav>li ul.menu li>a.active, .header-common-wrapper .nav>li ul.menu li.current-menu-ancestor>a, .header-common-wrapper .nav>li ul.menu li.current-menu-item>a { color: <?php echo esc_html( $hongo_header_submenu_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_font_size ) : ?>
        /* Header Submenu Text Font Size */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .header-common-wrapper .simple-dropdown ul.sub-menu li > a i.ti-angle-right, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu li ul > li > span i.ti-angle-down, .header-common-wrapper .widget_product_categories_thumbnail ul li a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li { font-size: <?php echo esc_html( $hongo_header_submenu_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_line_height ) : ?>
        /* Header Submenu Text Line Height */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .header-common-wrapper .hongo-left-menu-wrapper .hongo-left-menu li ul > li > span i.ti-angle-down, .header-common-wrapper .widget_product_categories_thumbnail ul li a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li { line-height: <?php echo esc_html( $hongo_header_submenu_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_letter_spacing ) : ?>
        /* Header Submenu Text Letter Spacing */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .header-common-wrapper .widget_product_categories_thumbnail ul li a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li { letter-spacing: <?php echo esc_html( $hongo_header_submenu_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_text_transform ) : ?>
        /* Header Submenu Text Transform */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .header-common-wrapper .widget_product_categories_thumbnail ul li a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li { text-transform: <?php echo esc_html( $hongo_header_submenu_text_transform ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_font_weight ) : ?>
        /* Header Submenu Font Weight */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links, .header-common-wrapper .simple-dropdown ul.sub-menu li a, .header-common-wrapper .widget_hongo_account_menu_widget .hongo-top-account-menu ul li a, .hongo-left-menu-wrapper .hongo-left-menu li.menu-item ul li a, .header-common-wrapper .widget_product_categories_thumbnail ul li a, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products ul.product_list_widget li { font-weight: <?php echo esc_html( $hongo_header_submenu_font_weight ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_icon_font_size ) : ?>
        /* Header Submenu Icon Font Size */
        .header-common-wrapper .nav > li ul.menu li a.navigation-links i, .header-common-wrapper .simple-dropdown ul.sub-menu li a i.submenu-icon { font-size: <?php echo esc_html( $hongo_header_submenu_icon_font_size ); ?>; }
        <?php endif; ?>
    <?php /* Header Submenu Font and Color End */ ?>

    <?php /* Header Submenu Heading Font and Color Start */ ?>
        <?php if( $hongo_header_submenu_heading_text_color ) : ?>
        /* Header Submenu Heading Text Color */
        .header-common-wrapper .nav > li ul.menu li.menu-title, .header-common-wrapper .nav > li ul.menu li.menu-title a,.header-common-wrapper .mega-menu-main-wrapper .widget .widget-title, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products .widget-title { color: <?php echo esc_html( $hongo_header_submenu_heading_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_text_hover_color ) : ?>
        /* Header Submenu Heading Text Hover Color */
        .header-common-wrapper .nav > li ul.menu li.menu-title a:hover { color: <?php echo esc_html( $hongo_header_submenu_heading_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_font_size ) : ?>
        /* Header Submenu Heading Text Font Size */
        .header-common-wrapper .nav > li ul.menu li.menu-title,.header-common-wrapper .nav > li ul.menu li.menu-title a, .header-common-wrapper .mega-menu-main-wrapper .widget .widget-title, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products .widget-title { font-size: <?php echo esc_html( $hongo_header_submenu_heading_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_line_height ) : ?>
        /* Header Submenu Heading Text Line Height */
        .header-common-wrapper .nav > li ul.menu li.menu-title,.header-common-wrapper .nav > li ul.menu li.menu-title a, .header-common-wrapper .mega-menu-main-wrapper .widget .widget-title, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products .widget-title { line-height: <?php echo esc_html( $hongo_header_submenu_heading_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_letter_spacing ) : ?>
        /* Header Submenu Heading Text Letter Spacing */
        .header-common-wrapper .nav > li ul.menu li.menu-title, .header-common-wrapper .mega-menu-main-wrapper .widget .widget-title, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products .widget-title { letter-spacing: <?php echo esc_html( $hongo_header_submenu_heading_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_text_transform ) : ?>
        /* Header Submenu Heading Text Transform */
        .header-common-wrapper .nav > li ul.menu li.menu-title, .header-common-wrapper .mega-menu-main-wrapper .widget .widget-title, .header-common-wrapper .mega-menu-main-wrapper .woocommerce.widget_products .widget-title { text-transform: <?php echo esc_html( $hongo_header_submenu_heading_text_transform ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_header_submenu_heading_icon_font_size ) : ?>
        /* Header Submenu Heading Icon Font Size */
        .header-common-wrapper .nav > li ul.menu li.menu-title i { font-size: <?php echo esc_html( $hongo_header_submenu_heading_icon_font_size ); ?>; }
        <?php endif; ?>
    <?php /* Header Submenu Heading Font and Color End */ ?>

    <?php /* Header Mobile Menu Color Start */ ?>

        <?php if( $hongo_header_mobile_menu_bg_color ) : ?>
        /* Mini Header Mobile Menu Text Color */
        @media (max-width: 991px) { header .header-common-wrapper .nav { background-color: <?php echo esc_html( $hongo_header_mobile_menu_bg_color ); ?>!important; } 
        header .header-common-wrapper .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li > a:hover, header .header-common-wrapper .hongo-shop-dropdown-menu .hongo-shop-dropdown-button-menu > ul > li.on > a { background-color: <?php echo esc_html( $hongo_header_mobile_menu_bg_color ); ?>!important; }
        }
        <?php endif; ?>

        <?php if( $hongo_header_mobile_menu_color ) : ?>
        /* Header Mobile Menu Text Color */
        @media (max-width: 991px) { header .header-common-wrapper .nav > li > a, header .header-common-wrapper .nav > li i.dropdown-toggle { color: <?php echo esc_html( $hongo_header_mobile_menu_color ); ?>; } }
        <?php endif; ?>

        <?php if( $hongo_header_mobile_menu_hover_color ) : ?>
        /* Header Mobile Menu Hover Color */
        @media (max-width: 991px) { header .header-common-wrapper .nav > li:hover > a, header .header-common-wrapper .nav > li > a:hover { color: <?php echo esc_html( $hongo_header_mobile_menu_hover_color ); ?>; } }
        <?php endif; ?>
    <?php /* Header Mobile Menu Color End */ ?>
<?php
}

if ( $hongo_footer_section ) { /* If Footer Selected */ ?>

    <?php /* Footer Widget Title Font and Color Start */ ?>
        <?php if( $hongo_footer_widget_text_color ) : ?>
        /* Footer Widget Text Color */
        footer .hongo-footer-top .widget .widget-title, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title a, footer.footer-light-style .hongo-footer-top .widget .widget-title, footer.footer-light-style .hongo-footer-middle .hongo-link-menu li.menu-title, footer.footer-light-style .hongo-footer-middle .hongo-link-menu li.menu-title a, footer.footer-light-style .hongo-footer-middle .widget .widget-title, footer .hongo-section-heading, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title a { color: <?php echo esc_html( $hongo_footer_widget_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_widget_font_size ) : ?>
        /* Footer Widget Font Size */
        footer .hongo-footer-top .widget .widget-title, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title a, footer .hongo-section-heading, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title,  footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title a { font-size: <?php echo esc_html( $hongo_footer_widget_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_widget_line_height ) : ?>
        /* Footer Widget Text Line Height */
        footer .hongo-footer-top .widget .widget-title, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title, footer .hongo-section-heading, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title { line-height: <?php echo esc_html( $hongo_footer_widget_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_widget_letter_spacing ) : ?>
        /* Footer Widget Text Letter Spacing */
        footer .hongo-footer-top .widget .widget-title, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title, footer .hongo-section-heading, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title { letter-spacing: <?php echo esc_html( $hongo_footer_widget_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_widget_text_transform ) : ?>
        /* Footer Widget Text Transform */
        footer .hongo-footer-top .widget .widget-title, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu li.menu-title, footer .hongo-section-heading, footer .hongo-footer-middle .widget .widget-title, footer .hongo-footer-middle .hongo-link-menu.navigation-link-vertical li.menu-title { text-transform: <?php echo esc_html( $hongo_footer_widget_text_transform ); ?>; }
        <?php endif; ?>
    <?php /* Footer Widget Title Font and Color End */ ?>

    <?php /* Footer Font and Color Start */ ?>
        <?php if( $hongo_footer_text_color ) : ?>
        /* Footer Text Color */
        footer, footer a, footer a:focus, footer .social-icon-style-1 a, footer.footer-light-style, footer.footer-light-style a, footer.footer-light-style .social-icon-style-1 a, footer .hongo-contact-info-wrap > div i, footer.footer-light-style .hongo-contact-info-wrap > div i, footer.footer-light-style .hongo-footer-bottom .widget_nav_menu ul li a { color: <?php echo esc_html( $hongo_footer_text_color ); ?>; }
        footer .hongo-footer-bottom .hongo-contact-info-wrap > div:before, footer.footer-light-style .hongo-footer-bottom .hongo-contact-info-wrap > div:before { background-color: <?php echo esc_html( $hongo_footer_text_color ); ?>; }
        footer .navigation-link-horizontal.navigation-link-separator li:after { background-color: <?php echo esc_html( $hongo_footer_text_border_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_text_hover_color ) : ?>
        /* Footer Text Color */
        footer a:hover, footer.footer-light-style a:hover, footer .hongo-footer-bottom .widget_nav_menu ul li a:hover, footer.footer-light-style .hongo-footer-bottom .widget_nav_menu ul li a:hover { color: <?php echo esc_html( $hongo_footer_text_hover_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_font_size ) : ?>
        /* Footer Font Size */
        footer .widget_nav_menu ul li a, footer .hongo-link-menu li a, footer .text-block-content , footer .text-block-content a, footer .widget-content, footer .hongo-footer-top .hongo-link-menu li a, footer, footer a, footer .hongo-contact-info-wrap > div i, footer .widget-content .text-small, footer .text-block-content .text-small, footer .text-small, footer .text-extra-small { font-size: <?php echo esc_html( $hongo_footer_font_size ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_line_height ) : ?>
        /* Footer Text Line Height */
        footer .widget_nav_menu ul li a, footer .hongo-link-menu li a, footer .text-block-content , footer .text-block-content a, footer .widget-content, footer .hongo-footer-top .hongo-link-menu li a, footer, footer a, footer .hongo-contact-info-wrap > div i, footer .widget-content .text-small, footer .text-block-content .text-small, footer .text-small, footer .text-extra-small { line-height: <?php echo esc_html( $hongo_footer_line_height ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_letter_spacing ) : ?>
        /* Footer Text Letter Spacing */
        footer .widget_nav_menu ul li a, footer .hongo-link-menu li a, footer .text-block-content , footer .text-block-content a, footer .widget-content, footer .hongo-footer-top .hongo-link-menu li a, footer, footer a, footer .hongo-contact-info-wrap > div i, footer .widget-content .text-small, footer .text-block-content .text-small, footer .text-small, footer .text-extra-small { letter-spacing: <?php echo esc_html( $hongo_footer_letter_spacing ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_text_transform ) : ?>
        /* Footer Text Transform */
        footer .widget_nav_menu ul li a, footer .hongo-link-menu li a, footer .text-block-content , footer .text-block-content a, footer .widget-content, footer .hongo-footer-top .hongo-link-menu li a, footer, footer a, footer .hongo-contact-info-wrap > div i, footer .widget-content .text-small, footer .text-block-content .text-small, footer .text-small, footer .text-extra-small { text-transform: <?php echo esc_html( $hongo_footer_text_transform ); ?>; }
        <?php endif; ?>
    <?php /* Footer Font and Color End */ ?>

    <?php /* Footer Newsletter Font and Color Start */ ?>
        <?php if( $hongo_footer_newsletter_background_color ) : ?>
        /* Footer Newsletter Background Color */
        footer .newsletter-style-1 input, footer .newsletter-style-1 input:focus, footer .newsletter-style-1 .btn, footer .newsletter-style-1 .btn:active:focus, footer .newsletter-style-1 .btn:active { background-color: <?php echo esc_html( $hongo_footer_newsletter_background_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_newsletter_border_color ) : ?>
        /* Footer Newsletter Border Color */
        footer .newsletter-style-1 input, footer .newsletter-style-1 input:focus { border-color: <?php echo esc_html( $hongo_footer_newsletter_border_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_newsletter_place_text_color ) : ?>
        /* Footer Newsletter Placeholder Text Color */
        footer .newsletter-style-1 input::-webkit-input-placeholder { color: <?php echo esc_html( $hongo_footer_newsletter_place_text_color ); ?>; }
        footer .newsletter-style-1 input::-moz-placeholder { color: <?php echo esc_html( $hongo_footer_newsletter_place_text_color ); ?>; }
        footer .newsletter-style-1 input:-ms-input-placeholder { color: <?php echo esc_html( $hongo_footer_newsletter_place_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_newsletter_text_color ) : ?>
        /* Footer Newsletter Text Color */
        footer .newsletter-style-1 input, footer .newsletter-style-1 input:focus { color: <?php echo esc_html( $hongo_footer_newsletter_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_newsletter_button_text_color ) : ?>
        /* Footer Newsletter Button Text Color */
        footer .newsletter-style-1 .btn, footer .newsletter-style-1 .btn:active:focus, footer .newsletter-style-1 .btn:active { color: <?php echo esc_html( $hongo_footer_newsletter_button_text_color ); ?>; }
        <?php endif; ?>

        <?php if( $hongo_footer_newsletter_button_hover_color ) : ?>
        /* Footer Newsletter Button Hover Text Color */
        footer .newsletter-style-1 .btn:hover { color: <?php echo esc_html( $hongo_footer_newsletter_button_hover_color ); ?>; }
        <?php endif; ?>


    <?php /* Footer Newsletter Font and Color End */ ?>
<?php
}
<?php

// For Map Variables
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-map-variables.php' );

// For Responsive CSS Box.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-responsive-css-box.php' );
// For Slider Preview Image.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-preview-image.php' );
// For Switch Option.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-switch-option.php' );
// For Icons List.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-icons-shortcode.php' );
// For Multi-select Option In dropdown.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-multiple-select-dropdown.php' );
// For Multi-select Option In Product tab.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-multiple-product-tab.php' );
// For Custom title
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-custom-title.php' );
// For Custom VC Typography Settings
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-typography-settings.php' );
// For Social Media Sorting.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-social-media-sorting.php' );
// For Image Hotspot.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-image-hotspot.php' );
// For Link Settings.
require_once( HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hongo-link-settings.php' );

if ( class_exists( 'Vc_Manager' ) && ( is_admin() || ! empty( $_GET['vc_editable'] ) ) ) {

    // Include all shortcode map files
    $fileName = array( 'row', 'inner-row', 'column', 'inner-column', 'text-block', 'tab', 'accordian', 'alert-message', 'blockquote', 'blog', 'button', 'call-to-action', 'client-image-slider', 'counter', 'feature-product-box', 'image-carousel', 'image-gallery', 'instagram', 'lists', 'newsletter', 'popup', 'progressbar', 'product-brand', 'section-heading', 'separator', 'social', 'content-block', 'team-member', 'team-carousel', 'timer', 'table-pricing', 'testimonial', 'testimonial-slider', 'video', 'text-slider', '360-image-view','gmap','single-image' );

    // Include all smart sections shortcode map files
    $smart_section_files = array( 'navigation-menu', 'navigation-links', 'left-menu', 'hamburger-menu', 'logo', 'single-image', 'header-with-push', 'widgtes-sidebar', 'product-search', 'newsletter-popup', 'section-feature-product-box' );

    if ( hongo_is_woocommerce_activated() ) {
    
        $woocommercefileName = array( 'shop-banner', 'shop-grid', 'shop-slider', 'product-slider', 'product-lists', 'product-category', 'product-brand-carousel','image-hotspot' );
        $fileName = array_merge( $fileName, $woocommercefileName );  
    }

    foreach( $fileName as $name ) {

        require_once( HONGO_SHORTCODE_ADDONS_MAP_URI.'/hongo-shortcode-'.$name.'-map.php' );
    }

    foreach( $smart_section_files as $smart_name ) {

        require_once( HONGO_SHORTCODE_ADDONS_MAP_URI.'/smart-sections/hongo-shortcode-'.$smart_name.'-map.php' );
    }

    if( ! function_exists( 'hongo_addons_manage_vc_elements_to_box' ) ) {
        function hongo_addons_manage_vc_elements_to_box( $shortcodes ) {

            global $post;

            if( ! empty( $post->post_type ) && $post->post_type == 'hongobuilder' ) {

                $show_elements = array( 'vc_row_inner', 'vc_row', 'vc_column', 'vc_column_inner', 'vc_column_text', 'hongo_button', 'hongo_section_heading', 'hongo_separator', 'hongo_social', 'hongo_navigation_menu', 'hongo_navigation_links', 'hongo_left_navigation_menu', 'hongo_hamburger_navigation_menu', 'hongo_header_logo', 'hongo_single_image', 'hongo_header_push', 'hongo_widget_sidebar', 'hongo_product_search', 'hongo_newsletter_popup', 'hongo_sfeature_box' );

                if( ! empty( $shortcodes ) ) {
                    foreach ( $shortcodes as $element_key => $element ) {
                  
                        if( ! in_array( $element_key, $show_elements ) ) {

                            unset( $shortcodes[$element_key] );
                        }
                    }
                }

            } else {

                $remove_elements = array( 'hongo_navigation_menu', 'hongo_navigation_links', 'hongo_left_navigation_menu', 'hongo_hamburger_navigation_menu', 'hongo_header_logo', 'hongo_single_image', 'hongo_header_push', 'hongo_widget_sidebar', 'hongo_product_search', 'hongo_newsletter_popup', 'hongo_sfeature_box' );

                if( ! empty( $shortcodes ) ) {
                    foreach ( $shortcodes as $element_key => $element ) {
                  
                        if( in_array( $element_key, $remove_elements ) ) {

                            unset( $shortcodes[$element_key] );
                        }
                    }
                }
            }
            return $shortcodes;
        }
    }
    add_filter( 'vc_add_new_elements_to_box', 'hongo_addons_manage_vc_elements_to_box' );
}
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Filter For the_post_thumbnail function attributes */
if( ! function_exists( 'hongo_filter_the_post_thumbnail_atts' ) ) :
    function hongo_filter_the_post_thumbnail_atts( $atts, $attachment ) {

        /* Check image alt is on / off */
        $hongo_image_alt = get_theme_mod( 'hongo_image_alt', '1' );

        if ( isset( $attachment ) && is_object( $attachment ) && ! empty( $attachment->ID ) ) {
            $hongo_image_alt_text = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
        } else {
            $hongo_image_alt_text = ''; // Default value or handle the case where there's no attachment
        }

        /* Check image title is on / off */
        $hongo_image_title = get_theme_mod( 'hongo_image_title', '0' );

        /* For image alt attribute */
        $atts['alt'] = ( $hongo_image_alt == 1 ) ? $hongo_image_alt_text : '';

        /* For image title attribute */
        if( $hongo_image_title == 1 && $attachment->post_title ) {
            $atts['title'] = esc_attr( $attachment->post_title );
        }

        return $atts;
    }
endif;
add_filter( 'wp_get_attachment_image_attributes', 'hongo_filter_the_post_thumbnail_atts', 10, 2 );

/* For WordPress4.4 move comment textarea bottom */
if( ! function_exists( 'hongo_move_comment_field_to_bottom' ) ) :
    function hongo_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
endif;
add_filter( 'comment_form_fields', 'hongo_move_comment_field_to_bottom' );

// To Change Admin Panel Logo.
if( ! function_exists( 'hongo_admin_login_logo' ) ) :
    function hongo_admin_login_logo() { 
        $hongo_site_logo = get_theme_mod( 'hongo_logo', '' );
        if( esc_url( $hongo_site_logo ) ) {
            ?>
            <style type="text/css">
                .login h1 a { 
                    background-image: url( <?php echo esc_url( $hongo_site_logo ); ?> ) !important;
                    background-size: contain !important;
                    height: 25px !important;
                    width: 100% !important;
                }
            </style>
        <?php
        }
    }
endif;
add_action( 'login_enqueue_scripts', 'hongo_admin_login_logo' );

// To Change Admin Panel Logo Url.
if( ! function_exists( 'hongo_login_logo_url' ) ) :
    function hongo_login_logo_url() {
        return home_url( '/' );
    }
endif;
add_filter( 'login_headerurl', 'hongo_login_logo_url' );

// To Change Admin Panel Logo Title.
if( ! function_exists( 'hongo_login_logo_url_title' ) ) :
    function hongo_login_logo_url_title() {
        $hongo_text = get_bloginfo( 'name' ).' | '.get_bloginfo( 'description' );
        return $hongo_text;
    }
endif;
add_filter( 'login_headertext', 'hongo_login_logo_url_title' );

// Remove Post category brackets
if ( ! function_exists( 'hongo_categories_postcount_filter' ) ) :
    function hongo_categories_postcount_filter ($variable) {

        $variable = str_replace( array( '(1)', '(2)', '(3)', '(4)', '(5)', '(6)', '(7)', '(8)', '(9)' ), array( '(01)', '(02)', '(03)', '(04)', '(05)', '(06)', '(07)', '(08)', '(09)' ), $variable );
        $variable = str_replace( array( '(', ')', 'cat-item ' ), array( '<span class="count"><span>', '</span></span>', 'cat-item category-list ' ), $variable );
        return $variable;
    }
endif;

// Remove Post archieve brackets
if ( ! function_exists( 'hongo_archive_count_no_brackets' ) ) :
    function hongo_archive_count_no_brackets($variable) {

        $variable = str_replace( array( '(1)', '(2)', '(3)', '(4)', '(5)', '(6)', '(7)', '(8)', '(9)' ), array( '(01)', '(02)', '(03)', '(04)', '(05)', '(06)', '(07)', '(08)', '(09)' ), $variable );
        $variable = str_replace( array( '(', ')' ), array( '<span class="count"><span>', '</span></span>' ), $variable );
        return $variable;
    }
endif;
    
// Remove Post archieve brackets
if ( ! function_exists( 'hongo_sidebar_content_archive_count_no_brackets' ) ) :
    function hongo_sidebar_content_archive_count_no_brackets() {

        add_filter( 'wp_list_categories','hongo_categories_postcount_filter' );
        add_filter('get_archives_link', 'hongo_archive_count_no_brackets');
    }
endif;
add_action( 'hongo_sidebar_content_start', 'hongo_sidebar_content_archive_count_no_brackets' );

/* Set max value for excerpt so our custom function */
if( ! function_exists( 'hongo_excerpt_length' ) ) :
    function hongo_excerpt_length( $length ) {
        return 200;
    }
endif;
add_filter( 'excerpt_length', 'hongo_excerpt_length' );

/* Set read more for excerpt so our custom function */
if( ! function_exists( 'hongo_excerpt_more' ) ) :
    function hongo_excerpt_more( $more ) {
        return '...';
    }
endif;
add_filter( 'excerpt_more', 'hongo_excerpt_more' );

/* Allow to add extra style tags in sanitize functions */
if( ! function_exists( 'hongo_sanitize_safe_style_css' ) ) :
    function hongo_sanitize_safe_style_css ( $styles ) {
        $styles[] = 'opacity';
        return $styles;
    }
endif;
add_filter( 'safe_style_css', 'hongo_sanitize_safe_style_css' );

if ( ! function_exists('hongo_deregister_section') ) :
    function hongo_deregister_section( $wp_customize ) {
        
        // Remove the section for colors.
        $wp_customize->remove_section( 'colors' );
        $wp_customize->remove_control( 'display_header_text' );
        // Change site icon section.
        $wp_customize->get_control( 'site_icon' )->section = 'hongo_add_logo_favicon_panel';
    }
endif;
add_action( 'customize_register', 'hongo_deregister_section', 999 );

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

if ( ! function_exists( 'hongo_widgets' ) ) :
    function hongo_widgets() {

        $hongo_custom_sidebars = get_theme_mod( 'hongo_custom_sidebars', '' );
        $hongo_custom_sidebars = explode( ",", $hongo_custom_sidebars );
        if ( is_array( $hongo_custom_sidebars ) ) {
            foreach ( $hongo_custom_sidebars as $sidebar ) {

                if ( empty( $sidebar ) ) {
                    continue;
                }

                register_sidebar ( array (
                    'name' => $sidebar,
                    'id' => sanitize_title( $sidebar ),
                    'before_widget' => '<div id="%1$s" class="widget custom-widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title'  => '<div class="widget-title alt-font">',
                    'after_title'   => '</div>',
                ) );
            }
        }
    }
endif;
add_action( 'widgets_init', 'hongo_widgets' );

if ( ! function_exists( 'hongo_post_format_parameter' ) ) :
    function hongo_post_format_parameter( $url ) {
        $url = remove_query_arg( 'post_format', $url );
        return $url;
    }
endif;
add_filter( 'preview_post_link', 'hongo_post_format_parameter' );

/* Remove VC redirection when plugin activated */
if( class_exists( 'Vc_Manager' ) ) {
    
    remove_action( 'admin_init', 'vc_page_welcome_redirect' );
}

/**
 * Title section
 */
if ( ! function_exists( 'hongo_page_title_section' ) ) {
    function hongo_page_title_section() {

        $hongo_single_post_meta_output = '';

        if ( hongo_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) { // if WooCommerce plugin is activated and WooCommerce category, brand, shop page
                    
            $hongo_title                    = woocommerce_page_title( false );
            $hongo_title_class              = ' hongo-product-archive-title';
            $hongo_subtitle_class           = ' hongo-product-archive-subtitle';
            $hongo_breadcrumb_class         = ' hongo-product-archive-breadcrumb';
            $hongo_enable_title             = hongo_option( 'hongo_product_archive_enable_title', '1' );
            $hongo_top_space                = hongo_option( 'hongo_product_archive_title_top_space', 'yes' );
            $container_style                = hongo_option( 'hongo_product_archive_title_container_style', 'container' );
            $hongo_title_style              = hongo_option( 'hongo_product_archive_title_style', 'page-title-style-5' );
            $hongo_enable_title_heading     = hongo_option( 'hongo_product_archive_enable_title_heading', '1' );
            $content_height                 = hongo_option( 'hongo_product_archive_title_height', '' );
            $hongo_title_after_header       = hongo_option( 'hongo_product_archive_title_after_header', '0' );
            $hongo_title_opacity            = hongo_option( 'hongo_product_archive_title_opacity', '0.8' );
            $hongo_title_bg_color           = hongo_option( 'hongo_product_archive_title_bg_color', '' );
            $hongo_title_bg_image           = hongo_taxonomy_title_option( 'hongo_product_archive_title_bg_image', '' );
            $hongo_title_image_srcset       = hongo_option( 'hongo_product_archive_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = hongo_option( 'hongo_product_archive_enable_subtitle', '' );
            $hongo_title_subtitle           = hongo_taxonomy_title_option( 'hongo_product_archive_title_subtitle', '' );
            $hongo_enable_title_image       = hongo_option( 'hongo_product_archive_enable_title_image', '' );
            $hongo_parallax_effect          = hongo_option( 'hongo_product_archive_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = hongo_option( 'hongo_product_archive_enable_breadcrumb', '1' );
            $hongo_breadcrumb_position      = hongo_option( 'hongo_product_archive_breadcrumb_position', 'title-area' );
            $hongo_breadcrumb_alignment     = hongo_option( 'hongo_product_archive_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = hongo_option( 'hongo_product_archive_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = hongo_taxonomy_title_option( 'hongo_product_archive_title_bg_multiple_image', '' );
            $hongo_title_video_type         = hongo_taxonomy_title_option( 'hongo_product_archive_title_video_type', 'self' );
            $hongo_title_video_mp4          = hongo_taxonomy_title_option( 'hongo_product_archive_title_video_mp4', '' );
            $hongo_title_video_ogg          = hongo_taxonomy_title_option( 'hongo_product_archive_title_video_ogg', '' );
            $hongo_title_video_webm         = hongo_taxonomy_title_option( 'hongo_product_archive_title_video_webm', '' );
            $hongo_loop_video               = hongo_option( 'hongo_product_archive_loop_video', '1' );
            $hongo_mute_video               = hongo_option( 'hongo_product_archive_mute_video', '1' );
            $hongo_title_video_youtube      = hongo_taxonomy_title_option( 'hongo_product_archive_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = hongo_option( 'hongo_product_archive_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = hongo_option( 'hongo_product_archive_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = hongo_option( 'hongo_product_archive_title_text_transform', '' );
            $hongo_subtitle_text_transform  = hongo_option( 'hongo_product_archive_title_subtitle_text_transform', '' );
            $hongo_breadcumbre_attribute    = '';

        } elseif ( hongo_is_woocommerce_activated() && is_product() ) { // if WooCommerce plugin is activated and WooCommerce product page

            $hongo_title                    = get_the_title();
            $hongo_title_class              = ' hongo-single-product-title';
            $hongo_subtitle_class           = ' hongo-single-product-subtitle';
            $hongo_breadcrumb_class         = ' hongo-single-product-breadcrumb';
            $hongo_enable_title             = hongo_option( 'hongo_single_product_enable_title', '0' );
            $hongo_top_space                = hongo_option( 'hongo_single_product_title_top_space', 'yes' );
            $container_style                = hongo_option( 'hongo_single_product_title_container_style', 'container' );
            $hongo_title_style              = hongo_option( 'hongo_single_product_title_style', 'page-title-style-1' );
            $hongo_enable_title_heading     = hongo_option( 'hongo_single_product_enable_title_heading', '1' );
            $content_height                 = hongo_option( 'hongo_single_product_title_height', '' );
            $hongo_title_after_header       = hongo_option( 'hongo_single_product_title_after_header', '0' );
            $hongo_title_opacity            = hongo_option( 'hongo_single_product_title_opacity', '0.8' );
            $hongo_title_bg_color           = hongo_option( 'hongo_single_product_title_bg_color', '' );
            $hongo_title_bg_image           = hongo_option( 'hongo_single_product_title_bg_image', '' );
            $hongo_title_image_srcset       = hongo_option( 'hongo_single_product_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = hongo_option( 'hongo_single_product_enable_subtitle', '' );
            $hongo_title_subtitle           = hongo_option( 'hongo_single_product_title_subtitle', '' );
            $hongo_enable_title_image       = hongo_option( 'hongo_single_product_enable_title_image', '1' );
            $hongo_parallax_effect          = hongo_option( 'hongo_single_product_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = hongo_option( 'hongo_single_product_enable_breadcrumb', '1' );
            $hongo_breadcrumb_position      = hongo_option( 'hongo_single_product_breadcrumb_position', 'title-area' );
            $hongo_breadcrumb_alignment     = hongo_option( 'hongo_single_product_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = hongo_option( 'hongo_single_product_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = hongo_option( 'hongo_single_product_title_bg_multiple_image', '' );
            $hongo_title_video_type         = hongo_option( 'hongo_single_product_title_video_type', 'self' );
            $hongo_title_video_mp4          = hongo_option( 'hongo_single_product_title_video_mp4', '' );
            $hongo_title_video_ogg          = hongo_option( 'hongo_single_product_title_video_ogg', '' );
            $hongo_title_video_webm         = hongo_option( 'hongo_single_product_title_video_webm', '' );
            $hongo_loop_video               = hongo_option( 'hongo_single_product_loop_video', '1' );
            $hongo_mute_video               = hongo_option( 'hongo_single_product_mute_video', '1' );
            $hongo_title_video_youtube      = hongo_option( 'hongo_single_product_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = hongo_option( 'hongo_single_product_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = hongo_option( 'hongo_single_product_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = hongo_option( 'hongo_single_product_title_text_transform', '' );
            $hongo_subtitle_text_transform  = hongo_option( 'hongo_single_product_title_subtitle_text_transform', '' );
            $hongo_breadcumbre_attribute    = '';

        } elseif ( is_search() || is_category() || is_archive() || is_tag() ) { // if Post category, tag, archive page

            if ( is_tag() ) {
                $hongo_archive_title = sprintf( '%s', single_tag_title( '', false ) );
            } elseif( is_archive() ){
                $hongo_archive_title = sprintf( '%s', single_tag_title( '', false ) );
            }  elseif ( is_author() ) {
                $hongo_archive_title = sprintf( '%s', get_the_author() );
            } elseif ( is_category() ) {
                $hongo_archive_title = sprintf( '%s', single_tag_title( '', false ) );
            } elseif ( is_year() ) {
                $hongo_archive_title = sprintf( '%s', get_the_date( _x( 'Y', 'yearly archives date format', 'hongo' ) ) );
            } elseif ( is_month() ) {
                $hongo_archive_title = sprintf( '%s', get_the_date( _x( 'F Y', 'monthly archives date format', 'hongo' ) ) );
            } elseif ( is_day() ) {
                $hongo_archive_title = sprintf( '%s', get_the_date( _x( '', 'daily archives date format', 'hongo' ) ) );
            } elseif ( is_search() ) {
                $hongo_archive_title = esc_html__( 'Search Results For ', 'hongo' ) . '"' . get_search_query() . '"';
            } else {
                $hongo_archive_title = get_the_title();
            }
            
            $hongo_title                    = $hongo_archive_title;
            $hongo_title_class              = ' hongo-archive-title';
            $hongo_subtitle_class           = ' hongo-archive-subtitle';
            $hongo_breadcrumb_class         = ' hongo-archive-breadcrumb';
            $hongo_enable_title             = get_theme_mod( 'hongo_archive_enable_title', '1' );
            $hongo_top_space                = get_theme_mod( 'hongo_archive_title_top_space', 'yes' );
            $container_style                = get_theme_mod( 'hongo_archive_title_container_style', 'container' );
            $hongo_title_style              = get_theme_mod( 'hongo_archive_title_style', 'page-title-style-1' );
            $hongo_enable_title_heading     = get_theme_mod( 'hongo_archive_enable_title_heading', '1' );
            $content_height                 = get_theme_mod( 'hongo_archive_title_height', '' );
            $hongo_title_after_header       = get_theme_mod( 'hongo_archive_title_after_header', '0' );
            $hongo_title_opacity            = get_theme_mod( 'hongo_archive_title_opacity', '0.8' );
            $hongo_title_bg_color           = get_theme_mod( 'hongo_archive_title_bg_color', '' );
            $hongo_title_bg_image           = hongo_taxonomy_title_option( 'hongo_archive_title_bg_image', '' );
            $hongo_title_image_srcset       = get_theme_mod( 'hongo_archive_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = get_theme_mod( 'hongo_archive_enable_subtitle', '' );
            $hongo_title_subtitle           = hongo_taxonomy_title_option( 'hongo_archive_title_subtitle', '' );
            $hongo_enable_title_image       = get_theme_mod( 'hongo_archive_enable_title_image', '' );
            $hongo_parallax_effect          = get_theme_mod( 'hongo_archive_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = get_theme_mod( 'hongo_archive_enable_breadcrumb', '1' );
            $hongo_breadcrumb_position      = get_theme_mod( 'hongo_archive_breadcrumb_position', 'title-area' );
            $hongo_breadcrumb_alignment     = get_theme_mod( 'hongo_archive_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = get_theme_mod( 'hongo_archive_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = hongo_taxonomy_title_option( 'hongo_archive_title_bg_multiple_image', '' );
            $hongo_title_video_type         = hongo_taxonomy_title_option( 'hongo_archive_title_video_type', 'self' );
            $hongo_title_video_mp4          = hongo_taxonomy_title_option( 'hongo_archive_title_video_mp4', '' );
            $hongo_title_video_ogg          = hongo_taxonomy_title_option( 'hongo_archive_title_video_ogg', '' );
            $hongo_title_video_webm         = hongo_taxonomy_title_option( 'hongo_archive_title_video_webm', '' );
            $hongo_loop_video               = get_theme_mod( 'hongo_archive_loop_video', '1' );
            $hongo_mute_video               = get_theme_mod( 'hongo_archive_mute_video', '1' );
            $hongo_title_video_youtube      = hongo_taxonomy_title_option( 'hongo_archive_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = get_theme_mod( 'hongo_archive_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = get_theme_mod( 'hongo_archive_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = get_theme_mod( 'hongo_archive_title_text_transform', '' );
            $hongo_subtitle_text_transform  = get_theme_mod( 'hongo_archive_title_subtitle_text_transform', '' );
            $hongo_breadcumbre_attribute    = ' itemscope="" itemtype="http://schema.org/BreadcrumbList"';

        } elseif( is_home() ) { // if Home page

            $hongo_title                    = get_theme_mod( 'hongo_default_post_title_default', __( 'Blog', 'hongo' ) );
            $hongo_title_class              = ' hongo-default-title';
            $hongo_subtitle_class           = ' hongo-default-subtitle';
            $hongo_breadcrumb_class         = ' hongo-default-breadcrumb';
            $hongo_enable_title             = get_theme_mod( 'hongo_default_enable_title', '1' );
            $hongo_top_space                = get_theme_mod( 'hongo_default_title_top_space', 'yes' );
            $container_style                = get_theme_mod( 'hongo_default_title_container_style', 'container' );
            $hongo_title_style              = get_theme_mod( 'hongo_default_title_style', 'page-title-style-1' );
            $hongo_enable_title_heading     = get_theme_mod( 'hongo_default_enable_title_heading', '1' );
            $content_height                 = get_theme_mod( 'hongo_default_title_height', '' );
            $hongo_title_after_header       = get_theme_mod( 'hongo_default_title_after_header', '0' );
            $hongo_title_opacity            = get_theme_mod( 'hongo_default_title_opacity', '0.8' );
            $hongo_title_bg_color           = get_theme_mod( 'hongo_default_title_bg_color', '' );
            $hongo_title_bg_image           = get_theme_mod( 'hongo_default_title_bg_image', '' );
            $hongo_title_image_srcset       = get_theme_mod( 'hongo_default_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = get_theme_mod( 'hongo_default_enable_subtitle', '' );
            $hongo_title_subtitle           = get_theme_mod( 'hongo_default_title_subtitle', '' );
            $hongo_enable_title_image       = get_theme_mod( 'hongo_default_enable_title_image', '' );
            $hongo_parallax_effect          = get_theme_mod( 'hongo_default_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = get_theme_mod( 'hongo_default_enable_breadcrumb', '1' );
            $hongo_breadcrumb_position      = get_theme_mod( 'hongo_default_breadcrumb_position', 'title-area' );
            $hongo_breadcrumb_alignment     = get_theme_mod( 'hongo_default_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = get_theme_mod( 'hongo_default_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = get_theme_mod( 'hongo_default_title_bg_multiple_image', '' );
            $hongo_title_video_type         = get_theme_mod( 'hongo_default_title_video_type', 'self' );
            $hongo_title_video_mp4          = get_theme_mod( 'hongo_default_title_video_mp4', '' );
            $hongo_title_video_ogg          = get_theme_mod( 'hongo_default_title_video_ogg', '' );
            $hongo_title_video_webm         = get_theme_mod( 'hongo_default_title_video_webm', '' );
            $hongo_loop_video               = get_theme_mod( 'hongo_default_loop_video', '1' );
            $hongo_mute_video               = get_theme_mod( 'hongo_default_mute_video', '1' );
            $hongo_title_video_youtube      = get_theme_mod( 'hongo_default_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = get_theme_mod( 'hongo_default_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = get_theme_mod( 'hongo_default_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = get_theme_mod( 'hongo_default_title_text_transform', '' );
            $hongo_subtitle_text_transform  = get_theme_mod( 'hongo_default_title_subtitle_text_transform', '' );
            $hongo_breadcumbre_attribute    = ' itemscope="" itemtype="http://schema.org/BreadcrumbList"';

        } elseif( is_single() ) { // if single post

            $hongo_title                    = get_the_title();
            $hongo_title_class              = ' hongo-single-post-title';
            $hongo_subtitle_class           = ' hongo-single-post-subtitle';
            $hongo_breadcrumb_class         = ' hongo-single-post-breadcrumb';
            $hongo_enable_title             = hongo_option( 'hongo_single_post_enable_title', '1' );
            $hongo_top_space                = hongo_option( 'hongo_single_post_title_top_space', 'yes' );
            $container_style                = hongo_option( 'hongo_single_post_title_container_style', 'container' );
            $hongo_title_style              = hongo_option( 'hongo_single_post_title_style', 'page-title-style-1' );
            $hongo_enable_title_heading     = hongo_option( 'hongo_single_post_enable_title_heading', '1' );
            $content_height                 = hongo_option( 'hongo_single_post_title_height', '' );
            $hongo_title_after_header       = hongo_option( 'hongo_single_post_title_after_header', '0' );
            $hongo_title_opacity            = hongo_option( 'hongo_single_post_title_opacity', '0.8' );
            $hongo_title_bg_color           = hongo_option( 'hongo_single_post_title_bg_color', '' );
            $hongo_title_bg_image           = hongo_option( 'hongo_single_post_title_bg_image', '' );
            $hongo_title_image_srcset       = hongo_option( 'hongo_single_post_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = hongo_option( 'hongo_single_post_enable_subtitle', '' );
            $hongo_title_subtitle           = hongo_option( 'hongo_single_post_title_subtitle', '' );
            $hongo_enable_title_image       = hongo_option( 'hongo_single_post_enable_title_image', '1' );
            $hongo_parallax_effect          = hongo_option( 'hongo_single_post_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = hongo_option( 'hongo_single_post_enable_breadcrumb', '0' );
            $hongo_breadcrumb_alignment     = hongo_option( 'hongo_single_post_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = hongo_option( 'hongo_single_post_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = hongo_option( 'hongo_single_post_title_bg_multiple_image', '' );
            $hongo_title_video_type         = hongo_option( 'hongo_single_post_title_video_type', 'self' );
            $hongo_title_video_mp4          = hongo_option( 'hongo_single_post_title_video_mp4', '' );
            $hongo_title_video_ogg          = hongo_option( 'hongo_single_post_title_video_ogg', '' );
            $hongo_title_video_webm         = hongo_option( 'hongo_single_post_title_video_webm', '' );
            $hongo_loop_video               = hongo_option( 'hongo_single_post_loop_video', '1' );
            $hongo_mute_video               = hongo_option( 'hongo_single_post_mute_video', '1' );
            $hongo_title_video_youtube      = hongo_option( 'hongo_single_post_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = hongo_option( 'hongo_single_post_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = hongo_option( 'hongo_single_post_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = hongo_option( 'hongo_single_post_title_text_transform', '' );
            $hongo_subtitle_text_transform  = hongo_option( 'hongo_single_post_title_subtitle_text_transform', '' );
            $hongo_enable_category          = hongo_option( 'hongo_enable_category', '1' );
            $hongo_enable_author            = hongo_option( 'hongo_enable_author', '1' );
            $hongo_enable_date              = hongo_option( 'hongo_enable_date', '1' );
            $hongo_post_date_format         = hongo_option( 'hongo_post_date_format', '' );
            $hongo_breadcrumb_position      = hongo_option( 'hongo_single_post_breadcrumb_position', 'after-title-area' );
            $post_meta_transfrom            = hongo_option( 'hongo_single_post_meta_text_transform', '');
            $hongo_breadcumbre_attribute    = ' itemscope="" itemtype="http://schema.org/BreadcrumbList"';

            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

            // Post meta output for all style
            if( $hongo_enable_category == 1 ) {
                ob_start();
                    hongo_single_post_meta_category( get_the_ID() );
                    $hongo_post_meta_array[] = ob_get_contents();
                ob_end_clean();
            }
            if( $hongo_enable_author == 1 ) {
                $author = get_the_author();
                $hongo_post_meta_array[] = '<li><span>' . esc_html__( 'By', 'hongo' ) . ' <a href="' . esc_url( $author_url ) . '"> ' . esc_html( $author ) . '</a></span></li>';
            }
            if( $hongo_enable_date == 1 ) {
                $hongo_post_meta_array[] = '<li>' . esc_html( get_the_date( $hongo_post_date_format ) ) . '</li>';
            }       
            if( ! empty( $hongo_post_meta_array ) ) {
                $post_meta_transfrom = ' ' . $post_meta_transfrom;
                $hongo_single_post_meta_output .= '<ul class="hongo-post-details-meta'. esc_attr( $post_meta_transfrom ) . '">';
                    $hongo_single_post_meta_output .= implode( '', $hongo_post_meta_array );
                $hongo_single_post_meta_output .= '</ul>';
            }

        } else {
            
            $hongo_title                    = get_the_title();
            $hongo_title_class              = ' hongo-page-title';
            $hongo_subtitle_class           = ' hongo-page-subtitle';
            $hongo_breadcrumb_class         = ' hongo-page-breadcrumb';
            $hongo_enable_title             = hongo_option( 'hongo_page_enable_title', '1' );
            $hongo_top_space                = hongo_option( 'hongo_page_title_top_space', 'yes' );
            $container_style                = hongo_option( 'hongo_page_title_container_style', 'container' );
            $hongo_title_style              = hongo_option( 'hongo_page_title_style', 'page-title-style-5' );
            $hongo_enable_title_heading     = hongo_option( 'hongo_page_enable_title_heading', '1' );
            $content_height                 = hongo_option( 'hongo_page_title_height', '' );
            $hongo_title_after_header       = hongo_option( 'hongo_page_title_after_header', '0' );
            $hongo_title_opacity            = hongo_option( 'hongo_page_title_opacity', '0.8' );
            $hongo_title_bg_color           = hongo_option( 'hongo_page_title_bg_color', '' );
            $hongo_title_bg_image           = hongo_option( 'hongo_page_title_bg_image', '' );
            $hongo_title_image_srcset       = hongo_option( 'hongo_page_title_image_srcset', 'full' );
            $hongo_enable_subtitle          = hongo_option( 'hongo_page_enable_subtitle', '' );
            $hongo_title_subtitle           = hongo_option( 'hongo_page_title_subtitle', '' );
            $hongo_enable_title_image       = hongo_option( 'hongo_page_enable_title_image', '1' );
            $hongo_parallax_effect          = hongo_option( 'hongo_page_title_parallax_effect', '0.5');
            $hongo_enable_breadcrumb        = hongo_option( 'hongo_page_enable_breadcrumb', '0' );
            $hongo_breadcrumb_position      = hongo_option( 'hongo_page_breadcrumb_position', 'title-area' );
            $hongo_breadcrumb_alignment     = hongo_option( 'hongo_page_breadcrumb_alignment', 'left' );
            $hongo_title_subtitle_alignment = hongo_option( 'hongo_page_title_subtitle_alignment', '' );
            $hongo_title_bg_multiple_image  = hongo_option( 'hongo_page_title_bg_multiple_image', '' );
            $hongo_title_video_type         = hongo_option( 'hongo_page_title_video_type', 'self' );
            $hongo_title_video_mp4          = hongo_option( 'hongo_page_title_video_mp4', '' );
            $hongo_title_video_ogg          = hongo_option( 'hongo_page_title_video_ogg', '' );
            $hongo_title_video_webm         = hongo_option( 'hongo_page_title_video_webm', '' );
            $hongo_loop_video               = hongo_option( 'hongo_page_loop_video', '1' );
            $hongo_mute_video               = hongo_option( 'hongo_page_mute_video', '1' );
            $hongo_title_video_youtube      = hongo_option( 'hongo_page_title_video_youtube', '' );
            $hongo_title_scroll_to_down     = hongo_option( 'hongo_page_title_scroll_to_down', '1' );
            $hongo_title_callto_section_id  = hongo_option( 'hongo_page_title_callto_section_id', '#about' );
            $hongo_title_text_transform     = hongo_option( 'hongo_page_title_text_transform', 'text-uppercase' );
            $hongo_subtitle_text_transform  = hongo_option( 'hongo_page_title_subtitle_text_transform', '' );
            $hongo_breadcumbre_attribute    = ' itemscope="" itemtype="http://schema.org/BreadcrumbList"';
        }

        if( $hongo_enable_title != 1 || is_404() ) {
            return;
        }

        if( class_exists( 'WeDevs_Dokan' ) && dokan_is_store_page() ) {

            $store_user = dokan()->vendor->get( get_query_var( 'author' ) );
            $store_name = $store_user->get_shop_name();

            if ( ! empty( $store_name ) ) {
                $hongo_title = $store_name;
            }
        }

        if( class_exists( 'WeDevs_Dokan' ) && dokan_is_store_page() ) {

            $store_user = dokan()->vendor->get( get_query_var( 'author' ) );
            $store_name = $store_user->get_shop_name();

            if ( ! empty( $store_name ) ) {
                $hongo_title = $store_name;
            }
        }

        $hongo_title_parallax_effect = $content_height_class = $alignment_class = $hongo_title_bg_image_url = '';

        $hongo_loop_video  = $hongo_loop_video == 1 ? ' loop': '';
        $hongo_mute_video  = $hongo_mute_video == 1 ? ' muted': '';
        
        // Top space
        if( ( ! empty( $hongo_top_space ) && $hongo_top_space == 'yes' ) || empty( $hongo_top_space ) ) {

            $hongo_header_layout = hongo_option( 'hongo_header_type', 'headertype1' );
            if( $hongo_header_layout == 'headertype2' ) {

                $hongo_space_class = ' top-space';
            } else{
                $hongo_space_class = $hongo_title_after_header == 1 ? ' top-space': ' top-space-padding';   
            }
        } else {
            $hongo_space_class = '';
        }
             
        if( $hongo_enable_title_image != '0' ) {
            $hongo_title_bg_image_url   = ! empty( $hongo_title_bg_image ) ? $hongo_title_bg_image : '';
            $hongo_title_bg_image       = ! empty( $hongo_title_bg_image ) ? ' style="background-image: url('.esc_url( $hongo_title_bg_image ).'); background-repeat: no-repeat;"' : '';
            $hongo_title_parallax_effect= ( ! empty( $hongo_parallax_effect ) && $hongo_parallax_effect != 'no-parallax' ) ? ' data-vc-parallax-image="' . esc_attr( $hongo_parallax_effect ) . '"' : '';
            $hongo_title_parallax       = ( $hongo_title_parallax_effect ) ? ' parallax': ' cover-background';

        } else {
            
            $hongo_title_bg_image = '';
            if( $hongo_title_style == 'page-title-style-6' ) {
                $hongo_title_parallax   = ! empty( $hongo_parallax_effect ) && $hongo_parallax_effect != 'no-parallax' && $hongo_title_bg_color ? ' parallax': ' cover-background background-position-top';
            } else {
                $hongo_title_parallax   = ! empty( $hongo_parallax_effect ) && $hongo_parallax_effect != 'no-parallax' && $hongo_title_bg_color ? ' parallax': ' cover-background';
            }
        }

        // Content Height
        if( ! empty( $content_height ) ) {
            switch ( $content_height ) {
                case 'very-small-height':
                    $content_height_class = ' small-screen';
                    break;
                case 'small-height':
                    $content_height_class = ' one-second-screen';
                    break;
                case 'medium-height':
                    $content_height_class = ' one-third-screen';
                    break;
                case 'large-height':
                    $content_height_class = ' one-fourth-screen';
                    break;
                case 'extra-large-height':
                    $content_height_class = ' one-fifth-screen';
                    break;          
            }
        }

        // Content Alignment
        if( ! empty( $hongo_title_subtitle_alignment ) ) {
            switch( $hongo_title_subtitle_alignment ) {
                case 'right':
                    $alignment_class = ' text-right';
                    break;
                case 'center':
                    $alignment_class = ' text-center';
                    break;
                case 'left':
                    $alignment_class = ' text-left';
                    break;
            }
        }   
        
        $hongo_title_bg_image_overlay   = $hongo_title_opacity != '' ? '<div class="hongo-overlay bg-opacity-color"></div>' : '';
        $hongo_title_text_transform     = ! empty( $hongo_title_text_transform ) ? ' ' . $hongo_title_text_transform : '';
        $hongo_subtitle_text_transform  = ! empty( $hongo_subtitle_text_transform ) ? ' ' . $hongo_subtitle_text_transform : '';

        if( $hongo_breadcrumb_alignment == 'right' ) {
            $breadcrumb_class = ' text-right';
        } elseif( $hongo_breadcrumb_alignment == 'center' ) {
            $breadcrumb_class = ' text-center';
        } else{
            $breadcrumb_class = ' text-left';
        }

        $hongo_title_subtitle = ! empty( $hongo_title_subtitle ) ? str_replace( '||', '<br />', $hongo_title_subtitle ) : '';

        set_query_var( 'alignment_class', $alignment_class );
        set_query_var( 'hongo_title_parallax', $hongo_title_parallax );
        set_query_var( 'hongo_title_parallax_effect', $hongo_title_parallax_effect );
        set_query_var( 'hongo_title_bg_image_overlay', $hongo_title_bg_image_overlay );
        set_query_var( 'hongo_space_class', $hongo_space_class );
        set_query_var( 'hongo_title_subtitle', $hongo_title_subtitle );
        set_query_var( 'breadcrumb_class', $breadcrumb_class );
        set_query_var( 'hongo_title_bg_image_url', $hongo_title_bg_image_url );
        set_query_var( 'content_height_class', $content_height_class );

        set_query_var( 'hongo_title', $hongo_title );
        set_query_var( 'hongo_title_class', $hongo_title_class );
        set_query_var( 'hongo_subtitle_class', $hongo_subtitle_class );
        set_query_var( 'hongo_breadcrumb_class', $hongo_breadcrumb_class );
        set_query_var( 'hongo_enable_title', $hongo_enable_title );
        set_query_var( 'hongo_top_space', $hongo_top_space );
        set_query_var( 'container_style', $container_style );
        set_query_var( 'hongo_title_style', $hongo_title_style );
        set_query_var( 'hongo_enable_title_heading', $hongo_enable_title_heading );
        set_query_var( 'content_height', $content_height );
        set_query_var( 'hongo_title_after_header', $hongo_title_after_header );
        set_query_var( 'hongo_title_opacity', $hongo_title_opacity );
        set_query_var( 'hongo_title_bg_color', $hongo_title_bg_color );
        set_query_var( 'hongo_title_bg_image', $hongo_title_bg_image );
        set_query_var( 'hongo_title_image_srcset', $hongo_title_image_srcset );
        set_query_var( 'hongo_enable_subtitle', $hongo_enable_subtitle );
        set_query_var( 'hongo_title_subtitle', $hongo_title_subtitle );
        set_query_var( 'hongo_enable_title_image', $hongo_enable_title_image );
        set_query_var( 'hongo_parallax_effect', $hongo_parallax_effect );
        set_query_var( 'hongo_enable_breadcrumb', $hongo_enable_breadcrumb );
        set_query_var( 'hongo_breadcrumb_position', $hongo_breadcrumb_position );
        set_query_var( 'hongo_breadcrumb_alignment', $hongo_breadcrumb_alignment );
        set_query_var( 'hongo_title_subtitle_alignment', $hongo_title_subtitle_alignment );
        set_query_var( 'hongo_title_bg_multiple_image', $hongo_title_bg_multiple_image );
        set_query_var( 'hongo_title_video_type', $hongo_title_video_type );
        set_query_var( 'hongo_title_video_mp4', $hongo_title_video_mp4 );
        set_query_var( 'hongo_title_video_ogg', $hongo_title_video_ogg );
        set_query_var( 'hongo_title_video_webm', $hongo_title_video_webm );
        set_query_var( 'hongo_loop_video', $hongo_loop_video );
        set_query_var( 'hongo_mute_video', $hongo_mute_video );
        set_query_var( 'hongo_title_video_youtube', $hongo_title_video_youtube );
        set_query_var( 'hongo_title_scroll_to_down', $hongo_title_scroll_to_down );
        set_query_var( 'hongo_title_callto_section_id', $hongo_title_callto_section_id );
        set_query_var( 'hongo_title_text_transform', $hongo_title_text_transform );
        set_query_var( 'hongo_subtitle_text_transform', $hongo_subtitle_text_transform );
        set_query_var( 'hongo_breadcumbre_attribute', $hongo_breadcumbre_attribute );
        set_query_var( 'hongo_single_post_meta_output', $hongo_single_post_meta_output );

        switch ( $hongo_title_style ) {
            case 'page-title-style-1':
                get_template_part( 'templates/title/title', 'style-1' );
                break;
            case 'page-title-style-2':
                get_template_part( 'templates/title/title', 'style-2' );
                break;
            case 'page-title-style-3':
                get_template_part( 'templates/title/title', 'style-3' );
                break;
            case 'page-title-style-4':
                get_template_part( 'templates/title/title', 'style-4' );
                break;
            case 'page-title-style-5':
                get_template_part( 'templates/title/title', 'style-5' );
                break;
            case 'page-title-style-6':
                get_template_part( 'templates/title/title', 'style-6' );
                break;
            case 'page-title-style-7':
                get_template_part( 'templates/title/title', 'style-7' );
                break;
            case 'page-title-style-8':
                get_template_part( 'templates/title/title', 'style-8' );
                break;
            case 'page-title-style-9':
                get_template_part( 'templates/title/title', 'style-9' );
                break;
        }
    }
}
add_action( 'hongo_page_title_section', 'hongo_page_title_section' );

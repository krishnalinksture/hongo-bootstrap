<?php
/**
 * Generate css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

    $mobileAnimation  = hongo_option( 'hongo_enable_mobile_animation', '0' );

    $hongo_enable_main_font = get_theme_mod( 'hongo_enable_main_font', '1' );
    $hongo_enable_alt_font  = get_theme_mod( 'hongo_enable_alt_font', '1' );
    $hongo_main_font   = get_theme_mod( 'hongo_main_font', 'Source Sans Pro' ); // Source Sans Pro
    $hongo_alt_font    = get_theme_mod( 'hongo_alt_font', 'Poppins' ); // Poppins
    $hongo_header_svg_width = get_theme_mod( 'hongo_header_svg_width', '' );

    $hongo_logo = hongo_option( 'hongo_logo', '' );
    $hongo_logo_light = hongo_option( 'hongo_logo_light', '' );

    $hongo_logo_extension = $hongo_logo_light_extension = '';
    if( ! empty( $hongo_logo ) ) {
        $data = wp_check_filetype( $hongo_logo );
        $hongo_logo_extension = ! empty( $data['ext'] ) ? $data['ext'] : '';
    }
    if( ! empty( $hongo_logo_light ) ) {
        $data = wp_check_filetype( $hongo_logo_light );
        $hongo_logo_light_extension = ! empty( $data['ext'] ) ? $data['ext'] : '';
    }

    /* Body Settings */
    $hongo_body_font_size = get_theme_mod( 'hongo_body_font_size', '' );
    $hongo_body_font_line_height = get_theme_mod( 'hongo_body_font_line_height', '' );
    $hongo_body_font_letter_spacing = get_theme_mod( 'hongo_body_font_letter_spacing', '' );
    $hongo_body_background_color = hongo_option( 'hongo_body_background_color', '' );
    $hongo_body_text_color = get_theme_mod( 'hongo_body_text_color', '' );

    /* Content */
    $hongo_content_font_size = get_theme_mod( 'hongo_content_font_size', '' );
    $hongo_content_font_line_height = get_theme_mod( 'hongo_content_font_line_height', '' );
    $hongo_content_font_letter_spacing = get_theme_mod( 'hongo_content_font_letter_spacing', '' );
    $hongo_content_link_color = get_theme_mod( 'hongo_content_link_color', '' );
    $hongo_content_link_hover_color = get_theme_mod( 'hongo_content_link_hover_color', '' );
    
    /* Sticky Post Settings */
    $hongo_title_font_size_sticky = get_theme_mod( 'hongo_title_font_size_sticky', '' );
    $hongo_title_line_height_sticky = get_theme_mod( 'hongo_title_line_height_sticky', '' );
    $hongo_title_letter_spacing_sticky = get_theme_mod( 'hongo_title_letter_spacing_sticky', '' );
    $hongo_title_font_weight_sticky = get_theme_mod( 'hongo_title_font_weight_sticky', '' );
    $hongo_box_bg_color_sticky = get_theme_mod( 'hongo_box_bg_color_sticky', '' );
    $hongo_post_meta_color_sticky = get_theme_mod( 'hongo_post_meta_color_sticky', '' );
    $hongo_post_meta_hover_color_sticky = get_theme_mod( 'hongo_post_meta_hover_color_sticky', '' );
    $hongo_button_color_sticky = get_theme_mod( 'hongo_button_color_sticky', '' );
    $hongo_button_hover_color_sticky = get_theme_mod( 'hongo_button_hover_color_sticky', '' );
    $hongo_button_text_color_sticky = get_theme_mod( 'hongo_button_text_color_sticky', '' );
    $hongo_button_hover_text_color_sticky = get_theme_mod( 'hongo_button_hover_text_color_sticky', '' );
    $hongo_button_border_color_sticky = get_theme_mod( 'hongo_button_border_color_sticky', '' );
    $hongo_box_enable_border_sticky = get_theme_mod( 'hongo_box_enable_border_sticky', '1' );
    $hongo_box_border_color_sticky = get_theme_mod( 'hongo_box_border_color_sticky', '' );
    $hongo_box_border_size_sticky = get_theme_mod( 'hongo_box_border_size_sticky', '' );
    $hongo_box_border_type_sticky = get_theme_mod( 'hongo_box_border_type_sticky', '' );
    $hongo_title_color_sticky = get_theme_mod( 'hongo_title_color_sticky', '' );
    $hongo_title_hover_color_sticky = get_theme_mod( 'hongo_title_hover_color_sticky', '' );
    $hongo_content_font_size_sticky = get_theme_mod( 'hongo_content_font_size_sticky', '' );
    $hongo_content_line_height_sticky = get_theme_mod( 'hongo_content_line_height_sticky', '' );
    $hongo_content_letter_spacing_sticky = get_theme_mod( 'hongo_content_letter_spacing_sticky', '' );
    $hongo_content_font_weight_sticky = get_theme_mod( 'hongo_content_font_weight_sticky', '' );
    $hongo_content_color_sticky = get_theme_mod( 'hongo_content_color_sticky', '' );
    $hongo_meta_border_color_sticky = get_theme_mod( 'hongo_meta_border_color_sticky', '' );

    /* Archive Pages Settings */
    $hongo_blog_premade_style_archive = get_theme_mod( 'hongo_blog_premade_style_archive', 'blog-grid' );
    $hongo_category_bg_color_archive = get_theme_mod( 'hongo_category_bg_color_archive', '' );
    $hongo_category_bg_hover_color_archive = get_theme_mod( 'hongo_category_bg_hover_color_archive', '' );
    $hongo_category_border_color_archive = get_theme_mod( 'hongo_category_border_color_archive', '' );
    $hongo_category_border_hover_color_archive = get_theme_mod( 'hongo_category_border_hover_color_archive', '' );
    $hongo_box_bg_color_archive = get_theme_mod( 'hongo_box_bg_color_archive', '' );
    $hongo_box_bg_hover_color_archive = get_theme_mod( 'hongo_box_bg_hover_color_archive', '' );
    $hongo_image_opacity_archive = get_theme_mod( 'hongo_image_opacity_archive', '' );
    $hongo_image_opacity_color_archive = get_theme_mod( 'hongo_image_opacity_color_archive', '' );
    $hongo_post_meta_color_archive = get_theme_mod( 'hongo_post_meta_color_archive', '' );
    $hongo_post_meta_hover_color_archive = get_theme_mod( 'hongo_post_meta_hover_color_archive', '' );
    $hongo_button_color_archive = get_theme_mod( 'hongo_button_color_archive', '' );
    $hongo_button_hover_color_archive = get_theme_mod( 'hongo_button_hover_color_archive', '' );
    $hongo_button_text_color_archive = get_theme_mod( 'hongo_button_text_color_archive', '' );
    $hongo_button_hover_text_color_archive = get_theme_mod( 'hongo_button_hover_text_color_archive', '' );
    $hongo_button_border_color_archive = get_theme_mod( 'hongo_button_border_color_archive', '' );
    $hongo_button_hover_border_color_archive = get_theme_mod( 'hongo_button_hover_border_color_archive', '' );
    $hongo_separator_color_archive = get_theme_mod( 'hongo_separator_color_archive', '' );
    $hongo_box_enable_border_archive = get_theme_mod( 'hongo_box_enable_border_archive', 1 );
    $hongo_box_enable_shadow_archive = get_theme_mod( 'hongo_box_enable_shadow_archive', 1 );
    $hongo_box_border_color_archive = get_theme_mod( 'hongo_box_border_color_archive', '' );
    $hongo_box_border_size_archive = get_theme_mod( 'hongo_box_border_size_archive', '' );
    $hongo_box_border_type_archive = get_theme_mod( 'hongo_box_border_type_archive', '' );
    $hongo_title_font_size_archive = get_theme_mod( 'hongo_title_font_size_archive', '' );
    $hongo_title_line_height_archive = get_theme_mod( 'hongo_title_line_height_archive', '' );
    $hongo_title_letter_spacing_archive = get_theme_mod( 'hongo_title_letter_spacing_archive', '' );
    $hongo_title_font_weight_archive = get_theme_mod( 'hongo_title_font_weight_archive', '' );
    $hongo_title_color_archive = get_theme_mod( 'hongo_title_color_archive', '' );
    $hongo_title_hover_color_archive = get_theme_mod( 'hongo_title_hover_color_archive', '' );
    $hongo_content_font_size_archive = get_theme_mod( 'hongo_content_font_size_archive', '' );
    $hongo_content_line_height_archive = get_theme_mod( 'hongo_content_line_height_archive', '' );
    $hongo_content_letter_spacing_archive = get_theme_mod( 'hongo_content_letter_spacing_archive', '' );
    $hongo_content_font_weight_archive = get_theme_mod( 'hongo_content_font_weight_archive', '' );
    $hongo_content_color_archive = get_theme_mod( 'hongo_content_color_archive', '' );
    $hongo_show_separator_archive = get_theme_mod( 'hongo_show_separator_archive', 1 );
    $hongo_seperator_height_archive = get_theme_mod( 'hongo_seperator_height_archive', '' );
    $hongo_opacity_archive = get_theme_mod( 'hongo_opacity_archive', '' );
    $hongo_overlay_color_archive = get_theme_mod( 'hongo_overlay_color_archive', '' );
    $hongo_thumbnail_blur_effect_archive = get_theme_mod( 'hongo_thumbnail_blur_effect_archive', 1 );
    $hongo_thumbnail_zoom_effect_archive = get_theme_mod( 'hongo_thumbnail_zoom_effect_archive', 1 );

    /* Default Post Settings */
    $hongo_blog_premade_style_default = get_theme_mod( 'hongo_blog_premade_style_default', 'blog-grid' );
    $hongo_category_bg_color_default = get_theme_mod( 'hongo_category_bg_color_default', '' );
    $hongo_category_bg_hover_color_default = get_theme_mod( 'hongo_category_bg_hover_color_default', '' );
    $hongo_category_border_color_default = get_theme_mod( 'hongo_category_border_color_default', '' );
    $hongo_category_border_hover_color_default = get_theme_mod( 'hongo_category_border_hover_color_default', '' );
    $hongo_box_bg_color_default = get_theme_mod( 'hongo_box_bg_color_default', '' );
    $hongo_box_bg_hover_color_default = get_theme_mod( 'hongo_box_bg_hover_color_default', '' );
    $hongo_post_meta_color_default = get_theme_mod( 'hongo_post_meta_color_default', '' );
    $hongo_post_meta_hover_color_default = get_theme_mod( 'hongo_post_meta_hover_color_default', '' );
    $hongo_button_color_default = get_theme_mod( 'hongo_button_color_default', '' );
    $hongo_button_hover_color_default = get_theme_mod( 'hongo_button_hover_color_default', '' );
    $hongo_button_text_color_default = get_theme_mod( 'hongo_button_text_color_default', '' );
    $hongo_button_hover_text_color_default = get_theme_mod( 'hongo_button_hover_text_color_default', '' );
    $hongo_button_border_color_default = get_theme_mod( 'hongo_button_border_color_default', '' );
    $hongo_button_border_hover_color_default = get_theme_mod( 'hongo_button_border_hover_color_default', '' );
    $hongo_image_opacity_default = get_theme_mod( 'hongo_image_opacity_default', '' );
    $hongo_image_opacity_color_default = get_theme_mod( 'hongo_image_opacity_color_default', '' );
    $hongo_separator_color_default = get_theme_mod( 'hongo_separator_color_default', '' );
    $hongo_box_enable_shadow_default = get_theme_mod( 'hongo_box_enable_shadow_default', 1 );
    $hongo_box_enable_border_default = get_theme_mod( 'hongo_box_enable_border_default', 1 );
    $hongo_box_border_color_default = get_theme_mod( 'hongo_box_border_color_default', '' );
    $hongo_box_border_size_default = get_theme_mod( 'hongo_box_border_size_default', '' );
    $hongo_box_border_type_default = get_theme_mod( 'hongo_box_border_type_default', '' );
    $hongo_title_font_size_default = get_theme_mod( 'hongo_title_font_size_default', '' );
    $hongo_title_line_height_default = get_theme_mod( 'hongo_title_line_height_default', '' );
    $hongo_title_letter_spacing_default = get_theme_mod( 'hongo_title_letter_spacing_default', '' );
    $hongo_title_font_weight_default = get_theme_mod( 'hongo_title_font_weight_default', '' );
    $hongo_title_color_default = get_theme_mod( 'hongo_title_color_default', '' );
    $hongo_title_hover_color_default = get_theme_mod( 'hongo_title_hover_color_default', '' );
    $hongo_content_font_size_default = get_theme_mod( 'hongo_content_font_size_default', '' );
    $hongo_content_line_height_default = get_theme_mod( 'hongo_content_line_height_default', '' );
    $hongo_content_letter_spacing_default = get_theme_mod( 'hongo_content_letter_spacing_default', '' );
    $hongo_content_font_weight_default = get_theme_mod( 'hongo_content_font_weight_default', '' );
    $hongo_content_color_default = get_theme_mod( 'hongo_content_color_default', '' );
    $hongo_show_separator_default = get_theme_mod( 'hongo_show_separator_default', 1 );
    $hongo_seperator_height_default = get_theme_mod( 'hongo_seperator_height_default', '' );
    $hongo_opacity_default = get_theme_mod( 'hongo_opacity_default', '0.5' );
    $hongo_overlay_color_default = get_theme_mod( 'hongo_overlay_color_default', '' );
    $hongo_show_post_thumbnail_zoom_effect_default = get_theme_mod( 'hongo_show_post_thumbnail_zoom_effect_default', 1 );

    /* Post Detail Page Settings */
    $hongo_related_post_general_title_color = get_theme_mod( 'hongo_related_post_general_title_color', '' );
    $hongo_related_post_title_color = hongo_option( 'hongo_related_post_title_color', '' );
    $hongo_related_post_title_hover_color = hongo_option( 'hongo_related_post_title_hover_color', '' );
    $hongo_related_post_meta_color = hongo_option( 'hongo_related_post_meta_color', '' );
    $hongo_related_post_meta_hover_color = hongo_option( 'hongo_related_post_meta_hover_color', '' );
    $hongo_related_post_content_color = hongo_option( 'hongo_related_post_content_color', '' );
    $hongo_related_post_separator_color = hongo_option( 'hongo_related_post_separator_color', '' );
    $hongo_related_posts_opacity = hongo_option( 'hongo_related_posts_opacity', '0.5' );
    $hongo_related_post_overlay_color = hongo_option( 'hongo_related_post_overlay_color', '' );
    $hongo_post_tag_like_color = hongo_option( 'hongo_post_tag_like_color', '' );
    $hongo_post_tag_like_hover_color = hongo_option( 'hongo_post_tag_like_hover_color', '' );
    $hongo_post_tag_hover_bg_color = hongo_option( 'hongo_post_tag_hover_bg_color', '' );
    $hongo_main_top_section_space = get_theme_mod( 'hongo_main_top_section_space', '' );
    $hongo_main_bottom_section_space = get_theme_mod( 'hongo_main_bottom_section_space', '' );
    $hongo_single_post_meta_text_color = hongo_option( 'hongo_single_post_meta_text_color', '' );
    $hongo_single_post_meta_text_hover_color = hongo_option( 'hongo_single_post_meta_text_hover_color', '' );
    
    $hongo_post_author_box_bg_color = hongo_option( 'hongo_post_author_box_bg_color', '' );
    $hongo_post_author_title_text_color = hongo_option( 'hongo_post_author_title_text_color', '' );
    $hongo_post_author_title_text_hover_color = hongo_option( 'hongo_post_author_title_text_hover_color', '' );
    $hongo_post_author_content_color = hongo_option( 'hongo_post_author_content_color', '' );
    $hongo_button_color_author_box = get_theme_mod( 'hongo_button_color_author_box', '' );
    $hongo_button_hover_color_author_box = get_theme_mod( 'hongo_button_hover_color_author_box', '' );
    $hongo_button_text_color_author_box = get_theme_mod( 'hongo_button_text_color_author_box', '' );
    $hongo_button_hover_text_color_author_box = get_theme_mod( 'hongo_button_hover_text_color_author_box', '' );
    $hongo_button_border_color_author_box = get_theme_mod( 'hongo_button_border_color_author_box', '' );
    $hongo_button_hover_border_color_author_box = get_theme_mod( 'hongo_button_hover_border_color_author_box', '' );

    /* Comment Settings */
    $hongo_comment_title_font_size = get_theme_mod( 'hongo_comment_title_font_size', '' );
    $hongo_comment_title_font_line_height = get_theme_mod( 'hongo_comment_title_font_line_height', '' );
    $hongo_comment_title_font_letter_spacing = get_theme_mod( 'hongo_comment_title_font_letter_spacing', '' );
    $hongo_general_comment_title_color = get_theme_mod( 'hongo_general_comment_title_color', '' );

    /* 404 page Settings */
    $hongo_404_main_title_color = get_theme_mod( 'hongo_404_main_title_color', '' );
    $hongo_404_title_color = get_theme_mod( 'hongo_404_title_color', '' );
    $hongo_404_subtitle_color = get_theme_mod( 'hongo_404_subtitle_color', '' );
    $hongo_page_not_found_button_text_transform = get_theme_mod( 'hongo_page_not_found_button_text_transform', '' );

    /* Scroll to Top Button */
    $hongo_scroll_to_top_font_size = get_theme_mod( 'hongo_scroll_to_top_font_size', '' );
    $hongo_scroll_to_top_line_height = get_theme_mod( 'hongo_scroll_to_top_line_height', '' );
    $hongo_scroll_to_top_font_weight = get_theme_mod( 'hongo_scroll_to_top_font_weight', '' );
    $hongo_scroll_to_top_icon_font_size = get_theme_mod( 'hongo_scroll_to_top_icon_font_size', '' );
    $hongo_scroll_to_top_color = get_theme_mod( 'hongo_scroll_to_top_color', '' );
    $hongo_scroll_to_top_hover_color = get_theme_mod( 'hongo_scroll_to_top_hover_color', '' );

    /* GDPR General Settings */
    $hongo_gdpr_box_background_color = get_theme_mod( 'hongo_gdpr_box_background_color', '' );
    $hongo_gdpr_overlay_color = get_theme_mod( 'hongo_gdpr_overlay_color', '' );

    /* GDPR Content Settings */
    $hongo_gdpr_content_font_size = get_theme_mod( 'hongo_gdpr_content_font_size', '' );
    $hongo_gdpr_content_line_height = get_theme_mod( 'hongo_gdpr_content_line_height', '' );
    $hongo_gdpr_content_letter_spacing = get_theme_mod( 'hongo_gdpr_content_letter_spacing', '' );
    $hongo_gdpr_content_font_weight = get_theme_mod( 'hongo_gdpr_content_font_weight', '' );
    $hongo_gdpr_content_color = get_theme_mod( 'hongo_gdpr_content_color', '' );
    $hongo_gdpr_content_hover_color = get_theme_mod( 'hongo_gdpr_content_hover_color', '' );

    /* GDPR Button Settings */
    $hongo_gdpr_button_font_size = get_theme_mod( 'hongo_gdpr_button_font_size', '' );
    $hongo_gdpr_button_line_height = get_theme_mod( 'hongo_gdpr_button_line_height', '' );
    $hongo_gdpr_button_letter_spacing = get_theme_mod( 'hongo_gdpr_button_letter_spacing', '' );
    $hongo_gdpr_button_font_weight = get_theme_mod( 'hongo_gdpr_button_font_weight', '' );
    $hongo_gdpr_button_bg_color = get_theme_mod( 'hongo_gdpr_button_bg_color', '' );
    $hongo_gdpr_button_bg_hover_color = get_theme_mod( 'hongo_gdpr_button_bg_hover_color', '' );
    $hongo_gdpr_button_color = get_theme_mod( 'hongo_gdpr_button_color', '' );
    $hongo_gdpr_button_hover_color = get_theme_mod( 'hongo_gdpr_button_hover_color', '' );
    $hongo_gdpr_button_border_color = get_theme_mod( 'hongo_gdpr_button_border_color', '' );
    $hongo_gdpr_button_border_hover_color = get_theme_mod( 'hongo_gdpr_button_border_hover_color', '' );

    /* Box Width */
    $hongo_enable_box_layout = get_theme_mod( 'hongo_enable_box_layout', '' );
    $hongo_enable_box_layout_width = get_theme_mod( 'hongo_enable_box_layout_width', '' );

    /* Heading Settings */
    $hongo_h1_font_size = hongo_option( 'hongo_h1_font_size', '' );
    $hongo_h1_font_line_height = hongo_option( 'hongo_h1_font_line_height', '' );
    $hongo_h1_font_letter_spacing = hongo_option( 'hongo_h1_font_letter_spacing', '' );
    $hongo_heading_h1_color = hongo_option( 'hongo_heading_h1_color', '' );
    $hongo_h2_font_size = hongo_option( 'hongo_h2_font_size', '' );
    $hongo_h2_font_line_height = hongo_option( 'hongo_h2_font_line_height', '' );
    $hongo_h2_font_letter_spacing = hongo_option( 'hongo_h2_font_letter_spacing', '' );
    $hongo_heading_h2_color = hongo_option( 'hongo_heading_h2_color', '' );
    $hongo_h3_font_size = hongo_option( 'hongo_h3_font_size', '' );
    $hongo_h3_font_line_height = hongo_option( 'hongo_h3_font_line_height', '' );
    $hongo_h3_font_letter_spacing = hongo_option( 'hongo_h3_font_letter_spacing', '' );
    $hongo_heading_h3_color = hongo_option( 'hongo_heading_h3_color', '' );
    $hongo_h4_font_size = hongo_option( 'hongo_h4_font_size', '' );
    $hongo_h4_font_line_height = hongo_option( 'hongo_h4_font_line_height', '' );
    $hongo_h4_font_letter_spacing = hongo_option( 'hongo_h4_font_letter_spacing', '' );
    $hongo_heading_h4_color = hongo_option( 'hongo_heading_h4_color', '' );
    $hongo_h5_font_size = hongo_option( 'hongo_h5_font_size', '' );
    $hongo_h5_font_line_height = hongo_option( 'hongo_h5_font_line_height', '' );
    $hongo_h5_font_letter_spacing = hongo_option( 'hongo_h5_font_letter_spacing', '' );
    $hongo_heading_h5_color = hongo_option( 'hongo_heading_h5_color', '' );
    $hongo_h6_font_size = hongo_option( 'hongo_h6_font_size', '' );
    $hongo_h6_font_line_height = hongo_option( 'hongo_h6_font_line_height', '' );
    $hongo_h6_font_letter_spacing = hongo_option( 'hongo_h6_font_letter_spacing', '' );
    $hongo_heading_h6_color = hongo_option( 'hongo_heading_h6_color', '' );

    /* Custom Font Settings */
    $hongo_custom_fonts = get_theme_mod('hongo_custom_fonts');
    $hongo_custom_fonts = ! empty( $hongo_custom_fonts ) ? json_decode( $hongo_custom_fonts ) : array();

    /* if WooCommerce plugin is activated */
    if ( hongo_is_woocommerce_activated() ) {

        /* Mini Cart Settings */
        $hongo_mini_cart_usp_text_font_size = get_theme_mod( 'hongo_mini_cart_usp_text_font_size', '' );
        $hongo_mini_cart_usp_text_line_height = get_theme_mod( 'hongo_mini_cart_usp_text_line_height', '' );
        $hongo_mini_cart_usp_text_letter_spacing = get_theme_mod( 'hongo_mini_cart_usp_text_letter_spacing', '' );
        $hongo_mini_cart_usp_text_font_weight = get_theme_mod( 'hongo_mini_cart_usp_text_font_weight', '' );
        $hongo_mini_cart_usp_text_transform = get_theme_mod( 'hongo_mini_cart_usp_text_transform', '' );
        $hongo_mini_cart_usp_color = get_theme_mod( 'hongo_mini_cart_usp_color', '' );

        $hongo_mini_cart_background_color = get_theme_mod( 'hongo_mini_cart_background_color', '' );
        $hongo_mini_cart_separator_color = get_theme_mod( 'hongo_mini_cart_separator_color', '' );
        $hongo_mini_cart_close_button_color = get_theme_mod( 'hongo_mini_cart_close_button_color', '' );
        $hongo_mini_cart_title_font_size = get_theme_mod( 'hongo_mini_cart_title_font_size', '' );
        $hongo_mini_cart_title_line_height = get_theme_mod( 'hongo_mini_cart_title_line_height', '' );
        $hongo_mini_cart_title_letter_spacing = get_theme_mod( 'hongo_mini_cart_title_letter_spacing', '' );
        $hongo_mini_cart_title_font_weight = get_theme_mod( 'hongo_mini_cart_title_font_weight', '' );
        $hongo_mini_cart_title_text_transform = get_theme_mod( 'hongo_mini_cart_title_text_transform', '' );
        $hongo_mini_cart_title_color = get_theme_mod( 'hongo_mini_cart_title_color', '' );
        $hongo_mini_cart_title_hover_color = get_theme_mod( 'hongo_mini_cart_title_hover_color', '' );

        $hongo_mini_cart_price_font_size = get_theme_mod( 'hongo_mini_cart_price_font_size', '' );
        $hongo_mini_cart_price_line_height = get_theme_mod( 'hongo_mini_cart_price_line_height', '' );
        $hongo_mini_cart_price_letter_spacing = get_theme_mod( 'hongo_mini_cart_price_letter_spacing', '' );
        $hongo_mini_cart_price_font_weight = get_theme_mod( 'hongo_mini_cart_price_font_weight', '' );
        $hongo_mini_cart_price_color = get_theme_mod( 'hongo_mini_cart_price_color', '' );

        $hongo_mini_cart_subtotal_label_font_size = get_theme_mod( 'hongo_mini_cart_subtotal_label_font_size', '' );
        $hongo_mini_cart_subtotal_label_line_height = get_theme_mod( 'hongo_mini_cart_subtotal_label_line_height', '' );
        $hongo_mini_cart_subtotal_label_letter_spacing = get_theme_mod( 'hongo_mini_cart_subtotal_label_letter_spacing', '' );
        $hongo_mini_cart_subtotal_label_font_weight = get_theme_mod( 'hongo_mini_cart_subtotal_label_font_weight', '' );
        $hongo_mini_cart_subtotal_label_text_transform = get_theme_mod( 'hongo_mini_cart_subtotal_label_text_transform', '' );
        $hongo_mini_cart_subtotal_label_color = get_theme_mod( 'hongo_mini_cart_subtotal_label_color', '' );

        $hongo_mini_cart_subtotal_font_size = get_theme_mod( 'hongo_mini_cart_subtotal_font_size', '' );
        $hongo_mini_cart_subtotal_line_height = get_theme_mod( 'hongo_mini_cart_subtotal_line_height', '' );
        $hongo_mini_cart_subtotal_letter_spacing = get_theme_mod( 'hongo_mini_cart_subtotal_letter_spacing', '' );
        $hongo_mini_cart_subtotal_font_weight = get_theme_mod( 'hongo_mini_cart_subtotal_font_weight', '' );
        $hongo_mini_cart_subtotal_color = get_theme_mod( 'hongo_mini_cart_subtotal_color', '' );
        
        $hongo_mini_cart_button_font_size = get_theme_mod( 'hongo_mini_cart_button_font_size', '' );
        $hongo_mini_cart_button_line_height = get_theme_mod( 'hongo_mini_cart_button_line_height', '' );
        $hongo_mini_cart_button_letter_spacing = get_theme_mod( 'hongo_mini_cart_button_letter_spacing', '' );
        $hongo_mini_cart_button_font_weight = get_theme_mod( 'hongo_mini_cart_button_font_weight', '' );
        $hongo_mini_cart_button_text_transform = get_theme_mod( 'hongo_mini_cart_button_text_transform', '' );

        $hongo_mini_cart_button_color = get_theme_mod( 'hongo_mini_cart_button_color', '' );
        $hongo_mini_cart_button_hover_color = get_theme_mod( 'hongo_mini_cart_button_hover_color', '' );
        $hongo_mini_cart_bg_button_color = get_theme_mod( 'hongo_mini_cart_bg_button_color', '' );
        $hongo_mini_cart_button_bg_hover_color = get_theme_mod( 'hongo_mini_cart_button_bg_hover_color', '' );
        $hongo_mini_cart_border_button_color = get_theme_mod( 'hongo_mini_cart_border_button_color', '' );
        $hongo_mini_cart_button_border_hover_color = get_theme_mod( 'hongo_mini_cart_button_border_hover_color', '' );

        $hongo_mini_cart_checkout_button_color = get_theme_mod( 'hongo_mini_cart_checkout_button_color', '' );
        $hongo_mini_cart_checkout_button_hover_color = get_theme_mod( 'hongo_mini_cart_checkout_button_hover_color', '' );
        $hongo_mini_cart_bg_checkout_button_color = get_theme_mod( 'hongo_mini_cart_bg_checkout_button_color', '' );
        $hongo_mini_cart_checkout_button_bg_hover_color = get_theme_mod( 'hongo_mini_cart_checkout_button_bg_hover_color', '' );
        $hongo_mini_cart_border_checkout_button_color = get_theme_mod( 'hongo_mini_cart_border_checkout_button_color', '' );
        $hongo_mini_cart_checkout_button_border_hover_color = get_theme_mod( 'hongo_mini_cart_checkout_button_border_hover_color', '' );

        /* Product Archive Box hover overlay color */
        $hongo_product_archive_box_hover_overlay_color = get_theme_mod( 'hongo_product_archive_box_hover_overlay_color', '' );

        /* Product Archive gallery slider */
        $hongo_product_archive_product_gallery_slider_icon_color = get_theme_mod( 'hongo_product_archive_product_gallery_slider_icon_color', '' );
        $hongo_product_archive_product_gallery_slider_navigation_bg_color = get_theme_mod( 'hongo_product_archive_product_gallery_slider_navigation_bg_color', '' );

        /* Product Archive countdown deal */
        $hongo_product_archive_product_deal_number_color = get_theme_mod( 'hongo_product_archive_product_deal_number_color', '' );
        $hongo_product_archive_product_deal_text_color = get_theme_mod( 'hongo_product_archive_product_deal_text_color', '' );
        $hongo_product_archive_product_deal_bg_color = get_theme_mod( 'hongo_product_archive_product_deal_bg_color', '' );

        /* Product Archive or Shop Product Sale */
        $hongo_product_archive_product_sale_font_size = get_theme_mod( 'hongo_product_archive_product_sale_font_size', '' );
        $hongo_product_archive_product_sale_line_height = get_theme_mod( 'hongo_product_archive_product_sale_line_height', '' );
        $hongo_product_archive_product_sale_letter_spacing = get_theme_mod( 'hongo_product_archive_product_sale_letter_spacing', '' );
        $hongo_product_archive_product_sale_font_weight = get_theme_mod( 'hongo_product_archive_product_sale_font_weight', '' );
        $hongo_product_archive_product_sale_text_transform = get_theme_mod( 'hongo_product_archive_product_sale_text_transform', '' );
        $hongo_product_archive_product_sale_color = get_theme_mod( 'hongo_product_archive_product_sale_color', '' );
        $hongo_product_archive_product_sale_bg_color = get_theme_mod( 'hongo_product_archive_product_sale_bg_color', '' );
        $hongo_product_archive_product_new_color = get_theme_mod( 'hongo_product_archive_product_new_color', '' );
        $hongo_product_archive_product_new_bg_color = get_theme_mod( 'hongo_product_archive_product_new_bg_color', '' );
        $hongo_product_archive_product_soldout_color = get_theme_mod( 'hongo_product_archive_product_soldout_color', '' );
        $hongo_product_archive_product_soldout_bg_color = get_theme_mod( 'hongo_product_archive_product_soldout_bg_color', '' );

        /* Product Archive or Shop Product Title */
        $hongo_product_archive_product_title_font_size = get_theme_mod( 'hongo_product_archive_product_title_font_size', '' );
        $hongo_product_archive_product_title_line_height = get_theme_mod( 'hongo_product_archive_product_title_line_height', '' );
        $hongo_product_archive_product_title_letter_spacing = get_theme_mod( 'hongo_product_archive_product_title_letter_spacing', '' );
        $hongo_product_archive_product_title_font_weight = get_theme_mod( 'hongo_product_archive_product_title_font_weight', '' );
        $hongo_product_archive_product_title_text_transform = get_theme_mod( 'hongo_product_archive_product_title_text_transform', '' );
        $hongo_product_archive_product_title_color = get_theme_mod( 'hongo_product_archive_product_title_color', '' );
        $hongo_product_archive_product_title_hover_color = get_theme_mod( 'hongo_product_archive_product_title_hover_color', '' );

        /* Archive Product Short Description Color */
        $hongo_product_archive_short_desc_color = get_theme_mod( 'hongo_product_archive_short_desc_color', '' );

        /* Product Archive or Shop Product Rating Star Color */
        $hongo_product_archive_product_rating_star_color = get_theme_mod( 'hongo_product_archive_product_rating_star_color', '' );

        /* Product Archive or Shop Product Price */
        $hongo_product_archive_product_price_font_size = get_theme_mod( 'hongo_product_archive_product_price_font_size', '' );
        $hongo_product_archive_product_price_line_height = get_theme_mod( 'hongo_product_archive_product_price_line_height', '' );
        $hongo_product_archive_product_price_letter_spacing = get_theme_mod( 'hongo_product_archive_product_price_letter_spacing', '' );
        $hongo_product_archive_product_price_font_weight = get_theme_mod( 'hongo_product_archive_product_price_font_weight', '' );
        $hongo_product_archive_product_price_color = get_theme_mod( 'hongo_product_archive_product_price_color', '' );
        $hongo_product_archive_product_regular_price_color = get_theme_mod( 'hongo_product_archive_product_regular_price_color', '' );

        /* Product Archive or Shop Product Button */
        $hongo_product_archive_product_button_color = get_theme_mod( 'hongo_product_archive_product_button_color', '' );
        $hongo_product_archive_product_icon_color = get_theme_mod( 'hongo_product_archive_product_icon_color', '' );
        $hongo_product_archive_product_button_bg_color = get_theme_mod( 'hongo_product_archive_product_button_bg_color', '' );
        $hongo_product_archive_product_icon_bg_color = get_theme_mod( 'hongo_product_archive_product_icon_bg_color', '' );
        $hongo_product_archive_product_box_bg_color = get_theme_mod( 'hongo_product_archive_product_box_bg_color', '' );
        $hongo_product_archive_product_button_border_color = get_theme_mod( 'hongo_product_archive_product_button_border_color', '' );
        $hongo_product_archive_product_button_border_hover_color = get_theme_mod( 'hongo_product_archive_product_button_border_hover_color', '' );
        $hongo_product_archive_product_button_hover_color = get_theme_mod( 'hongo_product_archive_product_button_hover_color', '' );
        $hongo_product_archive_product_icon_hover_color = get_theme_mod( 'hongo_product_archive_product_icon_hover_color', '' );
        $hongo_product_archive_product_button_hover_bg_color = get_theme_mod( 'hongo_product_archive_product_button_hover_bg_color', '' );
        $hongo_product_archive_product_icon_hover_bg_color = get_theme_mod( 'hongo_product_archive_product_icon_hover_bg_color', '' );
        $hongo_product_archive_product_button_separator_color = get_theme_mod( 'hongo_product_archive_product_button_separator_color', '' );

        /* Single Product Padding Top / Bottom */
        $hongo_single_product_padding_top = hongo_option( 'hongo_single_product_padding_top', '' );
        $hongo_single_product_padding_bottom = hongo_option( 'hongo_single_product_padding_bottom', '' );

        $hongo_single_product_separator_color = hongo_option( 'hongo_single_product_separator_color', '' );

        /* Single Product countdown deal */
        $hongo_single_product_deal_number_color = hongo_option( 'hongo_single_product_deal_number_color', '' );
        $hongo_single_product_deal_text_color = hongo_option( 'hongo_single_product_deal_text_color', '' );

        /* Single Product Sale */
        $hongo_single_product_page_enable_image_zoom_effect = hongo_option( 'hongo_single_product_page_enable_image_zoom_effect', '1' );
        $hongo_single_product_sale_font_size = hongo_option( 'hongo_single_product_sale_font_size', '' );
        $hongo_single_product_sale_line_height = hongo_option( 'hongo_single_product_sale_line_height', '' );
        $hongo_single_product_sale_letter_spacing = hongo_option( 'hongo_single_product_sale_letter_spacing', '' );
        $hongo_single_product_sale_font_weight = hongo_option( 'hongo_single_product_sale_font_weight', '' );
        $hongo_single_product_zoom_icon_bg_color = hongo_option( 'hongo_single_product_zoom_icon_bg_color', '' );
        $hongo_single_product_sale_color = hongo_option( 'hongo_single_product_sale_color', '' );
        $hongo_single_product_sale_bg_color = hongo_option( 'hongo_single_product_sale_bg_color', '' );
        $hongo_single_product_bg_color = hongo_option( 'hongo_single_product_bg_color', '' );
        $hongo_single_product_new_color = hongo_option( 'hongo_single_product_new_color', '' );
        $hongo_single_product_new_bg_color = hongo_option( 'hongo_single_product_new_bg_color', '' );
        $hongo_single_product_soldout_color = hongo_option( 'hongo_single_product_soldout_color', '' );
        $hongo_single_product_soldout_bg_color = hongo_option( 'hongo_single_product_soldout_bg_color', '' );

        /* Single Product Title */
        $hongo_single_product_page_title_font_size = hongo_option( 'hongo_single_product_page_title_font_size', '' );
        $hongo_single_product_page_title_line_height = hongo_option( 'hongo_single_product_page_title_line_height', '' );
        $hongo_single_product_page_title_letter_spacing = hongo_option( 'hongo_single_product_page_title_letter_spacing', '' );
        $hongo_single_product_page_title_font_weight = hongo_option( 'hongo_single_product_page_title_font_weight', '' );
        $hongo_single_product_page_title_font_transform = hongo_option( 'hongo_single_product_page_title_font_transform', '' );
        $hongo_single_product_page_title_color = hongo_option( 'hongo_single_product_page_title_color', '' );

        /* Single Product Rating Star Color */
        $hongo_single_product_rating_star_color = hongo_option( 'hongo_single_product_rating_star_color', '' );

        /* Single Product Price */
        $hongo_single_product_price_font_size = hongo_option( 'hongo_single_product_price_font_size', '' );
        $hongo_single_product_price_line_height = hongo_option( 'hongo_single_product_price_line_height', '' );
        $hongo_single_product_price_letter_spacing = hongo_option( 'hongo_single_product_price_letter_spacing', '' );
        $hongo_single_product_price_font_weight = hongo_option( 'hongo_single_product_price_font_weight', '' );
        $hongo_single_product_price_color = hongo_option( 'hongo_single_product_price_color', '' );
        $hongo_single_product_regular_price_color = hongo_option( 'hongo_single_product_regular_price_color', '' );

        /* Single Product Short Description */
        $hongo_single_product_short_description_font_size = hongo_option( 'hongo_single_product_short_description_font_size', '' );
        $hongo_single_product_short_description_line_height = hongo_option( 'hongo_single_product_short_description_line_height', '' );
        $hongo_single_product_short_description_letter_spacing = hongo_option( 'hongo_single_product_short_description_letter_spacing', '' );
        $hongo_single_product_short_description_font_weight = hongo_option( 'hongo_single_product_short_description_font_weight', '' );
        $hongo_single_product_short_description_color = hongo_option( 'hongo_single_product_short_description_color', '' );

        /* Single Product Stock */
        $hongo_single_product_stock_font_size = hongo_option( 'hongo_single_product_stock_font_size', '' );
        $hongo_single_product_stock_line_height = hongo_option( 'hongo_single_product_stock_line_height', '' );
        $hongo_single_product_stock_font_weight = hongo_option( 'hongo_single_product_stock_font_weight', '' );
        $hongo_single_product_stock_letter_spacing = hongo_option( 'hongo_single_product_stock_letter_spacing', '' );
        $hongo_single_product_stock_color = hongo_option( 'hongo_single_product_stock_color', '' );
        $hongo_single_product_out_of_stock_color = hongo_option( 'hongo_single_product_out_of_stock_color', '' );

        /* Single Product Quantity input colors */
        $hongo_single_product_quantity_border_color = hongo_option( 'hongo_single_product_quantity_border_color', '' );
        $hongo_single_product_quantity_color = hongo_option( 'hongo_single_product_quantity_color', '' );

        /* Single Product Button */
        $hongo_single_product_button_color = hongo_option( 'hongo_single_product_button_color', '' );
        $hongo_single_product_button_bg_color = hongo_option( 'hongo_single_product_button_bg_color', '' );
        $hongo_single_product_button_border_color = hongo_option( 'hongo_single_product_button_border_color', '' );
        $hongo_single_product_button_hover_color = hongo_option( 'hongo_single_product_button_hover_color', '' );
        $hongo_single_product_button_hover_bg_color = hongo_option( 'hongo_single_product_button_hover_bg_color', '' );
        $hongo_single_product_button_hover_border_color = hongo_option( 'hongo_single_product_button_hover_border_color', '' );

        /* Single Product Meta */
        $hongo_single_product_page_meta_font_size = hongo_option( 'hongo_single_product_page_meta_font_size', '' );
        $hongo_single_product_page_meta_line_height = hongo_option( 'hongo_single_product_page_meta_line_height', '' );
        $hongo_single_product_page_meta_letter_spacing = hongo_option( 'hongo_single_product_page_meta_letter_spacing', '' );
        $hongo_single_product_page_meta_font_weight = hongo_option( 'hongo_single_product_page_meta_font_weight', '' );
        $hongo_single_product_page_meta_color = hongo_option( 'hongo_single_product_page_meta_color', '' );
        $hongo_single_product_page_meta_link_hover_color = hongo_option( 'hongo_single_product_page_meta_link_hover_color', '' );
        $hongo_single_product_page_meta_heading_color = hongo_option( 'hongo_single_product_page_meta_heading_color', '' );
        $hongo_single_product_page_meta_social_icon_color = hongo_option( 'hongo_single_product_page_meta_social_icon_color', '' );
        $hongo_single_product_page_meta_social_icon_hover_color = hongo_option( 'hongo_single_product_page_meta_social_icon_hover_color', '' );

        /* Single Product Tab */
        $hongo_single_product_page_tab_font_size = hongo_option( 'hongo_single_product_page_tab_font_size', '' );
        $hongo_single_product_page_tab_line_height = hongo_option( 'hongo_single_product_page_tab_line_height', '' );
        $hongo_single_product_page_tab_letter_spacing = hongo_option( 'hongo_single_product_page_tab_letter_spacing', '' );
        $hongo_single_product_page_tab_font_weight = hongo_option( 'hongo_single_product_page_tab_font_weight', '' );
        $hongo_single_product_page_tab_color = hongo_option( 'hongo_single_product_page_tab_color', '' );
        $hongo_single_product_page_tab_hover_color = hongo_option( 'hongo_single_product_page_tab_hover_color', '' );
        $hongo_single_product_page_tab_active_color = hongo_option( 'hongo_single_product_page_tab_active_color', '' );

        /* Product List ( Related / Upsell ) Slider color*/
        $hongo_single_product_list_pagination_color = hongo_option( 'hongo_single_product_list_pagination_color', '' );
        $hongo_single_product_list_active_pagination_color = hongo_option( 'hongo_single_product_list_active_pagination_color', '' );
        $hongo_single_product_list_navigation_color = hongo_option( 'hongo_single_product_list_navigation_color', '' );

        /* Product List ( Related / Upsell ) Heading */
        $hongo_single_product_list_heading_font_size = hongo_option( 'hongo_single_product_list_heading_font_size', '' );
        $hongo_single_product_list_heading_line_height = hongo_option( 'hongo_single_product_list_heading_line_height', '' );
        $hongo_single_product_list_heading_letter_spacing = hongo_option( 'hongo_single_product_list_heading_letter_spacing', '' );
        $hongo_single_product_list_heading_font_weight = hongo_option( 'hongo_single_product_list_heading_font_weight', '' );
        $hongo_single_product_list_heading_color = hongo_option( 'hongo_single_product_list_heading_color', '' );
        $hongo_single_product_list_heading_hover_color = hongo_option( 'hongo_single_product_list_heading_hover_color', '' );
        $hongo_single_product_list_heading_active_color = hongo_option( 'hongo_single_product_list_heading_active_color', '' );

    }
?>

<?php if( $hongo_enable_main_font && $hongo_main_font ) : ?>
/* Body Font Family */
body, .main-font, .hongo-timer-style-3.counter-event .counter-box .number:before { font-family: '<?php echo sprintf( '%s', $hongo_main_font ); ?>', sans-serif; }
rs-slides .main-font { font-family: '<?php echo sprintf( '%s', $hongo_main_font ); ?>', sans-serif !important; }
<?php endif; ?>
<?php if( $hongo_enable_alt_font && $hongo_alt_font ) : ?>
/* Alternate Font Family */
.alt-font, .button, .btn, .woocommerce-store-notice__dismiss-link:before, .product-slider-style-1 .pagination-number, .woocommerce-cart .cross-sells > h2, .woocommerce table.shop_table_responsive tr td::before, .woocommerce-page table.shop_table_responsive tr td::before { font-family: '<?php echo sprintf( '%s', $hongo_alt_font ); ?>', sans-serif; }
rs-slides .alt-font { font-family: '<?php echo sprintf( '%s', $hongo_alt_font ); ?>', sans-serif !important; }
<?php endif; ?>
<?php if( ! empty( $hongo_header_svg_width ) ) : ?>
/* Header SVG logo width */
    <?php if( ! empty( $hongo_logo_extension ) && $hongo_logo_extension == 'svg' ) : ?>
        /* Header SVG logo width */
        header a.logo-light img {width: <?php echo sprintf( '%s', $hongo_header_svg_width ); ?>!important; max-height:inherit;}
    <?php endif; ?>
    <?php if( ! empty( $hongo_logo_light_extension ) && $hongo_logo_light_extension == 'svg' ) : ?>
        /* Header SVG logo light width */
        header a.logo-dark img {width: <?php echo sprintf( '%s', $hongo_header_svg_width ); ?>!important; max-height:inherit;}
    <?php endif; ?>
<?php endif; ?>
<?php if( $hongo_body_font_size ) : ?>
/* Body Font Size */
body { font-size: <?php echo sprintf( '%s', $hongo_body_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_body_font_line_height ) : ?>
/* Body Font Line Height */
body { line-height: <?php echo sprintf( '%s', $hongo_body_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_body_font_letter_spacing ) : ?>
/* Body Font Letter Spacing */
body { letter-spacing: <?php echo sprintf( '%s', $hongo_body_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_body_background_color ) : ?>
/* Body Background Color */
body, .footer-sticky-content { background-color: <?php echo sprintf( '%s', $hongo_body_background_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_body_text_color ) : ?>
/* Body Color */
body { color: <?php echo sprintf( '%s', $hongo_body_text_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_size ) : ?>
/* Content Font Size */
.entry-content, .entry-content p { font-size: <?php echo sprintf( '%s', $hongo_content_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_line_height ) : ?>
/* Content Font Line Height */
.entry-content, .entry-content p { line-height: <?php echo sprintf( '%s', $hongo_content_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_letter_spacing ) : ?>
/* Content Font Letter Spancing */
.entry-content, .entry-content p { letter-spacing: <?php echo sprintf( '%s', $hongo_content_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_link_color ) : ?>
/* Content Text Color */
a { color: <?php echo sprintf( '%s', $hongo_content_link_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_link_hover_color ) : ?>
/* Content Text Hover Color */
a:hover { color: <?php echo sprintf( '%s', $hongo_content_link_hover_color ); ?>; }
<?php endif; ?>

<?php /* Single Post Title Settings */ ?>
<?php if( $hongo_related_post_general_title_color ) : ?>
/* Related Post Title Color */
.hongo-related-posts .related-post-general-title { color: <?php echo sprintf( '%s', $hongo_related_post_general_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_title_color ) : ?>
/* Related Posts Title Color */
.hongo-related-posts .blog-post-style-related .post-details a.post-title { color: <?php echo sprintf( '%s', $hongo_related_post_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_title_hover_color ) : ?>
/* Related Posts Title Hover Color */
.hongo-related-posts .blog-post-style-related .post-details a.post-title:hover { color: <?php echo sprintf( '%s', $hongo_related_post_title_hover_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_meta_color ) : ?>
/* Related Posts Meta Color */
.hongo-related-post-meta, .hongo-related-post-meta a, .hongo-related-posts .blog-post-style-related .post-author, .hongo-related-posts .hongo-blog-post-category, .hongo-related-posts .blog-date-author a, .hongo-related-posts .hongo-blog-post-category a{ color: <?php echo sprintf( '%s', $hongo_related_post_meta_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_meta_hover_color ) : ?>
/* Related Posts Meta Color */
.hongo-related-post-meta a:hover, .hongo-related-posts .blog-date-author a:hover, .hongo-related-posts .hongo-blog-post-category a:hover { color: <?php echo sprintf( '%s', $hongo_related_post_meta_hover_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_content_color ) : ?>
/* Related Posts Content Color */
.hongo-related-post-content { color: <?php echo sprintf( '%s', $hongo_related_post_content_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_separator_color ) : ?>
/* Related Posts Separator Color */
.hongo-related-posts .blog-post-style-related .separator-line-horizontal-full { background-color: <?php echo sprintf( '%s', $hongo_related_post_separator_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_posts_opacity ) : ?>
/* Related Posts Opacity */
.blog-post.blog-post-style-related:hover .blog-post-images img { opacity: <?php echo sprintf( '%s', $hongo_related_posts_opacity ); ?>; }
<?php endif; ?>
<?php if( $hongo_related_post_overlay_color ) : ?>
/* Related Posts Overlay Color */
.blog-post.blog-post-style-related .blog-post-images { background-color: <?php echo sprintf( '%s', $hongo_related_post_overlay_color ); ?>; }
<?php endif; ?>

<?php /* Archive Settings */ ?>

<?php if( $hongo_category_bg_color_archive ) : ?>
/* Archive Category BG color */
.hongo-blog-pages.hongo-blog-masonry .hongo-blog-post-category, .hongo-blog-pages.hongo-blog-clean .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-only-text .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-image .hongo-blog-post-category a { background-color: <?php echo sprintf( '%s', $hongo_category_bg_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_bg_hover_color_archive ) : ?>
/* Archive Category BG hover color */
.hongo-blog-pages.hongo-blog-image figure:hover .blog-image-category-wrap a { background-color: <?php echo sprintf( '%s', $hongo_category_bg_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_border_color_archive ) : ?>
/* Default Category Border color */
.hongo-blog-pages.hongo-blog-image .hongo-blog-post-category a { border-color: <?php echo sprintf( '%s', $hongo_category_border_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_border_hover_color_archive ) : ?>
/* Default Category Border hover color */
.hongo-blog-pages.hongo-blog-image figure:hover .blog-image-category-wrap a { border-color: <?php echo sprintf( '%s', $hongo_category_border_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_bg_color_archive ) : ?>
/* Archive Post Box color */
.hongo-blog-pages .blog-modern .blog-text .hongo-blog-modern-wrap, .hongo-blog-pages .blog-masonry .blog-text, .hongo-blog-pages .blog-only-text .blog-text, .hongo-blog-pages .blog-overlay-image .post, .hongo-blog-pages.hongo-blog-standard .blog-post { background-color: <?php echo sprintf( '%s', $hongo_box_bg_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_bg_hover_color_archive ) : ?>
/* Archive Post Box color */
.hongo-blog-pages .blog-only-text .blog-text:hover { background-color: <?php echo sprintf( '%s', $hongo_box_bg_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_image_opacity_archive ) : ?>
/* Archive Post Box opacity color */
.hongo-blog-pages.hongo-blog-modern li:hover .blog-image img, .hongo-blog-pages.hongo-blog-overlay-image .blog-post:hover .hongo-overlay,.hongo-blog-pages.hongo-blog-image figure .hongo-overlay { opacity: <?php echo sprintf( '%s', $hongo_image_opacity_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_image_opacity_color_archive ) : ?>
/* Archive Post Box opacity */
.hongo-blog-pages.hongo-blog-modern .blog-image, .hongo-blog-pages.hongo-blog-overlay-image .hongo-overlay, .hongo-blog-pages.hongo-blog-image figure .hongo-overlay { background-color: <?php echo sprintf( '%s', $hongo_image_opacity_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_color_archive ) : ?>
/* Archive Post Meta color */
.hongo-blog-pages .author .name a, .hongo-blog-pages .blog-separator, .hongo-blog-pages .hongo-blog-post-meta, .hongo-blog-pages .hongo-blog-post-meta a,.hongo-blog-pages .blog-image-category-wrap a, .hongo-blog-pages.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-blog-pages.hongo-blog-clean .hongo-blog-post-category a, .hongo-blog-pages span.hongo-blog-post-separator, .hongo-blog-pages .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-image figure:hover .blog-image-category-wrap a, .hongo-blog-pages.hongo-blog-overlay-image .blog-post:hover .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-overlay-image .blog-post span, .hongo-blog-pages.hongo-blog-overlay-image .blog-post .blog-like-comment a { color: <?php echo sprintf( '%s', $hongo_post_meta_color_archive ); ?>; }
.hongo-blog-pages.hongo-blog-standard .content .hongo-blog-post-meta-wrap, .hongo-blog-pages.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta { border-color: <?php echo sprintf( '%s', $hongo_post_meta_color_archive ); ?>; }
.hongo-blog-pages .blog-date-author:before, .hongo-blog-pages .blog-like-comment:before, .hongo-blog-pages.hongo-blog-only-text .blog-date-author .blog-author:after { background-color: <?php echo sprintf( '%s', $hongo_post_meta_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_hover_color_archive ) : ?>
/* Archive Post Meta Hover color */
.hongo-blog-pages .author .name a:hover, .hongo-blog-pages a.hongo-blog-post-meta:hover, .hongo-blog-pages .hongo-blog-post-meta a:hover, .hongo-blog-pages .author .name a:hover .fa, .hongo-blog-pages .blog-like-comment a:hover .fa, .hongo-blog-pages a.hongo-blog-post-meta:hover, .hongo-blog-pages.hongo-blog-overlay-image .blog-post .blog-like-comment a:hover, .hongo-blog-pages.hongo-blog-overlay-image .blog-post .hongo-blog-post-category a:hover, .hongo-blog-pages.hongo-blog-image figure .blog-image-category-wrap a:hover{ color: <?php echo sprintf( '%s', $hongo_post_meta_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_color_archive ) : ?>
/* Archive Button color */
.hongo-blog-pages a.btn { background-color: <?php echo sprintf( '%s', $hongo_button_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_color_archive ) : ?>
/* Archive Button Hover color */
.hongo-blog-pages a.btn:hover { background-color: <?php echo sprintf( '%s', $hongo_button_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_text_color_archive ) : ?>
/* Archive Button Text color */
.hongo-blog-pages a.btn { color: <?php echo sprintf( '%s', $hongo_button_text_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_text_color_archive ) : ?>
/* Archive Button Text Hover color */
.hongo-blog-pages a.btn:hover { color: <?php echo sprintf( '%s', $hongo_button_hover_text_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_border_color_archive ) : ?>
/* Archive Button Border color */
.hongo-blog-pages a.btn { border-color: <?php echo sprintf( '%s', $hongo_button_border_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_border_color_archive ) : ?>
/* Archive Button Border Hover color */
.hongo-blog-pages a.btn:hover { border-color: <?php echo sprintf( '%s', $hongo_button_hover_border_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_size_archive ) : ?>
/* Archive Title font size */
.hongo-blog-pages .entry-title, .hongo-blog-pages:hover a.entry-title,.hongo-blog-pages.hongo-blog-standard .content .content-wrap .entry-title { font-size: <?php echo sprintf( '%s', $hongo_title_font_size_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_line_height_archive ) : ?>
/* Archive Title line height */
.hongo-blog-pages .entry-title, .hongo-blog-pages:hover a.entry-title,.hongo-blog-pages.hongo-blog-standard .content .content-wrap .entry-title { line-height: <?php echo sprintf( '%s', $hongo_title_line_height_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_letter_spacing_archive ) : ?>
/* Archive Title letter spacing */
.hongo-blog-pages .entry-title, .hongo-blog-pages:hover a.entry-title { letter-spacing: <?php echo sprintf( '%s', $hongo_title_letter_spacing_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_weight_archive ) : ?>
/* Archive Title font weight */
.hongo-blog-pages .entry-title, .hongo-blog-pages:hover a.entry-title { font-weight: <?php echo sprintf( '%s', $hongo_title_font_weight_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_color_archive ) : ?>
/* Archive Title color */
.hongo-blog-pages .entry-title, .hongo-blog-pages:hover a.entry-title, .hongo-blog-pages.hongo-blog-overlay-image .blog-post:hover .entry-title { color: <?php echo sprintf( '%s', $hongo_title_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_hover_color_archive ) : ?>
/* Archive Title Hover color */
.hongo-blog-pages .entry-title:hover, .hongo-blog-pages:hover a.entry-title:hover, .hongo-blog-pages.hongo-blog-overlay-image .blog-post .entry-title:hover { color: <?php echo sprintf( '%s', $hongo_title_hover_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_size_archive ) : ?>
/* Archive Content font size */
.hongo-blog-pages .entry-content { font-size: <?php echo sprintf( '%s', $hongo_content_font_size_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_line_height_archive ) : ?>
/* Archive Content line height */
.hongo-blog-pages .entry-content { line-height: <?php echo sprintf( '%s', $hongo_content_line_height_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_letter_spacing_archive ) : ?>
/* Archive Content letter spacing */
.hongo-blog-pages .entry-content { letter-spacing: <?php echo sprintf( '%s', $hongo_content_letter_spacing_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_weight_archive ) : ?>
/* Archive Content font weight */
.hongo-blog-pages .entry-content { font-weight: <?php echo sprintf( '%s', $hongo_content_font_weight_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_color_archive ) : ?>
/* Archive Content color */
.hongo-blog-pages .entry-content, .hongo-blog-pages.hongo-blog-overlay-image .blog-post:hover .entry-content { color: <?php echo sprintf( '%s', $hongo_content_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_show_separator_archive == 0 ) : ?>
/* Archive Separator */
.hongo-blog-pages .hongo-list-border-archive { border-bottom: none; }
<?php endif; ?>
<?php if( $hongo_seperator_height_archive ) : ?>
/* Archive Separator */
.hongo-blog-pages .separator-line-horizontal-full { height: <?php echo sprintf( '%s', $hongo_seperator_height_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_separator_color_archive && $hongo_blog_premade_style_archive == 'blog-side-image' ) : ?>
/* Archive Separator color */
.hongo-blog-pages .hongo-list-border-archive { border-color: <?php echo sprintf( '%s', $hongo_separator_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_separator_color_archive ) : ?>
/* Archive Separator color */
.hongo-blog-pages .separator-line-horizontal-full { background-color: <?php echo sprintf( '%s', $hongo_separator_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_archive == 0 ) : ?>
/* Archive box border color */
.hongo-blog-pages.hongo-blog-only-text .post, .hongo-blog-pages.hongo-blog-overlay-image .post, .hongo-blog-pages.hongo-blog-standard .blog-post { border: none; }
<?php endif; ?>
<?php if( $hongo_box_enable_shadow_archive == 0 ) : ?>
/* Archive box border color */
.hongo-blog-pages.hongo-blog-only-text .post { box-shadow: none; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_archive == 1 ) : ?>    
    <?php if( $hongo_box_border_color_archive ) : ?>
    /* Archive box border color */
    .hongo-blog-pages.hongo-blog-only-text .post, .hongo-blog-pages.hongo-blog-overlay-image .post, .hongo-blog-pages.hongo-blog-standard .blog-post { border-color: <?php echo sprintf( '%s', $hongo_box_border_color_archive ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_size_archive ) : ?>
    /* Archive box border color */
    .hongo-blog-pages.hongo-blog-only-text .post, .hongo-blog-pages.hongo-blog-overlay-image .post, .hongo-blog-pages.hongo-blog-standard .blog-post { border-width: <?php echo sprintf( '%s', $hongo_box_border_size_archive ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_type_archive ) : ?>
    /* Archive box border color */
    .hongo-blog-pages.hongo-blog-only-text .post, .hongo-blog-pages.hongo-blog-overlay-image .post, .hongo-blog-pages.hongo-blog-standard .blog-post { border-style: <?php echo sprintf( '%s', $hongo_box_border_type_archive ); ?>; }
    <?php endif; ?>

<?php endif; ?>
<?php if( $hongo_opacity_archive ) : ?>
/* Archive Opacity */
.blog-post.blog-post-style-archive:hover .blog-post-images img, .grid-item.blog-post-style-archive:hover .blog-img img { opacity: <?php echo sprintf( '%s', $hongo_opacity_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_overlay_color_archive ) : ?>
/* Archive Overlay Color */
.blog-post.blog-post-style-archive .blog-post-images, .grid-item.blog-post-style-archive .blog-img, .blog-post-style-archive .grid-item .blog-post .blog-post-images .blog-hover-icon { background-color: <?php echo sprintf( '%s', $hongo_overlay_color_archive ); ?>; }
<?php endif; ?>
<?php if( $hongo_thumbnail_blur_effect_archive == 0 ) : ?>
/* Archive blur effect */
.hongo-blog-pages.hongo-blog-masonry .blog-post:hover .blog-image img { filter: none; }
<?php endif; ?>
<?php if( $hongo_thumbnail_zoom_effect_archive == 0 ) : ?>
/* Archive zoom effect */
.hongo-blog-pages.hongo-blog-grid .blog-post:hover .blog-image img { transform: none; }
<?php endif; ?>
<?php if( $hongo_post_tag_like_color ) : ?>
/* Tag, Like Color */
.hongo-post-detail-icon ul li a, .hongo-post-detail-icon .hongo-blog-detail-like li a, .tagcloud a, .hongo-post-detail-icon .hongo-blog-detail-like li a i { color: <?php echo sprintf( '%s', $hongo_post_tag_like_color ); ?>; border-color: <?php echo sprintf( '%s', $hongo_post_tag_like_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_tag_like_hover_color ) : ?>
/* Tag, Like Hover Color */
.hongo-post-detail-icon ul li a:hover, .tagcloud a:hover ,.hongo-post-detail-icon .hongo-blog-detail-like li a:hover i, .hongo-post-detail-icon .hongo-blog-detail-like li a:hover{ color: <?php echo sprintf( '%s', $hongo_post_tag_like_hover_color ); ?>!important; border-color: <?php echo sprintf( '%s', $hongo_post_tag_like_hover_color ); ?>!important; }
<?php endif; ?>
<?php if( $hongo_post_tag_hover_bg_color ) : ?>
/* Tag bg Hover Color */
.tagcloud a:hover{ background-color: <?php echo sprintf( '%s', $hongo_post_tag_hover_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_author_box_bg_color ) : ?>
/* Author Box Background Color */
.hongo-author-box-wrap .hongo-author-box{ background-color: <?php echo sprintf( '%s', $hongo_post_author_box_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_author_title_text_color ) : ?>
/* Author Title Color */
.hongo-author-box-wrap .hongo-author-title a { color: <?php echo sprintf( '%s', $hongo_post_author_title_text_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_author_title_text_hover_color ) : ?>
/* Author Title Color */
.hongo-author-box-wrap .hongo-author-title a:hover { color: <?php echo sprintf( '%s', $hongo_post_author_title_text_hover_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_author_content_color ) : ?>
/* Author Content Color */
.hongo-author-box-wrap .hongo-author-content { color: <?php echo sprintf( '%s', $hongo_post_author_content_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_color_author_box ) : ?>
/* Author Box Button color */
.hongo-author-box-wrap a.btn { background-color: <?php echo sprintf( '%s', $hongo_button_color_author_box ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_color_author_box ) : ?>
/* Author Box Button Hover color */
.hongo-author-box-wrap a.btn:hover { background-color: <?php echo sprintf( '%s', $hongo_button_hover_color_author_box ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_text_color_author_box ) : ?>
/* Author Box Button Text color */
.hongo-author-box-wrap a.btn { color: <?php echo sprintf( '%s', $hongo_button_text_color_author_box ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_text_color_author_box ) : ?>
/* Author Box Button Text Hover color */
.hongo-author-box-wrap a.btn:hover { color: <?php echo sprintf( '%s', $hongo_button_hover_text_color_author_box ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_border_color_author_box ) : ?>
/* Author Box Button Border color */
.hongo-author-box-wrap a.btn { border-color: <?php echo sprintf( '%s', $hongo_button_border_color_author_box ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_border_color_author_box ) : ?>
/* Author Box Button Border Hover color */
.hongo-author-box-wrap a.btn:hover { border-color: <?php echo sprintf( '%s', $hongo_button_hover_border_color_author_box ); ?>; }
<?php endif; ?>
<?php if( is_single() ) { ?>
    
    <?php if( $hongo_main_top_section_space ) : ?>
    /* Single Post Main content Padding top */
    .single-post-main-section { padding-top: <?php echo sprintf( '%s', $hongo_main_top_section_space ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_main_bottom_section_space ) : ?>
    /* Single Post Meta Color */
    .single-post-main-section { padding-bottom: <?php echo sprintf( '%s', $hongo_main_bottom_section_space ); ?>; }
    <?php endif; ?>

<?php } ?>

<?php if( $hongo_single_post_meta_text_color ) : ?>
/* Single Post Meta Color */
.hongo-single-post-meta ul li ,.hongo-single-post-meta ul li a { color: <?php echo sprintf( '%s', $hongo_single_post_meta_text_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_single_post_meta_text_hover_color ) : ?>
/* Single Post Meta Hover Color */
.hongo-single-post-meta ul li a:hover { color: <?php echo sprintf( '%s', $hongo_single_post_meta_text_hover_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_bg_color_default ) : ?>
/* Default Category BG color */
.hongo-default-post-description.hongo-blog-masonry .hongo-blog-post-category, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-only-text .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-image .hongo-blog-post-category a { background-color: <?php echo sprintf( '%s', $hongo_category_bg_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_bg_hover_color_default ) : ?>
/* Default Category BG hover color */
.hongo-default-post-description.hongo-blog-image figure:hover .blog-image-category-wrap a { background-color: <?php echo sprintf( '%s', $hongo_category_bg_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_border_color_default ) : ?>
/* Default Category Border color */
.hongo-default-post-description.hongo-blog-image .hongo-blog-post-category a { border-color: <?php echo sprintf( '%s', $hongo_category_border_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_category_border_hover_color_default ) : ?>
/* Default Category Border hover color */
.hongo-default-post-description.hongo-blog-image figure:hover .blog-image-category-wrap a { border-color: <?php echo sprintf( '%s', $hongo_category_border_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_bg_color_default ) : ?>
/* Default Post Box color */
.hongo-default-post-description .blog-modern .blog-text .hongo-blog-modern-wrap, .hongo-default-post-description .blog-masonry .blog-text, .hongo-default-post-description .blog-only-text .blog-text, .hongo-default-post-description .blog-overlay-image .post, .hongo-default-post-description.hongo-blog-standard .blog-post { background-color: <?php echo sprintf( '%s', $hongo_box_bg_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_bg_hover_color_default ) : ?>
/* Default Post Box color */
.hongo-default-post-description .blog-only-text .blog-text:hover { background-color: <?php echo sprintf( '%s', $hongo_box_bg_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_color_default ) : ?>
/* Default Post Meta color */
.hongo-default-post-description .author .name a, .hongo-default-post-description  .blog-separator, .hongo-default-post-description .hongo-blog-post-meta, .hongo-default-post-description .hongo-blog-post-meta a,.hongo-default-post-description:hover .blog-like-comment a,.hongo-default-post-description .blog-image-category-wrap a,.hongo-default-post-description.hongo-blog-masonry .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-modern .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-only-text .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-overlay-image .blog-post .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-overlay-image .blog-post span, .hongo-default-post-description.hongo-blog-overlay-image .blog-post .blog-like-comment a, .hongo-default-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description span.hongo-blog-post-separator, .hongo-default-post-description.hongo-blog-image figure:hover .blog-image-category-wrap a { color: <?php echo sprintf( '%s', $hongo_post_meta_color_default ); ?>; }
.hongo-default-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap, .hongo-default-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta { border-color: <?php echo sprintf( '%s', $hongo_post_meta_color_default ); ?>; }
.hongo-default-post-description .blog-date-author:before, .hongo-default-post-description .blog-like-comment:before, .hongo-default-post-description.hongo-blog-only-text .blog-date-author .blog-author:after { background-color: <?php echo sprintf( '%s', $hongo_post_meta_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_hover_color_default ) : ?>
/* Default Post Meta Hover color */
.hongo-default-post-description .author .name a:hover, .hongo-default-post-description a.hongo-blog-post-meta:hover, .hongo-default-post-description .hongo-blog-post-meta a:hover, .hongo-default-post-description .author .name a:hover .fa, .hongo-default-post-description .blog-like-comment a:hover .fa, .hongo-default-post-description a.hongo-blog-post-meta:hover, .hongo-default-post-description.hongo-blog-overlay-image .blog-post .blog-like-comment a:hover, .hongo-default-post-description.hongo-blog-overlay-image .blog-post .hongo-blog-post-category a:hover, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a:hover, .hongo-default-post-description.hongo-blog-image figure .blog-image-category-wrap a:hover{ color: <?php echo sprintf( '%s', $hongo_post_meta_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_color_default ) : ?>
/* Default Button color */
.hongo-default-post-description a.btn, .hongo-default-post-description:hover .btn { background-color: <?php echo sprintf( '%s', $hongo_button_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_color_default ) : ?>
/* Default Button Hover color */
.hongo-default-post-description a.btn:hover { background-color: <?php echo sprintf( '%s', $hongo_button_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_text_color_default ) : ?>
/* Default Button Text color */
.hongo-default-post-description a.btn, .hongo-default-post-description:hover .btn { color: <?php echo sprintf( '%s', $hongo_button_text_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_text_color_default ) : ?>
/* Default Button Text Hover color */
.hongo-default-post-description a.btn:hover { color: <?php echo sprintf( '%s', $hongo_button_hover_text_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_border_color_default ) : ?>
/* Default Button Border color */
.hongo-default-post-description a.btn, .hongo-default-post-description:hover .btn { border-color: <?php echo sprintf( '%s', $hongo_button_border_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_border_hover_color_default ) : ?>
/* Default Button Border hover color */
.hongo-default-post-description a.btn:hover, .hongo-default-post-description:hover .btn:hover { border-color: <?php echo sprintf( '%s', $hongo_button_border_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_image_opacity_default ) : ?>
/* Default opacity */
.hongo-default-post-description.hongo-blog-modern li:hover .blog-image img, .hongo-default-post-description.hongo-blog-overlay-image .blog-post:hover .hongo-overlay,.hongo-default-post-description.hongo-blog-image figure .hongo-overlay { opacity: <?php echo sprintf( '%s', $hongo_image_opacity_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_image_opacity_color_default ) : ?>
/* Default opacity background color */
.hongo-default-post-description.hongo-blog-modern .blog-image, .hongo-default-post-description.hongo-blog-overlay-image .hongo-overlay, .hongo-default-post-description.hongo-blog-image figure .hongo-overlay { background-color: <?php echo sprintf( '%s', $hongo_image_opacity_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_size_default ) : ?>
/* Default Title font size */
.hongo-default-post-description .entry-title, .hongo-default-post-description:hover a.entry-title, .hongo-default-post-description.hongo-blog-standard .content .content-wrap .entry-title { font-size: <?php echo sprintf( '%s', $hongo_title_font_size_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_line_height_default ) : ?>
/* Default Title line height */
.hongo-default-post-description .entry-title, .hongo-default-post-description:hover a.entry-title, .hongo-default-post-description.hongo-blog-standard .content .content-wrap .entry-title { line-height: <?php echo sprintf( '%s', $hongo_title_line_height_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_letter_spacing_default ) : ?>
/* Default Title letter spacing */
.hongo-default-post-description .entry-title, .hongo-default-post-description:hover a.entry-title { letter-spacing: <?php echo sprintf( '%s', $hongo_title_letter_spacing_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_weight_default ) : ?>
/* Default Title font weight */
.hongo-default-post-description .entry-title, .hongo-default-post-description:hover a.entry-title { font-weight: <?php echo sprintf( '%s', $hongo_title_font_weight_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_color_default ) : ?>
/* Default Title color */
.hongo-default-post-description .entry-title, .hongo-default-post-description:hover a.entry-title, .hongo-default-post-description.hongo-blog-overlay-image .blog-post:hover .entry-title { color: <?php echo sprintf( '%s', $hongo_title_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_hover_color_default ) : ?>
/* Default Title Hover color */
.hongo-default-post-description .entry-title:hover, .hongo-default-post-description:hover a.entry-title:hover { color: <?php echo sprintf( '%s', $hongo_title_hover_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_size_default ) : ?>
/* Default Content font size */
.hongo-default-post-description .entry-content { font-size: <?php echo sprintf( '%s', $hongo_content_font_size_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_line_height_default ) : ?>
/* Default Content line height */
.hongo-default-post-description .entry-content { line-height: <?php echo sprintf( '%s', $hongo_content_line_height_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_letter_spacing_default ) : ?>
/* Default Content letter spacing */
.hongo-default-post-description .entry-content { letter-spacing: <?php echo sprintf( '%s', $hongo_content_letter_spacing_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_weight_default ) : ?>
/* Default Content font weight */
.hongo-default-post-description .entry-content { font-weight: <?php echo sprintf( '%s', $hongo_content_font_weight_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_color_default ) : ?>
/* Default Content color */
.hongo-default-post-description .entry-content, .hongo-default-post-description.hongo-blog-overlay-image .blog-post:hover .entry-content { color: <?php echo sprintf( '%s', $hongo_content_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_show_separator_default == 0 ) : ?>
/* Default Separator */
.hongo-list-border-default { border-bottom: none; }
<?php endif; ?>
<?php if( $hongo_seperator_height_default ) : ?>
/* Default Separator */
.hongo-default-post-description .separator-line-horizontal-full { height: <?php echo sprintf( '%s', $hongo_seperator_height_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_separator_color_default ) : ?>
/* Default Separator color */
.hongo-default-post-description .separator-line-horizontal-full { background-color: <?php echo sprintf( '%s', $hongo_separator_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_enable_shadow_default == 0 ) : ?>
/* Default box border color */
.hongo-default-post-description.hongo-blog-only-text .post { box-shadow: none; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_default == 0 ) : ?>
/* Default box border color */
.hongo-default-post-description.hongo-blog-only-text .post, .hongo-default-post-description.hongo-blog-overlay-image .post, .hongo-default-post-description.hongo-blog-standard .blog-post { border: none; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_default == 1 ) : ?>    
    <?php if( $hongo_box_border_color_default ) : ?>
    /* Default box border color */
    .hongo-default-post-description.hongo-blog-only-text .post, .hongo-default-post-description.hongo-blog-overlay-image .post, .hongo-default-post-description.hongo-blog-standard .blog-post { border-color: <?php echo sprintf( '%s', $hongo_box_border_color_default ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_size_default ) : ?>
    /* Default box border color */
    .hongo-default-post-description.hongo-blog-only-text .post, .hongo-default-post-description.hongo-blog-overlay-image .post, .hongo-default-post-description.hongo-blog-standard .blog-post { border-width: <?php echo sprintf( '%s', $hongo_box_border_size_default ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_type_default ) : ?>
    /* Default box border color */
    .hongo-default-post-description.hongo-blog-only-text .post, .hongo-default-post-description.hongo-blog-overlay-image .post, .hongo-default-post-description.hongo-blog-standard .blog-post { border-style: <?php echo sprintf( '%s', $hongo_box_border_type_default ); ?>; }
    <?php endif; ?>

<?php endif; ?>
<?php if( $hongo_opacity_default ) : ?>
/* Default Opacity */
.blog-post.blog-post-style-default:hover .blog-post-images img, .blog-clean .blog-grid .blog-post-style-default:hover .blog-img img { opacity: <?php echo sprintf( '%s', $hongo_opacity_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_overlay_color_default ) : ?>
/* Default Overlay Color */
.blog-post.blog-post-style-default .blog-post-images, .grid-item.blog-post-style-default .blog-img, .blog-post-style-default .grid-item .blog-post .blog-post-images .blog-hover-icon { background-color: <?php echo sprintf( '%s', $hongo_overlay_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_show_post_thumbnail_zoom_effect_default == 0 ) : ?>
/* Default zoom effect */
.hongo-default-post-description.hongo-blog-grid .blog-post:hover .blog-image img { transform: none; }
<?php endif; ?>
<?php if( $hongo_separator_color_default ) : ?>
/* Default Separator color */
.hongo-default-post-description .hongo-post-sepataror { background-color: <?php echo sprintf( '%s', $hongo_separator_color_default ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_size_sticky ) : ?>
/* Sticky Title font size */
.hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .entry-title { font-size: <?php echo sprintf( '%s', $hongo_title_font_size_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_line_height_sticky ) : ?>
/* Sticky Title line height */
.hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .entry-title { line-height: <?php echo sprintf( '%s', $hongo_title_line_height_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_letter_spacing_sticky ) : ?>
/* Sticky Title letter spacing */
.hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .entry-title { letter-spacing: <?php echo sprintf( '%s', $hongo_title_letter_spacing_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_font_weight_sticky ) : ?>
/* Sticky Title font weight */
.hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .entry-title { font-weight: <?php echo sprintf( '%s', $hongo_title_font_weight_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_bg_color_sticky ) : ?>
/* Sticky Post Box color */
.sticky.post .blog-post { background-color: <?php echo sprintf( '%s', $hongo_box_bg_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_color_sticky ) : ?>
/* Sticky Post Meta color */
.hongo-sticky-post-description  .author .name a, .hongo-sticky-post-description  .blog-separator, .hongo-sticky-post-description .hongo-blog-post-meta, .hongo-sticky-post-description .hongo-blog-post-meta a,.hongo-sticky-post-description:hover .blog-like-comment a, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-sticky-post-description .hongo-blog-post-category { color: <?php echo sprintf( '%s', $hongo_post_meta_color_sticky ); ?>; }
.hongo-sticky-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap , .hongo-sticky-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta { border-color: <?php echo sprintf( '%s', $hongo_post_meta_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_post_meta_hover_color_sticky ) : ?>
/* Sticky Post Meta Hover color */
.hongo-sticky-post-description .author .name a:hover, .hongo-sticky-post-description a.hongo-blog-post-meta:hover, .hongo-sticky-post-description .hongo-blog-post-meta a:hover, .hongo-sticky-post-description .author .name a:hover .fa, .hongo-sticky-post-description .blog-like-comment a:hover .fa, .hongo-sticky-post-description a.hongo-blog-post-meta:hover, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a:hover { color: <?php echo sprintf( '%s', $hongo_post_meta_hover_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_color_sticky ) : ?>
/* Sticky Button color */
.hongo-sticky-post-description a.btn, .hongo-sticky-post-description:hover .btn { background-color: <?php echo sprintf( '%s', $hongo_button_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_color_sticky ) : ?>
/* Sticky Button Hover color */
.hongo-sticky-post-description a.btn:hover { background-color: <?php echo sprintf( '%s', $hongo_button_hover_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_text_color_sticky ) : ?>
/* Sticky Button Text color */
.hongo-sticky-post-description a.btn, .hongo-sticky-post-description:hover .btn { color: <?php echo sprintf( '%s', $hongo_button_text_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_hover_text_color_sticky ) : ?>
/* Sticky Button Text Hover color */
.hongo-sticky-post-description a.btn:hover { color: <?php echo sprintf( '%s', $hongo_button_hover_text_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_button_border_color_sticky ) : ?>
/* Sticky Button Border color */
.hongo-sticky-post-description a.btn, .hongo-sticky-post-description:hover .btn { border-color: <?php echo sprintf( '%s', $hongo_button_border_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_color_sticky ) : ?>
/* Sticky Title color */
.hongo-sticky-post-description .entry-title, .hongo-sticky-post-description:hover a.entry-title { color: <?php echo sprintf( '%s', $hongo_title_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_hover_color_sticky ) : ?>
/* Sticky Title Hover color */
.hongo-sticky-post-description .entry-title:hover, .hongo-sticky-post-description:hover a.entry-title:hover { color: <?php echo sprintf( '%s', $hongo_title_hover_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_size_sticky ) : ?>
/* Sticky Title font size */
.hongo-sticky-post-description.hongo-blog-standard .content .entry-content { font-size: <?php echo sprintf( '%s', $hongo_content_font_size_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_line_height_sticky ) : ?>
/* Sticky Title line height */
.hongo-sticky-post-description.hongo-blog-standard .content .entry-content { line-height: <?php echo sprintf( '%s', $hongo_content_line_height_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_letter_spacing_sticky ) : ?>
/* Sticky Title letter spacing */
.hongo-sticky-post-description.hongo-blog-standard .content .entry-content { letter-spacing: <?php echo sprintf( '%s', $hongo_content_letter_spacing_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_font_weight_sticky ) : ?>
/* Sticky Title font weight */
.hongo-sticky-post-description.hongo-blog-standard .content .entry-content { font-weight: <?php echo sprintf( '%s', $hongo_content_font_weight_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_content_color_sticky ) : ?>
/* Sticky Content color */
.hongo-sticky-post-description.hongo-blog-standard .content .entry-content { color: <?php echo sprintf( '%s', $hongo_content_color_sticky ); ?>; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_sticky == 0 ) : ?>
/* Sticky Border color */
.sticky.post .blog-post { border: none; }
<?php endif; ?>
<?php if( $hongo_box_enable_border_sticky == 1 ) : ?>
    
    <?php if( $hongo_box_border_color_sticky ) : ?>
    /* Sticky Border color */
    .sticky.post .blog-post { border-color: <?php echo sprintf( '%s', $hongo_box_border_color_sticky ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_type_sticky ) : ?>
    /* Sticky Border Type */
    .sticky.post .blog-post { border-style: <?php echo sprintf( '%s', $hongo_box_border_type_sticky ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_box_border_size_sticky ) : ?>
    /* Sticky Border Size */
    .sticky.post .blog-post { border-width: <?php echo sprintf( '%s', $hongo_box_border_size_sticky ); ?>; }
    <?php endif; ?>

<?php endif; ?>
<?php if( $hongo_404_main_title_color ) : ?>
/* 404 Title Color */
.hongo-404-content-wrap .hongo-404-main-title { color: <?php echo sprintf( '%s', $hongo_404_main_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_404_title_color ) : ?>
/* 404 Title Color */
.hongo-404-content-wrap .hongo-404-title { color: <?php echo sprintf( '%s', $hongo_404_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_404_subtitle_color ) : ?>
/* 404 Subtitle Color */
.hongo-404-content-wrap .hongo-404-subtitle { color: <?php echo sprintf( '%s', $hongo_404_subtitle_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_page_not_found_button_text_transform ) : ?>
/* 404 Text Transform */
.error404 .hongo-404-content-bg .btn { text-transform: <?php echo sprintf( '%s', $hongo_page_not_found_button_text_transform ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_font_size ) : ?>
/* Scroll TO Top Text Font size */
.scroll-top-arrow { font-size: <?php echo sprintf( '%s', $hongo_scroll_to_top_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_line_height ) : ?>
/* Scroll TO Top Text Font height */
.scroll-top-arrow { line-height: <?php echo sprintf( '%s', $hongo_scroll_to_top_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_font_weight ) : ?>
/* Scroll TO Top Text Font weight */
.scroll-top-arrow { font-weight: <?php echo sprintf( '%s', $hongo_scroll_to_top_font_weight ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_icon_font_size ) : ?>
/* Scroll TO Top Icon Font Size */
.scroll-top-arrow i { font-size: <?php echo sprintf( '%s', $hongo_scroll_to_top_icon_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_color ) : ?>
/* Scroll TO Top Icon Font color */
.scroll-top-arrow { color: <?php echo sprintf( '%s', $hongo_scroll_to_top_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_scroll_to_top_hover_color ) : ?>
    /* Scroll TO Top Icon Font hover color */
    .scroll-top-arrow:hover, .scroll-top-arrow:focus:hover { color: <?php echo sprintf( '%s', $hongo_scroll_to_top_hover_color ); ?> }
<?php endif; ?>
<?php if( $hongo_gdpr_box_background_color ) : ?>
    /* GDPR Box Background Color */
    .hongo-cookie-policy-wrapper .cookie-container { background-color: <?php echo sprintf( '%s', $hongo_gdpr_box_background_color ); ?> }
<?php endif; ?>
<?php if( $hongo_gdpr_overlay_color ) : ?>
    /* GDPR Overlay Color */
    .hongo-cookie-policy-wrapper { background-color: <?php echo sprintf( '%s', $hongo_gdpr_overlay_color ); ?> }
<?php endif; ?>
<?php if( $hongo_gdpr_content_font_size ) : ?>
/* GDPR Content Font Size */
.cookie-container .hongo-cookie-policy-text { font-size: <?php echo sprintf( '%s', $hongo_gdpr_content_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_content_line_height ) : ?>
/* GDPR Content Line Height */
.cookie-container .hongo-cookie-policy-text { line-height: <?php echo sprintf( '%s', $hongo_gdpr_content_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_content_letter_spacing ) : ?>
/* GDPR Content Letter Spacing */
.cookie-container .hongo-cookie-policy-text { letter-spacing: <?php echo sprintf( '%s', $hongo_gdpr_content_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_content_font_weight ) : ?>
/* GDPR Content Font Weight */
.cookie-container .hongo-cookie-policy-text { font-weight: <?php echo sprintf( '%s', $hongo_gdpr_content_font_weight ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_content_color ) : ?>
/* GDPR Content Color */
.cookie-container .hongo-cookie-policy-text, .cookie-container .hongo-cookie-policy-text a { color: <?php echo sprintf( '%s', $hongo_gdpr_content_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_content_hover_color ) : ?>
/* GDPR Content Hover Color */
.cookie-container .hongo-cookie-policy-text a:hover { color: <?php echo sprintf( '%s', $hongo_gdpr_content_hover_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_gdpr_button_font_size ) : ?>
    /* GDPR Button Font Size */
    .hongo-cookie-policy-wrapper .cookie-container .btn { font-size: <?php echo sprintf( '%s', $hongo_gdpr_button_font_size ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_line_height ) : ?>
    /* GDPR Button Line Height */
    .hongo-cookie-policy-wrapper .cookie-container .btn { line-height: <?php echo sprintf( '%s', $hongo_gdpr_button_line_height ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_letter_spacing ) : ?>
    /* GDPR Button Letter Spacing */
    .hongo-cookie-policy-wrapper .cookie-container .btn { letter-spacing: <?php echo sprintf( '%s', $hongo_gdpr_button_letter_spacing ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_font_weight ) : ?>
    /* GDPR Button Font Weight */
    .hongo-cookie-policy-wrapper .cookie-container .btn { font-weight: <?php echo sprintf( '%s', $hongo_gdpr_button_font_weight ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_bg_color ) : ?>
    /* GDPR Button Background Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn { background-color: <?php echo sprintf( '%s', $hongo_gdpr_button_bg_color ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_bg_hover_color ) : ?>
    /* GDPR Button Hover Background Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn:hover { background-color: <?php echo sprintf( '%s', $hongo_gdpr_button_bg_hover_color ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_color ) : ?>
    /* GDPR Button Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn { color: <?php echo sprintf( '%s', $hongo_gdpr_button_color ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_hover_color ) : ?>
    /* GDPR Button Hover Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn:hover { color: <?php echo sprintf( '%s', $hongo_gdpr_button_hover_color ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_border_color ) : ?>
    /* GDPR Button Border Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn { border-color: <?php echo sprintf( '%s', $hongo_gdpr_button_border_color ); ?>}
<?php endif; ?>
<?php if( $hongo_gdpr_button_border_hover_color ) : ?>
    /* GDPR Button Hover Border Color */
    .hongo-cookie-policy-wrapper .cookie-container .btn:hover { border-color: <?php echo sprintf( '%s', $hongo_gdpr_button_border_hover_color ); ?>}
<?php endif; ?>
<?php if( $hongo_enable_box_layout == 1 ) : ?>
    /* Box Width */
    <?php if( ( $hongo_enable_box_layout_width ) && $hongo_enable_box_layout_width > 1170 ) : ?>
        @media ( min-width: <?php echo sprintf( '%s', $hongo_enable_box_layout_width ); ?>px ) { .box-layout { max-width: <?php echo sprintf( '%s', $hongo_enable_box_layout_width ); ?>px; width: <?php echo sprintf( '%s', $hongo_enable_box_layout_width ); ?>px; } }
    <?php endif; ?>
<?php endif; ?>
<?php if( $hongo_comment_title_font_size ) : ?>
/* Comment Title Font Line Height */
.comment-title { font-size: <?php echo sprintf( '%s', $hongo_comment_title_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_comment_title_font_line_height ) : ?>
/* Comment Title Line Height */
.comment-title { line-height: <?php echo sprintf( '%s', $hongo_comment_title_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_comment_title_font_letter_spacing ) : ?>
/* Comment Title Letter Spacing */
.comment-title { letter-spacing: <?php echo sprintf( '%s', $hongo_comment_title_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_general_comment_title_color ) : ?>
/* Comment Title Color */
.comment-title { color: <?php echo sprintf( '%s', $hongo_general_comment_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h1_font_size ) : ?>
/* H1 Font Size */
h1 { font-size: <?php echo sprintf( '%s', $hongo_h1_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h1_font_line_height ) : ?>
/* H1 Font Line Height */
h1 { line-height: <?php echo sprintf( '%s', $hongo_h1_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h1_font_letter_spacing ) : ?>
/* H1 Font Letter Spacing */
h1 { letter-spacing: <?php echo sprintf( '%s', $hongo_h1_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h1_color ) : ?>
/* H1 Color */
h1 { color: <?php echo sprintf( '%s', $hongo_heading_h1_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h2_font_size ) : ?>
/* H2 Font Size */
h2 { font-size: <?php echo sprintf( '%s', $hongo_h2_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h2_font_line_height ) : ?>
/* H2 Font Line Height */
h2 { line-height: <?php echo sprintf( '%s', $hongo_h2_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h2_font_letter_spacing ) : ?>
/* H2 Font Letter Spacing */
h2 { letter-spacing: <?php echo sprintf( '%s', $hongo_h2_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h2_color ) : ?>
/* H2 Color */
h2 { color: <?php echo sprintf( '%s', $hongo_heading_h2_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h3_font_size ) : ?>
/* H3 Font Size */
h3 { font-size: <?php echo sprintf( '%s', $hongo_h3_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h3_font_line_height ) : ?>
/* H3 Font Line Height */
h3 { line-height: <?php echo sprintf( '%s', $hongo_h3_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h3_font_letter_spacing ) : ?>
/* H3 Font Letter Spacing */
h3 { letter-spacing: <?php echo sprintf( '%s', $hongo_h3_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h3_color ) : ?>
/* H3 Color */
h3 { color: <?php echo sprintf( '%s', $hongo_heading_h3_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h4_font_size ) : ?>
/* H4 Font Size */
h4 { font-size: <?php echo sprintf( '%s', $hongo_h4_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h4_font_line_height ) : ?>
/* H4 Font Line Height */
h4 { line-height: <?php echo sprintf( '%s', $hongo_h4_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h4_font_letter_spacing ) : ?>
/* H4 Font Letter Spacing */
h4 { letter-spacing: <?php echo sprintf( '%s', $hongo_h4_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h4_color ) : ?>
/* H4 Color */
h4 { color: <?php echo sprintf( '%s', $hongo_heading_h4_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h5_font_size ) : ?>
/* H5 Font Size */
h5 { font-size: <?php echo sprintf( '%s', $hongo_h5_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h5_font_line_height ) : ?>
/* H5 Font Line Height */
h5 { line-height: <?php echo sprintf( '%s', $hongo_h5_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h5_font_letter_spacing ) : ?>
/* H5 Font Letter Spacing */
h5 { letter-spacing: <?php echo sprintf( '%s', $hongo_h5_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h5_color ) : ?>
/* H5 Color */
h5 { color: <?php echo sprintf( '%s', $hongo_heading_h5_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_h6_font_size ) : ?>
/* H6 Font Size */
h6 { font-size: <?php echo sprintf( '%s', $hongo_h6_font_size ); ?>; }
<?php endif; ?>
<?php if( $hongo_h6_font_line_height ) : ?>
/* H6 Font Line Height */
h6 { line-height: <?php echo sprintf( '%s', $hongo_h6_font_line_height ); ?>; }
<?php endif; ?>
<?php if( $hongo_h6_font_letter_spacing ) : ?>
/* H6 Font Letter Spacing */
h6 { letter-spacing: <?php echo sprintf( '%s', $hongo_h6_font_letter_spacing ); ?>; }
<?php endif; ?>
<?php if( $hongo_heading_h6_color ) : ?>
/* H6 Color */
h6 { color: <?php echo sprintf( '%s', $hongo_heading_h6_color ); ?>; }
<?php endif; ?>
<?php if ( hongo_is_woocommerce_activated() ) {/* if WooCommerce plugin is activated */ ?>
    
    <?php if( $hongo_mini_cart_usp_text_font_size ) : ?>
        /* Mini Cart USP Text font size */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_usp_text_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_usp_text_line_height ) : ?>
        /* Mini Cart USP Text line height */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_usp_text_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_usp_text_letter_spacing ) : ?>
        /* Mini Cart USP Text letter spacing */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_usp_text_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_usp_text_font_weight ) : ?>
        /* Mini Cart USP Text line height */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_usp_text_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_usp_text_transform ) : ?>
        /* Mini Cart USP Text line height */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ text-transform: <?php echo sprintf( '%s', $hongo_mini_cart_usp_text_transform ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_usp_color ) : ?>
        /* Mini Cart USP Text line height */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ color: <?php echo sprintf( '%s', $hongo_mini_cart_usp_color ); ?>; }
    <?php endif; ?>
    
    <?php if( $hongo_mini_cart_background_color ) : ?>
        /* Mini Cart Background color */
        header .woocommerce.widget_shopping_cart .hongo-mini-cart-content-wrap, .hongo-mini-cart-slide-sidebar{ background-color: <?php echo sprintf( '%s', $hongo_mini_cart_background_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_separator_color ) : ?>
        /* Mini Cart Separator color */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .hongo-mini-cart-info{ border-color: <?php echo sprintf( '%s', $hongo_mini_cart_separator_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_mini_cart_close_button_color ) : ?>
        /* Mini Cart Close Button Color */
        header .woocommerce.widget_shopping_cart .cart_list li a.remove{ color: <?php echo sprintf( '%s', $hongo_mini_cart_close_button_color ); ?>!important;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_font_size ) : ?>
        /* Mini Cart Title Font Size */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_title_font_size ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_line_height ) : ?>
        /* Mini Cart Title Line Height */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_title_line_height ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_letter_spacing ) : ?>
        /* Mini Cart Title Letter Spacing */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_title_letter_spacing ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_font_weight ) : ?>
        /* Mini Cart Title Font Weight */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_title_font_weight ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_text_transform ) : ?>
        /* Mini Cart Title Font Weight */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ text-transform: <?php echo sprintf( '%s', $hongo_mini_cart_title_text_transform ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_color ) : ?>
        /* Mini Cart Title Color */
        header .woocommerce.widget_shopping_cart ul.cart_list li a, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a{ color: <?php echo sprintf( '%s', $hongo_mini_cart_title_color ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_title_hover_color ) : ?>
        /* Mini Cart Title Hover Color */
        header .woocommerce.widget_shopping_cart ul.cart_list li a:hover, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li a:hover{ color: <?php echo sprintf( '%s', $hongo_mini_cart_title_hover_color ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_price_font_size ) : ?>
        /* Mini Cart Price Font Size */
        header .woocommerce.widget_shopping_cart ul.cart_list li .quantity, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li .quantity{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_price_font_size ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_price_line_height ) : ?>
        /* Mini Cart Price Line Height */
        header .woocommerce.widget_shopping_cart ul.cart_list li .quantity, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li .quantity{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_price_line_height ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_price_letter_spacing ) : ?>
        /* Mini Cart Price Letter Spacing */
        header .woocommerce.widget_shopping_cart ul.cart_list li .quantity{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_price_letter_spacing ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_price_font_weight ) : ?>
        /* Mini Cart Price Font Weight */
        header .woocommerce.widget_shopping_cart ul.cart_list li .quantity, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li .quantity{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_price_font_weight ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_price_color ) : ?>
        /* Mini Cart Price Color */
        header .woocommerce.widget_shopping_cart ul.cart_list li .quantity, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar ul.cart_list li .quantity{ color: <?php echo sprintf( '%s', $hongo_mini_cart_price_color ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_font_size ) : ?>
        /* Mini Cart Subtotal Font Size */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_font_size ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_line_height ) : ?>
        /* Mini Cart Subtotal Line height */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_line_height ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_letter_spacing ) : ?>
        /* Mini Cart Subtotal Letter spacing */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_letter_spacing ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_font_weight ) : ?>
        /* Mini Cart Subtotal font weight */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_font_weight ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_text_transform ) : ?>
        /* Mini Cart Subtotal font weight */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ text-transform: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_text_transform ); ?>;}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_label_color ) : ?>
        /* Mini Cart Subtotal font weight */
        header .woocommerce.widget_shopping_cart .total strong, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total strong{ color: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_label_color ); ?>;}
    <?php endif; ?>    

    <?php if( $hongo_mini_cart_subtotal_font_size ) : ?>
        /* Mini Cart Subtotal Font Size */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_font_size ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_line_height ) : ?>
        /* Mini Cart Subtotal Line Height */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_line_height ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_letter_spacing ) : ?>
        /* Mini Cart Subtotal Letter Spacing */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_letter_spacing ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_font_weight ) : ?>
        /* Mini Cart Subtotal Font Weight */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_font_weight ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_subtotal_color ) : ?>
        /* Mini Cart Subtotal Color */
        header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-slide-sidebar .total{ color: <?php echo sprintf( '%s', $hongo_mini_cart_subtotal_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_font_size ) : ?>
        /* Mini Cart Button Font Size */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button{ font-size: <?php echo sprintf( '%s', $hongo_mini_cart_button_font_size ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_line_height ) : ?>
        /* Mini Cart Button Line Height */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button{ line-height: <?php echo sprintf( '%s', $hongo_mini_cart_button_line_height ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_letter_spacing ) : ?>
        /* Mini Cart Button Letter Spacing */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button{ letter-spacing: <?php echo sprintf( '%s', $hongo_mini_cart_button_letter_spacing ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_font_weight ) : ?>
        /* Mini Cart Button Font Weight */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button{ font-weight: <?php echo sprintf( '%s', $hongo_mini_cart_button_font_weight ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_text_transform ) : ?>
        /* Mini Cart Button Font transform */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button{ text-transform: <?php echo sprintf( '%s', $hongo_mini_cart_button_text_transform ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_color ) : ?>
        /* Mini Cart Button Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ){ color: <?php echo sprintf( '%s', $hongo_mini_cart_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_hover_color ) : ?>
        /* Mini Cart Button Hover Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ):hover{ color: <?php echo sprintf( '%s', $hongo_mini_cart_button_hover_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_bg_button_color ) : ?>
        /* Mini Cart Button Background Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ){ background-color: <?php echo sprintf( '%s', $hongo_mini_cart_bg_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_bg_hover_color ) : ?>
        /* Mini Cart Button Hover Background Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ):hover{ background-color: <?php echo sprintf( '%s', $hongo_mini_cart_button_bg_hover_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_border_button_color ) : ?>
        /* Mini Cart Button Border Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ){ border-color: <?php echo sprintf( '%s', $hongo_mini_cart_border_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_button_border_hover_color ) : ?>
        /* Mini Cart Button Hover Border Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout ):hover{ border-color: <?php echo sprintf( '%s', $hongo_mini_cart_button_border_hover_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_checkout_button_color ) : ?>
    /* Mini Cart Checkout Button Color */
    header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout{ color: <?php echo sprintf( '%s', $hongo_mini_cart_checkout_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_checkout_button_hover_color ) : ?>
        /* Mini Cart Checkout Button Hover Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout:hover{ color: <?php echo sprintf( '%s', $hongo_mini_cart_checkout_button_hover_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_bg_checkout_button_color ) : ?>
        /* Mini Cart Checkout Button Background Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout{ background-color: <?php echo sprintf( '%s', $hongo_mini_cart_bg_checkout_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_checkout_button_bg_hover_color ) : ?>
        /* Mini Cart Checkout Button Hover Background Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout:hover{ background-color: <?php echo sprintf( '%s', $hongo_mini_cart_checkout_button_bg_hover_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_border_checkout_button_color ) : ?>
        /* Mini Cart Checkout Button Border Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout{ border-color: <?php echo sprintf( '%s', $hongo_mini_cart_border_checkout_button_color ); ?>}
    <?php endif; ?>

    <?php if( $hongo_mini_cart_checkout_button_border_hover_color ) : ?>
        /* Mini Cart Checkout Button Hover Border Color */
        header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout:hover{ border-color: <?php echo sprintf( '%s', $hongo_mini_cart_checkout_button_border_hover_color ); ?>}
    <?php endif; ?>    

    <?php if( $hongo_product_archive_box_hover_overlay_color ) : ?>
    /* Product Archive Box hover overlay color */
    .woocommerce ul.products.hongo-shop-flat li.product .product-overlay { background: linear-gradient(to bottom, rgba(242,242,242,0) 0%, rgba(243,243,243,0) 10%, rgba(246,246,246,0.51) 43%, <?php echo sprintf( '%s', $hongo_product_archive_box_hover_overlay_color ); ?> 75%, <?php echo sprintf( '%s', $hongo_product_archive_box_hover_overlay_color ); ?> 100%); }
    .woocommerce ul.products.hongo-shop-masonry li.product .product-overlay, 
    .woocommerce ul.products.hongo-shop-clean li.product .product-overlay, .woocommerce ul.products.hongo-shop-metro li.product .hongo-overlay { background-color: <?php echo sprintf( '%s', $hongo_product_archive_box_hover_overlay_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_font_size ) : ?>
    /* Archive Product Sale Font Size */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale, .woocommerce ul.hongo-product-list-common-wrap li.product .new, .woocommerce ul.hongo-product-list-common-wrap li.product .soldout  { font-size: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_font_size ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_line_height ) : ?>
    /* Archive Product Sale Line Height */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale, .woocommerce ul.hongo-product-list-common-wrap li.product .new, .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { line-height: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_line_height ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_letter_spacing ) : ?>
    /* Archive Product Sale Line Height */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale, .woocommerce ul.hongo-product-list-common-wrap li.product .new, .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { letter-spacing: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_letter_spacing ); ?> }
    <?php endif; ?>    

    <?php if( $hongo_product_archive_product_sale_font_weight ) : ?>
    /* Archive Product Sale Font Weight */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale, .woocommerce ul.hongo-product-list-common-wrap li.product .new, .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { font-weight: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_font_weight ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_text_transform ) : ?>
    /* Archive Product Sale Font Transform */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale, .woocommerce ul.hongo-product-list-common-wrap li.product .new, .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { text-transform: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_text_transform ); ?> }
    <?php endif; ?> 

    <?php if( $hongo_product_archive_product_gallery_slider_icon_color ) : ?>
    /* Archive Product Gallery Slider icon color */
    .woocommerce .hongo-loop-product-slider .swiper-button-next i, .woocommerce .hongo-loop-product-slider .swiper-button-prev i { color: <?php echo sprintf( '%s', $hongo_product_archive_product_gallery_slider_icon_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_gallery_slider_navigation_bg_color ) : ?>
    /* Archive Product Gallery Slider navigation bg Color */
    .woocommerce ul.products li.product .hongo-loop-product-slider .swiper-button-next, .woocommerce ul.products li.product .hongo-loop-product-slider .swiper-button-prev { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_gallery_slider_navigation_bg_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_deal_number_color ) : ?>
    /* Archive Product Gallery Slider icon color */
    .woocommerce ul.products li.product .hongo-product-deal-wrap > span { color: <?php echo sprintf( '%s', $hongo_product_archive_product_deal_number_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_deal_text_color ) : ?>
    /* Archive Product Gallery Slider text color */
    .woocommerce ul.products li.product .hongo-product-deal-wrap span > span { color: <?php echo sprintf( '%s', $hongo_product_archive_product_deal_text_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_deal_bg_color ) : ?>
    /* Archive Product Gallery Slider icon color */
    .woocommerce ul.products li.product .hongo-product-deal-wrap { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_deal_bg_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_color ) : ?>
    /* Archive Product Sale Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale { color: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_sale_bg_color ) : ?>
    /* Archive Product Sale Background Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .onsale { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_sale_bg_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_new_color ) : ?>
    /* Archive Product Sale Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .new { color: <?php echo sprintf( '%s', $hongo_product_archive_product_new_color ); ?>; }
    <?php endif; ?>    

    <?php if( $hongo_product_archive_product_new_bg_color ) : ?>
    /* Archive Product Sale Background Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .new { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_new_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_soldout_color ) : ?>
    /* Archive Product Out Of stock Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { color: <?php echo sprintf( '%s', $hongo_product_archive_product_soldout_color ); ?>; }
    <?php endif; ?>    

    <?php if( $hongo_product_archive_product_soldout_bg_color ) : ?>
    /* Archive Product Out Of stock Background Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .soldout { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_soldout_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_font_size ) : ?>
    /* Archive Product Title Font Size */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .woocommerce-loop-product__title, .woocommerce ul.products.hongo-shop-metro li.product .woocommerce-loop-product__title, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .woocommerce-loop-product__title { font-size: <?php echo sprintf( '%s', $hongo_product_archive_product_title_font_size ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_line_height ) : ?>
    /* Archive Product Title Line Height */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title { line-height: <?php echo sprintf( '%s', $hongo_product_archive_product_title_line_height ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_letter_spacing ) : ?>
    /* Archive Product Title Letter Spacing */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title { letter-spacing: <?php echo sprintf( '%s', $hongo_product_archive_product_title_letter_spacing ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_font_weight ) : ?>
    /* Archive Product Title Font Weight */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .woocommerce-loop-product__title, .woocommerce ul.products.hongo-shop-metro li.product .woocommerce-loop-product__title,  .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .woocommerce-loop-product__title { font-weight: <?php echo sprintf( '%s', $hongo_product_archive_product_title_font_weight ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_text_transform ) : ?>
    /* Archive Product Title Font transfrom */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .woocommerce-loop-product__title,  .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .woocommerce-loop-product__title { text-transform: <?php echo sprintf( '%s', $hongo_product_archive_product_title_text_transform ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_color ) : ?>
    /* Archive Product Title Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title { color: <?php echo sprintf( '%s', $hongo_product_archive_product_title_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_title_hover_color ) : ?>
    /* Archive Product Title Hover Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product a:hover .woocommerce-loop-product__title, .woocommerce ul.products.hongo-shop-clean li.product:hover .product-title-category-wrap .woocommerce-loop-product__title { color: <?php echo sprintf( '%s', $hongo_product_archive_product_title_hover_color ); ?> }
    <?php endif; ?>

     <?php if( $hongo_product_archive_short_desc_color ) : ?>
    /* Archive Product Short Description Color */
    .woocommerce ul.products.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .hongo-short-description { color: <?php echo sprintf( '%s', $hongo_product_archive_short_desc_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_rating_star_color ) : ?>
    /* Archive Product Rating Star Color */
    .woocommerce ul.hongo-product-list-common-wrap .star-rating::before, .woocommerce ul.hongo-product-list-common-wrap .star-rating span, .woocommerce ul.hongo-product-list-common-wrap p.stars.selected a:not(.active)::before, .woocommerce ul.hongo-product-list-common-wrap p.stars a::before { color: <?php echo sprintf( '%s', $hongo_product_archive_product_rating_star_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_price_font_size ) : ?>
    /* Archive Product Price Font Size */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce .container ul.products.hongo-shop-clean.hongo-shop-col-3 li.product .price, .woocommerce ul.products.hongo-shop-clean li.product .price .woocommerce-Price-currencySymbol, .woocommerce ul.products.hongo-shop-clean li.product .price .woocommerce-Price-currencySymbol .woocommerce ul.hongo-product-list-common-wrap li.product .price ins, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .price { font-size: <?php echo sprintf( '%s', $hongo_product_archive_product_price_font_size ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_price_line_height ) : ?>
    /* Archive Product Price Line Height */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce .container ul.products.hongo-shop-clean.hongo-shop-col-3 li.product .price, .woocommerce ul.products.hongo-shop-clean li.product .price .woocommerce-Price-currencySymbol .woocommerce ul.hongo-product-list-common-wrap li.product .price ins, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .price { line-height: <?php echo sprintf( '%s', $hongo_product_archive_product_price_line_height ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_price_letter_spacing ) : ?>
    /* Archive Product Price Letter Spacing */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce .container ul.products.hongo-shop-clean.hongo-shop-col-3 li.product .price, .woocommerce ul.products.hongo-shop-clean li.product .price .woocommerce-Price-currencySymbol .woocommerce ul.hongo-product-list-common-wrap li.product .price ins, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .price { letter-spacing: <?php echo sprintf( '%s', $hongo_product_archive_product_price_letter_spacing ); ?> }
    <?php endif; ?>    

    <?php if( $hongo_product_archive_product_price_font_weight ) : ?>
    /* Archive Product Price Font Weight */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price ins, .woocommerce ul.hongo-product-list-common-wrap li.product .price ins { font-weight: <?php echo sprintf( '%s', $hongo_product_archive_product_price_font_weight ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_price_color ) : ?>
    /* Archive Product Price Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce ul.hongo-product-list-common-wrap li.product .price ins, .woocommerce ul.products.hongo-shop-clean li.product:hover .price { color: <?php echo sprintf( '%s', $hongo_product_archive_product_price_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_regular_price_color ) : ?>
    /* Archive Product Regular Price Color */
    .woocommerce ul.hongo-product-list-common-wrap li.product .price del { color: <?php echo sprintf( '%s', $hongo_product_archive_product_regular_price_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_color ) : ?>
    /* Archive Product Button Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-price-button-wrap .button, .woocommerce a.added_to_cart:hover { color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_color ); ?>; }     
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_hover_color ) : ?>
    /* Archive Product Button Hover Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-price-button-wrap .button:hover, .woocommerce a.added_to_cart { color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_bg_color ) : ?>
    /* Archive Product Button Background Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_bg_color ); ?> }
    .woocommerce a.added_to_cart:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_hover_bg_color ) : ?>
    /* Archive Product Button Hover Background Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_hover_bg_color ); ?>; }
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.added_to_cart:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.added_to_cart:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.added_to_cart:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.added_to_cart:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_hover_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_icon_color ) : ?>
    /* Archive Product Icon Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product .product-buttons-wrap a > i , .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:visited, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:focus, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist,.woocommerce ul.products.hongo-shop-simple li.product .product-title-price-wrap .hongo-wishlist, .woocommerce ul.products.hongo-shop-simple li.product .product-title-price-wrap .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-compare, .woocommerce a.added_to_cart i, .woocommerce a.hongo-loop-product-button i { color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_color ); ?>; }
    .woocommerce a.added_to_cart:hover { color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_icon_hover_color ) : ?>
    /* Archive Product Icon Hover Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product .product-buttons-wrap a:hover i,  .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product:hover .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a span:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a:hover span, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-wishlist:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-compare:hover, .woocommerce a.added_to_cart i:hover, .woocommerce a.hongo-loop-product-button i:hover { color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_hover_color ); ?>; }
    .woocommerce a.added_to_cart { color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_icon_bg_color ) : ?>
    /* Archive Product Icon Background Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:visited, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:focus, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_bg_color ); ?> }
    .woocommerce a.added_to_cart:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_icon_hover_bg_color ) : ?>
    /* Archive Product Icon Hover Background Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product:hover .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product:hover .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product:hover .product-buttons-wrap a:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product:hover .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product:hover .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product:hover .product-buttons-wrap a:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_hover_bg_color ); ?>; }
    .woocommerce a.added_to_cart { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_icon_hover_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_box_bg_color ) : ?>
    /* Archive Product Box Background Color */
    .woocommerce ul.products.hongo-shop-minimalist li.product:hover { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_box_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_border_color ) : ?>
    /* Archive Product Button Border Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.products.hongo-shop-minimalist li.product .hongo-loop-product-button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.products.hongo-shop-simple li.product .hongo-price-button-wrap .button, .woocommerce a.added_to_cart { border-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_border_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_border_hover_color ) : ?>
    /* Archive Product Button Border hover Color */
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button:hover, .woocommerce ul.products.hongo-shop-minimalist li.product .hongo-loop-product-button:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button:hover,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button:hover, .woocommerce ul.products.hongo-shop-simple li.product .hongo-price-button-wrap .button:hover, .woocommerce a.added_to_cart:hover { border-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_border_hover_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_product_archive_product_button_separator_color ) : ?>
    /* Archive Product Button separator Color */    
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a .hongo-loader::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a .hongo-loader::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a .hongo-loader::before,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a .hongo-loader::before { background-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_separator_color ); ?>; }    
    .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a.loading:before , .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a i, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a:last-child i, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a:last-child,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a:hover, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a:hover, .woocommerce ul.products.hongo-shop-metro li.product .product-buttons-wrap a:first-child, .woocommerce ul.products.hongo-shop-flat li.product .product-buttons-wrap a:hover { border-color: <?php echo sprintf( '%s', $hongo_product_archive_product_button_separator_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_padding_top ) : ?>
    /* Product padding top */
    .hongo-single-product-main-wrap  { padding-top: <?php echo sprintf( '%s', $hongo_single_product_padding_top ); ?> !important; }
    <?php endif; ?>

    <?php if( $hongo_single_product_padding_bottom ) : ?>
    /* Product padding bottom */
    .hongo-single-product-main-wrap  { padding-bottom: <?php echo sprintf( '%s', $hongo_single_product_padding_bottom ); ?> !important; }
    <?php endif; ?>

    <?php if( $hongo_single_product_separator_color ) : ?>
    /* Product Separator Color */
    .single-product .hongo-woocommerce-tabs, .woocommerce .single-product-modern div.product .woocommerce-product-details__short-description, .woocommerce .single-product-modern div.product form.cart, .single-product .product_meta, .single-product div.product .woocommerce-product-details__short-description, .single-product form.cart, .single-product .hongo-accordion > ul > li, .woocommerce .single-product-carousel div.product .summary .hongo-summary-left-content, .woocommerce .single-product-carousel div.product .product_meta, .woocommerce .single-product-carousel div.product .hongo-single-product-tab-content-carousel, .woocommerce .single-product-modern div.product .woocommerce-tabs .tabs, .woocommerce .single-product-extended-descriptions div.product .woocommerce-product-details__short-description { border-color: <?php echo sprintf( '%s', $hongo_single_product_separator_color ); ?>; }
    .woocommerce .single-product-carousel div.product .product_meta > span:after, .woocommerce .single-product-carousel div.product .product_meta > span ~ div:after, .woocommerce .single-product-extended-descriptions div.product .product_meta > span:after, .woocommerce .single-product-extended-descriptions div.product .product_meta > span ~ div:after { background-color: <?php echo sprintf( '%s', $hongo_single_product_separator_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_enable_image_zoom_effect == '0' ) : ?>
        /* Product Image zoom effect */
        .woocommerce div.product div.images .woocommerce-product-gallery__wrapper .zoomImg { display: none !important; }
    <?php endif; ?>

    <?php if( $hongo_single_product_sale_font_size ) : ?>
    /* Product Sale Font Size */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout  { font-size: <?php echo sprintf( '%s', $hongo_single_product_sale_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_sale_line_height ) : ?>
    /* Product Sale Line Height */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout { line-height: <?php echo sprintf( '%s', $hongo_single_product_sale_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_sale_letter_spacing ) : ?>
    /* Product Sale Line Height */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_sale_letter_spacing ); ?>; }
    <?php endif; ?>    

    <?php if( $hongo_single_product_sale_font_weight ) : ?>
    /* Product Sale Font Weight */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new, .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout { font-weight: <?php echo sprintf( '%s', $hongo_single_product_sale_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_zoom_icon_bg_color ) : ?>
    /* Product Sale Color */
    .single-product.woocommerce div.product div.images .woocommerce-product-gallery__trigger { background-color: <?php echo sprintf( '%s', $hongo_single_product_zoom_icon_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_deal_number_color ) : ?>
    /* Product countdown number Color */
    .single-product .entry-summary .hongo-product-deal-wrap > span { color: <?php echo sprintf( '%s', $hongo_single_product_deal_number_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_deal_text_color ) : ?>
    /* Product countdown text Color */
    .single-product .entry-summary .hongo-product-deal-wrap span > span { color: <?php echo sprintf( '%s', $hongo_single_product_deal_text_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_sale_color ) : ?>
    /* Product Sale Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale { color: <?php echo sprintf( '%s', $hongo_single_product_sale_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_sale_bg_color ) : ?>
    /* Product Sale Background Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale { background-color: <?php echo sprintf( '%s', $hongo_single_product_sale_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_bg_color ) : ?>
    /* Modern Product Background Color */
    .woocommerce .single-product-modern div.product .hongo-modern-content-images-wrap { background-color: <?php echo sprintf( '%s', $hongo_single_product_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_new_color ) : ?>
    /* Product New box Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new { color: <?php echo sprintf( '%s', $hongo_single_product_new_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_new_bg_color ) : ?>
    /* Product new box Background Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.new { background-color: <?php echo sprintf( '%s', $hongo_single_product_new_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_soldout_color ) : ?>
    /* Product Sold box Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout { color: <?php echo sprintf( '%s', $hongo_single_product_soldout_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_soldout_bg_color ) : ?>
    /* Product Sold box Background Color */
    .single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout { background-color: <?php echo sprintf( '%s', $hongo_single_product_soldout_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_font_size ) : ?>
    /* Product Title Font Size */
    .single-product .product .summary .product_title, .woocommerce .single-product-carousel div.product .product_title, .woocommerce .single-product-extended-descriptions div.product .summary .product_title, .woocommerce .single-product-modern div.product .product_title { font-size: <?php echo sprintf( '%s', $hongo_single_product_page_title_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_line_height ) : ?>
    /* Product Title Line Height */
    .single-product .product .summary .product_title, .woocommerce .single-product-carousel div.product .product_title, .woocommerce .single-product-extended-descriptions div.product .summary .product_title, .woocommerce .single-product-modern div.product .product_title { line-height: <?php echo sprintf( '%s', $hongo_single_product_page_title_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_letter_spacing ) : ?>
    /* Product Title Letter Spacing */
    .single-product .product .summary .product_title { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_page_title_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_font_weight ) : ?>
    /* Product Title Font Weight */
    .single-product .product .summary .product_title, .woocommerce .single-product-extended-descriptions div.product .summary .product_title, .woocommerce .single-product-modern div.product .product_title { font-weight: <?php echo sprintf( '%s', $hongo_single_product_page_title_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_font_transform ) : ?>
    /* Product Title Font Weight */
    .single-product .product .summary .product_title { text-transform: <?php echo sprintf( '%s', $hongo_single_product_page_title_font_transform ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_title_color ) : ?>
    /* Product Title Color */
    .single-product .product .summary .product_title { color: <?php echo sprintf( '%s', $hongo_single_product_page_title_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_rating_star_color ) : ?>
    /* Product Rating Star Color */
    .single-product .product .summary .woocommerce-product-rating .star-rating span, .single-product .product .summary .woocommerce-product-rating .star-rating:before{ color: <?php echo sprintf( '%s', $hongo_single_product_rating_star_color ); ?>; }

    <?php endif; ?>

    <?php if( $hongo_single_product_price_font_size ) : ?>
    /* Product Price Font Size */
    .single-product .product .summary .price, .single-product .product .summary .price ins, .single-product .product .summary .price del, .woocommerce .single-product-extended-descriptions div.product .summary p.price, .woocommerce .single-product-extended-descriptions div.product .summary p.price ins, .woocommerce .single-product-modern div.product .summary p.price, .woocommerce .single-product-carousel div.product p.price { font-size: <?php echo sprintf( '%s', $hongo_single_product_price_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_price_line_height ) : ?>
    /* Product Price Line Height */
    .single-product .product .summary .price, .single-product .product .summary .price ins { line-height: <?php echo sprintf( '%s', $hongo_single_product_price_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_price_letter_spacing ) : ?>
    /* Product Price Line Height */
    .single-product .product .summary .price, .single-product .product .summary .price ins { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_price_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_price_font_weight ) : ?>
    /* Product Price Font Weight */
    .single-product .product .summary .price, .single-product .product .summary .price ins { font-weight: <?php echo sprintf( '%s', $hongo_single_product_price_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_price_color ) : ?>
    /* Product Price Color */
    .single-product .product .summary .summary-main-title .price, .single-product .product .summary .summary-main-title .price ins, .single-product .single-product-default .product .summary .price, .single-product .single-product-default .product .summary .price ins, .single-product .single-product-extended-descriptions .product .summary .price, .single-product .single-product-extended-descriptions .product .summary .price ins, .single-product span.price, .single-product div.product span.price, .single-product .woocommerce-grouped-product-list .woocommerce-Price-amount { color: <?php echo sprintf( '%s', $hongo_single_product_price_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_regular_price_color ) : ?>
    /* Product Regular Price Color */
    .single-product .product .summary .summary-main-title .price del, .single-product .single-product-default .product .summary .price del, .single-product .single-product-extended-descriptions .product .summary .price del, .single-product span.price del, .single-product div.product span.price del, .single-product .woocommerce-grouped-product-list del .woocommerce-Price-amount, .single-product .woocommerce-grouped-product-list del { color: <?php echo sprintf( '%s', $hongo_single_product_regular_price_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_short_description_font_size ) : ?>
    /* Product Short Description Font Size */
    .single-product .product .summary .woocommerce-product-details__short-description { font-size: <?php echo sprintf( '%s', $hongo_single_product_short_description_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_short_description_line_height ) : ?>
    /* Product Short Description Line Height */
    .single-product .product .summary .woocommerce-product-details__short-description { line-height: <?php echo sprintf( '%s', $hongo_single_product_short_description_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_short_description_letter_spacing ) : ?>
    /* Product Short Description Letter Spacing */
    .single-product .product .summary .woocommerce-product-details__short-description { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_short_description_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_short_description_font_weight ) : ?>
    /* Product Short Description Font Weight */
    .single-product .product .summary .woocommerce-product-details__short-description { font-weight: <?php echo sprintf( '%s', $hongo_single_product_short_description_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_short_description_color ) : ?>
    /* Product Short Description Color */
    .single-product .product .summary .woocommerce-product-details__short-description { color: <?php echo sprintf( '%s', $hongo_single_product_short_description_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_stock_font_size ) : ?>
    /* Product Stock Font Size */
    .single-product .product .summary .stock { font-size: <?php echo sprintf( '%s', $hongo_single_product_stock_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_stock_line_height ) : ?>
    /* Product Stock Line Height */
    .single-product .product .summary .stock { line-height: <?php echo sprintf( '%s', $hongo_single_product_stock_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_stock_font_weight ) : ?>
    /* Product Stock Font Weight */
    .single-product .product .summary .stock { font-weight: <?php echo sprintf( '%s', $hongo_single_product_stock_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_stock_letter_spacing ) : ?>
    /* Product Stock Letter Spacing */
    .single-product .product .summary .stock { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_stock_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_stock_color ) : ?>
    /* Product Stock Color */
    .single-product .product .summary .stock.in-stock { color: <?php echo sprintf( '%s', $hongo_single_product_stock_color ); ?>; }
    .single-product .product .summary .stock.in-stock { border-color: <?php echo sprintf( '%s', $hongo_single_product_stock_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_out_of_stock_color ) : ?>
    /* Product Out Of Stock Color */
    .single-product .product .summary .stock.out-of-stock { color: <?php echo sprintf( '%s', $hongo_single_product_out_of_stock_color ); ?>; }
    .single-product .product .summary .stock.out-of-stock { border-color: <?php echo sprintf( '%s', $hongo_single_product_out_of_stock_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_quantity_border_color ) : ?>
    /* Product Quantity input Border color */
    .single-product .quantity input, .single-product div.quantity .hongo-qtyminus, .single-product div.quantity .hongo-qtyplus { border-color: <?php echo sprintf( '%s', $hongo_single_product_quantity_border_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_quantity_color ) : ?>
    /* Product Quantity input color */
    .single-product div.quantity .qty, .single-product .quantity input { color: <?php echo sprintf( '%s', $hongo_single_product_quantity_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_color ) : ?>
    /* Product Button Color */
    .single-product .product .summary .single_add_to_cart_button, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover { color: <?php echo sprintf( '%s', $hongo_single_product_button_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_bg_color ) : ?>
    /* Product Button Background Color */
    .single-product .product .summary .single_add_to_cart_button, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover { background-color: <?php echo sprintf( '%s', $hongo_single_product_button_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_border_color ) : ?>
    /* Product Button Border Color */
    .single-product .product .summary .single_add_to_cart_button, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover { border-color: <?php echo sprintf( '%s', $hongo_single_product_button_border_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_hover_color ) : ?>
    /* Product Button Hover Color */
    .single-product .product .summary .single_add_to_cart_button:hover { color: <?php echo sprintf( '%s', $hongo_single_product_button_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_hover_bg_color ) : ?>
    /* Product Button Hover Background Color */
    .single-product .product .summary .single_add_to_cart_button:hover { background-color: <?php echo sprintf( '%s', $hongo_single_product_button_hover_bg_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_button_hover_border_color ) : ?>
    /* Product Button Hover Background Color */
    .single-product .product .summary .single_add_to_cart_button:hover { border-color: <?php echo sprintf( '%s', $hongo_single_product_button_hover_border_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_font_size ) : ?>
    /* Product Meta Font Size */
    .single-product .product .summary .product_meta, .single-product .product .summary .sku_wrapper, .single-product .product .summary .sku_wrapper, .single-product .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku, .single-product .product_meta span, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce div.product form.cart .variations label, .woocommerce .single-product-extended-descriptions div.product .product_meta > span, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span, .woocommerce .single-product-carousel div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta .products-social-icon > span, .woocommerce div.product .summary a.hongo-wishlist, .woocommerce div.product .summary a.hongo-compare, .woocommerce div.product .summary a.hongo-wishlist i, 
    .woocommerce div.product .summary a.hongo-compare i, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li:after { font-size: <?php echo sprintf( '%s', $hongo_single_product_page_meta_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_line_height ) : ?>
    /* Product Meta Line Height */
    .single-product .product .summary .product_meta, .single-product .product .summary .sku,.single-product .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce div.product form.cart .variations label, .woocommerce .single-product-extended-descriptions div.product .product_meta > span, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span, .woocommerce .single-product-carousel div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta .products-social-icon > span, .woocommerce div.product .summary a.hongo-wishlist, .woocommerce div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a { line-height: <?php echo sprintf( '%s', $hongo_single_product_page_meta_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_letter_spacing ) : ?>
    /* Product Meta Letter Spacing */
    .single-product .product .summary .product_meta, .single-product .product .summary .sku,.single-product .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku, .single-product .product_meta span, .single-product .product .summary .summary-main-title-right .sku_wrapper, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce div.product form.cart .variations label, .woocommerce .single-product-extended-descriptions div.product .product_meta > span, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span, .woocommerce .single-product-carousel div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta .products-social-icon > span, .woocommerce div.product .summary a.hongo-wishlist, .woocommerce div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_page_meta_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_font_weight ) : ?>
    /* Product Meta Font Weight */
    .single-product .product .summary .product_meta, .single-product .product .summary .sku,.single-product .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku, .single-product .product_meta span, .single-product .product .summary .summary-main-title-right .sku_wrapper, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce div.product form.cart .variations label, .woocommerce .single-product-extended-descriptions div.product .product_meta > span, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span,.woocommerce .single-product-carousel div.product .product_meta > span a,.woocommerce .single-product-carousel div.product .product_meta .products-social-icon > span, .single-product-extended-descriptions .product_meta span span, .single-product-extended-descriptions .product_meta span a, .woocommerce div.product .summary a.hongo-wishlist, .woocommerce div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a { font-weight: <?php echo sprintf( '%s', $hongo_single_product_page_meta_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_heading_color ) : ?>
    /* Product Meta Heading Color */
    .single-product .product .summary .product_meta .sku_wrapper, .single-product .product .summary .summary-main-title-right .sku_wrapper, .single-product .product .summary .product_meta .posted_in, .single-product .product .summary .product_meta .tagged_as, .single-product .product .summary .product_meta .hongo-product-sharebox-title, .single-product .product .summary .summary-main-title-right .sku_wrapper, .woocommerce div.product form.cart .variations label, .single-product .product_meta span.sku_wrapper,.single-product .product_meta span.posted_in, .single-product .product_meta span.tagged_as, .single-product .products-social-icon span { color: <?php echo sprintf( '%s', $hongo_single_product_page_meta_heading_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_social_icon_color ) : ?>
    /* Product Meta Social Icon Color */
    .single-product .product .summary .product_meta .products-social-icon a, .woocommerce .single-product-extended-descriptions div.product .products-social-icon ul li a, .woocommerce .single-product-carousel div.product .products-social-icon ul li a { color: <?php echo sprintf( '%s', $hongo_single_product_page_meta_social_icon_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_social_icon_hover_color ) : ?>
    /* Product Meta Social Icon Color */
    .single-product .product .summary .product_meta .products-social-icon a:hover, .woocommerce .single-product-extended-descriptions div.product .products-social-icon ul li a:hover, .woocommerce .single-product-carousel div.product .products-social-icon ul li a:hover { color: <?php echo sprintf( '%s', $hongo_single_product_page_meta_social_icon_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_color ) : ?>
    /* Product Meta Color */
    .single-product .product .summary .product_meta .posted_in a, .single-product .product .summary .product_meta .tagged_as a, .single-product .product .summary .product_meta .sku, .woocommerce div.product form.cart .reset_variations, .single-product .product .summary .sku, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .single-product .product_meta span span, .single-product .product_meta span a, .single-product div.product .summary a.hongo-wishlist, .single-product div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li::after { color: <?php echo sprintf( '%s', $hongo_single_product_page_meta_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_meta_link_hover_color ) : ?>
    /* Product Meta Link Hover Color */
    .single-product .product .summary .product_meta .posted_in a:hover, .single-product .product .summary .product_meta .tagged_as a:hover, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a:hover, .woocommerce .single-product-carousel div.product .product_meta > span a:hover, .woocommerce .single-product-modern div.product .summary a.hongo-wishlist:hover, .woocommerce .single-product-modern div.product .summary a.hongo-compare:hover, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a:hover, .single-product div.product .summary a.hongo-wishlist:hover, .single-product div.product .summary a.hongo-compare:hover { color: <?php echo sprintf( '%s', $hongo_single_product_page_meta_link_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_font_size ) : ?>
    /* Product Tab Font Size */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a { font-size: <?php echo sprintf( '%s', $hongo_single_product_page_tab_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_line_height ) : ?>
    /* Product Tab Line Height */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a { line-height: <?php echo sprintf( '%s', $hongo_single_product_page_tab_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_letter_spacing ) : ?>
    /* Product Tab Letter Spacing */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_page_tab_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_font_weight ) : ?>
    /* Product Tab Font Weight */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a { font-weight: <?php echo sprintf( '%s', $hongo_single_product_page_tab_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_color ) : ?>
    /* Product Tab Color */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a, .woocommerce .single-product-modern div.product .woocommerce-tabs .tabs li a, .woocommerce div.product .hongo-single-product-tab-content-extended-descriptions .woocommerce-tabs ul.tabs li a, .woocommerce div.product .hongo-single-product-tab-content-extended-descriptions .woocommerce-tabs ul.tabs li a { color: <?php echo sprintf( '%s', $hongo_single_product_page_tab_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_hover_color ) : ?>
    /* Product Tab Color */
    .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .hongo-accordion > ul > li > a:hover { color: <?php echo sprintf( '%s', $hongo_single_product_page_tab_hover_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_page_tab_active_color ) : ?>
    /* Product Active Tab Color */
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .hongo-accordion > ul > li > a.active { color: <?php echo sprintf( '%s', $hongo_single_product_page_tab_active_color ); ?>; }
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active a { border-color: <?php echo sprintf( '%s', $hongo_single_product_page_tab_active_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_pagination_color ) : ?>
    /* Product List Slider Pagination */
    .hongo-related-products .swiper-pagination .swiper-pagination-bullet, .hongo-up-sells-products .swiper-pagination .swiper-pagination-bullet { background-color: <?php echo sprintf( '%s', $hongo_single_product_list_pagination_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_active_pagination_color ) : ?>
    /* Product List Slider active Pagination */
    .hongo-related-products .swiper-pagination .swiper-pagination-bullet-active, .hongo-up-sells-products .swiper-pagination .swiper-pagination-bullet-active { background-color: <?php echo sprintf( '%s', $hongo_single_product_list_active_pagination_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_navigation_color ) : ?>
    /* Product List Slider Navigation */
    .hongo-related-products.swiper-container .swiper-button-next i,.hongo-related-products.swiper-container .swiper-button-prev i, .hongo-up-sells-products.swiper-container .swiper-button-next i,.hongo-up-sells-products.swiper-container .swiper-button-prev i { color: <?php echo sprintf( '%s', $hongo_single_product_list_navigation_color ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_font_size ) : ?>
    /* Product List Heading Font Size */
    .hongo-woocommerce-tabs ul.tabs li a, .upsells.products > h2, .related.products > h2 { font-size: <?php echo sprintf( '%s', $hongo_single_product_list_heading_font_size ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_line_height ) : ?>
    /* Product List Heading Line Height */
    .hongo-woocommerce-tabs ul.tabs li a, .upsells.products > h2, .related.products > h2  { line-height: <?php echo sprintf( '%s', $hongo_single_product_list_heading_line_height ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_letter_spacing ) : ?>
    /* Product List Heading Letter Spacing */
    .hongo-woocommerce-tabs ul.tabs li a, .upsells.products > h2, .related.products > h2  { letter-spacing: <?php echo sprintf( '%s', $hongo_single_product_list_heading_letter_spacing ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_font_weight ) : ?>
    /* Product List Heading Font Weight */
    .hongo-woocommerce-tabs ul.tabs li a, .upsells.products > h2, .related.products > h2  { font-weight: <?php echo sprintf( '%s', $hongo_single_product_list_heading_font_weight ); ?>; }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_color ) : ?>
    /* Product List Heading Color */
    .hongo-woocommerce-tabs ul.tabs li a, .hongo-woocommerce-tabs ul.tabs li.active a, .upsells.products > h2, .related.products > h2 { color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_color ); ?> }
    .hongo-woocommerce-tabs ul.tabs li.active a { border-color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_hover_color ) : ?>
    /* Product List Heading Color */
    .hongo-woocommerce-tabs ul.tabs li a:hover, .hongo-woocommerce-tabs ul.tabs li.active a:hover, .upsells.products > h2:hover, .related.products > h2:hover { color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_hover_color ); ?> }
    .hongo-woocommerce-tabs ul.tabs li.active a:hover { border-color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_hover_color ); ?> }
    <?php endif; ?>

    <?php if( $hongo_single_product_list_heading_active_color ) : ?>
    /* Related Product Heading Color */
    .hongo-woocommerce-tabs ul.tabs li.active a { color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_active_color ); ?> }
    .hongo-woocommerce-tabs ul.tabs li.active a { border-color: <?php echo sprintf( '%s', $hongo_single_product_list_heading_active_color ); ?> }
    <?php endif; ?>

<?php 
}/* if WooCommerce plugin is activated */


if( hongo_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) { // if WooCommerce plugin is activated and WooCommerce category, brand, shop page
    
    $hongo_content_container_fluid_with_padding = get_theme_mod( 'hongo_product_archive_container_fluid_with_padding', '' );
    $hongo_title_container_fluid_with_padding = get_theme_mod( 'hongo_product_archive_title_container_fluid_with_padding', '' );

} elseif( hongo_is_woocommerce_activated() && is_product() ) { // if WooCommerce plugin is activated and WooCommerce product page

    $hongo_content_container_fluid_with_padding = hongo_option( 'hongo_single_product_container_fluid_with_padding', '' );
    $hongo_title_container_fluid_with_padding = hongo_option( 'hongo_single_product_title_container_fluid_with_padding', '' );

} elseif( is_home() ) { // if Home page

    $hongo_content_container_fluid_with_padding = get_theme_mod( 'hongo_post_container_fluid_with_padding_default', '' );
    $hongo_title_container_fluid_with_padding = get_theme_mod( 'hongo_default_title_container_fluid_with_padding', '' );

} elseif( is_search() || is_category() || is_archive() || is_tag() ){ // if Post category, tag, archive page

    $hongo_content_container_fluid_with_padding = get_theme_mod( 'hongo_post_container_fluid_with_padding_archive', '' );
    $hongo_title_container_fluid_with_padding = get_theme_mod( 'hongo_archive_title_container_fluid_with_padding', '' );

} elseif( is_single() ) { // if single post

    $hongo_content_container_fluid_with_padding = hongo_option( 'hongo_single_post_container_fluid_with_padding', '' );
    $hongo_title_container_fluid_with_padding = hongo_option( 'hongo_single_post_title_container_fluid_with_padding', '' );

} else { // Default Page

    $hongo_content_container_fluid_with_padding = hongo_option( 'hongo_page_container_fluid_with_padding', '' );
    $hongo_title_container_fluid_with_padding = hongo_option( 'hongo_page_title_container_fluid_with_padding', '' );
}

if( $hongo_content_container_fluid_with_padding ) : ?>
/* Default Custom Padding Content */
.hongo-main-content-wrap .container-fluid-with-padding { padding-left : <?php echo sprintf( '%s', $hongo_content_container_fluid_with_padding ); ?>; padding-right : <?php echo sprintf( '%s', $hongo_content_container_fluid_with_padding ); ?>; }
<?php endif;

if( $hongo_title_container_fluid_with_padding ) : ?>
/* Default Custom Padding Title */
.hongo-main-title-wrap .container-fluid-with-padding, .hongo-main-breadcrumb .container-fluid-with-padding, .single-post-meta-wrap .container-fluid-with-padding { padding-left : <?php echo sprintf( '%s', $hongo_title_container_fluid_with_padding ); ?>; padding-right : <?php echo sprintf( '%s', $hongo_title_container_fluid_with_padding ); ?>; }
<?php endif;?>

<?php
if( ! empty( $hongo_custom_fonts ) && is_array( $hongo_custom_fonts ) ) {
    foreach ( $hongo_custom_fonts as $key => $hongo_custom_font ) {
        if ( ! empty( $hongo_custom_font ) ) {
            if ( $hongo_main_font == $hongo_custom_font[0] || $hongo_alt_font == $hongo_custom_font[0] ) {
                ?>
                    @font-face {
                        <?php echo ! empty( $hongo_custom_font[0] ) ? "font-family: '" . $hongo_custom_font[0] . "';" : ''; ?>
                        <?php echo ! empty( $hongo_custom_font[1] ) ? "src: url( '" . $hongo_custom_font[1] . "' ) format('woff2');" : ''; ?>
                        <?php echo ! empty( $hongo_custom_font[2] ) ? "src: url( '" . $hongo_custom_font[2] . "' ) format('woff');" : ''; ?>
                        <?php echo ! empty( $hongo_custom_font[3] ) ? "src: url( '" . $hongo_custom_font[3] . "' ) format('truetype');" : ''; ?>
                        <?php echo ! empty( $hongo_custom_font[4] ) ? "src: url( '" . $hongo_custom_font[4] . "' ) format('embedded-opentype');" : ''; ?>
                    }
                <?php
            }
        }
    }
}
?>

<?php if( $mobileAnimation == '0' ) : ?>
/* Animation mobile css */
@media (max-width: 1199px) { .wow { -webkit-animation-name: none !important; animation-name: none !important; } }
<?php endif;

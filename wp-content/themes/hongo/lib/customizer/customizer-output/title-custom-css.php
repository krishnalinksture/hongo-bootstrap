<?php
/**
 * Title Generate css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

    if( hongo_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) {

        /* Product Archive Page Title Settings */
        $hongo_title_enable_border                  = hongo_option( 'hongo_product_archive_title_enable_border', '0' );
        $hongo_page_title_border_color              = hongo_option( 'hongo_product_archive_title_border_color', '' );
        $hongo_title_opacity_color                  = hongo_option( 'hongo_product_archive_title_opacity_color', '' );
        $hongo_title_opacity                        = hongo_option( 'hongo_product_archive_title_opacity', '0.8' );
        $hongo_title_top_space                      = hongo_option( 'hongo_product_archive_title_top_section_space', '' );
        $hongo_title_bottom_space                   = hongo_option( 'hongo_product_archive_title_bottom_section_space', '' );
        $hongo_title_bg_color                       = hongo_option( 'hongo_product_archive_title_bg_color', '' );
        $hongo_title_color                          = hongo_option( 'hongo_product_archive_title_color', '' );
        $hongo_subtitle_color                       = hongo_option( 'hongo_product_archive_subtitle_color', '' );
        $hongo_subtitle_bg_color                    = hongo_option( 'hongo_product_archive_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_color               = hongo_option( 'hongo_product_archive_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color    = hongo_option( 'hongo_product_archive_title_breadcrumb_text_hover_color', '' );
        $hongo_title_breadcrumb_bg_color            = hongo_option( 'hongo_product_archive_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color        = hongo_option( 'hongo_product_archive_title_breadcrumb_border_color', '' );
        $hongo_title_font_size                      = hongo_option( 'hongo_product_archive_title_font_size', '' );
        $hongo_title_line_height                    = hongo_option( 'hongo_product_archive_title_line_height', '' );
        $hongo_title_letter_spacing                 = hongo_option( 'hongo_product_archive_title_letter_spacing', '' );
        $hongo_title_font_weight                    = hongo_option( 'hongo_product_archive_title_font_weight', '' );
        $hongo_subtitle_font_size                   = hongo_option( 'hongo_product_archive_subtitle_font_size', '' );
        $hongo_subtitle_line_height                 = hongo_option( 'hongo_product_archive_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing              = hongo_option( 'hongo_product_archive_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight                 = hongo_option( 'hongo_product_archive_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size                 = hongo_option( 'hongo_product_archive_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height               = hongo_option( 'hongo_product_archive_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing            = hongo_option( 'hongo_product_archive_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color                  = hongo_option( 'hongo_product_archive_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color            = hongo_option( 'hongo_product_archive_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color                     = hongo_option( 'hongo_product_archive_title_icon_color', '' );
        $hongo_title_hover_icon_color               = hongo_option( 'hongo_product_archive_title_icon_hover_color', '' );

    } elseif( hongo_is_woocommerce_activated() && is_product() ) { // if WooCommerce plugin is activated and WooCommerce product page

        /* Single Product Title Settings */
        $hongo_title_enable_border              = hongo_option( 'hongo_single_product_title_enable_border', '0' );
        $hongo_page_title_border_color          = hongo_option( 'hongo_single_product_title_border_color', '' );
        $hongo_title_opacity_color              = hongo_option( 'hongo_single_product_title_opacity_color', '' );
        $hongo_title_opacity                    = hongo_option( 'hongo_single_product_title_opacity', '0.8' );
        $hongo_title_top_space                  = hongo_option( 'hongo_single_product_title_top_section_space', '' );
        $hongo_title_bottom_space               = hongo_option( 'hongo_single_product_title_bottom_section_space', '' );
        $hongo_title_bg_color                   = hongo_option( 'hongo_single_product_title_bg_color', '' );
        $hongo_title_color                      = hongo_option( 'hongo_single_product_title_color', '' );
        $hongo_subtitle_color                   = hongo_option( 'hongo_single_product_subtitle_color', '' );
        $hongo_subtitle_bg_color                = hongo_option( 'hongo_single_product_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_color           = hongo_option( 'hongo_single_product_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color = hongo_option( 'hongo_single_product_title_breadcrumb_text_hover_color', '' );
        $hongo_title_breadcrumb_bg_color        = hongo_option( 'hongo_single_product_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color    = hongo_option( 'hongo_single_product_title_breadcrumb_border_color', '' );
        $hongo_title_font_size                  = hongo_option( 'hongo_single_product_title_font_size', '' );
        $hongo_title_line_height                = hongo_option( 'hongo_single_product_title_line_height', '' );
        $hongo_title_letter_spacing             = hongo_option( 'hongo_single_product_title_letter_spacing', '' );
        $hongo_title_font_weight                = hongo_option( 'hongo_single_product_title_font_weight', '' );
        $hongo_subtitle_font_size               = hongo_option( 'hongo_single_product_subtitle_font_size', '' );
        $hongo_subtitle_line_height             = hongo_option( 'hongo_single_product_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing          = hongo_option( 'hongo_single_product_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight             = hongo_option( 'hongo_single_product_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size             = hongo_option( 'hongo_single_product_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height           = hongo_option( 'hongo_single_product_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing        = hongo_option( 'hongo_single_product_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color              = hongo_option( 'hongo_single_product_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color        = hongo_option( 'hongo_single_product_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color                 = hongo_option( 'hongo_single_product_title_icon_color', '' );
        $hongo_title_hover_icon_color           = hongo_option( 'hongo_single_product_title_icon_hover_color', '' );

    } elseif( is_search() || is_category() || is_archive() ){ // if Post category, tag, archive page

        /* Archive Page Title Settings */
        $hongo_title_enable_border                  = hongo_option( 'hongo_archive_title_enable_border', '0' );
        $hongo_page_title_border_color              = hongo_option( 'hongo_archive_title_border_color', '' );
        $hongo_title_opacity_color                  = hongo_option( 'hongo_archive_title_opacity_color', '' );
        $hongo_title_opacity                        = hongo_option( 'hongo_archive_title_opacity', '0.8' );
        $hongo_title_top_space                      = hongo_option( 'hongo_archive_title_top_section_space', '' );
        $hongo_title_bottom_space                   = hongo_option( 'hongo_archive_title_bottom_section_space', '' );
        $hongo_title_bg_color                       = hongo_option( 'hongo_archive_title_bg_color', '' );
        $hongo_title_color                          = hongo_option( 'hongo_archive_title_color', '' );
        $hongo_subtitle_color                       = hongo_option( 'hongo_archive_subtitle_color', '' );
        $hongo_subtitle_bg_color                    = hongo_option( 'hongo_archive_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_color               = hongo_option( 'hongo_archive_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color    = hongo_option( 'hongo_archive_title_breadcrumb_text_hover_color', '' );
        $hongo_title_breadcrumb_bg_color            = hongo_option( 'hongo_archive_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color        = hongo_option( 'hongo_archive_title_breadcrumb_border_color', '' );
        $hongo_title_font_size                      = hongo_option( 'hongo_archive_title_font_size', '' );
        $hongo_title_line_height                    = hongo_option( 'hongo_archive_title_line_height', '' );
        $hongo_title_letter_spacing                 = hongo_option( 'hongo_archive_title_letter_spacing', '' );
        $hongo_title_font_weight                    = hongo_option( 'hongo_archive_title_font_weight', '' );
        $hongo_subtitle_font_size                   = hongo_option( 'hongo_archive_subtitle_font_size', '' );
        $hongo_subtitle_line_height                 = hongo_option( 'hongo_archive_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing              = hongo_option( 'hongo_archive_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight                 = hongo_option( 'hongo_archive_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size                 = hongo_option( 'hongo_archive_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height               = hongo_option( 'hongo_archive_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing            = hongo_option( 'hongo_archive_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color                  = hongo_option( 'hongo_archive_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color            = hongo_option( 'hongo_archive_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color                     = hongo_option( 'hongo_archive_title_icon_color', '' );
        $hongo_title_hover_icon_color               = hongo_option( 'hongo_archive_title_icon_hover_color', '' );

    } elseif( is_home() ) { // if Home page

        /* Default Page Title Settings */
        $hongo_title_enable_border              = hongo_option( 'hongo_default_title_enable_border', '0' );
        $hongo_page_title_border_color          = hongo_option( 'hongo_default_title_border_color', '' );
        $hongo_title_opacity_color              = hongo_option( 'hongo_default_title_opacity_color', '' );
        $hongo_title_opacity                    = hongo_option( 'hongo_default_title_opacity', '0.8' );
        $hongo_title_top_space                  = hongo_option( 'hongo_default_title_top_section_space', '' );
        $hongo_title_bottom_space               = hongo_option( 'hongo_default_title_bottom_section_space', '' );
        $hongo_title_bg_color                   = hongo_option( 'hongo_default_title_bg_color', '' );
        $hongo_title_color                      = hongo_option( 'hongo_default_title_color', '' );
        $hongo_subtitle_color                   = hongo_option( 'hongo_default_subtitle_color', '' );
        $hongo_subtitle_bg_color                = hongo_option( 'hongo_default_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_color           = hongo_option( 'hongo_default_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color = hongo_option( 'hongo_default_title_breadcrumb_text_hover_color', '' );
        $hongo_title_breadcrumb_bg_color        = hongo_option( 'hongo_default_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color    = hongo_option( 'hongo_default_title_breadcrumb_border_color', '' );
        $hongo_title_font_size                  = hongo_option( 'hongo_default_title_font_size', '' );
        $hongo_title_line_height                = hongo_option( 'hongo_default_title_line_height', '' );
        $hongo_title_letter_spacing             = hongo_option( 'hongo_default_title_letter_spacing', '' );
        $hongo_title_font_weight                = hongo_option( 'hongo_default_title_font_weight', '' );
        $hongo_subtitle_font_size               = hongo_option( 'hongo_default_subtitle_font_size', '' );
        $hongo_subtitle_line_height             = hongo_option( 'hongo_default_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing          = hongo_option( 'hongo_default_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight             = hongo_option( 'hongo_default_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size             = hongo_option( 'hongo_default_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height           = hongo_option( 'hongo_default_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing        = hongo_option( 'hongo_default_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color              = hongo_option( 'hongo_default_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color        = hongo_option( 'hongo_default_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color                 = hongo_option( 'hongo_default_title_icon_color', '' );
        $hongo_title_hover_icon_color           = hongo_option( 'hongo_default_title_icon_hover_color', '' );

    } elseif( is_single() ) { // if single post

        /* Single Post Title Settings */
        $hongo_title_enable_border = hongo_option( 'hongo_single_post_title_enable_border', '0' );
        $hongo_page_title_border_color = hongo_option( 'hongo_single_post_title_border_color', '' );
        $hongo_title_opacity_color = hongo_option( 'hongo_single_post_title_opacity_color', '' );
        $hongo_title_opacity = hongo_option( 'hongo_single_post_title_opacity', '0.8' );
        $hongo_title_top_space = hongo_option( 'hongo_single_post_title_top_section_space', '' );
        $hongo_title_bottom_space = hongo_option( 'hongo_single_post_title_bottom_section_space', '' );
        $hongo_title_bg_color = hongo_option( 'hongo_single_post_title_bg_color', '' );
        $hongo_title_color = hongo_option( 'hongo_single_post_title_color', '' );
        $hongo_subtitle_color = hongo_option( 'hongo_single_post_subtitle_color', '' );
        $hongo_subtitle_bg_color = hongo_option( 'hongo_single_post_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_color = hongo_option( 'hongo_single_post_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color = hongo_option( 'hongo_single_post_title_breadcrumb_text_hover_color', '' );
        $hongo_title_breadcrumb_bg_color = hongo_option( 'hongo_single_post_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color = hongo_option( 'hongo_single_post_title_breadcrumb_border_color', '' );
        $hongo_title_font_size = hongo_option( 'hongo_single_post_title_font_size', '' );
        $hongo_title_line_height = hongo_option( 'hongo_single_post_title_line_height', '' );
        $hongo_title_letter_spacing = hongo_option( 'hongo_single_post_title_letter_spacing', '' );
        $hongo_title_font_weight = hongo_option( 'hongo_single_post_title_font_weight', '' );
        $hongo_subtitle_font_size = hongo_option( 'hongo_single_post_subtitle_font_size', '' );
        $hongo_subtitle_line_height = hongo_option( 'hongo_single_post_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing = hongo_option( 'hongo_single_post_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight = hongo_option( 'hongo_single_post_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size = hongo_option( 'hongo_single_post_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height = hongo_option( 'hongo_single_post_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing = hongo_option( 'hongo_single_post_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color = hongo_option( 'hongo_single_post_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color = hongo_option( 'hongo_single_post_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color = hongo_option( 'hongo_single_post_title_icon_color', '' );
        $hongo_title_hover_icon_color = hongo_option( 'hongo_single_post_title_icon_hover_color', '' );

    } else {

        /* Page Title Settings */
        $hongo_title_enable_border = hongo_option( 'hongo_page_title_enable_border', '0' );
        $hongo_page_title_border_color = hongo_option( 'hongo_page_title_border_color', '' );
        $hongo_title_opacity_color = hongo_option( 'hongo_page_title_opacity_color', '' );
        $hongo_title_opacity = hongo_option( 'hongo_page_title_opacity', '0.8' );
        $hongo_title_top_space = hongo_option( 'hongo_page_title_top_section_space', '' );
        $hongo_title_bottom_space = hongo_option( 'hongo_page_title_bottom_section_space', '' );
        $hongo_title_bg_color = hongo_option( 'hongo_page_title_bg_color', '' );
        $hongo_title_color = hongo_option( 'hongo_page_title_color', '' );
        $hongo_subtitle_color = hongo_option( 'hongo_page_subtitle_color', '' );
        $hongo_subtitle_bg_color = hongo_option( 'hongo_page_subtitle_bg_color', '' );
        $hongo_title_breadcrumb_bg_color = hongo_option( 'hongo_page_title_breadcrumb_bg_color', '' );
        $hongo_title_breadcrumb_border_color = hongo_option( 'hongo_page_title_breadcrumb_border_color', '' );
        $hongo_title_breadcrumb_color = hongo_option( 'hongo_page_title_breadcrumb_color', '' );
        $hongo_title_breadcrumb_text_hover_color = hongo_option( 'hongo_page_title_breadcrumb_text_hover_color', '' );
        $hongo_title_font_size = hongo_option( 'hongo_page_title_font_size', '' );
        $hongo_title_line_height = hongo_option( 'hongo_page_title_line_height', '' );
        $hongo_title_letter_spacing = hongo_option( 'hongo_page_title_letter_spacing', '' );
        $hongo_title_font_weight = hongo_option( 'hongo_page_title_font_weight', '' );
        $hongo_subtitle_font_size = hongo_option( 'hongo_page_subtitle_font_size', '' );
        $hongo_subtitle_line_height = hongo_option( 'hongo_page_subtitle_line_height', '' );
        $hongo_subtitle_letter_spacing = hongo_option( 'hongo_page_subtitle_letter_spacing', '' );
        $hongo_subtitle_font_weight = hongo_option( 'hongo_page_subtitle_font_weight', '' );
        $hongo_breadcrumb_font_size = hongo_option( 'hongo_page_breadcrumb_font_size', '' );
        $hongo_breadcrumb_line_height = hongo_option( 'hongo_page_breadcrumb_line_height', '' );
        $hongo_breadcrumb_letter_spacing = hongo_option( 'hongo_page_breadcrumb_letter_spacing', '' );
        $hongo_title_icon_bg_color = hongo_option( 'hongo_page_title_icon_bg_color', '' );
        $hongo_title_icon_hover_bg_color = hongo_option( 'hongo_page_title_icon_hover_bg_color', '' );
        $hongo_title_icon_color = hongo_option( 'hongo_page_title_icon_color', '' );
        $hongo_title_hover_icon_color = hongo_option( 'hongo_page_title_icon_hover_color', '' );
    }
?>

<?php /* Page Title Settings */ ?>

<?php if( $hongo_title_enable_border ) : ?>
/* Page Title Border */
.hongo-main-title-wrap { border-bottom: 1px solid #e6e6e6; }
<?php endif; ?>
<?php if( $hongo_title_enable_border && $hongo_page_title_border_color ) : ?>
/* Page Title Border */
.hongo-main-title-wrap { border-color: <?php echo sprintf( '%s', $hongo_page_title_border_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_opacity_color ) : ?>
/* Page Title Opacity Color */
.bg-opacity-color { background-color: <?php echo sprintf( '%s', $hongo_title_opacity_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_opacity ) : ?>
/* Page Title Opacity */
.bg-opacity-color { opacity: <?php echo sprintf( '%s', $hongo_title_opacity ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_top_space ) : ?>
/* Page Title Padding Top */
.hongo-main-title-wrap, .page-title-style-9.hongo-main-title-wrap { padding-top: <?php echo sprintf( '%s', $hongo_title_top_space ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_bottom_space ) : ?>
/* Page Title Padding Bottom */
.hongo-main-title-wrap, .page-title-style-9.hongo-main-title-wrap { padding-bottom: <?php echo sprintf( '%s', $hongo_title_bottom_space ); ?>; }
<?php endif; ?>


<?php if( $hongo_title_bg_color ) : ?>
/* Page Title Background Color */
.hongo-main-title-wrap { background-color: <?php echo sprintf( '%s', $hongo_title_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_color ) : ?>
/* Page Title Color */
.hongo-main-title-wrap .hongo-main-title { color: <?php echo sprintf( '%s', $hongo_title_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_subtitle_color ) : ?>
/* Page Subtitle Color */
.hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-3 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-4 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-5 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-6 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-7 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
.page-title-style-8 .hongo-main-subtitle { color: <?php echo sprintf( '%s', $hongo_subtitle_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_subtitle_bg_color ) : ?>
/* Page Subtitle Color */
.page-title-style-5 .hongo-main-subtitle { background-color: <?php echo sprintf( '%s', $hongo_subtitle_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_breadcrumb_bg_color ) : ?>
/* Page Title Breadcrumb BG Color */
.hongo-main-breadcrumb { background: <?php echo sprintf( '%s', $hongo_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_breadcrumb_border_color ) : ?>
/* Page Title Breadcrumb Border Color */
.hongo-main-breadcrumb { border-color: <?php echo sprintf( '%s', $hongo_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_breadcrumb_color ) : ?>
/* Page Title Breadcrumb Color */
.breadcrumb ul.hongo-main-title-breadcrumb li a, .breadcrumb ul.hongo-main-title-breadcrumb li { color: <?php echo sprintf( '%s', $hongo_title_breadcrumb_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_breadcrumb_text_hover_color ) : ?>
/* Page Title Breadcrumb Hover Color */
.breadcrumb .hongo-main-title-breadcrumb li a:hover, .breadcrumb ul.hongo-main-title-breadcrumb li a:hover { color: <?php echo sprintf( '%s', $hongo_title_breadcrumb_text_hover_color ); ?> }
<?php endif; ?>
<?php if( $hongo_title_font_size ) : ?>
/* Page Title Font Size */
.hongo-main-title { font-size: <?php echo sprintf( '%s', $hongo_title_font_size ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_title_line_height ) : ?>
/* Page Title Line Height */
.hongo-main-title { line-height: <?php echo sprintf( '%s', $hongo_title_line_height ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_title_letter_spacing ) : ?>
/* Page Title Letter Spacing */
.hongo-main-title { letter-spacing: <?php echo sprintf( '%s', $hongo_title_letter_spacing ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_title_font_weight ) : ?>
/* Page Title Font Weight */
.hongo-main-title { font-weight: <?php echo sprintf( '%s', $hongo_title_font_weight ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_subtitle_font_size ) : ?>
/* Page Subtitle Font Size */
.hongo-main-subtitle { font-size: <?php echo sprintf( '%s', $hongo_subtitle_font_size ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_subtitle_line_height ) : ?>
/* Page Subtitle Line Height */
.hongo-main-subtitle { line-height: <?php echo sprintf( '%s', $hongo_subtitle_line_height ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_subtitle_letter_spacing ) : ?>
/* Page Subtitle Letter Spacing */
.hongo-main-subtitle { letter-spacing: <?php echo sprintf( '%s', $hongo_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_subtitle_font_weight ) : ?>
/* Page Subtitle Letter Spacing */
.hongo-main-subtitle { font-weight: <?php echo sprintf( '%s', $hongo_subtitle_font_weight ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_breadcrumb_font_size ) : ?>
/* Page Title Breadcrumb Font Size */
.hongo-main-title-breadcrumb a, .hongo-main-title-breadcrumb li, .breadcrumb ul.hongo-main-title-breadcrumb > li:after { font-size: <?php echo sprintf( '%s', $hongo_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_breadcrumb_line_height ) : ?>
/* Page Title Breadcrumb Line Height */
.hongo-main-title-breadcrumb a, .hongo-main-title-breadcrumb li { line-height: <?php echo sprintf( '%s', $hongo_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_breadcrumb_letter_spacing ) : ?>
/* Page Title Breadcrumb Letter Spacing */
.hongo-main-title-breadcrumb a, .hongo-main-title-breadcrumb li { letter-spacing: <?php echo sprintf( '%s', $hongo_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>
<?php if( $hongo_title_icon_bg_color ) : ?>
/* Page Title Icon BG Color */
.hongo-main-title-wrap .down-section a { background-color: <?php echo sprintf( '%s', $hongo_title_icon_bg_color ); ?>; }
.hongo-main-title-wrap .down-section a { border-color: <?php echo sprintf( '%s', $hongo_title_icon_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_icon_hover_bg_color ) : ?>
/* Page Title Icon BG Color */
.hongo-main-title-wrap .down-section a:hover { background-color: <?php echo sprintf( '%s', $hongo_title_icon_hover_bg_color ); ?>; }
.hongo-main-title-wrap .down-section a:hover { border-color: <?php echo sprintf( '%s', $hongo_title_icon_hover_bg_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_icon_color ) : ?>
/* Page Title Icon Color */
.hongo-main-title-wrap .down-section i { color: <?php echo sprintf( '%s', $hongo_title_icon_color ); ?>; }
<?php endif; ?>
<?php if( $hongo_title_hover_icon_color ) : ?>
/* Page Title Icon Hover Color */
.hongo-main-title-wrap .down-section a:hover i { color: <?php echo sprintf( '%s', $hongo_title_hover_icon_color ); ?>; }
<?php endif;

<?php
/**
 * Generate Sidebar Custom css.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Post Widget General Settings */
	$hongo_post_widget_content_color = get_theme_mod( 'hongo_post_widget_content_color', '' );
	$hongo_post_widget_content_link_color = get_theme_mod( 'hongo_post_widget_content_link_color', '' );
	$hongo_post_widget_content_link_hover_color = get_theme_mod( 'hongo_post_widget_content_link_hover_color', '' );
	$hongo_post_widget_background_color = get_theme_mod( 'hongo_post_widget_background_color', '' );
	$hongo_post_widget_border_color = get_theme_mod( 'hongo_post_widget_border_color', '' );

	/* Post Widget Title Settings */
	$hongo_post_widget_title_font_size = get_theme_mod( 'hongo_post_widget_title_font_size', '' );
	$hongo_post_widget_title_line_height = get_theme_mod( 'hongo_post_widget_title_line_height', '' );
	$hongo_post_widget_title_letter_spacing = get_theme_mod( 'hongo_post_widget_title_letter_spacing', '' );
	$hongo_post_widget_title_text_transform = get_theme_mod( 'hongo_post_widget_title_text_transform', '' );
	$hongo_post_widget_title_font_weight = get_theme_mod( 'hongo_post_widget_title_font_weight', '' );
	$hongo_post_widget_title_color = get_theme_mod( 'hongo_post_widget_title_color', '' );

	/* Page Widget General Settings */
	$hongo_page_widget_content_color = get_theme_mod( 'hongo_page_widget_content_color', '' );
	$hongo_page_widget_content_link_color = get_theme_mod( 'hongo_page_widget_content_link_color', '' );
	$hongo_page_widget_content_link_hover_color = get_theme_mod( 'hongo_page_widget_content_link_hover_color', '' );
	$hongo_page_widget_background_color = get_theme_mod( 'hongo_page_widget_background_color', '' );
	$hongo_page_widget_border_color = get_theme_mod( 'hongo_page_widget_border_color', '' );

	/* Page Widget Title Settings */
	$hongo_page_widget_title_font_size = get_theme_mod( 'hongo_page_widget_title_font_size', '' );
	$hongo_page_widget_title_line_height = get_theme_mod( 'hongo_page_widget_title_line_height', '' );
	$hongo_page_widget_title_letter_spacing = get_theme_mod( 'hongo_page_widget_title_letter_spacing', '' );
	$hongo_page_widget_title_text_transform = get_theme_mod( 'hongo_page_widget_title_text_transform', '' );
	$hongo_page_widget_title_font_weight = get_theme_mod( 'hongo_page_widget_title_font_weight', '' );
	$hongo_page_widget_title_color = get_theme_mod( 'hongo_page_widget_title_color', '' );

	/* Product Widget General Settings */
	$hongo_product_widget_content_color = get_theme_mod( 'hongo_product_widget_content_color', '' );
	$hongo_product_widget_content_link_color = get_theme_mod( 'hongo_product_widget_content_link_color', '' );
	$hongo_product_widget_content_link_hover_color = get_theme_mod( 'hongo_product_widget_content_link_hover_color', '' );
	$hongo_product_widget_background_color = get_theme_mod( 'hongo_product_widget_background_color', '' );
	$hongo_product_widget_border_color = get_theme_mod( 'hongo_product_widget_border_color', '' );

	/* Product Widget Title Settings */
	$hongo_product_widget_title_font_size = get_theme_mod( 'hongo_product_widget_title_font_size', '' );
	$hongo_product_widget_title_line_height = get_theme_mod( 'hongo_product_widget_title_line_height', '' );
	$hongo_product_widget_title_letter_spacing = get_theme_mod( 'hongo_product_widget_title_letter_spacing', '' );
	$hongo_product_widget_title_text_transform = get_theme_mod( 'hongo_product_widget_title_text_transform', '' );
	$hongo_product_widget_title_font_weight = get_theme_mod( 'hongo_product_widget_title_font_weight', '' );
	$hongo_product_widget_title_color = get_theme_mod( 'hongo_product_widget_title_color', '' );

?>

/* Post Sidebar Widget General Settings */
	<?php if( $hongo_post_widget_content_color ) : ?>
	    /* Post Widget Content Color */
	    .hongo-post-sidebar p, .hongo-post-sidebar span.count, .hongo-post-sidebar .latest-blog-meta-date, .hongo-post-sidebar span.comment-author-link, .hongo-post-sidebar li.recentcomments { color: <?php echo sprintf( '%s', $hongo_post_widget_content_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_content_link_color ) : ?>
	    /* Post Widget Content Link Color */
	    .hongo-post-sidebar a, .hongo-post-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a { color: <?php echo sprintf( '%s', $hongo_post_widget_content_link_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_content_link_hover_color ) : ?>
	    /* Post Widget Content Link Hover Color */
	    .hongo-post-sidebar a:hover, .hongo-post-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a:hover { color: <?php echo sprintf( '%s', $hongo_post_widget_content_link_hover_color ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_background_color ) : ?>
	    /* Post Widget Content Link Hover Color */
	    .hongo-post-sidebar.hongo-sidebar-style-2 .widget { background-color: <?php echo sprintf( '%s', $hongo_post_widget_background_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_post_widget_border_color ) : ?>
	    /* Post Widget Content Link Hover Color */
	    .hongo-post-sidebar .widget { border-color: <?php echo sprintf( '%s', $hongo_post_widget_border_color ); ?> !important;}
	    .hongo-post-sidebar .form-control { border-color: <?php echo sprintf( '%s', $hongo_post_widget_border_color ); ?> }
	<?php endif; ?>
/* End Post Widget General Settings */

/* Post Sidebar Widget Title Settings */
	<?php if( $hongo_post_widget_title_font_size ) : ?>
	    /* Post Widget Title Font Size */
	    .hongo-post-sidebar .widget-title, .hongo-sidebar-style-2.hongo-post-sidebar .widget-title { font-size: <?php echo sprintf( '%s', $hongo_post_widget_title_font_size ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_title_line_height ) : ?>
	    /* Post Widget Title Line Height */
	    .hongo-post-sidebar .widget-title, .hongo-sidebar-style-2.hongo-post-sidebar .widget-title { line-height: <?php echo sprintf( '%s', $hongo_post_widget_title_line_height ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_title_letter_spacing ) : ?>
	    /* Post Widget Title Letter Spacing */
	    .hongo-post-sidebar .widget-title, .hongo-sidebar-style-2.hongo-post-sidebar .widget-title { letter-spacing: <?php echo sprintf( '%s', $hongo_post_widget_title_letter_spacing ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_title_text_transform ) : ?>
	    /* Post Widget Title Text Transform */
	    .hongo-post-sidebar .widget-title, .hongo-sidebar-style-2.hongo-post-sidebar .widget-title { text-transform: <?php echo sprintf( '%s', $hongo_post_widget_title_text_transform ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_title_font_weight ) : ?>
	    /* Post Widget Title Font Weight */
	    .hongo-post-sidebar .widget-title, .hongo-sidebar-style-2.hongo-post-sidebar .widget-title { font-weight: <?php echo sprintf( '%s', $hongo_post_widget_title_font_weight ); ?>}
	<?php endif; ?>
	<?php if( $hongo_post_widget_title_color ) : ?>
	    /* Post Widget Title Color */
	    .hongo-post-sidebar .widget-title { color: <?php echo sprintf( '%s', $hongo_post_widget_title_color ); ?>}
	<?php endif; ?>
/* End Post Widget Title Settings */


/* Page Sidebar Widget General Settings */
	<?php if( $hongo_page_widget_content_color ) : ?>
	    /* Page Widget Content Color */
	    .hongo-page-sidebar p, .hongo-page-sidebar span.count, .hongo-page-sidebar .latest-blog-meta-date, .hongo-page-sidebar span.comment-author-link, .hongo-page-sidebar li.recentcomments { color: <?php echo sprintf( '%s', $hongo_page_widget_content_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_content_link_color ) : ?>
	    /* Page Widget Content Link Color */
	    .hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a { color: <?php echo sprintf( '%s', $hongo_page_widget_content_link_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_content_link_hover_color ) : ?>
	    /* Page Widget Content Link Hover Color */
	    .hongo-page-sidebar a:hover, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a:hover { color: <?php echo sprintf( '%s', $hongo_page_widget_content_link_hover_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_background_color ) : ?>
	    /* Page Widget Content Link Hover Color */
	    .hongo-page-sidebar.hongo-sidebar-style-2 .widget { background-color: <?php echo sprintf( '%s', $hongo_page_widget_background_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_border_color ) : ?>
	    /* Page Widget Content Link Hover Color */
	    .hongo-page-sidebar .widget { border-color: <?php echo sprintf( '%s', $hongo_page_widget_border_color ); ?> !important; }
	    .hongo-page-sidebar .form-control { border-color: <?php echo sprintf( '%s', $hongo_page_widget_border_color ); ?> }
	<?php endif; ?>
/* End Page Widget General Settings */

/* Page Sidebar Widget Title Settings */
	<?php if( $hongo_page_widget_title_font_size ) : ?>
	    /* Page Widget Title Font Size */
	    .hongo-page-sidebar .widget-title, .hongo-sidebar-style-2.hongo-page-sidebar .widget-title { font-size: <?php echo sprintf( '%s', $hongo_page_widget_title_font_size ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_title_line_height ) : ?>
	    /* Page Widget Title Line Height */
	    .hongo-page-sidebar .widget-title, .hongo-sidebar-style-2.hongo-page-sidebar .widget-title { line-height: <?php echo sprintf( '%s', $hongo_page_widget_title_line_height ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_title_letter_spacing ) : ?>
	    /* Page Widget Title Letter Spacing */
	    .hongo-page-sidebar .widget-title, .hongo-sidebar-style-2.hongo-page-sidebar .widget-title { letter-spacing: <?php echo sprintf( '%s', $hongo_page_widget_title_letter_spacing ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_title_text_transform ) : ?>
	    /* Page Widget Title Text Transform */
	    .hongo-page-sidebar .widget-title, .hongo-sidebar-style-2.hongo-page-sidebar .widget-title { text-transform: <?php echo sprintf( '%s', $hongo_page_widget_title_text_transform ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_title_font_weight ) : ?>
	    /* Page Widget Title Font Weight */
	    .hongo-page-sidebar .widget-title, .hongo-sidebar-style-2.hongo-page-sidebar .widget-title { font-weight: <?php echo sprintf( '%s', $hongo_page_widget_title_font_weight ); ?> }
	<?php endif; ?>
	<?php if( $hongo_page_widget_title_color ) : ?>
	    /* Page Widget Title Color */
	    .hongo-page-sidebar .widget-title { color: <?php echo sprintf( '%s', $hongo_page_widget_title_color ); ?> }
	<?php endif; ?>
/* End Page Widget Title Settings */

/* Product Sidebar Widget General Settings */
	<?php if( $hongo_product_widget_content_color ) : ?>
	    /* Product Widget Content Color */
	    .hongo-product-sidebar p, .hongo-product-sidebar span.count, .hongo-product-sidebar .latest-blog-meta-date, .hongo-product-sidebar .price_label { color: <?php echo sprintf( '%s', $hongo_product_widget_content_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_content_link_color ) : ?>
	    /* Product Widget Content Link Color */
	    .hongo-product-sidebar a { color: <?php echo sprintf( '%s', $hongo_product_widget_content_link_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_content_link_hover_color ) : ?>
	    /* Product Widget Content Link Hover Color */
	    .hongo-product-sidebar a:hover { color: <?php echo sprintf( '%s', $hongo_product_widget_content_link_hover_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_background_color ) : ?>
	    /* Product Widget Content Link Hover Color */
	    .hongo-product-sidebar.hongo-sidebar-style-2 .widget { background-color: <?php echo sprintf( '%s', $hongo_product_widget_background_color ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_border_color ) : ?>
	    /* Product Widget Content Link Hover Color */
	    .hongo-product-sidebar .widget { border-color: <?php echo sprintf( '%s', $hongo_product_widget_border_color ); ?> !important; }
	    .hongo-product-sidebar .form-control { border-color: <?php echo sprintf( '%s', $hongo_product_widget_border_color ); ?> }
	<?php endif; ?>
/* End Product Widget General Settings */

/* Product Sidebar Widget Title Settings */
	<?php if( $hongo_product_widget_title_font_size ) : ?>
	    /* Product Widget Title Font Size */
	    .hongo-product-sidebar .widget-title, .hongo-sidebar-style-2.hongo-product-sidebar .widget-title { font-size: <?php echo sprintf( '%s', $hongo_product_widget_title_font_size ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_title_line_height ) : ?>
	    /* Product Widget Title Line Height */
	    .hongo-product-sidebar .widget-title, .hongo-sidebar-style-2.hongo-product-sidebar .widget-title { line-height: <?php echo sprintf( '%s', $hongo_product_widget_title_line_height ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_title_letter_spacing ) : ?>
	    /* Product Widget Title Letter Spacing */
	    .hongo-product-sidebar .widget-title, .hongo-sidebar-style-2.hongo-product-sidebar .widget-title { letter-spacing: <?php echo sprintf( '%s', $hongo_product_widget_title_letter_spacing ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_title_text_transform ) : ?>
	    /* Product Widget Title Text Transform */
	    .hongo-product-sidebar .widget-title, .hongo-sidebar-style-2.hongo-product-sidebar .widget-title { text-transform: <?php echo sprintf( '%s', $hongo_product_widget_title_text_transform ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_title_font_weight ) : ?>
	    /* Product Widget Title Font Weight */
	    .hongo-product-sidebar .widget-title, .hongo-sidebar-style-2.hongo-product-sidebar .widget-title { font-weight: <?php echo sprintf( '%s', $hongo_product_widget_title_font_weight ); ?> }
	<?php endif; ?>
	<?php if( $hongo_product_widget_title_color ) : ?>
	    /* Product Widget Title Color */
	    .hongo-product-sidebar .widget-title { color: <?php echo sprintf( '%s', $hongo_product_widget_title_color ); ?> }
	<?php endif; ?>
/* End Product Widget Title Settings */

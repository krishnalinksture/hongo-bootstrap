( function( $ ) {

    "use strict";
    
    $( document ).ready(function() {
        var hongo_customize = wp.customize;
        var $hongo_default_title_breadcrumb_color = '';
        var $hongo_single_post_title_breadcrumb_color = '';
        var $hongo_single_post_title_icon_bg_color = '';
        var $hongo_single_post_title_icon_color = '';
        var $hongo_button_color_author_box = ''; 
        var $hongo_button_text_color_author_box = '';
        var $hongo_button_border_color_author_box = '';
        var $hongo_archive_title_icon_bg_color = '';
        var $hongo_archive_title_icon_color = '';
        var $hongo_default_title_icon_bg_color = '';
        var $hongo_default_title_icon_color = '';
        var $hongo_product_archive_title_icon_bg_color = '';
        var $hongo_product_archive_title_icon_color = '';
        var $hongo_single_product_title_icon_bg_color = '';
        var $hongo_single_product_title_icon_color = '';
        var $hongo_single_product_title_breadcrumb_color = '';
        var $hongo_archive_title_breadcrumb_color = '';
        var $hongo_default_post_title_breadcrumb_color = '';
        var $hongo_product_archive_title_breadcrumb_color = '';
        var $hongo_archive_post_meta_color = '';
        var $hongo_category_bg_color_archive = '';
        var $hongo_category_border_color_archive = '';
        var $hongo_archive_button_color = '';
        var $hongo_archive_button_text_color = '';
        var $hongo_button_border_color_archive = '';
        var $hongo_archive_title_color = '';
        var $hongo_post_tag_like_color = '';
        var $hongo_post_author_title_text_color = '';
        var $hongo_mini_cart_title_color = '';
        var $hongo_mini_cart_button_color = '';
        var $hongo_mini_cart_bg_button_color = '';
        var $hongo_mini_cart_border_button_color = '';
        var $hongo_mini_cart_checkout_button_color = '';
        var $hongo_mini_cart_bg_checkout_button_color = '';
        var $hongo_mini_cart_border_checkout_button_color = '';
        var $hongo_single_post_meta_text_color = '';
        var $hongo_sticky_post_meta_color = '';
        var $hongo_sticky_button_color = '';
        var $hongo_sticky_button_text_color = '';
        var $hongo_sticky_title_color = '';
        var $hongo_default_post_meta_color = '';
        var $hongo_default_button_color = '';
        var $hongo_default_button_border_color = '';
        var $hongo_default_button_text_color = '';
        var $hongo_default_title_color = '';
        var $hongo_default_content_text_color = '';        
        var $hongo_box_bg_color_archive = '';
        var $hongo_category_bg_color_default = '';
        var $hongo_category_border_color_default = '';
        var $hongo_box_bg_color_default = '';
        var $hongo_page_title_icon_bg_color = '';
        var $hongo_page_title_icon_color = '';
        var $hongo_related_post_title_color = '';
        var $hongo_related_post_meta_color = '';
        var $hongo_product_archive_page_title_color = '';
        var $hongo_scroll_to_top_color = '';
        var $hongo_gdpr_content_color = '';
        var $hongo_gdpr_button_bg_color = '';
        var $hongo_gdpr_button_color = '';
        var $hongo_gdpr_button_border_color = '';
        var $hongo_account_bg_button_color = '';
        var $hongo_account_order_next_prev_color = '';
        var $hongo_account_button_color = '';
        var $hongo_account_border_button_color = '';
        var $hongo_checkout_bg_button_color = '';
        var $hongo_checkout_button_color = '';
        var $hongo_checkout_border_button_color = '';
        var $hongo_product_archive_product_title_color = '';
        var $hongo_product_archive_product_button_color = '';
        var $hongo_product_archive_product_icon_color = '';
        var $hongo_product_archive_product_button_bg_color = '';
        var $hongo_product_archive_product_icon_bg_color = '';
        var $hongo_product_archive_product_button_border_color = '';
        var $hongo_single_product_button_color = '';
        var $hongo_single_product_button_bg_color = '';
        var $hongo_single_product_button_border_color  = '';
        var $hongo_single_product_page_meta_color = '';        
        var $hongo_single_product_page_meta_social_icon_color = '';
        var $hongo_single_product_page_tab_color = '';
        var $hongo_single_product_list_heading_color = '';
        var $hongo_cart_table_content_color = '';
        var $hongo_cart_bg_button_color = '';
        var $hongo_cart_button_color = '';
        var $hongo_cart_border_button_color = '';
        var $hongo_post_widget_content_link_color = '';
        var $hongo_page_widget_content_link_color = '';
        var $hongo_product_widget_content_link_color = '';

        // Get Hover Values        
        var $hongo_default_title_breadcrumb_text_hover_color = '';
        var $hongo_single_post_title_breadcrumb_text_hover_color = '';
        var $hongo_single_post_title_icon_hover_bg_color = '';
        var $hongo_single_post_title_icon_hover_color = '';
        var $hongo_button_hover_color_author_box = '';
        var $hongo_button_hover_text_color_author_box = '';
        var $hongo_button_hover_border_color_author_box = '';
        var $hongo_archive_title_icon_hover_bg_color = '';
        var $hongo_archive_title_icon_hover_color = '';
        var $hongo_default_title_icon_hover_bg_color = '';
        var $hongo_default_title_icon_hover_color = '';
        var $hongo_product_archive_title_icon_hover_bg_color = '';
        var $hongo_product_archive_title_icon_hover_color = '';
        var $hongo_single_product_title_icon_hover_bg_color = '';
        var $hongo_single_product_title_icon_hover_color = '';
        var $hongo_single_product_title_breadcrumb_text_hover_color = '';
        var $hongo_archive_title_breadcrumb_text_hover_color = '';
        var $hongo_default_post_title_breadcrumb_text_hover_color = '';
        var $hongo_product_archive_title_breadcrumb_text_hover_color = '';
        var $hongo_box_bg_hover_color_archive = '';
        var $hongo_archive_post_meta_hover_color = '';
        var $hongo_category_bg_hover_color_archive = '';
        var $hongo_category_border_hover_color_archive = '';
        var $hongo_archive_button_hover_color = '';
        var $hongo_archive_button_text_hover_color = '';
        var $hongo_button_hover_border_color_archive = '';
        var $hongo_archive_title_hover_color = '';
        var $hongo_post_tag_like_hover_color = '';
        var $hongo_mini_cart_title_hover_color = '';
        var $hongo_mini_cart_button_hover_color = '';
        var $hongo_mini_cart_button_bg_hover_color = '';
        var $hongo_mini_cart_button_border_hover_color = '';
        var $hongo_mini_cart_checkout_button_hover_color = '';
        var $hongo_mini_cart_checkout_button_bg_hover_color = '';
        var $hongo_mini_cart_checkout_button_border_hover_color = '';
        var $hongo_post_author_title_text_hover_color = '';
        var $hongo_single_post_meta_text_hover_color = '';
        var $hongo_category_bg_hover_color_default = '';
        var $hongo_category_border_hover_color_default = '';
        var $hongo_box_bg_hover_color_default = '';
        var $hongo_sticky_post_meta_hover_color = '';
        var $hongo_sticky_button_hover_color = '';
        var $hongo_sticky_button_text_hover_color = '';
        var $hongo_sticky_title_hover_color = '';
        var $hongo_default_post_meta_hover_color = '';
        var $hongo_default_button_hover_color = '';
        var $hongo_default_button_border_hover_color = '';
        var $hongo_default_button_text_hover_color = '';
        var $hongo_default_title_hover_color = '';
        var $hongo_default_content_text_hover_color = '';
        var $hongo_page_title_icon_hover_bg_color = '';
        var $hongo_page_title_icon_hover_color = '';
        var $hongo_related_post_title_hover_color = '';
        var $hongo_related_post_meta_hover_color = '';
        var $hongo_product_archive_page_title_hover_color = '';
        var $hongo_scroll_to_top_hover_color = '';
        var $hongo_gdpr_content_hover_color = '';
        var $hongo_gdpr_button_bg_hover_color = '';
        var $hongo_gdpr_button_hover_color = '';
        var $hongo_gdpr_button_border_hover_color = '';
        var $hongo_account_bg_hover_button_color = '';
        var $hongo_account_order_next_prev_hover_color = '';
        var $hongo_account_button_hover_color = '';
        var $hongo_account_border_hover_button_color = '';
        var $hongo_checkout_bg_hover_button_color = '';
        var $hongo_checkout_button_hover_color = '';
        var $hongo_checkout_border_hover_button_color = '';
        var $hongo_product_archive_product_title_hover_color = '';
        var $hongo_product_archive_product_button_hover_color = '';
        var $hongo_product_archive_product_icon_hover_color = '';
        var $hongo_product_archive_product_button_hover_bg_color = '';
        var $hongo_product_archive_product_icon_hover_bg_color = '';
        var $hongo_product_archive_product_button_border_hover_color = '';
        var $hongo_single_product_button_hover_color = '';
        var $hongo_single_product_button_hover_bg_color = '';
        var $hongo_single_product_button_hover_border_color = '';
        var $hongo_single_product_page_meta_link_hover_color = '';
        var $hongo_single_product_page_meta_social_icon_hover_color = '';
        var $hongo_single_product_page_tab_hover_color = '';
        var $hongo_single_product_list_heading_hover_color = '';
        var $hongo_cart_table_content_hover_color = '';
        var $hongo_cart_bg_hover_button_color = '';
        var $hongo_cart_button_hover_color = '';
        var $hongo_cart_border_hover_button_color = '';
        var $hongo_post_widget_content_link_hover_color = '';
        var $hongo_page_widget_content_link_hover_color = '';
        var $hongo_product_widget_content_link_hover_color = '';

        /* For Body Background Color */
        hongo_customize( 'hongo_body_background_color', function( value ) { 
            value.bind( function( to ) {
                $( 'body' ).css( 'background-color', to );
            });
        });

        /* For Body Text Color */
        hongo_customize( 'hongo_body_text_color', function( value ) { 
            value.bind( function( to ) {
                $( 'body' ).css( 'color', to );
            });
        });

        /* For Content Text Color */
        hongo_customize( 'hongo_content_link_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_content_text_color = to;
                $( 'a' ).css( 'color', to );
                if( !$hongo_default_content_text_hover_color ){
                    hongo_customize( 'hongo_content_link_hover_color', function( value ) {
                        $( 'a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_content_text_color );
                        });
                    });
                }
            });
        });

        /* For Content Text Hover Color */
        hongo_customize( 'hongo_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_content_text_hover_color = to;                
                $( 'a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_content_text_color );
                });
            });
        });

        /* Page Opacity Color */
        hongo_customize( 'hongo_page_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Page Title BG Color */
        hongo_customize( 'hongo_page_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-page-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Page Title Color */
        hongo_customize( 'hongo_page_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap .hongo-main-title' ).css( 'color', to );
            });
        });

        /* Page Subtitle Color */
        hongo_customize( 'hongo_page_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-page-title-wrap .hongo-page-subtitle' ).css( 'color', to );
            });
        });

        /* Page Subtitle Background Color only style-5 */
        hongo_customize( 'hongo_page_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-main-subtitle' ).css( 'background-color', to );
            });
        });

        /* Page Breadcrumb BG Color */
        hongo_customize( 'hongo_page_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-page-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Page Breadcrumb Border Color */
        hongo_customize( 'hongo_page_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-page-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Page Title Breadcrumb Color */
        hongo_customize( 'hongo_page_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_breadcrumb_color = to;
                $( 'ul.hongo-main-title-breadcrumb li a, ul.hongo-main-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_default_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_page_title_breadcrumb_text_hover_color', function( value ) {                         
                        $( '.hongo-main-title-breadcrumb li a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Page Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_page_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_breadcrumb_text_hover_color = to;
                $( '.hongo-main-title-breadcrumb li a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_title_breadcrumb_color );
                });
            });
        });

        /* Page Title Border Color */
        hongo_customize( 'hongo_page_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Page Icon BG Color */
        hongo_customize( 'hongo_page_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_title_icon_bg_color = to;
                $( '.hongo-page-title-wrap .down-section a' ).css( 'background-color', to );
                $( '.hongo-page-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_page_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_page_title_icon_hover_bg_color', function( value ) {
                        $( '.hongo-page-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_page_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_page_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Page Icon Hover BG Color */
        hongo_customize( 'hongo_page_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_title_icon_hover_bg_color = to;
                $( '.hongo-page-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_page_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_page_title_icon_bg_color );
                });
            });
        });

        /* Page Icon Color */
        hongo_customize( 'hongo_page_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_title_icon_color = to;
                $( '.hongo-page-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_page_title_icon_hover_color ){
                    hongo_customize( 'hongo_page_title_icon_hover_color', function( value ) {
                        $( '.hongo-page-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_page_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Page Icon Hover Color */
        hongo_customize( 'hongo_page_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_title_icon_hover_color = to;
                $( '.hongo-page-title-wrap .down-section a' ).on( 'hover', function () {
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_page_title_icon_color );
                });
            });
        });

        /* Related Post Title Color */
        hongo_customize( 'hongo_related_post_general_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-related-posts .related-post-general-title' ).css( 'color', to );
            });
        });

        /* Related Post Overlay Color */
        hongo_customize( 'hongo_related_post_overlay_color', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-related .blog-post-images' ).css( 'background-color', to );
            });
        });

        /* Related Post Title Color */
        hongo_customize( 'hongo_related_post_title_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_related_post_title_color = to;
                $( '.hongo-related-posts .blog-post-style-related .post-details a.post-title' ).css( 'color', to );
                if( !$hongo_related_post_title_hover_color ){
                    hongo_customize( 'hongo_related_post_title_hover_color', function( value ) {
                        $( '.hongo-related-posts .blog-post-style-related .post-details a.post-title' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_related_post_title_color );
                        });
                    });
                }
            });
        });

        /* Related Post Title Hover Color */
        hongo_customize( 'hongo_related_post_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_related_post_title_hover_color = to;
                $( '.hongo-related-posts .blog-post-style-related .post-details a.post-title' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_related_post_title_color );
                });
            });
        });

        /* Related Post Meta Color */
        hongo_customize( 'hongo_related_post_meta_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_related_post_meta_color = to;
                $( '.hongo-related-post-meta, .hongo-related-post-meta a, .hongo-related-posts .blog-post-style-related .post-author, .hongo-related-posts .hongo-blog-post-category, .hongo-related-posts .blog-date-author a, .hongo-related-posts .hongo-blog-post-category a' ).css( 'color', to );
                if( !$hongo_related_post_meta_hover_color ){
                    hongo_customize( 'hongo_related_post_meta_hover_color', function( value ) { 
                        $( '.hongo-related-post-meta a, .hongo-related-posts .hongo-blog-post-category a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_related_post_meta_color );
                        });
                    });
                }
            });
        });

        /* Related Post Meta Hover Color */
        hongo_customize( 'hongo_related_post_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_related_post_meta_hover_color = to;
                $( '.hongo-related-post-meta a, .hongo-related-posts .hongo-blog-post-category a, .hongo-related-posts .blog-date-author a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_related_post_meta_color );
                });
            });
        });

        /* Related Post Content Color */
        hongo_customize( 'hongo_related_post_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-related-post-content' ).css( 'color', to );
            });
        });

        /* Related Post Separator Color */
        hongo_customize( 'hongo_related_post_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-related-posts .blog-post-style-related .separator-line-horizontal-full' ).css( 'background-color', to );
            });
        });

        /* Single Post Opacity Color */
        hongo_customize( 'hongo_single_post_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-single-post-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Single Post Title BG Color */
        hongo_customize( 'hongo_single_post_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-post-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Single Post Title Color */
        hongo_customize( 'hongo_single_post_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-post-title' ).css( 'color', to );
            });
        });

        /* Single Post Subtitle Color */
        hongo_customize( 'hongo_single_post_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-post-subtitle' ).css( 'color', to );
            });
        });

        /* Single Post Subtitle Background Color */
        hongo_customize( 'hongo_single_post_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-single-post-subtitle' ).css( 'background-color', to );
            });
        });

        /* Single Post Title Breadcrumb Color */
        hongo_customize( 'hongo_single_post_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_breadcrumb_color = to;
                $( '.hongo-single-post-title-breadcrumb a, .hongo-single-post-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_single_post_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_single_post_title_breadcrumb_text_hover_color', function( value ) {
                        $( '.hongo-single-post-title-breadcrumb > li > a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_post_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Single Post Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_single_post_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_breadcrumb_text_hover_color = to;
                $( '.hongo-single-post-title-breadcrumb > li > a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_post_title_breadcrumb_color );
                });
            });
        });

        /* Single Post Breadcrumb BG Color */
        hongo_customize( 'hongo_single_post_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-post-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Single Post Breadcrumb Border Color */
        hongo_customize( 'hongo_single_post_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-post-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Single Post Title Border Color */
        hongo_customize( 'hongo_single_post_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Single Post Icon BG Color */
        hongo_customize( 'hongo_single_post_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_icon_bg_color = to;
                $( '.hongo-single-post-title-wrap .down-section a' ).css( 'background-color', to );
                $( '.hongo-single-post-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_single_post_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_single_post_title_icon_hover_bg_color', function( value ) {
                        $( '.hongo-single-post-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_single_post_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_single_post_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Single Post Icon Hover BG Color */
        hongo_customize( 'hongo_single_post_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_icon_hover_bg_color = to;
                $( '.hongo-single-post-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_single_post_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_single_post_title_icon_bg_color );
                });
            });
        });

        /* Single Post Icon Color */
        hongo_customize( 'hongo_single_post_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_icon_color = to;
                $( '.hongo-single-post-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_single_post_title_icon_hover_color ){
                    hongo_customize( 'hongo_single_post_title_icon_hover_color', function( value ) { 
                        $( '.hongo-single-post-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_single_post_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Single Post Icon Hover Color */
        hongo_customize( 'hongo_single_post_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_title_icon_hover_color = to;
                $( '.hongo-single-post-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_single_post_title_icon_color );
                });
            });
        });

        /* Single Product Opacity Color */
        hongo_customize( 'hongo_single_product_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-single-product-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Single Product Title BG Color */
        hongo_customize( 'hongo_single_product_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-product-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Single Product Title Color */
        hongo_customize( 'hongo_single_product_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-product-title' ).css( 'color', to );
            });
        });

        /* Single Product Subtitle Color */
        hongo_customize( 'hongo_single_product_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-product-subtitle' ).css( 'color', to );
            });
        });

        /* Single Product Subtitle Background Color */
        hongo_customize( 'hongo_single_product_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-single-product-subtitle' ).css( 'background-color', to );
            });
        });

        /* Single Product Breadcrumb BG Color */
        hongo_customize( 'hongo_single_product_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-product-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Single Product Breadcrumb Border Color */
        hongo_customize( 'hongo_single_product_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-single-product-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Single Product Title Breadcrumb Color */
        hongo_customize( 'hongo_single_product_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_breadcrumb_color = to;
                $( '.hongo-single-product-title-breadcrumb a, .hongo-single-product-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_single_product_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_single_product_title_breadcrumb_text_hover_color', function( value ) {
                        $( '.hongo-single-product-title-breadcrumb > li > a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Single Product Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_single_product_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_breadcrumb_text_hover_color = to;
                $( '.hongo-single-product-title-breadcrumb > li > a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_title_breadcrumb_color );
                });
            });
        });

        /* Single Product Title Border Color */
        hongo_customize( 'hongo_single_product_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Single product title Icon BG Color */
        hongo_customize( 'hongo_single_product_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_icon_bg_color = to;
                $( '.hongo-single-product-title-wrap .down-section a' ).css( 'background-color', to );
                $( '.hongo-single-product-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_single_product_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_single_product_title_icon_hover_bg_color', function( value ) {
                        $( '.hongo-single-product-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_single_product_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_single_product_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Single product title Icon Hover BG Color */
        hongo_customize( 'hongo_single_product_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_icon_hover_bg_color = to;
                $( '.hongo-single-product-title-wrap .down-section a' ).on( 'hover', function () {               
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_single_product_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_single_product_title_icon_bg_color );
                });
            });
        });

        /* Single product title Icon Color */
        hongo_customize( 'hongo_single_product_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_icon_color = to;
                $( '.hongo-single-product-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_single_product_title_icon_hover_color ){
                    hongo_customize( 'hongo_single_product_title_icon_hover_color', function( value ) { 
                        $( '.hongo-single-product-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_single_product_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Single product title Icon Hover Color */
        hongo_customize( 'hongo_single_product_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_title_icon_hover_color = to;
                $( '.hongo-single-product-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_single_product_title_icon_color );
                });
            });
        });

        /* Archive Page Opacity Color */
        hongo_customize( 'hongo_archive_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-archive-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Archive Page Title BG Color */
        hongo_customize( 'hongo_archive_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-archive-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Archive Page Title Color */
        hongo_customize( 'hongo_archive_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-archive-title' ).css( 'color', to );
            });
        });

        /* Archive Page Subtitle Color */
        hongo_customize( 'hongo_archive_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-archive-subtitle' ).css( 'color', to );
            });
        });

        /* Archive Page Subtitle Background Color */
        hongo_customize( 'hongo_archive_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-archive-subtitle' ).css( 'background-color', to );
            });
        });

        /* Archive Breadcrumb BG Color */
        hongo_customize( 'hongo_archive_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-archive-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Archive Breadcrumb Border Color */
        hongo_customize( 'hongo_archive_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-archive-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Archive Page Title Breadcrumb Color */
        hongo_customize( 'hongo_archive_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_breadcrumb_color = to;
                $( '.hongo-archive-title-breadcrumb a, .hongo-archive-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_archive_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_archive_title_breadcrumb_text_hover_color', function( value ) {
                        $( '.hongo-archive-title-breadcrumb > li > a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_archive_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Archive Page Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_archive_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_breadcrumb_text_hover_color = to;
                $( '.hongo-archive-title-breadcrumb > li > a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_archive_title_breadcrumb_color );
                });
            });
        });

        /* Archive Page Title Border Color */
        hongo_customize( 'hongo_archive_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Archive title Icon BG Color */
        hongo_customize( 'hongo_archive_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_icon_bg_color = to;
                $( '.hongo-archive-title-wrap .down-section a' ).css( 'background-color', to );
                $( '.hongo-archive-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_archive_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_archive_title_icon_hover_bg_color', function( value ) {
                        $( '.hongo-archive-title-wrap .down-section a' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_archive_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_archive_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Archive title Icon Hover BG Color */
        hongo_customize( 'hongo_archive_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_icon_hover_bg_color = to;
                $( '.hongo-archive-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_archive_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_archive_title_icon_bg_color );
                });
            });
        });

        /* Archive title Icon Color */
        hongo_customize( 'hongo_archive_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_icon_color = to;
                $( '.hongo-archive-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_archive_title_icon_hover_color ){
                    hongo_customize( 'hongo_archive_title_icon_hover_color', function( value ) {
                        $( '.hongo-archive-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_archive_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Archive title Icon Hover Color */
        hongo_customize( 'hongo_archive_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_icon_hover_color = to;
                $( '.hongo-archive-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_archive_title_icon_color );
                });
            });
        });

        /* Default Page Opacity Color */
        hongo_customize( 'hongo_default_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Default Page Title BG Color */
        hongo_customize( 'hongo_default_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Default Page Title Color */
        hongo_customize( 'hongo_default_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-title' ).css( 'color', to );
            });
        });

        /* Default Page Subtitle Color */
        hongo_customize( 'hongo_default_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-subtitle' ).css( 'color', to );
            });
        });

        /* Default Page Subtitle Background Color */
        hongo_customize( 'hongo_default_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-default-subtitle' ).css( 'background-color', to );
            });
        });

        /* Default Breadcrumb BG Color */
        hongo_customize( 'hongo_default_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Default Breadcrumb Border Color */
        hongo_customize( 'hongo_default_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Default Page Title Border Color */
        hongo_customize( 'hongo_default_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Default title Icon BG Color */
        hongo_customize( 'hongo_default_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_icon_bg_color = to;
                $( 'hongo-default-title-wrap .down-section a' ).css( 'background-color', to );
                $( 'hongo-default-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_default_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_default_title_icon_hover_bg_color', function( value ) {
                        $( '.hongo-default-title-wrap .down-section a' ).on( 'hover', function () {                         
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_default_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_default_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Default title Icon Hover BG Color */
        hongo_customize( 'hongo_default_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_icon_hover_bg_color = to;
                $( '.hongo-default-title-wrap .down-section a' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_default_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_default_title_icon_bg_color );
                });
            });
        });

        /* Default title Icon Color */
        hongo_customize( 'hongo_default_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_icon_color = to;
                $( 'hongo-default-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_default_title_icon_hover_color ){
                    hongo_customize( 'hongo_default_title_icon_hover_color', function( value ) {
                        $( '.hongo-default-title-wrap .down-section a' ).on( 'hover', function () {                        
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_default_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Default title Icon Hover Color */
        hongo_customize( 'hongo_default_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_icon_hover_color = to;
                $( '.hongo-default-title-wrap .down-section a' ).on( 'hover', function () {
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_default_title_icon_color );
                });
            });
        });

        /* Default Page Title Breadcrumb Color */
        hongo_customize( 'hongo_default_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_post_title_breadcrumb_color = to;
                $( '.hongo-default-title-breadcrumb a, .hongo-default-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_default_post_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_default_title_breadcrumb_text_hover_color', function( value ) {
                        $( '.hongo-default-title-breadcrumb > li > a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_post_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Default Page Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_default_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_post_title_breadcrumb_text_hover_color = to;
                $( '.hongo-default-title-breadcrumb > li > a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_post_title_breadcrumb_color );
                });
            });
        });

        /* Product Archive Page Opacity Color */
        hongo_customize( 'hongo_product_archive_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-product-archive-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Product Archive Page Title BG Color */
        hongo_customize( 'hongo_product_archive_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-product-archive-title-wrap' ).css( 'background-color', to );
            });
        });

        /* Product Archive Page Title Color */
        hongo_customize( 'hongo_product_archive_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-product-archive-title' ).css( 'color', to );
            });
        });

        /* Product Archive Page Subtitle Color */
        hongo_customize( 'hongo_product_archive_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-product-archive-subtitle' ).css( 'color', to );
            });
        });

        /* Product Archive Page Subtitle background Color */
        hongo_customize( 'hongo_product_archive_subtitle_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.page-title-style-5 .hongo-product-archive-subtitle' ).css( 'background-color', to );
            });
        });

        /* Product archive Breadcrumb BG Color */
        hongo_customize( 'hongo_product_archive_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-product-archive-breadcrumb' ).css( 'background-color', to );
            });
        });

        /* Product archive Breadcrumb Border Color */
        hongo_customize( 'hongo_product_archive_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-product-archive-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Product Archive Page Title Breadcrumb Color */
        hongo_customize( 'hongo_product_archive_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_breadcrumb_color = to;
                $( '.hongo-product-archive-title-breadcrumb a, .hongo-product-archive-title-breadcrumb li' ).css( 'color', to );
                if( !$hongo_product_archive_title_breadcrumb_text_hover_color ){
                    hongo_customize( 'hongo_product_archive_title_breadcrumb_text_hover_color', function( value ) {
                        $( '.hongo-product-archive-title-breadcrumb > li > a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_product_archive_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Page Title Breadcrumb Hover Color */
        hongo_customize( 'hongo_product_archive_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_breadcrumb_text_hover_color = to;
                $( '.hongo-product-archive-title-breadcrumb > li > a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_product_archive_title_breadcrumb_color );
                });
            });
        });

        /* Product Archive Page Title Border Color */
        hongo_customize( 'hongo_product_archive_title_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-main-title-wrap' ).css( 'border-color', to );
            });
        });

        /* Product archive title Icon BG Color */
        hongo_customize( 'hongo_product_archive_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_icon_bg_color = to;
                $( '.hongo-product-archive-title-wrap .down-section a' ).css( 'background-color', to );
                $( '.hongo-product-archive-title-wrap .down-section a' ).css( 'border-color', to );
                if( !$hongo_product_archive_title_icon_hover_bg_color ){
                    hongo_customize( 'hongo_product_archive_title_icon_hover_bg_color', function( value ) { 
                        $( '.hongo-product-archive-title-wrap .down-section a' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_product_archive_title_icon_bg_color );
                            $(this).css( 'border-color', $hongo_product_archive_title_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Product archive title Icon Hover BG Color */
        hongo_customize( 'hongo_product_archive_title_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_icon_hover_bg_color = to;
                $( '.hongo-product-archive-title-wrap .down-section a' ).on( 'hover', function () {           
                    $(this).css( 'background-color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_product_archive_title_icon_bg_color );
                    $(this).css( 'border-color', $hongo_product_archive_title_icon_bg_color );
                });
            });
        });

        /* Product archive title Icon Color */
        hongo_customize( 'hongo_product_archive_title_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_icon_color = to;
                $( '.hongo-product-archive-title-wrap .down-section a i' ).css( 'color', to );
                if( !$hongo_product_archive_title_icon_hover_color ){
                    hongo_customize( 'hongo_product_archive_title_icon_hover_color', function( value ) { 
                        $( '.hongo-product-archive-title-wrap .down-section a' ).on( 'hover', function () {
                            $(this).children('i').css( 'color', '' );
                        }, function(){
                            $(this).children('i').css( 'color', $hongo_product_archive_title_icon_color );
                        });
                    });
                }
            });
        });

       /* Product archive title Icon Hover Color */
        hongo_customize( 'hongo_product_archive_title_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_title_icon_hover_color = to;
                $( '.hongo-product-archive-title-wrap .down-section a' ).on( 'hover', function () {
                    $(this).children('i').css( 'color', to );
                }, function(){
                    $(this).children('i').css( 'color', $hongo_product_archive_title_icon_color );
                });
            });
        });

        /* Archive Box opacity Color */
        hongo_customize( 'hongo_image_opacity_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-blog-pages.hongo-blog-modern .blog-image, .hongo-blog-pages.hongo-blog-overlay-image .hongo-overlay, .hongo-blog-pages.hongo-blog-image figure .hongo-overlay' ).css( 'background-color', to );
            });
        });

        /* Archive Box BG Color */
        hongo_customize( 'hongo_box_bg_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_box_bg_color_archive = to;
                $( '.hongo-blog-pages .blog-modern .blog-text .hongo-blog-modern-wrap, .hongo-blog-pages .blog-masonry .blog-text, .hongo-blog-pages .blog-overlay-image .post, .hongo-blog-pages .blog-only-text .blog-text, .hongo-blog-pages.hongo-blog-standard .blog-post' ).css( 'background-color', to );
                if( !$hongo_box_bg_hover_color_archive ){
                    hongo_customize( 'hongo_box_bg_hover_color_archive', function( value ) {
                        $( '.hongo-blog-pages .blog-only-text .blog-text' ).on( 'hover', function () {                         
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_box_bg_color_archive );
                        });
                    });
                }
            });
        });

        /* Archive Box bg hover Color */
        hongo_customize( 'hongo_box_bg_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_box_bg_hover_color_archive = to;
                $( '.hongo-blog-pages .blog-only-text .blog-text' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_box_bg_color_archive );
                });
            });
        });

        /* Archive Meta Color */
        hongo_customize( 'hongo_post_meta_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_post_meta_color = to;
                $( '.hongo-blog-pages .author .name a, .hongo-blog-pages .blog-separator, .hongo-blog-pages .hongo-blog-post-meta, .hongo-blog-pages .hongo-blog-post-meta a,.hongo-blog-pages .blog-image-category-wrap a, .hongo-blog-pages.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-blog-pages.hongo-blog-clean .hongo-blog-post-category a, .hongo-blog-pages span.hongo-blog-post-separator, .hongo-blog-pages.hongo-blog-masonry .hongo-blog-post-category a' ).css( 'color', to );
                $( '.hongo-blog-pages.hongo-blog-clean .blog-date-author:before ,.hongo-blog-pages.hongo-blog-clean .blog-like-comment:before' ).css( 'background-color', to );
                $( '.hongo-blog-pages.hongo-blog-standard .content .hongo-blog-post-meta-wrap, .hongo-blog-pages.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta' ).css( 'border-color', to );
                if( !$hongo_archive_post_meta_hover_color ){
                    hongo_customize( 'hongo_post_meta_hover_color', function( value ) {
                        $( '.hongo-blog-pages .author .name a, .hongo-blog-pages a.hongo-blog-post-meta, .hongo-blog-pages .hongo-blog-post-meta a, .hongo-blog-pages a.hongo-blog-post-meta' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_archive_post_meta_color );
                        });
                    });
                    $( '.hongo-blog-pages .author .name a, .hongo-blog-pages .blog-like-comment a' ).on( 'hover', function () {
                        $(this).children('.fa').css( 'color', to );
                    }, function(){
                        $(this).children('.fa').css( 'color', $hongo_archive_post_meta_color );
                    });

                    $( '.hongo-blog-pages .blog-date-author::before, .hongo-blog-pages .blog-like-comment::before' ).on( 'hover', function () {
                        $(this).css( 'background-color', to );
                    }, function(){
                        $(this).css( 'background-color', $hongo_default_post_meta_color );
                    });
                }
            });
        });

        /* Archive Meta Hover Color */
        hongo_customize( 'hongo_post_meta_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_post_meta_hover_color = to;
                $( '.hongo-blog-pages .author .name a, .hongo-blog-pages a.hongo-blog-post-meta, .hongo-blog-pages .hongo-blog-post-meta a, .hongo-blog-pages a.hongo-blog-post-meta' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_archive_post_meta_color );
                });
                $( '.hongo-blog-pages .author .name a, .hongo-blog-pages .blog-like-comment a' ).on( 'hover', function () {
                    $(this).children('.fa').css( 'color', to );
                }, function(){
                    $(this).children('.fa').css( 'color', $hongo_archive_post_meta_color );
                });
            });
        });

        /* Archive Category Bg Color */
        hongo_customize( 'hongo_category_bg_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_bg_color_archive = to;
                $( '.hongo-blog-pages.hongo-blog-masonry .hongo-blog-post-category, .hongo-blog-pages.hongo-blog-clean .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-only-text .hongo-blog-post-category a, .hongo-blog-pages.hongo-blog-image .hongo-blog-post-category a' ).css( 'background-color', to );
                if( !$hongo_category_bg_hover_color_archive ){
                    hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) { 
                        $( '.hongo-blog-pages.hongo-blog-image figure' ).on( 'hover', function () {
                            $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', '' );
                        }, function(){
                            $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', $hongo_category_bg_color_archive );
                        });
                    });
                }
            });
        });

        /* Archive Category Bg hover Color */
        hongo_customize( 'hongo_category_bg_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_bg_hover_color_archive = to;
                $( '.hongo-blog-pages.hongo-blog-image figure' ).on( 'hover', function () {
                    $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', to );
                }, function(){
                    $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', $hongo_category_bg_color_archive );
                });
            });
        });

        /* Archive Category border Color */
        hongo_customize( 'hongo_category_border_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_border_color_archive = to;
                $( '.hongo-blog-pages.hongo-blog-image .hongo-blog-post-category a' ).css( 'border-color', to );
                if( !$hongo_category_border_hover_color_default ){
                    hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) { 
                        $( '.hongo-blog-pages.hongo-blog-image figure' ).on( 'hover', function () {
                            $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', '' );
                        }, function(){
                            $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', $hongo_category_border_color_archive );
                        });
                    });
                }
            });
        });

        /* Archive Category border hover Color */
        hongo_customize( 'hongo_category_border_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_border_hover_color_archive = to;
                $( '.hongo-blog-pages.hongo-blog-image figure' ).on( 'hover', function () {
                    $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', to );
                }, function(){
                    $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', $hongo_category_border_color_archive );
                });
            });
        });

        /* Archive Button Color */
        hongo_customize( 'hongo_button_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_button_color = to;
                $( '.hongo-blog-pages a.btn' ).css( 'background-color', to );
                if( !$hongo_archive_button_hover_color ){
                    hongo_customize( 'hongo_button_hover_color_archive', function( value ) {
                        $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_archive_button_color );
                        });
                    });
                }
            });
        });

        /* Archive Button Hover Color */
        hongo_customize( 'hongo_button_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_button_hover_color = to;
                $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_archive_button_color );
                });
            });
        });

        /* Archive Button Text Color */
        hongo_customize( 'hongo_button_text_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_button_text_color = to;
                $( '.hongo-blog-pages a.btn' ).css( 'color', to );
                if( !$hongo_archive_button_text_hover_color ){
                    hongo_customize( 'hongo_button_hover_text_color_archive', function( value ) { 
                        $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_archive_button_text_color );
                        });
                    });
                }
            });
        });

        /* Archive Button Text Hover Color */
        hongo_customize( 'hongo_button_hover_text_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_button_text_hover_color = to;
                $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_archive_button_text_color );
                });
            });
        });

        /* Archive Button Border Color */
        hongo_customize( 'hongo_button_border_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_border_color_archive = to;
                $( '.hongo-blog-pages a.btn' ).css( 'border-color', to );
                if( !$hongo_button_hover_border_color_archive ){
                    hongo_customize( 'hongo_button_hover_border_color_archive', function( value ) {
                        $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_button_border_color_archive );
                        });
                    });
                }
            });
        });

        /* Archive Button Border Hover Color */
        hongo_customize( 'hongo_button_hover_border_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_hover_border_color_archive = to;
                $( '.hongo-blog-pages a.btn' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_button_border_color_archive );
                });
            });
        });

        /* Archive Title Color */
        hongo_customize( 'hongo_title_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_color = to;
                $( '.hongo-blog-pages .entry-title' ).css( 'color', to );
                if( !$hongo_archive_title_hover_color ){
                    hongo_customize( 'hongo_title_hover_color_archive', function( value ) { 
                        $( '.hongo-blog-pages .entry-title' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_archive_title_color );
                        });
                    });
                }
            });
        });

        /* Archive Title Hover Color */
        hongo_customize( 'hongo_title_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $hongo_archive_title_hover_color = to;
                $( '.hongo-blog-pages .entry-title' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_archive_title_color );
                });
            });
        });

        /* Archive Content Color */
        hongo_customize( 'hongo_content_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-blog-pages .entry-content' ).css( 'color', to );
            });
        });

        /* Archive Separator Color */
        hongo_customize( 'hongo_separator_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-blog-pages .separator-line-horizontal-full' ).css( 'background-color', to );
               $( '.hongo-list-border-archive' ).css( 'border-color', to );
            });
        });

        /* Archive Border Color */
        hongo_customize( 'hongo_box_border_color_archive', function( value ) { 
            value.bind( function( to ) {                
               $( '.hongo-blog-pages.hongo-blog-overlay-image .post,.hongo-blog-pages.hongo-blog-only-text .post, .hongo-blog-pages.hongo-blog-standard .blog-post' ).css( 'border-color', to );
            });
        });

        /* Archive Border Type */
        hongo_customize( 'hongo_box_border_type_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-blog-pages.hongo-blog-overlay-image .blog-text' ).css( 'border-style', to );
            });
        });

        /* Archive Border Size */
        hongo_customize( 'hongo_box_border_size_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-blog-pages.hongo-blog-overlay-image .blog-text' ).css( 'border-width', to );
            });
        });

        /* Archive Overlay Color */
        hongo_customize( 'hongo_overlay_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-archive .blog-post-images, .grid-item.blog-post-style-archive .blog-img' ).css( 'background-color', to );
            });
        });

        /* Single Page Tag, Like Color */
        hongo_customize( 'hongo_post_tag_like_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_tag_like_color = to;
                $( '.hongo-post-detail-icon ul li a, .hongo-post-detail-icon .hongo-blog-detail-like li a, .tagcloud a, .hongo-post-detail-icon .hongo-blog-detail-like li a i' ).css( 'color', to );
                $( '.hongo-post-detail-icon ul li a, .hongo-post-detail-icon .hongo-blog-detail-like li a, .tagcloud a, .hongo-post-detail-icon .hongo-blog-detail-like li a i' ).css( 'border-color', to );
                if( !$hongo_post_tag_like_hover_color ){
                    hongo_customize( 'hongo_post_tag_like_hover_color', function( value ) {
                        $( '.hongo-post-detail-icon ul li a, .tag-cloud a,.hongo-post-detail-icon .hongo-blog-detail-like li a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_post_tag_like_color );
                            $(this).css( 'border-color', $hongo_post_tag_like_color );
                        });
                    });
                }
            });
        });

        /* Single Page Tag, Like Hover Color */
        hongo_customize( 'hongo_post_tag_like_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_tag_like_hover_color = to;
                $( '.hongo-post-detail-icon ul li a, .tagcloud a,.hongo-post-detail-icon .hongo-blog-detail-like li a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'color', $hongo_post_tag_like_color );
                    $(this).css( 'border-color', $hongo_post_tag_like_color );
                });
            });
        });

        /* Author Box Background Color */
        hongo_customize( 'hongo_post_author_box_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-author-box-wrap .hongo-author-box' ).css( 'background-color', to );
            });
        });

        /* Author Title Color */
        hongo_customize( 'hongo_post_author_title_text_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_author_title_text_color = to;
                $( '.hongo-author-box-wrap .hongo-author-title a' ).css( 'color', to );
                if( !$hongo_post_author_title_text_hover_color ){
                    hongo_customize( 'hongo_post_author_title_text_hover_color', function( value ) {
                        $( '.hongo-author-box-wrap .hongo-author-title a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_post_author_title_text_color );
                        });
                    });
                }
            });
        });

        /* Author Title Hover Color */
        hongo_customize( 'hongo_post_author_title_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_author_title_text_hover_color = to;
                $( '.hongo-author-box-wrap .hongo-author-title a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_post_author_title_text_color );
                });
            });
        });

        /* Author Box Content Color */
        hongo_customize( 'hongo_post_author_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-author-box-wrap .hongo-author-content' ).css( 'color', to );
            });
        });

        /* Author Box Button Color */
        hongo_customize( 'hongo_button_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).css( 'background-color', to );
                if( !$hongo_button_hover_color_author_box ){
                    hongo_customize( 'hongo_button_hover_color_author_box', function( value ) {
                        $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_button_color_author_box );
                        });
                    });
                }
            });
        });

        /* Author Box Button Hover Color */
        hongo_customize( 'hongo_button_hover_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_hover_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_button_color_author_box );
                });
            });
        });

        /* Author Box Button Text Color */
        hongo_customize( 'hongo_button_text_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_text_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).css( 'color', to );
                if( !$hongo_button_hover_text_color_author_box ){
                    hongo_customize( 'hongo_button_hover_text_color_author_box', function( value ) { 
                        $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_button_text_color_author_box );
                        });
                    });
                }
            });
        });

        /* Author Box Button Text Hover Color */
        hongo_customize( 'hongo_button_hover_text_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_hover_text_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_button_text_color_author_box );
                });
            });
        });

        /* Author Box Button Border Color */
        hongo_customize( 'hongo_button_border_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_border_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).css( 'border-color', to );
                if( !$hongo_button_hover_border_color_author_box ){
                    hongo_customize( 'hongo_button_hover_border_color_author_box', function( value ) {
                        $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_button_border_color_author_box );
                        });
                    });
                }
            });
        });

        /* Author Box Button Border Hover Color */
        hongo_customize( 'hongo_button_hover_border_color_author_box', function( value ) { 
            value.bind( function( to ) {
                $hongo_button_hover_border_color_author_box = to;
                $( '.hongo-author-box-wrap a.btn' ).on( 'hover', function () {                
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_button_border_color_author_box );
                });
            });
        });

        /* Post Meta Color */
        hongo_customize( 'hongo_single_post_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_meta_text_color = to;
                $( '.hongo-single-post-meta ul li ,.hongo-single-post-meta ul li a' ).css( 'color', to );
                if( !$hongo_single_post_meta_text_hover_color ){
                    hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) {
                        $( '.hongo-single-post-meta ul li a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_post_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Post Meta Hover Color */
        hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_post_meta_text_hover_color = to;
                $( '.hongo-single-post-meta ul li a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_post_meta_text_color );
                });
            });
        });

        /* Default Category Bg Color */
        hongo_customize( 'hongo_category_bg_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_bg_color_default = to;
                $( '.hongo-default-post-description.hongo-blog-masonry .hongo-blog-post-category, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-only-text .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-image .hongo-blog-post-category a' ).css( 'background-color', to );
                if( !$hongo_category_bg_hover_color_default ){
                    hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) {
                        $( '.hongo-default-post-description.hongo-blog-image figure' ).on( 'hover', function () {
                            $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', '' );
                        }, function(){
                            $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', $hongo_category_bg_color_default );
                        });
                    });
                }
            });
        });

        /* Default Category Bg hover Color */
        hongo_customize( 'hongo_category_bg_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_bg_hover_color_default = to;
                $( '.hongo-default-post-description.hongo-blog-image figure' ).on( 'hover', function () {
                    $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', to );
                }, function(){
                    $(this).find( '.blog-image-category-wrap a' ).css( 'background-color', $hongo_category_bg_color_default );
                });
            });
        });

        /* Default Category border Color */
        hongo_customize( 'hongo_category_border_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_border_color_default = to;
                $( '.hongo-default-post-description.hongo-blog-image .hongo-blog-post-category a' ).css( 'border-color', to );
                if( !$hongo_category_border_hover_color_default ){
                    hongo_customize( 'hongo_single_post_meta_text_hover_color', function( value ) { 
                        $( '.hongo-default-post-description.hongo-blog-image figure' ).on( 'hover', function () {
                            $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', '' );
                        }, function(){
                            $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', $hongo_category_border_color_default );
                        });
                    });
                }
            });
        });

        /* Default Category border hover Color */
        hongo_customize( 'hongo_category_border_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_category_border_hover_color_default = to;
                $( '.hongo-default-post-description.hongo-blog-image figure' ).on( 'hover', function () {
                    $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', to );
                }, function(){
                    $(this).find( '.blog-image-category-wrap a' ).css( 'border-color', $hongo_category_border_color_default );
                });
            });
        });

        /* Default Box BG Color */
        hongo_customize( 'hongo_box_bg_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_box_bg_color_default = to;
                $( '.hongo-default-post-description .blog-modern .blog-text .hongo-blog-modern-wrap, .hongo-default-post-description .blog-masonry .blog-text, .hongo-default-post-description .blog-overlay-image .post, .hongo-default-post-description .blog-only-text .blog-text, .hongo-default-post-description.hongo-blog-standard .blog-post' ).css( 'background-color', to );
                if( !$hongo_box_bg_hover_color_default ){
                    hongo_customize( 'hongo_box_bg_hover_color_default', function( value ) {
                        $( '.hongo-default-post-description .blog-only-text .blog-text' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_box_bg_color_default );
                        });
                    });
                }
            });
        });

        /* Default Box bg hover Color */
        hongo_customize( 'hongo_box_bg_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_box_bg_hover_color_default = to;
                $( '.hongo-default-post-description .blog-only-text .blog-text' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_box_bg_color_default );
                });
            });
        });

        /* Default Meta Color */
        hongo_customize( 'hongo_post_meta_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_post_meta_color = to;                
                $( '.hongo-default-post-description .author .name a, .hongo-default-post-description .blog-separator, .hongo-default-post-description .hongo-blog-post-meta, .hongo-default-post-description .hongo-blog-post-meta a,.hongo-default-post-description .blog-image-category-wrap a, .hongo-default-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description span.hongo-blog-post-separator' ).css( 'color', to );
                $( '.hongo-default-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta, .hongo-default-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap' ).css( 'border-color', to );
                if( !$hongo_default_post_meta_hover_color ){
                    hongo_customize( 'hongo_post_meta_hover_color', function( value ) { 
                        $( '.hongo-default-post-description .author .name a, .hongo-default-post-description a.hongo-blog-post-meta, .hongo-default-post-description .hongo-blog-post-meta a, .hongo-default-post-description a.hongo-blog-post-meta, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-image figure .blog-image-category-wrap a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_post_meta_color );
                        });
                    });
                    $( '.hongo-default-post-description .author .name a, .hongo-default-post-description .blog-like-comment a' ).on( 'hover', function () {
                        $(this).children('.fa').css( 'color', to );
                    }, function(){
                        $(this).children('.fa').css( 'color', $hongo_default_post_meta_color );
                    });

                    $( '.hongo-default-post-description .blog-date-author::before, .hongo-default-post-description .blog-like-comment::before' ).on( 'hover', function () {                    
                        $(this).css( 'background-color', to );
                    }, function(){
                        $(this).css( 'background-color', $hongo_default_post_meta_color );
                    });
                }
            });
        });

        /* Default Meta Hover Color */
        hongo_customize( 'hongo_post_meta_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_post_meta_hover_color = to;
                $( '.hongo-default-post-description .author .name a, .hongo-default-post-description a.hongo-blog-post-meta, .hongo-default-post-description .hongo-blog-post-meta a, .hongo-default-post-description a.hongo-blog-post-meta, .hongo-default-post-description.hongo-blog-clean .hongo-blog-post-category a, .hongo-default-post-description.hongo-blog-image figure .blog-image-category-wrap a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_post_meta_color );
                });
                $( '.hongo-default-post-description .author .name a, .hongo-default-post-description .blog-like-comment a' ).on( 'hover', function () {
                    $(this).children('.fa').css( 'color', to );
                }, function(){
                    $(this).children('.fa').css( 'color', $hongo_default_post_meta_color );
                });

                $( '.hongo-default-post-description .blog-date-author::before, .hongo-default-post-description .blog-like-comment::before' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_default_post_meta_color );
                });
            });
        });

        /* Default Button Color */
        hongo_customize( 'hongo_button_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_color = to;
                $( '.hongo-default-post-description a.btn' ).css( 'background-color', to );
                if( !$hongo_default_button_hover_color ){
                    hongo_customize( 'hongo_button_hover_color_default', function( value ) {
                        $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_default_button_color );
                        });
                    });
                }
            });
        });

        /* Default Button Hover Color */
        hongo_customize( 'hongo_button_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_hover_color = to;
                $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_default_button_color );
                });
            });
        });

        /* Default Button Text Color */
        hongo_customize( 'hongo_button_text_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_text_color = to;
                $( '.hongo-default-post-description a.btn' ).css( 'color', to );
                if( !$hongo_default_button_text_hover_color ){
                    hongo_customize( 'hongo_button_hover_text_color_default', function( value ) {
                        $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_button_text_color );
                        });
                    });
                }
            });
        });

        /* Default Button Text Hover Color */
        hongo_customize( 'hongo_button_hover_text_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_text_hover_color = to;
                $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_button_text_color );
                });
            });
        });        

        /* Default Button Border Color */
        hongo_customize( 'hongo_button_border_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_border_color = to;
                $( '.hongo-default-post-description a.btn' ).css( 'border-color', to );
                if( !$hongo_default_button_border_hover_color ){
                    hongo_customize( 'hongo_button_hover_color_default', function( value ) {
                        $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_default_button_border_color );
                        });
                    });
                }
            });
        });

        /* Default Button Border Hover Color */
        hongo_customize( 'hongo_button_border_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_button_border_hover_color = to;
                $( '.hongo-default-post-description a.btn' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_default_button_border_color );
                });
            });
        });

        /* Default Image opacity Color */
        hongo_customize( 'hongo_image_opacity_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-post-description.hongo-blog-modern .blog-image, .hongo-default-post-description.hongo-blog-overlay-image .hongo-overlay, .hongo-default-post-description.hongo-blog-image figure .hongo-overlay' ).css( 'background-color', to );
            });
        });

        /* Default Title Color */
        hongo_customize( 'hongo_title_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_color = to;
                $( '.hongo-default-post-description .entry-title' ).css( 'color', to );
                if( !$hongo_default_title_hover_color ){
                    hongo_customize( 'hongo_title_hover_color_default', function( value ) {
                        $( '.hongo-default-post-description .entry-title' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_default_title_color );
                        });
                    });
                }
            });
        });

        /* Default Title Hover Color */
        hongo_customize( 'hongo_title_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $hongo_default_title_hover_color = to;
                $( '.hongo-default-post-description .entry-title' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_default_title_color );
                });
            });
        });

        /* Default Content Color */
        hongo_customize( 'hongo_content_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-post-description .entry-content' ).css( 'color', to );
            });
        });

        /* Default Separator Color */
        hongo_customize( 'hongo_separator_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-default-post-description .separator-line-horizontal-full' ).css( 'background-color', to );
               $( '.hongo-list-border-default' ).css( 'border-color', to );
            });
        });

        /* Default Border Color */
        hongo_customize( 'hongo_box_border_color_default', function( value ) { 
            value.bind( function( to ) {                
               $( '.hongo-default-post-description.hongo-blog-overlay-image .post,.hongo-default-post-description.hongo-blog-only-text .post, .hongo-default-post-description.hongo-blog-standard .blog-post' ).css( 'border-color', to );
            });
        });

        /* Default Overlay Color */
        hongo_customize( 'hongo_overlay_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-default .blog-post-images, .grid-item.blog-post-style-default .blog-img' ).css( 'background-color', to );
            });
        });

        /* Sticky Post Bg Color */
        hongo_customize( 'hongo_box_bg_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.sticky.post .blog-post' ).css( 'background-color', to );
            });
        });

        /* Sticky Post content Color */
        hongo_customize( 'hongo_content_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-sticky-post-description.hongo-blog-standard .content .entry-content' ).css( 'color', to );
            });
        });

        /* Sticky Meta Color */
        hongo_customize( 'hongo_post_meta_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_post_meta_color = to;
                $( '.hongo-sticky-post-description .author .name a, .hongo-sticky-post-description .blog-separator, .hongo-sticky-post-description .hongo-blog-post-meta, .hongo-sticky-post-description .hongo-blog-post-meta a, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot, .hongo-sticky-post-description .hongo-blog-post-category' ).css( 'color', to );
                $( '.hongo-sticky-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap , .hongo-sticky-post-description.hongo-blog-standard .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta' ).css( 'border-color', to );
                if( !$hongo_sticky_post_meta_hover_color ){
                    hongo_customize( 'hongo_post_meta_hover_color', function( value ) {
                        $( '.hongo-sticky-post-description .author .name a, .hongo-sticky-post-description a.hongo-blog-post-meta, .hongo-sticky-post-description .hongo-blog-post-meta a, .hongo-sticky-post-description a.hongo-blog-post-meta, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a, , .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category span.dot' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_sticky_post_meta_color );
                        });
                    });
                    $( '.hongo-sticky-post-description .author .name a, .hongo-sticky-post-description .blog-like-comment a, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a' ).on( 'hover', function () {                    
                        $(this).children('.fa').css( 'color', to );
                    }, function(){
                        $(this).children('.fa').css( 'color', $hongo_sticky_post_meta_color );
                    });
                }
            });
        });

        /* Sticky Meta Hover Color */
        hongo_customize( 'hongo_post_meta_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_post_meta_hover_color = to;
                $( '.hongo-sticky-post-description .author .name a, .hongo-sticky-post-description a.hongo-blog-post-meta, .hongo-sticky-post-description .hongo-blog-post-meta a, .hongo-sticky-post-description a.hongo-blog-post-meta, .hongo-sticky-post-description.hongo-blog-standard .content .content-wrap .hongo-blog-post-category a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_sticky_post_meta_color );
                });
                $( '.hongo-sticky-post-description .author .name a, .hongo-sticky-post-description .blog-like-comment a' ).on( 'hover', function () {
                    $(this).children('.fa').css( 'color', to );
                }, function(){
                    $(this).children('.fa').css( 'color', $hongo_sticky_post_meta_color );
                });
            });
        });

        /* Sticky Button Color */
        hongo_customize( 'hongo_button_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_button_color = to;
                $( '.hongo-sticky-post-description a.btn' ).css( 'background-color', to );
                if( !$hongo_sticky_button_hover_color ){
                    hongo_customize( 'hongo_button_hover_color_sticky', function( value ) {
                        $( '.hongo-sticky-post-description a.btn' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_sticky_button_color );
                        });
                    });
                }
            });
        });

        /* Sticky Button Hover Color */
        hongo_customize( 'hongo_button_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_button_hover_color = to;
                $( '.hongo-sticky-post-description a.btn' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_sticky_button_color );
                });
            });
        });

        /* Sticky Button Text Color */
        hongo_customize( 'hongo_button_text_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_button_text_color = to;
                $( '.hongo-sticky-post-description a.btn' ).css( 'color', to );
                if( !$hongo_sticky_button_text_hover_color ){
                    hongo_customize( 'hongo_button_hover_text_color_sticky', function( value ) {
                        $( '.hongo-sticky-post-description a.btn' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_sticky_button_text_color );
                        });
                    });
                }
            });
        });

        /* Sticky Button Text Hover Color */
        hongo_customize( 'hongo_button_hover_text_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_button_text_hover_color = to;
                $( '.hongo-sticky-post-description a.btn' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_sticky_button_text_color );
                });
            });
        });

        /* Sticky Button Border Color */
        hongo_customize( 'hongo_button_border_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-sticky-post-description a.btn' ).css( 'border-color', to );
            });
        });

        /* Sticky Title Color */
        hongo_customize( 'hongo_title_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_title_color = to;
                $( '.hongo-sticky-post-description .entry-title' ).css( 'color', to );
                if( !$hongo_sticky_title_hover_color ){
                    hongo_customize( 'hongo_title_hover_color_sticky', function( value ) {
                        $( '.hongo-sticky-post-description .entry-title' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_sticky_title_color );
                        });
                    });
                }
            });
        });

        /* Sticky Title Hover Color */
        hongo_customize( 'hongo_title_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $hongo_sticky_title_hover_color = to;
                $( '.hongo-sticky-post-description .entry-title' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_sticky_title_color );
                });
            });
        });

        /* Sticky Content Color */
        hongo_customize( 'hongo_content_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-sticky-post-description .entry-content' ).css( 'color', to );
            });
        });

        /* Sticky Border Color */
        hongo_customize( 'hongo_box_border_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.sticky.post .blog-post' ).css( 'border-color', to );
            });
        });

        /* Sticky Border Type */
        hongo_customize( 'hongo_box_border_type_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-sticky-post-description' ).css( 'border-style', to );
            });
        });

        /* Sticky Border Size */
        hongo_customize( 'hongo_box_border_size_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-sticky-post-description' ).css( 'border-width', to );
            });
        });

        /* 404 Page content BG Color */
        hongo_customize( 'hongo_404_content_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-content-bg' ).css( 'background-color', to );
            });
        });

        /* 404 Page Main Title Color */
        hongo_customize( 'hongo_404_main_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-main-title' ).css( 'color', to );
            });
        });

        /* 404 Page Title Color */
        hongo_customize( 'hongo_404_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-title' ).css( 'color', to );
            });
        });

        /* 404 Page Subtitle Color */
        hongo_customize( 'hongo_404_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-subtitle' ).css( 'color', to );
            });
        });

        /* 404 Page Content Color */
        hongo_customize( 'hongo_404_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-content' ).css( 'color', to );
            });
        });

        /* 404 Page Content Color */
        hongo_customize( 'hongo_404_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-404-bg-color' ).css( 'background-color', to );
            });
        });

        /* For Scroll to Top Button Start */

        /* Scroll to Top Color */
        hongo_customize( 'hongo_scroll_to_top_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_scroll_to_top_color = to;
                $( '.scroll-top-arrow' ).css( 'color', to );

                if( !$hongo_scroll_to_top_hover_color ){
                    hongo_customize( 'hongo_scroll_to_top_hover_color', function( value ) {
                        $( '.scroll-top-arrow' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_scroll_to_top_color );
                        });
                    });
                }
            });
        });

        /* Scroll to Top Hover Color */
        hongo_customize( 'hongo_scroll_to_top_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_scroll_to_top_hover_color = to;
                $( '.scroll-top-arrow' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_scroll_to_top_color );
                });
            });
        });

        /* GDPR Box Background Color */
        hongo_customize( 'hongo_gdpr_box_background_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-cookie-policy-wrapper .cookie-container' ).css( 'background-color', to );
            });
        });

        /* GDPR Overlay Color */
         hongo_customize( 'hongo_gdpr_overlay_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-cookie-policy-wrapper' ).css( 'background-color', to );
            });
        });

        /* GDPR Content Color */
        hongo_customize( 'hongo_gdpr_content_color', function( value ) {
            value.bind( function( to ) {
                $hongo_gdpr_content_color = to;
                $( '.cookie-container .hongo-cookie-policy-text, .cookie-container .hongo-cookie-policy-text a' ).css( 'color', to );
                if( !$hongo_gdpr_content_hover_color ){
                    hongo_customize( 'hongo_gdpr_content_hover_color', function( value ) {
                        $( '.cookie-container .hongo-cookie-policy-text a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_gdpr_content_color );
                        });
                    });
                }
            });
        });

        /* GDPR Content Hover Color */
        hongo_customize( 'hongo_gdpr_content_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_content_hover_color = to;
                $( '.cookie-container .hongo-cookie-policy-text a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_gdpr_content_color );
                });
            });
        });

        /* GDPR Button Background Color */
        hongo_customize( 'hongo_gdpr_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_bg_color = to;
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).css( 'background-color', to );
                if( !$hongo_gdpr_button_bg_hover_color ){
                    hongo_customize( 'hongo_gdpr_button_bg_hover_color', function( value ) { 
                        $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_gdpr_button_bg_color );
                        });
                    });
                }
            });
        });

        /* GDPR Button Background Hover Color */
        hongo_customize( 'hongo_gdpr_button_bg_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_bg_hover_color = to;                
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_gdpr_button_bg_color );
                });
            });
        });

        /* GDPR Button Color */
        hongo_customize( 'hongo_gdpr_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_color = to;
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).css( 'color', to );
                if( !$hongo_gdpr_button_hover_color ){
                    hongo_customize( 'hongo_gdpr_button_hover_color', function( value ) {
                        $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_gdpr_button_color );
                        });
                    });
                }
            });
        });

        /* GDPR Button Hover Color */
        hongo_customize( 'hongo_gdpr_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_hover_color = to;
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_gdpr_button_color );
                });
            });
        });

        /* GDPR Button Border Color */
        hongo_customize( 'hongo_gdpr_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_border_color = to;
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).css( 'border-color', to );
                if( !$hongo_gdpr_button_border_hover_color ){
                    hongo_customize( 'hongo_gdpr_button_border_hover_color', function( value ) {
                        $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_gdpr_button_border_color );
                        });
                    });
                }
            });
        });

        /* GDPR Button Border Hover Color */
        hongo_customize( 'hongo_gdpr_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_gdpr_button_border_hover_color = to;
                $( '.hongo-cookie-policy-wrapper .cookie-container .btn' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_gdpr_button_border_color );
                });
            });
        });

        /* For Comment Title Color */
        hongo_customize( 'hongo_general_comment_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.comment-title' ).css( 'color', to );
            });
        });

        /* For H1 Color */
        hongo_customize( 'hongo_heading_h1_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h1' ).css( 'color', to );
            });
        });

        /* For H2 Color */
        hongo_customize( 'hongo_heading_h2_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h2' ).css( 'color', to );
            });
        });

        /* For H3 Color */
        hongo_customize( 'hongo_heading_h3_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h3' ).css( 'color', to );
            });
        });

        /* For H4 Color */
        hongo_customize( 'hongo_heading_h4_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h4' ).css( 'color', to );
            });
        });

        /* For H5 Color */
        hongo_customize( 'hongo_heading_h5_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h5' ).css( 'color', to );
            });
        });

        /* For H6 Color */
        hongo_customize( 'hongo_heading_h6_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h6' ).css( 'color', to );
            });
        });

        /* Mini cart usp text color */
        hongo_customize( 'hongo_mini_cart_usp_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart .hongo-mini-cart-info' ).css( 'color', to );
            });
        });

        /* Mini Cart Background Color */
        hongo_customize( 'hongo_mini_cart_background_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart .hongo-mini-cart-content-wrap, .hongo-mini-cart-slide-sidebar' ).css( 'background-color', to );
            });
        });

        /* Mini Cart Separator Color */
        hongo_customize( 'hongo_mini_cart_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart .total, header .woocommerce.widget_shopping_cart .hongo-mini-cart-info' ).css( 'border-color', to );
            });
        });

        /* Mini Cart Title Color */
        hongo_customize( 'hongo_mini_cart_title_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_title_color = to;
                $( 'header .woocommerce.widget_shopping_cart ul.cart_list li a' ).css( 'color', to );
                if( !$hongo_mini_cart_title_hover_color ){
                    hongo_customize( 'hongo_mini_cart_title_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart ul.cart_list li a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_mini_cart_title_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Title Hover Color */
        hongo_customize( 'hongo_mini_cart_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_title_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart ul.cart_list li a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_mini_cart_title_color );
                });
            });
        });

        /* Mini Cart Price Color */
        hongo_customize( 'hongo_mini_cart_price_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart ul.cart_list li .quantity' ).css( 'color', to );
            });
        });

        /**/
        hongo_customize( 'hongo_mini_cart_subtotal_label_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart .total strong' ).css( 'color', to );
            });
        });        

        /* Mini Cart Subtotal Color */
        hongo_customize( 'hongo_mini_cart_subtotal_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header .woocommerce.widget_shopping_cart .total' ).css( 'color', to );
            });
        });

        /* Mini Cart Button Color */
        hongo_customize( 'hongo_mini_cart_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).css( 'color', to );
                if( !$hongo_mini_cart_button_hover_color ){
                    hongo_customize( 'hongo_mini_cart_button_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_mini_cart_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Button Hover Color */
        hongo_customize( 'hongo_mini_cart_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_button_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_mini_cart_button_color );
                });
            });
        });

        /* Mini Cart Button Background Color */
        hongo_customize( 'hongo_mini_cart_bg_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_bg_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).css( 'background-color', to );
                if( !$hongo_mini_cart_button_bg_hover_color ){
                    hongo_customize( 'hongo_mini_cart_button_bg_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_mini_cart_bg_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Button Background Hover Color */
        hongo_customize( 'hongo_mini_cart_button_bg_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_button_bg_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_mini_cart_bg_button_color );
                });
            });
        });

        /* Mini Cart Button Border Color */
        hongo_customize( 'hongo_mini_cart_border_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_border_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).css( 'border-color', to );
                if( !$hongo_mini_cart_button_border_hover_color ){
                    hongo_customize( 'hongo_mini_cart_button_border_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_mini_cart_border_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Button Border Hover Color */
        hongo_customize( 'hongo_mini_cart_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_button_border_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button:not( .checkout )' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_mini_cart_border_button_color );
                });
            });
        });

        /* Mini Cart Checkout Button Color */
        hongo_customize( 'hongo_mini_cart_checkout_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_checkout_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).css( 'color', to );
                if( !$hongo_mini_cart_checkout_button_hover_color ){
                    hongo_customize( 'hongo_mini_cart_checkout_button_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_mini_cart_checkout_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Checkout Button Hover Color */
        hongo_customize( 'hongo_mini_cart_checkout_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_checkout_button_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_mini_cart_checkout_button_color );
                });
            });
        });

        /* Mini Cart Checkout Button Background Color */
        hongo_customize( 'hongo_mini_cart_bg_checkout_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_bg_checkout_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).css( 'background-color', to );
                if( !$hongo_mini_cart_checkout_button_bg_hover_color ){
                    hongo_customize( 'hongo_mini_cart_checkout_button_bg_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_mini_cart_bg_checkout_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Checkout Button Background Hover Color */
        hongo_customize( 'hongo_mini_cart_checkout_button_bg_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_checkout_button_bg_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_mini_cart_bg_checkout_button_color );
                });
            });
        });

        /* Mini Cart Checkout Button Border Color */
        hongo_customize( 'hongo_mini_cart_border_checkout_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_border_checkout_button_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).css( 'border-color', to );
                if( !$hongo_mini_cart_checkout_button_border_hover_color ){
                    hongo_customize( 'hongo_mini_cart_checkout_button_border_hover_color', function( value ) {
                        $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_mini_cart_border_checkout_button_color );
                        });
                    });
                }
            });
        });

        /* Mini Cart Checkout Button Border Hover Color */
        hongo_customize( 'hongo_mini_cart_checkout_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_mini_cart_checkout_button_border_hover_color = to;
                $( 'header .woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .button.checkout' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_mini_cart_border_checkout_button_color );
                });
            });
        });

        /* My Account Tab Background Color */
        hongo_customize( 'hongo_account_tab_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation' ).css( 'background-color', to );
            });
        });

        /* My Account Tab Title Color */
        hongo_customize( 'hongo_account_tabtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:not( .is-active a )' ).css( 'color', to );
            });
        });

        /* My Account Active Tab Title Color */
        hongo_customize( 'hongo_account_active_tabtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a' ).css( 'color', to );
            });
        });

        /* My Account Account Tab Border Color */
        hongo_customize( 'hongo_account_tab_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li' ).css( 'border-bottom-color', to );
            });
        });

        /* My Account Heading Color */
        hongo_customize( 'hongo_account_heading_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-MyAccount-content h3, h4.woocommerce-order-details__title, .woocommerce-EditAccountForm legend' ).css( 'color', to );
            });
        });

       /* My Account Form Label Color */
        hongo_customize( 'hongo_label_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce form .form-row label' ).css( 'color', to );
            });
        });

        /* My Account Form Field Border Color */
        hongo_customize( 'hongo_text_field_border_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce form .form-row input, .woocommerce-account .select2-container--default .select2-selection--single' ).css( 'border-color', to );
            });
        });

        /* My Account Table Heading Color */
        hongo_customize( 'hongo_table_heading_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce table.shop_table th' ).css( 'color', to );
            });
        });

         /* My Account Table Heading Color */
        hongo_customize( 'hongo_table_heading_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce table.shop_table th' ).css( 'color', to );
            });
        });

        /* My Account Order Table Border Color */
        hongo_customize( 'hongo_account_order_table_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account .woocommerce table.shop_table td, .woocommerce-account .woocommerce table.shop_table th, .woocommerce-account .woocommerce .woocommerce-pagination--without-numbers' ).css( 'border-color', to );
            });
        });

        /* My Account Order Pagination */
        hongo_customize( 'hongo_account_order_next_prev_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_order_next_prev_color = to;
                $( '.woocommerce-account .woocommerce .woocommerce-pagination a' ).css( 'color', to );
                if( !$hongo_account_order_next_prev_hover_color ){
                    hongo_customize( 'hongo_account_order_next_prev_hover_color', function( value ) {
                        $( '.woocommerce-account .woocommerce .woocommerce-pagination a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_account_order_next_prev_color );
                        });
                    });
                }
            });
        });

        /* My Account Order Hover Pagination */
        hongo_customize( 'hongo_account_order_next_prev_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_order_next_prev_hover_color = to;
                $( '.woocommerce-account .woocommerce .woocommerce-pagination a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_account_order_next_prev_color );
                });
            });
        });

        /* My Account Form Content Color */
        hongo_customize( 'hongo_account_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-account td, .woocommerce-account .woocommerce-MyAccount-content a, .woocommerce-account address, .woocommerce-account .edit-account em, .woocommerce-account .woocommerce table.shop_table tfoot td, .woocommerce-account .woocommerce form .woocommerce-privacy-policy-text, .woocommerce-account .woocommerce form .woocommerce-privacy-policy-text a, .woocommerce-account .woocommerce-MyAccount-content p' ).css( 'color', to );
            });
        });

        /* My Account Form Button Background Color */
        hongo_customize( 'hongo_account_bg_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_bg_button_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).css( 'background-color', to );
                if( !$hongo_account_bg_hover_button_color ){
                    hongo_customize( 'hongo_account_bg_hover_button_color', function( value ) { 
                        $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_account_bg_button_color );
                        });
                    });
                }
            });
        });

        /* My Account Form Button Background Hover Color */
        hongo_customize( 'hongo_account_bg_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_bg_hover_button_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_account_bg_button_color );
                });
            });
        });

        /* My Account Form Button Color */
        hongo_customize( 'hongo_account_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_button_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).css( 'color', to );
                if( !$hongo_account_button_hover_color ){
                    hongo_customize( 'hongo_account_button_hover_color', function( value ) {
                        $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_account_button_color );
                        });
                    });
                }
            });
        });

        /* My Account Form Button Hover Color */
        hongo_customize( 'hongo_account_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_button_hover_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_account_button_color );
                });
            });
        });

        /* My Account Form Button Border Color */
        hongo_customize( 'hongo_account_border_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_border_button_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).css( 'border-color', to );
                if( !$hongo_account_border_hover_button_color ){
                    hongo_customize( 'hongo_account_border_hover_button_color', function( value ) {
                        $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_account_border_button_color );
                        });
                    });
                }
            });
        });

        /* My Account Form Button Border Hover Color */
        hongo_customize( 'hongo_account_border_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_account_border_hover_button_color = to;
                $( '.woocommerce-account .woocommerce table.my_account_orders .button, .woocommerce-account .woocommerce button' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_account_border_button_color );
                });
            });
        });

        /* Checkout Heading Color */
        hongo_customize( 'hongo_checkout_heading_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout form h4' ).css( 'color', to );
            });
        });

        /* Checkout Form Label Color */
        hongo_customize( 'hongo_checkout_label_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce form .checkout-content-left label, .woocommerce-checkout form.woocommerce-form-login .form-row label, .woocommerce-checkout .create-account .form-row.woocommerce-invalid label' ).css( 'color', to );
            });
        });

        /* Checkout Form Input Border Color */
        hongo_customize( 'hongo_checkout_input_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce form .form-row input, .woocommerce-checkout .woocommerce form .form-row textarea, .woocommerce-checkout .select2-container--default .select2-selection--single' ).css( 'border-color', to );
            });
        });

        /* Checkout Form Input Border Color */
        hongo_customize( 'hongo_checkout_input_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce form .form-row input, .woocommerce-checkout .woocommerce form .form-row textarea, .woocommerce-checkout .select2-container--default .select2-selection--single .select2-selection__rendered' ).css( 'color', to );
            });
        });

        /* Checkout Payment Box Background Color */
        hongo_customize( 'hongo_checkout_payment_background_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout #payment ul.payment_methods' ).css( 'background-color', to );
            });
        });

        /* Checkout Payment Msg Box Background Color*/
        hongo_customize( 'hongo_checkout_payment_msgbox_background_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout #payment div.payment_box' ).css( 'background-color', to );
               $( '.woocommerce-checkout #payment div.payment_box::before' ).css( 'border-bottom-color', to );
            });
        });

        /* Checkout Payment Label Color */
        hongo_customize( 'hongo_checkout_payment_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .payment_methods label, .woocommerce-checkout .payment_methods label a ' ).css( 'color', to );
            });
        });

        /* Checkout Top Heading Text Color */
        hongo_customize( 'hongo_checkout_top_heading_text_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info a, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info a, .woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info' ).css( 'color', to );
            });
        });

        /* Checkout Top Heading Icon Color */
        hongo_customize( 'hongo_checkout_top_heading_icon_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info i, .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info i' ).css( 'color', to );
            });
        });

        /* Checkout Lost Password Text Color */
        hongo_customize( 'hongo_checkout_lost_pass_text_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce form.login .lost_password a' ).css( 'color', to );
               $( '.woocommerce-checkout .woocommerce form.login .lost_password a' ).css( 'border-color', to );
            });
        });

        /* Checkout Payment Content Color */
        hongo_customize( 'hongo_payment_content_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .payment_methods .payment_box p' ).css( 'color', to );
            });
        });

        /* Checkout Content Right Background Color */
        hongo_customize( 'hongo_checkout_right_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .checkout-sidebar table.shop_table tr.cart_item:last-child td, .woocommerce-checkout .woocommerce table.shop_table tfoot td, .woocommerce-checkout form  table.shop_table th, .woocommerce-checkout .woocommerce table.shop_table td' ).css( 'border-color', to );
            });
        });

        /* Checkout Payment Content Color */
        hongo_customize( 'hongo_checkout_total_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .checkout-sidebar .order-total span' ).css( 'color', to );
            });
        });

        /* Checkout Content Right Background Color */
        hongo_customize( 'hongo_checkout_right_box_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce-checkout .checkout-sidebar' ).css( 'background-color', to );
            });
        });

        /* Checkout Content Heading Color */
        hongo_customize( 'hongo_checkout_content_heading_text_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce table.shop_table th' ).css( 'color', to );
            });
        });

        /* Checkout Content Color */
        hongo_customize( 'hongo_checkout_content_text_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-checkout .woocommerce-checkout-review-order-table tbody td, .woocommerce-checkout .woocommerce-privacy-policy-text, .woocommerce-checkout .woocommerce-privacy-policy-text a, .woocommerce-checkout .woocommerce-terms-and-conditions-checkbox-text, .woocommerce-checkout .woocommerce-terms-and-conditions-checkbox-text a, .woocommerce-checkout .woocommerce-form-login p, .woocommerce-checkout .woocommerce-form-coupon p, .woocommerce-checkout .woocommerce table.shop_table tfoot td, .woocommerce-checkout .woocommerce table.shop_table tfoot td a.woocommerce-remove-coupon, .woocommerce-checkout .woocommerce ul#shipping_method li label' ).css( 'color', to );
            });
        });

        /* Checkout Button Background Color */
        hongo_customize( 'hongo_checkout_bg_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_bg_button_color = to;
                $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).css( 'background-color', to );
                if( !$hongo_checkout_bg_hover_button_color ){
                    hongo_customize( 'hongo_checkout_bg_hover_button_color', function( value ) {
                        $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_checkout_bg_button_color );
                        });
                    });
                }
            });
        });

        /* Checkout Button Background Hover Color */
        hongo_customize( 'hongo_checkout_bg_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_bg_hover_button_color = to;
                $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_checkout_bg_button_color );
                });
            });
        });

        /* Checkout Button Color */
        hongo_customize( 'hongo_checkout_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_button_color = to;
                $( '.woocommerce-checkout .woocommerce button' ).css( 'color', to );
                if( !$hongo_checkout_button_hover_color ){
                    hongo_customize( 'hongo_checkout_button_hover_color', function( value ) {
                        $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_checkout_button_color );
                        });
                    });
                }
            });
        });

        /* Checkout Button Hover Color */
        hongo_customize( 'hongo_checkout_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_button_hover_color = to;
                $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_checkout_button_color );
                });
            });
        });

        /* Checkout Button Border Color */
        hongo_customize( 'hongo_checkout_border_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_border_button_color = to;
                $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).css( 'border-color', to );
                if( !$hongo_checkout_border_hover_button_color ){
                    hongo_customize( 'hongo_checkout_border_hover_button_color', function( value ) {
                        $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_checkout_border_button_color );
                        });
                    });
                }
            });
        });

        /* Checkout Button Border Hover Color */
        hongo_customize( 'hongo_checkout_border_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_checkout_border_hover_button_color = to;
                $( '.woocommerce-checkout .woocommerce button, .woocommerce-checkout .woocommerce #payment #place_order' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_checkout_border_button_color );
                });
            });
        });

        /* Archive Product Short Description Color */
        hongo_customize( 'hongo_product_archive_short_desc_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .hongo-short-description' ).css( 'color', to );
            });
        });

        /* Product Archive Product gallery slider icon Color */
        hongo_customize( 'hongo_product_archive_product_gallery_slider_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce .hongo-loop-product-slider .swiper-button-next i, .woocommerce .hongo-loop-product-slider .swiper-button-prev i' ).css( 'color', to );
            });
        });

        /* Product Archive Product gallery slider navigation bg Color */
        hongo_customize( 'hongo_product_archive_product_gallery_slider_navigation_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .hongo-loop-product-slider .swiper-button-next, .woocommerce ul.products li.product .hongo-loop-product-slider .swiper-button-prev' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product countdown bg Color */
        hongo_customize( 'hongo_product_archive_product_deal_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .hongo-product-deal-wrap' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product Background Color */
        hongo_customize( 'hongo_product_archive_product_backround_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-shop-archive' ).css( 'background-color', to );
            });
        });
        
        /* Product Archive Product Sale Color */
        hongo_customize( 'hongo_product_archive_product_sale_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .onsale' ).css( 'color', to );
            });
        });

        /* Product Archive Product Sale Background Color */
        hongo_customize( 'hongo_product_archive_product_sale_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .onsale' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product New Color */
        hongo_customize( 'hongo_product_archive_product_new_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .new' ).css( 'color', to );
            });
        });

        /* Product Archive Product New Background Color */
        hongo_customize( 'hongo_product_archive_product_new_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .new' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product Out Of Stock Box Color */
        hongo_customize( 'hongo_product_archive_product_soldout_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .soldout' ).css( 'color', to );
            });
        });

        /* Product Archive Product Out Of Stock Box Background Color */
        hongo_customize( 'hongo_product_archive_product_soldout_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .soldout' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product Title Color */
        hongo_customize( 'hongo_product_archive_product_title_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_title_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title' ).css( 'color', to );
                if( !$hongo_product_archive_product_title_hover_color ){
                    hongo_customize( 'hongo_product_archive_product_title_hover_color', function( value ) {
                        $( '.woocommerce ul.hongo-product-list-common-wrap li.product a' ).on( 'hover', function () {
                            $(this).children('.woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title').css( 'color', '' );
                        }, function(){
                            $(this).children('.woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title').css( 'color', $hongo_product_archive_product_title_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Title Hover Color */
        hongo_customize( 'hongo_product_archive_product_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_title_hover_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap li.product a' ).on( 'hover', function () {
                    $(this).children('.woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title').css( 'color', to );
                }, function(){
                    $(this).children('.woocommerce ul.hongo-product-list-common-wrap li.product .woocommerce-loop-product__title').css( 'color', $hongo_product_archive_product_title_color );
                });
            });
        });

        /* Product Archive Product Price Color */
        hongo_customize( 'hongo_product_archive_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .price, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .price, .woocommerce ul.hongo-product-list-common-wrap li.product .price ins, .woocommerce ul.products.hongo-shop-clean li.product:hover .price' ).css( 'color', to );
            });
        });

        /* Product Archive Product Price Color */
        hongo_customize( 'hongo_product_archive_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap li.product .price del' ).css( 'color', to );
            });
        });

        /* Product Archive Product Button Color */
        hongo_customize( 'hongo_product_archive_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-price-button-wrap .button' ).css( 'color', to );

                if( !$hongo_product_archive_product_button_hover_color ){
                    hongo_customize( 'hongo_product_archive_product_button_hover_color', function( value ) {
                        $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-price-button-wrap .button' ).on( 'hover', function () {                         
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_product_archive_product_button_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Button Hover Color */
        hongo_customize( 'hongo_product_archive_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_hover_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-price-button-wrap .button' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_product_archive_product_button_color );
                });                
            });
        });

        /* Product Archive Product Button BG Color */
        hongo_customize( 'hongo_product_archive_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_bg_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.hongo-loop-product-button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button' ).css( 'background-color', to );

                if( !$hongo_product_archive_product_button_hover_bg_color ){
                    hongo_customize( 'hongo_product_archive_product_button_hover_bg_color', function( value ) { 
                            $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.hongo-loop-product-button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_product_archive_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Button BG Hover Color */
        hongo_customize( 'hongo_product_archive_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_hover_bg_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.hongo-loop-product-button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_product_archive_product_button_bg_color );
                });
            });
        });

        /* Product Archive Product Icon Color */
        hongo_customize( 'hongo_product_archive_product_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_icon_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product .product-buttons-wrap a > i , .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:visited, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:focus,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-compare, .woocommerce a.added_to_cart i, .woocommerce a.hongo-loop-product-button i' ).css( 'color', to );

                if( !$hongo_product_archive_product_icon_hover_color ){
                    hongo_customize( 'hongo_product_archive_product_icon_hover_color', function( value ) { 
                        $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product .product-buttons-wrap a > i , .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-compare , .woocommerce a.added_to_cart i, .woocommerce a.hongo-loop-product-button i' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_product_archive_product_icon_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Icon Hover Color */
        hongo_customize( 'hongo_product_archive_product_icon_hover_color', function( value ) { 
            value.bind( function( to ) {                
                $hongo_product_archive_product_icon_hover_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product .product-buttons-wrap a > i , .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a span,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a span, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-wishlist, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-simple li.product .hongo-compare, .woocommerce a.added_to_cart i, .woocommerce a.hongo-loop-product-button i' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_product_archive_product_icon_color );
                });
            });
        });

        /* Product Archive Product Icon BG Color */
        hongo_customize( 'hongo_product_archive_product_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_icon_bg_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:visited, .woocommerce ul.products.hongo-shop-classic li.product .product-buttons-wrap a:focus, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist' ).css( 'background-color', to );

                if( !$hongo_product_archive_product_icon_hover_bg_color ){
                    hongo_customize( 'hongo_product_archive_product_icon_hover_bg_color', function( value ) { 
                            $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist' ).on( 'hover', function () {
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_product_archive_product_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Icon BG Hover Color */
        hongo_customize( 'hongo_product_archive_product_icon_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_icon_hover_bg_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-classic li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-masonry li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-compare, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .hongo-wishlist' ).on( 'hover', function () {
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_product_archive_product_icon_bg_color );
                });
            });
        });

        /* Product Archive Product Button Border Color */
        hongo_customize( 'hongo_product_archive_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_border_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.products.hongo-shop-simple li.product .hongo-price-button-wrap .button, .woocommerce a.added_to_cart' ).css( 'border-color', to );

                if( !$hongo_product_archive_product_button_border_hover_color ){
                    hongo_customize( 'hongo_product_archive_product_button_border_hover_color', function( value ) { 
                            $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button,.woocommerce ul.products.hongo-shop-simple li.product .hongo-price-button-wrap .button, .woocommerce a.added_to_cart' ).on( 'hover', function () {                            
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_product_archive_product_button_border_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Button Border Hover Color */
        hongo_customize( 'hongo_product_archive_product_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_archive_product_button_border_hover_color = to;
                $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-default li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-minimalist li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list li.product a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-bottom-wrap a.button, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-bottom-wrap a.button, .woocommerce ul.products.hongo-shop-simple li.product .hongo-price-button-wrap .button, .woocommerce a.added_to_cart' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_product_archive_product_button_border_color );
                });
            });
        });

        /* Product Archive Product Button Separator Color */
        hongo_customize( 'hongo_product_archive_product_button_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-clean li.product .product-buttons-wrap a .hongo-loader::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a .hongo-loader::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a .hongo-loader::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a::before, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-modern li.product .product-buttons-wrap a .hongo-loader::before' ).css( 'background-color', to );
               $( '.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-flat li.product .product-buttons-wrap a,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a i, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-list.hongo-product-list-view li.product .product-content-wrap .product-buttons-wrap a:last-child i,.woocommerce ul.hongo-product-list-common-wrap.hongo-shop-metro li.product .product-buttons-wrap a, .woocommerce ul.hongo-product-list-common-wrap.hongo-shop-standard li.product .product-buttons-wrap a, .woocommerce ul.products.hongo-shop-metro li.product .product-buttons-wrap a:first-child, .woocommerce ul.products.hongo-shop-flat li.product .product-buttons-wrap a:hover' ).css( 'border-color', to );
            });
        });

        /* Single Product Zoom Icon BG Color */
        hongo_customize( 'hongo_single_product_zoom_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product.woocommerce div.product div.images .woocommerce-product-gallery__trigger' ).css( 'background-color', to );
            });
        });

        /* Product Separator Color */
        hongo_customize( 'hongo_single_product_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( ' .single-product .hongo-woocommerce-tabs, .woocommerce .single-product-modern div.product .woocommerce-product-details__short-description, .woocommerce .single-product-modern div.product form.cart, .single-product .product_meta, .single-product div.product .woocommerce-product-details__short-description, .single-product form.cart, .single-product .hongo-accordion > ul > li, .woocommerce .single-product-carousel div.product .summary .hongo-summary-left-content, .woocommerce .single-product-carousel div.product .product_meta, .woocommerce .single-product-carousel div.product .hongo-single-product-tab-content-carousel, .woocommerce .single-product-modern div.product .woocommerce-tabs .tabs, .woocommerce .single-product-extended-descriptions div.product .woocommerce-product-details__short-description' ).css( 'border-color', to );
               $( '.woocommerce .single-product-carousel div.product .product_meta > span:after, .woocommerce .single-product-carousel div.product .product_meta > span ~ div:after, .woocommerce .single-product-extended-descriptions div.product .product_meta > span:after, .woocommerce .single-product-extended-descriptions div.product .product_meta > span ~ div:after' ).css( 'background-color', to );
            });
        });

        /* Single Product Sale Color */
        hongo_customize( 'hongo_single_product_sale_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale' ).css( 'color', to );
            });
        });

        /* Single Product Sale Background Color */
        hongo_customize( 'hongo_single_product_sale_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.onsale' ).css( 'background-color', to );
            });
        });

        /* Modern Product Background Color */
        hongo_customize( 'hongo_single_product_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce .single-product-modern div.product .hongo-modern-content-images-wrap' ).css( 'background-color', to );
            });
        });

        /* Single Product New Box Color */
        hongo_customize( 'hongo_single_product_new_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.new' ).css( 'color', to );
            });
        });

        /* Single Product Sale Background Color */
        hongo_customize( 'hongo_single_product_new_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.new' ).css( 'background-color', to );
            });
        });

        /* Single Product Sold Box Color */
        hongo_customize( 'hongo_single_product_soldout_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout' ).css( 'color', to );
            });
        });

        /* Single Product Sold Background Color */
        hongo_customize( 'hongo_single_product_soldout_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .hongo-single-product-image-wrap .sale-new-wrap span.soldout' ).css( 'background-color', to );
            });
        });        

        /* Single Product Title Color */
        hongo_customize( 'hongo_single_product_page_title_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .product_title' ).css( 'color', to );
            });
        });

        /* Single Product Price Color */
        hongo_customize( 'hongo_single_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .summary-main-title .price, .single-product .product .summary .summary-main-title .price ins, .single-product .single-product-default .product .summary .price, .single-product .single-product-default .product .summary .price ins, .single-product .single-product-extended-descriptions .product .summary .price, .single-product .single-product-extended-descriptions .product .summary .price ins, .single-product span.price, .single-product div.product span.price, .single-product .woocommerce-grouped-product-list .woocommerce-Price-amount' ).css( 'color', to );
            });
        });

        /* Single Product Price Color */
        hongo_customize( 'hongo_single_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .summary-main-title .price del, .single-product .single-product-default .product .summary .price del, .single-product .single-product-extended-descriptions .product .summary .price del, .single-product span.price del, .single-product div.product span.price del, .single-product .woocommerce-grouped-product-list del .woocommerce-Price-amount, .single-product .woocommerce-grouped-product-list del' ).css( 'color', to );
            });
        });

        /* Single Product Short Description Color */
        hongo_customize( 'hongo_single_product_short_description_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .woocommerce-product-details__short-description' ).css( 'color', to );
            });
        });

        /* Single Product Stock Color */
        hongo_customize( 'hongo_single_product_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.in-stock' ).css( 'color', to );
               $( '.single-product .product .summary .stock.in-stock' ).css( 'border-color', to );
            });
        });

        /* Single Product Out Of Stock Color */
        hongo_customize( 'hongo_single_product_out_of_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.out-of-stock' ).css( 'color', to );
               $( '.single-product .product .summary .stock.out-of-stock' ).css( 'border-color', to );
            });
        });        

        /* Product Quantity input Border color */
        hongo_customize( 'hongo_single_product_quantity_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .quantity input, .single-product div.quantity .hongo-qtyminus, .single-product div.quantity .hongo-qtyplus' ).css( 'border-color', to );
            });
        });

        /* Product Quantity input color */
        hongo_customize( 'hongo_single_product_quantity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product div.quantity .qty, .single-product .quantity input' ).css( 'color', to );
            });
        });

        /* Single Product Button Color */
        hongo_customize( 'hongo_single_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).css( 'color', to );

                if( !$hongo_single_product_button_hover_color ){
                    hongo_customize( 'hongo_single_product_button_hover_color', function( value ) {
                        $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_button_color );
                        });
                    });
                }
            });
        });

        /* Single Product Button Hover Color */
        hongo_customize( 'hongo_single_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_hover_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_button_color );
                });
            });
        });

        /* Single Product Button BG Color */
        hongo_customize( 'hongo_single_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_bg_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).css( 'background-color', to );

                if( !$hongo_single_product_button_hover_bg_color ){
                    hongo_customize( 'hongo_single_product_button_hover_bg_color', function( value ) { 
                        $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_single_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Single Product Button BG Hover Color */
        hongo_customize( 'hongo_single_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_hover_bg_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_single_product_button_bg_color );
                });
            });
        });

        /* Single Product Button Border Color */
        hongo_customize( 'hongo_single_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_border_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).css( 'border-color', to );

                if( !$hongo_single_product_button_hover_border_color ){
                    hongo_customize( 'hongo_single_product_button_hover_border_color', function( value ) {
                        $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_single_product_button_border_color );
                        });
                    });
                }
            });
        });

        /* Single Product Button Border Hover Color */
        hongo_customize( 'hongo_single_product_button_hover_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_button_hover_border_color = to;
                $( '.single-product .product .summary .single_add_to_cart_button' ).on( 'hover', function () {                
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_single_product_button_border_color );
                });
            });
        });

        /* Single Product Meta Color */
        hongo_customize( 'hongo_single_product_page_meta_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_meta_color = to;
                $( '.single-product .product .summary .product_meta .posted_in a, .single-product .product .summary .product_meta .tagged_as a, .woocommerce div.product form.cart .reset_variations,.sku_wrapper span, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span a, .single-product div.product .summary a.hongo-wishlist, .single-product div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li::after, .woocommerce .single-product-modern div.product .summary a.hongo-wishlist:hover, .woocommerce .single-product-modern div.product .summary a.hongo-compare, .woocommerce .single-product-modern div.product .summary a.hongo-wishlist' ).css( 'color', to );

                if( !$hongo_single_product_page_meta_link_hover_color ){
                    hongo_customize( 'hongo_single_product_page_meta_link_hover_color', function( value ) { 
                        $( '.single-product .product .summary .product_meta .posted_in a, .single-product .product .summary .product_meta .tagged_as a, .woocommerce div.product form.cart .reset_variations, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span a, .single-product div.product .summary a.hongo-wishlist, .single-product div.product .summary a.hongo-compare,.breadcrumb-navigation-wrap ul.breadcrumb-wrap li a, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li::after, .woocommerce .single-product-modern div.product .summary a.hongo-compare, .woocommerce .single-product-modern div.product .summary a.hongo-wishlist' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_page_meta_color );
                        });
                    });
                }
            });
        });

        /* Single Product Meta Link Hover Color */
        hongo_customize( 'hongo_single_product_page_meta_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_meta_link_hover_color = to;
                $( '.single-product .product .summary .product_meta .posted_in a, .single-product .product .summary .product_meta .tagged_as a, .woocommerce div.product form.cart .reset_variations, .woocommerce form.cart .variations .size-chart .size-guide-link, .woocommerce .single-product-extended-descriptions div.product .product_meta > span a, .woocommerce .single-product-carousel div.product .product_meta > span a, .single-product div.product .summary a.hongo-wishlist, .single-product div.product .summary a.hongo-compare, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li a, .breadcrumb-navigation-wrap ul.breadcrumb-wrap li::after, .woocommerce .single-product-modern div.product .summary a.hongo-compare, .woocommerce .single-product-modern div.product .summary a.hongo-wishlist' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_page_meta_color );
                });
            });
        });       

        /* Single Product Meta Heading Color */
        hongo_customize( 'hongo_single_product_page_meta_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .product_meta .sku_wrapper,.single-product .product .summary .product_meta .posted_in, .single-product .product .summary .sku_wrapper .posted_in, .single-product .product .summary .product_meta .tagged_as, .single-product .product .summary .product_meta .hongo-product-sharebox-title, .summary .summary-main-title-right .sku_wrapper, .woocommerce div.product form.cart .variations label,.product_meta span.sku_wrapper, .products-social-icon span, .woocommerce .single-product-carousel div.product .product_meta > span.posted_in,.product_meta > span.posted_in, .woocommerce .single-product-carousel div.product .product_meta > span.tagged_as' ).css( 'color', to );
            });
        });

        /* Single Product Meta Color */
        hongo_customize( 'hongo_single_product_page_meta_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .product_meta .products-social-icon a, .woocommerce .single-product-extended-descriptions div.product .products-social-icon ul li a, .woocommerce .single-product-carousel div.product .products-social-icon ul li a' ).css( 'color', to );
            });
        });

        /* Single Product Meta Color */
        hongo_customize( 'hongo_single_product_page_meta_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_meta_social_icon_color = to;
                $( '.single-product .product .summary .product_meta .products-social-icon a, .woocommerce .single-product-extended-descriptions div.product .products-social-icon ul li a, .woocommerce .single-product-carousel div.product .products-social-icon ul li a' ).css( 'color', to );

                if( !$hongo_single_product_page_meta_social_icon_hover_color ){
                    hongo_customize( 'hongo_single_product_page_meta_social_icon_hover_color', function( value ) { 
                        $( '.single-product .product .summary .product_meta .products-social-icon a, .woocommerce .single-product-extended-descriptions div.product .products-social-icon ul li a, .woocommerce .single-product-carousel div.product .products-social-icon ul li a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_page_meta_social_icon_color );
                        });
                    });
                }
            });
        });

        /* Single Product Meta Link Hover Color */
        hongo_customize( 'hongo_single_product_page_meta_social_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_meta_social_icon_hover_color = to;
                $( '.single-product .product .summary .product_meta .products-social-icon a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_page_meta_social_icon_color );
                });
            });
        });

        /* Single Product Tab Color */
        hongo_customize( 'hongo_single_product_page_tab_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_tab_color = to;
                $( '.single-product .product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a' ).css( 'color', to );
                $( '.single-product .product .woocommerce-tabs ul.tabs li.active a, .hongo-accordion > ul > li > a' ).css( 'border-color', to );

                if( !$hongo_single_product_page_tab_hover_color ){
                    hongo_customize( 'hongo_single_product_page_tab_hover_color', function( value ) { 
                        $( '.single-product .product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_page_tab_color );
                        });
                        
                        $( '.single-product .product .woocommerce-tabs ul.tabs li.active a, .hongo-accordion > ul > li > a' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_single_product_page_tab_color );
                        });

                    });
                }
            });
        });

        /* Single Product Tab Hover Color */
        hongo_customize( 'hongo_single_product_page_tab_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_page_tab_hover_color = to;
                $( '.single-product .product .woocommerce-tabs ul.tabs li a, .hongo-accordion > ul > li > a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_page_tab_color );
                });

                $( '.single-product .product .woocommerce-tabs ul.tabs li.active a, .hongo-accordion > ul > li > a' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_single_product_page_tab_color );
                });
            });
        });

        /* Single Product Active Tab Color */
        hongo_customize( 'hongo_single_product_page_tab_active_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .hongo-accordion > ul > li > a.active' ).css( 'color', to );
                $( '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a' ).css( 'border-color', to );
            });
        });

        /* Single Product list Slider Pagination color */
        hongo_customize( 'hongo_single_product_list_pagination_color', function( value ) { 
            value.bind( function( to ) {
                //$( '.hongo-related-products .swiper-pagination .swiper-pagination-bullet:not(.swiper-pagination-bullet-active), .hongo-up-sells-products .swiper-pagination .swiper-pagination-bullet:not(.swiper-pagination-bullet-active)(.swiper-pagination-bullet-active)' ).css( 'background-color', to );
                $( '.hongo-related-products .swiper-pagination .swiper-pagination-bullet, .hongo-up-sells-products .swiper-pagination .swiper-pagination-bullet' ).css( 'background-color', to );
            });
        });

        /* Single Product list Slider Active Pagination color */
        hongo_customize( 'hongo_single_product_list_active_pagination_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-related-products .swiper-pagination .swiper-pagination-bullet-active, .hongo-up-sells-products .swiper-pagination .swiper-pagination-bullet-active' ).css( 'background-color', to );
            });
        });

        /* Single Product list Slider Navigation color */
        hongo_customize( 'hongo_single_product_list_navigation_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-related-products.swiper-container .swiper-button-next i,.hongo-related-products.swiper-container .swiper-button-prev i, .hongo-up-sells-products.swiper-container .swiper-button-next i,.hongo-up-sells-products.swiper-container .swiper-button-prev i' ).css( 'color', to );
            });
        });        

        /* Single Product list Heading Color */
        hongo_customize( 'hongo_single_product_list_heading_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_list_heading_color = to;
                $( '.woocommerce .related > h2, .woocommerce .up-sells > h2, .hongo-woocommerce-tabs ul.tabs li a' ).css( 'color', to );
                $( '.hongo-woocommerce-tabs ul.tabs li.active a' ).css( 'border-color', to );

                if( !$hongo_single_product_list_heading_hover_color ){
                    hongo_customize( 'hongo_single_product_list_heading_hover_color', function( value ) {                        
                        $( '.woocommerce .related > h2, .woocommerce .up-sells > h2, .hongo-woocommerce-tabs ul.tabs li a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_single_product_list_heading_color );
                        });

                        $( '.hongo-woocommerce-tabs ul.tabs li.active a' ).on( 'hover', function () {                        
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_single_product_list_heading_color );
                        });

                    });
                }
            });
        });

        /* Single Product list Heading Hover Color */
        hongo_customize( 'hongo_single_product_list_heading_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_single_product_list_heading_hover_color = to;
                $( '.woocommerce .related > h2, .woocommerce .up-sells > h2, .hongo-woocommerce-tabs ul.tabs li a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_single_product_list_heading_color );
                });

                $( '.hongo-woocommerce-tabs ul.tabs li.active a' ).on( 'hover', function () {                
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_single_product_list_heading_color );
                });
            });
        });

        /* Single Product list Active Heading Color */
        hongo_customize( 'hongo_single_product_list_heading_active_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-woocommerce-tabs ul.tabs li.active a' ).css( 'color', to );
                $( '.hongo-woocommerce-tabs ul.tabs li.active a' ).css( 'border-color', to );
            });
        });

        /* Single Product Cross Sells Product Slider Pagination color */
        hongo_customize( 'hongo_single_product_cross_sells_product_pagination_color', function( value ) { 
            value.bind( function( to ) {                
                $( '.hongo-cross-sells-products .swiper-pagination .swiper-pagination-bullet' ).css( 'background-color', to );                
            });
        });

        /* Single Product Cross Sells Product Slider Active Pagination color */
        hongo_customize( 'hongo_single_product_cross_sells_product_active_pagination_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-cross-sells-products .swiper-pagination .swiper-pagination-bullet-active' ).css( 'background-color', to );                
            });
        });

        /* Single Product Cross Sells Product Slider Navigation color */
        hongo_customize( 'hongo_single_product_cross_sells_product_navigation_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce-cart .cross-sells .swiper-button-next i, .woocommerce-cart .cross-sells .swiper-button-prev i' ).css( 'color', to );
            });
        });

        /* Single Product Cross Sells Product Heading Color */
        hongo_customize( 'hongo_single_product_cross_sells_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce .cross-sells > h2' ).css( 'color', to );
            });
        });

        /* Cart Table Heading Color */
        hongo_customize( 'hongo_cart_table_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce-cart .woocommerce table.shop_table thead th' ).css( 'color', to );
            });
        });


        /* Cart Table Content Color */
        hongo_customize( 'hongo_cart_table_content_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_table_content_color = to;
                $( '.woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td, .woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td.product-name a, .woocommerce-cart .woocommerce div.quantity .qty, .woocommerce-cart .woocommerce div.quantity .hongo-qtyplus, .woocommerce-cart .woocommerce div.quantity .hongo-qtyminus' ).css( 'color', to );
                if( !$hongo_cart_table_content_hover_color ){
                    hongo_customize( 'hongo_cart_table_content_hover_color', function( value ) { 
                        $( '.woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td a' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_cart_table_content_color );
                        });
                    });
                }
            });
        });

        /* Cart Table Content Hover Color */
        hongo_customize( 'hongo_cart_table_content_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_table_content_hover_color = to;
                $( '.woocommerce-cart .woocommerce table.woocommerce-cart-form__contents tbody td a' ).on( 'hover', function () {
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_cart_table_content_color );
                });
            });
        });

        /* Cart Table Quantity Border Color */
        hongo_customize( 'hongo_cart_table_quantity_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce-cart .woocommerce div.quantity .qty, .woocommerce-cart .woocommerce div.quantity .hongo-qtyminus, .woocommerce-cart .woocommerce div.quantity .hongo-qtyplus' ).css( 'border-color', to );
            });
        });

        /* Cart Heading Color */
        hongo_customize( 'hongo_cart_heading_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .cart-collaterals .cart_totals h4' ).css( 'color', to );
            });
        });

        /* Cart Form Button Background Color */
        hongo_customize( 'hongo_cart_bg_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_bg_button_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).css( 'background-color', to );
                if( !$hongo_cart_bg_hover_button_color ){
                    hongo_customize( 'hongo_cart_bg_hover_button_color', function( value ) {
                        $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {                        
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_cart_bg_button_color );
                        });
                    });
                }
            });
        });

        /* Cart Form Button Background Hover Color */
        hongo_customize( 'hongo_cart_bg_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_bg_hover_button_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {                
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_cart_bg_button_color );
                });
            });
        });

        /* Cart Form Button Color */
        hongo_customize( 'hongo_cart_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_button_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).css( 'color', to );
                if( !$hongo_cart_button_hover_color ){
                    hongo_customize( 'hongo_cart_button_hover_color', function( value ) {
                        $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_cart_button_color );
                        });
                    });
                }
            });
        });

        /* Cart Form Button Hover Color */
        hongo_customize( 'hongo_cart_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_button_hover_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_cart_button_color );
                });
            });
        });

        /* Cart Form Button Border Color */
        hongo_customize( 'hongo_cart_border_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_border_button_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).css( 'border-color', to );
                if( !$hongo_cart_border_hover_button_color ){
                    hongo_customize( 'hongo_cart_border_hover_button_color', function( value ) {
                        $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_cart_border_button_color );
                        });
                    });
                }
            });
        });

        /* Cart Form Button Border Hover Color */
        hongo_customize( 'hongo_cart_border_hover_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_cart_border_hover_button_color = to;
                $( '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' ).on( 'hover', function () {
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_cart_border_button_color );
                });
            });
        });

        /* Cart Right Content Box bg Color */
        hongo_customize( 'hongo_cart_right_box_bg_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .checkout-sidebar' ).css( 'background-color', to );
            });
        });

        /* Cart Border Color */
        hongo_customize( 'hongo_cart_border_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce-cart .woocommerce table.shop_table th, .woocommerce-cart .woocommerce table.shop_table td' ).css( 'border-color', to );
            });
        });

        /* Cart Right Content Heading Color */
        hongo_customize( 'hongo_cart_box_content_heading_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .checkout-sidebar table.shop_table th, .woocommerce-cart .cart-collaterals .shipping-calculator-button' ).css( 'color', to );
            });
        });

        /* Cart Right Content Color */
        hongo_customize( 'hongo_cart_box_content_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .checkout-sidebar table.shop_table td, .woocommerce-cart .checkout-sidebar table.shop_table td a.woocommerce-remove-coupon, .woocommerce-cart ul#shipping_method li label, .woocommerce-cart .cart-collaterals .cart_totals table small' ).css( 'color', to );
            });
        });

        /* Cart Total Color */
        hongo_customize( 'hongo_cart_total_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tr.order-total td' ).css( 'color', to );
            });
        });

        /* Cart Coupon Input Color */
        hongo_customize( 'hongo_cart_coupon_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart table.cart td.actions .coupon .input-text' ).css( 'color', to );
            });
        });

        /* Cart Coupon Border Color */
        hongo_customize( 'hongo_cart_coupon_border_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart table.cart td.actions .coupon .input-text' ).css( 'border-bottom-color', to );
            });
        });

        /* Cart Coupon Button Color */
        hongo_customize( 'hongo_cart_coupon_button_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon button' ).css( 'color', to );
            });
        });

        /* Cart Empty Cart Button Color */
        hongo_customize( 'hongo_cart_empty_cart_color', function( value ) {
            value.bind( function( to ) {
               $( '.woocommerce-cart table.cart td.actions .btn, .woocommerce-cart table.cart td.actions:not(.coupon) .button, .woocommerce-cart button.button:disabled:hover, .woocommerce-cart button.button:disabled[disabled]:hover' ).css( 'color', to );
               $( '.woocommerce-cart table.cart td.actions .btn, .woocommerce-cart table.cart td.actions .button' ).css( 'border-color', to );
            });
        });

        /* Post Widget Title Color */
        hongo_customize( 'hongo_post_widget_title_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-post-sidebar .widget-title' ).css( 'color', to );
            });
        });

        /* Post Widget Content Color */
        hongo_customize( 'hongo_post_widget_content_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-post-sidebar p, .hongo-post-sidebar span.count, .hongo-post-sidebar .latest-blog-meta-date, .hongo-post-sidebar span.comment-author-link, .hongo-post-sidebar li.recentcomments' ).css( 'color', to );
            });
        });

        /* Post Widget Background Color */
        hongo_customize( 'hongo_post_widget_background_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-post-sidebar.hongo-sidebar-style-2 .widget' ).css( 'background-color', to );
            });
        });

        /* Post Widget Content link Color */
        hongo_customize( 'hongo_post_widget_content_link_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_widget_content_link_color = to;
                $( '.hongo-post-sidebar a, .hongo-post-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).css( 'color', to );
                if( !$hongo_post_widget_content_link_hover_color ){
                    hongo_customize( 'hongo_post_widget_content_link_hover_color', function( value ) {
                        $( '.hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_post_widget_content_link_color );
                        });
                    });
                }
            });
        });

        /* Post Widget Content Link Hover Color */
        hongo_customize( 'hongo_post_widget_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_post_widget_content_link_hover_color = to;
                $( '.hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_post_widget_content_link_color );
                });
            });
        });

        /* Page Widget Title Color */
        hongo_customize( 'hongo_page_widget_title_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-page-sidebar .widget-title' ).css( 'color', to );
            });
        });

        /* Page Widget Content Color */
        hongo_customize( 'hongo_page_widget_content_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-page-sidebar p, .hongo-page-sidebar span.count, .hongo-page-sidebar .latest-blog-meta-date, .hongo-page-sidebar span.comment-author-link, .hongo-page-sidebar li.recentcomments' ).css( 'color', to );
            });
        });

        /* Page Widget Background Color */
        hongo_customize( 'hongo_page_widget_background_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-page-sidebar.hongo-sidebar-style-2 .widget' ).css( 'background-color', to );
            });
        });

        /* Page Widget Content link Color */
        hongo_customize( 'hongo_page_widget_content_link_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_widget_content_link_color = to;
                $( '.hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).css( 'color', to );
                if( !$hongo_page_widget_content_link_hover_color ){
                    hongo_customize( 'hongo_page_widget_content_link_hover_color', function( value ) {
                        $( '.hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_page_widget_content_link_color );
                        });
                    });
                }
            });
        });

        /* Page Widget Content Link Hover Color */
        hongo_customize( 'hongo_page_widget_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_page_widget_content_link_hover_color = to;
                $( '.hongo-page-sidebar a, .hongo-page-sidebar.sidebar .latest-post.hongo-latest-blog-widget li .hongo-latest-blog-widget a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_page_widget_content_link_color );
                });
            });
        });

        /* Product Widget Title Color */
        hongo_customize( 'hongo_product_widget_title_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-product-sidebar .widget-title' ).css( 'color', to );
            });
        });

        /* Product Widget Content Color */
        hongo_customize( 'hongo_product_widget_content_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-product-sidebar p, .hongo-product-sidebar span.count, .hongo-product-sidebar .latest-blog-meta-date, .hongo-product-sidebar .price_label' ).css( 'color', to );
            });
        });

        /* Product Widget Background Color */
        hongo_customize( 'hongo_product_widget_background_color', function( value ) {
            value.bind( function( to ) {
               $( '.hongo-product-sidebar.hongo-sidebar-style-2 .widget' ).css( 'background-color', to );
            });
        });

        /* Product Widget Content link Color */
        hongo_customize( 'hongo_product_widget_content_link_color', function( value ) {
            value.bind( function( to ) {
                $hongo_product_widget_content_link_color = to;
                $( '.hongo-product-sidebar a' ).css( 'color', to );
                if( !$hongo_product_widget_content_link_hover_color ){
                    hongo_customize( 'hongo_product_widget_content_link_hover_color', function( value ) {
                        $( '.hongo-product-sidebar a' ).on( 'hover', function () {                        
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_product_widget_content_link_color );
                        });
                    });
                }
            });
        });

        /* Product Widget Content Link Hover Color */
        hongo_customize( 'hongo_product_widget_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_product_widget_content_link_hover_color = to;
                $( '.hongo-product-sidebar a' ).on( 'hover', function () {                
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_product_widget_content_link_color );
                });
            });
        });

    });
})( jQuery );
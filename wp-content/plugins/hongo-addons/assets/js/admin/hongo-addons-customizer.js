! function($) {
    "use strict";
    $( document ).ready(function() {
        var hongo_customize = wp.customize;
        var $hongo_quick_view_product_button_color = '';
        var $hongo_quick_view_product_button_border_color = '';
        var $hongo_quick_view_product_button_bg_color = ''; 
        var $hongo_quick_view_product_page_meta_color = '';
        var $hongo_quick_view_product_page_meta_social_icon_color = '';
        var $hongo_compare_product_heading_color = '';
        var $hongo_compare_product_color = '';
        var $hongo_compare_product_button_color = '';
        var $hongo_compare_product_button_bg_color = '';
        var $hongo_compare_product_button_border_color = '';
        var $hongo_compare_product_title_color = '';
        var $hongo_wishlist_product_content_color = '';
        var $hongo_wishlist_product_button_bg_color = '';
        var $hongo_wishlist_product_button_color = '';
        var $hongo_wishlist_product_button_border_color = '';
        var $hongo_search_popup_close_icon_bg_color = '';
        

        // Get Hover Values
        var $hongo_quick_view_product_button_hover_bg_color = '';
        var $hongo_quick_view_product_button_hover_color = '';
        var $hongo_quick_view_product_button_border_hover_color = '';
        var $hongo_quick_view_product_page_meta_link_hover_color = '';
        var $hongo_quick_view_product_page_meta_social_icon_hover_color = '';
        var $hongo_compare_product_heading_link_hover_color = '';
        var $hongo_compare_product_link_hover_color = '';
        var $hongo_compare_product_button_hover_color = '';
        var $hongo_compare_product_button_hover_bg_color = '';
        var $hongo_compare_product_button_border_hover_color = '';
        var $hongo_compare_product_title_hover_color ='';
        var $hongo_wishlist_product_content_hover_color = '';
        var $hongo_wishlist_product_button_hover_bg_color = '';
        var $hongo_wishlist_product_button_hover_color = '';
        var $hongo_wishlist_product_button_border_hover_color = '';
        var $hongo_search_popup_close_icon_bg_hover_color = '';
                

        /* Quick view Sale Color */
        hongo_customize( 'hongo_quick_view_product_sale_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.onsale' ).css( 'color', to );
            });
        });

        /* Quick view Sale Background Color */
        hongo_customize( 'hongo_quick_view_product_sale_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.onsale' ).css( 'background-color', to );
            });
        });

        /* Quick view New Color */
        hongo_customize( 'hongo_quick_view_product_new_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.new' ).css( 'color', to );
            });
        });

        /* Quick view New Background Color */
        hongo_customize( 'hongo_quick_view_product_new_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.new' ).css( 'background-color', to );
            });
        });

        /* Quick view Sold box Color */
        hongo_customize( 'hongo_quick_view_product_soldout_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.soldout' ).css( 'color', to );
            });
        });

        /* Quick view Sold box Background Color */
        hongo_customize( 'hongo_quick_view_product_soldout_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .sale-new-wrap span.soldout' ).css( 'background-color', to );
            });
        });        

        /* Quick view Title Color */
        hongo_customize( 'hongo_quick_view_product_page_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .product_title' ).css( 'color', to );
            });
        });

        /* Quick view Price Color */
        hongo_customize( 'hongo_quick_view_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .price, .hongo-quick-view-popup .price ins' ).css( 'color', to );
            });
        });

        /* Quick view Price Main Color */
        hongo_customize( 'hongo_quick_view_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .price del' ).css( 'color', to );
            });
        });

        /* Quick view Short Description Color */
        hongo_customize( 'hongo_quick_view_product_short_description_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .woocommerce-product-details__short-description p' ).css( 'color', to );
            });
        });

        /* Quick view In Stock Color */
        hongo_customize( 'hongo_quick_view_product_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup p.in-stock' ).css( 'color', to );
               $( '.hongo-quick-view-popup p.in-stock' ).css( 'border-color', to );
            });
        });

        /* Quick view Out of Stock Color */
        hongo_customize( 'hongo_quick_view_product_out_of_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup p.out-of-stock' ).css( 'color', to );
               $( '.hongo-quick-view-popup p.out-of-stock' ).css( 'border-color', to );
            });
        });

        /* Quick view Product Button Color */
        hongo_customize( 'hongo_quick_view_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_color = to;
                $( '.hongo-quick-view-popup form.cart .button' ).css( 'color', to );                
                if( !$hongo_quick_view_product_button_hover_color ){
                    hongo_customize( 'hongo_quick_view_product_button_hover_color', function( value ) { 
                        $( '.hongo-quick-view-popup form.cart .button' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_quick_view_product_button_color );
                        });
                    });
                }
            });
        });

        /* Quick view Button Hover Color */
        hongo_customize( 'hongo_quick_view_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_hover_color = to;
                $( '.hongo-quick-view-popup form.cart .button' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_quick_view_product_button_color );
                });
            });
        });

        /* Quick view Product Button BG Color */
        hongo_customize( 'hongo_quick_view_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_bg_color = to;
                $( '.hongo-quick-view-popup form.cart .button' ).css( 'background-color', to );

                if( !$hongo_quick_view_product_button_hover_bg_color ){
                    hongo_customize( 'hongo_quick_view_product_button_hover_bg_color', function( value ) { 
                        $( '.hongo-quick-view-popup form.cart .button' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_quick_view_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Quick view Product Button Border Color */
        hongo_customize( 'hongo_quick_view_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup.woocommerce div.product form.cart .button' ).css( 'border-color', to );
            });
        });

        /* Product Quick View Product Button Border Color */
         hongo_customize( 'hongo_quick_view_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_border_color = to;
                $( '.hongo-quick-view-popup.woocommerce div.product form.cart .button' ).css( 'border-color', to );

                if( !$hongo_quick_view_product_button_border_hover_color ){
                    hongo_customize( 'hongo_quick_view_product_button_border_hover_color', function( value ) { 
                        $( '.hongo-quick-view-popup.woocommerce div.product form.cart .button' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_quick_view_product_button_border_color );
                        });
                    });
                }
            });
        });

        /* Product Quick View Product Button Border hover Color */
        hongo_customize( 'hongo_quick_view_product_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_border_hover_color = to;
                $( '.hongo-quick-view-popup form.cart .button' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_quick_view_product_button_border_color );
                });
            });
        });


        /* Quick view Product Button BG Hover Color */
        hongo_customize( 'hongo_quick_view_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_button_hover_bg_color = to;
                $( '.hongo-quick-view-popup form.cart .button' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_quick_view_product_button_bg_color );
                });
            });
        });

        /* Quick view Heading Meta Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_heading_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .product_meta .sku_wrapper, .hongo-quick-view-popup .product_meta .posted_in, .hongo-quick-view-popup .product_meta span.tagged_as, .hongo-quick-view-popup .product_meta .products-social-icon span.hongo-product-sharebox-title, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper' ).css( 'color', to );
            });
        });

        /* Quick view Product Meta Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_page_meta_color = to;
                $( '.hongo-quick-view-popup .product_meta .sku_wrapper span.sku, .hongo-quick-view-popup .product_meta .posted_in a, .hongo-quick-view-popup .product_meta .tagged_as a, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-wishlist, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-compare, .hongo-quick-view-popup.woocommerce div.product .summary .summary-main-title-right .sku_wrapper span' ).css( 'color', to );
                if( !$hongo_quick_view_product_page_meta_link_hover_color ){
                    hongo_customize( 'hongo_quick_view_product_page_meta_link_hover_color', function( value ) { 
                        $( '.hongo-quick-view-popup .product_meta .sku_wrapper span.sku, .hongo-quick-view-popup .product_meta .posted_in a, .hongo-quick-view-popup .product_meta .tagged_as a, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-wishlist, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-compare' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_quick_view_product_page_meta_color );
                        });
                    });
                }
            });
        });

        /* Quick view Product Meta Link Hover Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_link_hover_color', function( value ) {
            value.bind( function( to ) {
                $hongo_quick_view_product_page_meta_link_hover_color = to;
                $( '.hongo-quick-view-popup .product_meta .sku_wrapper span.sku, .hongo-quick-view-popup .product_meta .posted_in a, .hongo-quick-view-popup .product_meta .tagged_as a, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-wishlist, .hongo-quick-view-popup div.quick-view-product .summary a.hongo-compare' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_quick_view_product_page_meta_color );
                });
            });
        });


        /* Quick view Social Icon Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_social_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-quick-view-popup .product_meta .products-social-icon a' ).css( 'color', to );
            });
        });

        /* Quick view Product Social Icon Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_page_meta_social_icon_color = to;
                $( '.hongo-quick-view-popup .product_meta .products-social-icon a' ).css( 'color', to );
                if( !$hongo_quick_view_product_page_meta_social_icon_hover_color ){
                    hongo_customize( 'hongo_quick_view_product_page_meta_social_icon_hover_color', function( value ) { 
                        $( '.hongo-quick-view-popup .product_meta .products-social-icon a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_quick_view_product_page_meta_social_icon_color );
                        });
                    });
                }
            });
        });

        /* Quick view Product Social Icon Hover Color */
        hongo_customize( 'hongo_quick_view_product_page_meta_social_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_quick_view_product_page_meta_social_icon_hover_color = to;
                $( '.hongo-quick-view-popup .product_meta .products-social-icon a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_quick_view_product_page_meta_social_icon_color );
                });
            });
        });

        /* Compare Heading Color */
        hongo_customize( 'hongo_compare_product_heading_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-popup-heading h3, .hongo-compare-popup .compare-popup-heading .actions a' ).css( 'color', to );
            });
        });

        /* Compare Heading Color hover */
        hongo_customize( 'hongo_compare_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_heading_color = to;
                $( '.hongo-compare-popup .compare-popup-heading .actions a' ).css( 'color', to );
                if( !$hongo_compare_product_heading_link_hover_color ){
                    hongo_customize( 'hongo_compare_product_heading_link_hover_color', function( value ) { 
                        $( '.hongo-compare-popup .compare-popup-heading .actions a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_compare_product_heading_color );
                        });
                    });
                }
            });
        });

        /* Compare Heading Color hover */
        hongo_customize( 'hongo_compare_product_heading_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_heading_link_hover_color = to;
                $( '.hongo-compare-popup .compare-popup-heading .actions a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_compare_product_heading_color );
                });
            });
        });

        /*Compare Filter error message color*/
        hongo_customize( 'hongo_compare_product_filter_errormsg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-error-msg' ).css( 'color', to );
            });
        });

        /*Compare Filter error message border color*/
        hongo_customize( 'hongo_compare_product_filter_errormsg_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-error-msg' ).css( 'border-color', to );
            });
        });

        /* Compare Title color */
        hongo_customize( 'hongo_compare_product_title_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_title_color = to;
                $( '.compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a' ).css( 'color', to );
                if( !$hongo_compare_product_title_hover_color ){
                    hongo_customize( 'hongo_compare_product_title_hover_color', function( value ) { 
                        $( '.compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_compare_product_title_color );
                        });
                    });
                }
            });
        });

        /* Compare Title hover color */
        hongo_customize( 'hongo_compare_product_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_title_hover_color = to;
                $( '.compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li h2 a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_compare_product_title_color );
                });
            });
        });

        /*Compare Main content Color*/
        hongo_customize( 'hongo_compare_product_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup a.hongo-compare-product-remove, .hongo-compare-popup .compare-popup-main-content .content-right, .hongo-compare-popup .star-rating::before, .hongo-compare-popup .star-rating span, .hongo-compare-popup .star-rating' ).css( 'color', to );
            });
        });

        /* Compare Main content hover color */
        hongo_customize( 'hongo_compare_product_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_color = to;
                $( '.hongo-compare-popup a.hongo-compare-product-remove' ).css( 'color', to );
                if( !$hongo_compare_product_link_hover_color ){
                    hongo_customize( 'hongo_compare_product_link_hover_color', function( value ) { 
                        $( '.hongo-compare-popup a.hongo-compare-product-remove' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_compare_product_color );
                        });
                    });
                }
            });
        });

        /* Compare Main content hover color */
        hongo_customize( 'hongo_compare_product_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_link_hover_color = to;
                $( '.hongo-compare-popup a.hongo-compare-product-remove' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_compare_product_color );
                });
            });
        });

        /*Compare primary background color*/
        hongo_customize( 'hongo_compare_product_primary_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-popup-main-content .even' ).css( 'background-color', to );
            });
        });

        /*Compare secondary background color*/
        hongo_customize( 'hongo_compare_product_secondary_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-popup-main-content .odd' ).css( 'background-color', to );
            });
        });

        /* Product Compare Product Label Color */
        hongo_customize( 'hongo_compare_product_label_color', function( value ) { 
            value.bind( function( to ) {
               $( '.compare-popup-main-content .content-left ul > li' ).css( 'color', to );
            });
        });

        /* Product Compare Product Button Color */
        hongo_customize( 'hongo_compare_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).css( 'color', to );

                if( !$hongo_compare_product_button_hover_color ){
                    hongo_customize( 'hongo_compare_product_button_hover_color', function( value ) { 
                        $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_compare_product_button_color );
                        });
                    });
                }
            });
        });

        /* Product Compare Product Button Hover Color */
        hongo_customize( 'hongo_compare_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_hover_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_compare_product_button_color );
                });
            });
        });

        /* Product Compare Product Button BG Color */
        hongo_customize( 'hongo_compare_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_bg_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).css( 'background-color', to );

                if( !$hongo_compare_product_button_hover_bg_color ){
                    hongo_customize( 'hongo_compare_product_button_hover_bg_color', function( value ) { 
                        $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_compare_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Product Compare Product Button BG Hover Color */
        hongo_customize( 'hongo_compare_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_hover_bg_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_compare_product_button_bg_color );
                });
            });
        });

        /* Product Compare Product Button Border Color */

         hongo_customize( 'hongo_compare_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_border_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).css( 'border-color', to );

                if( !$hongo_compare_product_button_border_hover_color ){
                    hongo_customize( 'hongo_compare_product_button_border_hover_color', function( value ) { 
                        $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_compare_product_button_border_color );
                        });
                    });
                }
            });
        });

        /* Product Compare Product Button BG Hover Color */
        hongo_customize( 'hongo_compare_product_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_compare_product_button_border_hover_color = to;
                $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .button' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_compare_product_button_border_color );
                });
            });
        });
        
        /* Product Compare Product Price Color */
        hongo_customize( 'hongo_compare_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price' ).css( 'color', to );
            });
        });

        /* Product Compare Product Main Price Color */
        hongo_customize( 'hongo_compare_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.hongo-compare-popup .compare-popup-main-content .content-right .compare-lists-wrap > li > ul > li .price del' ).css( 'color', to );
            });
        });

        /* Wishlist Border Color */
        hongo_customize( 'hongo_wishlist_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page table.table th, .hongo-wishlist-page table.table td' ).css( 'border-bottom-color', to );
            });
        });

        /* Wishlist Remove Empty Color */
        hongo_customize( 'hongo_wishlist_remove_empty_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page table.table td a.btn-link' ).css( 'color', to );
                $( '.hongo-wishlist-page table.table td a.btn-link' ).css( 'border-bottom-color', to );
            });
        });

       /* Wishlist Remove Checkbox Border Color */
        hongo_customize( 'hongo_wishlist_remove_checkbox_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page .hongo-cb' ).css( 'border-color', to );
            });
        });

        /* Wishlist Remove Icon Color */
        hongo_customize( 'hongo_wishlist_remove_icon_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page a.hongo-page-remove-wish' ).css( 'color', to );
            });
        });

        /* Wishlist Heading Color */
        hongo_customize( 'hongo_wishlist_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page table.table th' ).css( 'color', to );
            });
        });

        /* Search Popup Background */
        hongo_customize( 'hongo_search_popup_bgcolor', function( value ) { 
            value.bind( function( to ) {
               $( '.show-search-popup .search-popup' ).css( 'background-color', to );
            });
        });

        /* Search Popup Label Color */
        hongo_customize( 'hongo_search_popup_labelcolor', function( value ) { 
            value.bind( function( to ) {
               $( '.show-search-popup .mfp-container .search-label' ).css( 'color', to );
            });
        });

         /* Search Popup Text Color */
        hongo_customize( 'hongo_search_popup_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.show-search-popup .search-form .search-input' ).css( 'color', to );
            });
        });        

        /* Search Popup Text Color */
        hongo_customize( 'hongo_search_popup_search_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.show-search-popup .search-form .search-button' ).css( 'color', to );
            });
        });

        /* Wishlist Content Color */
        hongo_customize( 'hongo_wishlist_product_content_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_content_color = to;
                $( '.hongo-wishlist-page .woocommerce-Price-amount.amount ,.hongo-wishlist-page .wishlist-product-title, .hongo-wishlist-page table.table td del ,.hongo-wishlist-page table.table td,.hongo-wishlist-page p.no-product-wishlist' ).css( 'color', to );
                if( !$hongo_wishlist_product_content_hover_color ){
                    hongo_customize( 'hongo_wishlist_product_content_hover_color', function( value ) { 
                        $( '.hongo-wishlist-page .wishlist-product-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_wishlist_product_content_color );
                        });
                    });
                }
            });
        });

        /* Wishlist Content Hover Color */
        hongo_customize( 'hongo_wishlist_product_content_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_content_hover_color = to;
                $( '.hongo-wishlist-page .wishlist-product-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_wishlist_product_content_color );
                });
            });
        });

        /* Wishlist Instock Color */
        hongo_customize( 'hongo_wishlist_product_instock_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page .in-stock' ).css( 'color', to );
                $( '.hongo-wishlist-page .in-stock' ).css( 'border-color', to );
            });
        });

        /* Wishlist Outstock Color */
        hongo_customize( 'hongo_wishlist_product_outstock_color', function( value ) { 
            value.bind( function( to ) {
                $( '.hongo-wishlist-page .out-of-stock' ).css( 'color', to );
                $( '.hongo-wishlist-page .out-of-stock' ).css( 'border-color', to );

            });
        });

        /* Wishlist Button Background Color */
        hongo_customize( 'hongo_wishlist_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_bg_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).css( 'background-color', to );
                if( !$hongo_wishlist_product_button_hover_bg_color ){
                    hongo_customize( 'hongo_wishlist_product_button_hover_bg_color', function( value ) { 
                        $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $hongo_wishlist_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Wishlist Button Hover Background Color */
        hongo_customize( 'hongo_wishlist_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_hover_bg_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $hongo_wishlist_product_button_bg_color );
                });
            });
        });

        /* Wishlist Button Color */
        hongo_customize( 'hongo_wishlist_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).css( 'color', to );
                if( !$hongo_wishlist_product_button_hover_color ){
                    hongo_customize( 'hongo_wishlist_product_button_hover_color', function( value ) { 
                        $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $hongo_wishlist_product_button_color );
                        });
                    });
                }
            });
        });

        /* Wishlist Button Hover Color */
        hongo_customize( 'hongo_wishlist_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_hover_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $hongo_wishlist_product_button_color );
                });
            });
        });

        /* Wishlist Button Border Color */
        hongo_customize( 'hongo_wishlist_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_border_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).css( 'border-color', to );
                if( !$hongo_wishlist_product_button_border_hover_color ){
                    hongo_customize( 'hongo_wishlist_product_button_border_hover_color', function( value ) { 
                        $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $hongo_wishlist_product_button_border_color );
                        });
                    });
                }
            });
        });

        /* Wishlist Button Border Hover Color */
        hongo_customize( 'hongo_wishlist_product_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_wishlist_product_button_border_hover_color = to;
                $( '.hongo-wishlist-page a.button ,.hongo-wishlist-page .btn.hongo-empty-wishlist ,.hongo-wishlist-page .btn.hongo-remove-wishlist-selected' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'border-color', $hongo_wishlist_product_button_border_color );
                });
            });
        });

        /* Search Close BG Color */
        hongo_customize( 'hongo_search_popup_close_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_search_popup_close_icon_bg_color = to;
                $( 'button.mfp-close, button.mfp-arrow' ).css( 'background', to );
                if( !$hongo_search_popup_close_icon_bg_hover_color ){
                    hongo_customize( 'hongo_search_popup_close_icon_bg_hover_color', function( value ) { 
                        $( 'button.mfp-close, button.mfp-arrow' ).hover(function(){
                            $(this).css( 'background', '' );
                        }, function(){
                            $(this).css( 'background', $hongo_search_popup_close_icon_bg_color );
                        });
                    });
                }
            });
        });

        /* Close BG Hover Color */
        hongo_customize( 'hongo_search_popup_close_icon_bg_hover_color', function( value ) { 
            value.bind( function( to ) {
                $hongo_search_popup_close_icon_bg_hover_color = to;
                $( 'button.mfp-close, button.mfp-arrow' ).hover(function(){
                    $(this).css( 'background', to );
                }, function(){
                    $(this).css( 'background', $hongo_search_popup_close_icon_bg_color );
                });
            });
        });

    });
   
    
}(jQuery);
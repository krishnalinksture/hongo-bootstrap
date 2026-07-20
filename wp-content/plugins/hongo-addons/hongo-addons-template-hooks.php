<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

/******* Compare hooks start *******/

	/**
	 * Display compare details
	 *
	 * @see hongo_addons_compare_details()
	 */
	add_action( 'hongo_compare_details', 'hongo_addons_compare_details' );

	/**
	 * Display compare add to cart button
	 *
	 * @see hongo_addons_compare_list_add_to_cart()
	 */
	add_action( 'hongo_addons_compare_list_add_to_cart', 'hongo_addons_common_add_to_cart', 10 ,2 );

	/**
	 * Display compare add to cart button
	 *
	 * @see hongo_addons_template_quick_view_product_compare()
	 */
	add_action( 'hongo_quick_view_product_summary', 'hongo_addons_template_quick_view_product_compare', 32 );

/******* Compare hooks end *******/

/******* Quick View Hooks Start *******/
    
    /**
     * Display quick view product details
     *
     * @see hongo_quick_view_product_details()
     */
    add_action( 'hongo_quick_view_product_details', 'hongo_quick_view_product_details' );

    /**
     * Before Quick View Product Summary Div.
     *
     * @see hongo_show_quick_view_product_sale_flash()
     * @see hongo_show_quick_view_product_image()
     */
    add_action( 'hongo_before_quick_view_product_summary', 'hongo_show_quick_view_product_sale_flash', 10 );
    add_action( 'hongo_before_quick_view_product_summary', 'hongo_show_quick_view_product_image', 20 );

    /**
     * Quick View Product Summary Box.
     *
     * @see hongo_template_quick_view_product_top_content_wrap_start()
     * @see hongo_template_quick_view_product_title()
     * @see hongo_template_quick_view_product_price()
     * @see hongo_template_quick_view_product_top_content_wrap_middle()
     * @see hongo_template_quick_view_product_rating()
     * @see hongo_template_quick_view_product_sku()
     * @see hongo_template_quick_view_product_top_content_wrap_end()
     * @see hongo_template_quick_view_product_deal()
     * @see hongo_template_quick_view_product_excerpt()
     * @see woocommerce_template_single_add_to_cart()
     * @see hongo_template_quick_view_product_wishlist()
     * @see hongo_template_quick_view_product_meta()
     * @see woocommerce_template_single_sharing()
     */

    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_top_content_wrap_start', 2 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_title', 5 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_price', 9 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_top_content_wrap_middle', 9 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_rating', 10 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_sku', 11 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_top_content_wrap_end', 12 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_deal', 15 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_excerpt', 20 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_ajax_add_to_cart', 30 );
    add_action( 'hongo_quick_view_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_wishlist', 31 );
    add_action( 'hongo_quick_view_product_summary', 'hongo_template_quick_view_product_meta', 40 );
    add_action( 'hongo_quick_view_product_summary', 'woocommerce_template_single_sharing', 50 );

/******* Quick View Hooks End *******/

/******* Shop loop style hooks start *******/

	/* Before shop loop hook */
	if ( ! function_exists( 'hongo_addons_before_shop_loop' ) ) {
	    function hongo_addons_before_shop_loop( $product_archive_list_style ) {

	    	if( $product_archive_list_style == 'shop-standard' ) {

	    		add_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_addons_template_loop_product_wishlist', 115 );
	    		add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_addons_template_loop_product_compare', 120 );

	    	} elseif( $product_archive_list_style == 'shop-simple' ) {

				add_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                add_action( 'woocommerce_after_shop_loop_item_title', 'hongo_addons_template_loop_product_wishlist', 15 );
				add_action( 'woocommerce_after_shop_loop_item_title', 'hongo_addons_template_loop_product_compare', 20 );

	    	} else {
	    		
	    		add_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                add_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_wishlist', 15 );
	    		add_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_compare', 20 );
	    	}
	    }
	}
	add_action( 'hongo_before_shop_loop', 'hongo_addons_before_shop_loop' );

	/* After shop loop hook */
	if ( ! function_exists( 'hongo_addons_after_shop_loop' ) ) {
	    function hongo_addons_after_shop_loop( $product_archive_list_style ) {

	    	if( $product_archive_list_style == 'shop-standard' ) {

                remove_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_addons_template_loop_product_wishlist', 115 );
				remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_addons_template_loop_product_compare', 120 );

	    	} elseif( $product_archive_list_style == 'shop-simple' ) {

                remove_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                remove_action( 'woocommerce_after_shop_loop_item_title', 'hongo_addons_template_loop_product_wishlist', 15 );
				remove_action( 'woocommerce_after_shop_loop_item_title', 'hongo_addons_template_loop_product_compare', 20 );

	    	} else {
                remove_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_quick_view', 10 );
                remove_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_wishlist', 15 );
	    		remove_action( 'hongo_shop_loop_button', 'hongo_addons_template_loop_product_compare', 20 );
	    	}
	    }
	}
	add_action( 'hongo_after_shop_loop', 'hongo_addons_after_shop_loop' );

/******* Shop loop style hooks end *******/

/******* Single product style hooks start *******/

    /* WordPress woocommerce_before_main_content Action */
    if ( ! function_exists( 'hongo_addons_woocommerce_before_main_content' ) ) {
        function hongo_addons_woocommerce_before_main_content() {

            if ( ! is_admin() ) {

                // Single content Simple Rating upper to title
                $hongo_get_single_content_product_style = hongo_get_single_content_product_style();
                if( ! empty( $hongo_get_single_content_product_style ) ) {
                    switch ( $hongo_get_single_content_product_style ) {
                        case 'single-product-right-content' :
                        case 'single-product-carousel' :
                        case 'single-product-left-content' :
                        case 'single-product-classic' :
                        case 'single-product-sticky' :
                        case 'single-product-extended-descriptions' :
                        case 'single-product-default':
                        default:
                        	
                            /**
                             * To Add compare product functionality after wishlist link
                             *
                             * @see hongo_addons_template_single_product_wishlist()
                             */							
                            add_action( 'woocommerce_single_product_summary', 'hongo_addons_template_single_product_wishlist', 31 );

                            /**
                             * To Add compare product functionality after Compare link
                             *
                             * @see hongo_addons_template_single_product_compare()
                             */
							add_action( 'woocommerce_single_product_summary', 'hongo_addons_template_single_product_compare', 32 );                            
                            break;

                        case 'single-product-modern' :

                            $product = wc_get_product( get_the_ID() );

                            if ( is_product() && $product->get_stock_status() == 'outofstock' ) {
                                
                                add_action( 'woocommerce_single_product_summary', 'hongo_addons_single_product_buttons_wrap_start', 30 );
                                /**
                                 * To Add compare product functionality after wishlist link
                                 *
                                 * @see hongo_addons_template_single_product_wishlist()
                                 */
                                add_action( 'woocommerce_single_product_summary', 'hongo_addons_template_single_product_wishlist', 31 );
                                /**
                                 * To Add compare product functionality after Compare link
                                 *
                                 * @see hongo_addons_template_single_product_compare()
                                 */
                                add_action( 'woocommerce_single_product_summary', 'hongo_addons_template_single_product_compare', 32 );
                                add_action( 'woocommerce_single_product_summary', 'hongo_addons_single_product_buttons_wrap_end', 33 );

                            } else {
                                add_action( 'woocommerce_after_add_to_cart_button', 'hongo_addons_single_product_buttons_wrap_start', 30 );
                                /**
                                 * To Add compare product functionality after wishlist link
                                 *
                                 * @see hongo_addons_template_single_product_wishlist()
                                 */
                                add_action( 'woocommerce_after_add_to_cart_button', 'hongo_addons_template_single_product_wishlist', 31 );
                                /**
                                 * To Add compare product functionality after Compare link
                                 *
                                 * @see hongo_addons_template_single_product_compare()
                                 */
                                add_action( 'woocommerce_after_add_to_cart_button', 'hongo_addons_template_single_product_compare', 32 );
                                add_action( 'woocommerce_after_add_to_cart_button', 'hongo_addons_single_product_buttons_wrap_end', 33 );
                            }

                            /**
                             * Start Wrap for add to cart button
                             *
                             * @see hongo_addons_single_product_add_to_cart_wrap_start()
                             */
                            add_action( 'woocommerce_before_add_to_cart_button', 'hongo_addons_single_product_add_to_cart_wrap_start', 1 );

                            /**
                             * End Wrap for add to cart button
                             *
                             * @see hongo_addons_single_product_add_to_cart_wrap_end()
                             */
                            add_action( 'woocommerce_after_add_to_cart_button', 'hongo_addons_single_product_add_to_cart_wrap_end', 1 );
                            break;
                    }
                }
            }
        }
    }
    add_action( 'woocommerce_before_main_content', 'hongo_addons_woocommerce_before_main_content' );

/******* Single product style hooks end *******/

/******* Wishlist Hooks Start *******/

    /**
     * Display Wishlist add to cart button
     *
     * @see hongo_wishlist_list_add_to_cart()
     */
    add_action( 'hongo_wishlist_page_add_to_cart', 'hongo_wishlist_page_add_to_cart', 10 ,2 );

    /**
     * Display wishlist shortcode data
     *
     * @see hongo_addons_wishlist_data()
     */
    add_action( 'hongo_addons_wishlist_data', 'hongo_addons_wishlist_data' );

/******* Wishlist Hooks End *******/

/******* Video Hooks Start *******/

    /**
     * Hook hongo_single_product_image_before
     *
     * Single product video
     *
     * @see hongo_addons_template_single_product_video()
     */
    add_action( 'hongo_single_product_image_before', 'hongo_addons_template_single_product_video', 20 );

/******* Video Hooks End *******/

/******* 360 Degree Hooks Start *******/

    /**
     * Hook hongo_single_product_image_before
     *
     * Single product 360 degree
     *
     * @see hongo_addons_template_single_product_360_degree()
     */
    add_action( 'hongo_single_product_image_before', 'hongo_addons_template_single_product_360_degree', 25 );

/******* 360 Degree Hooks End *******/

/******* Sticky Add To Cart Hooks End *******/

    /**
     * Display sticky add to cart
     *
     * @see hongo_addons_single_product_sticky_add_to_cart()
     */
    add_action( 'woocommerce_after_single_product_summary', 'hongo_addons_single_product_sticky_add_to_cart', 20 );

    /**
     * Hook hongo_sticky_add_to_cart_content
     *
     * Display sticky add to cart title
     *
     * @see woocommerce_template_single_add_to_cart()
     */
    add_action( 'hongo_addons_sticky_add_to_cart_content', 'woocommerce_template_single_add_to_cart', 10 );

/******* Sticky Add To Cart Hooks End *******/

/******* Smart Product Hooks Start *******/

    /**
     * Hook wp_footer
     *
     * Display Smart Products
     *
     * @see hongo_addons_smart_products()
     */
    add_action( 'wp_footer', 'hongo_addons_smart_products', 10 );    

/******* Smart Product Hooks End *******/

/******* Breadcrumb Navigation Hooks Start *******/
    
    /**
     * Display single product breadcrumb
     *
     * @see hongo_single_product_breadcrumb()
     */
    add_action( 'woocommerce_single_product_summary', 'hongo_addons_single_product_breadcrumb', 2 );

/******* Breadcrumb Navigation Hooks End *******/

/******* Meta Share Hooks Start *******/

    /**
     * Display single product sku
     *
     * @see hongo_addons_single_product_meta_share()
     */
    add_action( 'hongo_product_meta_right', 'hongo_addons_single_product_meta_share' );

/******* Meta Share Hooks End *******/

/******* Product Slider Widget Hooks Start *******/

    /**
     * Display add to cart button into content widget, product slider
     *
     * @see hongo_addons_common_add_to_cart()
     * @see hongo_addons_template_loop_product_quick_view()
     * @see hongo_addons_template_loop_product_compare()
     * @see hongo_addons_template_loop_product_wishlist()
     */
    add_action( 'hongo_content_widget_button', 'hongo_addons_common_add_to_cart', 10 );
    add_action( 'hongo_content_widget_button', 'hongo_addons_template_loop_product_quick_view', 20 );
    add_action( 'hongo_content_widget_button', 'hongo_addons_template_loop_product_compare', 30 );
    add_action( 'hongo_content_widget_button', 'hongo_addons_template_loop_product_wishlist', 40 );

/******* Product Slider Widget Hooks End *******/

/******* Product Carousel Widget Hooks Start *******/



/******* Product Carousel Widget Hooks End *******/
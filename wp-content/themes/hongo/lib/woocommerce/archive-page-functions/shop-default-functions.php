<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    if( ! function_exists( 'hongo_before_shop_loop_shop_default_callback' ) ) {
        function hongo_before_shop_loop_shop_default_callback() {

            add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_open', 5 );

            $product_archive_enable_gallery_slider = hongo_get_product_archive_enable_gallery_slider();
            if( $product_archive_enable_gallery_slider == '1' ) {
                
                // Main Image
                remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                
                // For Grid Product Slider
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_slider', 12 );

            } else {

                /* To Display alternate image */
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_alternate_product_image', 15 );

            }

            // To Add loop product Coutdown
            $product_archive_enable_deal = hongo_get_product_archive_enable_deal();
            if( $product_archive_enable_deal == '1' ) {
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_deal', 15 );
            }

            add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_close', 20 );

            /* To add product buttons like add to cart */
            $hongo_product_archive_enable_add_to_cart = hongo_get_product_archive_enable_add_to_cart();
            if( $hongo_product_archive_enable_add_to_cart != '1' ) {
                remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            }

            /* To Remove loop product rating */
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating != '1' ) {
                remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            }
        }
    }
    add_action( 'hongo_before_shop_loop_shop-default', 'hongo_before_shop_loop_shop_default_callback' );

    if( ! function_exists( 'hongo_after_shop_loop_shop_default_callback' ) ) {
        function hongo_after_shop_loop_shop_default_callback() {

            remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_open', 5 );

            $product_archive_enable_gallery_slider = hongo_get_product_archive_enable_gallery_slider();
            if( $product_archive_enable_gallery_slider == '1' ) {
                
                // Main Image
                add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                
                // For Grid Product Slider
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_slider', 12 );

            } else {

                /* To Display alternate image */
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_alternate_product_image', 15 );

            }

            // To Add loop product Coutdown
            $product_archive_enable_deal = hongo_get_product_archive_enable_deal();
            if( $product_archive_enable_deal == '1' ) {
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_deal', 15 );
            }
            
            remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_close', 20 );

            /* To add product buttons like add to cart */
            $hongo_product_archive_enable_add_to_cart = hongo_get_product_archive_enable_add_to_cart();
            if( $hongo_product_archive_enable_add_to_cart != '1' ) {
                add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            }

            /* To Remove loop product rating */
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating != '1' ) {
                add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            }
        }
    }
    add_action( 'hongo_after_shop_loop_shop-default', 'hongo_after_shop_loop_shop_default_callback' );
}

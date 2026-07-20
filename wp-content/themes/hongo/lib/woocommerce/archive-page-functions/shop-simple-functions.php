<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    if( ! function_exists( 'hongo_before_shop_loop_shop_simple_callback' ) ) {
        function hongo_before_shop_loop_shop_simple_callback() {

            /* To Remove loop product image link open and cover only image & sale falsh */
            remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

            /* To Remove loop product image link close and cover only image & sale falsh */
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

            $product_archive_enable_gallery_slider = hongo_get_product_archive_enable_gallery_slider();
            if( $product_archive_enable_gallery_slider == '1' ) {

                // Main Image
                remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                
                // For Grid Product Slider
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_slider', 12 );

            } else {

                /* To Remove loop product image link open and cover only image & sale falsh */
                add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );

                /* To Display alternate image */
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_alternate_product_image', 15 );

                /* To Remove loop product image link close and cover only image & sale falsh */
                add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );
            }

            // To Add loop product Coutdown
            $product_archive_enable_deal = hongo_get_product_archive_enable_deal();
            if( $product_archive_enable_deal == '1' ) {
                add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_deal', 200 );
            }

            add_action( 'woocommerce_after_shop_loop_item_title', 'hongo_price_button_wrap_start', 3 );

            /* To Remove loop product price and change priority */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

            /* To Remove loop product rating and change priority */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating == '1' ) {
                add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 6 );
            }

            /* To add product buttons like add to cart */
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            $hongo_product_archive_enable_add_to_cart = hongo_get_product_archive_enable_add_to_cart();
            if( $hongo_product_archive_enable_add_to_cart == 1 ) {
                add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 7 );
            }

            add_action( 'woocommerce_after_shop_loop_item_title', 'hongo_price_button_wrap_end', 9 );

        }
    }
    add_action( 'hongo_before_shop_loop_shop-simple', 'hongo_before_shop_loop_shop_simple_callback' );

    if( ! function_exists( 'hongo_after_shop_loop_shop_simple_callback' ) ) {
        function hongo_after_shop_loop_shop_simple_callback() {

            /* To Remove loop product image link open and cover only image & sale falsh */
            add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

            /* To Remove loop product image link close and cover only image & sale falsh */
            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

            $product_archive_enable_gallery_slider = hongo_get_product_archive_enable_gallery_slider();
            if( $product_archive_enable_gallery_slider == '1' ) {

                // Main Image
                add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                
                // For Grid Product Slider
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_slider', 12 );

            } else {

                /* To Remove loop product image link open and cover only image & sale falsh */
                remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );

                /* To Display alternate image */
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_alternate_product_image', 15 );

                /* To Remove loop product image link close and cover only image & sale falsh */
                remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );
            }

            // To Add loop product Coutdown
            $product_archive_enable_deal = hongo_get_product_archive_enable_deal();
            if( $product_archive_enable_deal == '1' ) {
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_deal', 200 );
            }

            remove_action( 'woocommerce_after_shop_loop_item_title', 'hongo_price_button_wrap_start', 3 );

            /* To Remove loop product price and change priority */
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

            /* To Remove loop product rating and change priority */
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating == '1' ) {
                remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 6 );
            }

            /* To add product buttons like add to cart */
            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            $hongo_product_archive_enable_add_to_cart = hongo_get_product_archive_enable_add_to_cart();
            if( $hongo_product_archive_enable_add_to_cart == 1 ) {
                remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 7 );
            }            
            
            remove_action( 'woocommerce_after_shop_loop_item_title', 'hongo_price_button_wrap_end', 9 );
            
        }
    }
    add_action( 'hongo_after_shop_loop_shop-simple', 'hongo_after_shop_loop_shop_simple_callback' );
}

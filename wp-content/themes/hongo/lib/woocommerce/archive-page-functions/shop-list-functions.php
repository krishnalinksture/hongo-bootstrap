<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    if( ! function_exists( 'hongo_before_shop_loop_shop_list_callback' ) ) {
        function hongo_before_shop_loop_shop_list_callback() {

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

            add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_open', 5 );
            add_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_close', 20 );

            remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );
            add_action( 'woocommerce_before_subcategory_title', 'woocommerce_template_loop_category_link_close', 100 );

            /* To add product category link */
            add_action( 'woocommerce_shop_loop_subcategory_title', 'hongo_template_loop_category_link_open', 5 );
            add_action( 'woocommerce_shop_loop_subcategory_title', 'hongo_template_loop_category_link_close', 100 );

            /* To Remove loop product price and change priority */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

            /* To Remove loop product rating and change priority */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating == '1' ) {
                add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
            }

            /* To add product short description */
            add_action( 'woocommerce_after_shop_loop_item_title', 'hongo_template_loop_short_description', 15 );
            add_action( 'woocommerce_after_subcategory_title', 'hongo_template_taxonomy_archive_description', 15 );
        }
    }
    add_action( 'hongo_before_shop_loop_shop-list', 'hongo_before_shop_loop_shop_list_callback' );

    if( ! function_exists( 'hongo_after_shop_loop_shop_list_callback' ) ) {
        function hongo_after_shop_loop_shop_list_callback() {

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
                
                remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );

            }

            // To Add loop product Coutdown
            $product_archive_enable_deal = hongo_get_product_archive_enable_deal();
            if( $product_archive_enable_deal == '1' ) {
                remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_product_deal', 200 );
            }

            remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_open', 5 );
            remove_action( 'woocommerce_before_shop_loop_item_title', 'hongo_template_loop_image_wrap_close', 20 );

            add_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );
            remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_template_loop_category_link_close', 100 );

            /* To add product category link */
            remove_action( 'woocommerce_shop_loop_subcategory_title', 'hongo_template_loop_category_link_open', 5 );
            remove_action( 'woocommerce_shop_loop_subcategory_title', 'hongo_template_loop_category_link_close', 100 );

            /* To Remove loop product price and change priority */
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

            /* To Remove loop product rating and change priority */
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            $hongo_product_archive_enable_star_rating = hongo_get_product_archive_enable_star_rating();
            if( $hongo_product_archive_enable_star_rating == '1' ) {
                remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
            }

            /* To add product short description */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'hongo_template_loop_short_description', 15 );
            remove_action( 'woocommerce_after_subcategory_title', 'hongo_template_taxonomy_archive_description', 15 );
        }
    }
    add_action( 'hongo_after_shop_loop_shop-list', 'hongo_after_shop_loop_shop_list_callback' );
}

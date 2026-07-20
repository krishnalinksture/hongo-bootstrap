<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /******************************************* TEMPLATE FUNCTIONS *******************************************/

    /* To Add Single Content Product style  */
    if ( ! function_exists( 'hongo_template_content_single_product' ) ) {
        function hongo_template_content_single_product( $args = array() ) {
            global $product;

            // To get single content product style
            $single_content_product_style = hongo_get_single_content_product_style();

            if( ! empty( $single_content_product_style ) ) {

                wc_get_template( 'content-single-product/'.$single_content_product_style.'.php', $args );

            } else {

                wc_get_template( 'content-single-product/single-product-default.php', $args );
            }
        }
    }

    /* To Display single product sku */
    if ( ! function_exists( 'hongo_single_product_sku' ) ) {
        function hongo_single_product_sku( ) {
            global $product;

            if ( $product ) {

                wc_get_template( 'single-product/meta-sku.php' );
            }
        }
    }

    /* To Add single page tab */
    if ( ! function_exists( 'hongo_display_different_products_tab' ) ) {
        function hongo_display_different_products_tab( ) {
            global $product;

            if ( $product ) {

                wc_get_template( 'single-product/product-list-tabs.php' );
            }
        }
    }

    /******************************************* HOOK FUNCTIONS *******************************************/

    /**
     * Display content single product with different style
     *
     * @see hongo_template_content_single_product()
     */
    add_action( 'hongo_content_single_product', 'hongo_template_content_single_product' );

}

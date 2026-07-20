<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /* To Change position for flash sale box */
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'hongo_single_product_image_before', 'woocommerce_show_product_sale_flash', 100 );

    /* Enable Brand name & Image */
    $hongo_single_product_page_enable_brand = hongo_option( 'hongo_single_product_page_enable_brand', '0' );
    if( $hongo_single_product_page_enable_brand == 1 ) {
        add_action( 'woocommerce_single_product_summary', 'hongo_single_product_brand', 2 );
    }
    
    /*---------------Top Content Summary Start---------------*/

    /* To add product title summary Start */
    add_action( 'woocommerce_single_product_summary', 'hongo_single_product_top_content_wrap_start', 2 );
    
    /* To Remove & add product Title  */
    $hongo_single_product_page_enable_title = hongo_option( 'hongo_single_product_page_enable_title', '1' );
    if( $hongo_single_product_page_enable_title != 1 ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    }

    /*To add remove price */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );

    /* To add product title summary Middle */
    add_action( 'woocommerce_single_product_summary', 'hongo_single_product_top_content_wrap_middle', 9 );

    /* To add product sku */
    add_action( 'woocommerce_single_product_summary', 'hongo_single_product_sku', 11 );
    
    /* To add product title summary */
    add_action( 'woocommerce_single_product_summary', 'hongo_single_product_top_content_wrap_end', 12 );
    
    /*---------------Top Content Summary End---------------*/

    /* To add product deal */
    $hongo_single_product_page_enable_deal = hongo_option( 'hongo_single_product_page_enable_deal', '0' );
    if( $hongo_single_product_page_enable_deal == '1' ) {
        add_action( 'woocommerce_single_product_summary', 'hongo_template_loop_product_deal', 15 );
    }

    /* To Remove product short description */
    $hongo_single_product_enable_short_description = hongo_option( 'hongo_single_product_enable_short_description', '1' );
    if( $hongo_single_product_enable_short_description != '1' ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    }

    /* Display accordion style for WooCommerce product tabs */
    add_action( 'woocommerce_single_product_summary', 'hongo_single_product_tabs_accordion', 70 );
    
    /* To Remove & add product Data tabs */
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

    /* On / Off setting for Up Sells products */
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    $hongo_single_product_enable_up_sells = hongo_option( 'hongo_single_product_enable_up_sells', '1' );    
    if( $hongo_single_product_enable_up_sells == 1 ) {
        add_action ( 'woocommerce_single_product_summary', 'woocommerce_upsell_display', 80 );
    }
        
    /* On / Off setting for related products */
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    $hongo_single_product_enable_related = hongo_option( 'hongo_single_product_enable_related', '1' );
    if( $hongo_single_product_enable_related == 1 ) {
        add_action ( 'woocommerce_single_product_summary', 'woocommerce_output_related_products', 90 );
    }

    $hongo_single_product_enable_product_list_tab = hongo_option( 'hongo_single_product_enable_product_list_tab', '' );
    if( $hongo_single_product_enable_product_list_tab == 1 ) {

        remove_action( 'woocommerce_single_product_summary', 'woocommerce_upsell_display', 80 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_related_products', 90 );

        // Custom Tabbing (You may like & Related Product) 
        add_action( 'woocommerce_single_product_summary', 'hongo_display_different_products_tab', 100 );
    }
}

<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /* To Change position for flash sale box */
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'hongo_single_product_image_before', 'woocommerce_show_product_sale_flash', 10 );

    /*------------Main Structure Summary Start------------*/

    /* To Product Main Structure summary Start */
    add_action( 'woocommerce_single_product_summary', 'hongo_product_single_main_summary_structure_extended_descriptions_start', 1 );
    if( ! function_exists( 'hongo_product_single_main_summary_structure_extended_descriptions_start' ) ) {
        function hongo_product_single_main_summary_structure_extended_descriptions_start() {
            echo '<div class="hongo-summary-left-content">';
        }
    }
    
    /*------------Title Summary Start------------*/

    /* Enable Brand name & Image */
    $hongo_single_product_page_enable_brand = hongo_option( 'hongo_single_product_page_enable_brand', '0' );
    if( $hongo_single_product_page_enable_brand == 1 ) {
        add_action( 'woocommerce_single_product_summary', 'hongo_single_product_brand', 2 );
    }

    // To Customer Rating
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 3 );
    
    /* To Remove & add product Title  */
    $hongo_single_product_page_enable_title = hongo_option( 'hongo_single_product_page_enable_title', '1' );
    if( $hongo_single_product_page_enable_title != 1 ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    }

    /*To add remove price */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );

    /*------------Title Summary End------------*/

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

    /* To Product Main Structure summary Middle */
    add_action( 'woocommerce_single_product_summary', 'hongo_product_single_main_summary_structure_extended_descriptions_middle', 29 );
    if( ! function_exists ( 'hongo_product_single_main_summary_structure_extended_descriptions_middle' ) ) {
        function hongo_product_single_main_summary_structure_extended_descriptions_middle(){
                echo '</div>';
                echo '<div class="hongo-summary-right-content">';
        }
    }

    /* To Product Main Structure summary End */
    add_action( 'woocommerce_single_product_summary', 'hongo_product_single_main_summary_structure_extended_descriptions_end', 55 );
    if( ! function_exists ( 'hongo_product_single_main_summary_structure_extended_descriptions_end' ) ) {
        function hongo_product_single_main_summary_structure_extended_descriptions_end(){
                echo '</div>';
        }
    }

    /* To add Tabbing Structure Start */
    add_action( 'woocommerce_after_single_product_summary', 'hongo_single_product_tab_extended_descriptions_wrap_start', 5 );
    if( ! function_exists ( 'hongo_single_product_tab_extended_descriptions_wrap_start' ) ) {
        function hongo_single_product_tab_extended_descriptions_wrap_start() {
                echo '<div class="hongo-single-product-tab-content-extended-descriptions">';
        }
    }

    /* To add Tabbing Structure End */
    add_action( 'woocommerce_after_single_product_summary', 'hongo_single_product_tab_extended_descriptions_wrap_end', 12 );
    if( ! function_exists ( 'hongo_single_product_tab_extended_descriptions_wrap_end' ) ) {
        function hongo_single_product_tab_extended_descriptions_wrap_end() {
                echo '</div>';
        }
    }
    
    // To Add SKU
    add_action( 'hongo_product_meta_left', 'hongo_single_product_sku' );

    // Social Icon
    remove_action( 'hongo_product_meta_right', 'hongo_addons_single_product_meta_share', 10 );
    //add_action( 'hongo_extended_descriptions_content_after', 'hongo_addons_single_product_meta_share', 3 );
    add_action( 'woocommerce_single_product_summary', 'hongo_addons_single_product_meta_share', 40 );

    /* To Product Meta */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 4 );

    /* On / Off setting for Up Sells products */
    $hongo_single_product_enable_up_sells = hongo_option( 'hongo_single_product_enable_up_sells', '1' );
    if( $hongo_single_product_enable_up_sells != 1 ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    }

    /* On / Off setting for related products */
    $hongo_single_product_enable_related = hongo_option( 'hongo_single_product_enable_related', '1' );
    if( $hongo_single_product_enable_related != 1 ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    }

    $hongo_single_product_enable_product_list_tab = hongo_option( 'hongo_single_product_enable_product_list_tab', '' );
    if( $hongo_single_product_enable_product_list_tab == 1 ) {

        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

        // Custom Tabbing (You may like & Related Product) 
        add_action( 'woocommerce_after_single_product_summary', 'hongo_display_different_products_tab', 25 );
    }
}

<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /******************************************* TEMPLATE FUNCTIONS *******************************************/
    
    /* Remove default woocommerce sidebar */
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

    // Category Page Description on / off setting
    $hongo_product_archive_page_enable_description = get_theme_mod( 'hongo_product_archive_page_enable_description', '0' );
    if( $hongo_product_archive_page_enable_description == '0' ) {
        remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
    }

    /* Add New Action For WooCommerce Breadcrumb */
    if ( ! function_exists( 'hongo_woocommerce_breadcrumb' ) ) {
        function hongo_woocommerce_breadcrumb( $args = array() ) {
            $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
                'delimiter'   => '',
                'wrap_before' => '',
                'wrap_after'  => '',
                'before'      => '',
                'after'       => '',
                'home'        => __( 'Home', 'hongo' ),
            ) ) );

            $breadcrumbs = new WC_Breadcrumb();

            if ( ! empty( $args['home'] ) ) {
                $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
            }

            $args['breadcrumb'] = $breadcrumbs->generate();

            /**
             * WooCommerce Breadcrumb hook
             *
             * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
             */
            do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

            wc_get_template( 'global/breadcrumb.php', $args );
        }
    }

    /* To Add empty cart button to empty cart */
    if ( ! function_exists( 'hongo_woocommerce_cart_actions' ) ) {
        function hongo_woocommerce_cart_actions( $args = array() ) {
            
            $cart_url = wc_get_cart_url();
            $cart_url = add_query_arg( array( 'empty-cart' => '1' ), $cart_url );

            $args = wp_parse_args( $args, apply_filters( 'hongo_woocommerce_empty_cart_args', array(
                'cart_url'       => $cart_url,
            ) ) );

            wc_get_template( 'cart/empty-cart-btn.php', $args );
        }
    }

    // Deal Product
    if( ! function_exists( 'hongo_template_loop_product_deal' ) ) {
        function hongo_template_loop_product_deal( $args = array() ) {

            global $product;

            $pricedate_from = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
            $pricedate_to = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );

            if( $product->get_type() == 'variable' && $variations = $product->get_available_variations() ) {

                $pricedate_from = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_from', true );
                $pricedate_to = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_to', true );
            }

            $current_date = current_time( 'timestamp', true );

            if ( $pricedate_to < $current_date || $current_date < $pricedate_from ){
                return;
            }

            wp_enqueue_script( 'product-countdown' );

            if ( $pricedate_to ) {
                $defaults = array(
                    'pricedate_to' => $pricedate_to,
                    'timezone'     => apply_filters( 'hongo_countdown_timezone', false ) ? wc_timezone_string() : 'GMT'
                );

                $args = apply_filters( 'hongo_loop_product_coutdown_args', wp_parse_args( $args, $defaults ), $product );

                wc_get_template( 'loop/product-loop-deal.php', $args );
            }
        }
    }

    // Grid View Slider
    if( ! function_exists( 'hongo_template_loop_product_slider' ) ) {
        function hongo_template_loop_product_slider( $args = array() ) {

            global $product;
            
            $main_image = $product->get_image( 'woocommerce_thumbnail' );

            $hongo_gallery_slide = hongo_get_product_archive_gallery_slide();

            $attachment_ids = $product->get_gallery_image_ids();
            
            $defaults = array(
                'main_image'        => $main_image,
                'gallery_ids'       => $attachment_ids,
                'gallery_slide'     => $hongo_gallery_slide,
            );

            $args = apply_filters( 'hongo_loop_product_slider_args', wp_parse_args( $args, $defaults ), $product );

            wc_get_template( 'loop/product-loop-slider.php', $args );
        }
    }

    /******************************************* HOOK FUNCTIONS *******************************************/

    /**
     * Remove default woocommerce breadcrumb and add new hongo breadcrumb
     *
     * @see hongo_woocommerce_breadcrumb()
     */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'hongo_woocommerce_breadcrumb', 'hongo_woocommerce_breadcrumb', 20, 0 );

    /**
     * To Add empty cart button to empty cart
     *
     * @see hongo_woocommerce_cart_actions()
     */
    add_action( 'woocommerce_cart_actions', 'hongo_woocommerce_cart_actions' );
}

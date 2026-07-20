<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /******************************************* TEMPLATE FUNCTIONS *******************************************/
    
    /* To add product overlay */
    if( ! function_exists( 'hongo_template_loop_product_overlay' ) ) {
        function hongo_template_loop_product_overlay() {

            echo '<div class="product-overlay"></div>';
        }
    }

    /* To add product image wrapper open */
    if( ! function_exists( 'hongo_template_loop_image_wrap_open' ) ) {
        function hongo_template_loop_image_wrap_open( $category ) {

            echo '<div class="product-thumb-box">';
        }
    }

    /* To add product image wrapper close */
    if( ! function_exists( 'hongo_template_loop_image_wrap_close' ) ) {
        function hongo_template_loop_image_wrap_close() {

            echo '</div>';
        }
    }
    
    /* To add product category link open */
    if( ! function_exists( 'hongo_template_loop_category_link_open' ) ) {
        function hongo_template_loop_category_link_open( $category ) {

            echo '<a class="hongo-loop-product-category-link" href="' . esc_url( get_term_link( $category, 'product_cat' ) ) . '">';
        }
    }

    /* To add product category link close */
    if( ! function_exists( 'hongo_template_loop_category_link_close' ) ) {
        function hongo_template_loop_category_link_close() {

            echo '</a>';
        }
    }

    /* To add Price Button Wrap Start*/
    if( ! function_exists( 'hongo_price_button_wrap_start' ) ){
        function hongo_price_button_wrap_start(){
            echo '<div class="hongo-price-button-wrap">';
        }
    }

    /* To add Price Button Wrap End*/
    if( ! function_exists( 'hongo_price_button_wrap_end' ) ){
        function hongo_price_button_wrap_end(){
            echo '</div>';
        }
    }

    /* To Add alternate product image to shop page */
    if ( ! function_exists( 'hongo_template_loop_content_product' ) ) {
        function hongo_template_loop_content_product( $args = array() ) {
            global $product;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $product_buttons_counter = hongo_get_enable_product_archive_buttons_counter();

            $defaults = array(
                'buttons_enable' => $product_buttons_counter > 0 ? true : false,
            );

            $args = apply_filters( 'hongo_loop_content_product_args', wp_parse_args( $args, $defaults ), $product );

            if( ! empty( $product_archive_list_style ) ) {

                wc_get_template( 'content-product/'.$product_archive_list_style.'.php', $args );

            } else {

                wc_get_template( 'content-product/shop-default.php', $args );
            }
        }
    }

    /*To Add overlay div in Metro Layout*/
    if( ! function_exists( 'hongo_template_loop_overlay' ) ) {
        function hongo_template_loop_overlay() {

            echo '<div class="hongo-overlay"></div>';
        }
    }

    /* To Add alternate product image to shop page */
    if ( ! function_exists( 'hongo_template_loop_alternate_product_image' ) ) {
        function hongo_template_loop_alternate_product_image() {
            global $post;

            $hongo_product_archive_enable_alternate_image = hongo_get_product_archive_enable_alternate_image();
            if( $hongo_product_archive_enable_alternate_image != '1' ) {
                return false;
            }
            
            $alternate_img_id = get_post_meta( $post->ID, '_hongo_product_alternate_image', true );
            if( empty( $alternate_img_id ) ) {
                return;
            }

            $image_size = apply_filters( 'hongo_loop_alternate_product_thumbnail_size', 'woocommerce_thumbnail' );

            $attr = array( 'class' => "hongo-alternate-image attachment-$image_size size-$image_size" );

            $image = wp_get_attachment_image( $alternate_img_id, $image_size, '', $attr );

            echo apply_filters( 'hongo_loop_get_alternate_product_image', $image, $image_size, $attr );
        }
    }

    /* To add product category description functionality to shop page */
    if( ! function_exists( 'hongo_template_taxonomy_archive_description' ) ) {
        function hongo_template_taxonomy_archive_description( $term ) {

            $hongo_product_archive_enable_short_desc = hongo_get_product_archive_enable_short_desc();
            if( $hongo_product_archive_enable_short_desc != '1' ) {
                return false;
            }
            
            if ( $term && ! empty( $term->description ) ) {
                echo '<div class="term-description">' . wc_format_content( $term->description ) . '</div>'; // WPCS: XSS ok.
            }
        }
    }
    
    /* To add short description functionality to shop page */
    if ( ! function_exists( 'hongo_template_loop_short_description' ) ) {
        function hongo_template_loop_short_description( $args = array() ) {
            global $product;

            $hongo_product_archive_enable_short_desc = hongo_get_product_archive_enable_short_desc();
            if( $hongo_product_archive_enable_short_desc != '1' ) {
                return false;
            }
            
            if ( $product ) {
                $defaults = array(
                    'class' => implode( ' ', array_filter( array(
                            'product_type_' . $product->get_type(),
                            'hongo-short-description',
                    ) ) ),
                );

                $args = apply_filters( 'hongo_loop_product_short_description_args', wp_parse_args( $args, $defaults ), $product );

                wc_get_template( 'loop/short-description.php', $args );
            }
        }
    }

    /**
     * Customise variable add to cart button for loop.
     *
     * Remove qty selector and simplify.
     */
    if ( ! function_exists( 'hongo_loop_list_style_variation_add_to_cart_button' ) ) {
        function hongo_loop_list_style_variation_add_to_cart_button() {
            global $product;

            $product_buttons_counter = hongo_get_enable_product_archive_buttons_counter();
            $hongo_product_archive_enable_add_to_cart = hongo_get_product_archive_enable_add_to_cart();
            
            if ( $product->is_type( 'variable' ) && ( $hongo_product_archive_enable_add_to_cart == 1 || $product_buttons_counter > 0 ) ) {
            
                echo '<div class="woocommerce-variation-add-to-cart variations_button">';
                    if ( $hongo_product_archive_enable_add_to_cart == 1 ) {
                        echo '<button type="submit" class="single_add_to_cart_button button">';
                            echo '<i class="'.hongo_get_product_button_icon() .'" title="'.esc_attr( $product->single_add_to_cart_text() ) .'"></i>';
                            echo '<span class="add-to-cart-text button-text">'.esc_html( $product->single_add_to_cart_text() ) .'</span>';
                        echo '</button>';
                        echo '<input type="hidden" name="add-to-cart" value="'. absint( $product->get_id() ) .'" />';
                        echo '<input type="hidden" name="product_id" value="'. absint( $product->get_id() ) .'" />';
                        echo '<input type="hidden" name="variation_id" class="variation_id" value="0" />';
                    }
                    if ( $product_buttons_counter > 0 ) {
                        echo '<div class="product-buttons-wrap" data-tooltip-position="'.hongo_get_tooltip_position().'">';

                            /*
                             * hongo_shop_loop_button hook.
                            */
                            do_action( 'hongo_shop_loop_button' );

                        echo '</div><!-- .product-buttons-wrap -->';
                    }
                echo '</div>';
            }
        }
    }

    /******************************************* HOOK FUNCTIONS *******************************************/

    /**
     * Display loop product with different style
     *
     * @see hongo_template_loop_content_product()
     */
    add_action( 'hongo_shop_loop_content_product', 'hongo_template_loop_content_product' );
}

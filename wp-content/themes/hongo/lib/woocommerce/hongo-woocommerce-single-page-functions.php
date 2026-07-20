<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    if ( ! function_exists( 'hongo_override_single_product_flexslider_enabled' ) ) {
        function hongo_override_single_product_flexslider_enabled() {

            return false;
        }
    }

    /* WordPress wp Action */
    add_action( 'wp', 'hongo_single_page_initial_hook' );
    if ( ! function_exists( 'hongo_single_page_initial_hook' ) ) {
        function hongo_single_page_initial_hook() {

            if ( ! is_admin() ) {

                $hongo_get_single_content_product_style = hongo_get_single_content_product_style();
                if( ! empty( $hongo_get_single_content_product_style ) ) {

                    switch ( $hongo_get_single_content_product_style ) {

                        case 'single-product-right-content' :
                        case 'single-product-carousel' :
                        case 'single-product-left-content' :
                        case 'single-product-sticky' :
                            // To remove Image Slider
                            remove_theme_support( 'wc-product-gallery-slider' );
                            break;
                        case 'single-product-default' :
                        case 'single-product-classic' :
                        case 'single-product-modern' :
                        case 'single-product-extended-descriptions' :
                            $hongo_single_product_page_enable_slider = hongo_option( 'hongo_single_product_page_enable_slider', '1' );
                            if( $hongo_single_product_page_enable_slider ) {

                                // Remove Image Gallery slider
                                remove_theme_support( 'wc-product-gallery-slider' );
                                add_filter( 'woocommerce_single_product_flexslider_enabled', 'hongo_override_single_product_flexslider_enabled', 999 );
                            }
                            break;
                    }
                }
            }
        }
    }

    /* WordPress woocommerce_before_main_content Action */
    add_action( 'woocommerce_before_main_content', 'hongo_woocommerce_before_main_content_callback' );
    if ( ! function_exists( 'hongo_woocommerce_before_main_content_callback' ) ) {
        function hongo_woocommerce_before_main_content_callback() {

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
                        case 'single-product-modern' :
                        case 'single-product-extended-descriptions' :

                            require get_parent_theme_file_path( "/lib/woocommerce/single-page-functions/{$hongo_get_single_content_product_style}-functions.php" );
                            break;

                        case 'single-product-default':
                        default:
                        
                            require get_parent_theme_file_path( "/lib/woocommerce/single-page-functions/single-product-default-functions.php" );
                            break;
                    }
                }
            }
        }
    }
    
    /*Add product per page & no. of column for related and up to sell products*/
    add_filter( 'woocommerce_output_related_products_args', 'hongo_override_woocommerce_output_product_list_args', 99 );
    add_filter( 'woocommerce_upsell_display_args', 'hongo_override_woocommerce_output_product_list_args', 99 );

    if ( ! function_exists( 'hongo_override_woocommerce_output_product_list_args' ) ) {
        function hongo_override_woocommerce_output_product_list_args( $args ) {
            
            $hongo_single_product_no_of_products_list = hongo_option( 'hongo_single_product_no_of_products_list', '4' );
            $hongo_single_product_no_of_columns_list  = hongo_option( 'hongo_single_product_no_of_columns_list', '4' );

            if( ! empty( $hongo_single_product_no_of_products_list ) ) {
                $args['posts_per_page'] = esc_attr( $hongo_single_product_no_of_products_list );
            }
            if( ! empty( $hongo_single_product_no_of_columns_list ) ) {
                $args['columns'] = esc_attr( $hongo_single_product_no_of_columns_list );
            }
            
            /* To filter Product lists column */
            $args['columns'] = apply_filters( 'hongo_product_lists_column', $args['columns'] );

            return $args;
        }
    }

    /* Start Wrap for single product top content section */
    if( ! function_exists( 'hongo_single_product_top_content_wrap_start' ) ) {
        function hongo_single_product_top_content_wrap_start() {
            global $post, $product;
            echo '<div class="summary-main-title">';
                echo '<div class="summary-main-title-left">';
        }
    }

    /* Single Product Brand Display */
    if( !function_exists( 'hongo_single_product_brand' ) ) {
        function hongo_single_product_brand() {
            global $post;
            $product_brands = wc_get_product_terms( $post->ID, 'product_brand', array( 'orderby' => 'parent' ) );
            $hongo_single_product_page_enable_brand_image = hongo_option( 'hongo_single_product_page_enable_brand_image', '0' );

            if( ! empty( $product_brands ) ) {
                echo '<ul class="single-product-brand-wrap">';
                foreach( $product_brands as $product_brand ) {
                    if( $hongo_single_product_page_enable_brand_image == 1 ) {
                        $thumbnail_id = get_term_meta( $product_brand->term_id, 'logo_id', true );
                        $images = wp_get_attachment_url( $thumbnail_id );
                        echo '<li><a href="'.esc_url( get_term_link( $product_brand->term_id ) ).'"><img src="'. esc_url( $images ) .'" alt="'. esc_attr( $product_brand->name ) .'"></a></li>';
                    } else {
                        echo '<li><a class="alt-font" href="'.esc_url( get_term_link( $product_brand->term_id ) ).'">'. esc_html( $product_brand->name ) .'</a></li>';
                    }
                }
                echo '</ul>';
            }
        }
    }

    /* Middle Wrap for single product top content section */
    if( ! function_exists( 'hongo_single_product_top_content_wrap_middle' ) ) {
        function hongo_single_product_top_content_wrap_middle() {
                echo '</div>';
                echo '<div class="summary-main-title-right">';
        }
    }

    /* End Wrap for single product top content section */
    if( ! function_exists( 'hongo_single_product_top_content_wrap_end' ) ) {
        function hongo_single_product_top_content_wrap_end() {
                echo '</div>';
            echo '</div>';
        }
    }

    /* Display accordion style for WooCommerce product tabs */
    if( ! function_exists ( 'hongo_single_product_tabs_accordion' ) ) {
        function hongo_single_product_tabs_accordion() {
            
            $tabs = apply_filters( 'woocommerce_product_tabs', array() );

            if ( ! empty( $tabs ) ) {

                echo '<div id="hongo-accordion" class="hongo-accordion">';
                    echo '<ul class="hongo-accordion-section" role="tablist">';
                        $i = 1;
                        foreach ( $tabs as $key => $tab ) {
                            
                            echo '<li class="'.esc_attr( $key ).'_tab" id="tab-title-'.esc_attr( $key ).'" role="tab" aria-controls="tab-'.esc_attr( $key ).'">';
                                echo '<a class= "hongo-accordion-section-title alt-font" href="#tab-'.esc_attr( $key ).'">';
                                    echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key );
                                    echo '<span><i class="ti-plus"></i></span>';
                                echo '</a>';

                                echo '<div class="hongo-accordion-section-content woocommerce-Tabs-panel woocommerce-Tabs-panel--'. esc_attr( $key ).' panel entry-content" id="tab-'. esc_attr( $key ).'" role="tabpanel" aria-labelledby="tab-title-'.esc_attr( $key ).'">';
                                    if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); }
                                echo '</div>';
                            echo '</li>';
                            $i++;

                        }
                    echo '</ul>';
                echo '</div>';
            }
        }   
    }    

    // To Add Sticky style display thumbnails
    if( ! function_exists( 'hongo_single_product_sticky_thumbnails' ) ) {
        function hongo_single_product_sticky_thumbnails() {
            global $product, $post;
            $attachment_ids = $product->get_gallery_image_ids();
            if( ! empty( $attachment_ids ) ) {
                echo '<div class="hongo-single-product-sticky-thumb-wrap" data-sticky_column>';
                    echo '<ul>';
                        $attachment_id     = get_post_thumbnail_id( $post->ID );
                        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
                        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
                        $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
                        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
                        $i = 0;

                        if( ! empty( $thumbnail_src[0] ) ) {
                            $image = sprintf( '<a href="javascript:void(0)" data-image-attribute="'.esc_attr( $i ).'"><img src="%s" alt="%s" class="wp-post-image" /></a>', esc_url( $thumbnail_src[0] ), get_post_field( 'post_title', $attachment_id ) );
                        } else {
                            $image = sprintf( '<a href="javascript:void(0)" data-image-attribute="'.esc_attr( $i ).'"><img src="%s" alt="%s" class="wp-post-image" /></a>', esc_url( wc_placeholder_img_src() ), esc_attr__( 'Awaiting product image', 'hongo' ) );
                        }

                        // Main Image
                        echo sprintf( '<li>%s</li>', $image );
                        $j = 1;
                        foreach ( $attachment_ids as $attachment_id ) {
                            
                            $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
                            $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
                            $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
                            $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );

                            if( ! empty( $thumbnail_src[0] ) ) {
                                $image = sprintf( '<a href="javascript:void(0)" data-image-attribute="'.esc_attr( $j ).'"><img src="%s" alt="%s" /></a>', esc_url( $thumbnail_src[0] ), get_post_field( 'post_title', $attachment_id ) );
                            } else {
                                $image = sprintf( '<a href="javascript:void(0)" data-image-attribute="'.esc_attr( $j ).'"><img src="%s" alt="%s" /></a>', esc_url( wc_placeholder_img_src() ), esc_attr__( 'Awaiting product image', 'hongo' ) );
                            }
                            $j++;

                            // Gallery Image
                            echo sprintf( '<li>%s</li>', $image );
                        }
                    echo '</ul>';
                echo '</div>';
            }
        }
    }

    /* WordPress Product Rich Snippet Code */
    add_action( 'woocommerce_before_single_product_summary', 'hongo_override_woocommerce_before_single_product_summary' );
    add_action( 'woocommerce_after_shop_loop_item', 'hongo_override_woocommerce_before_single_product_summary', 999 );
    if ( ! function_exists( 'hongo_override_woocommerce_before_single_product_summary' ) ) {
        function hongo_override_woocommerce_before_single_product_summary() {

            $author_post_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
            $hongo_single_product_rich_snippet         = hongo_option( 'hongo_single_product_rich_snippet', '1' );
              
            if ( 1 == $hongo_single_product_rich_snippet ) {
                echo '<div class="hongo-rich-snippet display-none">';
                    echo '<span class="entry-title">' . esc_html( get_the_title() ) . '</span>';
                    echo '<span class="author vcard"><a class="url fn n" href=' . esc_url( $author_post_url ) . '>' . esc_html( get_the_author() ) . '</a></span>';
                    echo '<span class="published">' . esc_html( get_the_date() ) . '</span><time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';
                echo '</div>';
            }
        }
    }
    
    // Remove animation
    if( ! function_exists( 'hongo_product_archive_animation' ) ) {
        function hongo_product_archive_animation( $animation ) {

            $animation = '';

            return $animation;
        }
    }
}

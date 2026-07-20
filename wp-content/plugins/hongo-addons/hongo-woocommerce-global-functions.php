<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    /* To get Product archive column */
    if( ! function_exists( 'hongo_get_product_archive_column' ) ) {
        function hongo_get_product_archive_column() {

            $archive_page_column = get_theme_mod( 'hongo_product_archive_page_column', '4' );

            /* To filter Product lists column */
            return apply_filters( 'hongo_product_lists_column', $archive_page_column );
        }
    }

    /* To get Product archive list style */
    if( ! function_exists( 'hongo_get_product_archive_list_style' ) ) {
        function hongo_get_product_archive_list_style() {

            $shop_style = get_theme_mod( 'hongo_product_archive_premade_style', 'shop-standard' );

            return apply_filters( 'hongo_product_archive_style', $shop_style );
        }
    }

    /* To get Single content product style */
    if( ! function_exists( 'hongo_get_single_content_product_style' ) ) {
        function hongo_get_single_content_product_style() {

            $product_page_style = hongo_option( 'hongo_product_single_premade_style', 'single-product-classic' );

            return apply_filters( 'hongo_product_single_style', $product_page_style );
        }
    }

    /* To get Product archive enable metro */
    if( ! function_exists( 'hongo_get_product_archive_enable_metro' ) ) {
        function hongo_get_product_archive_enable_metro() {

            $enable_metro = hongo_option( 'hongo_product_archive_page_enable_metro', '1' );

            return apply_filters( 'hongo_product_archive_page_enable_metro', $enable_metro );
        }
    }

    /* To get Product archive enable metro position */
    if( ! function_exists( 'hongo_get_product_archive_metro_position' ) ) {
        function hongo_get_product_archive_metro_position() {

            $metro_position = hongo_option( 'hongo_product_archive_page_double_grid_position', '*,*,2-2,2-1,2-2,1-2' );

            return apply_filters( 'hongo_product_archive_page_double_grid_position', $metro_position );
        }
    }

    /* To get Product archive enable Sale Box */
    if( ! function_exists( 'hongo_get_product_archive_enable_sale_box' ) ) {
        function hongo_get_product_archive_enable_sale_box() {

            $enable_sale_box = hongo_option( 'hongo_product_archive_enable_sale_box', '1' );

            return apply_filters( 'hongo_product_archive_enable_sale_box', $enable_sale_box );
        }
    }

    /* To get Product archive enable New Box */
    if( ! function_exists( 'hongo_get_product_archive_enable_new_box' ) ) {
        function hongo_get_product_archive_enable_new_box() {

            $enable_new_box = hongo_option( 'hongo_product_archive_enable_new_box', '1' );

            return apply_filters( 'hongo_product_archive_enable_new_box', $enable_new_box );
        }
    }

    /* To get Product archive enable star rating */
    if( ! function_exists( 'hongo_get_product_archive_enable_star_rating' ) ) {
        function hongo_get_product_archive_enable_star_rating() {

            $enable_star_rating = hongo_option( 'hongo_product_archive_enable_star_rating', '' );

            return apply_filters( 'hongo_product_archive_enable_star_rating', $enable_star_rating );
        }
    }

    /* To get Product archive enable alternate image */
    if( ! function_exists( 'hongo_get_product_archive_enable_alternate_image' ) ) {
        function hongo_get_product_archive_enable_alternate_image() {

            $enable_alternate_image = hongo_option( 'hongo_product_archive_enable_alternate_image', '1' );

            return apply_filters( 'hongo_product_archive_enable_alternate_image', $enable_alternate_image );
        }
    }

    /* To get Product archive enable alternate image */
    if( ! function_exists( 'hongo_get_product_archive_enable_add_to_cart' ) ) {
        function hongo_get_product_archive_enable_add_to_cart() {

            $enable_add_to_cart = hongo_option( 'hongo_product_archive_enable_add_to_cart', '1' );

            return apply_filters( 'hongo_product_archive_enable_add_to_cart', $enable_add_to_cart );
        }
    }

    /* To get Product archive enable quick view */
    if( ! function_exists( 'hongo_get_product_archive_enable_quick_view' ) ) {
        function hongo_get_product_archive_enable_quick_view() {

            $enable_quick_view = hongo_option( 'hongo_product_archive_enable_quick_view', '1' );

            return apply_filters( 'hongo_product_archive_enable_quick_view', $enable_quick_view );
        }
    }

    /* To get Product archive enable wishlist */
    if( ! function_exists( 'hongo_get_product_archive_enable_wishlist' ) ) {
        function hongo_get_product_archive_enable_wishlist() {

            $enable_wishlist = hongo_option( 'hongo_product_archive_enable_wishlist', '1' );

            return apply_filters( 'hongo_product_archive_enable_wishlist', $enable_wishlist );
        }
    }

    /* To get Product archive enable compare */
    if( ! function_exists( 'hongo_get_product_archive_enable_compare' ) ) {
        function hongo_get_product_archive_enable_compare() {

            $enable_compare = hongo_option( 'hongo_product_archive_enable_compare', '0' );

            return apply_filters( 'hongo_product_archive_enable_compare', $enable_compare );
        }
    }
    
    /* To get Product archive gutter type */
    if( ! function_exists( 'hongo_get_product_archive_gutter_type' ) ) {
        function hongo_get_product_archive_gutter_type() {

            if ( is_cart() ) {

                $gutter_type = get_theme_mod( 'hongo_single_product_cross_sells_gutter', 'gutter-small' );

            } else {

                $gutter_type = hongo_option( 'hongo_product_archive_gutter', 'gutter-small' );
            }

            return apply_filters( 'hongo_product_archive_gutter', $gutter_type );
        }
    }

    /* To get Product archive gutter size */
    if( ! function_exists( 'hongo_get_product_slider_gutter_size' ) ) {
        function hongo_get_product_slider_gutter_size( $gutter_type = 'gutter-medium' ) {

            if( ! empty( $gutter_type ) ) {
                switch ( $gutter_type ) {
                    case 'gutter-none':
                        
                        $gutter_size = '0';
                        break;
                    
                    case 'gutter-very-small':
                        
                        $gutter_size = '10';
                        break;
                    
                    case 'gutter-small':
                        
                        $gutter_size = '20';
                        break;
                    
                    case 'gutter-medium':
                        
                        $gutter_size = '30';
                        break;
                    
                    case 'gutter-large':
                        
                        $gutter_size = '40';
                        break;
                    
                    case 'gutter-extra-large':
                        
                        $gutter_size = '50';
                        break;
                    
                    default:
                        
                        $gutter_size = '30';
                        break;
                }

            } else {

                $gutter_size = '0';
            }

            return apply_filters( 'hongo_product_archive_gutter_size', $gutter_size );
        }
    }

    /* To get Product archive enable Short Description */
    if( ! function_exists( 'hongo_get_product_archive_enable_short_desc' ) ) {
        function hongo_get_product_archive_enable_short_desc() {

            $enable_short_desc = hongo_option( 'hongo_product_archive_enable_short_desc', '1' );

            return apply_filters( 'hongo_product_archive_enable_short_desc', $enable_short_desc );
        }
    }

    /* To get Product archive enable shop pagination */
    if( ! function_exists( 'hongo_get_product_archive_enable_shop_pagination' ) ) {
        function hongo_get_product_archive_enable_shop_pagination() {

            $enable_shop_pagination = hongo_option( 'hongo_product_archive_enable_pagination', '1' );

            return apply_filters( 'hongo_product_archive_enable_pagination', $enable_shop_pagination );
        }
    }

    /* To get Product archive shop pagination style */
    if( ! function_exists( 'hongo_get_product_archive_shop_pagination_style' ) ) {
        function hongo_get_product_archive_shop_pagination_style() {

            $shop_pagination_style = hongo_option( 'hongo_product_archive_product_pagination_style', 'pagination' );

            return apply_filters( 'hongo_product_archive_product_pagination_style', $shop_pagination_style );
        }
    }

    /* To get Single Product enable sticky add to cart */
    if( ! function_exists( 'hongo_get_single_product_enable_sticky_add_to_cart' ) ) {
        function hongo_get_single_product_enable_sticky_add_to_cart() {

            $enable_sticky_add_to_cart = hongo_option( 'hongo_single_product_enable_sticky_add_to_cart', '0' );

            return apply_filters( 'hongo_single_product_enable_sticky_add_to_cart', $enable_sticky_add_to_cart );
        }
    }

    /* To get Product Single Product enable compare */
    if( ! function_exists( 'hongo_get_single_product_enable_compare' ) ) {
        function hongo_get_single_product_enable_compare() {

            $enable_compare = hongo_option( 'hongo_single_product_enable_compare', '1' );

            return apply_filters( 'hongo_single_product_enable_compare', $enable_compare );
        }
    }

    /* To check enable product archive buttons counter */
    if( ! function_exists( 'hongo_get_enable_product_archive_buttons_counter' ) ) :
        function hongo_get_enable_product_archive_buttons_counter() {

            $counter = 0;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $hongo_product_archive_enable_add_to_cart   = hongo_get_product_archive_enable_add_to_cart();            
            $hongo_product_archive_enable_wishlist      = hongo_get_product_archive_enable_wishlist();

            if( $hongo_product_archive_enable_add_to_cart == '1' && ! ( $product_archive_list_style == 'shop-list' || $product_archive_list_style == 'shop-default'  ) ) {
                $counter++;
            }
            if( $hongo_product_archive_enable_wishlist == '1' && ( $product_archive_list_style != 'shop-standard' ) ) {
                $counter++;
            }

            return apply_filters( 'hongo_product_archive_buttons_counter', $counter, $product_archive_list_style );
        }
    endif;

    /* To get Product wishlist */
    if( ! function_exists( 'hongo_addons_get_product_wishlist' ) ) {
        function hongo_addons_get_product_wishlist() {

            if( is_user_logged_in() ) {
                
                $user_id    = get_current_user_id();
                $data       = get_user_meta( $user_id, '_hongo_wishlist', true );

            } else {
                $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
                $cookie_name = 'hongo-wishlist'.$siteid;
                $data = ! empty( $_COOKIE[ $cookie_name ] ) ? $_COOKIE[ $cookie_name ] : '';
            }

            $data = ! empty( $data ) ? explode( ',', $data ) : array();           
            return $data;
        }
    }

    /* To set Product wishlist */
    if( ! function_exists( 'hongo_addons_set_product_wishlist' ) ) {
        function hongo_addons_set_product_wishlist( $wishlistid ) {

            if( ! empty( $wishlistid ) ) {

                // Get user wishlist data
                $data = hongo_addons_get_product_wishlist();
                
                if( ! empty( $data ) ) {

                    if( !in_array( $wishlistid, $data ) ) {

                        $data[] = $wishlistid;
                    }

                } else {

                    $data[] = $wishlistid;
                }

                $data = ! empty( $data ) ? implode( ',', $data ) : '';

                if( is_user_logged_in() ) {
                    
                    $user_id = get_current_user_id();
                    
                    // Update user wishlist data
                    update_user_meta( $user_id, '_hongo_wishlist', $data );

                } else {

                    // Update cookie wishlist data
                    $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
                    $cookie_name = 'hongo-wishlist'.$siteid;
                    setcookie( $cookie_name, $data, 0, "/" );
                }                

                return $data;
            }
        }
    }

    if( ! function_exists( 'hongo_addons_wishlist_widget_data' ) ){
        function hongo_addons_wishlist_widget_data( $data ){
                        
            $data = ! empty( $data ) ? explode( ',', $data ) : array();            

            $output = '';
            if( ! empty( $data ) ) {      
                
                do_action( 'hongo_wishlist_refresh_details', $data );

            } else{
        
                $output .= '<p class="no-product-wishlist alt-font"><i class="icon-heart base-color"></i>';
                    $output .= esc_html__( 'Your wishlist is currently empty.', 'hongo-addons' );
                $output .= '</p>';
            }

            echo wp_kses_post ( $output );

        }
    }

    /* To remove Product wishlist */
    if( ! function_exists( 'hongo_addons_remove_product_wishlist' ) ) {
        function hongo_addons_remove_product_wishlist( $wishlistids ) {

            if( ! empty( $wishlistids ) && is_array( $wishlistids ) ) {

                // Get user wishlist data
                $data = hongo_addons_get_product_wishlist();
                
                if( ! empty( $data ) ) {

                    foreach( $wishlistids as $wishlistid ) {

                        if( in_array( $wishlistid, $data ) ) {

                            $pos = array_search( $wishlistid, $data );
                            unset( $data[ $pos ] );
                        }
                    }
                }

                $data = ! empty( $data ) ? implode( ',', $data ) : '';

                if( is_user_logged_in() ) {
                    
                    $user_id = get_current_user_id();
                    
                    // Update user wishlist data
                    update_user_meta( $user_id, '_hongo_wishlist', $data );

                } else {

                    // Update cookie wishlist data
                    $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
                    $cookie_name = 'hongo-wishlist'.$siteid;
                    setcookie( $cookie_name, $data, 0, "/" );                
                }

                return $data;
            }
        }
    }

    // Wishlist Widget Refresh
    if( ! function_exists( 'hongo_addons_wishlist_page_data' ) ) {
        function hongo_addons_wishlist_page_data( $data ){

            $data = ! empty( $data ) ? explode( ',', $data ) : array();

            // Page Refresh After delete wishlist item
            $output = '';

            if( ! empty( $data ) ) {

                    do_action( 'hongo_addons_wishlist_data', $data );

            } else {
                
                $defaults = array( 'data' => $data );
                ob_start();
                    
                    hongo_addons_get_template( 'wishlist/product-wishlist.php', $defaults );
                
                $output = ob_get_contents();
                ob_end_clean();

            }

            echo wp_kses_post ( $output );
        }
    }

    // is_hongo_wishlist - Returns true when viewing the wishlist page.

    if( ! function_exists( 'is_hongo_wishlist' ) ) {
        function is_hongo_wishlist() {

            $page_id = get_option( 'woocommerce_wishlist_page_id' );

            // wc_post_content_has_shortcode called if Woocommerce active.
            return ( $page_id && is_page( $page_id ) ) || wc_post_content_has_shortcode( 'hongo-wishlist' );
        }
    }
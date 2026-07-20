<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    // To check enable product archive buttons counter

    if( ! function_exists( 'hongo_addons_product_archive_buttons_counter' ) ) {
        function hongo_addons_product_archive_buttons_counter( $counter, $archive_list_style ) {

            $hongo_product_archive_enable_compare       = hongo_get_product_archive_enable_compare();
            $hongo_product_archive_enable_quick_view    = hongo_get_product_archive_enable_quick_view();
            $hongo_product_archive_enable_wishlist      = hongo_get_product_archive_enable_wishlist();

            // Compare
            if( $hongo_product_archive_enable_compare == '1' && ( $archive_list_style != 'shop-standard' ) ) {
                $counter = $counter + 1;
            }

            // Quick View
            if( $hongo_product_archive_enable_quick_view == '1' ) {
                $counter = $counter + 1;
            } elseif( $archive_list_style == 'shop-simple' ) {
                return false;
            }

            // Wishlist
            if( $hongo_product_archive_enable_wishlist == '1' && ( $archive_list_style != 'shop-standard' ) ) {
                $counter = $counter + 1;
            }

            return $counter;
        }
    }
    add_filter( 'hongo_product_archive_buttons_counter', 'hongo_addons_product_archive_buttons_counter', 10, 2 );

    /**
     * Added my accounts icons which are displayed in my account page
     *
     * @since 1.1.3
     */
    if ( ! function_exists( 'hongo_addons_my_account_endpoint_icons' ) ) {
        function hongo_addons_my_account_endpoint_icons( $endpoint_icons ) {

            $new_icons = array(
                                'dashboard'         => 'ti-user',
                                'orders'            => 'ti-package',
                                'downloads'         => 'ti-download',
                                'edit-address'      => 'ti-map-alt',
                                'edit-account'      => 'ti-write',
                                'hongo-wishlist'    => 'ti-heart',
                                'customer-logout'   => 'ti-power-off',
                            );

            $endpoint_icons = array_merge( $new_icons, $endpoint_icons );

            return $endpoint_icons;
        }
    }
    add_filter ( 'hongo_my_account_endpoint_icons', 'hongo_addons_my_account_endpoint_icons' );

    /**
     * Added wishlist link in my account page
     *
     * @since 1.1.3
     */
    if ( ! function_exists( 'hongo_addons_my_account_menu_items' ) ) {
        function hongo_addons_my_account_menu_items( $menu_links ) {

            $hongo_wishlist_id =  get_option('woocommerce_wishlist_page_id');
            if( ! empty( $hongo_wishlist_id ) ) {

                $wishlist_link = array( 
                                        'hongo-wishlist' => __( 'Wishlist', 'hongo-addons' )
                                    );

                $first_menu_links   = array_slice( $menu_links, 0, 5, true );
                $last_menu_links    = array_slice( $menu_links, 5, NULL, true );

                $menu_links = array_merge( $first_menu_links, $wishlist_link, $last_menu_links );
            }
            return $menu_links;     
        }
    }
    add_filter ( 'woocommerce_account_menu_items', 'hongo_addons_my_account_menu_items' );

    /**
     * Added wishlist link in my account page
     *
     * @since 1.1.3
     */
    if ( ! function_exists( 'hongo_addons_my_account_wishlist_endpoint_url' ) ) {
        function hongo_addons_my_account_wishlist_endpoint_url( $url, $endpoint, $value, $permalink ){
 
            $hongo_wishlist_id =  get_option('woocommerce_wishlist_page_id');
            if( ! empty( $hongo_wishlist_id ) && $endpoint === 'hongo-wishlist' ) {
         
                $url = get_permalink( $hongo_wishlist_id );
            }
            return $url;
        }
    }
    add_filter( 'woocommerce_get_endpoint_url', 'hongo_addons_my_account_wishlist_endpoint_url', 10, 4 );

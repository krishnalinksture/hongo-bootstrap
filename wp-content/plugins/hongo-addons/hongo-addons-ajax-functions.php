<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

// AJAX To Add compare product functionality 
if ( ! function_exists( 'hongo_addons_ajax_compare_details' ) ) {
    function hongo_addons_ajax_compare_details( $args = array() ) {
            
        $output = '';
        $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
        $cookie_name = 'hongo-compare'.$siteid;
        $cookie     = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
        $productids = ! empty( $cookie ) ? explode(",", $cookie) : array();

        if( ! empty( $productids ) ) {

            ob_start();

                // Display compare details
                do_action( 'hongo_compare_details', $productids );

            $output .= ob_get_contents();
            ob_end_clean();

            echo sprintf( '%s', $output );
            die();
        }
    }
}
add_action( 'wp_ajax_compare_details', 'hongo_addons_ajax_compare_details' );
add_action( 'wp_ajax_nopriv_compare_details', 'hongo_addons_ajax_compare_details' );

// AJAX To Add quick view product functionality 
if ( ! function_exists( 'hongo_addons_ajax_quick_view_product_details' ) ) {
    function hongo_addons_ajax_quick_view_product_details( $args = array() ) {
            
        $output = '';

        $productid = ! empty( $_POST['productid'] ) ? $_POST['productid'] : '';

        if( ! empty( $productid ) ) {

            ob_start();

                // Display quick view product details
                do_action( 'hongo_quick_view_product_details', $productid );

            $output .= ob_get_contents();
            ob_end_clean();

            echo sprintf( '%s', $output );
            die();
        }
    }
}
add_action( 'wp_ajax_quick_view_product_details', 'hongo_addons_ajax_quick_view_product_details' );
add_action( 'wp_ajax_nopriv_quick_view_product_details', 'hongo_addons_ajax_quick_view_product_details' );

// Ajax To Add Wishlist product Functionality 
if ( ! function_exists( 'hongo_addons_add_wishlist' ) ) {

    function hongo_addons_add_wishlist() {
        
        $wishlistid = ! empty( $_POST['wishlistid'] ) ? $_POST['wishlistid'] : '';
        
        if( ! empty( $wishlistid ) ) {

            // To set Product wishlist
            $data = hongo_addons_set_product_wishlist( $wishlistid );
            // Wishlist page data
            hongo_addons_wishlist_widget_data( $data );
        }
        die();
    }
}
add_action('wp_ajax_hongo_addons_add_wishlist', 'hongo_addons_add_wishlist');
add_action('wp_ajax_nopriv_hongo_addons_add_wishlist', 'hongo_addons_add_wishlist');

// Remove product in remove from wishlist
if ( ! function_exists( 'hongo_addons_remove_wishlist' ) ) {

    function hongo_addons_remove_wishlist(){  
        $removeid = ! empty( $_POST['removeid'] ) ? $_POST['removeid'] : '';
        if( ! empty( $removeid ) ) {

            $removeid = explode( ',', $removeid );

            // Remove Wishlist Data
            $data = hongo_addons_remove_product_wishlist( $removeid );
            // Wishlist page data            
            hongo_addons_wishlist_widget_data( $data );
        }
        die();
    }
}

add_action('wp_ajax_hongo_addons_remove_wishlist', 'hongo_addons_remove_wishlist');
add_action('wp_ajax_nopriv_hongo_addons_remove_wishlist', 'hongo_addons_remove_wishlist');

// Remove product in Wishlist page 
if ( ! function_exists( 'hongo_addons_page_remove_wishlist' ) ) {

    function hongo_addons_page_remove_wishlist(){  
        $removeid = ! empty( $_POST['removeids'] ) ? $_POST['removeids'] : '';
        if( ! empty( $removeid ) ) {

            $removeid = explode( ',', $removeid );

            // Remove Wishlist Data
            $data = hongo_addons_remove_product_wishlist( $removeid );
            
            hongo_addons_wishlist_page_data( $data );
        }
        die();
    }
}

add_action( 'wp_ajax_hongo_addons_page_remove_wishlist', 'hongo_addons_page_remove_wishlist' );
add_action( 'wp_ajax_nopriv_hongo_addons_page_remove_wishlist', 'hongo_addons_page_remove_wishlist' );

// All selected add cart ajax callback function
if ( ! function_exists( 'hongo_addons_empty_wishlist_all' ) ) {

    function hongo_addons_empty_wishlist_all() {

        $output = '';
        if( is_user_logged_in() ) {

            $user_id = get_current_user_id();
            update_user_meta( $user_id, '_hongo_wishlist', '' );

        } else {
            
            $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
            $cookie_name = 'hongo-wishlist'.$siteid;
            setcookie( $cookie_name, '', -1, '/' );
        }        

        $data = array();
        $defaults = array( 'data' => $data );
        ob_start();
            
            hongo_addons_get_template( 'wishlist/product-wishlist.php', $defaults );
        
        $output = ob_get_contents();
        ob_end_clean();

        echo sprintf( '%s', $output );
        die();
    }
}
add_action('wp_ajax_hongo_addons_empty_wishlist_all', 'hongo_addons_empty_wishlist_all');
add_action('wp_ajax_nopriv_hongo_addons_empty_wishlist_all', 'hongo_addons_empty_wishlist_all');

// Ajax get post id from url
if ( ! function_exists( 'hongo_addons_get_postid_from_url' ) ) {

    function hongo_addons_get_postid_from_url() {
        $postid = '';
        $post_url = ! empty( $_POST['post_url'] ) ? $_POST['post_url'] : '';
        
        if( ! empty( $post_url ) ) {
            $postid = url_to_postid( $post_url );
        }
        echo $postid;
        die();
    }
}

add_action( 'wp_ajax_get_postid_from_url', 'hongo_addons_get_postid_from_url' );
add_action( 'wp_ajax_nopriv_get_postid_from_url', 'hongo_addons_get_postid_from_url' );

// AJAX To Add Auto Complted Search functionality 
if ( ! function_exists( 'hongo_ajax_hongo_autocomplete_search' ) ) {
    function hongo_ajax_hongo_autocomplete_search() {

        $output = array();

        $productCategory = ! empty( $_POST['category'] ) ? $_POST['category'] : '';

        $productCategory = ( $productCategory != 'all' ) ? $productCategory : '';        

        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'product_cat'    => $productCategory,
            'fields'         => 'ids' //Get all product id by Category
        );
        $hongo_posts = get_posts( $args );            
        if( $hongo_posts ) {
            foreach( $hongo_posts as $key => $productid ) {
                $output[ $key ]['ID']           = $productid;
                $output[ $key ]['label']        = get_the_title( $productid ); // The name of the post
                $output[ $key ]['permalink']    = get_permalink( $productid );
            }
            $output = ! empty( $output ) ? json_encode( array_values( $output ) ) : '';
        }
        $output = html_entity_decode( $output, ENT_QUOTES, 'UTF-8' );
        echo sprintf( '%s', $output );
        die();
    }
}
add_action( 'wp_ajax_hongo_ajax_hongo_autocomplete_search', 'hongo_ajax_hongo_autocomplete_search' );
add_action( 'wp_ajax_nopriv_hongo_ajax_hongo_autocomplete_search', 'hongo_ajax_hongo_autocomplete_search' );
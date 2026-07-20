<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    // Function For Related , Cross sells and up to sells thumbnail size
    if( ! function_exists( 'hongo_addons_product_archive_gutter' ) ) {
        function hongo_addons_product_archive_gutter( $gutter_type ) {

            if( ! is_cart() ) {

                $gutter_type = hongo_option( 'hongo_single_product_products_list_gutter', 'gutter-small' );
            }
            return $gutter_type;
        }
    }

    // Function For Related , Cross sells and up to sells thumbnail size
    if( ! function_exists( 'hongo_addons_related_up_cross_sells_thumbnail_size' ) ) {
        function hongo_addons_related_up_cross_sells_thumbnail_size( $size ) {

            if( is_cart() ) {

                $hongo_single_product_cross_sells_image_srcset = hongo_option( 'hongo_single_product_cross_sells_image_srcset', '' );
                if( ! empty( $hongo_single_product_cross_sells_image_srcset ) ) {

                    $size = $hongo_single_product_cross_sells_image_srcset;
                }

            } else {
                
                $hongo_single_product_products_list_image_srcset = hongo_option( 'hongo_single_product_products_list_image_srcset', '' );
                if( ! empty( $hongo_single_product_products_list_image_srcset ) ) {

                    $size = $hongo_single_product_products_list_image_srcset;
                }
            }
            return $size;
        }
    }
   
    // Main Class Function For Related , Cross sells and up to sells
    if( ! function_exists( 'hongo_addons_related_up_cross_sells_products_class' ) ) {
        function hongo_addons_related_up_cross_sells_products_class( $class ) {

            $find = array( 'hongo-shop-common-isotope', 'gutter-very-small', 'gutter-small', 'gutter-medium', 'gutter-large', 'gutter-extra-large' );
            $replace = array( '' );

            $class = str_replace( $find, $replace, $class );

            return $class;
        }
    }
   
    if ( ! function_exists( 'hongo_addons_related_up_cross_sells_products_before' ) ) {
        function hongo_addons_related_up_cross_sells_products_before( $enable_slider ) {

            if( $enable_slider ) {

                // Don't call isotope while shop listing slider enabled
                add_filter( 'hongo_product_list_class', 'hongo_addons_related_up_cross_sells_products_class', 100 );
            }

            // Change thumbanil image size
            add_filter( 'single_product_archive_thumbnail_size', 'hongo_addons_related_up_cross_sells_thumbnail_size' );
            add_filter( 'hongo_loop_alternate_product_thumbnail_size', 'hongo_addons_related_up_cross_sells_thumbnail_size' );

            // Change product list gutter
            add_filter( 'hongo_product_archive_gutter', 'hongo_addons_product_archive_gutter', 100 );
        }
    }    
 
    // Related , Up-sell and Cross Sells Product list class
    add_action( 'hongo_single_product_related_before', 'hongo_addons_related_up_cross_sells_products_before' );
    add_action( 'hongo_single_product_up_sells_before', 'hongo_addons_related_up_cross_sells_products_before' );
    add_action( 'hongo_single_product_cross_sells_before', 'hongo_addons_related_up_cross_sells_products_before' );

    if( ! function_exists( 'hongo_addons_related_up_cross_sells_products_after' ) ) {
        function hongo_addons_related_up_cross_sells_products_after( $enable_slider ){

            if( $enable_slider ) {

                // Don't call isotope while shop listing slider enabled
                remove_filter( 'hongo_product_list_class', 'hongo_addons_related_up_cross_sells_products_class', 100 );
            }

            // Change thumbanil image size
            remove_filter( 'single_product_archive_thumbnail_size', 'hongo_addons_related_up_cross_sells_thumbnail_size' );
            remove_filter( 'hongo_loop_alternate_product_thumbnail_size', 'hongo_addons_related_up_cross_sells_thumbnail_size' );

            // Change product list gutter
            remove_filter( 'hongo_product_archive_gutter', 'hongo_addons_product_archive_gutter', 100 );
        }
    }
    
    // Isotop class remove in shop style
    add_action( 'hongo_single_product_related_after', 'hongo_addons_related_up_cross_sells_products_after' );
    add_action( 'hongo_single_product_up_sells_after', 'hongo_addons_related_up_cross_sells_products_after' );
    add_action( 'hongo_single_product_cross_sells_after', 'hongo_addons_related_up_cross_sells_products_after' );

    // ADD NEW COLUMN
    if( ! function_exists( 'hongo_addons_menu_order_columns_head' ) ) {
        function hongo_addons_menu_order_columns_head( $defaults ) {
            $defaults['menu_order'] = esc_html__( 'Order', 'hongo-addons' );
            return $defaults;
        }
    }
    
    if( ! function_exists( 'hongo_addons_menu_order_columns_content' ) ) {
        function hongo_addons_menu_order_columns_content( $column_name, $post_ID ) {
            if( $column_name == 'menu_order' ) {
                global $post;
                $post = get_post( $post_ID );
                echo isset( $post->menu_order ) ? esc_html( $post->menu_order ) : '-';
            }
        }
    }

    // ONLY Product Post Type
    add_filter( 'manage_product_posts_columns', 'hongo_addons_menu_order_columns_head', 10 );
    add_action( 'manage_product_posts_custom_column', 'hongo_addons_menu_order_columns_content', 10, 2 );

    // Make the column sortable
    add_filter( 'manage_edit-product_sortable_columns', function( $columns ) {
        $columns['menu_order'] = 'menu_order';
        return $columns;
    } );

    /* To get Product wishlist Product slider */
    if( ! function_exists( 'hongo_product_slider_wishlist' ) ) {
        function hongo_product_slider_wishlist( $product ) {

            $product_id = $product->get_id();
            
            if( is_user_logged_in() ) {
                
                $user_id    = get_current_user_id();
                $data       = get_user_meta( $user_id, '_hongo_wishlist', true );

            } else {
                $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
                $cookie_name = 'hongo-wishlist'.$siteid;
                $data = ! empty( $_COOKIE[ $cookie_name ] ) ? $_COOKIE[ $cookie_name ] : '';   
            }

            $data = ! empty( $data ) ? explode( ',', $data ) : array();           
            
            $wishlist_id = get_option('woocommerce_wishlist_page_id');

            $wishlish_icon      = get_theme_mod( 'hongo_single_product_wishlish_icon', 'icon-heart' );            
            $wishlist_text      = get_theme_mod( 'hongo_product_archive_wishlist_text', esc_html__( 'Add to Wishlist', 'hongo-addons' ) );

            $class = implode( ' ', array_filter( array(
                'button',
                'hongo-wishlist',
                'hongo-wishlist-add',
                'product_type_' . $product->get_type()
            ) ) );

            if( ! empty( $data ) ) {
                if( ! empty( $wishlist_id ) ){
                    if( ! empty( $data ) && in_array( $product_id, $data ) ) {
                        $wishlist = apply_filters( 'hongo_loop_product_wishlist_link',
                        sprintf( '<a rel="nofollow" href="'.get_permalink( $wishlist_id ).'" data-product_id="%s" class="alt-font %s">%s</a>',
                            esc_attr( $product->get_id() ),
                            esc_attr( isset( $class ) ? $class : 'button' ),
                            '<i class="fa-solid fa-heart" title="'.esc_html__( 'Browse Wishlist', 'hongo-addons' ) .'"></i><span class="wish-list-text button-text">' . esc_html__( 'Browse Wishlist', 'hongo-addons' ) . '</span>'
                            ),
                        $product );
                    } else{
                        $wishlist = apply_filters( 'hongo_loop_product_wishlist_link',
                            sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
                                esc_attr( $product->get_id() ),
                                esc_attr( isset( $class ) ? $class : 'button hongo-wishlist hongo-wishlist-add' ),
                                '<i class="'.esc_attr( $wishlish_icon ).'" title="'.esc_attr( $wishlist_text ).'"></i><span class="wish-list-text button-text">' . $wishlist_text . '</span>'
                            ),
                        $product );         
                    }
                } else{
                    if( ! empty( $data ) && in_array( $product_id, $data ) ) {
                        $wishlist = apply_filters( 'hongo_loop_product_wishlist_link',
                        sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="wishlist-added alt-font %s">%s</a>',
                            esc_attr( $product->get_id() ),
                            esc_attr( isset( $class ) ? $class : 'button hongo-wishlist hongo-wishlist-remove' ),
                            '<i class="fa-solid fa-heart" title="'.esc_html__( 'Remove Wishlist', 'hongo-addons' ) .'"></i><span class="wish-list-text button-text">' . esc_html__( 'Remove Wishlist', 'hongo-addons' ) . '</span>'
                            ),
                        $product );
                    } else{
                        $wishlist = apply_filters( 'hongo_loop_product_wishlist_link',
                            sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
                                esc_attr( $product->get_id() ),
                                esc_attr( isset( $class ) ? $class : 'button hongo-wishlist hongo-wishlist-add' ),
                                '<i class="'.esc_attr( $wishlish_icon ).'" title="'.esc_attr( $wishlist_text ).'"></i><span class="wish-list-text button-text">' . $wishlist_text . '</span>'
                            ),
                        $product );
                    }
                }       
            } else {
                $wishlist = apply_filters( 'hongo_loop_product_wishlist_link',
                    sprintf( '<a rel="nofollow" href="javascript:void(0);" data-product_id="%s" class="alt-font %s">%s</a>',
                        esc_attr( $product->get_id() ),
                        esc_attr( isset( $class ) ? $class : 'button hongo-wishlist hongo-wishlist-add' ),
                        '<i class="'.esc_attr( $wishlish_icon ).'" title="'.esc_attr( $wishlist_text ).'"></i><span class="wish-list-text button-text">' . $wishlist_text . '</span>'
                    ),
                $product ); 
            }

            // To enqueue add to wishlist script
            wp_enqueue_script( 'hongo-addons-wishlist' );

            echo sprintf( '%s', $wishlist );
        }
    }
    add_action( 'hongo_wishlist_icon', 'hongo_product_slider_wishlist' );

    /* To Add compare, quickview, promopopup product popup functionality */
    if ( ! function_exists( 'hongo_addons_footer_popups' ) ) {
        function hongo_addons_footer_popups() {

            global $hongo_quick_view_popup, $hongo_compare_popup;

            // Load for Compare product popup
            $hongo_product_archive_enable_compare    = hongo_get_product_archive_enable_compare();
            $hongo_single_product_enable_compare     = hongo_get_single_product_enable_compare();

            if( $hongo_product_archive_enable_compare == '1' || $hongo_single_product_enable_compare == '1' || $hongo_compare_popup ) {
                echo '<div id="hongo_compare_popup" class="woocommerce hongo-popup-content hongo-compare-popup hongo-white-popup"></div>';

                // To enqueue add to compare script
                wp_enqueue_script( 'hongo-addons-compare' );
            }

            // Load for Quick View product popup
            $hongo_product_archive_enable_quick_view = hongo_get_product_archive_enable_quick_view();

            if( $hongo_product_archive_enable_quick_view == '1' || $hongo_quick_view_popup ) {
                
                echo '<div id="hongo_quick_view_popup" class="woocommerce hongo-popup-content hongo-quick-view-popup hongo-white-popup"></div>';

                // Load for quick view single product
                wp_enqueue_script( 'wc-single-product' );

                // Load for quick view single product variation
                wp_enqueue_script( 'wc-add-to-cart-variation' );

                // To enqueue add to Quick View script
                wp_enqueue_script( 'hongo-addons-quick-view' );                
            }

            // Promo Popup
            $hongo_enable_promo_popup = get_theme_mod( 'hongo_enable_promo_popup', '0' );
            $hongo_enable_promo_popup_on_home_page = get_theme_mod( 'hongo_enable_promo_popup_on_home_page', '0' );
            $hongo_enable_promo_popup = apply_filters( 'hongo_enable_promo_popup', $hongo_enable_promo_popup );
            $hongo_promo_popup_section   = hongo_option( 'hongo_promo_popup_section', '' );

            if( $hongo_enable_promo_popup == 1 && ! empty( $hongo_promo_popup_section ) ) {

                if ( $hongo_enable_promo_popup_on_home_page == 0 || ( $hongo_enable_promo_popup_on_home_page == 1 && is_front_page() ) ) {

                    $flag = false;
                        
                    $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
                    $cookie_name = 'hongo-promo-popup'.$siteid;

                    if( ! isset( $_COOKIE[ $cookie_name ] ) || ( isset( $_COOKIE[ $cookie_name ] ) && $_COOKIE[ $cookie_name ] != 'shown' ) ) {
                        $flag = true;
                    }
                    
                    $promo_popup_section_content = get_post_field( 'post_content', $hongo_promo_popup_section );
                    
                    if( ! empty( $promo_popup_section_content ) ) {
                        echo '<div class="hongo-promo-popup-wrap">';

                            echo hongo_remove_wpautop( $promo_popup_section_content );

                            if( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                                echo '<a href="'.get_edit_post_link( $hongo_promo_popup_section ).'" target="_blank" data-placement="right" title="Edit promo popup section" class="edit-hongo-section edit-promo-popup hongo-tooltip"><i class="ti-pencil"></i></a>';
                            }
                        echo '</div>';
                        wp_enqueue_script( 'hongo-addons-promo-popup' );
                    }
                }                

            }
        }
    }

    /**
     * Load compare, quickview, promopopup details in footer
     *
     * @see hongo_addons_footer_popups()
     */
    add_action( 'wp_footer', 'hongo_addons_footer_popups', -1 );
    
    // Remove animation
    if( ! function_exists( 'hongo_addons_product_archive_animation' ) ) {
        function hongo_addons_product_archive_animation( $animation ) {

            $animation = '';

            return $animation;
        }
    }

    if( ! function_exists( 'hongo_addons_related_products_remove_animation' ) ) {
        function hongo_addons_related_products_remove_animation() {

            // Remove animation
            add_filter( 'hongo_product_archive_animation', 'hongo_addons_product_archive_animation' );
        }
    }
    add_action( 'hongo_single_product_related_before', 'hongo_addons_related_products_remove_animation' );
    add_action( 'hongo_single_product_up_sells_before', 'hongo_addons_related_products_remove_animation' );

    if( ! function_exists( 'hongo_addons_related_products_remove_animation_undo' ) ) {
        function hongo_addons_related_products_remove_animation_undo() {

            // Remove animation undo
            remove_filter( 'hongo_product_archive_animation', 'hongo_addons_product_archive_animation' );
        }
    }
    add_action( 'hongo_single_product_related_after', 'hongo_addons_related_products_remove_animation_undo' );
    add_action( 'hongo_single_product_up_sells_after', 'hongo_addons_related_products_remove_animation_undo' );

    // Add an additional data in product review structured data
    if( ! function_exists( 'hongo_addons_woocommerce_structured_data_review' ) ) {
        function hongo_addons_woocommerce_structured_data_review( $markup, $comment ) {
            
            $product = wc_get_product( $comment->comment_post_ID );

            if ( ! is_object( $product ) ) {
                global $product;
            }

            if ( ! is_a( $product, 'WC_Product' ) ) {
                return $markup;
            }

            $markup['itemReviewed']['aggregateRating'] = array(
                '@type'       => 'AggregateRating',
                'ratingValue' => $product->get_average_rating(),
                'reviewCount' => $product->get_review_count(),
            );

            $markup['itemReviewed']['description'] = wp_strip_all_tags( do_shortcode( $product->get_short_description() ? $product->get_short_description() : $product->get_description() ) );
            $markup['itemReviewed']['image'] = wp_get_attachment_image_url( $product->get_image_id() );
            $markup['itemReviewed']['sku'] = $product->get_sku();

            $brand_list = wp_get_object_terms( $product->get_id(), 'product_brand', array( 'orderby' => 'parent', 'fields' => 'names' ) );
            if( ! empty( $brand_list ) && ! is_wp_error( $brand_list ) ) {

                $markup['itemReviewed']['brand'] = array(
                    '@type' => 'Brand',
                    'name'  => implode( ', ', $brand_list )
                );
            }
            return $markup;
        }
    }
    add_filter( 'woocommerce_structured_data_review', 'hongo_addons_woocommerce_structured_data_review', 10, 2 );

    // Add an additional data in product structured data
    if( ! function_exists( 'hongo_addons_woocommerce_structured_data_product' ) ) {
        function hongo_addons_woocommerce_structured_data_product( $markup, $product ) {

            if ( ! is_object( $product ) ) {
                global $product;
            }

            if ( ! is_a( $product, 'WC_Product' ) ) {
                return $markup;
            }
            
            $brand_list = wp_get_object_terms( $product->get_id(), 'product_brand', array( 'orderby' => 'parent', 'fields' => 'names' ) );
            if( ! empty( $brand_list ) && ! is_wp_error( $brand_list ) ) {

                $markup['brand'] = array(
                    '@type' => 'Brand',
                    'name'  => implode( ', ', $brand_list )
                );
            }
            return $markup;
        }
    }
    add_filter( 'woocommerce_structured_data_product', 'hongo_addons_woocommerce_structured_data_product', 10, 2 );
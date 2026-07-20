<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    // Remove WooCommerce setup screen.
    remove_action( 'admin_init', 'setup_wizard' );

    // Hide the "install the WooThemes Updater"
    remove_action( 'admin_notices', 'woothemes_updater_notice' );

    // Hide the woocommerce admin notice
    if ( ! function_exists( 'hongo_remove_woocommerce_admin_notice' ) ) {
        function hongo_remove_woocommerce_admin_notice() {

            if ( class_exists( 'WC_Admin_Notices' ) ) {

                // Remove the "you have outdated template files" nag
                WC_Admin_Notices::remove_notice( 'template_files' );
                
                // Remove the "install pages" nag
                WC_Admin_Notices::remove_notice( 'install' );
            }

            // Check WooCommerce version
            $wc_version = get_option( 'woocommerce_db_version' );
            if ( version_compare( $wc_version, '4.6.0', '>=' ) ) {

                add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
            }
        }
    }
    add_action( 'wp_loaded', 'hongo_remove_woocommerce_admin_notice', 99 );

    /* WooCommerce init action */
    if ( ! function_exists( 'hongo_woocommerce_init' ) ) {

        function hongo_woocommerce_init() {

            if( isset( $_GET['empty-cart'] ) && $_GET['empty-cart'] == '1' ) {

                WC()->cart->empty_cart();

                $cart_url = wc_get_cart_url();

                wp_redirect( $cart_url );
                exit();
            }
        }
    }
    add_action( 'woocommerce_init', 'hongo_woocommerce_init' );

    /* To get Product Attribute list in Customize */
    if( ! function_exists( 'hongo_product_attribute_customizer_array' ) ) :
        function hongo_product_attribute_customizer_array() {
            
            $attribute_array      = array();
            $attribute_taxonomies = wc_get_attribute_taxonomies();

            if ( ! empty($attribute_taxonomies) ) {
                foreach ( $attribute_taxonomies as $tax ) {
                    if ( taxonomy_exists( wc_attribute_taxonomy_name( $tax->attribute_name ) ) ) {
                        $attribute_array[ $tax->attribute_name ] = $tax->attribute_name;
                    }
                }
            }
            return $attribute_array;
        }
    endif;

    /* To get Product archive column */
    if( ! function_exists( 'hongo_get_product_archive_column' ) ) {
        function hongo_get_product_archive_column() {

            $archive_page_column = get_theme_mod( 'hongo_product_archive_page_column', '4' );

            /* To filter Product lists column */
            return apply_filters( 'hongo_product_lists_column', $archive_page_column );
        }
    }

    /* To get Product archive mini desktop column */
    if( ! function_exists( 'hongo_product_archive_page_mini_desktop_column' ) ) {
        function hongo_product_archive_page_mini_desktop_column() {

            $archive_page_mini_desktop_column = get_theme_mod( 'hongo_product_archive_page_mini_desktop_column', '3' );

            /* To filter Product lists column */
            return apply_filters( 'hongo_product_lists_mini_desktop_column', $archive_page_mini_desktop_column );
        }
    }

    /* To get Product archive tablet column */
    if( ! function_exists( 'hongo_product_archive_page_tablet_column' ) ) {
        function hongo_product_archive_page_tablet_column() {

            $archive_page_tablet_column = get_theme_mod( 'hongo_product_archive_page_tablet_column', '3' );

            /* To filter Product lists column */
            return apply_filters( 'hongo_product_lists_tablet_column', $archive_page_tablet_column );
        }
    }

    /* To get Product archive mobile column */
    if( ! function_exists( 'hongo_get_product_archive_mobile_column' ) ) {
        function hongo_get_product_archive_mobile_column() {

            $archive_page_mobile_column = get_theme_mod( 'hongo_product_archive_page_mobile_column', '1' );

            /* To filter Product lists column */
            return apply_filters( 'hongo_product_lists_mobile_column', $archive_page_mobile_column );
        }
    }

    /* To get Product archive list style */
    if( ! function_exists( 'hongo_get_product_archive_list_style' ) ) {
        function hongo_get_product_archive_list_style() {

            $shop_style = get_theme_mod( 'hongo_product_archive_premade_style', 'shop-standard' );

            return apply_filters( 'hongo_product_archive_style', $shop_style );
        }
    }

    /* To get Product archive Overlay */
    if( ! function_exists( 'hongo_get_product_archive_list_overlay' ) ) {
        function hongo_get_product_archive_list_overlay() {

            $shop_style = get_theme_mod( 'hongo_product_archive_enable_overlay', '1' );

            return apply_filters( 'hongo_product_archive_overlay', $shop_style );
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

    /* To get Product archive enable Loop Slider */
    if( ! function_exists( 'hongo_get_product_archive_enable_gallery_slider' ) ) {
        function hongo_get_product_archive_enable_gallery_slider() {

            $enable_gallery_slider = hongo_option( 'hongo_product_archive_enable_gallery_slider', '0' );

            return apply_filters( 'hongo_product_archive_enable_gallery_slider', $enable_gallery_slider );
        }
    }

    /* To get Product archive enable Loop Slide */
    if( ! function_exists( 'hongo_get_product_archive_gallery_slide' ) ) {
        function hongo_get_product_archive_gallery_slide() {

            $enable_gallery_slide = hongo_option( 'hongo_product_archive_gallery_slide', '3' );

            return apply_filters( 'hongo_product_archive_gallery_slide', $enable_gallery_slide );
        }
    }

    /* To get Product archive enable Loop deal */
    if( ! function_exists( 'hongo_get_product_archive_enable_deal' ) ) {
        function hongo_get_product_archive_enable_deal() {

            $enable_deal = hongo_option( 'hongo_product_archive_enable_deal', '0' );

            return apply_filters( 'hongo_product_archive_enable_deal', $enable_deal );
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

    /* To get Product clean style blur effect */
    if( ! function_exists( 'hongo_get_product_archive_blur_effect' ) ) {
        function hongo_get_product_archive_blur_effect() {

            $archive_blur_effect = get_theme_mod( 'hongo_product_archive_enable_blur_effect', '' );

            /* To filter Product clean style */
            return apply_filters( 'hongo_product_archive_enable_blur_effect', $archive_blur_effect );
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

    /* To get Product archive number of product*/
    if( ! function_exists( 'hongo_get_product_archive_number_of_product' ) ) {
        function hongo_get_product_archive_number_of_product() {
            
            $per_page = get_theme_mod( 'hongo_product_archive_page_per_page', '12' );

            return apply_filters( 'hongo_product_archive_page_per_page', $per_page );
        }
    }

    /* To get Product content alignment */
    if( ! function_exists( 'hongo_get_product_archive_content_alignment' ) ) {
        function hongo_get_product_archive_content_alignment() {

            $content_align = get_theme_mod( 'hongo_product_archive_product_content_align','center' );

            return apply_filters( 'hongo_product_archive_content_alignment', $content_align );
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

    /* To check enable product archive buttons counter */
    if( ! function_exists( 'hongo_get_enable_product_archive_buttons_counter' ) ) :
        function hongo_get_enable_product_archive_buttons_counter() {

            $counter = 0;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $hongo_product_archive_enable_add_to_cart   = hongo_get_product_archive_enable_add_to_cart();

            if( $hongo_product_archive_enable_add_to_cart == '1' && ! ( $product_archive_list_style == 'shop-list' || $product_archive_list_style == 'shop-default'  ) ) {
                $counter++;
            }

            return apply_filters( 'hongo_product_archive_buttons_counter', $counter, $product_archive_list_style );
        }
    endif;

    /* To get tooltip position */
    if( ! function_exists( 'hongo_get_tooltip_position' ) ) :
        function hongo_get_tooltip_position() {

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            if( $product_archive_list_style == 'shop-masonry' ) {

                $position = 'right';

            } else {

                $position = 'top';
            }

            return apply_filters( 'hongo_shop_loop_tooltip_position', $position, $product_archive_list_style );
        }
    endif;

    /* To get Product button icon */
    if( ! function_exists( 'hongo_get_product_button_icon' ) ) :
        function hongo_get_product_button_icon() {

            global $product;

            $product_type = $product->get_type(); // Check product type
            
            // Custom Icon
            $hongo_single_product_add_to_cart_icon = get_theme_mod( 'hongo_single_product_add_to_cart_icon', 'icon-basket' );
            $hongo_single_product_variable_product_icon = get_theme_mod( 'hongo_single_product_variable_product_icon', 'icon-layers' );
            $hongo_single_product_group_product_icon = get_theme_mod( 'hongo_single_product_group_product_icon', 'ti-layers' );

            switch ( $product_type ) {
                case 'variable':

                    $icon = $product->is_purchasable() ? $hongo_single_product_variable_product_icon : 'icon-notebook';
                    break;
                
                case 'grouped':
                    
                    $icon = $hongo_single_product_group_product_icon;
                    break;
                
                case 'external':
                    
                    $icon = 'icon-anchor';
                    break;

                default:

                    $icon = $product->is_in_stock() ? $hongo_single_product_add_to_cart_icon : 'icon-notebook';
                    break;
            }

            return apply_filters( 'hongo_loop_add_to_cart_icon', $icon, $product_type, $product );
        }
    endif;

    /* WooCommerce cart before action */
    add_action( 'woocommerce_before_cart', 'hongo_woocommerce_before_cart' );
    if ( ! function_exists( 'hongo_woocommerce_before_cart' ) ) {
        function hongo_woocommerce_before_cart() {

            if ( ! is_admin() && is_cart() ) {

                /* On / Off setting for Cross Sells products */
                $hongo_single_product_enable_cross_sells = get_theme_mod( 'hongo_single_product_enable_cross_sells', '1' );
                
                remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
                if( $hongo_single_product_enable_cross_sells == 1 ) {
                    add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );
                }

            }
        }
    }

    /* Add product no. of column for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_columns', 'hongo_override_woocommerce_cross_sells_columns', 99 );
    if ( ! function_exists( 'hongo_override_woocommerce_cross_sells_columns' ) ) {
        function hongo_override_woocommerce_cross_sells_columns( $no_of_columns ) {
            
            $hongo_single_product_no_of_columns_cross_sells = hongo_option( 'hongo_single_product_no_of_columns_cross_sells', '4' );
            if( ! empty( $hongo_single_product_no_of_columns_cross_sells ) ) {
                $no_of_columns = esc_attr( $hongo_single_product_no_of_columns_cross_sells );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_total', 'hongo_override_woocommerce_cross_sells_total', 99 );
    if ( ! function_exists( 'hongo_override_woocommerce_cross_sells_total' ) ) {
        function hongo_override_woocommerce_cross_sells_total( $per_page ) {
            
            $hongo_single_product_no_of_products_cross_sells = hongo_option( 'hongo_single_product_no_of_products_cross_sells', '6' );
            if( ! empty( $hongo_single_product_no_of_products_cross_sells ) ) {
                $per_page = esc_attr( $hongo_single_product_no_of_products_cross_sells );
            }

            return $per_page;
        }
    }

    /* To Remove bracket from attribute product counter */
    add_filter('woocommerce_layered_nav_count', 'hongo_override_woocommerce_layered_nav_count', 10, 2 );
    if ( ! function_exists( 'hongo_override_woocommerce_layered_nav_count' ) ) {
        function hongo_override_woocommerce_layered_nav_count($count_html, $count) {

            $count_html = str_replace( '(', '<span> ', $count_html );
            $count_html = str_replace( ')', '</span>', $count_html );
            $count_html = str_replace( $count, str_pad( $count, 2, 0, STR_PAD_LEFT ), $count_html );
            return $count_html;
        }
    }

    /* To Remove bracket from rating widget */
    add_filter('woocommerce_rating_filter_count', 'hongo_override_woocommerce_rating_filter_count', 10, 2 );
    if ( ! function_exists( 'hongo_override_woocommerce_rating_filter_count' ) ) {
        function hongo_override_woocommerce_rating_filter_count($count_html, $count) {

            $count_html = str_replace( '(', '', $count_html );
            $count_html = str_replace( ')', '', $count_html );
            $count_html = str_replace( $count, str_pad( $count, 2, 0, STR_PAD_LEFT ), $count_html );
            return $count_html;
        }
    }

    /* To change Single product thumbnail size */
    add_filter( 'woocommerce_gallery_thumbnail_size', 'hongo_override_woocommerce_gallery_thumbnail_size', 999 );
    if ( ! function_exists( 'hongo_override_woocommerce_gallery_thumbnail_size' ) ) {
        function hongo_override_woocommerce_gallery_thumbnail_size() {

            return 'hongo-popular-posts-thumb';
        }
    }

    // Navigation menu title for mobile
    add_filter( 'widget_title', 'hongo_add_navigation_menu_title', 10, 3 );
    if ( ! function_exists( 'hongo_add_navigation_menu_title' ) ) {
        function hongo_add_navigation_menu_title( $title, $instance = array(), $id_base = '' ) {

            if( $id_base == 'nav_menu' ) {
                $title .= '<a href="javascript:void(0);" class="wp-nav-menu-responsive-button"><span class="menu-label">' . apply_filters( 'hongo_navigation_mobile_title', esc_html__( 'Info', 'hongo' ) ) . '</span></a>';
            }
            if( $id_base == 'hongo_custom_menu_widget' ) {
                $title .= '<a href="javascript:void(0);" class="wp-nav-menu-responsive-button"><span class="menu-lable">' . apply_filters( 'hongo_custom_navigation_mobile_title', esc_html__( 'Menu', 'hongo' ) ) . '</span></a>';
            }
            return $title;
        }
    }

    // For Change single product popup image options
    add_filter( 'woocommerce_single_product_photoswipe_options', 'hongo_override_single_product_photoswipe_options', 999 );
    if ( ! function_exists( 'hongo_override_single_product_photoswipe_options' ) ) {
        function hongo_override_single_product_photoswipe_options( $options ) {

            $options['showAnimationDuration'] = 500;
            $options['bgOpacity'] = '0.7';
            $options['closeOnVerticalDrag'] = false;

            return $options;
        }
    }

    // For Change single product popup image options
    add_filter( 'woocommerce_cart_totals_coupon_html', 'hongo_override_cart_totals_coupon_html', 999 );
    if ( ! function_exists( 'hongo_override_cart_totals_coupon_html' ) ) {
        function hongo_override_cart_totals_coupon_html( $coupon_html ) {

            $coupon_html = str_replace( array( '[', ']' ), array( '', '' ), $coupon_html );

            return $coupon_html;
        }
    }

    // Show notice if cart is empty.
    //remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
    add_action( 'woocommerce_cart_is_empty', 'hongo_empty_cart_message', 10 );
    if ( ! function_exists( 'hongo_empty_cart_message' ) ) {
        function hongo_empty_cart_message() {

            echo '<p class="cart-empty alt-font"><i class="icon-basket base-color"></i>' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'hongo' ) ) ) . '</p>';
        }
    }

    /**
     * Mini cart always show in cart and checkout page
     *
     * @since 1.1.3
     */
    add_filter( 'woocommerce_widget_cart_is_hidden', 'hongo_woocommerce_widget_cart_is_hidden', 40 );
    if( ! function_exists( 'hongo_woocommerce_widget_cart_is_hidden' ) ) {
        function hongo_woocommerce_widget_cart_is_hidden( $flag ) {

            $hongo_mini_cart_always_show = get_theme_mod( 'hongo_mini_cart_always_show', '0' );
            if( $hongo_mini_cart_always_show ) {
                $flag = false;
            }
            return $flag;
        }
    }

    // For append name within shop title on shop page
    add_filter( 'hongo_breadcrumb_page_title', 'hongo_override_woocommerce_shop_page_title' );
    add_filter( 'woocommerce_page_title', 'hongo_override_woocommerce_shop_page_title' );
    if ( ! function_exists( 'hongo_override_woocommerce_shop_page_title' ) ) {
        function hongo_override_woocommerce_shop_page_title( $page_title ) {

            if( is_shop() ) {

                $compare_params = array( 
                                            'default'       => __( 'default', 'hongo' ),
                                            'minimalist'    => __( 'minimalist', 'hongo' ),
                                            'classic'       => __( 'classic', 'hongo' ),
                                            'clean'         => __( 'clean', 'hongo' ),
                                            'flat'          => __( 'flat', 'hongo' ),
                                            'list'          => __( 'list', 'hongo' ),
                                            'standard'      => __( 'standard', 'hongo' ),
                                            'simple'        => __( 'simple', 'hongo' ),
                                            'boxed'         => __( 'boxed', 'hongo' ),

                                            'left_sidebar'  => __( 'left sidebar', 'hongo' ),
                                            'right_sidebar' => __( 'right sidebar', 'hongo' ),
                                            'no_sidebar'    => __( 'without sidebar', 'hongo' ),
                                            'filter'        => __( 'with top filter', 'hongo' ),
                                            'off_canvas'    => __( 'with canvas filter', 'hongo' ),

                                            'column_1'      => __( 'with one column', 'hongo' ),
                                            'column_2'      => __( 'with two column', 'hongo' ),
                                            'column_3'      => __( 'with three column', 'hongo' ),
                                            'column_4'      => __( 'with four column', 'hongo' ),
                                            'column_5'      => __( 'with five column', 'hongo' ),
                                            'column_6'      => __( 'with six column', 'hongo' ),
                                        );

                if( ! empty( $_GET['style'] ) ) { // Shop style

                    $style = $_GET['style'];
                    $page_title .= isset( $compare_params[ $style ] ) ? ' ' . $compare_params[ $style ] : '';

                } elseif( ! empty( $_GET['column'] ) ) { // Shop column

                    $sidebar = 'column_' . $_GET['column'];
                    $page_title .= isset( $compare_params[ $sidebar ] ) ? ' ' . $compare_params[ $sidebar ] : '';

                } elseif( ! empty( $_GET['off_canvas'] ) ) { // Shop canvas filter

                    $off_canvas = 'off_canvas';
                    $page_title .= isset( $compare_params[ $off_canvas ] ) ? ' ' . $compare_params[ $off_canvas ] : '';

                } elseif( ! empty( $_GET['filter'] ) ) { // Shop top filter

                    $filter = 'filter';
                    $page_title .= isset( $compare_params[ $filter ] ) ? ' ' . $compare_params[ $filter ] : '';
                    
                } elseif( ! empty( $_GET['sidebar'] ) ) { // Shop sidebar

                    $sidebar = $_GET['sidebar'];
                    $page_title .= isset( $compare_params[ $sidebar ] ) ? ' ' . $compare_params[ $sidebar ] : '';
                }
            }
            return $page_title;
        }
    }
}

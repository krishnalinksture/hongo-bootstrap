<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    /* WordPress hongo_before_shop_loop Action */
    add_action( 'hongo_before_shop_loop', 'hongo_before_shop_loop_callback' );
    if ( ! function_exists( 'hongo_before_shop_loop_callback' ) ) {
        function hongo_before_shop_loop_callback( $product_archive_list_style ) {

            if ( ! is_admin() ) {

                if( ! empty( $product_archive_list_style ) ) {

                    switch ( $product_archive_list_style ) {

                        case 'shop-minimalist' :
                        case 'shop-classic' :
                        case 'shop-clean' :
                        case 'shop-flat' :
                        case 'shop-list' :
                        case 'shop-masonry' :
                        case 'shop-metro' :
                        case 'shop-modern' :
                        case 'shop-standard' :
                        case 'shop-simple' :
                        case 'shop-boxed' :

                            require get_parent_theme_file_path( "/lib/woocommerce/archive-page-functions/{$product_archive_list_style}-functions.php" );
                            break;

                        case 'shop-default':
                        default:

                            require get_parent_theme_file_path( "/lib/woocommerce/archive-page-functions/shop-default-functions.php" );
                            break;
                    }
                }
            }
        }
    }
    
    /* Add dynamic class for alternate image and metro layout */
    add_filter( 'post_class', 'hongo_override_wc_product_list_post_class', 99, 3 );

    /* Add dynamic class for alternate image */
    if ( ! function_exists( 'hongo_override_wc_product_list_post_class' ) ) {
        function hongo_override_wc_product_list_post_class( $classes, $class = '', $post_id = '' ) {

            global $product;

            // if WooCommerce category, tag, brand or shop page

            $hongo_product_archive_enable_alternate_image = hongo_get_product_archive_enable_alternate_image();
            $hongo_get_product_archive_enable_gallery_slider = hongo_get_product_archive_enable_gallery_slider();
            $alternate_img_id = get_post_meta( $post_id, '_hongo_product_alternate_image', true );

            // check enable alternate image and not empty image id
            if( $hongo_product_archive_enable_alternate_image == '1' && ! empty( $alternate_img_id ) && $hongo_get_product_archive_enable_gallery_slider == '0' ) {
                
                if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ) ) ) {
                    return $classes;
                }

                if ( $product ) {

                    // Added custom class for alternate image
                    $classes[] = 'hongo-alternate-image-wrap';
                }
            }

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $hongo_product_archive_page_enable_metro = hongo_get_product_archive_enable_metro();
            if ( $hongo_product_archive_page_enable_metro == 1 && ( $product_archive_list_style == 'shop-metro' || $product_archive_list_style == 'shop-modern' ) ) { // Check shop style are metro or modern
                $archive_product_number = wc_get_loop_prop( 'loop' ); // Current product index
                $double_grid_position   = hongo_get_product_archive_metro_position();
                $double_grid_position   = ! empty( $double_grid_position ) ? explode( ',', $double_grid_position ) : array();

                // Check double grid position with current product index
                if( ! empty( $double_grid_position ) ) {

                    if( ! empty( $double_grid_position[ $archive_product_number ] ) && ( $double_grid_position[ $archive_product_number ] == '2-1' || $double_grid_position[ $archive_product_number ] == '2-2' ) ) {
                        $classes[] = 'grid-item-double';
                    }

                    if( ! empty( $double_grid_position[ $archive_product_number] ) && $double_grid_position[ $archive_product_number ] != '*' ) {
                        $classes[] = 'grid-item-' . $double_grid_position[ $archive_product_number ];
                    } else {
                        $classes[] = 'grid-item-1-1';
                    }
                }
            }

            return $classes;
        }
    }

    /* Add dynamic class for no. of columns & product list style */
    add_filter( 'hongo_product_list_class', 'hongo_override_hongo_product_list_class', 99 );
    if ( ! function_exists( 'hongo_override_hongo_product_list_class' ) ) {
        function hongo_override_hongo_product_list_class( $class ) {

            global $woocommerce_loop;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            if( ! empty( $product_archive_list_style ) ) {
                $class .= ' hongo-'.$product_archive_list_style;

                if( $product_archive_list_style == 'shop-list' ) { // Check loop style is list
                    $class .= ' hongo-product-list-view hongo-product-list-common-wrap';
                } else {
                    $class .= ' hongo-shop-common-isotope hongo-product-list-common-wrap';
                }
            }

            // Clean style blur effect
            if( $product_archive_list_style == 'shop-clean' ) { // Check loop style is clean

                $hongo_product_archive_enable_blur_effect = hongo_get_product_archive_blur_effect();
                if( $hongo_product_archive_enable_blur_effect == '0' ) {
                    $class .= ' hongo-no-transition-image';
                }
            }

            // Added Custom No. of column dynamic class
            $hongo_product_archive_page_column = hongo_get_product_archive_column();
            $hongo_product_archive_page_mini_desktop_column = hongo_product_archive_page_mini_desktop_column();
            $hongo_product_archive_page_tablet_column = hongo_product_archive_page_tablet_column();
            $hongo_product_archive_page_mobile_column = hongo_get_product_archive_mobile_column();
            $hongo_single_product_no_of_columns_list = hongo_option('hongo_single_product_no_of_columns_list','4');
            $hongo_single_product_list_mini_desktop_column = hongo_option('hongo_single_product_list_mini_desktop_column','3');
            $hongo_single_product_list_tablet_column = hongo_option('hongo_single_product_list_tablet_column','3');
            $hongo_single_product_list_mobile_column = hongo_option('hongo_single_product_list_mobile_column','1');
            $hongo_single_product_no_of_columns_cross_sells = hongo_option('hongo_single_product_no_of_columns_cross_sells','4');
            $hongo_single_product_no_of_columns_cross_sells_mini_desktop = hongo_option('hongo_single_product_no_of_columns_cross_sells_mini_desktop','3');
            $hongo_single_product_no_of_columns_cross_sells_tablet = hongo_option('hongo_single_product_no_of_columns_cross_sells_tablet','3');
            $hongo_single_product_no_of_columns_cross_sells_mobile = hongo_option('hongo_single_product_no_of_columns_cross_sells_mobile','1');
            

            if(is_cart() && $woocommerce_loop['name'] == 'cross-sells'){

                $class .= ' hongo-shop-col-'.$hongo_single_product_no_of_columns_cross_sells;
                $class .= ' hongo-shop-md-col-'.$hongo_single_product_no_of_columns_cross_sells_mini_desktop;
                $class .= ' hongo-shop-sm-col-'.$hongo_single_product_no_of_columns_cross_sells_tablet;
                $class .= ' hongo-shop-xs-col-'.$hongo_single_product_no_of_columns_cross_sells_mobile;

            } elseif(is_product() && ($woocommerce_loop['name'] == 'related'|| $woocommerce_loop['name'] == 'up-sells')){

                $class .= ' hongo-shop-col-'.$hongo_single_product_no_of_columns_list;
                $class .= ' hongo-shop-md-col-'.$hongo_single_product_list_mini_desktop_column;
                $class .= ' hongo-shop-sm-col-'.$hongo_single_product_list_tablet_column;
                $class .= ' hongo-shop-xs-col-'.$hongo_single_product_list_mobile_column;
                
            } elseif( ! empty( $woocommerce_loop['columns'] ) ) {
                
                $class .= ' hongo-shop-col-'.$woocommerce_loop['columns'];
                $class .= ' hongo-shop-md-col-'.$hongo_product_archive_page_mini_desktop_column;
                $class .= ' hongo-shop-sm-col-'.$hongo_product_archive_page_tablet_column;
                $class .= ' hongo-shop-xs-col-'.$hongo_product_archive_page_mobile_column;

            } elseif( ! empty( $hongo_product_archive_page_column ) && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) {
                
                $class .= ' hongo-shop-col-'.$hongo_product_archive_page_column;
                $class .= ' hongo-shop-md-col-'.$hongo_product_archive_page_mini_desktop_column;
                $class .= ' hongo-shop-sm-col-'.$hongo_product_archive_page_tablet_column;
                $class .= ' hongo-shop-xs-col-'.$hongo_product_archive_page_mobile_column;
            }

            // Added Custom Gutter Class
            $hongo_product_archive_gutter = hongo_get_product_archive_gutter_type();
            $class .= ! empty( $hongo_product_archive_gutter ) ? ' '.$hongo_product_archive_gutter : '';

            // Added custom class for product buttons counter
            $product_buttons_counter = hongo_get_enable_product_archive_buttons_counter();
            if ( $product_buttons_counter > 0 ) {

                $class .= ' hongo-buttons-' . $product_buttons_counter;
            }

            $hongo_product_archive_page_enable_metro = hongo_get_product_archive_enable_metro();
            if ( $hongo_product_archive_page_enable_metro == 1 && ( $product_archive_list_style == 'shop-metro' || $product_archive_list_style == 'shop-modern' ) ) { // Check loop style are metro or modern
                $class .= ' metro-grid';
            }

            $product_archive_list_content_alignment = hongo_get_product_archive_content_alignment();
            if( $product_archive_list_style == 'shop-default' || $product_archive_list_style == 'shop-minimalist' || $product_archive_list_style == 'shop-classic' || $product_archive_list_style == 'shop-masonry' || $product_archive_list_style == 'shop-standard' || $product_archive_list_style == 'shop-list' ) {
                $class .= ' hongo-text-'.$product_archive_list_content_alignment;
            }
            
            return $class;
        }
    }

    /* Add no. of column for shop or archive page */
    add_filter( 'loop_shop_columns', 'hongo_override_loop_shop_columns', 99 );
    if ( ! function_exists( 'hongo_override_loop_shop_columns' ) ) {
        function hongo_override_loop_shop_columns( $no_of_columns ) {
            
            $hongo_product_archive_page_column = hongo_get_product_archive_column();
            if( ! empty( $hongo_product_archive_page_column ) ) {
                $no_of_columns = esc_attr( $hongo_product_archive_page_column );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for shop or archive page */
    add_filter( 'loop_shop_per_page', 'hongo_override_loop_shop_per_page', 99 );
    if ( ! function_exists( 'hongo_override_loop_shop_per_page' ) ) {
        function hongo_override_loop_shop_per_page( $per_page ) {

            $hongo_product_archive_page_per_page = hongo_get_product_archive_number_of_product();
            if( ! empty( $hongo_product_archive_page_per_page ) ) {
                $per_page = esc_attr( $hongo_product_archive_page_per_page );
            }

            return $per_page;
        }
    }

    /* Display product title with alternate font for shop or archive page */
    if ( ! function_exists( 'hongo_template_loop_product_title' ) ) {

        /**
         * Show the product title in the product loop. By default this is an H2.
         */
        function hongo_template_loop_product_title() {
            echo '<h2 class="woocommerce-loop-product__title alt-font">' . esc_html( get_the_title() ) . '</h2>';
        }
    }

    /* Display category title with alternate font for shop or archive page */
    if ( ! function_exists( 'hongo_template_loop_category_title' ) ) {

        /**
         * Show the subcategory title in the product loop.
         *
         * @param object $category Category object.
         */
        function hongo_template_loop_category_title( $category ) {

            echo '<h2 class="woocommerce-loop-category__title alt-font">';

                echo esc_html( $category->name );

                if ( $category->count > 0 ) {
                    echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
                }

            echo '</h2>';
        }
    }

    /* Top Filter Sidebar */
    add_action( 'woocommerce_before_shop_loop','hongo_top_filter_sidebar_content', 35 );

    if ( ! function_exists('hongo_top_filter_sidebar_content')) {
        function hongo_top_filter_sidebar_content() {
            if ( !( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) {
                return;
            }
            $hongo_enable_shop_top_filter_sidebar = get_theme_mod( 'hongo_enable_shop_top_filter_sidebar', '0' );
            $hongo_enable_shop_off_canvas_filter_sidebar = get_theme_mod( 'hongo_enable_shop_off_canvas_filter_sidebar', '0' );
            
            // Enable top filter using passing parameter like ?filter=1
            $hongo_enable_shop_top_filter_sidebar = apply_filters( 'hongo_enable_shop_top_filter', $hongo_enable_shop_top_filter_sidebar );

            // Enable top filter using passing parameter like ?off_canvas=1
            $hongo_enable_shop_off_canvas_filter_sidebar = apply_filters( 'hongo_enable_shop_off_canvas_filter', $hongo_enable_shop_off_canvas_filter_sidebar );

            $hongo_shop_top_filter_sidebar = get_theme_mod( 'hongo_shop_top_filter_sidebar', 'hongo-shop-top' );

            if ( $hongo_enable_shop_top_filter_sidebar == '1' && hongo_check_active_sidebar( $hongo_shop_top_filter_sidebar ) ) {
                
                $off_canvas_filter_class = $hongo_enable_shop_off_canvas_filter_sidebar == '1' ? ' hongo-off-canvas-filter-sidebar' : ' hongo-top-filter-sidebar';

                echo'<div class="hongo-top-shop-filter alt-font">';
                    $hongo_top_filter_text = apply_filters( 'hongo_top_filter_text', esc_html__( 'Filters', 'hongo' ) );
                    echo '<span class="ti-plus"></span>' . $hongo_top_filter_text;
                echo'</div>';

                echo '<div class="hongo-top-shop-filter-overlay"></div>';
                echo '<div class="col-md-12 col-xs-12 sidebar hongo-woocommerce-top-sidebar' . esc_attr( $off_canvas_filter_class ) . '">';
                    if ( $hongo_enable_shop_off_canvas_filter_sidebar == '1' ) {

                        echo '<div class="top-sidebar-heading">';
                            echo '<span class="alt-font">' . esc_html__( 'Filter', 'hongo' ) . '</span>';
                            echo '<span class="alt-font"><a class="hongo-close-filter-sidebar" href="javascript:void(0);">X</a></span>';
                        echo '</div>';
                    }
                    echo '<div class="top-sidebar-scroll">';
                        echo '<div class="top-sidebar-scroll-full">';
                            hongo_page_sidebar_style( $hongo_shop_top_filter_sidebar );
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
    }

     /* Sidebar Button in ipad */
    add_action( 'hongo_shop_content_part_start','hongo_left_right_sidebar_content', 27 );

    if ( ! function_exists('hongo_left_right_sidebar_content')) {
        function hongo_left_right_sidebar_content() {
            $hongo_product_archive_layout_setting = get_theme_mod( 'hongo_product_archive_layout_setting', 'hongo_layout_left_sidebar' );
            // Filter for change layout style for ex. ?sidebar=hongo_layout_right_sidebar
            $hongo_product_archive_layout_setting = apply_filters( 'hongo_page_layout_style', $hongo_product_archive_layout_setting );

            if( $hongo_product_archive_layout_setting == 'hongo_layout_left_sidebar' || $hongo_product_archive_layout_setting == 'hongo_layout_both_sidebar' ) {

                echo '<div class="hongo-left-common-sidebar-link alt-font">';
                    $hongo_left_sidebar_text = apply_filters( 'hongo_left_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) );
                    echo '<i class="fa-solid fa-bars"></i>' . $hongo_left_sidebar_text;
                echo '</div>';
            }

            if( $hongo_product_archive_layout_setting == 'hongo_layout_right_sidebar' || $hongo_product_archive_layout_setting == 'hongo_layout_both_sidebar' ) {

                echo '<div class="hongo-right-common-sidebar-link alt-font">';
                    $hongo_right_sidebar_text = apply_filters( 'hongo_right_sidebar_text', esc_html__( 'Show Sidebar', 'hongo' ) );
                    echo '<i class="fa-solid fa-bars"></i>' . $hongo_right_sidebar_text;
                echo '</div>';
            }

        }
    }

    /* WordPress Shop Rich Snippet Code */
    add_action( 'woocommerce_before_shop_loop', 'hongo_override_shop_page_rich_snippet_code' );
    if ( ! function_exists( 'hongo_override_shop_page_rich_snippet_code' ) ) {
        function hongo_override_shop_page_rich_snippet_code() {

            if( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) { // Check if product shop page

                $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
                $hongo_product_archive_page_rich_snippet = hongo_option( 'hongo_product_archive_page_rich_snippet', '1' );

                if ( 1 == $hongo_product_archive_page_rich_snippet ) {
                    echo '<div class="hongo-rich-snippet display-none">';
                        echo '<span class="entry-title">' . woocommerce_page_title( false ) . '</span>';
                        echo '<span class="author vcard"><a class="url fn n" href=' . esc_url( $author_url ) . '>' . esc_html( get_the_author() ) . '</a></span>';
                        echo '<span class="published">' . esc_html( get_the_date() ) . '</span><time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';
                    echo '</div>';
                }
            }
        }
    }

    /* WC product structured data on archive page */
    if ( ! function_exists( 'hongo_woocommerce_before_main_content' ) ) {
        function hongo_woocommerce_before_main_content() {

            if( class_exists( 'WC_Structured_Data' ) ) {

                $wc_structured_data = new WC_Structured_Data();
                add_action( 'woocommerce_shop_loop', array( $wc_structured_data, 'generate_product_data' ) );
            }
        }
    }
    add_action( 'woocommerce_archive_description', 'hongo_woocommerce_before_main_content' );
}

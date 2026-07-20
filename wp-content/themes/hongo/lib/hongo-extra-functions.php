<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if WooCommerce is Active.*/
if ( ! function_exists( 'hongo_is_woocommerce_activated' ) ) {
    function hongo_is_woocommerce_activated() {
        return class_exists( 'WooCommerce' ) ? true : false;
    }
}

/* Check if Hongo Addons is Active.*/
if ( ! function_exists( 'hongo_is_hongo_addons_activated' ) ) {
    function hongo_is_hongo_addons_activated() {
        return class_exists( 'Hongo_Addons' ) ? true : false;
    }
}

// Check theme license activate
if ( ! function_exists( 'hongo_is_theme_license_active' ) ) {
    function hongo_is_theme_license_active() {

        $multisite = is_multisite();
        // For Multisite
        if( $multisite ) {
            $hongo_is_theme_license_active = get_site_option( 'hongo_theme_active' );
        } else {
            $hongo_is_theme_license_active = get_option( 'hongo_theme_active' );
        }

        if ( $hongo_is_theme_license_active == 'yes' ) {
            return true;
        } else {
            return false;
        }
    }
}

if ( ! function_exists( 'hongo_option' ) ) {
    function hongo_option( $option, $default_value ) {
        global $post;

        $hongo_option_value = '';
        if ( is_404() ) {
            $hongo_option_value = get_theme_mod( $option, $default_value );
        } else {
            if ( ( ! ( is_category() || is_archive() || is_author() || is_tag() || is_search() || is_home() ) || ( hongo_is_woocommerce_activated() && is_shop() ) ) && isset( $post->ID ) ) {

                // Meta Prefix
                $meta_prefix = '_';

                if( hongo_is_woocommerce_activated() && is_shop() ) {
                    $page_id = wc_get_page_id( 'shop' );
                    $shop_option = str_replace( '_product_archive_', '_page_', $option );
                    $value = get_post_meta( $page_id, $meta_prefix.$shop_option.'_single', true);
                } else {
                    $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
                }

                if ( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                    if ( strtolower( $value ) == '.' ) {
                        $hongo_option_value = '';
                    } else {
                        $hongo_option_value = $value;
                    }
                } else {
                    $hongo_option_value = get_theme_mod( $option, $default_value );
                }
            } else {
                $hongo_option_value = get_theme_mod( $option, $default_value );
            }
        }
        return $hongo_option_value;
    }
}

if ( ! function_exists( 'hongo_builder_customize_option' ) ) {
    function hongo_builder_customize_option( $option, $default_value, $general_option = false ) {

        if ( $general_option ) {

            return get_theme_mod( $option, $default_value );
        }

        if ( is_404() ) { // if 404 page

            $hongo_option_value = get_theme_mod( $option . '_404_page', $default_value );

        } else if ( hongo_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) { // if WooCommerce plugin is activated and WooCommerce category, brand, shop page

            $hongo_option_value = get_theme_mod( $option . '_product_archive', $default_value );

        } elseif ( hongo_is_woocommerce_activated() && is_product() ) { // if WooCommerce plugin is activated and WooCommerce product page

            $hongo_option_value = get_theme_mod( $option . '_single_product', $default_value );
            
        } elseif ( is_search() || is_category() || is_archive() || is_tag() ) { // if Post category, tag, archive page

            $hongo_option_value = get_theme_mod( $option . '_archive', $default_value );
            
        } elseif ( is_home() ) { // if Home page

            $hongo_option_value = get_theme_mod( $option . '_default', $default_value );
            
        } elseif ( is_single() ) { // if single post

            $hongo_option_value = get_theme_mod( $option . '_single_post', $default_value );
            
        } elseif ( is_page() ) { // if single page

            $hongo_option_value = get_theme_mod( $option . '_single_page', $default_value );
            
        } else {

            $hongo_option_value = get_theme_mod( $option, $default_value );
        }

        if ( $hongo_option_value == '' ) {
            $hongo_option_value = get_theme_mod( $option, $default_value );
        }

        return $hongo_option_value;
    }
}

if ( ! function_exists( 'hongo_builder_option' ) ) {
    function hongo_builder_option( $option, $default_value, $general_option = false ) {
        global $post;

        $hongo_option_value = '';
        if ( is_404() ) {
            $hongo_option_value = hongo_builder_customize_option( $option, $default_value, $general_option );
        } else {
            if ( ( ! ( is_category() || is_archive() || is_author() || is_tag() || is_search() || is_home() ) || ( hongo_is_woocommerce_activated() && is_shop() ) ) && isset( $post->ID ) ) {

                // Meta Prefix
                $meta_prefix = '_';

                if( hongo_is_woocommerce_activated() && is_shop() ) {
                    $page_id = wc_get_page_id( 'shop' );
                    $option = str_replace( '_product_archive_', '_page_', $option );
                    $value = get_post_meta( $page_id, $meta_prefix.$option.'_single', true);
                } else {
                    $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
                }

                if ( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                    if ( strtolower( $value ) == '.' ) {
                        $hongo_option_value = '';
                    } else {
                        $hongo_option_value = $value;
                    }
                } else {
                    $hongo_option_value = hongo_builder_customize_option( $option, $default_value, $general_option );
                }
            } else {
                $hongo_option_value = hongo_builder_customize_option( $option, $default_value, $general_option );
            }
        }

        // WPMl workaround for compsupp-6825
        if ( class_exists( 'Sitepress' ) ) {
            if ( $option == "hongo_header_section" || $option == "hongo_footer_section" || $option == "hongo_mini_header_section" || $option == "hongo_header_top_section" ) {
                $hongo_option_value = apply_filters( 'wpml_object_id', $hongo_option_value, 'hongobuilder', TRUE  );
            }
        }

        return $hongo_option_value;
    }
}

if ( ! function_exists( 'hongo_post_meta_by_id' ) ) {
    function hongo_post_meta_by_id( $id, $option ) {
        if ( !$id ) {
           return;
        }
        // Meta Prefix
        $meta_prefix = '_';
        
        $value = get_post_meta( $id, $meta_prefix.$option, true);
        return $value;
    }
}

if ( ! function_exists( 'hongo_post_meta' ) ) {
    function hongo_post_meta( $option ) {
        global $post;

        // Meta Prefix
        $meta_prefix = '_';
        
        $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
        return $value;
    }
}

/* Post Next Previous Navigation */
if( ! function_exists( 'hongo_single_post_navigation' ) ) {
    function hongo_single_post_navigation() {

        $hongo_single_post_prev_text = apply_filters( 'hongo_single_post_prev_text', esc_html__( 'Previous Post', 'hongo' ) );
        $hongo_single_post_next_text = apply_filters( 'hongo_single_post_next_text', esc_html__( 'Next Post', 'hongo' ) );

        $prev_url = get_previous_post_link('<i class="ti-arrow-left blog-nav-icon"></i> %link', $hongo_single_post_prev_text );
        $next_url = get_next_post_link('%link <i class="ti-arrow-right blog-nav-icon"></i>', $hongo_single_post_next_text );

        // Previous Link
        if( ! empty( $prev_url ) ) {
            echo '<div class="blog-nav-link blog-nav-link-prev">';
                printf( '%s', $prev_url );
            echo '</div>';
        }

        // Next Link
        if( ! empty( $next_url ) ) {
            echo '<div class="blog-nav-link blog-nav-link-next">';
                printf( '%s', $next_url );
            echo '</div>';
        }        
    }
}

/* Check For Product Brand, Product Tag, Product Category, Category & Tag Title */
if ( ! function_exists( 'hongo_taxonomy_title_option' ) ) {
    function hongo_taxonomy_title_option( $option, $default_value ) {
        
        $hongo_option_value = '';
        $hongo_t_id = ( is_tax('product_cat') || is_tax('product_tag') || is_tax( 'product_brand' ) || is_tag() ) ? get_queried_object()->term_id : get_query_var('cat');
        
        $value = get_term_meta( $hongo_t_id, $option, true);
       
        if ( strlen( $value ) > 0 && ( $value != 'default' ) && ( is_category() || is_tag() || is_tax('product_cat') || is_tax( 'product_brand' ) || is_tax('product_tag') ) && ! ( is_author() || is_search() ) ) {
            $hongo_option_value = $value;
        } else {
            $hongo_option_value = get_theme_mod( $option, $default_value );
        }

        return $hongo_option_value;
    }
}

/* For Image Alt Text */
if ( ! function_exists( 'hongo_option_image_alt' ) ) {
    function hongo_option_image_alt( $attachment_id ) {

        if ( wp_attachment_is_image( $attachment_id ) == false ) {
            return;
        }

        /* Check image alt is on / off */
        $hongo_image_alt = get_theme_mod( 'hongo_image_alt', '1' );

        if ( $attachment_id && ( $hongo_image_alt == 1 ) ) {
            /* Get attachment metadata by attachment id */
            $hongo_image_meta = array(
                'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
            );
            
            return $hongo_image_meta;
        } else {
            return;
        }
    }
}

/* For Image Title Text */
if ( ! function_exists( 'hongo_option_image_title' ) ) {
    function hongo_option_image_title( $attachment_id ) {

        if ( wp_attachment_is_image( $attachment_id ) == false ) {
            return;
        }

        /* Check image title is on / off */
        $hongo_image_title = get_theme_mod( 'hongo_image_title', '0' );
        
        if ( $attachment_id && ( $hongo_image_title == 1 ) ) {
            /* Get attachment metadata by attachment id */
            $hongo_image_meta = array(
                'title' =>  esc_attr( get_the_title( $attachment_id ) ),
            );

            return $hongo_image_meta;
        } else {
            return;
        }
    }
}

/* For Lightbox Image Title */
if ( ! function_exists( 'hongo_option_lightbox_image_title' ) ) {
    function hongo_option_lightbox_image_title( $attachment_id ) {

        if ( wp_attachment_is_image( $attachment_id ) == false ) {
            return;
        }

        /* Check image title for lightbox popup */
        $hongo_image_title_lightbox_popup = get_theme_mod( 'hongo_image_title_lightbox_popup', '0' );

        if ( $attachment_id && ( $hongo_image_title_lightbox_popup == 1 ) ) {

            /* Get attachment metadata by attachment id */
            $attachment = get_post( $attachment_id );
            $hongo_image_meta = array(
                'title' =>  esc_attr( get_the_title( $attachment_id ) ),
            );

            return $hongo_image_meta;
        } else {
            return;
        }
    }
}

/* For Lightbox Image Caption */
if ( ! function_exists( 'hongo_option_lightbox_image_caption' ) ) {
    function hongo_option_lightbox_image_caption( $attachment_id ) {

        if ( wp_attachment_is_image( $attachment_id ) == false ) {
            return;
        }

        /* Check image alt is on / off */
        $hongo_image_caption_lightbox_popup = get_theme_mod( 'hongo_image_caption_lightbox_popup', '1' );

        if ( $attachment_id && ( $hongo_image_caption_lightbox_popup == 1 ) ) {
            /* Get attachment metadata by attachment id */
            $attachment = get_post( $attachment_id );
            $hongo_image_meta = array(
                'caption' =>  esc_attr( $attachment->post_excerpt ),
            );
            
            return $hongo_image_meta;
            
        } else {
            return;
        }
    }
}

/* For Get image srcset and sizes */
if ( ! function_exists( 'hongo_get_image_srcset_sizes' ) ) {
    function hongo_get_image_srcset_sizes( $attachment_id, $image_srcset ) {

        $srcset_data = $sizes_data = '';
        $srcset = ! empty( $attachment_id ) ? wp_get_attachment_image_srcset( $attachment_id, $image_srcset ) : '';
        if ( $srcset ) {
            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
        }

        if ( $srcset_data ) {
            $sizes = ! empty( $attachment_id ) ? wp_get_attachment_image_sizes( $attachment_id, $image_srcset ) : '';
            if ( $sizes ) {
                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
            }
        }

        return $srcset_data.$sizes_data;
    }
}

/* For Get image html by image ID */
if ( ! function_exists( 'hongo_get_image_html' ) ) {
    function hongo_get_image_html( $image_id, $image_size = 'full', $classes = '' ) {

        $html = $class_list = '';
        if ( $image_id ) {

            // Image alt, title, caption
            $img_alt        = ! empty( $image_id ) ? hongo_option_image_alt( $image_id ) : '';
            $img_title      = ! empty( $image_id ) ? hongo_option_image_title( $image_id ) : '';
            $image_alt      = ! empty( $img_alt['alt'] ) ? $img_alt['alt'] : ''; 
            $image_title    = ! empty( $img_title['title'] ) ? $img_title['title'] : '';
            
            $image_url      = ! empty( $image_id ) ? wp_get_attachment_url( $image_id ) : '';

            if ( $classes ) {
                if ( is_array( $classes ) ) {

                    $class_list = ' ' . implode( ' ', $classes );

                } else {
                    
                    $class_list = ' ' . trim( $classes, ' ' );
                }
            }

            $img_attr = array(
                'title' => $image_title,
                'alt'   => $image_alt,
                'class' => $class_list,
            );

            $html .= wp_get_attachment_image( $image_id, $image_size, false, $img_attr );
        }
        return $html;
    }
}

/* Breadcrumb Title Heading on/off */
if( ! function_exists( 'hongo_enable_before_breadcrumb_heading' ) ) {
    function hongo_enable_before_breadcrumb_heading( $atts ) {

        if ( is_search() || is_category() || is_archive() || is_tag() ) {
            $hongo_archive_enable_breadcrumb_heading = get_theme_mod( 'hongo_archive_enable_breadcrumb_heading', '1' );
            if( $hongo_archive_enable_breadcrumb_heading == '0' ) {
                $atts['last']['title'] = '';
            }
        } elseif( is_home() || is_front_page() ) {
            $hongo_default_enable_breadcrumb_heading = get_theme_mod( 'hongo_default_enable_breadcrumb_heading', '1' );
            if( $hongo_default_enable_breadcrumb_heading == '0' ) {
                $atts['last']['title'] = '';
            }
        } elseif( is_single() ) { // Single Post
            $hongo_single_post_enable_breadcrumb_heading = hongo_option( 'hongo_single_post_enable_breadcrumb_heading', '1' );
            if( $hongo_single_post_enable_breadcrumb_heading == '0' ) {
                $atts['last']['title'] = '';
            }
        } else {
            $hongo_page_enable_breadcrumb_heading = hongo_option( 'hongo_page_enable_breadcrumb_heading', '1' );
            if( $hongo_page_enable_breadcrumb_heading == '0' ) {
                $atts['last']['title'] = '';
            }
        }
        return $atts;
    }
}

/* Page title option for individual pages */
if ( ! function_exists( 'hongo_breadcrumb_display' ) ) {
    function hongo_breadcrumb_display() {
        
        if ( hongo_is_woocommerce_activated() && ( is_product() || is_product_category() || is_tax('product_brand') || is_shop() || is_product_tag() ) ) {// if WooCommerce plugin is activated and WooCommerce category, brand, shop page

            ob_start();
                do_action('hongo_woocommerce_breadcrumb');
            return ob_get_clean();

        } elseif ( class_exists( 'Hongo_Breadcrumb_Navigation' ) ) {

            add_filter( 'hongo_breadcrumb_before_dispaly_args', 'hongo_enable_before_breadcrumb_heading' );

            $breadcrumb_title_blog = esc_html__( 'Home', 'hongo' );
            $breadcrumb_title_home = esc_html__( 'Home', 'hongo' );

            $hongo_breadcrumb = new Hongo_Breadcrumb_Navigation;
            $hongo_breadcrumb->opt['static_frontpage'] = false;
            $hongo_breadcrumb->opt['url_blog'] = '';
            $hongo_breadcrumb->opt['title_blog'] = apply_filters( 'hongo_breadcrumb_title_blog', $breadcrumb_title_blog );
            $hongo_breadcrumb->opt['title_home'] = apply_filters( 'hongo_breadcrumb_title_home', $breadcrumb_title_home );
            $hongo_breadcrumb->opt['separator'] = '';
            $hongo_breadcrumb->opt['tag_page_prefix'] = '';
            $hongo_breadcrumb->opt['singleblogpost_category_display'] = false;

            return $hongo_breadcrumb->hongo_display_breadcrumb();
        }
    }    
}

/* Main function load font list with google fonts */
if ( ! function_exists( 'hongo_font_list' ) ) {
    function hongo_font_list( $subsets = array() ) {
        return apply_filters( 'hongo_font_list', array(), $subsets );
    }
}

/* AJAX function load font list based on subsets in google fonts */
if ( ! function_exists( 'hongo_font_list_ajax' ) ) {
    function hongo_font_list_ajax() {
        $subsets = ! empty( $_POST['subsets'] ) ? json_decode( $_POST['subsets'] ) : array( 'latin' );
        $all_fonts = hongo_font_list( $subsets );
        
        $output = '';
        if ( $all_fonts ) {
            $output .= '<option value="">' . esc_html__( 'Select', 'hongo' ) . '</option>';
            foreach ( $all_fonts as $label => $values ) {
                $output .= '<optgroup label="'.ucfirst( esc_attr( $label ) ).'">';
                    foreach ( $values as $key => $value ) {
                        $output .= '<option value="' . esc_attr( $key ) . '">' . $value . '</option>';
                    }
                $output .= '</optgroup>';
            }

            echo sprintf( '%s', $output );
        }
        die();
    }
}
add_action( 'wp_ajax_font_list', 'hongo_font_list_ajax' );

/* Main function adobe font list */
if ( ! function_exists( 'hongo_adobe_font_list' ) ) {
    function hongo_adobe_font_list() {
        
        $hongo_enable_adobe_font = get_theme_mod( 'hongo_enable_adobe_font', '0' );
        $hongo_adobe_font_typekit_id = get_theme_mod( 'hongo_adobe_font_typekit_id' );
        $fonts_data = array();

        $multisite = is_multisite();
            
        // For Multisite
        if ( $multisite ) {
            $adobe_font_typekit_id = get_site_option( 'hongo_adobe_font_typekit_id' );
        } else {
            $adobe_font_typekit_id = get_option( 'hongo_adobe_font_typekit_id' );
        }

        // When change typekit id that time delete transient
        if ( $adobe_font_typekit_id != $hongo_adobe_font_typekit_id ) {
            // For multisite
            if ( $multisite ) {
                delete_site_transient( 'hongo_adobe_fonts_transient' );
            } else {
                delete_transient( 'hongo_adobe_fonts_transient' );
            }
        }

        if ( $hongo_enable_adobe_font == '1' && $hongo_adobe_font_typekit_id  ) {
            // For Multisite
            if ( $multisite ) {
                $adobe_font_transient = get_site_transient( 'hongo_adobe_fonts_transient' );
            } else {
                $adobe_font_transient = get_transient( 'hongo_adobe_fonts_transient' );
            }
            if ( false == $adobe_font_transient ) {
                $typekit_uri  = 'https://typekit.com/api/v1/json/kits/' . $hongo_adobe_font_typekit_id . '/published';

                $response = wp_remote_get( $typekit_uri, array( 'timeout' => '1000' ) );
                if ( ! empty( $response ) && ! is_wp_error( $response ) ) {
                    $fonts_data     = json_decode( wp_remote_retrieve_body( $response ), true );

                    // For multisite
                    if ( $multisite ) {
                        set_site_transient( 'hongo_adobe_fonts_transient', $fonts_data, 24 * HOUR_IN_SECONDS  );
                        update_site_option( 'hongo_adobe_font_typekit_id', $hongo_adobe_font_typekit_id );
                        update_site_option( 'hongo_adobe_font_list', $fonts_data );
                    } else { 
                        set_transient( 'hongo_adobe_fonts_transient', $fonts_data, 24 * HOUR_IN_SECONDS  );
                        update_option( 'hongo_adobe_font_typekit_id', $hongo_adobe_font_typekit_id );
                        update_option( 'hongo_adobe_font_list', $fonts_data );
                    }
                } else{
                    if( $multisite ) {
                        $fonts_data = get_site_option( 'hongo_adobe_font_list' );
                    } else {
                        $fonts_data = get_option( 'hongo_adobe_font_list' );
                    }
                }
            } else {
                if( $multisite ) {
                    $fonts_data = get_site_option( 'hongo_adobe_font_list' );
                } else {
                    $fonts_data = get_option( 'hongo_adobe_font_list' );
                }
            }
        }
        return $fonts_data;
    }
}

/* Adobe font family list */
if ( ! function_exists( 'hongo_adobe_font_family_list' ) ) {
    function hongo_adobe_font_family_list() {

        $data = hongo_adobe_font_list();
        $adobe_fonts = array();

        if ( ! empty( $data['kit']['families'] ) ) {
            $families = $data['kit']['families'];
        }

        if ( ! empty( $families ) ) {
            foreach ( $families as $family ) {
                if ( ! empty( $family['css_names'][0] ) && ! empty ( $family['name'] ) ) {
                    $adobe_fonts[ $family['css_names'][0] ] = $family['name'];
                }
            }
        }

        return $adobe_fonts;
    }
}

/* Adobe font family list add in list */
if ( ! function_exists( 'hongo_adobe_kit_font_add' ) ) {
    function hongo_adobe_kit_font_add( $fonts_array ) {
        
        $adobe_fonts = hongo_adobe_font_family_list();
        if ( ! empty( $adobe_fonts ) ) {
            $fonts_array['Adobe fonts'] = $adobe_fonts;
        }
        return $fonts_array;
    }
}
add_filter( 'hongo_font_list', 'hongo_adobe_kit_font_add' );

/* Custom font family list add in list */
if ( ! function_exists( 'hongo_custom_font_add' ) ) {
    function hongo_custom_font_add( $fonts_array ) {
        $custom_fonts = array();
        $hongo_custom_fonts = get_theme_mod('hongo_custom_fonts');
        $hongo_custom_fonts = ! empty( $hongo_custom_fonts ) ? json_decode( $hongo_custom_fonts ) : array();
        if ( ! empty( $hongo_custom_fonts ) ) {
            foreach ( $hongo_custom_fonts as $key => $hongo_custom_font ) {
                if ( ! empty( $hongo_custom_font[0] ) ) {

                    $custom_fonts[ $hongo_custom_font[0] ] = $hongo_custom_font[0];
                }
            } 
        }
        if ( ! empty( $custom_fonts ) ) {
            $fonts_array['Custom fonts'] = $custom_fonts;
        }
        return $fonts_array;
    }
}
add_filter( 'hongo_font_list', 'hongo_custom_font_add' );

if ( ! function_exists( 'hongo_enqueue_fonts_url' ) ) {
    function hongo_enqueue_fonts_url() {

        /*
         * Load google font
         */
        $hongo_font_list        = array();
        $hongo_font_subsets     = '';

        $hongo_enable_main_font = get_theme_mod( 'hongo_enable_main_font', '1' );
        $hongo_enable_alt_font  = get_theme_mod( 'hongo_enable_alt_font', '1' );
        $hongo_main_font        = get_theme_mod( 'hongo_main_font', 'Source Sans Pro' );
        $hongo_alt_font         = get_theme_mod( 'hongo_alt_font', 'Poppins' );
        $hongo_main_font_weight = get_theme_mod( 'hongo_main_font_weight', array( '300', '400', '600', '700', '800', '900' ) );
        $hongo_alt_font_weight  = get_theme_mod( 'hongo_alt_font_weight', array( '300', '400', '500', '600', '700', '800', '900' ) );
        $hongo_main_font_subsets= get_theme_mod( 'hongo_main_font_subsets', array( 'latin-ext' ) );
        $hongo_main_font_display= get_theme_mod( 'hongo_main_font_display', 'swap' );

        $font_list = hongo_font_list();
        $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

        /* Enable Main Font And Check Also Select Google Font */
        if ( $hongo_enable_main_font && $hongo_main_font && array_key_exists( $hongo_main_font, $google_font_list ) ) {

            /* For Main Font Weight */
            if ( ! empty( $hongo_main_font_weight ) ) {
                $hongo_main_font_weight = implode( ',', $hongo_main_font_weight );
                $hongo_font_list[] = $hongo_main_font.':'.$hongo_main_font_weight;
            } else {
                $hongo_font_list[] = $hongo_main_font;
            }

            /* For Main Font Subsets */
            if ( ! empty( $hongo_main_font_subsets ) ) {
                $hongo_font_subsets = implode( ',', $hongo_main_font_subsets );
            } else {
                $hongo_font_subsets = false;
            }
        }

        /* Enable Alt Main Font And Check Also Select Google Font */
        if ( $hongo_enable_alt_font && $hongo_alt_font && array_key_exists( $hongo_alt_font, $google_font_list ) ) {

            /* For Alt Font Weight */
            if ( ! empty( $hongo_alt_font_weight ) ) {
                $hongo_alt_font_weight = implode( ',', $hongo_alt_font_weight );
                $hongo_font_list[] = $hongo_alt_font.':'.$hongo_alt_font_weight;
            } else {
                $hongo_font_list[] = $hongo_alt_font;
            }

            /* For Alt Font Subsets */
            if ( ! empty( $hongo_main_font_subsets ) ) {
                $hongo_font_subsets = implode( ',', $hongo_main_font_subsets );
            } else {
                $hongo_font_subsets = false;
            }
        }

        /* To load another google font */
        $hongo_google_font_list = apply_filters( 'hongo_google_font', array() );
        if ( ! empty( $hongo_google_font_list ) ) {

            $hongo_font_list = array_merge( $hongo_font_list, $hongo_google_font_list );
        }

        /* Check Google Fonts are not empty */
        if ( ! empty( $hongo_font_list ) ) {

            $google_font_args = array(
                        'family' => urlencode( implode( '|', $hongo_font_list ) ),
                        'subset' => ! empty( $hongo_font_subsets ) ? urlencode( $hongo_font_subsets ) : '',
                    );
            if ( ! empty( $hongo_main_font_display ) ) {

                $google_font_args['display'] = $hongo_main_font_display;
            }
            $hongo_google_font_url = add_query_arg( $google_font_args, '//fonts.googleapis.com/css' );

            /* Google Font URL */
            return $hongo_google_font_url;

        } else {

            return;
        }
    }
}

if ( ! function_exists( 'hongo_enqueue_abobe_fonts_url' ) ) {
    function hongo_enqueue_abobe_fonts_url() {
        
        $url = '';
        $adobe_font_list = array();
        $hongo_main_font = get_theme_mod( 'hongo_main_font', 'Source Sans Pro' );
        $hongo_alt_font = get_theme_mod( 'hongo_alt_font', 'Poppins' );

        $font_list = hongo_font_list();
        if ( ! empty( $font_list['Adobe fonts'] ) ) {
            $adobe_font_list = $font_list['Adobe fonts'];
        }

        $hongo_enable_adobe_font = get_theme_mod( 'hongo_enable_adobe_font', '0' );
        $hongo_adobe_font_typekit_id = get_theme_mod( 'hongo_adobe_font_typekit_id' );

        if ( $hongo_enable_adobe_font == '1' && $hongo_adobe_font_typekit_id ) {
            // Check Select Adobe Font
            if ( array_key_exists( $hongo_main_font, $adobe_font_list ) || array_key_exists( $hongo_alt_font, $adobe_font_list ) ) {
                $url = 'https://use.typekit.net/' . $hongo_adobe_font_typekit_id . '.css';
            }
        }

        return $url;
    }
}

if ( ! function_exists( 'hongo_post_category' ) ) {
    function hongo_post_category( $id, $count = '10' ) {

        if ( $id == '' ) {
            return;
        }

        $post_cat = array();
        $post_category = '';
        if ( 'post' === get_post_type() ) {
            $categories = get_the_category( $id );
            $category_counter = 0;
            if ( ! empty( $categories ) ) {
                foreach( $categories as $k => $cat ) {
                    if ( $count == $category_counter ) {
                        break;
                    }
                    $cat_link = get_category_link( $cat->cat_ID );
                    $post_cat[] = '<a rel="category tag" href="'.esc_url( $cat_link ).'">'.esc_html( $cat->name ).'</a>';
                    $category_counter++;
                }
            }
            $post_category = ! empty( $post_cat ) ? implode( ', ', $post_cat ) : '';
        }
        return $post_category;
    }
}

// Get the Post Category
if ( ! function_exists( 'hongo_single_post_meta_category' ) ) {
    function hongo_single_post_meta_category( $id ) {

        if ( $id == '' ) {
            return;
        }

        if ( 'post' == get_post_type() ) {
            $hongo_term_limit = apply_filters( 'hongo_single_post_category_limit', '40' );
            $category_list = hongo_post_category( $id, $hongo_term_limit );
            if ( $category_list ) {
                printf( '<li>%1$s</li>', $category_list );
            }
        }
    }
}

/* Custom Comment Callback */
if ( ! function_exists( 'hongo_comment_callback' ) ) {
    function hongo_comment_callback( $comment, $args, $depth ) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
        ?>
        <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? 'post-comment' : 'parent post-comment' ); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID(); ?>" class="comment-author-wrapper">
        <?php } ?>

            <div class="xs-display-block comment-image-box">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>

            <div class="last-paragraph-no-margin xs-display-block comment-text-box">
                <div class="comment-title-edit-link">
                    <a href="<?php echo esc_url( $author_url ); ?>" class="alt-font"><?php echo get_comment_author(); ?></a>
                    <?php edit_comment_link( esc_html__( '(Edit)', 'hongo' ), '  ', '' ); ?>
                </div>
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <div class="comments-date alt-font">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf( esc_html__('%1$s, %2$s', 'hongo'), get_comment_date(),  get_comment_time() ); ?>
                </div>
                
                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
            </div>
            
            <?php if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'hongo' ); ?></em>
                <br />
            <?php } ?>
        
        <?php if ( 'div' != $args['style'] ) { ?>
        </div>
        <?php } ?>
        <?php
    }
}

/* To get Register Sidebar list in Customize */
if ( ! function_exists( 'hongo_register_sidebar_customizer_array' ) ) {
    function hongo_register_sidebar_customizer_array() {
        global $wp_registered_sidebars;
        if ( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ) {
            $sidebar_array = array();
            $sidebar_array[''] = esc_html__( 'No Sidebar', 'hongo' );
            foreach( $wp_registered_sidebars as $sidebar ) {
                $sidebar_array[ $sidebar['id'] ] = $sidebar['name'];
            }
        }
        return $sidebar_array;
    }
}

/* To get all attributes in customizer size guide */
if( ! function_exists( 'hongo_attributes_array' ) ){
    function hongo_attributes_array(){
        global $product; 
        $attributes = wc_get_attribute_taxonomies();
        $all_attributes = array(
            '' => esc_html__( 'Select', 'hongo' )
        );
        
        if( ! empty( $attributes ) ) {
            foreach ($attributes as $attribute) {
                $attributename = 'pa_'.$attribute->attribute_name;
                $all_attributes[ $attributename ] = __( 'After', 'hongo' ).' '.$attribute->attribute_label;
            }
        }
        return $all_attributes;
    }
}

if ( ! function_exists( 'hongo_page_sidebar_style' ) ) {
    function hongo_page_sidebar_style( $sidebar = '' ) {
        if ( empty( $sidebar ) ) {
            return;
        }

        dynamic_sidebar( $sidebar );
    }
}

/* Custom sanitize function for Validate the multiple checkbox field. */
if ( ! function_exists( 'hongo_sanitize_multiple_checkbox' ) ) {
    function hongo_sanitize_multiple_checkbox( $values ) {
        $hongo_multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
        return ! empty( $hongo_multi_values ) ? array_map( 'sanitize_text_field', $hongo_multi_values ) : array();
    }
}

if ( ! function_exists( 'hongo_remove_wpautop' ) ) {
    function hongo_remove_wpautop( $content, $force_br = true ) {
        if ( $force_br ) {
            $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
        }
        return do_shortcode( shortcode_unautop( $content ) );
    }
}

if ( ! function_exists( 'hongo_get_the_excerpt_theme' ) ) {
    function hongo_get_the_excerpt_theme( $length ) {

        return hongo_Excerpt::hongo_get_by_length($length);
    }
}

if ( ! function_exists( 'hongo_get_the_post_content' ) ) {
    function hongo_get_the_post_content() {

        return apply_filters( 'the_content', get_the_content() );
    }
}

if ( ! function_exists( 'hongo_get_intermediate_image_sizes' ) ) {
    function hongo_get_intermediate_image_sizes() {
        global $wp_version;
        $image_sizes = array('full', 'thumbnail', 'medium', 'medium_large', 'large'); // Standard sizes
        if ( $wp_version >= '4.7.0' ) {
            $_wp_additional_image_sizes = wp_get_additional_image_sizes();
            if ( ! empty( $_wp_additional_image_sizes ) ) {
                $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
            }
            return apply_filters( 'intermediate_image_sizes', $image_sizes );
        } else {
            return $image_sizes;
        }
    }
}

if ( ! function_exists( 'hongo_get_image_sizes' ) ) {
    function hongo_get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            if ( in_array( $_size, array('full', 'thumbnail', 'medium', 'medium_large', 'large') ) ) {
                $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
            } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                $sizes[ $_size ] = array(
                    'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                    'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                    'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                );
            }
        }
        return $sizes;
    }
}

if ( ! function_exists( 'hongo_get_image_size' ) ) {
    function hongo_get_image_size( $size ) {
        $sizes = hongo_get_image_sizes();

        if ( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        }

        return false;
    }
}

/* Check sidebar active */
if ( ! function_exists( 'hongo_check_active_sidebar' ) ) {
    function hongo_check_active_sidebar( $sidebar ) {

        if ( ! empty( $sidebar ) && is_active_sidebar( $sidebar ) ) {
            return true;
        }
        return false;
    }
}

/* Single Post Related Post Block */
if ( ! function_exists( 'hongo_related_posts' ) ) {

    function hongo_related_posts( $post_id ) {
        global $hongo_related_post_srcset;
        $args = '';
               
        $hongo_related_posts_title = hongo_option( 'hongo_related_posts_title', __( 'Related Posts', 'hongo' ) );
        $hongo_no_of_related_posts = hongo_option( 'hongo_no_of_related_posts', '3' );
        $hongo_related_posts_date_format = hongo_option( 'hongo_related_posts_date_format', '' );
        $hongo_related_posts_enable_post_thumbnail = hongo_option( 'hongo_related_posts_enable_post_thumbnail', '1' );
        $hongo_related_posts_enable_date = hongo_option( 'hongo_related_posts_enable_date', '1' );
        $hongo_related_posts_enable_author = hongo_option( 'hongo_related_posts_enable_author', '1' );
        $hongo_related_posts_separator = hongo_option( 'hongo_related_posts_separator', '1' );
        $hongo_related_post_excerpt = hongo_option( 'hongo_related_post_excerpt', '1' );
        $hongo_related_post_excerpt_length = hongo_option( 'hongo_related_post_excerpt_length', '15' );
        $hongo_related_post_srcset = hongo_option( 'hongo_related_post_feature_image_size', 'full' );
        $hongo_no_of_related_posts_columns = hongo_option( 'hongo_no_of_related_posts_columns', '3' );
        $hongo_post_rich_snippet         = hongo_option( 'hongo_post_rich_snippet', '1' );
        
        $column_class = '';
        switch ( $hongo_no_of_related_posts_columns ) {
            case '1':
                $column_class .= ' col-md-12 col-sm-12 col-xs-12 margin-30px-bottom';
                break;
            case '2':
                $column_class .= ' col-md-6 col-sm-6 col-xs-12 margin-30px-bottom';
                break;
            case '4':
                $column_class .= ' col-md-3 col-sm-6 col-xs-12 margin-30px-bottom';
                break;
            case '6':
                $column_class .= ' col-md-2 col-sm-6 col-xs-12 margin-30px-bottom';
                break;    
            default:
                $column_class .= ' col-md-4 col-sm-4 col-xs-12 margin-30px-bottom';
                break;
        }

        $args = array(
            'category__in'          => wp_get_post_categories( $post_id ),
            'ignore_sticky_posts'   => 1,
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $hongo_no_of_related_posts,
            'post__not_in'          => array( $post_id ),
        );

        $recent_post = new WP_Query( $args );
        if ( $recent_post->have_posts() ) {
            if ( $hongo_related_posts_title ) {
                echo '<div class="col-md-12 col-sm-12 col-xs-12">';
                    echo '<span class="related-post-general-title alt-font">'.esc_html( $hongo_related_posts_title ).'</span>';
                echo '</div>';
            }
            echo '<ul class="post-grid">';
                echo '<li class="grid-sizer"></li>';
                while ( $recent_post->have_posts() ) {
                    
                    $recent_post->the_post();

                    $post_category = '';
                    $post_cat = array();

                    $categories = get_the_category();
                    if ( ! empty( $categories ) && !is_wp_error( $categories ) ) {
                        foreach ( $categories as $k => $cat ) {
                            $cat_link = get_category_link( $cat->cat_ID );
                            $post_cat[] = '<a href="'.esc_url( $cat_link ).'" class="hongo-blog-post-meta" rel="category tag">'.esc_html( $cat->name ).'</a>';
                        }
                        $post_category = ! empty( $post_cat ) ? implode( ', ', $post_cat ) : '';
                    }

                    $show_excerpt_grid = ! empty( $hongo_related_post_excerpt_length ) ? hongo_get_the_excerpt_theme($hongo_related_post_excerpt_length) : hongo_get_the_excerpt_theme( 15 );
                    
                    $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

                    /* Get post class and id */
                    $hongo_post_classes = $author_image = '';
                    ob_start();
                        post_class();
                        $hongo_post_classes .= ob_get_contents();
                    ob_end_clean();
                    echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left equalize sm-equalize-auto wow fadeIn'.$column_class.'">';
                        $author_date_array = array();

                        if ( $hongo_related_posts_enable_date == 1 ) {
                            $hongo_related_post_date = get_the_date( $hongo_related_posts_date_format, get_the_ID() );
                            $author_date_array[] = '<span class="published">'.esc_html( $hongo_related_post_date ).'</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">'.esc_html( get_the_modified_date( $hongo_related_posts_date_format ) ).'</time>';
                        }

                        if ( $hongo_related_posts_enable_author == 1 ) {
                            
                            $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                            $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.esc_attr( get_the_author() ).'">';                                
                            
                            $author_date_array[] = '<span class="hongo-related-post-meta">'.esc_html__('BY ','hongo').'<span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">'.esc_html( get_the_author() ).'</a></span></span>';
                        }
                        
                        echo '<div id="post-' . esc_attr( get_the_ID() ) . '" '.$hongo_post_classes.'>';
                            if ( 1 == $hongo_post_rich_snippet ) {
                                echo '<div class="hongo-rich-snippet display-none">';
                                    echo '<span class="entry-title">' . esc_html( get_the_title() ) . '</span>';
                                    echo '<span class="author vcard"><a class="url fn n" href=' . esc_url( $author_url ) . '>' . esc_html( get_the_author() ) . '</a></span>';
                                    echo '<span class="published">' . esc_html( get_the_date() ) .' </span><time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';
                                echo '</div>';
                            }
                            echo '<div class="blog-post-style-related">';
                                if ( has_post_thumbnail() ) {
                                    echo '<div class="blog-post-images blog-image">';
                                        if ( ! post_password_required() ) {
                                            if ( $hongo_related_posts_enable_post_thumbnail == 1 ) {
                                                get_template_part( 'loop/related-post/loop', 'image' );
                                            }
                                        }
                                    echo '</div>';
                                }
                                echo '<div class="post-details blog-text col-md-12">';
                                    echo '<div class="content">';
                                        if ( $post_category ) {
                                            echo '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                        }
                                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-title hongo-related-post-title alt-font entry-title">';
                                            echo esc_html( get_the_title() );
                                        echo '</a>';
                                        if ( $hongo_related_post_excerpt == 1 ) {
                                            echo '<div class="hongo-related-post-content entry-content">'.$show_excerpt_grid.'</div>';
                                        }
                                        if ( $hongo_related_posts_separator == 1 ) {
                                            echo '<div class="separator-line-horizontal-full hongo-related-post-separator"></div>';
                                        }

                                        if ( ! empty( $author_date_array ) ) {
                                            echo '<div class="hongo-blog-post-meta blog-date-author post-author hongo-related-post-meta hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</div>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</li>';
                }
            echo '</ul>';
            wp_reset_postdata();
        }
    }
}

if ( ! function_exists( 'hongo_hex2rgb' ) ) {
    function hongo_hex2rgb( $colour, $opacity = '0.15' ) {
        if ( empty( $colour ) )
            return;
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
    }
}

if ( ! function_exists( 'hongo_animation_style_customizer' ) ) {
    function hongo_animation_style_customizer() {
        $output = '';
        $output = array( '' => __('no style', 'hongo'), 'bounce' => __('bounce', 'hongo'), 'flash' => __('flash', 'hongo'), 'pulse' => __('pulse', 'hongo'), 'rubberBand' => __('rubberBand', 'hongo'), 'shake' => __('shake', 'hongo'), 'swing' => __('swing', 'hongo'), 'tada' => __('tada', 'hongo'), 'wobble' => __('wobble', 'hongo'), 'jello' => __('jello', 'hongo'), 'bounceIn' => __('bounceIn', 'hongo'), 'bounceInDown' => __('bounceInDown', 'hongo'), 'bounceInLeft' => __('bounceInLeft', 'hongo'), 'bounceInRight' => __('bounceInRight', 'hongo'), 'bounceInUp' => __('bounceInUp', 'hongo'), 'bounceOut' => __('bounceOut', 'hongo'), 'bounceOutDown' => __('bounceOutDown', 'hongo'), 'bounceOutLeft' => __('bounceOutLeft', 'hongo'), 'bounceOutRight' => __('bounceOutRight', 'hongo'), 'bounceOutUp' => __('bounceOutUp', 'hongo'), 'fadeIn' => __('fadeIn', 'hongo'), 'fadeInDown' => __('fadeInDown', 'hongo'), 'fadeInDownBig' => __('fadeInDownBig', 'hongo'), 'fadeInLeft' => __('fadeInLeft', 'hongo'), 'fadeInLeftBig' => __('fadeInLeftBig', 'hongo'), 'fadeInRight' => __('fadeInRight', 'hongo'), 'fadeInRightBig' => __('fadeInRightBig', 'hongo'), 'fadeInUp' => __('fadeInUp', 'hongo'), 'fadeInUpBig' => __('fadeInUpBig', 'hongo'), 'fadeOut' => __('fadeOut', 'hongo'), 'fadeOutDown' => __('fadeOutDown', 'hongo'), 'fadeOutDownBig' => __('fadeOutDownBig', 'hongo'), 'fadeOutLeft' => __('fadeOutLeft', 'hongo'), 'fadeOutLeftBig' => __('fadeOutLeftBig', 'hongo'), 'fadeOutRight' => __('fadeOutRight', 'hongo'), 'fadeOutRightBig' => __('fadeOutRightBig', 'hongo'), 'fadeOutUp' => __('fadeOutUp', 'hongo'), 'fadeOutUpBig' => __('fadeOutUpBig', 'hongo'), 'flipInX' => __('flipInX', 'hongo'), 'flipInY' => __('flipInY', 'hongo'), 'flipOutX' => __('flipOutX', 'hongo'), 'flipOutY' => __('flipOutY', 'hongo'), 'lightSpeedIn' => __('lightSpeedIn', 'hongo'), 'lightSpeedOut' => __('lightSpeedOut', 'hongo'), 'rotateIn' => __('rotateIn', 'hongo'), 'rotateInDownLeft' => __('rotateInDownLeft', 'hongo'), 'rotateInDownRight' => __('rotateInDownRight', 'hongo'), 'rotateInUpLeft' => __('rotateInUpLeft', 'hongo'), 'rotateInUpRight' => __('rotateInUpRight', 'hongo'), 'rotateOut' => __('rotateOut', 'hongo'), 'rotateOutDownLeft' => __('rotateOutDownLeft', 'hongo'), 'rotateOutDownRight' => __('rotateOutUpLeft', 'hongo'), 'rotateOutUpRight' => __('rotateOutUpRight', 'hongo'), 'hinge' => __('hinge', 'hongo'), 'rollIn' => __('rollIn', 'hongo'), 'rollOut' => __('rollOut', 'hongo'), 'zoomIn' => __('zoomIn', 'hongo'), 'zoomInDown' => __('zoomInDown', 'hongo'), 'zoomInLeft' => __('zoomInLeft', 'hongo'), 'zoomInRight' => __('zoomInRight', 'hongo'), 'zoomInUp' => __('zoomInUp', 'hongo'), 'zoomOut' => __('zoomOut', 'hongo'), 'zoomOutDown' => __('zoomOutDown', 'hongo'), 'zoomOutLeft' => __('zoomOutLeft', 'hongo'), 'zoomOutRight' => __('zoomOutRight', 'hongo'), 'zoomOutUp' => __('zoomOutUp', 'hongo'), 'slideInDown' => __('slideInDown', 'hongo'), 'slideInLeft' => __('slideInLeft', 'hongo'), 'slideInRight' => __('slideInRight', 'hongo'), 'slideInUp' => __('slideInUp', 'hongo'), 'slideOutDown' => __('slideOutDown', 'hongo'), 'slideOutLeft' => __('slideOutLeft', 'hongo'), 'slideOutRight' => __('slideOutRight', 'hongo'), 'slideOutUp' => __('slideOutUp', 'hongo') );
        return $output;
    }
}

if ( ! function_exists( 'hongo_extract_shortcode_contents' ) ) {
    /**
     * Extract text contents from all shortcodes for usage in excerpts
     *
     * @return string The shortcode contents
     **/
    function hongo_extract_shortcode_contents( $m ) {
        global $shortcode_tags;

        // Setup the array of all registered shortcodes
        $shortcodes = array_keys( $shortcode_tags );
        $no_space_shortcodes = array( 'dropcap' );
        $omitted_shortcodes  = array( 'slide' );

        // Extract contents from all shortcodes recursively
        if ( in_array( $m[2], $shortcodes ) && ! in_array( $m[2], $omitted_shortcodes ) ) {
            $pattern = get_shortcode_regex();
            // Add space the excerpt by shortcode, except for those who should stick together, like dropcap
            $space = ' ';
            if ( in_array( $m[2], $no_space_shortcodes ) ) {
                $space = '';
            }
            $content = preg_replace_callback( "/$pattern/s", 'hongo_extract_shortcode_contents', rtrim( $m[5] ) . $space );
            return $content;
        }

        // allow [[foo]] syntax for escaping a tag
        if ( $m[1] == '[' && $m[6] == ']' ) {
            return substr( $m[0], 1, -1 );
        }

       return $m[1] . $m[6];
    }
}

// Load stylesheet
if ( ! function_exists( 'hongo_load_stylesheet_by_key' ) ) {
    function hongo_load_stylesheet_by_key( $value ) {
        $flag = true;
        $style_details = hongo_option( 'hongo_disable_style_details', '' );
        if ( ! empty( $style_details ) ) {
            $style_details = explode( ',', $style_details );
            if ( in_array( $value, $style_details ) ) {
                $flag = false;
            } 
        }
        return apply_filters( 'hongo_load_stylesheet_by_key', $flag, $value );
    }
}

// Load javascript
if ( ! function_exists( 'hongo_load_javascript_by_key' ) ) {
    function hongo_load_javascript_by_key( $value ) {
        $flag = true;
        $script_details = hongo_option( 'hongo_disable_script_details', '' );
        if ( ! empty( $script_details ) ) {
            $script_details = explode( ',', $script_details );
            if ( in_array( $value, $script_details ) ) {
                $flag = false;
            } 
        }
        return apply_filters( 'hongo_load_javascript_by_key', $flag, $value );
    }
}

// To add footer style class into row element
if ( ! function_exists( 'hongo_add_row_footer_style_class' ) ) {
    function hongo_add_row_footer_style_class( $class, $footer_style ) {
        if ( ! empty( $footer_style ) ) {

            $class .= 'hongo-footer-' . $footer_style;
        }
        return $class;
    }
}

// Set Parallax  Ratio
if ( ! function_exists( 'hongo_set_parallax_ratio' ) ) {
    function hongo_set_parallax_ratio( $parallax_effect_ratio ) {
        if( empty( $parallax_effect_ratio )){
            return;
        }
        global $is_IE;
        $hongo_parallax_effect_attr = '';
        $parallax_ratio = $parallax_effect_ratio + 1;
        $skrollrStart = ( $is_IE ) ? ( 100 * $parallax_ratio ) - 150 : 100 * $parallax_ratio ;
        $skrollrEnd = -( 50 * $parallax_ratio );

        $hongo_parallax_effect_attr = ' data-start="background-position:0px 0px;" data-end="background-position:0px 0px;" data-bottom-top="background-position:0px '.$skrollrStart.'px;" data-top-bottom="background-position:0px '.$skrollrEnd.'px;"';
        return $hongo_parallax_effect_attr;
    }
}

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
if ( ! function_exists( 'hongo_pingback_header' ) ) {
    function hongo_pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">';
        }
    }
}
add_action( 'wp_head', 'hongo_pingback_header', 1 );


if ( ! function_exists( 'hongo_variation_is_active' ) ) {
    function hongo_variation_is_active( $active, $variation ) {
        if( ! $variation->is_in_stock() ) {
            return false;
        }
        return $active;
    }
}
// add_filter( 'woocommerce_variation_is_active', 'hongo_variation_is_active', 10, 2 );

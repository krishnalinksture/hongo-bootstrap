<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if WooCommerce is Active.*/
if ( ! function_exists( 'hongo_is_woocommerce_activated' ) ) {
    function hongo_is_woocommerce_activated() {
        return class_exists( 'WooCommerce' ) ? true : false;
    }
}

/* Check if Contact Form 7 is Active. */    
if( ! function_exists( 'hongo_is_contact_form_7_activated' ) ) {
    function hongo_is_contact_form_7_activated() {
        return class_exists( 'WPCF7' ) ? true : false;
    }
}

/* Check if Mailchimp Form is Active. */
if( ! function_exists( 'hongo_is_mailchimp_form_activated' ) ) {
    function hongo_is_mailchimp_form_activated() {
        return class_exists( 'MC4WP_MailChimp' ) ? true : false;
    }
}

/* Check if Revolution slider is Active. */
if( ! function_exists( 'hongo_is_revolution_slider_activated' ) ) {
    function hongo_is_revolution_slider_activated() {
        return class_exists( 'UniteFunctionsRev' ) ? true : false;
    }
}

if ( ! function_exists( 'hongo_option' ) ) {
    function hongo_option( $option, $default_value ) {
        global $post;

        $hongo_option_value = '';
        if ( is_404() ) {
            $hongo_option_value = get_theme_mod( $option, $default_value );
        }else{
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
            }else{
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
        }else{
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
                    $hongo_option_value = hongo_builder_customize_option( $option, $default_value, $general_option );
                }
            }else{
                $hongo_option_value = hongo_builder_customize_option( $option, $default_value, $general_option );
            }
        }

        // WPMl workaround for compsupp-6825
        if ( class_exists( 'Sitepress' )) {
            if ( $option == "hongo_header_section" || $option == "hongo_footer_section" || $option == "hongo_mini_header_section" || $option == "hongo_header_top_section" ) {
                $hongo_option_value = apply_filters( 'wpml_object_id', $hongo_option_value, 'hongobuilder', TRUE  );
            }
        }

        return $hongo_option_value;
    }
}

/* Meta add for address bar color */
add_action( 'wp_head', 'hongo_addons_wp_head_meta' );

if ( ! function_exists( 'hongo_addons_wp_head_meta' ) ) {
    function hongo_addons_wp_head_meta() {

        $hongo_addressbar_color = get_theme_mod( 'hongo_addressbar_color', '' );
        if ( ! empty( $hongo_addressbar_color ) ) {

            //this is for Chrome, Firefox OS, Opera
            echo '<meta name="theme-color" content="'.$hongo_addressbar_color.'">';
            //Windows Phone **
            echo '<meta name="msapplication-navbutton-color" content="'.$hongo_addressbar_color.'">';
        }

        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
            echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
        }
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

/* Check For Product Brand, Product Tag, Product Category, Category & Tag Title */
if ( ! function_exists( 'hongo_taxonomy_title_option' ) ) {
    function hongo_taxonomy_title_option( $option, $default_value ) {
        
        $hongo_option_value = '';
        $hongo_t_id = ( is_tax('product_cat') || is_tax('product_tag') || is_tax( 'product_brand' ) || is_tag() ) ? get_queried_object()->term_id : get_query_var('cat');
        
        $value = get_term_meta( $hongo_t_id, $option , true);
       
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
        }else{
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
        }else{
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
        }else{
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

        }else{
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

if ( ! function_exists( 'hongo_get_thumbnail_image_sizes' ) ) {
    function hongo_get_thumbnail_image_sizes() {

        $thumbnail_image_sizes = array();

        // Hackily add in the data link parameter.
        $hongo_srcset = hongo_get_intermediate_image_sizes();

        if (! empty($hongo_srcset)) {
            foreach ( $hongo_srcset as $value => $label ){

                $key = esc_attr( $label );

                $hongo_srcset_image_data = hongo_get_image_size( $label );
                $width = ( isset( $hongo_srcset_image_data['width'] ) && $hongo_srcset_image_data['width'] != 0 ) ? $hongo_srcset_image_data['width'].'px' : esc_html__( 'Auto', 'hongo-addons' );
                $height = ( isset( $hongo_srcset_image_data['height'] ) && $hongo_srcset_image_data['height'] != 0 ) ? $hongo_srcset_image_data['height'].'px' : esc_html__( 'Auto', 'hongo-addons' );
                if ( $label == 'full' ) {
                    $data = esc_html__( 'Original Full Size', 'hongo-addons' );
                } else {
                    $data = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                }

                $thumbnail_image_sizes[$data] = $key;
            }
        }

        return $thumbnail_image_sizes;
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

/* page title option for individual pages */
if ( ! function_exists( 'hongo_breadcrumb_display' ) ) {
    function hongo_breadcrumb_display() {

        if ( hongo_is_woocommerce_activated() && ( is_product() || is_product_category() || is_tax('product_brand') || is_shop() || is_product_tag() ) ) {// if WooCommerce plugin is activated and WooCommerce category, brand, shop page

            ob_start();
                do_action( 'hongo_woocommerce_breadcrumb' );
            return ob_get_clean();

        } elseif ( class_exists( 'Hongo_Breadcrumb_Navigation' ) ) {

            add_filter( 'hongo_breadcrumb_before_dispaly_args', 'hongo_enable_before_breadcrumb_heading' );

            $hongo_breadcrumb = new Hongo_Breadcrumb_Navigation;
            $hongo_breadcrumb->opt['static_frontpage'] = false;
            $hongo_breadcrumb->opt['url_blog'] = '';
            $hongo_breadcrumb->opt['title_blog'] = esc_html__( 'Home', 'hongo-addons' );
            $hongo_breadcrumb->opt['title_home'] = esc_html__( 'Home', 'hongo-addons' );
            $hongo_breadcrumb->opt['separator'] = '';
            $hongo_breadcrumb->opt['tag_page_prefix'] = '';
            $hongo_breadcrumb->opt['singleblogpost_category_display'] = false;

            return $hongo_breadcrumb->hongo_display_breadcrumb();
        }
    }    
}

/* Navigation link for individual pages */
if ( ! function_exists( 'hongo_addons_navigation_link_display' ) ) {
    function hongo_addons_navigation_link_display() {

        $output = '';

        if ( is_singular() ) {

            $output .= '<div class="hongo-page-navigation-link-wrap">';
                $output .= '<ul class="hongo-page-navigation-link">';
                    
                    // Previous Link
                    $prev_post = get_previous_post();
                    if ( $prev_post ) {
                        $output .= '<li>';
                            $product = wc_get_product( $prev_post->ID );
                            $output .= get_previous_post_link('%link', '<i class="fa-solid fa-angle-left"></i>' ); 
                            $output .= '<div class="hongo-navigation-post-details hongo-navigation-prev-link">';

                                $previous_product_name = (strlen($product->get_name()) > 20) ? substr($product->get_name(),0,20).'...' : $product->get_name();

                                $output .= '<div class="hongo-navigation-product-item">';
                                    $output .= '<div class="left-part-image">';
                                        $output .= '<a href="' . esc_url( $product->get_permalink() ) . '">';
                                            $output .= $product->get_image('thumbnail');
                                        $output .= '</a>';
                                    $output .= '</div>';
                                    $output .= '<div class="right-part-content">';
                                        $output .= '<a href="' . esc_url( $product->get_permalink() ) . '">';
                                            $output .= '<span class="product-title alt-font">' . $previous_product_name . '</span>';
                                        $output .= '</a>';
                                        $output .= $product->get_price_html();
                                    $output .= '</div>';
                                $output .= '</div>';

                            $output .= '</div>';
                        $output .= '</li>';
                    }
                    
                    // Next Link
                    $next_post = get_next_post();
                    if ( ! empty( $next_post ) ) {
                        $output .= '<li>';
                            $output .= get_next_post_link( '%link', '<i class="fa-solid fa-angle-right"></i>' );
                            $output .= '<div class="hongo-navigation-post-details hongo-navigation-next-link">';

                                    $product = wc_get_product( $next_post->ID );
                                    $next_product_name = (strlen($product->get_name()) > 20) ? substr($product->get_name(),0,20).'...' : $product->get_name();
                                    $output .= '<div class="hongo-navigation-product-item">';
                                        $output .= '<div class="left-part-image">';
                                            $output .= '<a href="' . esc_url( $product->get_permalink() ) . '">';
                                                $output .= $product->get_image('thumbnail');
                                            $output .= '</a>';
                                        $output .= '</div>';
                                        $output .= '<div class="right-part-content">';
                                            $output .= '<a href="' . esc_url( $product->get_permalink() ) . '">';
                                                $output .= '<span class="product-title alt-font">' . $next_product_name . '</span>';
                                            $output .= '</a>';
                                            $output .= $product->get_price_html();
                                        $output .= '</div>';
                                    $output .= '</div>';
                                    
                            $output .= '</div>';
                        $output .= '</li>';
                    }

                $output .= '</ul>';
            $output .= '</div>';
        }

        return $output;
    }
}

/* To get Register Sidebar list in metabox */
if ( ! function_exists( 'hongo_register_sidebar_array' ) ) {
    function hongo_register_sidebar_array() {
        global $wp_registered_sidebars;
        $sidebar_array = array();
        if ( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ) { 
            $sidebar_array['default'] = esc_html__( 'Default', 'hongo-addons' );
            $sidebar_array['none']    = esc_html__( 'No Sidebar', 'hongo-addons' );
            foreach( $wp_registered_sidebars as $sidebar ) {
                if ( ! empty( $sidebar ) ) {
                    
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
        }
        return $sidebar_array;
    }
}

/* To get all categories details */
if ( ! function_exists( 'hongo_post_category_array' ) ) {
    function hongo_post_category_array() {

        $categories_array = array();

        $args = array(
            'hide_empty' => 1,
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $categories = get_categories( $args );
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $index => $data ) {
                
                $categories_array[ $data->slug ] = $data->name."- (".$data->slug." - ".$data->term_id.")";
            }
        }
        
        return $categories_array;
    }
}

/* To get all product taxonomy details */
if ( ! function_exists('hongo_product_taxonomy_array') ) {
    function hongo_product_taxonomy_array( $taxonomy = 'product_cat', $select = false ) {

        $product_taxonomy_data = array();

        $args = array(
            'hide_empty'  => false,
        ); 
        $terms = get_terms( $taxonomy, $args );
        
        if ( $select ) {
            $product_taxonomy_data[''] = esc_html__( 'Select', 'hongo-addons' );
        }

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $index => $data ) {

                $product_taxonomy_data[ $data->slug ] = $data->name."- (".$data->slug." - ".$data->term_id.")";
            }
        }
        return $product_taxonomy_data;
    }
}

/* To get all Product brand multiple details */
if ( ! function_exists( 'hongo_product_brand_multiple_array' ) ) {
    function hongo_product_brand_multiple_array() {

        $product_brand_data = array();

        $taxonomy = 'product_brand';
        $args = array(
            'hide_empty'  => false,
        ); 
        $terms = get_terms( $taxonomy, $args );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $index => $data ) {
                if ( $data->count != 0 ) {
                    $product_brand_data[ $data->slug ] = $data->name."- (".$data->slug." - ".$data->term_id.")";
                }
            }
        }
        return $product_brand_data;
    }
}

/* To get all Product list array */
if ( ! function_exists( 'hongo_product_list_array' ) ) {
    function hongo_product_list_array( $select = false ) {

        $product_array = array();

        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'orderby'        => 'title',
            'order'          => 'ASC',
        );

        $product_ids = get_posts( $args );
        if ( $select ) {
            $product_array[''] = esc_html__( 'Select', 'hongo-addons' ); 
        }
        if ( $product_ids ) {

            foreach ( $product_ids as $product_id ) {

                $product_array[$product_id] = html_entity_decode( get_the_title( $product_id ), ENT_QUOTES, 'UTF-8' );
            }
        }

        return $product_array;
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
    function hongo_get_the_excerpt_theme( $length )
    {
        return hongo_Excerpt::hongo_get_by_length($length);
    }
}

if ( ! function_exists( 'hongo_get_the_post_content' ) ) {
    function hongo_get_the_post_content()
    {
        return apply_filters( 'the_content', get_the_content() );
    }
}

// [hongo_single_post_share] Shortcode.
if ( ! function_exists( 'hongo_single_post_share_shortcode' ) ) {
    function hongo_single_post_share_shortcode() {
        global $post;

        if ( !$post ) {
            return false;
        }
        
        $output = $border_bottom = '';
        $hongo_single_post_disable_social_share = hongo_option( 'hongo_single_post_disable_social_share', '1' );
        $hongo_single_post_social_share = hongo_option( 'hongo_single_post_social_sharing', array( 'facebook', '1', 'Facebook', 'twitter', '1', 'Twitter', 'linkedin', '1', 'Linkedin', 'pinterest', '1', 'Pinterest' ) );

        $permalink      = get_permalink( $post->ID );
        $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $featured_image = ( $featuredimage ) ? $featuredimage['0'] : null;
        $post_title     = rawurlencode( get_the_title( $post->ID ) );

        ob_start();
        ?>
        <?php if ( $hongo_single_post_disable_social_share == 1 && ! empty( $hongo_single_post_social_share ) ) { 
            ?>
            <div class="social-icon-style-1 extra-small-icon blog-details-social-sharing">
                <ul>
                    <?php
                        $i = 0; 
                        $count = count( $hongo_single_post_social_share );
                        foreach ($hongo_single_post_social_share as $key => $value) {
                            if ( $i < $count ) {
                                if ( $hongo_single_post_social_share[$i+1] == '1' ) {
                                    switch( $hongo_single_post_social_share[$i] ) {
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $post_title ); ?>"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon x-twitter" href="//twitter.com/share?url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $post_title ); ?>"><i class="fa-brands fa-x-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $post_title ); ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo esc_attr( $post_title ); ?>"><i class="fa-brands fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo esc_url( $permalink ); ?>&amp;media=<?php echo esc_url( $featured_image ); ?>&amp;description=<?php echo esc_attr ( $post_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $post_title ); ?>"><i class="fa-brands fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $post_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-xing"></i><span></span></a></li>
                                        <?php break;

                                        case 'telegram':?>
                                            <li><a class="social-sharing-icon telegram" href="//t.me/share/url?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-telegram-plane"></i><span></span></a></li>
                                        <?php break;

                                        case 'oksocial':?>
                                            <li><a class="social-sharing-icon odnoklassniki" href="//connect.ok.ru/offer?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-odnoklassniki"></i><span></span></a></li>
                                        <?php break;

                                        case 'viber':?>
                                            <li><a class="social-sharing-icon viber" href="//viber://forward?text=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-viber"></i><span></span></a></li>
                                        <?php break;

                                        case 'whatsapp':?>
                                            <li><a class="social-sharing-icon whatsapp" href="//api.whatsapp.com/send?text=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-whatsapp"></i><span></span></a></li>
                                        <?php break;

                                        case 'skype':?>
                                            <li><a class="social-sharing-icon skype" href="//web.skype.com/share?source=button&url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-skype"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
            </div>
        <?php } ?>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode( 'hongo_single_post_share', 'hongo_single_post_share_shortcode' );

// [hongo_single_product_share] Shortcode.
if ( ! function_exists( 'hongo_single_product_share_shortcode' ) ) {
    function hongo_single_product_share_shortcode() {
        global $post;

        if ( !$post ) {
            return false;
        }

        $output = $border_bottom = '';
        
        // To get Single product page style
        $hongo_get_single_content_product_style     = hongo_get_single_content_product_style();
        $hongo_single_product_enable_social_share   = hongo_option( 'hongo_single_product_enable_social_share', '1' );
        $hongo_single_product_share_title           = hongo_option( 'hongo_single_product_share_title', __( 'Share', 'hongo-addons' ) );
        $hongo_single_product_social_share          = hongo_option( 'hongo_single_product_social_sharing', array( 'facebook', '1', 'Facebook', 'twitter', '1', 'Twitter', 'linkedin', '1', 'Linkedin', 'pinterest', '1', 'Pinterest' ) );

        $permalink      = get_permalink( $post->ID );
        $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $featured_image = ( $featuredimage ) ? $featuredimage['0'] : null;
        $product_title     = rawurlencode( get_the_title( $post->ID ) );

        ob_start();
        ?>
        <?php if ( $hongo_single_product_enable_social_share == 1 && ! empty( $hongo_single_product_social_share ) && hongo_is_woocommerce_activated() ) {/* if enable social share & WooCommerce plugin is activated */ ?>
            <div class="social-icon-style-1 very-small-icon products-social-icon">
            <?php
                if ( ! empty( $hongo_single_product_share_title ) ) {
                    echo '<span class="hongo-product-sharebox-title alt-font">'.esc_attr( $hongo_single_product_share_title ).':</span>';
                }
            ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count( $hongo_single_product_social_share );
                        foreach ( $hongo_single_product_social_share as $key => $value ) {
                            if ( $i < $count ) {
                                if ( $hongo_single_product_social_share[$i+1] == '1' ) {
                                    switch($hongo_single_product_social_share[$i]) {
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $product_title ); ?>"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon x-twitter" href="//twitter.com/share?url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $product_title ); ?>"><i class="fa-brands fa-x-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $product_title ); ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo esc_attr( $product_title ); ?>"><i class="fa-brands fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo esc_url( $permalink ); ?>&amp;media=<?php echo esc_url( $featured_image ); ?>&amp;description=<?php echo esc_attr( $product_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr( $product_title ); ?>"><i class="fa-brands fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $product_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $product_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo esc_attr( $product_title ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url( $permalink ); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-xing"></i><span></span></a></li>
                                        <?php break;

                                        case 'telegram':?>
                                            <li><a class="social-sharing-icon telegram" href="//t.me/share/url?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-telegram-plane"></i><span></span></a></li>
                                        <?php break;

                                        case 'oksocial':?>
                                            <li><a class="social-sharing-icon odnoklassniki" href="//connect.ok.ru/offer?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-odnoklassniki"></i><span></span></a></li>
                                        <?php break;

                                        case 'viber':?>
                                            <li><a class="social-sharing-icon viber" href="//viber://forward?text=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-viber"></i><span></span></a></li>
                                        <?php break;

                                        case 'whatsapp':?>
                                            <li><a class="social-sharing-icon whatsapp" href="//api.whatsapp.com/send?text=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-whatsapp"></i><span></span></a></li>
                                        <?php break;

                                        case 'skype':?>
                                            <li><a class="social-sharing-icon skype" href="//web.skype.com/share?source=button&url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fa-brands fa-skype"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
            </div>
        <?php } ?>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode( 'hongo_single_product_share', 'hongo_single_product_share_shortcode' );

// [hongo_login_link] Shortcode.
if ( ! function_exists( 'hongo_login_link_shortcode' ) ) {
    function hongo_login_link_shortcode() {

        $login_page_url = $logout_page_url = '';

        /* if WooCommerce plugin is activated */
        if ( hongo_is_woocommerce_activated() ) {
            $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
            $login_page_url = get_permalink( $myaccount_page_id );
            $logout_page_url = wp_logout_url( $login_page_url );
        } else {
            $login_page_url = wp_login_url();
            $logout_page_url = wp_logout_url();
        }

        if ( is_user_logged_in() ) {

            return '<a href="'.esc_url( $logout_page_url ).'" class="hongo-login-logout-link hongo-logout">' . __( 'Logout', 'hongo-addons' ) . '</a>';

        } else {

            return '<a href="'.esc_url( $login_page_url ).'" class="hongo-login-logout-link hongo-login">' . __( 'Login', 'hongo-addons' ) . '</a>';
        }
    }
}
add_shortcode( 'hongo_login_link', 'hongo_login_link_shortcode' );

add_shortcode( 'hongo_siteurl', 'hongo_link_replace' );
if ( ! function_exists( 'hongo_link_replace' ) ) {
    function hongo_link_replace() {
        $link = home_url('/');
        return $link;
    }
}

// Get shortcode in real form
if ( ! function_exists( 'hongo_get_strip_shortcode' ) ) {
    function hongo_get_strip_shortcode( $value ) {
        if ( empty( $value ) ) {
            return;
        }
        $value = str_replace( array( '`{`', '`}`', '``' ), array( '[', ']', '"' ), $value );

        return $value;
    }
}

// Get all social icons
if ( ! function_exists( 'hongo_get_social_icons' ) ) {
    function hongo_get_social_icons() {

        $social_icons = array(
                              'facebook'    => 'facebook-f',
                              'twitter'     => 'x-twitter',
                              'dribbble'    => 'dribbble',
                              'linkedin'    => 'linkedin-in',
                              'instagram'   => 'instagram',
                              'tumblr'      => 'tumblr',
                              'pinterest'   => 'pinterest-p',
                              'youtube'     => 'youtube',
                              'vimeo'       => 'vimeo-v',
                              'soundcloud'  => 'soundcloud',
                              'flickr'      => 'flickr',
                              'rss'         => 'rss',
                              'reddit'      => 'reddit',
                              'behance'     => 'behance',
                              'vine'        => 'vine',
                              'github'      => 'github',
                              'xing'        => 'xing',
                              'vk'          => 'vk',
                              'yelp'        => 'yelp',
                              'discord'     => 'discord',
                              'skype'       => 'skype',
                              'email'       => 'envelope',
                          );
        return $social_icons;
    }
}

// Get sorted social icons
if ( ! function_exists( 'hongo_get_sorted_social_data' ) ) {
    function hongo_get_sorted_social_data( $social_sorting, $social_data ) {

        // Get all social icons
        $social_icons = hongo_get_social_icons();

        // Check social sorting value exists
        if ( ! empty( $social_sorting ) ) {

            $sorted_social_data = array();

            $hongo_social_sorting_data = explode( ',', $social_sorting );
            
            foreach( $hongo_social_sorting_data as $social_key ) {

                if ( ! empty( $social_data[$social_key] ) ) {

                    $sorted_social_data[$social_key] = $social_data[$social_key];
                }
            }
            return $sorted_social_data;
        }
        return $social_data;
    }
}

// Hongo Wishlist Shortcode Start
if ( ! function_exists( 'hongo_wishlist_shortcode' ) ) {
    function hongo_wishlist_shortcode( $atts, $content = "" ) {  

        $data = array();

        if ( is_user_logged_in() ) {
            $user_id = get_current_user_id();
            $data = get_user_meta( $user_id, '_hongo_wishlist', true );
        } else {
            $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
            $cookie_name = 'hongo-wishlist'.$siteid;
            $data = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
        } 
        $data = ! empty( $data ) ? explode( ',', $data ) : array();
        
        ob_start();
            do_action( 'hongo_addons_wishlist_data', $data );
        $content .= ob_get_contents();
        ob_clean();

        return $content;
    }
}
add_shortcode( 'hongo-wishlist', 'hongo_wishlist_shortcode' );
// Hongo Wishlist Shortcode End

// Wishlist Page Selection in woocommerce settings > Products > Display
if ( ! function_exists( 'hongo_wishlist_page_option' ) ) {
    function hongo_wishlist_page_option( $settings ) {

        $wishlist_page_settings = array(); 

        $wishlist_page_settings[] = array(
            'title'    => __( 'Wishlist page', 'hongo-addons' ),
            'id'       => 'woocommerce_wishlist_page_id',
            'type'     => 'single_select_page',
            'default'  => '',
            'class'    => 'wc-enhanced-select-nostd',
            'css'      => 'min-width:300px;',
            'desc_tip' => __( 'This sets the base page of your wishlist.', 'hongo-addons' ),
        );

        array_splice( $settings, 5, 0, $wishlist_page_settings );
        return $settings;
    }
}
add_filter( 'woocommerce_settings_pages', 'hongo_wishlist_page_option' );

// cookie store in database after login user    
if ( ! function_exists( 'hongo_cookie_wishlist' ) ) {
    function hongo_cookie_wishlist( $login ) {

        $user = get_user_by('login',$login);
        $user_ID = $user->ID;
        $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
        $cookie_name = 'hongo-wishlist'.$siteid;
        $data = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
        $data = explode(',', $data);

        $wishlist_data = get_user_meta( $user_ID, '_hongo_wishlist', true );

        if ( ! empty( $wishlist_data ) ) {
            $wishlist_data = explode( ',', $wishlist_data );
            $data = array_unique( array_merge( $wishlist_data,$data ), SORT_REGULAR );
        }

        $data = implode( ',', $data );

        // User Update
        update_user_meta( $user_ID, '_hongo_wishlist', $data );
        
        // Delete Cookie
        $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
        $cookie_name = 'hongo-wishlist'.$siteid;
        setcookie( $cookie_name, '', -1, '/' );
    }
}
add_action( 'wp_login', 'hongo_cookie_wishlist', 99 );


// Wishlist page change post state
if ( ! function_exists( 'hongo_wishlist_change_post_state' ) ) {
    function hongo_wishlist_change_post_state( $post_states, $post ) {

        $hongo_wishlist_id = get_option( 'woocommerce_wishlist_page_id' );

        if ( $hongo_wishlist_id == $post->ID ) {
            $post_states['hongo_wishlist_page'] = __( 'Wishlist Page', 'hongo-addons' );
        }

        return $post_states;
    }
}

add_filter( 'display_post_states', 'hongo_wishlist_change_post_state', 10, 2 );

// Get shortcode custom css class
if ( ! function_exists( 'hongo_shortcode_custom_css_class' ) ) {
    function hongo_shortcode_custom_css_class( $paramname = '' ) {

        global $hongo_featured_array;
        $responsive_class = '';

        // Front end editor css
        if ( vc_is_inline() ) {
            $hongo_featured_array[] = hongo_vc_custom_settings::generate_front_end_css( $paramname );
        }

        $paramname = str_replace( ',', '', $paramname );
        $responsive_class = vc_shortcode_custom_css_class( $paramname, ' ' );
        return $responsive_class;
    }
}

// Remove filter used for theme
if ( ! function_exists( 'hongo_post_class_wrap' ) ) {
    function hongo_post_class_wrap() {

        remove_filter( 'post_class', 'hongo_override_wc_product_post_class', 99, 3 );
    }
}
add_action( 'hongo_remove_post_class', 'hongo_post_class_wrap' );

// For Change VC default font awesome icons
if ( ! function_exists( 'hongo_vc_font_awesome_icon' ) ) {
    function hongo_vc_font_awesome_icon( $icons ) {
        
        $hongo_fontawesome_solid  = hongo_fontawesome_solid();
        $hongo_fontawesome_reg    = hongo_fontawesome_reg();
        $hongo_fontawesome_brand  = hongo_fontawesome_brand();
        $hongo_fontawesome_light  = hongo_fontawesome_light();
        $hongo_fontawesome_duotone= hongo_fontawesome_duotone();

        $icons = array();

        // Solid Font Awesome Icons
        if ( ! empty( $hongo_fontawesome_solid ) && is_array( $hongo_fontawesome_solid ) ) {
            foreach ( $hongo_fontawesome_solid as $val ) {

                $icons[]['fa-solid '.$val] ='fa-solid '.$val;
            }
        }
        // Regular Font Awesome Icons
        if ( ! empty( $hongo_fontawesome_reg ) && is_array( $hongo_fontawesome_reg ) ) {
            foreach ( $hongo_fontawesome_reg as $val ) {

                $icons[]['fa-regular '.$val] ='fa-regular '.$val;
            }
        }
        // Brand Font Awesome Icons
        if ( ! empty( $hongo_fontawesome_brand ) && is_array( $hongo_fontawesome_brand ) ) {
            foreach ( $hongo_fontawesome_brand as $val ) {

                $icons[]['fa-brands '.$val] ='fa-brands '.$val;
            }
        }
        // Light Font Awesome Icons
        if ( ! empty( $hongo_fontawesome_light ) && is_array( $hongo_fontawesome_light ) ) {
            foreach ( $hongo_fontawesome_light as $val ) {
                
                $icons[]['fa-light '.$val] ='fa-light '.$val;
            }
        }
        // Duotone Font Awesome Icons
        if ( ! empty( $hongo_fontawesome_duotone ) && is_array( $hongo_fontawesome_duotone ) ) {
            foreach ( $hongo_fontawesome_duotone as $val ) {
                
                $icons[]['fa-duotone '.$val] ='fa-duotone '.$val;
            }
        }
        return $icons;
    }
}
add_filter( 'vc_iconpicker-type-fontawesome', 'hongo_vc_font_awesome_icon', 999 );

// Gradient color 
if ( ! function_exists( 'hongo_gradient_color' ) ) {
    function hongo_gradient_color( $value = '' ) {

        if ( empty( $value ) ) {
            return;
        }
        $gradient_type = ( $value['gradient_type'] ) ? $value['gradient_type'] : 'linear-gradient';
        $gradient_degree = ( $value['gradient_degree'] ) ? $value['gradient_degree'].'deg,' : '';
        $gradient_color_from = ( $value['color_from'] ) ? $value['color_from'] : '';
        $gradient_color_to = ( $value['color_to'] ) ? $value['color_to'] : '';
        $gradient_position_from = ( $value['position_from'] ) ? $value['position_from'].'%' : '';
        $gradient_position_to = ( $value['position_to'] ) ? $value['position_to'].'%' : '';
        $gradient_image = '';
        if ( $gradient_type && $gradient_degree && $gradient_color_from && $gradient_color_to ) {
            $gradient_image = esc_attr($gradient_type).'( '.esc_attr($gradient_degree).esc_attr($gradient_color_from).' '.esc_attr($gradient_position_from).', '.esc_attr($gradient_color_to).' '.esc_attr($gradient_position_to).');';
        }
        return $gradient_image;
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

// Get vc tgypography settings by key
if ( ! function_exists( 'hongo_get_vc_custom_settings_by_key' ) ) {
    function hongo_get_vc_custom_settings_by_key( $key = '', $value = '' ) {
        if ( empty( $key ) || empty( $value ) ) {
            return;
        }
        $hongo_custom_settings_array = hongo_vc_custom_settings::hongo_resposive_values( $value );
        if ( ! empty( $hongo_custom_settings_array ) && is_array( $hongo_custom_settings_array ) && ! empty( $hongo_custom_settings_array[$key] ) ) {
           return $hongo_custom_settings_array[$key];
        }
    }
}

/* Builder custom setting functions */

// Get menu list array
if ( ! function_exists( 'hongo_get_menu_list_array' ) ) {
    function hongo_get_menu_list_array() {
        $menu_list = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
        $hongo_menu_array = array();
        $hongo_menu_array[esc_html__( 'Select', 'hongo-addons' )] = '';
        if ( ! empty( $menu_list ) && is_array( $menu_list ) ) {
            foreach ( $menu_list as $single_menu ) {
                $hongo_menu_array[$single_menu->name] = $single_menu->slug;
            }
        }
        return $hongo_menu_array;
    }
}

add_filter( 'views_edit-hongobuilder', 'hongo_builder_type_filter_tabs' );
if ( ! function_exists( 'hongo_builder_type_filter_tabs' ) ) {
    function hongo_builder_type_filter_tabs( $views ) {

        global $post;
        if ( is_admin() && isset( $_GET['post_type'] ) && 'hongobuilder' === $_GET['post_type'] ) {

            $all_builder_type = array( '' => __( 'All Sections', 'hongo-addons' ) );

            $builder_types = hongo_addons_get_builder_types();
            $builder_types = array_merge( $all_builder_type, $builder_types );
        ?>
            <div class="hongo-nav-tabs nav-tab-wrapper">
                <?php
                    $counter = 1;
                    foreach ( $builder_types as $key => $type ) {

                        $current_tab = ( $counter == 1 ) ? ' nav-tab-active' : '';
                        if ( isset( $_GET['builder_type'] ) && ! empty( $_GET['builder_type'] ) ) {

                            $current_tab = ( $_GET['builder_type'] === $key ) ? ' nav-tab-active' : '';
                        }
                        echo sprintf( '<a href="%s" class="%s">%s</a>',
                            esc_url( add_query_arg( array( 'post_type' => 'hongobuilder', 'builder_type' => $key ), 'edit.php' ) ),
                            'nav-tab'.$current_tab,
                            $type
                        );
                        $counter++;
                    }
                ?>
            </div>
        <?php
        }
        return $views;
    }
}

// Builder admin table filter
add_filter( 'manage_hongobuilder_posts_columns', 'hongo_builder_add_custom_column', 10 );
if ( ! function_exists( 'hongo_builder_add_custom_column' ) ) {
    function hongo_builder_add_custom_column( $columns ) {

        unset( $columns['date'] );

        $columns['title'] = esc_html__( 'Title', 'hongo-addons' );
        $columns['builder_type'] = esc_html__( 'Section type', 'hongo-addons' );
        $columns['sticky_type'] = esc_html__( 'Sticky type', 'hongo-addons' );
        $columns['date'] =  esc_html__( 'Date', 'hongo-addons' );

        return $columns;
    }
}

// Builder add columns data
add_action( 'manage_hongobuilder_posts_custom_column', 'hongo_builder_column_data', 10, 2 );
if ( ! function_exists( 'hongo_builder_column_data' ) ) {
    function hongo_builder_column_data( $column, $post_id ) {

        switch ( $column ) {
            case 'builder_type' :

                $header_type = get_post_meta( $post_id , '_hongo_builder_section_type', true );
                $header_type_label = ( $header_type ) ? hongo_addons_get_header_type_by_key( $header_type ) : '-';

                if ( ! empty( $header_type ) ) {
                    $out[] = sprintf( '<a href="%s">%s</a>',
                        esc_url( add_query_arg( array( 'post_type' => 'hongobuilder', 'builder_type' => $header_type ), 'edit.php' ) ),
                        sanitize_term_field( 'Section type', $header_type_label, $post_id, 'hongobuilder', 'display' ) 
                    );
                    echo join( ', ', $out );
                } else {
                    echo esc_html__( 'N/A', 'hongo-addons' );
                }

            break;

            case 'sticky_type' :
            
                $header_sticky = get_post_meta( $post_id , '_hongo_header_sticky_type', true );
                $footer_sticky = get_post_meta( $post_id , '_hongo_footer_sticky_type', true );
                if ( $header_sticky ) {
                   $sticky_label = hongo_addons_get_header_sticky_type_by_key( $header_sticky );
                } elseif ( $footer_sticky ) {
                    $sticky_label = hongo_addons_get_footer_sticky_type_by_key( $footer_sticky );
                } else {
                    $sticky_label = esc_html__( 'N/A', 'hongo-addons' );
                }
                echo sprintf( '%s', $sticky_label );
                
            break;    
        }
    }
}

// Builder sortable columns
add_filter( 'manage_edit-hongobuilder_sortable_columns', 'hongo_builder_column_make_sortable' );
if ( ! function_exists( 'hongo_builder_column_make_sortable' ) ) {
    function hongo_builder_column_make_sortable( $columns ) {

        $columns['builder_type'] = 'hongo_builder_section_type';
        $columns['sticky_type'] = 'hongo_header_sticky_type';
        return $columns;
    }
}

// Builder parse query for click filter
add_filter( 'parse_query', 'hongo_builder_section_make_sortable' );
if ( ! function_exists( 'hongo_builder_section_make_sortable' ) ) {
    function hongo_builder_section_make_sortable( $query ) {

        global $pagenow;
        if ( is_admin() && ( $pagenow == 'edit.php' ) && ! empty( $_GET['builder_type'] ) ) {
            $query->query_vars['meta_key'] = '_hongo_builder_section_type';
            $query->query_vars['meta_value'] = $_GET['builder_type'];
        }
    }
}

// Builder table filter
add_action( 'restrict_manage_posts', 'hongo_addons_builder_table_filtering' );
if( ! function_exists( 'hongo_addons_builder_table_filtering' ) ) {
    function hongo_addons_builder_table_filtering() {

        global $pagenow;            
        if ( is_admin() && ( $pagenow == 'edit.php' ) && ! empty( $_GET['post_type'] ) && $_GET['post_type'] == 'hongobuilder' ) {

            $options = hongo_addons_get_builder_types();

            echo '<select name="builder_type" id="filter-by-builder-type">';
                echo '<option value="">'. esc_html__( 'All section types', 'hongo-addons' ) .'</option>';
                if( ! empty( $options ) ) {
                    foreach ( $options as $key => $option ) {
                        $selected = ! empty( $_GET['builder_type'] ) ? $_GET['builder_type'] : '';
                        echo '<option value="'.$key.'"'. selected( $key, $selected, false ) . '>'.$option.'</option>';
                    }
                }
            echo '</select>';
        }
    }
}

// Return all builder types
if ( ! function_exists( 'hongo_addons_get_builder_types' ) ) {
    function hongo_addons_get_builder_types() {

        $builder_types = array(
            'mini-header'   => esc_html__( 'Mini Header', 'hongo-addons' ),
            'top-header'    => esc_html__( 'Top Header', 'hongo-addons' ),
            'header'        => esc_html__( 'Header', 'hongo-addons' ),
            'megamenu'      => esc_html__( 'Mega Menu', 'hongo-addons' ),
            'footer'        => esc_html__( 'Footer', 'hongo-addons' ),
            'promopopup'    => esc_html__( 'Promo Popup', 'hongo-addons' ),
        );
        return $builder_types;
    }
}

// Return type array or string
if ( ! function_exists( 'hongo_addons_get_header_type_by_key' ) ) {
    function hongo_addons_get_header_type_by_key( $header_type = '' ) {

        $header_type_data = array(
            ''              => esc_html__( 'Select', 'hongo-addons' ),
            'mini-header'   => esc_html__( 'Mini header', 'hongo-addons' ),
            'top-header'    => esc_html__( 'Top header', 'hongo-addons' ),
            'header'        => esc_html__( 'Header', 'hongo-addons' ),
            'megamenu'      => esc_html__( 'Mega menu', 'hongo-addons' ),
            'footer'        => esc_html__( 'Footer', 'hongo-addons' ),
            'promopopup'    => esc_html__( 'Promo popup', 'hongo-addons' ),
        );
        return ! empty( $header_type ) ? $header_type_data[$header_type] : $header_type_data;
    }
}

// Return type array or string
if ( ! function_exists( 'hongo_addons_get_header_sticky_type_by_key' ) ) {
    function hongo_addons_get_header_sticky_type_by_key( $header_sticky_type = '' ) {

        $header_sticky_type_data = array(
            ''                  => esc_html__( 'Select','hongo-addons' ),
            'appear-up-scroll'  => esc_html__( 'Sticky on up scroll','hongo-addons' ),
            'appear-down-scroll'=> esc_html__( 'Sticky on down scroll','hongo-addons' ),
            'no-sticky'         => esc_html__( 'Non sticky','hongo-addons' ) 
        );
        return ! empty( $header_sticky_type ) ? $header_sticky_type_data[$header_sticky_type] : $header_sticky_type_data;
    }
}

// Return type of footer string
if ( ! function_exists( 'hongo_addons_get_footer_sticky_type_by_key' ) ) {
    function hongo_addons_get_footer_sticky_type_by_key( $footer_sticky_type = '' ) {
        if ( empty( $footer_sticky_type ) ) {
           return;
        }
        $footer_sticky_type_data = array(
            'sticky'  => esc_html__( 'Sticky','hongo-addons' ),
            'non-sticky' => esc_html__( 'Non sticky','hongo-addons' ) 
        );
        return ! empty( $footer_sticky_type_data[$footer_sticky_type] ) ? $footer_sticky_type_data[$footer_sticky_type] : '';
    }
}

if ( ! function_exists( 'hongo_get_social_label' ) ) {

    function hongo_get_social_label( $key = '' ) {

      if ( empty( $key ) ) {
           return;
      }

      $social_data = array(
                          'facebook-f' => esc_html__( 'Facebook', 'hongo-addons'),
                          'x-twitter'  => esc_html__( 'Twitter', 'hongo-addons'),
                          'dribbble' => esc_html__( 'Dribbble', 'hongo-addons'),
                          'linkedin-in' => esc_html__( 'LinkedIn', 'hongo-addons'),
                          'instagram' => esc_html__( 'Instagram', 'hongo-addons'),
                          'tumblr' => esc_html__( 'Tumblr', 'hongo-addons'),
                          'pinterest-p' => esc_html__( 'Pinterest', 'hongo-addons'),
                          'youtube' => esc_html__( 'Youtube', 'hongo-addons'),
                          'vimeo-v' => esc_html__( 'Vimeo', 'hongo-addons'),
                          'soundcloud' => esc_html__( 'Soundcloud', 'hongo-addons'),
                          'flickr' => esc_html__( 'Flickr', 'hongo-addons'),
                          'rss' => esc_html__( 'RSS', 'hongo-addons'),
                          'reddit' => esc_html__( 'Reddit', 'hongo-addons'),
                          'behance' => esc_html__( 'Behance', 'hongo-addons'),
                          'vine' => esc_html__( 'Vine', 'hongo-addons'),
                          'github' => esc_html__( 'GitHub', 'hongo-addons'),
                          'xing' => esc_html__( 'Xing', 'hongo-addons'),
                          'vk' => esc_html__( 'VK', 'hongo-addons'),
                          'yelp' => esc_html__( 'Yelp', 'hongo-addons'),
                          'discord' => esc_html__( 'Discord', 'hongo-addons'),
                          'envelope' => esc_html__( 'Email', 'hongo-addons'),
                          'skype' => esc_html__( 'Skype', 'hongo-addons'),
                     );
      $social_label = isset( $social_data[ $key ] ) ? $social_data[ $key ] : '';

      $social_label = apply_filters( 'hongo_get_' . $key . '_label', $social_label, $key, $social_data );

      return apply_filters( 'hongo_get_social_label', $social_label, $key, $social_data );
    }
}

// Hamburger menu class
if ( ! function_exists( 'hongo_hamburger_menu_class' ) ) {
    function hongo_hamburger_menu_class( $classes, $depth ) {
        global $hongo_hamburger_menu_font_class;
        if ( $depth == 0 ) {
            $classes .= $hongo_hamburger_menu_font_class;
        }
        return $classes;
    }
}

// Hamburger submenu class
if ( ! function_exists( 'hongo_hamburger_submenu_class' ) ) {
    function hongo_hamburger_submenu_class( $classes, $depth ) {
        global $hongo_hamburger_submenu_font_class;
        if ( $depth != 0 ) {
            $classes .= $hongo_hamburger_submenu_font_class;
        }
        return $classes;
    }
}

// Left menu class
if ( ! function_exists( 'hongo_left_menu_class' ) ) {
    function hongo_left_menu_class( $classes, $depth ) {
        global $hongo_left_menu_font_class;
        if ( $depth == 0 ) {
            $classes .= $hongo_left_menu_font_class;
        }
        return $classes;
    }
}

// Left submenu class
if ( ! function_exists( 'hongo_left_submenu_class' ) ) {
    function hongo_left_submenu_class( $classes, $depth ) {
        global $hongo_left_submenu_font_class;
        if ( $depth != 0 ) {
            $classes .= $hongo_left_submenu_font_class;
        }
        return $classes;
    }
}

// Navigation menu class
if ( ! function_exists( 'hongo_navigation_menu_class' ) ) {
    function hongo_navigation_menu_class( $classes, $depth ) {
        global $hongo_navigation_menu_font_class;
        if ( $depth == 0 ) {
            $classes .= $hongo_navigation_menu_font_class;
        }
        return $classes;
    }
}

// Category menu class
if ( ! function_exists( 'hongo_category_menu_class' ) ) {
    function hongo_category_menu_class( $classes, $depth ) {
        global $hongo_category_menu_font_class;
        if ( $depth == 0 ) {
            $classes .= $hongo_category_menu_font_class;
        }
        return $classes;
    }
}

/* To get all attributes in customizer size guide */
if( ! function_exists( 'hongo_attributes_array' ) ){
    function hongo_attributes_array(){
        global $product; 
        $attributes = wc_get_attribute_taxonomies();
        $all_attributes = array(
            '' => esc_html__( 'Select', 'hongo-addons' )
        );
        
        if( ! empty( $attributes ) ) {
            foreach ($attributes as $attribute) {
                $attributename = 'pa_'.$attribute->attribute_name;
                $all_attributes[ $attributename ] = __( 'After', 'hongo-addons' ).' '.$attribute->attribute_label;
            }
        }
        return $all_attributes;
    }
}

/* To get Builder Section list in Customize */
if ( ! function_exists( 'hongo_addons_get_builder_section_data' ) ) {
    function hongo_addons_get_builder_section_data( $section_type = '', $meta = false, $general = false ) {

        $builder_section_data = array();

        if ( empty( $section_type ) ) {
            return $builder_section_data;
        }
        
        $hongo_filter_section = ( $section_type ) ? array( 'key' => '_hongo_builder_section_type','value' => $section_type, 'compare' => '=' ) : array();

        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'hongobuilder',
            'post_status'      => 'publish',
            'meta_query' => array(
                $hongo_filter_section
            )
        );

        $posts_data = get_posts( $args );

        if ( $meta ) {

            $builder_section_data['default'] = esc_html__( 'Default', 'hongo-addons' );

        } elseif ( $general ) {

           $builder_section_data[''] = esc_html__( 'General', 'hongo-addons' );

        } else {

            $builder_section_data[''] = esc_html__( 'Select', 'hongo-addons' );
        }

        if( $section_type == 'top-header' ) {

            $builder_section_data['none'] = esc_html__( 'No Select', 'hongo-addons' );

        }

        if ( ! empty( $posts_data ) ) {

            foreach ( $posts_data as $key => $value ) {

                $builder_section_data[$value->ID] = esc_html( $value->post_title );
            }
        }
        return $builder_section_data;
    }
}

// To get post meta by id
if ( ! function_exists( 'hongo_post_meta_by_id' ) ) {
    function hongo_post_meta_by_id( $id, $option ) {
        if ( !$id ) {
           return;
        }
        // Meta Prefix
        $meta_prefix = '_';
        
        $value = get_post_meta( $id, $meta_prefix.$option , true);
        if ( $value == 'default') {
            $value = '';
        }
        return $value;
    }
}

// To add shop megamenu add section builder class
if ( ! function_exists( 'hongo_add_section_builder_style_class' ) ) {
    function hongo_add_section_builder_style_class( $class ) {

        $class .= 'section-builder';

        return $class;
    }
}

if ( ! function_exists('hongo_duplicate_post_as_draft') ) {
    function hongo_duplicate_post_as_draft() {
        global $wpdb;
        if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'hongo_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
            wp_die('No post to duplicate has been supplied!');
        }
     
        /*
         * Nonce verification
         */
        if ( ! isset( $_GET['duplicate_nonce'] ) || ! wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) ) {
            return;
        }
     
        /*
         * Get the original post id
         */
        $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
        /*
         * And all the original post data then
         */
        $post = get_post( $post_id );
     
        /*
         * If you don't want current user to be the new post author,
         * then change next couple of lines to this: $new_post_author = $post->post_author;
         */
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;
     
        /*
         * if post data exists, create the post duplicate
         */
        if ( isset( $post ) && $post != null ) {
     
            $args = array(
                'comment_status' => $post->comment_status,
                'ping_status'    => $post->ping_status,
                'post_author'    => $new_post_author,
                'post_content'   => $post->post_content,
                'post_excerpt'   => $post->post_excerpt,
                'post_name'      => $post->post_name,
                'post_parent'    => $post->post_parent,
                'post_password'  => $post->post_password,
                'post_status'    => 'draft',
                'post_title'     => $post->post_title,
                'post_type'      => $post->post_type,
                'to_ping'        => $post->to_ping,
                'menu_order'     => $post->menu_order
            );
     
            /*
             * Insert the post by wp_insert_post() function
             */
            $new_post_id = wp_insert_post( $args );
     
            /*
             * Get all current post terms ad set them to the new post draft
             */
            $taxonomies = get_object_taxonomies( $post->post_type ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
            foreach ( $taxonomies as $taxonomy ) {
                $post_terms = wp_get_object_terms( $post_id, $taxonomy, array('fields' => 'slugs') );
                wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
            }
     
            /*
             * Duplicate all post meta just in two SQL queries
             */
            $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
            if ( count( $post_meta_infos ) != 0 ) {
                $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                foreach ( $post_meta_infos as $meta_info ) {
                    $meta_key = $meta_info->meta_key;
                    if ( $meta_key == '_wp_old_slug' ) {
                        continue;
                    }
                    $meta_value = addslashes($meta_info->meta_value);
                    $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                }
                $sql_query.= implode( " UNION ALL ", $sql_query_sel );
                $wpdb->query( $sql_query );
            }
     
     
            /*
             * finally, redirect to the edit post screen for the new draft
             */
            wp_redirect( admin_url( 'edit.php?post_type=hongobuilder' ) );
            exit;
        } else {
            wp_die('Post creation failed, could not find original post: ' . $post_id);
        }
    }
}
add_action( 'admin_action_hongo_duplicate_post_as_draft', 'hongo_duplicate_post_as_draft' );

if ( ! function_exists( 'hongo_duplicate_post_link' ) ) {
    function hongo_duplicate_post_link( $actions, $post ) {
        if ( $post->post_type == 'hongobuilder' ) {
            if ( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=hongo_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="' . esc_attr__( 'Duplicate this item','hongo-addons' ) . '" rel="permalink">' . esc_html__( 'Duplicate','hongo-addons' ) . '</a>';
            }
        }
        return $actions;
    }
}
add_filter( 'post_row_actions', 'hongo_duplicate_post_link', 10, 2 );

if ( ! function_exists( 'hongo_hex2rgb' ) ) {
    function hongo_hex2rgb( $colour, $opacity = '0.4' ) {
        if ( empty( $colour ) ) {
            return;
        }
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

// Get button style class from style key
if ( ! function_exists( 'hongo_button_class_from_style' ) ) {
    function hongo_button_class_from_style( $style = '' ) {

        $button_style_array_class = array (
            'style1'  => ' btn btn-dark-gray alt-font', 
            'style2'  => ' btn btn-white alt-font', 
            'style3'  => ' btn btn-transparent-black alt-font',
            'style4'  => ' btn btn-transparent-white alt-font', 
            'style5'  => ' btn btn-dark-gray btn-round alt-font',
            'style6'  => ' btn btn-white btn-round alt-font', 
            'style7'  => ' btn btn-transparent-black btn-round alt-font',
            'style8'  => ' btn btn-transparent-white btn-round alt-font',
            'style9'  => ' btn-link alt-font',
            'style10' => ' btn btn-base alt-font',
            'style11' => ' btn btn-transparent-base alt-font', 
            'style12' => ' btn btn-base btn-round alt-font',
            'style13' => ' btn btn-transparent-base btn-round alt-font',
            'style14' => ' btn-link btn-base-link alt-font'
        );

        $class = ! empty( $button_style_array_class[$style] ) ? $button_style_array_class[$style] : '';
        return $class;
    }
}


if ( ! function_exists( 'woooco_shop_banner_style_column_class' ) ) {
    function woooco_shop_banner_style_column_class( $column_class ) {
        $column_class .= ' shop-banner-column-class';
    }
}

/* Added separate product style class into body */
add_filter( 'body_class', 'hongo_addons_override_body_classes' );
if( ! function_exists( 'hongo_addons_override_body_classes' ) ) {
    function hongo_addons_override_body_classes( $classes ) {

        if( hongo_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) { // if WooCommerce plugin is activated and WooCommerce category, brand, shop page

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();
            $classes[] = 'hongo-' . $product_archive_list_style . '-wrap';

        } elseif( hongo_is_woocommerce_activated() && is_product() ) { // if WooCommerce plugin is activated and WooCommerce product page

            // To get single content product style
            $single_content_product_style = hongo_get_single_content_product_style();
            $classes[] = 'hongo-' . $single_content_product_style . '-wrap';
        }
        return $classes;
    }
}

// Get widgetised sidebars array
if( ! function_exists( 'hongo_addons_widgetised_sidebars' ) ) {
    function hongo_addons_widgetised_sidebars() {
        $sidebars = $GLOBALS['wp_registered_sidebars'];

        $sidebar_array = array();
        $sidebar_array[esc_html__('Select', 'hongo-addons')] = '';
        if ( ! empty( $sidebars ) ) {
            foreach ( $sidebars as $sidebar ) {
                $sidebar_array[$sidebar['name']] = $sidebar['id'];
            }
        }
        return $sidebar_array;
    }
}

// Get hongo default customizer value
if ( ! function_exists( 'hongo_get_default_value_wp_customizer_setting' ) ) {
    function hongo_get_default_value_wp_customizer_setting() {
        
        $hongo_default_value_wp_customizer_setting = 
        array(
            'hongo_alt_font' => 'Poppins',
            'hongo_archive_breadcrumb_position' => 'title-area',
            'hongo_archive_enable_breadcrumb' => '1',
            'hongo_archive_enable_title' => '1',
            'hongo_archive_loop_video' => '1',
            'hongo_archive_mute_video' => '1',
            'hongo_archive_title_after_header' => '0',
            'hongo_archive_title_callto_section_id' => '#about',
            'hongo_archive_title_container_style' => 'container',
            'hongo_archive_title_image_srcset' => 'full',
            'hongo_archive_title_opacity' => '0.8',
            'hongo_archive_title_parallax_effect' => '0.5',
            'hongo_archive_title_scroll_to_down' => '1',
            'hongo_archive_title_style' => 'page-title-style-1',
            'hongo_archive_title_video_type' => 'self',
            'hongo_author_box_button_title' => 'All author posts',
            'hongo_blog_column_archive' => '3',
            'hongo_blog_column_default' => '3',
            'hongo_blog_pagination_style_archive' => 'number-pagination',
            'hongo_blog_pagination_style_default' => 'number-pagination',
            'hongo_blog_post_meta_text_transform_archive' => 'text-uppercase',
            'hongo_blog_post_meta_text_transform_default' => 'text-uppercase',
            'hongo_blog_post_meta_text_transform_sticky' => 'text-uppercase',
            'hongo_blog_premade_style_archive' => 'blog-grid',
            'hongo_blog_premade_style_default' => 'blog-grid',
            'hongo_blog_type_default' => '',
            'hongo_box_enable_border_archive' => '1',
            'hongo_box_enable_border_default' => '1',
            'hongo_box_enable_border_sticky' => '1',
            'hongo_box_enable_shadow_archive' => '1',
            'hongo_box_enable_shadow_default' => '1',
            'hongo_button_text_archive' => 'continue reading',
            'hongo_button_text_default' => 'continue reading',
            'hongo_button_text_sticky' => 'continue reading',
            'hongo_comment_title' => 'Write a comment',
            'hongo_compare_product_enable_filter' => '1',
            'hongo_compare_product_enable_heading' => '1',
            'hongo_compare_product_filter_errormsg_enable_border' => '1',
            'hongo_compare_product_heading_text' => 'COMPARE PRODUCTS',
            'hongo_date_format_archive' => '',
            'hongo_date_format_default' => '',
            'hongo_date_format_sticky' => '',
            'hongo_default_breadcrumb_position' => 'title-area',
            'hongo_default_enable_breadcrumb' => '1',
            'hongo_default_enable_title' => '1',
            'hongo_default_loop_video' => '1',
            'hongo_default_mute_video' => '1',
            'hongo_default_post_title_default' => 'Blog',
            'hongo_default_title_after_header' => '0',
            'hongo_default_title_callto_section_id' => '#about',
            'hongo_default_title_container_style' => 'container',
            'hongo_default_title_image_srcset' => 'full',
            'hongo_default_title_opacity' => '0.8',
            'hongo_default_title_parallax_effect' => '0.5',
            'hongo_default_title_scroll_to_down' => '1',
            'hongo_default_title_style' => 'page-title-style-1',
            'hongo_default_title_video_type' => 'self',
            'hongo_delay_time_smart_product' => '100',
            'hongo_disable_script_details' => '0',
            'hongo_disable_style_details' => '0',
            'hongo_display_smart_product_after' => 'some-time',
            'hongo_enable_adobe_font' => '0',
            'hongo_enable_alt_font' => '1',
            'hongo_enable_author' => '1',
            'hongo_enable_box_layout' => '0',
            'hongo_enable_category' => '1',
            'hongo_enable_comment' => '1',
            'hongo_enable_date' => '1',
            'hongo_enable_footer' => '1',
            'hongo_enable_footer_archive' => '1',
            'hongo_enable_footer_default' => '1',
            'hongo_enable_footer_general_archive' => '1',
            'hongo_enable_footer_general_default' => '1',
            'hongo_enable_footer_general_product_archive' => '1',
            'hongo_enable_footer_general_single_page' => '1',
            'hongo_enable_footer_general_single_post' => '1',
            'hongo_enable_footer_general_single_product' => '1',
            'hongo_enable_footer_product_archive' => '1',
            'hongo_enable_footer_single_page' => '1',
            'hongo_enable_footer_single_post' => '1',
            'hongo_enable_footer_single_product' => '1',
            'hongo_enable_header' => '1',
            'hongo_enable_header_archive' => '1',
            'hongo_enable_header_default' => '1',
            'hongo_enable_header_general_archive' => '1',
            'hongo_enable_header_general_default' => '1',
            'hongo_enable_header_general_product_archive' => '1',
            'hongo_enable_header_general_single_page' => '1',
            'hongo_enable_header_general_single_post' => '1',
            'hongo_enable_header_general_single_product' => '1',
            'hongo_enable_header_logo' => '1',
            'hongo_enable_header_product_archive' => '1',
            'hongo_enable_header_single_page' => '1',
            'hongo_enable_header_single_post' => '1',
            'hongo_enable_header_single_product' => '1',
            'hongo_enable_like' => '1',
            'hongo_enable_main_font' => '1',
            'hongo_enable_mini_header' => '0',
            'hongo_enable_mini_header_archive' => '0',
            'hongo_enable_mini_header_default' => '0',
            'hongo_enable_mini_header_general_archive' => '1',
            'hongo_enable_mini_header_general_default' => '1',
            'hongo_enable_mini_header_general_product_archive' => '1',
            'hongo_enable_mini_header_general_single_page' => '1',
            'hongo_enable_mini_header_general_single_post' => '1',
            'hongo_enable_mini_header_general_single_product' => '1',
            'hongo_enable_mini_header_product_archive' => '0',
            'hongo_enable_mini_header_single_page' => '0',
            'hongo_enable_mini_header_single_post' => '0',
            'hongo_enable_mini_header_single_product' => '0',
            'hongo_enable_mobile_smart_product' => '1',
            'hongo_enable_page_scrolling_effect' => '0',
            'hongo_enable_post_author_box' => '1',
            'hongo_enable_promo_popup' => '0',
            'hongo_enable_related_posts' => '1',
            'hongo_enable_share' => '1',
            'hongo_enable_shop_all_filter_ajax' => '1',
            'hongo_enable_shop_off_canvas_filter_sidebar' => '0',
            'hongo_enable_shop_top_filter_sidebar' => '0',
            'hongo_enable_smart_product' => '0',
            'hongo_enable_tags' => '1',
            'hongo_enable_navigation_link' => '1',
            'hongo_enable_under_maintenance' => 0,
            'hongo_enable_under_maintenance_pages' => '0',
            'hongo_excerpt_length_archive' => 15,
            'hongo_excerpt_length_default' => 15,
            'hongo_excerpt_length_sticky' => '35',
            'hongo_featured_image' => '1',
            'hongo_gdpr_button_text' => 'GOT IT',
            'hongo_gdpr_enable' => '0',
            'hongo_gdpr_style' => 'left-content',
            'hongo_gdpr_text' => 'Our site uses cookies. By continuing to our site you are agreeing to our cookie <a href=\'#\'>privacy policy</a>',
            'hongo_general_comment_title_border' => '1',
            'hongo_h1_logo_font_page' => '1',
            'hongo_header_type' => 'headertype1',
            'hongo_hide_page_comment' => '1',
            'hongo_hide_scroll_to_top' => '1',
            'hongo_hide_scroll_to_top_on_phone' => '0',
            'hongo_image_alt' => '1',
            'hongo_image_caption_lightbox_popup' => '1',
            'hongo_image_hover_icon_archive' => '1',
            'hongo_image_hover_icon_default' => '1',
            'hongo_image_srcset_sticky' => 'full',
            'hongo_image_title' => '0',
            'hongo_image_title_lightbox_popup' => '0',
            'hongo_main_font' => 'Source Sans Pro',
            'hongo_main_font_display' => 'swap',
            'hongo_no_of_related_posts' => '3',
            'hongo_no_of_related_posts_columns' => '3',
            'hongo_page_breadcrumb_position' => 'title-area',
            'hongo_page_container_style' => 'container',
            'hongo_page_enable_breadcrumb' => '0',
            'hongo_page_enable_breadcrumb_heading' => '1',
            'hongo_page_title_enable_border' => '0',
            'hongo_page_enable_title' => '1',
            'hongo_page_layout_setting' => 'hongo_layout_no_sidebar',
            'hongo_page_enable_title_image' => '1',
            'hongo_page_loop_video' => '1',
            'hongo_page_mute_video' => '1',
            'hongo_page_not_found_button' => '1',
            'hongo_page_not_found_button_text' => 'BACK TO HOME PAGE',
            'hongo_page_not_found_main_title' => 'OOPS!',
            'hongo_page_not_found_search' => '1',
            'hongo_page_not_found_subtitle' => 'The page you were looking for||could not be found',
            'hongo_page_not_found_title' => 'That page can’t be found.',
            'hongo_page_title_after_header' => '0',
            'hongo_page_title_callto_section_id' => '#about',
            'hongo_page_title_container_style' => 'container',
            'hongo_page_title_image_srcset' => 'full',
            'hongo_page_title_opacity' => '0.8',
            'hongo_page_title_parallax_effect' => '0.5',
            'hongo_page_title_scroll_to_down' => '1',
            'hongo_page_title_style' => 'page-title-style-5',
            'hongo_page_enable_title_heading' => '1',
            'hongo_page_title_video_type' => 'self',
            'hongo_page_widget_style' => 'sidebar-style-2',
            'hongo_post_container_style_archive' => 'container',
            'hongo_post_container_style_default' => 'container',
            'hongo_post_layout_setting_archive' => 'hongo_layout_right_sidebar',
            'hongo_post_layout_setting_default' => 'hongo_layout_right_sidebar',
            'hongo_post_layout_style' => 'post-layout-style-1',
            'hongo_post_right_sidebar_archive' => 'sidebar-1',
            'hongo_post_right_sidebar_default' => 'sidebar-1',
            'hongo_post_widget_style' => 'sidebar-style-2',
            'hongo_product_archive_animation' => '',
            'hongo_product_archive_animation_delay' => '',
            'hongo_product_archive_breadcrumb_position' => 'title-area',
            'hongo_product_archive_compare_text' => 'Compare',
            'hongo_product_archive_container_style' => 'container-fluid-with-padding',
            'hongo_product_archive_enable_add_to_cart' => '1',
            'hongo_product_archive_enable_alternate_image' => '1',
            'hongo_product_archive_enable_breadcrumb' => '1',
            'hongo_product_archive_enable_compare' => '0',
            'hongo_product_archive_enable_new_box' => '1',
            'hongo_product_archive_enable_overlay' => '1',
            'hongo_product_archive_enable_pagination' => '1',
            'hongo_product_archive_enable_quick_view' => '1',
            'hongo_product_archive_enable_sale_box' => '1',
            'hongo_product_archive_enable_short_desc' => '1',
            'hongo_product_archive_enable_star_rating' => '',
            'hongo_product_archive_enable_title' => '1',
            'hongo_product_archive_enable_wishlist' => '1',
            'hongo_product_archive_gutter' => 'gutter-small',
            'hongo_product_archive_layout_setting' => 'hongo_layout_left_sidebar',
            'hongo_product_archive_left_sidebar' => 'hongo-shop-1',
            'hongo_product_archive_loop_video' => '1',
            'hongo_product_archive_mute_video' => '1',
            'hongo_product_archive_page_column' => '4',
            'hongo_product_archive_page_double_grid_position' => '*,*,2-2,2-1,2-2,1-2',
            'hongo_product_archive_page_enable_metro' => '1',
            'hongo_product_archive_page_per_page' => '12',
            'hongo_product_archive_premade_style' => 'shop-standard',
            'hongo_product_archive_product_content_align' => 'center',
            'hongo_product_archive_product_pagination_style' => 'pagination',
            'hongo_product_archive_quick_view_text' => 'Quick View',
            'hongo_product_archive_right_sidebar' => 'hongo-shop-1',
            'hongo_product_archive_title_after_header' => '0',
            'hongo_product_archive_title_callto_section_id' => '#about',
            'hongo_product_archive_title_container_style' => 'container',
            'hongo_product_archive_title_image_srcset' => 'full',
            'hongo_product_archive_title_opacity' => '0.8',
            'hongo_product_archive_title_parallax_effect' => '0.5',
            'hongo_product_archive_title_scroll_to_down' => '1',
            'hongo_product_archive_title_style' => 'page-title-style-5',
            'hongo_product_archive_title_video_type' => 'self',
            'hongo_product_archive_wishlist_text' => 'Add to Wishlist',
            'hongo_product_single_premade_style' => 'single-product-classic',
            'hongo_product_widget_style' => 'sidebar-style-1',
            'hongo_promo_popup_section' => '1',
            'hongo_quick_view_product_compare_text' => 'Add to Compare',
            'hongo_quick_view_product_enable_category' => '1',
            'hongo_quick_view_product_enable_compare' => '1',
            'hongo_quick_view_product_enable_new_box' => '1',
            'hongo_quick_view_product_enable_price' => '1',
            'hongo_quick_view_product_enable_rating' => '1',
            'hongo_quick_view_product_enable_sale_box' => '1',
            'hongo_quick_view_product_enable_short_description' => '1',
            'hongo_quick_view_product_enable_sku' => '1',
            'hongo_quick_view_product_enable_social_share' => '1',
            'hongo_quick_view_product_enable_tag' => '1',
            'hongo_quick_view_product_enable_title' => '1',
            'hongo_quick_view_product_enable_wishlist' => '1',
            'hongo_quick_view_product_wishlist_text' => 'Add to Wishlist',
            'hongo_related_post_excerpt' => '1',
            'hongo_related_post_excerpt_length' => '15',
            'hongo_related_post_feature_image_size' => 'full',
            'hongo_related_posts_enable_author' => '1',
            'hongo_related_posts_enable_date' => '1',
            'hongo_related_posts_enable_post_thumbnail' => '1',
            'hongo_related_posts_separator' => '1',
            'hongo_related_posts_title' => 'Related Posts',
            'hongo_scroll_smart_product' => '200',
            'hongo_scroll_to_top_text' => 'SCROLL UP',
            'hongo_search_placeholder_text' => 'Enter your keywords...',
            'hongo_shop_top_filter_sidebar' => 'hongo-shop-top',
            'hongo_show_button_archive' => '0',
            'hongo_show_button_default' => '0',
            'hongo_show_button_sticky' => '0',
            'hongo_show_category_archive' => '1',
            'hongo_show_category_default' => '1',
            'hongo_show_category_sticky' => '1',
            'hongo_show_comment_archive' => '0',
            'hongo_show_comment_default' => '0',
            'hongo_show_comment_sticky' => '1',
            'hongo_show_content_archive' => '1',
            'hongo_show_content_default' => '1',
            'hongo_show_content_sticky' => '1',
            'hongo_show_excerpt_archive' => '1',
            'hongo_show_excerpt_default' => '1',
            'hongo_show_excerpt_sticky' => '1',
            'hongo_show_like_archive' => '0',
            'hongo_show_like_default' => '0',
            'hongo_show_like_sticky' => '1',
            'hongo_show_pagination_archive' => '1',
            'hongo_show_pagination_default' => '1',
            'hongo_show_post_author_archive' => '1',
            'hongo_show_post_author_default' => '1',
            'hongo_show_post_author_image_archive' => '0',
            'hongo_show_post_author_image_default' => '0',
            'hongo_show_post_author_image_sticky' => '1',
            'hongo_show_post_author_sticky' => '1',
            'hongo_show_post_date_archive' => '1',
            'hongo_show_post_date_default' => '1',
            'hongo_show_post_date_sticky' => '1',
            'hongo_show_post_format_archive' => '0',
            'hongo_show_post_format_default' => '0',
            'hongo_show_post_format_sticky' => '1',
            'hongo_show_post_thumbnail_archive' => '1',
            'hongo_show_post_thumbnail_default' => '1',
            'hongo_show_post_thumbnail_icon_archive' => '1',
            'hongo_show_post_thumbnail_icon_default' => '1',
            'hongo_show_post_thumbnail_sticky' => '1',
            'hongo_show_post_thumbnail_zoom_effect_archive' => '1',
            'hongo_show_post_thumbnail_zoom_effect_default' => '1',
            'hongo_show_post_title_archive' => '1',
            'hongo_show_post_title_default' => '1',
            'hongo_show_post_title_sticky' => '1',
            'hongo_show_separator_archive' => '1',
            'hongo_show_separator_default' => '1',
            'hongo_single_post_breadcrumb_position' => 'title-area',
            'hongo_single_post_container_style' => 'container',
            'hongo_single_post_enable_breadcrumb' => '0',
            'hongo_single_post_enable_breadcrumb_heading' => '1',
            'hongo_single_post_title_enable_border' => '0',
            'hongo_single_post_enable_title' => '1',
            'hongo_single_post_layout_setting' => 'hongo_layout_right_sidebar',
            'hongo_single_post_enable_title_image' => '1',
            'hongo_single_post_loop_video' => '1',
            'hongo_single_post_meta_text_transform' => 'text-uppercase',
            'hongo_single_post_mute_video' => '1',
            'hongo_single_post_right_sidebar' => 'sidebar-1',
            'hongo_single_post_title_after_header' => '0',
            'hongo_single_post_title_callto_section_id' => '#about',
            'hongo_single_post_title_container_style' => 'container',
            'hongo_single_post_title_image_srcset' => 'full',
            'hongo_single_post_title_opacity' => '0.8',
            'hongo_single_post_title_parallax_effect' => '0.5',
            'hongo_single_post_title_scroll_to_down' => '1',
            'hongo_single_post_title_style' => 'page-title-style-1',
            'hongo_single_post_enable_title_heading' => '1',
            'hongo_single_post_title_video_type' => 'self',
            'hongo_single_product_add_to_cart_fill_icon' => 'icon-basket-loaded',
            'hongo_single_product_add_to_cart_icon' => 'icon-basket',
            'hongo_single_product_breadcrumb_position' => 'title-area',
            'hongo_single_product_compare_icon' => 'ti-control-shuffle',
            'hongo_single_product_compare_text' => 'Add to Compare',
            'hongo_single_product_container_style' => 'container',
            'hongo_single_product_content_position' => 'middle',
            'hongo_single_product_cross_sells_slides_per_view_mini_desktop' => '3',
            'hongo_single_product_cross_sells_slides_per_view_mobile' => '1',
            'hongo_single_product_cross_sells_slides_per_view_tablet' => '2',
            'hongo_single_product_cross_sells_title' => 'You may be interested in...',
            'hongo_single_product_enable_breadcrumb' => '1',
            'hongo_single_product_enable_breadcrumb_heading' => '1',
            'hongo_single_product_title_enable_border' => '0',
            'hongo_single_product_enable_category' => '1',
            'hongo_single_product_enable_compare' => '1',
            'hongo_single_product_enable_cross_sells' => '1',
            'hongo_single_product_enable_cross_sells_autoplay' => '0',
            'hongo_single_product_enable_cross_sells_delay' => '2000',
            'hongo_single_product_enable_cross_sells_loop' => '0',
            'hongo_single_product_enable_cross_sells_navigation' => '1',
            'hongo_single_product_enable_cross_sells_pagination' => '0',
            'hongo_single_product_enable_cross_sells_slider' => '1',
            'hongo_single_product_enable_product_list_tab' => '0',
            'hongo_single_product_enable_related' => '1',
            'hongo_single_product_enable_short_description' => '1',
            'hongo_single_product_enable_size_guide' => '0',
            'hongo_single_product_enable_sku' => '1',
            'hongo_single_product_enable_social_share' => '1',
            'hongo_single_product_enable_sticky_add_to_cart' => '0',
            'hongo_single_product_enable_tab_content_heading' => '0',
            'hongo_single_product_enable_tag' => '1',
            'hongo_single_product_enable_title' => '0',
            'hongo_single_product_enable_title_after_breadcrumb' => '1',
            'hongo_single_product_enable_title_after_navigation' => '1',
            'hongo_single_product_enable_up_sells' => '1',
            'hongo_single_product_enable_wishlist' => '1',
            'hongo_single_product_group_product_icon' => 'ti-layers',
            'hongo_single_product_header_top_spacing' => '1',
            'hongo_single_product_layout_setting' => 'hongo_layout_no_sidebar',
            'hongo_single_product_list_enable_navigation' => '0',
            'hongo_single_product_list_enable_loop' => '0',
            'hongo_single_product_list_enable_autoplay' => '1',
            'hongo_single_product_list_enable_pagination' => '1',
            'hongo_single_product_list_enable_slider' => '0',
            'hongo_single_product_list_slides_per_view_mini_desktop' => '3',
            'hongo_single_product_list_slides_per_view_mobile' => '1',
            'hongo_single_product_list_slides_per_view_tablet' => '3',
            'hongo_single_product_loop_video' => '1',
            'hongo_single_product_mute_video' => '1',
            'hongo_single_product_no_of_columns_cross_sells' => '4',
            'hongo_single_product_no_of_columns_list' => '4',
            'hongo_single_product_no_of_products_cross_sells' => '6',
            'hongo_single_product_no_of_products_list' => '4',
            'hongo_single_product_page_enable_brand' => '0',
            'hongo_single_product_page_enable_brand_image' => '0',
            'hongo_single_product_page_enable_new_box' => '1',
            'hongo_single_product_page_enable_deal' => '0',
            'hongo_single_product_page_enable_sale_box' => '1',
            'hongo_single_product_page_enable_slider' => '1',
            'hongo_single_product_page_enable_title' => '1',
            'hongo_single_product_page_enable_image_zoom_effect' => '1',
            'hongo_single_product_page_enable_zoom_icon' => '1',
            'hongo_single_product_quick_view_icon' => 'icon-eye',
            'hongo_single_product_related_title' => 'Related Product',
            'hongo_single_product_share_title' => 'Share',
            'hongo_single_product_title_after_header' => '0',
            'hongo_single_product_title_callto_section_id' => '#about',
            'hongo_single_product_title_container_style' => 'container',
            'hongo_single_product_title_image_srcset' => 'full',
            'hongo_single_product_title_opacity' => '0.8',
            'hongo_single_product_title_parallax_effect' => '0.5',
            'hongo_single_product_title_scroll_to_down' => '1',
            'hongo_single_product_title_style' => 'page-title-style-1',
            'hongo_single_product_enable_title_heading' => '1',
            'hongo_single_product_title_video_type' => 'self',
            'hongo_single_product_up_sells_title' => 'You may also like',
            'hongo_single_product_variable_product_icon' => 'icon-layers',
            'hongo_single_product_variation_swatch_style' => 'boxed',
            'hongo_single_product_variation_swatch_tooltip' => '0',
            'hongo_single_product_wishlish_icon' => 'icon-heart',
            'hongo_single_product_wishlist_text' => 'Add to Wishlist',
            'hongo_smart_product_cokkie_expire' => '7',
            'hongo_woocommerce_enable_catalog_mode' => '0',
        );

        return $hongo_default_value_wp_customizer_setting;
        
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

// Remove section buider post type in link selection
if ( ! function_exists( 'wocoo_remove_sectionbuilder_wp_link_query_args')) {
    function wocoo_remove_sectionbuilder_wp_link_query_args( $query ) {

        $cpt_to_remove = 'hongobuilder';
        $key = array_search( $cpt_to_remove, $query['post_type'] ); 

        if( $key ) {
            unset( $query['post_type'][$key] );
        }

        return $query;
    }
}

add_filter( 'wp_link_query_args', 'wocoo_remove_sectionbuilder_wp_link_query_args' );

// Customizer settings export import init 
if ( ! function_exists( 'hongo_customizer_settings')) {
    function hongo_customizer_settings( $wp_customize ) {
        if ( current_user_can( 'edit_theme_options' ) ) {

            if ( isset( $_REQUEST['hongo-export'] ) ) {
                hongo_customizer_export( $wp_customize );
            }
            if ( isset( $_REQUEST['hongo-import'] ) && isset( $_FILES['hongo-import-file'] ) ) {
                hongo_customizer_import( $wp_customize );
            }
        }
    }
}
add_action( 'customize_register', 'hongo_customizer_settings', 100 );

// Customizer settings export 
if ( ! function_exists( 'hongo_customizer_export')) {
    function hongo_customizer_export( $wp_customize ) {
        if ( ! wp_verify_nonce( $_REQUEST['hongo-export'], 'hongo-exporting' ) ) {
            return;
        }

        $core_options = array(
            'page_for_posts',
            'blogname',
            'show_on_front',
            'blogdescription',
            'page_on_front',
        );

        $theme_name = get_stylesheet();
        $template   = get_template();
        $charset    = get_option( 'blog_charset' );
        $theme_settings = get_theme_mods();
        $settings_data  = array(
                          'template'  => $template,
                          'mods'      => $theme_settings ? $theme_settings : array(),
                          'options'   => array()
                      );

        // Get options from the Customizer API.
        $settings = $wp_customize->settings();

        foreach ( $settings as $key => $setting ) {

            if ( 'option' == $setting->type ) {

                // Don't save widget data.
                if ( 'widget_' === substr( strtolower( $key ), 0, 7 ) ) {
                    continue;
                }

                // Don't save sidebar data.
                if ( 'sidebars_' === substr( strtolower( $key ), 0, 9 ) ) {
                    continue;
                }

                // Don't save core options.
                if ( in_array( $key, $core_options ) ) {
                    continue;
                }

                $settings_data['options'][ $key ] = $setting->value();
            }
        }

        if( function_exists( 'wp_get_custom_css_post' ) ) {
            $settings_data['wp_css'] = wp_get_custom_css();
        }

        // Set the download headers.
        header( 'Content-disposition: attachment; filename=' . $theme_name . '-export.json' );
        header( 'Content-Type: application/octet-stream; charset=' . $charset );

        // Serialize the export data.
        echo serialize( $settings_data );

        // Start the download.
        die();
    }
}

// Customizer settings import 
if ( ! function_exists( 'hongo_customizer_import')) {
    function hongo_customizer_import( $wp_customize ) {
        // Make sure import form
        if ( ! wp_verify_nonce( $_REQUEST['hongo-import'], 'hongo-importing' ) ) {
            return;
        }

        // Make sure WordPress upload support is loaded.
        if ( ! function_exists( 'wp_handle_upload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

        // Setup global vars.
        global $wp_customize;

        // Setup internal vars.
        $hongo_import_error   = false;
        $template    = get_template();
        $overrides   = array( 'test_form' => false, 'test_type' => false, 'mimes' => array('json' => 'text/plain') );
        $file        = wp_handle_upload( $_FILES['hongo-import-file'], $overrides );

        // Make sure we have an uploaded file.
        if ( isset( $file['error'] ) && ! file_exists( $file['file'] ) ) {
            return;
        }

        // Get the upload data.
        $file_content  = file_get_contents( $file['file'] );
        $file_data = maybe_unserialize( $file_content );

        // Remove the uploaded file.
        unlink( $file['file'] );

        // Data checks.
        if ( ( 'array' != gettype( $file_data ) ) || ( $file_data['template'] != $template ) ) {
            return;
        }
        if ( ! isset( $file_data['template'] ) || ! isset( $file_data['mods'] ) ) {
           return;
        }

        // If wp_css is set then import it.
        if( function_exists( 'wp_update_custom_css_post' ) && isset( $file_data['wp_css'] ) && '' !== $file_data['wp_css'] ) {
            wp_update_custom_css_post( $file_data['wp_css'] );
        }

        // Call the customize_save action.
        do_action( 'customize_save', $wp_customize );

        // Loop through the mods.
        foreach ( $file_data['mods'] as $key => $val ) {

            // Call the customize_save_ dynamic action.
            do_action( 'customize_save_' . $key, $wp_customize );

            // Save the mod.
            set_theme_mod( $key, $val );
        }

        // Call the customize_save_after action.
        do_action( 'customize_save_after', $wp_customize );
    }
}

if ( ! function_exists( 'hongo_google_font_list' ) ) {
    function hongo_google_font_list( $fonts_array, $subsets ) {

        $fonts = $google_fonts_array = array();
        $google_font_json = '';

        $local_file = HONGO_ADDONS_PLUGIN_PATH.'lib/hongo-google-font.json';
        if ( file_exists( $local_file ) ) {
            $google_font_json = file_get_contents( $local_file );
        }

        if ( empty( $subsets ) ) {
            $subsets = get_theme_mod( 'hongo_main_font_subsets', array( 'latin-ext' ) );
            $subsets = ! empty( $subsets ) && ! empty( $subsets[0] ) ? $subsets : array( 'latin' );
        } else {
            $subsets = array( 'latin' );
        }

        if ( ! empty( $google_font_json ) ) {
            $google_fonts = json_decode( $google_font_json );
            if ( ! empty( $google_fonts->items ) ) {
                foreach( $google_fonts->items as $key => $value ) {

                    $flag = false;
                    if( ! empty( $value->subsets ) ) {
                        foreach ( $subsets as $subset ) {
                            if ( in_array( $subset, $value->subsets ) ) {
                                $flag = true;
                            }
                        }
                    }
                    
                    if ( true === $flag && ! empty( $value ) && ! empty( $value->family ) ) {
                        $google_fonts_array[$value->family] = $value->family;
                    }
                }
            }
        }
        if ( ! empty( $google_fonts_array ) ) {
            $fonts_array['google'] = $google_fonts_array;
        }
        return $fonts_array;
    }
}
add_filter( 'hongo_font_list', 'hongo_google_font_list', 10, 2 );

// Current Year
if ( ! function_exists( 'hongo_year_shortcode' ) ) {
    function hongo_year_shortcode () {
        $year = date_i18n ('Y');
        return $year;
    }
}
add_shortcode ( 'currentyear', 'hongo_year_shortcode' );

//login button not display twice
remove_action ('woocommerce_before_checkout_form', 'oa_social_login_render_custom_form_login');

// WPML Hongo Addons Shortcode text field encode json 
add_filter( 'wpml_pb_shortcode_encode', 'hongo_addons_shortcode_encode_urlencoded_json', 10, 3 );
if( ! function_exists( 'hongo_addons_shortcode_encode_urlencoded_json' ) ) {
    function hongo_addons_shortcode_encode_urlencoded_json( $string, $encoding, $original_string ) {
        if ( 'urlencoded_json' === $encoding ) {
            $output = array();
            foreach ( $original_string as $combined_key => $value ) {
                $parts = explode( '_', $combined_key );
                $i = array_pop( $parts );
                $key = implode( '_', $parts );
                if ( 'btn_link_' === substr( $key, 0, 9 ) || 'hongo_navigation_links_' === substr( $key, 0, 23 ) || 'hongo_image_button_link_' === substr( $key, 0, 24 ) || 'hongo_button_config_' === substr( $key, 0, 20 ) || 'shop_button_' === substr( $key, 0, 12 ) ) {
                    $parts = explode( '_', $key );
                    $k = array_pop( $parts );
                    $key = implode( '_', $parts );

                    if ( isset( $output[ $i ][ $key ] ) ) {
                        $out = $output[ $i ][ $key ] . '|';
                    } else {
                        $out = '';
                    }
                    if( $k == 'url' ){
                        $out .= $k . ':' . urlencode( stripslashes( $value ) );
                    } else {
                        $out .= $k . ':' . stripslashes( $value );
                    }
                    $value = $out;
                }
                $output[ $i ][ $key ] = $value;
            }
            $string = urlencode( json_encode( $output ) );
        }
        return $string;
    }
}

// WPML Hongo Addons Shortcode text field decode json
add_filter( 'wpml_pb_shortcode_decode', 'hongo_addons_shortcode_decode_urlencoded_json', 10, 3 );
if( ! function_exists( 'hongo_addons_shortcode_decode_urlencoded_json' ) ){
    function hongo_addons_shortcode_decode_urlencoded_json( $string, $encoding, $original_string ) {
        if ( 'urlencoded_json' === $encoding ) {
            $rows = json_decode( urldecode( $original_string ), true );
            $string = array();
            foreach ( $rows as $i => $row ) {
                foreach ( $row as $key => $value ) {
                    if ( in_array( $key, array( 'label', 'title', 'url','text', 'substring', 'btn_text', 'value', 'y_values', 'link', 'link_url', 'hongo_accordion_title', 'hongo_content', 'hongo_link_url', 'hongo_title', 'hongo_box_link_url', 'hongo_list_value', 'hongo_list_content', 'hongo_progress_title', 'hongo_member_name', 'hongo_member_des', 'hongo_facebook_url', 'hongo_twitter_url', 'hongo_db_url', 'hongo_linkedin_url', 'hongo_instagram_url', 'hongo_tb_url', 'hongo_pinterest_url', 'hongo_yt_url', 'hongo_vm_url', 'hongo_sc_url', 'hongo_fk_url', 'hongo_rss_url', 'hongo_rd_url', 'hongo_behance_url', 'hongo_vine_url', 'hongo_gh_url', 'hongo_xing_url', 'hongo_vk_url', 'hongo_yelp_url', 'hongo_discord_url', 'hongo_skype_url', 'hongo_email_url', 'hongo_name', 'hongo_designation', 'hongo_title_content', 'hongo_subtitle', 'bottom_text', 'hongo_button_text', 'hongo_image_title', 'hongo_regular_price', 'hongo_sale_price', 'hongo_bottom_title', 'hongo_mobile_category_menu_tab_text', 'hongo_category_menu_title', 'hongo_navigation_main_title', 'hongo_mobile_menu_text', 'hongo_hamburger_copyrighttext', 'hongo_product_search_placeholder_text', 'hongo_feature_title' ) ) ) {
                        $string[ $key . '_' . $i ] = array( 'value' => $value, 'translate' => true );
                    } elseif ( 'features' === $key ) {
                        $string[ $key . '_' . $i ] = array( 'value' => nl2br( $value ), 'style' => 'VISUAL', 'translate' => true );
                    } elseif ( 'btn_link' === $key || 'hongo_navigation_links' === $key || 'hongo_image_button_link' === $key || 'hongo_button_config' === $key || 'shop_button' === $key ) {
                        $parts  = explode( '|', $value );
                        foreach ( $parts as $part ) {
                            $data = explode( ':', $part );
                            if ( count( $data ) === 2 ) {
                                if ( in_array( $data[0], array( 'url', 'title' ), true ) ) {
                                    $string[ $key . '_' . $data[0] . '_' . $i ] = array( 'value' => urldecode( $data[1] ), 'translate' => true );
                                } else {
                                    $string[ $key . '_' . $data[0] . '_' . $i ] = array( 'value' => urldecode( $data[1] ), 'translate' => false );
                                }
                            }
                        }
                    } else {
                        $string[ $key . '_' . $i ] = array( 'value' => $value, 'translate' => false );
                    }
                }
            }
        }
        return $string;
    }
}

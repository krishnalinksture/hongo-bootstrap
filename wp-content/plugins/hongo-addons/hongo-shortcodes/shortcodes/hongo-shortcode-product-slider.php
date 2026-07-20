<?php
/**
 * Shortcode For Product Slider
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product Slider */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_product_slider_shortcode' ) ) {
    function hongo_product_slider_shortcode( $atts, $content = null ) {
        
        global $hongo_slider_unique_id, $hongo_slider_script, $hongo_featured_array;

        extract( shortcode_atts( array(
                'hongo_product_slider_style' => '',
                'hongo_product_slides' => '',
                'hongo_single_products' => '',
                'hongo_multiple_products' => '',
                'slider_product_position'  => '',
                'show_pagination' => '1',
                'show_pagination_style' => '',
                'pagination_color' => '',
                'active_pagination_color' => '',
                'hongo_show_navigation' => '1',
                'navigation_color' => '',
                'navigation_bg_color' => '',
                'hongo_show_number_navigation' => '1',
                'hongo_mousewheel_control' => '1',
                'hongo_image_srcset' => '',
                'hongo_shop_product_image_srcset' => '',
                'show_cursor_color_style' => '',

                'show_product_title' => '1',
                'product_title_heading_tag' => '',
                'additional_font_title' => '',
                'show_product_price' => '1',
                'show_product_rating' => '1',
                'custom_rating_color' => '',
                'show_product_sale_new_flash' => '1',
                'show_product_add_to_cart' => '1',
                'show_product_quick_view' => '1',
                'show_product_compare' => '1',
                'show_product_wishlist' => '1',

                'slides_per_view_desktop' => '',
                'slides_per_view_mini_desktop' => '',
                'slides_per_view_tablet' => '',
                'slides_per_view_mobile' => '',
                'autoloop' => '',
                'hongo_space_between_gap' => '30',
                'centered_slides' => '1',
                'autoplay' => '1',
                'slidedelay' => '',
                'hongo_slidespeed' => '',
                'hongo_slider_id' => '',
                'hongo_slider_class' => '',

                'hongo_font_title_setting' => '',
                'hongo_font_number_navigation_setting' => '',
                'hongo_font_price_setting' => '',

            ), $atts ) );

            $output = $slider_config = '';
            $classes = array();
            $i = 1;
            $hongo_product_slider_style = ( $hongo_product_slider_style ) ? $hongo_product_slider_style : '';
            $classes[] = ( $hongo_slider_class ) ? $hongo_slider_class . ' ' . $hongo_product_slider_style : $hongo_product_slider_style;

            // Pagination Color
            $pagination_color = ! empty( $pagination_color ) ? $pagination_color : '';
            $active_pagination_color = ! empty( $active_pagination_color ) ? $active_pagination_color : '';

            $custom_rating_color = ! empty( $custom_rating_color ) ? $custom_rating_color : '';

            // Check if slider id and class
            $hongo_slider_unique_id = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
            $navigation_unique_id = $hongo_slider_unique_id;
            $hongo_slider_id  = ( $hongo_slider_id ) ? $hongo_slider_id : 'product-slider';
            $hongo_slider_id .= '-' . $hongo_slider_unique_id;
            $hongo_slider_unique_id++;

            $classes[] = $hongo_slider_id;

            $class_list = ! empty( $classes ) ? ' ' . implode( ' ', $classes) : '';

            // Responsive typography
            $font_setting_class_title = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
            ( $additional_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
            $font_number_setting_navigation_class = ! empty( $hongo_font_number_navigation_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_number_navigation_setting ) : '';
            $font_setting_class_price    = ! empty( $hongo_font_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_price_setting ) : '';

            // Title Heading Tag
            $product_title_heading_tag = ! empty( $product_title_heading_tag ) ? $product_title_heading_tag : 'h2';

            if ( ! empty( $custom_rating_color ) ) {

        		$hongo_featured_array[] = '#'.$hongo_slider_id.'.woocommerce .star-rating::before, #'.$hongo_slider_id.'.woocommerce .star-rating span, #'.$hongo_slider_id.'.woocommerce p.stars.selected a:not(.active)::before, #'.$hongo_slider_id.'.woocommerce p.stars a::before{ color: '.$custom_rating_color.'; }';
        	}

            // Slide settings by devices
            $slides_per_view_desktop = ! empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '3';
            $slides_per_view_mini_desktop = ! empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
            $slides_per_view_tablet = ! empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
            $slides_per_view_mobile = ! empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

            switch( $hongo_product_slider_style ) {

                case 'product-slider-style-1':

                    if ( ! empty( $hongo_product_slides ) ) {

                        // Number Separator Color
                        $number_navigation_color = hongo_get_vc_custom_settings_by_key( 'color_title' , $hongo_font_number_navigation_setting );
                        if ( ! empty( $number_navigation_color ) ) {
                            $hongo_featured_array[] =  '.'.$hongo_slider_id.' .pagination-number:after{ background-color:'.$number_navigation_color.'; }';
                        }

                        $hongo_product_slides = json_decode( urldecode( $hongo_product_slides ) );

                        $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="woocommerce swiper-container'.esc_attr( $class_list ).'">';

                            $output .= '<div class="swiper-wrapper">';

                                $original_post = $GLOBALS['post'];

                                if ( ! empty( $hongo_product_slides ) ) {

                                    foreach ( $hongo_product_slides as $slide ) {

                                        $hongo_image_srcset  = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';
                                        $thumb = ! empty( $slide->hongo_image ) ? wp_get_attachment_image_src( $slide->hongo_image, $hongo_image_srcset ) : array();

                                        // Get Image srcset
                                        $srcset_data = ! empty( $slide->hongo_image ) ? hongo_get_image_srcset_sizes( $slide->hongo_image, $hongo_image_srcset ): '';

                                        $content_position = ! empty( $slide->slider_product_position ) ? $slide->slider_product_position : '';
                                        $hongo_single_products_id = ! empty($slide->hongo_single_products) ? $slide->hongo_single_products : '';

                                        if ( ! empty( $hongo_single_products_id ) ) {

                                            $GLOBALS['post'] = get_post( $hongo_single_products_id ); // WPCS: override ok.
                                            setup_postdata( $GLOBALS['post'] );

                                            $product = wc_get_product( $hongo_single_products_id );
                                            if ( ! empty( $product ) ) {
                                                if ( $product->get_status() == 'publish' ) {
                                                    $output .= '<div class="swiper-slide '.$content_position.'">';

                                                        if ( ! empty( $thumb[0] ) ) {
                                                            $category_background_image = ! empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';
                                                            $output .='<div class="custom-image col-sm-6"'.$category_background_image.$srcset_data.'></div>';
                                                        } else{
                                                            $output .= '<div class="custom-image col-sm-6" style="background-image: url('. wc_placeholder_img_src() .' );"></div>';
                                                        }

                                                        $thumbnail_id = get_post_thumbnail_id( $hongo_single_products_id );
                                                        $shop_image_thumbnail_size  = ! empty($hongo_shop_product_image_srcset) ? $hongo_shop_product_image_srcset : 'single-post-thumbnail';
                                                        $shop_image = wp_get_attachment_image_src( $thumbnail_id , $shop_image_thumbnail_size );
                                                        
                                                        $hongo_shop_product_image_srcset  = ! empty($hongo_shop_product_image_srcset) ? $hongo_shop_product_image_srcset : 'full';

                                                        $product_srcset = $product_srcset_data = '';
                                                        $product_srcset = ! empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $hongo_shop_product_image_srcset ) : '';
                                                        if ( $product_srcset ) {
                                                            $product_srcset_data = ' data-bg-srcset="'.esc_attr( $product_srcset ).'"';
                                                        }

                                                        $product_title = $product->get_title();
                                                        $product_permalink = $product->get_permalink();
                                                        $product_price = $product->get_price_html();

                                                        $background_image = ! empty( $shop_image[0] ) ? ' style="background-image:url('.$shop_image[0].')"' : '';

                                                        if ( ! empty( $shop_image[0] ) ) {
                                                            $output .= '<div class="shop-product-image col-sm-6"'.$background_image.$product_srcset_data.'>';
                                                        } else{
                                                            $output .= '<div class="shop-product-image col-sm-6" style="background-image: url('. wc_placeholder_img_src() .' );">';
                                                        }
                                                            // Number navigation
                                                            if ( $hongo_show_number_navigation == 1 ) {

                                                                $i = $i < 10 ? '0'.$i : $i;

                                                                $output .= '<div class="pagination-number'.$font_number_setting_navigation_class.'">'.$i.'</div>';

                                                                $i++;
                                                            }

                                                            if ( $show_product_sale_new_flash == 1 ) {
                                                                ob_start();
                                                                    wc_get_template( 'loop/sale-flash.php' );
                                                                    $output .= ob_get_contents();
                                                                ob_end_clean();
                                                            }

                                                            $output .= '<div class="shop-product-title-price-wrap">';
                                                                if ( $show_product_price == 1 ) {
                                                                    if ( ! empty( $product_price ) ) {
                                                                        $output .= '<span class="price'.esc_attr( $font_setting_class_price ).'">' . $product_price .'</span>';
                                                                    }
                                                                }
                                                                if ( $show_product_title == 1 ) {
                                                                    $output .= '<'.$product_title_heading_tag.' class="hongo-product-title"><a class="title'.esc_attr( $font_setting_class_title ).'" href="'.esc_url( $product_permalink ).'">' .$product_title .'</a></'.$product_title_heading_tag.'>'; 
                                                                }
                                                                if ( $show_product_rating == 1 ) {
                                                                    ob_start();
                                                                    wc_get_template( 'loop/rating.php' );
                                                                    $output .= ob_get_contents();
                                                                    ob_end_clean();
                                                                }
                                                            $output .= '</div>';

                                                            $output .= '<div class="shop-product-buttons-wrap product-buttons-wrap" data-tooltip-position="top">';

                                                                if ( $show_product_add_to_cart == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_common_add_to_cart', 10 );
                                                                }

                                                                if ( $show_product_quick_view == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_quick_view', 20 );
                                                                }

                                                                if ( $show_product_compare == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_compare', 30 );
                                                                }

                                                                if ( $show_product_wishlist == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_wishlist', 40 );
                                                                }

                                                                ob_start();
                                                                    /**
                                                                     * hongo_content_widget_button hook.
                                                                     *
                                                                     * @hooked hongo_addons_common_add_to_cart - 10
                                                                     * @hooked hongo_addons_template_loop_product_quick_view - 20            
                                                                     * @hooked hongo_addons_template_loop_product_compare - 30
                                                                     * @hooked hongo_addons_template_loop_product_wishlist - 40
                                                                     */
                                                                    do_action( 'hongo_product_slider_button', $product ); // Content widget button
                                                                    $output .= ob_get_contents();
                                                                ob_end_clean();
                                                                
                                                            $output .= '</div>';
                                                            
                                                        $output .= '</div>';

                                                    $output .= '</div>';
                                                }
                                            }
                                        }
                                    }
                                }
                                $GLOBALS['post'] = $original_post;
                            $output .= '</div>';

                            $slider_config .= "direction: 'vertical',";
                            if ( $hongo_mousewheel_control == 1 ) {
                                $slider_config .= "mousewheel: { mousewheel: true, releaseOnEdges: true },";
                            }
                            $slider_config .= "keyboard: { enabled: true, onlyInViewport: true },";

                            if ( $hongo_show_navigation == 1 ) {

                                ( ! empty($navigation_color) ) ? $hongo_featured_array[] = '#'.$hongo_slider_id. ' .swiper-button-next i, #'.$hongo_slider_id.' .swiper-button-prev i { color: '.$navigation_color.'; }' : '';

                                ( ! empty($navigation_bg_color) ) ? $hongo_featured_array[] = '#'.$hongo_slider_id. ' .swiper-button-next, #'.$hongo_slider_id.' .swiper-button-prev { background-color: '.$navigation_bg_color.'; }' : '';

                                $output .= '<div class="swiper-button-next"><i class="ti-arrow-down swiper-next-' . $navigation_unique_id .'"></i></div>
                                        <div class="swiper-button-prev"><i class="ti-arrow-up swiper-prev-' . $navigation_unique_id .'"></i></div>';
                                        
                                $slider_config .= "navigation: { nextEl: '.swiper-next-" . $navigation_unique_id . "', prevEl: '.swiper-prev-" . $navigation_unique_id . "', },";
                            }

                        $output .= '</div>';
                    }
                break;

                case 'product-slider-style-2':
                    $hongo_multiple_products = ! empty( $hongo_multiple_products ) ? explode(',', $hongo_multiple_products) : array();

                    $pagination_class = $show_pagination == 1 ? ' pagination-bottom-space' : '';
                    $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style.' ' : ' white-move ';
                    $slides_view_desktop      = ! empty($slides_view_desktop) ? $slides_view_desktop : '4';
                    $slides_view_mini_desktop = ! empty($slides_view_mini_desktop) ? $slides_view_mini_desktop : '3';
                    $slides_view_tablet       = ! empty($slides_view_tablet) ? $slides_view_tablet : '2';
                    $slides_view_mobile       = ! empty($slides_view_mobile) ? $slides_view_mobile : '1';
                    
                    if ( ! empty( $hongo_multiple_products ) ) {

                        $output .= '<div id="'.$hongo_slider_id.'" class="woocommerce swiper-container'.esc_attr( $class_list ).esc_attr( $show_cursor_color_style ).esc_attr( $pagination_class ).'">';
                            $output .= '<div class="swiper-wrapper">';

                                $args = array(
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                );

                                if ( !in_array('all', $hongo_multiple_products) ) {
                                    $args['post__in'] = $hongo_multiple_products;
                                }

                                $the_query = new WP_Query( $args );
                                
                                if ( $the_query && $the_query->have_posts() ) {
                                    while ( $the_query->have_posts() ) {

                                        $the_query->the_post();
                                        $product_id = get_the_ID();

                                        global $product;
                                        $thumbnail_id   = get_post_thumbnail_id( $product_id );                                    

                                        // Image Size
                                        $hongo_shop_product_image_srcset  = ! empty($hongo_shop_product_image_srcset) ? $hongo_shop_product_image_srcset : 'single-post-thumbnail';

                                        // Get Image srcset
                                        $srcset_data = hongo_get_image_srcset_sizes( $thumbnail_id, $hongo_shop_product_image_srcset );

                                        $product_permalink = $product->get_permalink();
                                        $product_price = $product->get_price_html();
                                        $product_title = $product->get_title();

                                        $output .= '<div class="swiper-slide">';
                                            $output .= '<div class="product-thumb-wrap">';

                                                if ( ! empty( $thumbnail_id ) ) {
                                                    $output .= '<a href="'.esc_url($product_permalink).'">';

                                                        $output .= hongo_get_image_html( $thumbnail_id, $hongo_shop_product_image_srcset, 'image' );
                                                    $output .= '</a>';
                                                } else {
                                                    $output .= '<a href="'.esc_url($product_permalink).'">';
                                                        $output .= '<img src="'.wc_placeholder_img_src().'" alt="'.esc_html( 'Image', 'hongo-addons' ).'">';
                                                    $output .= '</a>';
                                                }

                                                if ( $show_product_sale_new_flash == 1 ) {
                                                    ob_start();
                                                        wc_get_template( 'loop/sale-flash.php' );
                                                        $output .= ob_get_contents();
                                                    ob_end_clean();
                                                }

                                                $output .= '<div class="product-bottom-wrap">';

                                                    $output .= '<div class="shop-buttons-wrap product-buttons-wrap" data-tooltip-position="top">';

                                                        if ( $show_product_add_to_cart == 1 ) {
                                                            ob_start();
                                                            do_action( 'hongo_addons_compare_list_add_to_cart', $product ); // Add To Cart Button
                                                            $output .= ob_get_contents();
                                                            ob_end_clean();
                                                        }

                                                        if ( $show_product_quick_view == 1 ) {
                                                            $output .= '<a rel="nofollow" href="javascript:void(0);" data-product_id="'.$product_id.'" class="alt-font button product_type_simple hongo-quick-view"><i class="icon-eye icons" title="Quick View"></i><span class="quick-view-text button-text">'.__( 'Quick View', 'hongo-addons' ).'</span></a>';
                                                        }

                                                        if ( $show_product_compare == 1 ) {
                                                            $output .= '<a rel="nofollow" href="javascript:void(0);" data-product_id="'.$product_id.'" class="alt-font button product_type_simple hongo-compare"><i class="ti-control-shuffle icons" title="Compare"></i><span class="compare-text button-text">'.__( 'Compare', 'hongo-addons' ).'</span></a>';
                                                        }

                                                        if ( $show_product_wishlist == 1 ) {
                                                            ob_start();
                                                            do_action( 'hongo_wishlist_icon', $product );
                                                            $output .= ob_get_contents();
                                                            ob_end_clean();
                                                        }

                                                    $output .= '</div>';

                                                    $output .= '<div class="shop-price-rating-wrap">';

                                                        if ( $show_product_price == 1 ) {
                                                            if ( ! empty( $product_price ) ) {
                                                                $output .= '<span class="price alt-font'.esc_attr( $font_setting_class_price ).'">' . $product_price .'</span>';
                                                            }
                                                        }

                                                        if ( $show_product_rating == 1 ) {
                                                            ob_start();
                                                            wc_get_template( 'loop/rating.php' );
                                                            $output .= ob_get_contents();
                                                            ob_end_clean();
                                                        }

                                                    $output .= '</div>';

                                                $output .= '</div>';

                                                if ( $show_product_title == 1 ) {
                                                    $output .= '<div class="shop-title-category-wrap">';
                                                        $output .= '<'.$product_title_heading_tag.' class="hongo-product-title"><a class="title'.esc_attr( $font_setting_class_title ).'" href="'.esc_url( $product_permalink ).'">' .$product_title .'</a></'.$product_title_heading_tag.'>';
                                                    $output .= '</div>';
                                                }

                                            $output .= '</div>';

                                        $output .= '</div>';

                                    }

                                    wp_reset_postdata();
                                }

                            $output .= '</div>';

                            if ( $hongo_show_navigation == 1 ) {

                                if ( ! empty( $navigation_color ) ) {
                                    $hongo_featured_array[] = '#'.$hongo_slider_id. ' .swiper-button-next i, #'.$hongo_slider_id.' .swiper-button-prev i { color: '.$navigation_color.'; }';
                                }

                                $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $navigation_unique_id .'"></i></div>
                                        <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $navigation_unique_id .'"></i></div>';

                                $slider_config .= "navigation: { nextEl: '.swiper-next-" . $navigation_unique_id . "', prevEl: '.swiper-prev-" . $navigation_unique_id . "', },";
                            }

                            $slider_config .= "watchOverflow: true,";
                            $slider_config .= "slidesPerView: " . $slides_per_view_mobile . ",";
                            $slider_config .= "breakpoints: { 768: { slidesPerView: ".$slides_per_view_tablet." }, 992: { slidesPerView: ".$slides_per_view_mini_desktop." }, 1200: { slidesPerView: ".$slides_per_view_desktop." } },";
                            if ( $show_pagination == 1 ) {

                                if ( $show_pagination_style == 'swiper-pagination-border' ) {
                                
                                    if ( ! empty( $pagination_color ) ) {
                                        $hongo_featured_array[] =  '.' . $hongo_slider_id . ' .swiper-pagination-border .swiper-pagination-bullet { border-color:'.$pagination_color.' }';
                                        if ( empty( $active_pagination_color ) ) {
                                            $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$pagination_color.'!important; }';
                                        }
                                    }
                                    
                                    if ( ! empty( $active_pagination_color ) ) {
                                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { border-color:'.$active_pagination_color.' }';
                                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'!important; }';
                                    }
                                } else {

                                    if ( ! empty( $pagination_color ) ) {
                                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet { background-color:'.$pagination_color.'; }';
                                    }
                                    if ( ! empty( $active_pagination_color ) ) {
                                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'; }';   
                                    }
                                }

                                $pagination_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';
                                $class_name = ' swiper-pagination-' . $navigation_unique_id;
                                $output .= '<div class="swiper-pagination'.$class_name.$pagination_class.'"></div>';
                                $slider_config .= "pagination: { el: '.swiper-pagination',type: 'bullets', clickable: true },";
                            }

                        $output .= '</div>';
                    }
                break;

                case 'product-slider-style-3':

                    if ( ! empty( $hongo_product_slides ) ) {

                        // Number Separator Color
                        $number_navigation_color = hongo_get_vc_custom_settings_by_key( 'color_title' , $hongo_font_number_navigation_setting );
                        if ( ! empty( $number_navigation_color ) ) {
                            $hongo_featured_array[] =  '.'.$hongo_slider_id.' .pagination-number:after{ background-color:'.$number_navigation_color.'; }';
                        }

                        $hongo_product_slides = json_decode( urldecode( $hongo_product_slides ) );

                        $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="woocommerce swiper-container'.esc_attr( $class_list ).'">';

                            $output .= '<div class="swiper-wrapper">';

                                $original_post = $GLOBALS['post'];

                                if ( ! empty( $hongo_product_slides ) ) {

                                    foreach ( $hongo_product_slides as $slide ) {

                                        $hongo_image_srcset  = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';
                                        $thumb = ! empty( $slide->hongo_image ) ? wp_get_attachment_image_src( $slide->hongo_image, $hongo_image_srcset ) : array();

                                        // Get Image srcset
                                        $srcset_data = ! empty( $slide->hongo_image ) ? hongo_get_image_srcset_sizes( $slide->hongo_image, $hongo_image_srcset ): '';

                                        $content_position = ! empty( $slide->slider_product_position ) ? $slide->slider_product_position : '';
                                        $hongo_single_products_id = ! empty($slide->hongo_single_products) ? $slide->hongo_single_products : '';

                                        if ( ! empty( $hongo_single_products_id ) ) {

                                            $GLOBALS['post'] = get_post( $hongo_single_products_id ); // WPCS: override ok.
                                            setup_postdata( $GLOBALS['post'] );

                                            $product = wc_get_product( $hongo_single_products_id );
                                            if ( ! empty( $product ) ) {
                                                if ( $product->get_status() == 'publish' ) {

                                                    $background_image_style = ! empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                                    $output .= '<div class="swiper-slide '.$content_position.'"' . $background_image_style . '>';

                                                        $thumbnail_id = get_post_thumbnail_id( $hongo_single_products_id );
                                                        $shop_image_thumbnail_size  = ! empty($hongo_shop_product_image_srcset) ? $hongo_shop_product_image_srcset : 'single-post-thumbnail';

                                                        $product_title = $product->get_title();
                                                        $product_permalink = $product->get_permalink();
                                                        $product_price = $product->get_price_html();

                                                        $background_image = ! empty( $shop_image[0] ) ? ' style="background-image:url('.$shop_image[0].')"' : '';

                                                        $output .= '<div class="shop-product-thumb-wrap product-thumb-wrap">';

                                                            $output .= wp_get_attachment_image( $thumbnail_id , $shop_image_thumbnail_size );

                                                            if ( $show_product_sale_new_flash == 1 ) {
                                                                ob_start();
                                                                    wc_get_template( 'loop/sale-flash.php' );
                                                                    $output .= ob_get_contents();
                                                                ob_end_clean();
                                                            }

                                                            $output .= '<div class="shop-product-title-wrap product-title-wrap">';

                                                                if ( $show_product_title == 1 ) {
                                                                    $output .= '<a class="title'.esc_attr( $font_setting_class_title ).'" href="'.esc_url( $product_permalink ).'"><'.$product_title_heading_tag.' class="hongo-product-title">' .$product_title .'</'.$product_title_heading_tag.'></a>'; 
                                                                }

                                                            $output .= '</div>';

                                                            $output .= '<div class="shop-product-buttons-wrap product-buttons-wrap" data-tooltip-position="top">';

                                                                if ( $show_product_add_to_cart == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_common_add_to_cart', 10 );
                                                                }

                                                                if ( $show_product_quick_view == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_quick_view', 20 );
                                                                }

                                                                if ( $show_product_compare == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_compare', 30 );
                                                                }

                                                                if ( $show_product_wishlist == 1 ) {

                                                                    add_action( 'hongo_product_slider_button', 'hongo_addons_template_loop_product_wishlist', 40 );
                                                                }

                                                                ob_start();
                                                                    /**
                                                                     * hongo_content_widget_button hook.
                                                                     *
                                                                     * @hooked hongo_addons_common_add_to_cart - 10
                                                                     * @hooked hongo_addons_template_loop_product_quick_view - 20            
                                                                     * @hooked hongo_addons_template_loop_product_compare - 30
                                                                     * @hooked hongo_addons_template_loop_product_wishlist - 40
                                                                     */
                                                                    do_action( 'hongo_product_slider_button', $product ); // Content widget button
                                                                    $output .= ob_get_contents();
                                                                ob_end_clean();
                                                                
                                                            $output .= '</div>';
                                                            
                                                            $output .= '<div class="shop-product-title-price-wrap product-title-price-wrap">';
                                                                if ( $show_product_price == 1 ) {
                                                                    if ( ! empty( $product_price ) ) {
                                                                        $output .= '<span class="price'.esc_attr( $font_setting_class_price ).'">' . $product_price .'</span>';
                                                                    }
                                                                }
                                                                if ( $show_product_rating == 1 ) {
                                                                    ob_start();
                                                                    wc_get_template( 'loop/rating.php' );
                                                                    $output .= ob_get_contents();
                                                                    ob_end_clean();
                                                                }
                                                            $output .= '</div>';

                                                        $output .= '</div>';

                                                    $output .= '</div>';
                                                }
                                            }
                                        }
                                    }
                                }
                                $GLOBALS['post'] = $original_post;
                            $output .= '</div>';

                            if ( $hongo_show_navigation == 1 ) {

                                if ( ! empty( $navigation_color ) ) {
                                    $hongo_featured_array[] = '#'.$hongo_slider_id. ' .swiper-button-next i, #'.$hongo_slider_id.' .swiper-button-prev i { color: '.$navigation_color.'; }';
                                }

                                $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $navigation_unique_id .'"></i></div>
                                        <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $navigation_unique_id .'"></i></div>';

                                $slider_config .= "navigation: { nextEl: '.swiper-next-" . $navigation_unique_id . "', prevEl: '.swiper-prev-" . $navigation_unique_id . "', },";
                            }

                            if ( $centered_slides == 1 ) {

                                $slider_config .= "centeredSlides: true,";
                            }
                            
                            $slider_config .= "slidesPerView: 'auto',";
                            $slider_config .= "watchOverflow: true,";
                            if ( $show_pagination == 1 ) {

                                if ( $show_pagination_style == 'swiper-pagination-border' ) {
                                
                                    if ( ! empty( $pagination_color ) ) {
                                        $hongo_featured_array[] =  '.' . $hongo_slider_id . ' .swiper-pagination-border .swiper-pagination-bullet { border-color:'.$pagination_color.' }';
                                        if ( empty( $active_pagination_color ) ) {
                                            $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$pagination_color.'!important; }';
                                        }
                                    }
                                    
                                    if ( ! empty( $active_pagination_color ) ) {
                                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { border-color:'.$active_pagination_color.' }';
                                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'!important; }';
                                    }
                                } else {

                                    if ( ! empty( $pagination_color ) ) {
                                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet { background-color:'.$pagination_color.'; }';
                                    }
                                    if ( ! empty( $active_pagination_color ) ) {
                                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'; }';   
                                    }
                                }

                                $pagination_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';
                                $class_name = ' swiper-pagination-' . $navigation_unique_id;
                                $output .= '<div class="swiper-pagination'.$class_name.$pagination_class.'"></div>';
                                $slider_config .= "pagination: { el: '.swiper-pagination',type: 'bullets', clickable: true },";
                            }

                        $output .= '</div>';
                    }
                break;

            }

            $hongo_slidespeed = ( $hongo_slidespeed ) ? $hongo_slidespeed : '';
            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
            ( $hongo_slidespeed ) ? $slider_config .= 'speed:  '.$hongo_slidespeed.',' : '';
            ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
            ( $autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:' . $slidedelay . ', disableOnInteraction: false, },' : $slider_config .= 'autoplay: false,';
            if ( $hongo_product_slider_style == 'product-slider-style-2' ) {
                $hongo_space_between_gap = ( $hongo_space_between_gap ) ? $hongo_space_between_gap : '30';
                $slider_config .= 'spaceBetween: '.$hongo_space_between_gap.',';
            }
            
            if ( hongo_load_javascript_by_key( 'swiper' ) ) {
                ob_start(); ?>
                    <?php if ( $hongo_product_slider_style == 'product-slider-style-1' ) { ?>
                        var minheight = $(window).height();
                        $( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?>' ).css( 'height', minheight + 'px' );
                    <?php } ?>
                    var productSliderID = "<?php echo str_replace( '-', '_', $hongo_slider_id ); ?>"; setTimeout(function() { productSliderID = new Swiper('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>', { <?php echo sprintf( '%s', $slider_config ); ?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { productSliderID.update(); } }); }, 300); } $( '.nav-tabs a[data-toggle="tab"]' ).each( function () { var $this = $(this); $this.on('shown.bs.tab', function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { productSliderID.update(); } }); });
                <?php 
                $hongo_slider_script .= ob_get_contents();
                ob_end_clean();
            }

        return $output;
    }
}
add_shortcode( 'hongo_product_slider', 'hongo_product_slider_shortcode' );
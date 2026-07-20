<?php
/**
 * Shortcode For Product Category
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------
   Product Category
-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_product_shortcode' ) ) {
    function hongo_product_shortcode( $atts, $content = null ) {
        global $hongo_category_listing_uniq, $hongo_featured_array;
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_category_style' => '',
            'hongo_categories_list' => '',
            'category_title_heading_tag' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_image_srcset' => '',
            'hongo_enable_button'=> '1',
            'hongo_enable_icon' => '',        
            'hongo_icon_type' => '',
            'hongo_button_icon' => '',
            'hongo_grid_column' => '4',
            'hongo_grid_gutter_type' => 'gutter-medium',
            'hongo_grid_show_metro' => '',
            'hongo_double_grid_position' => '',
            'hongo_product_category_grid_slides' =>'',
            'hongo_button_box_bg_color' => '',
            'hongo_title_bg_color' => '',
            'hongo_title_hover_bg_color' => '',
            'hongo_separator_color' => '',
            'hongo_separator_hover_color' => '',
            'hongo_button_hover_bg_color' => '',
            'hongo_count_hover_bg_color' => '',
            'hongo_count_background_color' => '',
            'hongo_background_hover_effect' => '1',
            'hongo_enable_image_zoom_effect' => '1',
            'hongo_box_border' => '0',
            'hongo_box_border_color' => '',
            'hongo_box_border_width' => '',
            'hongo_icon_position' => 'left',
            'hongo_category_column'=> 'column-4',
            'hongo_category_button'=> 'View Product',
            'hongo_enable_count'=> '1',
            'hongo_enable_overlay'=> '1',
            'hongo_icon_setting'=>'',
            'hongo_shop_button_setting' => '',
            'hongo_button_setting' => '',
            'hongo_opacity'=> '0.7',
            'hongo_zindex'=> '',
            'hongo_image_link'=> '0',

            'hongo_animation_style' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',

            'hongo_overlay_color'=>'',
            'hongo_overlay_gradient_color' => '',
            'hongo_font_title_setting'=> '',
            'hongo_grid_font_title_setting' => '',
            'hongo_font_count_setting'=> '',
            'hongo_grid_font_count_setting' => '',
            'hongo_font_bottom_text_setting' => '',
            'hongo_orderby' => 'date',
            'hongo_order' => 'ASC',
        ), $atts ) );

        $categories_list = $classes = $metro_class = array();
        $output = $column_classes = $overlay = $counter = $button = $icon = $category_uniq_class = '';

        $classes[] = $metro_class[] = $hongo_category_style;

        $id     = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $metro_class[] = $class : '';
        $hongo_category_listing_uniq = ! empty( $hongo_category_listing_uniq ) ? $hongo_category_listing_uniq : 1;
        $classes[] = $metro_class[] = $category_uniq_class = 'hongo-category-listing-'.$hongo_category_listing_uniq;
        $hongo_category_listing_uniq++;

        ( $hongo_enable_image_zoom_effect == 0 ) ?  $classes[] = $metro_class[] = 'hongo-no-transition-image': '';

        $hongo_category_style   = ( $hongo_category_style ) ? $hongo_category_style : '';
        $hongo_icon_color_setting = ! empty( $hongo_icon_setting ) ? hongo_shortcode_custom_css_class( $hongo_icon_setting ) : '';
        $hongo_shop_button_class = ! empty( $hongo_shop_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_shop_button_setting ) : '';
        $hongo_button_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
        $hongo_product_category_grid_slides = json_decode( urldecode( $hongo_product_category_grid_slides ) );
       
        ! empty( $hongo_grid_column ) ? $metro_class[] = 'work-'.$hongo_grid_column.'col' : '';
        ! empty( $hongo_grid_gutter_type ) ? $metro_class[] = $hongo_grid_gutter_type : '';
        ! empty( $hongo_grid_gutter_type ) ? $classes[] = $hongo_grid_gutter_type : '';

        // Metro category 
        ( $hongo_grid_show_metro == 1 ) ? $metro_class[] = 'metro-grid' : '';
        $double_grid_position = $hongo_grid_show_metro == 1 && ! empty( $hongo_double_grid_position ) ? explode( ',', $hongo_double_grid_position ) : array();

        // Animation
        $hongo_animation_style = ( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $hongo_animation_style = ' wow '.$hongo_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? $hongo_animation_delay : '0';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? $hongo_animation_duration : '0';

        // Responsive typography & alt font
        $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_title_grid    = ! empty( $hongo_grid_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_grid_font_title_setting ) : '';
        ( $hongo_enable_alternate_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
        ( $hongo_enable_alternate_font_title == 1 ) ? $font_setting_class_title_grid .= ' alt-font' : '';
        $font_setting_class_count    = ! empty( $hongo_font_count_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_count_setting ) : '';
        $font_setting_class_count_grid  = ! empty( $hongo_grid_font_count_setting ) ? hongo_shortcode_custom_css_class( $hongo_grid_font_count_setting ) : '';
        $font_setting_class_bottom_text  = ! empty( $hongo_font_bottom_text_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_bottom_text_setting ) : '';

        // Selected category list
        $categories_to_display_list = ! empty( $hongo_categories_list ) ? explode(",",$hongo_categories_list) : array();

        // All category list
        if ( $categories_to_display_list ) {
            $args = array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'orderby' => $hongo_orderby,
                'order' => $hongo_order,
            );
            if ( ! in_array( 'all', $categories_to_display_list ) ) {

                $args['slug'] = $categories_to_display_list;
            }
            $categories_list = get_terms( $args );
        }

       // Icon or Custom Image
        if ( $hongo_enable_icon == 1 ) {
            $icon_title_gap = $hongo_icon_position == 'right' ? ' icon-right' : ' icon-left';
            if ( ! empty( $hongo_button_icon ) ) {
                $icon = '<i class="'.$hongo_button_icon.' '.$hongo_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon Position
            $button_title = ( $hongo_icon_position == 'right' ) ? $hongo_category_button . $icon : $icon . $hongo_category_button;       
        } else {
            $button_title = $hongo_category_button;
        }
        
        // Button box background color
        if ( ! empty( $hongo_button_box_bg_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' .hongo-category-count{ background-color:'.$hongo_button_box_bg_color.'; }';
        }
        // Title hover bg color
        if ( ! empty( $hongo_title_bg_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap .hongo-category-title span, .'.$category_uniq_class.' li .hongo-category-grid-details .title { background-color:'.$hongo_title_bg_color.'; }';
        }
        // Button border color
        $button_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_shop_button_setting );
        if ( ! empty( $button_color ) && ( $hongo_category_style == 'category-style-9' ) ) {
            $hongo_featured_array[] =  '.'.$category_uniq_class.' li .hongo-category-grid-details .shop-category-link:after { border-bottom-color:'.$button_color.'!important; }';
        }
        // Title Hover Color Box Hover
        $title_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title_hover', $hongo_font_title_setting );
        if ( ! empty( $title_hover_color ) && ( $hongo_category_style == 'category-style-1' || $hongo_category_style == 'category-style-3' || $hongo_category_style == 'category-style-4' || $hongo_category_style == 'category-style-5' ) ) {
            $hongo_featured_array[] =  '.'.$category_uniq_class.' .category-wrap:hover .hongo-category-title a, .'.$category_uniq_class.' .category-wrap:hover .hongo-category-title a i { color:'.$title_hover_color.'!important; }';
            $hongo_featured_array[] =  '.'.$category_uniq_class.' .category-wrap .hongo-category-title a:after { border-bottom-color:'.$title_hover_color.'!important; }';
            $hongo_featured_array[] =  '.'.$category_uniq_class.' .category-wrap:hover .hongo-category-title span { color:'.$title_hover_color.'!important; }';
        }

        // Box Border Color & Width
        if( ! empty( $hongo_box_border_color ) || ! empty( $hongo_box_border_width ) ) {
            if ( $hongo_category_style == 'category-style-9' ) {
                
                if( $hongo_box_border_color ) {
                    $hongo_featured_array[] = '.'.$category_uniq_class.' li.grid-item-border .hongo-category-grid-wrap { border-color:'.$hongo_box_border_color.'; }';
                }

                if( $hongo_box_border_width ) {
                    $hongo_featured_array[] = '.'.$category_uniq_class.' li.grid-item-border .hongo-category-grid-wrap { border-width:'.$hongo_box_border_width.' }';
                }

            }
        }

        $grid_title_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title_hover', $hongo_grid_font_title_setting );
        if ( ! empty( $grid_title_hover_color ) ) {
            if ( $hongo_category_style == 'category-style-9' ) {
                $hongo_featured_array[] =  '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .title a { color:'.$grid_title_hover_color.'!important; }';
            }
            if ( $hongo_category_style == 'category-style-10' ) {
                $hongo_featured_array[] =  '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .title, .'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .title a { color:'.$grid_title_hover_color.'!important; }';
            }
        }
        // Title hover bg color
        if ( ! empty( $hongo_title_hover_bg_color ) ) {
            if ( $hongo_category_style == 'category-style-1' || $hongo_category_style == 'category-style-7' ) {
                $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-category-title a { background-color:'.$hongo_title_hover_bg_color.'; }';
            } elseif ( $hongo_category_style == 'category-style-5' ) {
                $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-category-title span { background-color:'.$hongo_title_hover_bg_color.'; }';
            } elseif ( $hongo_category_style == 'category-style-9' ) {
                $hongo_featured_array[] = '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .title a { background-color:'.$hongo_title_hover_bg_color.'; }';
            } elseif ( $hongo_category_style == 'category-style-10' ) {
                $hongo_featured_array[] = '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .title { background-color:'.$hongo_title_hover_bg_color.'; }';
            }
        }
        // Background hover overlay
        if ( $hongo_background_hover_effect == '0' ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover img { opacity: 1; }';
            $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover img { opacity: 1; }';
        }

        // Button hover background color
        if ( ! empty( $hongo_button_hover_bg_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .shop-category-link { background-color:'.$hongo_button_hover_bg_color.'; }';
        }
        // Count hover background color
        if ( ! empty( $hongo_count_hover_bg_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' li .hongo-category-grid-wrap:hover .hongo-category-count { background-color:'.$hongo_count_hover_bg_color.'; }';
        }
        // Count border color
        if ( ! empty( $hongo_count_background_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap .product-count span { background-color:'.$hongo_count_background_color.'; }';
        }
        // Seprator color
        if ( ! empty( $hongo_separator_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap .hongo-category-title span:after { background-color:'.$hongo_separator_color.'; }';
        }
        // Seprator hover color
        if ( ! empty( $hongo_separator_hover_color ) ) {
            $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-category-title span:after { background-color:'.$hongo_separator_hover_color.'; }';
        }

        // Column Class
        switch ( $hongo_category_column ) {
            case 'column-1':
                $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12'.$hongo_animation_style.'"';
            break;
            case 'column-2':
                $classes[] = 'col-2-nth';
                $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12'.$hongo_animation_style.'"';
            break;
            case 'column-3':
                $classes[] = 'col-3-nth ';
                $column_classes .= ' class="col-md-4 col-sm-6 col-xs-12'.$hongo_animation_style.'"';
            break;
            case 'column-4':
            default:
                $classes[] = 'col-4-nth';
                $column_classes .= ' class="col-md-3 col-sm-6 col-xs-12'.$hongo_animation_style.'"';
            break;
            case 'column-5':
                $classes[] = 'col-5-nth';
                $column_classes .= ' class="vc_col-lg-1/5 col-sm-4 col-xs-12'.$hongo_animation_style.'"';
            break;
            case 'column-6':
                $classes[] = 'col-6-nth';
                $column_classes .= ' class="col-md-2 col-sm-6 col-xs-12'.$hongo_animation_style.'"';
            break;
        }

        $class_list = ! empty( $classes ) ? implode(' ', $classes) : '';
        $metro_class_list = ! empty( $metro_class ) ? implode(' ', $metro_class) : '';
        $class_list = trim( $class_list );

        // Metro Layout
        if ( $hongo_category_style == 'category-style-9' || $hongo_category_style == 'category-style-10' ) {
            if ( ! empty( $hongo_product_category_grid_slides ) ) {

                $output .='<ul '.$id.' class="hongo-category-grid '.esc_attr( $metro_class_list ).'">';
                    $output .='<li class="hongo-grid-sizer"></li>';
                    $i = 0;
                    foreach ( $hongo_product_category_grid_slides as $key => $slides ) {
                        $hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
                        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';
                        $i++;
                        $category_id = $slides->hongo_categories;

                        $term = get_term_by( 'slug', $category_id, 'product_cat' );

                        if ( empty( $term ) || is_wp_error( $term ) ) {
                            continue;
                        }
                        // Grid Layout Class
                        $grid_array = array();
                        if ( ! empty( $double_grid_position[$key] ) && ( $double_grid_position[$key] == '2-1' || $double_grid_position[$key] == '2-2' ) ) {
                            $grid_array[] = 'grid-item-double';
                        }

                        if ( ! empty( $double_grid_position[$key] ) && trim( $double_grid_position[$key] ) != '*' ) {
                            $grid_array[] = 'grid-item-' . $double_grid_position[$key];
                        } else {
                            $grid_array[] = 'grid-item-1-1';
                        }

                        ! empty( $hongo_box_border ) ? $grid_array[] = 'grid-item-border' : '';

                        $grid_class = ! empty( $grid_array ) ? ' '. implode( ' ', $grid_array ) : '';

                        $hongo_show_text_detail_horizontal = ! empty( $slides->hongo_show_text_detail_horizontal ) ? $slides->hongo_show_text_detail_horizontal : 'left';
                        $hongo_show_text_detail_vertical = ! empty( $slides->hongo_show_text_detail_vertical ) ? $slides->hongo_show_text_detail_vertical : 'top';

                        // Title Heading Tag
                        $category_title_heading_tag = ! empty( $category_title_heading_tag ) ? $category_title_heading_tag : 'div';

                        $output .='<li class="hongo-grid-item'.esc_attr( $grid_class ).esc_attr( $hongo_animation_style ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );

                            // Image Size
                            $hongo_image_srcset = ! empty( $slides->hongo_image_srcset ) ? $slides->hongo_image_srcset : 'full';

                            // Get Image Srcset
                            $srcset_data = hongo_get_image_srcset_sizes( $thumbnail_id, $hongo_image_srcset );

                            $shop_button_style = ! empty( $slides->hongo_button_text ) ? $slides->hongo_button_text : '';

                            if ( ! empty( $thumbnail_id ) ) {

                                $output .= '<div class ="hongo-category-grid-wrap">';

                                    $output .= '<div class ="hongo-category-grid-img">';
                                        if ( $slides->hongo_show_image_link == 1 ) {
                                            $image = '<a href="'.get_category_link( $term->term_id ).'">' . $overlay . hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' ) . '</a>';
                                        } else {
                                            $image = $overlay . hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' );
                                        }
                                        $output .= $image;
                                    $output .= '</div>';

                                    $category_name ='<a class="'.esc_attr( $font_setting_class_title_grid ).'" href="'.get_category_link( $term->term_id ).'">'.$term->name.'</a>';

                                    $show_text_class = ' hongo-category-grid-'.$hongo_show_text_detail_horizontal.'-'.$hongo_show_text_detail_vertical;
                                    
                                    $output .= '<div class="hongo-category-grid-details'.esc_attr( $show_text_class ).'">';
                                        $output .= '<'.$category_title_heading_tag.' class ="title'.esc_attr( $font_setting_class_title_grid ).'">'.$category_name.'</'.$category_title_heading_tag.'>';

                                        if ( $hongo_category_style == 'category-style-9' ) {
                                            if ( $slides->hongo_enable_count_product == 1 ) {
                                                $output .= '<div class="hongo-category-count alt-font'.esc_attr( $font_setting_class_count_grid ).'">'.sprintf( _n( '%s item', '%s items', $term->count, 'hongo-addons' ), $term->count ).'</div>';
                                            }                                            

                                            if ( ! empty( $slides->hongo_button_text ) ) {
                                                $output .= '<a class="shop-category-link alt-font'.$hongo_shop_button_class.'" href="'.get_category_link( $term->term_id ).'">'.$slides->hongo_button_text.'</a>';
                                            }
                                        }
                                    $output .= '</div>';
                                    if ( ! empty( $slides->bottom_text ) ) {
                                        $output .= '<div class="category-bottom-text alt-font'.$font_setting_class_bottom_text.'">';
                                            $output .= $slides->bottom_text;
                                        $output .= '</div>';
                                    }                                    
                                $output .= '</div>';
                            }
                        $output .='</li>';
                    }
                $output .='</ul>';
            }
        } else {
            if ( ! empty( $categories_list ) && ! is_wp_error( $categories_list ) ) {

                $hongo_overlay_opacity = ! empty( $hongo_opacity ) ? 'opacity:'.$hongo_opacity.' !important;': 'opacity:0;';
                $hongo_row_overlay_color_att = ( ! empty( $hongo_overlay_gradient_color ) && ! empty( $hongo_overlay_color ) ) ? 'background:linear-gradient(45deg, '.$hongo_overlay_color.' 0%, '.$hongo_overlay_color.' 20%, '.$hongo_overlay_gradient_color.' 81%, '.$hongo_overlay_gradient_color.' 100%) !important;' : ( ! empty( $hongo_overlay_color ) ? 'background:'.$hongo_overlay_color.' !important;' : '' );
                $hongo_z_index = ( $hongo_zindex || $hongo_zindex == '0') ? 'z-index:'.$hongo_zindex.' !important; ' : '';

                if ( $hongo_category_style == 'category-style-2' ) {

                    if ( ! empty( $hongo_overlay_opacity ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-overlay { '.$hongo_overlay_opacity.' }';
                    }
                    if ( ! empty( $hongo_row_overlay_color_att ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-overlay { '.$hongo_row_overlay_color_att.' }';
                    }
                    if ( ! empty( $hongo_z_index ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .category-wrap:hover .hongo-overlay { '.$hongo_z_index.' }';
                    }
                } else {

                    if ( ! empty( $hongo_overlay_opacity ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .hongo-overlay { '.$hongo_overlay_opacity.' }';
                    }
                    if ( ! empty( $hongo_row_overlay_color_att ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .hongo-overlay { '.$hongo_row_overlay_color_att.' }';
                    }
                    if ( ! empty( $hongo_z_index ) ) {
                        $hongo_featured_array[] = '.'.$category_uniq_class.' .hongo-overlay { '.$hongo_z_index.' }';
                    }
                }
                $output .= '<div class="hongo-product-category-wrap">';

                    $output.='<ul '.$id.' class="'.esc_attr( $class_list ).'">';

                        $i = 0;
                        foreach( $categories_list as $cat_list ) {

                            $hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
                            $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

                            if ( empty( $cat_list ) || is_wp_error( $cat_list ) ) {
                                continue;
                            }
                            $thumbnail_id = get_term_meta( $cat_list->term_id, 'thumbnail_id', true ); 
                            $image = wp_get_attachment_url( $thumbnail_id );

                            // Image Size
                            $hongo_image_srcset  = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

                            // Title Heading Tag
                            $category_title_heading_tag = ! empty( $category_title_heading_tag ) ? $category_title_heading_tag : 'h3';

                            // Category Title
                            if ( $hongo_category_style == 'category-style-5' ) {
                                $cat_title = '<'.$category_title_heading_tag.' class="hongo-category-title'.esc_attr( $font_setting_class_title ).'"><a class="title-link'.esc_attr( $font_setting_class_title ).'" href="'.get_category_link( $cat_list->term_id ).'"><span class="'.esc_attr( $font_setting_class_title ).'">'.$cat_list->name.' <i class="fa-solid fa-arrow-right"></i></span></a></'.$category_title_heading_tag.'>';
                            } else {
                                $cat_title = '<'.$category_title_heading_tag.' class="hongo-category-title'.esc_attr( $font_setting_class_title ).'"><a class="title-link'.esc_attr( $font_setting_class_title ).'" href="'.get_category_link( $cat_list->term_id ).'">'.$cat_list->name.'</a></'.$category_title_heading_tag.'>';
                            }

                            // Button
                            if ( $hongo_enable_button == 1 && $hongo_category_style == 'category-style-3' ) {
                                if ( ! empty( $button_title ) ) {
                                    $button = '<a class="hongo-category-btn alt-font'.esc_attr( $hongo_button_class ).'" href="'.get_category_link( $cat_list->term_id ).'">'.$button_title.'</a>';
                                }
                            } elseif ( $hongo_enable_button == 1 ) {
                                if ( ! empty( $button_title ) ) {
                                    $button = '<a class="hongo-category-btn alt-font'.esc_attr( $hongo_icon_color_setting ).'" href="'.get_category_link( $cat_list->term_id ).'">'.$button_title.'</a>';
                                }
                            }

                            // Counter
                            if ( $hongo_enable_count == 1 ) {
                                $counter = '<div class="alt-font product-count'.$font_setting_class_count.'"><span class="'.$font_setting_class_count.'">'.sprintf( _n( '%s item', '%s items', $cat_list->count, 'hongo-addons' ), $cat_list->count ).'</span></div>';
                            }

                            switch ( $hongo_category_style ) {

                                case 'category-style-1':
                                case 'category-style-2':
                                case 'category-style-3':
                                case 'category-style-4':
                                case 'category-style-5':
                                case 'category-style-6':
                                case 'category-style-11':
                                    
                                    // Image Link Check
                                    if ( ! empty( $thumbnail_id ) ) {
                                        // Overlay
                                        if ( $hongo_enable_overlay == '1' && $hongo_category_style != 'category-style-11' ) {
                                            $overlay = '<div class="hongo-overlay"></div>';
                                        }

                                        if ( $hongo_image_link == 1 ) {
                                            $image = '<a href="'.get_category_link( $cat_list->term_id ).'">' . $overlay . hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' ) . '</a>';
                                        } else {
                                            $image = $overlay . hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' );
                                        }
                                    } else{
                                        if ( $hongo_enable_overlay=='1' && $hongo_category_style != 'category-style-11' ){
                                            $image .= '<div class="hongo-overlay"></div>';
                                        }
                                        $image .= wc_placeholder_img();
                                    }
                                break;

                                case 'category-style-7':
                                case 'category-style-8':
                                    // Image Link Check
                                    if ( ! empty( $thumbnail_id ) ) {

                                        if ( $hongo_image_link == 1 ) {
                                            $image = '<a href="'.get_category_link( $cat_list->term_id ).'">' . hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' ) . '</a>';
                                        } else {
                                            $image = hongo_get_image_html( $thumbnail_id, $hongo_image_srcset, 'image' );
                                        }
                                    } else{
                                        $image = wc_placeholder_img();
                                    }
                                break;
                            }

                            switch ( $hongo_category_style ) {

                                case 'category-style-1':
                                case 'category-style-5':
                                case 'category-style-7':
                                case 'category-style-11':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            $output .= $cat_title;

                                            $output.= $image;

                                        $output .= '</div>';

                                    $output .= '</li>';

                                break;

                                case 'category-style-2':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            $output .= $cat_title;

                                            $output .= $counter;

                                            $output.= $image;

                                        $output .= '</div>';

                                    $output .= '</li>';

                                break;

                                case 'category-style-3':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            $output .= $cat_title;

                                            $output .= '<div class="category-btn-wrap">';

                                                $output .= $button;

                                            $output .= '</div>';

                                            $output.= $image;                                            

                                        $output .= '</div>';

                                    $output .= '</li>';

                                break;

                                case 'category-style-4':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            $output .= $cat_title;

                                            $output .= $button;

                                            $output.= $image;

                                        $output .= '</div>';

                                    $output .= '</li>';

                                break;

                                case 'category-style-6':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            if ( ! empty( $button ) || ! empty( $counter ) ) {
                                                $output .= '<div class="hongo-category-count">';

                                                    $output .= $button;

                                                    $output .= $counter;

                                                $output .= '</div>';
                                            }

                                            $output.= $image;

                                        $output .= '</div>';

                                        $output .= $cat_title;

                                    $output .= '</li>';

                                break;

                                case 'category-style-8':

                                    $output.='<li'.$column_classes.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';

                                        $output.='<div class="category-wrap">';

                                            $output .= '<div class="category-content">';

                                                $output .= $cat_title;

                                                $output .= $counter;

                                            $output .= '</div>';

                                            $output .= '<div class="category-image">';

                                                $output.= $image;

                                            $output .= '</div>';

                                        $output .= '</div>';

                                    $output .= '</li>';

                                break;
                            }
                        $i++;
                        }
                        
                    $output.='</ul>';
                $output.='</div>';
            }
        }

        return $output;
    }
}
add_shortcode( 'hongo_product_catagory', 'hongo_product_shortcode' );
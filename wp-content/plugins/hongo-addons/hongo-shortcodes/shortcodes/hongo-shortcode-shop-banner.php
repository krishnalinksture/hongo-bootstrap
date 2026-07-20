<?php
/**
 * Shortcode For Shop Banner
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Shop Banner */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_shop_banner_shortcode' ) ) {
	function hongo_shop_banner_shortcode( $atts, $content = null ) {
        global $hongo_banner_unique_id, $hongo_featured_array;
		extract( shortcode_atts( array(
        	'id' => '',
        	'class' => '',
        	'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

        	'hongo_shop_banner_style' => '',

            'content_position' => '',
            'content_width' => '',
            'content_position_without_center' => '',
            'hongo_title' => '',            
            'title_heading_tag' => '',
        	'hongo_subtitle' => '',
            'subtitle_heading_tag' => '',
            'hongo_highlight_text' => '',
            'hongo_content_title_text' => '',
            'hongo_regular_price' => '',
            'hongo_sale_price' => '',
        	'hongo_image' => '',
        	'hongo_image_srcset' => '',

        	'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',

        	'hongo_button' => '',
            'hongo_button_enable_icon' => '',
            'hongo_button_custom_icon' => '',
            'hongo_button_icon_type' => '',
            'hongo_button_icon_position' => 'left',
            'hongo_button_icon' => '',

            'hongo_separator' => '1',
            'hongo_separator_color' => '',
            'hongo_font_title_setting' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_font_subtitle_setting' => '',
            'hongo_subtitle_separator_color' => '',
            'hongo_enable_alternate_font_subtitle' => '1',
            'hongo_font_content_setting' => '',
            'hongo_font_hightlight_setting' => '',
            'hongo_font_content_title_setting' => '',
            'hongo_font_regular_price_setting' => '',
            'hongo_font_sale_price_setting' => '',
            
            'hongo_image_hover_effect' => '1',
            'hongo_box_gradient_color' => '',

            'hongo_background_color' => '',            
            'hongo_background_hover_color' => '',
            'hongo_highlight_bg_color' => '',
            'hongo_button_style' => '',
            'hongo_button_type' => '',
            'hongo_button_setting' => '',

            'content_desktop_width' => '',
            'content_desktop_mini_width' => '',
            'content_ipad_width' => '',
            'content_mobile_width' => '',

            'hongo_content_desktop_width' => '',
            'hongo_content_desktop_mini_width' => '',
            'hongo_content_ipad_width' => '',
            'hongo_content_mobile_width' => '',
        ), $atts ) );

		$output = $hongo_button_style_class = $main_attr = '';
		$classes = $box_content_classes = $content_classes = $style_array = $wrapper_attributes = array();

        // Extra class & id
        $id     = ( $id ) ? ' id="'.$id.'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        // Shop banner unique id 
        $hongo_banner_unique_id  = ! empty( $hongo_banner_unique_id ) ? $hongo_banner_unique_id : 1;
        $classes[] = $hongo_banner_id =  'shop-banner-unique-' . $hongo_banner_unique_id;
        $hongo_banner_unique_id++;

        $hongo_shop_banner_style = ( $hongo_shop_banner_style ) ? $hongo_shop_banner_style : '';
        $hongo_title = ! empty( $hongo_title ) ? str_replace( '||', '<br />', $hongo_title ) : '';        
        $hongo_subtitle = ! empty( $hongo_subtitle ) ? str_replace( '||', '<br />', $hongo_subtitle ) : '';
        $hongo_subtitle_separator_color = ! empty( $hongo_subtitle_separator_color ) ? $hongo_subtitle_separator_color : '';
        $hongo_highlight_text       = ! empty( $hongo_highlight_text ) ? str_replace( '||', '<br />', $hongo_highlight_text ) : '';
        $hongo_content_title_text   = ! empty( $hongo_content_title_text ) ? str_replace( '||', '<br />', $hongo_content_title_text ) : '';
        $hongo_image = ( $hongo_image ) ? $hongo_image : '';

        // Background Image 
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Box Content width settings
        $content_desktop_width = ( $content_desktop_width ) ?  $box_content_classes[] = $content_desktop_width : '';
        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $box_content_classes[] = $content_desktop_mini_width : '';
        $content_ipad_width   = ( $content_ipad_width ) ? $box_content_classes[] = $content_ipad_width : '';
        $content_mobile_width = ( $content_mobile_width ) ? $box_content_classes[] = $content_mobile_width : '';
        $box_content_class_list = ! empty( $box_content_classes ) ? ' ' . implode(" ", $box_content_classes) : '';

        // Content width settings
        $hongo_content_desktop_width = ( $hongo_content_desktop_width ) ?  $content_classes[] = $hongo_content_desktop_width : '';
        $hongo_content_desktop_mini_width = ( $hongo_content_desktop_mini_width ) ? $content_classes[] = $hongo_content_desktop_mini_width : '';
        $hongo_content_ipad_width   = ( $hongo_content_ipad_width ) ? $content_classes[] = $hongo_content_ipad_width : '';
        $hongo_content_mobile_width = ( $hongo_content_mobile_width ) ? $content_classes[] = $hongo_content_mobile_width : '';
        $content_class_list = ! empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

        // Responsive typography & alt font
        $font_setting_class_title    =  ( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_title .= ( $hongo_enable_alternate_font_title == 1 ) ? ' alt-font' : '';
        $font_setting_class_subtitle =  ( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
        $font_setting_class_subtitle  .= ( $hongo_enable_alternate_font_subtitle == 1 ) ? ' alt-font' : '';
        $font_setting_class_content  =  ( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        $font_setting_class_highlight_text = ( $hongo_font_hightlight_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_hightlight_setting ) : '';
        $font_setting_class_content_title = ( $hongo_font_content_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_title_setting ) : '';
        $font_setting_class_regular_price = ( $hongo_font_regular_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_regular_price_setting ) : '';
        $font_setting_class_sale_price = ( $hongo_font_sale_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_sale_price_setting ) : '';
        $button_setting_class   =  ( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

        // For button style
        if ( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // Image 
        $hongo_image_srcset = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';
        $thumb              = ! empty( $hongo_image ) ? wp_get_attachment_image_src( $hongo_image, $hongo_image_srcset ) : array();

        // Get Image srcset and sizes
        $srcset_data = hongo_get_image_srcset_sizes( $hongo_image, $hongo_image_srcset );

        // Button Title , url & target 
        $first_button_parse_args = ! empty( $hongo_button ) ? vc_parse_multi_attribute( $hongo_button ) : array();
        $first_button_link       = ( isset( $first_button_parse_args['url'] ) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title      = ( isset( $first_button_parse_args['title'] ) ) ? $first_button_parse_args['title'] : '';
        $first_button_target     = ( isset( $first_button_parse_args['target'] ) ) ? trim( $first_button_parse_args['target'] ) : '_self';

        $hongo_button_icon_type = ( $hongo_button_icon_type ) ? ' ' . $hongo_button_icon_type : '';

        // Button Icon or Custom Image
        if ( ! empty( $hongo_button_icon ) ) {
            $icon_title_gap = ( $hongo_button_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            
            $icon = '<i class="'.$hongo_button_icon.$hongo_button_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';

            // Icon Position
            if ( $hongo_button_icon_position == 'right' ) {
                $first_button_title = $first_button_title . $icon;
            } else {
                $first_button_title = $icon . $first_button_title;
            }
        }

        // Unique style class 
        $classes[] = ( $hongo_shop_banner_style ) ? $hongo_shop_banner_style : '';

        // CSS Box 
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box
        if ( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Title Heading Tag
        $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

        // Sub Title Heading Tag
        $subtitle_heading_tag = ! empty( $subtitle_heading_tag ) ? $subtitle_heading_tag : 'div';

        /* Filter for background image */
        $bg_image_url = apply_filters( 'hongo_shortcode_background_image_url', '', $css );
        if( ! empty( $bg_image_url ) ) {
            $style_array[] = "background-image:url( " . $bg_image_url . " ) !important;";
        }

        // Style Property List
        $style_property = ( $style_array ) ? implode( "", $style_array ) : '';
        if( ! empty( $style_property ) ) {
            $wrapper_attributes[] = 'style="' . esc_attr( trim( $style_property ) ) . '"';
        }

        if( ! empty( $wrapper_attributes ) ) {
            $main_attr = ' ' . implode( ' ', $wrapper_attributes );
        }

        // Main Class List
        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';
        
        switch ( $hongo_shop_banner_style ) {

            case 'hongo-shop-banner-1':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';

                // Content width
                if ( $content_width ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-content { width: ' . $content_width . '; }';
                }

                if ( $hongo_subtitle || $hongo_title || $first_button_title || $content ) {

                    // Content Position 
                    ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';

            		$output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

            			$output .= '<div class="hongo-shop-banner-content'.$box_content_class_list.'">';
                            // Subtitle 
                            if ( ! empty( $hongo_subtitle ) ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
            				if ( ! empty( $hongo_title ) ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'. $hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Content
                            if ( ! empty( $content ) ) {
                                $output .= '<div class="shop-banner-content'.esc_attr( $font_setting_class_content ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Button 
                            if ( ! empty( $first_button_title ) ) {
                                $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                            }
            			$output .= '</div>';

            		$output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-3':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-large';

                // Content Position 
                ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';
                $class_list .= ' hongo-shop-banner-blur-event';

                if ( $hongo_image || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="hongo-shop-banner-content">';
                            // Image 
                            if ( ! empty( $hongo_image ) ) {
                                $output .= '<div class="hongo-shop-banner-img">';
                                    $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                $output .= '</div>';
                            }
                            // Button 
                            if ( ! empty( $first_button_title ) ) {
                                $output .= '<a href="'.esc_url( $first_button_link ).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-4':

                if ( $hongo_title || $hongo_subtitle || $first_button_title ) {

                    // Button Style & Type
                    $button_setting_class .= ( $hongo_button_style_class ) ? ' btn' . $hongo_button_style_class : ' btn-link alt-font';
                    $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-medium';

                    // Content Position 
                    ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';

                    $output .= '<div' . $id .' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="hongo-shop-banner-content'.$box_content_class_list.'">';
                            // Subtitle 
                            if ( ! empty( $hongo_subtitle ) ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
                            if ( ! empty( $hongo_title ) ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'. $hongo_title .'</'.$title_heading_tag.'>';    
                            }
                            // Button 
                            if ( ! empty( $first_button_title ) ) {
                                $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-5':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? ' btn' . $hongo_button_style_class : ' btn btn-white alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';

                // Box gradient color
                if ( $hongo_box_gradient_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-img:before{ background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 55%,' . $hongo_box_gradient_color . ' 100%); }';
                }

                $hongo_image_hover_effect = ( $hongo_image_hover_effect != '1' ) ? ' hongo-no-transition-image' : '';

                // Content Position 
                ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';

                if ( $hongo_image || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . esc_attr( $class_list ) . esc_attr( $hongo_image_hover_effect ) . '"' . $main_attr . '>';
                        
                        //$output .= '<a href="'.esc_url($first_button_link).'">';
                            
                            $output .= '<div class="hongo-shop-banner-content">';
                                // Image 
                                if ( ! empty( $hongo_image ) ) {
                                    $output .= '<div class="hongo-shop-banner-img">';
                                        $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                    $output .= '</div>';
                                }
                                
                                // Button 
                                if ( ! empty( $first_button_title ) ) {
                                    $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                                }

                            $output .= '</div>';
                        
                        //$output .= '</a>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-6':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-round btn-white alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-very-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .bg-dark-gray{ background-color: '.$hongo_background_color.'; }';
                }
                // Content Position 
                ( ! empty($content_position) ) ? $class_list .= ' '.$content_position : '';

                if ( $hongo_title || $hongo_subtitle || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="hongo-shop-banner-content bg-dark-gray">';
                            // Subtitle 
                            if ( ! empty( $hongo_subtitle ) ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
                            if ( ! empty( $hongo_title ) ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Button 
                            if ( ! empty( $first_button_title ) ) {
                                $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-7':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-extra-small';
                
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .bg-very-light-gray{ background-color: '.$hongo_background_color.'; }';
                }

                // Content Position 
                ! empty( $content_position_without_center ) ? $class_list .= ' '.$content_position_without_center : '';

                if ( $hongo_title || $hongo_subtitle || $first_button_title || $hongo_image ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding">';
                            // Image 
                            if ( ! empty( $hongo_image ) ) {
                                $output .= '<div class="hongo-shop-banner-img">';                                    
                                    $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                $output .= '</div>';
                            }
                        $output .= '</div>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding bg-very-light-gray">';
                            $output .= '<div class="hongo-shop-banner-content text-middle-main">';
                                $output .= '<div class="text-middle">';
                                    // Subtitle 
                                    if ( ! empty( $hongo_subtitle ) ) {
                                        $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                                    }
                                    // Title 
                                    if ( ! empty( $hongo_title ) ) {
                                        $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                                    }
                                    // Button 
                                    if ( ! empty( $first_button_title ) ) {
                                        $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;
            
            case 'hongo-shop-banner-8':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  : ' btn-very-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .bg-extra-light-gray{ background-color: '.$hongo_background_color.'; }';
                }

                // Content Position 
                ! empty( $content_position_without_center ) ? $class_list .= ' '.$content_position_without_center : '';

                if ( $hongo_title || $hongo_subtitle || $first_button_title || $hongo_image ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding">';
                            // Image 
                            if ( ! empty( $hongo_image ) ) {
                                $output .= '<div class="hongo-shop-banner-img">';                                    
                                    $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                $output .= '</div>';
                            }
                        $output .= '</div>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding bg-extra-light-gray">';
                            $output .= '<div class="hongo-shop-banner-content text-middle-main">';
                                $output .= '<div class="text-middle">';
                                    // Border Option 
                                    if ( $hongo_separator == 1 ) {
                                        if ( ! empty( $hongo_separator_color ) ){
                                            $hongo_featured_array[] =  '.'.$hongo_banner_id.' .vertical-separator{ background-color:'.$hongo_separator_color.' }';
                                        }

                                        $output .= '<div class="vertical-separator"></div>';
                                    }
                                    // Title 
                                    if ( ! empty( $hongo_title ) ) {
                                        $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                                    }
                                    // Subtitle 
                                    if ( ! empty( $hongo_subtitle ) ) {
                                        $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                                    }
                                    // Button 
                                    if ( ! empty( $first_button_title ) ) {
                                        $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-9':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';

                // Background color
                if ( ! empty( $hongo_background_color ) ) {
                   $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-content{ background-color: '.$hongo_background_color.' !important; }';
                }
                // Background hover color
                if ( ! empty( $hongo_background_hover_color ) ) {
                   $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-content:hover,.'.$hongo_banner_id.':hover .hongo-shop-banner-content{ background-color: '.$hongo_background_hover_color.' !important; }';
                }

                // Content Position 
                ! empty( $content_position_without_center ) ? $class_list .= ' '.$content_position_without_center : '';

                if ( $hongo_image || $hongo_title || $hongo_subtitle || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';
                        // Image
                        if ( ! empty( $hongo_image ) ) {
                            $output .= '<div class="hongo-shop-banner-img">';                                
                                $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                            $output .= '</div>';
                        }
                        if ( ! empty( $hongo_title ) || ! empty( $hongo_subtitle ) || ! empty( $first_button_title ) ) {
                            $output .= '<div class="hongo-shop-banner-content">';
                                // Title 
                                if ( ! empty( $hongo_title ) ) {
                                    $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                                }
                                // Button 
                                if ( ! empty( $first_button_title ) ) {
                                    $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-10':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-very-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .bg-very-light-gray{ background-color: '.$hongo_background_color.'; }';
                }

                // Content Position 
                ! empty( $content_position_without_center ) ? $class_list .= ' '.$content_position_without_center : '';
                
                if ( $hongo_image || $hongo_subtitle || $hongo_title || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding">';
                            // Image 
                            if ( ! empty( $hongo_image ) ) {
                                $output .= '<div class="hongo-shop-banner-img">';
                                    $output .= hongo_get_image_html( $hongo_image, $hongo_image_srcset );
                                $output .= '</div>';
                            }
                        $output .= '</div>';

                        $output .= '<div class="col-sm-6 col-xs-12 no-padding bg-very-light-gray">';
                            $output .= '<div class="hongo-shop-banner-content text-middle-main">';
                                $output .= '<div class="text-middle">';
                                    // Subtitle 
                                    if ( ! empty( $hongo_subtitle ) ) {
                                        $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                                    }
                                    // Title 
                                    if ( ! empty( $hongo_title ) ) {
                                        $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                                    }

                                    // Content
                                    if ( ! empty( $content ) ) {
                                        $output .= '<div class="shop-banner-content'.$font_setting_class_content.$content_class_list.'">' . hongo_remove_wpautop( $content ) . '</div>';
                                    }

                                    // Button 
                                    if ( ! empty( $first_button_title ) ) {
                                        $output .= '<a href="'.esc_url( $first_button_link ).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-11':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-very-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-content{ background-color: '.$hongo_background_color.'; }';
                }
                if ( $hongo_title || $hongo_subtitle || $first_button_title ) {

                    // Content Position 
                    ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="hongo-shop-banner-content">';
                            // Subtitle 
                            if ( ! empty( $hongo_subtitle ) ) {

                                if ( ! empty( $hongo_subtitle_separator_color ) ){
                                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .hongo-shop-banner-content .shop-banner-sub-title span{ background-color:'.$hongo_subtitle_separator_color.' }';
                                }

                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'"><span></span>'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
                            if ( ! empty( $hongo_title ) ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'. $hongo_title .'</'.$title_heading_tag.'>';    
                            }
                            // Content
                            if ( ! empty( $content ) ) {
                                $output .= '<div class="shop-banner-content'.$font_setting_class_content.'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Regular price & Sale Price
                            $currency      = get_woocommerce_currency_symbol();
                            $currency      = ! empty($currency) ? $currency : '';
                            
                            $sale_price = ! empty( $hongo_sale_price ) ? $currency.$hongo_sale_price : '';
                            $regular_price = ! empty( $hongo_regular_price ) ? $currency.$hongo_regular_price : '';

                            // regular price and sale price
                            if( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
                                $output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regular_price.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
                                $output .= '<ins class="sale-price'.$font_setting_class_sale_price.'"><span class="woocommerce-Price">'. $sale_price .'</span></ins></div>';
                            } elseif ( ! empty( $regular_price ) ) {
                                $output .= '<div class="price alt-font"><ins><span class="woocommerce-Price">'. $regular_price .'</span></ins></div>';
                            } elseif ( ! empty( $sale_price) ) {
                                $output .= '<div class="price alt-font"><ins><span class="woocommerce-Price">'. $sale_price .'</span></ins></div>';
                            }

                            // Button 
                            if ( ! empty( $first_button_title ) ) {
                                $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-14':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-medium';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper{ background-color: '.$hongo_background_color.'; }';
                }
                // Content Position
                ! empty( $content_position ) ? $class_list .= ' '.$content_position : '';

                if ( $hongo_subtitle || $hongo_title || $hongo_content_title_text ||  $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="shop-banner-wrapper">';
                            // Subtitle 
                            if ( $hongo_subtitle ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title text'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
                            if ( $hongo_title ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'. $hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Content Title 
                            if ( $hongo_content_title_text ) {
                                $output .= '<div class="shop-banner-title-content alt-font'.$font_setting_class_content_title.'">'. $hongo_content_title_text .'</div>';
                            }
                            // Content
                            if ( $content ) {
                                $output .= '<div class="shop-banner-content'.$font_setting_class_content.'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Button 
                            if ( $first_button_title ) {
                                $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-15':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper{ background-color: '.$hongo_background_color.'; }';
                }
                // Highlight BG Color
                if ( $hongo_highlight_bg_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper .shop-banner-highlight{ background-color: '.$hongo_highlight_bg_color.'; }';
                }
                if( $hongo_separator == 1 ) {
                    if( ! empty( $hongo_separator_color ) ){
                        $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper .shop-banner-sub-title span::before, .'.$hongo_banner_id.' .shop-banner-wrapper .shop-banner-sub-title span::after{ background-color:'.$hongo_separator_color.' }';
                    }                    
                } else{
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper .shop-banner-sub-title span::before, .'.$hongo_banner_id.' .shop-banner-wrapper .shop-banner-sub-title span::after{ display:none; }';
                }
                // Content Position
                ( $content_position ) ? $class_list .= ' '.$content_position : '';

                if ( $hongo_subtitle || $hongo_title || $hongo_highlight_text || $hongo_content_title_text ||  $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="shop-banner-wrapper">';
                            // Subtitle 
                            if( $hongo_subtitle ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">';
                                    $output .= '<span>'. $hongo_subtitle .'</span>';
                                $output .= '</'.$subtitle_heading_tag.'>';
                            }
                            // Title 
                            if( $hongo_title ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'. $hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Hightlight Title 
                            if( $hongo_highlight_text ) {
                                $output .= '<div class="shop-banner-highlight alt-font'.$font_setting_class_highlight_text.'">'. $hongo_highlight_text .'</div>';
                            }
                            // Content Title 
                            if ( $hongo_content_title_text ) {
                                $output .= '<div class="shop-banner-title-content alt-font'.$font_setting_class_content_title.'">'. $hongo_content_title_text .'</div>';
                            }
                            // Content
                            if( $content ) {
                                $output .= '<div class="shop-banner-content'.$font_setting_class_content.'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Button 
                            if( $first_button_title ) {
                                $output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($first_button_link).'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-16':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-small';
                ( ! empty($content_position) ) ? $class_list .= ' '.$content_position : '';

                // Content width
                if ( $content_width ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .shop-banner-wrapper, .'.$hongo_banner_id.'.right-side-product .shop-banner-wrapper { width: ' . $content_width . '; }';
                }

                if ( $hongo_subtitle || $hongo_title || $first_button_title) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="shop-banner-wrapper'.$box_content_class_list.'">';
                            // Subtitle 
                            if( $hongo_subtitle ) {
                                $output .= '<'.$subtitle_heading_tag.' class="shop-banner-sub-title'.$font_setting_class_subtitle.'">'. $hongo_subtitle .'</'.$subtitle_heading_tag.'>';    
                            }
                            // Title 
                            if( $hongo_title ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Content
                            if( $content ) {
                                $output .= '<div class="shop-banner-content'.$font_setting_class_content.'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Button 
                            if( $first_button_title ) {
                                $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="'.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;

            case 'hongo-shop-banner-20':

                // Button Style & Type
                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-green alt-font';
                $button_setting_class .= ( $hongo_button_type ) ? ' '.$hongo_button_type  :  ' btn-very-small';
                // Background Color
                if ( $hongo_background_color ) {
                    $hongo_featured_array[] =  '.'.$hongo_banner_id.' .bg-transparent-black { background-color: '.$hongo_background_color.'; }';
                }
                // Content Position 
                ( ! empty($content_position) ) ? $class_list .= ' '.$content_position : '';

                if ( $hongo_title || $hongo_subtitle || $first_button_title ) {

                    $output .= '<div' . $id . ' class="' . $class_list . '"' . $main_attr . '>';

                        $output .= '<div class="hongo-shop-banner-content bg-transparent-black">';
                            
                            // Title 
                            if( ! empty( $hongo_title ) ) {
                                $output .= '<'.$title_heading_tag.' class="shop-banner-title'.$font_setting_class_title.'">'.$hongo_title .'</'.$title_heading_tag.'>';
                            }
                            // Button 
                            if( ! empty( $first_button_title ) ) {
                                $output .= '<a href="'.esc_url($first_button_link).'" target="'.$first_button_target.'" class="width-100 '.trim( $button_setting_class ).'">'.$first_button_title.'</a>';
                            }
                        $output .= '</div>';

                    $output .= '</div>';
                }
            break;
        }
		return $output;
	}
}
add_shortcode('hongo_shop_banner','hongo_shop_banner_shortcode');
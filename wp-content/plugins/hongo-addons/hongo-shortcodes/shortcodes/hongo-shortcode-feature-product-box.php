<?php
/**
 * Shortcode For Feature Product Box
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Product Box */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_feature_product_box_shortcode' ) ) {
    function hongo_feature_product_box_shortcode( $atts, $content = null ) {

        global $hongo_featured_array,$product_featurebox1,$product_featurebox2,$product_featurebox3,$product_featurebox4,$icon_text4,$icon_text5,$icon_text6,$icon_text7,$icon_text8,$icon_text10,$icon_text11,$custom_icon_text1,$fancy_text_box1,$fancy_text_box2,$fancy_text_box3,$fancy_text_box4,$fancy_text_box5,$fancy_text_box6,$hongo_text_box1,$hongo_text_box2,$hongo_text_box3,$hongo_text_box4,$hongo_rotate_box1,$hongo_rotate_box2,$hongo_rotate_box3,$hongo_process_step1,$hongo_process_step2,$hongo_process_step3,$hongo_info_banner1,$hongo_info_banner2,$hongo_info_banner3,$hongo_info_banner4,$hongo_info_banner5,$hongo_info_banner6,$interactive_banner1,$interactive_banner2,$interactive_banner3,$interactive_banner4,$interactive_banner5,$interactive_banner6;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'equal_height_disable' => '',

    		'hongo_product_feature_type' => '',
    		'hongo_icon_list'=> '',
    		'custom_icon' => '',
            'icon_background' => '1',
        	'custom_icon_image' => '',
            'custom_icon_max_width' => '',

        	'title_custom_icon' => '',
        	'title_custom_icon_image' => '',
        	'title_hongo_icon_list' => '',
            'hongo_title_icon_color' => '',

            'hongo_feature_number' => '',
        	'hongo_feature_title' => '',
            'hongo_feature_hover_title' => '',
            'title_heading_tag'  => '',
        	'hongo_feature_subtitle' =>'',
        	'hongo_title_bg_color' => '',
            'hongo_subtitle_bg_color' => '',
            'subtitle_heading_tag'  => '',
            'hongo_feature_content' => '',
            'hongo_enable_alternate_font_title' => '1',
            'hongo_enable_alternate_font_hover_title' => '1',
            'hongo_enable_alternate_font_subtitle' => '',

            'hongo_feature_email' => '',
            'hongo_feature_phone' => '',

            'hongo_enable_link' => '',
            'hongo_link_url' => '',
            'hongo_link_on' => '',
            'hongo_link_target' => '',

            'hongo_enable_separator' => '1',
            'hongo_separator_color' => '',

            'hongo_desktop_enable_separator' => '1',
            'hongo_mini_enable_separator' => '1',
            'hongo_ipad_enable_separator' => '1',
            'hongo_mobile_enable_separator' => '1',
            'hongo_right_separator_color' => '',

            'hongo_icon_size' => '',
            'hongo_icon_color' => '',
            'hongo_icon_hover_color' => '',
            'hongo_icon_bg_color' => '',

            'hongo_featurebox_image' => '',
            'hongo_featurebox_image_srcset' => 'full',
            'hongo_image_position' => 'top',

            'hongo_button_config' => '',
            'hongo_button_style' => '',
            'hongo_button_type' => '',
            'hongo_button_enable_icon' => '',
            'hongo_button_custom_icon' => '',
            'hongo_button_icon_type' => '',
            'hongo_button_icon_position' => 'left',
            'hongo_button_icon' => '',           
            'hongo_button_setting' => '',

            'hongo_font_number_setting' => '',
            'hongo_font_title_setting' => '',
            'hongo_font_hover_title_setting' => '',
            'hongo_font_subtitle_setting' => '',
            'hongo_font_content_setting' => '',
            'hongo_font_phone_setting' => '',
            'hongo_font_email_setting' => '',

            'hongo_product_feature_box_color' => '',
            'hongo_product_feature_box_hover_color' => '',
            'hongo_product_feature_box_border_color' => '',
            'hongo_product_feature_box_border_width' => '',
            'hongo_feature_box_hover_gradient_color' => '',
            'hongo_box_hover_border_color' => '',
            'hongo_box_hover_border_width' => '',
            'hongo_product_feature_box_gradient_color' => '',
            'hongo_number_border_color' => '',
            'hongo_number_hover_border_color' => '',
            'hongo_number_color' => '',
            'hongo_number_hover_color' => '',
            'hongo_hover_bg_color' => '',
            'hongo_number_hover_bg_color' => '',

            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_width' => '',

            'content_desktop_width' => '',
            'content_desktop_mini_width' => '',
            'content_ipad_width' => '',
            'content_mobile_width' => '',

        ), $atts));

        $output = $hongo_icon_output = $hongo_button_style_class = $hongo_button_type_class = $button_icon = $hongo_product_feature_hover_color = $hongo_product_feature_color_style = $title_hover_color = '';

        $classes = $content_classes = $bg_classes = array();

        // For button style
        if ( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }
        // For button type
        if ( ! empty( $hongo_button_type ) ) {

            switch( $hongo_button_type ) {
                
                case 'extra-large':
                    $hongo_button_type_class = ' btn-extra-large';
                break;
                case 'large':
                    $hongo_button_type_class = ' btn-large';
                break;
                case 'medium':
                    $hongo_button_type_class = ' btn-medium';
                break;
                case 'small':
                    $hongo_button_type_class = ' btn-small';
                break;
                case 'vsmall':
                    $hongo_button_type_class = ' btn-very-small';
                break;
            }
        }

        // Button configuration
        $hongo_button_parse_args = ! empty( $hongo_button_config ) ? vc_parse_multi_attribute( $hongo_button_config ) : array();
        $hongo_button_link     = isset( $hongo_button_parse_args['url'] ) ? $hongo_button_parse_args['url'] : '#';
        $hongo_button_title    = isset( $hongo_button_parse_args['title'] ) ? $hongo_button_parse_args['title'] : '';
        $hongo_button_target   = isset( $hongo_button_parse_args['target'] ) ? trim( $hongo_button_parse_args['target'] ) : '_self';

        $hongo_button_icon_type    = ! empty( $hongo_button_icon_type ) ? ' ' . $hongo_button_icon_type : '';

        // Button Icon or Custom Image
        if ( ! empty( $hongo_button_icon ) ) {
            $icon_title_gap = ( $hongo_button_icon_position == 'right' ) ? ' right-icon' : ' left-icon';
            if ( $hongo_button_icon ) {
                $button_icon = '<i class="'.$hongo_button_icon.$hongo_button_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
            }

            // Icon Position
            if ( $hongo_button_icon_position == 'right' ) {
                $hongo_button_title = $hongo_button_title . $button_icon;
            } else {
                $hongo_button_title = $button_icon . $hongo_button_title;
            }
        }

        // Content width settings
        $content_desktop_width = ( $content_desktop_width ) ?  $content_classes[] = $content_desktop_width : '';
        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $content_classes[] = $content_desktop_mini_width : '';
        $content_ipad_width   = ( $content_ipad_width ) ? $content_classes[] = $content_ipad_width : '';
        $content_mobile_width = ( $content_mobile_width ) ? $content_classes[] = $content_mobile_width : '';
        $content_class_list = ! empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

        // Responsive typography & alt font
        $button_setting_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
        $font_setting_class_number = ! empty( $hongo_font_number_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_number_setting ) : '';
        $font_setting_class_title = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        ( $hongo_enable_alternate_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
        $font_setting_class_hover_title = ! empty( $hongo_font_hover_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_hover_title_setting ) : '';
        ( $hongo_enable_alternate_font_hover_title == 1 ) ? $font_setting_class_hover_title .= ' alt-font' : '';
        $font_setting_class_subtitle = ! empty( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
        ( $hongo_enable_alternate_font_subtitle == 1 ) ? $font_setting_class_subtitle .= ' alt-font' : '';
        $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        ( $content_class_list ) ?  $font_setting_class_content .= $content_class_list : '';
        $font_setting_class_phone = ! empty( $hongo_font_phone_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_phone_setting ) : '';
        $font_setting_class_email = ! empty( $hongo_font_email_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_email_setting ) : '';

        $id     = ( $id ) ? ' id="'.$id.'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        // Image Configuraion
        $hongo_featurebox_image = ( $hongo_featurebox_image ) ? $hongo_featurebox_image : '';
        $hongo_featurebox_image_srcset = ( $hongo_featurebox_image_srcset ) ? $hongo_featurebox_image_srcset : 'full';

        // Feature product box title 
        $hongo_feature_title        = ! empty( $hongo_feature_title ) ? str_replace( '||', '<br />', $hongo_feature_title ) : '';
        $hongo_feature_hover_title  = ! empty( $hongo_feature_hover_title ) ? str_replace( '||', '<br />', $hongo_feature_hover_title ) : '';
        $hongo_feature_subtitle     = ! empty( $hongo_feature_subtitle ) ? str_replace( '||', '<br />', $hongo_feature_subtitle ) : '';

        // Gradient Color 
        if ( $hongo_product_feature_type == 'hongo-product-featurebox-3' ) {
            $hongo_product_feature_color_style = ! empty( $hongo_product_feature_box_color ) && ! empty( $hongo_product_feature_box_gradient_color ) ? 'background: linear-gradient(180deg, '.$hongo_product_feature_box_color.' 0%, '.$hongo_product_feature_box_gradient_color.' 100%); ' : ( ! empty( $hongo_product_feature_box_color ) ? 'background: ' . $hongo_product_feature_box_color : '' );
        }

        // Gradient hover color 
        if ( $hongo_product_feature_type == 'fancy-text-box-style-5' ) {
            $hongo_product_feature_hover_color = ! empty( $hongo_product_feature_box_hover_color ) && ! empty( $hongo_feature_box_hover_gradient_color ) ? 'background: linear-gradient(180deg, '.$hongo_product_feature_box_hover_color.' 0%, '.$hongo_feature_box_hover_gradient_color.' 100%); ' : ( ! empty( $hongo_product_feature_box_hover_color ) ? 'background: ' . $hongo_product_feature_box_hover_color : '' );
        } elseif ( $hongo_product_feature_type == 'rotate-box-style-1' ) {
            $hongo_product_feature_hover_color = ! empty( $hongo_product_feature_box_hover_color ) && ! empty( $hongo_feature_box_hover_gradient_color ) ? 'background: linear-gradient(45deg, '.$hongo_product_feature_box_hover_color.' 0%, '.$hongo_feature_box_hover_gradient_color.' 100%); ' : ( ! empty( $hongo_product_feature_box_hover_color ) ? 'background: ' . $hongo_product_feature_box_hover_color : '' );
        } else {
            $hongo_product_feature_hover_color = ( ! empty( $hongo_product_feature_box_hover_color ) ? 'background-color: ' . $hongo_product_feature_box_hover_color : '' );
        }

        // CSS Box 
        if ( $hongo_product_feature_type == 'info-banner-style-3' || $hongo_product_feature_type == 'info-banner-style-5' ) {
            ( ! empty( $css ) ) ? $bg_classes[] = vc_shortcode_custom_css_class( $css, ' ' ) : '';
        } else {
            ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';    
        }
        

        // Responsive CSS Box
        if ( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            if ( $hongo_product_feature_type == 'info-banner-style-3' || $hongo_product_feature_type == 'info-banner-style-5' ) {
                $bg_classes[] = hongo_shortcode_custom_css_class( $responsive_css );    
            } else {
                $classes[] = hongo_shortcode_custom_css_class( $responsive_css );    
            }
        }

        // Custom Link
        $hongo_link_url      = ( $hongo_link_url ) ? $hongo_link_url : '';
        $hongo_link_on       = ( $hongo_link_on ) ? $hongo_link_on : '';
        $hongo_link_target   = ( $hongo_link_target ) ? ' target="'.$hongo_link_target.'"' : '';

        // Icon Size
        $hongo_icon_size     = ( $hongo_icon_size ) ? ' '.$hongo_icon_size : ' icon-medium';

        // Background Image
        if ( $hongo_product_feature_type == 'info-banner-style-3' || $hongo_product_feature_type == 'info-banner-style-5' ) {

            ! empty( $hongo_bg_image_type ) ? $bg_classes[] = $hongo_bg_image_type : '';
            ! empty( $desktop_bg_image_position ) ? $bg_classes[] = $desktop_bg_image_position : '';
            $bg_class_list = ! empty( $bg_classes ) ? ' ' . implode( " ", $bg_classes ) : '';
        } else {
            ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
            ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        }

        // Unique style class 
        ( $hongo_product_feature_type ) ? $classes[] = $hongo_product_feature_type : '';

        // Equal Height Disable
        ( $equal_height_disable == '1' ) ? $classes[] = 'equal_height_disable' : '';

        // Classes and style attribute
        $class_list = ! empty( $classes ) ? ' ' . implode( " ", $classes ) : '';

        // Title Heading Tag
        $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

        // Sub Title Heading Tag
        $subtitle_heading_tag = ! empty( $subtitle_heading_tag ) ? $subtitle_heading_tag : 'div';

        // Icon main output
        $common_class = '';        
        if ( $hongo_product_feature_type == 'process-step-style-2' && ( $hongo_desktop_enable_separator == 1 || $hongo_mini_enable_separator == 1 || $hongo_ipad_enable_separator == 1 || $hongo_mobile_enable_separator == 1 ) ) {
            $common_class = ' hongo-featurebox-img-border';
        }

        $icon_border = array();
        if ( $hongo_product_feature_type == 'process-step-style-2' ) {
            ( $hongo_desktop_enable_separator != 1 ) ? $icon_border[] = 'lg-border-display-none' : '';
            ( $hongo_mini_enable_separator != 1 ) ? $icon_border[] = 'md-border-display-none' : '';
            ( $hongo_ipad_enable_separator != 1 ) ? $icon_border[] = 'sm-border-display-none' : '';
            ( $hongo_mobile_enable_separator != 1 ) ? $icon_border[] = 'xs-border-display-none' : '';
        }

        $icon_border_class = ! empty( $icon_border ) ? ' ' . implode( " ", $icon_border ) : '';

        // icon background class
        $icon_bg_class = ( $hongo_product_feature_type == 'rotate-box-style-3' ) ? ' icon-bg-color' : '';
        if ( $hongo_icon_list || ( $custom_icon == 1 && $custom_icon_image ) ) {

            $hongo_icon_output.= '<div class="hongo-featurebox-img'.$common_class.$icon_border_class.$icon_bg_class.'">';

                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                    $hongo_icon_output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                }
                    $hongo_icon_output .= ( $hongo_product_feature_type == 'process-step-style-2' ) ? '<span>' : '';
                        if ( $hongo_icon_list ) {

                            $hongo_icon_class = ( $hongo_product_feature_type == 'icon-text-style-4' || $hongo_product_feature_type == 'icon-text-style-10' || $hongo_product_feature_type == 'fancy-text-box-style-2' || $hongo_product_feature_type == 'text-box-style-2'|| $hongo_product_feature_type == 'rotate-box-style-2'|| $hongo_product_feature_type == 'process-step-style-2') ? 'base-color ' : '';
                            ( $hongo_product_feature_type == 'icon-text-style-8' ) ? $hongo_icon_class = 'icon-white ' : '';
                            ( $hongo_product_feature_type == 'icon-text-style-5' && $icon_background == 1 ) ? $hongo_icon_class = 'base-bg-color ' : '';

                            $hongo_icon_output.= '<i class="'.$hongo_icon_class.$hongo_icon_list.$hongo_icon_size.'"></i>';

                        } elseif ( $custom_icon == 1 && $custom_icon_image ) {
                            
                            $hongo_icon_output .= hongo_get_image_html( $custom_icon_image );
                        }
                    $hongo_icon_output .= ( $hongo_product_feature_type == 'process-step-style-2' ) ? '</span>' : '';

                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                    $hongo_icon_output .= '</a>';
                }

            $hongo_icon_output.= '</div>';
        }        

        switch ( $hongo_product_feature_type ) {

            case 'hongo-product-featurebox-1':

                $product_featurebox1 = ! empty( $product_featurebox1 ) ? $product_featurebox1 : 0;
                $product_featurebox1 = $product_featurebox1 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.product_featurebox1-'.$product_featurebox1.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.product_featurebox1-'.$product_featurebox1.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.product_featurebox1-'.$product_featurebox1.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }

    			if ( $hongo_icon_output || $hongo_feature_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' product_featurebox1-'.$product_featurebox1.'">';
                    
            			$output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                			if ( ! empty( $hongo_feature_title ) ) {

                				$output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                			}

            			$output.='</div>';

                    $output.='</div>';
                }
            break;

        	case 'hongo-product-featurebox-2':

                $product_featurebox2 = ! empty( $product_featurebox2 ) ? $product_featurebox2 : 0;
                $product_featurebox2 = $product_featurebox2 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.product_featurebox2-'.$product_featurebox2.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Separator 
                ( $hongo_enable_separator == 0 ) ? $hongo_featured_array[] = '.product_featurebox2-'.$product_featurebox2.' { border-right: none; }' : '';
                // Separator color
                if ( $hongo_separator_color ) {
                    $hongo_featured_array[] = '.product_featurebox2-'.$product_featurebox2.' { border-right-color : '.$hongo_separator_color.'}';
                }
                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.product_featurebox2-'.$product_featurebox2.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty($hongo_icon_hover_color) ) {
                    $hongo_featured_array[] = '.product_featurebox2-'.$product_featurebox2.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';    
                }

                if ( $hongo_icon_output || $hongo_feature_title ) {

		            $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' product_featurebox2-'.$product_featurebox2.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.='</'.$title_heading_tag.'>';    
                            }

                        $output.='</div>';

                    $output.='</div>';
    			}
        	break;

        	case 'hongo-product-featurebox-3':

                $product_featurebox3 = ! empty( $product_featurebox3 ) ? $product_featurebox3 : 0;
                $product_featurebox3 = $product_featurebox3 + 1;

                // Background color
                if ( $hongo_product_feature_color_style ) {
                    $hongo_featured_array[] = '.product_featurebox3-'.$product_featurebox3.'{ '.$hongo_product_feature_color_style.' }';
                }
                if ( $hongo_feature_title || $hongo_feature_subtitle ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' product_featurebox3-'.$product_featurebox3.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

            			    if ( ! empty( $hongo_feature_title ) ) {

                                $output.='<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.='</'.$title_heading_tag.'>';
            			    }

            			    if ( ! empty( $hongo_feature_subtitle) ) {
            			        $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
            			    }

            		    $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'hongo-product-featurebox-4':

                $product_featurebox4 = ! empty( $product_featurebox4 ) ? $product_featurebox4 : 0;
                $product_featurebox4 = $product_featurebox4 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.product_featurebox4-'.$product_featurebox4.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.product_featurebox4-'.$product_featurebox4.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color) ) {
                    $hongo_featured_array[] = '.product_featurebox4-'.$product_featurebox4.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';    
                }

                if ( $hongo_icon_output || $hongo_feature_title ) {

                    $output .= '<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' product_featurebox4-'.$product_featurebox4.'">';

                        $output .= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {

                                $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }
                                $output.='</'.$title_heading_tag.'>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-4':

                $icon_text4 = ! empty( $icon_text4 ) ? $icon_text4 : 0;
                $icon_text4 = $icon_text4 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text4-'.$icon_text4.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text4-'.$icon_text4.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text4-'.$icon_text4.' .hongo-featurebox-wrapper .hongo-featurebox-img a:hover i { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Remove icon left padding
                $class_list .= ( empty( $hongo_icon_output ) ) ? ' no-padding-left' : '';

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_subtitle ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text4-'.$icon_text4.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output .= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';  
                            }

                            if ( ! empty( $hongo_feature_subtitle ) ) {
                                $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';    
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-5':

                $icon_text5 = ! empty( $icon_text5 ) ? $icon_text5 : 0;
                $icon_text5 = $icon_text5 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text5-'.$icon_text5.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text5-'.$icon_text5.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text5-'.$icon_text5.' .hongo-featurebox-wrapper .hongo-featurebox-img a:hover i { color:'.$hongo_icon_hover_color.' !important; }';    
                }
                // Icon background color
                if ( ! empty( $hongo_icon_bg_color ) ) {
                    $hongo_featured_array[] = '.icon_text5-'.$icon_text5.' .hongo-featurebox-wrapper .hongo-featurebox-img i { background-color:'.$hongo_icon_bg_color.' !important; }';    
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text5-'.$icon_text5.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content) ) {                        
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';    
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-6':

                $icon_text6 = ! empty( $icon_text6 ) ? $icon_text6 : 0;
                $icon_text6 = $icon_text6 + 1;

                $button_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text6-'.$icon_text6.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text6-'.$icon_text6.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text6-'.$icon_text6.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text6-'.$icon_text6.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content ) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                            if ( $hongo_button_title ) {

                                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
                                $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  ' btn-large';

                                $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                    $output .= $hongo_button_title;

                               $output .= '</a>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-7':

                $icon_text7 = ! empty( $icon_text7 ) ? $icon_text7 : 0;
                $icon_text7 = $icon_text7 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text7-'.$icon_text7.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text7-'.$icon_text7.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text7-'.$icon_text7.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Remove icon left padding
                $class_list .= ( empty( $hongo_icon_output ) ) ? ' no-padding-left' : '';

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text7-'.$icon_text7.'">';
                    
                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-8':

                $icon_text8 = ! empty( $icon_text8 ) ? $icon_text8 : 0;
                $icon_text8 = $icon_text8 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text8-'.$icon_text8.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text8-'.$icon_text8.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text8-'.$icon_text8.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Remove icon left padding
                $padding_class = ( empty( $hongo_icon_output ) ) ? ' no-padding-left' : '';
                // Separator 
                ( $hongo_enable_separator == 0 ) ? $hongo_featured_array[] = '.icon_text8-'.$icon_text8.' .hongo-featurebox-inner-wrap { border-bottom: none; }' : '';
                // Separator color
                if ( $hongo_separator_color ) {
                    $hongo_featured_array[] = '.icon_text8-'.$icon_text8.' .hongo-featurebox-inner-wrap { border-bottom-color : '.$hongo_separator_color.'}';
                }
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.icon_text8-'.$icon_text8.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text8-'.$icon_text8.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            $output.= '<div class="hongo-featurebox-inner-wrap'.$padding_class.'">';

                                // Custom icon and image 
                                $output.= $hongo_icon_output;

                                if ( ! empty( $hongo_feature_subtitle) ) {
                                    $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                                }

                                if ( ! empty( $hongo_feature_title ) ) {
                                    $output.= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">';
                                        
                                        if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }
                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';  
                                }
                            $output.='</div>';

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-10':

                $icon_text10 = ! empty( $icon_text10 ) ? $icon_text10 : 0;
                $icon_text10 = $icon_text10 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text10-'.$icon_text10.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text10-'.$icon_text10.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text10-'.$icon_text10.' .hongo-featurebox-wrapper .hongo-featurebox-img a:hover i { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Box Background Color 
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                	$hongo_featured_array[] = '.icon_text10-'.$icon_text10.' { background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Remove icon left padding
                $class_list .= ( empty( $hongo_icon_output ) ) ? ' no-padding-left' : '';

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_subtitle ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text10-'.$icon_text10.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output .= $hongo_icon_output;

                            $output.= '<div class="hongo-featurebox-content-wrap">';
	                            if ( ! empty( $hongo_feature_title ) ) {
	                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

	                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
	                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
	                                    }
	                                        $output.= $hongo_feature_title;

	                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
	                                        $output .= '</a>';
	                                    }

	                                $output.= '</'.$title_heading_tag.'>';  
	                            }

	                            if ( ! empty( $hongo_feature_subtitle ) ) {
	                                $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';    
	                            }
	                        $output.='</div>';
                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'icon-text-style-11':

                $icon_text11 = ! empty( $icon_text11 ) ? $icon_text11 : 0;
                $icon_text11 = $icon_text11 + 1;

                $button_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.icon_text11-'.$icon_text11.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.icon_text11-'.$icon_text11.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon hover color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.icon_text11-'.$icon_text11.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Box Background Color 
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                	$hongo_featured_array[] = '.icon_text11-'.$icon_text11.' { background-color: '.$hongo_product_feature_box_color.' }';
                }
                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' icon_text11-'.$icon_text11.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content ) ) {
                                $output .= '<div class="content alt-font'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'custom-icon-text-style-1':

                $custom_icon_text1 = ! empty( $custom_icon_text1 ) ? $custom_icon_text1 : 0;
                $custom_icon_text1 = $custom_icon_text1 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.custom_icon_text1-'.$custom_icon_text1.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.custom_icon_text1-'.$custom_icon_text1.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.custom_icon_text1-'.$custom_icon_text1.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' custom_icon_text1-'.$custom_icon_text1.'">';
                    
                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'fancy-text-box-style-1':

                $fancy_text_box1 = ! empty( $fancy_text_box1 ) ? $fancy_text_box1 : 0;
                $fancy_text_box1 = $fancy_text_box1 + 1;

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box1-'.$fancy_text_box1.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box1-'.$fancy_text_box1.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }
                
                // Number Color
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box1-'.$fancy_text_box1.' .hongo-featurebox-wrapper .base-color { color:'.$hongo_number_color.' !important; }';
                    $hongo_featured_array[] = '.fancy_text_box1-'.$fancy_text_box1.' .hongo-featurebox-wrapper .base-color a { color:'.$hongo_number_color.' !important; }';
                }

                // Number Border Color
                if ( ! empty( $hongo_number_border_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box1-'.$fancy_text_box1.' .hongo-featurebox-wrapper .base-color:before { background-color:'.$hongo_number_border_color.' !important; }';
                }

                

                if ( $hongo_feature_number || $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box1-'.$fancy_text_box1.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            $output .= '<div class="hongo-featurebox-wrapper-main">';

                                if ( $hongo_feature_number ) {
                                    $output .= '<span class="base-color alt-font'.$font_setting_class_number.'">';
                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                        }

                                            $output .= $hongo_feature_number;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</span>';
                                }

                                $output.= '<div class="hongo-featurebox-inner-wrap">';

                                    if ( ! empty( $hongo_feature_title ) ) {
                                        $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                            if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                            }
                                                $output.= $hongo_feature_title;

                                            if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output.= '</'.$title_heading_tag.'>';
                                    }

                                    if ( ! empty( $hongo_feature_subtitle) ) {
                                        $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                                    }

                                $output.='</div>';
                            $output.='</div>';

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'fancy-text-box-style-2':

                $fancy_text_box2 = ! empty( $fancy_text_box2 ) ? $fancy_text_box2 : 0;
                $fancy_text_box2 = $fancy_text_box2 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.fancy_text_box2-'.$fancy_text_box2.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box2-'.$fancy_text_box2.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box2-'.$fancy_text_box2.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';    
                }

                // Hover Background Color
                if ( ! empty( $hongo_product_feature_box_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box2-'.$fancy_text_box2.':before { background-color:'.$hongo_product_feature_box_hover_color.'; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box2-'.$fancy_text_box2.'">';
                    
                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {
                                
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';  
                            }

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'fancy-text-box-style-3':

                $fancy_text_box3 = ! empty( $fancy_text_box3 ) ? $fancy_text_box3 : 0;
                $fancy_text_box3 = $fancy_text_box3 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.fancy_text_box3-'.$fancy_text_box3.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.fancy_text_box3-'.$fancy_text_box3.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }

                // Hover Background Color
                if ( ! empty( $hongo_product_feature_box_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box3-'.$fancy_text_box3.':before { background-color:'.$hongo_product_feature_box_hover_color.'; }';
                }
                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box3-'.$fancy_text_box3.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box3-'.$fancy_text_box3.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box3-'.$fancy_text_box3.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content) ) {

                                $output .= '<div class="content-hover">';

                                    if ( ! empty( $hongo_feature_title ) ) {

                                        $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_hover_title.'">';

                                            if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_hover_title.'">';
                                            }

                                                $output.= $hongo_feature_title;

                                            if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output.= '</'.$title_heading_tag.'>';
                                    }

                                    $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';

                                $output .= '</div>';

                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'fancy-text-box-style-4':

                $fancy_text_box4 = ! empty( $fancy_text_box4 ) ? $fancy_text_box4 : 0;
                $fancy_text_box4 = $fancy_text_box4 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Hover Background Color
                if ( ! empty( $hongo_product_feature_box_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.':before { background-color:'.$hongo_product_feature_box_hover_color.'; }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                    $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.':hover .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Title hover color
                if ( ! empty( $hongo_font_title_setting ) ) {
                    $title_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title_hover', $hongo_font_title_setting );
                    if ( $title_hover_color ) {
                        $hongo_featured_array[] = '.fancy_text_box4-'.$fancy_text_box4.':hover .hongo-featurebox-text { color:'.$title_hover_color.' !important; }';
                    }
                }

                if ( $hongo_feature_title || $hongo_feature_subtitle || $hongo_icon_output ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box4-'.$fancy_text_box4.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( ! empty( $hongo_feature_title ) ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';  
                            }

                            if ( ! empty( $hongo_feature_subtitle) ) {
                                $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';    
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'fancy-text-box-style-5':

                $fancy_text_box5 = ! empty( $fancy_text_box5 ) ? $fancy_text_box5 : 0;
                $fancy_text_box5 = $fancy_text_box5 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Background Color 
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                     $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                     $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.':before{ '.$hongo_product_feature_hover_color.' }';
                }
                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';
                }

                // Separater Color
                if ( ! empty( $hongo_separator_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box5-'.$fancy_text_box5.' .hongo-featurebox-wrapper .hongo-featurebox-img:before{
                        border-color:'.$hongo_separator_color.'!important; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box5-'.$fancy_text_box5.'">';

                        $output.= '<div class="hongo-featurebox-wrapper">';

                            // Custom icon and image
                            $output.= $hongo_icon_output;

                            $output.= '<div class="hongo-featurebox-inner-wrap">';

                                if ( ! empty( $hongo_feature_title ) ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }
                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( ! empty( $hongo_feature_subtitle) ) {
                                    $output.='<'.$subtitle_heading_tag.' class="sub-title'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                                }

                            $output.='</div>';

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;
            
            case 'fancy-text-box-style-6':

                $fancy_text_box6 = ! empty( $fancy_text_box6 ) ? $fancy_text_box6 : 0;
                $fancy_text_box6 = $fancy_text_box6 + 1;

                // Icon Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box6-'.$fancy_text_box6.' .hongo-featurebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box6-'.$fancy_text_box6.' .hongo-featurebox-wrapper .hongo-featurebox-img i:hover { color:'.$hongo_icon_hover_color.' !important; }';    
                }

                // Number Color
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.fancy_text_box6-'.$fancy_text_box6.' .hongo-featurebox-wrapper .base-color, .fancy_text_box6-'.$fancy_text_box6.' .hongo-featurebox-wrapper .base-color a  { color:'.$hongo_number_color.' !important; }';
                }

                if ( $hongo_feature_number || $hongo_feature_title || $hongo_feature_content ) {
                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' fancy_text_box6-'.$fancy_text_box6.'">';
                    
                        $output.= '<div class="hongo-featurebox-wrapper">';

                            if ( $hongo_feature_number ) {
                                
                                $output .= '<span class="base-color alt-font'.$font_setting_class_number.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                    }
                                        $output .=  $hongo_feature_number;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }

                                $output .= '</span>';
                            }

                            if ( ! empty( $hongo_feature_title ) ) {
                                $output.= '<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( ! empty( $hongo_feature_content) ) {
                                $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'text-box-style-1':

                $hongo_text_box1 = ( $hongo_text_box1 ) ? $hongo_text_box1 : 0;
                $hongo_text_box1 = $hongo_text_box1 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-textbox-1-'.$hongo_text_box1.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-1-'.$hongo_text_box1.' .hongo-textbox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( $hongo_icon_hover_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-1-'.$hongo_text_box1.':hover .hongo-textbox-wrapper .hongo-featurebox-img i{ color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-1-'.$hongo_text_box1.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Box Background Hover Color 
                if ( $hongo_product_feature_box_hover_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-1-'.$hongo_text_box1.':before{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_icon_output || $hongo_feature_content ) {

                    $output.= '<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-textbox-1-'.$hongo_text_box1.'">';

                        $output.= '<div class="hongo-textbox-wrapper">';

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';  
                            }

                            if ( $hongo_feature_content ) {

                                $output .= '<div class="hongo-textbox-content'.$font_setting_class_content.'">';

                                    $output .= $hongo_feature_content;

                                $output .= '</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'text-box-style-2':

                $hongo_text_box2 = ( $hongo_text_box2 ) ? $hongo_text_box2 : 0;
                $hongo_text_box2 = $hongo_text_box2 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-textbox-2-'.$hongo_text_box2.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-2-'.$hongo_text_box2.' .hongo-textbox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color 
                if ( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-2-'.$hongo_text_box2.':hover .hongo-textbox-wrapper .hongo-featurebox-img i{ color:'.$hongo_icon_hover_color.' !important; }';
                }
                // Box Background Color 
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-2-'.$hongo_text_box2.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Box Background Hover Color 
                if ( ! empty( $hongo_product_feature_box_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-2-'.$hongo_text_box2.':before{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_icon_output || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-textbox-2-'.$hongo_text_box2.'">';
                    
                        $output.= '<div class="hongo-textbox-wrapper">';

                            /* Main Content */

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( $hongo_feature_title ) {
                                
                                $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            /* Hover Content */
                            $output .= '<div class="hongo-textbox-content-hover">';

                                if ( $hongo_icon_list || ( $custom_icon == 1 && $custom_icon_image ) ) {

                                    $output.= '<div class="hongo-featurebox-img">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                        }
                                            if ( $hongo_icon_list ) {

                                                $output.= '<i class="'.$hongo_icon_list.$hongo_icon_size.'"></i>';

                                            } elseif ( $custom_icon == 1 && $custom_icon_image ) {

                                                $output .= hongo_get_image_html( $custom_icon_image );
                                            }

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</div>';
                                }

                                if ( $hongo_feature_title ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }
                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( $hongo_feature_content ) {

                                    $output .= '<div class="hongo-textbox-content'.$font_setting_class_content.'">';

                                        $output .= $hongo_feature_content;

                                    $output .= '</div>';
                                }

                            $output .= '</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'text-box-style-3':

                $hongo_text_box3 = ( $hongo_text_box3 ) ? $hongo_text_box3 : 0;
                $hongo_text_box3 = $hongo_text_box3 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-textbox-3-'.$hongo_text_box3.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-3-'.$hongo_text_box3.' .hongo-textbox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }
                // Box Background Color 
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-3-'.$hongo_text_box3.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Box Background Hover Color 
                if ( ! empty( $hongo_product_feature_box_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-3-'.$hongo_text_box3.' .hongo-textbox-content-hover{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_icon_output || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-textbox-3-'.$hongo_text_box3.'">';

                        $output.= '<div class="hongo-textbox-wrapper">';

                            /* Main Content */

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && $hongo_link_url && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';

                            }

                            /* Hover Content */
                            $output .= '<div class="hongo-textbox-content-hover">';
                                $output .= '<div class="hongo-textbox-content-wrapper">';
                                    $output .= '<div class="hongo-textbox-content-middle">';
                                        if ( $hongo_feature_title ) {

                                            $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                                if ( $hongo_enable_link == 1 && $hongo_link_url && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                    $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                                }
                                                    $output.= $hongo_feature_title;

                                                if ( $hongo_enable_link == 1 && $hongo_link_url && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                    $output .= '</a>';
                                                }

                                            $output.= '</'.$title_heading_tag.'>';
                                        }

                                        if ( $hongo_feature_content ) {

                                            $output .= '<div class="hongo-textbox-content'.$font_setting_class_content.'">';

                                                $output .= $hongo_feature_content;

                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'text-box-style-4':

                $hongo_text_box4 = ( $hongo_text_box4 ) ? $hongo_text_box4 : 0;
                $hongo_text_box4 = $hongo_text_box4 + 1;

                // Number Border Color 
                if ( $hongo_number_border_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.' span{ border-color: '.$hongo_number_border_color.' }';
                }
                // Number Hover Border Color 
                if ( ! empty( $hongo_number_hover_border_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.':hover span.number{  border-color: '.$hongo_number_hover_border_color.'  }';
                }
                // Number Color 
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.' span.main-content{ color: '.$hongo_number_color.'  }';
                }
                // Number Hover Color 
                if ( ! empty( $hongo_number_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.':hover span.number{ color: '.$hongo_number_hover_color.'  }';
                }
                // Number Background Color
                if ( $hongo_hover_bg_color ) {
                	$hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.' .hongo-textbox-wrapper span.main-content{ background-color: '.$hongo_hover_bg_color.'; }';
                }
                // Number Hover Background Color 
                if ( $hongo_number_hover_bg_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.' .hongo-textbox-content-hover span{ background-color: '.$hongo_number_hover_bg_color.'; border-color: '.$hongo_number_hover_bg_color.' }';
                }
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.'{ background-color: '.$hongo_product_feature_box_color.' }';
                }
                // Box Background Hover Color 
                if ( $hongo_product_feature_box_hover_color ) {
                    $hongo_featured_array[] = '.hongo-textbox-4-'.$hongo_text_box4.' .hongo-textbox-content-hover{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_feature_content || $hongo_feature_number ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-textbox-4-'.$hongo_text_box4.'">';

                        $output.= '<div class="hongo-textbox-wrapper">';

                            /* Main Content */
                            if ( $hongo_feature_number ) {

                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                    $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                }

                                    $output .= '<span class="main-content alt-font'.$font_setting_class_number.'">' .$hongo_feature_number. '</span>';

                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';

                            }

                            /* Hover Content */
                            $output .= '<div class="hongo-textbox-content-hover">';

                                $output .= '<div class="hongo-textbox-content-middle">';

                                    if ( $hongo_feature_number ) {

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                        }

                                            $output .= '<span class="number alt-font'.$font_setting_class_number.'">' .$hongo_feature_number. '</span>';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }

                                    if ( $hongo_feature_title ) {

                                        $output.= '<'.$title_heading_tag.' class="hongo-textbox-title'.$font_setting_class_title.'">';

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                            }

                                                $output.= $hongo_feature_title;

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output.= '</'.$title_heading_tag.'>';

                                    }

                                    if ( $hongo_feature_content ) {

                                        $output .= '<div class="hongo-textbox-content'.$font_setting_class_content.'">';

                                            $output .= $hongo_feature_content;

                                        $output .= '</div>';
                                    }

                                 $output .= '</div>';

                            $output .= '</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'rotate-box-style-1': 
                $hongo_rotate_box1 = ( $hongo_rotate_box1 ) ? $hongo_rotate_box1 : 0;
                $hongo_rotate_box1 = $hongo_rotate_box1 + 1;

                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                     $hongo_featured_array[] = '.hongo-rotatebox-1-'.$hongo_rotate_box1.' .hongo-rotatebox-content-hover{ '.$hongo_product_feature_hover_color.' }';
                }

                // Separator Enable check
                if ( $hongo_enable_separator == '1' ) {
                    if ( ! empty( $hongo_separator_color ) ) { 
                        $hongo_featured_array[] = '.hongo-rotatebox-1-'.$hongo_rotate_box1.' .hongo-rotatebox-title:before { background-color:'.$hongo_separator_color.'; }';
                    }
                } else {
                    $hongo_featured_array[] = '.hongo-rotatebox-1-'.$hongo_rotate_box1.' .hongo-rotatebox-title:before { display: none; }';
                }            
                
                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-rotatebox-1-'.$hongo_rotate_box1.'">';

                        $output.= '<div class="hongo-rotatebox-wrapper">';

                            /* Main Content */
                            $output.= '<div class="hongo-rotatebox-wrap">';

                                if ( $hongo_featurebox_image ) {
                                    $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                }

                                if ( $hongo_feature_title ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-rotatebox-title'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }
                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                            $output.='</div>';

                            /* Hover Content */
                            $output .= '<div class="hongo-rotatebox-content-hover">';

                                $output .= '<div class="hongo-rotatebox-content-middle">';

                                    if ( $hongo_feature_title ) {

                                        $output.= '<'.$title_heading_tag.' class="hongo-rotatebox-title'.$font_setting_class_title.'">';

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                            }

                                                $output.= $hongo_feature_title;

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output.= '</'.$title_heading_tag.'>';

                                    }

                                    if ( $hongo_feature_content ) {

                                        $output .= '<div class="hongo-rotatebox-content'.$font_setting_class_content.'">';

                                            $output .= $hongo_feature_content;

                                        $output .= '</div>';
                                    }

                                $output.='</div>';

                            $output.='</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'rotate-box-style-2':

                $hongo_rotate_box2 = ( $hongo_rotate_box2 ) ? $hongo_rotate_box2 : 0;
                $hongo_rotate_box2 = $hongo_rotate_box2 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-2-'.$hongo_rotate_box2.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-2-'.$hongo_rotate_box2.' .hongo-rotatebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }

                // Background color
                if ( ! empty( $hongo_product_feature_box_color ) ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-2-'.$hongo_rotate_box2.' .hongo-rotatebox-wrap{background-color:'.$hongo_product_feature_box_color.'; }';
                }

                if ( $hongo_icon_output || $hongo_feature_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-rotatebox-2-'.$hongo_rotate_box2.'">';

                        $output.= '<div class="hongo-rotatebox-wrapper">';

                            /* Main Content */
                            $output.= '<div class="hongo-rotatebox-wrap">';

                                // Icon or Custom image 
                                $output.= $hongo_icon_output;

                                if ( $hongo_feature_title ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-rotatebox-title'.$font_setting_class_title.'">';

                                        $output.= $hongo_feature_title;

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( $hongo_feature_content ) {

                                    $output .= '<div class="hongo-rotatebox-content'.$font_setting_class_content.'">';

                                        $output .= $hongo_feature_content;

                                    $output .= '</div>';
                                }
                            $output.='</div>';
                               
                            /* Hover Content */
                            if ( $hongo_featurebox_image ) {

                                $output .= '<div class="hongo-rotatebox-content-hover">';

                                        $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );

                                $output.='</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'rotate-box-style-3':

                $hongo_rotate_box3 = ( $hongo_rotate_box3 ) ? $hongo_rotate_box3 : 0;
                $hongo_rotate_box3 = $hongo_rotate_box3 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-3-'.$hongo_rotate_box3.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color 
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-3-'.$hongo_rotate_box3.' .hongo-rotatebox-wrapper .hongo-featurebox-img i { color:'.$hongo_icon_color.'; }';
                }

                // Icon background color
                if ( ! empty( $hongo_icon_bg_color ) ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-3-'.$hongo_rotate_box3.' .hongo-featurebox-img { background-color:'.$hongo_icon_bg_color.'; }';    
                }

                // Box Background Hover Color 
                if ( $hongo_product_feature_box_hover_color ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-3-'.$hongo_rotate_box3.' .hongo-rotatebox-content-hover{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                // title bg color
                if ( $hongo_title_bg_color ) {
                    $hongo_featured_array[] = '.hongo-rotatebox-3-'.$hongo_rotate_box3.' .hongo-rotatebox-wrap .hongo-rotatebox-title{ background: '.$hongo_title_bg_color.' }';
                }

                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_button_title || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-rotatebox-3-'.$hongo_rotate_box3.'">';

                        $output.= '<div class="hongo-rotatebox-wrapper">';

                            /* Main Content */
                            $output.= '<div class="hongo-rotatebox-wrap">';

                                if ( $hongo_featurebox_image ) {

                                    $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                }

                                // Icon or Custom image 
                                $output.= $hongo_icon_output;

                                if ( $hongo_feature_title ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-rotatebox-title'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }

                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                            $output .= '</div>';

                            /* Hover Content */
                            $output .= '<div class="hongo-rotatebox-content-hover">';

                                $output .= '<div class="hongo-rotatebox-content-middle">';

                                    if ( $hongo_feature_title ) {

                                        $output.= '<'.$title_heading_tag.' class="hongo-rotatebox-title'.$font_setting_class_title.'">';

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                            }

                                                $output.= $hongo_feature_title;

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output.= '</'.$title_heading_tag.'>';
                                    }

                                    if ( $hongo_feature_content ) {

                                        $output .= '<div class="hongo-rotatebox-content'.$font_setting_class_content.'">';

                                            $output .= $hongo_feature_content;

                                        $output .= '</div>';
                                    }

                                    if ( $hongo_button_title ) {

                                        $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-white';
                                        $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';

                                        $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                            $output .= $hongo_button_title;

                                       $output .= '</a>';
                                    }

                                $output.='</div>';

                            $output.='</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'process-step-style-1':

                $hongo_process_step1 = ( $hongo_process_step1 ) ? $hongo_process_step1 : 0;
                $hongo_process_step1 = $hongo_process_step1 + 1;

                if ( $hongo_desktop_enable_separator == 1 || $hongo_mini_enable_separator == 1 || $hongo_ipad_enable_separator == 1 || $hongo_mobile_enable_separator == 1 ) {
                    $common_class = ' number-border';
                }

                ( $hongo_desktop_enable_separator != 1 ) ? $icon_border[] = 'lg-border-display-none' : '';
                ( $hongo_mini_enable_separator != 1 ) ? $icon_border[] = 'md-border-display-none' : '';
                ( $hongo_ipad_enable_separator != 1 ) ? $icon_border[] = 'sm-border-display-none' : '';
                ( $hongo_mobile_enable_separator != 1 ) ? $icon_border[] = 'xs-border-display-none' : '';

                $main_class_list = ! empty( $icon_border ) ? ' ' . implode( " ", $icon_border ) : '';

                // Number Border Color 
                if ( ! empty( $hongo_number_border_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.' span.number{ border-color: '.$hongo_number_border_color.' }';
                }
                // Number Hover Border Color 
                if ( ! empty( $hongo_number_hover_border_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.':hover span.number{  border-color: '.$hongo_number_hover_border_color.'  }';
                }
                // Number Hover Color 
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.' span.number, .hongo-process-1-'.$hongo_process_step1.' span.number a{  color: '.$hongo_number_color.'  }';
                }
                // Number Hover Color 
                if ( ! empty( $hongo_number_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.':hover span.number, .hongo-process-1-'.$hongo_process_step1.':hover span.number a{  color: '.$hongo_number_hover_color.'  }';
                }
                // Number Background Color
                if ( $hongo_hover_bg_color ) {
                	$hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.' span.number, .hongo-process-1-'.$hongo_process_step1.' span.number a{ background-color: '.$hongo_hover_bg_color.'; }';
                }
                // Number Hover Background Color 
                if ( ! empty( $hongo_number_hover_bg_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.':hover span.number, .hongo-process-1-'.$hongo_process_step1.':hover span.number{ background-color: '.$hongo_number_hover_bg_color.'}';
                }
                // Separator color
                if ( $hongo_right_separator_color ) {
                    $hongo_featured_array[] = '.hongo-process-1-'.$hongo_process_step1.'.number-border:before{ background : '.$hongo_right_separator_color.'}';
                }

                if ( $hongo_feature_title || $hongo_feature_content || $hongo_feature_number ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$common_class.$class_list.$main_class_list.' hongo-process-1-'.$hongo_process_step1.'">';

                        $output.= '<div class="hongo-process-wrapper">';

                            /* Main Content */
                            if ( $hongo_feature_number ) {

                                $output .= '<div class="number-wrapper">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                    }

                                        $output .= '<span class="number alt-font'.$font_setting_class_number.'">' .$hongo_feature_number. '</span>';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }

                                $output .= '</div>';
                            }

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-process-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';

                            }

                            if ( $hongo_feature_content ) {

                                $output .= '<div class="hongo-process-content'.$font_setting_class_content.'">';

                                    $output .= $hongo_feature_content;

                                $output .= '</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'process-step-style-2':

                $hongo_process_step2 = ( $hongo_process_step2 ) ? $hongo_process_step2 : 0;
                $hongo_process_step2 = $hongo_process_step2 + 1;

                // Custom icon width
                if ( ! empty( $custom_icon_max_width ) && $custom_icon == 1 ) {
                    $hongo_featured_array[] = '.hongo-process-2-'.$hongo_process_step2.' .hongo-featurebox-img img { max-width: '.$custom_icon_max_width.' }';
                }

                // Icon Color
                if ( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.hongo-process-2-'.$hongo_process_step2.' .hongo-process-wrapper .hongo-featurebox-img span i { color:'.$hongo_icon_color.'; }';
                }
                // Icon Hover Color
                if ( $hongo_icon_hover_color ) {
                    $hongo_featured_array[] = '.hongo-process-2-'.$hongo_process_step2.' .hongo-process-wrapper .hongo-featurebox-img a span i:hover { color:'.$hongo_icon_hover_color.'; }';
                }
                // Separator color
                if ( $hongo_right_separator_color ) {
                    $hongo_featured_array[] = '.hongo-process-2-'.$hongo_process_step2.' .hongo-featurebox-img-border:before{ background : '.$hongo_right_separator_color.'}';
                }
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-process-2-'.$hongo_process_step2.' .hongo-featurebox-img span{ background-color: '.$hongo_product_feature_box_color.' }';
                }

                if ( $hongo_feature_title || $hongo_icon_output || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-process-2-'.$hongo_process_step2.'">';

                        $output.= '<div class="hongo-process-wrapper">';

                            /* Main Content */

                            // Custom icon and image 
                            $output.= $hongo_icon_output;

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-process-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';

                            }

                            if ( $hongo_feature_content ) {

                                $output .= '<div class="hongo-process-content'.$font_setting_class_content.'">';

                                    $output .= $hongo_feature_content;

                                $output .= '</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'process-step-style-3':

                $hongo_process_step3 = ( $hongo_process_step3 ) ? $hongo_process_step3 : 0;
                $hongo_process_step3 = $hongo_process_step3 + 1;
                
                if ( $hongo_desktop_enable_separator == 1 || $hongo_mini_enable_separator == 1 || $hongo_ipad_enable_separator == 1 || $hongo_mobile_enable_separator == 1 ) {
                    $common_class = ' number-border';
                }

                ( $hongo_desktop_enable_separator != 1 ) ? $icon_border[] = 'lg-border-display-none' : '';
                ( $hongo_mini_enable_separator != 1 ) ? $icon_border[] = 'md-border-display-none' : '';
                ( $hongo_ipad_enable_separator != 1 ) ? $icon_border[] ='sm-border-display-none' : '';
                ( $hongo_mobile_enable_separator != 1 ) ? $icon_border[] ='xs-border-display-none' : '';

                $main_class_list = ! empty( $icon_border ) ? ' ' . implode( " ", $icon_border ) : '';
                
                // Separator color
                if ( $hongo_right_separator_color ) {
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.' .number-wrapper .number-border:before{ border-bottom-color : '.$hongo_right_separator_color.'}';
                }

                // Number Hover Color 
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.' span.number, .hongo-process-3-'.$hongo_process_step3.' span.number a{  color: '.$hongo_number_color.'  }';
                }
                
                // Number Hover Color 
                if ( ! empty( $hongo_number_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.':hover span.number, .hongo-process-3-'.$hongo_process_step3.':hover span.number a{  color: '.$hongo_number_hover_color.'  }';
                }

                // Number Background Color
                if ( $hongo_hover_bg_color ) {
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.' span.number{ background-color: '.$hongo_hover_bg_color.'; }';
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.' .number:after{ border-top-color: '.$hongo_hover_bg_color.'; }';
                }
                // Number Hover Background Color 
                if ( ! empty( $hongo_number_hover_bg_color ) ) {
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.':hover span.number{ background-color: '.$hongo_number_hover_bg_color.'}';
                    $hongo_featured_array[] = '.hongo-process-3-'.$hongo_process_step3.':hover .number:after{ border-top-color: '.$hongo_number_hover_bg_color.'; }';
                }

                if ( $hongo_feature_title || $hongo_feature_content || $hongo_feature_number ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-process-3-'.$hongo_process_step3.'">';

                        $output.= '<div class="hongo-process-wrapper">';

                            /* Main Content */
                            if ( $hongo_feature_number ) {

                                $output .= '<div class="number-wrapper'.$font_setting_class_number.'">';
                                
                                    $output .= '<span class="number alt-font'.$main_class_list.$common_class.'">';
                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '<a class="process-number'.$font_setting_class_number.'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                        }

                                            $output .= $hongo_feature_number;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</span>';

                                $output .= '</div>';
                            }

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-process-title'.$font_setting_class_title.'">';

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all' ) ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';

                            }

                            if ( $hongo_feature_content ) {

                                $output .= '<div class="hongo-process-content'.$font_setting_class_content.'">';

                                    $output .= $hongo_feature_content;

                                $output .= '</div>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-1':

                $hongo_info_banner1 = ( $hongo_info_banner1 ) ? $hongo_info_banner1 : 0;
                $hongo_info_banner1 = $hongo_info_banner1 + 1;

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-1-'.$hongo_info_banner1.'{ background-color: '.$hongo_product_feature_box_color.' }';    
                }

                // Box Border Color 
                if ( $hongo_product_feature_box_border_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-1-'.$hongo_info_banner1.'{ border-color: '.$hongo_product_feature_box_border_color.' }';
                }

                // Box Background Color 
                if ( $hongo_product_feature_box_border_width ) {
                    $hongo_featured_array[] = '.hongo-info-banner-1-'.$hongo_info_banner1.'{ border-width: '.$hongo_product_feature_box_border_width.' }';
                }

                if ( $hongo_featurebox_image || $hongo_feature_title || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-info-banner-1-'.$hongo_info_banner1.'">';

                        $output.= '<div class="hongo-info-wrapper">';

                            /* Main Content */
                            if ( $hongo_featurebox_image ) {

                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                            }

                            $output.= '<div class="hongo-info-content-box">';

                                if ( $hongo_feature_title ) {

                                    $output.= '<'.$title_heading_tag.' class="hongo-info-title'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }

                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( $hongo_feature_content ) {

                                    $output .= '<div class="hongo-info-content'.$font_setting_class_content.'">';

                                        $output .= $hongo_feature_content;

                                    $output .= '</div>';
                                }

                                if ( $hongo_button_title ) {

                                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font btn-round';
                                    $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
                                    $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                        $output .= $hongo_button_title;

                                   $output .= '</a>';
                                }
                            $output.='</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-2':

                $hongo_info_banner2 = ( $hongo_info_banner2 ) ? $hongo_info_banner2 : 0;
                $hongo_info_banner2 = $hongo_info_banner2 + 1;

                // Box Background Hover Color 
                if ( $hongo_product_feature_box_hover_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-2-'.$hongo_info_banner2.' .hongo-info-content-hover{ background: '.$hongo_product_feature_box_hover_color.' }';
                }

                // Box hover border color
                if ( $hongo_box_hover_border_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-2-'.$hongo_info_banner2.' .hongo-info-content-hover{ border-color: '.$hongo_box_hover_border_color.' }';
                }

                // Box hover border width
                if ( $hongo_box_hover_border_width ) {
                    $hongo_featured_array[] = '.hongo-info-banner-2-'.$hongo_info_banner2.' .hongo-info-content-hover{ border-width: '.$hongo_box_hover_border_width.' }';
                }

                if ( $hongo_featurebox_image || $hongo_feature_content || $hongo_feature_number ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-info-banner-2-'.$hongo_info_banner2.'">';

                        $output.= '<div class="hongo-info-wrapper">';

                            /* Main Content */
                            if ( $hongo_featurebox_image ) {

                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                            }
                            /* Hover Content */
                            $output .= '<div class="hongo-info-content-hover">';

                                $output .= '<div class="hongo-info-content-wrap">';

                                    $output .= '<div class="hongo-rotatebox-content-middle">';

                                        if ( $hongo_feature_title ) {

                                            $output.= '<'.$title_heading_tag.' class="hongo-info-title'.$font_setting_class_title.'">';

                                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                    $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                                }
                                                    $output.= $hongo_feature_title;

                                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                                    $output .= '</a>';
                                                }

                                            $output.= '</'.$title_heading_tag.'>';
                                        }

                                        if ( $hongo_feature_content ) {

                                            $output .= '<div class="hongo-info-content'.$font_setting_class_content.'">';

                                                $output .= $hongo_feature_content;

                                            $output .= '</div>';
                                        }

                                        if ( $hongo_button_title ) {

                                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                                            $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
                                            $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                                $output .= $hongo_button_title;

                                           $output .= '</a>';
                                        }

                                    $output.='</div>';

                                $output.='</div>';

                            $output.='</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-3':

                $hongo_info_banner3 = ( $hongo_info_banner3 ) ? $hongo_info_banner3 : 0;
                $hongo_info_banner3 = $hongo_info_banner3 + 1;
                $hongo_image_content = $hongo_main_content = '';

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-3-'.$hongo_info_banner3.' .hongo-info-wrapper .hongo-info-box-wrap > div.hongo-info-wrap{ background-color: '.$hongo_product_feature_box_color.' }';
                }                

                /* Title & Subtitle & Content */
                if ( $hongo_feature_subtitle ) {
                    $hongo_main_content.='<'.$subtitle_heading_tag.' class="hongo-info-subtitle base-color'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                }

                if ( $hongo_feature_title ) {

                    $hongo_main_content.= '<'.$title_heading_tag.' class="hongo-info-title'.$font_setting_class_title.'">';
                        
                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                            $hongo_main_content .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                        }

                            $hongo_main_content.= $hongo_feature_title;

                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                            $hongo_main_content .= '</a>';
                        }

                    $hongo_main_content.= '</'.$title_heading_tag.'>';
                }

                if ( $hongo_feature_content ) {

                    $hongo_main_content .= '<div class="hongo-info-content'.$font_setting_class_content.'">';
                        $hongo_main_content .= '<span>';
                            $hongo_main_content .= $hongo_feature_content;
                        $hongo_main_content .= '</span>';
                    $hongo_main_content .= '</div>';
                }

                if ( $hongo_button_title ) {

                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                    $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
                    $hongo_main_content .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                        $hongo_main_content .= $hongo_button_title;
                        
                   $hongo_main_content .= '</a>';
                }

                /* Main Content */
                if (  $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-info-banner-3-'.$hongo_info_banner3.'">';
                    
                        $output.= '<div class="hongo-info-wrapper">';

                                if ( $hongo_image_position == 'bottom') {
                                    $output .= '<div class="hongo-info-box-wrap">';
                                        $output.= '<div class="hongo-info-wrap">';
                                            $output .= $hongo_main_content;
                                        $output.='</div>';
                                    $output.='</div>';
                                    $output.= '<div class="hongo-info-image'.$bg_class_list.'"></div>';
                                } else {
                                    $output.= '<div class="hongo-info-image'.$bg_class_list.'"></div>';
                                    $output .= '<div class="hongo-info-box-wrap">';
                                        $output.= '<div class="hongo-info-wrap">';
                                            $output .= $hongo_main_content;
                                        $output.='</div>';
                                    $output.='</div>';
                                }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-4':

                $hongo_info_banner4 = ( $hongo_info_banner4 ) ? $hongo_info_banner4 : 0;
                $hongo_info_banner4 = $hongo_info_banner4 + 1;

                // Title Icon color
                if ( $hongo_title_icon_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-4-'.$hongo_info_banner4.' .hongo-info-content-box .hongo-featurebox-text i{ color:'.$hongo_title_icon_color.'; }';
                }
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-4-'.$hongo_info_banner4.' .hongo-info-content-box { background-color: '.$hongo_product_feature_box_color.' }';
                }

                // Separator Enable check
                if ( $hongo_enable_separator == '1' ) {
                    if ( ! empty( $hongo_separator_color ) ) { 
                        $hongo_featured_array[] = '.hongo-info-banner-4-'.$hongo_info_banner4.' .hongo-info-content-box .hongo-info-content{ border-color:'.$hongo_separator_color.'; }';
                    }
                } else {
                    $hongo_featured_array[] = '.hongo-info-banner-4-'.$hongo_info_banner4.' .hongo-info-content-box .hongo-info-content { border: none; }';
                }

                if ( $hongo_featurebox_image || $hongo_feature_title || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap hongo-product-featurebox'.$class_list.' hongo-info-banner-4-'.$hongo_info_banner4.'">';

                        $output.= '<div class="hongo-info-wrapper">';

                            /* Main Content */
                            if ( $hongo_featurebox_image ) {

                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                            }

                            $output.= '<div class="hongo-info-content-box">';
                            
                                if ( $hongo_feature_title ) {

                                    $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }

                                            if ( $title_hongo_icon_list || ( $title_custom_icon == 1 && $title_custom_icon_image ) ) {

                                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && $hongo_link_on == 'icon' ) {

                                                    $hongo_icon_output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                                }

                                                        if ( $title_hongo_icon_list ) {

                                                            $hongo_icon_output.= '<i class="'.$title_hongo_icon_list.'"></i>';

                                                        } elseif ( $title_custom_icon == 1 && $title_custom_icon_image ) {

                                                            $hongo_icon_output .= hongo_get_image_html( $title_custom_icon_image );
                                                        }

                                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && $hongo_link_on == 'icon' ) {

                                                    $hongo_icon_output .= '</a>';
                                                }

                                            }

                                            $output.= $hongo_icon_output.$hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( $hongo_feature_content ) {

                                    $output .= '<div class="hongo-info-content'.$font_setting_class_content.'">';

                                        $output .= $hongo_feature_content;

                                    $output .= '</div>';
                                }

                                if ( $hongo_feature_phone ) {
                                    $output .= '<span class="alt-font'.$font_setting_class_phone.'">';
                                        $output .= $hongo_feature_phone;
                                    $output .= '</span>';
                                }
                                if ( $hongo_feature_email ) {
                                    $output .= '<span class="alt-font'.$font_setting_class_email.'">';
                                        $output .= $hongo_feature_email;
                                    $output .= '</span>';
                                }
                                
                            $output.='</div>';

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-5':

                $hongo_info_banner5 = ( $hongo_info_banner5 ) ? $hongo_info_banner5 : 0;
                $hongo_info_banner5 = $hongo_info_banner5 + 1;
                $hongo_image_content = $hongo_main_content = '';

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-5-'.$hongo_info_banner5.' .bg-very-light-gray{ background-color: '.$hongo_product_feature_box_color.' }';
                }

                // Sub title Bg Color
                if ( $hongo_subtitle_bg_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-5-'.$hongo_info_banner5.' .info-banner-wrapper .info-banner-highlight{ background-color:'.$hongo_subtitle_bg_color.'; }';
                }                

                /* Main Content */
                if ( $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-info-banner-5-'.$hongo_info_banner5.'">';

                		$output .= '<div class="col-sm-6 col-xs-12 no-padding'.$bg_class_list.'"></div>';

                		$output .= '<div class="col-sm-6 col-xs-12 no-padding bg-very-light-gray">';

                			$output .= '<div class="info-banner-wrapper text-middle-main">';
                				
                				$output .= '<div class="text-middle">';
	                        		/* Title & Subtitle & Content */
					                if ( $hongo_feature_subtitle ) {
					                    $output.='<'.$subtitle_heading_tag.' class="info-banner-highlight alt-font'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
					                }

					                if ( $hongo_feature_title ) {

					                    $output.= '<'.$title_heading_tag.' class="hongo-info-title alt-font'.$font_setting_class_title.'">';
					                        
					                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
					                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
					                        }

					                            $output.= $hongo_feature_title;

					                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
					                            $output .= '</a>';
					                        }

					                    $output.= '</'.$title_heading_tag.'>';
					                }

					                if ( $hongo_feature_content ) {

					                    $output .= '<div class="info-banner-content'.$font_setting_class_content.'">';
					                            $output .= $hongo_feature_content;
					                    $output .= '</div>';
					                }

					                if ( $hongo_button_title ) {
                        	
                                        $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-round btn-transparent-black alt-font';
                                        $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
					                    $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

					                        $output .= $hongo_button_title;
					                        
					                   $output .= '</a>';
					                }

					    		$output .= '</div>';
					    	$output .= '</div>';
			            $output .= '</div>';

                    $output.='</div>';
                }
            break;

            case 'info-banner-style-6':

                $hongo_info_banner6 = ( $hongo_info_banner6 ) ? $hongo_info_banner6 : 0;
                $hongo_info_banner6 = $hongo_info_banner6 + 1;
                $hongo_image_content = $hongo_main_content = '';

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-info-banner-6-'.$hongo_info_banner6.' .hongo-info-wrapper{ background-color: '.$hongo_product_feature_box_color.' }';
                }                

                /* Main Content */
                if ( $hongo_featurebox_image || $hongo_feature_title || $hongo_feature_subtitle || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-info-banner-6-'.$hongo_info_banner6.'">';
                    
                        $output.= '<div class="hongo-info-wrapper">';

                            /* Title & Subtitle & Content */
                            if ( $hongo_feature_subtitle ) {
                                $output.= '<'.$subtitle_heading_tag.' class="hongo-info-subtitle'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                            }

                            if ( $hongo_feature_title ) {

                                $output.= '<'.$title_heading_tag.' class="hongo-info-title'.$font_setting_class_title.'">';
                                    
                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }

                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                $output.= '</'.$title_heading_tag.'>';
                            }

                            if ( $hongo_feature_content ) {

                                $output .= '<div class="hongo-info-content'.$font_setting_class_content.'">';                                    
                                        $output .= $hongo_feature_content;                                    
                                $output .= '</div>';
                            }

                            if ( $hongo_button_title ) {

                                $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
                                $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  ' btn-medium';
                                $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

                                    $output .= $hongo_button_title;
                               $output .= '</a>';
                            }

                        $output.='</div>';

                    $output.='</div>';
                }
            break;

            case 'interactive-banner-style-1':

                $interactive_banner1 = ( $interactive_banner1 ) ? $interactive_banner1 : 0;
                $interactive_banner1 = $interactive_banner1 + 1;
                
                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-1-'.$interactive_banner1.' > .hongo-featurebox-text , .hongo-interactive-banner-1-'.$interactive_banner1.' .hongo-featurebox-hover{ background-color: '.$hongo_product_feature_box_color.' }';
                }

                // Title Icon color
                if ( $hongo_title_icon_color ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-1-'.$interactive_banner1.' > .hongo-featurebox-text i { color:'.$hongo_title_icon_color.'; }';
                }

                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-1-'.$interactive_banner1.'">';

                        if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                            $output .= '</div>';
                        }

                    	if ( $hongo_feature_title ) {

        	            	$output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

        		            	if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                    $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                }

        			            	if ( $title_hongo_icon_list || ( $title_custom_icon == 1 && $title_custom_icon_image ) ) {

        			                    if ( $title_hongo_icon_list ) {

        			                        $hongo_icon_output.= '<i class="'.$title_hongo_icon_list.'"></i>';

        			                    } elseif ( $title_custom_icon == 1 && $title_custom_icon_image ) {

        			                        $hongo_icon_output .= hongo_get_image_html( $title_custom_icon_image );
        			                    }

        					        }

                                    $output.= $hongo_feature_title.$hongo_icon_output;

                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                    $output .= '</a>';
                                }

                            $output.= '</'.$title_heading_tag.'>';
                        }

                        if ( $hongo_feature_hover_title ||  $hongo_feature_content || $hongo_button_title ) {

                            $output .= '<div class="hongo-featurebox-hover">';
                                $output .= '<div class="hongo-interative-banner-content-wrap">';
                                	$output .= '<div class="hongo-interative-banner-content-middle">';

            	                    	if ( $hongo_feature_title ) {

            	    		            	$output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_hover_title.'">';

            	    			            	if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
            	    	                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_hover_title.'">';
            	    	                        }

            	    	                            $output.= $hongo_feature_hover_title;

            	    	                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
            	    	                            $output .= '</a>';
            	    	                        }

            	    	                    $output.= '</'.$title_heading_tag.'>';
            	    	                }

            	    	                if ( ! empty( $hongo_feature_content) ) {
            	                            $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
            	                        }

            	                    	if ( $hongo_button_title ) {

                                            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                                            $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
            	                            $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';

            	                                $output .= $hongo_button_title;

            	                           $output .= '</a>';
            	                        }
            	                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        }

                    $output .= '</div>';
                }
            break;

            case 'interactive-banner-style-2':

                $interactive_banner2 = ( $interactive_banner2 ) ? $interactive_banner2 : 0;
                $interactive_banner2 = $interactive_banner2 + 1;

                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-2-'.$interactive_banner2.':hover .hongo-overlay { '.$hongo_product_feature_hover_color.' }';
                }
                // Title Icon color
                if ( $hongo_title_icon_color ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-2-'.$interactive_banner2.' > .hongo-featurebox-text i { color:'.$hongo_title_icon_color.'; }';
                }                

                // Icon background color
                if ( ! empty( $hongo_icon_bg_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-2-'.$interactive_banner2.' > .hongo-featurebox-text i { background-color:'.$hongo_icon_bg_color.'; }';    
                }

                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_feature_content ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-2-'.$interactive_banner2.'">';

                    	if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                $output .= '<div class="hongo-overlay"></div>';
                            $output .= '</div>';
                        }

                    	if ( $hongo_feature_title || $hongo_feature_content ) {

        	            	$output.='<div class="hongo-featurebox-text">';

                                $output .= '<div class="hongo-textbox-content-wrapper">';
                                    $output .= '<div class="hongo-textbox-content-middle">';

                		            	if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }

                			            	if ( $title_hongo_icon_list || ( $title_custom_icon == 1 && $title_custom_icon_image ) ) {

                			                    if ( $title_hongo_icon_list ) {

                			                        $hongo_icon_output.= '<i class="'.$title_hongo_icon_list.'"></i>';

                			                    } elseif ( $title_custom_icon == 1 && $title_custom_icon_image ) {

                			                        $hongo_icon_output .= hongo_get_image_html( $title_custom_icon_image );
                			                    }
                					        }

                                            $output.= '<'.$title_heading_tag.' class="interactive-title'.$font_setting_class_title.'">'.$hongo_feature_title.'</'.$title_heading_tag.'>'.$hongo_icon_output;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                        if ( ! empty( $hongo_feature_content) ) {
                                            $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                                        }
                                    $output.= '</div>';

                                $output.= '</div>';

                            $output.= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'interactive-banner-style-3':

                $interactive_banner3 = ( $interactive_banner3 ) ? $interactive_banner3 : 0;
                $interactive_banner3 = $interactive_banner3 + 1;

                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-3-'.$interactive_banner3.':hover .hongo-overlay { '.$hongo_product_feature_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_feature_content || $hongo_button_title ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-3-'.$interactive_banner3.'">';

                        if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                $output .= '<div class="hongo-overlay"></div>';
                            $output .= '</div>';
                        }

                    	if ( $hongo_feature_title ) {

    		            	$output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

    			            	if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
    	                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
    	                        }

    	                            $output.= $hongo_feature_title;

    	                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
    	                            $output .= '</a>';
    	                        }

    	                    $output.= '</'.$title_heading_tag.'>';
    	                }

                        if ( $hongo_feature_hover_title ||  $hongo_feature_content || $hongo_button_title ) {

                            $output .= '<div class="hongo-featurebox-hover">';

                                if ( $hongo_feature_hover_title ) {

                                    $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_hover_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_hover_title.'">';
                                        }

                                            $output.= $hongo_feature_hover_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( ! empty( $hongo_feature_content) ) {
                                    $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                                }

                                if ( $hongo_button_title ) {

                                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font btn-white';
                                    $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
                                    $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';
                                        $output .= $hongo_button_title;
                                    $output .= '</a>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'interactive-banner-style-4':

                $interactive_banner4 = ( $interactive_banner4 ) ? $interactive_banner4 : 0;
                $interactive_banner4 = $interactive_banner4 + 1;

                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-4-'.$interactive_banner4.' .hongo-overlay { '.$hongo_product_feature_hover_color.' }';
                }

                if ( $hongo_feature_title ||  $hongo_feature_content || $hongo_button_title || $hongo_featurebox_image ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-4-'.$interactive_banner4.'">';

                        if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                $output .= '<div class="hongo-overlay"></div>';
                            $output .= '</div>';
                        }

                        if ( $hongo_feature_title ||  $hongo_feature_content || $hongo_button_title ) {

                            $output .= '<div class="hongo-featurebox-hover">';

                                if ( $hongo_feature_title ) {

                                    $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                        }

                                            $output.= $hongo_feature_title;

                                        if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                            $output .= '</a>';
                                        }

                                    $output.= '</'.$title_heading_tag.'>';
                                }

                                if ( ! empty( $hongo_feature_content) ) {
                                    $output .= '<div class="content'.$font_setting_class_content.'">'.$hongo_feature_content.'</div>';
                                }
                                if ( $hongo_button_title ) {

                                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font btn-round btn-white';
                                    $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
                                    $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';
                                    $output .= $hongo_button_title;
                                    $output .= '</a>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'interactive-banner-style-5':

                $interactive_banner5 = ( $interactive_banner5 ) ? $interactive_banner5 : 0;
                $interactive_banner5 = $interactive_banner5 + 1;

                // Box Background Color 
                if ( $hongo_product_feature_box_color ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-5-'.$interactive_banner5.' > .hongo-featurebox-text { background-color: '.$hongo_product_feature_box_color.' }';                    
                }

                // Number Color
                if ( ! empty( $hongo_number_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-5-'.$interactive_banner5.' > .hongo-featurebox-text .interactive-number, .hongo-interactive-banner-5-'.$interactive_banner5.' > .hongo-featurebox-text .interactive-number a { color: '.$hongo_number_color.'  }';
                }

                if ( $hongo_feature_title || $hongo_featurebox_image || $hongo_feature_number ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-5-'.$interactive_banner5.'">';

                        if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );                                
                            $output .= '</div>';
                        }

                        if ( $hongo_feature_title || $hongo_feature_number ) {

                            $output.='<div class="hongo-featurebox-text">';

                                $output .= '<div class="hongo-textbox-content-wrapper">';                                    
                                    
                                    if ( ! empty( $hongo_feature_number ) ) {
                                            
                                        $output .= '<div class="interactive-number alt-font">';

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all') ) {
                                                $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link">';
                                            }
                                                $output .= $hongo_feature_number;

                                            if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'icon' || $hongo_link_on == 'all') ) {
                                                $output .= '</a>';
                                            }

                                        $output .= '</div>';
                                    }
                                    

                                    $output.= '<'.$title_heading_tag.' class="interactive-title'.$font_setting_class_title.'">';
                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                    }
                                        $output.= $hongo_feature_title;

                                    if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                        $output .= '</a>';
                                    }

                                    $output.= '</'.$title_heading_tag.'>';                                    

                                $output.= '</div>';

                            $output.= '</div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'interactive-banner-style-6':

                $interactive_banner6 = ( $interactive_banner6 ) ? $interactive_banner6 : 0;
                $interactive_banner6 = $interactive_banner6 + 1;

                // Background hover Color 
                if ( ! empty( $hongo_product_feature_hover_color ) ) {
                    $hongo_featured_array[] = '.hongo-interactive-banner-6-'.$interactive_banner6.' .hongo-overlay { '.$hongo_product_feature_hover_color.' }';
                }

                if ( $hongo_feature_title || $hongo_button_title || $hongo_featurebox_image || $hongo_feature_subtitle ) {

                    $output.='<div'.$id.' class="hongo-featurebox-wrap'.$class_list.' hongo-interactive-banner-6-'.$interactive_banner6.'">';

                        if ( $hongo_featurebox_image ) {
                            $output .= '<div class="interactive-featurebox-image">';
                                $output .= wp_get_attachment_image( $hongo_featurebox_image, $hongo_featurebox_image_srcset );
                                $output .= '<div class="hongo-overlay"></div>';

                                if ( $hongo_feature_title || $hongo_button_title ) {

		                            $output .= '<div class="hongo-featurebox-hover">';

		                                if ( $hongo_button_title ) {

		                                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font btn-white';
                                            $button_setting_class .= ( $hongo_button_type_class ) ? ' '.$hongo_button_type_class  :  '';
		                                    $output .= '<a href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'" class="'.trim( $button_setting_class ).'">';
		                                    $output .= $hongo_button_title;
		                                    $output .= '</a>';
		                                }
		                            $output .= '</div>';
		                        }
		                        
                            $output .= '</div>';
                        }

                        if ( $hongo_feature_title ) {

                            $output.='<'.$title_heading_tag.' class="hongo-featurebox-text'.$font_setting_class_title.'">';

                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                    $output .= '<a'.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'" class="hongo-title-link'.$font_setting_class_title.'">';
                                }

                                    $output.= $hongo_feature_title;

                                if ( $hongo_enable_link == 1 && ( $hongo_link_url ) && ( $hongo_link_on == 'title' || $hongo_link_on == 'all') ) {
                                    $output .= '</a>';
                                }

                            $output.= '</'.$title_heading_tag.'>';
                        }

                        // Subtitle
                        if ( $hongo_feature_subtitle ) {
                            $output.= '<'.$subtitle_heading_tag.' class="hongo-subtitle'.$font_setting_class_subtitle.'">'.$hongo_feature_subtitle.'</'.$subtitle_heading_tag.'>';
                        }

                    $output .= '</div>';
                }
            break;
        }

        return $output;
    }
}
add_shortcode( 'hongo_pfeature_box', 'hongo_feature_product_box_shortcode' );
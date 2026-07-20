<?php
/**
 * Shortcode For Testimonial
 *
 * @package hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_testimonial_shortcode' ) ) {
    function hongo_testimonial_shortcode( $atts, $content = null ) {

    	global $hongo_testimonial_unique_id, $hongo_featured_array;

        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'hongo_testimonial_style' => '',
                'hongo_testimonial_image' => '',
                'hongo_image_srcset' => '',
                'hongo_round_image' => '1',
                'hongo_name' => '',
                'name_heading_tag' => '',
                'hongo_designation' => '',
                'designation_heading_tag' => '',
                'hongo_box_background_color' => '',
                'hongo_separator_color' => '',
                'hongo_enable_quote' => '1',
                'hongo_icon_color' => '',
                'hongo_icon_type' => 'icon-medium',
                'hongo_content_title' => '',
                'hongo_content_title_heading_tag' => '',

                'additional_font_name' => '0',
                'additional_font_designation' => '0',
                'additional_font_title' => '0',

                'hongo_font_name_setting' => '',
                'hongo_font_designation_setting' => '',
                'hongo_font_content_title_setting' => '',
                'hongo_font_content_setting' => '',

                'hongo_content_desktop_width' => '',
                'hongo_content_desktop_mini_width' => '',
                'hongo_content_ipad_width' => '',
                'hongo_content_mobile_width' => '',

            ), $atts ) );

        $output = '';
        $classes = $content_classes = array();

        // Check if slider id and class
        $hongo_testimonial_unique_id = ! empty( $hongo_testimonial_unique_id ) ? $hongo_testimonial_unique_id : 0;
        $hongo_testimonial_unique_id = $hongo_testimonial_unique_id + 1;
        $classes[] = $testimonial_unique_id = 'hongo-testimonial-'.$hongo_testimonial_unique_id;

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class  = ( $class ) ? $classes[] = $class : '';

        $classes[] = $hongo_testimonial_style;

        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';    

        // Image size
        $hongo_image_srcset   = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

        // Heading tags
        $name_heading_tag               = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
        $designation_heading_tag        = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';
        $hongo_content_title_heading_tag= ! empty( $hongo_content_title_heading_tag ) ? $hongo_content_title_heading_tag : 'div';

        // Alt-font setting
        $additional_font_name = ( $additional_font_name == 1 ) ? ' alt-font' : '';
        $additional_font_designation = ( $additional_font_designation == 1 ) ? ' alt-font' : '';
        $additional_font_title = ( $additional_font_title == 1 ) ? ' alt-font' : '';

        // Content width settings
        $hongo_content_desktop_width = ( $hongo_content_desktop_width ) ?  $content_classes[] = $hongo_content_desktop_width : '';
        $hongo_content_desktop_mini_width = ( $hongo_content_desktop_mini_width ) ? $content_classes[] = $hongo_content_desktop_mini_width : '';
        $hongo_content_ipad_width   = ( $hongo_content_ipad_width ) ? $content_classes[] = $hongo_content_ipad_width : '';
        $hongo_content_mobile_width = ( $hongo_content_mobile_width ) ? $content_classes[] = $hongo_content_mobile_width : '';
        $content_class_list = ! empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

        // End Image Alt, Title, Caption      
        $hongo_content_title = ! empty( $hongo_content_title ) ? $hongo_content_title : '';

        // Responsive font settings
        $font_setting_class_title          = ! empty( $hongo_font_name_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_name_setting ) : '';
        $font_setting_class_designation    = ! empty( $hongo_font_designation_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_designation_setting ) : '';
        $font_setting_class_content_title  = ! empty( $hongo_font_content_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_title_setting ) : '';
        $font_setting_class_content        = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';

        switch ( $hongo_testimonial_style ) {

            case 'testimonial-style-1':

            	// Box Background color
            	if ( ! empty( $hongo_box_background_color ) ) {
            		$hongo_box_background_color = ( $hongo_box_background_color ) ? $hongo_box_background_color.';' : '';
            		$hongo_featured_array[] =  '.'.$testimonial_unique_id.' .testimonial-content-wrap{ background-color:'.$hongo_box_background_color.'; }';
    				$hongo_featured_array[] =  '.'.$testimonial_unique_id.' .testimonial-content-wrap:after{ border-bottom-color:'.$hongo_box_background_color.'; }';
            	}

                // Round image        
                if ( $hongo_round_image == '0' ) {
                    $hongo_featured_array[] =  '.'.$testimonial_unique_id.' .testimonial-image img{ border-radius:0; }';
                }

            	// Separator Color
    		    if ( ! empty( $hongo_separator_color ) ) {
    				$hongo_separator_color = ( $hongo_separator_color ) ? $hongo_separator_color.';' : '';
    				$hongo_featured_array[] = '.'.$testimonial_unique_id.' .testimonial-meta span{ color:'.$hongo_separator_color.' }';        		
    			}

                if ( ! empty( $hongo_testimonial_image ) || $content || ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';
                        if ( ! empty( $hongo_testimonial_image ) ) {
                            $output .= '<div class="testimonial-image">';
                                $output .= hongo_get_image_html( $hongo_testimonial_image, $hongo_image_srcset, 'image' );
                            $output .= '</div>';
                        }
                        $output .='<div class="testimonial-content-wrap">';
                            if ( $content ) {
                                $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            // Name & Designation
                            if ( ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {
                                $output .= '<div class="testimonial-meta alt-font">';
                                    if ( ! empty( $hongo_name ) ) {
                                        $output .= '<'.$name_heading_tag.' class="testimonial-name'.esc_attr( $additional_font_name ).esc_attr( $font_setting_class_title ).'">'.$hongo_name.'</'.$name_heading_tag.'>';
                                    }
                                    if ( ! empty( $hongo_name ) && ! empty( $hongo_designation ) ) {
                                        $output .= '<span> / </span>';
                                    }
                                    if ( ! empty( $hongo_designation ) ) {
                                        $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $additional_font_designation ).esc_attr( $font_setting_class_designation ).'">'.$hongo_designation.'</'.$designation_heading_tag.'>';
                                    }
                                $output .= '</div>';
                            }
                        $output .='</div>';
                    $output .= '</div>';
                }    
            break;

            case 'testimonial-style-2':

                // Separator Color
                if ( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.'.$testimonial_unique_id.' .testimonial-icon i{ color:'.$hongo_icon_color.' }';
                }

                if ( ! empty( $content ) || ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';

                        // Quote Icon
                        $content_wrap_class = '';
                        if ( $hongo_enable_quote ) {
                            $hongo_icon_type = ! empty( $hongo_icon_type ) ? ' '.$hongo_icon_type : ' icon-medium';
                            $output .= '<div class="testimonial-icon">';
                                $output .= '<i class="fa-solid fa-quote-left base-color'.esc_attr( $hongo_icon_type ).'"></i>';
                            $output .= '</div>';
                        } else {
                            $content_wrap_class = ' no-padding-left';
                            $font_setting_class_content .= ' width-100';
                        }

                        $output .='<div class="testimonial-content-wrap'.esc_attr( $content_wrap_class ).'">';
                            
                            // Content
                            if ( $content ) {
                                $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).esc_attr( $content_class_list ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                            }
                            
                            // Name & Designation
                            if ( ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {
                                $output .= '<div class="testimonial-meta">';
                                    if ( ! empty( $hongo_name ) ) {
                                        $output .= '<'.$name_heading_tag.' class="testimonial-name'.esc_attr( $additional_font_name ).esc_attr( $font_setting_class_title ).'">- '.$hongo_name.'</'.$name_heading_tag.'>';
                                    }
                                    if ( ! empty( $hongo_name ) && ! empty( $hongo_designation ) ) {
                                        $output .= ', ';
                                    }
                                    if ( ! empty( $hongo_designation ) ) {
                                        $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $additional_font_designation ).esc_attr( $font_setting_class_designation ).'">'.$hongo_designation.'</'.$designation_heading_tag.'>';
                                    }
                                $output .= '</div>';
                            }

                        $output .= '</div>';
                    $output .= '</div>';
                }

            break;

            case 'testimonial-style-3':

                if ( $content || ! empty( $hongo_content_title ) || ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).'">';

                    	// Separator Color
        			    if ( ! empty( $hongo_separator_color ) ) {
        					$hongo_separator_color = ( $hongo_separator_color ) ? $hongo_separator_color.';' : '';
        					$hongo_featured_array[] = '.'.$testimonial_unique_id.' .testimonial-meta>span{ color:'.$hongo_separator_color.' }';
        				}

                        // Quote Icon
                        if ( $hongo_enable_quote ) {
                            $hongo_icon_color = ! empty( $hongo_icon_color ) ? ' style="color:'. $hongo_icon_color .';"' : '';
                            $hongo_icon_type = ! empty( $hongo_icon_type ) ? ' '.$hongo_icon_type : ' icon-medium';
                            $output .= '<div class="testimonial-icon">';                        
                                $output .= '<i class="fa-solid fa-quote-left base-color'.esc_attr( $hongo_icon_type ).'"'.$hongo_icon_color.'></i>';
                            $output .= '</div>';
                        }
                            
                        // Title
                        if ( ! empty( $hongo_content_title ) ) {
                            $output .= '<'.$hongo_content_title_heading_tag.' class="testimonial-content-title'.esc_attr( $additional_font_title ).esc_attr( $font_setting_class_content_title ).'">'.$hongo_content_title.'</'.$hongo_content_title_heading_tag.'>';    
                        }

                        // Content
                        if ( $content ) {
                            $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).'">' . hongo_remove_wpautop( $content ) . '</div>';
                        }

                        // Name & Designation
                        if ( ! empty( $hongo_name ) || ! empty( $hongo_designation ) ) {
                            $output .= '<div class="testimonial-meta">';
                                if ( ! empty( $hongo_name ) ) {
                                    $output .= '<'.$name_heading_tag.' class="testimonial-name'.esc_attr( $additional_font_name ).esc_attr( $font_setting_class_title ).'">'.$hongo_name.'</'.$name_heading_tag.'>';
                                }
                                if ( ! empty( $hongo_name ) && ! empty( $hongo_designation ) ) {
                                    $output .= '<span> / </span>';
                                }
                                if ( ! empty( $hongo_designation ) ) {
                                    $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $additional_font_designation ).esc_attr( $font_setting_class_designation ).'">'.$hongo_designation.'</'.$designation_heading_tag.'>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }

            break;
        }

        return $output;
    }
}
add_shortcode( 'hongo_testimonial', 'hongo_testimonial_shortcode' );
<?php
/**
 * Shortcode For Testimonial Slider
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Testimonial Slider */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_testimonial_slider_shortcode' ) ) {
    function hongo_testimonial_slider_shortcode( $atts, $content = null ) {
        
        global $hongo_slider_unique_id, $hongo_slider_script,$hongo_featured_array;

        extract( shortcode_atts( array(
            'hongo_testimonial_slider_style' => '',
            'round_image' => '1',
            'hongo_testimonial_slides' => '',

            'name_heading_tag' => '',
            'additional_font_name' => '1',
            'additional_font_content' => '0',
            'designation_heading_tag' => '',
            'additional_font_designation' => '0',
            'title_heading_tag' => '',
            'additional_font_title' => '1',
            'hongo_box_background_color' => '',
            'hongo_active_box_background_color' => '',
            'enable_border' => '1',
            'border_width' => '',
            'border_style' => '',
            'border_color' => '',
            'border_radius' => '',
            'rating_color' => '',

            'show_pagination' => '1',
            'show_pagination_style' => 'swiper-pagination-dots',
            'hongo_pagination_color' => '',
            'hongo_active_pagination_color' => '',
            'show_navigation' => '1',
            'hongo_navigation_color' => '',
            'show_cursor_color_style' => '',

            'slides_per_view_desktop' => '3',
            'slides_per_view_mini_desktop' => '3',
            'slides_per_view_tablet' => '2',
            'slides_per_view_mobile' => '1',
            'autoloop' => '',
            'autoplay' => '1',
            'slidedelay' => '',
            'slidespeed' => '',

            'hongo_font_title_setting' => '',
            'hongo_font_name_setting' => '',
            'hongo_font_designation_setting' => '',
            'hongo_font_content_setting' => '',

            'hongo_slider_id' => '',
            'hongo_slider_class' => '',

        ), $atts ) );

        $hongo_main_classes = array();
        $output = '';

        if ( ! empty( $hongo_testimonial_slides ) ) {

            $hongo_testimonial_slides = json_decode( urldecode( $hongo_testimonial_slides ) );
                 
            ( $show_pagination == 1 ) ? $hongo_main_classes[] = 'pagination-bottom-space' : '';
            $pagination_style_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : 'swiper-pagination-dots';
            $hongo_main_classes[] = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style.' ' : 'black-move';
            $slides_per_view_desktop= ! empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '3';
            $slides_per_view_mini_desktop= ! empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
            $slides_per_view_tablet = ! empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
            $slides_per_view_mobile = ! empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

            // Check if slider id and class
            $hongo_slider_unique_id = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
            $navigation_unique_id = $hongo_slider_unique_id;
            $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'testimonial-slider';
            $hongo_slider_id.= '-' . $hongo_slider_unique_id;
            $hongo_slider_unique_id++;

            $hongo_testimonial_slider_style = ( $hongo_testimonial_slider_style ) ? $hongo_testimonial_slider_style : '';
            $hongo_main_classes[] = ( $hongo_slider_class ) ? $hongo_slider_class . ' ' . $hongo_testimonial_slider_style : $hongo_testimonial_slider_style;        

            // Responsive typography & alt font
            $font_setting_class_title = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
            ( $additional_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
            $font_setting_class_name = ! empty( $hongo_font_name_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_name_setting ) : '';
            ( $additional_font_name == 1 ) ? $font_setting_class_name .= ' alt-font' : '';
            $font_setting_class_designation = ! empty( $hongo_font_designation_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_designation_setting ) : '';
            ( $additional_font_designation == 1 ) ? $font_setting_class_designation .= ' alt-font' : '';
            $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
            ( $additional_font_content == 1 ) ? $font_setting_class_content .= ' alt-font' : '';
            

            // Pagination Color & Active Color
            if ( $show_pagination == 1 ) {
                if ( $show_pagination_style == 'swiper-pagination-border' ) {
                    if ( ! empty( $hongo_pagination_color ) ) {
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet{ border-color:'.$hongo_pagination_color.'; }';
                        if ( empty( $hongo_active_pagination_color ) ) {
                            $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_pagination_color.'!important; }';
                        }
                    }

                    if ( ! empty( $hongo_active_pagination_color ) ) {
                        $hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active{ border-color:'.$hongo_active_pagination_color.' }';
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_active_pagination_color.'!important; }';
                    }
                } else {
                    // Pagination color
                    if ( ! empty( $hongo_pagination_color ) ) {
                        $pagination_bullets_style = trim( $pagination_style_class );
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$pagination_bullets_style.' .swiper-pagination-bullet{ background-color:'.$hongo_pagination_color.'; }';        
                    }

                    // Pagination Active color
                    if ( ! empty( $hongo_active_pagination_color ) ) {
                        $pagination_bullets_style = trim( $pagination_style_class );
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$pagination_bullets_style.' .swiper-pagination-bullet-active{ background-color:'.$hongo_active_pagination_color.'; }';        
                    }
                }
            }

            // Box Background color
            $hongo_box_background_color = ( $hongo_box_background_color ) ? $hongo_box_background_color : '';
            if ( ! empty( $hongo_box_background_color ) ) {
                if ( $hongo_testimonial_slider_style == 'testimonial-slider-style-1' ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap .testimonial-content-box{ background-color:'.$hongo_box_background_color.'; }';
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap .testimonial-content-box:after{ border-top-color:'.$hongo_box_background_color.'; }';
                } else {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ background-color:'.$hongo_box_background_color.'; }';
                }
            }

            // Active Box Background Color
            if ( ! empty( $hongo_active_box_background_color ) ) {
                $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-slide-active .testimonial-content-wrap{ background-color:'. $hongo_active_box_background_color.'; }';
            }

            // Border settings
            if ( $enable_border == 1 ) {
                // Border Width
                if ( ! empty( $border_width ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ border-width:'. $border_width.'; }';
                }
                // Border Style
                if ( ! empty( $border_style ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ border-style:'. $border_style.'; }';
                }
                // Border Color
                if ( ! empty( $border_color ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ border-color:'. $border_color.'; }';
                }
                // Border Radius
                if ( ! empty( $border_radius ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ border-radius:'. $border_radius.'; }';
                }
            } else {
                $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-content-wrap{ border:none; }';
            }

            // Rating color
            if ( ! empty( $rating_color ) ) {
                $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-rating{ color:'. $rating_color.'; }';
            }

            // Round image        
            if ( $round_image == '0' ) {
                $hongo_featured_array[] =  '.'.$hongo_slider_id.' .testimonial-image img{ border-radius:0; }';
            }

            $hongo_main_classes[] = $hongo_slider_id;
            $hongo_main_classes[] = $pagination_style_class;

            $class_list = ( $hongo_main_classes ) ? implode(" ",$hongo_main_classes) : '';

            // Add custom script Start
            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
            $slidespeed = ( $slidespeed ) ? $slidespeed : '';

            if( $autoplay == 1 ) {
                $swiper_config['autoplay'] = array( 'delay' => intval( $slidedelay ), 'disableOnInteraction' => false, 'stopOnLastSlide' => true );
            } else { 
                $swiper_config['autoplay'] = false;
            }

            $swiper_config['keyboard'] = array( 'enabled' => true, 'onlyInViewport' => false );

            if( $slidespeed ) {
                $swiper_config['speed'] = $slidespeed;
            }

            $swiper_config['watchOverflow'] = true;

            if ( $hongo_testimonial_slider_style == 'testimonial-slider-style-1' || $hongo_testimonial_slider_style == 'testimonial-slider-style-2' ) {

                $swiper_config['slidesPerView'] = $slides_per_view_mobile;
                $swiper_config['breakpoints'] = array( '768' => array( 'slidesPerView' => $slides_per_view_tablet ), '992' => array( 'slidesPerView' => $slides_per_view_mini_desktop ), '1200' => array( 'slidesPerView' => $slides_per_view_desktop ) );
            } else {
                $swiper_config['slidesPerView'] = 1;
            }            

            if ( $show_pagination == 1 ) {

                $swiper_config['pagination'] = array( 'el' => '.swiper-pagination', 'type' => 'bullets', 'clickable' => true );

            }

            if( $autoloop == 1 && ( $hongo_testimonial_slider_style == 'testimonial-slider-style-1' || $hongo_testimonial_slider_style == 'testimonial-slider-style-3' ) ) {
                $swiper_config['loop'] = true;
            }

            if( $hongo_testimonial_slider_style == 'testimonial-slider-style-2' ) {

                $swiper_config['centeredSlides'] = true;
                $swiper_config['initialSlide'] = 1;

            }

            if ( $show_navigation == 1 && $hongo_testimonial_slider_style == 'testimonial-slider-style-3' ) {

                $swiper_config['navigation'] = array( 'nextEl' => '.swiper-next-' . $navigation_unique_id,  'prevEl' => '.swiper-prev-'. $navigation_unique_id);

            }            

            $slider_options = ! empty( $swiper_config ) ? json_encode( $swiper_config ) : '';

            $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
                
                $output .= '<div class="swiper-wrapper equalize">';

                    if ( ! empty( $hongo_testimonial_slides ) ) {

                        foreach( $hongo_testimonial_slides as $slide ) {
                            
                            // Replace || to <br /> in title
                            $slide_name = ! empty( $slide->hongo_name ) ? str_replace( '||', '<br />',$slide->hongo_name ) : '';

                            // Heading & Sub Heading Tag
                            $name_heading_tag       = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
                            $designation_heading_tag = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';
                            $title_heading_tag    = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

                            // Image size
                            $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';
                            
                            switch ( $hongo_testimonial_slider_style ) {

                                case 'testimonial-slider-style-1':

                                    if ( ! empty( $slide->hongo_title_content ) || ! empty( $slide->hongo_content ) || ! empty( $slide->hongo_image ) || ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                        $output .= '<div class="swiper-slide">';
                                            $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                            
                                                $output .= '<div class="testimonial-content-wrap">';
                                                    if ( ! empty( $slide->hongo_title_content ) || ! empty( $slide->hongo_content ) ) {
                                                        $output .= '<div class="testimonial-content-box inner-match-height">';
                                                            // Title
                                                            if ( ! empty( $slide->hongo_title_content ) ) {
                                                                
                                                                $output .= '<'.$title_heading_tag.' class="content-title'.esc_attr( $font_setting_class_title ).'">'. $slide->hongo_title_content .'</'.$title_heading_tag.'>';
                                                            }
                                                            // Content
                                                            if ( ! empty( $slide->hongo_content ) ) {
                                                                $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).'">'.  hongo_remove_wpautop( $slide->hongo_content ) .'</div>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                    // Image
                                                    $output .= '<div class="testimonial-box">';
                                                        if ( ! empty( $slide->hongo_image ) ) {
                                                            $output .='<div class="testimonial-image">';
                                                                $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset, 'image' );
                                                            $output .='</div>';
                                                        }
                                                        // Name & Designation
                                                        if ( ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                                            $output .= '<div class="testimonial-meta">';                                            
                                                                if ( ! empty( $slide_name ) ) {
                                                                    $output .= '<'.$name_heading_tag.' class="testimonial-name'.esc_attr( $font_setting_class_name ).'">'.$slide_name.'</'.$name_heading_tag.'>';
                                                                }
                                                                if ( ! empty( $slide->hongo_designation ) ) {
                                                                    $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $font_setting_class_designation ).'">'.$slide->hongo_designation.'</'.$designation_heading_tag.'>';
                                                                }
                                                            $output .= '</div>';        
                                                        }
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                break;

                                case 'testimonial-slider-style-2':

                                    if ( ! empty( $slide->hongo_title_content ) || ! empty( $slide->hongo_content ) || ! empty( $thumb[0] ) || ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                        $output .= '<div class="swiper-slide">';
                                            $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                                $output .= '<div class="testimonial-content-wrap">';
                                                    // Image
                                                    if ( ! empty( $slide->hongo_image ) ) {
                                                        $output .='<div class="testimonial-image inner-match-height">';
                                                            $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset, 'image' );
                                                        $output .='</div>';
                                                    }
                                                    // Content
                                                    if ( ! empty( $slide->hongo_content ) ) {
                                                        $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).'">'. hongo_remove_wpautop( $slide->hongo_content ) .'</div>';
                                                    }
                                                    // Name & Designation
                                                    if ( ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                                        $output .= '<div class="testimonial-meta">';
                                                            if ( ! empty( $slide_name ) ) {
                                                                $output .= '<'.$name_heading_tag.' class="testimonial-name base-color'.esc_attr( $font_setting_class_name ).'">'.$slide_name.'</'.$name_heading_tag.'>';
                                                            }
                                                            if ( ! empty( $slide->hongo_designation ) ) {
                                                                $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $font_setting_class_designation ).'">'.$slide->hongo_designation.'</'.$designation_heading_tag.'>';
                                                            }
                                                            if ( ! empty( $slide->hongo_slide_rating ) ) {
                                                                $output .= '<div class="testimonial-rating">';
                                                                    for ( $i = 0; $i < 5; $i++ ) {
                                                                        $output .= ( $slide->hongo_slide_rating > $i ) ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
                                                                    }
                                                                $output .= '</div>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                break;

                                case 'testimonial-slider-style-3':
                                
                                    if ( ! empty( $slide->hongo_content ) || ! empty( $thumb[0] ) || ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                        $output .= '<div class="swiper-slide">';
                                            $output .= '<div class="col-md-7 col-sm-10 col-xs-12">';
                                                $output .= '<div class="testimonial-content-wrap">';
                                                
                                                    //Image
                                                    if ( ! empty( $slide->hongo_image ) ) {

                                                        $output .= '<div class="testimonial-image">';
                                                            $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset, 'image' );
                                                        $output .= '</div>';
                                                    }

                                                    if ( ! empty( $slide->hongo_content ) || ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {

                                                        $output .= '<div class="testimonial-box">';
                                                            //Content
                                                            if ( ! empty( $slide->hongo_content ) ) {
                                                                $output .= '<div class="testimonial-content'.esc_attr( $font_setting_class_content ).'">'. hongo_remove_wpautop( $slide->hongo_content ) .'</div>';
                                                            }
                                                            // Name & Designation
                                                            if ( ! empty( $slide_name ) || ! empty( $slide->hongo_designation ) ) {
                                                                $output .= '<div class="testimonial-meta">';                                            
                                                                    if ( ! empty( $slide_name ) ) {
                                                                        $output .= '<'.$name_heading_tag.' class="testimonial-name'.esc_attr( $font_setting_class_name ).'">'.$slide_name.'</'.$name_heading_tag.'>';
                                                                    }
                                                                    if ( ! empty( $slide_name ) && ! empty( $slide->hongo_designation ) ) {
                                                                        $output .= '<span class="'.esc_attr( $font_setting_class_name ).'">, </span>';
                                                                    }
                                                                    if ( ! empty( $slide->hongo_designation ) ) {
                                                                        $output .= '<'.$designation_heading_tag.' class="testimonial-designation'.esc_attr( $font_setting_class_designation ).'">'.$slide->hongo_designation.'</'.$designation_heading_tag.'>';
                                                                    }
                                                                $output .= '</div>';        
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                break; 

                            } // End Switch

                        } // End For Loop
                    }

                $output .= '</div>'; // End Wrapper

                // All Settings
                switch ( $hongo_testimonial_slider_style ) {

                    case 'testimonial-slider-style-1':

                        if ( $show_pagination == 1 ) {
                            
                            $class_name = 'swiper-pagination-'. $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.esc_attr( $class_name ).esc_attr( $pagination_style_class).'"></div>';

                        }

                    break;

                    case 'testimonial-slider-style-2':

                        if ( $show_pagination == 1 ) {
                            
                            $class_name = 'swiper-pagination-'.$navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.esc_attr( $class_name ).esc_attr( $pagination_style_class ).'"></div>';                            
                        }

                    break;

                    case 'testimonial-slider-style-3':

                        if ( $show_pagination == 1 ) {

                            $class_name = 'swiper-pagination-'.$navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.esc_attr( $class_name ).esc_attr( $pagination_style_class ).'"></div>';                            
                        }
                        
                        if ( $show_navigation == 1 ) {

                            // Navigation color
                            if ( ! empty( $hongo_navigation_color ) ) {                            
                                $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i{ color:'.$hongo_navigation_color.'; }';        
                            }                      

                            $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-'.$navigation_unique_id.'"></i></div>
                                        <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-'.$navigation_unique_id.'"></i></div>';
                        }                        

                    break;
                }

            $output .= '</div>'; // End .swiper-container
            
        }
        return $output;
    }
}
add_shortcode( 'hongo_testimonial_slider', 'hongo_testimonial_slider_shortcode' );
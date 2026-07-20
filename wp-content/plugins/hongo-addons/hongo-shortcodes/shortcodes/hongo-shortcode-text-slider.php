<?php
/**
 * Shortcode For Text Slider
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Text Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_text_slider_shortcode' ) ) {
    function hongo_text_slider_shortcode( $atts, $content = null ) {
        
        global $hongo_slider_unique_id, $hongo_featured_array, $hongo_slider_script ,$hongo_text_slider_style2;

       	extract( 
       		shortcode_atts(
       			array(
                    'text_slider_style' => '',
                    'hongo_text_slides' => '',
                    
                    'hongo_pagination_color' => '',
                    'hongo_show_navigation' => '1',
                    'hongo_show_cursor_color_style' => '',                    
                    'autoloop' => '',
                    'autoplay' => '1',
                    'hongo_navigation_color' => '',
                    'slidedelay' => '',
                    'slidespeed' => '',
                    'hongo_slider_id' => '',
                    'hongo_slider_class' => '',

                    'hongo_enable_alternate_font_title' => '1',
                    'hongo_enable_alternate_font_subtitle' => '1',
                    'hongo_title_element_tag' => '',
                    'hongo_subtitle_element_tag' => '',

                    'hongo_button_style' => '',
                    'hongo_button_type' => '',
                    'hongo_button_setting' => '',
                    'hongo_font_number_setting' => '',
                    'hongo_font_title_setting' => '',
                    'hongo_font_subtitle_setting' => '',
                    'hongo_font_content_setting' => '',

                    'content_desktop_width' => '',
                    'content_desktop_mini_width' => '',
                    'content_ipad_width' => '',
                    'content_mobile_width' => '',
                ), $atts
            )
       	);

        $output = $hongo_button_style_class = $hongo_button_class = $slider_config = '';
        $classes = $content_classes = array();

        if ( ! empty( $hongo_text_slides ) ) {

            $hongo_text_slides = json_decode( urldecode( $hongo_text_slides ) );
            // Extra class 
            ( $hongo_slider_class ) ? $classes[] = $hongo_slider_class : '';

            // Style class
            ( $text_slider_style ) ? $classes[] = $text_slider_style : '';

            // Check if slider id and class
            $hongo_slider_unique_id  = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
            $hongo_slider_id         = ( $hongo_slider_id ) ? $hongo_slider_id : 'text-slider';
            $hongo_slider_id        .= '-' . $hongo_slider_unique_id;
            $hongo_slider_unique_id++;

            // Content width settings
            $content_desktop_width = ( $content_desktop_width ) ?  $content_classes[] = $content_desktop_width : '';
            $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $content_classes[] = $content_desktop_mini_width : '';
            $content_ipad_width   = ( $content_ipad_width ) ? $content_classes[] = $content_ipad_width : '';
            $content_mobile_width = ( $content_mobile_width ) ? $content_classes[] = $content_mobile_width : '';
            $content_class_list = ! empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

            // Responsive typography & alt font
            $button_setting_class = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
            $font_setting_class_number   = ! empty( $hongo_font_number_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_number_setting ) : '';
            $font_setting_class_title   = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
            ( $hongo_enable_alternate_font_title == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
            $font_setting_class_subtitle= ! empty( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
            ( $hongo_enable_alternate_font_subtitle == 1 ) ? $font_setting_class_subtitle .= ' alt-font' : '';
            $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
            ( $content_class_list ) ?  $font_setting_class_content .= $content_class_list : '';

            // For button style
            if ( ! empty( $hongo_button_style ) ) {

                $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
            }

            // For button type
            if ( ! empty( $hongo_button_type ) ) {

                switch( $hongo_button_type ) {

                    case 'extra-large':
                        $hongo_button_class = ' btn-extra-large';
                    break;
                    case 'large':
                        $hongo_button_class = ' btn-large';
                    break;
                    case 'medium':
                        $hongo_button_class = ' btn-medium';
                    break;
                    case 'small':
                        $hongo_button_class = ' btn-small';
                    break;
                    case 'vsmall':
                        $hongo_button_class = ' btn-very-small';
                    break;
                }
            }

            // Class list
            $class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

            switch ( $text_slider_style ) {                

                case 'hongo-text-slider2':
                    // Cursor style
                    $class_list .= ( $hongo_show_cursor_color_style ) ? ' '.$hongo_show_cursor_color_style : ' black-move';
                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn alt-font';
                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';

                    $hongo_text_slider_style2 = ! empty( $hongo_text_slider_style2 ) ? $hongo_text_slider_style2 : 0;
                    $hongo_text_slider_style2 = $hongo_text_slider_style2 + 1;
                    $output .= '<div class="text-slider-wrapper text-slider-style2-'.$hongo_text_slider_style2.'" >';

                        $output .='<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container content-right-slider '.esc_attr( $class_list ).'">';
                            $output .='<div class="swiper-wrapper">';

                                $hongo_title_element_tag = ( $hongo_title_element_tag ) ? $hongo_title_element_tag : 'h4';
                                $hongo_subtitle_element_tag = ( $hongo_subtitle_element_tag ) ? $hongo_subtitle_element_tag : 'p';
                                $i = 0;

                                if ( ! empty( $hongo_text_slides ) ) {

                                    foreach ( $hongo_text_slides as $slide ) {

                                        $i++;
                                        // Replace || to <br /> in title
                                        $slide_title = ! empty( $slide->hongo_title ) ? str_replace('||', '<br />',$slide->hongo_title) : '';

                                        $hongo_button_parse_args = ! empty( $slide->hongo_button_config ) ? vc_parse_multi_attribute( $slide->hongo_button_config ) : array();
                                        $hongo_button_link       = ( isset( $hongo_button_parse_args['url'] ) ) ? $hongo_button_parse_args['url'] : '#';
                                        $hongo_button_title      = ( isset( $hongo_button_parse_args['title'] ) ) ? $hongo_button_parse_args['title'] : '';
                                        $hongo_button_target     = ( isset( $hongo_button_parse_args['target'] ) ) ? trim( $hongo_button_parse_args['target'] ) : '_self';
                                        $hongo_button_target     = ! empty( $hongo_button_target ) ? ' target="' . $hongo_button_target . '"' : '';


                                        if ( ! empty( $slide->hongo_button_one_page ) && $slide->hongo_button_one_page == 1 ) {

                                            $button_setting_class .= ' section-link';
                                            $hongo_button_target = '';
                                        }

                                        $output .= '<div class="swiper-slide">';
                                            $output .= '<div class="text-slide-wrap">';
                                                $output .= '<div class="text-slide-number">';
                                                    $output .= '<span class="number-title alt-font'.esc_attr( $font_setting_class_number ).'">' . str_pad( $i, 2, 0, STR_PAD_LEFT ) . '</span>';
                                                    if ( ! empty( $slide->hongo_subtitle ) ) {
                                                        $output .= '<'.$hongo_subtitle_element_tag.' class="text-slide-subtitle'.esc_attr( $font_setting_class_subtitle ).'">'.$slide->hongo_subtitle.'</'.$hongo_subtitle_element_tag.'>';
                                                    }
                                                $output .= '</div>';
                                                if ( ! empty( $slide->hongo_title ) ) {
                                                    $output .= '<'.$hongo_title_element_tag.' class="text-slide-title'.esc_attr( $font_setting_class_title ).'">'.$slide_title.'</'.$hongo_title_element_tag.'>';
                                                }
                                                if ( ! empty( $slide->hongo_content ) ) {
                                                    $output .= '<div class="text-slide-content'.esc_attr( $font_setting_class_content ).'">' . $slide->hongo_content . '</div>';
                                                }
                                                if ( $hongo_button_title ) {
                                                    $output .= '<a class="'.trim( $button_setting_class ).'"'.$hongo_button_target.' href="'.esc_url( $hongo_button_link ).'">';
                                                    $output .= $hongo_button_title;
                                                    $output .= '</a>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                }

                            $output .='</div>';

                        $output .='</div>';
                        if ( $hongo_show_navigation == 1 ) {
                            // Navigation color
                            if ( ! empty( $hongo_navigation_color ) ) {
                                $hongo_featured_array[] =  '.text-slider-style2-'.$hongo_text_slider_style2.' .swiper-button-next i ,.text-slider-style2-'.$hongo_text_slider_style2.' .swiper-button-prev i { color: '.$hongo_navigation_color.'; }';
                            }
                            $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-'.$hongo_slider_id.'"></i></div><div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-'.$hongo_slider_id.'"></i></div>';

                            $slider_config .= "navigation: { nextEl: '.swiper-next-" .$hongo_slider_id . "', prevEl: '.swiper-prev-" . $hongo_slider_id . "', },";
                        }
                    $output .='</div>';
                break;
            }

            // Add custom script Start
            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
            $slidespeed = ( $slidespeed ) ? $slidespeed : '';

            ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
            ( $autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:'.$slidedelay.', disableOnInteraction: false, },' : $slider_config .= 'autoplay: false,';
            ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';
            $slider_config .= 'watchOverflow: true,';

            if ( hongo_load_javascript_by_key( 'swiper' ) ) {
            	ob_start(); ?>
                    var textSliderID = "<?php echo str_replace( '-', '_', $hongo_slider_id ); ?>"; setTimeout(function () { textSliderID = new Swiper('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>', { <?php echo sprintf( '%s', $slider_config ); ?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { textSliderID.update(); } }); }, 300); } $( '.nav-tabs a[data-toggle="tab"]' ).each( function () { var $this = $(this); $this.on('shown.bs.tab', function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { textSliderID.update(); } }); });
                <?php 
            	$hongo_slider_script .= ob_get_contents();
            	ob_end_clean();
            }

        }
        return $output;
    }
}
add_shortcode( 'hongo_text_slider', 'hongo_text_slider_shortcode' );
<?php
/**
 * Shortcode For Client Image Slider
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Client Image Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_client_image_slider_shortcode' ) ) {
    function hongo_client_image_slider_shortcode( $atts, $content = null ) {

        global $hongo_slider_unique_id, $hongo_slider_script, $hongo_featured_array;

        extract( shortcode_atts( array(
            'hongo_slider_id' => '',
            'hongo_slider_class' => '',
            'hongo_image_slides' => '',
            'hongo_image_srcset' => 'full',
            
            'show_pagination' => '1',
            'show_pagination_style' => '',

            'enable_navigation' => '',
            'hongo_navigation_color' => '',

            'pagination_color' => '',
            'active_pagination_color' => '',
            
            'show_cursor_color_style' => '',
            'enable_separator' => '1',
            'separator_color' => '',
            'separator_thickness' => '',
            
            'autoloop' => '',
            'autoplay' => '1',
            'slidedelay' => '',
            'slidespeed' => '',
            'slides_view_desktop' => '4',
            'slides_view_mini_desktop' => '3',
            'slides_view_tablet' => '2',
            'slides_view_mobile' => '1'
        ), $atts) );

        $output = $slider_config = $slider_class = '';
        $classes = array();

        if ( ! empty( $hongo_image_slides ) ) {

            $hongo_image_slides = json_decode( urldecode( $hongo_image_slides ) );

            // Image Size
            $hongo_image_srcset = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

            // Pagination color and cursor style
            $pagination_color = ! empty( $pagination_color ) ? $pagination_color : '';
            $active_pagination_color = ! empty( $active_pagination_color ) ? $active_pagination_color : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-default ';

            // Slide view by devices
            $slides_view_desktop      = ! empty( $slides_view_desktop ) ? $slides_view_desktop : '4';
            $slides_view_mini_desktop = ! empty( $slides_view_mini_desktop ) ? $slides_view_mini_desktop : '3';
            $slides_view_tablet       = ! empty( $slides_view_tablet ) ? $slides_view_tablet : '2';
            $slides_view_mobile       = ! empty( $slides_view_mobile ) ? $slides_view_mobile : '1';

            // Check if slider id and class
            $hongo_slider_unique_id = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
            $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'hongo-client-image-slider';
            $hongo_slider_id .= '-' . $hongo_slider_unique_id;
            $hongo_slider_unique_id++;

            $hongo_slider_class = ( $hongo_slider_class ) ? ' ' . $hongo_slider_class : '';
            $hongo_slider_class .= ' hongo-client-slider-style-1';
            $hongo_slider_class .= ( $show_cursor_color_style ) ? ' ' . $show_cursor_color_style : '';
            $hongo_slider_class .= ( $show_pagination == '1' ) ? ' pagination-bottom-space' : '';


            // Pagination color
            if ( $show_pagination == '1' ) {

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
                }  else {
                    if ( ! empty( $pagination_color ) ) {
                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet { background-color:'.$pagination_color.'; }';
                    }
                    if ( ! empty( $active_pagination_color ) ) {
                        $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'; }';   
                    }
                }
            }
            // Seperator disable
            if ( $enable_separator != '1' ) {
                $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide { border: none; }';
            }
            // Seperator color
            if ( ! empty($separator_color) ) {
                $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide { border-color:'.$separator_color.'; }';
            }
            // Separator thickness
            if ( ! empty( $separator_thickness ) ) {
                $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide { border-width:'.$separator_thickness.'; }';
            }

            if ( $enable_navigation == 1 && ! empty( $hongo_navigation_color ) ) {
                $hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i { color:'.$hongo_navigation_color.'; }';
                $hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-button-prev,.'.$hongo_slider_id. ' .swiper-button-next { color:'.$hongo_navigation_color.'; }';
            }

            $classes[] = $hongo_slider_id;
            $classes[] = $hongo_slider_class;

            // Main class list
            $class_list = ! empty( $classes ) ? ' ' . implode( " ", $classes ) : '';

            $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container' .esc_attr( $class_list ). '">';

                $output .= '<div class="swiper-wrapper">';

                    if ( ! empty( $hongo_image_slides ) ) {

                        foreach( $hongo_image_slides as $slide ) {

                            // Link And Traget
                            $hongo_link_url = ! empty( $slide->hongo_link_url ) ? $slide->hongo_link_url : '';
                            $hongo_link_target = ! empty( $slide->hongo_link_target ) ? ' target="'.$slide->hongo_link_target.'"' : 'self';

                            $output .= '<div class="swiper-slide">';

                                if ( ! empty( $slide->hongo_image ) ) {

                                    if ( ! empty( $hongo_link_url ) ) {
                                        $output .= '<a '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">';
                                    }

                                        $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset );

                                    if ( ! empty( $hongo_link_url ) ) {
                                        $output .= '</a>';
                                    }
                                }

                            $output .= '</div>';
                        }
                    }

                $output .= '</div>';

                // Navigation
                if ( $enable_navigation == 1 ) {
                    $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $hongo_slider_id .'"></i></div>';
                    $output .= '<div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $hongo_slider_id .'"></i></div>';
                    $slider_config .= "navigation: { nextEl: '.swiper-next-". $hongo_slider_id ."', prevEl: '.swiper-prev-". $hongo_slider_id ."', },";
                }

                // Pagination
                if ( $show_pagination == 1 ) {
                    $pagination_style_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';
                    $class_name = ' swiper-pagination-'.$hongo_slider_id;

                    $output .= '<div class="swiper-pagination'.$class_name.$pagination_style_class.'"></div>';
                    $slider_config .= "pagination: { el: '.swiper-pagination-".$hongo_slider_id."',type : 'bullets' ,clickable: true },";
                }

            $output .= '</div>';

            // Add custom script Start
            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
            $slidespeed = ( $slidespeed ) ? $slidespeed : '';
            
            $slider_config .= "keyboard: { enabled: true, onlyInViewport: false },";
            $slider_config .= "slidesPerView: " . $slides_view_mobile . ",";
            $slider_config .= "breakpoints: { 768: { slidesPerView: ".$slides_view_tablet." }, 992: { slidesPerView: ".$slides_view_mini_desktop." }, 1200: { slidesPerView: ".$slides_view_desktop." } },";
            ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
            ( $autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:' . $slidedelay . ',disableOnInteraction: false, stopOnLastSlide :true,  },' : $slider_config .= 'autoplay: false,';
            ( $slidespeed ) ? $slider_config .= 'speed: ' . $slidespeed . ',' : '';
            $slider_config .= "watchOverflow: true,";
            
            if ( hongo_load_javascript_by_key( 'swiper' ) ) {
                ob_start();
                ?>
                    var clientSliderID = "<?php echo str_replace( '-', '_', $hongo_slider_id ); ?>"; setTimeout( function() { clientSliderID = new Swiper( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?>', { <?php echo sprintf( '%s', $slider_config ); ?> }); }, 100 ); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout( function () { $(document).imagesLoaded(function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { clientSliderID.update(); } }); }, 300 ); } $( '.nav-tabs a[data-toggle="tab"]' ).each( function () { var $this = $(this); $this.on('shown.bs.tab', function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { clientSliderID.update(); } }); });
                <?php
                $hongo_slider_script .= ob_get_contents();
                ob_end_clean();
            }
            return $output;
        }
    }
}
add_shortcode('hongo_client_image_slider', 'hongo_client_image_slider_shortcode');
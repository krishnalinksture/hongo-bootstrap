<?php
/**
 * Shortcode For Product Brand
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------
   Product Brand
-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_product_brand_slider_shortcode' ) ) {
    function hongo_product_brand_slider_shortcode( $atts, $content = null ) {
       global $hongo_slider_unique_id, $hongo_slider_script, $hongo_featured_array;
       extract(shortcode_atts(array(
                'hongo_slider_id' => '',
                'hongo_slider_class' => '',
                'hongo_brand_list' => '',
                'hongo_image_srcset' => '',
                'hongo_image_link' =>'0',
                'hongo_enable_new_tab' =>'',
                'enable_navigation' =>'',
                'hongo_navigation_color' => '',

                'show_cursor_color_style' => '',
                'enable_separator' => '1',
                'separator_color' => '',
                'separator_thickness' => '',
                
                'autoloop' => '',
                'autoplay' => '',
                'slidedelay' => '',
                'slidespeed' => '',
                'slides_view_desktop' => '4',
                'slides_view_mini_desktop' => '3',
                'slides_view_tablet' => '2',
                'slides_view_mobile' => '1'
            ), $atts) );

        $brand_list = $classes = array();

        $output = $slider_class = $numeric = $image = '';

        $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-default ';

        // Slide per view for all devices
        $slides_view_desktop      = ! empty( $slides_view_desktop ) ? $slides_view_desktop : '4';
        $slides_view_mini_desktop = ! empty( $slides_view_mini_desktop ) ? $slides_view_mini_desktop : '3';
        $slides_view_tablet       = ! empty( $slides_view_tablet ) ? $slides_view_tablet : '2';
        $slides_view_mobile       = ! empty( $slides_view_mobile ) ? $slides_view_mobile : '1';
        
        // Check if slider id and class
        $hongo_slider_unique_id = ! empty($hongo_slider_unique_id) ? $hongo_slider_unique_id : 1;
        $navigation_unique_id   = $hongo_slider_unique_id;
        $hongo_slider_id        = ( $hongo_slider_id ) ? $hongo_slider_id : 'hongo-prdouct-brand';
        $hongo_slider_id .= '-' .$hongo_slider_unique_id;
        $hongo_slider_unique_id++;

        ( $hongo_slider_class ) ? $classes[] = $hongo_slider_class : '';
        ( $show_cursor_color_style ) ? $classes[] = $show_cursor_color_style : '';
        $classes[] = $hongo_slider_id;

        // Class list
        $class_list = ! empty( $classes ) ? implode( " ", $classes ) : ''; 

        // Separator
        if( $enable_separator == '0' ){
            $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide:before { display:none; }';
        }
        // Separator color
        if( ! empty($separator_color) ) {
            $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide:before { background-color:'.$separator_color.'; }';
        }
        // Separator Thickness
        if( ! empty( $separator_thickness ) ){
            $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide:before { width:'.$separator_thickness.'; }';
        }
        // Navigation Color
        if( ! empty( $hongo_navigation_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i , .'.$hongo_slider_id. ' .swiper-button-prev,.'.$hongo_slider_id. ' .swiper-button-next { color:'.$hongo_navigation_color.'; }';
        }

        $brand_list = get_terms( array('taxonomy' => 'product_brand','hide_empty' => 0,'fields' => 'all') );
        $hongo_brand_list = ! empty( $hongo_brand_list ) ? explode(",",$hongo_brand_list) : array();
        $hongo_enable_new_tab = ( $hongo_enable_new_tab == 1 ) ? ' target="_blank"' : '';

        // Start Swiper custom script

        $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        $swiper_config['keyboard'] = array( 
            'enabled' =>true,
            'onlyInViewport' =>false 
        );
        $swiper_config['slidesPerView'] = intval( $slides_view_mobile );
        $swiper_config['breakpoints'] = array( '768' => array( 'slidesPerView' => intval( $slides_view_tablet ) ), '992' => array( 'slidesPerView' => intval( $slides_view_mini_desktop ) ), '1200' => array( 'slidesPerView' => intval( $slides_view_desktop ) ) );
        if( $autoloop == 1 ) {
            $swiper_config['loop'] = true;
        }

        if( $autoplay == 1 ) {
            $swiper_config['autoplay'] = array( 'delay' => intval( $slidedelay ), 'disableOnInteraction' => false, 'stopOnLastSlide' => true );
        } else { 
            $swiper_config['autoplay'] = false;
        } 

        if( $slidespeed ) {
            $swiper_config['speed'] = intval( $slidespeed );
        }

        $swiper_config['watchOverflow'] = true;

        if($enable_navigation == 1) {
            $swiper_config['navigation'] = array( 'nextEl' => '.swiper-next-'. $hongo_slider_id, 'prevEl' => '.swiper-prev-'. $hongo_slider_id );
        }

        $slider_options = ! empty( $swiper_config ) ? json_encode( $swiper_config ) : '';

        // End Swiper custom script

        if( ! empty( $hongo_brand_list ) ) {
            $args = array(
                'taxonomy' => 'product_brand',
                'hide_empty' => true,
            );
            if ( ! in_array( 'all', $hongo_brand_list ) ) {

                $args['slug'] = $hongo_brand_list;
            }
            $brand_list = get_terms( $args );
            
            if ( ! empty( $brand_list ) && ! is_wp_error( $brand_list ) ) {
                $output .= '<div class="hongo-brand-carousel-wrap">';
                    $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container brand-style-slider-1'.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
                
                        $output .= '<div class="swiper-wrapper">';
                            foreach( $brand_list as $brands_id ) {

                                $thumb_id = get_term_meta( $brands_id->term_id, 'logo_id', true );
                                if( ! empty( $thumb_id ) ) {

                                    $output .= '<div class="swiper-slide">';
                                        if( $hongo_image_link == 1 ) {
                                            $hongo_brand_url = get_category_link( $brands_id->term_id );

                                            $image = '<a href="'.esc_url( $hongo_brand_url ).'"'.$hongo_enable_new_tab.'>'.hongo_get_image_html( $thumb_id, $hongo_image_srcset, 'image' ).'</a>'; 
                                        } else {
                                            $image = hongo_get_image_html( $thumb_id, $hongo_image_srcset, 'image' );
                                        }
                                        $output .= $image;
                                    $output .= '</div>';
                                }
                            } // End Foreach
                            
                        $output .= '</div>'; // Swiper Wrapper End
                    
                        // Navigation
                        if( $enable_navigation == 1 ) {
                            $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $hongo_slider_id .'"></i></div>';
                            $output .= '<div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $hongo_slider_id .'"></i></div>';

                        }
                    $output .= '</div>'; // Swiper Container End
                $output .= '</div>'; // Hongo Carousel Wrap
            }
        }       
        return $output;
    }
}
add_shortcode( 'hongo_product_brand_slider', 'hongo_product_brand_slider_shortcode' );
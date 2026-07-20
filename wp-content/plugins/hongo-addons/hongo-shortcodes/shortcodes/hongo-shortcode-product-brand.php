<?php
/**
 * Shortcode For Brand / Client Logo
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------
   Product Brand
-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_product_brand_shortcode' ) ) {
    function hongo_product_brand_shortcode( $atts, $content = null ) {

        global $product_brand1, $product_brand2, $product_brand3, $product_brand4, $hongo_featured_array;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'hongo_enable_responsive_css' => '',
            'responsive_css' => '',

            'hongo_bg_image_type' => '',
            'desktop_bg_image_position' => '',

            'hongo_brand_style' => 'brand-style-slider-1',
            'hongo_brand_id' => '',
            'hongo_image_srcset' => '',
            'hongo_enable_extra_link' =>'',
            'hongo_link_url' => '',
            'hongo_enable_custom_image' => '0',
            'hongo_custom_image' => '',
            'hongo_link_target' => '',
            'hongo_box_bgcolor' => '',
        ), $atts ) );

        $classes = array();
        $output = $image = '';

        $classes[] = $hongo_brand_style;

        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        $brand = get_term_by( 'slug', $hongo_brand_id , 'product_brand' );

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box
        if( ( $hongo_enable_responsive_css == 1 ) && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $class_list = ! empty( $classes ) ? implode(' ', $classes) : '';

        // Get Images
        if( $hongo_enable_custom_image == '0' && hongo_is_woocommerce_activated() ){

            if( ! empty( $brand ) && !is_wp_error( $brand ) ) {

                $term_img = '';
                $thumb_id = get_term_meta( $brand->term_id, 'logo_id', true );            

                if( ! empty( $thumb_id ) ) {

                    $hongo_brand_url = get_category_link( $brand->term_id );
                    
                    $hongo_link_target_attr = ( $hongo_link_target && $hongo_link_target != 'one_page' ) ? ' target="'.$hongo_link_target.'"' : '';
                    
                    $section_link_class = $hongo_link_target == 'one_page' ? 'class="section-link"' : '';

                    if( $hongo_enable_extra_link == 1 && ! empty( $hongo_link_url ) ) {
                        $image .= '<a '.$section_link_class.' href="'.esc_url( $hongo_link_url ).'" '.$hongo_link_target_attr.' title="'.esc_attr( $brand->name ).'">';
                    } else {
                        $image .= '<a href="'.esc_url( $hongo_brand_url ).'" '.$hongo_link_target_attr.' title="'.esc_attr( $brand->name ).'">';
                    }

                    $image .= hongo_get_image_html( $thumb_id, $hongo_image_srcset, 'image' );

                    $image .= '</a>';
                }
            }

        } else{
            
            // Image Size
            $hongo_image_srcset  = ! empty($hongo_image_srcset) ? $hongo_image_srcset : 'full';

            if( ! empty( $hongo_custom_image ) ) {

                $hongo_link_url = ( $hongo_link_url ) ? $hongo_link_url : '';

                $hongo_link_target_attr = ( $hongo_link_target && $hongo_link_target != 'one_page' ) ? ' target="'.$hongo_link_target.'"' : '';
                $section_link_class = $hongo_link_target == 'one_page' ? ' section-link' : '';

                if( $hongo_enable_extra_link == 1 && ! empty( $hongo_link_url ) ) {
                    $image .= '<a class="hongo-custom-brand'.esc_attr( $section_link_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
                }
                    $image .= hongo_get_image_html( $hongo_custom_image, $hongo_image_srcset );

                if( $hongo_enable_extra_link == 1 && ! empty( $hongo_link_url ) ) {
                    $image .= '</a>';
                }
            }

        }

        if ( ! empty( $image ) ) {

            $output .= '<div class="hongo-product-brand-wrap">';

                switch ( $hongo_brand_style ) {

                    case 'product-brand-style-1':

                        $product_brand1 = ! empty( $product_brand1 ) ? $product_brand1 : 0;
                        $product_brand1 = $product_brand1 + 1;

                        $unique_class = ' '.$hongo_brand_style.'-'.$product_brand1;

                        $output.='<div '.$id.' class="'.esc_attr( $class_list ).esc_attr( $unique_class ).'">';

                            $output .= $image;

                        $output.='</div>';

                    break;

                    case 'product-brand-style-2':

                        $product_brand2 = ! empty( $product_brand2 ) ? $product_brand2 : 0;
                        $product_brand2 = $product_brand2 + 1;

                        if( ! empty( $hongo_box_bgcolor ) ) {
                            $hongo_featured_array[] = '.'.$hongo_brand_style.'-'.$product_brand2.'.product-brand-style-2:hover { background-color:'.$hongo_box_bgcolor.'; }';
                        }

                        $unique_class = ' '.$hongo_brand_style.'-'.$product_brand2;

                        $output.='<div '.$id.' class="'.esc_attr( $class_list ).esc_attr( $unique_class ).'">';

                            $output .= $image;

                        $output .= '</div>';

                    break;

                    case 'product-brand-style-3':

                        $product_brand3 = ! empty( $product_brand3 ) ? $product_brand3 : 0;
                        $product_brand3 = $product_brand3 + 1;

                        $unique_class = ' '.$hongo_brand_style.'-'.$product_brand3;

                        $output .='<div '.$id.' class="'.esc_attr( $class_list ).esc_attr( $unique_class ).'">';

                            $output .= $image;

                        $output .= '</div>';

                    break;

                    case 'product-brand-style-4':

                        $product_brand4 = ! empty( $product_brand4 ) ? $product_brand4 : 0;
                        $product_brand4 = $product_brand4 + 1;

                        $unique_class = ' '.$hongo_brand_style.'-'.$product_brand4;

                        $output.='<div '.$id.' class="'.esc_attr( $class_list ).esc_attr( $unique_class ).'">';

                            $output .= $image;

                        $output .= '</div>';

                    break;

                }

            $output.='</div>';
        }

        return $output;
    }
}
add_shortcode( 'hongo_product_brand', 'hongo_product_brand_shortcode' );
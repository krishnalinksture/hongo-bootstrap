<?php
/**
 * Smart Section For Big Search
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Big Search */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('hongo_product_search_shortcode') ) {
    function hongo_product_search_shortcode( $atts, $content = null ) {

    	global $hongo_product_search_uniq, $hongo_featured_array;

        if( hongo_load_javascript_by_key( 'jquery-ui-autocomplete' ) ) {
            wp_enqueue_script( 'hongo-addons-ajax-search' );
        }

	    extract( shortcode_atts( array(
	    		'id' => '',
            	'class' => '',
	            'hongo_product_search_placeholder_text' => __( 'SEARCH FOR PRODUCTS...' , 'hongo-addons' ),
	            'hongo_enable_product_category' => '1',

	            'desktop_display' => '',
	            'desktop_mini_display' => '',
	            'ipad_display' => '',
	            'mobile_display' => '',
	            'hongo_search_border_color' => '',
	            'hongo_search_placeholder_color' => '',
	            'hongo_search_text_color' => '',
	            'hongo_search_button_color' => '',
	            'hongo_search_button_hover_color' => '',
	            'hongo_search_button_bg_color' => '',
	            'hongo_search_button_hover_bg_color' => '',

	            'css' => '',
	            'hongo_bg_image_type' => '',
	            'desktop_bg_image_position' => '',
	            'hongo_enable_responsive_css' => '',
	            'responsive_css' => '',
	        ), $atts ) );

	 	$output = '';
	 	$classes = array();

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        // Navigation menu uniq id
        $hongo_product_search_uniq = ( $hongo_product_search_uniq ) ? $hongo_product_search_uniq : 1;
        $classes[] = $hongo_product_search_uniq_class = 'hongo-product-search-'.$hongo_product_search_uniq;
        $hongo_product_search_uniq++;

        // Column Display setting
        $desktop_display = ! empty( $desktop_display ) ? $classes[] = $desktop_display : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Product search border color
        if ( ! empty( $hongo_search_border_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .search-input{ border-color:'.$hongo_search_border_color.'; }';
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' button{ border-left-color:'.$hongo_search_border_color.'; }';
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .select2-container--default .select2-selection--single{ border-left-color:'.$hongo_search_border_color.'; }';
        }
        // Search place holder text color
        if ( ! empty( $hongo_search_placeholder_color ) ) {

            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .search-input::-webkit-input-placeholder{ color:'.$hongo_search_placeholder_color.'; }';
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .search-input:-moz-placeholder{ color:'.$hongo_search_placeholder_color.'; }';
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .search-input::-ms-input-placeholder{ color:'.$hongo_search_placeholder_color.'; }';

        }

        // Search text color
        if ( ! empty( $hongo_search_text_color ) ) {

        	$hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .select2-container--default .select2-selection--single .select2-selection__rendered { color:'.$hongo_search_text_color.'; }';
        	$hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' .search-input{ color:'.$hongo_search_text_color.'; }';
        }

        // Product search button color
        if ( ! empty( $hongo_search_button_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' button{ color:'.$hongo_search_button_color.'; }';
        }
        // Product search button hover color
        if ( ! empty( $hongo_search_button_hover_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' button:hover{ color:'.$hongo_search_button_hover_color.'; }';
        }
        // Product search button bg color
        if ( ! empty( $hongo_search_button_bg_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' button{ background-color:'.$hongo_search_button_bg_color.'; }';
        }
        // Product search button hover bg color
        if ( ! empty( $hongo_search_button_hover_bg_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_product_search_uniq_class. ' button:hover{ background-color:'.$hongo_search_button_hover_bg_color.'; }';
        }

        // Add extra class when category is off
        ( $hongo_enable_product_category != '1' ) ? $classes[] = 'no-search-category' : '';

        // CSS Box 
        ( ! empty( $css ) ) ? $classes[] = vc_shortcode_custom_css_class( $css, '' ) : '';

        // Background Image 
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $class_list = ! empty( $classes ) ? ' '.implode( " ", $classes ) : '';

	 	$unique_id = esc_attr( uniqid( 'search-form-' ) );

		$output .= '<div'.$id.' class="product-search-wrap'.$class_list.'">';    
	        $output .= '<form id="'.esc_attr( $hongo_product_search_uniq_class ).'" method="get" action="'.home_url('/').'" name="search-header" class="search-form-result without-popup alt-font">';
	            $output .= '<div class="search-form">';
	                $output .= '<input name="s" id="'. esc_attr( $unique_id ).'" class="search-input" placeholder="'.esc_html( $hongo_product_search_placeholder_text ).'" autocomplete="off" type="text">';
	                if( hongo_is_woocommerce_activated() ) {
	                    if( $hongo_enable_product_category == '1' ) {
	                        $args = array(
	                            'taxonomy'   => "product_cat",
	                        );
	                        $product_categories = get_terms( $args );
	                        $output .= '<select name="product_cat" class="hongo-product-search-categories">';
	                            $output .= '<option value="">'. __( 'Select Category', 'hongo-addons' ) .'</option>';
                                if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                                    foreach( $product_categories as $key => $categories_details ) {
    	                                $output .= '<option value="'.$categories_details->slug.'">'.$categories_details->name.'</option>';
    	                            }
                                }
	                        $output .= '</select>';
	                    }
	                        $output .= '<input type="hidden" name="post_type" value="product" />';
	                }
                    if ( function_exists( 'icl_object_id' ) ) {
                        echo '<input type="hidden" name="lang" value="'.ICL_LANGUAGE_CODE.'">';
                    }
	                $output .= '<button type="submit" class="icon-magnifier icons search-button close-search"></button>';
	            $output .= '</div>';
	        $output .= '</form>';
	        $output .= '<div id="big_search_no_results" class="hongo-no-result"></div>';
	    $output .= '</div>';

        return $output;
    }
}
add_shortcode( 'hongo_product_search', 'hongo_product_search_shortcode' );
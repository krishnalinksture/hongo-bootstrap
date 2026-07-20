<?php
/**
 * Shortcode For Row
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Row */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_inner_row' ) ) {
	function hongo_inner_row( $atts, $content = null ) {

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'css' => '',
	    	'hongo_enable_responsive_css' => '',
	    	'responsive_css' => '',

			'equal_height' => '',
			'content_placement' => '',
	        'gap' => '0',
	        'disable_element' => '',

	        'position_relative' => '',
	        'hongo_overflow_type' => '',
	        'z_index' => '',

	        'hongo_bg_image_type' => '',
	        'desktop_bg_image_position' => '',
	        'desktop_height' => '',

	        'show_overlay' => '',
	        'hongo_overlay_opacity' => '0.7',
	        'hongo_row_overlay_color' => '',
	        'hongo_z_index' => '',

	        'initial_loading_animation' => '',
	    ), $atts ) );

		$output = $padding = $padding_style = $margin = $margin_style = $style_attr = $overlay_style = '';
		$classes = $style_array = $wrapper_attributes = array();

		if ( ! empty( $id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $id ) . '"';
		}

		$classes = array(
			'vc_row',
			'wpb_row',
			//deprecated
			'vc_inner',
			'vc_row-fluid',
			$class,
			vc_shortcode_custom_css_class( $css ),
		);

		/* Filter for background image */
		$bg_image_url = apply_filters( 'hongo_shortcode_background_image_url', '', $css );
		if( ! empty( $bg_image_url ) ) {
			$style_array[] = "background-image:url( " . $bg_image_url . " ) !important;";
		}

		if ( 'yes' === $disable_element ) {
			if ( vc_is_page_editable() ) {
				$classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
			} else {
				return '';
			}
		}

		if ( vc_shortcode_custom_css_has_property( $css, array(
			'border',
			'background',
		) ) ) {
			$classes[] = 'vc_row-has-fill';
		}

		if ( ! empty( $atts['gap'] ) ) {
			$classes[] = 'vc_column-gap-' . $atts['gap'];
		}

		if ( ! empty( $equal_height ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-equal-height';
		}

		if ( ! empty( $content_placement ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-content-' . $content_placement;
		}

		if ( ! empty( $flex_row ) ) {
			$classes[] = 'vc_row-flex';
		}

		$position_relative 	= ( $position_relative == 1 ) ? $classes[] = 'position-relative' : '';
		$hongo_overflow_type= ( ! empty( $hongo_overflow_type ) ) ? $classes[] = $hongo_overflow_type : '';
		( $z_index || $z_index == '0') ? $style_array[] = 'z-index:'.$z_index.'; ' : '';

		// Background Image
		! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
		! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

		// Minimum Height Settings
		! empty( $desktop_height ) ? $style_array[] = "min-height: ".$desktop_height.";" : '';

		/* For Animation*/
		$initial_loading_animation = ( $initial_loading_animation && $initial_loading_animation != 'none' ) ? $classes[] = 'wow '.$initial_loading_animation.'' : '';
	         
		// Responsive CSS Box
		if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
            
            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

		// Class List
		$class_list = ! empty( $classes ) ? implode(" ", $classes) : '';
		if( ! empty( $class_list ) ) {
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $class_list ) ) . '"';
		}

		// Style Property List
		$style_property = ( $style_array ) ? implode( "", $style_array ) : '';
		if( ! empty( $style_property ) ) {
			$wrapper_attributes[] = 'style="' . esc_attr( trim( $style_property ) ) . '"';
		}

		// Overlay Style
		$hongo_overlay_opacity = ! empty( $hongo_overlay_opacity ) ? 'opacity:'.$hongo_overlay_opacity.';' : 'opacity:0;';
		$hongo_row_overlay_color_att = ( $hongo_row_overlay_color ) ? 'background-color:'.$hongo_row_overlay_color.';' : '';
		$hongo_z_index = ( $hongo_z_index || $hongo_z_index == '0' ) ? 'z-index:'.$hongo_z_index.';' : '';

		if( $hongo_overlay_opacity || $hongo_row_overlay_color_att || $hongo_z_index ){
			$overlay_style = ' style="'.$hongo_overlay_opacity.$hongo_row_overlay_color_att.$hongo_z_index.'"';
		}

		$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
			
			if( $show_overlay == '1' ) {
				$output .= '<div class="bg-extra-dark-gray hongo-overlay"'.$overlay_style.'></div>';
			}

	        $output .= hongo_remove_wpautop( $content, false );
	        
	    $output .= '</div>';

		return $output;
	}
}
add_shortcode( 'vc_row_inner', 'hongo_inner_row' );
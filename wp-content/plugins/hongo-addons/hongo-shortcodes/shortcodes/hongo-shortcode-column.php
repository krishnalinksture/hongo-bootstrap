<?php
/**
 * Shortcode For Column
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Column */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_column' ) ) {
	function hongo_column( $atts, $content = '' ) {

		extract( shortcode_atts( array(
	        'id' => '',
			'class' => '',
		    'css' => '',
	    	'hongo_enable_responsive_css' => '',
	    	'responsive_css' => '',

		    'fullscreen' => '',
			'position_relative' => '',
			'no_column_padding' => '',
			'hongo_overflow_type' => '',
		    'z_index' => '',

	        'hongo_bg_image_type' => '',
	        'desktop_bg_image_position' => '',
	        'desktop_height' => '',
	        
	        'show_overlay' => '',
	        'hongo_overlay_opacity' => '0.7',
	        'hongo_row_overlay_color' => '',
	        'hongo_z_index' => '',

	        'desktop_alignment' => '',
	        'desktop_mini_alignment' => '',
	        'ipad_alignment' => '',
	        'mobile_alignment' => '',

	        'desktop_display' => '',
	        'desktop_mini_display' => '',
	        'ipad_display' => '',
	        'mobile_display' => '',
	        'enable_clear_both' => '',
	        'desktop_clear_both' => '',
	        'desktop_mini_clear_both' => '',
	        'ipad_clear_both' => '',
	        'mobile_clear_both' => '',
	        'width' => '1/1',
	        'offset' => '',
	        'hongo_column_animation_style' => '',
	        'hongo_column_animation_delay' => '',
	        'hongo_column_animation_duration' => '',
		), $atts ) );

		// Visual Composer Font JS
		wp_enqueue_script( 'wpb_composer_front_js' );

		$width = ! empty( $width ) ? $width : '1/1';

		// Define Empty Variables.
		$output = $class_list = $bg_img_class_list = $style_property = $column_border_pos = $style_attr = $overlay_style = '';
		$classes = $bg_img_classes = $style_array = $clear_both = array();

		$classes = array(
			'wpb_column',
			'vc_column_container'
		);

		if ( vc_shortcode_custom_css_has_property( $css, array(
			'border',
			'background',
		) ) ) {
			$classes[] = 'vc_col-has-fill';
		}

		/* Filter for background image */
		$bg_image_url = apply_filters( 'hongo_shortcode_background_image_url', '', $css );
		if( ! empty( $bg_image_url ) ) {
			$style_array[] = "background-image:url( " . $bg_image_url . " ) !important;";
		}

		// Column Id and class
		$id = ( $id ) ? ' id="'.$id.'"' : '';
	    $class = ( $class ) ? $classes[] = $class : '';

		// Specify Column default class
		$fullscreen 	   	= ( $fullscreen == 1 ) ? $classes[] = 'full-screen' : '';
		$position_relative 	= ( $position_relative == 1 ) ? $classes[] = 'position-relative' : '';
		$no_column_padding  = ( $no_column_padding == 1 ) ? ' no-column-padding' : '';
		$hongo_overflow_type= ( $hongo_overflow_type ) ? $classes[] = $hongo_overflow_type : '';
		( $z_index || $z_index == '0') ? $style_array[] = 'z-index:'.$z_index.'; ' : '';

		// Background Image
		! empty( $hongo_bg_image_type ) ? $bg_img_classes[] = $hongo_bg_image_type : '';
		! empty( $desktop_bg_image_position ) ? $bg_img_classes[] = $desktop_bg_image_position : '';
		! empty( $desktop_height ) ? $style_array[] = "min-height: ".$desktop_height.";" : '';

		// Column Offset and sm width
		strchr( $offset, 'col-xs' ) ? '' : $classes[] = "col-xs-mobile-fullwidth";
		$width = wpb_translateColumnWidthToSpan( $width );
		$classes[] = $width = vc_column_offset_class_merge( $offset, $width );

		$desktop_clear_both = ! empty( $desktop_clear_both ) ? $classes[] = $desktop_clear_both : '';
		$desktop_mini_clear_both = ! empty( $desktop_mini_clear_both ) ? $classes[] = $desktop_mini_clear_both : '';
		$ipad_clear_both = ! empty( $ipad_clear_both ) ? $classes[] = $ipad_clear_both : '';
		$mobile_clear_both = ! empty( $mobile_clear_both ) ? $classes[] = $mobile_clear_both : '';

		// Column Animation
		$hongo_column_animation_style = ( $hongo_column_animation_style ) && $hongo_column_animation_style != 'none' ? $classes[] = 'wow '.$hongo_column_animation_style : '';
		$hongo_column_animation_delay = ( $hongo_column_animation_delay ) ? ' data-wow-delay= '.$hongo_column_animation_delay.'ms' : '';
		$hongo_column_animation_duration = ( $hongo_column_animation_duration ) ? ' data-wow-duration= '.$hongo_column_animation_duration.'ms' : '';

		// VC front editor
		$hongo_front_editor_class = '';
		$desktop_clear_both_vc = ! empty( $desktop_clear_both ) ? $clear_both[] = $desktop_clear_both : '';
		$desktop_mini_clear_both_vc = ! empty( $desktop_mini_clear_both ) ? $clear_both[] = $desktop_mini_clear_both : '';
		$ipad_clear_both_vc = ! empty( $ipad_clear_both ) ? $clear_both[] = $ipad_clear_both : '';
		$mobile_clear_both_vc = ! empty( $mobile_clear_both ) ? $clear_both[] = $mobile_clear_both : '';

		$clear_both_classes = ! empty( $clear_both ) ? implode(" ", $clear_both) : '';
		if( $clear_both_classes ) {
			$hongo_front_editor_class = ' data-clear-both="'.$clear_both_classes.'"';
		}

		// Column Allignment settings
		$desktop_alignment = ! empty( $desktop_alignment ) ? $classes[] = $desktop_alignment : '';
		$desktop_mini_alignment = ! empty( $desktop_mini_alignment ) ? $classes[] = $desktop_mini_alignment : '';
		$ipad_alignment = ! empty( $ipad_alignment ) ? $classes[] = $ipad_alignment : '';
		$mobile_alignment = ! empty( $mobile_alignment ) ? $classes[] = $mobile_alignment : '';

		// Column Display setting
	    $desktop_display = ! empty($desktop_display) ? $classes[] = $desktop_display : '';
	    $desktop_mini_display = ! empty($desktop_mini_display) ? $classes[] = $desktop_mini_display : '';
	    $ipad_display 	 = ! empty($ipad_display) ? $classes[] = $ipad_display : '';
	    $mobile_display  = ! empty($mobile_display) ? $classes[] = $mobile_display : '';

		// Responsive CSS Box
		$responsive_css_class = '';
		if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
			
			$responsive_css_class = ' ' . hongo_shortcode_custom_css_class( $responsive_css );
		}

		// Class List
		$class_list = ! empty( $classes ) ? implode( " ", $classes ) : '';
		$column_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

		// Background Image Class List
		$bg_img_class_list = ! empty( $bg_img_classes ) ? ' ' . implode( " ", $bg_img_classes ) : '';
		
		// Style Property List
		$style_property = ! empty( $style_array ) ? ' style="'.implode( " ", $style_array ).'"' : '';

	    // Overlay Style
	    $hongo_overlay_opacity = ! empty($hongo_overlay_opacity) ? 'opacity:'.$hongo_overlay_opacity.'; ' : 'opacity:0;';
	    $hongo_row_overlay_color_att = ($hongo_row_overlay_color) ? 'background-color:'.$hongo_row_overlay_color.'; ' : '';
	    $hongo_z_index = ( $hongo_z_index || $hongo_z_index == '0') ? 'z-index:'.$hongo_z_index.'; ' : '';

	    if( $hongo_overlay_opacity || $hongo_row_overlay_color_att || $hongo_z_index ){
	        $overlay_style = ' style="'.$hongo_overlay_opacity.$hongo_row_overlay_color_att.$hongo_z_index.'"';
	    }

		$output .= '<div'.$id.$column_class.$hongo_column_animation_delay.$hongo_column_animation_duration.$hongo_front_editor_class.'>';
			$output .= '<div class="vc_column-inner' . $bg_img_class_list . vc_shortcode_custom_css_class( $css, ' ' )  . $no_column_padding . $responsive_css_class . '"'.$style_property.'>';
				$output .= '<div class="wpb_wrapper">';
				
					if( $show_overlay == '1' ) {
						$output .= '<div class="bg-extra-dark-gray hongo-overlay hongo-column-overlay"'.$overlay_style.'></div>';
					}

					$output .= hongo_remove_wpautop( $content, false );
					
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
}
add_shortcode( 'vc_column', 'hongo_column' );
add_shortcode( 'vc_column_inner', 'hongo_column' );
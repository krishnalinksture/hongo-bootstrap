<?php
/**
 * Shortcode For Section Heading
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Section Heading */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_section_heading' ) ) {
	function hongo_section_heading( $atts, $content = null ) {

		global $hongo_featured_array, $heading;

		extract( shortcode_atts( array(
				'id' => '',
		        'class' => '',
	            'css' => '',
	            'hongo_enable_responsive_css' => '',
	            'responsive_css' => '',

	            'hongo_heading_type' => '',
	        	'hongo_heading' => '',
	        	'hongo_enable_separator_title' => '1',
	        	'title_heading_tag' => '',
	            'hongo_enable_link' => '',
	            'hongo_link_url' => '',
	            'hongo_link_target' => '',
	            'hongo_link_color' => '',
	            'hongo_separator_color' => '',
	            'hongo_separator_thickness' => '',
	            'hongo_enable_alternate_font' => '1',

	            'title_display_setting' => '',
	            'desktop_mini_display' => '',
	            'ipad_display' => '',
	            'mobile_display' => '',

	            'hongo_animation_style' => '',
	            'hongo_animation_delay' => '',
	            'hongo_animation_duration' => '',

	            'hongo_bg_image_type' => '',
	            'desktop_bg_image_position' => '',
	            'desktop_width' => '',
	            'hongo_font_title_setting'=>'',

	        ), $atts ) );

        $classes = array();
		$output = $style = $class_list = $style_attr = '';

        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

	    // Replace || to <br /> in title
	    $hongo_heading = ( $hongo_heading ) ? str_replace('||', '<br />',$hongo_heading) : '';

	    // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Responsive typography & alt font
        $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        ( $hongo_enable_alternate_font == 1 ) ? $classes[] = 'alt-font' : '';

        // Animation
		$hongo_animation_style = ( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $classes[] = 'wow '.$hongo_animation_style : '';
		$hongo_animation_delay_attr = ( $hongo_animation_delay ) ? ' data-wow-delay= '.$hongo_animation_delay.'ms' : '';
		$hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        // Title link & target
        $hongo_link_url      = ( $hongo_link_url ) ? $hongo_link_url : '';
        $hongo_link_target   = ( $hongo_link_target ) ? ' target="'.$hongo_link_target.'"' : '';

        // Title_display setting
        $title_display_setting = ( $title_display_setting ) ? $classes[] = $title_display_setting : '';
        $desktop_mini_display = ! empty( $desktop_mini_display ) ? $classes[] = $desktop_mini_display : '';
        $ipad_display    = ! empty( $ipad_display ) ? $classes[] = $ipad_display : '';
        $mobile_display  = ! empty( $mobile_display ) ? $classes[] = $mobile_display : '';

        // Unique Style Class
        $classes[] = $hongo_heading_type;

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        $heading = ! empty( $heading ) ? $heading : 0;
        $heading = $heading + 1;

        $classes[] = 'heading-'.$heading;

        $classes[] = 'hongo-section-heading';

        // Heading Tag
        $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

        //Width
        if( ! empty( $desktop_width ) ) {
        	$hongo_featured_array[] = '.'.$hongo_heading_type.'.heading-'.$heading.'{ width: '.$desktop_width.'; }';
        }

        // Link Color Style
        if( ! empty( $hongo_link_color ) ) {
            $hongo_featured_array[] = '.'.$hongo_heading_type.'.heading-'.$heading.' a:hover { color: '.$hongo_link_color.' !important; }';
        }

        if( ! empty( $hongo_separator_color ) ) {

        	$hongo_featured_array[] = '.heading-'.$heading.' span:before, .heading-'.$heading.' span:after { background-color : '.$hongo_separator_color.'; }';
        }

        if( ! empty( $hongo_separator_thickness ) ) {
        	$hongo_featured_array[] = '.heading-'.$heading.' span:before, .heading-'.$heading.' span:after { height : '.$hongo_separator_thickness.'; }';
        }

        // Class List
        $class_list     = ! empty( $classes ) ? implode(" ", $classes) : '';

		switch ($hongo_heading_type) {

			case 'heading-style-1':

				if( ($hongo_enable_link == 1) && ! empty( $hongo_link_url ) ) {

					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .= '<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_heading.'</a>';
					$output .= '</'.$title_heading_tag.'>';
				} else{
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>'.$hongo_heading.'</'.$title_heading_tag.'>';
				}

			break;

			case 'heading-style-2':

				if( ($hongo_enable_link == 1) && ! empty( $hongo_link_url ) ) {
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .='<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_heading.'</a>';
					$output .='</'.$title_heading_tag.'>';
				} else{
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>'.$hongo_heading.'</'.$title_heading_tag.'>';
				}

			break;

			case 'heading-style-3':

				if( ($hongo_enable_link == 1) && ! empty( $hongo_link_url ) ) {
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .= '<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_heading.'</a>';
					$output .= '</'.$title_heading_tag.'>';
				} else{
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>'.$hongo_heading.'</'.$title_heading_tag.'>';
				}

			break;

			case 'heading-style-4':

				if( $hongo_enable_separator_title == 1 ){
					$title = '<span>'. $hongo_heading .'</span>';
				} else{
					$title = $hongo_heading;
				}
				if( ($hongo_enable_link == 1) && ! empty( $hongo_link_url ) ) {
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .= '<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">'.$title.'</a>';
					$output .= '</'.$title_heading_tag.'>';
				} else{
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>'.$title.'</'.$title_heading_tag.'>';
				}

			break;

			case 'heading-style-5':

				if( ($hongo_enable_link == 1) && ! empty( $hongo_link_url ) ) {

					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .= '<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'"><span class="'.esc_attr( $font_setting_class_title ).'">'.$hongo_heading.'</span></a>';
					$output .= '</'.$title_heading_tag.'>';
				} else{
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'><span>'.$hongo_heading.'</span></'.$title_heading_tag.'>';
				}

			break;

			case 'heading-style-6':

				if( $hongo_enable_separator_title == 1 ){
					$title = '<span>'. $hongo_heading .'</span>';
				} else{
					$title = $hongo_heading;
				}
				if( ( $hongo_enable_link == 1 ) && ! empty( $hongo_link_url ) ) {
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						$output .= '<a class="heading-title-link'.esc_attr( $font_setting_class_title ).'" '.$hongo_link_target.' href="'.esc_url( $hongo_link_url ).'">'.$title.'</a>';
					$output .= '</'.$title_heading_tag.'>';
				} else {
					$output .='<'.$title_heading_tag.$id.' class="'.esc_attr( $class_list ).esc_attr( $font_setting_class_title ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>'.$title.'</'.$title_heading_tag.'>';
				}

			break;
		}

	    return $output;
	}
}
add_shortcode( 'hongo_section_heading', 'hongo_section_heading' );
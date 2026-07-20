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

if ( ! function_exists( 'hongo_row' ) ) {
	function hongo_row( $atts, $content = null ) {

		global $hongo_row_scroll_down, $hongo_featured_array;
		
		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'css' => '',
	    	'hongo_enable_responsive_css' => '',
	    	'responsive_css' => '',
	        'initial_loading_animation' => '',

	        'full_width' => '',
	        'gap' => '0',
	        'full_height' => '',
	        'columns_placement' => 'middle',
	        'equal_height' => '',
	        'content_placement' => '',
	        'parallax' => '',
	        'parallax_ratio_bg' => '0.5',

	        'video_bg' => '',
	        'hongo_video_type' => '',
	        'vimeo_bg_url' => 'https://player.vimeo.com/video/75976293',
	        'youtube_bg_url' => 'https://www.youtube.com/watch?v=sU3FkzUKHXU',
	        'video_bg_parallax' => '',
	        'parallax_image' => '',
	        'parallax_speed_video' => '1.5',

            'hongo_background_video_image' => '',
            'hongo_background_mp4_video' => '',
            'hongo_background_ogg_video' => '',
            'hongo_background_webm_video' => '',
            'hongo_enable_loop' => '1',

	        'disable_element' => '',
	        'position_relative' => '',
	        'hongo_overflow_type' => '',
	        'z_index' => '',
            'hongo_enable_menu_top_space' => '',
            'full_width_header_sticky' => '',
            'footer_style' => 'middle',

	        'hongo_bg_image_type' => '',
	        'desktop_bg_image_position' => '',
	        'desktop_height' => '',

	        'show_overlay' => '',
	        'hongo_overlay_opacity' => '0.7',
	        'hongo_row_overlay_color' => '',	        
	        'hongo_z_index' => '',

	        'show_down_section' => '',
	        'hongo_down_section_target_id' => '',
	        'hongo_down_section_animation' => '',
	        'hongo_down_section_custom_icon' => '',
	        'hongo_down_section_custom_icon_image' => '',
	        'hongo_down_section_icon_list' => '',
	        'hongo_down_section_icon_color' => '',
	        'hongo_down_section_icon_bg_color' => '',
	        'hongo_down_section_hover_icon_color' => '',
	        'hongo_down_section_icon_hover_bg_color' => '',

	    ), $atts ) );

		// Visual Composer Font JS
		wp_enqueue_script( 'wpb_composer_front_js' );

		// Wrapper Class Container Setting
		$wrapper_container_style = '';
		if( is_singular( 'post' ) ) {
			$wrapper_container_style = hongo_option('hongo_single_post_container_style', 'container');
		} elseif( is_page() ) {
			$wrapper_container_style = hongo_option('hongo_page_container_style', 'container');
		} elseif( hongo_is_woocommerce_activated() && is_product() ) {
			$wrapper_container_style = hongo_option('hongo_single_product_container_style', 'container');
		} 

		$output = $after_output = $overlay_style = $parallax_image_src = '';
		$classes = $hongo_row_classes = $style_array = $wrapper_attributes = array();

		if ( ! empty( $id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $id ) . '"';
		}

		$classes = array(
			'vc_row',
			'wpb_row',
			//deprecated
			'vc_row-fluid',
			$class,
			vc_shortcode_custom_css_class( $css ),
		);

		/* Filter for background image */
		$bg_image_url = apply_filters( 'hongo_shortcode_background_image_url', '', $css );
		if( ! empty( $bg_image_url ) ) {
			$style_array[] = "background-image:url( " . $bg_image_url . " ) !important;";
		}

		/* Hongo section footer builder class */
		$classes[] = apply_filters( 'hongo_row_extra_class', '', $footer_style, $classes );

		/* Hongo section header builder class */
		$classes[] = $full_width_header_sticky == '1' ? 'full-with-on-sticky' : '';

		$position_relative 	= ($position_relative == 1) ? $classes[] = 'position-relative' : '';
		$hongo_overflow_type	= ! empty( $hongo_overflow_type ) ? $classes[] = $hongo_overflow_type : '';
		( $z_index || $z_index == '0') ? $style_array[] = 'z-index:'.$z_index.'; ' : '';
        $hongo_enable_menu_top_space = $hongo_enable_menu_top_space == 1 ? $classes[] = 'top-space' : '';

        if ( empty( $parallax ) ) {    // Background Video Parralax

			// Background Image
			! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
			! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
		}

		// Minimum Height Settings
		if( ! empty( $desktop_height ) ) {

			$classes[] = 'hongo-row-min-height';
			$style_array[] = "min-height: ".$desktop_height.";";
		}

		/* For Animation*/
		$initial_loading_animation = ( $initial_loading_animation && $initial_loading_animation != 'none' ) ? $classes[] = 'wow '.$initial_loading_animation : '';

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
			) ) || $video_bg || $parallax
		) {
			$classes[] = 'vc_row-has-fill';
		}

		if ( ! empty( $atts['gap'] ) ) {
			$classes[] = 'vc_column-gap-' . $atts['gap'];
		}

		if ( ! empty( $full_width ) ) {
			// Wrapper Class is container-fluid
			if( $wrapper_container_style == 'container-fluid' && $full_width == 'container' ) {
				$classes[] = 'vc_row-container-and-fluid';
			} else {
				$wrapper_attributes[] = 'data-vc-full-width="true"';
				$wrapper_attributes[] = 'data-vc-full-width-init="false"';
				$classes[] = 'hongo-stretch-content';/* For Stretch Effect */
				if ( 'stretch_row_content' === $full_width ) {
					$wrapper_attributes[] = 'data-vc-stretch-content="true"';
					$classes[] = 'hongo-stretch-content-fluid';
				} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
					$wrapper_attributes[] = 'data-vc-stretch-content="true"';
					$classes[] = 'vc_row-no-padding hongo-stretch-content-fluid';
				} else {
					$classes[] = 'hongo-stretch-row-container';
				}
			}
			$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
		}

		if ( ! empty( $full_height ) ) {
			$classes[] = 'vc_row-o-full-height';
			$hongo_row_classes[] = 'vc_row-o-full-height';
			if ( ! empty( $columns_placement ) ) {
				$flex_row = true;
				$classes[] = 'vc_row-o-columns-' . $columns_placement;
				if ( 'stretch' === $columns_placement ) {
					$classes[] = 'vc_row-o-equal-height';
				}
			}
		}

		if ( ! empty( $equal_height ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-equal-height';
			$hongo_row_classes[] = 'vc_row vc_row-o-equal-height'; // Custom hongo row equal height
		}

		if ( ! empty( $content_placement ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-content-' . $content_placement;
			$hongo_row_classes[] = 'vc_row-o-content-' . $content_placement;
		}

		if ( ! empty( $flex_row ) ) {
			$classes[] = 'vc_row-flex';
			$hongo_row_classes[] = 'vc_row-flex';
		}

		if( ! empty( $video_bg ) ) {
			$classes[] = 'hongo-video-wrapper';
		}
		$has_video_bg = ( ! empty( $video_bg ) && ( $hongo_video_type == 'youtube' ) && ! empty( $youtube_bg_url ) && vc_extract_youtube_id( $youtube_bg_url ) );
		
        // YouTube Background Video
		$parallax_speed = $parallax_speed_video;  // parallax_speed_bg
		if ( $has_video_bg ) { // Background Video Parralax

			wp_register_script( 'vc_youtube_iframe_api_js', '//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );

			$parallax = $video_bg_parallax;
			$parallax_speed = $parallax_speed_video;
			$parallax_image = $youtube_bg_url;
			$classes[] = 'vc_video-bg-container';
			wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		}

		if ( ! empty( $parallax ) && $has_video_bg ) {    // Background Video Parralax
			wp_enqueue_script( 'vc_jquery_skrollr_js' );
			$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
			$classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
			if ( false !== strpos( $parallax, 'fade' ) ) {
				$classes[] = 'js-vc_parallax-o-fade';
				$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
			} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
				$classes[] = 'js-vc_parallax-o-fixed';
			}
		}
		if ( ! empty( $parallax ) && !$has_video_bg ) { // Background Image Parralax
			$classes[] = 'parallax';
			$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_ratio_bg ) . '"';
		}

		if ( ! empty( $parallax_image ) ) { // Background Video Parralax
			if ( $has_video_bg ) {

				$parallax_image_src = $parallax_image;

				$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';

			} else {
				$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
				$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
				if ( ! empty( $parallax_image_src[0] ) ) {
					$parallax_image_src = $parallax_image_src[0];
				}
			}
		}

		if ( ! $parallax && $has_video_bg ) { // Background Video Parralax
			$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $youtube_bg_url ) . '"';
		}

		// Responsive CSS Box
		if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
            
            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

		// Class List
		$class_list = ! empty( $classes ) ? implode(" ", $classes) : '';
		if( ! empty( $class_list ) ) {
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $class_list ) ) . '"';
		}
		$hongo_row_class_list = ! empty( $hongo_row_classes ) ? ' ' . implode( " ", $hongo_row_classes ) : '';

		// Style Property List
		$style_property = ( $style_array ) ? implode( "", $style_array ) : '';
		if( ! empty( $style_property ) ) {
			$wrapper_attributes[] = 'style="' . esc_attr( trim( $style_property ) ) . '"';
		}

		// Overlay Style
		$hongo_overlay_opacity = ! empty($hongo_overlay_opacity) ? 'opacity:'.$hongo_overlay_opacity.'; ' : 'opacity:0;';

		$hongo_row_overlay_color_att = ! empty( $hongo_row_overlay_color ) ? 'background: '.$hongo_row_overlay_color.';' : '';
		$hongo_z_index = ( $hongo_z_index || $hongo_z_index == '0') ? 'z-index:'.$hongo_z_index.'; ' : '';

		if( $hongo_overlay_opacity || $hongo_row_overlay_color_att || $hongo_z_index ){
			$overlay_style = ' style="'.$hongo_overlay_opacity.$hongo_row_overlay_color_att.$hongo_z_index.'"';
		}

		$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

			if( $show_overlay == '1' ) {
				$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
			}

			// Wrapper Class is container-fluid and Section full width is container or default
			if( $wrapper_container_style == 'container-fluid' && ( $full_width == 'container' ) ) { // || $full_width == ''
				if( $full_width == 'container' ) { // section is container
					$output .= '<div class="'.$full_width.'">';
				}
				$output .= '<div class="row'.$hongo_row_class_list.'">';
			}

		        $output .= hongo_remove_wpautop( $content, false );

			// Wrapper Class is container-fluid and Section full width is container or default
			if( $wrapper_container_style == 'container-fluid' && ( $full_width == 'container' ) ) { // || $full_width == ''
						$output .= '</div>';
				if( $full_width == 'container' ) { // section is container
					$output .= '</div>';
				}
			}

			// Scroll to down section settings
	        
	        $hongo_row_scroll_down = ! empty( $hongo_row_scroll_down ) ? $hongo_row_scroll_down : 0;
            $hongo_row_scroll_down = $hongo_row_scroll_down + 1;

	        $hongo_down_section_animation = ( $hongo_down_section_animation == 1 ) ? ' up-down-animation' : '';
	        $icon_style = '';

	        // Scroll down icon settings
            if ( $hongo_down_section_icon_color ) {
                $hongo_featured_array[] = '.scroll-down-'.$hongo_row_scroll_down.' i { color: '.$hongo_down_section_icon_color.' }';
            }
            if ( $hongo_down_section_icon_bg_color ) {
                $hongo_featured_array[] = '.scroll-down-'.$hongo_row_scroll_down.' a { background-color: '.$hongo_down_section_icon_bg_color.';
                border-color: '.$hongo_down_section_icon_bg_color.'; }';
            }

            if ( $hongo_down_section_hover_icon_color ) {
                $hongo_featured_array[] = '.scroll-down-'.$hongo_row_scroll_down.' a:hover i { color: '.$hongo_down_section_hover_icon_color.' }';
            }
            if ( $hongo_down_section_icon_hover_bg_color ) {
                $hongo_featured_array[] = '.scroll-down-'.$hongo_row_scroll_down.' a:hover { background-color: '.$hongo_down_section_icon_hover_bg_color.';
                border-color: '.$hongo_down_section_icon_hover_bg_color.'; }';
            }

	        if ( $show_down_section =='1' ) {

				$hongo_down_section_icon_list = ! empty( $hongo_down_section_icon_list ) ? ' '.$hongo_down_section_icon_list : ' ti-arrow-down';

				$output .= '<div class="down-section text-center down-section-style-1 scroll-down-'.$hongo_row_scroll_down.'">';
                    $output .= '<a href="#'.$hongo_down_section_target_id.'" class="down-section-link'.$hongo_down_section_animation.'">';
                    	if( $hongo_down_section_custom_icon == 1 && ! empty( $hongo_down_section_custom_icon_image ) ) {
						    $output .= hongo_get_image_html( $hongo_down_section_custom_icon_image, 'full', 'icon-image' );
						} elseif( $hongo_down_section_icon_list ) {
						    $output .= '<i class="icon-extra-small'.esc_attr( $hongo_down_section_icon_list ).'"></i>';
						}
                    $output .= '</a>';
                $output .= '</div>';
			}

            // HTML5 Background Video
	        if( ! empty( $video_bg ) && empty( $hongo_video_type ) && ( $hongo_background_mp4_video || $hongo_background_ogg_video || $hongo_background_webm_video ) ) {

				$image_url = ! empty( $hongo_background_video_image ) ? wp_get_attachment_url( $hongo_background_video_image ) : '';

		        $hongo_enable_loop = ( $hongo_enable_loop == 1 ) ? ' loop' : '';
		        
                $output .= '<video'.$hongo_enable_loop.' muted autoplay playsinline class="html-video" poster="'.$parallax_image_src.'">';
                    if( $hongo_background_mp4_video ) {
                        $output .= '<source type="video/mp4" src="'.esc_url( $hongo_background_mp4_video ).'">';
                    }
                    if( $hongo_background_ogg_video ) {
                        $output .= '<source type="video/ogg" src="'.esc_url( $hongo_background_ogg_video ).'">';
                    }
                    if( $hongo_background_webm_video ) {
                        $output .= '<source type="video/webm" src="'.esc_url( $hongo_background_webm_video ).'">';
                    }
                $output .= '</video>';
            }

            // Vimeo Background Video
	        if( ! empty( $video_bg ) && $hongo_video_type == 'vimeo' && ! empty( $vimeo_bg_url ) ) {

	        	$vimeo_bg_url = add_query_arg( array( 'transparent' => '0', 'autoplay' => '1' ), $vimeo_bg_url );

	            $output .= '<div class="hongo-vimeo-bg-video fit-videos">';
	    		  	$output .='<iframe class="vimeo-background-video" src="' . esc_url( $vimeo_bg_url ) . '" allow="autoplay"></iframe>'; // '.$width.$height.'
	            $output .= '</div>';
	        }

	    $output .= '</section>';
		$output .= $after_output;

		return $output;
	}
}
add_shortcode( 'vc_row', 'hongo_row' );
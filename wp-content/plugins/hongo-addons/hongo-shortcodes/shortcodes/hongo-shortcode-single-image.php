<?php
/**
 * Shortcode For Single Image
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Single Image */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_single_image' ) ) {
	function hongo_single_image( $atts, $content = null ) {
		
		global $hongo_responsive_style;

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'css' => '',
	    	'hongo_enable_responsive_css' => '',
	    	'responsive_css' => '',
	        'initial_loading_animation' => '',
	        'hongo_animation_duration' => '',
	        'hongo_animation_delay' => '',

	        'title' => '',
			'source' => 'media_library',
			'image' => '',

			'enable_full_width' => '1',
			'enable_ratina_logo' => '0',
			'ratina_image' => '',
			'custom_src' => '',
			'onclick' => '',
			'img_size' => 'thumbnail',
			'external_img_size' => '',
			'caption' => '',
			'add_caption' => '',
			'img_link_large' => '',
			'link' => '',
			'img_link_target' => '',
			'alignment' => '',
			'style' => '',
			'external_style' => '',
			'border_color' => '',
			'external_border_color' => '',

			'hongo_font_title_setting' => '',
			'additional_font_title' => '',

			'hongo_bg_image_type' => '',
			'desktop_bg_image_position' => '',

	    ), $atts ) );

		$default_src = vc_asset_url( 'vc/no_image.png' );

		// backward compatibility. since 4.6
		if ( empty( $onclick ) && isset( $img_link_large ) && 'yes' === $img_link_large ) {
			$onclick = 'img_link_large';
		} elseif ( empty( $atts['onclick'] ) && ( ! isset( $atts['img_link_large'] ) || 'yes' !== $atts['img_link_large'] ) ) {
			$onclick = 'custom_link';
		}

		if ( 'external_link' === $source ) {
			$style = $external_style;
			$border_color = $external_border_color;
		}

		$classes = $wrapper_attributes = array();

		$border_color = ( '' !== $border_color ) ? ' vc_box_border_' . $border_color : '';

		$img = false;

		// Responsive typography & alt font
	    $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
	    ( $additional_font_title == '1' ) ? $font_setting_class_title .=' alt-font' : '';

		switch ( $source ) {
			case 'media_library':
			case 'featured_image':
				if ( 'featured_image' === $source ) {
					$post_id = get_the_ID();
					if ( $post_id && has_post_thumbnail( $post_id ) ) {
						$img_id = get_post_thumbnail_id( $post_id );
					} else {
						$img_id = 0;
					}
				} else {
					$img_id = preg_replace( '/[^\d]/', '', $image );
				}

				// set rectangular
				if ( preg_match( '/_circle_2$/', $style ) ) {
					$style = preg_replace( '/_circle_2$/', '_circle', $style );
					$img_size = hongogetImageSquareSize( $img_id, $img_size );
				}

				if ( ! $img_size ) {
					$img_size = 'medium';
				}

				// Ratina Logo
				if( $enable_ratina_logo == 1 ) {
					$ratina_image_id = preg_replace( '/[^\d]/', '', $ratina_image );

					$hongo_image_main = ! empty( $img_id ) ? wp_get_attachment_image_url( $img_id, $img_size ) : '';
				
					if( $hongo_image_main ) {
						
						$hongo_image_ratina = ! empty( $ratina_image_id ) ? wp_get_attachment_image_url( $ratina_image_id, $img_size ) : '';

						$rtj = ( $hongo_image_ratina ) ? ' data-rjs="'.esc_url( $hongo_image_ratina ).'"' : '';

						$img = array(
							'thumbnail' => '<img class="vc_single_image-img" src="' . esc_url( $hongo_image_main ) . '" alt=""'.$rtj.' />',
						);
					}

				} else {
					$img = wpb_getImageBySize( array(
						'attach_id' => $img_id,
						'thumb_size' => $img_size,
						'class' => 'vc_single_image-img',
					) );
				}

				// don't show placeholder in public version if post doesn't have featured image
				if ( 'featured_image' === $source ) {
					if ( ! $img && 'page' === vc_manager()->mode() ) {
						return;
					}
				}
				break;

			case 'external_link':
				$dimensions = hongo_vc_extract_dimensions( $external_img_size );
				$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

				$custom_src = $custom_src ? $custom_src : $default_src;

				$img = array(
					'thumbnail' => '<img class="vc_single_image-img" ' . $hwstring . ' src="' . esc_url( $custom_src ) . '" />',
				);
				break;

			default:
				$img = false;
		}

		if ( ! $img ) {
			$img = array();
			$img['thumbnail'] = '<img class="vc_img-placeholder vc_single_image-img" src="' . esc_url( $default_src ) . '" />';
		}

		$el_class = '';

		// backward compatibility
		if ( vc_has_class( 'prettyphoto', $el_class ) ) {
			$onclick = 'link_image';
		}

		// backward compatibility. will be removed in 4.7+
		if ( ! empty( $atts['img_link'] ) ) {
			$link = $atts['img_link'];
			if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link ) ) {
				$link = 'http://' . $link;
			}
		}

		// backward compatibility
		if ( in_array( $link, array(
			'none',
			'link_no',
		), true ) ) {
			$link = '';
		}

		$a_attrs = array();

		switch ( $onclick ) {
			case 'img_link_large':
				if ( 'external_link' === $source ) {
					$link = $custom_src;
				} else {
					$link = wp_get_attachment_image_src( $img_id, 'large' );
					$link = $link[0];
				}

				break;

			case 'link_image':
				wp_enqueue_script( 'prettyphoto' );
				wp_enqueue_style( 'prettyphoto' );

				$a_attrs['class'] = 'prettyphoto';
				$a_attrs['data-rel'] = 'prettyPhoto[rel-' . get_the_ID() . '-' . wp_rand() . ']';

				// backward compatibility
				if ( ! vc_has_class( 'prettyphoto', $el_class ) && 'external_link' === $source ) {
					$link = $custom_src;
				} elseif ( ! vc_has_class( 'prettyphoto', $el_class ) ) {
					$link = wp_get_attachment_image_src( $img_id, 'large' );
					$link = $link[0];
				}

				break;

			case 'custom_link':
				// $link is already defined
				break;

			case 'zoom':
				wp_register_script( 'vc_image_zoom', vc_asset_url( 'lib/vc_image_zoom/vc_image_zoom.min.js' ), array(
					'jquery',
					'zoom',
				), WPB_VC_VERSION, true );
				
				wp_enqueue_script( 'vc_image_zoom' );

				if ( 'external_link' === $source ) {
					$large_img_src = $custom_src;
				} else {
					$large_img_src = wp_get_attachment_image_src( $img_id, 'large' );
					if ( $large_img_src ) {
						$large_img_src = $large_img_src[0];
					}
				}

				$img['thumbnail'] = str_replace( '<img ', '<img data-vc-zoom="' . $large_img_src . '" ', $img['thumbnail'] );
				break;
		}

		// backward compatibility
		if ( vc_has_class( 'prettyphoto', $el_class ) ) {
			$el_class = vc_remove_class( 'prettyphoto', $el_class );
		}

		$wrapperClass = 'vc_single_image-wrapper ' . $style . ' ' . $border_color;

		if ( $link ) {
			$a_attrs['href'] = $link;
			if ( $img_link_target ) {
				$a_attrs['target'] = $img_link_target;
			}
			if ( ! empty( $a_attrs['class'] ) ) {
				$wrapperClass .= ' ' . $a_attrs['class'];
				unset( $a_attrs['class'] );
			}
			$html = '<a ' . vc_stringify_attributes( $a_attrs ) . ' class="' . $wrapperClass . '">' . $img['thumbnail'] . '</a>';
		} else {
			$html = '<div class="' . $wrapperClass . '">' . $img['thumbnail'] . '</div>';
		}

		$class_alignment = ! empty( $alignment ) ? 'vc_align_' . $alignment : '';
		// Responsive CSS Box

		$classes = array(
			'wpb_single_image',
			$class_alignment,
			$class,
			vc_shortcode_custom_css_class( $css ),
		);

		if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // For Full Width
        ( $enable_full_width == '1' ) ? $classes[] = 'hongo-full-width-single-image' : '';

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

		/* For Animation*/
		( $initial_loading_animation ) ? $classes[] = 'wow '.$initial_loading_animation : '';

		( $hongo_animation_delay ) ? $wrapper_attributes[] = 'data-wow-delay="'.$hongo_animation_delay.'ms'.'"' : '';
		( $hongo_animation_duration ) ? $wrapper_attributes[] = 'data-wow-duration="'.$hongo_animation_duration.'ms'.'"' : '';		
		
		if ( in_array( $source, array( 'media_library', 'featured_image' ), true ) && 'yes' === $add_caption ) {
			$img_id = apply_filters( 'wpml_object_id', $img_id, 'attachment' );
			$post = get_post( $img_id );
			$caption = $post->post_excerpt;
		} else {
			if ( 'external_link' === $source ) {
				$add_caption = 'yes';
			}
		}

		if ( 'yes' === $add_caption && '' !== $caption ) {
			$html .= '<figcaption class="vc_figure-caption">' . esc_html( $caption ) . '</figcaption>';
		}
		
		if ( ! empty( $id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $id ) . '"';
		}

		// Class List
		$class_list = ! empty( $classes ) ? implode( ' ', $classes ) : '';
		if( ! empty( $class_list ) ) {
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $class_list ) ) . '"';
		}

		$output = '<div ' . implode( ' ', $wrapper_attributes ) . '>
			<figure class="wpb_wrapper vc_figure">
				' . $html . '
			</figure>
			' . wpb_widget_title( array(
					'title' => $title,
					'extraclass' => 'wpb_singleimage_heading'.$font_setting_class_title,
			) ) . '
		</div>';

		return $output;
	}
}
add_shortcode( 'vc_single_image', 'hongo_single_image' );
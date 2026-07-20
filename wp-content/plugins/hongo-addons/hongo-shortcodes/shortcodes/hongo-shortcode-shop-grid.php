<?php
/**
 * Shortcode For Shop Grid
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Shop Grid */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_shop_grid_shortcode' ) ) {
	function hongo_shop_grid_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',

            'hongo_column' => '4',
            'hongo_gutter_type' => 'gutter-medium',
            'hongo_show_metro' => '',
            'title_heading_tag' => '',
            'hongo_enable_alternate_font' => '1',
        	'hongo_double_grid_position' => '',
        	'hongo_column_animation_style' => '',
        	'hongo_animation_delay' => '',
        	'hongo_animation_duration' => '',

            'hongo_shop_grid_slides' => '',
            'font_setting_class_title' => '',
            'hongo_button_style' => '',
            'hongo_button_type' => '',
            'hongo_responsive_button' => '',
	    ), $atts ) );

        $output = $hongo_button_style_class = $hongo_button_class = '';
		$classes = array();

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        // For button style
        if( ! empty( $hongo_button_style ) ) {

            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
        }

        // For button type
        if( ! empty( $hongo_button_type ) ) {

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

        // Responsive typography & alt font
        $font_setting_class_title  = ! empty( $font_setting_class_title ) ? hongo_shortcode_custom_css_class( $font_setting_class_title ) : '';
        ( $hongo_enable_alternate_font == 1 ) ? $font_setting_class_title .= ' alt-font' : '';
		$button_setting_class = ! empty( $hongo_responsive_button ) ? hongo_shortcode_custom_css_class( $hongo_responsive_button ): '';

		// Column Animation 
		$hongo_column_animation_style = ( $hongo_column_animation_style ) && $hongo_column_animation_style != 'none' ? ' wow '.$hongo_column_animation_style : '';
		$hongo_animation_delay = ( $hongo_animation_delay ) ? $hongo_animation_delay : '0';
		$hongo_animation_duration = ( $hongo_animation_duration ) ? $hongo_animation_duration : '0';

		// Column Class 
        ! empty( $hongo_column ) ? $classes[] = 'work-'.$hongo_column.'col' : '';
        ! empty( $hongo_gutter_type ) ? $classes[] = $hongo_gutter_type : '';

        // Metro grid (item-double)
        ( $hongo_show_metro == 1 ) ? $classes[] = 'metro-grid' : '';
        $double_grid_position = $hongo_show_metro == 1 && ! empty( $hongo_double_grid_position ) ? explode( ',', $hongo_double_grid_position ) : array();

		// Class List 
		$class_list = ! empty( $classes ) ? ' ' . implode( " ", $classes ) : '';

		if( ! empty( $hongo_shop_grid_slides ) ) {

			$hongo_shop_grid_slides = json_decode( urldecode( $hongo_shop_grid_slides ) );

            $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn-link alt-font';
            $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

			$output .='<ul '.$id.' class="hongo-shop-grid'.esc_attr( $class_list ).'">';
				$output .='<li class="hongo-grid-sizer"></li>';

				$i = 0;
				
				if( ! empty( $hongo_shop_grid_slides ) ) {

					foreach( $hongo_shop_grid_slides as $key => $slide ) {

						$i++;

						// Grid Layout Class
	                	$grid_array = array();
	                	$hongo_button_link_style = '';
	                    if( ! empty( $double_grid_position[$key] ) && ( $double_grid_position[$key] == '2-1' || $double_grid_position[$key] == '2-2' ) ) {
	                    	$grid_array[] = 'grid-item-double';
	                    }

	                    if( ! empty( $double_grid_position[$key] ) && trim( $double_grid_position[$key] ) != '*' ) {
	                    	$grid_array[] = 'grid-item-' . $double_grid_position[$key];
	                    } else {
	                        $grid_array[] = 'grid-item-1-1';
	                    }

	                    $grid_class = ! empty( $grid_array ) ? ' '. implode( ' ', $grid_array ) : '';

						// Overlay Style
						$hongo_overlay_opacity = ! empty( $slide->hongo_overlay_opacity ) ? 'opacity:'.$slide->hongo_overlay_opacity.'; ' : 'opacity:0;';
						$overlay_color = ! empty( $slide->overlay_color ) ? 'background-color:'.$slide->overlay_color.'; ' : '';
						$hongo_z_index = isset( $slide->hongo_z_index ) ? 'z-index:' . $slide->hongo_z_index . '; ' : '';

				        if( $hongo_overlay_opacity || $overlay_color || $hongo_z_index ) {
							$overlay_style = ' style="'.$hongo_overlay_opacity.$overlay_color.$hongo_z_index.'"';
						}

						$hongo_show_overlay = ! empty( $slide->hongo_show_overlay ) ? $slide->hongo_show_overlay : '0';

	        			// Image 
	                    $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';
	                    $thumb = ( ! empty( $slide->hongo_image ) && $hongo_image_srcset ) ? wp_get_attachment_image_src( $slide->hongo_image, $hongo_image_srcset ) : array();

	        			// get Image srcset
		                $srcset_data = ! empty( $slide->hongo_image ) ? hongo_get_image_srcset_sizes( $slide->hongo_image, $hongo_image_srcset ) : '';

					    // Image link 
					    $hongo_show_image_link = ! empty( $slide->hongo_show_image_link ) ? $slide->hongo_show_image_link : '0';

					    // Title
					    $hongo_image_title = ! empty( $slide->hongo_image_title ) ? str_replace('||', '<br />',$slide->hongo_image_title) : '';

					    // Title Heading Tag
	        			$title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

	            		$shop_button_style = ! empty( $slide->hongo_image_button_link ) ? $slide->hongo_image_button_link : '';
	            		// Button 
			            $hongo_button_parse_args_style = ! empty( $shop_button_style ) ? vc_parse_multi_attribute( $shop_button_style ) : array();
			            $hongo_button_link_style = isset( $hongo_button_parse_args_style['url'] ) ? $hongo_button_parse_args_style['url'] : '#';
			            $hongo_button_title_style = isset( $hongo_button_parse_args_style['title'] ) ? $hongo_button_parse_args_style['title'] : '';
			            $hongo_button_target_style = isset( $hongo_button_parse_args_style['target'] ) ? trim( $hongo_button_parse_args_style['target'] ) : '_self';

	            		$hongo_show_text_detail_horizontal = ! empty( $slide->hongo_show_text_detail_horizontal ) ? $slide->hongo_show_text_detail_horizontal : 'left';
	            		$hongo_show_text_detail_vertical = ! empty( $slide->hongo_show_text_detail_vertical ) ? $slide->hongo_show_text_detail_vertical : 'top';

	            		// Animation delay
						$hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
						$hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) && ( $i > 0 ) ? ' data-wow-duration="' . ( $hongo_animation_duration * $i ) . 'ms"' : '';


	            		if( ! empty( $slide->hongo_image ) || ! empty( $slide->hongo_image_title ) || ! empty( $slide->hongo_image_button_link ) ) {
							$output .='<li class="hongo-grid-item'.esc_attr( $hongo_column_animation_style ).esc_attr( $grid_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
				        		$output .= '<div class="hongo-shop-grid-wrap">';
					        		$output .= '<div class="hongo-shop-grid-img">';
					        			if( $hongo_show_overlay == 1 ){
											$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
					        			}

			                        	if( $hongo_show_image_link == 1 ) {
			                        		$output .= '<a href="'.esc_url( $hongo_button_link_style ).'" target="'.$hongo_button_target_style.'">';
			                        	}
			                        		if( ! empty( $slide->hongo_image ) ) {
			                        			$output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset, 'shop-grid-img-gallery' );
			                        		}
			                        	if( $hongo_show_image_link == 1 ) {
			                        		$output .= '</a>';
			                        	}
			                        $output .= '</div>';
			                        if( $hongo_show_image_link == 0 ) {
			                        	$show_text_details = ' hongo-shop-grid-'.$hongo_show_text_detail_horizontal.'-'.$hongo_show_text_detail_vertical;
			                        	$output .= '<div class="hongo-shop-grid-details'.esc_attr( $show_text_details ).'">';
			                        		if( ! empty( $slide->hongo_image_title ) ) {
			                        			$output .= '<'.$title_heading_tag.' class ="title'.esc_attr( $font_setting_class_title ).'">'. $hongo_image_title .'</'.$title_heading_tag.'>';
			                        		}
			                        		if( ! empty( $slide->hongo_image_button_link ) ) {
		            							$output .= ! empty( $hongo_button_parse_args_style ) ? '<a class="'.trim( $button_setting_class ).'" href="'.esc_url( $hongo_button_link_style ).'" target="'.$hongo_button_target_style.'">'.$hongo_button_title_style.'</a>' : '';
		            						}
			                        	$output .= '</div>';
			                        }
			                    $output .= '</div>';
		                    $output .='</li>';
		                }
				    }
				}
	        $output .='</ul>';
		}
		return $output;
	}
}
add_shortcode( 'hongo_shop_grid', 'hongo_shop_grid_shortcode' );
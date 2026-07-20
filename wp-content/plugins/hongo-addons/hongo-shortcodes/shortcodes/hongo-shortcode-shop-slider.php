<?php
/**
 * Shortcode For Shop Slider
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Shop Slider */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_shop_slider_shortcode' ) ) {
	function hongo_shop_slider_shortcode( $atts ) {
		global $hongo_slider_unique_id, $hongo_slider_script, $hongo_featured_array, $social_icon;
		extract( shortcode_atts( array(
				'hongo_slider_id'         => '',
				'hongo_social_id'         => '',
				'hongo_slider_class'	  => '',
				'hongo_social_sorting'	  => '',
				'hongo_shop_slider_slide' => '',
				'hongo_slider_style'	  => '',
				'additional_font_title'   => '0',
				'additional_font_subtitle' => '0',
				'hongo_regular_price'     => '',
				'hongo_sale_price'        => '',
				'slider_content_position' => '',
				'slide_direction'         => 'horizontal',
				'mousewheel_control'	  => '1',
				'hongo_show_navigation'   => '1',
				'show_navigation_style'   => 'next-prev-arrow',
				'hongo_navigation_color'  => '',
				'hongo_show_pagination'   => '1',
				'show_pagination_style'   => '',
				'hongo_pagination_color'  => '',
				'hongo_active_pagination_color' => '',
				'show_cursor_color_style' => '',
				'hongo_full_screen'       => '1',
				'custom_height'           => '760px',
				'custom_height_mini_desktop' => '',
				'custom_height_tablet' => '',
				'custom_height_mobile' => '',
				'autoplay' 				  => '1',
				'slidedelay'			  => '',
				'autoloop' 				  => '',
				'touchmove'               => '1',

				'hongo_transition_style'  => '',
				'hongo_slidespeed'        => '',

				'hongo_enable_text'       => '1',

				'hongo_enable_social'     => '1',
				'hongo_social_text'       => 'FOLLOW US',
				'hongo_fb_url' 			  => '',
	            'hongo_tw_url' 			  => '',
	            'hongo_db_url' 			  => '',
	            'hongo_li_url' 			  => '',
	            'hongo_ig_url' 			  => '',
	            'hongo_tb_url' 			  => '',
	            'hongo_pi_url' 			  => '',
	            'hongo_yt_url' 			  => '',
	            'hongo_vm_url' 			  => '',
	            'hongo_sc_url' 			  => '',
	            'hongo_fk_url' 			  => '',
	            'hongo_rss_url'			  => '',
	            'hongo_rd_url' 			  => '',
	            'hongo_bh_url' 			  => '',
	            'hongo_vine_url' 		  => '',
	            'hongo_gh_url' 			  => '',
	            'hongo_xing_url' 	      => '',
	            'hongo_vk_url' 			  => '',
	            'hongo_yelp_url'		  => '',
	            'hongo_discord_url'	      => '',
	            'hongo_skype_url'	      => '',
	            'hongo_email_url' 		  => '',

	            'title_heading_tag'		  => '',
	            'subtitle_heading_tag'	  => '',

				'show_overlay'            => '0',
				'hongo_row_overlay_color' => '',
				'hongo_row_overlay_color_att' => '',
				'hongo_overlay_opacity'   => '0.7',
				'hongo_z_index'           => '',

				'hongo_border_color' 	  => '',

				'custom_show_overlay'            => '0',
				'hongo_background_color' => '',
				'hongo_custom_overlay_opacity'   => '0.7',
				'hongo_custom_z_index'           => '',
				'hongo_font_title_setting'  => '',
				'hongo_font_subtitle_setting' => '',
				'hongo_font_content_setting' => '',
				'hongo_font_regular_price_setting' => '',
				'hongo_icon_button' => '',
				'hongo_font_sale_price_setting' => '',
				'hongo_font_social_text_setting' => '',
				'hongo_font_bottom_title_setting' => '',

	            'hongo_button_style' => '',
	            'hongo_button_type' => '',
				'hongo_button_setting' => '',

				'content_desktop_width' => '',
	            'content_desktop_mini_width' => '',
	            'content_ipad_width' => '',
	            'content_mobile_width' => '',
			), $atts ) );

		$output = $hongo_button_style_class = $hongo_button_class = $slider_config = $numeric = $overlay_style = $icon = '';

		$social_data = $content_classes = $classes = array();

		$cnt = 01;

		if ( ! empty( $hongo_shop_slider_slide ) ) {

	       	$hongo_shop_slider_slide = json_decode( urldecode( $hongo_shop_slider_slide ) );

	       	// Check if slider id and class
		   	$hongo_slider_unique_id  = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
		   	$hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'shop-slider';
		   	$hongo_social_id = ( $hongo_social_id ) ? $hongo_social_id : 'shop-social';
		    $hongo_slider_id.= '-' . $hongo_slider_unique_id;
		    $hongo_social_id.= '-' . $hongo_slider_unique_id;
		    $hongo_slider_unique_id++;

		    // Class
		    $hongo_slider_class = ( $hongo_slider_class ) ? $classes[] = $hongo_slider_class : '';
			
			// Content width settings
	        $content_desktop_width = ( $content_desktop_width ) ?  $content_classes[] = $content_desktop_width : '';
	        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $content_classes[] = $content_desktop_mini_width : '';
	        $content_ipad_width   = ( $content_ipad_width ) ? $content_classes[] = $content_ipad_width : '';
	        $content_mobile_width = ( $content_mobile_width ) ? $content_classes[] = $content_mobile_width : '';
	        $content_class_list = ! empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

			// Responsive typography & alt font
		    $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
		    ( $additional_font_title == '1' ) ? $font_setting_class_title .=' alt-font' : '';
		    $font_setting_class_subtitle = ! empty( $hongo_font_subtitle_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_subtitle_setting ) : '';
		    ( $additional_font_subtitle == '1' ) ? $font_setting_class_subtitle .=' alt-font' : '';
		    $font_setting_class_content  = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';	    
		    $font_setting_class_regularprice = ! empty( $hongo_font_regular_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_regular_price_setting ) : '';
		    $font_setting_class_saleprice = ! empty( $hongo_font_sale_price_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_sale_price_setting ) : '';
	        $font_setting_class_social_text = ! empty( $hongo_font_social_text_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_social_text_setting ) : '';
	        $font_setting_class_bottom_title = ! empty( $hongo_font_bottom_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_bottom_title_setting ) : '';
	        $font_setting_class_icon = ! empty( $hongo_icon_button ) ? hongo_shortcode_custom_css_class( $hongo_icon_button ) : '';
			( $content_class_list ) ?  $font_setting_class_content .= $content_class_list : '';
	        // For button style
	        if ( ! empty( $hongo_button_style ) ) {

	            $hongo_button_style_class = hongo_button_class_from_style( $hongo_button_style );
	        }

	        // For button type
	        if ( ! empty( $hongo_button_type ) ) {

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

	        // Transition Style & Transition Speed
	        $hongo_transition_style  = ( $hongo_transition_style ) ? $hongo_transition_style : '';
	        $hongo_slidespeed = ( $hongo_slidespeed ) ? $hongo_slidespeed : '';

	        // Overlay Style
	        $hongo_overlay_opacity = ! empty( $hongo_overlay_opacity ) ? 'opacity:'.$hongo_overlay_opacity.'; ' : 'opacity:0;';
	        $hongo_row_overlay_color_att = ( $hongo_row_overlay_color ) ? 'background-color:'.$hongo_row_overlay_color.'; ' : '';
	        $hongo_z_index = ( $hongo_z_index || $hongo_z_index == '0') ? 'z-index:'.$hongo_z_index.'; ' : '';

	        if ( $hongo_overlay_opacity || $hongo_row_overlay_color_att || $hongo_z_index ) {
	            $overlay_style = ' style="'.$hongo_overlay_opacity.$hongo_row_overlay_color_att.$hongo_z_index.'"';
	        }

	        $hongo_custom_overlay_opacity = ! empty( $hongo_custom_overlay_opacity ) ? 'opacity:'.$hongo_custom_overlay_opacity.'; ' : 'opacity:0;';
	        $hongo_custom_z_index = ( $hongo_custom_z_index || $hongo_custom_z_index == '0') ? 'z-index:'.$hongo_custom_z_index.'; ' : '';

	        $custom_height = ( $custom_height ) ? $custom_height : '760px';
	        $custom_height_attr = ( $custom_height ) ? 'min-height:'.$custom_height.'; ' : 'min-height:760px';

	        if ( $hongo_full_screen == '1' ) {
	        	$classes[] = 'slider-full-screen';
	        } else{
	        	$hongo_featured_array[] =  '.'.$hongo_slider_id.' { height:'.$custom_height.' !important; }';
	        	$hongo_featured_array[] =  '.'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height.' !important; }';
	        }
 
	        if ( ! empty( $custom_height_mini_desktop ) && $hongo_full_screen != '1' ) {
				$hongo_featured_array[] = '@media (max-width:1199px) { .'.$hongo_slider_id.' { height:'.$custom_height_mini_desktop.' !important; } }';
				$hongo_featured_array[] = '@media (max-width:1199px) { .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_mini_desktop.' !important; } }';
			} elseif ( ! empty( $custom_height_mini_desktop ) && $hongo_full_screen == '1' ) {
				$hongo_featured_array[] = '@media (max-width: 1199px) and (min-width: 991px) { .'.$hongo_slider_id.' { height:'.$custom_height_mini_desktop.' !important; } }';
				$hongo_featured_array[] = '@media (max-width: 1199px) and (min-width: 991px) { .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_mini_desktop.' !important; } }';
			}

			if ( ! empty( $custom_height_tablet ) && $hongo_full_screen != '1' ) {

				$hongo_featured_array[] = '@media (max-width:991px){ .'.$hongo_slider_id.' { height:'.$custom_height_tablet.' !important; } }';
				$hongo_featured_array[] = '@media (max-width:991px){ .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_tablet.' !important; } }';
			} elseif ( ! empty( $custom_height_tablet ) && $hongo_full_screen == '1' ) {
				$hongo_featured_array[] = '@media (max-width: 991px) and (min-width: 767px) { .'.$hongo_slider_id.' { height:'.$custom_height_tablet.' !important; } }';
				$hongo_featured_array[] = '@media (max-width: 991px) and (min-width: 767px) { .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_tablet.' !important; } }';
			}

			if ( ! empty( $custom_height_mobile ) && $hongo_full_screen != '1' ) {
				$hongo_featured_array[] = '@media (max-width: 767px) { .'.$hongo_slider_id.' { height:'.$custom_height_mobile.' !important; } }';
				$hongo_featured_array[] = '@media (max-width: 767px) { .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_mobile.' !important; } }';
			} elseif ( ! empty( $custom_height_mobile ) && $hongo_full_screen == '1' ) {
				$hongo_featured_array[] = '@media (max-width: 767px) { .'.$hongo_slider_id.' { height:'.$custom_height_mobile.' !important; } }';
				$hongo_featured_array[] = '@media (max-width: 767px) { .'.$hongo_slider_id.' .hongo-slide-inner-wrapper{ min-height:'.$custom_height_mobile.' !important; } }';
			}

	        // Social icons
		    $hongo_fb_url      = ! empty( $hongo_fb_url ) ? $social_data['facebook'] = $hongo_fb_url : '';
		    $hongo_tw_url      = ! empty( $hongo_tw_url ) ? $social_data['twitter'] = $hongo_tw_url : '';
		    $hongo_db_url      = ! empty( $hongo_db_url ) ? $social_data['dribbble'] = $hongo_db_url : '';
		    $hongo_li_url      = ! empty( $hongo_li_url ) ? $social_data['linkedin'] = $hongo_li_url : '';
		    $hongo_ig_url      = ! empty( $hongo_ig_url ) ? $social_data['instagram'] = $hongo_ig_url : '';
		    $hongo_tb_url      = ! empty( $hongo_tb_url ) ? $social_data['tumblr'] = $hongo_tb_url : '';
		    $hongo_pi_url      = ! empty( $hongo_pi_url ) ? $social_data['pinterest'] = $hongo_pi_url : '';
		    $hongo_yt_url      = ! empty( $hongo_yt_url ) ? $social_data['youtube'] = $hongo_yt_url : '';
		    $hongo_vm_url      = ! empty( $hongo_vm_url ) ? $social_data['vimeo'] = $hongo_vm_url : '';
		    $hongo_sc_url      = ! empty( $hongo_sc_url ) ? $social_data['soundcloud'] = $hongo_sc_url : '';
		    $hongo_fk_url      = ! empty( $hongo_fk_url ) ? $social_data['flickr'] = $hongo_fk_url : '';
		    $hongo_rss_url     = ! empty( $hongo_rss_url ) ? $social_data['rss'] = $hongo_rss_url : '';
		    $hongo_rd_url      = ! empty( $hongo_rd_url ) ? $social_data['reddit'] = $hongo_rd_url : '';
		    $hongo_bh_url      = ! empty( $hongo_bh_url ) ? $social_data['behance'] = $hongo_bh_url : '';
		    $hongo_vine_url    = ! empty( $hongo_vine_url ) ? $social_data['vine'] = $hongo_vine_url : '';
		    $hongo_gh_url      = ! empty( $hongo_gh_url ) ? $social_data['github'] = $hongo_gh_url : '';
		    $hongo_xing_url    = ! empty( $hongo_xing_url ) ? $social_data['xing'] = $hongo_xing_url : '';
		    $hongo_vk_url      = ! empty( $hongo_vk_url ) ? $social_data['vk'] = $hongo_vk_url : '';
		    $hongo_yelp_url    = ! empty( $hongo_yelp_url ) ? $social_data['yelp'] = $hongo_yelp_url : '';
	        $hongo_discord_url = ! empty( $hongo_discord_url ) ? $social_data['discord'] = $hongo_discord_url : '';
	        $hongo_skype_url   = ! empty( $hongo_skype_url ) ? $social_data['skype'] = $hongo_skype_url : '';
		    $hongo_email_url   = ! empty( $hongo_email_url ) ? $social_data['envelope'] = $hongo_email_url : '';

		    // Sorted social icons
	        if ( ! empty( $hongo_social_sorting ) ) {
	        	$social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );	
	        	$social_icons = hongo_get_social_icons();
			}

	        // Pagination & Cursor Style
	        $classes[] = ! empty( $show_pagination_style ) ? $show_pagination_style : 'swiper-pagination-dots';
	        $show_cursor_color_style = ( $show_cursor_color_style ) ? $show_cursor_color_style : 'cursor-default';

	        $slide_direction_configure = ( $slide_direction == 'vertical' ) ? 'direction: "'.$slide_direction.'",' : '';

	        // Pagination Color & Active Color
	        if ( $hongo_show_pagination == 1 ){
		        if ( $show_pagination_style == 'swiper-pagination-border' ) {
		        	if ( ! empty( $hongo_pagination_color ) ) {
						$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet{ border-color:'.$hongo_pagination_color.'; }';
						if ( empty( $hongo_active_pagination_color ) ) {
	                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_pagination_color.'!important; }';
	                    }
					}

			    	if ( ! empty( $hongo_active_pagination_color ) ) {
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active{ border-color:'.$hongo_active_pagination_color.' }';
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_active_pagination_color.'!important; }';
			    	}
		        } elseif ( $show_pagination_style == 'swiper-pagination-number' ) {

			    	if ( $slide_direction == 'vertical' ) {
			    		if ( ! empty( $hongo_pagination_color ) ) {
			    			$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical.'.$show_pagination_style.' .swiper-pagination-bullets .swiper-pagination-bullet{ color: '.$hongo_pagination_color.' }';
			    		}
			    		if ( ! empty( $hongo_active_pagination_color ) ) {
			    			$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical.'.$show_pagination_style.' .swiper-pagination-bullets .swiper-pagination-bullet-active{ color:'.$hongo_active_pagination_color.' }';
				    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical.'.$show_pagination_style.' .swiper-pagination-bullets .swiper-pagination-bullet-active:after{ background-color:'.$hongo_active_pagination_color.' }';
			    		}
			    	} else{

			    		if ( ! empty( $hongo_pagination_color ) ) {
		        			$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet{ color: '.$hongo_pagination_color.' }';
		        			$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullets .swiper-pagination-bullet:after{ color: '.$hongo_pagination_color.'; background-color: '.$hongo_pagination_color.'; }';
		        		}

			        	if ( ! empty( $hongo_active_pagination_color ) ) {
				    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ color:'.$hongo_active_pagination_color.' }';
				    	}
			    	}

		        } else{
		        	$hongo_pagination_color = ( $hongo_pagination_color ) ? 'background-color:'.$hongo_pagination_color.';' : '';
		        	$hongo_active_pagination_color = ( $hongo_active_pagination_color ) ? 'background-color:'.$hongo_active_pagination_color.';' : '';

		        	if ( ! empty( $hongo_pagination_color ) ) {
		        		$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-pagination-bullet{ '.$hongo_pagination_color.' }';
		        		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical .swiper-pagination-bullet{ '.$hongo_pagination_color.' }';
		        	}

		        	if ( ! empty( $hongo_active_pagination_color ) ) {
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-pagination-bullet-active{ '.$hongo_active_pagination_color.' }';
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical .swiper-pagination-bullet-active{ '.$hongo_active_pagination_color.' }';
			    	}
		        }
		    }

		    // Navigation Color
		    if ( $hongo_show_navigation == 1 ) {
		    	if ( ! empty( $hongo_navigation_color ) ) {
		    		$hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-button-next i,.'.$hongo_slider_id.' .swiper-button-prev i, .'.$hongo_slider_id.' .hongo-swiper-numeric { color:'.$hongo_navigation_color.'; }';

		    		if ( $show_navigation_style == 'number-arrow' ) {
		    			$hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-button-prev,.'.$hongo_slider_id. ' .swiper-button-next  { color:'.$hongo_navigation_color.'; }';	
		    			$hongo_featured_array[] = '.'.$hongo_slider_id. ' .hongo-numeric-next:after,.'.$hongo_slider_id. ' .hongo-numeric-prev:after { background-color:'.$hongo_navigation_color.'; }';
		    		}
		    	}
		    }

	        // Currency symbol
	       	$currency      = get_woocommerce_currency_symbol();
	       	$currency      = ! empty($currency) ? $currency : '';

	       	$classes[] = $hongo_slider_id;
	       	$classes[] = $hongo_slider_style;
	       	$classes[] = $show_cursor_color_style;

	       	// Class List
	        $class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

	        $output .='<div id="'.$hongo_slider_id.'" class="swiper-container'.$class_list.'">';
	        	
	        	if ( $hongo_slider_style == 'hongo-shop-slider-style-7' ) {
	        		$output .= '<div class="hongo-overlay-image"></div>';
	        	}

	            $output .= '<div class="swiper-wrapper">';

				if ( ! empty( $hongo_shop_slider_slide ) ) {

	            	foreach ( $hongo_shop_slider_slide as $slide ) {

	                    // Image size
	                    $hongo_image_srcset  = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';
	                    $thumb = ! empty( $slide->hongo_image ) ? wp_get_attachment_image_src( $slide->hongo_image, $hongo_image_srcset ) : array();

	                    $image_url = ! empty( $thumb[0] ) ? $thumb[0] : '';
	                    $image_url = apply_filters( 'hongo_shop_slider_bg_img', $image_url );
	                    $background_image = ! empty( $image_url ) ? ' style="background-image:url('.$image_url.')"' : '';

	                    $hongo_title  	= ! empty( $slide->hongo_title ) ? str_replace( '||', '<br />',$slide->hongo_title ) : '';
	                    $hongo_subtitle = ! empty( $slide->hongo_subtitle ) ? str_replace( '||', '<br />',$slide->hongo_subtitle ) : '';

	            		// Button & Icon
	                    $hongo_button_link = $hongo_button_title = $hongo_button_target = $regular_price = $sale_price = $icon = '';

	                    $hongo_icon_type    = ! empty( $slide->hongo_icon_type ) ? ' ' . $slide->hongo_icon_type : '';
	                    $hongo_button_parse_args =  ! empty( $slide->shop_button ) ? vc_parse_multi_attribute( $slide->shop_button ) : array();
		        		$hongo_button_link   = ! empty( $hongo_button_parse_args['url'] ) ? $hongo_button_parse_args['url'] : '#';
		        		$hongo_button_title  = ! empty( $hongo_button_parse_args['title'] ) ? $hongo_button_parse_args['title'] : '';
		        		$hongo_button_target = ( ! empty( $hongo_button_parse_args['target'] ) ) ? trim($hongo_button_parse_args['target']) : '_self';
		        		$icon_position = ( ! empty( $slide->hongo_icon_position ) ) ? $slide->hongo_icon_position : 'left';

	                    if (  ! empty( $slide->custom_icon_image ) || ! empty( $slide->hongo_button_icon ) ) {
				            $icon_title_gap = ( $icon_position == 'right' ) ? ' right-icon' : ' left-icon';
				            if ( ! empty( $slide->custom_icon ) && $slide->custom_icon == 1 && ! empty( $slide->custom_icon_image ) ) {

				                $icon = hongo_get_image_html( $slide->custom_icon_image, 'full', $icon_title_gap );

				            } elseif ( ! empty( $slide->hongo_button_icon ) ) {

				                $icon = '<i class="'.$slide->hongo_button_icon.$hongo_icon_type.$icon_title_gap.'" aria-hidden="true"></i>';
				            }

				            // Icon position
				            if ( $icon_position == 'right' ) {
				                $hongo_button_title = $hongo_button_title . $icon;
				            } else {
				                $hongo_button_title = $icon . $hongo_button_title;
				            }
				        }

				        // Custom icon width			        
		                if ( ! empty( $slide->custom_icon_max_width ) && $slide->custom_icon == 1 ) {
		                    $hongo_featured_array[] = '.'.$hongo_slider_id.' .btn img { max-width: '.$slide->custom_icon_max_width.' }';
		                }

	                    // Title & Subtitle Heading Tag
	        			$title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';
	        			$subtitle_heading_tag = ! empty( $subtitle_heading_tag ) ? $subtitle_heading_tag : 'div';

						switch ( $hongo_slider_style ) {

							case 'hongo-shop-slider-style-1':
								$content_position = ! empty( $slide->slider_content_position ) ? ' '.$slide->slider_content_position : '';
								$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
								$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-white alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

			                    // Background Color
	    						$hongo_background_color = ( ! empty( $slide->hongo_background_color ) ) ? 'background-color:'.$slide->hongo_background_color.'; ' : '';

	    						$background_color = ! empty( $hongo_background_color ) ? ' style="'.$hongo_background_color.'"' : '';

								if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price ) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {

						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}
						            	$output .= '<div class="container-fluid hongo-slide-inner-wrapper" >';
							            	$output .='<div class="hongo-slider-text-middle-main">';
							            		$output .='<div class="hongo-slider-text-middle">';
								            		$output .='<div class="hongo-slider-text-middle-warp">';
								            			$output .='<div class="hongo-slider-typography-wrap"'.$background_color.'>';
										            		// SubTitle
										            		if ( ! empty( $slide->hongo_subtitle ) ) {
										            			$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
										            		}

										            		// Title
										            		if ( ! empty( $slide->hongo_title ) ) {
										            			$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
										            		}

										            		// Content
										            		if ( ! empty( $slide->hongo_content ) ) {
										            			$output .= '<div>';
										            				$output .= '<p class ="hongo-content alt-font'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
										            			$output .= '</div>';
										            		}

										            		// Price
										       				$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
										       				$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

					                        				//regular price and sale price
															if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
																$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
																$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															} elseif ( ! empty( $regular_price ) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
															} elseif ( ! empty( $sale_price) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}

										            		// Button
									            			if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
									            				$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
										            		}

										            	$output .='</div>';
										            $output .='</div>';
									            $output .='</div>';

							       			$output .='</div>';

							       		$output .='</div>';

						            $output .= '</div>';
								}
			    			break;

			    			case 'hongo-shop-slider-style-2':

			    				$content_position = ! empty( $slide->slider_content_position ) ? ' '.$slide->slider_content_position : '';
			    				$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
			    				$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-dark-gray btn-round alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

					    		if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price ) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {

						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	// Overlay div
						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}

						            	$output .='<div class="container hongo-slide-inner-wrapper" >';

						            		$output .='<div class="col-md-12 hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';

		                            				$output .='<div class="hongo-slider-text-middle">';

		                            					$output .='<div class="hongo-slider-text-wrap">';

												            // Sub Title
												            if ( ! empty( $slide->hongo_subtitle ) ) {
												            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
												            }

												            // Title
												            if ( ! empty( $slide->hongo_title ) ) {
												            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
												            }

												            // Content
										            		if ( ! empty( $slide->hongo_content ) ) {
										            			$output .= '<div class="'.$font_setting_class_content .'">';
										            				$output .= '<p class ="hongo-content alt-font'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
										            			$output .= '</div>';
										            		}

										            		// Price
										       				$sale_price = ! empty( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
										       				$regular_price = ! empty( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

					                        				//regular price and sale price
															if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
																$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
																$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}
															elseif (! empty( $regular_price ) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
															} elseif ( ! empty( $sale_price) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}

										            		// Button
										            		if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
										            			$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
										            		}

										            	$output .= '</div>';

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';

						            	$output .= '</div>';

						            $output .= '</div>';
				    			}
			    			break;

			    			case 'hongo-shop-slider-style-3':

			    				$content_position = ! empty( $slide->slider_content_position ) ? ' '.$slide->slider_content_position : '';
								$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
								$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-dark-gray alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';
			                    
			    				if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {

			    					//Border Color
			    					if ( ! empty ( $hongo_border_color ) ) {
		    							$hongo_featured_array[] = '.'.$hongo_slider_id. ' .hongo-slider-typography-wrap .subtitle { border-color:'.$hongo_border_color.'; }';
		    						}

								    $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

								    	// Overlay div
						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}

								    	$output .='<div class="container hongo-slide-inner-wrapper" >';

							            	$output .='<div class="col-md-12 hongo-slider-typography-wrap">';

							            		$output .='<div class="hongo-slider-text-middle-main">';

		                                			$output .='<div class="hongo-slider-text-middle">';

											            // Sub Title
											            if ( ! empty( $slide->hongo_subtitle ) ) {
											            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$slide->hongo_subtitle.'</'.$subtitle_heading_tag.'>';
											            }

											            // Title
											            if ( ! empty( $slide->hongo_title ) ) {
											            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
											            }

									            		// Content
									            		if ( ! empty( $slide->hongo_content ) ) {
									            			$output .= '<div class="hongo-slider-description'.$font_setting_class_content .'">';
									            				$output .= '<p class ="hongo-content alt-font'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
									            			$output .= '</div>';
									            		}

									            		// Price
									       				$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
									       				$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

				                        				//regular price and sale price
														if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
															$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
															$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}
														elseif ( ! empty( $regular_price ) ) {
															$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
														} elseif ( ! empty( $sale_price ) ) {
															$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}

											            // Button
											            if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
								            				$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url( $hongo_button_link ).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
								            			}
											        $output .= '</div>';

											    $output .= '</div>';

											$output .= '</div>';

										$output .= '</div>';

						           	$output .= '</div>';
						        }
			    			break;

			    			case 'hongo-shop-slider-style-4':

			    				$content_position = ! empty( $slide->slider_content_position ) ? ' '.$slide->slider_content_position : '';
			    				$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
			    				$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-white alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';
			                    
			    				if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $hongo_button_link ) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {
						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	// Overlay div
						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}

						            	$output .='<div class="container hongo-slide-inner-wrapper" >';

						            		$output .='<div class="col-md-12 hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';

		                            				$output .='<div class="hongo-slider-text-middle">';

		                                                $output .='<div class="hongo-slider-text-wrap">';

												            // Sub Title
												            if ( ! empty( $slide->hongo_subtitle ) ) {
												            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
												            }

												            // Title
												            if ( ! empty( $slide->hongo_title ) ) {
												            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
												            }

										            		// Content
										            		if ( ! empty( $slide->hongo_content ) ) {
										            			$output .= '<div>';
										            				$output .= '<p class ="hongo-content alt-font'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
										            			$output .= '</div>';
										            		}

										            		// Price
										       				$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
										       				$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

					                        				//regular price and sale price
															if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
																$output .= '<div class="price"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
																$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}
															elseif (! empty( $regular_price ) ) {
																$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
															} elseif ( ! empty( $sale_price) ) {
																$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}

										            		// Button
									            			if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
									            				$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
									            			}

		                                                $output .= '</div>';

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';
						            
						            	$output .= '</div>';

						            $output .= '</div>';
					    		}
			    			break;

			    			case 'hongo-shop-slider-style-5':

			    				// Separator color
	        					$subtitle_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_subtitle_setting );
	        					if ( ! empty( $subtitle_color ) ) {
	        						$hongo_featured_array[] =  '.'.$hongo_slider_id.' .hongo-slider-typography-wrap .subtitle:before{ background-color:'.$subtitle_color.'; }';
	        					}
			    				$content_position = ! empty( $slide->slider_content_position ) ? ' '. $slide->slider_content_position : '';
			    				$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
			    				$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-transparent-white alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';
			                    
			    				if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {
				    				$output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

				    					// Overlay Option
		        						$hongo_background_color = ( ! empty( $slide->hongo_background_color ) ) ? 'background-color:'.$slide->hongo_background_color.'; ' : '';

		        						if ( $hongo_custom_overlay_opacity || $hongo_background_color || $hongo_custom_z_index ) {        	
		            						$overlay_style_5 = ' style="'.$hongo_custom_overlay_opacity.$hongo_background_color.$hongo_custom_z_index.'"';
		        						}

		        						if ( $custom_show_overlay == 1 ) {
						            		$output .= '<div class="hongo-half-overlay"'.$overlay_style_5.'></div>';
						            	}

						            	$output .='<div class="container-fluid hongo-slide-inner-wrapper" >';

						            		$output .='<div class="col-sm-6 col-xs-12 hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';

		                            				$output .='<div class="hongo-slider-text-middle">';

		                                                $output .='<div class="hongo-slider-text-wrap">';

												            // Sub Title
												            if ( ! empty( $slide->hongo_subtitle ) ) {
												            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
												            }

												            // Title
												            if ( ! empty( $slide->hongo_title ) ) {
												            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
												            }

										            		// Content
										            		if ( ! empty( $slide->hongo_content ) ) {
										            			$output .= '<div>';
										            				$output .= '<p class ="hongo-content'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
										            			$output .= '</div>';
										            		}

												            // Price
															$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
									       					$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

					                        				//regular price and sale price
															if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
																$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
																$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															} elseif (! empty( $regular_price ) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
															} elseif ( ! empty( $sale_price) ) {
																$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}

										            		// Button
										            		if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
										            			$output .= ! empty( $hongo_button_parse_args ) ? '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>' : '';
										            		}

		                                                $output .= '</div>';

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';

						            	$output .= '</div>';

						            $output .= '</div>';
						        }
			    			break;

			    			case 'hongo-shop-slider-style-6':

			    				// Separator color
	        					$subtitle_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_subtitle_setting );
	        					if ( ! empty( $subtitle_color ) ) {
	        						$hongo_featured_array[] =  '.'.$hongo_slider_id.' .hongo-slider-typography-wrap .subtitle:after{ background-color:'.$subtitle_color.'; }';
	        					}
							   	$content_position = ! empty( $slide->slider_content_position ) ? ' '. $slide->slider_content_position : '';
							   	$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
							   	$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-dark-gray alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-small';

							   	if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $background_image ) || ! empty( $hongo_button_title ) || ! empty( $slide->hongo_bottom_title ) ) {
						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	// Overlay div
						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}

						            	$output .='<div class="container hongo-slide-inner-wrapper woocommerce" >';

						            		$output .='<div class="col-md-5 hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';
		                            				
		                            				$output .='<div class="hongo-slider-text-middle">';

											            // Sub Title
											            if ( ! empty( $slide->hongo_subtitle ) ) {
											            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
											            }

											            // Title
											            if ( ! empty( $slide->hongo_title ) ) {
											            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
											            }										            

									            		// Content
									            		if ( ! empty( $slide->hongo_content ) ) {
									            			$output .= '<div class="hongo-slider-description alt-font">';
									            				$output .= '<p class ="hongo-content alt-font'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
									            			$output .= '</div>';
									            		}

											            // Price
									       				$sale_price = isset( $slide->hongo_sale_price ) ? $slide->hongo_sale_price : '';
									       				$regular_price = isset( $slide->hongo_regular_price ) ? $slide->hongo_regular_price : '';

				                        				//regular price and sale price
														if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
															$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
															$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}
														elseif (! empty( $regular_price ) ) {
															$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
														} elseif ( ! empty( $sale_price) ) {
															$output .= '<div class="price alt-font"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}

									            		// Button
									            		if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
									            			$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
									            		}

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';

						            	$output .= '</div>';

						            	if ( ! empty( $slide->hongo_bottom_title ) ) {
						            		$output .= '<div class="bg-text alt-font'.$font_setting_class_bottom_title.'">' . $slide->hongo_bottom_title . '</div>';
						            	}

						            $output .= '</div>';
						        }
			    			break;

			    			case 'hongo-shop-slider-style-7':
			    				
			    				$content_position = ! empty( $slide->slider_content_position ) ? ' '. $slide->slider_content_position : '';
							   	$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
							   	$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

			    				if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $background_image ) || ! empty( $hongo_button_title ) || ! empty( $slide->hongo_brand_image ) ) {
						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	// Overlay div
						            	if ( $show_overlay=='1' ) {
						            		$output .= '<div class="hongo-overlay"'.$overlay_style.'></div>';
						            	}

						            	$output .='<div class="container-fluid hongo-slide-inner-wrapper woocommerce" >';

						            		$output .='<div class="col-md-12 hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';
		                            				
		                            				$output .='<div class="hongo-slider-text-middle">';

							                            // Image size
							                            $hongo_brand_image_srcset  = ! empty( $slide->hongo_brand_image_srcset ) ? $slide->hongo_brand_image_srcset : 'full';

						                                if ( ! empty( $slide->hongo_brand_image ) ) {
						                    				$output .='<div class="brand-image">';
							                                    $output .= hongo_get_image_html( $slide->hongo_brand_image, $hongo_brand_image_srcset );
							                                $output .='</div>';
						                                }
											            
											            // Sub Title
											            if ( ! empty( $slide->hongo_subtitle ) ) {
											            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
											            }

											            // Title
											            if ( ! empty( $slide->hongo_title ) ) {
											            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
											            }

											            // Price
									       				$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
									       				$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

				                        				//regular price and sale price
														if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
															$output .= '<div class="price"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
															$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}
														elseif ( ! empty( $regular_price ) ) {
															$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
														} elseif ( ! empty( $sale_price) ) {
															$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
														}

									            		// Content
									            		if ( ! empty( $slide->hongo_content ) ) {
									            			$output .= '<div>';
									            				$output .= '<p class ="hongo-content'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
									            			$output .= '</div>';
									            		}

									            		// Button
									            		if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
									            			$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
									            		}

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';

						            	$output .= '</div>';

						            $output .= '</div>';
						        }
			    			break;

			    			case 'hongo-shop-slider-style-8':

			    				// Separator color
	        					if ( ! empty( $number_color ) ) {
	        						$hongo_featured_array[] =  '.'.$hongo_slider_id.' .hongo-slider-typography-wrap .number:before{ background-color:'.$number_color.'; }';
	        					}

							   	$content_position = ! empty( $slide->slider_content_position ) ? ' '. $slide->slider_content_position : '';
							   	$content_alignment = ! empty( $slide->slider_content_alignment ) ? ' '.$slide->slider_content_alignment : '';
							   	$button_setting_class  = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';
			                    $button_setting_class .= ( $hongo_button_style_class ) ? $hongo_button_style_class : ' btn btn-black alt-font';
			                    $button_setting_class .= ( $hongo_button_class ) ? $hongo_button_class : ' btn-medium';

			                    // Background Color
	    						$hongo_background_color = ( ! empty( $slide->hongo_background_color ) ) ? 'background-color:'.$slide->hongo_background_color.'; ' : '';

	    						$background_color = ! empty( $hongo_background_color ) ? ' style="'.$hongo_background_color.'"' : '';

							   	if ( ! empty( $slide->hongo_subtitle ) || ! empty( $slide->hongo_title ) || ! empty( $slide->hongo_content ) || ! empty( $regular_price ) || ! empty( $sale_price) || ! empty( $background_image ) || ! empty( $hongo_button_title ) ) {
						            $output .= '<div class="swiper-slide cover-background'.$content_position.$content_alignment.'"'.$background_image.'>';

						            	$output .='<div class="container-fluid woocommerce hongo-slide-inner-wrapper" >';
						            		$output .='<div class="hongo-slider-typography-wrap">';

						            			$output .='<div class="hongo-slider-text-middle-main">';

		                            				$output .='<div class="hongo-slider-text-middle">';

			                            				$output .='<div class="hongo-slider-text-middle-inner base-bg-color" '.$background_color.'>';
			                            					$output .= '<div class="hongo-separator"></div>';
			                            					$cnt++;

												            // Sub Title
												            if ( ! empty( $slide->hongo_subtitle ) ) {
												            	$output .= '<'.$subtitle_heading_tag.' class="subtitle'.$font_setting_class_subtitle.'">'.$hongo_subtitle.'</'.$subtitle_heading_tag.'>';
												            }

												            // Title
												            if ( ! empty( $slide->hongo_title ) ) {
												            	$output .= '<'.$title_heading_tag.' class="title'.$font_setting_class_title.'">'.$hongo_title.'</'.$title_heading_tag.'>';
												            }

										            		// Content
										            		if ( ! empty( $slide->hongo_content ) ) {
										            			$output .= '<div class="hongo-slider-description">';
										            				$output .= '<p class ="hongo-content'.$font_setting_class_content .'">'.$slide->hongo_content.'</p>';
										            			$output .= '</div>';
										            		}

												            // Price
										       				$sale_price = isset( $slide->hongo_sale_price ) ? $currency.$slide->hongo_sale_price : '';
										       				$regular_price = isset( $slide->hongo_regular_price ) ? $currency.$slide->hongo_regular_price : '';

					                        				//regular price and sale price
															if ( ! empty( $regular_price ) && ! empty( $sale_price ) ) {
																$output .= '<div class="price alt-font"><del class="regular-price'.$font_setting_class_regularprice.'"><span class="woocommerce-Price">'. $regular_price .'</span></del>';
																$output .= '<ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}
															elseif (! empty( $regular_price ) ) {
																$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_regularprice.'">'. $regular_price .'</span></ins></div>';
															} elseif ( ! empty( $sale_price) ) {
																$output .= '<div class="price"><ins><span class="woocommerce-Price'.$font_setting_class_saleprice.'">'. $sale_price .'</span></ins></div>';
															}

										            		// Button
										            		if ( ! empty( $hongo_button_link ) && ! empty( $hongo_button_title ) ) {
										            			$output .= '<a class="'.trim( $button_setting_class ).'" href="'.esc_url($hongo_button_link).'" target="'.$hongo_button_target.'">'.$hongo_button_title.'</a>';
										            		}
										            	$output .= '</div>';

									            	$output .= '</div>';

									            $output .= '</div>';

							            	$output .= '</div>';
						            	$output .= '</div>';

						            $output .= '</div>';
						        }
			    			break;


			    		} // End Of Swichcase

			    	} // End of foreach
			    }

			    $output .= '</div>'; // swiper-wrapper

			    // All Setting Swiper 
	    		switch ( $hongo_slider_style ) {
					
					case 'hongo-shop-slider-style-1':
					case 'hongo-shop-slider-style-2':
					case 'hongo-shop-slider-style-3':
					case 'hongo-shop-slider-style-5':
					case 'hongo-shop-slider-style-7':
					case 'hongo-shop-slider-style-8':

						if ( $slide_direction == 'vertical' ) {
							// Vertical slider settings for style 1,2,3,5,7,8

							$slider_config .= $slide_direction_configure;
	    					
	    					// Mousewheel controls
							if ( $mousewheel_control == '1' ) {
	    						$slider_config .= "mousewheel: { mousewheel: true, releaseOnEdges: true },";
	    					}
	    					$slider_config .= "keyboard: { enabled: true, onlyInViewport: true },";
	    					$slider_config .= "on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); }, init: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); }, },";

	    				} else {

	    					// Horizontal slider settings for style 1,2,3,5,7,8
	    					if ( $hongo_show_navigation == 1 ) {

			    				if ( $show_navigation_style == 'number-arrow' ) {

									$slider_config .= "on: { init: function () { jQuery('.".$hongo_slider_id." .swiper-button-next').text( '02' ); jQuery('.".$hongo_slider_id." .swiper-button-prev').text( '0' + length ); }, slideChange: function() { var count = this.slides.length, active = ( this.realIndex ) + 1, next = active + 1, prev = active - 1; if ( this.loopedSlides ) { count = count - 2; } if ( active == 1 ) { prev = count; } if ( length == active ) { next = 1; } if ( next < 10 ) { next = '0' + next; } if ( prev < 10 ) { prev = '0' + prev; } jQuery('.".$hongo_slider_id." .swiper-button-next').text( next ); jQuery('.".$hongo_slider_id." .swiper-button-prev').text( prev ); }, resize: function () { this.update(); } },";

			                        $output .= '<div class="swiper-button-next hongo-numeric-next alt-font swiper-next-' . $hongo_slider_id .'"></div>';                            
			                		$output .= '<div class="swiper-button-prev hongo-numeric-prev alt-font swiper-prev-' . $hongo_slider_id .'"></div>';
			                		$slider_config .= "navigation: { nextEl: '.swiper-next-" . $hongo_slider_id . "', prevEl: '.swiper-prev-" . $hongo_slider_id . "', },";
			                    } else {
			                        $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $hongo_slider_id .'"></i></div>';
		                        	$output .= '<div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $hongo_slider_id .'"></i></div>';
		     						$slider_config .= "navigation: { nextEl: '.swiper-next-". $hongo_slider_id ."', prevEl: '.swiper-prev-". $hongo_slider_id ."', }, on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } },";
			                    }

			                    $slider_config .= "keyboard: { enabled: true, onlyInViewport: false, },";

		                    } else {
		                    	$slider_config .= "on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } },";
		                    }
	    				}
			    		
			    		// Pagination
			    		if ( $hongo_show_pagination == 1 ) { 
			    			$output .= '<div class="swiper-pagination alt-font"></div>';

							$slider_config .= "pagination: { el: '.swiper-pagination', clickable: true,renderBullet: function(index, className) {var value = index + 1; value = (value < 10) ? '0' + (value):value; return '<span class=' + className + '>'+ value + '</span>'; }, },";
						}

					break;

	                case 'hongo-shop-slider-style-4':

	                	$slider_config .= $slide_direction_configure;
	                	if ( $slide_direction == 'vertical' ) {
	    					$slider_config .= "keyboard: { enabled: true, onlyInViewport: true },";
	    					// Mousewheel Controls
							if ( $mousewheel_control == '1' ) {
	    						$slider_config .= "mousewheel: { mousewheel: true, releaseOnEdges: true },";
	    					}
	    				}

	                	$slider_config .= "on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); }, init: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); jQuery('.".$hongo_slider_id." .hongo-swiper-numeric').text('01'); }, slideChange: function(){ var number = ( this.realIndex ) + 1; if ( number < 10 ) { number = '0' + number; } jQuery('.".$hongo_slider_id." .hongo-swiper-numeric').text((number)); } },";

		                // Pagination
			    		if ( $hongo_show_pagination == 1 && $show_pagination_style != 'swiper-pagination-number' ) { 
			    			$output .= '<div class="swiper-pagination alt-font"></div>';

							$slider_config .= "pagination: { el: '.swiper-pagination', clickable: true,renderBullet: function(index, className) {var value = index + 1; value = (value < 10) ? '0' + (value):value; return '<span class=' + className + '>'+ value + '</span>'; }, },";
						}

						$numeric = '<div class="hongo-swiper-numeric alt-font"></div>';

						// pagination vertical color
						if ( ! empty( $hongo_pagination_color ) ) {
			    			$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-button-prev i, .'.$hongo_slider_id.' .swiper-button-next i{ color: '.$hongo_pagination_color.' }';
			    		}
			    		if ( ! empty( $hongo_active_pagination_color ) ) {
			    			$hongo_featured_array[] =  '.'.$hongo_slider_id.' .hongo-swiper-numeric{ color:'.$hongo_active_pagination_color.' }';
			    		}

		    			// Navigation came from pagination settings
		    			if ( $hongo_show_pagination == 1 ) {
		    				if ( $show_pagination_style == 'swiper-pagination-number' ) {
			                    $output .= '<div class="swiper-button-next"><i class="ti-arrow-down icons swiper-next-' . $hongo_slider_id .'"></i></div>';
			                    	$output .= $numeric;
			                    $output .= '<div class="swiper-button-prev"><i class="ti-arrow-up icons swiper-prev-' . $hongo_slider_id .'"></i></div>';
			                    $slider_config .= "navigation: { nextEl: '.swiper-next-" . $hongo_slider_id . "', prevEl: '.swiper-prev-" . $hongo_slider_id . "', },";
		    				}
		                }

		            break;

	                case 'hongo-shop-slider-style-6':

						if ( $slide_direction == 'vertical' ) {
							// Vertical Slider Settings

							$slider_config .= $slide_direction_configure;
							// Mousewheel Controls
							if ( $mousewheel_control == '1' ) {
	    						$slider_config .= "mousewheel: { mousewheel: true, releaseOnEdges: true },";
	    					}
	    					$slider_config .= "keyboard: { enabled: true, onlyInViewport: true },";
	    					$slider_config .= "on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); }, init: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); }, },";

	    				} else {
	    					// Navigation
	    					if ( $hongo_show_navigation == 1 ) {

			    				if ( $show_navigation_style == 'number-arrow' ) {
			    					
			    					$slider_config .= "on: { init: function () { $('.".$hongo_slider_id." .swiper-button-next').text('02'); $('.".$hongo_slider_id." .swiper-button-prev').text(('0') + length); }, slideChange: function () { var count = this.slides.length; if (this.loopedSlides) { count = count - 2; } var active = (this.realIndex) + 1; var next = (active) + 1; var prev = (active) - 1; if (this.loopedSlides) { if (active == 1) { prev = length; } if (length == active) { next = 1; } } else { if (active == 1) { prev = count; } if (length == active) { next = '1'; } } if (next < 10) { next = '0' + next; } if (prev < 10) { prev = '0' + prev; } $('.".$hongo_slider_id." .swiper-button-next').text((next)); $('.".$hongo_slider_id." .swiper-button-prev').text((prev)); }, resize: function () { this.update(); } },"; $output .= '<div class="swiper-button-next hongo-numeric-next swiper-next-' . $hongo_slider_id .'"></div>'; $output .= '<div class="swiper-button-prev hongo-numeric-prev swiper-prev-' . $hongo_slider_id .'"></div>'; $slider_config .= "navigation: { nextEl: '.swiper-next-" . $hongo_slider_id . "', prevEl: '.swiper-prev-" . $hongo_slider_id . "', },";
			                    } else {
			                        $output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-' . $hongo_slider_id .'"></i></div>';
		                        	$output .= '<div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-' . $hongo_slider_id .'"></i></div>';
		     						$slider_config .= "navigation: { nextEl: '.swiper-next-". $hongo_slider_id ."', prevEl: '.swiper-prev-". $hongo_slider_id ."', }, on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } },";
			                    }

		                    } else {
		                    	$slider_config .= "on: { resize: function () { var thisVariable = this; setTimeout(function () { thisVariable.update(); }, 50 ); } },";
		                    }
	    				}

	    				// Pagination
			    		if ( $hongo_show_pagination == 1 ) { 
			    			$output .= '<div class="swiper-pagination alt-font"></div>';

							$slider_config .= "pagination: { el: '.swiper-pagination', clickable: true,renderBullet: function(index, className) {var value = index + 1; value = (value < 10) ? '0' + (value):value; return '<span class=' + className + '>'+ value + '</span>'; }, },";
						}						

						// Social Media
						if ($hongo_enable_social == 1 && $hongo_enable_text == 1 ) {
	                    	$output .= '<div class="hongo-followus-wrap">';
	                    }

		                    if ( $hongo_enable_social == 1 ) {

			                    if ( ! empty( $social_data ) ) {
						            $output .= '<div id="'.$hongo_social_id.'" class="hongo-social-links">';
						                $output .= '<ul>';
						                    foreach( $social_data as $key => $social_url ) {
						                    	$key = ! empty( $social_icons[$key] ) ? $social_icons[$key] : '';
						                        if ( $key == 'rss' || $key == 'envelope' ) {
						                            $icon_class = 'fa-solid fa-'.$key;
						                        } else{
						                            $icon_class = 'fa-brands fa-'.$key;
						                        }

					                        	$output .= '<li><a class="'.esc_attr( $key ).$font_setting_class_icon.'" target="_blank" href="'.esc_url( $social_url ).'"><i class="'.$icon_class.'"></i></a></li>';
					                    	}
						                $output .= '</ul>';
						            $output .= '</div>';
						        }

		                		if ( $hongo_enable_text == 1 ) {
		                			$output .= '<div class="social-text-rotate">';
		                				$output .= '<div class="social-text alt-font'.$font_setting_class_social_text.'">'.$hongo_social_text.'</div>';
		                			$output .= '</div>';
		                		}
		                	}

				        if ($hongo_enable_social == 1 && $hongo_enable_text == 1) {
				        	$output .= '</div>';
				        }

			    	break;
			    	
	            }


	    	$output .= '</div>'; // .swiper-container

    				// Transition Speed & Style
		            ( $hongo_transition_style ) ? $slider_config .= 'effect: "'. $hongo_transition_style .'",' : '';
	    			if ( $hongo_transition_style == 'fade' ) {
	        			$slider_config .= "fadeEffect: { crossFade: true },";
	    			}
		    		$hongo_slidespeed = ( $hongo_slidespeed ) ? $hongo_slidespeed : '';
			        ( $hongo_slidespeed ) ? $slider_config .= 'speed: '.$hongo_slidespeed.',' : '';

	        		// Add custom script Start
		            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
		            ( $autoloop == 1 ) ? $slider_config .= 'loop: true, slidesPerView:1,' : '';
		            ( $autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:'.$slidedelay.', disableOnInteraction: false, },' : $slider_config .= 'autoplay: false,';
		            ( $touchmove == '0' ) ? $slider_config .= 'allowTouchMove:false,' : '';
		            $slider_config .= "watchOverflow: true,";
    				$slider_config .= "touchReleaseOnEdges: true,";

			       	if ( hongo_load_javascript_by_key( 'swiper' ) ) {
			        	ob_start();
			        	?>try { var ShopSlider = "<?php echo str_replace( '-', '_', $hongo_slider_id ); ?>"; var length = jQuery('#<?php echo sprintf( '%s', $hongo_slider_id ); ?> .swiper-slide').length; setTimeout(function () { ShopSlider = new Swiper('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>', { <?php echo sprintf( '%s', $slider_config ); ?> }); }, 100 ); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { ShopSlider.update(); } }); }, 300); } $( '.nav-tabs a[data-toggle="tab"]' ).each( function () { var $this = $(this); $this.on('shown.bs.tab', function () { <?php if ( $hongo_full_screen == '1' ) { ?> var minheight = $(window).height(); $( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?>' ).css( 'height', minheight + 'px' ); <?php } else { ?> var minheight = '<?php echo $custom_height ?>'; $( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?>' ).css( 'height', minheight ); <?php } ?> if ($('#<?php echo sprintf( '%s', $hongo_slider_id ); ?>').length > 0) { ShopSlider.update(); } }); }); } catch( e ) {}
			            <?php 
			        	$hongo_slider_script .= ob_get_contents();
			        	ob_end_clean();
			        }
	        		
	        return $output;
	    }
	}
}
add_shortcode( 'hongo_shop_slider', 'hongo_shop_slider_shortcode');
<?php
/**
 * Shortcode For Team Member Slider
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Team Member Slider */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hongo_team_member_slider_shortcode' ) ) {
	function hongo_team_member_slider_shortcode( $atts, $content = null ) {

		global $hongo_team_slider_unique_id, $hongo_slider_script, $hongo_featured_array;

		extract( shortcode_atts( array(
		    'hongo_team_member_slider_style' => '',

		    'name_heading_tag' => '',
	        'additional_font_name' => '1',
	        'designation_heading_tag' => '',
	        'additional_font_designation' => '1',

		    'hongo_show_pagination'   => '1',
			'hongo_show_pagination_style'   => '',
			'hongo_pagination_color'  => '',
			'hongo_active_pagination_color' => '',

		    'hongo_show_cursor_color_style' => '',

		    'hongo_social_sorting' => '',

		    'hongo_team_member_slides' => '',

		    'hongo_slidespeed' => '',
		    'hongo_autoplay' => '',
		    'hongo_slidedelay' => '',
		    'hongo_autoloop' => '',
		    'hongo_space_between_gap' => '30',
		    'hongo_slides_per_view_desktop' => '4',
		    'hongo_slides_per_view_mini_desktop' => '3',
		    'hongo_slides_per_view_tablet' => '2',
		    'hongo_slides_per_view_mobile' => '1',

		    'hongo_enable_separator' => '1',
		    'hongo_separator_color' => '',
		    'hongo_box_content_bg_color' => '',
		    'hongo_box_hover_bg_color' => '',
		    'hongo_box_hover_gradient_bg_color' => '',

		    'hongo_social_icon_size' => '',
		    'hongo_social_icon_color' => '',

		    'hongo_font_name_setting' => '',
		    'hongo_font_designation_setting' => '',

		    'hongo_slider_id' => '',
	        'hongo_slider_class' => '',

		), $atts ) );

		$hongo_main_classes = array();
		$output = '';

		if ( $hongo_team_member_slides ) {

			// Custom Id and Class
	        ! empty ( $hongo_slider_class ) ? $hongo_main_classes[] = $hongo_slider_class : '';
			! empty( $hongo_team_member_slider_style ) ? $hongo_main_classes[] = $hongo_team_member_slider_style : '';

	        // Slider unique id        
	        $hongo_team_slider_unique_id = ! empty( $hongo_team_slider_unique_id ) ? $hongo_team_slider_unique_id : 1;
	        $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'team-member-slider';
	        $hongo_main_classes[] = $hongo_slider_id = ( $hongo_slider_id == 'team-member-slider' ) ? $hongo_slider_id.'-'.$hongo_team_slider_unique_id : $hongo_slider_id;
	        $hongo_team_slider_unique_id++;

	        // Pagination Color & Active Color
	        if ( $hongo_show_pagination == 1 ) {

	        	if ( $hongo_show_pagination_style == 'swiper-pagination-border' ) {
		        	
		        	if ( ! empty( $hongo_pagination_color ) ) {
						$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$hongo_show_pagination_style. ' .swiper-pagination-bullet { border-color:'.$hongo_pagination_color.'; }';
						if ( empty( $hongo_active_pagination_color ) ) {
                            $hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$hongo_pagination_color.'!important; }';
                        }
					}
					
			    	if ( ! empty( $hongo_active_pagination_color ) ) {
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active { border-color:'.$hongo_active_pagination_color.'; }';
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$hongo_active_pagination_color.'!important; }';
			    	}	
		        } else {

		        	$hongo_active_pagination_color = ( $hongo_active_pagination_color ) ? 'background-color:'.$hongo_active_pagination_color.';' : '';

		        	if ( ! empty( $hongo_pagination_color ) ) {
		        		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$hongo_show_pagination_style. ' .swiper-pagination-bullet{ background-color: '.$hongo_pagination_color.' }';
		        		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical.'.$hongo_show_pagination_style. ' .swiper-pagination-bullet{ '.$hongo_pagination_color.' }';
		        	}

		        	if ( ! empty( $hongo_active_pagination_color ) ) {
			    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$hongo_show_pagination_style. ' .swiper-pagination-bullet-active{ '.$hongo_active_pagination_color.' }';		    		
			    	}

		        }
		    }
		    ( $hongo_show_pagination == 1 ) ? $hongo_main_classes[] = 'pagination-bottom-space' : '';

		    // Pagination 
		    $hongo_main_classes[] = ! empty( $hongo_show_pagination_style ) ? $hongo_show_pagination_style : 'swiper-pagination-dots';

	        // Cursor 
	        $hongo_main_classes[] = ! empty( $hongo_show_cursor_color_style ) ? $hongo_show_cursor_color_style : 'cursor-default';

	        // Typography & alt-font
	        $hongo_font_name_setting = ( $hongo_font_name_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_name_setting ) : '';
	        $hongo_font_name_setting .= ( $additional_font_name == 1 ) ? ' alt-font' : '';
	        $hongo_font_designation_setting = ( $hongo_font_designation_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_designation_setting ) : '';
	        $hongo_font_designation_setting .= ( $additional_font_designation == 1 ) ? ' alt-font' : '';

	        // Class list
	        $class_list = ( $hongo_main_classes ) ? implode(" ",$hongo_main_classes) : '';

	        // Start Swiper custom script

			$swiper_config['keyboard'] = array( 'enabled' =>true, 'onlyInViewport' =>false );

			$hongo_space_between_gap = ( $hongo_space_between_gap ) ? $hongo_space_between_gap : '30';
            $swiper_config['spaceBetween'] = intval( $hongo_space_between_gap );
            
            $swiper_config['slidesPerView'] = intval( $hongo_slides_per_view_mobile );
            $swiper_config['breakpoints'] = array( '768' => array( 'slidesPerView' => intval( $hongo_slides_per_view_tablet ) ), '992' => array( 'slidesPerView' => intval( $hongo_slides_per_view_mini_desktop ) ), '1200' => array( 'slidesPerView' => intval( $hongo_slides_per_view_desktop ) ) );
            
            $hongo_slidedelay = ( $hongo_slidedelay ) ? $hongo_slidedelay : '3000';
            if( $hongo_autoplay == 1 ) {
                $swiper_config['loop'] = true;
                $swiper_config['autoplay'] = array( 'delay' => intval( $hongo_slidedelay ), 'disableOnInteraction' => false, 'stopOnLastSlide' => true );
            } else { 
                $swiper_config['autoplay'] = false;
            }
            
            $hongo_slidespeed = ( $hongo_slidespeed ) ? $hongo_slidespeed : '';
            if( $hongo_slidespeed ) {
                $swiper_config['speed'] = intval( $hongo_slidespeed );
            }
            
            if ( $hongo_show_pagination == 1 ) {
            	$swiper_config['pagination'] = array( 'el' => '.swiper-pagination', 'clickable' => true );
            }            

			$slider_options = ! empty( $swiper_config ) ? json_encode( $swiper_config ) : '';

			$swiper_config['watchOverflow'] = true;

			// End Swiper custom script

	        switch ( $hongo_team_member_slider_style ) {

	        	case 'team-slider-style-1':

	        		// Box Background
	        		if ( ! empty( $hongo_box_hover_bg_color ) ) {
	        			$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-slide .hongo-overlay{ background-color:'.$hongo_box_hover_bg_color.' }';
	        		}

	        		// Box Content Background 
			        ( $hongo_box_content_bg_color ) ? $hongo_featured_array[] = ' .'.$hongo_slider_id.' .swiper-slide figcaption{ background-color: '.$hongo_box_content_bg_color.'!important; }' : '';

			        // Social Icon Color
	        		( $hongo_social_icon_color ) ? $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide .team-social-link a{ color: '.$hongo_social_icon_color.'; }' : '';


	        		if ( ! empty( $hongo_team_member_slides ) ) {

		        		// Team Member Slider        
		        		$hongo_team_member_slides = json_decode( urldecode( $hongo_team_member_slides ) );

		        		$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
		                	$output .= '<div class="swiper-wrapper">';

	        				if ( ! empty( $hongo_team_member_slides ) ) {

				               	foreach ( $hongo_team_member_slides as $slide ) {

				               		// Name & Designation Tag
				               		$name_heading_tag        = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
	                    			$designation_heading_tag = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';

				               		$social_data = array();

			                       	// Image size
			                        $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';

			                       	// Name and Designation
			                       	$hongo_member_name  = ! empty( $slide->hongo_member_name ) ? str_replace( '||', '<br />', $slide->hongo_member_name ) : '';
			                       	$hongo_member_des   = ! empty( $slide->hongo_member_des ) ? str_replace( '||', '<br />', $slide->hongo_member_des ) : '';	

		                   			$hongo_link_url = ! empty( $slide->hongo_link_url ) ? $slide->hongo_link_url : '';

			                        $hongo_link_target_attr  = ( ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target != 'one_page' ) ? ' target="'.$slide->hongo_link_target.'"' : '';
			                        $section_link_class     = ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target == 'one_page' ? ' section-link' : '';

			                        $hongo_facebook_url  = ! empty( $slide->hongo_facebook_url ) ? $social_data['facebook'] = $slide->hongo_facebook_url : '';
			                        $hongo_twitter_url   = ! empty( $slide->hongo_twitter_url ) ? $social_data['twitter'] = $slide->hongo_twitter_url : '';
			                        $hongo_db_url        = ! empty( $slide->hongo_db_url ) ? $social_data['dribbble'] = $slide->hongo_db_url : '';
			                        $hongo_linkedin_url  = ! empty( $slide->hongo_linkedin_url ) ? $social_data['linkedin'] = $slide->hongo_linkedin_url : '';
			                        $hongo_instagram_url = ! empty( $slide->hongo_instagram_url ) ? $social_data['instagram'] = $slide->hongo_instagram_url : '';
			                        $hongo_tb_url        = ! empty( $slide->hongo_tb_url ) ? $social_data['tumblr'] = $slide->hongo_tb_url : '';
			                        $hongo_pinterest_url = ! empty( $slide->hongo_pinterest_url ) ? $social_data['pinterest'] = $slide->hongo_pinterest_url : '';
			                        $hongo_yt_url        = ! empty( $slide->hongo_yt_url ) ? $social_data['youtube'] = $slide->hongo_yt_url : '';
			                        $hongo_vm_url        = ! empty( $slide->hongo_vm_url ) ? $social_data['vimeo'] = $slide->hongo_vm_url : '';
			                        $hongo_sc_url        = ! empty( $slide->hongo_sc_url ) ? $social_data['soundcloud'] = $slide->hongo_sc_url : '';
			                        $hongo_fk_url        = ! empty( $slide->hongo_fk_url ) ? $social_data['flickr'] = $slide->hongo_fk_url : '';
			                        $hongo_rss_url       = ! empty( $slide->hongo_rss_url ) ? $social_data['rss'] = $slide->hongo_rss_url : '';
			                        $hongo_rd_url        = ! empty( $slide->hongo_rd_url ) ? $social_data['reddit'] = $slide->hongo_rd_url : '';
			                        $hongo_behance_url   = ! empty( $slide->hongo_behance_url ) ? $social_data['behance'] = $slide->hongo_behance_url : '';
			                        $hongo_vine_url      = ! empty( $slide->hongo_vine_url ) ? $social_data['vine'] = $slide->hongo_vine_url : '';
			                        $hongo_gh_url        = ! empty( $slide->hongo_gh_url ) ? $social_data['github'] = $slide->hongo_gh_url : '';
			                        $hongo_xing_url      = ! empty( $slide->hongo_xing_url ) ? $social_data['xing'] = $slide->hongo_xing_url : '';
			                        $hongo_vk_url        = ! empty( $slide->hongo_vk_url ) ? $social_data['vk'] = $slide->hongo_vk_url : '';
			                        $hongo_yelp_url      = ! empty( $slide->hongo_yelp_url ) ? $social_data['yelp'] = $slide->hongo_yelp_url : '';
			                        $hongo_discord_url   = ! empty( $slide->hongo_discord_url ) ? $social_data['discord'] = $slide->hongo_discord_url : '';
			                        $hongo_skype_url     = ! empty( $slide->hongo_skype_url ) ? $social_data['skype'] = $slide->hongo_skype_url : '';
			                        $hongo_email_url     = ! empty( $slide->hongo_email_url ) ? $social_data['email'] = $slide->hongo_email_url : '';
			                        $hongo_custom_link   = ! empty( $slide->hongo_custom_link ) ? $slide->hongo_custom_link : '';

			                        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
							            $hongo_custom_link = '';
							        }

			                        if ( ! empty( $hongo_social_sorting ) ) {
			                            // Get sorted social icons            
			                            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
			                        }

			                        // Get all social icons
			                        $social_icons = hongo_get_social_icons();

			                        if ( ! empty( $slide->hongo_image ) || $hongo_member_name || $hongo_member_des || $social_data) {
			                        	
					                    $output .= '<div class="swiper-slide team-slide-style-1">';
				                            $output .= '<figure>';

				                                $output .= '<div class="team-image">';
				                                    if ( ! empty( $slide->hongo_image ) ) {
				                                        $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset );
				                                    }
				                                    if ( ! empty( $social_data ) || ! empty( $hongo_custom_link ) ) {
					                                    $output .= '<div class="hongo-overlay"></div>';
					                                    $output .= '<div class="overlay-content">';
				                                            $output .= '<div class="team-social-link">';
							                                    if ( ! empty( $social_data ) ) {
				                                                    foreach( $social_data as $keys => $social_url ) {

				                                                    	if( $keys == 'email' ) {
					                                                        $social_url = "mailto:".$social_url;
					                                                    } else if( $keys == 'skype' ) {
					                                                        $social_url = "skype:".$social_url;
					                                                    } else {
					                                                        $social_url = esc_url( $social_url );
					                                                    }
				                                                        $key = ! empty( $social_icons[$keys] ) ? $social_icons[$keys] : '';
				                                                        if ( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ) {
				                                                            $icon_class = 'fa-solid fa-'.esc_html( $key );
				                                                        } else{
				                                                            $icon_class = 'fa-brands fa-'.esc_html( $key );
				                                                        }
						                                                $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
				                                                        $output .= '<a href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_social_icon_size ).'"'.$hongo_social_icon_color.'></i></a>';
				                                                    }
							                                	}
			                                                    if ( ! empty( $hongo_custom_link ) ) {
			                                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
			                                                    }
				                                            $output .= '</div>';
					                                    $output .= '</div>';
					                                }
				                                $output .= '</div>';

				                                $output .= '<figcaption>';
			                                        if ( $hongo_member_name ) {
			                                            $output .= '<'.$name_heading_tag.' class="team-title'.esc_attr( $hongo_font_name_setting ).'">';
			                                                if ( ! empty( $hongo_link_url ) ) {
			                                                    $output .= '<a class="team-title-link'.esc_attr( $hongo_font_name_setting ).esc_attr( $section_link_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
			                                                }
			                                                    $output .= $hongo_member_name;
			                                                if ( ! empty( $hongo_link_url ) ) {
			                                                    $output .= '</a>';
			                                                }
			                                            $output .= '</'.$name_heading_tag.'>';
			                                        }
			                                        if ( $hongo_member_des ) {
			                                            $output .= '<'.$designation_heading_tag.' class="team-subtitle'.esc_attr( $hongo_font_designation_setting ).'">'.$hongo_member_des.'</'.$designation_heading_tag.'>';
			                                        }
				                                $output .= '</figcaption>';

				                            $output .= '</figure>';
				                        $output .= '</div>';
				                    }
								}
							}
				            $output .= '</div>';// Swiper Wrapper End
				            if ( $hongo_show_pagination == 1 ) {
				    			$output .= '<div class="swiper-pagination alt-font"></div>';
							}

				        $output .= '</div>';// Swiper Container End
				    }
				break;

				case 'team-slider-style-2':

					// Box Background
	        		if ( ! empty( $hongo_box_hover_bg_color ) ) {
	        			$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-slide .hongo-overlay{ background-color:'.$hongo_box_hover_bg_color.' }';
	        		}
			        // Social Icon Color
	        		( $hongo_social_icon_color ) ? $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide .team-social-link a{ color: '.$hongo_social_icon_color.'; }' : '';

	        		if ( ! empty( $hongo_team_member_slides ) ) {

		        		// Team Member Slider        
		        		$hongo_team_member_slides = json_decode( urldecode( $hongo_team_member_slides ) );

		        		$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
		                	$output .= '<div class="swiper-wrapper">';

		        				if ( ! empty( $hongo_team_member_slides ) ) {

					               	foreach ( $hongo_team_member_slides as $slide ) {

					               		// Name & Designation Tag
					               		$name_heading_tag        = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
		                    			$designation_heading_tag = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';

					               		$social_data = array();

				                       	// Image size 
				                        $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';

				                       	// Name and Designation
				                       	$hongo_member_name  = ! empty( $slide->hongo_member_name ) ? str_replace( '||', '<br />', $slide->hongo_member_name ) : '';
				                       	$hongo_member_des   = ! empty( $slide->hongo_member_des ) ? str_replace( '||', '<br />', $slide->hongo_member_des ) : '';	

			                   			$hongo_link_url = ! empty( $slide->hongo_link_url ) ? $slide->hongo_link_url : '';

				                        $hongo_link_target_attr  = ( ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target != 'one_page' ) ? ' target="'.$slide->hongo_link_target.'"' : '';
				                        $section_link_class     = ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target == 'one_page' ? ' section-link' : '';

				                        $hongo_facebook_url  = ! empty( $slide->hongo_facebook_url ) ? $social_data['facebook'] = $slide->hongo_facebook_url : '';
				                        $hongo_twitter_url   = ! empty( $slide->hongo_twitter_url ) ? $social_data['twitter'] = $slide->hongo_twitter_url : '';			                        
				                        $hongo_db_url        = ! empty( $slide->hongo_db_url ) ? $social_data['dribbble'] = $slide->hongo_db_url : '';
				                        $hongo_linkedin_url  = ! empty( $slide->hongo_linkedin_url ) ? $social_data['linkedin'] = $slide->hongo_linkedin_url : '';
				                        $hongo_instagram_url = ! empty( $slide->hongo_instagram_url ) ? $social_data['instagram'] = $slide->hongo_instagram_url : '';
				                        $hongo_tb_url        = ! empty( $slide->hongo_tb_url ) ? $social_data['tumblr'] = $slide->hongo_tb_url : '';
				                        $hongo_pinterest_url = ! empty( $slide->hongo_pinterest_url ) ? $social_data['pinterest'] = $slide->hongo_pinterest_url : '';
				                        $hongo_yt_url        = ! empty( $slide->hongo_yt_url ) ? $social_data['youtube'] = $slide->hongo_yt_url : '';
				                        $hongo_vm_url        = ! empty( $slide->hongo_vm_url ) ? $social_data['vimeo'] = $slide->hongo_vm_url : '';
				                        $hongo_sc_url        = ! empty( $slide->hongo_sc_url ) ? $social_data['soundcloud'] = $slide->hongo_sc_url : '';
				                        $hongo_fk_url        = ! empty( $slide->hongo_fk_url ) ? $social_data['flickr'] = $slide->hongo_fk_url : '';
				                        $hongo_rss_url       = ! empty( $slide->hongo_rss_url ) ? $social_data['rss'] = $slide->hongo_rss_url : '';
				                        $hongo_rd_url        = ! empty( $slide->hongo_rd_url ) ? $social_data['reddit'] = $slide->hongo_rd_url : '';
				                        $hongo_behance_url   = ! empty( $slide->hongo_behance_url ) ? $social_data['behance'] = $slide->hongo_behance_url : '';
				                        $hongo_vine_url      = ! empty( $slide->hongo_vine_url ) ? $social_data['vine'] = $slide->hongo_vine_url : '';
				                        $hongo_gh_url        = ! empty( $slide->hongo_gh_url ) ? $social_data['github'] = $slide->hongo_gh_url : '';
				                        $hongo_xing_url      = ! empty( $slide->hongo_xing_url ) ? $social_data['xing'] = $slide->hongo_xing_url : '';
				                        $hongo_vk_url        = ! empty( $slide->hongo_vk_url ) ? $social_data['vk'] = $slide->hongo_vk_url : '';
				                        $hongo_yelp_url      = ! empty( $slide->hongo_yelp_url ) ? $social_data['yelp'] = $slide->hongo_yelp_url : '';
				                        $hongo_discord_url   = ! empty( $slide->hongo_discord_url ) ? $social_data['discord'] = $slide->hongo_discord_url : '';
				                        $hongo_skype_url     = ! empty( $slide->hongo_skype_url ) ? $social_data['skype'] = $slide->hongo_skype_url : '';
				                        $hongo_email_url     = ! empty( $slide->hongo_email_url ) ? $social_data['email'] = $slide->hongo_email_url : '';
				                        $hongo_custom_link   = ! empty( $slide->hongo_custom_link ) ? $slide->hongo_custom_link : '';

				                        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
								            $hongo_custom_link = '';
								        }

				                        if ( ! empty( $hongo_social_sorting ) ) {
				                            // Get sorted social icons            
				                            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
				                        }

				                        // Get all social icons
				                        $social_icons = hongo_get_social_icons();

				                        if ( ! empty( $slide->hongo_image ) || $hongo_member_name || $hongo_member_des || $social_data) {
				                        	
						                    $output .= '<div class="swiper-slide team-style-1">';
					                            $output .= '<figure>';

					                                $output .= '<div class="team-image">';
					                                    if ( ! empty( $slide->hongo_image ) ) {
					                                        $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset );
					                                    }
					                                    $output .= '<div class="hongo-overlay"></div>';
					                                    if ( ! empty( $social_data ) || ! empty( $hongo_custom_link ) ) {
						                                    $output .= '<div class="overlay-content-box">';
								                                $output .= '<div class="overlay-content-wrapper">';
								                                    $output .= '<div class="overlay-content icon-extra-small team-social-link">';
						                                    			if ( ! empty( $social_data ) ) {
						                                                    foreach( $social_data as $keys => $social_url ) {

						                                                    	if( $keys == 'email' ) {
							                                                        $social_url = "mailto:".$social_url;
							                                                    } else if( $keys == 'skype' ) {
							                                                        $social_url = "skype:".$social_url;
							                                                    } else {
							                                                        $social_url = esc_url( $social_url );
							                                                    }

						                                                        $key = ! empty( $social_icons[$keys] ) ? $social_icons[$keys] : '';
						                                                        if ( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt'  ) {
						                                                            $icon_class = 'fa-solid fa-'.esc_html( $key );
						                                                        } else{
						                                                            $icon_class = 'fa-brands fa-'.esc_html( $key );
						                                                        }
						                                                        $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
						                                                        $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_social_icon_size ).'"'.$hongo_social_icon_color.'></i></a>';
						                                                    }
						                                                }
					                                                    if ( ! empty( $hongo_custom_link ) ) {
					                                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
					                                                    }
				                                                    $output .= '</div>';
					                                            $output .= '</div>';
						                                    $output .= '</div>';
					                                	}
					                                $output .= '</div>';

					                                $output .= '<figcaption>';
					                                	$output .= '<div class="team-member-position">';
					                                        if ( $hongo_member_name ) {
					                                            $output .= '<'.$name_heading_tag.' class="team-name'.esc_attr( $hongo_font_name_setting ).'">';
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '<a class="team-title-link'.esc_attr( $hongo_font_name_setting ).esc_attr( $section_link_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
					                                                }
					                                                    $output .= $hongo_member_name;
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '</a>';
					                                                }
					                                            $output .= '</'.$name_heading_tag.'>';
					                                        }
					                                        if ( $hongo_member_des ) {
					                                            $output .= '<'.$designation_heading_tag.' class="team-designation'.esc_attr( $hongo_font_designation_setting ).'">'.$hongo_member_des.'</'.$designation_heading_tag.'>';
					                                        }
					                                    $output .= '</div>';
					                                $output .= '</figcaption>';

					                            $output .= '</figure>';
					                        $output .= '</div>';
					                    }
									}
								}
				            $output .= '</div>';// Swiper Wrapper End
				            if ( $hongo_show_pagination == 1 ) {
				    			$output .= '<div class="swiper-pagination alt-font"></div>';
							}

				        $output .= '</div>';// Swiper Container End
				    }
				break;

				case 'team-slider-style-3':

					// Box Content Background
			        ( $hongo_box_content_bg_color ) ? $hongo_featured_array[] = ' .'.$hongo_slider_id.' .swiper-slide figcaption{ background-color: '.$hongo_box_content_bg_color.'!important; }' : '';

					// Box Background
	        		if ( ! empty( $hongo_box_hover_bg_color ) ) {
	        			$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-slide .hongo-overlay{ background-color:'.$hongo_box_hover_bg_color.' }';
	        		}

			        // Social Icon Color
	        		( $hongo_social_icon_color ) ? $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide .team-social-link a{ color: '.$hongo_social_icon_color.'; }' : '';

	        		if ( ! empty( $hongo_team_member_slides ) ) {

		        		// Team Member Slider        
		        		$hongo_team_member_slides = json_decode( urldecode( $hongo_team_member_slides ) );

		        		$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
		                	$output .= '<div class="swiper-wrapper">';

		        				if ( ! empty( $hongo_team_member_slides ) ) {

					               	foreach ( $hongo_team_member_slides as $slide ) {

					               		// Name & Designation Tag
					               		$name_heading_tag        = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
		                    			$designation_heading_tag = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';

					               		$social_data = array();

				                       	// Image size
				                        $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';

				                       	// Name and Designation
				                       	$hongo_member_name  = ! empty( $slide->hongo_member_name ) ? str_replace( '||', '<br />', $slide->hongo_member_name ) : '';
				                       	$hongo_member_des   = ! empty( $slide->hongo_member_des ) ? str_replace( '||', '<br />', $slide->hongo_member_des ) : '';	

			                   			$hongo_link_url = ! empty( $slide->hongo_link_url ) ? $slide->hongo_link_url : '';

				                        $hongo_link_target_attr  = ( ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target != 'one_page' ) ? ' target="'.$slide->hongo_link_target.'"' : '';
				                        $section_link_class     = ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target == 'one_page' ? ' section-link' : '';

				                        $hongo_facebook_url  = ! empty( $slide->hongo_facebook_url ) ? $social_data['facebook'] = $slide->hongo_facebook_url : '';
				                        $hongo_twitter_url   = ! empty( $slide->hongo_twitter_url ) ? $social_data['twitter'] = $slide->hongo_twitter_url : '';			                        
				                        $hongo_db_url        = ! empty( $slide->hongo_db_url ) ? $social_data['dribbble'] = $slide->hongo_db_url : '';
				                        $hongo_linkedin_url  = ! empty( $slide->hongo_linkedin_url ) ? $social_data['linkedin'] = $slide->hongo_linkedin_url : '';
				                        $hongo_instagram_url = ! empty( $slide->hongo_instagram_url ) ? $social_data['instagram'] = $slide->hongo_instagram_url : '';
				                        $hongo_tb_url        = ! empty( $slide->hongo_tb_url ) ? $social_data['tumblr'] = $slide->hongo_tb_url : '';
				                        $hongo_pinterest_url = ! empty( $slide->hongo_pinterest_url ) ? $social_data['pinterest'] = $slide->hongo_pinterest_url : '';
				                        $hongo_yt_url        = ! empty( $slide->hongo_yt_url ) ? $social_data['youtube'] = $slide->hongo_yt_url : '';
				                        $hongo_vm_url        = ! empty( $slide->hongo_vm_url ) ? $social_data['vimeo'] = $slide->hongo_vm_url : '';
				                        $hongo_sc_url        = ! empty( $slide->hongo_sc_url ) ? $social_data['soundcloud'] = $slide->hongo_sc_url : '';
				                        $hongo_fk_url        = ! empty( $slide->hongo_fk_url ) ? $social_data['flickr'] = $slide->hongo_fk_url : '';
				                        $hongo_rss_url       = ! empty( $slide->hongo_rss_url ) ? $social_data['rss'] = $slide->hongo_rss_url : '';
				                        $hongo_rd_url        = ! empty( $slide->hongo_rd_url ) ? $social_data['reddit'] = $slide->hongo_rd_url : '';
				                        $hongo_behance_url   = ! empty( $slide->hongo_behance_url ) ? $social_data['behance'] = $slide->hongo_behance_url : '';
				                        $hongo_vine_url      = ! empty( $slide->hongo_vine_url ) ? $social_data['vine'] = $slide->hongo_vine_url : '';
				                        $hongo_gh_url        = ! empty( $slide->hongo_gh_url ) ? $social_data['github'] = $slide->hongo_gh_url : '';
				                        $hongo_xing_url      = ! empty( $slide->hongo_xing_url ) ? $social_data['xing'] = $slide->hongo_xing_url : '';
				                        $hongo_vk_url        = ! empty( $slide->hongo_vk_url ) ? $social_data['vk'] = $slide->hongo_vk_url : '';
				                        $hongo_yelp_url      = ! empty( $slide->hongo_yelp_url ) ? $social_data['yelp'] = $slide->hongo_yelp_url : '';
				                        $hongo_discord_url   = ! empty( $slide->hongo_discord_url ) ? $social_data['discord'] = $slide->hongo_discord_url : '';
				                        $hongo_skype_url     = ! empty( $slide->hongo_skype_url ) ? $social_data['skype'] = $slide->hongo_skype_url : '';
				                        $hongo_email_url     = ! empty( $slide->hongo_email_url ) ? $social_data['email'] = $slide->hongo_email_url : '';
				                        $hongo_custom_link   = ! empty( $slide->hongo_custom_link ) ? $slide->hongo_custom_link : '';

				                        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
								            $hongo_custom_link = '';
								        }

				                        if ( ! empty( $hongo_social_sorting ) ) {
				                            // Get sorted social icons            
				                            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
				                        }

				                        // Get all social icons
				                        $social_icons = hongo_get_social_icons();

				                        if ( ! empty( $slide->hongo_image ) || $hongo_member_name || $hongo_member_des || $social_data) {
				                        	
						                    $output .= '<div class="swiper-slide team-style-2">';
					                            $output .= '<figure>';

					                                $output .= '<div class="team-image">';
					                                    if ( ! empty( $slide->hongo_image ) ) {
					                                        $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset );
					                                    }
					                                    $output .= '<div class="hongo-overlay"></div>';
					                                    if ( ! empty( $social_data ) || ! empty( $hongo_custom_link ) ) {
						                                    $output .= '<div class="overlay-content icon-social-small">';
					                                            $output .= '<div class="team-social-link">';
						                                    		if ( ! empty( $social_data ) ) {
					                                                    foreach( $social_data as $keys => $social_url ) {
					                                                    	
					                                                    	if( $keys == 'email' ) {
						                                                        $social_url = "mailto:".$social_url;
						                                                    } else if( $keys == 'skype' ) {
						                                                        $social_url = "skype:".$social_url;
						                                                    } else {
						                                                        $social_url = esc_url( $social_url );
						                                                    }

					                                                        $key = ! empty( $social_icons[$keys] ) ? $social_icons[$keys] : '';
					                                                        if ( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ) {
					                                                            $icon_class = 'fa-solid fa-'.esc_html( $key );
					                                                        } else{
					                                                            $icon_class = 'fa-brands fa-'.esc_html( $key );
					                                                        }
					                                                        $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
					                                                        $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_social_icon_size ).'"'.$hongo_social_icon_color.'></i></a>';
					                                                    }
					                                                }
				                                                    if ( ! empty( $hongo_custom_link ) ) {
				                                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
				                                                    }
					                                            $output .= '</div>';
						                                    $output .= '</div>';
					                                	}
					                                $output .= '</div>';

					                                $output .= '<figcaption>';
					                                	$output .= '<div class="team-member-position">';
					                                        if ( $hongo_member_name ) {
					                                            $output .= '<'.$name_heading_tag.' class="team-name'.esc_attr( $hongo_font_name_setting ).'">';
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '<a class="team-title-link'.esc_attr( $hongo_font_name_setting ).esc_attr( $section_link_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
					                                                }
					                                                    $output .= $hongo_member_name;
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '</a>';
					                                                }
					                                            $output .= '</'.$name_heading_tag.'>';
					                                        }
					                                        if ( $hongo_member_des ) {
					                                            $output .= '<'.$designation_heading_tag.' class="team-designation'.esc_attr( $hongo_font_designation_setting ).'">'.$hongo_member_des.'</'.$designation_heading_tag.'>';
					                                        }
					                                    $output .= '</div>';
					                                $output .= '</figcaption>';

					                            $output .= '</figure>';
					                        $output .= '</div>';
					                    }
									}
								}
				            $output .= '</div>';// Swiper Wrapper End
				            if ( $hongo_show_pagination == 1 ) {
				    			$output .= '<div class="swiper-pagination alt-font"></div>';								
							}

				        $output .= '</div>';// Swiper Container End
				    }
				break;

				case 'team-slider-style-4':

					// Separator color
					( $hongo_separator_color ) ? $hongo_featured_array[] =  '.'.$hongo_slider_id.' figure figcaption .separator-line-horizontal-full{ background-color: '.$hongo_separator_color.' }' : '';

			        // Box Background 
			        $hongo_box_hover_bg_color = ! empty($hongo_box_hover_bg_color) && ! empty($hongo_box_hover_gradient_bg_color) ? 'background: linear-gradient(45deg, '.$hongo_box_hover_bg_color.' 0%, '.$hongo_box_hover_gradient_bg_color.' 100%)' : ( ! empty($hongo_box_hover_bg_color) ? 'background: '.$hongo_box_hover_bg_color.'' : '' );
			        ( $hongo_box_hover_bg_color ) ? $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-slide .hongo-overlay{ '.$hongo_box_hover_bg_color.' }' : '';

			        // Social Icon Color
	        		( $hongo_social_icon_color ) ? $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-slide .team-social-link a{ color: '.$hongo_social_icon_color.'; }' : '';

	        		if ( ! empty( $hongo_team_member_slides ) ) {

		        		// Team Member Slider        
		        		$hongo_team_member_slides = json_decode( urldecode( $hongo_team_member_slides ) );

		        		$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
		                	$output .= '<div class="swiper-wrapper">';

		        				if ( ! empty( $hongo_team_member_slides ) ) {

					               	foreach ( $hongo_team_member_slides as $slide ) {

					               		// Name & Designation Tag
					               		$name_heading_tag        = ! empty( $name_heading_tag ) ? $name_heading_tag : 'div';
		                    			$designation_heading_tag = ! empty( $designation_heading_tag ) ? $designation_heading_tag : 'div';

					               		$social_data = array();

				                       	// Image size
				                        $hongo_image_srcset = ! empty( $slide->hongo_image_srcset ) ? $slide->hongo_image_srcset : 'full';

				                       	// Name and Designation
				                       	$hongo_member_name  = ! empty( $slide->hongo_member_name ) ? str_replace( '||', '<br />', $slide->hongo_member_name ) : '';
				                       	$hongo_member_des   = ! empty( $slide->hongo_member_des ) ? str_replace( '||', '<br />', $slide->hongo_member_des ) : '';	

			                   			$hongo_link_url = ! empty( $slide->hongo_link_url ) ? $slide->hongo_link_url : '';

				                        $hongo_link_target_attr  = ( ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target != 'one_page' ) ? ' target="'.$slide->hongo_link_target.'"' : '';
				                        $section_link_class     = ! empty( $slide->hongo_link_target ) && $slide->hongo_link_target == 'one_page' ? ' section-link' : '';

				                        $hongo_facebook_url  = ! empty( $slide->hongo_facebook_url ) ? $social_data['facebook'] = $slide->hongo_facebook_url : '';
				                        $hongo_twitter_url   = ! empty( $slide->hongo_twitter_url ) ? $social_data['twitter'] = $slide->hongo_twitter_url : '';
				                        $hongo_db_url        = ! empty( $slide->hongo_db_url ) ? $social_data['dribbble'] = $slide->hongo_db_url : '';
				                        $hongo_linkedin_url  = ! empty( $slide->hongo_linkedin_url ) ? $social_data['linkedin'] = $slide->hongo_linkedin_url : '';
				                        $hongo_instagram_url = ! empty( $slide->hongo_instagram_url ) ? $social_data['instagram'] = $slide->hongo_instagram_url : '';
				                        $hongo_tb_url        = ! empty( $slide->hongo_tb_url ) ? $social_data['tumblr'] = $slide->hongo_tb_url : '';
				                        $hongo_pinterest_url = ! empty( $slide->hongo_pinterest_url ) ? $social_data['pinterest'] = $slide->hongo_pinterest_url : '';
				                        $hongo_yt_url        = ! empty( $slide->hongo_yt_url ) ? $social_data['youtube'] = $slide->hongo_yt_url : '';
				                        $hongo_vm_url        = ! empty( $slide->hongo_vm_url ) ? $social_data['vimeo'] = $slide->hongo_vm_url : '';
				                        $hongo_sc_url        = ! empty( $slide->hongo_sc_url ) ? $social_data['soundcloud'] = $slide->hongo_sc_url : '';
				                        $hongo_fk_url        = ! empty( $slide->hongo_fk_url ) ? $social_data['flickr'] = $slide->hongo_fk_url : '';
				                        $hongo_rss_url       = ! empty( $slide->hongo_rss_url ) ? $social_data['rss'] = $slide->hongo_rss_url : '';
				                        $hongo_rd_url        = ! empty( $slide->hongo_rd_url ) ? $social_data['reddit'] = $slide->hongo_rd_url : '';
				                        $hongo_behance_url   = ! empty( $slide->hongo_behance_url ) ? $social_data['behance'] = $slide->hongo_behance_url : '';
				                        $hongo_vine_url      = ! empty( $slide->hongo_vine_url ) ? $social_data['vine'] = $slide->hongo_vine_url : '';
				                        $hongo_gh_url        = ! empty( $slide->hongo_gh_url ) ? $social_data['github'] = $slide->hongo_gh_url : '';
				                        $hongo_xing_url      = ! empty( $slide->hongo_xing_url ) ? $social_data['xing'] = $slide->hongo_xing_url : '';
				                        $hongo_vk_url        = ! empty( $slide->hongo_vk_url ) ? $social_data['vk'] = $slide->hongo_vk_url : '';
				                        $hongo_yelp_url      = ! empty( $slide->hongo_yelp_url ) ? $social_data['yelp'] = $slide->hongo_yelp_url : '';
				                        $hongo_discord_url   = ! empty( $slide->hongo_discord_url ) ? $social_data['discord'] = $slide->hongo_discord_url : '';
				                        $hongo_skype_url     = ! empty( $slide->hongo_skype_url ) ? $social_data['skype'] = $slide->hongo_skype_url : '';
				                        $hongo_email_url     = ! empty( $slide->hongo_email_url ) ? $social_data['email'] = $slide->hongo_email_url : '';
				                        $hongo_custom_link   = ! empty( $slide->hongo_custom_link ) ? $slide->hongo_custom_link : '';

				                        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
								            $hongo_custom_link = '';
								        }

				                        if ( ! empty( $hongo_social_sorting ) ) {
				                            // Get sorted social icons            
				                            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
				                        }

				                        // Get all social icons
				                        $social_icons = hongo_get_social_icons();

				                        if ( ! empty( $slide->hongo_image ) || $hongo_member_name || $hongo_member_des || $social_data ) {
				                        	
						                    $output .= '<div class="swiper-slide team-style-3">';
					                            $output .= '<figure>';

					                                $output .= '<div class="team-image">';
					                                    if ( ! empty( $slide->hongo_image ) ) {
					                                        $output .= hongo_get_image_html( $slide->hongo_image, $hongo_image_srcset );
					                                    }
					                                    $output .= '<div class="hongo-overlay"></div>';
					                                $output .= '</div>';

					                                $output .= '<figcaption>';
					                                	$output .= '<div class="team-member-position">';
					                                        if ( $hongo_member_name ) {
					                                            $output .= '<'.$name_heading_tag.' class="team-name'.esc_attr( $hongo_font_name_setting ).'">';
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '<a class="team-title-link'.esc_attr( $hongo_font_name_setting ).esc_attr( $section_link_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">';
					                                                }
					                                                    $output .= $hongo_member_name;
					                                                if ( ! empty( $hongo_link_url ) ) {
					                                                    $output .= '</a>';
					                                                }
					                                            $output .= '</'.$name_heading_tag.'>';
					                                        }
					                                        if ( $hongo_member_des ) {
					                                            $output .= '<'.$designation_heading_tag.' class="team-designation'.esc_attr( $hongo_font_designation_setting ).'">'.$hongo_member_des.'</'.$designation_heading_tag.'>';
					                                        }
					                                        if ( $hongo_enable_separator == '1' ) {
					                                        	$output .= '<div class="separator-line-horizontal-full"></div>';
					                                        }
					                                    	if ( ! empty( $social_data ) || ! empty( $hongo_custom_link ) ) {
							                                    $output .= '<div class="overlay-content">';
						                                            $output .= '<div class="team-social-link">';
							                                    		if ( ! empty( $social_data ) ) {
						                                                    foreach( $social_data as $keys => $social_url ) {
						                                                    	if( $keys == 'email' ) {
							                                                        $social_url = "mailto:".$social_url;
							                                                    } else if( $keys == 'skype' ) {
							                                                        $social_url = "skype:".$social_url;
							                                                    } else {
							                                                        $social_url = esc_url( $social_url );
							                                                    }
						                                                        $key = ! empty( $social_icons[$keys] ) ? $social_icons[$keys] : '';
						                                                        if ( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ) {
						                                                            $icon_class = 'fa-solid fa-'.esc_html( $key );
						                                                        } else{
						                                                            $icon_class = 'fa-brands fa-'.esc_html( $key );
						                                                        }
						                                                        $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
						                                                        $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_social_icon_size ).'"'.$hongo_social_icon_color.'></i></a>';
						                                                    }
						                                                }
					                                                    if ( ! empty( $hongo_custom_link ) ) {
					                                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
					                                                    }
						                                            $output .= '</div>';
							                                    $output .= '</div>';
						                                	}
					                                    $output .= '</div>';
					                                $output .= '</figcaption>';

					                            $output .= '</figure>';
					                        $output .= '</div>';
					                    }
									}
								}
				            $output .= '</div>';// Swiper Wrapper End
				            if ( $hongo_show_pagination == 1 ) {
				    			$output .= '<div class="swiper-pagination alt-font"></div>';								
							}

				        $output .= '</div>';// Swiper Container End
				    }
				break;
	        }
	    }

	    return $output;
	}
}
add_shortcode( 'hongo_team_member_slider', 'hongo_team_member_slider_shortcode' );
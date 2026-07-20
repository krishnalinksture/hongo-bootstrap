<?php
/**
 * Shortcode For Image Carousel
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Carousel */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_image_carousel_shortcode' ) ) {
	function hongo_image_carousel_shortcode( $atts, $content = null ) {

        global $hongo_lightbox_unique_id, $hongo_slider_script, $hongo_featured_array;

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',

        	'image_gallery_type' => '',
        	'image_gallery' => '',
        	'hongo_image_srcset' => 'full',
        	'hongo_column_animation_style' => '',
        	'hongo_animation_duration' => '',
        	
	        'lightbox_gallery' => '1',
	        'zoom_text' => esc_html__( 'ENLARGE', 'hongo-addons' ),

            'hongo_show_pagination' => '1',
            'show_pagination_style' => '',
            'hongo_pagination_color' => '',
            'hongo_active_pagination_color' => '',

            'transition_style' => '',
            'hongo_show_navigation' => '1',
            'hongo_navigation_color' => '',
            'show_cursor_color_style' => '',

            'slides_per_view_desktop' => '3',
    		'slides_per_view_mini_desktop' => '3',
	        'slides_per_view_tablet' => '2',
	        'slides_per_view_mobile' => '1',
	        'hongo_space_between_gap' => '10',
	        'autoloop' => '',
	        'autoplay' => '1',
	        'slidedelay' => '',
	        'slidespeed' => '',
	        'hongo_center_slides' => '',
	        'hongo_freemode_slides' => '0',
	        'slides_per_group' => '1',
	        'hongo_image_box_shadow' => '0',

	        'hongo_image_slides' => '',

	        'hongo_background_hover_color' => '',
	        'hongo_zoom_icon_color' => '',
	        'hongo_font_zoom_text' => '',
	        'hongo_font_title_setting' => '',
	        'additional_font_title' => '1',
	        'title_heading_tag' => '',

            'hongo_slider_id' => '',
	    ), $atts ) );

		$output = '';
		$classes = array();

        // Check if lightbox id and class
        $hongo_lightbox_unique_id  = ! empty( $hongo_lightbox_unique_id ) ? $hongo_lightbox_unique_id : 0;
        $hongo_lightbox_unique_id = $hongo_lightbox_unique_id + 1 ;
        $hongo_lightbox_id      = ! empty( $id ) ? $id : 'hongo-lightbox-'. $hongo_lightbox_unique_id;

        // Check if slider id and class
        $hongo_slider_unique_id = ! empty( $hongo_lightbox_unique_id ) ? $hongo_lightbox_unique_id : 1;
        $navigation_unique_id = $hongo_lightbox_unique_id;
        $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'image-slider-'. $hongo_lightbox_unique_id;

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $image_gallery_type;

    	// Image size
        $hongo_image_srcset  = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';
		$explode_image = ! empty( $image_gallery ) ? explode( ",", $image_gallery ) : array();

		// Column Animation
		$hongo_column_animation_style = ( $hongo_column_animation_style ) && $hongo_column_animation_style != 'none' ? ' wow '.$hongo_column_animation_style : '';
		$hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        $pagination_style_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';

        // Responsive typography
        $hongo_font_zoom_text_class = ! empty( $hongo_font_zoom_text ) ? hongo_shortcode_custom_css_class( $hongo_font_zoom_text ) : '';
        $font_setting_class_title    = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_title   .= ( $additional_font_title == '1' ) ? ' alt-font' : '';

        // Pagination Color & Active Color
        if ( $hongo_show_pagination == 1 ) {
	        if ( $show_pagination_style == 'swiper-pagination-border' ) {
				if ( ! empty( $hongo_pagination_color ) ) {
					$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet{ border-color:'.$hongo_pagination_color.'; }';
					if ( empty( $active_pagination_color ) ) {
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_pagination_color.'!important; }';
                    }
				}

		    	if ( ! empty( $hongo_active_pagination_color ) ) {
		    		$hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active{ border-color:'.$hongo_active_pagination_color.' }';
		    		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.'.$show_pagination_style. ' .swiper-pagination-bullet-active{ background-color:'.$hongo_active_pagination_color.'!important; }';
		    	}
	        } else {
	        	$hongo_pagination_color = ( $hongo_pagination_color ) ? 'background-color:'.$hongo_pagination_color.';' : '';
	        	$hongo_active_pagination_color = ( $hongo_active_pagination_color ) ? 'background-color:'.$hongo_active_pagination_color.';' : '';

	        	if ( ! empty( $hongo_pagination_color ) ) {
	        		$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-pagination-bullet{ '.$hongo_pagination_color.' }';
	        		$hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-container-vertical .swiper-pagination-bullet{ '.$hongo_pagination_color.' }';
	        	}

	        	if ( ! empty( $hongo_active_pagination_color ) ) {
		    		$hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-pagination-bullet-active{ '.$hongo_active_pagination_color.' }';
		    	}
	        }
	    }

        $classes[] = ( $show_cursor_color_style ) ? $show_cursor_color_style : 'black-move';
        $classes[] = $hongo_slider_id;
        $classes[] = $pagination_style_class;

        // Add Custom Swiper Script
        if ( $image_gallery_type == 'image-carousel-style-1' && $hongo_show_pagination == 1 ) {

    		$swiper_config['pagination'] = array( 'el' => '.swiper-pagination','type' => 'bullets', 'clickable' => true );
		}

		if( $image_gallery_type == 'image-carousel-style-1' ) {
			$hongo_space_between_gap = ( $hongo_space_between_gap ) ? $hongo_space_between_gap : '10';
			$swiper_config['spaceBetween'] = intval( $hongo_space_between_gap );
		}

		if ( ( $image_gallery_type == 'image-carousel-style-1' || $image_gallery_type == 'image-carousel-style-2' ) && $hongo_show_navigation == 1 ) {

			$swiper_config['navigation'] = array( 'nextEl' => '.swiper-next-'. $navigation_unique_id, 'prevEl' => '.swiper-prev-'. $navigation_unique_id );
		}

		if ( $image_gallery_type == 'image-carousel-style-2' && $hongo_show_pagination == 1 ) {
			$class_name = '.swiper-pagination-' . $hongo_slider_id;
			$swiper_config['pagination'] = array( 'el' => esc_attr( $class_name ),'type' => 'bullets', 'clickable' => true );			
		}

		if ( $image_gallery_type == 'image-carousel-style-2' ){
			// Slide settings by devices
			$slides_per_view_desktop = $slides_per_view_mini_desktop = $slides_per_view_tablet = $slides_per_view_mobile = '1';
		}

		if ( $image_gallery_type == 'image-carousel-style-3' ) {
			$hongo_space_between_gap = ( $hongo_space_between_gap ) ? $hongo_space_between_gap : '0';
			// Free mode
		    if ( $hongo_freemode_slides == '1' ) {
				$swiper_config['freeMode'] = true;
		    }
		    // Center slide
	        if ( $hongo_center_slides ) {
	        	$swiper_config['centeredSlides'] = true;
	        }

	        $swiper_config['spaceBetween'] = intval( $hongo_space_between_gap );
	    }

	    $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        if( $transition_style && $transition_style != 'slide') { 
        	$swiper_config['effect'] = $transition_style;
        }

        // Slides per group 
        $slides_per_group = ( $slides_per_group ) ? $slides_per_group : '1';
        if ( $slides_per_group ) {
        
	    	$swiper_config['slidesPerGroup'] = intval( $slides_per_group );
        }

		$swiper_config['slidesPerView'] = intval( $slides_per_view_mobile );
        
        $swiper_config['breakpoints'] = array( '768' => array( 'slidesPerView' => intval( $slides_per_view_tablet ) ), '992' => array( 'slidesPerView' => intval( $slides_per_view_mini_desktop ) ), '1200' => array( 'slidesPerView' => intval( $slides_per_view_desktop ) ) );

        if ( $autoloop == 1 ) { 
        	$swiper_config['loop'] = true;
        	$swiper_config['autoplay'] = array ( 'delay' => intval( $slidedelay ), 'disableOnInteraction' => false );
        } else {
        	$swiper_config['autoplay'] = false;
        }
        if( $slidespeed ) {
        	$swiper_config['speed'] = intval( $slidespeed );
        }
        
        $swiper_config['watchOverflow'] = true;

        $slider_options = ! empty( $swiper_config ) ? json_encode( $swiper_config ) : '';

		// Class List
		$class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

		switch ( $image_gallery_type ) {

	     	case 'image-carousel-style-1':
	     		// Background hover color
	     		if ( ! empty( $hongo_background_hover_color ) ) {
	        		$hongo_featured_array[] =  '.'.$hongo_slider_id.' ul li .hongo-overlay{ background-color :'.$hongo_background_hover_color.' }';
	        	}
	        	// Zoom icon color
	        	if ( ! empty( $hongo_zoom_icon_color ) ) {
	        		$hongo_featured_array[] =  '.'.$hongo_slider_id.' ul li .gallery-hover-content i{ color :'.$hongo_zoom_icon_color.' }';
	        	}
	     		// Slide settings by devices
	     		$slides_per_view_desktop = ! empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '3';
		        $slides_per_view_mini_desktop = ! empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
		        $slides_per_view_tablet = ! empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
		        $slides_per_view_mobile = ! empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';
		        // Pagination bottom space
		        ( $hongo_show_pagination == 1 ) ? $class_list .= ' pagination-bottom-space' : '';

	     		if ( $explode_image ):
	     			$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container'.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
						$output .='<ul '.$id.' class="swiper-wrapper">';

							foreach ( $explode_image as $key => $value ) {

								$img_lightbox_caption 	= ! empty( $value ) ? hongo_option_lightbox_image_caption($value) : array();
								$img_lightbox_title 	= ! empty( $value ) ? hongo_option_lightbox_image_title($value) : array();
								$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '';
								$image_lightbox_title 	= ! empty( $img_lightbox_title['title'] ) ? ' title="'.esc_attr( $img_lightbox_title['title'] ).'"' : '';

								$hongo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

								$output .='<li class="swiper-slide'.esc_attr( $hongo_column_animation_style ).'"'.$hongo_animation_duration_attr.'>';
									if ( $lightbox_gallery == 1 ) {
							            $output .='<a href="'.esc_url( $hongo_full_url ).'" class="image-lightbox-group-gallery-item" data-group="'.esc_attr( $hongo_lightbox_id ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
				        					$output .= '<figure>';
							        }
								        		$output .= '<div class="gallery-img bg-extra-dark-gray">';
								        			if ( ! empty( $value ) ) {
										        		$output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery' );
										        		$output .= '<div class="hongo-overlay"></div>';
											        }
			                                    $output .= '</div>';

						            if ( $lightbox_gallery == 1 ) {
			                                    $output .= '<figcaption>';
			                                        $output .= '<div class="gallery-hover-main text-center">';
			                                            $output .= '<div class="gallery-hover-box">';
			                                                $output .= '<div class="gallery-hover-content">';
			                                                    $output .= '<i class="ti-zoom-in text-white"></i>';
																$zoom_text = ( ! empty( $zoom_text ) ) ? $zoom_text : '';
																if ( ! empty( $zoom_text ) ) {
			                                                    	$output .= '<span class="alt-font'.$hongo_font_zoom_text_class.'">'. $zoom_text .'</span>';
			                                                    }
			                                                $output .= '</div>';
			                                            $output .= '</div>';
			                                        $output .= '</div>';
			                                    $output .= '</figcaption>';
			                                $output .= '</figure>';
							            $output .='</a>';
							        }
	                            $output .='</li>';
						    }

				        $output .='</ul>';

				        // Pagination
					    if ( $hongo_show_pagination == 1 ) {
                    		$class_name = 'swiper-pagination-' . $hongo_slider_id;
                    		$output .= '<div class="swiper-pagination ' . $class_name . $pagination_style_class . '"></div>';                    		
                		}

                		// Navigation
                		if ( $hongo_show_navigation == 1 ) {

	                        // Navigation color
	                        if ( ! empty( $hongo_navigation_color ) ) {
	                            $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i{ color:'.$hongo_navigation_color.'; }';
	                        }

                			$output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-'.$navigation_unique_id.'"></i></div><div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-'.$navigation_unique_id.'"></i></div>';                			
                		}

				    $output .= '</div>';
			    endif;
			break;

			case 'image-carousel-style-2':
				
	     		if ( $explode_image ):
	     			$output .= '<div id="'.$hongo_slider_id.'" class="swiper-container '.esc_attr( $class_list ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';
						$output .='<div '.$id.' class="swiper-wrapper">';

	                    	$i = 0;
							foreach ( $explode_image as $key => $value ) {

	                        	$i++;

								$output .='<div class="swiper-slide'.esc_attr( $hongo_column_animation_style ).'"'.$hongo_animation_duration_attr.'>';
						        		$output .= '<div class="gallery-img">';
								        	if ( ! empty( $value ) ) {
								        		$output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery' );
										    }
	                                    $output .= '</div>';
	                            $output .='</div>';
						    }

				        $output .='</div>';

				        // Pagination
					    if ( $hongo_show_pagination == 1 ) {
                    		$class_name = 'swiper-pagination-' . $hongo_slider_id;
                    		$output .= '<div class="swiper-pagination ' . esc_attr( $class_name ) . esc_attr( $pagination_style_class ) . '"></div>';
                		}

                		// Navigation
                		if ( $hongo_show_navigation == 1 ) {

	                        // Navigation color
	                        if ( ! empty( $hongo_navigation_color ) ) {
	                            $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i{ color:'.$hongo_navigation_color.'; }';
	                        }

                			$output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-'.$navigation_unique_id.'"></i></div><div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-'.$navigation_unique_id.'"></i></div>';
                		}

				    $output .= '</div>';
			    endif;
			break;

			case 'image-carousel-style-3':
				// Image box shadow
				$hongo_image_box_shadow = ( $hongo_image_box_shadow ) ? 'hongo-image-box-shadow' : '';

				// Pagination bottom space
		        ( $hongo_show_pagination == 1 ) ? $class_list .= ' pagination-bottom-space' : '';
	     		$slides_per_view_desktop = ! empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '3';
		        $slides_per_view_mini_desktop = ! empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
		        $slides_per_view_tablet = ! empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
		        $slides_per_view_mobile = ! empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

		        // Title heading tag        
                $title_heading_tag = ! empty( $title_heading_tag ) ? $title_heading_tag : 'div';

				if ( ! empty( $hongo_image_slides ) ) {

					$hongo_image_slides = json_decode( urldecode( $hongo_image_slides ) );

					$output .= '<div class="swiper-image-wrapper">';
						$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-container' .esc_attr( $class_list ). '" data-slider-options="' . esc_attr( $slider_options ) . '">';

			                $output .= '<div '.$id.' class="swiper-wrapper">';

			                    if ( ! empty( $hongo_image_slides ) ) {

			                        foreach( $hongo_image_slides as $slide ) {

			                        	$hongo_enable_box_link = ! empty( $slide->hongo_enable_box_link ) ? $slide->hongo_enable_box_link : '';
			                        	$hongo_box_link_url = ! empty( $slide->hongo_box_link_url ) ? $slide->hongo_box_link_url : '';
			                        	$hongo_box_link_target  = isset( $slide->hongo_box_link_target ) ? ' target="'.$slide->hongo_box_link_target.'"' : '';

			                        	if ( ! empty( $slide->hongo_image ) || ! empty( $slide->hongo_title ) ) {
				                            $output .= '<div class="swiper-slide">';

					                            if ( $hongo_enable_box_link == '1' && ( $hongo_box_link_url ) ) {
					                            	$output .= '<a'.$hongo_box_link_target.' href="'.esc_url( $hongo_box_link_url ).'">';
					                            }
						                            if ( ! empty( $slide->hongo_image ) ) {

						                                $output .= hongo_get_image_html( $slide->hongo_image, $slide->hongo_image_srcset, $hongo_image_box_shadow );
						                            }

						                            if ( ! empty( $slide->hongo_title ) ) {

						                                $output .= '<'.$title_heading_tag.' class="image-carousel-title'.$font_setting_class_title.'">';
						                                	$output .= $slide->hongo_title;
						                                $output .= '</'.$title_heading_tag.'>';
						                            }

						                        if ( $hongo_enable_box_link == '1' && ( $hongo_box_link_url ) ) {
						                        	$output .= '</a>';
					                            }

					                        $output .= '</div>';
					                    }
			                        }
			                    }

			                $output .= '</div>';

			                // Navigation
	                		if ( $hongo_show_navigation == 1 ) {

		                        // Navigation color
		                        if ( ! empty( $hongo_navigation_color ) ) {
		                            $hongo_featured_array[] =  '.'.$hongo_slider_id.' .swiper-button-next i,.'.$hongo_slider_id. ' .swiper-button-prev i{ color:'.$hongo_navigation_color.'; }';
		                        }

	                			$output .= '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right swiper-next-'.$navigation_unique_id.'"></i></div><div class="swiper-button-prev"><i class="fa-solid fa-chevron-left swiper-prev-'.$navigation_unique_id.'"></i></div>';
	                		}

				        	// Pagination
						    if ( $hongo_show_pagination == 1 ) {
	                    		$class_name = 'swiper-pagination-' . $hongo_slider_id;
	                    		$output .= '<div class="swiper-pagination ' . esc_attr( $class_name ) . esc_attr( $pagination_style_class ) . '"></div>';
	                		}

			            $output .= '</div>';
			        $output .= '</div>';
			    }			    
                
			break;
		}
		
        // Add custom script start
			if ( hongo_load_javascript_by_key( 'swiper' ) ) {
			ob_start();
				if ( hongo_load_javascript_by_key( 'jquery-magnific-popup' ) ) {
	        ?>
		        var lightboxgallerygroups = {}; $('.image-lightbox-group-gallery-item').each(function () { var id = $(this).attr('data-group'); if (!lightboxgallerygroups[id]) { lightboxgallerygroups[id] = []; } lightboxgallerygroups[id].push(this); }); $.each(lightboxgallerygroups, function () { var index; $(this).magnificPopup({ type: 'image', closeOnContentClick: true, closeBtnInside: false, gallery: { enabled: true }, image: { titleSrc: function (item) { var title = ''; var lightbox_caption = ''; if( item.el.attr('title') ){ title = item.el.attr('title'); } if( item.el.attr('data-lightbox-caption') ){ lightbox_caption = '<span class="hongo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>'; } return title + lightbox_caption; } }, callbacks: { change: function() { index = this.index; }, close: function() {} } }); }); <?php } ?> 
	        <?php 
	    	$hongo_slider_script .= ob_get_contents();
	    	ob_end_clean();
	    }
        // Add custom script End

		return $output;
	}
}
add_shortcode( 'hongo_image_carousel', 'hongo_image_carousel_shortcode' );
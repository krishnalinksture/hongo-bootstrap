<?php
/**
 * Shortcode For Image gallery
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_image_gallery_shortcode' ) ) {
	function hongo_image_gallery_shortcode( $atts, $content = null ) { 

        global $hongo_lightbox_unique_id, $hongo_slider_script, $hongo_justified_gallery_unique_id, $hongo_featured_array;

		extract( shortcode_atts( array(
		        'id' => '',
		        'class' => '',

	        	'image_gallery_type' => '',
	        	'hongo_gutter_type' => '',
	        	'hongo_justified_gallery_gap' => '10',
	        	'justified_title' => '1',
	        	'hongo_justified_gallery_height' =>'400',
	        	'hongo_justified_last_row' => 'nojustify',
	        	'hongo_column' => '3',
	        	'image_gallery' => '',
	        	'hongo_image_srcset' => 'full',
	        	'hongo_column_animation_style' => '',
            	'hongo_animation_delay' => '',
            	'hongo_animation_duration' => '',
            	'hongo_enable_zoom' => '1',
	        	'lightbox_gallery' => '1',
	        	'hongo_show_metro' => '',
	            'hongo_double_grid_position' => '',

	        	'hongo_icon_color'=> '',
	        	'hongo_icon_bg_color' => '',
	        	'hongo_box_hover_bg_color' => '',

	        	'css' => '',
	            'hongo_enable_responsive_css' => '',
	            'responsive_css' => '',
	            'hongo_bg_image_type' => '',
	            'desktop_bg_image_position' => '',
	    ), $atts ) );

		$output = $classes_desktop = $classes_ipad = $classes_masonry = $class_list = '';
		$classes = array();

        // Check if lightbox id and class
        $hongo_lightbox_unique_id  = ! empty( $hongo_lightbox_unique_id ) ? $hongo_lightbox_unique_id : 1;
        $hongo_lightbox_id = ! empty( $id ) ? $id : 'hongo-lightbox';
        $hongo_lightbox_id .= '-' . $hongo_lightbox_unique_id;
        $hongo_lightbox_unique_id++;

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $image_gallery_type;
        $classes[]  = $hongo_lightbox_id;

        $hongo_image_srcset  = ! empty( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';
		$explode_image = ! empty( $image_gallery ) ? explode( ",", $image_gallery ) : array();

		// Column Animation
		$hongo_column_animation_style = ( $hongo_column_animation_style ) && $hongo_column_animation_style != 'none' ? ' wow '.$hongo_column_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? $hongo_animation_delay : '0';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? $hongo_animation_duration : '0';

		// Grid column
        $hongo_column = ! empty( $hongo_column ) ? ' work-'.$hongo_column.'col' : '';

        // Background Image
        ! empty( $hongo_bg_image_type ) ? $classes[] = $hongo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Metro Gallery
        ( $hongo_show_metro == 1 ) ? $classes[] = 'image-gallery-metro-grid' : '';
        $double_grid_position = $hongo_show_metro == 1 && ! empty( $hongo_double_grid_position ) ? explode(',', $hongo_double_grid_position) : array();

        // CSS Box
        $css_class = ( ! empty( $css ) ) ? vc_shortcode_custom_css_class( $css, '' ) : '';
        ( $css_class ) ? $classes[] = $css_class : '';

        // Responsive CSS Box
        if( $hongo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {

            $classes[] = hongo_shortcode_custom_css_class( $responsive_css );
        }

        // Zoom Enable
		( $hongo_enable_zoom == 0 ) ? $classes[] = 'hongo-no-transition-image' : '';

		// Class List
		$class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

		if( $explode_image ) {

			switch ( $image_gallery_type ) {

		     	case 'masonry-gallery':

	     			$hongo_column .= ! empty( $hongo_gutter_type ) ? ' ' . $hongo_gutter_type : '';
	     			// Icon color
		            if ( ! empty($hongo_icon_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .grid-item .gallery-hover-content { color:'.$hongo_icon_color.'; }';
		            }
		            // Icon box background color
		            if ( ! empty($hongo_icon_bg_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .grid-item figcaption { background-color:'.$hongo_icon_bg_color.'; }';
		            }

					$output .='<ul '.$id.' class="image-gallery-grid'.esc_attr( $class_list ).esc_attr( $hongo_column ).'">';
    					$output .='<li class="grid-sizer"></li>';

                    	$i = 0;

						foreach ($explode_image as $key => $value) {

                        	$i++;

                        	// Grid Layout Class
                        	$grid_array = array();
	                        if( ! empty( $double_grid_position[$key] ) && ( $double_grid_position[$key] == '2-1' || $double_grid_position[$key] == '2-2' ) ) {
	                        	$grid_array[] = 'grid-item-double';
	                        }

	                        if( ! empty( $double_grid_position[$key] ) && trim( $double_grid_position[$key] ) != '*' ) {
                            	$grid_array[] = 'grid-item-' . $double_grid_position[$key];
	                        } else {
	                            $grid_array[] = 'grid-item-1-1';
	                        }

	                        $grid_class = ! empty( $grid_array ) ? ' '. implode( ' ', $grid_array ) : '';

							$img_lightbox_caption 	= ! empty( $value ) ? hongo_option_lightbox_image_caption($value) : array();
							$img_lightbox_title 	= ! empty( $value ) ? hongo_option_lightbox_image_title($value) : array();
							$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '';
							$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.esc_attr( $img_lightbox_title['title'] ).'"' : '';

						    $hongo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

							// Animation delay
							$hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
							$hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) && ( $i > 0 ) ? ' data-wow-duration="' . ( $hongo_animation_duration * $i ) . 'ms"' : '';


							if ( ! empty( $value ) ) {
								$output .='<li class="grid-item'.esc_attr( $grid_class ).esc_attr( $hongo_column_animation_style ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
									if( $lightbox_gallery == 1 ){
							            $output .='<a href="'.esc_url($hongo_full_url).'" class="lightbox-group-gallery-item" data-group="'.esc_attr( $hongo_lightbox_id ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
				        					$output .= '<figure>';
							        }
								        		$output .= '<div class="gallery-img bg-extra-dark-gray">';
								        			$output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery' );
			                                    $output .= '</div>';
						            if( $lightbox_gallery == 1 ){
			                                    $output .= '<figcaption>';
			                                        $output .= '<div class="gallery-hover-main text-center">';
			                                            $output .= '<div class="gallery-hover-box">';
			                                                $output .= '<div class="gallery-hover-content">';
			                                                    $output .= '<i class="ti-zoom-in"></i>';
			                                                $output .= '</div>';
			                                            $output .= '</div>';
			                                        $output .= '</div>';
			                                    $output .= '</figcaption>';
			                                $output .= '</figure>';
							            $output .='</a>';
							        }
	                            $output .='</li>';
	                        }
					    }
			        $output .='</ul>';
				break;

				case 'grid-gallery':

					$hongo_column .= ! empty( $hongo_gutter_type ) ? ' ' . $hongo_gutter_type : '';
					// Icon color
		            if ( ! empty($hongo_icon_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .grid-item .gallery-hover-content { color:'.$hongo_icon_color.'; }';
		            }
		            // Box hover background color
		            if ( ! empty($hongo_box_hover_bg_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .grid-item figcaption { background-color:'.$hongo_box_hover_bg_color.'; }';
		            }

					$output .='<ul '.$id.' class="image-gallery-grid'.esc_attr( $class_list ).esc_attr( $hongo_column ).'">';
    					$output .='<li class="grid-sizer"></li>';

                    	$i = 0;
						foreach ( $explode_image as $key => $value ) {

                        	$i++;
	                        // Grid Layout Class
                        	$grid_array = array();
	                        if( ! empty( $double_grid_position[$key] ) && ( $double_grid_position[$key] == '2-1' || $double_grid_position[$key] == '2-2' )){
	                        	$grid_array[] = 'grid-item-double';
	                        }

	                        if( ! empty( $double_grid_position[$key] ) && trim( $double_grid_position[$key] ) != '*' ) {
                            	$grid_array[] = 'grid-item-' . $double_grid_position[$key];
	                        } else {
	                            $grid_array[] = 'grid-item-1-1';
	                        }

	                        $grid_class = ! empty( $grid_array ) ? ' '. implode( ' ', $grid_array ) : '';

							$img_lightbox_caption 	= ! empty( $value ) ? hongo_option_lightbox_image_caption($value) : array();
							$img_lightbox_title 	= ! empty( $value ) ? hongo_option_lightbox_image_title($value) : array();
							$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '';
							$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.esc_attr( $img_lightbox_title['title'] ).'"' : '';

						    $hongo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

							// Animation delay
							$hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
							$hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) && ( $i > 0 ) ? ' data-wow-duration="' . ( $hongo_animation_duration * $i ) . 'ms"' : '';

							if ( ! empty( $value ) ) {
								$output .='<li class="grid-item'.esc_attr( $grid_class ).esc_attr( $hongo_column_animation_style ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
									if( $lightbox_gallery == 1 ){
							            $output .='<a href="'.esc_url($hongo_full_url).'" class="lightbox-group-gallery-item" data-group="'.esc_attr( $hongo_lightbox_id ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
				        					$output .= '<figure>';
							        }
								        		$output .= '<div class="gallery-img bg-extra-dark-gray">';
								        			$output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery' );
			                                    $output .= '</div>';
						            if( $lightbox_gallery == 1 ){
			                                    $output .= '<figcaption>';
			                                        $output .= '<div class="gallery-hover-main">';
			                                            $output .= '<div class="gallery-hover-box">';
			                                                $output .= '<div class="gallery-hover-content">';
			                                                    $output .= '<i class="ti-zoom-in"></i>';
			                                                $output .= '</div>';
			                                            $output .= '</div>';
			                                        $output .= '</div>';
			                                    $output .= '</figcaption>';
			                                $output .= '</figure>';
							            $output .='</a>';
							        }
	                            $output .='</li>';
                        	}
					    }
			        $output .='</ul>';
				break;

				case 'metro-gallery':

					$hongo_column .= ! empty( $hongo_gutter_type ) ? ' ' . $hongo_gutter_type : '';
					// Icon color
		            if ( ! empty($hongo_icon_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .hongo-grid-item .gallery-hover-content { color:'.$hongo_icon_color.'; }';
		            }
		            // Box hover background color
		            if ( ! empty($hongo_box_hover_bg_color) ) {
		                $hongo_featured_array[] = '.'.$hongo_lightbox_id. ' .hongo-grid-item figcaption { background-color:'.$hongo_box_hover_bg_color.'; }';
		            }

					$output .='<ul '.$id.' class="metro-grid hongo-shop-grid'.$hongo_column.$class_list.'">';
    					$output .='<li class="hongo-grid-sizer"></li>';

                    	$i = 0;
						foreach ($explode_image as $key => $value) {

                        	$i++;
	                        
	                        // Grid Layout Class
                        	$grid_array = array();
	                        if( ! empty( $double_grid_position[$key] ) && ( $double_grid_position[$key] == '2-1' || $double_grid_position[$key] == '2-2' )){
	                        	$grid_array[] = 'grid-item-double';
	                        }

	                        if( ! empty( $double_grid_position[$key] ) && trim( $double_grid_position[$key] ) != '*' ) {
                            	$grid_array[] = 'grid-item-' . $double_grid_position[$key];
	                        } else {
	                            $grid_array[] = 'grid-item-1-1';
	                        }

	                        $grid_class = ( ! empty( $grid_array ) ) ? ' '.implode( ' ', $grid_array ) : '';

							$img_lightbox_caption 	= ! empty( $value ) ? hongo_option_lightbox_image_caption($value) : array();
							$img_lightbox_title 	= ! empty( $value ) ? hongo_option_lightbox_image_title($value) : array();
							$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '';
							$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.esc_attr( $img_lightbox_title['title'] ).'"' : '';

						    $hongo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

							// Animation delay
							$hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
							$hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) && ( $i > 0 ) ? ' data-wow-duration="' . ( $hongo_animation_duration * $i ) . 'ms"' : '';

							if ( ! empty( $value ) ) {
								$output .='<li class="hongo-grid-item'.esc_attr( $grid_class ).esc_attr( $hongo_column_animation_style ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
						        	$output .= '<div class="hongo-shop-grid-wrap">';
						        		$output .= '<div class="hongo-shop-grid-img">';

							           		if( $lightbox_gallery == 1 ){
							            		$output .='<a href="'.esc_url( $hongo_full_url ).'" class="lightbox-group-gallery-item" data-group="'.esc_attr( $hongo_lightbox_id ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
				        							$output .= '<figure>';
							        		}
								        				$output .= '<div class="gallery-img bg-extra-dark-gray">';
			                                    			$output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery' );
			                                    		$output .= '</div>';

						            		if( $lightbox_gallery == 1 ){
		                                    			$output .= '<figcaption>';
		                                        			$output .= '<div class="gallery-hover-main">';
		                                            			$output .= '<div class="gallery-hover-box">';
		                                                			$output .= '<div class="gallery-hover-content">';
		                                                    			$output .= '<i class="ti-zoom-in"></i>';
		                                                			$output .= '</div>';
		                                            			$output .= '</div>';
		                                        			$output .= '</div>';
		                                    			$output .= '</figcaption>';
			                                		$output .= '</figure>';
							            		$output .='</a>';
							        		}
							        	$output .= '</div>';
	                                $output .= '</div>';
	                            $output .='</li>';
	                        }
					    }
			        $output .='</ul>';
				break;

				case 'justified-gallery':

					// Justified gallery height
					$hongo_justified_gallery_height = ! empty( $hongo_justified_gallery_height ) ? $hongo_justified_gallery_height : '400';
					// Justified last row
					$hongo_justified_last_row = ! empty( $hongo_justified_last_row ) ? $hongo_justified_last_row : 'nojustify';
					// Justified gallery class for lighbox
					$justified_lightbox_gallery = ($lightbox_gallery == 1) ? ' lightbox-group-gallery-item' : '';

		            $output .= '<div '.$id.' class="'.esc_attr( $class_list ).'" data-height="'.esc_attr( $hongo_justified_gallery_height ).'" data-spacing="'.esc_attr( $hongo_justified_gallery_gap ).'" data-uniqueid="'.esc_attr( $hongo_lightbox_id ).'">';
	                	$i = 0;

	                	foreach ( $explode_image as $key => $value ) {
	                    	$i++;

							$img_lightbox_caption 	= ! empty( $value ) ? hongo_option_lightbox_image_caption($value) : array();
							$img_lightbox_title 	= ! empty( $value ) ? hongo_option_lightbox_image_title($value) : array();
							$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '';
							$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.esc_attr( $img_lightbox_title['title'] ).'"' : '';

						    $hongo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

						    if( $justified_title != 1  ) {
								$image_lightbox_caption = '';
								$image_lightbox_title = '';
							}

							// Animation delay
							$hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
							$hongo_animation_duration_attr = ! empty( $hongo_animation_duration ) && ( $i > 0 ) ? ' data-wow-duration="' . ( $hongo_animation_duration * $i ) . 'ms"' : '';

							if ( ! empty( $value ) ) {
				        		$output .= '<a class="gallery-link'.$justified_lightbox_gallery.$hongo_column_animation_style.'" href="'.esc_url($hongo_full_url).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.$image_lightbox_title.$image_lightbox_caption.' data-group="'.esc_attr( $hongo_lightbox_id ).'">';
		                            $output .= hongo_get_image_html( $value, $hongo_image_srcset, 'project-img-gallery skip-lazy' );
										$justified_title = ! empty( $justified_title ) ? $justified_title : '';
										$caption_title='';
		                             	if( $justified_title == 1 && ! empty( $img_lightbox_caption['caption'] ) ) {
		                                	$output .= '<div class="caption">';
		                                    	   $output .= '<div class="entry-title">'.$img_lightbox_caption['caption'].'</div>';
		                                	$output .= '</div>';
		                                	$caption_title='captions: true,';
		                                }
		                        $output .= '</a>';
		                    }
					    }
					$output .= '</div>';
					if( hongo_load_javascript_by_key( 'jquery-justifiedGallery' ) ) {

            			// justifiedGallery JS
						wp_enqueue_script( 'jquery-justifiedGallery' );

						ob_start(); ?>
			                $(document).imagesLoaded(function () { if ($('.<?php echo esc_attr( $hongo_lightbox_id ); ?>').length > 0) { $('.<?php echo esc_attr($hongo_lightbox_id ); ?>').justifiedGallery({ lastRow: '<?php echo $hongo_justified_last_row; ?>',rowHeight: <?php printf( '%s', $hongo_justified_gallery_height ); ?>, maxRowHeight: false, <?php echo esc_attr( $caption_title ); ?> margins: <?php printf( '%s',$hongo_justified_gallery_gap ); ?>, waitThumbnailsLoad: true }); } });
			                <?php 
			                $hongo_slider_script .= ob_get_contents();
		                ob_end_clean();
		            }
				break;
			}
		}

		return $output;
	}
}
add_shortcode( 'hongo_image_gallery', 'hongo_image_gallery_shortcode' );
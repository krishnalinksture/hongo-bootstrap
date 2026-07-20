<?php
/**
 * Displaying in gallery for archive page
 *
 * @package Hongo
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_srcset_archive 		= get_theme_mod( 'hongo_image_srcset_archive', 'full' );
	$hongo_blog_lightbox_gallery= hongo_post_meta( 'hongo_lightbox_image' );
	$hongo_blog_gallery 		= hongo_post_meta( 'hongo_gallery' );
	$hongo_gallery 				= explode( ',', $hongo_blog_gallery );
	$hongo_popup_id 			= 'blog-'.get_the_ID();
	if ( $hongo_blog_lightbox_gallery == 1 ) {
?>
		<ul class="blog-post-gallery-grid hover-option4 gutter-small lightbox-gallery">
		<?php if ( is_array( $hongo_gallery ) ) { ?>
			<li class="grid-sizer col-md-4 col-sm-6 col-xs-12"></li>
			<?php
				foreach ( $hongo_gallery as $key => $value ) {
					/* Image Alt, Title, Caption */
					$hongo_img_alt 				= hongo_option_image_alt($value);
					$hongo_img_title 			= hongo_option_image_title($value);
					$hongo_img_lightbox_caption = hongo_option_lightbox_image_caption($value);
					$hongo_img_lightbox_title 	= hongo_option_lightbox_image_title($value);
					$hongo_image_alt 			= ! empty( $hongo_img_alt['alt'] ) ? ' alt="'.esc_attr( $hongo_img_alt['alt'] ).'"' : ' alt="'. esc_attr__( 'Image', 'hongo' ) .'"';
					$hongo_image_title 			= ( isset($hongo_img_title['title']) && ! empty($hongo_img_title['title']) ) ? ' title="'.esc_attr($hongo_img_title['title']).'"' : '';
					$hongo_image_lightbox_caption = ( isset($hongo_img_lightbox_caption['caption']) && ! empty($hongo_img_lightbox_caption['caption']) ) ? ' data-lightbox-caption="'.esc_attr($hongo_img_lightbox_caption['caption']).'"' : '';
					$hongo_image_lightbox_title = ( isset($hongo_img_lightbox_title['title']) && ! empty($hongo_img_lightbox_title['title']) ) ? ' title="'.esc_attr($hongo_img_lightbox_title['title']).'"' : ''; 
					$hongo_thumb 				= wp_get_attachment_image_src( $value, $hongo_srcset_archive );
					$hongo_full_url 			= wp_get_attachment_image_src( $value, 'full' );
					if( $hongo_thumb[0] ) {
								
	            		// Get Image Srcset and Sizes
	            		$srcset_data = hongo_get_image_srcset_sizes( $value, $hongo_srcset_archive );
	       	?>

                		<li class="col-md-4 col-sm-6 col-xs-12 grid-item">
                			<a class="lightboxgalleryitem" data-group="<?php echo esc_attr( $hongo_popup_id ); ?>"<?php echo sprintf( '%s%s', $hongo_image_lightbox_title, $hongo_image_lightbox_caption ); ?> href="<?php echo esc_url( $hongo_full_url[0] ); ?>">
	                			<figure>
		                    		<div class="blog-post-gallery-img">
		                    			<img src="<?php echo esc_url( $hongo_thumb[0] ); ?>" class="project-img-gallery" width="<?php echo esc_attr( $hongo_thumb[1] ); ?>" height="<?php echo esc_attr( $hongo_thumb[2] ); ?>" <?php echo sprintf( '%s%s%s', $hongo_image_alt, $hongo_image_title, $srcset_data ); ?>/>
		                    		</div>
			                    	<figcaption>
				                        <div class="blog-post-gallery-hover-main text-center">
				                            <div class="blog-post-gallery-hover-box">
				                                <div class="blog-post-gallery-hover-content">
				                                    <i class="ti-plus"></i>
				                                </div>
				                            </div>
				                        </div>
			                    	</figcaption>
		                		</figure>
		            		</a>
                		</li>
            <?php
            		}
				}
		} ?>
    	</ul>
    <?php } else { ?>
		<div class="blog-image">        	
        	<div class="swiper-full-screen swiper-container white-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "autoplay": { "delay": 1000 }, "keyboard": { "enabled": true, "onlyInViewport": false }, "preventClicks": false, "watchOverflow": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" } }'>
        		<div class="swiper-wrapper">
        			<?php
						if ( is_array( $hongo_gallery ) ) {
							foreach( $hongo_gallery as $key => $value ) {
								$hongo_thumb 		= wp_get_attachment_image_src( $value, $hongo_srcset_archive );
								/* Image Alt, Title, Caption */
								$hongo_img_alt 		= hongo_option_image_alt( $value );
								$hongo_img_title 	= hongo_option_image_title( $value );
								$hongo_image_alt 	= ! empty( $hongo_img_alt['alt'] ) ? ' alt="'.esc_attr( $hongo_img_alt['alt'] ).'"' : ' alt="'. esc_attr__( 'Image', 'hongo' ) .'"';
								$hongo_image_title 	= ( isset( $img_title['title'] ) && ! empty( $hongo_img_title['title'] ) ) ? ' title="'.esc_attr( $hongo_img_title['title'] ).'"' : '';
								if ( $hongo_thumb[0] ) {
									// Get Image Srcset and Sizes
	            					$srcset_data = hongo_get_image_srcset_sizes( $value, $hongo_srcset_archive );
	            	?>
				            		<div class="swiper-slide">
				            			<img src="<?php echo esc_url( $hongo_thumb[0] ); ?>" width="<?php echo esc_attr( $hongo_thumb[1] ); ?>" height="<?php echo esc_attr( $hongo_thumb[2] ); ?>"<?php echo sprintf( '%s%s%s', $hongo_image_alt, $hongo_image_title, $srcset_data ); ?> />
				           			</div>
				        <?php
								}
							}
						}
					?>
				</div>
				<div class="swiper-pagination swiper-pagination-square swiper-pagination-white"></div>
				<div class="swiper-button-next swiper-button-black-highlight"></div>
		    	<div class="swiper-button-prev swiper-button-black-highlight"></div>
			</div>
    	</div>
    <?php
	}

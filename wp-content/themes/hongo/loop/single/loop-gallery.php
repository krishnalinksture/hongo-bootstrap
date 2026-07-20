<?php
/**
 * Displaying in gallery for single post
 *
 * @package Hongo
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_gallery = '';	
	$hongo_blog_lightbox_gallery = hongo_post_meta( 'hongo_lightbox_image' );
	$hongo_blog_gallery = hongo_post_meta( 'hongo_gallery' );
	if( ! empty( $hongo_blog_gallery ) ) {
		$hongo_gallery = explode( ',', $hongo_blog_gallery );
	}
	$hongo_popup_id = 'blog-'.get_the_ID();
	if( $hongo_blog_lightbox_gallery == 1 ) {
		if( ( is_array( $hongo_gallery ) ) || ( ! empty( $hongo_gallery ) ) ) {
?>
			<ul class="blog-post-gallery-grid hover-option4 gutter-small lightbox-gallery">
				<li class="grid-sizer col-md-4 col-sm-6 col-xs-12"></li>
				<?php
					foreach ( $hongo_gallery as $key => $value ) {
						/* Image Alt, Title, Caption */
						$hongo_img_alt 				= hongo_option_image_alt( $value );
						$hongo_img_title 			= hongo_option_image_title( $value );
						$hongo_img_lightbox_caption = hongo_option_lightbox_image_caption( $value );
						$hongo_img_lightbox_title 	= hongo_option_lightbox_image_title( $value );
						$hongo_image_alt 			= ! empty( $hongo_img_alt['alt'] ) ? ' alt="'.esc_attr( $hongo_img_alt['alt'] ).'"' : ' alt="'. esc_attr__( 'Image', 'hongo' ) .'"'; 
						$hongo_image_title 			= ( isset( $hongo_img_title['title'] ) && ! empty( $hongo_img_title['title'] ) ) ? ' title="'.esc_attr( $hongo_img_title['title'] ).'"' : '';
						$hongo_image_lightbox_caption = ( isset( $hongo_img_lightbox_caption['caption'] ) && ! empty( $hongo_img_lightbox_caption['caption'] ) ) ? ' data-lightbox-caption="'.esc_attr( $hongo_img_lightbox_caption['caption'] ).'"' : '';
						$hongo_image_lightbox_title = ( isset( $hongo_img_lightbox_title['title'] ) && ! empty( $hongo_img_lightbox_title['title'] ) ) ? ' title="'.esc_attr( $hongo_img_lightbox_title['title'] ).'"' : ''; 
						$hongo_thumb 				= wp_get_attachment_image_src( $value, 'full' );
						$hongo_full_url 			= wp_get_attachment_image_src( $value, 'full' );
						
						if( isset( $hongo_thumb[0] ) && $hongo_thumb[0] ) {

	                		// Get Image Srcset and Sizes
	            		$srcset_data = hongo_get_image_srcset_sizes( $value, 'full' );
	            		?>
	                			<li class="col-md-4 col-sm-6 col-xs-12 grid-item">
	                				<a class="lightboxgalleryitem" data-group="<?php echo esc_attr( $hongo_popup_id ); ?>"<?php echo sprintf( '%s%s', $hongo_image_lightbox_title, $hongo_image_lightbox_caption ); ?> href="<?php echo esc_url( $hongo_full_url[0] ); ?>">
		                				<figure>
			                    			<div class="blog-post-gallery-img">
			                    				<img src="<?php echo esc_url( $hongo_thumb[0] ); ?>" class="project-img-gallery" width="<?php echo esc_attr( $hongo_thumb[1] ); ?>" height="<?php echo esc_attr( $hongo_thumb[2] ); ?>"<?php echo sprintf( '%s%s%s', $hongo_image_alt, $hongo_image_title, $srcset_data ); ?> />
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
					} ?>
			</ul>
		<?php }
	} else {
		if( ( is_array($hongo_gallery ) ) || ( ! empty( $hongo_gallery ) ) ) {
		?>
			<div class="blog-image hongo-post-format-wrap">
    			<div class="swiper-full-screen swiper-container white-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "autoplay": { "delay": 1000 }, "keyboard": { "enabled": true, "onlyInViewport": false }, "preventClicks": false, "watchOverflow": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" } }'>
    				<div class="swiper-wrapper">
    				<?php
						foreach ( $hongo_gallery as $key => $value ) {
							$hongo_thumb 		= wp_get_attachment_image_src( $value, 'full' );
							/* Image Alt, Title, Caption */
							$hongo_img_alt 		= hongo_option_image_alt( $value );
							$hongo_img_title 	= hongo_option_image_title( $value );

							$hongo_image_alt 	= ! empty( $hongo_img_alt['alt'] ) ? ' alt="' . esc_attr( $hongo_img_alt['alt'] ) . '"' : ' alt="' . esc_attr__( 'Image', 'hongo' ) .'"';
							$hongo_image_title 	= ( isset( $img_title['title'] ) && ! empty( $hongo_img_title['title'] ) ) ? ' title="'.esc_attr($hongo_img_title['title']).'"' : '';
							if( isset( $hongo_thumb[0] ) && $hongo_thumb[0] ) {

				                // Get Image Srcset and Sizes
		            			$srcset_data = hongo_get_image_srcset_sizes( $value, 'full' );
		            ?>
			            		<div class="swiper-slide">
			            			<img src="<?php echo esc_url( $hongo_thumb[0] ); ?>" width="<?php echo esc_attr( $hongo_thumb[1] ); ?>" height="<?php echo esc_attr( $hongo_thumb[2] ); ?>"<?php echo sprintf( '%s%s%s', $hongo_image_alt, $hongo_image_title, $srcset_data ); ?> />
			            		</div>
							<?php }
						} ?>
					</div>
					<div class="swiper-pagination swiper-pagination-border swiper-pagination-white"></div>
			    	<div class="swiper-button-next swiper-button-white-highlight"><i class="fa-solid fa-chevron-right"></i></div>
			    	<div class="swiper-button-prev swiper-button-white-highlight"><i class="fa-solid fa-chevron-left"></i></div>
				</div>
			</div>
		<?php
		}
	}

	$hongo_blog_image = hongo_option( 'hongo_featured_image', '1' );

	if( $hongo_blog_image == 1 ) {
		if ( has_post_thumbnail() ) {
	?>
			<div class="blog-image">
        		<?php the_post_thumbnail( 'full' ); ?>
			</div>
	<?php
		}
	}

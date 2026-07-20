<?php
/**
 * displaying in gallery for blog
 *
 * @package Hongo
 */
?>
<?php
global $hongo_srcset;	
$hongo_blog_lightbox_gallery = hongo_post_meta('hongo_lightbox_image');
$hongo_blog_gallery = hongo_post_meta('hongo_gallery');
$hongo_gallery = explode(",",$hongo_blog_gallery);
$hongo_popup_id = 'blog-'.get_the_ID();
if( $hongo_blog_lightbox_gallery == 1 ){
	echo '<ul class="blog-post-gallery-grid hover-option4 gutter-small lightbox-gallery">';
	if( is_array($hongo_gallery) ){
		echo '<li class="grid-sizer col-md-4 col-sm-6 col-xs-12"></li>';
		foreach ( $hongo_gallery as $key => $value ) {
			/* Image Alt, Title, Caption */
			$hongo_img_alt = hongo_option_image_alt($value);
			$hongo_img_title = hongo_option_image_title($value);
			$hongo_img_lightbox_caption = hongo_option_lightbox_image_caption($value);
			$hongo_img_lightbox_title = hongo_option_lightbox_image_title($value);
			$hongo_image_alt = ( isset($hongo_img_alt['alt']) && ! empty($hongo_img_alt['alt']) ) ? 'alt="'.esc_attr($hongo_img_alt['alt']).'"' : 'alt=""'; 
			$hongo_image_title = ( isset($hongo_img_title['title']) && ! empty($hongo_img_title['title']) ) ? ' title="'.esc_attr($hongo_img_title['title']).'"' : '';
			$hongo_image_lightbox_caption = ( isset($hongo_img_lightbox_caption['caption']) && ! empty($hongo_img_lightbox_caption['caption']) ) ? ' data-lightbox-caption="'.esc_attr($hongo_img_lightbox_caption['caption']).'"' : '';
			$hongo_image_lightbox_title = ( isset($hongo_img_lightbox_title['title']) && ! empty($hongo_img_lightbox_title['title']) ) ? ' title="'.esc_attr($hongo_img_lightbox_title['title']).'"' : ''; 
			$hongo_thumb = wp_get_attachment_image_src( $value, $hongo_srcset );
			if($hongo_thumb){
				
				// Get Image srcset
	            $srcset_data = hongo_get_image_srcset_sizes( $value, $hongo_srcset );

                echo '<li class="col-md-4 col-sm-6 col-xs-12 grid-item">';
                	echo '<a class="lightboxgalleryitem" data-group="'.esc_attr($hongo_popup_id).'" '.$hongo_image_lightbox_title.$hongo_image_lightbox_caption.' href="'.esc_url($hongo_thumb[0]).'">';
	                	echo '<figure>';
		                    echo '<div class="portfolio-img bg-extra-dark-gray">';
		                    	echo '<img src="'.esc_url($hongo_thumb[0]).'" class="project-img-gallery" width="'.$hongo_thumb[1].'" height="'.$hongo_thumb[2].'" '.$hongo_image_alt.$hongo_image_title.$srcset_data.'/>';
		                    echo '</div>';
		                    echo '<figcaption>';
		                        echo '<div class="blog-post-gallery-hover-main text-center">';
		                            echo '<div class="blog-post-gallery-hover-box">';
		                                echo '<div class="blog-post-gallery-hover-content">';
		                                    echo '<i class="ti-plus"></i>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</figcaption>';
		                echo '</figure>';
		            echo '</a>';
                echo '</li>';

            }
		}
	}
    echo '</ul>';
} else{
	echo '<div class="blog-image post-type-slider">';
        echo '<div class="swiper-full-screen swiper-container white-move" data-slider-options=\'{ "pagination": ".swiper-pagination", "clickable": true, "loop": true, "autoplay": { "delay": 1000 }, "slidesPerView": 1, "keyboard": { "enabled": true, "onlyInViewport": false }, "preventClicks": false, "watchOverflow": true, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev"} }\'>';        
        	echo '<div class="swiper-wrapper">';
				if( is_array($hongo_gallery) ){
					foreach ( $hongo_gallery as $key => $value ) {
						$hongo_thumb = wp_get_attachment_image_src( $value, $hongo_srcset );
						/* Image Alt, Title, Caption */
						$hongo_img_alt = hongo_option_image_alt($value);
						$hongo_img_title = hongo_option_image_title($value);

						$hongo_image_alt = ( isset($hongo_img_alt['alt']) && ! empty($hongo_img_alt['alt']) ) ? 'alt="'.esc_attr($hongo_img_alt['alt']).'"' : 'alt=""'; 
						$hongo_image_title = ( isset($img_title['title']) && ! empty($hongo_img_title['title']) ) ? ' title="'.esc_attr($hongo_img_title['title']).'"' : '';
						if( $hongo_thumb ){

				            // Get Image srcset
	            			$srcset_data = hongo_get_image_srcset_sizes( $value, $hongo_srcset );

				            echo '<div class="swiper-slide"><img src="'.esc_url($hongo_thumb[0]).'" width="'.$hongo_thumb[1].'" height="'.$hongo_thumb[2].'" '.$hongo_image_alt.$hongo_image_title.$srcset_data.' /></div>';
						}
					}
				}
			echo '</div>';
			echo '<div class="swiper-pagination swiper-pagination-border swiper-pagination-white"></div>';
		    echo '<div class="swiper-button-next swiper-button-white-highlight"><i class="fa-solid fa-chevron-right"></i></div>';
		    echo '<div class="swiper-button-prev swiper-button-white-highlight"><i class="fa-solid fa-chevron-left"></i></div>';
		echo '</div>';
    echo '</div>';
}

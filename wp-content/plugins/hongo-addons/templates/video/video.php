<?php
/**
 * Single Product Video Modules
 *
 * This template can be overridden by copying it to yourtheme/hongo/single-product/video.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if( $video_type != '' ) {
	switch ( $video_type ) {

		case 'vimeo':
			if( $vimeo_video ) {
				echo '<a data-placement="left" data-original-title="'.esc_attr__( 'Watch Video', 'hongo-addons' ).'" class="hongo-single-product-video-play-button product-img-btn" href="'.esc_url( $vimeo_video ).'">';
					echo '<img draggable="false" alt="zoom-play" src='.HONGO_ADDONS_ROOT_DIR.'/assets/images/zoom-play.svg>';
				echo '</a>';
			}
		break;

		case 'youtube':
			if( $youtube_video ){
				echo '<a data-placement="left" data-original-title="'.esc_attr__( 'Watch Video', 'hongo-addons' ).'" class="hongo-single-product-video-play-button product-img-btn" href="'.esc_url( $youtube_video ).'">';
					echo '<img draggable="false" alt="zoom-play" src='.HONGO_ADDONS_ROOT_DIR.'/assets/images/zoom-play.svg>';
				echo '</a>';
			}
		break;

		case 'html5':
            $single_product_video_popup = 'single_product_video_popup';

            if( $mp4_video && $ogg_video && $webm_video ) {	            
	            echo '<a data-placement="left" data-original-title="'.esc_attr__( 'Watch Video', 'hongo-addons' ).'" class="hongo-single-product-video product-img-btn" href="#'.$single_product_video_popup.'">';
					echo '<img draggable="false" alt="zoom-play" src='.HONGO_ADDONS_ROOT_DIR.'/assets/images/zoom-play.svg>';
				echo '</a>';

				echo '<div id="'.$single_product_video_popup.'" class="hongo-single-product-play-video mfp-hide">';
		            echo '<video loop controls class="hongo-single-product-video">';
		            	if( $mp4_video ){
		            		echo '<source type="video/mp4" src="'. esc_url( $mp4_video ) .'">';
		            	}
		            	if( $ogg_video ){
		            		echo '<source type="video/ogg" src="'. esc_url( $ogg_video ) .'">';
		            	}
		            	if( $webm_video ){
		            		echo '<source type="video/webm" src="'. esc_url( $webm_video ) .'">';
		            	}
		            echo '</video>';
		        echo '</div>';
		    }
        break;
	}
}

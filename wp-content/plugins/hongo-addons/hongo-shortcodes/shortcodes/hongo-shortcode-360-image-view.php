<?php
/**
 * Shortcode For 360 Image gallery
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* 360 Image gallery */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_360_image_view_shortcode' ) ) {
	function hongo_360_image_view_shortcode( $atts, $content = null ) { 

        global $hongo_slider_script, $hongo_360_unique_id;

		extract( shortcode_atts( array(
		        'id' => '',
		        'class' => '',
	        	'images_view' => '',
	    ), $atts ) );

		$output = $classes_desktop = $classes_ipad = $classes_masonry = $class_list = '';
		$classes = array();

        // Check if lightbox id and class
        $hongo_360_unique_id  = ! empty( $hongo_360_unique_id ) ? $hongo_360_unique_id : 1;
        $hongo_360_id = ! empty( $id ) ? $id : 'hongo-360';
        $hongo_360_id .= '-' . $hongo_360_unique_id;
        $hongo_360_unique_id++;

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $hongo_360_id;

		$explode_image = ! empty( $images_view ) ? explode( ',', $images_view ) : array();

		// Class List
		$class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';
		
		if ( ! empty( $explode_image ) && hongo_load_javascript_by_key( 'threesixty' ) ) {
            
            $gallery_urls = array();

            foreach( $explode_image as $gallery_id ) {
                $gallery_details = wp_get_attachment_image_src( $gallery_id ,'full' );
                $gallery_urls[] = wp_get_attachment_image_url( $gallery_id, 'full' );
            }

            $width = $gallery_details[1];
            $height = $gallery_details[2];
            $data_images = implode( ',', $gallery_urls );

            $output .= '<div id="'. esc_attr( $hongo_360_id ) .'" class="hongo-single-product-360'.esc_attr( $class_list ) .'">';
            	$output .= '<div class="hongo-all-images display-none" data-images="'.$data_images.'" data-width="'.$width.'" data-height="'.$height.'"></div>';
				$output .= '<div class="threesixty hongo_threesixty">';
					$output .= '<div class="spinner alt-font">';
					    $output .= '<span>0%</span>';
					$output .= '</div>';
					$output .= '<ol class="threesixty_images"></ol>';
				$output .= '</div>';
			$output .= '</div>';

			ob_start(); ?>
                var threesixtyimagesID = "<?php echo str_replace( '-', '_', $hongo_360_id ); ?>",mainId = "<?php echo esc_attr( $hongo_360_id ); ?>",all_images  = $( '#'+mainId+' .hongo-all-images' ).attr( 'data-images' ),height = $( '#'+mainId+' .hongo-all-images' ).attr( 'data-height' ),width = $( '#'+mainId+' .hongo-all-images' ).attr( 'data-width' ),images = all_images.split( ',' ),imgArray    = [];
                for( var i = 0; i < images.length; i++ ) { imgArray.push( images[i] ); }
                var hongo_threesixty = $( '#'+mainId+' .hongo_threesixty' ).ThreeSixty({ totalFrames: imgArray.length,endFrame: imgArray.length,currentFrame: 1,imgList: '.threesixty_images',progress: '.spinner',height: 800,width: width,playSpeed: 100,framerate: 10,navigation: true,disableSpin: true,imgArray: imgArray,responsive: true,showCursor: true,drag: true});
            <?php
            $hongo_slider_script .= ob_get_contents();
            ob_end_clean();
		}

		return $output;
	}
}
add_shortcode( 'hongo_360_image_view', 'hongo_360_image_view_shortcode' );
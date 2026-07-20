<?php
/**
 * Shortcode For Video
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_video_shortcode' ) ) {
    function hongo_video_shortcode( $atts, $content = null ) {
    	 extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_video_type' =>'',
            'hongo_youtube_url' =>'',
            'hongo_vimeo_url' => '',
            'mp4_video' => '',
            'ogg_video' => '',
            'webm_video' => '',
            'video_autoplay' => '0',
            'video_muted' => '1',
            'video_loop' => '1',
            'video_controls' => '1',
            'enable_responsive_video' => '1',
            'width' => '',
            'height' => '',

        ), $atts ) );
        $output = $style_attr = '';
        $classes = array();

        $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
        $muted = ( $video_muted == 1 ) ? ' muted' : '';
        $loop = ( $video_loop == 1 ) ? ' loop' : '';
        $controls = ( $video_controls == 1 ) ? ' controls' : '';

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';

        $video_class = ( $enable_responsive_video == 1 ) ? 'fit-videos' : 'without-fit-videos';

        // Class List
        $class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

        switch ( $hongo_video_type ) {
            case 'youtube-video':
                
                $width = $enable_responsive_video == 1 ? '560' : $width; // Its default width from youtube
                $height = $enable_responsive_video == 1 ? '315' : $height; // Its default 

            break;

            case 'vimeo-video':
                
                $width  = $enable_responsive_video == 1 ? '640' : $width; 
                $height = $enable_responsive_video == 1 ? '360' : $height; 

            break;

        }

        if ( $enable_responsive_video != 1 ) {
            $style_attr = ( $width ) ? 'width: ' . str_replace('px', '', $width) . 'px; ' : '';
            $style_attr .= ( $height ) ? 'height: ' . str_replace('px', '', $height) . 'px; ' : '';
            $style_attr = ! empty( $style_attr ) ? ' style="' . $style_attr . '"' : '';
        }

        $width  = ( $width ) ? ' width="'.str_replace('px', '', $width).'"' : '';
        $height = ( $height ) ? ' height="'.str_replace('px', '', $height).'"' : '';

        switch ( $hongo_video_type ) {

            case 'youtube-video':
                
                if ( $hongo_youtube_url ) {

                    $output .= '<div'.$id.' class="hongo-youtube '.esc_attr( $video_class ).esc_attr( $class_list ).'">';
                        $output .='<iframe'.$width.$height.' src="'.esc_url( $hongo_youtube_url ).'" allow="fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }

            break;
            
            case 'vimeo-video':
                
                if ( $hongo_vimeo_url ) {

                    $output .= '<div'.$id.' class="hongo-vimeo '.esc_attr( $video_class ).esc_attr( $class_list ).'">';
                        $output .='<iframe'.$width.$height.' src="'.esc_url($hongo_vimeo_url).'" allow="fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }

            break;

            case 'html5-video':
                
                if ( ! empty( $mp4_video ) || ! empty( $ogg_video ) || ! empty( $webm_video ) ) {
                    $output .= '<video'.$id.' '.$autoplay.$muted.$loop.$controls.' playsinline class="hongo-html5-video'.esc_attr( $class_list ).'">';
                        if ( ! empty( $mp4_video ) ) {
                            $output .= '<source type="video/mp4" src="'.esc_url($mp4_video).'">';
                        }
                        
                        if ( ! empty( $ogg_video ) ) {
                            $output .= '<source type="video/ogg" src="'.esc_url($ogg_video).'">';
                        }
                        
                        if ( ! empty( $webm_video ) ) {
                            $output .= '<source type="video/webm" src="'.esc_url($webm_video).'">';
                        }
                    $output .= '</video>';
                }
            break;

        } 
        return $output;
    }
}
add_shortcode( 'hongo_video', 'hongo_video_shortcode' );


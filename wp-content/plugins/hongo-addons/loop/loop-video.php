<?php
/**
 * displaying video for blog
 *
 * @package Hongo
 */
?>
<?php
$hongo_video_type = hongo_post_meta('hongo_video_type');
$hongo_video = hongo_post_meta('hongo_video');
if($hongo_video_type == 'self'){
    $hongo_video_mp4 = hongo_post_meta('hongo_video_mp4');
    $hongo_video_ogg = hongo_post_meta('hongo_video_ogg');
    $hongo_video_webm = hongo_post_meta('hongo_video_webm');
    $hongo_mute = hongo_post_meta('hongo_enable_mute');
    $hongo_enable_mute = ($hongo_mute == 1) ? ' muted' : '';
    if($hongo_video_mp4 || $hongo_video_ogg || $hongo_video_webm){
        echo '<div class="blog-image fit-videos hongo-blog-video">';
            echo '<video '.esc_attr($hongo_enable_mute).' loop controls>';
                if(! empty($hongo_video_mp4)){
                    echo '<source src="'.esc_url($hongo_video_mp4).'" type="video/mp4">';
                }
                if(! empty($hongo_video_ogg)){
                    echo '<source src="'.esc_url($hongo_video_ogg).'" type="video/ogg">';
                }
                if(! empty($hongo_video_webm)){
                    echo '<source src="'.esc_url($hongo_video_webm).'" type="video/webm">';
                }
            echo '</video>';
        echo '</div>';
    }
}else{
    $hongo_video_url = hongo_post_meta('hongo_video');
    $fullscreen_class = '';
    if ( strpos( $hongo_video_url,'player.vimeo.com' ) == true ) {
        $fullscreen_class = 'webkitAllowFullScreen mozallowfullscreen allowFullScreen';
    }else{
        $fullscreen_class = 'allowFullScreen="true"';
    }
    if($hongo_video_url){
        echo '<div class="blog-image fit-videos hongo-blog-video">';
            echo '<iframe src="'.esc_url( $hongo_video_url ).'" width="640" height="360" frameborder="0" '.$fullscreen_class.' allow="autoplay; fullscreen"></iframe>';
        echo '</div>';
    }
}
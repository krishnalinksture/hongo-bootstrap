<?php
/**
 * Displaying video for default post page
 *
 * @package Hongo
 */

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $hongo_video_type   = hongo_post_meta( 'hongo_video_type' );
    $hongo_video        = hongo_post_meta( 'hongo_video' );
    if ( $hongo_video_type == 'self' ) {
        $hongo_video_mp4    = hongo_post_meta( 'hongo_video_mp4' );
        $hongo_video_ogg    = hongo_post_meta( 'hongo_video_ogg' );
        $hongo_video_webm   = hongo_post_meta( 'hongo_video_webm' );
        $hongo_mute         = hongo_post_meta( 'hongo_enable_mute' );
        $hongo_enable_mute  = ( $hongo_mute == 1 ) ? ' muted' : '';
        if ( $hongo_video_mp4 || $hongo_video_ogg || $hongo_video_webm ) {
    ?>
            <div class="blog-image fit-videos hongo-blog-video">
                <video<?php echo sprintf( '%s', $hongo_enable_mute ); ?> loop controls>
                    <?php if ( ! empty( $hongo_video_mp4 ) ) { ?>
                        <source src="<?php echo esc_url( $hongo_video_mp4 ); ?>" type="video/mp4">
                    <?php } ?>
                    <?php if ( ! empty( $hongo_video_ogg ) ) { ?>
                        <source src="<?php echo esc_url( $hongo_video_ogg ); ?>" type="video/ogg">
                    <?php } ?>
                    <?php if ( ! empty( $hongo_video_webm ) ) { ?>
                        <source src="<?php echo esc_url( $hongo_video_webm ); ?>" type="video/webm">
                    <?php } ?>
                </video>
            </div>
    <?php
        }
    } else {
        $hongo_video_url = hongo_post_meta( 'hongo_video' );

        if( $hongo_video_url ) {
    ?>
        <div class="blog-image fit-videos hongo-blog-video">
            <iframe src="<?php echo esc_url( $hongo_video_url ); ?>" width="640" height="360" allowFullScreen allow="autoplay; fullscreen"></iframe>
        </div>
    <?php
    }
}

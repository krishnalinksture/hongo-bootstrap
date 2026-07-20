<?php
/**
 * displaying audio for blog
 *
 * @package Hongo
 */
?>
<?php
$hongo_blog_audio = hongo_post_meta('hongo_audio');
if( $hongo_blog_audio ) {
    echo '<div class="blog-image fit-videos hongo-blog-audio">';
        if ( $hongo_blog_audio  ) {
            echo wp_oembed_get( $hongo_blog_audio );
        } else {
            printf( $hongo_blog_audio );
        }
    echo '</div>';
}
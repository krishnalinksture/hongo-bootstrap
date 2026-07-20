<?php
/**
 * Displaying audio for single post
 *
 * @package Hongo
 */

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $hongo_blog_audio = hongo_post_meta('hongo_audio');
    if( $hongo_blog_audio ) {
?>
        <div class="blog-image fit-videos hongo-blog-audio">
        <?php
            if ( $hongo_blog_audio  ) {
                echo wp_oembed_get( $hongo_blog_audio );
            } else {
                echo sprintf( '%s', $hongo_blog_audio );
            }
        ?>
        </div>
    <?php 
    }

    $hongo_blog_image = hongo_option( "hongo_featured_image", '1' );

    if( $hongo_blog_image == 1 ) {
        if ( has_post_thumbnail() ) {
    ?>
    	    <div class="blog-image">
                <?php the_post_thumbnail( 'full' ); ?>
    	   </div>
        <?php
        }
    }

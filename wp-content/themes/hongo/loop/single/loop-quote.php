<?php
/**
 * Displaying quote for single post
 *
 * @package Hongo
 */

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $hongo_blog_quote = hongo_post_meta( 'hongo_quote' );
    if( $hongo_blog_quote ) {
?>
    <div class="blog-image hongo-blog-blockquote">
        <blockquote class="blockquote-style-1">
            <div class="blockquote-content alt-font">
                <?php echo nl2br( $hongo_blog_quote ); ?>
            </div>
        </blockquote>
    </div>
    <?php
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

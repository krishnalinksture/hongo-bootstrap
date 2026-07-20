<?php
/**
 * Displaying Common data for default post page
 *
 * @package Hongo
 */

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $blog_thumbnail_icon   = get_theme_mod( 'hongo_show_post_thumbnail_icon_default', '1' );
    $srcset                = get_theme_mod( 'hongo_image_srcset_default', 'full' );

    /* Image Alt, Title, Caption */
    $img_alt     = hongo_option_image_alt( get_post_thumbnail_id() );
    $img_title   = hongo_option_image_title( get_post_thumbnail_id() );
    $image_alt   = ( isset( $img_alt['alt'] ) && ! empty( $img_alt['alt'] ) ) ? $img_alt['alt'] : '';
    $image_title = ( isset( $img_title['title'] ) && ! empty( $img_title['title'] ) ) ? $img_title['title'] : '';

    $img_attr = array(
        'title' => $image_title,
        'alt' => $image_alt,
    );

    $post_format = get_post_format( get_the_ID() );
?>

<a href="<?php echo esc_url( get_permalink() ); ?>'">
    <?php
        echo get_the_post_thumbnail( get_the_ID(), $srcset, $img_attr );
        if( $blog_thumbnail_icon == '1' ) {
        
            $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
            $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);

            if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
    ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>"></span>
            <?php } elseif ( $post_format == 'gallery' ) { ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>-slider"></span>
            <?php } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) { ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>-html5"></span>
            <?php } elseif ( $post_format == 'video' ) { ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>"></span>
            <?php } elseif ( $post_format == 'audio' ) { ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>"></span>
            <?php } elseif ( $post_format == 'quote' ) { ?>
                <span class="post-icon post-type-<?php echo sprintf( '%s', $post_format ); ?>"></span>
            <?php }
        }
    ?>
</a>

<?php
/**
 * displaying featured image for blog
 *
 * @package Hongo
 */
?>
<?php
global $hongo_srcset;
/* Image Alt, Title, Caption */
$hongo_img_alt = hongo_option_image_alt(get_post_thumbnail_id());
$hongo_img_title = hongo_option_image_title(get_post_thumbnail_id());
$hongo_image_alt = ( isset($hongo_img_alt['alt']) && ! empty($hongo_img_alt['alt']) ) ? $hongo_img_alt['alt'] : ''; 
$hongo_image_title = ( isset($hongo_img_title['title']) && ! empty($hongo_img_title['title']) ) ? $hongo_img_title['title'] : '';

$hongo_img_attr = array(
    'title' => $hongo_image_title,
    'alt' => $hongo_image_alt,
);
echo '<div class="blog-image hongo-blog-image"><a href="'.get_permalink().'">';
    if ( has_post_thumbnail() ) {
        echo get_the_post_thumbnail( get_the_ID(), $hongo_srcset,$hongo_img_attr );
    }
echo '</a></div>';

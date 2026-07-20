<?php
/**
 * displaying quote for blog
 *
 * @package Hongo
 */
?>
<?php
$hongo_blog_quote = hongo_post_meta('hongo_quote');
echo '<div class="blog-image hongo-blog-blockquote alt-font">';
    if($hongo_blog_quote){

    	echo '<div class="blockquote-style-3">';
    		echo '<i class="base-color fa-solid fa-quote-left icon-large"></i>';
			echo '<div class="blockquote-content last-paragraph-no-margin alt-font">';
    			echo nl2br( $hongo_blog_quote );
    		echo '</div>';
    	echo '</div>';
    }
echo '</div>';

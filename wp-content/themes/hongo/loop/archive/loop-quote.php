<?php
/**
 * Displaying quote for archive page
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_blog_quote = hongo_post_meta('hongo_quote');
if ( $hongo_blog_quote ) {
?>
	<div class="blog-image hongo-blog-blockquote">
	    <blockquote>
	        <h6><?php echo sprintf( '%s', $hongo_blog_quote ); ?></h6>
	    </blockquote>
	</div>
<?php
}

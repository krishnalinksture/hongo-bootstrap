<?php
/**
 * Displaying featured image for single post
 *
 * @package Hongo
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_blog_image = hongo_option( 'hongo_featured_image', '1' );
	if( $hongo_blog_image == 1 ) {
    	if ( has_post_thumbnail() ) {
?>
			<div class="col-lg-12 col-md-12 col-12">
				<div class="blog-image">
        			<?php the_post_thumbnail( 'full' ); ?>
        		</div>
			</div>
		<?php
    	}
	}

<?php
/**
 * displaying featured image for single post
 *
 * @package Hongo
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Image Alt, Title, Caption */
	$hongo_blog_image = hongo_option( 'hongo_featured_image', '1' );

	if( $hongo_blog_image == 1 ) {
		if ( has_post_thumbnail() ) {
?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="blog-image">
        			<?php the_post_thumbnail( 'full' ); ?>
        		</div>
			</div>
		<?php
    	}
	}

<?php
/**
 * Displaying featured image for sticky post
 *
 * @package Hongo
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_srcset_sticky = get_theme_mod( 'hongo_image_srcset_sticky', 'full' );

	$page_url = get_permalink();
	if ( has_post_thumbnail() ) {
?>
		<div class="blog-image">
			<a href="<?php echo esc_url( $page_url ); ?>">
				<?php the_post_thumbnail( $hongo_srcset_sticky ); ?>
			</a>
		</div>
	<?php }

<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/* Start of the loop. */
while ( have_posts() ) :
	the_post();

	/* Title */
	get_template_part( 'templates/title' );

	/* Post main class */
	$class = 'hongo-main-content-wrap single-post-main-section';

	$hongo_single_post_layout_setting = hongo_option( 'hongo_single_post_layout_setting', 'hongo_layout_right_sidebar' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_single_post_layout_setting = apply_filters( 'hongo_page_layout_style', $hongo_single_post_layout_setting );
	$hongo_main_wrapper_tag           = ( $hongo_single_post_layout_setting == 'hongo_layout_no_sidebar' ) ? 'div' : 'section';
	$hongo_post_layout_style          = hongo_option( 'hongo_post_layout_style', 'post-layout-1' );
	$hongo_single_post_enable_title   = hongo_option( 'hongo_single_post_enable_title', '1' );
	$class                           .= ( $hongo_single_post_enable_title != 1 ) ? ' top-space' : '';
	$hongo_post_rich_snippet         = hongo_option( 'hongo_post_rich_snippet', '1' );

	$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

	/* Get post class and id */
	$hongo_post_classes = '';
	ob_start();
		post_class( $class );
		$hongo_post_classes .= ob_get_contents();
	ob_end_clean();

	echo '<'.$hongo_main_wrapper_tag.' id="post-'.esc_attr( get_the_ID() ).'" '.$hongo_post_classes.'>'; // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		if ( 1 == $hongo_post_rich_snippet ) {
			?>
			<div class="hongo-rich-snippet display-none">
				<span class="entry-title">
					<?php echo esc_html( get_the_title() ); ?>
				</span>
				<span class="author vcard">
					<a class="url fn n" href="<?php echo esc_url( $author_url ); ?>">
						<?php echo esc_html( get_the_author() ); ?>
					</a>
				</span>
				<span class="published">
					<?php echo esc_html( get_the_date() ); ?>
				</span>
				<time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
					<?php echo esc_html( get_the_modified_date() ); ?>
				</time>
			</div>
			<?php
		}
		switch ( $hongo_post_layout_style ) {
			case 'post-layout-style-2':
				get_template_part( 'templates/single/post-layout-2' );
				break;
			default:
				get_template_part( 'templates/single/post-layout-1' );
				break;
		}
		?>
	<?php
	echo '</'.$hongo_main_wrapper_tag.'>'; // @codingStandardsIgnoreLine
endwhile; // End of the loop.
get_footer();

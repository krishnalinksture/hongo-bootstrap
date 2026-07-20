<?php
/**
 * The template for displaying all pages
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

	/* Page main class */
	$class = 'hongo-main-content-wrap';

	/* Check if page comment is show / hide */
	$hongo_hide_page_comment   = hongo_option( 'hongo_hide_page_comment', '1' );

	$hongo_page_container_style= hongo_option( 'hongo_page_container_style', 'container' );

	/* Filter for change container style for ex. ?container=full */
	$hongo_page_container_style= apply_filters( 'hongo_page_container_style', $hongo_page_container_style );

	$hongo_page_layout_setting = hongo_option( 'hongo_page_layout_setting', 'hongo_layout_no_sidebar' );

	/* Filter for change layout style for ex. ?sidebar=right_sidebar */
	$hongo_page_layout_setting	= apply_filters( 'hongo_page_layout_style', $hongo_page_layout_setting );

	$hongo_main_wrapper_tag    = ( $hongo_page_layout_setting == 'hongo_layout_no_sidebar' ) ? 'div' : 'section';

	$hongo_page_rich_snippet         = hongo_option( 'hongo_page_rich_snippet', '1' );

	if( $hongo_page_layout_setting == 'hongo_layout_left_sidebar' ) {
		$hongo_page_left_sidebar	= hongo_option( 'hongo_page_left_sidebar', '' );
		$hongo_main_wrapper_tag 	= is_active_sidebar( $hongo_page_left_sidebar ) ? 'section' : 'div';
	}

	if( $hongo_page_layout_setting == 'hongo_layout_right_sidebar' ) {
		$hongo_page_right_sidebar 	= hongo_option( 'hongo_page_right_sidebar', '' );
		$hongo_main_wrapper_tag     = is_active_sidebar( $hongo_page_right_sidebar ) ? 'section' : 'div';
	}

	if(	$hongo_page_layout_setting == 'hongo_layout_both_sidebar' ) {
		$hongo_page_left_sidebar 	= hongo_option( 'hongo_page_left_sidebar', '' );
		$hongo_page_right_sidebar 	= hongo_option( 'hongo_page_right_sidebar', '' );
		$hongo_main_wrapper_tag     = is_active_sidebar( $hongo_page_left_sidebar ) || is_active_sidebar( $hongo_page_right_sidebar ) ? 'section' : 'div';
	}

	$hongo_page_layout_setting_class  = ! empty( $hongo_page_layout_setting ) ? ' ' . $hongo_page_layout_setting . '_single' : '';

	$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

	/* Get post class and id */
	$hongo_page_classes = '';
	ob_start();
		post_class( $class );
		$hongo_page_classes .= ob_get_contents();
	ob_end_clean();

	echo '<'.$hongo_main_wrapper_tag.' id="post-' . esc_attr( get_the_ID() ) . '" ' . $hongo_page_classes . '>'; // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
?>
		<div class="<?php echo esc_attr( $hongo_page_container_style ). esc_attr( $hongo_page_layout_setting_class ); ?>">
			<div class="row">
				<?php
					/* Get page left part template */
					get_template_part( 'templates/single-page', 'left' );
				if ( 1 == $hongo_page_rich_snippet ) {
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
				?>
				<div class="entry-content">
					<?php
						/* Get page content area */
						the_content();
					?>
				</div>
				<?php
					/* Displays page-links for paginated pages. */
					wp_link_pages( 
						array(
							'before'     => '<div class="page-links"><div class="inner-page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'hongo' ).'</span>',
							'after'      => '</div></div>',
							'link_before'=> '<span class="page-number">',
							'link_after' => '</span>',
						)
					);
					/* If comments are open or we have at least one comment, load up the comment template. */
					if ( $hongo_hide_page_comment == 1 ) {
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					/* Get page right part template */
					get_template_part( 'templates/single-page', 'right' );
				?>
			</div>
		</div>
<?php
	echo '</' . $hongo_main_wrapper_tag . '>'; // @codingStandardsIgnoreLine
endwhile;  // End of the loop.
get_footer();

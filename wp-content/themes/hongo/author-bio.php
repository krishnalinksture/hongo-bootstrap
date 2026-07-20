<?php
/**
 * The template for displaying Author bios
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_author_decription = get_the_author_meta( 'description' );

if ( $hongo_author_decription ) {
	
	$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$hongo_author_box_button_title = get_theme_mod( 'hongo_author_box_button_title', esc_html__( 'All author posts', 'hongo' ) );
	/* Start Author Info. */
?>
	<div class="col-md-12 col-sm-12 col-xs-12 hongo-author-box-wrap">
		<div class="display-table width-100 hongo-author-box">
			<div class="display-table-cell vertical-align-top xs-display-block xs-text-center">
				<a class="comment-avtar" href="<?php echo esc_url( $author_url ); ?>">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 300 ); ?>
				</a>
			</div>
			<div class="display-table-cell vertical-align-top last-paragraph-no-margin xs-display-block xs-text-center width-100">
				<div class="hongo-author-title">
					<a href="<?php echo esc_url( $author_url ); ?>" class="alt-font display-inline-block">
						<?php echo esc_html( get_the_author() ); ?>
					</a>
				</div>
				<p class="hongo-author-content"><?php echo get_the_author_meta( 'description' ); ?></p>
				<a href="<?php echo esc_url( $author_url ); ?>" class="btn btn-very-small btn-black alt-font">
					<?php echo $hongo_author_box_button_title; ?>
				</a>
			</div>
		</div>
	</div>
<?php
	/* End Author Info. */
}

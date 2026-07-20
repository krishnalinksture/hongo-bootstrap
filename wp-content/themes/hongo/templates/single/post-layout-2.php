<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_single_post_content_container_fluid = '';
	$hongo_single_post_content_container_fluid = hongo_option( 'hongo_single_post_container_style', 'container' );
	$hongo_enable_tags				= hongo_option( 'hongo_enable_tags', '1' );
	$hongo_enable_navigation_link   = hongo_option( 'hongo_enable_navigation_link', '1' );
	$hongo_enable_like				= hongo_option( 'hongo_enable_like', '1' );
	$hongo_enable_share				= hongo_option( 'hongo_enable_share', '1' );
	$hongo_enable_post_author_box   = hongo_option( 'hongo_enable_post_author_box', '1' );
	$hongo_enable_related_posts		= hongo_option( 'hongo_enable_related_posts', '1' );
	$hongo_related_posts_title		= hongo_option( 'hongo_related_posts_title', 'Related Posts' );
	$hongo_related_posts_date_format= hongo_option( 'hongo_related_posts_date_format', '' );
	$post_format					= get_post_format( get_the_ID() );
	$hongo_enable_comment			= hongo_option( 'hongo_enable_comment', '1' );

	$hongo_single_post_layout_setting   = hongo_option( 'hongo_single_post_layout_setting', 'hongo_layout_right_sidebar' );

	// Filter for change layout style for ex. ?sidebar=right_sidebar
	$hongo_single_post_layout_setting   = apply_filters( 'hongo_page_layout_style', $hongo_single_post_layout_setting );

	$hongo_single_post_layout_setting   = ! empty( $hongo_single_post_layout_setting ) ? ' ' . $hongo_single_post_layout_setting . '_single' : '';

	// Filter for change container style for ex. ?container=full
	$hongo_single_post_content_container_fluid = apply_filters( 'hongo_page_container_style', $hongo_single_post_content_container_fluid );
?>
	<section class="single-post-main-section no-padding">
		<div class="<?php echo esc_attr( $hongo_single_post_content_container_fluid ) . esc_attr( $hongo_single_post_layout_setting ); ?>">
			<div class="row">
				<?php
					/* Get post left sidebar */
					get_template_part( 'templates/single-post', 'left' );
					
					if( ! empty( $hongo_post_meta_array ) ) {
				?>
						<div class="col-sm-12 col-md-12 col-xs-12 blog-details-title-meta">
							<div class="hongo-post-details-meta-wrap">
								<ul class="hongo-post-details-meta">
									<?php echo implode( "<span class='post-details-separator'>|</span>", $hongo_post_meta_array ); ?>
								</ul>
							</div>
						</div>
				<?php 
					}
					// Include Post Format Data
					if ( ! post_password_required() ) {
						if( $post_format == 'image' ) {
                            ?>
							    <?php echo get_template_part( 'loop/single/loop', 'image' ); ?>
                            <?php
						} elseif( $post_format == 'gallery' ) {
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
								    <?php echo get_template_part( 'loop/single/loop', 'gallery' ); ?>
							    </div>
                            <?php
						} elseif( $post_format == 'video' ) {
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">';
								    <?php echo get_template_part( 'loop/single/loop', 'video' ); ?>
                                </div>
                            <?php
						} elseif( $post_format == 'quote' ) {
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">';
								    <?php echo get_template_part( 'loop/single/loop', 'quote' ); ?>
                                </div>
                            <?php
						} elseif( $post_format == 'audio' ) {
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">';
								    <?php echo get_template_part( 'loop/single/loop', 'audio' ); ?>
                                </div>
                            <?php
						} else {
                            ?>
                                <?php echo get_template_part( 'loop/single/loop' ); ?>
                            <?php
						}
					}
					// Show Post Content
				?>
					<div class="col-md-12 col-sm-12 col-xs-12 blog-details-text entry-content">
						<?php the_content(); ?>
					</div>
					<?php
						/* Displays page-links for paginated posts. */
						wp_link_pages( 
							array(
								'before'		=> '<div class="page-links"><div class="inner-page-links"><span class="pagination-title">' . esc_html__( 'Posts:', 'hongo' ).'</span>',
								'after'			=> '</div></div>',
								'link_before'   => '<span class="page-number">',
								'link_after'	=> '</span>',
							)
						);

						/* Get post right sidebar */
						get_template_part( 'templates/single-post', 'right' );
					?>
			</div>
		</div>
	</section>
	<?php if( $hongo_enable_navigation_link == 1 || $hongo_enable_tags == 1 || $hongo_enable_like == 1 || $hongo_enable_share == 1 || $hongo_enable_post_author_box == 1 ) { ?>
		<section class="wow fadeIn no-padding-top">
			<div class="container">
				<div class="row">
					<?php
						/* Check post tags, comment link and like */
						if( $hongo_enable_tags == 1 ) {
							if ( 'post' == get_post_type() && ( $hongo_enable_share == 1 || $hongo_enable_like == 1 ) ) {
								$tags_list = get_the_tag_list();
								
								if ( $tags_list ) {
									printf( '<div class="col-md-7 col-sm-6 col-xs-12 xs-text-center tagcloud">%1$s</div>',
										$tags_list
									);
								}
							}
						}
					?>
					<div class="col-md-5 col-sm-6 col-xs-12 xs-text-center hongo-post-detail-icon alt-font pull-right">
						<?php
							if( $hongo_enable_share == 1 && function_exists( 'hongo_single_post_share_shortcode' ) ) {
								echo do_shortcode( "[hongo_single_post_share]" );
							}
						?>
						<div class="hongo-blog-detail-like">
							<ul class="extra-small-icon">
								<?php if( $hongo_enable_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) { ?>
									<li><?php echo hongo_get_simple_likes_button( get_the_ID() ); ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php if( $hongo_enable_navigation_link ) { // Next Previous Navigation Post Link ?>
						<div class="col-md-12 col-sm-12 col-xs-12 navigation-link-wrap">
							<?php hongo_single_post_navigation(); ?>
						</div>
					<?php } ?>
					<?php 
						if( $hongo_enable_post_author_box == 1 ) { /* Check if author box hide / show */
							get_template_part( 'author-bio' );
						}
					?>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php if( $hongo_enable_related_posts == 1 ) { /* Check if related post hide or show */ ?>
		<section class="wow fadeIn bg-very-light-gray hongo-related-posts-background">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 hongo-related-posts hongo-blog-grid hongo-blog-styles">
						<?php hongo_related_posts( get_the_ID() ); ?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php if ( $hongo_enable_comment == 1 ) { // If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
	?>
			<section class="wow fadeIn single-comment-layout-2">
				<div class="container">
					<div class="row">
						<div class="hongo-single-post-meta-style">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</section>
		<?php }
	}

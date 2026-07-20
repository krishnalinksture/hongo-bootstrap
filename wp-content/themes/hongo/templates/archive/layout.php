<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$class_column = $infinite_scroll_main_class = $class_style = '';

$blog_style = hongo_option( 'hongo_blog_premade_style_archive', 'blog-grid' );	
$hongo_post_container_style_archive = hongo_option( 'hongo_post_container_style_archive', 'container' );
// Filter for change container style for ex. ?container=full
$hongo_post_container_style_archive = apply_filters( 'hongo_page_container_style', $hongo_post_container_style_archive );
$blog_gutter		   = get_theme_mod( 'hongo_blog_type_archive', '' );
$blog_column		   = get_theme_mod( 'hongo_blog_column_archive', '3' );
$blog_pagination_style = get_theme_mod( 'hongo_blog_pagination_style_archive', 'number-pagination' );
$show_pagination	   = get_theme_mod( 'hongo_show_pagination_archive', '1' );

/* Check archive type */	
$hongo_general_archive_type_gutter 	= ( $blog_gutter ) ? ' '.$blog_gutter.' blog-post-gutter' : '';

$hongo_show_description_archive 	= get_theme_mod( 'hongo_show_description_archive', '0' );

if( $hongo_show_description_archive == '1' && get_the_archive_description() ) {
?>
	<section class="no-padding-bottom">
		<div class="<?php echo esc_attr( $hongo_post_container_style_archive ); ?>">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<?php the_archive_description(); ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
	<section class="hongo-main-content-wrap">
		<div class="<?php echo esc_attr( $hongo_post_container_style_archive ); ?>">
			<div class="row">
				<?php
					/* Get page left part template */
					get_template_part( 'templates/archive','left' );
					if( have_posts() ) {

						switch( $blog_column ) {
							case '1':
								$class_column .= ' col-md-12 col-sm-12 col-xs-12';
								break;
							case '2':
								$class_column .= ' col-lg-6 col-md-6 col-sm-6 col-xs-12';
								break;
							case '3':
							default:
								$class_column .= ' col-lg-4 col-md-6 col-sm-6 col-xs-12';
								break;
							case '4':
								$class_column .= ( $blog_style != 'blog-modern' ) ? ' col-lg-3 col-md-4 col-sm-6 col-xs-12' : ' col-lg-3 col-sm-6 col-xs-12';
								break;
							case '5':
								$class_column .= ' vc_col-lg-1/5 col-md-4 col-sm-6 col-xs-12';
								break;
							case '6':
								$class_column .= ' col-lg-2 col-md-4 col-sm-6 col-xs-12';
								break;
						}
					?>
					<div class="hongo-blog-styles col-md-12 col-sm-12 col-xs-12 blog-style-archive-1 hongo-blog-pages hongo-<?php echo esc_attr( $blog_style ); ?>">
						<?php
							// Infinite scroll
							if( $show_pagination == 1 ) {
								if( $blog_pagination_style == 'infinite-scroll-pagination' ){
									$infinite_scroll_main_class = ' infinite-scroll-pagination';
								}
							}
						?>
						<?php if( $blog_style == 'blog-standard' ) { // Structure Start ?>
							<div class="blog-posts hongo-blog-common blog-archive-unique-1 <?php echo esc_attr( $blog_style ) . esc_attr( $infinite_scroll_main_class ); ?>" data-col="<?php echo esc_attr( $blog_column ); ?>" data-uniqueid="blog-archive-unique-1">
						<?php } else { ?>
							<div class="blog-posts <?php echo esc_attr( $blog_style ); ?>" data-col="<?php echo esc_attr( $blog_column ); ?>">
								<ul class="post-grid hongo-blog-common blog-archive-unique-1<?php echo esc_attr( $infinite_scroll_main_class ) . esc_attr( $hongo_general_archive_type_gutter ); ?>" data-uniqueid="blog-archive-unique-1">
									<li class="grid-sizer<?php echo esc_attr( $class_column ); ?>"></li>
						<?php } ?>

							<?php get_template_part( 'templates/archive/hongo-blog', 'styles' ); ?>

						<?php if( $blog_style == 'blog-standard' ) { // Structure End ?>
							</div>
						<?php } else { ?>
								</ul>
							</div>
						<?php } ?>

						<?php if( $show_pagination == 1 && $wp_query->max_num_pages > 1 ) { ?>
							<?php if( $blog_pagination_style != 'number-pagination' ) { ?>
								<div class="page-load-status">
									<div class="infinite-scroll-request loading"></div>
									<div class="infinite-scroll-error infinite-scroll-last"><div class="finish-load alt-font"><?php echo __( 'All posts loaded', 'hongo' ); ?></div></div>
								</div>
							<?php } ?>
							<?php if( $blog_pagination_style == 'infinite-scroll-pagination' ) { ?>
								<div class="pagination hongo-infinite-scroll hongo-common-blog-scroll display-none" data-pagination="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">
									<?php
										if( get_next_posts_link( '', $wp_query->max_num_pages ) ) {
											echo next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hongo' ).'</span><i class="fa-solid fa-angle-right"></i>', $wp_query->max_num_pages );
										}
									?>
								</div>
							<?php } elseif( $blog_pagination_style == 'loadmore' ) { ?>
								<div class="aligncenter"><a href="javascript:void(0);" class="btn view-more-button"><?php echo esc_html__( 'View More', 'hongo' ); ?></a></div>
								<div class="pagination hongo-loadmore-scroll hongo-common-blog-scroll display-none" data-pagination="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">
									<?php
										if( get_next_posts_link( '', $wp_query->max_num_pages ) ) {
											echo next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hongo' ).'</span><i class="fa-solid fa-angle-right"></i>', $wp_query->max_num_pages );
										}
									?>
								</div>
							<?php } else { ?>
								<?php $current = ( $wp_query->query_vars['paged'] > 1 ) ? $wp_query->query_vars['paged'] : 1; ?>
								<div class=" text-center clear-both float-left width-100">
									<div class="pagination">
										<?php
											echo paginate_links( array(
												'base'		=> esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
												'format'	=> '',
												'add_args'	=> '',
												'current'	=> $current,
												'total'		=> $wp_query->max_num_pages,
												'prev_text'	=> '<i class="fa-solid fa-angle-left"></i>',
												'next_text'	=> '<i class="fa-solid fa-angle-right"></i>',
												'type'		=> 'plain',
												'end_size'	=> 2,
												'mid_size'	=> 2
											) );
										?>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
						</div>
					<?php } else { ?>
						<?php get_template_part( 'templates/content', 'none' ); ?>
					<?php } ?>

				<?php get_template_part( 'templates/archive','right' ); /* Get page right part template */ ?>
			</div>
		</div>
	</section>

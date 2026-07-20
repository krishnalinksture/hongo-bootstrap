<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

	$class_column = $infinite_scroll_main_class = '';

	$blog_style = hongo_option( 'hongo_blog_premade_style_default', 'blog-grid' );
	$hongo_post_container_style_default = hongo_option( 'hongo_post_container_style_default', 'container' );

	// Filter for change container style for ex. ?container=full.
	$hongo_post_container_style_default = apply_filters( 'hongo_page_container_style', $hongo_post_container_style_default );

	$blog_gutter		   = get_theme_mod( 'hongo_blog_type_default', '' );
	$blog_column		   = get_theme_mod( 'hongo_blog_column_default', '3' );
	$blog_pagination_style = get_theme_mod( 'hongo_blog_pagination_style_default', 'number-pagination' );
	$show_pagination	   = get_theme_mod( 'hongo_show_pagination_default', '1' );

	$no_sidebar_column_class = ' col-md-12 col-sm-12 col-xs-12';

	/* Check default type */
	$hongo_general_default_type_gutter = ( $blog_gutter ) ? ' blog-post-gutter '.$blog_gutter : '';
?>
	<section class="hongo-main-content-wrap">
		<div class="<?php echo esc_attr( $hongo_post_container_style_default ); ?>">
			<div class="row">
				<?php
					/* Get page left part template */
					get_template_part( 'templates/default', 'left' );
					if ( have_posts() ) :

						switch ( $blog_column ) {
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

						/* For Sticky Post */
						if ( is_sticky() ) {
							get_template_part( 'templates/index/hongo-blog', 'sticky' );
						}
					?>
					<div class="hongo-blog-styles col-md-12 col-sm-12 col-xs-12 hongo-default-post-description<?php echo esc_attr( ' hongo-' . $blog_style ); ?>">
						<?php
							// Infinite scroll
							if ( $show_pagination == 1 ) {
								if ( $blog_pagination_style == 'infinite-scroll-pagination' ){
									$infinite_scroll_main_class = ' infinite-scroll-pagination';
								}
							}
						?>
						<?php if ( $blog_style == 'blog-standard' ) { ?>
							<div class="blog-posts hongo-blog-common blog-home-unique-1 <?php echo esc_attr( $blog_style ) . esc_attr( $infinite_scroll_main_class ); ?>" data-col="<?php echo esc_attr( $blog_column ); ?>" data-uniqueid="blog-home-unique-1">
						<?php } else { ?>
							<div class="blog-posts <?php echo esc_attr( $blog_style ); ?>" data-col="<?php echo esc_attr( $blog_column ); ?>">
								<ul class="post-grid hongo-blog-common blog-home-unique-1<?php echo esc_attr( $infinite_scroll_main_class ) . esc_attr( $hongo_general_default_type_gutter ); ?>" data-uniqueid="blog-home-unique-1">
									<li class="grid-sizer<?php echo esc_attr( $class_column ); ?>"></li>
						<?php } ?>

							<?php get_template_part( 'templates/index/hongo-blog', 'styles' ); ?>

						<?php if ( $blog_style == 'blog-standard' ) { ?>
							</div>
						<?php } else { ?>
								</ul>
							</div>
						<?php } ?>

						<?php if ( $show_pagination == 1 && $wp_query->max_num_pages > 1 ) { ?>
							<?php if ( $blog_pagination_style != 'number-pagination'  ) { ?>
								<div class="page-load-status">
									<div class="infinite-scroll-request loading"></div>
									<div class="infinite-scroll-error infinite-scroll-last"><div class="finish-load alt-font"><?php echo __( 'All posts loaded', 'hongo' ); ?></div></div>
								</div>
							<?php } ?>
							<?php if( $blog_pagination_style == 'infinite-scroll-pagination' ) { ?>
								<div class="pagination hongo-infinite-scroll hongo-common-blog-scroll display-none" data-pagination="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">
									<?php
										if ( get_next_posts_link( '', $wp_query->max_num_pages ) ) :
											echo next_posts_link( '<span class="old-post">' . esc_html__( 'Older Post', 'hongo' ) . '</span><i class="fa-solid fa-angle-right"></i>', $wp_query->max_num_pages );
										endif;
									?>
								</div>
							<?php } elseif( $blog_pagination_style == 'loadmore' ) { ?>
								<div class="aligncenter"><a href="javascript:void(0);" class="btn view-more-button"><?php echo esc_html__( 'View More', 'hongo' ); ?></a></div>
								<div class="pagination hongo-loadmore-scroll hongo-common-blog-scroll display-none" data-pagination="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">
									<?php
										if ( get_next_posts_link( '', $wp_query->max_num_pages ) ) :
											echo next_posts_link( '<span class="old-post">' . esc_html__( 'Older Post', 'hongo' ) . '</span><i class="fa-solid fa-angle-right"></i>', $wp_query->max_num_pages );
										endif;
									?>
								</div>
							<?php } else {

								$current = ( $wp_query->query_vars['paged'] > 1 ) ? $wp_query->query_vars['paged'] : 1;
							?>
								<div class=" text-center clear-both float-left width-100">
									<div class="pagination">
										<?php
											echo paginate_links( array(
												'base'		=> esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
												'format'    => '',
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
					<?php
						else :
							get_template_part( 'templates/content', 'none' );
						endif;
					?>
				<?php
					/* Get page right part template */
					get_template_part( 'templates/default', 'right' );
				?>
			</div>
		</div>
	</section>
<?php
get_footer();

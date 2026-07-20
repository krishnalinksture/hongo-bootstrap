<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

while ( have_posts() ) : the_post();
	if( is_sticky() ) {
		$blog_thumbnail 	= get_theme_mod( 'hongo_show_post_thumbnail_sticky', '1' );
		$blog_format 		= get_theme_mod( 'hongo_show_post_format_sticky', '1' );
		$srcset 			= get_theme_mod( 'hongo_image_srcset_sticky', 'full' );
		$blog_title 		= get_theme_mod( 'hongo_show_post_title_sticky', '1' );
		$show_author 		= get_theme_mod( 'hongo_show_post_author_sticky', '1' );
		$show_author_image 	= get_theme_mod( 'hongo_show_post_author_image_sticky', '1' );
		$show_post_date 	= get_theme_mod( 'hongo_show_post_date_sticky', '1' );
		$date_format 		= get_theme_mod( 'hongo_date_format_sticky', '' );
		$show_exceprt 		= get_theme_mod( 'hongo_show_excerpt_sticky', '1' );
		$excerpt_length 	= get_theme_mod( 'hongo_excerpt_length_sticky', '35' );
		$show_content 		= get_theme_mod( 'hongo_show_content_sticky', '1' );
		$show_category 		= get_theme_mod( 'hongo_show_category_sticky', '1' );
		$show_like 			= get_theme_mod( 'hongo_show_like_sticky', '1' );
		$show_comment 		= get_theme_mod( 'hongo_show_comment_sticky', '1' );
		$show_button 		= get_theme_mod( 'hongo_show_button_sticky', '0' );
		$button_text 		= get_theme_mod( 'hongo_button_text_sticky', __( 'continue reading', 'hongo' ) );

		$title_text_transform 	= get_theme_mod( 'hongo_blog_post_title_text_transform_sticky', '' );
		$meta_text_transform 	= get_theme_mod( 'hongo_blog_post_meta_text_transform_sticky', 'text-uppercase' );
		$title_text_transform  	= ! empty( $title_text_transform ) ? ' ' . $title_text_transform : '';
		$meta_text_transform   	= ! empty( $meta_text_transform ) ? ' ' . $meta_text_transform : '';

		$hongo_post_classes = $author_image = '';
		ob_start();
			post_class();
			$hongo_post_classes .= ob_get_contents();
		ob_end_clean();

		$post_format = get_post_format( get_the_ID() );
		$post_cat = $author_date_array = array();

		$categories = get_the_category();
		if( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
			foreach ( $categories as $k => $cat ) {
				$cat_link = get_category_link( $cat->cat_ID );
				$post_cat[]='<a href="'.esc_url( $cat_link ).'" class="text-medium-gray text-extra-small vertical-align-middle display-inline-block hongo-blog-post-meta" rel="category tag">' . esc_html( $cat->name ) . '</a>';
			}
		}
		$post_category = ! empty( $post_cat ) ? implode( ', ', $post_cat ) : '';

		/* Image Alt, Title, Caption */
		$img_alt 	= hongo_option_image_alt( get_post_thumbnail_id() );
		$img_title 	= hongo_option_image_title( get_post_thumbnail_id() );
		$image_alt 	= ! empty( $img_alt['alt'] ) ? $img_alt['alt'] : ''; 
		$image_title= ! empty( $img_title['title'] ) ? $img_title['title'] : '';

		$img_attr = array(
			'title'	=> $image_title,
			'alt'	=> $image_alt,
		);

		// Author Image
		if( $show_author == 1 ) {
			if( $show_author_image == 1 ) {
				$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
				$author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="' . esc_attr( get_the_author() ) . '">';
			}else {
				$author_image .= '<i class="fa-regular fa-user"></i>';
			}
			$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
			$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block' . esc_attr( $meta_text_transform ) . '">' . esc_html__( 'By', 'hongo' ) . ' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
		}
	?>
		<div id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="blog-post blog-post-content blog-post-sticky hongo-sticky-post-description hongo-blog-standard hongo-blog-styles">
					<div class="blog-single-post blog-post">
						<?php 
							$post_format = get_post_format( get_the_ID() );
							if ( ! post_password_required() && $blog_thumbnail == 1 ) {
								$flag = 1;
								if( $post_format == 'image' && $blog_format != 1 ) {
						?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'image' ); ?>
									</div>
								<?php } elseif( $post_format == 'gallery' && $blog_format != 1 ) { ?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'gallery' ); ?>
									</div>
								<?php } elseif( $post_format == 'video' && $blog_format != 1 ) { ?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'video' ); ?>
									</div>
								<?php } elseif( $post_format == 'quote' && $blog_format != 1 ) { ?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'quote' ); ?>
									</div>
								<?php } elseif( $post_format == 'audio' && $blog_format != 1 ) { ?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'audio' ); ?>
									</div>
								<?php 
									} else {
									if( has_post_thumbnail() && $blog_format == 1  ) {
								?>
										<div class="blog-image blog-image-standard">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), $srcset, $img_attr ); ?>
											</a>
										</div>
						<?php
									}
								}
							}
						if( ( $show_category == 1 && $post_category ) || $author_date_array == 1 || $blog_title == 1 || $show_exceprt == 1 || $show_content == 1 || $show_button == 1 && ! empty($button_text) || ! empty( $author_date_array ) || $show_like == 1 || $show_comment == 1 ) {
						?>
							<div class="blog-text text-center">
								<div class="content">
									<div class="content-wrap">
										<?php if( ( $show_category == 1 && $post_category ) || $show_post_date == 1 ) { ?>
											<div class="hongo-blog-post-category blog-date<?php echo esc_attr( $meta_text_transform ); ?>">
												<?php
													if( $show_category == 1 && $post_category ) {
														printf( $post_category );
													}
													if( $show_category == 1 && $post_category && $show_post_date == 1 ) {
												?>
														<span class="dot">&bull;</span>
												<?php
													}
													if( $show_post_date == 1 ) {
												?>
														<span class="hongo-blog-post-meta blog-date display-inline-block published<?php echo esc_attr( $meta_text_transform ); ?>">
															<?php echo esc_html( get_the_date( $date_format, get_the_ID() ) ); ?>
														</span>
														
														<time class="updated display-none" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
															<?php echo esc_html( get_the_modified_date( $date_format ) ); ?>
														</time>
												<?php } ?>
											</div>
										<?php } ?>
										<?php if( $blog_title == 1 || $show_exceprt == 1 || $show_content == 1 ) { ?>
											<div class="title-content-wrap">
												<?php if( $blog_title == 1 ) { ?>
													<a class="alt-font entry-title<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
												<?php } ?>
											   	<?php
													if( $show_exceprt == 1 ) {
														$show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
												?>
													<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
												<?php } elseif( $show_content == 1 ) { ?>
													<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
												<?php } ?>
											</div>
										<?php } ?>
										<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
											<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal alt-font"><?php echo esc_html( $button_text ); ?></a>
										<?php } ?>
									</div><!-- content-wrap -->
									<?php if( ! empty( $author_date_array ) || $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-post-meta-wrap<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php if( ! empty( $author_date_array ) ) { ?>
												<div class="hongo-blog-post-meta blog-date-author alt-font">
													<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
												</div>
											<?php } ?>
											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<?php if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) { ?>
													<div class="hongo-blog-post-meta hongo-like-box alt-font">
														<?php echo hongo_get_simple_likes_button( get_the_ID() ); ?>
													</div>
												<?php } ?>
												<?php if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) { ?>
													<div class="hongo-blog-post-meta hongo-comment-box alt-font">
														<?php 
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
														?>
													</div>
												<?php } ?>
											<?php } ?>
										</div>
								   	<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
endwhile;

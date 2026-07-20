<?php
	
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Define null variables */	
	$index_layout = $show_no_of_category = $hongo_general_index_type_settings = $hongo_post_classes_infinite_scroll = $class_column = '';
	$index_count = 0;

	$blog_style				= hongo_option( 'hongo_blog_premade_style_default', 'blog-grid' );  
	$blog_format			= get_theme_mod( 'hongo_show_post_format_default', '0' );
	$blog_column			= get_theme_mod( 'hongo_blog_column_default', '3' );
	$show_separator			= get_theme_mod( 'hongo_show_separator_default', '1' );
	$blog_title				= get_theme_mod( 'hongo_show_post_title_default', '1' );
	$blog_thumbnail			= get_theme_mod( 'hongo_show_post_thumbnail_default', '1' );
	$blog_thumbnail_icon	= get_theme_mod( 'hongo_show_post_thumbnail_icon_default', '1' );
	$show_author			= get_theme_mod( 'hongo_show_post_author_default', '1' );
	$show_author_image		= get_theme_mod( 'hongo_show_post_author_image_default', '0' );
	$show_post_date			= get_theme_mod( 'hongo_show_post_date_default', '1' );
	$date_format			= get_theme_mod( 'hongo_date_format_default', '' );
	$show_exceprt			= get_theme_mod( 'hongo_show_excerpt_default', '1' );
	$excerpt_length			= get_theme_mod( 'hongo_excerpt_length_default', '15' );
	$show_content			= get_theme_mod( 'hongo_show_content_default', '1' );
	$show_category			= get_theme_mod( 'hongo_show_category_default', '1' );
	$show_pagination		= get_theme_mod( 'hongo_show_pagination_default', '1' );
	$show_like				= get_theme_mod( 'hongo_show_like_default', '0' );
	$show_comment			= get_theme_mod( 'hongo_show_comment_default', '0' );
	$show_button			= get_theme_mod( 'hongo_show_button_default', '0' );
	$button_text			= get_theme_mod( 'hongo_button_text_default', __( 'continue reading', 'hongo' ) );
	$title_text_transform   = get_theme_mod( 'hongo_blog_post_title_text_transform_default', '' );
	$meta_text_transform	= get_theme_mod( 'hongo_blog_post_meta_text_transform_default', '' );
	$animation				= get_theme_mod( 'hongo_animation_default', '' );
	$blog_pagination_style  = get_theme_mod( 'hongo_blog_pagination_style_default', 'number-pagination' );
	$srcset					= get_theme_mod( 'hongo_image_srcset_default', 'full' );
	$zoom_effect			= ( get_theme_mod( 'hongo_show_post_thumbnail_zoom_effect_default', '1' ) == 0 ) ? ' hongo-no-transition-image': '';
	$hover_icon				= get_theme_mod( 'hongo_image_hover_icon_default', '1' );
	$title_text_transform   = ! empty( $title_text_transform ) ? ' '.$title_text_transform : '';
	$meta_text_transform	= ! empty( $meta_text_transform ) ? ' '.$meta_text_transform : '';

	$hongo_animation_index  = ( $animation ) ? ' wow '.$animation : '';
	$hongo_animation_delay_attr = ( $index_count > 0 ) ? ' data-wow-delay="'.$index_count.'ms"' : '';
	
	// Column.
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
			$class_column .= ' col-lg-3 col-md-4 col-sm-6 col-xs-12';
			break;
		case '5':
			$class_column .= ' vc_col-lg-1/5 col-md-4 col-sm-6 col-xs-12';
			break;
		case '6':
			$class_column .= ' col-lg-2 col-md-4 col-sm-6 col-xs-12';
			break;
	}

	ob_start();
		post_class( $hongo_post_classes_infinite_scroll );
		$hongo_post_classes = ob_get_contents();
	ob_end_clean();
	
	/* Check index type */
	$hongo_blog_type_index = isset( $blog_style ) ? $blog_style : '';

	while ( have_posts() ) : the_post();
		if( ! is_sticky() ) {
	
			$author_image = '';
			$author_date_array = array();
			$flag = 0;

			/* Image Alt, Title, Caption */
			$img_alt     = hongo_option_image_alt( get_post_thumbnail_id() );
			$img_title   = hongo_option_image_title( get_post_thumbnail_id() );
			$image_alt   = ! empty( $img_alt['alt'] ) ? $img_alt['alt'] : ''; 
			$image_title = ! empty( $img_title['title'] ) ? $img_title['title'] : '';

			$img_attr = array(
				'title' => $image_title,
				'alt'   => $image_alt,
			);

			// Category
			$post_category = $no_img_class = $separator = '';
			$hongo_title_style_array = $hongo_content_style_array = $post_cat = array();

			$categories = get_the_category();
			if( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
				foreach ( $categories as $k => $cat ) {
					$cat_link  = get_category_link( $cat->cat_ID );
					$post_cat[]= '<a href="' . esc_url( $cat_link ) . '" class="hongo-blog-post-meta" rel="category tag">' . esc_html( $cat->name ) . '</a>'; // @codingStandardsIgnoreLine
				}
			}

			if ( $blog_style == 'blog-side-image' || $blog_style == 'blog-grid' || $blog_style == 'blog-modern' || $blog_style == 'blog-overlay-image'  ) {

				$separator = '<span class="hongo-blog-post-separator"> | </span>'; // @codingStandardsIgnoreLine

			} elseif ( $blog_style == 'blog-masonry' ) {

				$separator = '<span class="hongo-blog-post-separator">, </span>'; // @codingStandardsIgnoreLine

			} elseif ( $blog_style == 'blog-standard' ) {

				$separator = '<span class="dot">•</span>'; // @codingStandardsIgnoreLine
			}

			$post_category = ! empty( $post_cat ) ? implode( $separator, $post_cat ) : '';

            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

			switch ( $blog_style ) {
				
				case 'blog-side-image':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published' . esc_attr( $meta_text_transform ) . '">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block' . esc_attr( $meta_text_transform ) . '">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}
					 
					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

					echo  '<li class="grid-item blog-single-post blog-post blog-post-content pull-left blog-style1-' . $blog_style.esc_attr( $class_column ) . esc_attr( $hongo_animation_index ) . esc_attr( $no_img_class ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine

						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<div class="equalize sm-equalize-auto width-100">
								<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
									<?php $flag = 1; ?>				
									<div class="blog-image col-md-5">
										<?php echo get_template_part( 'loop/index/loop', 'common' ); ?>
									</div>
								<?php } ?>

								<?php if( $flag == 0 ) { ?>
									<div class="blog-text col-md-12">
								<?php } else { ?>
									<div class="blog-text col-md-7">
								<?php } ?>
									<div class="display-table height-100">
										<div class="content display-table-cell vertical-align-middle">
											<?php if( $show_category == 1 && $post_category ) { ?>
												<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php echo sprintf( '%s', $post_category ); ?>
												</div>
											<?php } ?>
											<?php if( $blog_title == 1 ) { ?>
												<a class="alt-font entry-title<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
											<?php } ?>

											<?php if( $show_exceprt == 1 ) { ?>
												<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
												<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
											<?php } elseif( $show_content == 1 ) { ?>
												<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
											<?php } ?>

											<?php if( $show_button == 1 && ! empty( $button_text ) ) { ?>
												<div class="hongo-blog-button-wrap">
													<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
														<?php echo esc_html( $button_text ); ?>
													</a>
												</div>
											<?php } ?>

											<?php if( $show_separator == 1 ) { ?>
												<div class="separator-line-horizontal-full"></div>
											<?php } ?>
											<?php if( ! empty( $author_date_array ) ) { ?>
												<div class="hongo-blog-post-meta blog-date-author alt-font">
													<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
												</div>
											<?php } ?>

											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php 
														if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
															echo hongo_get_simple_likes_button( get_the_ID() );
														}
														if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) {
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
														}
													?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-masonry':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published' . esc_attr( $meta_text_transform ) . '">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}

					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = wp_kses_post( $author_image ).'<span class="hongo-blog-post-meta blog-author display-inline-block' . esc_attr( $meta_text_transform ) . '">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

					echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left equalize sm-equalize-auto blog-style2-' . $blog_style . esc_attr( $class_column ) . esc_attr( $zoom_effect ) . esc_attr( $no_img_class ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) || ( $show_category == 1 && $post_category ) ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<?php
										if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) {
											echo get_template_part( 'loop/index/loop', 'common' );
										}
									?>
									<?php if( $show_category == 1 && $post_category ) { ?>
										<div class="hongo-blog-post-category alt-font"><?php echo sprintf( '%s', $post_category ); ?></div>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<?php if( $blog_title == 1 ) { ?>
										<a class="entry-title alt-font<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
									<?php } ?>
									<?php if( $show_exceprt == 1 ) { ?>
										<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
										<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
									<?php } elseif( $show_content == 1 ) { ?>
										<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
									<?php } ?>
									<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
										<div class="hongo-blog-button-wrap">
											<a href="<?php echo esc_url ( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
												<?php echo esc_html( $button_text ); ?>
											</a>
										</div>
									<?php } ?>
									<?php if( $show_separator == 1 ) { ?>
										<div class="separator-line-horizontal-full"></div>
									<?php } ?>
									<?php if( ! empty( $author_date_array ) ) { ?>
										<div class="hongo-blog-post-meta blog-date-author alt-font">
											<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
										</div>
									<?php } ?>
									<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php 
												if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
													echo hongo_get_simple_likes_button( get_the_ID() );
												}
											?>
											<?php
												if( $show_comment == 1 && (comments_open() || get_comments_number())){
													echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
												}
											?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-grid':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left equalize sm-equalize-auto blog-style3-' . $blog_style . esc_attr( $class_column ) . esc_attr( $zoom_effect ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<?php echo get_template_part( 'loop/index/loop', 'common' ); ?>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<?php if( $show_category == 1 && $post_category ) { ?>
										<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php echo sprintf( '%s', $post_category ); ?>
										</div>
									<?php } ?>
									<?php if( $blog_title == 1 ) { ?>
										<a class="entry-title alt-font<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url ( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
									<?php } ?>
									<?php if( $show_exceprt == 1 ) { ?>
										<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
										<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
									<?php } elseif( $show_content == 1 ) { ?>
										<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
									<?php } ?>
									<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
										<div class="hongo-blog-button-wrap">
											<a href="<?php echo esc_url ( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
												<?php echo esc_html( $button_text ); ?>
											</a>
										</div>
									<?php } ?>
									<?php if( $show_separator == 1 ) { ?>
										<div class="separator-line-horizontal-full"></div>
									<?php } ?>
									
									<?php if( ! empty( $author_date_array ) ) { ?>
										<div class="hongo-blog-post-meta blog-date-author alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
										</div>
									<?php } ?>
									
									<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php 
												if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
													echo hongo_get_simple_likes_button( get_the_ID() );
												}
											?>
											<?php
												if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) {
													echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
												}
											?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-clean':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left blog-style4-' . $blog_style . esc_attr( $class_column ) . esc_attr( $zoom_effect ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo get_the_post_thumbnail( get_the_ID(), $srcset, $img_attr ); ?>
										<?php
											if( $blog_thumbnail_icon == '1' ){
												$blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
												$hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
										?>
												<?php if( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
												<?php } elseif( $post_format == 'gallery' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-slider"></span>
												<?php } elseif( $post_format == 'video' && $hongo_video_type_single == 'self' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-html5"></span>
												<?php } elseif( $post_format == 'video' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
												<?php } elseif( $post_format == 'audio' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
												<?php } elseif( $post_format == 'quote' ) { ?>
													<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
												<?php } ?>
										<?php } ?>
										<?php if( $hover_icon == '1' ) { ?>
											<div class="hongo-blog-side-arrow"><span class="ti-arrow-right"></span></div>
										<?php } ?>
									</a>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<?php if( $show_category == 1 && $post_category ) { ?>
										<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>"><?php echo sprintf( '%s', $post_category ); ?></div>
									<?php } ?>
									<?php if( $blog_title == 1 ) { ?>
										<a class="entry-title alt-font<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url ( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
									<?php } ?>
									<?php if( $show_exceprt == 1 ) { ?>
										<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
										<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
									<?php } elseif( $show_content == 1 ) { ?>
										<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
									<?php } ?>
									<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
										<div class="hongo-blog-button-wrap">
											<a href="<?php echo esc_url ( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
												<?php echo esc_html( $button_text ); ?>
											</a>
										</div>
									<?php } ?>
									<?php if( $show_separator == 1 ) { ?>
										<div class="separator-line-horizontal-full"></div>
									<?php } ?>
									<?php if( ! empty( $author_date_array ) ) { ?>
										<div class="hongo-blog-post-meta blog-date-author alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
										</div>
									<?php } ?>
									
									<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php
												if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
													echo hongo_get_simple_likes_button( get_the_ID() );
												}
											?>
											<?php
												if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) {
													echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
												}
											?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-modern':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

					echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left blog-style5-' . $blog_style . esc_attr( $class_column ) . esc_attr( $no_img_class ) . esc_attr( $zoom_effect ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<a href="<?php echo esc_url ( get_permalink() ); ?>">
										<?php echo get_the_post_thumbnail( get_the_ID(), $srcset, $img_attr ); ?>
									</a>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<?php
										if( $blog_thumbnail_icon == '1' ){
										
										$blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
										$hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
									?>

										<?php if( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
											</div>
										<?php } elseif( $post_format == 'gallery' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-slider"></span>
											</div>
										<?php } elseif( $post_format == 'video' && $hongo_video_type_single == 'self' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-html5"></span>
											</div>
										<?php } elseif( $post_format == 'video' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
											</div>
										<?php } elseif( $post_format == 'audio' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
											</div>
										<?php } elseif( $post_format == 'quote' ) { ?>
											<div class="hongo-blog-hover-icon">
												<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
											</div>
										<?php } ?>
									<?php } ?>
									<div class="hongo-blog-modern-wrap">
										<?php if( $show_category == 1 && $post_category ) { ?>
											<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>"><?php echo sprintf( '%s', $post_category ); ?></div>
										<?php } ?>
										<?php if( $blog_title == 1 ) { ?>
											<a class="entry-title alt-font<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo esc_html( get_the_title() ); ?>
											</a>
										<?php } ?>
										<?php if( $show_exceprt == 1 ) { ?>
											<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
											<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
										<?php } elseif( $show_content == 1 ) { ?>
											<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
										<?php } ?>
										<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
											<div class="hongo-blog-button-wrap">
												<a href="<?php echo esc_url ( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
													<?php echo esc_html( $button_text ); ?>
												</a>
											</div>
										<?php } ?>
									</div>
									
									<?php if( ! empty( $author_date_array ) || $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-modern-meta-wrap">
											<?php if( ! empty( $author_date_array ) ) { ?>
												<div class="hongo-blog-post-meta blog-date-author alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
												</div>
											<?php } ?>
											
											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php
														if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
															echo hongo_get_simple_likes_button( get_the_ID() );
														}
													?>
													<?php
														if( $show_comment == 1 && (comments_open() || get_comments_number())){
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
														}
													?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-only-text':
					
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

					echo '<li class="grid-item blog-single-post blog-post blog-post-content pull-left blog-style6-' . $blog_style . esc_attr( $class_column ) . esc_attr( $no_img_class ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<?php echo get_template_part( 'loop/index/loop', 'common' ); ?>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<?php if( ! empty( $author_date_array ) ) { ?>
										<div class="hongo-blog-post-meta blog-date-author alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
											<?php echo implode( '', $author_date_array ); ?>
										</div>
									<?php } ?>
									<div class="hongo-blog-textonly-wrap">
										<?php if( $show_post_date == 1 ) { ?>
											<span class="hongo-blog-post-meta blog-date display-inline-block published<?php echo esc_attr( $meta_text_transform ); ?>">
												<?php echo esc_html( get_the_date( $date_format, get_the_ID() ) ); ?>
											</span>
											<time class="updated display-none" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
												<?php echo esc_html( get_the_modified_date( $date_format ) ); ?>
											</time>
										<?php } ?>
										
										<?php if( $blog_title == 1 ) { ?>
											<a class="entry-title alt-font<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url ( get_permalink() ); ?>">
												<?php echo esc_html( get_the_title() ); ?>
											</a>
										<?php } ?>
										<?php if( $show_exceprt == 1 ) { ?>
											<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
											<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
										<?php } elseif( $show_content == 1 ) { ?>
											<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
										<?php } ?>
										<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
											<div class="hongo-blog-button-wrap">
												<a href="<?php echo esc_url ( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal">
													<?php echo esc_html( $button_text ); ?>
												</a>
											</div>
										<?php } ?>
										<?php if( $show_category == 1 && $post_category ) { ?>
											<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>"><?php echo sprintf( '%s', $post_category ); ?></div>
										<?php } ?>
									</div>
									<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-textonly-meta-wrap">
											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php
														if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
															echo hongo_get_simple_likes_button( get_the_ID() );
														}
													?>
													<?php
														if( $show_comment == 1 && (comments_open() || get_comments_number())){
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i><span>Leave a comment</span>', 'hongo' ), __( '<i class="fa-solid fa-comment"></i><span>1 Comment</span>', 'hongo' ), __( '<i class="fa-solid fa-comment"></i><span>% Comment(s)</span>', 'hongo' ), 'comment' );
														}
													?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-overlay-image':

					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

					echo '<li class="blog-post blog-single-post blog-post-content blog-style7-' . $blog_style . esc_attr( $class_column ) . esc_attr( $no_img_class ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<div class="hongo-overlay"></div>
							<?php if( $blog_thumbnail_icon == '1' ) { ?>
								<div class="hongo-blog-hover-icon">
									<?php $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true); ?>
									<?php $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true); ?>

									<?php if( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
									<?php } elseif( $post_format == 'gallery' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-slider"></span>
									<?php } elseif( $post_format == 'video' && $hongo_video_type_single == 'self' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>-html5"></span>
									<?php } elseif( $post_format == 'video' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
									<?php } elseif( $post_format == 'audio' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
									<?php } elseif( $post_format == 'quote' ) { ?>
										<span class="post-icon post-type-<?php echo esc_attr( $post_format ); ?>"></span>
									<?php } ?>
								</div>
							<?php } else { ?>
								<div class="hongo-blog-side-arrow"><a href="<?php echo esc_url( get_permalink() ); ?>"><span class="ti-arrow-right"></span></a></div>
							<?php } ?>			
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
								<?php $flag = 1; ?>
								<div class="blog-image">
									<div class="blog-image-vertical-middle cover-background" style="background-image:url( <?php echo get_the_post_thumbnail_url( get_the_ID(), $srcset, $img_attr ); ?> )">
									</div>
								</div>
							<?php } ?>
							<div class="blog-text col-md-12">
								<div class="content">
									<div class="hongo-overlay-image-content-wrap">
										<?php if( $show_category == 1 && $post_category ) { ?>
											<div class="hongo-blog-post-category alt-font<?php echo esc_attr( $meta_text_transform ); ?>"><?php echo sprintf( '%s', $post_category ); ?></div>
										<?php } ?>
										<?php if( $blog_title == 1 ) { ?>
											<a class="entry-title alt-font inner-match-height<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo esc_html( get_the_title() ); ?>
											</a>
										<?php } ?>
										<?php if( $show_exceprt == 1 ) { ?>
											<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
											<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
										<?php } elseif( $show_content == 1 ) { ?>
											<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
										<?php } ?>
										<?php if( $show_separator == 1 ) { ?>
											<div class="separator-line-horizontal-full"></div>
										<?php } ?>
										<?php if( ! empty( $author_date_array ) ) { ?>
											<div class="hongo-blog-post-meta blog-date-author alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
												<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
											</div>
										<?php } ?>
									</div>
									<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
										<div class="hongo-blog-textonly-meta-wrap">							
											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php
														if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
															echo hongo_get_simple_likes_button( get_the_ID() );
														}
													?>
													<?php
														if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) {
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i><span>Leave a comment</span>', 'hongo' ), __( '<i class="fa-solid fa-comment"></i><span>1 Comment</span>', 'hongo' ), __( '<i class="fa-solid fa-comment"></i><span>% Comment(s)</span>', 'hongo' ), 'comment' );
														}
													?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<?php
					break;

				case 'blog-image':
					
					if( $show_post_date == 1 ) {
						$author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published">' . esc_html( get_the_date( $date_format, get_the_ID() ) ) . '</span><time class="updated display-none" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date( $date_format ) ) . '</time>';
					}
					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					$no_img_class = ( $blog_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';
					
					echo '<li class="grid-item blog-post blog-single-post blog-style8-' . $blog_style . esc_attr( $class_column ) . esc_attr( $no_img_class ) . esc_attr( $zoom_effect ) . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php $post_format = get_post_format( get_the_ID() ); ?>
							<figure>
								<div class="hongo-overlay"></div>
								<?php if ( ! post_password_required() && $blog_thumbnail == 1 && has_post_thumbnail() ) { ?>
									<?php $flag = 1; ?>
									<div class="blog-img">
										<?php echo get_template_part( 'loop/index/loop', 'common' ); ?>
									</div>
								<?php } ?>
								<figcaption>
									<div class="post-details">
										<?php if( ( $show_category == 1 && $post_category ) || $show_like == 1 || $show_comment == 1 ) { ?>
											<?php if( $show_category == 1 && $post_category ) { ?>
												<?php $post_category_details = str_replace( '<span>|</span>', '/', $post_category ); ?>
												<div class="hongo-blog-post-category">
													<div class="blog-image-category-wrap">
														<?php echo sprintf( '%s', $post_category_details ); ?>
													</div>
												</div>
											<?php } ?>
											<?php if( $show_like == 1 || $show_comment == 1 ) { ?>
												<div class="hongo-blog-post-meta blog-like-comment alt-font<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php
														if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) {
															echo hongo_get_simple_likes_button( get_the_ID() );
														}
													?>
													<?php
														if( $show_comment == 1 && (comments_open() || get_comments_number())){
															echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' );
														}
													?>
												</div>
											<?php } ?>
										<?php } ?>
										<div class="blog-hover-box">
											<div class="content-wrap">
												<?php if( ! empty( $author_date_array ) ) { ?>
													<div class="hongo-author-meta-wrap<?php echo esc_attr( $meta_text_transform ); ?>">
														<span class="hongo-blog-post-meta blog-date-author alt-font">
															<?php echo implode( '<span class="blog-separator">|</span>', $author_date_array ); ?>
														</span>
													</div>
												<?php } ?>
												<?php if( $blog_title == 1 ) { ?>
													<a href="<?php echo get_the_permalink(); ?>" class="alt-font post-title entry-title<?php echo esc_attr( $title_text_transform ); ?>">
														<?php echo esc_html( get_the_title() ); ?>
													</a>
												<?php } ?>
												<?php if( $show_exceprt == 1 ) { ?>
													<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
													<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
												<?php } elseif( $show_content == 1 ) { ?>
													<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
												<?php } ?>
												<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
													<div class="hongo-blog-button-wrap">
														<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-white btn btn-very-small"><?php echo esc_html( $button_text ); ?></a>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>
					<?php
					break;

				case 'blog-standard':

					if( $show_author == 1 ) {
						if( $show_author_image == 1 ) {
							$author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
							$author_image .= '<img src="' . esc_url( $author_image_url ) . '" alt="' . esc_attr( get_the_author() ) . '">';
						}else {
							$author_image .= '<i class="fa-regular fa-user"></i>';
						}
						$author_date_array[] = $author_image . '<span class="hongo-blog-post-meta blog-author display-inline-block' . esc_attr( $meta_text_transform ) . '">'.esc_html__( 'By', 'hongo' ).' <span class="author vcard"><a href="' . esc_url( $author_url ) . '" class="url fn n">' . esc_html( get_the_author() ) . '</a></span></span>';
					}

					echo  '<div class="blog-single-post blog-post col-md-12 col-sm-12 col-xs-12 blog-style9-' . $blog_style . esc_attr( $hongo_animation_index ) . '"' . $hongo_animation_delay_attr . '>'; // @codingStandardsIgnoreLine
						$post_format = get_post_format( get_the_ID() );
					?>
						<div <?php echo sprintf( '%s', $hongo_post_classes ); ?>>
							<?php if ( ! post_password_required() && $blog_thumbnail == 1 ) { ?>
								<?php $flag = 1; ?>
								<?php if( $post_format == 'image' && $blog_format != 1 ) { ?>
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
									echo '</div>
								<?php } elseif( $post_format == 'audio' && $blog_format != 1 ) { ?>
									<div class="blog-image">
										<?php echo get_template_part( 'loop/index/loop', 'audio' ); ?>
									</div>
								<?php } else { ?>
									<?php if( has_post_thumbnail() && $blog_format == 1 ) { ?>
										<div class="blog-image blog-image-standard">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), $srcset, $img_attr ); ?>
											</a>
										</div>
									<?php } ?>
								<?php } ?>
							<?php } ?>
							
							<?php if( ( $show_category == 1 && $post_category ) || $author_date_array == 1 || $blog_title == 1 || $show_exceprt == 1 || $show_content == 1 || $show_button == 1 && ! empty($button_text) || ! empty( $author_date_array ) || $show_like == 1 || $show_comment == 1 ) { ?>
								<div class="blog-text">
									<div class="content">
										<div class="content-wrap">
											<?php if( ( $show_category == 1 && $post_category ) || $show_post_date == 1 ) { ?>
												<div class="hongo-blog-post-category blog-date<?php echo esc_attr( $meta_text_transform ); ?>">
													<?php
														if( $show_category == 1 && $post_category ) {
															echo sprintf( '%s', $post_category );
														}
													?>
													<?php if( $show_category == 1 && $post_category && $show_post_date == 1 ) { ?>
														<span class="dot">&bull;</span>
													<?php } ?>
													<?php if( $show_post_date == 1 ) { ?>
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
														<a class="alt-font entry-title<?php echo esc_attr( $title_text_transform ); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
															<?php echo esc_html( get_the_title() ); ?>
														</a>
													<?php } ?>
													<?php if( $show_exceprt == 1 ) { ?>
														<?php $show_excerpt_grid = ! empty( $excerpt_length ) ? hongo_get_the_excerpt_theme( $excerpt_length ) : hongo_get_the_excerpt_theme( 15 ); ?>
														<div class="entry-content"><?php echo sprintf( '%s', $show_excerpt_grid ); ?></div>
													<?php } elseif( $show_content == 1 ) { ?>
														<div class="entry-content blog-post-full-content"><?php echo hongo_get_the_post_content(); ?></div>
													<?php } ?>
												</div>
											<?php } ?>
											<?php if( $show_button == 1 && ! empty($button_text) ) { ?>
												<div class="hongo-blog-button-wrap">
													<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-very-small btn-dark-gray white-space-normal alt-font">
														<?php echo esc_html( $button_text ); ?>
													</a>
												</div>
											<?php } ?>
										</div>
										<?php if( ! empty( $author_date_array ) || $show_like == 1 || $show_comment == 1 ) { ?>
											<div class="hongo-blog-post-meta-wrap<?php echo esc_attr( $meta_text_transform ); ?>">
												<?php if( ! empty( $author_date_array ) ) { ?>
													<div class="hongo-blog-post-meta blog-date-author alt-font">
														<?php echo implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ); ?>
													</div>
												<?php } ?>
												<?php if( $show_like == 1 || $show_comment == 1 ){ ?>
													<?php if( $show_like == 1 && function_exists( 'hongo_get_simple_likes_button' ) ) { ?>
														<div class="hongo-blog-post-meta hongo-like-box alt-font">
															<?php echo hongo_get_simple_likes_button( get_the_ID() ); ?>
														</div>
													<?php } ?>
													<?php if( $show_comment == 1 && (comments_open() || get_comments_number() ) ) { ?>
														<div class="hongo-blog-post-meta hongo-comment-box alt-font">
															<?php echo comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo' ), 'comment' ); ?>
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
					<?php
					break;
			}	 
			$index_count++;
		}
	endwhile;

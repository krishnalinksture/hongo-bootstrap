<?php
/**
 * Shortcode For Blog
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_blog_shortcode' ) ) {
    function hongo_blog_shortcode( $atts, $content = null ) {

        global $post, $hongo_featured_array, $hongo_blog_style1, $hongo_blog_style2, $hongo_blog_style3, $hongo_blog_style4, $hongo_blog_style5, $hongo_blog_style5, $hongo_blog_style6, $hongo_blog_style7, $hongo_blog_style8, $hongo_blog_style9,$hongo_blog_unique_id;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_blog_unique_id_details' => '',
            'hongo_blog_premade_style' => '',
            'hongo_blog_column' => '3',
            'hongo_blog_type' => 'gutter-medium',

            'hongo_show_filter' => '',
            'hongo_show_all_categories_filter' => '1',
            'hongo_default_category_selected' => '',
            'hongo_show_all_text' => esc_html__( 'All', 'hongo-addons' ),

            'hongo_categories_list' => '',
            'hongo_main_categories_list' => '',
            'hongo_post_per_page' => '12',
            'hongo_show_post_thumbnail' => '1',
            'hongo_show_post_thumbnail_icon' => '1',
            'hongo_show_post_format' => '0',
            'hongo_image_srcset' => 'hongo-medium-image',
            'hongo_show_post_title' => '1',
            'hongo_show_separator' => '1',
            'hongo_separator_color' => '',
            'hongo_arrow_background_color' => '',
            'hongo_arrow_color' => '',
            'hongo_separator_height' => '',
            'hongo_show_post_date' => '1',
            'hongo_show_post_author' => '1',
            'hongo_show_post_author_image' => '0',
            'hongo_date_format' => 'd F Y',
            'hongo_show_category' => '1',
            'hongo_show_pagination' => '',
            'hongo_show_like' => '',
            'hongo_show_comment' => '',
            'hongo_show_button' => '',
            'hongo_button_text' => '',
            'hongo_show_excerpt' => '1',
            'hongo_show_content' => '1',
            'hongo_excerpt_length' => '18',
            'hongo_active_filter_color' => '',
            'hongo_active_filter_border_color' => '',
            'hongo_box_bg_color' => '',
            'hongo_category_bg_color' => '',
            'hongo_category_hover_bg_color' => '',
            'hongo_category_hover_border_color' => '',
            'hongo_category_border_color' => '',
            'hongo_box_bg_hover_color' => '',
            'hongo_font_title_setting' => '',
            'hongo_font_content_setting' => '',
            'hongo_font_filter_setting' => '',
            'hongo_font_meta_setting' => '',
            'hongo_button_setting' =>'',
            'font_setting_class_button' => '',
            'hongo_title_element_tag' => '',
            'hongo_box_enable_border' => '1',
            'hongo_box_enable_shadow' => '1',
            'hongo_box_border_color' => '',
            'hongo_box_border_size' => '',
            'hongo_box_border_type' => '',
            'hongo_orderby' => 'date',
            'hongo_order' => 'DESC',
            'hongo_token_class' => '',
            'hongo_animation_style' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',
            'hongo_blog_pagination_style' => 'number-pagination',
            'hongo_hide_icon' => '1',
            'enable_image_zoom_effect' => '1',
            'hongo_blog_opacity' => '0.7',
            'hongo_overlay_color' => '',
        ), $atts ) );

        // Check if slider id and class
        $hongo_blog_unique_id  = ! empty( $hongo_blog_unique_id ) ? $hongo_blog_unique_id : 1;
        $hongo_blog_unique_id_details  = ( $hongo_blog_unique_id_details ) ? $hongo_blog_unique_id_details : 'blog-style-unique';
        $hongo_blog_unique_id_details .= '-' . $hongo_blog_unique_id;
        $hongo_blog_unique_id++;

        $output = $class_column = $infinite_scroll_main_class = $post_icon = $separator = $hongo_post_classes_infinite_scroll = '';
        $classes = array();

        // Column Id and class
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        $classes[] = 'hongo-blog-styles hongo-'.$hongo_blog_premade_style;

        $hongo_blog_column = ! empty( $hongo_blog_column ) ? $hongo_blog_column : '3';

        $hongo_blog_type_gutter = ( $hongo_blog_type ) ? ' blog-post-gutter ' . $hongo_blog_type : '';
        $hongo_categories_list = ( $hongo_categories_list ) ? explode(',',$hongo_categories_list ) : array();
        $hongo_main_categories_list = ( $hongo_main_categories_list ) ? explode(',',$hongo_main_categories_list ) : array();
        $hongo_post_per_page = ( $hongo_post_per_page ) ? $hongo_post_per_page : '-1';
        $hongo_excerpt_length = ( $hongo_excerpt_length ) ? $hongo_excerpt_length : '';
        $hongo_show_post_format = ( $hongo_show_post_format ) ? $hongo_show_post_format : '';
        $hongo_show_post_title = ( $hongo_show_post_title ) ? $hongo_show_post_title : '';
        $hongo_show_post_thumbnail = ( $hongo_show_post_thumbnail ) ? $hongo_show_post_thumbnail : '';
        $hongo_date_format = ( $hongo_date_format ) ? $hongo_date_format : '';
        $hongo_show_category = ( $hongo_show_category ) ? $hongo_show_category : '';
        $hongo_show_like = ( $hongo_show_like ) ? $hongo_show_like : '';

        $hongo_zoom_effect = ( $enable_image_zoom_effect == 0 ) ? ' hongo-no-transition-image': '';

        $hongo_show_comment = ( $hongo_show_comment ) ? $hongo_show_comment : '';
        $hongo_button_text = ! empty( $hongo_button_text ) ? $hongo_button_text : esc_html__( 'CONTINUE READING', 'hongo-addons' );

        // Animation
        $hongo_animation_style = ( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $hongo_animation_style = ' wow '.$hongo_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? $hongo_animation_delay : '0';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? $hongo_animation_duration : '0';

        // Responsive typography
        $font_setting_class_title = ! empty( $hongo_font_title_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_title_setting ) : '';
        $font_setting_class_meta = ! empty( $hongo_font_meta_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_meta_setting ) : '';
        $font_setting_class_content = ! empty( $hongo_font_content_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_content_setting ) : '';
        $font_setting_class_filter = ! empty( $hongo_font_filter_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_filter_setting ) : '';
        $font_setting_class_button = ! empty( $hongo_button_setting ) ? hongo_shortcode_custom_css_class( $hongo_button_setting ) : '';

        $hongo_image_srcset = ( $hongo_image_srcset ) ? $hongo_image_srcset : 'full';

        switch( $hongo_blog_column ) {
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

        // Class List
        $class = ! empty( $classes ) ? ' class="' . implode( " ", $classes ) . '"' : '';

        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged'); 
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page'); 
        } else {
            $paged = 1;
        }

        // Get Sticky Post
        $sticky = get_option( 'sticky_posts' );

        $args = array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'posts_per_page'=> $hongo_post_per_page,
            'paged'         => $paged,
            'ignore_sticky_posts' => 1,
            'post__not_in'        => $sticky,
        );

        if ( ! empty( $hongo_categories_list ) && ! in_array( 'all', $hongo_categories_list ) ) {
            
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $hongo_categories_list,
                )
            );
        }

        if ( ! empty( $hongo_orderby ) ) {
            $args['orderby'] = $hongo_orderby;
        }
        if ( ! empty( $hongo_order ) ) {
            $args['order'] = $hongo_order;
        }

        $blog_query = new WP_Query( $args );

        if ( $blog_query->have_posts() ) {

            // WP_query For Blog Categories
            if ( ( $id || $class ) && ! empty( $hongo_blog_premade_style ) ) {
                $output .= '<div'.$id.$class.'>';
            }

            // Filter
            if ( $hongo_show_filter == 1 ) {

                if ( ! empty( $hongo_active_filter_color ) ) {
                    $hongo_featured_array[] = '#'.$hongo_blog_unique_id_details.' li.active a { color:'.$hongo_active_filter_color.'!important; }';
                }

                if ( ! empty( $hongo_active_filter_border_color ) ) {
                    $hongo_featured_array[] = '#'.$hongo_blog_unique_id_details.' li.active { border-bottom-color:'.$hongo_active_filter_border_color.'!important; }';
                }

                $hongo_show_all_text = ( $hongo_show_all_text ) ? $hongo_show_all_text : esc_html__( 'All', 'hongo-addons' );
                $output .= '<ul id="'.esc_attr( $hongo_blog_unique_id_details ).'" class="hongo-blog-filter-wrap alt-font">';
                    $active_class = ( $hongo_default_category_selected == 'all' ) ? ' active' : '';
                    $category_lists = array();

                    if ( ! empty( $hongo_main_categories_list ) ) {
                        $category_lists = $hongo_main_categories_list;
                    } else {
                        $category_lists = $hongo_categories_list;
                    }
                    
                    if ( $hongo_show_all_categories_filter == '1' && in_array( 'all', $category_lists ) ) {
                        $output .= '<li class="filter-tab'.esc_attr( $active_class ).'"><a class="filter-tab-link'.$font_setting_class_filter.'" href="#" data-id="'.esc_attr( $hongo_blog_unique_id_details ).'" data-filter="*">'. $hongo_show_all_text .'</a></li>';
                    }

                    if ( ! empty( $category_lists ) && ! is_wp_error( $category_lists ) ) {
                        $count_category = count( $category_lists );

                        if ( $count_category == '1' && in_array('all', $category_lists) ) {
                            $terms = get_terms( 'category' );
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                foreach( $terms as $term ) {
                                    $active_class = ( $hongo_default_category_selected == $term->slug ) ? ' active' : '';
                                    $output .= '<li class="filter-tab'.esc_attr( $active_class ).'"><a class="filter-tab-link'.$font_setting_class_filter.'" href="#" data-id="'.esc_attr( $hongo_blog_unique_id_details ).'" data-filter=".'.esc_attr( $term->slug ).'">'.$term->name.'</a></li>';
                                }
                            }
                        } else {
                            foreach ( $category_lists as $category_list ) {
                                if ( $category_list == 'all' ) {
                                    continue;
                                }
                                $catObj = get_category_by_slug( $category_list );
                                if ( ! empty( $catObj ) && ! is_wp_error( $catObj ) ) {
                                    $active_class = ( $hongo_default_category_selected == $catObj->slug ) ? ' active' : '';
                                    $output .= '<li class="filter-tab'.esc_attr( $active_class ).'"><a class="filter-tab-link'.$font_setting_class_filter.'" href="#" data-id="'.esc_attr( $hongo_blog_unique_id_details ).'" data-filter=".'.esc_attr( $catObj->slug ).'">'.$catObj->name.'</a></li>';
                                }
                            }
                        }
                    }

                $output .= '</ul>';
            }

            if ( $hongo_show_pagination == 1 ) {
                if ( $hongo_blog_pagination_style == 'infinite-scroll-pagination' ) {
                    $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    $hongo_post_classes_infinite_scroll = ' blog-single-post';
                }

                if ( $hongo_blog_pagination_style == 'load-more-pagination' ) {
                    $infinite_scroll_main_class = ' loadmore-scroll-pagination';
                    $hongo_post_classes_infinite_scroll = ' blog-single-post';
                }
            }

            // Structure Start
            if ( $hongo_blog_premade_style == 'blog-standard' ) {
                $output .= '<div class="blog-posts hongo-blog-common '.esc_attr( $hongo_blog_premade_style ).' '.esc_attr( $hongo_blog_unique_id_details ).esc_attr( $infinite_scroll_main_class ).'" data-col="'.esc_attr( $hongo_blog_column ).'" data-uniqueid="'.esc_attr( $hongo_blog_unique_id_details ).'">';
            } else {
                $output .= '<div class="blog-posts '.esc_attr( $hongo_blog_premade_style ).'" data-col="'.esc_attr( $hongo_blog_column ).'">';
                    $output .= '<ul class="post-grid hongo-blog-common '.esc_attr( $hongo_blog_unique_id_details ).esc_attr( $hongo_blog_type_gutter ).esc_attr( $infinite_scroll_main_class ).'" data-uniqueid="'.esc_attr( $hongo_blog_unique_id_details ).'">';
                        $output .= '<li class="grid-sizer"></li>';
            }

            $i = 0;
            while( $blog_query->have_posts() ) : $blog_query->the_post();

                ob_start();
                    post_class();
                    $hongo_post_classes = ob_get_contents();
                ob_end_clean();

                // Image Alt, Title, Caption 
                $img_alt = hongo_option_image_alt( get_post_thumbnail_id() );
                $img_title = hongo_option_image_title( get_post_thumbnail_id() );
                $image_alt = isset( $img_alt['alt'] ) && ! empty( $img_alt['alt'] )  ? $img_alt['alt'] : '';
                $image_title = isset( $img_title['title'] ) && ! empty( $img_title['title'] ) ? $img_title['title'] : '';

                $img_attr = array(
                    'title' => $image_title,
                    'alt' => $image_alt,
                );
                $popup_id = 'blog-'.get_the_ID();

                $filter_class = '';
                $post_cat = $filter_cat = array();

                $categories = get_the_category();
                if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {

                    foreach ( $categories as $k => $cat ) {
                        $cat_link = get_category_link($cat->cat_ID);
                        $post_cat[]='<a href="'.esc_url($cat_link).'" class="hongo-blog-post-meta'.$font_setting_class_meta.'" rel="category tag">'.$cat->name.'</a>';
                        $filter_cat[] = $cat->slug;
                    }
                    $filter_class = ' hongo-filter-tab-content ';
                    $filter_class .= implode( ' ', $filter_cat );
                }
                if ( $hongo_blog_premade_style == 'blog-side-image' || $hongo_blog_premade_style == 'blog-grid' || $hongo_blog_premade_style == 'blog-modern' || $hongo_blog_premade_style == 'blog-overlay-image'  ) {

                    $separator = '<span class="hongo-blog-post-separator'.$font_setting_class_meta.'"> | </span>';

                } elseif ( $hongo_blog_premade_style == 'blog-masonry' ) {

                    $separator = '<span class="hongo-blog-post-separator'.$font_setting_class_meta.'">, </span>';

                } elseif ( $hongo_blog_premade_style == 'blog-standard' ) {

                    $separator = '<span class="dot'.$font_setting_class_meta.'">•</span>';

                }
                $post_category = ! empty( $post_cat ) ? implode( $separator, $post_cat ) : '';
                $post_format = get_post_format( get_the_ID() );
                $hongo_animation_delay_attr = ! empty( $hongo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="' . ( $hongo_animation_delay * $i ) . 'ms"' : '';
                $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

                $author_date_array = $category_date_array = array();
                $author_image = $no_img_class = '';
                $flag = 0;

                switch( $hongo_blog_premade_style ) {

                    case 'blog-side-image':

                        $hongo_blog_style1 = ! empty( $hongo_blog_style1 ) ? $hongo_blog_style1 : 0;
                        $hongo_blog_style1 = $hongo_blog_style1 + 1;

                        // Separator color
                        if ( ! empty( $hongo_separator_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style1-'.$hongo_blog_style1.' .separator-line-horizontal-full { background-color:'.$hongo_separator_color.'; }';
                        }

                        // Separator thickness
                        if ( ! empty( $hongo_separator_height ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style1-'.$hongo_blog_style1.' .separator-line-horizontal-full { height:'.$hongo_separator_height.'; }';
                        }

                        // Specific color by key ( By Author text, date )
                        if ( ! empty( $hongo_font_meta_setting ) ) {
		                    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
		                    if ( $meta_hover_color ) {
		                        $hongo_featured_array[] = '.hongo-blog-styles .blog-style1-'.$hongo_blog_style1.' .blog-author:hover, .hongo-blog-styles .blog-style1-'.$hongo_blog_style1.' .blog-date:hover  { color:'.$meta_hover_color.' !important; }';
		                    }
		                }

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }

                        $no_img_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

                        $output .= '<li class="grid-item blog-post blog-post-content pull-left blog-style1-'.$hongo_blog_style1.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $no_img_class ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                $output .= '<div class="equalize sm-equalize-auto width-100">';
                                    if ( ! post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5">';
                                            $output .=  '<a href="'.get_permalink().'">';
                                                $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                                if ( $hongo_show_post_thumbnail_icon == '1' ) {
                                                    $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                                    $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
                                                    if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'gallery' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                    } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                    } elseif ( $post_format == 'video' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'audio' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'quote' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    }
                                                }
                                            $output .=  '</a>';
                                        $output .= '</div>';
                                    }
                                    // Content Area
                                    if ( $flag == 0 ) {
                                        $output .= '<div class="blog-text col-md-12">';
                                    } else {
                                        $output .= '<div class="blog-text col-md-7">';
                                    }
                                        $output .= '<div class="display-table height-100">';
                                            $output .= '<div class="content display-table-cell vertical-align-middle">';
                                                if ( $hongo_show_category == 1 && $post_category ) {
                                                    $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                                }
                                                if ( $hongo_show_post_title == 1 ) {
                                                    $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                                }
                                                if ( $hongo_show_excerpt == 1 ) {
                                                    $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                    $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                                } elseif ( $hongo_show_content == 1 ) {
                                                    $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                                }
                                                if ( $hongo_show_button == 1 ) {
                                                    $output .= '<div class="hongo-blog-button-wrap">';
                                                        $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                                    $output .= '</div>';
                                                }
                                                if ( $hongo_show_separator == 1 ) {
                                                    $output .= '<div class="separator-line-horizontal-full"></div>';
                                                }
                                                if ( ! empty( $author_date_array ) ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                                }
                                                if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font'.$font_setting_class_meta.'">';
                                                        if ( $hongo_show_like == 1 ) {
                                                            $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                        }
                                                        if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                            if ( $hongo_show_like == 1 ) {
                                                                $output .= ' ';
                                                            }
                                                            ob_start();
                                                                comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                                $output .= ob_get_contents();
                                                            ob_end_clean();
                                                        }
                                                    $output .= '</div>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-masonry':

                        $no_img_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

                        $hongo_blog_style2 = ! empty( $hongo_blog_style2 ) ? $hongo_blog_style2 : 0;
                        $hongo_blog_style2 = $hongo_blog_style2 + 1;

                        // Separator color
                        if ( ! empty( $hongo_separator_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .separator-line-horizontal-full { background-color:'.$hongo_separator_color.'; }';
                        }

                        // Catgeory box bg color
                        if ( ! empty( $hongo_category_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .hongo-blog-post-category { background-color:'.$hongo_category_bg_color.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
                        if ( ! empty( $hongo_font_meta_setting ) ) {
		                    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
		                    if ( $meta_hover_color ) {
		                        $hongo_featured_array[] = '.hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .blog-author:hover, .hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .hongo-blog-post-meta:hover .blog-separator, .hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .blog-date:hover { color:'.$meta_hover_color.' !important; }';		                        
		                    }
		                }

                        // Separator thickness
                        if ( ! empty( $hongo_separator_height ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .separator-line-horizontal-full { height:'.$hongo_separator_height.'; }';
                        }

                        // Box background color
                        if ( ! empty ( $hongo_box_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style2-'.$hongo_blog_style2.' .blog-text {  background-color:'.$hongo_box_bg_color.'; }';
                        }

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }

                        $output .= '<li class="grid-item blog-post blog-post-content pull-left equalize sm-equalize-auto blog-style2-'.$hongo_blog_style2.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $hongo_zoom_effect ).esc_attr( $no_img_class ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) || ( $hongo_show_category == 1 && $post_category ) ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                    	if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
	                                        $output .=  '<a href="'.get_permalink().'">';
	                                            $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
	                                            if ( $hongo_show_post_thumbnail_icon == '1' ) {
	                                                $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
	                                                $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
	                                                if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
	                                                } elseif ( $post_format == 'gallery' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
	                                                } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
	                                                } elseif ( $post_format == 'video' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
	                                                } elseif ( $post_format == 'audio' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
	                                                } elseif ( $post_format == 'quote' ) {
	                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
	                                                }
	                                            }
	                                        $output .= '</a>';
	                                    }
                                        if ( $hongo_show_category == 1 && $post_category ) {
                                            $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                        }
                                    $output .= '</div>';
                                }

                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';

                                        if ( $hongo_show_post_title == 1 ) {
                                            $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                        }
                                        if ( $hongo_show_excerpt == 1 ) {
                                            $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                            $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                        } elseif ( $hongo_show_content == 1 ) {
                                            $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                        }
                                        if ( $hongo_show_button == 1 ) {
                                            $output .= '<div class="hongo-blog-button-wrap">';
                                                $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                            $output .= '</div>';
                                        }
                                        if ( $hongo_show_separator == 1 ) {
                                            $output .= '<div class="separator-line-horizontal-full"></div>';
                                        }
                                        
                                        if ( ! empty( $author_date_array ) ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font'.$font_setting_class_meta.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</div>';
                                        }
                                        if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                if ( $hongo_show_like == 1 ) {
                                                    $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                }
                                                if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                    if ( $hongo_show_like == 1 ) {
                                                        $output .= ' ';
                                                    }
                                                    ob_start();
                                                        comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }
                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';

                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-grid':

                        $hongo_blog_style3 = ! empty( $hongo_blog_style3 ) ? $hongo_blog_style3 : 0;
                        $hongo_blog_style3 = $hongo_blog_style3 + 1;

                        // Separator color
                        if ( ! empty( $hongo_separator_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style3-'.$hongo_blog_style3.' .separator-line-horizontal-full { background-color:'.$hongo_separator_color.'; }';
                        }

                        // Separator thickness
                        if ( ! empty( $hongo_separator_height ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style3-'.$hongo_blog_style3.' .separator-line-horizontal-full { height:'.$hongo_separator_height.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
						if ( ! empty( $hongo_font_meta_setting ) ) {
						    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
						    if ( $meta_hover_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style3-'.$hongo_blog_style3.' .blog-author:hover, .hongo-blog-styles .blog-style3-'.$hongo_blog_style3.' .blog-date:hover { color:'.$meta_hover_color.' !important; }';
						    }
						}

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }
                        $output .= '<li class="grid-item blog-post blog-post-content pull-left equalize sm-equalize-auto blog-style3-'.$hongo_blog_style3.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $hongo_zoom_effect ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                        $output .=  '<a href="'.get_permalink().'">';
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                            if ( $hongo_show_post_thumbnail_icon == '1' ) {

                                                $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                                $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);

                                                if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'gallery' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                } elseif ( $post_format == 'video' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'audio' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'quote' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                }
                                            }
                                        $output .=  '</a>';
                                    $output .= '</div>';
                                }

                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';
                                        if ( $hongo_show_category == 1 && $post_category ) {
                                            $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                        }
                                        if ( $hongo_show_post_title == 1 ) {
                                            $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                        }
                                        if ( $hongo_show_excerpt == 1 ) {
                                            $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                            $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                        } elseif ( $hongo_show_content == 1 ) {
                                            $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                        }
                                        if ( $hongo_show_button == 1 ) {
                                            $output .= '<div class="hongo-blog-button-wrap">';
                                                $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                            $output .= '</div>';
                                        }
                                        if ( $hongo_show_separator == 1 ) {
                                            $output .= '<div class="separator-line-horizontal-full"></div>';
                                        }
                                        
                                        if ( ! empty( $author_date_array ) ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                        }
                                        
                                        if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                if ( $hongo_show_like == 1 ) {
                                                    $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                }
                                                if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                    if ( $hongo_show_like == 1 ) {
                                                        $output .= ' ';
                                                    }
                                                    ob_start();
                                                        comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                        $output .= ob_get_contents();
                                                    ob_end_clean();
                                                }
                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-clean':

                        $hongo_blog_style4 = ! empty( $hongo_blog_style4 ) ? $hongo_blog_style4 : 0;
                        $hongo_blog_style4 = $hongo_blog_style4 + 1;
                        
                        // Separator color
                        if ( ! empty( $hongo_separator_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .separator-line-horizontal-full { background-color:'.$hongo_separator_color.'; }';
                        }
                        // Separator thickness
                        if ( ! empty( $hongo_separator_height ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .separator-line-horizontal-full { height:'.$hongo_separator_height.'; }';
                        }

                        // Catgeory box bg color
                        if ( ! empty( $hongo_category_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .hongo-blog-post-category a {  background-color:'.$hongo_category_bg_color.'; }';
                        }

                        // Arrow color
                        if ( ! empty( $hongo_arrow_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .blog-image .hongo-blog-side-arrow { color:'.$hongo_arrow_color.'; }';
                        }

                        // Arrow background color
                        if ( ! empty( $hongo_arrow_background_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .blog-image .hongo-blog-side-arrow { background-color:'.$hongo_arrow_background_color.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
						if ( ! empty( $hongo_font_meta_setting ) ) {
						    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
						    if ( $meta_hover_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .blog-author:hover, .hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .blog-date:hover{ color:'.$meta_hover_color.' !important; }';
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style4-'.$hongo_blog_style4.' .hongo-blog-post-meta:before{ background-color:'.$meta_hover_color.' !important; }';
						    }
						}

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }                        
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }
                        $output .= '<li class="grid-item blog-post blog-post-content pull-left blog-style4-'.$hongo_blog_style4.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $hongo_zoom_effect ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                        $output .= '<a href="'.get_permalink().'">';
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                            if ( $hongo_show_post_thumbnail_icon == '1' ) {
                                                $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                                $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);

                                                if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'gallery' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                } elseif ( $post_format == 'video' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'audio' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'quote' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                }
                                            }
                                            if ( $hongo_hide_icon == 1 ) { 
                                                $output .= '<div class="hongo-blog-side-arrow"><span class="ti-arrow-right"></span></div>';
                                            }
                                        $output .=  '</a>';
                                    $output .= '</div>';
                                }

                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';
                                        if ( $hongo_show_category == 1 && $post_category ) {
                                            $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                        }
                                        if ( $hongo_show_post_title == 1 ) {
                                            $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                        }
                                        if ( $hongo_show_excerpt == 1 ) {
                                            $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                            $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                        } elseif ( $hongo_show_content == 1 ) {
                                            $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                        }
                                        if ( $hongo_show_button == 1 ) {
                                            $output .= '<div class="hongo-blog-button-wrap">';
                                                $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                            $output .= '</div>';
                                        }
                                        if ( $hongo_show_separator == 1 ) {
                                            $output .= '<div class="separator-line-horizontal-full"></div>';
                                        }

                                        if ( ! empty( $author_date_array ) ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                        }
                                        
                                        if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                if ( $hongo_show_like == 1 ) {
                                                    $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                }
                                                if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                    if ( $hongo_show_like == 1 ) {
                                                        $output .= ' ';
                                                    }
                                                    ob_start();
                                                        comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }
                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-modern':

                        $hongo_blog_style5 = ! empty( $hongo_blog_style5 ) ? $hongo_blog_style5 : 0;
                        $hongo_blog_style5 = $hongo_blog_style5 + 1;

                        if ( ! empty( $hongo_blog_opacity ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles li:hover.blog-style5-'.$hongo_blog_style5.' .blog-image img { opacity:'.$hongo_blog_opacity.'; }';
                        }

                        if ( ! empty( $hongo_overlay_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style5-'.$hongo_blog_style5.' .blog-image { background-color:'.$hongo_overlay_color.'; }';
                        }

                        // Box background color
                        if ( ! empty ( $hongo_box_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style5-'.$hongo_blog_style5.' .blog-text .hongo-blog-modern-wrap {  background-color:'.$hongo_box_bg_color.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
						if ( ! empty( $hongo_font_meta_setting ) ) {
						    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
						    if ( $meta_hover_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style5-'.$hongo_blog_style5.' .blog-author:hover, .hongo-blog-styles .blog-style5-'.$hongo_blog_style5.' .blog-date:hover { color:'.$meta_hover_color.' !important; }';
						    }
						}

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }
                        
                        $no_image_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';
                        
                        $output .= '<li class="grid-item blog-post blog-post-content pull-left blog-style5-'.$hongo_blog_style5.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ) .esc_attr( $no_image_class ).esc_attr( $hongo_zoom_effect ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                        $output .=  '<a href="'.get_permalink().'">';
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                        $output .=  '</a>';
                                    $output .= '</div>';
                                }

                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';
                                        if ( $hongo_show_post_thumbnail_icon == '1' ) {
                                            $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                            $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
                                            if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                $output .= '</div>';
                                            } elseif ( $post_format == 'gallery' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                $output .= '</div>';
                                            } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                $output .= '</div>';
                                            } elseif ( $post_format == 'video' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                $output .= '</div>';
                                            } elseif ( $post_format == 'audio' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                $output .= '</div>';
                                            } elseif ( $post_format == 'quote' ) {
                                                $output .= '<div class="hongo-blog-hover-icon">';
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                $output .= '</div>';
                                            }
                                        }
                                        $output .= '<div class="hongo-blog-modern-wrap">';
                                            if ( $hongo_show_category == 1 && $post_category ) {
                                                $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                            }
                                            if ( $hongo_show_post_title == 1 ) {
                                                $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                            }
                                            if ( $hongo_show_excerpt == 1 ) {
                                                $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                            } elseif ( $hongo_show_content == 1 ) {
                                                $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                            }
                                            if ( $hongo_show_button == 1 ) {
                                                $output .= '<div class="hongo-blog-button-wrap">';
                                                    $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                                $output .= '</div>';
                                            }
                                        $output .= '</div>';

                                        if ( ! empty( $author_date_array ) || $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                            $output .= '<div class="hongo-blog-modern-meta-wrap">';

                                                if ( ! empty( $author_date_array ) ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                                }

                                                if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                        if ( $hongo_show_like == 1 ) {
                                                            $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                        }
                                                        if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                            if ( $hongo_show_like == 1 ) {
                                                                $output .= ' ';
                                                            }
                                                            ob_start();
                                                                comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                                $output .= ob_get_contents();  
                                                            ob_end_clean();
                                                        }
                                                    $output .= '</div>';
                                                }                       
                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-only-text':

                        $hongo_blog_style6 = ! empty( $hongo_blog_style6 ) ? $hongo_blog_style6 : 0;
                        $hongo_blog_style6 = $hongo_blog_style6 + 1;

                        // Box background color
                        if (! empty ( $hongo_box_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post {  background-color:'.$hongo_box_bg_color.'; }';
                        }
                        // Catgeory box bg color
                        if ( ! empty( $hongo_category_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .hongo-blog-post-category a {  background-color:'.$hongo_category_bg_color.'; }';
                        }

                        //Box background hover color
                        if ( ! empty( $hongo_box_bg_hover_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post:hover {  background-color:'.$hongo_box_bg_hover_color.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
						if ( ! empty( $hongo_font_meta_setting ) ) {
						    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
						    if ( $meta_hover_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .blog-author:hover, .hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .blog-date:hover { color:'.$meta_hover_color.' !important; }';
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .blog-date-author .blog-author:after { background-color:'.$meta_hover_color.' !important; }';
						    }
						}

                        //Border Shadow
                        if ( $hongo_box_enable_shadow != 1 ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post {  box-shadow:none; }';
                        }

                        // Border
                        if ( $hongo_box_enable_border == 1 ) {
                                                        
                            if ( ! empty( $hongo_box_border_type ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post {  border-style:'.$hongo_box_border_type.'; }';
                            }
                            // Box Border width
                            if ( ! empty( $hongo_box_border_size ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post { border-width:'.$hongo_box_border_size.'; }';
                            }
                            // Box Border Color
                            if ( ! empty( $hongo_box_border_color ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post { border-color:'.$hongo_box_border_color.'; }';
                            }

                        } else {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style6-'.$hongo_blog_style6.' .post { border:none; }';
                        }

                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }

                        $no_img_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

                        $output .= '<li class="grid-item blog-post blog-post-content pull-left blog-style6-'.$hongo_blog_style6.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $no_img_class ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                        $output .=  '<a href="'.get_permalink().'">';
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                            if ( $hongo_show_post_thumbnail_icon == '1' ) {

                                                $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                                $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);

                                                if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'gallery' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                } elseif ( $post_format == 'video' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'audio' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                } elseif ( $post_format == 'quote' ) {
                                                    $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                }
                                            } 
                                        $output .=  '</a>';
                                    $output .= '</div>';
                                }

                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';
                                        
                                        if ( ! empty( $author_date_array ) ) {
                                            $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '', $author_date_array ).'</div>';
                                        }

                                        $output .= '<div class="hongo-blog-textonly-wrap">';


                                            if ( $hongo_show_post_date == 1 ) {
                                                $output .= '<span class="hongo-blog-post-meta blog-date alt-font published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                                            }
                                            if ( $hongo_show_post_title == 1 ) {
                                                $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                            }
                                            if ( $hongo_show_excerpt == 1 ) {
                                                $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                            } elseif ( $hongo_show_content == 1 ) {
                                                $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                            }
                                            if ( $hongo_show_button == 1 ) {
                                                $output .= '<div class="hongo-blog-button-wrap">';
                                                    $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                                $output .= '</div>';
                                            }
                                            if ( $hongo_show_category == 1 && $post_category ) {
                                                $output .= '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                                            }
                                        $output .= '</div>';

                                        if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {

                                            $output .= '<div class="hongo-blog-textonly-meta-wrap">';

                                                if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                        if ( $hongo_show_like == 1 ) {
                                                            $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                        }
                                                        if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                            if ( $hongo_show_like == 1 ) {
                                                                $output .= ' ';
                                                            }
                                                            ob_start();
                                                                comments_popup_link( __( '<i class="fa-regular fa-comment"></i><span>Leave a comment</span>', 'hongo-addons' ), __( '<i class="fa-solid fa-comment"></i><span>1 Comment</span>', 'hongo-addons' ), __( '<i class="fa-solid fa-comment"></i><span>% Comment(s)</span>', 'hongo-addons' ), 'comment'.$font_setting_class_meta.$font_setting_class_meta );
                                                                $output .= ob_get_contents();
                                                            ob_end_clean();
                                                        }
                                                    $output .= '</div>';
                                                }

                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-overlay-image':

                        $hongo_blog_style7 = ! empty( $hongo_blog_style7 ) ? $hongo_blog_style7 : 0;
                        $hongo_blog_style7 = $hongo_blog_style7 + 1;

                        if ( ! empty( $hongo_blog_opacity ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-post:hover.blog-style7-'.$hongo_blog_style7.' .hongo-overlay { opacity:'.$hongo_blog_opacity.'; }';
                        }

                        if ( ! empty( $hongo_overlay_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-post:hover.blog-style7-'.$hongo_blog_style7.' .hongo-overlay { background-color:'.$hongo_overlay_color.'; }';
                        }

                        // Separator color
                        if ( ! empty( $hongo_separator_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .separator-line-horizontal-full { background-color:'.$hongo_separator_color.'; }';
                        }
                        
                        // Arrow color
                        if ( ! empty( $hongo_arrow_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .hongo-blog-side-arrow a span { color:'.$hongo_arrow_color.'!important; }';
                        }

                        // Arrow background color
                        if ( ! empty( $hongo_arrow_background_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .hongo-blog-side-arrow a { background-color:'.$hongo_arrow_background_color.'; }';
                        }

                        // Specific color by key ( Separator, date, by author )
						if ( ! empty( $hongo_font_meta_setting ) ) {
						    $meta_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
						    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title_hover', $hongo_font_meta_setting );
						    if ( $meta_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.'.blog-post:hover .blog-like-comment a i { color:'.$meta_color.' !important; }';
						    }
						    if ( $meta_hover_color ) {
						        $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.'.blog-post:hover .blog-like-comment a:hover i { color:'.$meta_hover_color.' !important; }';
						    }
						}

                        // Separator thickness
                        if ( ! empty( $hongo_separator_height ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .separator-line-horizontal-full { height:'.$hongo_separator_height.'; }';
                        }
                        // Box background color
                        if (! empty ( $hongo_box_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .post { background-color:'.$hongo_box_bg_color.'; }';
                        }
                        if ( $hongo_box_enable_border == 1 ) {
                            // Box Border Type
                            if ( ! empty( $hongo_box_border_type ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .post { border-style:'.$hongo_box_border_type.'; }';
                            }
                            // Box Border width
                            if ( ! empty( $hongo_box_border_size ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .post { border-width:'.$hongo_box_border_size.'; }';
                            }
                            // Box Border Color
                            if ( ! empty( $hongo_box_border_color ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .post { border-color:'.$hongo_box_border_color.'; }';
                            }
                        } else {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style7-'.$hongo_blog_style7.' .post { border:none; }';
                        }

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        if ( $hongo_show_category == 1 && $post_category ) {
                            $category_date_array[] = '<div class="hongo-blog-post-category alt-font">'.$post_category.'</div>';
                        }
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }
                        
                        $no_img_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

                        $output .= '<li class="grid-item blog-post blog-post-content pull-left blog-style7-'.$hongo_blog_style7.esc_attr( $hongo_animation_style ).esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $no_img_class ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                $output .= '<div class="hongo-overlay"></div>';
                                if ( $hongo_show_post_thumbnail_icon == '1' && ! empty( $post_format ) ) {
                                    $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                    $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);
                                    $output .= '<div class="hongo-blog-side-arrow">';
                                        $output .= '<a href="'.get_permalink().'">';
                                            if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                            } elseif ( $post_format == 'gallery' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                            } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                            } elseif ( $post_format == 'video' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                            } elseif ( $post_format == 'audio' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                            } elseif ( $post_format == 'quote' ) {
                                                $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                            }
                                        $output .= '</a>';
                                    $output .= '</div>';
                                } else {
                                    $output .= '<div class="hongo-blog-side-arrow"><a href="'.get_permalink().'"><span class="ti-arrow-right"></span></a></div>';
                                }
                                if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                    $flag = 1;
                                    $output .= '<div class="blog-image">';
                                        $output .= '<div class="blog-image-vertical-middle cover-background" style="background-image:url( '.get_the_post_thumbnail_url( get_the_ID(), $hongo_image_srcset, $img_attr ).' )"></div>';
                                    $output .= '</div>';
                                }
                                $output .= '<div class="blog-text col-md-12">';
                                    $output .= '<div class="content">';
                                        $output .= '<div class="hongo-overlay-image-content-wrap">';
                                            if ( ! empty( $category_date_array ) ) {
                                                $output .= '<div class="hongo-category-meta alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $category_date_array ).'</div>';
                                            }
                                            if ( $hongo_show_post_title == 1 ) {
                                                $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                            }
                                            if ( $hongo_show_excerpt == 1 ) {
                                                $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                            } elseif ( $hongo_show_content == 1 ) {
                                                $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                            }
                                            if ( $hongo_show_separator == 1 ) {
                                                $output .= '<div class="separator-line-horizontal-full"></div>';
                                            }
                                            if ( ! empty( $author_date_array ) ) {
                                                $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                            }

                                            if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                $output .= '<div class="hongo-blog-post-meta blog-like-comment alt-font">';
                                                    if ( $hongo_show_like == 1 ) {
                                                        $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                    }
                                                    if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                        if ( $hongo_show_like == 1 ) {
                                                            $output .= ' ';
                                                        }
                                                        ob_start();
                                                            comments_popup_link( __( '<i class="fa-regular fa-comment"></i><span>Leave a comment</span>', 'hongo-addons' ), __( '<i class="fa-solid fa-comment"></i><span>1 Comment</span>', 'hongo-addons' ), __( '<i class="fa-solid fa-comment"></i><span>% Comment(s)</span>', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                            $output .= ob_get_contents();  
                                                        ob_end_clean();
                                                    }
                                                $output .= '</div>';
                                            }
                                        $output .= '</div>';

                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-image':

                        $hongo_blog_style8 = ! empty( $hongo_blog_style8 ) ? $hongo_blog_style8 : 0;
                        $hongo_blog_style8 = $hongo_blog_style8 + 1;

                        if ( ! empty( $hongo_blog_opacity ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' figure .hongo-overlay { opacity:'.$hongo_blog_opacity.'; }';
                        }

                        if ( ! empty( $hongo_overlay_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' figure .hongo-overlay { background-color:'.$hongo_overlay_color.'; }';
                        }
                        
						// Specific color by key ( Separator, date, by author )
                        if ( ! empty( $hongo_font_meta_setting ) ) {
		                    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
		                    if ( $meta_hover_color ) {
		                        $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .blog-author:hover, .hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .hongo-blog-post-meta:hover .blog-separator, .hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .blog-date:hover, .hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .blog-date-author { color:'.$meta_hover_color.' !important; }';
		                    }
		                }

		                // Catgeory box bg color
                        if ( ! empty( $hongo_category_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .hongo-blog-post-category .blog-image-category-wrap a {  background-color:'.$hongo_category_bg_color.'; }';
                        }

                        // Catgeory box hover bg color
                        if ( ! empty( $hongo_category_hover_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' figure:hover .blog-image-category-wrap a {  background-color:'.$hongo_category_hover_bg_color.'; }';
                        }

                        // Category box border color
                        if ( ! empty( $hongo_category_border_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' .hongo-blog-post-category a {  border-color:'.$hongo_category_border_color.'; }';
                        }

                        // Catgeory box hover border color
                        if ( ! empty( $hongo_category_hover_border_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style8-'.$hongo_blog_style8.' figure:hover .blog-image-category-wrap a {  border-color:'.$hongo_category_hover_border_color.'; }';
                        }

                        if ( $hongo_show_post_date == 1 ) {
                            $author_date_array[] = '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                        }
                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url($author_image_url).'" alt="'.get_the_author().'"> ';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }

                        $no_img_class = ( $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) ? '' : ' hongo-no-image';

                        $output .= '<li class="grid-item blog-post blog-style8-'.$hongo_blog_style8.esc_attr( $class_column ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $hongo_zoom_effect ).esc_attr( $hongo_animation_style ).esc_attr( $no_img_class ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                $output .= '<figure>';
                                    $output .= '<div class="hongo-overlay"></div>';
                                    if ( !post_password_required() && $hongo_show_post_thumbnail == 1 && has_post_thumbnail() ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-img">';
                                            $output .=  '<a href="'.get_permalink().'">';
                                                $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                                if ( $hongo_show_post_thumbnail_icon == '1' ) {
                                                    $blog_lightbox_gallery = get_post_meta( get_the_ID(), '_hongo_lightbox_image_single', true);
                                                    $hongo_video_type_single = get_post_meta( get_the_ID(), '_hongo_video_type_single', true);

                                                    if ( $post_format == 'gallery' && $blog_lightbox_gallery == '1' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'gallery' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'-slider"></span>';
                                                    } elseif ( $post_format == 'video' && $hongo_video_type_single == 'self' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'-html5"></span>';
                                                    } elseif ( $post_format == 'video' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'audio' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    } elseif ( $post_format == 'quote' ) {
                                                        $output .= '<span class="post-icon post-type-'.$post_format.'"></span>';
                                                    }
                                                }
                                            $output .=  '</a>';
                                        $output .= '</div>';
                                    }
                                    $output .= '<figcaption>';
                                        $output .= '<div class="post-details">';
                                                
                                                if ( ( $hongo_show_category == 1 && $post_category ) ||  $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                    $output .= '<div class="hongo-blog-post-category alt-font">';
                                                        if ( $hongo_show_category == 1 && $post_category ) {
                                                            $post_category_details = str_replace( '<span>|</span>', '/', $post_category );
                                                            $output .= '<div class="blog-image-category-wrap">'.$post_category_details.'</div>';
                                                        }
                                                        if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                            $output .= '<div class="hongo-blog-post-meta blog-like-comment">';
                                                                if ( $hongo_show_like == 1 ) {
                                                                    $output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                                }
                                                                if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                                    if ( $hongo_show_like == 1 ) {
                                                                        $output .= ' ';
                                                                    }
                                                                    ob_start();
                                                                        comments_popup_link( __( '<i class="fa-regular fa-comment"></i><span>Leave a comment</span>', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comment(s)', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                                        $output .= ob_get_contents();  
                                                                    ob_end_clean();
                                                                }
                                                            $output .= '</div>';
                                                        }
                                                    $output .= '</div>';
                                                }
                                            $output .= '<div class="blog-hover-box">';
                                                $output .= '<div class="content-wrap">';
                                                
                                                    if ( ! empty( $author_date_array ) ) {
                                                        $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font'.$font_setting_class_meta.'">'.implode( '<span class="blog-separator">|</span>', $author_date_array ).'</div>';
                                                    }

                                                    if ( $hongo_show_post_title == 1 ) {
                                                            $output .= '<a href="'.get_the_permalink().'" class="alt-font post-title entry-title'.$font_setting_class_title.'">'.get_the_title().'</a>';
                                                    }
                                                    if ( $hongo_show_excerpt == 1 ) {
                                                        $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                        $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                                    } elseif ( $hongo_show_content == 1 ) {
                                                        $output .='<div class="blog-post-full-content entry-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                                    }
                                                    if ( $hongo_show_button == 1 ) {
                                                        $output .= '<div class="hongo-blog-button-wrap">';
                                                            $output .= '<a href="'.get_permalink().'" class="btn-white btn btn-very-small'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';

                                            $output .= '</div>'; 
                                        $output .= '</div>';
                                    $output .= '</figcaption>';
                                $output .= '</figure>';
                            $output .= '</div>';
                        $output .= '</li>';
                    break;

                    case 'blog-standard':

                        ob_start();
                            post_class();
                            $hongo_post_classes = ob_get_contents();
                        ob_end_clean();
                        $hongo_blog_style9 = ! empty( $hongo_blog_style9 ) ? $hongo_blog_style9 : 0;
                        $hongo_blog_style9 = $hongo_blog_style9 + 1;

                        // Box background color
                        if (! empty ( $hongo_box_bg_color ) ) {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' { background-color:'.$hongo_box_bg_color.'; }';
                        }

                        if ( $hongo_box_enable_border == 1 ) {
                            // Box Border Type
                            if ( ! empty( $hongo_box_border_type ) ) {
                                //.hongo-blog-standard .blog-post
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' { border-style:'.$hongo_box_border_type.'; }';
                            }
                            // Box Border width
                            if ( ! empty( $hongo_box_border_size ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' { border-width:'.$hongo_box_border_size.'; }';
                            }
                            // Box Border Color
                            if ( ! empty( $hongo_box_border_color ) ) {
                                $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' { border-color:'.$hongo_box_border_color.'; }';
                            }
                        } else {
                            $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' { border:none; }';
                        }

                        // Specific color by key ( Separator, date, by author )
                        if ( ! empty( $hongo_font_meta_setting ) ) {
		                    $meta_hover_color = hongo_get_vc_custom_settings_by_key( 'color_title', $hongo_font_meta_setting );
		                    if ( $meta_hover_color ) {
		                        $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .blog-author:hover, .hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .hongo-blog-post-meta:hover .blog-separator, .hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .blog-date:hover, .hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .blog-date-author, .hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .content .content-wrap .hongo-blog-post-category span.dot { color:'.$meta_hover_color.' !important; }';
		                        $hongo_featured_array[] = '.hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .content .hongo-blog-post-meta-wrap, .hongo-blog-styles .blog-style9-'.$hongo_blog_style9.' .content .hongo-blog-post-meta-wrap > .hongo-blog-post-meta { border-color:'.$meta_hover_color.' !important; }';
		                    }
		                }

                        if ( $hongo_show_post_author == 1 ) {
                            if ( $hongo_show_post_author_image == 1 ) {
                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                $author_image .= '<img src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                            } else {
                                $author_image .= '<i class="fa-regular fa-user"></i>';
                            }
                            $author_date_array[] = $author_image.'<span class="hongo-blog-post-meta blog-author display-inline-block'.$font_setting_class_meta.'">'.esc_html__( 'By', 'hongo-addons' ).' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n'.$font_setting_class_meta.'">'.get_the_author().'</a></span></span>';
                        }
                        $output .= '<div class="blog-post col-md-12 col-sm-12 col-xs-12 blog-style9-'.$hongo_blog_style9.esc_attr( $hongo_animation_style ).esc_attr( $hongo_post_classes_infinite_scroll ).esc_attr( $filter_class ).'"'.$hongo_animation_delay_attr.$hongo_animation_duration_attr.'>';
                            $output .= '<div '.$hongo_post_classes.'>';
                                if ( !post_password_required() ) {
                                    if ( $hongo_show_post_thumbnail == 1 ) {
                                        $flag = 1;
                                        if ( $post_format == 'image' && $hongo_show_post_format != 1 ) {
                                            $output .= '<div class="blog-image">';
                                                ob_start();
                                                    include HONGO_ADDONS_ROOT . '/loop/loop-image.php';
                                                    $output .= ob_get_contents();
                                                ob_end_clean();
                                            $output .= '</div>';
                                        } elseif ( $post_format == 'gallery' && $hongo_show_post_format != 1 ) {
                                            $output .= '<div class="blog-image">';
                                                ob_start();
                                                    include HONGO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                    $output .= ob_get_contents();
                                                ob_end_clean();  
                                            $output .= '</div>';
                                        } elseif ( $post_format == 'video' && $hongo_show_post_format != 1 ) {
                                            $output .= '<div class="blog-image">';
                                                ob_start();
                                                    include HONGO_ADDONS_ROOT . '/loop/loop-video.php';
                                                    $output .= ob_get_contents();
                                                ob_end_clean();  
                                            $output .= '</div>';
                                        } elseif ( $post_format == 'quote' && $hongo_show_post_format != 1 ) {
                                            $output .= '<div class="blog-image">';
                                                ob_start();
                                                    include HONGO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                    $output .= ob_get_contents();
                                                ob_end_clean();
                                            $output .= '</div>';
                                        } elseif ( $post_format == 'audio' && $hongo_show_post_format != 1 ) {
                                            $output .= '<div class="blog-image">';
                                                ob_start();
                                                    include HONGO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                    $output .= ob_get_contents();
                                                ob_end_clean();
                                            $output .= '</div>';
                                        } else {
                                            if ( has_post_thumbnail() ) {
                                                $output .= '<div class="blog-image blog-image-standard">';
                                                    $output .=  '<a href="'.get_permalink().'">';
                                                        $output .= get_the_post_thumbnail( get_the_ID(), $hongo_image_srcset, $img_attr );
                                                    $output .=  '</a>';
                                                $output .= '</div>';
                                            } 
                                        }
                                    }
                                }
                                // Content Area           
                                $output .= '<div class="blog-text">';
                                    $output .= '<div class="content">';
                                        $output .= '<div class="content-wrap">';
                                            if ( ( $hongo_show_category == 1 && $post_category ) || $hongo_show_post_date == 1 ) {
                                                $output .= '<div class="hongo-blog-post-category blog-date alt-font">';
                                                    if ( $hongo_show_category == 1 && $post_category ) {
                                                        $output .= $post_category;
                                                    }
                                                    if ( ( $hongo_show_category == 1 && $post_category ) && $hongo_show_post_date == 1 ) {
                                                    	$output .= '<span class="dot">&bull;</span>';
                                                    }
                                                    if ( $hongo_show_post_date == 1 ) {
                                                        $output .= '<span class="hongo-blog-post-meta blog-date display-inline-block published'.$font_setting_class_meta.'">'.get_the_date( $hongo_date_format, get_the_ID() ).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $hongo_date_format ).'</time>';
                                                    }
                                                $output .= '</div>';
                                            }
                                            $output .= '<div class="title-content-wrap">';
                                                if ( $hongo_show_post_title == 1 ) {
                                                    $output .= '<a class="entry-title alt-font'.$font_setting_class_title.'" href="'.get_permalink().'">'.get_the_title().'</a>';
                                                }
                                                if ( $hongo_show_excerpt == 1 ) {
                                                    $show_excerpt_grid = ! empty( $hongo_excerpt_length ) ? hongo_get_the_excerpt_theme( $hongo_excerpt_length ) : hongo_get_the_excerpt_theme( 15 );
                                                    $output .= '<div class="entry-content'.$font_setting_class_content.'">'.$show_excerpt_grid.'</div>';
                                                } elseif ( $hongo_show_content == 1 ) {
                                                    $output .='<div class="entry-content blog-post-full-content'.$font_setting_class_content.'">'.hongo_get_the_post_content().'</div>';
                                                }
                                            $output .= '</div>';
                                            if ( $hongo_show_button == 1 ) {
                                                $output .= '<div class="hongo-blog-button-wrap">';
                                                    $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray white-space-normal alt-font'.$font_setting_class_button.'">'.$hongo_button_text.'</a>';
                                                $output .= '</div>';
                                            }
                                        $output .= '</div>';
                                        if ( ! empty( $author_date_array ) || $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                            $output .= '<div class="hongo-blog-post-meta-wrap">';
                                                if ( ! empty( $author_date_array ) ) {
                                                    $output .= '<div class="hongo-blog-post-meta blog-date-author alt-font'.$font_setting_class_meta.'">'.implode( '<span class="blog-separator vertical-align-middle'.$font_setting_class_meta.'">|</span>', $author_date_array ).'</div>';
                                                }
                                                if ( $hongo_show_like == 1 || $hongo_show_comment == 1 ) {
                                                    if ( $hongo_show_like == 1 ) {
                                                        $output .= '<div class="hongo-blog-post-meta hongo-like-box alt-font">';
                                                        	$output .= hongo_get_simple_likes_button( get_the_ID(), '', $font_setting_class_meta );
                                                        $output .= '</div>';
                                                    }

                                                    if ( $hongo_show_comment == 1 && ( comments_open() || get_comments_number() ) ) {
                                                        ob_start();
                                                            comments_popup_link( __( '<i class="fa-regular fa-comment"></i>Leave a comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>1 Comment', 'hongo-addons' ), __( '<i class="fa-regular fa-comment"></i>% Comments', 'hongo-addons' ), 'comment'.$font_setting_class_meta );
                                                            $output .= '<div class="hongo-blog-post-meta hongo-comment-box alt-font">';
                                                                $output .= ob_get_contents();  
                                                            $output .= '</div>';
                                                        ob_end_clean();
                                                    }
                                                }
                                            $output .= '</div>';
                                        }

                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    break;
                }
                $i++;
            endwhile;
            wp_reset_postdata();
            
            // Structure End 
            if ( $hongo_blog_premade_style == 'blog-standard' ) {
                $output .= '</div>';
            } else {
                    $output .= '</ul>';
                $output .= '</div>';
            }

            if ( $hongo_show_pagination == 1 && $blog_query->max_num_pages > 1 ) {
                if ( $hongo_blog_pagination_style != 'number-pagination'  ) {
                    $output .='<div class="page-load-status">';
                        $output .='<div class="infinite-scroll-request loading"></div>';
                        $output .='<div class="infinite-scroll-error infinite-scroll-last"><div class="finish-load alt-font">'. __( 'All posts loaded', 'hongo-addons' ).'</div></div>';
                    $output .='</div>';
                }
                if ( $hongo_blog_pagination_style == 'infinite-scroll-pagination'  ) {                    
                    $output .='<div class="pagination hongo-infinite-scroll hongo-common-blog-scroll display-none" data-pagination="'.$blog_query->max_num_pages.'">';
                        ob_start();
                            if ( get_next_posts_link( '', $blog_query->max_num_pages ) ) :
                                next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hongo-addons' ).'</span><i class="fa-solid fa-angle-right"></i>', $blog_query->max_num_pages );
                            endif;
                        $output .= ob_get_contents();  
                        ob_end_clean();  
                    $output .='</div>';

                } elseif( $hongo_blog_pagination_style == 'load-more-pagination' ) {
                    $output .='<div class="aligncenter"><a href="javascript:void(0);" class="btn view-more-button">'. esc_html__( 'View More', 'hongo-addons' )  .'</a></div>';
                    $output .='<div class="pagination hongo-loadmore-scroll hongo-common-blog-scroll display-none" data-pagination="'.$blog_query->max_num_pages.'">';
                        ob_start();
                            if ( get_next_posts_link( '', $blog_query->max_num_pages ) ) :
                                next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hongo-addons' ).'</span><i class="fa-solid fa-angle-right"></i>', $blog_query->max_num_pages );
                            endif;
                        $output .= ob_get_contents();  
                        ob_end_clean();  
                    $output .='</div>';
                } else {
                    $blog_query->query_vars['paged'] > 1 ? $current = $blog_query->query_vars['paged'] : $current = 1;
                    $output .= '<div class="hongo-blog-pagination">';
                        $output .= '<div class="text-small text-extra-dark-gray pagination">';
                            $output .= paginate_links( array(
                                'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                'format'       => '',
                                'add_args'     => '',
                                'current'      => $current,
                                'total'        => $blog_query->max_num_pages,
                                'prev_text'    => '<i class="fa-solid fa-angle-left"></i> <span class="xs-display-none border-none">'.esc_html__( 'Prev','hongo-addons').'</span>',
                                'next_text'    => '<span class="xs-display-none border-none">'.esc_html__( 'Next', 'hongo-addons').'</span> <i class="fa-solid fa-angle-right"></i>',
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 2
                            ) );
                        $output .= '</div>';
                    $output .= '</div>';
                }
            }
            
            if ( ( $id || $class ) && ! empty( $hongo_blog_premade_style ) ) {
                $output .= '</div>';
            }

        }
        return $output;
    }
}
add_shortcode("hongo_blog","hongo_blog_shortcode");
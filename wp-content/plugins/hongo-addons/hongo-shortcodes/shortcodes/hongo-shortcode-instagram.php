<?php
/**
 * Shortcode For Instagram feed
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Instagram feed */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_instagram' ) ) {
    function hongo_instagram( $atts, $content = null ) {

        global $hongo_slider_unique_id, $hongo_featured_array, $hongo_slider_script;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_instagram_style' => '',
            'hongo_new_instagram_access_token' => '',
            'hongo_instagram_slider_gutter' => '7px',
            'hongo_gutter_type' => 'gutter-medium',
            'hongo_instagram_feed' => '10',
            'hongo_enable_video' => '',
            'hongo_instagram_title' => '',
            'hongo_instagram_column' => '',
            'hongo_animation_style' => 'fadeInUp',
            'hongo_animation_delay' => '200',
            'hongo_animation_duration' => '',

            'hongo_enable_pagination'=>'',

            'show_pagination_style' => '',
            'pagination_color' => '',
            'active_pagination_color' => '',
            'show_cursor_color_style' => '',
            'hongo_enable_loop'=>'',
            'hongo_enable_autoplay'=>'',
            'hongo_dtime'=>'2000',

            'slides_per_view_desktop' => '4',
            'slides_per_view_mini_desktop' => '3',
            'slides_per_view_tablet' => '2',
            'slides_per_view_mobile' => '1',

            'hongo_title_color' => '',
            'hongo_title_bg_color' => '',
            'hongo_icon_color'=>'',
            'hongo_counter_color'=>'',
            'hongo_counter_background_color'=>'',
        ), $atts ) );

        $hongo_slider_id = $output = $column_classes = '';

        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? ' ' . $class : '';

        // Animation        
        $hongo_animation_style = ( $hongo_animation_style ) && $hongo_animation_style != 'none' && $hongo_instagram_style != 'instagram-slider' ? $hongo_animation_style = ' wow '.$hongo_animation_style : '';        
        $hongo_animation_delay = ( $hongo_animation_delay && $hongo_instagram_style != 'instagram-slider' ) ? $hongo_animation_delay : '';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? $hongo_animation_duration : '';

        $hongo_instagram_slider_gutter = ! empty( $hongo_instagram_slider_gutter ) ? $hongo_instagram_slider_gutter : '7px';

        $slides_per_view_desktop      = ! empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '4';
        $slides_per_view_mini_desktop = ! empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
        $slides_per_view_tablet       = ! empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
        $slides_per_view_mobile       = ! empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

        $hongo_instagram_style = ( $hongo_instagram_style ) ? $hongo_instagram_style : '';
        $hongo_instagram_feed = ( $hongo_instagram_feed ) ? $hongo_instagram_feed : '';
        $hongo_instagram_column = ( $hongo_instagram_column ) ? $hongo_instagram_column : '';

        // Instagram token
        $hongo_slider_unique_id = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
        $navigation_unique_id = $hongo_slider_unique_id;
        $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'hongo-instagram-feed';
        $hongo_slider_id.= '-' . $hongo_slider_unique_id;
        $hongo_slider_unique_id++;

        // Pagination & Cursor Style
        $pagination_color = ! empty( $pagination_color ) ? $pagination_color : '';
        $active_pagination_color = ! empty( $active_pagination_color ) ? $active_pagination_color : '';
        $pagination_space = $hongo_enable_pagination == 1 ? ' pagination-bottom-space' : '';
        $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style.' ' : ' white-move ';

        // Define empty array 
        $instagram_feed_nav_page_cursor = array();
        // Title Color
        if( ! empty( $hongo_title_color ) ) {
            $hongo_featured_array[] = '.title-'.$hongo_slider_id.'.instagram-title { color : '.$hongo_title_color.' }';
        }

        // Title Bg Color
        if( ! empty( $hongo_title_bg_color ) ) {
            $hongo_featured_array[] = '.title-'.$hongo_slider_id.'.instagram-title { background-color : '.$hongo_title_bg_color.' }';
        }

        // Icon Color
        if( ! empty( $hongo_icon_color ) ) {
            $hongo_featured_array[] = '#'.$hongo_slider_id.' .insta-counts i{ color : '.$hongo_icon_color.' }';
        }

        // Text Color
        if( ! empty( $hongo_counter_color ) ){
            $hongo_featured_array[] = '#'.$hongo_slider_id.' .insta-counts{ color : '.$hongo_counter_color.'; }';
        }

        // Counter background color
        if( ! empty( $hongo_counter_background_color )){
            $hongo_featured_array[] = '#'.$hongo_slider_id.' .insta-counts { background : '.$hongo_counter_background_color.'; }';
        }

        // Pagination color
        if( ! empty( $hongo_enable_pagination  == 1 ) ) {
            if ( $show_pagination_style == 'swiper-pagination-border' ) {
                if ( ! empty( $pagination_color ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-pagination-border .swiper-pagination-bullet{ border-color:'.$pagination_color.'; }';
                    if ( empty( $active_pagination_color ) ) {
                        $hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-pagination-border .swiper-pagination-bullet-active{ background-color:'.$pagination_color.'!important; }';
                    }
                }

                if ( ! empty( $active_pagination_color ) ) {
                    $hongo_featured_array[] =  '.'.$hongo_slider_id. '.swiper-pagination-border .swiper-pagination-bullet-active { border-color:'.$active_pagination_color.' }';
                    $hongo_featured_array[] =  '.'.$hongo_slider_id.'.swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'!important; }';
                }
            } else {

                if( ! empty( $pagination_color ) ){
                    $hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-pagination-' . $navigation_unique_id .' .swiper-pagination-bullet { background-color:'.$pagination_color.'; }';
                }
                if( ! empty( $active_pagination_color ) ){
                    $hongo_featured_array[] = '.'.$hongo_slider_id. ' .swiper-pagination-' . $navigation_unique_id .' .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'; }';
                }
            }
        }

        if( ! empty( $hongo_instagram_style ) ) {
            if( $hongo_instagram_column != 'instagram-slider' ) {
                $column_classes = '';
                switch ( $hongo_instagram_column ) 
                {
                    case 'column-1':
                        $column_classes .= ' hongo-1col';
                        break;
                    case 'column-2':
                        $column_classes .= ' hongo-2col';
                        break;
                    case 'column-3':
                        $column_classes .= ' hongo-3col';
                        break;
                    case 'column-5':
                        $column_classes .= ' hongo-5col';
                        break;
                    case 'column-6':
                        $column_classes .= ' hongo-6col';
                        break;
                    case 'column-4':
                    default:
                        $column_classes .= ' hongo-4col';
                        break;
                }
            }

            $i= 0;
            $instagram_api_data = ! empty( $hongo_new_instagram_access_token ) ? wp_remote_get( 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,username,timestamp,permalink&access_token='.$hongo_new_instagram_access_token, array( 'timeout' => 200, ) ) : '';

            // Start Swiper custom script
            $swiper_config = array();
            if( $hongo_instagram_style ==  'instagram-slider' ) {
                
                if( $hongo_enable_loop == 1 ) {
                    $swiper_config['loop'] = true;
                }
                if( $hongo_enable_autoplay == 1 ) {

                    $delay = ! empty( $hongo_dtime ) ? $hongo_dtime : '2000';
                    $swiper_config['autoplay'] = array( 'delay' => intval( $delay ), 'disableOnInteraction' => false );
                }

                $class_name = 'swiper-pagination-' . $navigation_unique_id;
                $swiper_config['pagination'] = array( 'el' => '.' . $class_name, 'type' => 'bullets', 'clickable' => true );
                
                $swiper_config['slidesPerView'] = intval( $slides_per_view_mobile );
                $swiper_config['breakpoints'] = array( '768' => array( 'slidesPerView' => intval( $slides_per_view_tablet ) ), '992' => array( 'slidesPerView' => intval( $slides_per_view_mini_desktop ) ), '1200' => array( 'slidesPerView' => intval( $slides_per_view_desktop ) ) );
                
                $swiper_config['watchOverflow'] = true;
            }

            $slider_options = ! empty( $swiper_config ) ? json_encode( $swiper_config ) : '';

            // End Swiper custom script

            if ( ! empty( $instagram_api_data ) && ! is_wp_error( $instagram_api_data ) || wp_remote_retrieve_response_code( $instagram_api_data ) === 200 ) {
                $instagram_api_data = json_decode( $instagram_api_data['body'] );

                if( empty( $instagram_api_data->data ) ) {
                    return false;
                }

                switch ( $hongo_instagram_style ) {

                    case 'instagram-grid':

                        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

                        $hongo_gutter_type = ! empty( $hongo_gutter_type ) ? ' ' . $hongo_gutter_type : '';

                        $output .= '<div '.$id.' class="hongo-instagram-feed-wrap'.esc_attr( $class ).'">';
                            $output .= '<ul id="'.esc_attr( $hongo_slider_id ).'" class="'.esc_attr( $hongo_instagram_style ).esc_attr( $column_classes ).esc_attr( $hongo_animation_style ).esc_attr( $hongo_gutter_type ).'">';

                                $i = 0;
                                foreach( $instagram_api_data->data as $key => $instagram_data ) {
                                    if( $i < $hongo_instagram_feed ) {
                                        if( $instagram_data->media_type == 'IMAGE' || $instagram_data->media_type == 'CAROUSEL_ALBUM' ) {
                                            $i++;
                                            $output .= '<li'.$hongo_animation_duration_attr.'>';
                                                $output .= '<figure>';
                                                    $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank">';
                                                        $output .= '<div class="hongo-overlay"></div>';
                                                        $output .= '<img src="'.$instagram_data->media_url.'" />';
                                                    $output .= '</a>';
                                                $output .= '</figure>';
                                            $output .= '</li>';
                                        } else if ( $instagram_data->media_type == 'VIDEO' && $hongo_enable_video == '1' ) {
                                            $i++;
                                            $output .= '<li'.$hongo_animation_duration_attr.'>';
                                                $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank">';
                                                    $output .= '<div class="hongo-overlay"></div>';
                                                    $output .= '<video playsinline autoplay muted loop controls>';
                                                        $output .= '<source src="'.$instagram_data->media_url.'">';
                                                    $output .= '</video>';
                                                $output .= '</a>';
                                            $output .= '</li>';
                                        }
                                    }
                                }
                            $output .= '</ul>';
                            if( ! empty( $hongo_instagram_title ) ) {
                                $output .= '<div class="instagram-title alt-font title-'.$hongo_slider_id.'">'. $hongo_instagram_title .'</div>';
                            }

                        $output .= '</div>';

                    break;

                    case 'instagram-slider':
                        
                        $pagination_style_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';

                        if( ! empty( $hongo_instagram_slider_gutter ) ){
                            $hongo_featured_array[] = '.'.$hongo_slider_id .' .instagram-wrap { margin:'.$hongo_instagram_slider_gutter.'; }';
                        }                            

                        $output .= '<div '.$id.' class="hongo-instagram-feed-wrap'.esc_attr( $class ).'">';

                            $output .= '<div class="swiper-container '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_style_class ).esc_attr( $pagination_space ).esc_attr( $show_cursor_color_style ).'" data-slider-options="' . esc_attr( $slider_options ) . '">';

                                $output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="swiper-wrapper">';

                                    $i = 0;
                                    foreach( $instagram_api_data->data as $key => $instagram_data ) {

                                        if( $i < $hongo_instagram_feed ) {
                                            if( $instagram_data->media_type == 'IMAGE' || $instagram_data->media_type == 'CAROUSEL_ALBUM' ) {
                                                $i++;

                                                $output .= '<div class="swiper-slide">';
                                                    $output .= '<div class="instagram-wrap">';
                                                        $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank"><img src="'.$instagram_data->media_url.'" />';
                                                            $output .= '<div class="hongo-overlay"></div>';
                                                        $output .='</a>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            } else if ( $instagram_data->media_type == 'VIDEO' && $hongo_enable_video == '1' ) {
                                                $i++;

                                                $output .= '<div class="swiper-slide">';
                                                    $output .= '<div class="instagram-wrap">';
                                                        $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank">';
                                                            $output .= '<video playsinline autoplay muted loop controls>';
                                                                $output .= '<source src="'.$instagram_data->media_url.'">';
                                                                $output .= '<div class="hongo-overlay"></div>';
                                                            $output .= '</video>';
                                                        $output .='</a>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            }
                                        }
                                    }
                                $output .= '</div>';
                                // Pagination
                                if($hongo_enable_pagination==1){
                                    $output .= '<div class="swiper-pagination ' . esc_attr( $class_name ) . '"></div>';
                                }

                            $output .= '</div>';

                            if( ! empty( $hongo_instagram_title ) ) {
                                $output .= '<div class="instagram-title alt-font title-'.$hongo_slider_id.'">'. $hongo_instagram_title .'</div>';
                            }
                        $output .= '</div>';
                        
                    break;

                    case 'instagram-masonry':

                        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

                        $hongo_gutter_type = ! empty( $hongo_gutter_type ) ? ' ' . $hongo_gutter_type : '';

                        $output .= '<div '.$id.' class="hongo-instagram-feed-wrap'.esc_attr( $class ).'">';
                            $output .= '<ul id="'.esc_attr( $hongo_slider_id ).'" class="hongo-instagram-masonary '.esc_attr( $hongo_instagram_style ).esc_attr( $column_classes ).esc_attr( $hongo_animation_style ).esc_attr( $hongo_gutter_type ).'">';
                                $output .= '<li class="grid-sizer"></li>';

                                $i = 0;
                                foreach( $instagram_api_data->data as $key => $instagram_data ) {

                                    if( $i < $hongo_instagram_feed ) {
                                        if( $instagram_data->media_type == 'IMAGE' || $instagram_data->media_type == 'CAROUSEL_ALBUM' ) {
                                            $i++;

                                            $output .= '<li class="grid-item"'.$hongo_animation_duration_attr.'>';
                                                $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank">';
                                                    $output .= '<div class="hongo-overlay"></div>';
                                                    $output .= '<img src="'.$instagram_data->media_url.'" />';
                                                $output .= '</a>';
                                            $output .= '</li>';
                                        } else if( $instagram_data->media_type == 'VIDEO' && $hongo_enable_video == '1' ) {
                                            $i++;

                                            $output .= '<li class="grid-item"'.$hongo_animation_duration_attr.'>';
                                                $output .= '<a class="" href="'.$instagram_data->permalink.'" target="_blank">';
                                                    $output .= '<div class="hongo-overlay"></div>';
                                                    $output .= '<video playsinline autoplay muted loop controls>';
                                                        $output .= '<source src="'.$instagram_data->media_url.'" />';
                                                    $output .= '</video>';
                                                $output .= '</a>';
                                            $output .= '</li>';
                                        }
                                    }
                                }
                            $output .= '</ul>';
                            if( ! empty( $hongo_instagram_title ) ) {
                                $output .= '<div class="instagram-title alt-font title-'.$hongo_slider_id.'">'. $hongo_instagram_title .'</div>';
                            }
                        $output .= '</div>';
                    break;
                }
            }
            return $output;
        }
    }
}
add_shortcode( 'hongo_instagram', 'hongo_instagram' );

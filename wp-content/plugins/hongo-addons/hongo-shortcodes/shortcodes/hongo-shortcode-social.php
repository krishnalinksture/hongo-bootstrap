<?php
/**
 * Shortcode For Social Icon
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Social Icon */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_social_shortcode' ) ) {
    function hongo_social_shortcode( $atts, $content = null ) {

        global $hongo_featured_array, $social_icon;

        extract( shortcode_atts( array(
            'class' => '',
            'id' => '',

            'hongo_social_style' =>'',
            'hongo_icon_type' => 'small-icon',
            'hongo_social_sorting' => '',
            'hongo_fb_url' => '',
            'hongo_tw_url' => '',
            'hongo_db_url' => '',
            'hongo_li_url' => '',
            'hongo_ig_url' => '',
            'hongo_tb_url' => '',
            'hongo_pi_url' => '',
            'hongo_yt_url' => '',
            'hongo_vm_url' => '',
            'hongo_sc_url' => '',
            'hongo_fk_url' => '',
            'hongo_rss_url' => '',
            'hongo_rd_url' => '',
            'hongo_bh_url' => '',
            'hongo_vine_url' => '',
            'hongo_gh_url' => '',
            'hongo_xing_url' => '',
            'hongo_vk_url' => '',
            'hongo_email_url' => '',
            'hongo_yelp_url' => '',
            'hongo_skype_url' => '',
            'hongo_discord_url' => '',

            'hongo_custom_link' => '',

            'hongo_text_case' => '',
            'hongo_link_target' => '_blank',

            'space_between_gap' => '',
            'hongo_icon_size' => '',
            'hongo_icon_bg_color' => '',
            'hongo_icon_bg_hover_color' => '',
            'hongo_text_color' => '',
            'hongo_icon_color' => '',
            'hongo_icon_hover_color' => '',
            'hongo_separator_color' => '',
            'hongo_icon_clip_hover_color' => '',
            'hongo_border_color' => '',
            'hongo_border_hover_color' => '',
            'hongo_enable_alternate_font_label' => '1',

            'hongo_animation_style' => '',
            'hongo_animation_duration' => '',
        ), $atts ) );

        $output = $class_list = $span_tag = $font_label = '';
        $classes = $social_data = array();

        $id = ($id) ? 'id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        // Social urls
        $hongo_fb_url       = ! empty( $hongo_fb_url ) ? $social_data['facebook'] = $hongo_fb_url : '';
        $hongo_tw_url       = ! empty( $hongo_tw_url ) ? $social_data['twitter'] = $hongo_tw_url : '';
        $hongo_db_url       = ! empty( $hongo_db_url ) ? $social_data['dribbble'] = $hongo_db_url : '';
        $hongo_li_url       = ! empty( $hongo_li_url ) ? $social_data['linkedin'] = $hongo_li_url : '';
        $hongo_ig_url       = ! empty( $hongo_ig_url ) ? $social_data['instagram'] = $hongo_ig_url : '';
        $hongo_tb_url       = ! empty( $hongo_tb_url ) ? $social_data['tumblr'] = $hongo_tb_url : '';
        $hongo_pi_url       = ! empty( $hongo_pi_url ) ? $social_data['pinterest'] = $hongo_pi_url : '';
        $hongo_yt_url       = ! empty( $hongo_yt_url ) ? $social_data['youtube'] = $hongo_yt_url : '';
        $hongo_vm_url       = ! empty( $hongo_vm_url ) ? $social_data['vimeo'] = $hongo_vm_url : '';
        $hongo_sc_url       = ! empty( $hongo_sc_url ) ? $social_data['soundcloud'] = $hongo_sc_url : '';
        $hongo_fk_url       = ! empty( $hongo_fk_url ) ? $social_data['flickr'] = $hongo_fk_url : '';
        $hongo_rss_url      = ! empty( $hongo_rss_url ) ? $social_data['rss'] = $hongo_rss_url : '';
        $hongo_rd_url       = ! empty( $hongo_rd_url ) ? $social_data['reddit'] = $hongo_rd_url : '';
        $hongo_bh_url       = ! empty( $hongo_bh_url ) ? $social_data['behance'] = $hongo_bh_url : '';
        $hongo_vine_url     = ! empty( $hongo_vine_url ) ? $social_data['vine'] = $hongo_vine_url : '';
        $hongo_gh_url       = ! empty( $hongo_gh_url ) ? $social_data['github'] = $hongo_gh_url : '';
        $hongo_xing_url     = ! empty( $hongo_xing_url ) ? $social_data['xing'] = $hongo_xing_url : '';
        $hongo_vk_url       = ! empty( $hongo_vk_url ) ? $social_data['vk'] = $hongo_vk_url : '';
        $hongo_yelp_url     = ! empty( $hongo_yelp_url ) ? $social_data['yelp'] = $hongo_yelp_url : '';
        $hongo_skype_url    = ! empty( $hongo_skype_url ) ? $social_data['skype'] = $hongo_skype_url : '';
        $hongo_discord_url  = ! empty( $hongo_discord_url ) ? $social_data['discord'] = $hongo_discord_url : '';
        $hongo_email_url    = ! empty( $hongo_email_url ) ? $social_data['email'] = $hongo_email_url : '';
        $hongo_custom_link  = ! empty( $hongo_custom_link ) ? $hongo_custom_link : '';

        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
            $hongo_custom_link = '';
        }

        if( ! empty( $hongo_social_sorting ) ) {
            // Get sorted social icons
            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
        }

        // Get all social icons
        $social_icons = hongo_get_social_icons();

        $hongo_animation_style   = ( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $classes[] = ' wow '.$hongo_animation_style : '';
        $hongo_icon_type         = ! empty( $hongo_icon_type ) ? $hongo_icon_type : 'small-icon';
        $hongo_animation_duration_attr = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        // Unique Style Class
        $classes[] = $hongo_social_style;

        $social_icon = ! empty( $social_icon ) ? $social_icon : 0;
        $social_icon = $social_icon + 1;
        $classes[] = 'social-icon-'.$social_icon;

        ( $hongo_enable_alternate_font_label == 1 ) ? $font_label = ' alt-font' : '';

        // Text transform
        if( ! empty( $hongo_text_case ) ) {
            $classes[] = 'text-'.$hongo_text_case;
        }
        
        // Class List
        $class_list= ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

        // Space between gap
        if( ! empty( $space_between_gap ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li { padding: '.$space_between_gap.'!important; }';
        }
        
        // Icon bg color
        if( ! empty( $hongo_icon_bg_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a { background-color: '.$hongo_icon_bg_color.'; }';
        }
        // Icon bg hover color
        if( ! empty( $hongo_icon_bg_hover_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a:hover { background-color: '.$hongo_icon_bg_hover_color.'; }';
        }
        
        // Text / Icon color
        if( ! empty( $hongo_text_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a { color: '.$hongo_text_color.'; }';
        }
        // Icon color
        if( ! empty( $hongo_icon_color ) ) {
            if( $hongo_social_style == 'social-icon-style-8' ) {
                $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a .brand-icon:before { color: '.$hongo_icon_color.'; }';
            } else {
                $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a { color: '.$hongo_icon_color.'; }';
            }
        }
        // Icon hover color
        if( ! empty( $hongo_icon_hover_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a:hover { color: '.$hongo_icon_hover_color.'; }';
        }        
        // Separator color
        if( ! empty( $hongo_separator_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li:before { background-color: '.$hongo_separator_color.'; }';
        }
        // Icon Clip color
        if( ! empty( $hongo_icon_clip_hover_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a:hover i { -webkit-text-fill-color: '.$hongo_icon_clip_hover_color.'; }';
        }

        // Icon border color
        if( ! empty( $hongo_border_color ) ) {
            if( $hongo_social_style == 'social-icon-style-13' ) {
                $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a > i { border-color: '.$hongo_border_color.'; }';
            } else {
                $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a { border-color: '.$hongo_border_color.'; }';
            }
        }
        // Icon border hover color
        if( ! empty( $hongo_border_hover_color ) ) {
            $hongo_featured_array[] = '.social-icon-'.$social_icon.' ul li a:hover { border-color: '.$hongo_border_hover_color.'; }';
        }

        if( ! empty( $social_data ) || ! empty( $hongo_custom_link ) ) {
            if( $hongo_social_style ){

                if( $hongo_social_style == 'social-icon-style-10' ) {
                    $span_tag = '<span></span>';
                }

                $output .= '<div '.$id.' class="hongo-social-links'.esc_attr( $class_list ).'"'.$hongo_animation_duration_attr.'>';
                    $output .= '<ul class="'.esc_attr( $hongo_icon_type ).'">';
                        if( ! empty( $social_data ) ) {
                            foreach( $social_data as $key => $social_url ) {

                                $key = ! empty( $social_icons[$key] ) ? $social_icons[$key] : '';
                                $target_attr = ( ! ( $key == 'skype' || $key == 'email' ) && ! empty( $hongo_link_target ) ) ? ' target="'.$hongo_link_target.'"' : '';

                                if( $key == 'rss' || $key == 'envelope' ){
                                    $icon_class = 'fa-solid fa-'.$key;
                                } else{
                                    $icon_class = 'fa-brands fa-'.$key;
                                }

                                if( $hongo_social_style == 'social-icon-style-8' || $hongo_social_style == 'social-icon-style-14' || $hongo_social_style == 'social-icon-style-15' ){
                                    if ( $key ) {
                                        $social_label = hongo_get_social_label( $key );
                                    }
                                    $output .= '<li><a class="'.esc_attr( $key ).'"'.$target_attr.' href="'.esc_url( $social_url ).'"><span class="brand-icon '.esc_attr( $icon_class ).'"></span><span class="brand-label'.esc_attr( $font_label ).'">'.esc_attr( $social_label ).'</span></a></li>';

                                } elseif( $hongo_social_style == 'social-icon-style-13' ) {

                                    $output .= '<li><a class="'.esc_attr( $key ).'"'.$target_attr.' href="'.esc_url( $social_url ).'"><svg version="1.1" viewBox="0 0 500 500" preserveAspectRatio="xMinYMin meet"><circle cx="250" cy="250" r="242" /></svg><i class="'.esc_attr( $icon_class ).'"></i>'.$span_tag.'</a></li>';   

                                } else {
                                    $output .= '<li><a class="'.esc_attr( $key ).'"'.$target_attr.' href="'.esc_url( $social_url ).'"><i class="'.esc_attr( $icon_class ).'"></i>'.$span_tag.'</a></li>';
                                }
                            }
                        }

                        if( ! empty( $hongo_custom_link ) ) :
                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
                        endif;

                    $output .= '</ul>';
                $output .= '</div>';
            }
        }

        return $output;
    }
}
add_shortcode( 'hongo_social', 'hongo_social_shortcode' );
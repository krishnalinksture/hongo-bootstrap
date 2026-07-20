<?php
/**
 * Shortcode For Team Member
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Team Member */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_team_member_shortcode' ) ) {
    function hongo_team_member_shortcode( $atts, $content = null ) {
        
        global $hongo_featured_array, $hongo_team1, $hongo_team2, $hongo_team3;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_team_member_style' => '',
            'hongo_team_member_image' => '',
            'hongo_image_srcset' => 'full',
            'hongo_member_name' => '',
            'hongo_member_des' => '',

            'hongo_enable_link' => '0',
            'hongo_link_url' => '',
            'hongo_link_target' => '',
            'hongo_link_hover_color' => '',

            'hongo_enable_name_alt_font' => '1',
            'hongo_enable_designation_alt_font' =>'1',

            'hongo_social_sorting' => '',
            'hongo_facebook_url' => '',
            'hongo_twitter_url' => '',
            'hongo_db_url' => '',
            'hongo_linkedin_url' => '',
            'hongo_instagram_url' => '',
            'hongo_tb_url' => '',
            'hongo_pinterest_url' => '',
            'hongo_yt_url' => '',
            'hongo_vm_url' => '',
            'hongo_sc_url' => '',
            'hongo_fk_url' => '',
            'hongo_rss_url' => '',
            'hongo_rd_url' => '',
            'hongo_behance_url' => '',
            'hongo_vine_url' => '',
            'hongo_gh_url' => '',
            'hongo_xing_url' => '',
            'hongo_vk_url' => '',
            'hongo_ws_url' => '',
            'hongo_yelp_url' => '',
            'hongo_discord_url' => '',
            'hongo_skype_url' => '',
            'hongo_email_url' => '',
            'hongo_custom_link' => '',
            'hongo_member_name_element_tag' => '',
            'hongo_member_des_element_tag' => '',

            'hongo_box_caption_bg_color' => '',
            'hongo_box_gradient_color' => '',
            'hongo_box_hover_bg_color' => '',
            'hongo_box_hover_gradient_color' => '',
            'hongo_enable_separator' => '1',
            'hongo_separator_color' => '',
            'hongo_separator_height' => '2px',
            'hongo_icon_size' => '',
            'hongo_icon_color' => '',
            'hongo_icon_hover_color' => '',

            'hongo_font_name_setting' => '',
            'hongo_font_designation_setting' => '',

        ), $atts ) );
       
        $output = $style = $font_des_setting = '';
        $classes =  $social_data = array();

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';    
        
        // Image size
        $hongo_image_srcset  = ! empty($hongo_image_srcset) ? $hongo_image_srcset : 'full';

        // Social urls
        $hongo_facebook_url  = ! empty( $hongo_facebook_url ) ? $social_data['facebook'] = $hongo_facebook_url : '';
        $hongo_twitter_url   = ! empty( $hongo_twitter_url ) ? $social_data['twitter'] = $hongo_twitter_url : '';
        $hongo_db_url        = ! empty( $hongo_db_url ) ? $social_data['dribbble'] = $hongo_db_url : '';
        $hongo_linkedin_url  = ! empty( $hongo_linkedin_url ) ? $social_data['linkedin'] = $hongo_linkedin_url : '';
        $hongo_instagram_url = ! empty( $hongo_instagram_url ) ? $social_data['instagram'] = $hongo_instagram_url : '';
        $hongo_tb_url        = ! empty( $hongo_tb_url ) ? $social_data['tumblr'] = $hongo_tb_url : '';
        $hongo_pinterest_url = ! empty( $hongo_pinterest_url ) ? $social_data['pinterest'] = $hongo_pinterest_url : '';
        $hongo_yt_url        = ! empty( $hongo_yt_url ) ? $social_data['youtube'] = $hongo_yt_url : '';
        $hongo_vm_url        = ! empty( $hongo_vm_url ) ? $social_data['vimeo'] = $hongo_vm_url : '';
        $hongo_sc_url        = ! empty( $hongo_sc_url ) ? $social_data['soundcloud'] = $hongo_sc_url : '';
        $hongo_fk_url        = ! empty( $hongo_fk_url ) ? $social_data['flickr'] = $hongo_fk_url : '';
        $hongo_rss_url       = ! empty( $hongo_rss_url ) ? $social_data['rss'] = $hongo_rss_url : '';
        $hongo_rd_url        = ! empty( $hongo_rd_url ) ? $social_data['reddit'] = $hongo_rd_url : '';
        $hongo_behance_url   = ! empty( $hongo_behance_url ) ? $social_data['behance'] = $hongo_behance_url : '';
        $hongo_vine_url      = ! empty( $hongo_vine_url ) ? $social_data['vine'] = $hongo_vine_url : '';
        $hongo_gh_url        = ! empty( $hongo_gh_url ) ? $social_data['github'] = $hongo_gh_url : '';
        $hongo_xing_url      = ! empty( $hongo_xing_url ) ? $social_data['xing'] = $hongo_xing_url : '';
        $hongo_vk_url        = ! empty( $hongo_vk_url ) ? $social_data['vk'] = $hongo_vk_url : '';
        $hongo_ws_url        = ! empty( $hongo_ws_url ) ? $social_data['vk'] = $hongo_ws_url : '';
        $hongo_yelp_url      = ! empty( $hongo_yelp_url ) ? $social_data['yelp'] = $hongo_yelp_url : '';
        $hongo_discord_url   = ! empty( $hongo_discord_url ) ? $social_data['discord'] = $hongo_discord_url : '';
        $hongo_skype_url     = ! empty( $hongo_skype_url ) ? $social_data['skype'] = $hongo_skype_url : '';
        $hongo_email_url     = ! empty( $hongo_email_url ) ? $social_data['email'] = $hongo_email_url : '';
        $hongo_custom_link   = ! empty( $hongo_custom_link ) ? $hongo_custom_link : '';

        if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
            $hongo_custom_link = '';
        }
        
        // Social sorting
        if( ! empty( $hongo_social_sorting ) ) {

            // Get sorted social icons        
            $social_data = hongo_get_sorted_social_data( $hongo_social_sorting, $social_data );
        }

        // Get all social icons
        $social_icons = hongo_get_social_icons();

        // Team member name & des    
        $hongo_member_name = ! empty( $hongo_member_name ) ? str_replace( '||', '<br />', $hongo_member_name ) : '';
        $hongo_member_des  = ! empty( $hongo_member_des ) ? str_replace( '||', '<br />', $hongo_member_des ) : '';

        // Box gradient color & box color
        $hongo_box_gradient_color = ! empty( $hongo_box_gradient_color ) ? 'background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 55%,'.$hongo_box_gradient_color.' 100%);' :'';

        // Box Caption Bg Color
        $hongo_box_caption_bg_color = ! empty( $hongo_box_caption_bg_color ) ? 'background-color:'.$hongo_box_caption_bg_color.'; ' : '';

        // Hover gradient color & hover bg color
        $hongo_box_hover_bg_color = ! empty( $hongo_box_hover_bg_color ) && ! empty( $hongo_box_hover_gradient_color ) ? 'background: linear-gradient( 180deg, '.$hongo_box_hover_bg_color.' 0%,'.$hongo_box_hover_bg_color.' 20%, '.$hongo_box_hover_gradient_color.' 100%);' : ( ! empty( $hongo_box_hover_bg_color ) ? 'background: '.$hongo_box_hover_bg_color.';' : '' );
        
        // Social icon color
        $hongo_icon_size = ( $hongo_icon_size ) ? $hongo_icon_size : '';

        // Resposive font settings
        $hongo_font_name_class = ! empty( $hongo_font_name_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_name_setting ) : '';
        $font_des_setting = ! empty( $hongo_font_designation_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_designation_setting ) : '';

        // For separator style
        $hongo_separator_color   = ( $hongo_separator_color ) ? 'background-color:'.$hongo_separator_color.'; ' : '';
        $hongo_separator_height  = ( $hongo_separator_height ) ? 'height:'.$hongo_separator_height.'; ' : '';

        // Title link and hover color
        $hongo_link_url      = ( $hongo_link_url ) ? $hongo_link_url : '';
        $hongo_link_hover_color = ( $hongo_link_hover_color ) ? 'color: '.$hongo_link_hover_color.'!important;' : '';

        $hongo_link_target_attr  = ( ! empty( $hongo_link_target ) && $hongo_link_target != 'one_page' ) ? ' target="'.$hongo_link_target.'"' : '';
        $section_link_class      = $hongo_link_target == ' one_page' ? ' section-link' : '';

        // Alt Font enable disable options
        $hongo_enable_name_alt_font = ( $hongo_enable_name_alt_font == '1' ) ? ' alt-font' : '';
        $hongo_enable_designation_alt_font = ( $hongo_enable_designation_alt_font == '1' ) ? ' alt-font' : '';    

        // Unique Style Class
        $classes[] = $hongo_team_member_style;

        // Element Tag
        $hongo_member_name_element_tag = ! empty( $hongo_member_name_element_tag ) ? $hongo_member_name_element_tag : 'div';
        $hongo_member_des_element_tag = ! empty( $hongo_member_des_element_tag ) ? $hongo_member_des_element_tag : 'div';

        // Class List
        $class_list = ! empty( $classes ) ? implode(" ", $classes) : '';

        switch ( $hongo_team_member_style )
        {
            case 'team-style-1':

                $hongo_team1 = ! empty( $hongo_team1 ) ? $hongo_team1 : 0;
                $hongo_team1 = $hongo_team1 + 1;

                // Box color 
                if( $hongo_box_gradient_color ) {
                    $hongo_featured_array[] = '.team-1-'.$hongo_team1.' figure .team-image:before { '.$hongo_box_gradient_color.' }';
                }
                // Box hover color 
                if( $hongo_box_hover_bg_color ) {
                    $hongo_featured_array[] = '.team-1-'.$hongo_team1.' .hongo-overlay { '.$hongo_box_hover_bg_color.' }';
                }
                // Social icon color & title link color
                if( $hongo_icon_color ) {
                    $hongo_featured_array[] = '.team-1-'.$hongo_team1.' a.team-social-icon { color:'.$hongo_icon_color.'!important; }';
                }
                if( $hongo_icon_hover_color ) {
                    $hongo_featured_array[] = '.team-1-'.$hongo_team1.' a.team-social-icon:hover { color:'.$hongo_icon_hover_color.'!important; }';
                }
                if( $hongo_link_hover_color ) {
                    $hongo_featured_array[] = '.team-1-'.$hongo_team1.' a.team-title-link:hover { '.$hongo_link_hover_color.' }';
                }

                if( $hongo_member_name || $hongo_member_des || $social_data ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' team-1-'.$hongo_team1.'">';
                        $output .= '<figure>';
                            $output .= '<div class="team-image">';
                                if( ! empty( $hongo_team_member_image ) ){
                                    $output .= hongo_get_image_html( $hongo_team_member_image, $hongo_image_srcset );
                                }
                                $output .= '<div class="hongo-overlay"></div>';
                                $output .= '<div class="overlay-content-box">';
                                    $output .= '<div class="overlay-content-wrapper">';
                                        $output .= '<div class="overlay-content icon-extra-small">';

                                            if( ! empty( $social_data ) ) {

                                                foreach( $social_data as $keys => $social_url ) {

                                                    if( $keys == 'email' ) {
                                                        $social_url = "mailto:".$social_url;
                                                    } else if( $keys == 'skype' ) {
                                                        $social_url = "skype:".$social_url;
                                                    } else {
                                                        $social_url = esc_url( $social_url );
                                                    }
                                                    
                                                    $key = ! empty( $social_icons[$keys] ) ? $social_icons[$keys] : '';

                                                    if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                                        $icon_class = 'fa-solid fa-'.esc_html( $key );
                                                    } else {
                                                        $icon_class = 'fa-brands fa-'.esc_html( $key );
                                                    }
                                                    
                                                    $target_attr = ' target="_blank"';
                                                                                                        
                                                    $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.$icon_class.' '.$hongo_icon_size.'"></i></a>';           
                                                }
                                                if( ! empty( $hongo_custom_link ) ) :
                                                    $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
                                                endif;
                                            }

                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';

                            $output .= '<figcaption>';
                                $output .= '<div class="team-member-position">';
                                    if( $hongo_member_name ){
                                        
                                        $output .= '<'.$hongo_member_name_element_tag.' class="team-name'.esc_attr( $hongo_enable_name_alt_font ).esc_attr( $hongo_font_name_class ).'">';
                                            
                                            if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) ) {

                                                $output .= '<a class="team-title-link'.esc_attr( $section_link_class ).esc_attr( $hongo_font_name_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_member_name.'</a>';
                                            } else{

                                                $output .= $hongo_member_name;
                                            }

                                        $output .= '</'.$hongo_member_name_element_tag.'>';
                                    }
                                    if( $hongo_member_des ){
                                        $output .= '<'.$hongo_member_des_element_tag.' class="team-designation'.esc_attr( $hongo_enable_designation_alt_font ).esc_attr( $font_des_setting ).'">'.$hongo_member_des.'</'.$hongo_member_des_element_tag.'>';
                                    }
                                $output .= '</div>';
                            $output .= '</figcaption>';

                        $output .= '</figure>';
                    $output .= '</div>';
                }
            break;

            case 'team-style-2':

                $hongo_team2 = ! empty( $hongo_team2 ) ? $hongo_team2 : 0;
                $hongo_team2 = $hongo_team2 + 1;

                // Box hover color
                if( $hongo_box_hover_bg_color ) {
                    $hongo_featured_array[] = '.team2-'.$hongo_team2.' .hongo-overlay { '.$hongo_box_hover_bg_color.' }';
                }
                
                //Box Caption Background Color
                if( $hongo_box_caption_bg_color ) {             
                    $hongo_featured_array[] = '.team2-'.$hongo_team2.' figure figcaption { '.$hongo_box_caption_bg_color.' }';
                }

                // Social icon color & title link color
                if( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.team2-'.$hongo_team2.' a.team-social-icon { color:'.$hongo_icon_color.'!important; }';
                }
                if( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.team2-'.$hongo_team2.' a.team-social-icon:hover { color:'.$hongo_icon_hover_color.'!important; }';
                }

                if( ! empty( $hongo_link_hover_color ) ) {
                    $hongo_featured_array[] = '.team2-'.$hongo_team2.' a.team-title-link:hover { '.$hongo_link_hover_color.'}';
                }
                if( $hongo_member_name || $hongo_member_des || $social_data ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' team2-'.$hongo_team2.'">';
                        $output .= '<figure>';
                            $output .= '<div class="team-image">';
                                if( ! empty( $hongo_team_member_image ) ) {
                                    $output .= hongo_get_image_html( $hongo_team_member_image, $hongo_image_srcset );
                                }
                                $output .= '<div class="hongo-overlay"></div>';
                                $output .= '<div class="overlay-content icon-social-small">';
                                    if( ! empty( $social_data ) ) {
                                        foreach( $social_data as $keys => $social_url ) {

                                            if( $keys == 'email' ) {
                                                $social_url = "mailto:".$social_url;
                                            } else if( $keys == 'skype' ) {
                                                $social_url = "skype:".$social_url;
                                            } else {
                                                $social_url = esc_url( $social_url );
                                            }

                                            $key = ! empty( $social_icons[ $keys ] ) ? $social_icons[ $keys ] : '';

                                            if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                                $icon_class = 'fa-solid fa-'.esc_html( $key );
                                            } else{
                                                $icon_class = 'fa-brands fa-'.esc_html( $key );
                                            }
                                            $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
                                            $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_icon_size ).'"></i></a>';
                                        }
                                        if( ! empty( $hongo_custom_link ) ) :
                                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
                                        endif;
                                    }
                                $output .= '</div>';
                            $output .= '</div>';

                            $output .= '<figcaption>';
                                $output .= '<div class="team-member-position">';
                                    if( $hongo_member_name ){

                                        $output .= '<'.$hongo_member_name_element_tag.' class="team-name'.esc_attr( $hongo_enable_name_alt_font ).esc_attr( $hongo_font_name_class ).'">';

                                            if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) ) {
                                                $output .= '<a class="team-title-link'.esc_attr( $section_link_class ).esc_attr( $hongo_font_name_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_member_name.'</a>';
                                            }else {
                                                $output .= $hongo_member_name;
                                            }

                                        $output .= '</'.$hongo_member_name_element_tag.'>';
                                    }

                                    if( $hongo_member_des ){
                                        $output .= '<'.$hongo_member_des_element_tag.' class="team-designation'.esc_attr( $hongo_enable_designation_alt_font ).esc_attr( $font_des_setting ).'">'.$hongo_member_des.'</'.$hongo_member_des_element_tag.'>';
                                    }

                                $output .= '</div>';
                            $output .= '</figcaption>';
                        $output .= '</figure>';
                    $output .= '</div>';
                }
            break;

            case 'team-style-3':

                $hongo_team3 = ! empty( $hongo_team3 ) ? $hongo_team3 : 0;
                $hongo_team3 = $hongo_team3 + 1;

                // Box hover color
                if( $hongo_box_hover_bg_color ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' .hongo-overlay { '.$hongo_box_hover_bg_color.' }';
                }
                // Social icon color & title link color
                if( ! empty( $hongo_icon_color ) ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' a.team-social-icon { color:'.$hongo_icon_color.'!important; }';
                }
                if( ! empty( $hongo_icon_hover_color ) ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' a.team-social-icon:hover { color:'.$hongo_icon_hover_color.'!important; }';
                }
                if( ! empty( $hongo_link_hover_color ) ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' a.team-title-link:hover { '.$hongo_link_hover_color.'}';
                }
                // Separator color
                if( ! empty( $hongo_separator_color ) ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' figure figcaption .separator-line-horizontal-full { '.$hongo_separator_color.' }';
                }
                // Separator height
                if( ! empty( $hongo_separator_height ) ) {
                    $hongo_featured_array[] = '.team3-'.$hongo_team3.' figure figcaption .separator-line-horizontal-full { '.$hongo_separator_height.' }';
                }

                if( $hongo_member_name || $hongo_member_des || $social_data ) {

                    $output .= '<div'.$id.' class="'.esc_attr( $class_list ).' team3-'.$hongo_team3.'">';
                        $output .= '<figure>';
                            $output .= '<div class="team-image">';
                                if( ! empty( $hongo_team_member_image ) ) {
                                    $output .= hongo_get_image_html( $hongo_team_member_image, $hongo_image_srcset );
                                }
                                $output .= '<div class="hongo-overlay"></div>';
                            $output .= '</div>';

                            $output .= '<figcaption>';

                                $output .= '<div class="team-member-position">';
                                    if( $hongo_member_name ){                                
                                        
                                        $output .= '<'.$hongo_member_name_element_tag.' class="team-name'.esc_attr( $hongo_enable_name_alt_font ).esc_attr( $hongo_font_name_class ).'">';
                                            
                                            if( $hongo_enable_link == 1 && ! empty( $hongo_link_url ) ) {
                                                $output .= '<a class="team-title-link'.esc_attr( $section_link_class ).esc_attr( $hongo_font_name_class ).'"'.$hongo_link_target_attr.' href="'.esc_url( $hongo_link_url ).'">'.$hongo_member_name.'</a>';
                                            }else{
                                                $output .= $hongo_member_name;
                                            }                                    

                                        $output .= '</'.$hongo_member_name_element_tag.'>';
                                    }

                                    if( $hongo_member_des ){
                                        $output .= '<'.$hongo_member_des_element_tag.' class="team-designation'.esc_attr( $hongo_enable_designation_alt_font ).esc_attr( $font_des_setting ).'">'.$hongo_member_des.'</'.$hongo_member_des_element_tag.'>';
                                    }

                                $output .= '</div>';

                                if( $hongo_enable_separator ) {
                                    $output .= '<div class="separator-line-horizontal-full"></div>';
                                }

                                $output .= '<div class="overlay-content icon-social-small">';

                                    if( ! empty( $social_data ) ) {
                                        foreach( $social_data as $keys => $social_url ) {

                                            if( $keys == 'email' ) {
                                                $social_url = "mailto:".$social_url;
                                            } else if( $keys == 'skype' ) {
                                                $social_url = "skype:".$social_url;
                                            } else {
                                                $social_url = esc_url( $social_url );
                                            }

                                            $key = ! empty( $social_icons[ $keys ] ) ? $social_icons[ $keys ] : '';

                                            if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                                $icon_class = 'fa-solid fa-'.esc_html( $key );
                                            } else{
                                                $icon_class = 'fa-brands fa-'.esc_html( $key );
                                            }
                                            $target_attr = ! ( $key == 'skype' || $key == 'email' ) ? ' target="_blank"' : '';
                                            $output .= '<a class="team-social-icon" href="'.$social_url.'"' . $target_attr . '><i class="'.esc_attr( $icon_class ).' '.esc_attr( $hongo_icon_size ).'"></i></a>';
                                        }
                                        if( ! empty( $hongo_custom_link ) ) :
                                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hongo_custom_link ) ) ) );
                                        endif;
                                    }

                                $output .= '</div>';
                            $output .= '</figcaption>';
                        $output .= '</figure>';
                    $output .= '</div>';
                }
            break;
        }

        return $output;
    }
}
add_shortcode( 'hongo_team_member', 'hongo_team_member_shortcode' );
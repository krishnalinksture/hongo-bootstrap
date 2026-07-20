<?php
/**
 * Shortcode Map For Row
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Row */
/*-----------------------------------------------------------------------------------*/


$hongo_header_stick_full_width = array(
    'type' => 'hongo_custom_switch_option',
    'holder' => 'div',
    'class' => '',
    'heading' => esc_html__( 'Full width header sticky?', 'hongo-addons' ),
    'param_name' => 'full_width_header_sticky',
    'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
    'std' => '',
    'description' => esc_html__( 'This settings is used for header builder.', 'hongo-addons' ),
);
$hongo_footer_style = array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Footer Style', 'hongo-addons' ),
    'param_name' => 'footer_style',
    'value' => array(
        esc_html__( 'Top', 'hongo-addons' ) => 'top',
        esc_html__( 'Middle', 'hongo-addons' ) => 'middle',
        esc_html__( 'Bottom', 'hongo-addons' ) => 'bottom',
    ),
    'std' => 'middle',
    'description' => esc_html__( 'This settings is used for footer builder.', 'hongo-addons' ),
);

vc_map( 
    array(
        'name' => esc_html__( 'Row', 'hongo-addons' ),
        'is_container' => true,
        'icon' => 'icon-wpb-row',
        'show_settings_on_create' => false,
        'class' => 'vc_main-sortable-element',
        'description' => esc_html__( 'A container to add elements inside', 'hongo-addons' ),
        'base' => 'vc_row',
        'js_view' => 'VcRowView',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Row stretch', 'hongo-addons' ),
                'param_name' => 'full_width',
                'value' => array(
                    esc_html__( 'Default', 'hongo-addons' ) => '',
                    esc_html__( 'Container ( Use only when page layout is full width )', 'hongo-addons' ) => 'container',
                    esc_html__( 'Stretch row', 'hongo-addons' ) => 'stretch_row',
                    esc_html__( 'Stretch row and content', 'hongo-addons' ) => 'stretch_row_content',
                    esc_html__( 'Stretch row and content (no paddings)', 'hongo-addons' ) => 'stretch_row_content_no_spaces',
                ),
                'description' => esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Columns gap', 'hongo-addons' ),
                'param_name' => 'gap',
                'value' => array(
                    '0px' => '0',
                    '1px' => '1',
                    '2px' => '2',
                    '3px' => '3',
                    '4px' => '4',
                    '5px' => '5',
                    '10px' => '10',
                    '15px' => '15',
                    '20px' => '20',
                    '25px' => '25',
                    '30px' => '30',
                    '35px' => '35',
                ),
                'std' => '0',
                'description' => esc_html__( 'Select gap between columns in row.', 'hongo-addons' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Full height row?', 'hongo-addons' ),
                'param_name' => 'full_height',
                'description' => esc_html__( 'If checked row will be set to full height.', 'hongo-addons' ),
                'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Columns position', 'hongo-addons' ),
                'param_name' => 'columns_placement',
                'value' => array(
                    esc_html__( 'Middle', 'hongo-addons' ) => 'middle',
                    esc_html__( 'Top', 'hongo-addons' ) => 'top',
                    esc_html__( 'Bottom', 'hongo-addons' ) => 'bottom',
                    esc_html__( 'Stretch', 'hongo-addons' ) => 'stretch',
                ),
                'std' => 'middle',
                'description' => esc_html__( 'Select columns position within row.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'full_height',
                    'not_empty' => true,
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Equal height', 'hongo-addons' ),
                'param_name' => 'equal_height',
                'description' => esc_html__( 'If checked columns will be set to equal height.', 'hongo-addons' ),
                'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content position', 'hongo-addons' ),
                'param_name' => 'content_placement',
                'value' => array(
                    esc_html__( 'Default', 'hongo-addons' ) => '',
                    esc_html__( 'Top', 'hongo-addons' ) => 'top',
                    esc_html__( 'Middle', 'hongo-addons' ) => 'middle',
                    esc_html__( 'Bottom', 'hongo-addons' ) => 'bottom',
                ),
                'description' => esc_html__( 'Select content position within columns.', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Parallax', 'hongo-addons' ),
                'param_name' => 'parallax',
                'value' => array(
                    esc_html__( 'None', 'hongo-addons' ) => '',
                    esc_html__( 'Simple', 'hongo-addons' ) => 'content-moving',
                ),
                'description' => esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'video_bg',
                    'is_empty' => true,
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Parallax background ratio', 'hongo-addons' ),
                'param_name' => 'parallax_ratio_bg',
                'value' => '0.5',
                'description' => esc_html__( 'Enter parallax background ratio', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'parallax',
                    'not_empty' => true,
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Disable row', 'hongo-addons' ),
                'param_name' => 'disable_element',
                // Inner param name.
                'description' => esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'hongo-addons' ),
                'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Position relative', 'hongo-addons'),
                'param_name' => 'position_relative',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_overflow_type', 
                'heading' => esc_html__( 'Overflow', 'hongo-addons' ),
                'value' => array(
                    esc_html__('Select overflow', 'hongo-addons') => '',
                    esc_html__('Overflow visible', 'hongo-addons') => 'overflow-visible',
                    esc_html__('Overflow hidden', 'hongo-addons') => 'overflow-hidden',
                    esc_html__('Overflow auto', 'hongo-addons') => 'overflow-auto',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Z-index', 'hongo-addons'),
                'param_name' => 'z_index',
                'value' => '',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Add margin top of header height', 'hongo-addons'),
                'param_name' => 'hongo_enable_menu_top_space',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'description' => esc_html__( 'This can be switched on mainly for top row if page title is switched off and you want to move the row content down.', 'hongo-addons' ),
            ),
            $hongo_header_stick_full_width,
            $hongo_footer_style,
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                'param_name' => 'initial_loading_animation',
                'admin_label' => true,
                'value' => '',
                'settings' => array(
                    'type' => array(
                        'in',
                        'other',
                    ),
                ),
                'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'hongo-addons' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use video background?', 'hongo-addons' ),
                'param_name' => 'video_bg',
                'description' => esc_html__( 'If checked, video will be used as row background.', 'hongo-addons' ), 
                'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Video type', 'hongo-addons'),
                'param_name' => 'hongo_video_type',
                'value' => array(
                    esc_html__( 'Self', 'hongo-addons') => '',
                    esc_html__( 'YouTube', 'hongo-addons') => 'youtube',
                    esc_html__( 'Vimeo', 'hongo-addons') => 'vimeo'
                ),
                'dependency' => array(
                    'element' => 'video_bg',
                    'not_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'hongo-addons' ),
                'param_name' => 'parallax_image',
                'value' => '',
                'description' => esc_html__( 'This image will be visible instead of autoplay backgound video in some mobile / tablet device due to their operating system restrictions.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_video_type', 'value' => array('') ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Vimeo', 'hongo-addons' ),
                'param_name' => 'vimeo_bg_url',
                'value' => 'https://player.vimeo.com/video/75976293',
                // default video url
                'description' => esc_html__( 'Click here for more information on video ID / embed URL and setting parameters.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'hongo_video_type',
                    'value' => 'vimeo',
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'YouTube', 'hongo-addons' ),
                'param_name' => 'youtube_bg_url',
                'value' => 'https://www.youtube.com/watch?v=sU3FkzUKHXU',
                // default video url
                'description' => esc_html__( 'Click here for more information on video ID / embed URL and setting parameters.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'hongo_video_type',
                    'value' => 'youtube',
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Parallax', 'hongo-addons' ),
                'param_name' => 'video_bg_parallax',
                'value' => array(
                    esc_html__( 'None', 'hongo-addons' ) => '',
                    esc_html__( 'Simple', 'hongo-addons' ) => 'content-moving',
                    esc_html__( 'With fade', 'hongo-addons' ) => 'content-moving-fade',
                ),
                'description' => esc_html__( 'Add parallax type background for row.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'hongo_video_type',
                    'value' => 'youtube',
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Parallax video speed', 'hongo-addons' ),
                'param_name' => 'parallax_speed_video',
                'value' => '1.5',
                'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'video_bg_parallax',
                    'not_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('MP4', 'hongo-addons'),
                'param_name' => 'hongo_background_mp4_video',
                'dependency' => array(
                    'element' => 'hongo_video_type', // parallax
                    'is_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('WEBM', 'hongo-addons'),
                'param_name' => 'hongo_background_webm_video',
                'dependency' => array(
                    'element' => 'hongo_video_type', // parallax
                    'is_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ), 
            array(
                'type' => 'textfield',
                'heading' => esc_html__('OGG', 'hongo-addons'),
                'param_name' => 'hongo_background_ogg_video',
                'dependency' => array(
                    'element' => 'hongo_video_type', // parallax
                    'is_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ), 
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Loop video', 'hongo-addons'),
                'param_name' => 'hongo_enable_loop',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0', 
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency' => array(
                    'element' => 'hongo_video_type', // parallax
                    'is_empty' => true,
                ),
                'group' => esc_html__( 'Background Video', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Overlay', 'hongo-addons'),
                'param_name' => 'show_overlay',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Overlay color', 'hongo-addons' ),
                'param_name' => 'hongo_row_overlay_color',
                'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Overlay opacity', 'hongo-addons'),
                'param_name' => 'hongo_overlay_opacity',
                'admin_label' => true,
                'value' => array( 
                    esc_html__( 'No opacity','hongo-addons') => '',
                    '0.1'  => '0.1',
                    '0.2'  => '0.2',
                    '0.3'  => '0.3',
                    '0.4'  => '0.4',
                    '0.5'  => '0.5',
                    '0.6'  => '0.6',
                    '0.7'  => '0.7',
                    '0.8'  => '0.8',
                    '0.9'  => '0.9',
                    '1.0'  => '1.0',
                ),
                'std' => '0.7',
                'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Z-index', 'hongo-addons'),
                'param_name' => 'hongo_z_index',
                'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Scroll to down icon', 'hongo-addons'),
                'param_name' => 'show_down_section',
                'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                               esc_html__( 'On', 'hongo-addons') => '1'
                              ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Target section id', 'hongo-addons'),
                'param_name' => 'hongo_down_section_target_id',
                'admin_label' => true,
                'dependency' => array( 'element' => 'show_down_section', 'value' => array('1') ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Animation', 'hongo-addons'),
                'param_name' => 'hongo_down_section_animation',
                'value' => array(esc_html__( 'Off', 'hongo-addons') => '0',
                               esc_html__( 'On', 'hongo-addons') => '1'
                            ),
                'dependency' => array( 'element' => 'show_down_section', 'value' => array('1') ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Custom icon image', 'hongo-addons'),
                'param_name' => 'hongo_down_section_custom_icon',
                'value' => array(esc_html__( 'Off', 'hongo-addons') => '0',
                               esc_html__( 'On', 'hongo-addons') => '1'
                            ),
                'dependency' => array( 'element' => 'show_down_section', 'value' => array('1') ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Custom image', 'hongo-addons'),
                'param_name' => 'hongo_down_section_custom_icon_image',
                'dependency' => array( 'element' => 'hongo_down_section_custom_icon', 'value' => '1' ),
                'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Extra Medium - 40px X 40px, Medium - 35px X 35px, Small - 24px X 24px, Extra Small - 16px X 16px', 'hongo-addons' ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Maximum height', 'hongo-addons' ),
                'param_name' => 'custom_icon_max_height',
                'dependency' => array( 'element' => 'hongo_down_section_custom_icon', 'value' => '1' ),
                'description' => esc_html__( 'In pixel like 40px', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_icon',
                'heading' => esc_html__( 'Font icon', 'hongo-addons'),
                'param_name' => 'hongo_down_section_icon_list',
                'admin_label' => true,
                'dependency' => array( 'element' => 'hongo_down_section_custom_icon', 'value' => '0' ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon color', 'hongo-addons' ),
                'param_name' => 'hongo_down_section_icon_color',
                'dependency' => array( 'element' => 'hongo_down_section_custom_icon', 'value' => '0' ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon hover color', 'hongo-addons' ),
                'param_name' => 'hongo_down_section_hover_icon_color',
                'dependency' => array( 'element' => 'hongo_down_section_custom_icon', 'value' => '0' ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon background color', 'hongo-addons' ),
                'param_name' => 'hongo_down_section_icon_bg_color',
                'dependency' => array( 'element' => 'show_down_section', 'value' => array('1') ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon hover background color', 'hongo-addons' ),
                'param_name' => 'hongo_down_section_icon_hover_bg_color',
                'dependency' => array( 'element' => 'show_down_section', 'value' => array('1') ),
                'group' => esc_html__( 'Scroll Down', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),         
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_bg_image_type', 
                'heading' => esc_html__( 'Background type', 'hongo-addons' ),
                'value' => array(
                    esc_html__('Select background type', 'hongo-addons') => '',
                    esc_html__('Fix background', 'hongo-addons') => 'fix-background',
                    esc_html__('Cover background', 'hongo-addons') => 'cover-background',
                    esc_html__('Background no repeat', 'hongo-addons') => 'background-no-repeat',
                ),
                'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-3',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Minimum height', 'hongo-addons' ),
                'param_name' => 'desktop_height',
                'value' => '',
                'edit_field_class' => 'vc_col-sm-3',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'type' => 'hongo_custom_title', // this param type
                'value' => '', // your custom markup
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable responsive css', 'hongo-addons'),
                'param_name' => 'hongo_enable_responsive_css',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'description' => esc_html__( 'This will enable mini dekstop, tablet and mobile css options.', 'hongo-addons' ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'width' => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
<?php
/**
 * Shortcode Map For Section Heading
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Section Heading */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Section Heading', 'hongo-addons'),
        'description' => esc_html__( 'Create stylish headings', 'hongo-addons' ),  
        'icon' => 'fa-solid fa-heading hongo-shortcode-icon',
        'base' => 'hongo_section_heading',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons'),
                'param_name' => 'hongo_heading_type',
                'admin_label' => true,
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'heading-style-1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'heading-style-2',
                    esc_html__( 'Style 3', 'hongo-addons') => 'heading-style-3',
                    esc_html__( 'Style 4', 'hongo-addons') => 'heading-style-4',
                    esc_html__( 'Style 5', 'hongo-addons') => 'heading-style-5',
                    esc_html__( 'Style 6', 'hongo-addons') => 'heading-style-6',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style for heading', 'hongo-addons'),
                'param_name' => 'hongo_heading_preview_image',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Heading text', 'hongo-addons'),
                'param_name' => 'hongo_heading',
                'admin_label' => true,
                'description' => esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Separator', 'hongo-addons'),
                'param_name' => 'hongo_enable_separator_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-4','heading-style-6' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Heading link', 'hongo-addons'),
                'param_name' => 'hongo_enable_link',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Link target', 'hongo-addons'),
                'param_name' => 'hongo_link_target',
                'value' => array(
                    esc_html__('Self', 'hongo-addons') => '_self', 
                    esc_html__('New tab / window', 'hongo-addons') => '_blank'
                ),
                'dependency'  => array( 'element' => 'hongo_enable_link', 'value' => '1' ),
            ),
            array(
                'type' => 'textfield',
                'heading' =>esc_html__( 'Link / URL', 'hongo-addons'),
                'param_name' => 'hongo_link_url',
                'admin_label' => true,
                'description' => esc_html__( 'Enter full URL with http, like http://www.example.com', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_enable_link', 'value' => '1' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Link hover color', 'hongo-addons' ),
                'param_name' => 'hongo_link_color',
                'dependency'  => array( 'element' => 'hongo_enable_link', 'value' => '1' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'title_display_setting',
                'heading' => esc_html__( 'Display in desktop', 'hongo-addons' ),
                'value' => array(esc_html__( 'Select display type', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'display-inline-block',
                               esc_html__( 'None', 'hongo-addons') => 'display-none',
                              ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'desktop_mini_display',
                'heading' => esc_html__( 'Display in mini desktop', 'hongo-addons' ),
                'value' => array(esc_html__( 'Select display type', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'md-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'md-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'md-display-inline-block',
                               esc_html__( 'None', 'hongo-addons') => 'md-display-none',
                              ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'ipad_display',
                'heading' => esc_html__( 'Display in tablet', 'hongo-addons' ),
                'value' => array(esc_html__( 'Select display type', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'sm-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'sm-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'sm-display-inline-block',
                               esc_html__( 'None', 'hongo-addons') => 'sm-display-none',
                              ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'mobile_display',
                'heading' => esc_html__( 'Display in mobile', 'hongo-addons' ),
                'value' => array(esc_html__( 'Select display type', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'xs-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'xs-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'xs-display-inline-block',
                               esc_html__( 'None', 'hongo-addons') => 'xs-display-none',
                              ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                'param_name' => 'hongo_animation_style',
                'value' => '',
                'settings' => array(
                    'type' => array(
                        'in',
                        'other',
                    ),
                ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
                'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation delay', 'hongo-addons' ),
                'param_name' => 'hongo_animation_delay',
                'dependency' => array( 'element' => 'hongo_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation delay in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation duration', 'hongo-addons' ),
                'param_name' => 'hongo_animation_duration',
                'dependency' => array( 'element' => 'hongo_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation duration in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_enable_separator_title', 'value' => array('1') ),
            ),
            array(
                'type' => 'textfield',
                'heading' =>esc_html__( 'Separator thickness', 'hongo-addons'),
                'param_name' => 'hongo_separator_thickness',
                'admin_label' => true,
                'description' => esc_html__( 'In pixel like 2px', 'hongo-addons' ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_enable_separator_title', 'value' => array( '1') ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Heading typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'title_heading_tag',
                'value' => $hongo_element_tag,
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for heading', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then heading will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_bg_image_type', 
                'heading' => esc_html__( 'Background type', 'hongo-addons' ),
                'value' => array(
                    esc_html__('Select background type', 'hongo-addons') => '',
                    esc_html__('Fix background', 'hongo-addons') => 'fix-background',
                    esc_html__('Cover background', 'hongo-addons') => 'cover-background',
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Width', 'hongo-addons' ),
                'param_name' => 'desktop_width',
                'value' => '',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6','heading-style-6' ) ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading',
                'type' => 'hongo_custom_title',
                'value' => '',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable responsive css box', 'hongo-addons'),
                'param_name' => 'hongo_enable_responsive_css',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_heading_type', 'value' => array( 'heading-style-1','heading-style-2','heading-style-3','heading-style-4','heading-style-5','heading-style-6' ) ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height' => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    ) 
);
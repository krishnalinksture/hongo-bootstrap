<?php
/**
 * Map For Call To Action
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Call To Action */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'icon' => 'hongo-shortcode-icon fa-solid fa-headphones-alt',
        'name' => esc_html__('Call To Action', 'hongo-addons'),
        'description' => esc_html__( 'Catch visitors attention with CTA block', 'hongo-addons' ),
        'base' => 'hongo_call_to_action',
        'category' => 'Hongo',
        'content_element' => true,
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons' ),
                'param_name' => 'hongo_call_to_action_style',
                'admin_label' => true,
                'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                        esc_html__( 'Style 1', 'hongo-addons') => 'call-to-action-style-1',
                        esc_html__( 'Style 2', 'hongo-addons') => 'call-to-action-style-2',
                        esc_html__( 'Style 3', 'hongo-addons') => 'call-to-action-style-3',
                        esc_html__( 'Style 4', 'hongo-addons') => 'call-to-action-style-4',
                        esc_html__( 'Style 5', 'hongo-addons') => 'call-to-action-style-5',
                        esc_html__( 'Style 6', 'hongo-addons') => 'call-to-action-style-6',
                        esc_html__( 'Style 7', 'hongo-addons') => 'call-to-action-style-7',
                ),
            ),
            array(
                'type'       => 'hongo_preview_image',
                'heading'    => esc_html__( 'Select pre-made style for Call to Action', 'hongo-addons'),
                'param_name' => 'hongo_call_to_action_preview_image',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'hongo-addons' ),
                'param_name' => 'hongo_title',
                'admin_label' => true,
                'description' => esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Subtitle', 'hongo-addons' ),
                'param_name' => 'hongo_subtitle',
                'admin_label' => true,
                'description' => esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2','call-to-action-style-6' ) ),
            ),
            array(
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content', 'hongo-addons'),
                'param_name' => 'content',
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-6','call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Separator', 'hongo-addons' ),
                'param_name' => 'hongo_show_separator',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-2' ) ),
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__('Button configuration', 'hongo-addons' ),
                'param_name'  => 'hongo_button_text',
                'admin_label' => true,
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'dependency'  => array( 'element' => 'hongo_show_separator', 'value' => array('1') ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Title Border color', 'hongo-addons' ),
                'param_name' => 'hongo_title_border_color',
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-5' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__('Button icon / image', 'hongo-addons'),
                'param_name' => 'hongo_button_icon_enable',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__('Custom icon image', 'hongo-addons'),
                'param_name' => 'hongo_custom_icon_image_enable',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'dependency' => array( 'element' => 'hongo_button_icon_enable', 'value' => array('1') ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Custom image', 'hongo-addons'),
                'param_name' => 'hongo_custom_icon_image',
                'dependency' => array( 'element' => 'hongo_custom_icon_image_enable', 'value' => '1' ),
                'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Icon image maximum width', 'hongo-addons' ),
                'param_name' => 'custom_icon_max_width',
                'value' => '',
                'dependency'  => array( 'element' => 'hongo_custom_icon_image_enable', 'value' => array( '1' ) ),
                'description' => esc_html__( 'In pixel like 40px.', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon position', 'hongo-addons'),
                'param_name' => 'hongo_icon_position',
                'value' => array(
                    esc_html__('Left', 'hongo-addons') => 'left',
                    esc_html__('Right', 'hongo-addons') => 'right',
                ),
                'std' => 'left',
                'dependency' => array( 'element' => 'hongo_custom_icon_image_enable', 'value' => array( '0', '1' ) ),
            ),
            array(
                'type' => 'hongo_icon',
                'heading' => esc_html__('Font icon', 'hongo-addons'),
                'param_name' => 'hongo_button_icon',
                'admin_label' => true,
                'dependency' => array( 'element' => 'hongo_custom_icon_image_enable', 'value' => '0' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Button style', 'hongo-addons'),
                'param_name' => 'hongo_button_style',
                'value' => array(
                    esc_html__('Default', 'hongo-addons') => '',
                    esc_html__('Black', 'hongo-addons') => 'style1',
                    esc_html__('White', 'hongo-addons') => 'style2',
                    esc_html__('Base color', 'hongo-addons') => 'style10',
                    esc_html__('Black border', 'hongo-addons') => 'style3',
                    esc_html__('White border', 'hongo-addons') => 'style4',
                    esc_html__('Base color border', 'hongo-addons') => 'style11',
                    esc_html__('Black round corner', 'hongo-addons') => 'style5',
                    esc_html__('White round corner', 'hongo-addons') => 'style6',
                    esc_html__('Base color round corner', 'hongo-addons') => 'style12',
                    esc_html__('Black border with rounded', 'hongo-addons') => 'style7',
                    esc_html__('White border with rounded', 'hongo-addons') => 'style8',
                    esc_html__('Base color border with rounded', 'hongo-addons') => 'style13',
                    esc_html__('Text with underline', 'hongo-addons') => 'style9',
                    esc_html__('Base color text with underline', 'hongo-addons') => 'style14',
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding button-style-setting',
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Button size', 'hongo-addons'),
                'param_name' => 'hongo_button_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra large', 'hongo-addons') => 'extra-large',
                    esc_html__('Large', 'hongo-addons') => 'large',
                    esc_html__('Medium', 'hongo-addons') => 'medium',
                    esc_html__('Small', 'hongo-addons') => 'small',
                    esc_html__('Very small', 'hongo-addons') => 'vsmall',
                ),
                'edit_field_class' => 'vc_col-sm-6 button-style-setting',
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type'       => 'hongo_button_settings',
                'param_name' => 'hongo_button_setting',
                'heading'    => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),                
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'hongo_title_heading_tag',
                'value' => $hongo_element_tag,
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2', 'call-to-action-style-3', 'call-to-action-style-4', 'call-to-action-style-5', 'call-to-action-style-6', 'call-to-action-style-7' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_subtitle_setting',
                'heading'     => esc_html__( 'Subtitle typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2','call-to-action-style-6' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Subtitle element tag', 'hongo-addons'),
                'param_name' => 'hongo_subtitle_heading_tag',
                'value' => $hongo_element_tag,
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2','call-to-action-style-6' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for subtitle', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_subtitle',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'description' => esc_html__( 'If On is selected then subtitle will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-1', 'call-to-action-style-2','call-to-action-style-6' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_content_setting',
                'heading'     => esc_html__( 'Content typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-6','call-to-action-style-7' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for content', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_content',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                'description' => esc_html__( 'If On is selected then content will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_call_to_action_style', 'value' => array( 'call-to-action-style-6','call-to-action-style-7' ) ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    ) 
);

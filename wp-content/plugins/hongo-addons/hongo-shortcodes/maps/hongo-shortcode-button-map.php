<?php
/**
 * Map For Button
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'icon' => 'hongo-shortcode-icon fa-solid fa-hand-pointer',
        'name' => esc_html__('Button', 'hongo-addons'),
        'description' => esc_html__( 'Eye catching button', 'hongo-addons' ),
        'base' => 'hongo_button',
        'category' => 'Hongo',
        'content_element' => true,
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'hongo-addons'),
                'param_name' => 'hongo_button_style',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
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
            ),  
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__('Select pre-made style', 'hongo-addons'),
                'param_name' => 'hongo_button_preview_image',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Size', 'hongo-addons'),
                'param_name' => 'hongo_button_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra Large', 'hongo-addons') => 'extra-large',
                    esc_html__('Large', 'hongo-addons') => 'large',
                    esc_html__('Medium', 'hongo-addons') => 'medium',
                    esc_html__('Small', 'hongo-addons') => 'small',
                    esc_html__('Very Small', 'hongo-addons') => 'vsmall',
                ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable border', 'hongo-addons'),
                'param_name' => 'hongo_enable_border',
                'std' => '1',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style9', 'style14' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Icon / Image', 'hongo-addons'),
                'param_name' => 'hongo_enable_icon',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__('Custom icon image', 'hongo-addons'),
                'param_name' => 'custom_icon',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_enable_icon', 'value' => '1' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Custom image', 'hongo-addons' ),
                'param_name' => 'custom_icon_image',
                'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
                'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Icon image maximum width', 'hongo-addons' ),
                'param_name' => 'custom_icon_max_width',
                'value' => '',
                'dependency'  => array( 'element' => 'custom_icon', 'value' => array( '1' ) ),
                'description' => esc_html__( 'In pixel like 40px.', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon size', 'hongo-addons'),
                'param_name' => 'hongo_icon_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra Large', 'hongo-addons') => 'icon-extra-large',
                    esc_html__('Large', 'hongo-addons') => 'icon-large',
                    esc_html__('Extra Medium', 'hongo-addons') => 'icon-extra-medium',
                    esc_html__('Medium', 'hongo-addons') => 'icon-medium',
                    esc_html__('Extra Small', 'hongo-addons') => 'icon-extra-small',
                    esc_html__('Small', 'hongo-addons') => 'icon-small',
                    esc_html__('Very Small', 'hongo-addons') => 'icon-very-small',
                ),
                'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
            ),
            array(
                'type' => 'hongo_icon',
                'heading' => esc_html__('Font icon', 'hongo-addons'),
                'param_name' => 'hongo_button_icon',
                'admin_label' => true,
                'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
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
                'dependency' => array( 'element' => 'custom_icon', 'value' => array( '0', '1' ) ),
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__('Button configuration', 'hongo-addons' ),
                'param_name'  => 'hongo_button_text',
                'admin_label' => true,
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Button one page navigation', 'hongo-addons'),
                'param_name' => 'hongo_button_one_page',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
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
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),                
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
              'type' => 'dropdown',
              'param_name' => 'desktop_display',
              'heading' => esc_html__( 'Display in desktop', 'hongo-addons' ),
              'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'display-inline-block',
                               esc_html__( 'Table', 'hongo-addons') => 'display-table',
                               esc_html__( 'None', 'hongo-addons') => 'display-none',
                              ),
              'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
              'group' => esc_html__( 'Style', 'hongo-addons' ),
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'desktop_mini_display',
              'heading' => esc_html__( 'Display in mini desktop', 'hongo-addons' ),
              'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'md-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'md-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'md-display-inline-block',
                               esc_html__( 'Table', 'hongo-addons') => 'md-display-table',
                               esc_html__( 'None', 'hongo-addons') => 'md-display-none',
                              ),
              'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
              'group' => esc_html__( 'Style', 'hongo-addons' ),
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'ipad_display',
              'heading' => esc_html__( 'Display in tablet', 'hongo-addons' ),
              'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'sm-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'sm-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'sm-display-inline-block',
                               esc_html__( 'Table', 'hongo-addons') => 'sm-display-table',
                               esc_html__( 'None', 'hongo-addons') => 'sm-display-none',
                              ),
              'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
              'group' => esc_html__( 'Style', 'hongo-addons' ),
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'mobile_display',
              'heading' => esc_html__( 'Display in mobile', 'hongo-addons' ),
              'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'xs-display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'xs-display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'xs-display-inline-block',
                               esc_html__( 'Table', 'hongo-addons') => 'xs-display-table',
                               esc_html__( 'None', 'hongo-addons') => 'xs-display-none',
                              ),
              'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
              'group' => esc_html__( 'Style', 'hongo-addons' ),
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type'       => 'hongo_button_settings',
                'param_name' => 'hongo_button_setting',
                'heading'    => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
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
                'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'type' => 'hongo_custom_title', // this param type
                'value' => '', // your custom markup
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
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
                'dependency'  => array( 'element' => 'hongo_button_style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height' => 'no',
                'width' => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    ) 
);
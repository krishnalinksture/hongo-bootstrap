<?php
/**
 * Smart Section Map For Navigation Links
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Navigation Links */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Navigation Links', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_navigation_links', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Add link in megamenu', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-external-link-alt hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'hongo-addons' ),
                'param_name' => 'hongo_navigation_main_title',
                'admin_label' => true,
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Link Horizontal', 'hongo-addons' ),
                'param_name' => 'hongo_title_link_horizontal_enable',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '0',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Link Separator', 'hongo-addons' ),
                'param_name' => 'hongo_title_link_separator',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_title_link_horizontal_enable', 'value' => '1' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Link on title', 'hongo-addons'),
                'param_name' => 'hongo_enable_link',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '0',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title Link / URL', 'hongo-addons'),
                'param_name' => 'hongo_link_url',
                'admin_label' => true,
                'dependency'  => array( 'element' => 'hongo_enable_link', 'value' => '1' ),
                'description' => esc_html__( 'Enter full URL with http, like http://www.example.com', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__('Title icon', 'hongo-addons'),
                'param_name' => 'hongo_title_link_icon_enable',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '0',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__('Title custom icon image', 'hongo-addons'),
                'param_name' => 'hongo_title_custom_icon_image_enable',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0',
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '0',
                'dependency' => array( 'element' => 'hongo_title_link_icon_enable', 'value' => array('1') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Title icon position', 'hongo-addons'),
                'param_name' => 'hongo_title_icon_position',
                'value' => array(
                    esc_html__('Left', 'hongo-addons') => 'left',
                    esc_html__('Right', 'hongo-addons') => 'right',
                ),
                'std' => 'left',
                'dependency' => array( 'element' => 'hongo_title_custom_icon_image_enable', 'value' => array( '0', '1' ) ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Title custom image', 'hongo-addons'),
                'param_name' => 'hongo_title_custom_icon_image',
                'dependency' => array( 'element' => 'hongo_title_custom_icon_image_enable', 'value' => '1' ),
                'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title icon image maximum width', 'hongo-addons' ),
                'param_name' => 'hongo_title_custom_icon_max_width',
                'value' => '',
                'dependency'  => array( 'element' => 'hongo_title_custom_icon_image_enable', 'value' => array( '1' ) ),
                'description' => esc_html__( 'In pixel like 40px.', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_icon',
                'heading' => esc_html__('Title font icon', 'hongo-addons'),
                'param_name' => 'hongo_title_link_icon',
                'admin_label' => true,
                'dependency' => array( 'element' => 'hongo_title_custom_icon_image_enable', 'value' => '0' ),
            ),
            array(
                'param_name' => 'hongo_navigation_links_slides', // all params must have a unique name
                'type' => 'param_group', // this param type
                'heading' => esc_html__( 'Links', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                        array(
                            'type'        => 'hongo_link',
                            'heading'     => esc_html__('Link configuration', 'hongo-addons' ),
                            'param_name'  => 'hongo_navigation_links',
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Extra class name', 'hongo-addons'),
                            'param_name' => 'hongo_link_class_name',
                            'value' => '',
                            'std' => '',
                            'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'hongo-addons' ),
                        ),
                        array(
                            'type' => 'hongo_custom_switch_option',
                            'heading' => esc_html__('Link icon', 'hongo-addons'),
                            'param_name' => 'hongo_link_icon_enable',
                            'value' => array(
                                esc_html__('Off', 'hongo-addons') => '0',
                                esc_html__('On', 'hongo-addons') => '1'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                            'std' => '0',
                        ),
                        array(
                            'type' => 'hongo_custom_switch_option',
                            'heading' => esc_html__('Custom icon image', 'hongo-addons'),
                            'param_name' => 'hongo_custom_icon_image_enable',
                            'value' => array(
                                esc_html__('Off', 'hongo-addons') => '0',
                                esc_html__('On', 'hongo-addons') => '1'
                            ),
                            'std' => '0',
                            'edit_field_class' => 'vc_col-sm-6',
                            'dependency' => array( 'element' => 'hongo_link_icon_enable', 'value' => array('1') ),
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
                            'type' => 'hongo_icon',
                            'heading' => esc_html__('Font icon', 'hongo-addons'),
                            'param_name' => 'hongo_link_icon',
                            'dependency' => array( 'element' => 'hongo_custom_icon_image_enable', 'value' => '0' ),
                        ),

                ),
                'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'group' => esc_html__( 'Links', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'desktop_display',
                'heading' => esc_html__( 'Display in desktop', 'hongo-addons' ),
                'value' => array(esc_html__( 'Select display type', 'hongo-addons') => '',
                               esc_html__( 'Block', 'hongo-addons') => 'display-block',
                               esc_html__( 'Inline', 'hongo-addons') => 'display-inline',
                               esc_html__( 'Inline block', 'hongo-addons') => 'display-inline-block',
                               esc_html__( 'None', 'hongo-addons') => 'display-none',
                              ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
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
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Navigation title typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for navigation title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '0',
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-full-setting typography-left-setting',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_links_setting',
                'heading'     => esc_html__( 'Links typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
            ), 
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_links',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'std' => '0',
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-full-setting typography-left-setting',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
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
                ),
                'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_title', // this param type
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
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
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height' => 'no',
                'width' => 'no',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    )
);
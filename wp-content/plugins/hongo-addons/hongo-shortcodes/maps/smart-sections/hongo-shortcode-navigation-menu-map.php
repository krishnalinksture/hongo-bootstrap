<?php
/**
 * Smart Section Map For Category Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Category Menu */
/*-----------------------------------------------------------------------------------*/
 
$menu_list = hongo_get_menu_list_array();

vc_map( 
    array(
        'name' => esc_html__( 'Navigation Menu', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_navigation_menu', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Add menu in header', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-align-center hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Enable main menu', 'hongo-addons'),
                    'param_name' => 'hongo_enable_main_menu',
                    'std' => '1',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Menu', 'hongo-addons'),
                    'param_name' => 'hongo_menu_select',
                    'admin_label' => true,
                    'value' => $menu_list,
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Mobile menu text', 'hongo-addons' ),
                    'param_name' => 'hongo_mobile_menu_text',
                    'admin_label' => true,
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Mobile menu tab text', 'hongo-addons' ),
                    'param_name' => 'hongo_mobile_menu_tab_text',
                    'std' => __( 'Menu', 'hongo-addons' ),
                    'admin_label' => true,
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Space between menu elements', 'hongo-addons' ),
                    'param_name' => 'hongo_space_between_menu',
                    'description'=> esc_html__( 'In pixel like 20px', 'hongo-addons' ),
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Active menu border color', 'hongo-addons' ),
                    'param_name' => 'hongo_menu_border_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Sticky active menu border color', 'hongo-addons' ),
                    'param_name' => 'hongo_sticky_menu_border_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_main_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Enable menu ipad icon', 'hongo-addons'),
                    'param_name' => 'hongo_enable_menu_ipad_icon',
                    'std' => '0',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'group' => esc_html__( 'Main Menu', 'hongo-addons' ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Enable category menu', 'hongo-addons'),
                    'param_name' => 'hongo_enable_category_menu',
                    'std' => '0',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Menu', 'hongo-addons'),
                    'param_name' => 'hongo_menu_category_select',
                    'admin_label' => true,
                    'value' => $menu_list,
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'hongo-addons' ),
                    'param_name' => 'hongo_category_menu_title',
                    'admin_label' => true,
                    'std' => __( 'Browse Categories', 'hongo-addons' ),
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Mobile menu tab text', 'hongo-addons' ),
                    'param_name' => 'hongo_mobile_category_menu_tab_text',
                    'std' => __( 'Browse Categories', 'hongo-addons' ),
                    'admin_label' => true,
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Button background color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_button_background_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Sticky button background color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_sticky_button_background_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Button text color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_button_text_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Sticky button text color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_sticky_button_text_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Menu background color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_menu_background_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Sticky menu background color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_sticky_menu_background_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Menu border color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_menu_border_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Sticky menu border color', 'hongo-addons' ),
                    'param_name' => 'hongo_category_sticky_menu_border_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Category Menu', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Close icon in toggle', 'hongo-addons' ),
                    'param_name' => 'hongo_enable_close_toggle',
                    'std' => '1',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6'
                ),
                 array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Space between menu and category', 'hongo-addons' ),
                    'param_name' => 'hongo_space_between_menu_category',
                    'description'=> esc_html__( 'In pixel like 20px', 'hongo-addons' ),
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array( 'element' => 'hongo_enable_category_menu', 'value' => array('1') ),
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
                    'heading'     => esc_html__( 'Main menu typography', 'hongo-addons' ),
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'heading' => esc_html__( 'Use additional font for main menu', 'hongo-addons' ),
                    'param_name' => 'additional_font_main_menu',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons' ) => '0', 
                        esc_html__( 'On', 'hongo-addons' ) => '1'
                    ),
                    'std' => '1',
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                    'description'=> esc_html__( 'If On is selected then main menu will use additional font family setup in WordPress customize panel', 'hongo-addons' ),
                ),
                array(
                    'type'        => 'responsive_font_settings',
                    'param_name'  => 'hongo_category_font_title_setting',
                    'heading'     => esc_html__( 'Category menu typography', 'hongo-addons' ),
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'heading' => esc_html__( 'Use additional font for category menu', 'hongo-addons' ),
                    'param_name' => 'additional_font_category_menu',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons' ) => '0', 
                        esc_html__( 'On', 'hongo-addons' ) => '1'
                    ),
                    'std' => '1',
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                    'description'=> esc_html__( 'If On is selected then category menu will use additional font family setup in WordPress customize panel', 'hongo-addons' ),
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
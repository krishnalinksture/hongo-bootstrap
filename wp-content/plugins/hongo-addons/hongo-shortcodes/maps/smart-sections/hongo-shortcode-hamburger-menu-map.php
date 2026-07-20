<?php
/**
 * Smart Section Map For Hamburger Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Hamburger Menu */
/*-----------------------------------------------------------------------------------*/

$menu_list = hongo_get_menu_list_array();

$sidebar_array = hongo_addons_widgetised_sidebars();

vc_map( 
    array(
        'name' => esc_html__( 'Hamburger Menu', 'hongo-addons' ), // Name of your shortcode for human reading inside element list
        'base' => 'hongo_hamburger_navigation_menu', // Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Add hamburger menu', 'hongo-addons' ), // Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-bars hongo-shortcode-icon', // URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Menu', 'hongo-addons'),
                'param_name' => 'hongo_menu_select',
                'admin_label' => true,
                'value' => $menu_list,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Menu bottom sidebar', 'hongo-addons'),
                'param_name' => 'hongo_menu_bottom_sidebar',
                'value' => $sidebar_array,
                'admin_label' => true,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Menu position', 'hongo-addons'),
                'param_name' => 'hongo_menu_position',
                'admin_label' => true,
                'value' => array(
                            esc_html__('Select','hongo-addons') => '',
                            esc_html__('Left','hongo-addons') => 'left',
                            esc_html__('Right','hongo-addons') => 'right',
                        ),
            ),
            array(
                'type' => 'textarea_html',
                'class' => '',
                'heading' => esc_html__('Copyright text', 'hongo-addons'),
                'param_name' => 'hongo_hamburger_copyrighttext',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Mobile menu text', 'hongo-addons' ),
                'param_name' => 'hongo_mobile_menu_text',
                'admin_label' => true,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Logo', 'hongo-addons'),
                'param_name' => 'hongo_hamburger_logo_image',
                'group' => esc_html__( 'Images', 'hongo-addons' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Ratina logo', 'hongo-addons'),
                'param_name' => 'hongo_hamburger_ratina_logo_image',
                'group' => esc_html__( 'Images', 'hongo-addons' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background image', 'hongo-addons'),
                'param_name' => 'hongo_hamburger_bg_image',
                'group' => esc_html__( 'Images', 'hongo-addons' ),
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
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Toggle button color', 'hongo-addons' ),
                'param_name' => 'hongo_toggle_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Close icon color', 'hongo-addons' ),
                'param_name' => 'hongo_close_icon_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Navigation icon color', 'hongo-addons' ),
                'param_name' => 'hongo_navigation_icon_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Menu background color', 'hongo-addons' ),
              'param_name' => 'hongo_menu_bg_color',
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
              'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Image overlay color', 'hongo-addons' ),
              'param_name' => 'hongo_overlay_color',
              'edit_field_class' => 'vc_col-sm-6',
              'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Image overlay opacity', 'hongo-addons'),
              'param_name' => 'hongo_overlay_opacity',
              'value' => array( esc_html__( 'No opacity','hongo-addons') => '',
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
              'std' => '0.6',
              'edit_field_class' => 'vc_col-sm-6',
              'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Navigation icon size', 'hongo-addons' ),
                'param_name' => 'hongo_navigation_icon_size',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'description'=> esc_html__( 'In pixel like 10px', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_menu_setting',
                'heading'     => esc_html__( 'Menu typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_submenu_setting',
                'heading'     => esc_html__( 'Submenu typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_copyright_setting',
                'heading'     => esc_html__( 'Copyright text typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
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
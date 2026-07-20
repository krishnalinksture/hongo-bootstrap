<?php
/**
 * Shortcode Map For Separator
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Separator', 'hongo-addons' ),
        'base' => 'hongo_separator',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-ellipsis-h hongo-shortcode-icon',
        'description' => esc_html__( 'Horizontal separator line', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons'),
                'param_name' => 'hongo_separator_style',
                'value' =>  array(esc_html__( 'Select', 'hongo-addons') => '',
                                esc_html__( 'Style 1', 'hongo-addons') => 'separator-style-1',
                                esc_html__( 'Style 2', 'hongo-addons') => 'separator-style-2',
                            ),
            ),
            array(
                'type'       => 'hongo_preview_image',
                'heading'    => esc_html__( 'Select pre-made style for Shop Banner', 'hongo-addons'),
                'param_name' => 'hongo_separator_preview_image',
            ),
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Separator Type', 'hongo-addons'),
                'param_name' => 'hongo_separator_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Dotted', 'hongo-addons') => 'dotted',
                    esc_html__('Dashed', 'hongo-addons') => 'dashed',
                    esc_html__('Solid', 'hongo-addons') => 'solid',
                    esc_html__('Double', 'hongo-addons') => 'double',
                ),
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-2' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Separator height', 'hongo-addons'),
                'param_name' => 'hongo_separator_height',
                'admin_label' => true,
                'description' => esc_html__( 'In pixel like 1px', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Separator width', 'hongo-addons'),
                'param_name' => 'hongo_separator_width',
                'admin_label' => true,
                'description' => esc_html__( 'In percentage like 100%', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Color', 'hongo-addons' ),
                'param_name' => 'hongo_sep_bg_color',
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
                'group' => 'Style'
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
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
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
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
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
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
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
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS Box', 'hongo-addons' ),
                'param_name' => 'hongo_css',
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable Responsive CSS', 'hongo-addons'),
                'param_name' => 'hongo_enable_responsive_css',
                'value' => array(esc_html__( 'OFF', 'hongo-addons') => '0', 
                             esc_html__( 'ON', 'hongo-addons') => '1'
                            ),
                'dependency' => array( 'element' => 'hongo_separator_style', 'value' => array( 'separator-style-1','separator-style-2' ) ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive CSS Box', 'hongo-addons' ),
                'param_name' => 'hongo_responsive_css',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class, 
        )
    )
);
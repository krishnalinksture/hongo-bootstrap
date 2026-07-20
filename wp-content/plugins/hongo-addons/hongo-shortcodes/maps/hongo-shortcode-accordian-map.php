<?php
/**
 * Shortcode Map For Accordian
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'icon' => 'hongo-shortcode-icon fa-solid fa-indent',
        'name' => esc_html__( 'Accordion', 'hongo-addons' ),
        'base' => 'hongo_accordion',
        'category' => 'Hongo',
        'description' => esc_html__( 'Collapsible content panels', 'hongo-addons' ),
        'params'   => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons' ),
                'param_name' => 'hongo_accordion_style',
                'admin_label' => true,
                'value' => array(esc_html__( 'Select', 'hongo-addons') => '',
                        esc_html__( 'Accordion style 1', 'hongo-addons') => 'accordion-style-1',
                        esc_html__( 'Accordion style 2', 'hongo-addons') => 'accordion-style-2',
                        esc_html__( 'Accordion style 3', 'hongo-addons') => 'accordion-style-3',
                        esc_html__( 'Accordion style 4', 'hongo-addons') => 'accordion-style-4',
                        esc_html__( 'Toggle style 1', 'hongo-addons')   => 'toggle-style-1',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style for accordion', 'hongo-addons'),
                'param_name' => 'accordion_preview_image',
            ),
            array(
                'param_name' => 'hongo_accordion',
                'type' => 'param_group',
                'heading' => esc_html__( 'Manage accordion slides', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'hongo-addons' ),
                        'param_name' => 'hongo_accordion_title',
                        'admin_label' => true,
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Active / default open slide?', 'hongo-addons'),
                        'param_name' => 'hongo_accordion_active',
                        'edit_field_class' => 'vc_col-sm-6',
                        'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => '1' ),
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__( 'Content', 'hongo-addons'),
                        'param_name' => 'hongo_content',
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Box shadow', 'hongo-addons' ),
                'param_name' => 'hongo_panel_box_shadow',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-3') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon color', 'hongo-addons' ),
                'param_name' => 'hongo_icon_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Active icon color', 'hongo-addons' ),
                'param_name' => 'hongo_active_icon_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Title background color', 'hongo-addons' ),
                'param_name' => 'hongo_title_bg_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Content background color', 'hongo-addons' ),
                'param_name' => 'hongo_content_bg_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Border color', 'hongo-addons' ),
                'param_name' => 'hongo_border_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-4') ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Content left border color', 'hongo-addons' ),
                'param_name' => 'hongo_left_border_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1') ),
            ),           
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),

            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons' ),
                'param_name' => 'additional_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                'description'=> esc_html__( 'If On is selected then title will use additional font family setup in WordPress customize panel', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_content_setting',
                'heading'     => esc_html__( 'Content typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_accordion_style', 'value' => array('accordion-style-1', 'accordion-style-2', 'accordion-style-3', 'accordion-style-4', 'toggle-style-1') ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
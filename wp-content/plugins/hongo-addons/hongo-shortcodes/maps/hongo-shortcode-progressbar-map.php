<?php
/**
 * Shortcode Map For Progressbar
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__( 'Progress Bar', 'hongo-addons' ),
        'base' => 'hongo_progress',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-tasks hongo-shortcode-icon',
        'description' => esc_html__( 'Animated progress bar', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Progress bar style', 'hongo-addons'),
                'param_name' => 'hongo_progress_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'progess-bar-style1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'progess-bar-style2',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style', 'hongo-addons'),
                'param_name' => 'hongo_progress_preview_image',
                'admin_label' => true,                
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Thickness', 'hongo-addons'),
                'description' => esc_html__( 'In pixel like 2px', 'hongo-addons'),
                'param_name' => 'hongo_progress_height',
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1','progess-bar-style2') ),
            ),
            array(
                'param_name' => 'hongo_progress_values', // all params must have a unique name
                'type' => 'param_group', // this param type
                'heading' => esc_html__( 'Manage progress bars', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'hongo-addons'),
                        'param_name' => 'hongo_progress_title',
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Value', 'hongo-addons'),
                        'description' => esc_html__( 'Define value of progressbar in numeric value like 80', 'hongo-addons'),
                        'param_name' => 'hongo_progress_width',
                        'admin_label' => true,
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
                'group'       => esc_html__( 'Bars', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Background color', 'hongo-addons'),
                'param_name' => 'hongo_default_color',
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
                'group'       => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Progress border color', 'hongo-addons'),
                'param_name' => 'hongo_progress_border_color',
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array( 'progess-bar-style2' ) ),
                'group'       => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Progress color', 'hongo-addons'),
                'param_name' => 'hongo_progress_color',
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
                'group'       => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_custom_title',
                'heading'    => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'hongo_title_element_tag',
                'value' => $hongo_element_tag,
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_custom_value',
                'heading'    => esc_html__( 'Value typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_progress_style', 'value' => array('progess-bar-style1', 'progess-bar-style2') ),
                'hide_element_keys' => array( 'text-hover-color','text-align','font-transform' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
<?php
/**
 * Shortcode Map For Blockquote
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Blockquote', 'hongo-addons' ),
        'base' => 'hongo_blockquote',
        'class' => '', 
        'icon' => 'fa-solid fa-quote-left hongo-shortcode-icon',
        'category' => 'Hongo',
        'description' => esc_html__( 'Quoted content block', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons' ),
                'param_name' => 'hongo_blockquote_style',
                'admin_label' => true,
                'value' => array( 
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'blockquote-style-1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'blockquote-style-2',
                    esc_html__( 'Style 3', 'hongo-addons') => 'blockquote-style-3',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style for blockquote', 'hongo-addons' ),
                'param_name' => 'hongo_blockquote_preview_image',
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Author', 'hongo-addons' ),
              'param_name' => 'hongo_blockquote_author',
              'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
            ),
            array(
              'type' => 'textarea_html',
              'heading' => esc_html__( 'Content', 'hongo-addons' ),
              'param_name' => 'content',
              'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Icon / Image', 'hongo-addons' ),
                'param_name' => 'hongo_enable_icon',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std'  => '1',
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-2','blockquote-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Custom icon image', 'hongo-addons' ),
                'param_name' => 'custom_icon',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' =>'0',
                'dependency'  => array( 'element' => 'hongo_enable_icon', 'value' => array( '1' ) ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Custom image', 'hongo-addons' ),
                'param_name' => 'custom_icon_image',
                'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
                'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Extra Medium - 40px X 40px, Medium - 35px X 35px, Small - 24px X 24px, Extra Small - 16px X 16px', 'hongo-addons' ),
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
                'type' => 'hongo_icon',
                'heading' => esc_html__( 'Font icon', 'hongo-addons' ),
                'param_name' => 'hongo_icon_list',
                'std' => 'fa-solid fa-quote-left',
                'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon size', 'hongo-addons' ),
                'param_name' => 'hongo_icon_size',
                'std' => 'icon-extra-medium',
                'value' => array(
                    esc_html__( 'Default', 'hongo-addons') => '',
                    esc_html__( 'Extra large', 'hongo-addons') => 'icon-extra-large', 
                    esc_html__( 'Large', 'hongo-addons') => 'icon-large',
                    esc_html__( 'Extra medium', 'hongo-addons') => 'icon-extra-medium',
                    esc_html__( 'Medium', 'hongo-addons') => 'icon-medium',
                    esc_html__( 'Small', 'hongo-addons') => 'icon-small',
                    esc_html__( 'Extra small', 'hongo-addons') => 'icon-extra-small',
                ),
                'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon color', 'hongo-addons' ),
                'param_name' => 'hongo_icon_color',
                'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Separator thickness', 'hongo-addons' ),
                'param_name' => 'hongo_separator_width',
                'description' => esc_html__( 'In pixel like 2px', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_auther_setting',
                'heading'     => esc_html__( 'Author typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for author', 'hongo-addons' ),
                'param_name' => 'additional_font_author',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                'description' => esc_html__( 'If On is selected then author will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_content_setting',
                'heading'     => esc_html__( 'Content typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for content', 'hongo-addons' ),
                'param_name' => 'additional_font_content',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0',
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                'description' => esc_html__( 'If On is selected then content will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_blockquote_style', 'value' => array( 'blockquote-style-1','blockquote-style-2','blockquote-style-3' ) ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
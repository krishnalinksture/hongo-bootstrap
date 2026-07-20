<?php
/**
 * Shortcode Map For Testimonial
 *
 * @package hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__( 'Testimonial', 'hongo-addons' ),
        'base' => 'hongo_testimonial',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-quote-left hongo-shortcode-icon',
        'description' => esc_html__( 'Clients testimonial block', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons'),
                'param_name' => 'hongo_testimonial_style',
                'admin_label' => true,
                'value' => array( 
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons') => 'testimonial-style-1',
                    esc_html__( 'Style 2', 'hongo-addons') => 'testimonial-style-2',
                    esc_html__( 'Style 3', 'hongo-addons') => 'testimonial-style-3',
                ),
        	),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__('Select pre-made style for testimonial', 'hongo-addons'),
                'param_name' => 'hongo_testimonial_preview_image',
                'admin_label' => true,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'hongo-addons' ),
                'param_name' => 'hongo_testimonial_image',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1' ) ),
                'description' => esc_html__( 'Your image will look impressive when image is in a square shape.', 'hongo-addons' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_srcset',
                'value' => hongo_get_thumbnail_image_sizes(),
                'std' => 'full',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Round image', 'hongo-addons' ),
                'param_name' => 'hongo_round_image',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1' ) ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Name', 'hongo-addons' ),
                'param_name'  => 'hongo_name',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Designation', 'hongo-addons' ),
                'param_name'  => 'hongo_designation',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Quote icon', 'hongo-addons'),
                'param_name' => 'hongo_enable_quote',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Box background color', 'hongo-addons' ),
                'param_name' => 'hongo_box_background_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1' ) ),
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Icon color', 'hongo-addons' ),
                'param_name' => 'hongo_icon_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_enable_quote', 'value' => array('1') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon size', 'hongo-addons'),
                'param_name' => 'hongo_icon_type',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra large', 'hongo-addons') => 'icon-extra-large',
                    esc_html__('Large', 'hongo-addons') => 'icon-large',
                    esc_html__('Extra medium', 'hongo-addons') => 'icon-extra-medium',
                    esc_html__('Medium', 'hongo-addons') => 'icon-medium',
                    esc_html__('Extra small', 'hongo-addons') => 'icon-extra-small',
                    esc_html__('Small', 'hongo-addons') => 'icon-small',
                    esc_html__('Very small', 'hongo-addons') => 'icon-very-small',
                ),
                'std' => 'icon-medium',
                'dependency'  => array( 'element' => 'hongo_enable_quote', 'value' => array('1') ),
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_content_desktop_width',
                'heading' => esc_html__( 'Content width in desktop', 'hongo-addons' ),
                'value' => $hongo_desktop_width,
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_content_desktop_mini_width',
                'heading' => esc_html__( 'Content width in mini desktop', 'hongo-addons' ),
                'value' => $hongo_desktop_mini_width,
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_content_ipad_width',
                'heading' => esc_html__( 'Content width in tablet', 'hongo-addons' ),
                'value' => $hongo_ipad_width,
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_content_mobile_width',
                'heading' => esc_html__( 'Content width in mobile', 'hongo-addons' ),
                'value' => $hongo_mobile_width,
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'hongo-addons' ),
                'param_name'  => 'hongo_content_title',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-3' ) ),
            ),
            array(
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content', 'hongo-addons'),
                'param_name' => 'content',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_name_setting',
                'heading'     => esc_html__( 'Name typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Name element tag', 'hongo-addons'),
                'param_name' => 'name_heading_tag',
                'value' => $hongo_element_tag,
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for name', 'hongo-addons' ),
                'param_name' => 'additional_font_name',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then name will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_designation_setting',
                'heading'     => esc_html__( 'Designation typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Designation element tag', 'hongo-addons'),
                'param_name' => 'designation_heading_tag',
                'value' => $hongo_element_tag,
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for designation', 'hongo-addons' ),
                'param_name' => 'additional_font_designation',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then designation will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_content_title_setting',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-3' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'hongo_content_title_heading_tag',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'value' => $hongo_element_tag,
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons' ),
                'param_name' => 'additional_font_title',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_content_setting',
                'heading'     => esc_html__( 'Content typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'dependency'  => array( 'element' => 'hongo_testimonial_style', 'value' => array( 'testimonial-style-1','testimonial-style-2','testimonial-style-3' ) ),
            ),
            $hongo_vc_extra_id,
      	    $hongo_vc_extra_class,
        ),
    )
);
<?php
/**
 * Shortcode Map For Image Hotspot
 *
 * @package hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Image Hotspot */
/*-----------------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__( 'Image Hotspot', 'hongo-addons' ),
        'base' => 'hongo_hotspot',
        'category' => 'Hongo',
        'admin_enqueue_js'      => array( HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/image-hotspot/backend/hongo-admin-hotspot.js' ),
        'admin_enqueue_css'     => array( HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/css/image-hotspot/admin/hongo-admin-hotspot.css' ),
        'icon' => 'fa-solid fa-wifi hongo-shortcode-icon',
        'description' => esc_html__( 'Pin products in an image', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'hongo_preview_image',
                'param_name' => 'hongo_image_hotspot_preview_image',
                'image_src' => HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE.'/image-hotspot.jpg',
            ),
            array(
                'type'              => 'attach_image',
                'param_name'        => 'image',
                'heading'           => '<span class="hongo-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Select image from media library', 'hongo-addons').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Image', 'hongo-addons'),
                'edit_field_class'  => 'vc_column vc_col-sm-12',
            ),
            array(
                'type'              => 'hongo_image_hotspot',
                'heading'           => '',
                'param_name'        => 'hongo_hotspot_data',
                'edit_field_class'  => 'vc_column vc_col-sm-12 custom-class',
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => '<span class="hongo-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Define the action at which the hotspot tooltip will be displayed on.', 'hongo-addons').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Product box display', 'hongo-addons'),
                'param_name'        => 'hongo_hotspot_action',
                'edit_field_class'  => 'vc_column vc_col-sm-12',
                'std'               => 'hover',
                'value'             =>  array(
                                            esc_html__('On Hover','hongo-addons') => 'hover',
                                            esc_html__('Always','hongo-addons')   => 'always',
                                            esc_html__('On Click','hongo-addons') => 'click',
                                        ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Product Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_srcset',
                'value'      => hongo_get_thumbnail_image_sizes(),
                'std'        => 'full',                
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Product box background color', 'hongo-addons' ),
                'param_name' => 'hongo_box_background_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Hotspot background color', 'hongo-addons' ),
                'param_name' => 'hongo_hotspot_background_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Hotspot color', 'hongo-addons' ),
                'param_name' => 'hongo_hotspot_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'colorpicker',
                'class'      => '',
                'heading'    => esc_html__( 'Hotspot spread color', 'hongo-addons' ),
                'param_name' => 'hongo_hotspot_spread_color',
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__( 'Hotspot spread size', 'hongo-addons'),
                'param_name' => 'hongo_hotspot_spread_size',
                'value'      => '',
                'description'=> esc_html__( 'In pixel like -8px', 'hongo-addons' ),
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__( 'Hotspot size', 'hongo-addons'),
                'param_name' => 'hongo_hotspot_size',
                'value'      => '',
                'description'=> esc_html__( 'In pixel like 28px', 'hongo-addons' ),
                'group'      => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
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
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Button size', 'hongo-addons'),
                'param_name' => 'hongo_button_type',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Extra large', 'hongo-addons') => 'btn-extra-large',
                    esc_html__('Large', 'hongo-addons') => 'btn-large',
                    esc_html__('Medium', 'hongo-addons') => 'btn-medium',
                    esc_html__('Small', 'hongo-addons') => 'btn-small',
                    esc_html__('Very small', 'hongo-addons') => 'btn-very-small',
                ),
                'edit_field_class' => 'vc_col-sm-6 button-style-setting',
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),                
            ),
            array(
                'type'       => 'hongo_button_settings',
                'param_name' => 'hongo_button_setting',
                'heading'    => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_title_setting',
                'heading'    => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),                
            ),
            array(
                'type'       => 'hongo_custom_switch_option',
                'heading'    => esc_html__( 'Use additional font for title', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_title',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'value'      => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std'        => '1',
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-full-setting typography-left-setting',
                'description'=> esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_price_setting',
                'heading'    => esc_html__( 'Price typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),                
                'hide_element_keys' => array( 'text-hover-color', 'font-transform' ),
            ),
            array(
                'type'       => 'hongo_custom_switch_option',
                'heading'    => esc_html__( 'Use additional font for price', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_price',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'value'      => array(
                    esc_html__( 'Off', 'hongo-addons') => '0',
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std'        => '1',
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-full-setting typography-left-setting',
                'description'=> esc_html__( 'If On is selected then price will use additional font family setup in WordPress customizer', 'hongo-addons' ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_content_setting',
                'heading'    => esc_html__( 'Content typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),                
                'hide_element_keys' => array( 'text-hover-color' ),
            ),            
            $hongo_vc_extra_id,
      	    $hongo_vc_extra_class,
        ),
    )
);
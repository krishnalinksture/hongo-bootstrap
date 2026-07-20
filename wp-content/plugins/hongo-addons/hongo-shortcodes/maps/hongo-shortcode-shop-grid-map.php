<?php
/**
 * Map For Shop Grid
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Shop Grid */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Shop Grid', 'hongo-addons' ),
        'description' => esc_html__( 'Unique grid of shop banners', 'hongo-addons' ),
        'icon' => 'hongo-shortcode-icon fa-solid fa-th-large',
        'base' => 'hongo_shop_grid',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'hongo_preview_image',
                'param_name' => 'hongo_shop_grid_preview_image',
                'image_src' => HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE.'/shop-grid.jpg',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('No. of columns', 'hongo-addons'),
                'param_name' => 'hongo_column',
                'std' => '4',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( '1 column', 'hongo-addons') => '1',
                    esc_html__( '2 columns', 'hongo-addons') => '2',
                    esc_html__( '3 columns', 'hongo-addons') => '3',
                    esc_html__( '4 columns', 'hongo-addons') => '4',
                    esc_html__( '5 columns', 'hongo-addons') => '5',
                    esc_html__( '6 columns', 'hongo-addons') => '6',
                ),          
            ),
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Spacing between columns', 'hongo-addons'),
                'param_name' => 'hongo_gutter_type',
                'value' => array(
                    esc_html__( 'Gutter none', 'hongo-addons') => '',
                    esc_html__( 'Gutter very small', 'hongo-addons') => 'gutter-very-small',
                    esc_html__( 'Gutter small', 'hongo-addons') => 'gutter-small',
                    esc_html__( 'Gutter medium', 'hongo-addons') => 'gutter-medium',
                    esc_html__( 'Gutter large', 'hongo-addons') => 'gutter-large',
                    esc_html__( 'Gutter extra large', 'hongo-addons') => 'gutter-extra-large',
                ),
                'std' => 'gutter-medium',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Metro layout', 'hongo-addons'),
                'param_name' => 'hongo_show_metro',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),          
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'heading' => esc_html__( 'Metro grid positions', 'hongo-addons'),
                'param_name' => 'hongo_double_grid_position',
                'description' => esc_html__( 'Please add grid position number with comma(,) separator. Like *,*,2-2,2-1,2-2,1-2', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_show_metro', 'value' => array('1') ),
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                'param_name' => 'hongo_column_animation_style',
                'value' => '',
                'settings' => array(
                    'type' => array(
                        'in',
                        'other',
                    ),
                ),          
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
                'param_name' => 'hongo_shop_grid_slides', // all params must have a unique name
                'type' => 'param_group', // this param type
                'heading' => esc_html__( 'Grid', 'hongo-addons' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'hongo-addons' ),
                        'param_name' => 'hongo_image',
                        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                        'param_name' => 'hongo_image_srcset',
                        'value' => hongo_get_thumbnail_image_sizes(),
                        'std' => 'full',
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'hongo_custom_switch_option',
                        'class' => '',
                        'heading' => esc_html__( 'Image link', 'hongo-addons'),
                        'param_name' => 'hongo_show_image_link',
                        'value' => array(
                            esc_html__( 'Off', 'hongo-addons') => '0', 
                            esc_html__( 'On', 'hongo-addons') => '1'
                        ),
                        'std' => '0',
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__( 'Text horizontal alignment', 'hongo-addons'),
                        'param_name' => 'hongo_show_text_detail_horizontal',
                        'value' => array(
                            esc_html__( 'Left', 'hongo-addons') => 'left', 
                            esc_html__( 'Center', 'hongo-addons') => 'center',
                            esc_html__( 'Right', 'hongo-addons') => 'right'
                        ),
                        'std' => 'left',
                        'dependency' => array( 'element' => 'hongo_show_image_link', 'value' => array('0') ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__( 'Text vertical alignment', 'hongo-addons'),
                        'param_name' => 'hongo_show_text_detail_vertical',
                        'value' => array(
                            esc_html__( 'Top', 'hongo-addons') => 'top', 
                            esc_html__( 'Middle', 'hongo-addons') => 'middle',
                            esc_html__( 'Bottom', 'hongo-addons') => 'bottom'
                        ),
                        'std' => 'top',
                        'dependency' => array( 'element' => 'hongo_show_image_link', 'value' => array('0') ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'textfield',
                        'class' => '',
                        'heading' => esc_html__( 'Title', 'hongo-addons'),
                        'param_name' => 'hongo_image_title',
                        'dependency' => array( 'element' => 'hongo_show_image_link', 'value' => array('0') ),
                        'description' => esc_html__( 'Use || to break the word in new line.', 'hongo-addons'),
                        'admin_label' => true,
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type'        => 'vc_link',
                        'heading'     => esc_html__( 'Link', 'hongo-addons' ),
                        'param_name'  => 'hongo_image_button_link',                        
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'hongo_custom_switch_option',
                        'class' => '',
                        'heading' => esc_html__( 'Overlay', 'hongo-addons'),
                        'param_name' => 'hongo_show_overlay',
                        'value' => array(
                            esc_html__( 'Off', 'hongo-addons') => '0', 
                            esc_html__( 'On', 'hongo-addons') => '1'
                        ),
                        'std' => '0',
                        'edit_field_class' => 'vc_col-sm-6 vc_el-clearfix',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'class' => '',
                        'heading' => esc_html__( 'Overlay color', 'hongo-addons' ),
                        'param_name' => 'overlay_color',
                        'dependency' => array( 'element' => 'hongo_show_overlay', 'value' => array('1') ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Overlay opacity', 'hongo-addons' ),
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
                        'std' => '0.7',
                        'dependency' => array( 'element' => 'hongo_show_overlay', 'value' => array('1') ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Z-index', 'hongo-addons' ),
                        'param_name' => 'hongo_z_index',
                        'dependency' => array( 'element' => 'hongo_show_overlay', 'value' => array('1') ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),

                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                ),
                'group' => esc_html__( 'Grids', 'hongo-addons' ),
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
                    esc_html__('Default', 'hongo-addons') => '',
                    esc_html__('Extra Large', 'hongo-addons') => 'extra-large',
                    esc_html__('Large', 'hongo-addons') => 'large',
                    esc_html__('Medium', 'hongo-addons') => 'medium',
                    esc_html__('Small', 'hongo-addons') => 'small',
                    esc_html__('Very Small', 'hongo-addons') => 'vsmall',
                ),
                'edit_field_class' => 'vc_col-sm-6 button-style-setting',
                'group'      => esc_html__( 'Button Settings', 'hongo-addons' ),
            ),
            array(
                'type'        => 'hongo_button_settings',
                'param_name'  => 'hongo_responsive_button',
                'heading'     => esc_html__( 'Button typography', 'hongo-addons' ),
                'group'       => esc_html__( 'Button Settings', 'hongo-addons' ),
                'hide_element_keys' => array( 'icon-color', 'icon-hover-color' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'font_setting_class_title',
                'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
                'group'       => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'title_heading_tag',
                'value' => $hongo_element_tag,
                'group'       => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
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
                'group'       => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    ) 
);
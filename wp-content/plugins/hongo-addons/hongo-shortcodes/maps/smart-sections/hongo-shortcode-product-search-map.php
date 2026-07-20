<?php
/**
 * Smart Section Map For Big Search
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Big Search */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Product Search', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_product_search', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Search products with keyword and category', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-search hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Search placeholder text', 'hongo-addons' ),
                    'param_name' => 'hongo_product_search_placeholder_text',
                    'admin_label' => true,
                    'std' => __( 'SEARCH FOR PRODUCTS...', 'hongo-addons' ),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'heading' => esc_html__( 'Product category', 'hongo-addons'),
                    'param_name' => 'hongo_enable_product_category',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'std' => '1',
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
                    'heading' => esc_html__( 'Search border color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_border_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search placeholder text color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_placeholder_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search text color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_text_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'dependency' => array( 'element' => 'hongo_enable_product_category', 'value' => array('1') ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search button color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_button_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search button hover color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_button_hover_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search button background color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_button_bg_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Search button hover background color', 'hongo-addons' ),
                    'param_name' => 'hongo_search_button_hover_bg_color',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
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
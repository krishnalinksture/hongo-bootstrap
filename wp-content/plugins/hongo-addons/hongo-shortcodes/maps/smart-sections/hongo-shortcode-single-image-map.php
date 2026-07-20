<?php
/**
 * Smart Section Map For Single Image
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Single Image */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Single Image', 'hongo-addons' ),
        'base' => 'hongo_single_image',
        'description' => esc_html__( 'Place a single image', 'hongo-addons' ),
        'icon' => 'fa-regular fa-image hongo-shortcode-icon',
        'category' => 'Hongo Builder',
        'params' => array(
           array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'hongo-addons'),
                'param_name' => 'custom_image',
                'admin_label' => true,
                'description' => esc_html__( 'Upload the logo image which will be displayed in the website.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Retina image', 'hongo-addons'),
                'param_name' => 'custom_image_ratina',
                'description' => esc_html__( 'Upload the double size logo image which will be displayed in the website of retina devices.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_size',
                'std' => 'full',
                'admin_label' => true,
                'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'hongo-addons' ),

            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image alignment', 'hongo-addons' ),
                'param_name' => 'hongo_image_alignment',                
                'value' => array(
                        esc_html__( 'Left', 'hongo-addons') => 'text-left',
                        esc_html__( 'Right', 'hongo-addons') => 'text-right',
                        esc_html__( 'Center', 'hongo-addons') => 'text-center',
                ),
                'description'   => esc_html__( 'Select image alignment.', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'On click action', 'hongo-addons' ),
                'param_name' => 'hongo_image_action',
                'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0',
                        esc_html__( 'On', 'hongo-addons') => '1',
                ),
                'description'   => esc_html__( 'Select action for click action.', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image link', 'hongo-addons' ),
                'param_name' => 'hongo_image_link',
                'dependency' => array( 'element' => 'hongo_image_action', 'value' => array('1') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Link target', 'hongo-addons' ),
                'param_name' => 'hongo_image_target',                
                'value' => array(
                        esc_html__( 'Same window', 'hongo-addons') => '_self',
                        esc_html__( 'New window', 'hongo-addons') => '_blank',
                ),
                'dependency' => array( 'element' => 'hongo_image_action', 'value' => array('1') ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Image hover effect', 'hongo-addons'),
                'param_name' => 'image_hover_effect',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0', 
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency' => array( 'element' => 'hongo_image_action', 'value' => array('1') ),
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
                'heading' => esc_html__( 'Animation duration', 'hongo-addons' ),
                'param_name' => 'hongo_animation_duration',
                'dependency' => array( 'element' => 'hongo_column_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation duration in mls, like 200', 'hongo-addons' ),                 
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
        ),
    )
);
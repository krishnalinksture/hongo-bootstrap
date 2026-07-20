<?php
/**
 * Shortcode Map For Single Image
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
        'base' => 'vc_single_image',
        'icon' => 'icon-wpb-single-image',
        'category' => esc_html__( 'Content', 'hongo-addons' ),
        'description' => esc_html__( 'Simple image with CSS animation', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Widget title', 'hongo-addons' ),
                'param_name' => 'title',
                'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image source', 'hongo-addons' ),
                'param_name' => 'source',
                'value' => array(
                    esc_html__( 'Media library', 'hongo-addons' ) => 'media_library',
                    esc_html__( 'External link', 'hongo-addons' ) => 'external_link',
                    esc_html__( 'Featured Image', 'hongo-addons' ) => 'featured_image',
                    //esc_html__( 'Ratina Image', 'hongo-addons' ) => 'ratina_image',
                ),
                'std' => 'media_library',
                'description' => esc_html__( 'Select image source.', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'class' => '',
                'heading' => esc_html__( 'Full width', 'hongo-addons'),
                'param_name' => 'enable_full_width',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0', 
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency' => array( 'element' => 'source', 'value' => array( 'media_library' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'class' => '',
                'heading' => esc_html__( 'Ratina image', 'hongo-addons'),
                'param_name' => 'enable_ratina_logo',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0', 
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '0',
                'dependency' => array( 'element' => 'source', 'value' => array( 'media_library' ) ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'hongo-addons' ),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'source', 'value' => array( 'media_library' ) ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Retina Image', 'hongo-addons' ),
                'param_name' => 'ratina_image',
                'value' => '',
                'description' => esc_html__( 'Upload the double size image image which will be displayed in the website header of retina devices.', 'hongo-addons' ),
                'dependency' => array( 'element' => 'enable_ratina_logo', 'value' => array( '1' ) ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'External link', 'hongo-addons' ),
                'param_name' => 'custom_src',
                'description' => esc_html__( 'Select external link.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'hongo-addons' ),
                'param_name' => 'img_size',
                'value' => 'thumbnail',
                'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array(
                        'media_library',
                        'featured_image',
                    ),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'hongo-addons' ),
                'param_name' => 'external_img_size',
                'value' => '',
                'description' => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Caption', 'hongo-addons' ),
                'param_name' => 'caption',
                'description' => esc_html__( 'Enter text for image caption.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Add caption?', 'hongo-addons' ),
                'param_name' => 'add_caption',
                'description' => esc_html__( 'Add image caption.', 'hongo-addons' ),
                'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array(
                        'media_library',
                        'featured_image',
                    ),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image alignment', 'hongo-addons' ),
                'param_name' => 'alignment',
                'value' => array(
                	esc_html__( 'Select', 'hongo-addons' ) => '',
                    esc_html__( 'Left', 'hongo-addons' ) => 'left',
                    esc_html__( 'Right', 'hongo-addons' ) => 'right',
                    esc_html__( 'Center', 'hongo-addons' ) => 'center',
                ),
                'description' => esc_html__( 'Select image alignment.', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image style', 'hongo-addons' ),
                'param_name' => 'style',
                'value' => hongo_vc_get_shared( 'single image styles' ),
                'description' => esc_html__( 'Select image display style.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array(
                        'media_library',
                        'featured_image',
                    ),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image style', 'hongo-addons' ),
                'param_name' => 'external_style',
                'value' => hongo_vc_get_shared( 'single image external styles' ),
                'description' => esc_html__( 'Select image display style.', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border color', 'hongo-addons' ),
                'param_name' => 'border_color',
                'value' => hongo_vc_get_shared( 'colors' ),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                        'vc_box_border_circle_2',
                        'vc_box_outline_circle_2',
                    ),
                ),
                'description' => esc_html__( 'Border color.', 'hongo-addons' ),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border color', 'hongo-addons' ),
                'param_name' => 'external_border_color',
                'value' => hongo_vc_get_shared( 'colors' ),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'external_style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                    ),
                ),
                'description' => esc_html__( 'Border color.', 'hongo-addons' ),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'On click action', 'hongo-addons' ),
                'param_name' => 'onclick',
                'value' => array(
                    esc_html__( 'None', 'hongo-addons' ) => '',
                    esc_html__( 'Link to large image', 'hongo-addons' ) => 'img_link_large',
                    esc_html__( 'Open prettyPhoto', 'hongo-addons' ) => 'link_image',
                    esc_html__( 'Open custom link', 'hongo-addons' ) => 'custom_link',
                    esc_html__( 'Zoom', 'hongo-addons' ) => 'zoom',
                ),
                'description' => esc_html__( 'Select action for click action.', 'hongo-addons' ),
                'std' => '',
                'dependency' => array( 'element' => 'enable_ratina_logo', 'value' => array( '0' ) ),
            ),
            array(
                'type' => 'href',
                'heading' => esc_html__( 'Image link', 'hongo-addons' ),
                'param_name' => 'link',
                'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'hongo-addons' ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => 'custom_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Link Target', 'hongo-addons' ),
                'param_name' => 'img_link_target',
                'value' => hongo_vc_get_shared( 'target param list' ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => array(
                        'custom_link',
                        'img_link_large',
                    ),
                ),
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                'param_name' => 'initial_loading_animation',
                'admin_label' => true,
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
              'dependency' => array( 'element' => 'initial_loading_animation', 'value_not_equal_to' => array( 'none' ) ),
              'description' => esc_html__( 'Add animation delay in mls, like 200', 'hongo-addons' ),
              'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation duration', 'hongo-addons' ),
                'param_name' => 'hongo_animation_duration',
                'dependency' => array( 'element' => 'initial_loading_animation', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation duration in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_title_setting',
                'heading'     => esc_html__( 'Widget title typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',                
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons' ),
                'param_name' => 'additional_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '0',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
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
                'edit_field_class' => 'vc_col-sm-4',
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
                'description' => esc_html__( 'This will enable mini dekstop, tablet and mobile css options.', 'hongo-addons' ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'responsive_css_editor',
                'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height' => 'no',
                'width' => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            // backward compatibility. since 4.6
            array(
                'type' => 'hidden',
                'param_name' => 'img_link_large',
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
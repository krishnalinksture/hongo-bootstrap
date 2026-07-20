<?php
/**
 * Map For Image gallery
 *
 * @package Hongo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__('Image Gallery', 'hongo-addons'),
        'description' => esc_html__( 'Responsive image gallery', 'hongo-addons' ),
        'icon' => 'hongo-shortcode-icon fa-regular fa-images',
        'base' => 'hongo_image_gallery',
        'category' => 'Hongo',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'hongo-addons' ),
                'param_name' => 'image_gallery_type',
                'admin_label' => true, 
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Masonry gallery', 'hongo-addons') => 'masonry-gallery',
                    esc_html__( 'Grid gallery', 'hongo-addons') => 'grid-gallery',
                    esc_html__( 'Metro gallery', 'hongo-addons') => 'metro-gallery',
                    esc_html__( 'Justified gallery', 'hongo-addons') => 'justified-gallery',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__('Select pre-made style', 'hongo-addons'),
                'param_name' => 'hongo_image_gallery_preview_image',
            ),
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Images', 'hongo-addons'),
                'param_name' => 'image_gallery',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' ) ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_srcset',
                'value' => hongo_get_thumbnail_image_sizes(),
                'std' => 'full',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('No. of columns', 'hongo-addons'),
                'param_name' => 'hongo_column',
                'std' => '3',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('1 column', 'hongo-addons') => '1',
                    esc_html__('2 columns', 'hongo-addons') => '2',
                    esc_html__('3 columns', 'hongo-addons') => '3',
                    esc_html__('4 columns', 'hongo-addons') => '4',
                    esc_html__('5 columns', 'hongo-addons') => '5',
                    esc_html__('6 columns', 'hongo-addons') => '6',
                ),
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery' ) )
            ),
            array(
              'type' => 'hongo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__('Title', 'hongo-addons'),
              'param_name' => 'justified_title',
              'value' => array(esc_html__('Off', 'hongo-addons') => '0', 
                               esc_html__('On', 'hongo-addons') => '1',
                              ),
              'std' => '1',
              'dependency' => array( 'element' => 'image_gallery_type', 'value' => array( 'justified-gallery' ) ),
            ),
            array(
              'type' => 'textfield',
              'class' => '',
              'heading' => esc_html__( 'Spacing between columns', 'hongo-addons'),
              'param_name' => 'hongo_justified_gallery_gap',
              'std' => '10',
              'value' => '',
              'dependency' => array( 'element' => 'image_gallery_type', 'value' => array( 'justified-gallery' ) ),
            ),
            array(
              'type' => 'textfield',
              'class' => '',
              'heading' => esc_html__( 'Height', 'hongo-addons'),
              'param_name' => 'hongo_justified_gallery_height',
              'std' => '400',              
              'value' => '',
              'dependency' => array( 'element' => 'image_gallery_type', 'value' => array( 'justified-gallery' ) ),
            ),
            array(
              'type' => 'dropdown',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Last row', 'hongo-addons'),
              'param_name' => 'hongo_justified_last_row',
              'value' => array(esc_html__( 'Select Last row', 'hongo-addons') => '',
                               esc_html__( 'No Justify', 'hongo-addons') => 'nojustify',
                               esc_html__( 'Justify', 'hongo-addons') => 'justify',
                               esc_html__( 'Hide', 'hongo-addons') => 'hide',
              ),
              'std' => 'nojustify',
              'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('justified-gallery') )
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
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery' ) )
            ),
            array(
                  'type' => 'hongo_custom_switch_option',
                  'holder' => 'div',
                  'class' => '',
                  'heading' => esc_html__('Enable zoom', 'hongo-addons'),
                  'param_name' => 'hongo_enable_zoom',
                  'value' => array(esc_html__('Off', 'hongo-addons') => '0', 
                                   esc_html__('On', 'hongo-addons') => '1',
                                  ),
                  'std' => '1',
                  'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Lightbox gallery', 'hongo-addons'),
                'param_name' => 'lightbox_gallery',
                'value' => array(
                    esc_html__('Off', 'hongo-addons') => '0', 
                    esc_html__('On', 'hongo-addons') => '1'
                ),
                'std' => '1',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Metro', 'hongo-addons'),
                'param_name' => 'hongo_show_metro',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery' )),
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
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
                'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation delay', 'hongo-addons' ),
                'param_name' => 'hongo_animation_delay',
                'dependency' => array( 'element' => 'hongo_column_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation delay in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Animation duration', 'hongo-addons' ),
                'param_name' => 'hongo_animation_duration',
                'dependency' => array( 'element' => 'hongo_column_animation_style', 'value_not_equal_to' => array( 'none' ) ),
                'description' => esc_html__( 'Add animation duration in mls, like 200', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon color', 'hongo-addons' ),
                'param_name' => 'hongo_icon_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery' )),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Icon box background color', 'hongo-addons' ),
                'param_name' => 'hongo_icon_bg_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery' ) ),
            ),
             array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Box hover background color', 'hongo-addons' ),
                'param_name' => 'hongo_box_hover_bg_color',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'grid-gallery','metro-gallery' ) ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' ) ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'hongo_bg_image_type', 
                'heading' => esc_html__( 'Background type', 'hongo-addons' ),
                'value' => array(esc_html__('Select background type', 'hongo-addons') => '',
                               esc_html__('Fix background', 'hongo-addons') => 'fix-background',
                               esc_html__('Cover background', 'hongo-addons') => 'cover-background',
                              ),
                'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-3',
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'type' => 'hongo_custom_title', // this param type
                'value' => '', // your custom markup
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
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
                'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array( 'masonry-gallery','grid-gallery','metro-gallery','justified-gallery' )),
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
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    )
);
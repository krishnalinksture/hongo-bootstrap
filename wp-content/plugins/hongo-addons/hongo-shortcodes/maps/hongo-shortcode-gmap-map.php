<?php
/**
 * Map For Google Map
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Google Map */
/*-----------------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__( 'Google Map', 'hongo-addons' ),
        'base' => 'hongo_gmap',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-map-marker-alt hongo-shortcode-icon',
        'description' => esc_html__( 'Add any location map', 'hongo-addons' ),
        'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Style', 'hongo-addons'),
                    'param_name' => 'hongo_gmap_style',
                    'admin_label' => true,
                    'value' => array(
                        esc_html__( 'Select', 'hongo-addons' ) => '',
                        esc_html__( 'Style 1', 'hongo-addons' ) => 'hongo-gmap-style-1',
                        esc_html__( 'Style 2', 'hongo-addons' ) => 'hongo-gmap-style-2',
                        esc_html__( 'Style 3', 'hongo-addons' ) => 'hongo-gmap-style-3',
                    ),
                ),
                array(
                    'type' => 'hongo_preview_image',
                    'heading' => esc_html__( 'Select pre-made style', 'hongo-addons' ),
                    'param_name' => 'hongo_gmap_preview_image',
                ),
                array(
                'type' => 'textarea_safe',
                'heading' => __( 'Map embed iframe', 'hongo-addons' ),
                'param_name' => 'hongo_link',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
                'description' => sprintf( __( 'Visit %s to create your map (Step by step: 1) Find location 2) Click the cog symbol in the lower right corner and select "Share or embed map" 3) On modal window select "Embed map" 4) Copy iframe code and paste it).', 'hongo-addons' ), '<a href="https://www.google.com/maps" target="_blank">' . __( 'Google maps', 'hongo-addons' ) . '</a>' ),
                'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Equal column full height', 'hongo-addons'),
                    'param_name' => 'hongo_full_height',
                    'std' => '0',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
                    'description' => esc_html__( 'If you have checked equal height from row settings then it will full height and if equal height is not checked then google map will not work properly.', 'hongo-addons' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Map height', 'hongo-addons' ),
                    'param_name' => 'hongo_size',
                    'description' => __( 'Enter map height (in pixels or leave empty for responsive map).', 'hongo-addons' ),
                    'dependency'  => array( 'element' => 'hongo_full_height', 'value' => array( '0' )),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'Animation', 'hongo-addons' ),
                    'param_name' => 'hongo_animation_style',
                    'value' => '',
                    'settings' => array(
                        'type' => array(
                            'in',
                            'other',
                        ),
                    ),
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
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
                    'type' => 'css_editor',
                    'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                    'param_name' => 'css',
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
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
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
                    'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                    'param_name' => 'desktop_bg_image_position',
                    'value' => $hongo_desktop_bg_image_position,
                    'edit_field_class' => 'vc_col-sm-3',
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
                    'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                ),
                array(
                    'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                    'type' => 'hongo_custom_title', // this param type
                    'value' => '', // your custom markup
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
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
                    'dependency'  => array( 'element' => 'hongo_gmap_style', 'value' => array( 'hongo-gmap-style-1','hongo-gmap-style-2','hongo-gmap-style-3' )),
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
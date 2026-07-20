<?php
/**
 * Shortcode Map For Text Block
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

  vc_map( array(
    'name' => esc_html__( 'Text Block', 'hongo-addons' ),
    'base' => 'vc_column_text',
    'icon' => 'icon-wpb-layer-shape-text',
    'wrapper_class' => 'clearfix',
    'category' => 'Hongo',
    'description' => esc_html__( 'A block of text with WYSIWYG editor', 'hongo-addons' ),
    'params' => array(
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Text', 'hongo-addons' ),
          'param_name' => 'content',
          'value' => esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'hongo-addons' )
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
          'type' => 'css_editor',
          'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
          'param_name' => 'css',
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
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Background position', 'hongo-addons' ),
          'param_name' => 'desktop_bg_image_position',
          'value' => $hongo_desktop_bg_image_position,
          'edit_field_class' => 'vc_col-sm-3',
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Width', 'hongo-addons' ),
          'param_name' => 'desktop_width',
          'value' => '',
          'edit_field_class' => 'vc_col-sm-3',
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        array(
          'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
          'type' => 'hongo_custom_title', // this param type
          'value' => '', // your custom markup
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        array(
          'type' => 'hongo_custom_switch_option',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Enable responsive css box', 'hongo-addons'),
          'param_name' => 'hongo_enable_responsive_css',
          'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                           esc_html__( 'On', 'hongo-addons') => '1'
                          ),
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        array(
          'type' => 'responsive_css_editor',
          'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
          'param_name' => 'responsive_css',
          'height' => 'no',
          'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
          'group' => esc_html__( 'Design Options', 'hongo-addons' ),
        ),
        $hongo_vc_extra_id,
        $hongo_vc_extra_class,
      )
  ) );
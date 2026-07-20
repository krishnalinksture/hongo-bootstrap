<?php
/**
 * Shortcode Map For Inner Row
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Inner Row */
/*-----------------------------------------------------------------------------------*/

vc_map(
    array(
        'name' => esc_html__( 'Inner Row', 'hongo-addons' ),
        'content_element' => false,
        'is_container' => true,
        'icon' => 'icon-wpb-row',
        'weight' => 1000,
        'description' => esc_html__( 'Aligns content in a row', 'hongo-addons' ),
        'show_settings_on_create' => false,
        'base' => 'vc_row_inner',
        'js_view' => 'VcRowView',
        'category' => 'Hongo',
        'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Columns gap', 'hongo-addons' ),
              'param_name' => 'gap',
              'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
              ),
              'std' => '0',
              'description' => esc_html__( 'Select gap between columns in row.', 'hongo-addons' ),
            ),
            array(
              'type' => 'checkbox',
              'heading' => esc_html__( 'Equal height', 'hongo-addons' ),
              'param_name' => 'equal_height',
              'description' => esc_html__( 'If checked columns will be set to equal height.', 'hongo-addons' ),
              'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Content position', 'hongo-addons' ),
              'param_name' => 'content_placement',
              'value' => array(
                esc_html__( 'Default', 'hongo-addons' ) => '',
                esc_html__( 'Top', 'hongo-addons' ) => 'top',
                esc_html__( 'Middle', 'hongo-addons' ) => 'middle',
                esc_html__( 'Bottom', 'hongo-addons' ) => 'bottom',
              ),
              'description' => esc_html__( 'Select content position within columns.', 'hongo-addons' ),
            ),
            array(
              'type' => 'checkbox',
              'heading' => esc_html__( 'Disable row', 'hongo-addons' ),
              'param_name' => 'disable_element',
              // Inner param name.
              'description' => esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'hongo-addons' ),
              'value' => array( esc_html__( 'Yes', 'hongo-addons' ) => 'yes' ),
            ),


            array(
              'type' => 'hongo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Position relative', 'hongo-addons'),
              'param_name' => 'position_relative',
              'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                               esc_html__( 'On', 'hongo-addons') => '1'
                              ),
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'hongo_overflow_type', 
              'heading' => esc_html__( 'Overflow', 'hongo-addons' ),
              'value' => array(esc_html__('Select', 'hongo-addons') => '',
                               esc_html__('Overflow visible', 'hongo-addons') => 'overflow-visible',
                               esc_html__('Overflow hidden', 'hongo-addons') => 'overflow-hidden',
                               esc_html__('Overflow auto', 'hongo-addons') => 'overflow-auto',
                              ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Z-index', 'hongo-addons'),
                'param_name' => 'z_index',
                'value' => '',
            ),
            array(
              'type' => 'animation_style',
              'heading' => esc_html__( 'Animation', 'hongo-addons' ),
              'param_name' => 'initial_loading_animation',
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
              'type' => 'hongo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Overlay', 'hongo-addons'),
              'param_name' => 'show_overlay',
              'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                               esc_html__( 'On', 'hongo-addons') => '1'
                              ),
              'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
              'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Overlay color', 'hongo-addons' ),
              'param_name' => 'hongo_row_overlay_color',
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'edit_field_class' => 'vc_col-sm-6',
              'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Overlay opacity', 'hongo-addons'),
              'param_name' => 'hongo_overlay_opacity',
              'admin_label' => true,
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
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'edit_field_class' => 'vc_col-sm-6',
              'group' => esc_html__( 'Overlay', 'hongo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Z-index', 'hongo-addons'),
              'param_name' => 'hongo_z_index',
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'edit_field_class' => 'vc_col-sm-6',
              'group' => esc_html__( 'Overlay', 'hongo-addons' ),
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
                               esc_html__('Background no repeat', 'hongo-addons') => 'background-no-repeat',
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
              'heading' => esc_html__( 'Minimum height', 'hongo-addons' ),
              'param_name' => 'desktop_height',
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
              'description' => esc_html__( 'This will enable mini dekstop, tablet and mobile css options.', 'hongo-addons' ),
              'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
              'type' => 'responsive_css_editor',
              'heading' => esc_html__( 'Responsive css box', 'hongo-addons' ),
              'param_name' => 'responsive_css',
              'width' => 'no',
              'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
              'group' => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
<?php
/**
 * Map For Timer
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Timer */
/*-----------------------------------------------------------------------------------*/


vc_map(
    array(
        'name' => esc_html__( 'Countdown Timer', 'hongo-addons' ),
        'base' => 'hongo_timer',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-hourglass hongo-shortcode-icon',
        'description' => esc_html__( 'Any date countdown timer', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'hongo-addons'),
                'param_name' => 'hongo_timer_style',
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Style 1', 'hongo-addons') => 'hongo-timer-style-1',
                    esc_html__('Style 2', 'hongo-addons') => 'hongo-timer-style-2',
                    esc_html__('Style 3', 'hongo-addons') => 'hongo-timer-style-3',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Select pre-made style', 'hongo-addons'),
                'param_name' => 'hongo_timer_preview_image',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Timer end date - time', 'hongo-addons'),
                'param_name' => 'hongo_timer_date',
                'admin_label' => true,
                'description' => esc_html__( 'Enter end date in yyyy/mm/dd H:i:s format like 2020/10/25 18:30:40', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Days text', 'hongo-addons'),
                'param_name' => 'hongo_day_text',
                'std' => esc_html__('Days', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Hours text', 'hongo-addons'),
                'param_name' => 'hongo_hour_text',
                'std' => esc_html__('Hours', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Minutes text', 'hongo-addons'),
                'param_name' => 'hongo_minute_text',
                'std' => esc_html__('Minutes', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Seconds text', 'hongo-addons'),
                'param_name' => 'hongo_second_text',
                'std' => esc_html__('Seconds', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
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
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),                
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
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Separator', 'hongo-addons'),
                'param_name' => 'hongo_enable_separator',
                'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                                 esc_html__( 'On', 'hongo-addons') => '1'
                                ),
                'std' => '1',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-2' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Separator thickness', 'hongo-addons' ),
                'param_name' => 'hongo_separator_width',
                'dependency' => array( 'element' => 'hongo_enable_separator', 'value' => array('1') ),
                'description' => esc_html__( 'In pixel like 2px', 'hongo-addons' ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Separator height', 'hongo-addons' ),
                'param_name' => 'hongo_separator_height',
                'dependency' => array( 'element' => 'hongo_enable_separator', 'value' => array('1') ),
                'description' => esc_html__( 'In pixel like 20px', 'hongo-addons' ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-2', 'hongo-timer-style-3' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_timer_number_setting',
                'heading'     => esc_html__( 'Timer number typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
                'hide_element_keys' => array( 'text-hover-color', 'font-transform', 'text-align' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for timer number', 'hongo-addons'),
                'param_name' => 'hongo_enable_timer_alternate_font',
                'value' => array(
                                esc_html__( 'Off', 'hongo-addons') => '0', 
                                esc_html__( 'On', 'hongo-addons') => '1'
                            ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting typography-full-setting',
                'description' => esc_html__( 'If On is selected then timer number will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1','hongo-timer-style-2','hongo-timer-style-3' ) ),
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hongo_font_timer_text_setting',
                'heading'     => esc_html__( 'Timer text typography', 'hongo-addons' ),
                'group' => esc_html__( 'Typography', 'hongo-addons'),
                'dependency'  => array( 'element' => 'hongo_timer_style', 'value' => array( 'hongo-timer-style-1', 'hongo-timer-style-2', 'hongo-timer-style-3' ) ),
                'hide_element_keys' => array( 'text-hover-color', 'text-align' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        )
    )
);
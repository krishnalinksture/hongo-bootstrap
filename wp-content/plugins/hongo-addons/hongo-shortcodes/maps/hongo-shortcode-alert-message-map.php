<?php
/**
 * Map For Alert Message
 *
 * @package Hongo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__('Alert Message', 'hongo-addons'),
        'base' => 'hongo_alert_message',
        'category' => 'Hongo',
        'description' => esc_html__( 'Alert style content', 'hongo-addons' ),
        'icon' => 'fa-solid fa-exclamation-triangle hongo-shortcode-icon', 
        'params' => array(
            array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => esc_html__('Style', 'hongo-addons'),
                'admin_label' => true,
                'param_name' => 'hongo_alert_message_premade_style',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons' ) => '',
                    esc_html__( 'Style 1', 'hongo-addons' ) => 'alert-message-style-1',
                    esc_html__( 'Style 2', 'hongo-addons' ) => 'alert-message-style-2',
                    esc_html__( 'Style 3', 'hongo-addons' ) => 'alert-message-style-3',
                    esc_html__( 'Style 4', 'hongo-addons' ) => 'alert-message-style-4',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__( 'Style for tab', 'hongo-addons' ),
                'param_name' => 'alert_message_preview_image',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Type', 'hongo-addons'),
                'param_name' => 'hongo_alert_message_type',
                'value' => array(
                    esc_html__( 'Select', 'hongo-addons' ) => '',
                    esc_html__( 'Success message', 'hongo-addons' ) => 'success',
                    esc_html__( 'Info message', 'hongo-addons' ) => 'info',
                    esc_html__( 'Warning message', 'hongo-addons' ) => 'warning',
                    esc_html__( 'Danger message', 'hongo-addons' ) => 'danger',
                ),
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1','alert-message-style-2','alert-message-style-3','alert-message-style-4' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Message (in bold)', 'hongo-addons' ),
                'param_name' => 'hongo_highliget_title',
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1','alert-message-style-2','alert-message-style-3','alert-message-style-4' )),
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Content', 'hongo-addons' ),
                'param_name' => 'hongo_subtitle',
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1','alert-message-style-2','alert-message-style-3','alert-message-style-4' )),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for message', 'hongo-addons'),
                'param_name' => 'hongo_enable_message_alternate_font',
                'value' => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                                 esc_html__( 'On', 'hongo-addons') => '1'
                                ),
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1','alert-message-style-2','alert-message-style-3','alert-message-style-4' )),
                'description'=> esc_html__( 'If On is selected then message will use additional font family setup in WordPress customizer', 'hongo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Text case', 'hongo-addons'),
              'param_name' => 'hongo_text_transform',
              'value' => array(  esc_html__( 'Select', 'hongo-addons' ) => '', 
                                 esc_html__( 'Lowercase', 'hongo-addons' ) => 'text-lowercase',
                                 esc_html__( 'Uppercase', 'hongo-addons' ) => 'text-uppercase',
                                 esc_html__( 'Capitalize', 'hongo-addons' ) => 'text-capitalize',
                                 esc_html__( 'None', 'hongo-addons' ) => 'text-none',
                                ),
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1','alert-message-style-2','alert-message-style-3','alert-message-style-4' )),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'class' => '',
                'heading' => esc_html__( 'Close button', 'hongo-addons'),
                'param_name' => 'show_close_button',
                'value'      => array (   
                                esc_html__( 'Off', 'hongo-addons' ) => '0', 
                                esc_html__( 'On', 'hongo-addons' ) => '1'
                            ),
                'std' => '1',
                'description' => esc_html__( 'Select ON to show close button in message', 'hongo-addons' ),
                'dependency'  => array( 'element' => 'hongo_alert_message_premade_style', 'value' => array( 'alert-message-style-1', 'alert-message-style-2', 'alert-message-style-3', 'alert-message-style-4' ) ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    )
);
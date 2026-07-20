<?php
/**
 * Smart Section Map For Popup Newsletter
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup Newsletter */
/*-----------------------------------------------------------------------------------*/
vc_map( 
    array(
        'name' => esc_html__( 'Newsletter Popup', 'hongo-addons' ),
        'base' => 'hongo_newsletter_popup',
        'category' => 'Hongo',
        'description' => esc_html__( 'Add newsletter popup', 'hongo-addons' ),
        'icon' => 'fa-regular fa-envelope hongo-shortcode-icon', //URL or CSS class with icon image.
        'params' => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Style', 'hongo-addons' ),
                'param_name'  => 'hongo_newsletter_popup_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__( 'Select', 'hongo-addons') => '',
                    esc_html__( 'Style 1', 'hongo-addons')  => 'hongo-popup-newsletter-1',
                ),
            ),
            array(
                'type'       => 'hongo_preview_image',
                'heading'    => esc_html__( 'Select pre-made style for shop banner', 'hongo-addons'),
                'param_name' => 'hongo_newsletter_preview_image',
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__( 'Label', 'hongo-addons'),
                'param_name' => 'hongo_lable',
                'value'      => '',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'description'=> esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
            ),
            array(
                'type'       => 'textarea',
                'heading'    => esc_html__( 'Mailchimp / other shortcode or custom code', 'hongo-addons'),
                'param_name' => 'hongo_shortcode_id',
                'value'      => '',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'description'=> esc_html__( 'Note: Custom css or style needs to be implemented for any other form except Mailchimp', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Button background color', 'hongo-addons'),
                'param_name' => 'hongo_button_bgcolor',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Button hover background color', 'hongo-addons'),
                'param_name' => 'hongo_button_hover_bgcolor',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Button / Icon text color', 'hongo-addons'),
                'param_name' => 'hongo_button_text_color',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Button / Icon text hover color', 'hongo-addons'),
                'param_name' => 'hongo_button_text_hover_color',
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
                'group' => esc_html__( 'Style', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
            ), 
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_lable_setting',
                'heading'    => esc_html__( 'Lable typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'hide_element_keys' => array( 'text-hover-color' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
            ),
            array(
                'type'       => 'hongo_custom_switch_option',
                'heading'    => esc_html__( 'Use additional font for lable', 'hongo-addons'),
                'param_name' => 'hongo_enable_alternate_font_lable',
                'value'      => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std'        => '1',
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-left-setting typography-full-setting',
                'description'=> esc_html__( 'If On is selected then lable will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
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
                'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value' => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-3',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Width', 'hongo-addons' ),
                'param_name' => 'desktop_width',
                'value' => '',
                'edit_field_class' => 'vc_col-sm-3',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading',
                'type' => 'hongo_custom_title',
                'value' => '',
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ), 
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Enable responsive css box', 'hongo-addons'),
                'param_name' => 'hongo_enable_responsive_css',
                'value' => array(
                    esc_html__( 'OFF', 'hongo-addons') => '0',
                    esc_html__( 'ON', 'hongo-addons') => '1'
                ),
                'group' => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_newsletter_popup_style', 'value' => array( 'hongo-popup-newsletter-1') ),
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
        ),
    ) 
);
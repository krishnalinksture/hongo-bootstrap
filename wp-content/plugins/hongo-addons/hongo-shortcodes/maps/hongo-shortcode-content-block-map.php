<?php
/**
 * Shortcode Map For Content Block
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Content Block  */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Content Block', 'hongo-addons' ),
        'base' => 'hongo_content_block',
        'category' => 'Hongo',
        'icon' => 'fa-solid fa-list-alt hongo-shortcode-icon',
        'description' => esc_html__( 'Styled blocks of content', 'hongo-addons' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Style', 'hongo-addons'),
                'param_name' => 'hongo_block_premade_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Select', 'hongo-addons') => '',
                    esc_html__('Style 1', 'hongo-addons') => 'special-content-block-1',
                    esc_html__('Style 2', 'hongo-addons') => 'special-content-block-2',
                    esc_html__('Style 3', 'hongo-addons') => 'special-content-block-3',
                ),
            ),
            array(
                'type' => 'hongo_preview_image',
                'heading' => esc_html__('Select style for block', 'hongo-addons'),
                'param_name' => 'hongo_block_preview_image',
            ),
            array(
                'type'       => 'attach_image',
                'heading'    => esc_html__( 'Logo', 'hongo-addons' ),
                'param_name' => 'hongo_logo',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Logo thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_logo_srcset',
                'value'      => hongo_get_thumbnail_image_sizes(),
                'std'        => 'full',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'hongo-addons' ),
                'param_name' => 'hongo_block_title',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
                'description'=> esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Link on box', 'hongo-addons'),
                'param_name' => 'hongo_enable_box_link',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-3' ) ),
                'std' => '0',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Box Link / URL', 'hongo-addons'),
                'param_name' => 'hongo_box_link_url',
                'admin_label' => true,
                'dependency'  => array( 'element' => 'hongo_enable_box_link', 'value' => '1' ),
                'description' => esc_html__( 'Enter full URL with http, like http://www.example.com', 'hongo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Box link target', 'hongo-addons'),
                'param_name' => 'hongo_box_link_target',
                'value' => array(
                    esc_html__('Self', 'hongo-addons') => '_self', 
                    esc_html__('New tab / window', 'hongo-addons') => '_blank'
                ),
                'dependency'  => array( 'element' => 'hongo_enable_box_link', 'value' => '1' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Offer text', 'hongo-addons' ),
                'param_name' => 'hongo_offer_text',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
                'description'=> esc_html__( 'Use || to break the word in new line.', 'hongo-addons' ),
            ),
            array(
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content', 'hongo-addons' ),
                'param_name' => 'content',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Separator', 'hongo-addons' ),
                'param_name' => 'hongo_show_separator',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
            ),
            array(
                'type'       => 'attach_image',
                'heading'    => esc_html__( 'Image', 'hongo-addons' ),
                'param_name' => 'hongo_image',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Image thumbnail size', 'hongo-addons' ),
                'param_name' => 'hongo_image_srcset',
                'value'      => hongo_get_thumbnail_image_sizes(),
                'std'        => 'full',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Separator color', 'hongo-addons' ),
                'param_name' => 'hongo_separator_color',
                'dependency'  => array( 'element' => 'hongo_show_separator', 'value' => array('1') ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Separator thickness', 'hongo-addons' ),
                'param_name' => 'hongo_separator_thickness',
                'dependency'  => array( 'element' => 'hongo_show_separator', 'value' => array('1') ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
                'description'=> esc_html__( 'In pixel like 2px', 'hongo-addons' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Offer text border color', 'hongo-addons' ),
                'param_name' => 'hongo_offertext_border_color',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__( 'Box background color', 'hongo-addons' ),
                'param_name' => 'hongo_content_bg_color',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
                'group' => esc_html__( 'Style', 'hongo-addons'),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_title_setting',
                'heading'    => esc_html__( 'Title typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title element tag', 'hongo-addons'),
                'param_name' => 'title_heading_tag',                
                'value' => $hongo_element_tag,
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-left-setting',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for title', 'hongo-addons' ),
                'param_name' => 'additional_font_title',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding typography-right-setting',
                'description' => esc_html__( 'If On is selected then title will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2','special-content-block-3' ) ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_offer_text_setting',
                'heading'    => esc_html__( 'Offer text typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'heading' => esc_html__( 'Use additional font for offer text', 'hongo-addons' ),
                'param_name' => 'additional_font_offer_text',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons' ) => '0', 
                    esc_html__( 'On', 'hongo-addons' ) => '1'
                ),
                'std' => '1',
                'group' => esc_html__( 'Typography', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-12 vc_column-with-padding typography-full-setting typography-left-setting',
                'description' => esc_html__( 'If On is selected then offer text will use additional font family setup in WordPress customizer', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-2' ) ),
            ),
            array(
                'type'       => 'responsive_font_settings',
                'param_name' => 'hongo_font_content_setting',
                'heading'    => esc_html__( 'Content typography', 'hongo-addons' ),
                'group'      => esc_html__( 'Typography', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1' ) ),
                'hide_element_keys' => array( 'text-hover-color' ),
            ),
            array(
                'type'       => 'css_editor',
                'heading'    => esc_html__( 'CSS box', 'hongo-addons' ),
                'param_name' => 'css',                  
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
            ),
            array(
                'type'       => 'dropdown',
                'param_name' => 'hongo_bg_image_type', 
                'heading'    => esc_html__( 'Background type', 'hongo-addons' ),
                'value'      => array(esc_html__('Select background type', 'hongo-addons') => '',
                               esc_html__('Fix background', 'hongo-addons') => 'fix-background',
                               esc_html__('Cover background', 'hongo-addons') => 'cover-background',
                              ),
                'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__( 'Background position', 'hongo-addons' ),
                'param_name' => 'desktop_bg_image_position',
                'value'      => $hongo_desktop_bg_image_position,
                'edit_field_class' => 'vc_col-sm-4',
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
            ),
            array(
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'type'       => 'hongo_custom_title', // this param type
                'value'      => '', // your custom markup                
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
            ),
            array(
                'type'       => 'hongo_custom_switch_option',
                'holder'     => 'div',
                'class'      => '',
                'heading'    => esc_html__( 'Enable responsive css', 'hongo-addons'),
                'param_name' => 'hongo_enable_responsive_css',
                'value'      => array(esc_html__( 'Off', 'hongo-addons') => '0', 
                                esc_html__( 'On', 'hongo-addons') => '1'
                              ),                
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
                'dependency' => array( 'element' => 'hongo_block_premade_style', 'value' => array( 'special-content-block-1','special-content-block-2' ) ),
            ),
            array(
                'type'       => 'responsive_css_editor',
                'heading'    => esc_html__( 'Responsive css box', 'hongo-addons' ),
                'param_name' => 'responsive_css',
                'height'     => 'no',
                'width'      => 'no',
                'dependency' => array( 'element' => 'hongo_enable_responsive_css', 'value' => array('1') ),
                'group'      => esc_html__( 'Design Options', 'hongo-addons' ),
            ),
            $hongo_vc_extra_id,
            $hongo_vc_extra_class,
        ),
    ) 
);
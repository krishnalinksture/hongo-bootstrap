<?php
/**
 * Smart Section Map For Header Logo
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Header Logo */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => esc_html__( 'Header Logo', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_header_logo', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Add logo image', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'vc-material vc-material-developer_board hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Logo', 'hongo-addons'),
                'param_name' => 'hongo_logo',
                'description' => esc_html__( 'Upload the logo image which will be displayed in the website header.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Sticky logo', 'hongo-addons'),
                'param_name' => 'hongo_logo_light',
                'description' => esc_html__( 'Upload the logo image which will be displayed in the scrolled / sticky header version.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Retina logo', 'hongo-addons'),
                'param_name' => 'hongo_logo_ratina',
                'description' => esc_html__( 'Upload the double size logo image which will be displayed in the website header of retina devices.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Sticky retina logo', 'hongo-addons'),
                'param_name' => 'hongo_logo_light_ratina',
                'description' => esc_html__( 'Upload the logo image which will be displayed in the scrolled / sticky header version of retina devices.', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'H1 in logo in Front / Home page?', 'hongo-addons'),
                'param_name' => 'hongo_h1_logo_font_page',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
            ),
            array(
                'type' => 'hongo_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__( 'Show logo in sticky header?', 'hongo-addons'),
                'param_name' => 'hongo_sticky_show_logo',
                'value' => array(
                    esc_html__( 'Off', 'hongo-addons') => '0', 
                    esc_html__( 'On', 'hongo-addons') => '1'
                ),
                'std' => '0',
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
                'type' => 'textfield',
                'param_name' => 'logo_max_height',
                'heading' => esc_html__( 'Maximum height', 'hongo-addons' ),
                'description' => esc_html__( 'In pixel like 20px', 'hongo-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Style', 'hongo-addons' ),
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'logo_svg_width',
                'heading' => esc_html__( 'SVG width', 'hongo-addons' ),
                'description' => esc_html__( 'In pixel like 20px', 'hongo-addons' ),
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
                'type' => 'hongo_custom_title', // this param type
                'param_name' => 'hongo_custom_separator_heading', // all params must have a unique name
                'value' => '', // your custom markup
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
        )
    )
);
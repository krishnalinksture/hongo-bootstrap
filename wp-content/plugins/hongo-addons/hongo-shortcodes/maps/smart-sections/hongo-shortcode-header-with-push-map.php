<?php
/**
 * Smart Section Map For Header With Push
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Header With Push */
/*-----------------------------------------------------------------------------------*/
$sidebar_array = hongo_addons_widgetised_sidebars();

vc_map( 
    array(
        'name' => esc_html__( 'Header with push', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_header_push', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Add push menu sidebar', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-align-center hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Sidebar', 'hongo-addons'),
                    'param_name' => 'hongo_widget_select',
                    'value' => $sidebar_array,
                    'admin_label' => true,
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
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Toggle button color', 'hongo-addons' ),
                    'param_name' => 'hongo_toggle_button_color',
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Content background color', 'hongo-addons' ),
                    'param_name' => 'hongo_content_bg_color',
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Close button color', 'hongo-addons' ),
                    'param_name' => 'hongo_close_button_color',
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                ),
                $hongo_vc_extra_id,
                $hongo_vc_extra_class,
            )
    )
);
<?php
/**
 * Smart Section Map For Left Menu
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Left Menu */
/*-----------------------------------------------------------------------------------*/
 
$menu_list = hongo_get_menu_list_array();

vc_map( 
    array(
        'name' => esc_html__( 'Left Menu', 'hongo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hongo_left_navigation_menu', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Left vertical menu', 'hongo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fa-solid fa-align-left hongo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Hongo Builder',
        'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Menu', 'hongo-addons'),
                    'param_name' => 'hongo_menu_select',
                    'admin_label' => true,
                    'value' => $menu_list,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Mobile menu text', 'hongo-addons' ),
                    'param_name' => 'hongo_mobile_menu_text',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'hongo_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__( 'Close icon in toggle', 'hongo-addons' ),
                    'param_name' => 'hongo_enable_close_toggle',
                    'std' => '1',
                    'value' => array(
                        esc_html__( 'Off', 'hongo-addons') => '0', 
                        esc_html__( 'On', 'hongo-addons') => '1'
                    ),
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6'
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Navigation icon color', 'hongo-addons' ),
                    'param_name' => 'hongo_navigation_icon_color',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Navigation active icon color', 'hongo-addons' ),
                    'param_name' => 'hongo_navigation_active_icon_color',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Navigation icon size', 'hongo-addons' ),
                    'param_name' => 'hongo_navigation_icon_size',
                    'group' => esc_html__( 'Style', 'hongo-addons' ),
                    'description'=> esc_html__( 'In pixel like 10px', 'hongo-addons' ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                ),
                array(
                    'type'        => 'responsive_font_settings',
                    'param_name'  => 'hongo_font_menu_setting',
                    'heading'     => esc_html__( 'Menu typography', 'hongo-addons' ),
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                ),
                array(
                    'type'        => 'responsive_font_settings',
                    'param_name'  => 'hongo_font_submenu_setting',
                    'heading'     => esc_html__( 'Submenu typography', 'hongo-addons' ),
                    'group' => esc_html__( 'Typography', 'hongo-addons' ),
                ),
                $hongo_vc_extra_id,
                $hongo_vc_extra_class,
            )
    )
);
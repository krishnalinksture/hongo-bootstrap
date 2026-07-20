<?php
/**
 * Shortcode For Tabs
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/
$tab_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_id_2 = time() . '-2-' . rand( 0, 100 );

vc_map( array(
	'name' => esc_html__( 'Tabs', 'hongo-addons' ),
	'base' => 'vc_tabs',
	'category' => 'Hongo',
	'show_settings_on_create' => false,
	'is_container' => true,
	'icon' => 'fa-solid fa-table hongo-shortcode-icon',
	'description' => esc_html__( 'Tabbed content', 'hongo-addons' ),
	'params' => array(
	    array(
			'type' => 'dropdown',
			'heading' => esc_html__('Tabs style', 'hongo-addons'),
			'param_name' => 'tabs_style',
			'admin_label' => true,
			'class' => 'hongo_select_preview_image',
			'value' => array(esc_html__('Select tabs style', 'hongo-addons') => '',
			               esc_html__('Tab style 1', 'hongo-addons') => 'tab-style1',
			               esc_html__('Tab style 2', 'hongo-addons') => 'tab-style2', 
			               esc_html__('Tab style 3', 'hongo-addons') => 'tab-style3',
			              ),
			'std' => 'tab-style1',
	    ),
	    array(
			'type' => 'hongo_preview_image',
			'heading' => esc_html__('Select pre-made style for tab', 'hongo-addons'),
			'param_name' => 'tab_preview_image',
	    ),
	    array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Active tab', 'hongo-addons' ),
			'param_name' => 'active_tab',
			'value' => '1',
			'description' => esc_html__( 'Enter active tab number.', 'hongo-addons' ),
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3') ),
	    ),
	    array(
			'type' => 'dropdown',
			'param_name' => 'tabs_alignment',
			'heading' => esc_html__('Tabs alignment', 'hongo-addons' ),
			'value' => array(esc_html__('No align', 'hongo-addons') => '',
			               esc_html__('Left align', 'hongo-addons') => 'text-left',
			               esc_html__('Right align', 'hongo-addons') => 'text-right',
			               esc_html__('Center align', 'hongo-addons') => 'text-center',
			              ),
			'description' => esc_html__( 'Select tabs section title alignment.', 'hongo-addons' ),
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3') ),
	    ),
	    array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon size', 'hongo-addons'),
			'param_name' => 'hongo_icon_size',
			'std' => 'icon-medium',
			'admin_label' => true,
			'value' => array(esc_html__( 'Default', 'hongo-addons') => '',
			               esc_html__( 'Extra large', 'hongo-addons') => 'icon-extra-large', 
			               esc_html__( 'Large', 'hongo-addons') => 'icon-large',
			               esc_html__( 'Extra medium', 'hongo-addons') => 'icon-extra-medium',
			               esc_html__( 'Medium', 'hongo-addons') => 'icon-medium',
			               esc_html__( 'Small', 'hongo-addons') => 'icon-small',
			               esc_html__( 'Extra small', 'hongo-addons') => 'icon-extra-small',
			              ),
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3' ) ),
			'group' => esc_html__( 'Style', 'hongo-addons' ),
	    ),
	    array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => esc_html__( 'Tab background color', 'hongo-addons' ),
			'param_name' => 'hongo_title_bg_color',
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2' ) ),
			'group' => esc_html__( 'Style', 'hongo-addons' ),
	    ),
	    array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => esc_html__( 'Active tab background color', 'hongo-addons' ),
			'param_name' => 'hongo_title_active_bg_color',
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1','tab-style2' ) ),
			'group' => esc_html__( 'Style', 'hongo-addons' ),
	    ),
	    array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => esc_html__( 'Active tab color', 'hongo-addons' ),
			'param_name' => 'hongo_title_active_color',
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3' ) ),
			'group' => esc_html__( 'Style', 'hongo-addons' ),
	    ),
	    array(
			'type' => 'colorpicker',
			'class' => '',
			'heading' => esc_html__( 'Border color', 'hongo-addons' ),
			'param_name' => 'hongo_border_color',
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2' ) ),
			'group' => esc_html__( 'Style', 'hongo-addons' ),
	    ),
	    array(
			'type'        => 'responsive_font_settings',
			'param_name'  => 'hongo_font_title_setting',
			'heading'     => esc_html__( 'Title typography', 'hongo-addons' ),
			'group' => esc_html__( 'Typography', 'hongo-addons' ),
			'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3') ),
			'hide_element_keys' => array( 'text-hover-color' ),
	    ),
	    $hongo_vc_extra_id,
	    $hongo_vc_extra_class,
  	),
	'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	                  <ul class="tabs_controls">
	                  </ul>
	                  %content%
	                  </div>',
	'default_content' => '[vc_tab title="' . esc_html__( 'Tab 1', 'hongo-addons' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
	                    [vc_tab title="' . esc_html__( 'Tab 2', 'hongo-addons' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]',
	'js_view' => 'VcTabsView'
) );

vc_map( array(
	'name' => esc_html__( 'Tab Item', 'hongo-addons' ),
	'base' => 'vc_tab',
	'category' => 'Hongo',
	'allowed_container_element' => 'vc_row',
	'is_container' => true,
	'content_element' => false,
	'params' => array(
	    array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'ID', 'hongo-addons' ),
			'param_name' => 'tab_id'
	    ),
	    array(
			'type' => 'hongo_custom_switch_option',
			'heading' => esc_html__('Title', 'hongo-addons'),
			'param_name' => 'show_title',
			'value' => array(esc_html__('Off', 'hongo-addons') => '0',
			               esc_html__('On', 'hongo-addons') => '1'
			              ),
	    ),
	    array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title text', 'hongo-addons' ),
			'param_name' => 'title',
			'value' => '',
			'dependency' => array( 'element' => 'show_title', 'value' => '1' ),
	    ),
	    array(
			'type' => 'hongo_custom_switch_option',
			'heading' => esc_html__('Icon / Image', 'hongo-addons'),
			'param_name' => 'show_icon',
			'value' => array(esc_html__('Off', 'hongo-addons') => '0',
			               esc_html__('On', 'hongo-addons') => '1'
			              ),
	    ),
	    array(
			'type' => 'hongo_custom_switch_option',
			'heading' => esc_html__('Custom icon image', 'hongo-addons'),
			'param_name' => 'custom_tab_icon',
			'value' => array(esc_html__('Off', 'hongo-addons') => '0',
			               esc_html__('On', 'hongo-addons') => '1'
			              ),
			'dependency' => array( 'element' => 'show_icon', 'value' => '1' ),
	    ),
	    array(
			'type' => 'attach_image',
			'heading' => esc_html__('Custom image', 'hongo-addons'),
			'param_name' => 'custom_tab_icon_image',
			'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '1' ),
			'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Extra Medium - 40px X 40px, Medium - 35px X 35px, Small - 24px X 24px, Extra Small - 16px X 16px', 'hongo-addons' ),
	    ),
	    array(
			'type' => 'hongo_icon',
			'heading' => esc_html__('Font icon', 'hongo-addons'),
			'param_name' => 'tab_icon',
			'admin_label' => true,
			'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '0' ),
	    ),
  ),
  'js_view' => 'VcTabView'
) );
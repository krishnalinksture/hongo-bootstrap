<?php
/**
 * Metabox For Page Layout Setting.
 *
 * @package Hongo
 */
?>
<?php
$hongo_sidebar_array = hongo_register_sidebar_array();
hongo_after_main_separator_start(
    'separator_main_start',
    ''
  );
  hongo_meta_box_separator(
    'hongo_single_product_separator_single',
    esc_html__( 'General', 'hongo-addons' )
  );
  hongo_after_inner_separator_start(
    'separator_start',
    ''
  ); 
hongo_meta_box_dropdown('hongo_single_product_layout_setting_single',
				esc_html__('Sidebar settings', 'hongo-addons'),
				array(
					  'default' => esc_html__('Default', 'hongo-addons'),
					  'hongo_layout_no_sidebar' => esc_html__('No sidebar', 'hongo-addons'),
					  'hongo_layout_left_sidebar' => esc_html__('Left sidebar', 'hongo-addons'),
					  'hongo_layout_right_sidebar' => esc_html__('Right sidebar', 'hongo-addons'),
					  'hongo_layout_both_sidebar' => esc_html__('Both sidebar', 'hongo-addons')
					 )
			);
hongo_meta_box_dropdown_sidebar('hongo_single_product_left_sidebar_single',
				esc_html__('Left sidebar', 'hongo-addons'),
				$hongo_sidebar_array,
				esc_html__('Select sidebar to display in left column of product page', 'hongo-addons'),
				array( 'element' => 'hongo_single_product_layout_setting_single', 'value' => array('default', 'hongo_layout_left_sidebar', 'hongo_layout_both_sidebar'))
			);
hongo_meta_box_dropdown_sidebar('hongo_single_product_right_sidebar_single',
				esc_html__('Right sidebar', 'hongo-addons'),
				$hongo_sidebar_array,
				esc_html__('Select sidebar to display in right column of product page', 'hongo-addons'),
				array( 'element' => 'hongo_single_product_layout_setting_single', 'value' => array('default', 'hongo_layout_right_sidebar', 'hongo_layout_both_sidebar'))
			);
hongo_meta_box_dropdown( 'hongo_single_product_container_style_single',
				esc_html__( 'Container style', 'hongo-addons' ),
				array(
					'default' => esc_html__( 'Default', 'hongo-addons' ),
					'container' => esc_html__( 'Fixed', 'hongo-addons' ),
					'container-fluid' => esc_html__( 'Full Width', 'hongo-addons' ),
					'container-fluid-with-padding' => esc_html__( 'Full width ( with paddings )', 'hongo-addons' ),
				)
			);
hongo_meta_box_text( 'hongo_single_product_container_fluid_with_padding_single', 
				esc_html__('Full width padding', 'hongo-addons'),
				'',
				'',
				array( 'element' => 'hongo_single_product_container_style_single', 'value' => array( 'default', 'container-fluid-with-padding' ) )
			);
hongo_meta_box_colorpicker( 'hongo_body_background_color_single',
            esc_html__( 'Body background', 'hongo-addons' )
        );
hongo_meta_box_dropdown( 'hongo_enable_box_layout_single',
            esc_html__( 'Box layout', 'hongo-addons' ),
            array(
                'default' => esc_html__( 'Default', 'hongo-addons' ),
                '1' => esc_html__( 'On', 'hongo-addons' ),
                '0' => esc_html__( 'Off', 'hongo-addons' )
            )
        );
hongo_before_inner_separator_end(
      'separator_end',
      ''
    );
    hongo_before_main_separator_end(
      'separator_main_end',
      ''
    );
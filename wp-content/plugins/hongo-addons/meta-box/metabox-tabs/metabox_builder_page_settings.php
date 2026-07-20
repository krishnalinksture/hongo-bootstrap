<?php
/**
 * Metabox For Builder Page Settings
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Get All Register Mini Header Section List. */
$hongo_mini_header_section_array = hongo_addons_get_builder_section_data( 'mini-header', true );

/* Get All Register Header Section List. */
$hongo_header_section_array = hongo_addons_get_builder_section_data( 'header', true );

/* Get All Register Header Top Section List. */
$hongo_header_top_section_array = hongo_addons_get_builder_section_data( 'top-header', true );

/* Get All Register Footer Section List. */
$hongo_footer_section_array = hongo_addons_get_builder_section_data( 'footer', true );

hongo_after_main_separator_start(
	'separator_main_start',
	''
);

	/* Mini Header Settings Start */
	hongo_meta_box_separator(
		'hongo_mini_header_separator_single',
		esc_html__( 'Mini header Settings', 'hongo-addons' )
	);

	hongo_after_inner_separator_start(
		'separator_start',
		''
	);

		hongo_meta_box_dropdown(
			'hongo_enable_mini_header_single',
			esc_html__( 'Mini header', 'hongo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hongo-addons' ),
			    '1' => esc_html__('On', 'hongo-addons'),
	            '0' => esc_html__('Off', 'hongo-addons')
			)
		);

		hongo_meta_box_dropdown(
			'hongo_mini_header_section_single',
			esc_html__( 'Mini header section', 'hongo-addons' ),
			$hongo_mini_header_section_array,
			'',
			array( 'element' => 'hongo_enable_mini_header_single', 'value' => array( 'default', '1' ) )
		);

	hongo_before_inner_separator_end(
		'separator_end',
		''
	);
	/* Mini Header Settings End */

	/* Header Settings Start */
	hongo_meta_box_separator(
		'hongo_mini_header_separator_single',
		esc_html__( 'Header Settings', 'hongo-addons' )
	);

	hongo_after_inner_separator_start(
		'separator_start',
		''
	);
	
		hongo_meta_box_dropdown(
			'hongo_enable_header_single',
			esc_html__( 'Header', 'hongo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hongo-addons' ),
			    '1' => esc_html__('On', 'hongo-addons'),
	            '0' => esc_html__('Off', 'hongo-addons')
			)
		);

		hongo_meta_box_dropdown(
			'hongo_header_top_section_single',
			esc_html__( 'Header top section', 'hongo-addons' ),
			$hongo_header_top_section_array,
			'',
			array( 'element' => 'hongo_enable_header_single', 'value' => array( 'default', '1' ) )
		);

		hongo_meta_box_dropdown(
			'hongo_header_section_single',
			esc_html__( 'Header section', 'hongo-addons' ),
			$hongo_header_section_array,
			'',
			array( 'element' => 'hongo_enable_header_single', 'value' => array( 'default', '1' ) )
		);

		hongo_meta_box_dropdown(	'hongo_header_type_single',
			esc_html__( 'Header style', 'hongo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hongo-addons' ),
				'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
				'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
	        ),
			'',
			array( 'element' => 'hongo_enable_header_single', 'value' => array( 'default', '1' ) )
		);

	hongo_before_inner_separator_end(
		'separator_end',
		''
	);
	/* Header Settings End */

	/* Footer Settings Start */
	hongo_meta_box_separator(
		'hongo_footer_separator_single',
		esc_html__( 'Footer Settings', 'hongo-addons' )
	);
	hongo_after_inner_separator_start(
		'separator_start',
		''
	);

		hongo_meta_box_dropdown('hongo_enable_footer_single',
			esc_html__('Footer', 'hongo-addons'),
			array('default' => esc_html__('Default', 'hongo-addons'),
				  '1' => esc_html__('On', 'hongo-addons'),
				  '0' => esc_html__('Off', 'hongo-addons')
				 )
		);
		hongo_meta_box_dropdown('hongo_footer_section_single',
			esc_html__('Footer section', 'hongo-addons'),
			$hongo_footer_section_array,
			'',
			array( 'element' => 'hongo_enable_footer_single', 'value' => array( 'default', '1' ) )

		);

	hongo_before_inner_separator_end(
		'separator_end',
		''
	);
	/* Footer Settings End */

hongo_before_main_separator_end(
	'separator_main_end',
	''
);

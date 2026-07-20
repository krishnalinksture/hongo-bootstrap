<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_compare_product_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_product_style_separator', array(
	    'label'     		=> __( 'Compare style and data', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_product_style_separator',
	) ) );

	/* End Separator Settings */

	/* Enable Compare Product Heading */

	$wp_customize->add_setting( 'hongo_compare_product_enable_heading', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_compare_product_enable_heading', array(
		'label'     		=> __( 'Heading', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_enable_heading',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Compare Product Heading */

	/* Compare Product Heading Text */

	$wp_customize->add_setting( 'hongo_compare_product_heading_text', array(
		'default' 			=> __( 'COMPARE PRODUCTS', 'hongo-addons' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_heading_text', array(
		'label'     		=> __( 'Heading text', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_heading_text',
		'type'              => 'text',
		'active_callback'   => 'hongo_compare_product_heading_callback',
	) ) );

	/* End Compare Product Heading Text */

	/* Enable Compare Product Filter */

	$wp_customize->add_setting( 'hongo_compare_product_enable_filter', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_compare_product_enable_filter', array(
		'label'     		=> __( 'Filter', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_enable_filter',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Compare Product Filter */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_compare_product_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_product_heading_separator', array(
	    'label'     		=> __( 'Heading typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_product_heading_separator',
	    'active_callback'   => 'hongo_compare_product_mix_callback',	    
	) ) );

	/* End Separator Settings */

	/* Compare Product Heading Font size */

    $wp_customize->add_setting( 'hongo_compare_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_heading_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_heading_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
		'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Heading Font size */

	/* Compare Product Heading Line height */

    $wp_customize->add_setting( 'hongo_compare_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_heading_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_heading_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Heading Line height */

	/* Compare Product Heading Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_heading_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
		'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Heading Letter spacing */

	/* Compare Product Heading Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_heading_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Heading Font weight */

	/* Compare Product Heading Color */

	$wp_customize->add_setting( 'hongo_compare_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_heading_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_heading_color',
	    'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Color */

	/* Compare Product Heading Link Hover Color */

	$wp_customize->add_setting( 'hongo_compare_product_heading_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_heading_link_hover_color', array(
	    'label'     		=> __( 'Link hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_heading_link_hover_color',
	    'active_callback'   => 'hongo_compare_product_mix_callback',
	) ) );

	/* End Compare Product Heading Link Hover Color */

	/* Compare Product Heading Color */

	$wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_color', array(
	    'label'     		=> __( 'Error color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_filter_errormsg_color',
	    'active_callback'   => 'hongo_compare_product_filter_callback',
	) ) );

	/* End Compare Product Color */

	
	/* Compare Product filter error message Border setting */

	$wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_enable_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_enable_border', array(
		'label'     		=> __( 'Error message box border', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_filter_errormsg_enable_border',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback'	=> 'hongo_compare_product_filter_callback',
	) ) );

	/* End Compare Product filter error message Border setting */

	/* Compare Product filter error message Border Size setting */

	$wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_border_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_border_size', array(
		'label'     		=> __( 'Error message box border size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_filter_errormsg_border_size',
		'type'              => 'text',
		'active_callback'	=> 'hongo_compare_product_filter_errormsg_enable_border',
	) ) );

	/* End Compare Product filter error message Border Size setting */

	/* Compare Product filter error message Border Type setting */

    $wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_border_type', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_border_type', array(
		'label'     		=> __( 'Error message box border type', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_filter_errormsg_border_type',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'hongo-addons' ),
								    'dashed'	=> esc_html__( 'Dashed', 'hongo-addons' ),
								    'solid'		=> esc_html__( 'Solid', 'hongo-addons' ),
								    'double'	=> esc_html__( 'Double', 'hongo-addons' ),
								   ),
		'active_callback'	=> 'hongo_compare_product_filter_errormsg_enable_border',
	) ) );

	/* End Compare Product filter error message Border Type setting */

	/* Compare Product filter error message Border Color */

	$wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_border_color', array(
	    'label'     		=> __( 'Error message box border color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_filter_errormsg_border_color',
		'active_callback'	=> 'hongo_compare_product_filter_errormsg_enable_border',
	) ) );

	/* End Compare Product filter error message Border Color */

	/* Compare Product filter error message Border Radius setting */

	$wp_customize->add_setting( 'hongo_compare_product_filter_errormsg_border_radius', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_filter_errormsg_border_radius', array(
		'label'     		=> __( 'Error message box border radius', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_filter_errormsg_border_radius',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define error message border radius like 12px', 'hongo-addons' ),
		'active_callback'	=> 'hongo_compare_product_filter_errormsg_enable_border',
	) ) );

	/* End Compare Product filter error message Border Radius setting */

	/* Compare Product Label Separator setting */

	$wp_customize->add_setting( 'hongo_compare_label_product_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_label_product_typography', array(
	    'label'     		=> __( 'Label typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_label_product_typography',
	) ) );

	/* End Compare Product Label Separator setting */

	/* Compare Product Label Font size */

    $wp_customize->add_setting( 'hongo_compare_product_label_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_label_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_label_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Label Font size */

	/* Compare Product Label Line height */

    $wp_customize->add_setting( 'hongo_compare_product_label_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_label_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_label_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Label Line height */

	/* Compare Product Label Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_label_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_label_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_label_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Label Letter spacing */

	/* Compare Product Label Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_label_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_label_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_label_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Compare Product Label Font weight */

	/* Compare Product label Text Transform */

	$wp_customize->add_setting( 'hongo_compare_product_label_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_label_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_label_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Compare Product label Text Transform */

	/* Compare Product Label Color */

	$wp_customize->add_setting( 'hongo_compare_product_label_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_label_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_label_color',
	) ) );

	/* End Compare Product Label Color */

	/* Compare Product Title Separator setting */

	$wp_customize->add_setting( 'hongo_compare_title_product_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_title_product_typography', array(
	    'label'     		=> __( 'Title typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_title_product_typography',
	) ) );

	/* End Compare Product Title Separator setting */

	/* Compare Product Title Font size */

    $wp_customize->add_setting( 'hongo_compare_product_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_title_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_title_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Title Font size */

	/* Compare Product Title Line height */

    $wp_customize->add_setting( 'hongo_compare_product_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_title_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_title_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Title Line height */

	/* Compare Product Title Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_title_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_title_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Title Letter spacing */

	/* Compare Product Title Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_title_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Compare Product Title Font weight */

	/* Compare Product Title Text Transform */

	$wp_customize->add_setting( 'hongo_compare_product_title_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_title_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Compare Product Title Text Transform */

	/* Compare Product Title Color */

	$wp_customize->add_setting( 'hongo_compare_product_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_title_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_title_color',
	) ) );

	/* End Compare Product Title Color */

	/* Compare Product Title Hover Color */

	$wp_customize->add_setting( 'hongo_compare_product_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_title_hover_color', array(
	    'label'     		=> __( 'Hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_title_hover_color',
	) ) );

	/* End Compare Product Title Hover Color */

	/* Compare Product Typography Separator setting */

	$wp_customize->add_setting( 'hongo_compare_product_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_product_typography', array(
	    'label'     		=> __( 'Main content typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_product_typography',
	) ) );

	/* End Compare Product Typography Separator setting */

	/* Compare Product Font size */

    $wp_customize->add_setting( 'hongo_compare_product_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Font size */

	/* Compare Product Line height */

    $wp_customize->add_setting( 'hongo_compare_product_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Line height */

	/* Compare Product Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Letter spacing */

	/* Compare Product Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Compare Product Font weight */

	/* Compare Product Color */

	$wp_customize->add_setting( 'hongo_compare_product_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_color',
	) ) );

	/* End Compare Product Color */

	/* Compare Product Link Hover Color */

	$wp_customize->add_setting( 'hongo_compare_product_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_link_hover_color', array(
	    'label'     		=> __( 'Link hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_link_hover_color',
	) ) );

	/* End Compare Product Link Hover Color */

	/* Compare Product First background Color */

	$wp_customize->add_setting( 'hongo_compare_product_primary_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_primary_bg_color', array(
	    'label'     		=> __( 'Primary background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_primary_bg_color',
	) ) );

	/* End Compare Product First background Color */

	/* Compare Product Second background Color */

	$wp_customize->add_setting( 'hongo_compare_product_secondary_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_secondary_bg_color', array(
	    'label'     		=> __( 'Secondary background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_secondary_bg_color',
	) ) );

	/* End Compare Product Second background Color */

	/* Product Compare Button Separator setting */

	$wp_customize->add_setting( 'hongo_compare_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_product_price_typography', array(
	    'label'     		=> __( 'Price typography', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_product_price_typography',
	) ) );

	/* End Product Compare Button Separator setting */


	/* Compare Product Price Font size */

    $wp_customize->add_setting( 'hongo_compare_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_price_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_price_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Price Font size */

	/* Compare Product Price Line height */

    $wp_customize->add_setting( 'hongo_compare_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_price_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_price_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Price Line height */

	/* Compare Product Price Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_price_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_price_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_price_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Price Letter spacing */

	/* Compare Product Price Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_price_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_price_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Compare Product Price Font weight */

	/* Compare Product Price Color */

	$wp_customize->add_setting( 'hongo_compare_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_price_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_price_color',
	) ) );

	/* End Compare Product Price Color */

	/* Compare Product Regular Price Color */

	$wp_customize->add_setting( 'hongo_compare_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_regular_price_color', array(
	    'label'     		=> __( 'Regular price color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_regular_price_color',
	) ) );

	/* End Compare Product Regular Price Color */

	/* Product Compare Button Separator setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_compare_product_button_typography', array(
	    'label'     		=> __( 'Button typography and colors', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'   		=> 'hongo_compare_product_button_typography',
	) ) );

	/* End Product Compare Button Separator setting */

	/* Compare Product Button Font size */

    $wp_customize->add_setting( 'hongo_compare_product_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_button_font_size', array(
		'label'     		=> __( 'Font size', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_button_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'hongo-addons' ),
	) ) );

	/* End Compare Product Button Font size */

	/* Compare Product Button Line height */

    $wp_customize->add_setting( 'hongo_compare_product_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_button_line_height', array(
		'label'     		=> __( 'Line height', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_button_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Compare Product Button Line height */

	/* Compare Product Button Letter spacing */

    $wp_customize->add_setting( 'hongo_compare_product_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_button_letter_spacing', array(
		'label'     		=> __( 'Letter spacing', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_button_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'hongo-addons' ),

	) ) );

	/* End Compare Product Button Letter spacing */

	/* Compare Product Button Font weight */

    $wp_customize->add_setting( 'hongo_compare_product_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_button_font_weight', array(
		'label'     		=> __( 'Font weight', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,

	) ) );

	/* End Compare Product Button Font weight */

	/* Compare Product Button Text Transform */

    $wp_customize->add_setting( 'hongo_compare_product_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_compare_product_button_text_transform', array(
		'label'     		=> __( 'Text case', 'hongo-addons' ),
		'section'     		=> 'hongo_add_product_compare_panel',
		'settings'			=> 'hongo_compare_product_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select', 'hongo-addons' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo-addons' ),
								    'lowercase' 	=> esc_html__( 'Lowercase', 'hongo-addons' ),
								    'capitalize' 	=> esc_html__( 'Capitalize', 'hongo-addons' ),
								    'none' 	=> esc_html__( 'None', 'hongo-addons' ),
								),    

	) ) );

	/* End Compare Product Button Text Transform */

	/* Product Compare Button color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_color', array(
	    'label'     		=> __( 'Color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_color',
	) ) );

	/* End Product Compare Button color setting */

	/* Product Compare Button BG color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_bg_color', array(
	    'label'     		=> __( 'Background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_bg_color',
	) ) );

	/* End Product Compare Button BG color setting */

	/* Product Compare Button Border color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_border_color', array(
	    'label'     		=> __( 'Border color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_border_color',
	) ) );

	/* End Product Compare Button Border color setting */

	/* Product Compare Button Border Hover color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_border_hover_color', array(
	    'label'     		=> __( 'Border hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_border_hover_color',
	) ) );

	/* End Product Compare Button Border Hover color setting */

	/* Product Compare Button Hover color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_hover_color', array(
	    'label'     		=> __( 'Hover color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_hover_color',
	) ) );

	/* End Product Compare Button Hover color setting */

	/* Product Compare Button Hover BG color setting */

	$wp_customize->add_setting( 'hongo_compare_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_compare_product_button_hover_bg_color', array(
	    'label'     		=> __( 'Hover background color', 'hongo-addons' ),
	    'section'    		=> 'hongo_add_product_compare_panel',
	    'settings'	 		=> 'hongo_compare_product_button_hover_bg_color',
	) ) );

	/* End Product Compare Button Hover BG color setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_compare_product_heading_callback' ) ) :
	   	function hongo_compare_product_heading_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_compare_product_enable_heading' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if( ! function_exists( 'hongo_compare_product_filter_callback' ) ) :
		function hongo_compare_product_filter_callback( $control ) {
			if ( $control->manager->get_setting( 'hongo_compare_product_enable_filter' )->value() == 1 ) {
				return true;
		    } else {
		    	return false;
		    }	
		}
	endif;

	if( ! function_exists( 'hongo_compare_product_filter_errormsg_enable_border' ) ) :
		function hongo_compare_product_filter_errormsg_enable_border( $control ) { 
			if ( $control->manager->get_setting( 'hongo_compare_product_filter_errormsg_enable_border' )->value() == 1 && $control->manager->get_setting( 'hongo_compare_product_enable_filter' )->value() == 1 )  {
		    	return true;
		    } else {
		    	return false;
		    }

		}
	endif;

	if ( ! function_exists( 'hongo_compare_product_mix_callback' ) ) :
		function hongo_compare_product_mix_callback( $control ) {
			if ( $control->manager->get_setting( 'hongo_compare_product_enable_heading' )->value() == 1 || $control->manager->get_setting( 'hongo_compare_product_enable_filter' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */
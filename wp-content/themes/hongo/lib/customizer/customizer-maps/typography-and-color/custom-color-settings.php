<?php
	
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_body_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_body_setting_separator', array(
	    'label'				=> __( 'Font size and line height', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'   		=> 'hongo_body_setting_separator',
	) ) );

	/* End Separator Settings */

	/* Body font size setting */

	$wp_customize->add_setting( 'hongo_body_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_body_font_size', array(
	    'label'				=> __( 'Body font size', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_body_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 14px.', 'hongo' ),
	) );

	/* End Body font size setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_body_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_body_font_line_height', array(
	    'label'				=> __( 'Body font line height', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_body_font_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_body_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_body_font_letter_spacing', array(
	    'label'				=> __( 'Body font character spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_body_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font letter spacing like 24px.', 'hongo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Content font size setting */

	$wp_customize->add_setting( 'hongo_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_content_font_size', array(
	    'label'				=> __( 'Content font size', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_content_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 12px.', 'hongo' ),
	) );

	/* End Content font size setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_content_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_content_font_line_height', array(
	    'label'				=> __( 'Content font line height', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_content_font_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_content_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_content_font_letter_spacing', array(
	    'label'				=> __( 'Content font character spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_general_color_section',
	    'settings'	 		=> 'hongo_content_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font letter spacing like 24px.', 'hongo' ),
	) );

	/* End Body Font Line Height Setting */

	/*
	 * For Content Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_general_content_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_content_setting_separator', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_content_color_section',
	    'settings'   		=> 'hongo_general_content_setting_separator',
	) ) );

	/* End Separator Settings */

	/* Body Background Color Setting */

	$wp_customize->add_setting( 'hongo_body_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_body_background_color', array(
	    'label'				=> __( 'Body background', 'hongo' ),
	    'section'    		=> 'hongo_add_content_color_section',
	    'settings'	 		=> 'hongo_body_background_color',
	) ) );

	/* End Body Background Color Setting */

	/* Body Text Color Setting */

	$wp_customize->add_setting( 'hongo_body_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_body_text_color', array(
	    'label'				=> __( 'Body text', 'hongo' ),
	    'section'    		=> 'hongo_add_content_color_section',
	    'settings'	 		=> 'hongo_body_text_color',
	) ) );

	/* End Body Text Color Setting */

	/* Content Link Color Setting */

	$wp_customize->add_setting( 'hongo_content_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_content_link_color', array(
	    'label'				=> __( 'Link', 'hongo' ),
	    'section'    		=> 'hongo_add_content_color_section',
	    'settings'	 		=> 'hongo_content_link_color',
	) ) );

	/* End Content Link Color Setting */

	/* Content Link Hover Color Setting */

	$wp_customize->add_setting( 'hongo_content_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_content_link_hover_color', array(
	    'label'				=> __( 'Link hover', 'hongo' ),
	    'section'    		=> 'hongo_add_content_color_section',
	    'settings'	 		=> 'hongo_content_link_hover_color',
	) ) );

	/* End Content Link Hover Color Setting */

<?php
	
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_comment_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_comment_setting_separator', array(
	    'label'				=> __( 'Comment Font & Color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_comment_color_section',
	    'settings'   		=> 'hongo_comment_setting_separator',
	) ) );

	/* End Separator Settings */

	/* Comment Title */

    $wp_customize->add_setting( 'hongo_comment_title', array(
		'default' 			=> esc_html__( 'Write a comment', 'hongo' ),
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_comment_title', array(
		'label'				=> __( 'Comment title', 'hongo' ),
		'section'     		=> 'hongo_add_comment_color_section',
		'settings'			=> 'hongo_comment_title',
		'type'              => 'text',
	) ) );

	/* End Comment Title */

	/* Comment font size setting */

	$wp_customize->add_setting( 'hongo_comment_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_comment_title_font_size', array(
	    'label'				=> __( 'Font size', 'hongo' ),
	    'section'    		=> 'hongo_add_comment_color_section',
	    'settings'	 		=> 'hongo_comment_title_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 14px.', 'hongo' ),
	) );

	/* End Comment font size setting */

	/* Comment Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_comment_title_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_comment_title_font_line_height', array(
	    'label'				=> __( 'Line height', 'hongo' ),
	    'section'    		=> 'hongo_add_comment_color_section',
	    'settings'	 		=> 'hongo_comment_title_font_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
	) );

	/* End Comment Font Line Height Setting */

	/* Comment Font Letter Spacing Setting */

	$wp_customize->add_setting( 'hongo_comment_title_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_comment_title_font_letter_spacing', array(
	    'label'				=> __( 'Letter spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_comment_color_section',
	    'settings'	 		=> 'hongo_comment_title_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font letter spacing like 24px.', 'hongo' ),
	) );

	/* End Comment Font Letter Spacing Setting */

	/* Comment Title Color Setting */

	$wp_customize->add_setting( 'hongo_general_comment_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_general_comment_title_color', array(
	    'label'				=> __( 'Comment title', 'hongo' ),
	    'section'    		=> 'hongo_add_comment_color_section',
	    'settings'	 		=> 'hongo_general_comment_title_color',
	) ) );

	/* End Comment Title Color Setting */

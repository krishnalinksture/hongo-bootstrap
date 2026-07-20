<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; } 

	/* Addtional JS */


	global $wp_version;

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_additional_js_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_additional_js_separator', array(
	    'label'      		=> __( 'Additional JS', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_custom_js',
	    'settings'   		=> 'hongo_additional_js_separator',
	) ) );

	/* End Separator Settings */
	
	if ( $wp_version < '4.9.0' ) {

		$wp_customize->add_setting( 'hongo_custom_js', array(
		    'type' => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_html', array(
		    'label'     => __( 'Additional JS', 'hongo-addons' ),
		    'type'      => 'textarea',
		    'settings'  => 'hongo_custom_js',
		    'section'   => 'hongo_custom_js',
		    'description' => esc_html__( 'Only accepts javascript code without <script> tags.', 'hongo-addons' )
		) ) );
	
	} else {

		$wp_customize->add_setting( 'hongo_custom_js', array(
		    'type' => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'custom_html', array(
		    'label'     => __( 'Additional JS', 'hongo-addons' ),
		    'code_type' => 'javascript',
		    'settings'  => 'hongo_custom_js',
		    'section'   => 'hongo_custom_js',
		    'description' => esc_html__( 'Only accepts javascript code without <script> tags.', 'hongo-addons' )
		) ) );
	}

	/* End Addtional Js */
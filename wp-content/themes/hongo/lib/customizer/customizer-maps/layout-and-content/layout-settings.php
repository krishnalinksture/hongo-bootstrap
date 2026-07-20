<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/*
	 * Page layout setting panel.
	 */
	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_page_separator', array(
		'default'			=> '',
		'sanitize_callback'	=> 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_page_separator', array(
	    'label'				=> __( 'Layout and Container', 'hongo' ),
	    'type'				=> 'hongo_separator',
	    'section'			=> 'hongo_add_page_layout_panel',
	    'settings'			=> 'hongo_single_page_separator',
	) ) );

	/* End Separator Settings */

	/* Page General Layout */

	$wp_customize->add_setting( 'hongo_page_layout_setting', array(
		'default' 			=> 'hongo_layout_no_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_page_layout_setting', array(
		'label'				=> __( 'Layout style', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_layout_setting',
		'type'				=> 'hongo_preview_image',
		'choices'			=> array(
										'hongo_layout_no_sidebar'	=> __( 'No sidebar', 'hongo' ),
										'hongo_layout_left_sidebar'	=> __( 'Left sidebar', 'hongo' ),
										'hongo_layout_right_sidebar'=> __( 'Right sidebar', 'hongo' ),
										'hongo_layout_both_sidebar'	=> __( 'Both sidebar', 'hongo' ),
									),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/1col.png',
									HONGO_THEME_IMAGES_URI . '/2cl.png',
									HONGO_THEME_IMAGES_URI . '/2cr.png',
									HONGO_THEME_IMAGES_URI . '/3cm.png',
								),
		'hongo_columns'		=> '4',
	) ) );

	/* End Page General Layout */

	/* Page Left Sidebar */

	$wp_customize->add_setting( 'hongo_page_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_left_sidebar', array(
		'label'				=> __( 'Left sidebar', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_left_sidebar',
		'type'				=> 'select',
		'choices'			=> $hongo_sidebar_array,
		'active_callback'	=> 'hongo_page_left_sidebar_layout_callback',
	) ) );

	/* End Page Left Sidebar */

	/* Page Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_page_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_right_sidebar', array(
		'label'				=> __( 'Right sidebar', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_right_sidebar',
		'type'				=> 'select',
		'choices'			=> $hongo_sidebar_array,
		'active_callback'	=> 'hongo_page_right_sidebar_layout_callback',
	) ) );

	/* End Page Right Sidebar */

	/* Page Container Setting */

	$wp_customize->add_setting( 'hongo_page_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_container_style', array(
		'label'				=> __( 'Container style', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_container_style',
		'type'				=> 'select',
		'choices'			=> array(
									'container'						=> esc_html__( 'Fixed', 'hongo' ),
									'container-fluid' 				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding'	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
								),
	) ) );

	/* End Page Container Setting */

	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_page_container_fluid_with_padding', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_container_fluid_with_padding', array(
		'label'				=> __( 'Full width padding', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_container_fluid_with_padding',
		'type'				=> 'text',
		'active_callback'	=> 'hongo_page_container_fluid_with_padding_callback'
	) ) );

	if ( ! function_exists( 'hongo_page_container_fluid_with_padding_callback' ) ) {
		function hongo_page_container_fluid_with_padding_callback( $control )	{
		if ( $control->manager->get_setting( 'hongo_page_container_style' )->value() == 'container-fluid-with-padding' ) {
				return true;
			} else {
				return false;
			}
		}
	}

		/* Rich Snippet */

	$wp_customize->add_setting( 'hongo_page_rich_snippet', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_rich_snippet', array(
		'label'				=> __( 'Rich Snippet', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_page_rich_snippet',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Rich Snippet */
	
	/* End Container custom Width setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_page_comment_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_page_comment_separator', array(
	    'label'				=> __( 'Comments', 'hongo' ),
	    'type'				=> 'hongo_separator',
	    'section'			=> 'hongo_add_page_layout_panel',
	    'settings'			=> 'hongo_single_page_comment_separator',
	) ) );

	/* End Separator Settings */

	/* Hide Comment */

	$wp_customize->add_setting( 'hongo_hide_page_comment', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_hide_page_comment', array(
		'label'				=> __( 'Comments', 'hongo' ),
		'section'			=> 'hongo_add_page_layout_panel',
		'settings'			=> 'hongo_hide_page_comment',
		'type'				=> 'hongo_switch',
		'choices'			=> array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
								),
		'description'		=> __( '( If page comment is off in WordPress then it cannot be switched on here. )', 'hongo' ),
	) ) );

	/* End Hide Comment */


	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_page_left_sidebar_layout_callback' ) ) {
		function hongo_page_left_sidebar_layout_callback( $control ) {
			if ( $control->manager->get_setting( 'hongo_page_layout_setting' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_page_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
				return true;
			} else {
				return false;
			}
		}
	}

	if ( ! function_exists( 'hongo_page_right_sidebar_layout_callback' ) ) {
		function hongo_page_right_sidebar_layout_callback( $control ) {
		if ( $control->manager->get_setting( 'hongo_page_layout_setting' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_page_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
				return true;
			} else {
				return false;
			}
		}
	}

	/* End Custom Callback Functions */

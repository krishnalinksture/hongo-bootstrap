<?php
	
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Sidebar List. */
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_general_header_logo_separator', array(
		'default'			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_header_logo_separator', array(
	    'label'				=> __( 'Logo', 'hongo' ),
	    'type'				=> 'hongo_separator',
	    'section'			=> 'hongo_add_logo_favicon_panel',
	    'settings'			=> 'hongo_general_header_logo_separator',
	) ) );

	/* End Separator Settings */

	/* Enable Logo */

    $wp_customize->add_setting( 'hongo_enable_header_logo', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_logo', array(
		'label'				=> __( 'Logo', 'hongo' ),
		'section'			=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_enable_header_logo',
		'type'				=> 'hongo_switch',
		'choices'			=>	array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Enable Header */

	/* Logo */

    $wp_customize->add_setting( 'hongo_logo', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_logo', array(
		'label'				=> __( 'Logo', 'hongo' ),
		'description'		=> __( 'Upload the logo image which will be displayed in the website header.', 'hongo' ),
		'section'     		=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_logo',
	) ) );

	/* End Logo */

	/* Light Logo */

    $wp_customize->add_setting( 'hongo_logo_light', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_logo_light', array(
		'label'				=> __( 'Sticky logo', 'hongo' ),
		'description'		=> __( 'Upload the logo image which will be displayed in the scrolled / sticky header version.', 'hongo' ),
		'section'			=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_logo_light',
	) ) );

	/* End Light Logo */

    /* Logo Retina */

    $wp_customize->add_setting( 'hongo_logo_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_logo_ratina', array(
		'label'				=> __( 'Retina logo', 'hongo' ),
		'description'       => __( 'Upload the double size logo image which will be displayed in the website header of retina devices.', 'hongo' ),
		'section'     		=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_logo_ratina',
	) ) );

	/* End Logo Ratina */

	/* Light Logo Retina */

    $wp_customize->add_setting( 'hongo_logo_light_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_logo_light_ratina', array(
		'label'				=> __( 'Sticky retina logo', 'hongo' ),
		'description'		=> __( 'Upload the logo image which will be displayed in the scrolled / sticky header version of retina devices.', 'hongo' ),
		'section'			=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_logo_light_ratina',
	) ) );

	/* End Light Logo Ratina */

	/* SVG Width*/

	$wp_customize->add_setting( 'hongo_header_svg_width', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_svg_width', array(
		'label'				=> __( 'SVG width', 'hongo' ),
		'section'			=> 'hongo_add_logo_favicon_panel',
		'settings'			=> 'hongo_header_svg_width',
		'type'				=> 'text',
		'description'		=> __( 'Add font size like 32px. Custom Image max width.', 'hongo' ),
	) ) );

	/* SVG Width*/

	/* Site Icon Separator Settings */
	
	$wp_customize->add_setting( 'hongo_favicon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_favicon_separator', array(
	    'label'				=> __( 'Site / Favicon icon', 'hongo' ),
	    'type'				=> 'hongo_separator',
	    'description'		=> __( 'This icon will be used as a browser favicon and app icon for your website. Icon must be square, and at least 512 pixels wide and tall.', 'hongo' ),
	    'section'			=> 'hongo_add_logo_favicon_panel',
	    'settings'			=> 'hongo_favicon_separator',
	) ) );

	/* End Site Icon Separator Settings */

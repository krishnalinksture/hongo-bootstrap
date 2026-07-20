<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Header Section List. */
	$hongo_header_section_data = hongo_addons_get_builder_section_data( 'header' );
	$hongo_general_header_section_data = hongo_addons_get_builder_section_data( 'header', false, true );

	/* Get All Register Header Top Section List. */
	$hongo_header_top_section_data = hongo_addons_get_builder_section_data( 'top-header' );
	$hongo_general_header_top_section_data = hongo_addons_get_builder_section_data( 'top-header', false, true );

	/* Separator Header General Settings */

	$wp_customize->add_setting( 'hongo_general_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_general_header_separator', array(
	    'label'     		=> __( 'General', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_general_header_separator',	    
	) ) );

	/* End Separator Header General Settings */

 	/* Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Enable Header */

	/* Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section',
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'choices'           => $hongo_header_top_section_data,
	) ) );

	/* End Header Top Section */

	/* Header Section */

    $wp_customize->add_setting( 'hongo_header_section', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section',
		'choices'           => $hongo_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
	) ) );

	/* End Header Section */

	/* Select Header Type */

    $wp_customize->add_setting( 'hongo_header_type', array(
		'default' 			=> 'headertype1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type',
		'type'              => 'radio',
		'choices'           => array(			
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
	) ) );

	/* End Select Header Type */

	/* Page Header Separator Settings */

	$wp_customize->add_setting( 'hongo_page_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_header_separator', array(
	    'label'     		=> __( 'Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_page_header_separator',
	) ) );

	/* End Page Header Separator Settings */

	/* Page Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_single_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_single_page', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Page Enable General Header */

	/* Page Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_single_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_single_page', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_single_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_page_header_enable_callback',
	) ) );

	/* End Page Enable Header */

	/* Page Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_single_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_single_page', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_single_page',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_page_header_enable_callback',
	) ) );

	/* End Page Header Top Section */

	/* Page Header Section */

    $wp_customize->add_setting( 'hongo_header_section_single_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_single_page', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_single_page',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_page_header_enable_callback',
	) ) );

	/* End Page Header Section */

	/* Select Page Header Type */

    $wp_customize->add_setting( 'hongo_header_type_single_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_single_page', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_single_page',
		'type'              => 'radio',
		'choices'           => array(									
								    '' 				=> esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' 	=> esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' 	=> esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_page_header_enable_callback',
	) ) );

	/* End Select Page Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_page_header_enable_callback' ) ) {
        function hongo_page_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_single_page' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_post_single_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_post_single_header_separator', array(
	    'label'     		=> __( 'Post Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_post_single_header_separator',
	) ) );

	/* End Separator Settings */

	/* Single Post Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_single_post', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_single_post', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Single Post Enable General Header */

	/* Post Single Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_single_post', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_single_post', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_single_post',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_post_single_header_enable_callback',
	) ) );

	/* End Post Single Enable Header */

	/* Post Single Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_single_post', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_single_post', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_single_post',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_post_single_header_enable_callback',
	) ) );

	/* End Post Single Header Top Section */

	/* Post Single Header Section */

    $wp_customize->add_setting( 'hongo_header_section_single_post', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_single_post', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_single_post',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_post_single_header_enable_callback',
	) ) );

	/* End Post Single Header Section */

	/* Select Post Single Header Type */

    $wp_customize->add_setting( 'hongo_header_type_single_post', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_single_post', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_single_post',
		'type'              => 'radio',
		'choices'           => array(
									'' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_post_single_header_enable_callback',
	) ) );

	/* End Select Post Single Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_post_single_header_enable_callback' ) ) {
        function hongo_post_single_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_single_post' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_post_archive_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_post_archive_header_separator', array(
	    'label'     		=> __( 'Post Archive', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_post_archive_header_separator',
	) ) );

	/* End Separator Settings */

	/* Post Archive Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_archive', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Post Archive Enable General Header */

	/* Post Archive Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_archive', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_post_archive_header_enable_callback',
	) ) );

	/* End Post Archive Enable Header */

	/* Post Archive Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_archive', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_archive',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_post_archive_header_enable_callback',
	) ) );

	/* End Post Archive Header Top Section */

	/* Post Archive Header Section */

    $wp_customize->add_setting( 'hongo_header_section_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_archive', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_archive',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_post_archive_header_enable_callback',
	) ) );

	/* End Post Archive Header Section */

	/* Select Post Archive Header Type */

    $wp_customize->add_setting( 'hongo_header_type_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_archive', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_archive',
		'type'              => 'radio',
		'choices'           => array(									
								    '' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_post_archive_header_enable_callback',
	) ) );

	/* End Select Post Archive Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_post_archive_header_enable_callback' ) ) {
        function hongo_post_archive_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_archive' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_post_default_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_post_default_header_separator', array(
	    'label'     		=> __( 'Default Posts / Blog Home', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_post_default_header_separator',
	) ) );

	/* End Separator Settings */

	/* Post Default Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_default', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Post Default Enable General Header */

	/* Post Default Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_default', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_default',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_post_default_header_enable_callback',
	) ) );

	/* End Post Default Enable Header */

	/* Post Default Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_default', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_default',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_post_default_header_enable_callback',
	) ) );

	/* End Post Default Header Top Section */

	/* Post Default Header Section */

    $wp_customize->add_setting( 'hongo_header_section_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_default', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_default',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_post_default_header_enable_callback',
	) ) );

	/* End Post Default Header Section */

	/* Select Post Default Header Type */

    $wp_customize->add_setting( 'hongo_header_type_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_default', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_default',
		'type'              => 'radio',
		'choices'           => array(
								    '' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_post_default_header_enable_callback',
	) ) );

	/* End Select Post Default Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_post_default_header_enable_callback' ) ) {
        function hongo_post_default_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_default' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_product_single_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_single_header_separator', array(
	    'label'     		=> __( 'Product Single', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_product_single_header_separator',
	) ) );

	/* End Separator Settings */

	/* Single Product Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_single_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_single_product', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Single Product Enable General Header */

	/* Single Product Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_single_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_single_product', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_single_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_product_single_header_enable_callback',
	) ) );

	/* End Single Product Enable Header */

	/* Single Product Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_single_product', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_single_product', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_single_product',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_product_single_header_enable_callback',
	) ) );

	/* End Single Product Header Top Section */

	/* Single Product Header Section */

    $wp_customize->add_setting( 'hongo_header_section_single_product', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_single_product', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_single_product',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_product_single_header_enable_callback',
	) ) );

	/* End Single Product Header Section */

	/* Select Single Product Header Type */

    $wp_customize->add_setting( 'hongo_header_type_single_product', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_single_product', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_single_product',
		'type'              => 'radio',
		'choices'           => array(
								    '' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_product_single_header_enable_callback',
	) ) );

	/* End Select Single Product Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_product_single_header_enable_callback' ) ) {
        function hongo_product_single_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_single_product' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_product_archive_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_archive_header_separator', array(
	    'label'     		=> __( 'Product Archive / Shop', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_product_archive_header_separator',
	) ) );

	/* End Separator Settings */

	/* Product Archive Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_product_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_product_archive', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End Product Archive Enable General Header */

	/* Product Archive Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_product_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_product_archive', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_product_archive',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_product_archive_header_enable_callback',
	) ) );

	/* End Product Archive Enable Header */

	/* Product Archive Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_product_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_product_archive', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_product_archive',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_product_archive_header_enable_callback',
	) ) );

	/* End Product Archive Header Top Section */

	/* Product Archive Header Section */

    $wp_customize->add_setting( 'hongo_header_section_product_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_product_archive', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_product_archive',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_product_archive_header_enable_callback',
	) ) );

	/* End Product Archive Header Section */

	/* Select Product Archive Header Type */

    $wp_customize->add_setting( 'hongo_header_type_product_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_product_archive', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_product_archive',
		'type'              => 'radio',
		'choices'           => array(
								    '' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_product_archive_header_enable_callback',
	) ) );

	/* End Select Product Archive Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_product_archive_header_enable_callback' ) ) {
        function hongo_product_archive_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_product_archive' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_404_page_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_404_page_header_separator', array(
	    'label'     		=> __( '404 Page', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_header_section',
	    'settings'   		=> 'hongo_404_page_header_separator',
	) ) );

	/* End Separator Settings */

	/* 404 Page Enable General Header */

    $wp_customize->add_setting( 'hongo_enable_header_general_404_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_general_404_page', array(
		'label'     		=> __( 'General header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_general_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
	) ) );

	/* End 404 Page Enable General Header */

	/* 404 Page Enable Header */

    $wp_customize->add_setting( 'hongo_enable_header_404_page', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_header_404_page', array(
		'label'     		=> __( 'Header', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_enable_header_404_page',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'active_callback' 	=> 'hongo_404_page_header_enable_callback',
	) ) );

	/* End 404 Page Enable Header */

	/* 404 Page Header Top Section */

    $wp_customize->add_setting( 'hongo_header_top_section_404_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_top_section_404_page', array(
		'label'     		=> __( 'Header top section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_top_section_404_page',
		'choices'           => $hongo_general_header_top_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=top-header' ) ),
		'active_callback' 	=> 'hongo_404_page_header_enable_callback',
	) ) );

	/* End 404 Page Header Top Section */

	/* 404 Page Header Section */

    $wp_customize->add_setting( 'hongo_header_section_404_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_section_404_page', array(
		'label'     		=> __( 'Header section', 'hongo-addons' ),
		'type'              => 'select',
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_section_404_page',
		'choices'           => $hongo_general_header_section_data,
		'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage header in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=header' ) ),
		'active_callback' 	=> 'hongo_404_page_header_enable_callback',
	) ) );

	/* End 404 Page Header Section */

	/* Select 404 Page Header Type */

    $wp_customize->add_setting( 'hongo_header_type_404_page', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_header_type_404_page', array(
		'label'     		=> __( 'Header style', 'hongo-addons' ),
		'section'     		=> 'hongo_add_header_section',
		'settings'			=> 'hongo_header_type_404_page',
		'type'              => 'radio',
		'choices'           => array(
								    '' => esc_html__( 'General', 'hongo-addons' ),
								    'headertype1' => esc_html__( 'Standard', 'hongo-addons' ),
								    'headertype2' => esc_html__( 'Left Menu', 'hongo-addons' ),
							       ),
		'active_callback' 	=> 'hongo_404_page_header_enable_callback',
	) ) );

	/* End Select 404 Page Header Type */

	// Header enable callback
	if ( ! function_exists( 'hongo_404_page_header_enable_callback' ) ) {
        function hongo_404_page_header_enable_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_header_general_404_page' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
	}
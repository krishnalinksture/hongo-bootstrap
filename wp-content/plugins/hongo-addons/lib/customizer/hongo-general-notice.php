<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Header and footer start */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_mini_header_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_mini_header_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_mini_header_section',
	    'settings'          => 'hongo_mini_header_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_header_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_header_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_header_section',
	    'settings'          => 'hongo_general_header_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_footer_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_footer_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_footer_section',
	    'settings'          => 'hongo_general_footer_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

/* Header and footer end */

/* Logo and Favicon start */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_header_logo_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_header_logo_notice', array(
	    'label'             => __( 'If below logo images do not affect in your page then make sure to change / remove it from the header (built using Section Builder) and', 'hongo-addons' ) . ' <a href="#" target="_blank">' . __( 'assigned here', 'hongo-addons' ) . '</a> ' . __( 'or at page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_logo_favicon_panel',
	    'settings'          => 'hongo_general_header_logo_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

/* Logo and Favicon end */

/* Title Wrapper start */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_page_title_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_page_title_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_page_title_section',
	    'settings'          => 'hongo_general_page_title_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_single_post_title_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_single_post_title_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your post then make sure to change it to default / remove that setting in post level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_single_post_title_section',
	    'settings'          => 'hongo_general_single_post_title_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_general_single_product_title_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_general_single_product_title_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your product then make sure to change it to default / remove that setting in product level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_single_product_title_section',
	    'settings'          => 'hongo_general_single_product_title_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

/* Title Wrapper end */

/* Layout and Content start */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_page_layout_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_page_layout_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_page_layout_panel',
	    'settings'          => 'hongo_page_layout_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_single_post_layout_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_single_post_layout_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your post then make sure to change it to default / remove that setting in post level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_post_layout_panel',
	    'settings'          => 'hongo_single_post_layout_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_box_layout_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_box_layout_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your page then make sure to change it to default / remove that setting in page level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_box_layout_panel',
	    'settings'          => 'hongo_box_layout_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

	/* General Notice */
	$wp_customize->add_setting( 'hongo_single_product_notice', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_attr'       
	) );

	$wp_customize->add_control( new Hongo_Customize_Notice_Control( $wp_customize, 'hongo_single_product_notice', array(
	    'label'             => __( 'If any of the below settings do not affect in your product then make sure to change it to default / remove that setting in product level settings.', 'hongo-addons' ),
	    'type'              => 'hongo_notice',
	    'section'           => 'hongo_add_product_layout_panel',
	    'settings'          => 'hongo_single_product_notice',
	    'priority'	 		=> 1,
	) ) );
	/* End General Notice */

/* Layout and Content end */
<?php
	
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_h1_logo_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h1_logo_separator', array(
        'label'				=> __( 'H1 logo', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h1_logo_separator',     
    ) ) );

    /* End Separator Settings */

    /* H1 in logo in front page setting */

    $wp_customize->add_setting( 'hongo_h1_logo_font_page', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_h1_logo_font_page', array(
        'label'				=> __( 'H1 in logo in front / home page?', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h1_logo_font_page',
        'type'              => 'hongo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'hongo' ),
                                    '0' => __( 'Off', 'hongo' ),
                               ),
    ) ) );

    /* End H1 in logo in front page setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_h1_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h1_setting_separator', array(
	    'label'				=> __( 'H1 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_heading_color_section',
	    'settings'   		=> 'hongo_h1_setting_separator',	    
	) ) );

	/* End Separator Settings */

	/* H1 font size setting */

	$wp_customize->add_setting( 'hongo_h1_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_h1_font_size', array(
	    'label'				=> __( 'H1 font size', 'hongo' ),
	    'section'    		=> 'hongo_add_heading_color_section',
	    'settings'	 		=> 'hongo_h1_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font size like 14px.', 'hongo' ),
	) );

	/* End H1 font size setting */

	/* H1 Font Line Height Setting */

	$wp_customize->add_setting( 'hongo_h1_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_h1_font_line_height', array(
	    'label'				=> __( 'H1 font line height', 'hongo' ),
	    'section'    		=> 'hongo_add_heading_color_section',
	    'settings'	 		=> 'hongo_h1_font_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
	) );

	/* End H1 Font Line Height Setting */

	/* H1 Font Letter Spacing Setting */

	$wp_customize->add_setting( 'hongo_h1_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_h1_font_letter_spacing', array(
	    'label'				=> __( 'H1 font character spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_heading_color_section',
	    'settings'	 		=> 'hongo_h1_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
	) );

	/* End H1 Font Letter Spacing Setting */

	/* H1 Color Setting */

	$wp_customize->add_setting( 'hongo_heading_h1_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h1_color', array(
	    'label'				=> __( 'H1 color', 'hongo' ),
	    'section'    		=> 'hongo_add_heading_color_section',
	    'settings'	 		=> 'hongo_heading_h1_color',
	) ) );

	/* End H1 Color Setting */

	/* Separator Settings */
    $wp_customize->add_setting( 'hongo_h2_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h2_setting_separator', array(
        'label'				=> __( 'H2 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h2_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H2 font size setting */

    $wp_customize->add_setting( 'hongo_h2_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h2_font_size', array(
        'label'				=> __( 'H2 font size', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h2_font_size',
        'type'              => 'text',
        'description'		=> __( 'Add font size like 14px.', 'hongo' ),
    ) );

    /* End H2 font size setting */

    /* H2 Font Line Height Setting */

    $wp_customize->add_setting( 'hongo_h2_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h2_font_line_height', array(
        'label'				=> __( 'H2 font line height', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h2_font_line_height',
        'type'              => 'text',
        'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
    ) );

    /* End H2 Font Line Height Setting */

    /* H2 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'hongo_h2_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h2_font_letter_spacing', array(
        'label'				=> __( 'H2 font character spacing', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h2_font_letter_spacing',
        'type'              => 'text',
        'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
    ) );

    /* End H2 Font Letter Spacing Setting */

    /* H2 Color Setting */

    $wp_customize->add_setting( 'hongo_heading_h2_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h2_color', array(
        'label'				=> __( 'H2 color', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_heading_h2_color',
    ) ) );

    /* End H2 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_h3_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h3_setting_separator', array(
        'label'				=> __( 'H3 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h3_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H3 font size setting */

    $wp_customize->add_setting( 'hongo_h3_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h3_font_size', array(
        'label'				=> __( 'H3 font size', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h3_font_size',
        'type'              => 'text',
        'description'		=> __( 'Add font size like 14px.', 'hongo' ),
    ) );

    /* End H3 font size setting */

    /* H3 Font Line Height Setting */

    $wp_customize->add_setting( 'hongo_h3_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h3_font_line_height', array(
        'label'				=> __( 'H3 font line height', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h3_font_line_height',
        'type'              => 'text',
        'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
    ) );

    /* End H3 Font Line Height Setting */

    /* H3 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'hongo_h3_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h3_font_letter_spacing', array(
        'label'				=> __( 'H3 font character spacing', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h3_font_letter_spacing',
        'type'              => 'text',
        'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
    ) );

    /* End H3 Font Letter Spacing Setting */

    /* H3 Color Setting */

    $wp_customize->add_setting( 'hongo_heading_h3_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h3_color', array(
        'label'				=> __( 'H3 color', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_heading_h3_color',
    ) ) );

    /* End H3 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_h4_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h4_setting_separator', array(
        'label'				=> __( 'H4 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h4_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H4 font size setting */

    $wp_customize->add_setting( 'hongo_h4_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h4_font_size', array(
        'label'				=> __( 'H4 font size', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h4_font_size',
        'type'              => 'text',
        'description'		=> __( 'Add font size like 14px.', 'hongo' ),
    ) );

    /* End H4 font size setting */

    /* H4 Font Line Height Setting */

    $wp_customize->add_setting( 'hongo_h4_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h4_font_line_height', array(
        'label'				=> __( 'H4 font line height', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h4_font_line_height',
        'type'              => 'text',
        'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
    ) );

    /* End H4 Font Line Height Setting */

    /* H4 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'hongo_h4_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h4_font_letter_spacing', array(
        'label'				=> __( 'H4 font character spacing', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h4_font_letter_spacing',
        'type'              => 'text',
        'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
    ) );

    /* End H4 Font Letter Spacing Setting */

    /* H4 Color Setting */

    $wp_customize->add_setting( 'hongo_heading_h4_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h4_color', array(
        'label'				=> __( 'H4 color', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_heading_h4_color',
    ) ) );

    /* End H4 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_h5_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h5_setting_separator', array(
        'label'				=> __( 'H5 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h5_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H5 font size setting */

    $wp_customize->add_setting( 'hongo_h5_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h5_font_size', array(
        'label'				=> __( 'H5 font size', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h5_font_size',
        'type'              => 'text',
        'description'		=> __( 'Add font size like 14px.', 'hongo' ),
    ) );

    /* End H5 font size setting */

    /* H5 Font Line Height Setting */

    $wp_customize->add_setting( 'hongo_h5_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h5_font_line_height', array(
        'label'				=> __( 'H5 font line height', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h5_font_line_height',
        'type'              => 'text',
        'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
    ) );

    /* End H5 Font Line Height Setting */

    /* H5 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'hongo_h5_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h5_font_letter_spacing', array(
        'label'				=> __( 'H5 font character spacing', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h5_font_letter_spacing',
        'type'              => 'text',
        'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
    ) );

    /* End H5 Font Letter Spacing Setting */

    /* H5 Color Setting */

    $wp_customize->add_setting( 'hongo_heading_h5_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h5_color', array(
        'label'				=> __( 'H5 color', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_heading_h5_color',
    ) ) );

    /* End H5 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_h6_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_h6_setting_separator', array(
        'label'				=> __( 'H6 font and color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h6_setting_separator',
    ) ) );

    /* End Separator Settings */

    /* H6 font size setting */

    $wp_customize->add_setting( 'hongo_h6_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h6_font_size', array(
        'label'				=> __( 'H6 font size', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h6_font_size',
        'type'              => 'text',
        'description'		=> __( 'Add font size like 14px.', 'hongo' ),
    ) );

    /* End H6 font size setting */

    /* H6 Font Line Height Setting */

    $wp_customize->add_setting( 'hongo_h6_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h6_font_line_height', array(
        'label'				=> __( 'H6 font line height', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h6_font_line_height',
        'type'              => 'text',
        'description'		=> __( 'Add font line height like 24px.', 'hongo' ),
    ) );

    /* End H6 Font Line Height Setting */

    /* H6 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'hongo_h6_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_h6_font_letter_spacing', array(
        'label'				=> __( 'H6 font character spacing', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_h6_font_letter_spacing',
        'type'              => 'text',
        'description'		=> __( 'Add font letter spacing like 2px.', 'hongo' ),
    ) );

    /* End H6 Font Letter Spacing Setting */

    /* H6 Color Setting */

    $wp_customize->add_setting( 'hongo_heading_h6_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_heading_h6_color', array(
        'label'				=> __( 'H6 color', 'hongo' ),
        'section'           => 'hongo_add_heading_color_section',
        'settings'          => 'hongo_heading_h6_color',
    ) ) );

    /* End H6 Color Setting */

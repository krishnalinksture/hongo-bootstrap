<?php

	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$hongo_googlefonts = hongo_font_list();

    /* Main Font Subsets Separator Settings */
    $wp_customize->add_setting( 'hongo_main_font_subsets_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_main_font_subsets_separator', array(
        'label'				=> __( 'Google Font Languages', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_main_font_subsets_separator',
    ) ) );

    $wp_customize->add_setting( 'hongo_main_font_subsets', array(
        'default'           => array( 'latin-ext' ),
        'sanitize_callback' => 'hongo_sanitize_multiple_checkbox',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Checkbox_Multiple( $wp_customize, 'hongo_main_font_subsets', array(
        'label'				=> __( 'Font languages', 'hongo' ),
        'type'              => 'hongo_checkbox_multiple',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_main_font_subsets',
        'choices'           => array(
                                    'cyrillic'      => __( 'Cyrillic', 'hongo' ),
                                    'cyrillic-ext'  => __( 'Cyrillic Extended', 'hongo' ),
                                    'greek'         => __( 'Greek', 'hongo' ),
                                    'greek-ext'     => __( 'Greek Extended', 'hongo' ),
                                    'latin-ext'     => __( 'Latin Extended', 'hongo' ),
                                    'vietnamese'    => __( 'Vietnamese', 'hongo' ),
                                ),
    ) ) );

	/* Main Font Separator Settings */
	$wp_customize->add_setting( 'hongo_main_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_main_font_setting_separator', array(
	    'label'				=> __( 'Main / Body font', 'hongo' ),
        'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_general_font_family_section',
	    'settings'   		=> 'hongo_main_font_setting_separator',
        'description'	    => __( 'In this section you can overwrite theme default body and additional fonts with your desired Google fonts.', 'hongo' ),
	) ) );

	/* End Main Font Separator Settings */

    $wp_customize->add_setting( 'hongo_enable_main_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_main_font', array(
        'label'				=> __( 'Enable main / body font', 'hongo' ),
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_enable_main_font',
        'type'              => 'hongo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'hongo' ),
                                    '0' => __( 'Off', 'hongo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'hongo_main_font', array(
		'default'			=> 'Source Sans Pro',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Select_Optgroup( $wp_customize, 'hongo_main_font', array(
		'label'				=> __( 'Main / Body font', 'hongo' ),
		'section'			=> 'hongo_add_general_font_family_section',
		'setting'			=> 'hongo_main_font',
		'type'              => 'hongo_select',
		'choices'           => $hongo_googlefonts,
	    'active_callback'  => 'hongo_main_font_callback',
    ) ) );

	$wp_customize->add_setting( 'hongo_main_font_weight', array(
        'default'           => array( '300', '400', '600', '700', '800', '900' ),
        'sanitize_callback' => 'hongo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Checkbox_Multiple( $wp_customize, 'hongo_main_font_weight', array(
        'label'   			=> __( 'Font weight', 'hongo' ),
        'type'              => 'hongo_checkbox_multiple',
        'section' 			=> 'hongo_add_general_font_family_section',
        'settings'			=> 'hongo_main_font_weight',
        'choices'           => $hongo_font_weight,
        'active_callback'  => 'hongo_main_google_font_callback',
    ) ) );

    /* Alt Font Separator Settings */
	$wp_customize->add_setting( 'hongo_alt_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_alt_font_setting_separator', array(
	    'label'				=> __( 'Additional font', 'hongo' ),
        'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_general_font_family_section',
	    'settings'   		=> 'hongo_alt_font_setting_separator',	    
	) ) );

	/* End Alt Font Separator Settings */

    $wp_customize->add_setting( 'hongo_enable_alt_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_alt_font', array(
        'label'				=> __( 'Enable additional font', 'hongo' ),
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_enable_alt_font',
        'type'              => 'hongo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'hongo' ),
                                    '0' => __( 'Off', 'hongo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'hongo_alt_font', array(
		'default'			=> 'Poppins',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Select_Optgroup( $wp_customize, 'hongo_alt_font', array(
		'label'				=> __( 'Additional font', 'hongo' ),
		'section'			=> 'hongo_add_general_font_family_section',
		'setting'			=> 'hongo_alt_font',
		'type'              => 'hongo_select',
		'choices'           => $hongo_googlefonts,
        'active_callback'   => 'hongo_alt_font_callback',
	) ) );

	$wp_customize->add_setting( 'hongo_alt_font_weight', array(
        'default'           => array( '300', '400', '500', '600', '700', '800', '900' ),
        'sanitize_callback' => 'hongo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Checkbox_Multiple( $wp_customize, 'hongo_alt_font_weight', array(
        'label'   			=> __( 'Font weight', 'hongo' ),
        'type'              => 'hongo_checkbox_multiple',
        'section' 			=> 'hongo_add_general_font_family_section',
        'settings'			=> 'hongo_alt_font_weight',
        'choices'           => $hongo_font_weight,
        'active_callback'   => 'hongo_alt_google_font_callback',
    ) ) );

    /* Main Font Display Separator Settings */
    $wp_customize->add_setting( 'hongo_main_font_display_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_main_font_display_separator', array(
        'label'				=> __( 'Google Font Display', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_main_font_display_separator',
        'active_callback'   => 'hongo_google_font_callback'     
    ) ) );

    $wp_customize->add_setting( 'hongo_main_font_display', array(
        'default'           => 'swap',
        'sanitize_callback' => 'esc_attr',
    ) );

    $wp_customize->add_control( new Wp_Customize_Control( $wp_customize, 'hongo_main_font_display', array(
        'label'				=> __( 'Font display', 'hongo' ),
        'type'              => 'select',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_main_font_display',
        'choices'           => array(
                                    ''          => esc_html__( 'Select', 'hongo' ),
                                    'auto'      => esc_html__( 'Auto', 'hongo' ),
                                    'block'     => esc_html__( 'Block', 'hongo' ),
                                    'swap'      => esc_html__( 'Swap', 'hongo' ),
                                    'fallback'  => esc_html__( 'Fallback', 'hongo' ),
                                    'optional'  => esc_html__( 'Optional', 'hongo' ),
                                ),
        'active_callback'   => 'hongo_google_font_callback'
    ) ) );

    if ( ! function_exists( 'hongo_google_font_callback' ) ) :
        function hongo_google_font_callback( $control ) {
            $font_list = hongo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

            if ( $control->manager->get_setting( 'hongo_enable_main_font' )->value() == '1' && ( array_key_exists( $control->manager->get_setting( 'hongo_main_font' )->value(), $google_font_list ) || array_key_exists( $control->manager->get_setting( 'hongo_alt_font' )->value(), $google_font_list ) ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_main_google_font_callback' ) ) :
        function hongo_main_google_font_callback( $control ) {
            $font_list = hongo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

            if ( $control->manager->get_setting( 'hongo_enable_main_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'hongo_main_font' )->value(), $google_font_list ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_alt_google_font_callback' ) ) :
        function hongo_alt_google_font_callback( $control ) {
            $font_list = hongo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

            if ( $control->manager->get_setting( 'hongo_enable_alt_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'hongo_alt_font' )->value(), $google_font_list ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_main_font_callback' ) ) :
        function hongo_main_font_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_main_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_alt_font_callback' ) ) :
        function hongo_alt_font_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_alt_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'hongo_alt_main_font_callback' ) ) :
        function hongo_alt_main_font_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_alt_font' )->value() == '1' || $control->manager->get_setting( 'hongo_enable_main_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /* Adobe Font Separator Settings */
    $wp_customize->add_setting( 'hongo_adobe_font_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_adobe_font_setting_separator', array(
        'label'				=> __( 'Adobe Font', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_adobe_font_setting_separator',
        'description'		=> __('In this section you can load adobe fonts.','hongo'),
        'active_callback'   => 'hongo_alt_main_font_callback'
    ) ) );
    /* End Adobe Font Separator Settings */

    /* Adobe Font Enable */
    $wp_customize->add_setting( 'hongo_enable_adobe_font', array(
        'default'           => '0',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_adobe_font', array(
        'label'				=> __( 'Enable adobe font', 'hongo' ),
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_enable_adobe_font',
        'type'              => 'hongo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'hongo' ),
                                    '0' => __( 'Off', 'hongo' ),
                               ),
        'active_callback'   => 'hongo_alt_main_font_callback'
    ) ) );
    /* End Adobe Font Enable */

    /* Adobe Font Typekit ID */

    $wp_customize->add_setting( 'hongo_adobe_font_typekit_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hongo_adobe_font_typekit_id', array(
        'label'				=> __( 'Adobe font typekit ID', 'hongo' ),
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_adobe_font_typekit_id',
        'type'              => 'text',
        'active_callback'   => 'hongo_adobe_font_typekit_callback' 
    ) );

    /* End Adobe Font Typekit ID */

    if ( ! function_exists( 'hongo_adobe_font_typekit_callback' ) ) :
        function hongo_adobe_font_typekit_callback( $control ) {
            if ( $control->manager->get_setting( 'hongo_enable_adobe_font' )->value() == '1' && ( $control->manager->get_setting( 'hongo_enable_alt_font' )->value() == '1' || $control->manager->get_setting( 'hongo_enable_main_font' )->value() == '1' ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;
    
    /* Custom Font Separator */
    $wp_customize->add_setting( 'hongo_custom_font_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_custom_font_separator', array(
        'label'				=> __( 'Custom font', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_custom_font_separator',
        'description'		=> __( 'Custom fonts upload here', 'hongo' ),
        'active_callback'   => 'hongo_alt_main_font_callback'
    ) ) );

    /* End Custom Font Separator */

     /* Custom Font Separator */
    $wp_customize->add_setting( 'hongo_custom_fonts', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( new Hongo_Custom_Font( $wp_customize, 'hongo_custom_fonts', array(
        'label'				=> __( 'Custom fonts', 'hongo' ),
        'type'              => 'hongo_custom_font',
        'section'           => 'hongo_add_general_font_family_section',
        'settings'          => 'hongo_custom_fonts',
        'active_callback'   => 'hongo_alt_main_font_callback'
    ) ) );

    /* End Custom Font Separator */

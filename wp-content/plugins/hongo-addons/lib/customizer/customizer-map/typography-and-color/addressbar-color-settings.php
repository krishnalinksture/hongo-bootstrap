<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_addressbar_color_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_addressbar_color_setting_separator', array(
        'label'     		=> __( 'Color', 'hongo-addons' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_addressbar_color_section',
        'settings'          => 'hongo_addressbar_color_setting_separator',       
    ) ) );

    /* End Separator Settings */

    /* Address Bar Color Setting */

    $wp_customize->add_setting( 'hongo_addressbar_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_addressbar_color', array(
        'label'     		=> __( 'Address bar color', 'hongo-addons' ),
        'section'           => 'hongo_add_addressbar_color_section',
        'settings'          => 'hongo_addressbar_color',
    ) ) );

    /* End Address Bar Color Setting */
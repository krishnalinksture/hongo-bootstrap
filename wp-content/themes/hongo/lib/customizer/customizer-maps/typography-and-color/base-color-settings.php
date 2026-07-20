<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

    /* Separator Settings */
    $wp_customize->add_setting( 'hongo_base_color_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_base_color_setting_separator', array(
        'label'				=> __( 'Color', 'hongo' ),
        'type'              => 'hongo_separator',
        'section'           => 'hongo_add_base_color_section',
        'settings'          => 'hongo_base_color_setting_separator',
    ) ) );

    /* End Separator Settings */

    /* Base Color Setting */

    $wp_customize->add_setting( 'hongo_base_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_base_color', array(
        'label'				=> __( 'Base color', 'hongo' ),
        'section'           => 'hongo_add_base_color_section',
        'settings'          => 'hongo_base_color',
    ) ) );

    /* End Base Color Setting */

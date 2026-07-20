<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	
	/* Box Layout Separator Settings */
	
	$wp_customize->add_setting( 'hongo_box_layout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_box_layout_separator', array(
	    'label'      		=> __( 'Box layout', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_box_layout_panel',
	    'settings'   		=> 'hongo_box_layout_separator',
	    'priority'	 		=> 4,
	) ) );

	/* End Box Layout Separator Settings */

	/* Select Header Box layout */

    $wp_customize->add_setting( 'hongo_enable_box_layout', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_box_layout', array(
		'label'       		=> __( 'Box layout', 'hongo' ),
		'section'     		=> 'hongo_add_box_layout_panel',
		'settings'			=> 'hongo_enable_box_layout',
		'type'              => 'hongo_switch',
		'choices'           => array(
								    '1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							       ),
		 'priority'	 		=> 4,
	) ) );

	/* End Header Box layout */

	$wp_customize->add_setting( 'hongo_enable_box_layout_width', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hongo_box_layout_validate_callback'
    ) );
	
	if ( ! function_exists( 'hongo_box_layout_validate_callback' ) ) {
	    function hongo_box_layout_validate_callback( $validity, $value ) {
		    //$value = intval( $value );
		    if ( ! empty( $value ) && ! is_numeric( $value ) ) {
		        $validity->add( 'required', __( 'Please add numeric width', 'hongo' ) );
		    } elseif ( ! empty( $value ) && $value < 1170 ) {
		        $validity->add( 'required', __( 'Please add width should be greater than 1170', 'hongo' ) );
		    }
		    return $validity;
		}
	}

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_enable_box_layout_width', array(
        'label'             => __( 'Box layout width', 'hongo' ),
        'section'           => 'hongo_add_box_layout_panel',
        'settings'          => 'hongo_enable_box_layout_width',
        'type'              => 'text',
        'active_callback'   => 'hongo_enable_box_layout_width_callback',
        'description'		=> __( 'Width should be greater than 1170', 'hongo' ),
        'priority'	 		=> 4,
    ) ) );

    if ( ! function_exists( 'hongo_enable_box_layout_width_callback' ) ) :
        function hongo_enable_box_layout_width_callback( $control )   {
            if ( $control->manager->get_setting( 'hongo_enable_box_layout' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

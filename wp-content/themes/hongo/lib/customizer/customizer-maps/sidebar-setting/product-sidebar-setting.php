<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_widget_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_widget_style_separator', array(
	    'label'				=> __( 'Widget Style', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'   		=> 'hongo_product_widget_style_separator',
	) ) );

	/* End Separator Settings */

	/* Product Container Setting */

	$wp_customize->add_setting( 'hongo_product_widget_style', array(
		'default' 			=> 'sidebar-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_widget_style', array(
		'label'				=> __( 'Sidebar widget style', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_style',
		'type'              => 'select',
		'choices'           => array(
								    'sidebar-style-1' => esc_html__( 'Style 1', 'hongo' ),
									'sidebar-style-2' => esc_html__( 'Style 2', 'hongo' ),
							   ),
	) ) );

	/* End Product Container Setting */

	/* Separator Settings */

	$wp_customize->add_setting( 'hongo_product_widget_general_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_widget_general_setting_separator', array(
	    'label'				=> __( 'General', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'   		=> 'hongo_product_widget_general_setting_separator',
	) ) );

	/* End Separator Settings */

	/* Widget content Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_content_color', array(
		'label'				=> __( 'Content color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_content_color',
	) ) );
	
	/* End Widget content Color setting */

	/* Widget content link Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_content_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_content_link_color', array(
		'label'				=> __( 'Content link color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_content_link_color',
	) ) );
	
	/* End Widget content link Color setting */

	/* Widget content link hover Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_content_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_content_link_hover_color', array(
		'label'				=> __( 'Content link hover color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_content_link_hover_color',
	) ) );
	
	/* End Widget content link hover Color setting */

	/* Widget Background Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_background_color', array(
		'label'				=> __( 'Background color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_background_color',
		'active_callback'   => 'hongo_product_widget_background_color_callback'
	) ) );
	
	/* End Widget Background Color setting */

	if ( ! function_exists( 'hongo_product_widget_background_color_callback' ) ) :
		function hongo_product_widget_background_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_product_widget_style' )->value() == 'sidebar-style-2' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* Widget Border Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_border_color', array(
		'label'				=> __( 'Border color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_border_color',
	) ) );
	
	/* End Widget Border Color setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_product_widget_title_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_product_widget_title_setting_separator', array(
	    'label'				=> __( 'Widget Title Typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'   		=> 'hongo_product_widget_title_setting_separator',
	) ) );

	/* End Separator Settings */

	/* Widget title Font Size */

	$wp_customize->add_setting( 'hongo_product_widget_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_product_widget_title_font_size', array(
	    'label'				=> __( 'Font size', 'hongo' ),
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'	 		=> 'hongo_product_widget_title_font_size',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	) );

	/* End Widget title Font Size */

	/* Widget Title Line Height */

	$wp_customize->add_setting( 'hongo_product_widget_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_product_widget_title_line_height', array(
	    'label'				=> __( 'Line height', 'hongo' ),
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'	 		=> 'hongo_product_widget_title_line_height',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 15px', 'hongo' ),
	) );

	/* End Widget Title Line Height */

	/* Widget Title Letter Spacing */

	$wp_customize->add_setting( 'hongo_product_widget_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_product_widget_title_letter_spacing', array(
	    'label'				=> __( 'Letter spacing', 'hongo' ),
	    'section'    		=> 'hongo_add_product_sidebar_section',
	    'settings'	 		=> 'hongo_product_widget_title_letter_spacing',
	    'type'       		=> 'text',
	    'description'		=> __( 'In pixel like 1px', 'hongo' ),
	) );

	/* End Widget Title Letter Spacing */

	/* Widget Title weight setting */

    $wp_customize->add_setting( 'hongo_product_widget_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_product_widget_title_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );
	
	/* End Widget Title Font weight setting */

	/* Widget Title Color setting*/

	$wp_customize->add_setting( 'hongo_product_widget_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_product_widget_title_color', array(
		'label'				=> __( 'Color', 'hongo' ),
		'section'     		=> 'hongo_add_product_sidebar_section',
		'settings'			=> 'hongo_product_widget_title_color',
	) ) );
	
	/* End Widget Title Color setting */

<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Separator Settings */
$wp_customize->add_setting( 'hongo_page_not_found_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_page_not_found_separator', array(
    'label'      		=> __( '404 page', 'hongo' ),
    'type'              => 'hongo_separator',
    'section'    		=> 'hongo_add_404_page_panel',
    'settings'   		=> 'hongo_page_not_found_separator',	   
    'priority'	 		=> 7, 
) ) );

/* End Separator Settings */

	/* Page Not Found Image */

$wp_customize->add_setting( 'hongo_page_not_found_image', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_url_raw'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_page_not_found_image', array(
	'label'       		=> __( 'Background image ', 'hongo' ),
	'description'		=> __( 'Recommended image size is 1920px X 1200px.', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_image',
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Image */

/* Page Main Title */

$wp_customize->add_setting( 'hongo_page_not_found_main_title', array(
	'default' 			=> __( 'OOPS!', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_main_title', array(
	'label'       		=> __( 'Main title', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_main_title',
	'type'              => 'text',
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Title */

/* Main Title Text Transform setting */

$wp_customize->add_setting( 'hongo_page_not_found_main_title_text_transform', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_main_title_text_transform', array(
	'label'       		=> __( 'Main title text case', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_main_title_text_transform',
	'type'              => 'select',
	'choices'           => array(
								''						=> esc_html__( 'Select', 'hongo' ),
							    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
							    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
							    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
							    'text-decoration-none' 	=> esc_html__( 'None', 'hongo' ),
							   ),
	'priority'	 		=> 7,
) ) );

/* End Main Title Text Transform setting */

/* Page Not Found Title */

$wp_customize->add_setting( 'hongo_page_not_found_title', array(
	'default' 			=> __( 'That page can’t be found.', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_title', array(
	'label'       		=> __( 'Title', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_title',
	'type'              => 'text',
	'priority'	 		=> 7,
	
) ) );

/* End Page Not Found Title */

/* Title Text Transform setting */

$wp_customize->add_setting( 'hongo_page_not_found_title_text_transform', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_title_text_transform', array(
	'label'       		=> __( 'Title text case', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_title_text_transform',
	'type'              => 'select',
	'choices'           => array(
								''						=> esc_html__( 'Select', 'hongo' ),
							    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
							    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
							    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
							    'text-decoration-none' 	=> esc_html__( 'None', 'hongo' ),
							   ),
	'priority'	 		=> 7,
) ) );

/* End Title Text Transform setting */

/* Page Not Found Subtitle */

$wp_customize->add_setting( 'hongo_page_not_found_subtitle', array(
	'default' 			=> __( 'It looks like nothing was found at this location.Maybe try a search?', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_subtitle', array(
	'label'       		=> __( 'Subtitle', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_subtitle',
	'type'              => 'text',
	'priority'	 		=> 7,
	
) ) );

/* Page Not Found Subtitle */

/* Page Not Found Subtitle Text Transform setting */

$wp_customize->add_setting( 'hongo_page_not_found_subtitle_text_transform', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_subtitle_text_transform', array(
	'label'       		=> __( 'Subtitle text case', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_subtitle_text_transform',
	'type'              => 'select',
	'choices'           => array(
								''						=> esc_html__( 'Select', 'hongo' ),								    
							    'text-uppercase' 		=> esc_html__( 'Uppercase', 'hongo' ),
							    'text-lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
							    'text-capitalize'		=> esc_html__( 'Capitalize', 'hongo' ),
							    'text-decoration-none' 	=> esc_html__( 'None', 'hongo' ),
							   ),
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Subtitle Text Transform setting */	

/* Page Not Found Hide Button */

$wp_customize->add_setting( 'hongo_page_not_found_button', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_not_found_button', array(
	'label'       		=> __( 'Home button', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_button',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'On', 'hongo' ),
							  	'0' => __( 'Off', 'hongo' ),
						   ),
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Hide Button */

/* Page Not Found Button Text */

$wp_customize->add_setting( 'hongo_page_not_found_button_text', array(
	'default' 			=> __( 'BACK TO HOME PAGE', 'hongo' ),
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_button_text', array(
	'label'       		=> __( 'Button text', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_button_text',
	'type'              => 'text',
	'active_callback'   => 'hongo_page_not_found_hide_button',
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Button Text */

/* Page Not Found Button Text Transform setting */

$wp_customize->add_setting( 'hongo_page_not_found_button_text_transform', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_button_text_transform', array(
	'label'       		=> __( 'Button text case', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_button_text_transform',
	'type'              => 'select',
	'active_callback'   => 'hongo_page_not_found_hide_button',
	'choices'           => array(
								''				=> esc_html__( 'Select', 'hongo' ),
							    'uppercase'		=> esc_html__( 'Uppercase', 'hongo' ),
							    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
							    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
							   ),
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Button Text Transform setting */

/* Page Not Found Button URL */

$wp_customize->add_setting( 'hongo_page_not_found_button_url', array(
	'default' 			=> home_url( '/' ),
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_button_url', array(
	'label'       		=> __( 'Button URL', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_button_url',
	'type'              => 'text',
	'active_callback'   => 'hongo_page_not_found_hide_button',
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Button URL */

/* Page Not Found Hide Search */

$wp_customize->add_setting( 'hongo_page_not_found_search', array(
	'default' 			=> '1',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_page_not_found_search', array(
	'label'       		=> __( 'Search', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_search',
	'type'              => 'hongo_switch',
	'choices'           => array(
								'1' => __( 'Yes', 'hongo' ),
							  	'0' => __( 'No', 'hongo' ),
						   ),
	'priority'	 		=> 7,
) ) );

/* End Page Not Found Hide Search */

/* Search Block Placeholder Text */

$wp_customize->add_setting( 'hongo_search_placeholder_text', array(
	'default' 			=> __( 'Enter your keywords...', 'hongo' ),
	'sanitize_callback' => 'esc_attr',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_search_placeholder_text', array(
	'label'       		=> __( 'Search placeholder text', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_search_placeholder_text',
	'type'              => 'text',
	'active_callback'   => 'hongo_page_not_found_search_callback',
	'priority'	 		=> 7,
) ) );

/* End Search Block Placeholder Text */

if ( ! function_exists( 'hongo_page_not_found_search_callback' ) ) :
   	function hongo_page_not_found_search_callback( $control )	{
        if ( $control->manager->get_setting( 'hongo_page_not_found_search' )->value() == '1' ) {
	        return true;
	    } else {
	    	return false;
	    }  
	}
endif;

/* 404 Main Title color setting */

$wp_customize->add_setting( 'hongo_404_main_title_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_404_main_title_color', array(
    'label'      		=> __( 'Main title color', 'hongo' ),
    'section'    		=> 'hongo_add_404_page_panel',
    'settings'	 		=> 'hongo_404_main_title_color',
    'priority'	 		=> 7,
) ) );

/* End 404 Title color setting */

/* 404 Title color setting */

$wp_customize->add_setting( 'hongo_404_title_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_404_title_color', array(
    'label'      		=> __( 'Title color', 'hongo' ),
    'section'    		=> 'hongo_add_404_page_panel',
    'settings'	 		=> 'hongo_404_title_color',
    'priority'	 		=> 7,
) ) );

/* End 404 Title color setting */

/* 404 Subtitle color setting */

$wp_customize->add_setting( 'hongo_404_subtitle_color', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_404_subtitle_color', array(
    'label'      		=> __( 'Subtitle color', 'hongo' ),
    'section'    		=> 'hongo_add_404_page_panel',
    'settings'	 		=> 'hongo_404_subtitle_color',
    'priority'	 		=> 7,
) ) );

/* End 404 Subtitle color setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_page_not_found_hide_button' ) ) :
   	function hongo_page_not_found_hide_button( $control )	{
        if ( $control->manager->get_setting( 'hongo_page_not_found_button' )->value() == '1' ) {
	        return true;
	    } else {
	    	return false;
	    }  
	}
endif;

/* End Custom Callback Functions */

/* 404 Add Top Space setting */

$wp_customize->add_setting( 'hongo_page_not_found_top_space', array(
	'default' 			=> 'yes',
	'sanitize_callback' => 'esc_attr'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_page_not_found_top_space', array(
	'label'				=> __( 'Add top space of header height', 'hongo' ),
	'section'     		=> 'hongo_add_404_page_panel',
	'settings'			=> 'hongo_page_not_found_top_space',
	'type'              => 'select',
	'choices'           => array(
							    'yes'	=> esc_html__( 'Yes', 'hongo' ),
							    'no' 	=> esc_html__( 'No', 'hongo' ),
							   ),
) ) );

/* End 404 Add Top Space setting */

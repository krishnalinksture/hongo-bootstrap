<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	// All Attributes get
	$hongo_attribute_array = hongo_attributes_array();

	/*
	 * Product layout setting panel.
	 */
	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_product_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_separator', array(
		'label'				=> __( 'Layout and container', 'hongo' ),
		'type'				=> 'hongo_separator',
		'section'			=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_separator',
		'priority'			=> '1',
	) ) );

	/* End Separator Settings */

	/* Product General Layout */

	$wp_customize->add_setting( 'hongo_single_product_layout_setting', array(
		'default' 			=> 'hongo_layout_no_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_layout_setting', array(
		'label'				=> __( 'Layout style', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_layout_setting',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
										'hongo_layout_no_sidebar'    => __( 'No sidebar', 'hongo' ),
									  	'hongo_layout_left_sidebar'  => __( 'Left sidebar', 'hongo' ),
									  	'hongo_layout_right_sidebar' => __( 'Right sidebar', 'hongo' ),
									  	'hongo_layout_both_sidebar'  => __( 'Both sidebar', 'hongo' ),
								    ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/1col.png',
								  	HONGO_THEME_IMAGES_URI . '/2cl.png',
								  	HONGO_THEME_IMAGES_URI . '/2cr.png',
								  	HONGO_THEME_IMAGES_URI . '/3cm.png',
							   ),
		'hongo_columns'    	=> '4',
		'priority'			=> '1',
	) ) );

	/* End Product General Layout */

	/* Product Left Sidebar */

	$wp_customize->add_setting( 'hongo_single_product_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_left_sidebar', array(
		'label'				=> __( 'Left sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_left_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_single_product_left_sidebar_layout_callback',
		'priority'			=> '1',
	) ) );

	/* End Product Left Sidebar */

	/* Product Right Sidebar */
	
	$wp_customize->add_setting( 'hongo_single_product_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_right_sidebar', array(
		'label'				=> __( 'Right sidebar', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_right_sidebar',
		'type'              => 'select',
		'choices'           => $hongo_sidebar_array,
		'active_callback'   => 'hongo_single_product_right_sidebar_layout_callback',
		'priority'			=> '1',
	) ) );

	/* End Product Right Sidebar */

	/* Product Container Setting */

	$wp_customize->add_setting( 'hongo_single_product_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_container_style', array(
		'label'				=> __( 'Container style', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container' 					=> esc_html__( 'Fixed', 'hongo' ),
								    'container-fluid' 				=> esc_html__( 'Full width', 'hongo' ),
									'container-fluid-with-padding' 	=> esc_html__( 'Full width ( with paddings )', 'hongo' ),
							   ),
		'priority'			=> '1',
	) ) );

	/* End Product Container Setting */


	/* Container custom Width setting */

    $wp_customize->add_setting( 'hongo_single_product_container_fluid_with_padding', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_container_fluid_with_padding', array(
		'label'				=> __( 'Full width padding', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_container_fluid_with_padding',
		'type'              => 'text',
		'active_callback'	=> 'hongo_single_product_container_fluid_with_padding_callback',
		'priority'			=> '1',
	) ) );

	if ( ! function_exists( 'hongo_single_product_container_fluid_with_padding_callback' ) ) :
	   	function hongo_single_product_container_fluid_with_padding_callback( $control )	{
	   		if ( $control->manager->get_setting( 'hongo_single_product_container_style' )->value() == 'container-fluid-with-padding' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* End Container custom Width setting */

	/* Rich Snippet */

	$wp_customize->add_setting( 'hongo_single_product_rich_snippet', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_rich_snippet', array(
		'label'				=> __( 'Rich Snippet', 'hongo' ),
		'section'			=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_rich_snippet',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '1',
	) ) );

	/* End Rich Snippet */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_product_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_style_separator', array(
	    'label'				=> __( 'Single product style and data', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_style_separator',
	    'priority'			=> '2',
	) ) );

	/* End Separator Settings */

	/* Product Single Page Style setting */

    $wp_customize->add_setting( 'hongo_product_single_premade_style', array(
		'default' 			=> 'single-product-classic',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_product_single_premade_style', array(
		'label'				=> __( 'Single product style', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_product_single_premade_style',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    'single-product-default'				=> __( 'Default', 'hongo' ),
								    'single-product-right-content'			=> __( 'Right Content', 'hongo' ),
								    'single-product-carousel'				=> __( 'Carousel', 'hongo' ),
								    'single-product-left-content'			=> __( 'Left Content', 'hongo' ),
								    'single-product-classic'				=> __( 'Classic', 'hongo' ),
								    'single-product-sticky'					=> __( 'Sticky', 'hongo' ),
								    'single-product-modern'					=> __( 'Modern', 'hongo' ),
								    'single-product-extended-descriptions'	=> __( 'extended-descriptions', 'hongo' ),
								   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/single-product-default.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-right-content.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-carousel.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-left-content.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-classic.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-sticky.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-modern.jpg',
								  	HONGO_THEME_IMAGES_URI . '/single-product-extended-descriptions.jpg',
							   ),
		'hongo_columns'    	=> '1',
		'priority'			=> '2',
	) ) );

	/* End Product Single Page Style setting */

	/* Single Product BG Image */

    $wp_customize->add_setting( 'hongo_single_product_ed_bg_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hongo_single_product_ed_bg_image', array(
		'label'				=> __( 'Background image', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_ed_bg_image',
		'description'		=> __( 'Recommended image size is 1920px X 1200px.', 'hongo' ),
		'active_callback' 	=> 'hongo_single_product_ed_bg_image_callback',
		'priority'			=> '4',
	) ) );

	/* End Single Product BG Image */

	/* Single Product Content Position */

    $wp_customize->add_setting( 'hongo_single_product_content_position', array(
		'default' 			=> 'middle',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_content_position', array(
		'label'				=> __( 'Content position', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_content_position',
		'type'              => 'select',
		'choices'           => array(
								    'top' 	 => esc_html__( 'Top', 'hongo' ),
								    'middle' => esc_html__( 'Middle', 'hongo' ),
							   ),
		'active_callback'	=> 'hongo_single_product_content_position_callback',
		'priority'			=> '4',
	) ) );

	/* End Single Product Content Position */

	/* Enable Product image slider */

	$wp_customize->add_setting( 'hongo_single_product_ajax_add_to_cart', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_ajax_add_to_cart', array(
		'label'				=> __( 'AJAX add to cart', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_ajax_add_to_cart',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product image slider */

	/* Variation Scroll Animation */

	$wp_customize->add_setting( 'hongo_single_product_variation_scroll_animation', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_variation_scroll_animation', array(
		'label'				=> __( 'Variation animation scroll', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_variation_scroll_animation',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product image slider */

	/* Enable Product image slider */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_slider', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_slider', array(
		'label'				=> __( 'Slider', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_slider',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_slider_callback',
		'priority'			=> '4',
	) ) );

	/* End Enable Product image slider */

	/* Enable Product Zoom image effect */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_image_zoom_effect', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_image_zoom_effect', array(
		'label'				=> __( 'Image zoom effect', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_image_zoom_effect',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Zoom image effect */	

	/* Enable Product Zoom Icon */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_zoom_icon', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_zoom_icon', array(
		'label'				=> __( 'Zoom icon', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_zoom_icon',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product image slider */

	/* Product Zoom Icon BG Color */

	$wp_customize->add_setting( 'hongo_single_product_zoom_icon_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_zoom_icon_bg_color', array(
	    'label'				=> __( 'Zoom icon background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_zoom_icon_bg_color',
	    'priority'			=> '4',
	    'active_callback'	=> 'hongo_single_product_zoom_icon_callback',
	) ) );

	/* End Product Zoom Icon BG Color */

	if ( ! function_exists( 'hongo_single_product_zoom_icon_callback' ) ) :
		function hongo_single_product_zoom_icon_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_zoom_icon' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* Enable Product Brand */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_brand', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_brand', array(
		'label'				=> __( 'Product brand', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_brand',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Brand */

	/* Enable Product Brand Image */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_brand_image', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_brand_image', array(
		'label'				=> __( 'Product brand image', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_brand_image',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
		'active_callback'	=> 'hongo_single_product_page_enable_brand_image_callback'
	) ) );

	/* End Enable Product Brand Image */

	/* Enable Product Loop deal */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_deal', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_deal', array(
		'label'				=> __( 'Product countdown deal', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_deal',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Loop deal */

	/* Enable Product Sale Box */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_sale_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_sale_box', array(
		'label'				=> __( 'Sale box', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_sale_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Sale Box */

	/* Enable Percentage Sale Box */

	$wp_customize->add_setting( 'hongo_single_product_display_percentage_sale_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_display_percentage_sale_box', array(
		'label'				=> __( 'Percentage sale box', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_display_percentage_sale_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback' 	=> 'hongo_single_product_display_percentage_sale_box_callback',
		'priority'			=> '4',
	) ) );

	if ( ! function_exists( 'hongo_single_product_display_percentage_sale_box_callback' ) ) :
		function hongo_single_product_display_percentage_sale_box_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_sale_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Enable Percentage Sale Box */

	/*  Sale Text  */

	$wp_customize->add_setting( 'hongo_single_product_sale_text', array(
		'default' 			=> __( 'Sale!', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_text', array(
		'label'				=> __( 'Sale text', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_single_product_sale_text_callback',
		'priority'			=> '4',
	) ) );

	if ( ! function_exists( 'hongo_single_product_sale_text_callback' ) ) :
		function hongo_single_product_sale_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_display_percentage_sale_box' )->value() == '0' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Sale Text */

	/*  Sold Text  */

	$wp_customize->add_setting( 'hongo_single_product_sold_text', array(
		'default' 			=> __( 'Sold!', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sold_text', array(
		'label'				=> __( 'Sold text', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sold_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_single_product_display_percentage_sale_box_callback',
		'priority'			=> '4',
	) ) );

	/* End Sold Text */

	/* Enable Product New Box */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_new_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_new_box', array(
		'label'				=> __( 'New box', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_new_box',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product New Box */

	/*  New Text  */

	$wp_customize->add_setting( 'hongo_single_product_new_text', array(
		'default' 			=> __( 'New', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_new_text', array(
		'label'				=> __( 'New text', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_new_text',
		'type'      		=> 'text',
		'active_callback' 	=> 'hongo_single_product_new_text_callback',
		'priority'			=> '4',
	) ) );

	if ( ! function_exists( 'hongo_single_product_new_text_callback' ) ) :
		function hongo_single_product_new_text_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End New Text */

	/* Enable Product Title */

	$wp_customize->add_setting( 'hongo_single_product_page_enable_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_enable_title', array(
		'label'				=> __( 'Title', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_enable_title',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Title */

	/* Enable Product Title Additional Font */

	$wp_customize->add_setting( 'hongo_single_product_page_title_alt_font', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_page_title_alt_font', array(
		'label'				=> __( 'Use additional font for title', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_alt_font',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Title Additional Font */

	/* Enable Product Short Description */

	$wp_customize->add_setting( 'hongo_single_product_enable_short_description', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_short_description', array(
		'label'				=> __( 'Short description', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_short_description',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Short Description */

	/* Enable Product SKU */

	$wp_customize->add_setting( 'hongo_single_product_enable_sku', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_sku', array(
		'label'				=> __( 'SKU', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_sku',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product SKU */

	/* Enable Product Category */

	$wp_customize->add_setting( 'hongo_single_product_enable_category', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_category', array(
		'label'				=> __( 'Category', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_category',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Category */

	/* Enable Product Tag */

	$wp_customize->add_setting( 'hongo_single_product_enable_tag', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_tag', array(
		'label'				=> __( 'Tag', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_tag',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '4',
	) ) );

	/* End Enable Product Tag */

	/* Enable Product Tab Content Heading */

	$wp_customize->add_setting( 'hongo_single_product_enable_tab_content_heading', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_tab_content_heading', array(
		'label'				=> __( 'Tab content heading', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_tab_content_heading',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '7',
	) ) );

	/* End Enable Product Tab Content Heading */

	/* Enable Product Header Top Space */

	$wp_customize->add_setting( 'hongo_single_product_header_top_spacing', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_header_top_spacing', array(
		'label'				=> __( 'Add margin top of header height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_header_top_spacing',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'priority'			=> '7',
	) ) );

	/* End Enable Product Header Top Space */

	/* Single Product Padding Top */

    $wp_customize->add_setting( 'hongo_single_product_padding_top', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_padding_top', array(
		'label'				=> __( 'Padding top', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_padding_top',
		'type'              => 'text',
		'description'		=> __( 'Define padding top like 12px', 'hongo' ),
		'priority'			=> '7',
	) ) );

	/* End Single Product Padding Top */

	/* Single Product Padding Bottom */

    $wp_customize->add_setting( 'hongo_single_product_padding_bottom', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_padding_bottom', array(
		'label'				=> __( 'Padding bottom', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_padding_bottom',
		'type'              => 'text',
		'description'		=> __( 'Define padding bottom like 12px', 'hongo' ),
		'priority'			=> '7',
	) ) );

	/* End Single Product Padding Bottom */

	/* Modern product Background color */

	$wp_customize->add_setting( 'hongo_single_product_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_bg_color',
	    'active_callback'	=> 'hongo_single_product_bg_color_callback',
	    'priority'			=> '7',
	) ) );

	/* End Modern product Background color */

	/* Product Separator Color */

	$wp_customize->add_setting( 'hongo_single_product_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_separator_color', array(
	    'label'				=> __( 'Separator color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_separator_color',
	    'priority'			=> '7',
	) ) );

	/* End Product Separator Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_product_list_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_list_separator', array(
	    'label'				=> __( 'Single product list', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_list_separator',
	) ) );

	/* End Separator Settings */

	/* Enable Related Product */

	$wp_customize->add_setting( 'hongo_single_product_enable_related', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_related', array(
		'label'				=> __( 'Related product', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_related',
		'type'              => 'hongo_switch',
		'choices'           => 	array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Enable Related Product */

	/* Related Product Title */

	$wp_customize->add_setting( 'hongo_single_product_related_title', array(
		'default' 			=> __( 'Related Product', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_related_title', array(
		'label'				=> __( 'Related product heading', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_related_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_single_product_related_title_callback',
	) ) );

	/* End Related Product Title */

	/* Enable Up sells Product */

	$wp_customize->add_setting( 'hongo_single_product_enable_up_sells', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_up_sells', array(
		'label'				=> __( 'Up sells product', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_up_sells',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Enable Up sells Product */

	/* Up sells Product Title */ 

	$wp_customize->add_setting( 'hongo_single_product_up_sells_title', array(
		'default' 			=> __( 'You may also like', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_up_sells_title', array(
		'label'				=> __( 'Up sells product heading', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_up_sells_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_single_product_up_sells_title_callback',
	) ) );

	/* End Up sells Product Title */

	/*  No. of Product List Column Desktop */

	$wp_customize->add_setting( 'hongo_single_product_no_of_columns_list', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_no_of_columns_list', array(
		'label'				=> __( 'No. of columns for desktop', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_no_of_columns_list',
		'type'              => 'hongo_preview_image',
		'choices'    		=> array(
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/5-columns.jpg',
								  	HONGO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
	) ) );

	/* End No. of Product List Column Desktop*/

	/* Product Single Mini Desktop colum setting */

	$wp_customize->add_setting( 'hongo_single_product_list_mini_desktop_column', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_list_mini_desktop_column', array(
		'label'				=> __( 'No. of columns for mini desktop', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_mini_desktop_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' => __( '2 Columns', 'hongo' ),
								    '3' => __( '3 Columns', 'hongo' ),
								    '4' => __( '4 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
	) ) );

	/* End Product Single Mini Desktop colum setting */

	/* Product Single Tablet column setting */

	$wp_customize->add_setting( 'hongo_single_product_list_tablet_column', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_list_tablet_column', array(
		'label'				=> __( 'No. of columns for tablet', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_tablet_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
								    '2' => __( '2 Columns', 'hongo' ),
								    '3' => __( '3 Columns', 'hongo' ),
									'4' => __( '4 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/3-columns.jpg',
									HONGO_THEME_IMAGES_URI . '/4-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
	) ) );

	/* End Product Single Tablet column setting */

	/* Product Single Mobile colum setting */

	$wp_customize->add_setting( 'hongo_single_product_list_mobile_column', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_list_mobile_column', array(
		'label'				=> __( 'No. of columns for mobile', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_mobile_column',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'1' => __( '1 Columns', 'hongo' ),
								    '2' => __( '2 Columns', 'hongo' ),
							   ),
		'hongo_img'			=> array(
								  	HONGO_THEME_IMAGES_URI . '/1-columns-mobile.png',
									HONGO_THEME_IMAGES_URI . '/2-columns.jpg',
							   ),
		'hongo_columns'    	=> '3',
	) ) );

	/* End Product Single Mobile colum setting */


	/* Product List Column Gutter setting */

    $wp_customize->add_setting( 'hongo_single_product_products_list_gutter', array(
		'default' 			=> 'gutter-small',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_products_list_gutter', array(
		'label'				=> __( 'Spacing between columns', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_products_list_gutter',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'' 					=> __( 'Gutter None', 'hongo' ),
								    'gutter-very-small'	=> __( 'Gutter Very Small', 'hongo' ),
								    'gutter-small'		=> __( 'Gutter Small', 'hongo' ),
								    'gutter-medium'		=> __( 'Gutter Medium', 'hongo' ),
								    'gutter-large' 		=> __( 'Gutter Large', 'hongo' ),
								    'gutter-extra-large'=> __( 'Gutter Extra Large', 'hongo' ),
								   ),
		'hongo_img'			=> array(
									HONGO_THEME_IMAGES_URI . '/no-gutter.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-very-small.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-small.jpg',
								  	HONGO_THEME_IMAGES_URI . '/gutter-medium.jpg',
									HONGO_THEME_IMAGES_URI . '/gutter-large.jpg',
									HONGO_THEME_IMAGES_URI . '/gutter-extra-large.jpg',
							   ),
		'hongo_columns'    	=> '3',
	) ) );

	/*End Product List Column Gutter setting */

	/*  No. of Product List */

	$wp_customize->add_setting( 'hongo_single_product_no_of_products_list', array(
		'default' 			=> '4',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_no_of_products_list', array(
		'label'				=> __( 'No. of products', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_no_of_products_list',
		'type'              => 'text',
		'description'		=> __( 'Define per page like 4', 'hongo' ),
	) ) );

	/* End No. of Product List */

	/* Product List Image srcset setting */

    $wp_customize->add_setting( 'hongo_single_product_products_list_image_srcset', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_single_product_products_list_image_srcset', array(
		'label'				=> __( 'Thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_products_list_image_srcset',
	) ) );

	/* End Product List Image srcset */

	/* Enable Product List Swiper Slider */

	$wp_customize->add_setting( 'hongo_single_product_list_enable_slider', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_list_enable_slider', array(
		'label'				=> __( 'Slider', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_slider',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Enable Product List Swiper Slider */

	/* Enable Product Tab */

	$wp_customize->add_setting( 'hongo_single_product_enable_product_list_tab', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_product_list_tab', array(
		'label'				=> __( 'Product list tab', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_product_list_tab',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Enable Product Tab */
	
	/* Size Guide Title Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_size_guide_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_size_guide_separator', array(
	    'label'				=> __( 'Size guide', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_size_guide_separator',
	) ) );	

	/* End Page title Separator setting */

	/* Size Guide */

	$wp_customize->add_setting( 'hongo_single_product_enable_size_guide', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_size_guide', array(
		'label'				=> __( 'Size guide', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_enable_size_guide',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
	) ) );

	/* End Size Guide */

	/* Size Guide Position */

	$wp_customize->add_setting( 'hongo_single_product_position_size_guide', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_position_size_guide', array(
		'label'				=> __( 'Size guide position', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_position_size_guide',
		'type'              => 'select',
		'choices'           => 	$hongo_attribute_array,
		'active_callback'	=> 'hongo_single_product_page_size_guide_callback',
	) ) );

	/* End Size Guide Position */

	/* Size Guide Text */

	$wp_customize->add_setting( 'hongo_single_product_size_guide_text', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_single_product_size_guide_text', array(
	    'label'				=> __( 'Size guide text', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_size_guide_text',
	    'type'       		=> 'text',
	    'active_callback'	=> 'hongo_single_product_page_size_guide_callback',
	) );

	/* End Size Guide Text */

	/* Size Guide Title */

	$wp_customize->add_setting( 'hongo_single_product_size_guide_title', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'hongo_single_product_size_guide_title', array(
	    'label'				=> __( 'Size guide title', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_size_guide_title',
	    'type'       		=> 'text',
	    'active_callback'	=> 'hongo_single_product_page_size_guide_callback',
	) );

	/* End Size Guide Title */

	/* Size Guide Content */

	$wp_customize->add_setting( 'hongo_single_product_size_guide_content', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_size_guide_content', array(
		'label'				=> __( 'Size guide content', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_size_guide_content',
		'type'              => 'textarea',
		'active_callback'	=> 'hongo_single_product_page_size_guide_callback',
		
	) ) );

	/* End Size Guide Content */

	/* Product countdown color Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_deal_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_deal_color', array(
	    'label'				=> __( 'Countdown color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_deal_color',
	    'active_callback'	=> 'hongo_single_product_deal_color_callback',
	) ) );

	/* End Product countdown color Separator setting */

	/* Product single countdown number color */

	$wp_customize->add_setting( 'hongo_single_product_deal_number_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_deal_number_color', array(
	    'label'				=> __( 'Countdown number color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_deal_number_color',
	    'active_callback'	=> 'hongo_single_product_deal_color_callback',
	) ) );

	/* End Product single countdown number color */

	/* Product single countdown text color */

	$wp_customize->add_setting( 'hongo_single_product_deal_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_deal_text_color', array(
	    'label'				=> __( 'Countdown text color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_deal_text_color',
	    'active_callback'	=> 'hongo_single_product_deal_color_callback',
	) ) );

	/* End Product single countdown text color */
	
	/* Product Sale Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_sale_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_sale_typography', array(
	    'label'				=> __( 'Sale, New & Sold box typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_sale_typography',
	    'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Typography Separator setting */

	/* Product Sale Font size */

    $wp_customize->add_setting( 'hongo_single_product_sale_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Font size */

	/* Product Sale Line height */

    $wp_customize->add_setting( 'hongo_single_product_sale_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Line height */

	/* Product Sale Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_sale_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Letter spacing */

	/* Product Sale Font weight */

    $wp_customize->add_setting( 'hongo_single_product_sale_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Font weight */

	/* Product Sale Text Transform setting */
    
    $wp_customize->add_setting( 'hongo_single_product_sale_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_sale_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_sale_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''			 => esc_html__( 'Select', 'hongo' ),
								    'uppercase'  => esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'	 => esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize' => esc_html__( 'Capitalize', 'hongo' ),
								    'none'	     => esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_single_product_sale_typography_callback',
	) ) );

	/* End Product Sale Text Transform setting */

	/* Product Sale Color */

	$wp_customize->add_setting( 'hongo_single_product_sale_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_sale_color', array(
	    'label'				=> __( 'Sale box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_sale_color',
	    'active_callback'	=> 'hongo_single_product_sale_color_callback',
	) ) );

	/* End Product Sale Color */

	/* Product Sale Background Color setting */

	$wp_customize->add_setting( 'hongo_single_product_sale_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_sale_bg_color', array(
	    'label'				=> __( 'Sale box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_sale_bg_color',
	    'active_callback'	=> 'hongo_single_product_sale_color_callback',
	) ) );

	/* Product Sale Background Color setting */	

	/* Product New Color */

	$wp_customize->add_setting( 'hongo_single_product_new_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_new_color', array(
	    'label'				=> __( 'New box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_new_color',
	    'active_callback'	=> 'hongo_single_product_new_color_callback',
	) ) );

	/* End Product Sale Color */

	/* Product Sale Background Color setting */

	$wp_customize->add_setting( 'hongo_single_product_new_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_new_bg_color', array(
	    'label'				=> __( 'New box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_new_bg_color',
	    'active_callback'	=> 'hongo_single_product_new_color_callback',
	) ) );

	/* Product Sale Background Color setting */

	/* Product Single Sold Box Color */

	$wp_customize->add_setting( 'hongo_single_product_soldout_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_soldout_color', array(
	    'label'				=> __( 'Sold box color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_soldout_color',
	    'active_callback'	=> 'hongo_single_product_sale_color_callback',
	) ) );

	/* End Product Single Sold Box Color */

	/* Product Single Sold Box Background Color setting */

	$wp_customize->add_setting( 'hongo_single_product_soldout_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_soldout_bg_color', array(
	    'label'				=> __( 'Sold box background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_soldout_bg_color',
	    'active_callback'	=> 'hongo_single_product_sale_color_callback',
	) ) );

	/* Product Single Sold Box Background Color setting */	

	/* Product Title Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_page_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_page_title_typography', array(
	    'label'				=> __( 'Title typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_page_title_typography',
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Typography Separator setting */

	/* Product Title Font size */

    $wp_customize->add_setting( 'hongo_single_product_page_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_title_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Font size */

	/* Product Title Line height */

    $wp_customize->add_setting( 'hongo_single_product_page_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_title_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Line height */

	/* Product Title Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_page_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_title_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Letter spacing */

	/* Product Title Font weight */

    $wp_customize->add_setting( 'hongo_single_product_page_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_title_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Font weight */	

	/* Product Title Text Case */

    $wp_customize->add_setting( 'hongo_single_product_page_title_font_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_title_font_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_title_font_transform',
		'type'              => 'select',
		'choices'           => array(
									''			 => esc_html__( 'Select', 'hongo' ),
								    'uppercase'  => esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'	 => esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize' => esc_html__( 'Capitalize', 'hongo' ),
								    'none'	     => esc_html__( 'None', 'hongo' ),
								   ),
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Font weight */	

	/* Product Title Color */

	$wp_customize->add_setting( 'hongo_single_product_page_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_title_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_title_color',
		'active_callback'	=> 'hongo_single_product_page_title_callback',
	) ) );

	/* End Product Title Color */

	/* Product Rating Star Color Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_rating_star_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_rating_star_typography', array(
	    'label'				=> __( 'Rating star color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_rating_star_typography',
	) ) );

	/* End Product Rating Star Color Separator setting */

	/* Product Rating Star Color */

	$wp_customize->add_setting( 'hongo_single_product_rating_star_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_rating_star_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_rating_star_color',
	) ) );

	/* End Product Rating Star Color */

	/* Product Price Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_price_typography', array(
	    'label'				=> __( 'Price typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_price_typography',
	) ) );

	/* End Product Price Typography Separator setting */

	/* Product Price Font size */

    $wp_customize->add_setting( 'hongo_single_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_price_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_price_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Price Font size */

	/* Product Price Line height */

    $wp_customize->add_setting( 'hongo_single_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_price_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_price_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Product Price Line height */

	/* Product Price Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_price_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_price_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_price_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Price Letter spacing */

	/* Product Price Font weight */

    $wp_customize->add_setting( 'hongo_single_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_price_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_price_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Price Font weight */

	/* Product Price Color */

	$wp_customize->add_setting( 'hongo_single_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_price_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_price_color',
	) ) );

	/* End Product Price Color */

	/* Product Regular Price Color */

	$wp_customize->add_setting( 'hongo_single_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_regular_price_color', array(
	    'label'				=> __( 'Regular price color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_regular_price_color',
	) ) );

	/* End Product Regular Price Color */

	/* Product Short Description Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_short_description_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_short_description_typography', array(
	    'label'				=> __( 'Short description typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_short_description_typography',
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Typography Separator setting */

	/* Product Short Description Font size */

    $wp_customize->add_setting( 'hongo_single_product_short_description_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_short_description_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_short_description_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Font size */

	/* Product Short Description Line height */

    $wp_customize->add_setting( 'hongo_single_product_short_description_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_short_description_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_short_description_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Line height */

	/* Product Short Description Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_short_description_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_short_description_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_short_description_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Letter spacing */

	/* Product Short Description Font weight */

    $wp_customize->add_setting( 'hongo_single_product_short_description_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_short_description_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_short_description_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Font weight */

	/* Product Short Description Color */

	$wp_customize->add_setting( 'hongo_single_product_short_description_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_short_description_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_short_description_color',
		'active_callback'	=> 'hongo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Color */

	/* Product Stock Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_stock_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_stock_typography', array(
	    'label'				=> __( 'Stock typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_stock_typography',
	) ) );

	/* End Product Stock Typography Separator setting */

	/* Product Stock Font size */

    $wp_customize->add_setting( 'hongo_single_product_stock_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_stock_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_stock_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Stock Font size */

	/* Product Stock Line height */

    $wp_customize->add_setting( 'hongo_single_product_stock_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_stock_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_stock_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Stock Line height */

	/* Product Stock Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_stock_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_stock_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_stock_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Stock Letter spacing */

	/* Product Stock Font weight */

    $wp_customize->add_setting( 'hongo_single_product_stock_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_stock_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_stock_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Stock Font weight */

	/* Product In Stock Color */

	$wp_customize->add_setting( 'hongo_single_product_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_stock_color', array(
	    'label'				=> __( 'InStock color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_stock_color',
	) ) );

	/* End Product In Stock Color */

	/* Product Out Of Stock Color */

	$wp_customize->add_setting( 'hongo_single_product_out_of_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_out_of_stock_color', array(
	    'label'				=> __( 'Out of Stock color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_out_of_stock_color',
	) ) );

	/* End Product Out Of Stock Color */

	/* Product Quantity input colors separator */

	$wp_customize->add_setting( 'hongo_single_product_quantity_colors', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_quantity_colors', array(
	    'label'				=> __( 'Quantity input colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_quantity_colors',
	) ) );

	/* End Product Quantity input colors separator */

	/* Product Quantity input Border color */

	$wp_customize->add_setting( 'hongo_single_product_quantity_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_quantity_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_quantity_border_color',
	) ) );

	/* End Product Quantity input Border color */

	/* Product Quantity input color */

	$wp_customize->add_setting( 'hongo_single_product_quantity_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_quantity_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_quantity_color',
	) ) );

	/* End Product Quantity input color */

	/* Product Button Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_button_typography', array(
	    'label'				=> __( 'Button colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_button_typography',
	) ) );

	/* End Product Button Separator setting */

	/* Product Button color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_color',
	) ) );

	/* End Product Button color setting */

	/* Product Button BG color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_bg_color',
	) ) );

	/* End Product Button BG color setting */

	/* Product Button Border color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_border_color',
	) ) );

	/* End Product Button Border color setting */

	/* Product Button Hover color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_hover_color',
	) ) );

	/* End Product Button Hover color setting */

	/* Product Button Hover BG color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_hover_bg_color', array(
	    'label'				=> __( 'Hover background color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_hover_bg_color',
	) ) );

	/* End Product Button Hover BG color setting */

	/* Product Button Hover border color setting */

	$wp_customize->add_setting( 'hongo_single_product_button_hover_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_button_hover_border_color', array(
	    'label'				=> __( 'Hover border color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_button_hover_border_color',
	) ) );

	/* End Product Button Hover border color setting */

	/* Product Meta Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_page_meta_typography', array(
	    'label'				=> __( 'Product meta typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_page_meta_typography',
	) ) );

	/* End Product Meta Typography Separator setting */

	/* Product Meta Font size */

    $wp_customize->add_setting( 'hongo_single_product_page_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_meta_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_meta_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Meta Font size */

	/* Product Meta Line height */

    $wp_customize->add_setting( 'hongo_single_product_page_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_meta_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_meta_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Meta Line height */

	/* Product Meta Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_page_meta_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_meta_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_meta_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Meta Letter spacing */

	/* Product Meta Font weight */

    $wp_customize->add_setting( 'hongo_single_product_page_meta_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_meta_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_meta_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Meta Font weight */

	/* Product Meta Color */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_meta_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_meta_color',
	) ) );

	/* End Product Meta Color */

	/* Product Meta Link Hover Color */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_meta_link_hover_color', array(
	    'label'				=> __( 'Link hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_meta_link_hover_color',
	) ) );

	/* End Product Meta Link Hover Color */

	/* Product Meta Heading Color */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_meta_heading_color', array(
	    'label'				=> __( 'Heading color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_meta_heading_color',
	) ) );

	/* End Product Meta Heading Color */

	/* Product Meta Social Icon Color */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_meta_social_icon_color', array(
	    'label'				=> __( 'Social icon color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_meta_social_icon_color',
	) ) );

	/* End Product Meta Social Icon Color */

	/* Product Meta Social Icon Color */

	$wp_customize->add_setting( 'hongo_single_product_page_meta_social_icon_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_meta_social_icon_hover_color', array(
	    'label'				=> __( 'Social icon hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_meta_social_icon_hover_color',
	) ) );

	/* End Product Meta Social Icon Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_product_list_slider_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_list_slider_separator', array(
	    'label'				=> __( 'Single product list slider', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_list_slider_separator',
	    'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Separator Settings */	

	/* Product List Slide Per View mini desktop */

	$wp_customize->add_setting( 'hongo_single_product_list_slides_per_view_mini_desktop', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_slides_per_view_mini_desktop', array(
		'label'				=> __( 'Mini desktop slider per view', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_slides_per_view_mini_desktop',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							 	),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Product List Slide Per View mini desktop*/

	/* Product List Slide Per View tablet */

	$wp_customize->add_setting( 'hongo_single_product_list_slides_per_view_tablet', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_slides_per_view_tablet', array(
		'label'				=> __( 'Tablet slider per view', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_slides_per_view_tablet',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							 	),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Product List Slide Per View tablet*/

	/* Product List Slide Per View mobile */

	$wp_customize->add_setting( 'hongo_single_product_list_slides_per_view_mobile', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_slides_per_view_mobile', array(
		'label'				=> __( 'Mobile slider per view', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_slides_per_view_mobile',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							 	),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Product List Slide Per View Mobile*/

	/* Enable Product List slider pagination */

	$wp_customize->add_setting( 'hongo_single_product_list_enable_pagination', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_list_enable_pagination', array(
		'label'				=> __( 'Pagination', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_pagination',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Enable Product List slider pagination */

	/* Product List pagination Color */

	$wp_customize->add_setting( 'hongo_single_product_list_pagination_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_pagination_color', array(
	    'label'				=> __( 'Pagination color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_pagination_color',
		'active_callback'	=> 'hongo_single_product_list_pagination_callback',
	) ) );

	/* End Product List pagination Color */

	/* Product List Active pagination Color */

	$wp_customize->add_setting( 'hongo_single_product_list_active_pagination_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_active_pagination_color', array(
	    'label'				=> __( 'Active pagination color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_active_pagination_color',
		'active_callback'	=> 'hongo_single_product_list_pagination_callback',
	) ) );

	/* End Product List Active pagination Color */

	/* Enable Product List slider navigation */

	$wp_customize->add_setting( 'hongo_single_product_list_enable_navigation', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_list_enable_navigation', array(
		'label'				=> __( 'Navigation', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_navigation',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Enable Product List slider navigation */

	/* Product List navigation Color */

	$wp_customize->add_setting( 'hongo_single_product_list_navigation_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_navigation_color', array(
	    'label'				=> __( 'Navigation color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_navigation_color',
		'active_callback'	=> 'hongo_single_product_list_enable_navigation_callback',
	) ) );

	/* End Product List navigation Color */

	/* Enable Product List slider Loop */

	$wp_customize->add_setting( 'hongo_single_product_list_enable_loop', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_list_enable_loop', array(
		'label'				=> __( 'Loop', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_loop',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Enable Product List slider Loop */

	/* Enable Product List slider Autoplay */

	$wp_customize->add_setting( 'hongo_single_product_list_enable_autoplay', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_list_enable_autoplay', array(
		'label'				=> __( 'Autoplay', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_autoplay',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
								  	'0' => __( 'Off', 'hongo' ),
							   ),
		'active_callback'   => 'hongo_single_product_list_slider_callback',
	) ) );

	/* End Enable Product List slider Autoplay */	

	/* Product List Slide Per Delay */

    $wp_customize->add_setting( 'hongo_single_product_list_enable_delay', array(
		'default' 			=> '2000',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_enable_delay', array(
		'label'				=> __( 'Slide delay', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_enable_delay',
		'type'              => 'text',
		'description'		=> __( 'Define Slide Delay 2000', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_list_enable_delay_callback',
	) ) );

	/* End Product List Per Delay */

	/* Product Tab Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_page_tab_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_page_tab_typography', array(
	    'label'				=> __( 'Product tab typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_page_tab_typography',
	) ) );

	/* End Product Tab Typography Separator setting */

	/* Product Tab Font size */

    $wp_customize->add_setting( 'hongo_single_product_page_tab_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_tab_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_tab_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product Tab Font size */

	/* Product Tab Line height */

    $wp_customize->add_setting( 'hongo_single_product_page_tab_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_tab_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_tab_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Tab Line height */

	/* Product Tab Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_page_tab_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_tab_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_tab_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product Tab Letter spacing */

	/* Product Tab Font weight */

    $wp_customize->add_setting( 'hongo_single_product_page_tab_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_page_tab_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_page_tab_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product Tab Font weight */

	/* Product Tab Color */

	$wp_customize->add_setting( 'hongo_single_product_page_tab_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_tab_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_tab_color',
	) ) );

	/* End Product Tab Color */

	/* Product Tab Hover Color */

	$wp_customize->add_setting( 'hongo_single_product_page_tab_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_tab_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_tab_hover_color',
	) ) );

	/* End Product Tab Hover Color */

	/* Product Active Tab Color */

	$wp_customize->add_setting( 'hongo_single_product_page_tab_active_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_page_tab_active_color', array(
	    'label'				=> __( 'Active color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_page_tab_active_color',
	) ) );

	/* End Product Active Tab Color */

	/* Product List Heading Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_list_product_heading_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_list_product_heading_typography', array(
	    'label'				=> __( 'Product list title typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'   		=> 'hongo_single_product_list_product_heading_typography',
	) ) );

	/* End Product List Heading Typography Separator setting */

	
	/* Product List Heading Font size */

    $wp_customize->add_setting( 'hongo_single_product_list_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_heading_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_heading_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Product List Heading Font size */

	/* Product List Heading Line height */

    $wp_customize->add_setting( 'hongo_single_product_list_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_heading_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_heading_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product List Heading Line height */

	/* Product List Heading Letter spacing */

    $wp_customize->add_setting( 'hongo_single_product_list_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_heading_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Product List Heading Letter spacing */

	/* Product List Heading Font weight */

    $wp_customize->add_setting( 'hongo_single_product_list_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_list_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'hongo_add_product_layout_panel',
		'settings'			=> 'hongo_single_product_list_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Product List Heading Font weight */

	/* Product List Heading Color */

	$wp_customize->add_setting( 'hongo_single_product_list_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_heading_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_heading_color',
	) ) );

	/* End Product List Heading Color */

	/* Product List Heading Hover Color */

	$wp_customize->add_setting( 'hongo_single_product_list_heading_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_heading_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_heading_hover_color',
	) ) );

	/* End Product List Heading Hover Color */

	/* Product List Active Heading Color */

	$wp_customize->add_setting( 'hongo_single_product_list_heading_active_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_list_heading_active_color', array(
	    'label'				=> __( 'Active color', 'hongo' ),
	    'section'    		=> 'hongo_add_product_layout_panel',
	    'settings'	 		=> 'hongo_single_product_list_heading_active_color',
	    'active_callback'	=> 'hongo_single_product_list_tab_callback',
	) ) );

	/* End Product List Active Heading Color */

	/* Custom Callback Functions */

	if ( ! function_exists( 'hongo_single_product_deal_color_callback' ) ) :
		function hongo_single_product_deal_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_deal' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_sale_typography_callback' ) ) :
		function hongo_single_product_sale_typography_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_sale_box' )->value() == '1' || $control->manager->get_setting( 'hongo_single_product_page_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_sale_color_callback' ) ) :
		function hongo_single_product_sale_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_sale_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_new_color_callback' ) ) :
		function hongo_single_product_new_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_new_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_list_tab_callback' ) ) :
		function hongo_single_product_list_tab_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_enable_product_list_tab' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;	

	if ( ! function_exists( 'hongo_single_product_page_title_callback' ) ) :
		function hongo_single_product_page_title_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_page_enable_title' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_short_description_callback' ) ) :
		function hongo_single_product_short_description_callback( $control ) {
	      	if ( $control->manager->get_setting( 'hongo_single_product_enable_short_description' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;	

	if ( ! function_exists( 'hongo_single_product_left_sidebar_layout_callback' ) ) :
		function hongo_single_product_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_single_product_layout_setting' )->value() == 'hongo_layout_left_sidebar' || $control->manager->get_setting( 'hongo_single_product_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_right_sidebar_layout_callback' ) ) :
		function hongo_single_product_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'hongo_single_product_layout_setting' )->value() == 'hongo_layout_right_sidebar' || $control->manager->get_setting( 'hongo_single_product_layout_setting' )->value() == 'hongo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_list_slider_callback' ) ) :
	   	function hongo_single_product_list_slider_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_list_enable_slider' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_list_pagination_callback' ) ) :
	   	function hongo_single_product_list_pagination_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_list_enable_pagination' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_list_enable_slider' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_list_enable_navigation_callback' ) ) :
	   	function hongo_single_product_list_enable_navigation_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_list_enable_navigation' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_list_enable_slider' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_list_enable_delay_callback' ) ) :
	   	function hongo_single_product_list_enable_delay_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_list_enable_autoplay' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_list_enable_slider' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_ed_bg_image_callback' ) ) :
	   	function hongo_single_product_ed_bg_image_callback( $control )	{
	   		if( $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-extended-descriptions' ){
	   			return true;
	   		} else {
	   			return false;
	   		}
	   	}
	endif;

	if ( ! function_exists( 'hongo_single_product_content_position_callback' ) ) :
	   	function hongo_single_product_content_position_callback( $control )	{
	   		if( $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-modern' || $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-extended-descriptions' ){
	   			return true;
	   		} else {
	   			return false;
	   		}
	   	}
	endif;

	if ( ! function_exists( 'hongo_single_product_slider_callback' ) ) :
	   	function hongo_single_product_slider_callback( $control )	{
	   		if( $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-default' || $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-classic' || $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-modern' || $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-extended-descriptions' ){
	   			return true;
	   		} else {
	   			return false;
	   		}
	   	}
	endif;

	if ( ! function_exists( 'hongo_single_product_page_enable_brand_image_callback' ) ) :
	   	function hongo_single_product_page_enable_brand_image_callback( $control )	{
	   		if( $control->manager->get_setting( 'hongo_single_product_page_enable_brand' )->value() == '1' ) {
	   			return true;
	   		} else {
	   			return false;
	   		}
	   	}
	   endif;	

	if ( ! function_exists( 'hongo_single_product_related_title_callback' ) ) :
	   	function hongo_single_product_related_title_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_related' )->value() == 1 )  {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_up_sells_title_callback' ) ) :
	   	function hongo_single_product_up_sells_title_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_up_sells' )->value() == 1 )  {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;	

	if ( ! function_exists( 'hongo_single_product_page_size_guide_callback' ) ) :
	   	function hongo_single_product_page_size_guide_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_size_guide' )->value() == 1 )  {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'hongo_single_product_bg_color_callback' ) ) :
	   	function hongo_single_product_bg_color_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_product_single_premade_style' )->value() == 'single-product-modern' )  {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */

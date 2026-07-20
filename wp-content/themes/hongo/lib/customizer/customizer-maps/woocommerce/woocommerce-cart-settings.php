<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$hongo_sidebar_array = hongo_register_sidebar_customizer_array();

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_single_product_cross_sells_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_cross_sells_separator', array(
	    'label'				=> __( 'Cross Sells Product', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_single_product_cross_sells_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Cross Sells Product */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells', array(
		'label'				=> __( 'Product on cart', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells',
		'type'              => 'hongo_switch',
		'choices'           => 	array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
	) ) );

	/* End Enable Cross Sells Product */

	/* Cross Sells Product Title */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_title', array(
		'default' 			=> __( 'You may be interested in...', 'hongo' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_title', array(
		'label'				=> __( 'Cross sell product heading', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_title',
		'type'              => 'text',
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Title */

	/*  No. of Cross Sells Product Column desktop  */

	$wp_customize->add_setting( 'hongo_single_product_no_of_columns_cross_sells', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_no_of_columns_cross_sells', array(
		'label'				=> __( 'No. of columns for desktop', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_no_of_columns_cross_sells',
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
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End No. of Cross Sells Product Column desktop */

	/* Cross Sells Product Mini Desktop colum setting */

	$wp_customize->add_setting( 'hongo_single_product_no_of_columns_cross_sells_mini_desktop', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_no_of_columns_cross_sells_mini_desktop', array(
		'label'				=> __( 'No. of columns for mini desktop', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_no_of_columns_cross_sells_mini_desktop',
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
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Mini Desktop colum setting */

	/* Cross Sells Product Tablet column setting */

	$wp_customize->add_setting( 'hongo_single_product_no_of_columns_cross_sells_tablet', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_no_of_columns_cross_sells_tablet', array(
		'label'				=> __( 'No. of columns for tablet', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_no_of_columns_cross_sells_tablet',
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
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Tablet column setting */

	/* Cross Sells Product Mobile colum setting */

	$wp_customize->add_setting( 'hongo_single_product_no_of_columns_cross_sells_mobile', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_no_of_columns_cross_sells_mobile', array(
		'label'				=> __( 'No. of columns for mobile', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_no_of_columns_cross_sells_mobile',
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
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Mobile colum setting */

	/* Cross sell Column Gutter setting */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_gutter', array(
		'default' 			=> 'gutter-small',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_single_product_cross_sells_gutter', array(
		'label'				=> __( 'Spacing between columns', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_gutter',
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									'' 		            => __( 'Gutter None', 'hongo' ),
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
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/*End Cross sell Column Gutter setting */

	/*  No. of Cross Sells Product  */

	$wp_customize->add_setting( 'hongo_single_product_no_of_products_cross_sells', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_no_of_products_cross_sells', array(
		'label'				=> __( 'No. of products', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_no_of_products_cross_sells',
		'type'      		=> 'text',
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End No. of Cross Sells Product */

	/* Cross Sells Product Image srcset setting */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_image_srcset', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Image_SRCSET_Control( $wp_customize, 'hongo_single_product_cross_sells_image_srcset', array(
		'label'				=> __( 'Thumbnail size', 'hongo' ),
		'type'              => 'hongo_image_srcset',
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_image_srcset',
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Image srcset */

	/* Enable Cross Sells Product Slider */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_slider', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_slider', array(
		'label'				=> __( 'Slider', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_slider',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_cross_sells_callback',
	) ) );

	/* Enable Cross Sells Product Slider */

	if ( ! function_exists( 'hongo_single_product_cross_sells_callback' ) ) :
	   	function hongo_single_product_cross_sells_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_cross_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Cross Sells Product Slider Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_slider_seperator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_cross_sells_product_slider_seperator', array(
	    'label'				=> __( 'Cross sells slider configuration', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_single_product_cross_sells_product_slider_seperator',
		'active_callback'	=> 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Cross Sells Product Slider Separator setting */

	/* Cross Sells Product Slide Per View mini desktop */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_slides_per_view_mini_desktop', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_slides_per_view_mini_desktop', array(
		'label'				=> __( 'Mini desktop slider per view', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_slides_per_view_mini_desktop',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',							    
							 	),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Cross Sells Product Slide Per View mini desktop*/

	/* Cross Sells Product Slide Per View tablet */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_slides_per_view_tablet', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_slides_per_view_tablet', array(
		'label'				=> __( 'Tablet desktop slider per view', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_slides_per_view_tablet',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',							    
							 	),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Cross Sells Product Slide Per View tablet*/

	/* Cross Sells Product Slide Per View mobile */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_slides_per_view_mobile', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_slides_per_view_mobile', array(
		'label'				=> __( 'Mobile slider per view', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_slides_per_view_mobile',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',							    
							 	),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Cross Sells Product Slide Per View Mobile*/


	/* Enable Cross Sells product slider pagination */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_pagination', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_pagination', array(
		'label'				=> __( 'Pagination', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_pagination',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Enable Cross Sells product slider pagination */

	/* Cross Sells Product pagination Color */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_pagination_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_cross_sells_product_pagination_color', array(
	    'label'				=> __( 'Pagination color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_single_product_cross_sells_product_pagination_color',
		'active_callback'	=> 'hongo_single_product_cross_sells_pagination_callback',
	) ) );

	/* End Cross Sells Product pagination Color */

	/* Cross Sells Product Active pagination Color */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_active_pagination_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_cross_sells_product_active_pagination_color', array(
	    'label'				=> __( 'Active pagination color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_single_product_cross_sells_product_active_pagination_color',
		'active_callback'	=> 'hongo_single_product_cross_sells_pagination_callback',
	) ) );

	/* End Up Sells Product Active pagination Color */

	if ( ! function_exists( 'hongo_single_product_cross_sells_pagination_callback' ) ) :
	   	function hongo_single_product_cross_sells_pagination_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_pagination' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_slider' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells' )->value() == 1  ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Enable Cross Sells product slider navigation */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_navigation', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_navigation', array(
		'label'				=> __( 'Navigation', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_navigation',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Enable Cross Sells product slider navigation */

	/* Cross Sells Product navigation Color */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_navigation_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_cross_sells_product_navigation_color', array(
	    'label'				=> __( 'Navigation color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_single_product_cross_sells_product_navigation_color',
		'active_callback'	=> 'hongo_single_product_enable_cross_sells_navigation_callback',
	) ) );

	/* End Cross Sells Product navigation Color */

	if ( ! function_exists( 'hongo_single_product_enable_cross_sells_navigation_callback' ) ) :
	   	function hongo_single_product_enable_cross_sells_navigation_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_navigation' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_slider' )->value() == 1  && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Enable Cross Sells product slider Loop */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_loop', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_loop', array(
		'label'				=> __( 'Loop', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_loop',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Enable Cross Sells product slider Loop */

	/* Enable Cross Sells product slider Autoplay */

	$wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_autoplay', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_autoplay', array(
		'label'				=> __( 'Autoplay', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_autoplay',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => __( 'On', 'hongo' ),
									'0' => __( 'Off', 'hongo' ),
								),
		'active_callback'   => 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Enable Cross Sells product slider Autoplay */

	if ( ! function_exists( 'hongo_single_product_cross_sells_slider_callback' ) ) :
	   	function hongo_single_product_cross_sells_slider_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_slider' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Cross Sells Product Slide Per Delay */

    $wp_customize->add_setting( 'hongo_single_product_enable_cross_sells_delay', array(
		'default' 			=> '2000',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_enable_cross_sells_delay', array(
		'label'				=> __( 'Slide delay', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_enable_cross_sells_delay',
		'type'              => 'text',
		'description'		=> __( 'Define Slide Delay 2000', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_cross_sells_autoplay_callback',
	) ) );

	/* End Cross Sells Product Slide Per Delay */

	if ( ! function_exists( 'hongo_single_product_cross_sells_autoplay_callback' ) ) :
	   	function hongo_single_product_cross_sells_autoplay_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_autoplay' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells_slider' )->value() == 1 && $control->manager->get_setting( 'hongo_single_product_enable_cross_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Cross Sells Product Heading Typography Separator setting */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_typography', array(
	    'label'				=> __( 'Cross sells title typography', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_single_product_cross_sells_product_heading_typography',
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Typography Separator setting */

	/* Cross Sells Product Heading Font Size */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_product_heading_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Size */

	/* Cross Sells Product Heading Line Height */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_product_heading_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Line Height */

	/* Cross Sells Product Heading Letter Spacing */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Letter Spacing */

	/* Cross Sells Product Heading Font Weight */

    $wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_single_product_cross_sells_product_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Weight */

	/* Cross Sells Product Heading Color */

	$wp_customize->add_setting( 'hongo_single_product_cross_sells_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_single_product_cross_sells_product_heading_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_single_product_cross_sells_product_heading_color',
		'active_callback'	=> 'hongo_single_product_cross_sells_callback',
	) ) );
	
	/* End Cross Sells Product Heading Color */

	

	/*
	 * Cart layout setting panel.
	 */


	/* Cart Table Heading Separator */

	$wp_customize->add_setting( 'hongo_cart_table_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_table_heading_separator', array(
	    'label'				=> __( 'Table title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_table_heading_separator',	    
	) ) );

	/* End Cart Table Heading Separator */

	/* Cart Table Heading Font Size */

    $wp_customize->add_setting( 'hongo_cart_table_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_heading_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_heading_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Heading Font Size */

	/* Cart Table Heading Line Height */

    $wp_customize->add_setting( 'hongo_cart_table_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_heading_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_heading_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Heading Line Height */

	/* Cart Table Heading Letter Spacing */

    $wp_customize->add_setting( 'hongo_cart_table_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_heading_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Heading Letter Spacing */

	/* Cart Table Heading Text Transform */

    $wp_customize->add_setting( 'hongo_cart_table_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_heading_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Cart Table Heading Text Transform */

	/* Cart Table Heading Font Weight */

    $wp_customize->add_setting( 'hongo_cart_table_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Cart Table Heading Font Weight */

	/* Cart Table Heading Color */

	$wp_customize->add_setting( 'hongo_cart_table_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_table_heading_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_table_heading_color',
	) ) );

	/* End Cart Table Heading Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_cart_table_content_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_table_content_separator', array(
	    'label'				=> __( 'Table content typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_table_content_separator',	    
	) ) );

	/* End Separator Settings */

	/* Cart Table Content Font Size */

    $wp_customize->add_setting( 'hongo_cart_table_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_content_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_content_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Content Font Size */

	/* Cart Table Content Line Height */

    $wp_customize->add_setting( 'hongo_cart_table_content_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_content_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_content_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Content Line Height */

	/* Cart Table Content Letter Spacing */

    $wp_customize->add_setting( 'hongo_cart_table_content_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_content_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_content_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Cart Table Content Letter Spacing */

	/* Cart Table Content Text Transform */

    $wp_customize->add_setting( 'hongo_cart_table_content_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_content_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_content_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Cart Table Content Text Transform */

	/* Cart Table Content Font Weight */

    $wp_customize->add_setting( 'hongo_cart_table_content_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_table_content_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_table_content_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Cart Table Content Font Weight */

	/* Cart Table Content Color */

	$wp_customize->add_setting( 'hongo_cart_table_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_table_content_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_table_content_color',
	) ) );

	/* End Cart Table Content Color */

	/* Cart Table Content Hover Color */

	$wp_customize->add_setting( 'hongo_cart_table_content_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_table_content_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_table_content_hover_color',
	) ) );

	/* End Cart Table Content Hover Color */

	/* Cart Table Quantity Border Color */

	$wp_customize->add_setting( 'hongo_cart_table_quantity_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_table_quantity_border_color', array(
	    'label'				=> __( 'Quantity border color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_table_quantity_border_color',
	) ) );

	/* End Cart Table Quantity Border Color */

	/* Empty Cart and Update Cart Color */
	$wp_customize->add_setting( 'hongo_cart_empty_cart_color', array(
		'default'     		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_empty_cart_color', array(
	    'label'				=> __( 'Empty / Update cart color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_empty_cart_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Empty Cart and Update Cart Color */

	/* Coupon Separator setting */

	$wp_customize->add_setting( 'hongo_cart_coupon_seperator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_coupon_seperator', array(
	    'label'				=> __( 'Coupon colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_coupon_seperator',
		'active_callback'	=> 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End Coupon Separator setting */

	/* Coupon Input Color */
	$wp_customize->add_setting( 'hongo_cart_coupon_color', array(
		'default'    		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_coupon_color', array(
	    'label'				=> __( 'Coupon input color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_coupon_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Coupon Input Color */

	/* Coupon Placeholder Color */
	$wp_customize->add_setting( 'hongo_cart_coupon_placeholder_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_coupon_placeholder_color', array(
	    'label'				=> __( 'Coupon input placeholder color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_coupon_placeholder_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Placeholder Color */

	/* Coupon border Color */
	$wp_customize->add_setting( 'hongo_cart_coupon_border_color', array(
		'default'    		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_coupon_border_color', array(
	    'label'				=> __( 'Coupon input border color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_coupon_border_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Coupon border Color */

	/* Coupon Button Color */
	$wp_customize->add_setting( 'hongo_cart_coupon_button_color', array(
		'default'     		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_coupon_button_color', array(
	    'label'				=> __( 'Coupon button color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_coupon_button_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Coupon Button Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_cart_heading_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_heading_separator', array(
	    'label'				=> __( 'Cart box title typography and color', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_heading_separator',	    
	) ) );

	/* End Separator Settings */

	/* Cart Heading Font Size */

    $wp_customize->add_setting( 'hongo_cart_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_heading_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_heading_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Heading Cart Font Size */

	/* Cart Heading Line Height */

    $wp_customize->add_setting( 'hongo_cart_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_heading_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_heading_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Cart Heading Line Height */

	/* Cart Heading Letter Spacing */

    $wp_customize->add_setting( 'hongo_cart_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_heading_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Cart Heading Letter Spacing */

	/* Cart Heading Text Transform */

    $wp_customize->add_setting( 'hongo_cart_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_heading_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Cart Heading Text Transform */

	/* Cart Heading Font Weight */

    $wp_customize->add_setting( 'hongo_cart_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_heading_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_heading_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Cart Heading Font Weight */

	/* Cart Heading Color */

	$wp_customize->add_setting( 'hongo_cart_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_heading_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_heading_color',
	) ) );

	/* End Cart Heading Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_cart_button_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_button_separator', array(
	    'label'				=> __( 'Button typography and colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_button_separator',	    
	) ) );

	/* End Separator Settings */

	/* Cart Button Font Size */

    $wp_customize->add_setting( 'hongo_cart_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_button_font_size', array(
		'label'				=> __( 'Font size', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_button_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'hongo' ),
	) ) );

	/* End Button Cart Font Size */
	
	/* Cart Button Line Height */

    $wp_customize->add_setting( 'hongo_cart_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_button_line_height', array(
		'label'				=> __( 'Line height', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_button_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'hongo' ),
	) ) );

	/* End Cart Button Line Height */

	/* Cart Button Letter Spacing */

    $wp_customize->add_setting( 'hongo_cart_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_button_letter_spacing', array(
		'label'				=> __( 'Letter spacing', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_button_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'hongo' ),
	) ) );

	/* End Cart Button Letter Spacing */

	/* Cart Button Text Transform */

    $wp_customize->add_setting( 'hongo_cart_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_button_text_transform', array(
		'label'				=> __( 'Text case', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_button_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''				=> esc_html__( 'Select', 'hongo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'hongo' ),
								    'lowercase'		=> esc_html__( 'Lowercase', 'hongo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'hongo' ),
								    'none'			=> esc_html__( 'None', 'hongo' ),
							   ),
	) ) );

	/* End Cart Button Text Transform */

	/* Cart Button Font Weight */

    $wp_customize->add_setting( 'hongo_cart_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_cart_button_font_weight', array(
		'label'				=> __( 'Font weight', 'hongo' ),
		'section'     		=> 'woocommerce_cart',
		'settings'			=> 'hongo_cart_button_font_weight',
		'type'              => 'select',
		'choices'           => $hongo_font_weight,
	) ) );

	/* End Cart Button Font Weight */

	/* Cart Button Background Color */

	$wp_customize->add_setting( 'hongo_cart_bg_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_bg_button_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_bg_button_color',
	) ) );
	/* End Cart Button Background Color */

	/* Cart Button Background Hover Color */

	$wp_customize->add_setting( 'hongo_cart_bg_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_bg_hover_button_color', array(
	    'label'				=> __( 'Background hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_bg_hover_button_color',
	) ) );
	/* End Cart Button Background Hover Color */

	/* Cart Button Color */

	$wp_customize->add_setting( 'hongo_cart_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_button_color', array(
	    'label'				=> __( 'Color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_button_color',
	) ) );
	/* End Cart Button Color */

	/* Cart Button Hover Color */

	$wp_customize->add_setting( 'hongo_cart_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_button_hover_color', array(
	    'label'				=> __( 'Hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_button_hover_color',
	) ) );
	/* End Cart Button Hover Color */

	/* Cart Border Button Color */

	$wp_customize->add_setting( 'hongo_cart_border_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_border_button_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_border_button_color',
	) ) );
	/* End Cart Border Button Color */

	/* Cart Border Button Hover Color */

	$wp_customize->add_setting( 'hongo_cart_border_hover_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_border_hover_button_color', array(
	    'label'				=> __( 'Border hover color', 'hongo' ),
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_border_hover_button_color',
	) ) );
	
	/* End Border Cart Button Hover Color */
	
	/* General Separator setting */

	$wp_customize->add_setting( 'hongo_cart_general_seperator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_cart_general_seperator', array(
	    'label'				=> __( 'Cart box colors', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'woocommerce_cart',
	    'settings'   		=> 'hongo_cart_general_seperator',
		'active_callback'	=> 'hongo_single_product_cross_sells_slider_callback',
	) ) );

	/* End General Separator setting */

	/* Content Right Background Color */
	$wp_customize->add_setting( 'hongo_cart_right_box_bg_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_right_box_bg_color', array(
	    'label'				=> __( 'Background color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_right_box_bg_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Right Background Color */

	/* Content Right Background Color */
	$wp_customize->add_setting( 'hongo_cart_border_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_border_color', array(
	    'label'				=> __( 'Border color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_border_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Right Background Color */

	/* Content Heading Color */
	$wp_customize->add_setting( 'hongo_cart_box_content_heading_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_box_content_heading_color', array(
	    'label'				=> __( 'Content heading color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_box_content_heading_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Content Heading Color */

	/* Box Content Color */
	$wp_customize->add_setting( 'hongo_cart_box_content_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_box_content_color', array(
	    'label'				=> __( 'Content color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_box_content_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Box Content Color */

	/* Box Content Color */
	$wp_customize->add_setting( 'hongo_cart_total_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_cart_total_color', array(
	    'label'				=> __( 'Total color', 'hongo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'woocommerce_cart',
	    'settings'	 		=> 'hongo_cart_total_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );
	/* End Box Content Color */


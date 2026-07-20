<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }
	
	/* Custom Icons Separator Settings */
	$wp_customize->add_setting( 'hongo_products_icon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_products_icon_separator', array(
	    'label'				=> __( 'Product Icons', 'hongo' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_products_icon_separator',
	    'priority'	 		=> 2,
	) ) );

	/* Custom Icons Separator Settings */

	
	/* Add To Cart For Icon */

	$wp_customize->add_setting( 'hongo_single_product_add_to_cart_icon', array(
		'default' 			=> 'icon-basket',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_add_to_cart_icon', array(
		'label'			=> __( 'Add to cart icon', 'hongo' ),
		'section'     	=> 'hongo_woocommerce_general_panel',
		'settings'		=> 'hongo_single_product_add_to_cart_icon',
		'type'          => 'hongo_preview_icon',
		'choices'       => array(
							'fas fa-cart-arrow-down' => __( 'fas fa-cart-arrow-down', 'hongo' ),
							'fas fa-cart-plus'       => __( 'fas fa-cart-plus', 'hongo' ),
							'fas fa-dolly' 			 => __( 'fas fa-dolly', 'hongo' ),
							'fas fa-dolly-flatbed'   => __( 'fas fa-dolly-flatbed', 'hongo' ),
							'fas fa-shopping-cart'   => __( 'fas fa-shopping-cart', 'hongo' ),
							'fas fa-shopping-bag'    => __( 'fas fa-shopping-bag', 'hongo' ),
							'fas fa-shopping-basket' => __( 'fas fa-shopping-basket', 'hongo' ),
							'ti-shopping-cart' 		 => __( 'ti-shopping-cart', 'hongo' ),
							'ti-shopping-cart-full'  => __( 'ti-shopping-cart-full', 'hongo' ),
							'ti-bag'                 => __( 'ti-bag', 'hongo' ),
							'icon-basket-loaded'	 => __( 'icon-basket-loaded', 'hongo' ),
							'icon-basket'			 => __( 'icon-basket', 'hongo' ),
							'icon-bag'				 => __( 'icon-bag', 'hongo' ),
							'icon-handbag'           => __( 'icon-handbag', 'hongo' ),
							'et-basket'           	 => __( 'et-basket', 'hongo' ),
						),
		'hongo_img'		=> array(
							'fas fa-cart-arrow-down',
							'fas fa-cart-plus',
							'fas fa-dolly',
							'fas fa-dolly-flatbed',
							'fas fa-shopping-cart',
							'fas fa-shopping-bag',
							'fas fa-shopping-basket',
							'ti-shopping-cart',
							'ti-shopping-cart-full',
							'ti-bag',
							'icon-basket-loaded',
							'icon-basket',
							'icon-bag',
							'icon-handbag',
							'et-basket',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 2,
	) ) );

	/* End Add To Cart For Icon */

	/* Add To Cart Fill Icon */

	$wp_customize->add_setting( 'hongo_single_product_add_to_cart_fill_icon', array(
		'default' 			=> 'icon-basket-loaded',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_add_to_cart_fill_icon', array(
		'label'			=> __( 'Add to cart fill icon', 'hongo' ),
		'section'     	=> 'hongo_woocommerce_general_panel',
		'settings'		=> 'hongo_single_product_add_to_cart_fill_icon',
		'type'          => 'hongo_preview_icon',
		'choices'       => array(
							'fas fa-dolly' 			 => __( 'fas fa-dolly', 'hongo' ),
							'fas fa-dolly-flatbed'   => __( 'fas fa-dolly-flatbed', 'hongo' ),
							'ti-shopping-cart-full'  => __( 'ti-shopping-cart-full', 'hongo' ),
							'icon-basket-loaded'	 => __( 'icon-basket-loaded', 'hongo' ),
						),
		'hongo_img'		=> array(
							'fas fa-dolly',
							'fas fa-dolly-flatbed',
							'ti-shopping-cart-full',
							'icon-basket-loaded',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 2,
	) ) );

	/* End Add To Cart Fill Icon */

	/* Variable Product Icon */

	$wp_customize->add_setting( 'hongo_single_product_variable_product_icon', array(
		'default' 			=> 'icon-layers',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_variable_product_icon', array(
		'label'				=> __( 'Variable product icon', 'hongo' ),
		'section'     	=> 'hongo_woocommerce_general_panel',
		'settings'		=> 'hongo_single_product_variable_product_icon',
		'type'          => 'hongo_preview_icon',
		'choices'       => array(
							'fas fa-th-large' 	  => __( 'fas fa-th-large', 'hongo' ),
							'ti-layers-alt'       => __( 'ti-layers-alt', 'hongo' ),
							'ti-more'     		  => __( 'ti-more', 'hongo' ),
							'ti-layout-grid2'	  => __( 'ti-layout-grid2', 'hongo' ),
							'ti-view-grid'   	  => __( 'ti-view-grid', 'hongo' ),
							'ti-layout-grid2-alt' => __( 'ti-layout-grid2-alt', 'hongo' ),
							'icon-grid'  		  => __( 'icon-grid', 'hongo' ),
							'icon-layers'	 	  => __( 'icon-layers', 'hongo' ),
							'et-layers'   		  => __( 'et-layers', 'hongo' ),
						),
		'hongo_img'		=> array(
							'fas fa-th-large',
							'ti-layers-alt',
							'ti-more',
							'ti-layout-grid2',
							'ti-view-grid',
							'ti-layout-grid2-alt',
							'icon-grid',
							'icon-layers',
							'et-layers',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 2,
	) ) );

	/* End Variable Product Icon */

	/* Group Product Icon */

	$wp_customize->add_setting( 'hongo_single_product_group_product_icon', array(
		'default' 			=> 'ti-layers',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_group_product_icon', array(
		'label'				=> __( 'Group product icon', 'hongo' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_single_product_group_product_icon',
		'type'				=> 'hongo_preview_icon',
		'choices'			=> 	array(
									'far fa-clone' 	  	  => __( 'far fa-clone', 'hongo' ),
									'ti-layers' 		  => __( 'ti-layers', 'hongo' ),
									'icon-social-dropbox' => __( 'icon-social-dropbox', 'hongo' ),
								),
		'hongo_img'			=> 	array(
									'far fa-clone',
									'ti-layers',
									'icon-social-dropbox',
								),
		'hongo_columns' 	=> '3',
		'priority'	 		=> 2,
	) ) );

	/* End Group Product Icon */

	/* My account Icons */

	$wp_customize->add_setting( 'hongo_header_myaccount_icon', array(
		'default' 			=> 'icon-user',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_header_myaccount_icon', array(
		'label'				=> __( 'My Account icon', 'hongo' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_header_myaccount_icon',
		'type'				=> 'hongo_preview_icon',
		'choices'			=> 	array(
									'icon-user' 	  	  => __( 'icon-user', 'hongo' ),
									'fas fa-user' 		  => __( 'fas fa-user', 'hongo' ),
									'far fa-user' 		  => __( 'far fa-user', 'hongo' ),
									'fas fa-user-tie' 	  => __( 'fas fa-user-tie', 'hongo' ),
								),
		'hongo_img'			=> 	array(
									'icon-user',
									'fas fa-user',
									'far fa-user',
									'fas fa-user-tie',
								),
		'hongo_columns' 	=> '3',
		'priority'	 		=> 5,
	) ) );

	/* End Accoount Icons */

	/* My account Icons */

	$wp_customize->add_setting( 'hongo_header_minicart_icon', array(
		'default' 			=> 'icon-basket',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_header_minicart_icon', array(
		'label'				=> __( 'Mini cart icon', 'hongo' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_header_minicart_icon',
		'type'				=> 'hongo_preview_icon',
		'choices'			=> 	array(
									'icon-basket' 	  	  => __( 'icon-basket', 'hongo' ),
									'fas fa-cart-arrow-down' => __( 'fas fa-cart-arrow-down', 'hongo' ),
									'fas fa-cart-plus'       => __( 'fas fa-cart-plus', 'hongo' ),
									'fas fa-dolly' 			 => __( 'fas fa-dolly', 'hongo' ),
									'fas fa-dolly-flatbed'   => __( 'fas fa-dolly-flatbed', 'hongo' ),
									'fas fa-shopping-cart'   => __( 'fas fa-shopping-cart', 'hongo' ),
									'fas fa-shopping-bag'    => __( 'fas fa-shopping-bag', 'hongo' ),
									'fas fa-shopping-basket' => __( 'fas fa-shopping-basket', 'hongo' ),
									'ti-shopping-cart' 		 => __( 'ti-shopping-cart', 'hongo' ),
									'ti-shopping-cart-full'  => __( 'ti-shopping-cart-full', 'hongo' ),
									'ti-bag'                 => __( 'ti-bag', 'hongo' ),
									'icon-basket-loaded'	 => __( 'icon-basket-loaded', 'hongo' ),
									'icon-bag'				 => __( 'icon-bag', 'hongo' ),
									'icon-handbag'           => __( 'icon-handbag', 'hongo' ),
									'et-basket'           	 => __( 'et-basket', 'hongo' ),
								),
		'hongo_img'			=> array(
								'icon-basket',
								'fas fa-cart-arrow-down',
								'fas fa-cart-plus',
								'fas fa-dolly',
								'fas fa-dolly-flatbed',
								'fas fa-shopping-cart',
								'fas fa-shopping-bag',
								'fas fa-shopping-basket',
								'ti-shopping-cart',
								'ti-shopping-cart-full',
								'ti-bag',
								'icon-basket-loaded',
								'icon-bag',
								'icon-handbag',
								'et-basket',
							),
		'hongo_columns' 	=> '3',
		'priority'	 		=> 5,
	) ) );

	/* End Accoount Icons */

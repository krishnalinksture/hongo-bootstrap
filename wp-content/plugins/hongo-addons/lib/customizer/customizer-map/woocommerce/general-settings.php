<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	$product_ids 	= hongo_product_list_array();
	$product_list  = array( '' => 'Select' );
	foreach( $product_ids as $key => $value ) {
		
		$product_list[$key] = $value;
	}

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_catalog_mode_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_catalog_mode_separator', array(
	    'label'     		=> __( 'Catalog mode', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_catalog_mode_separator',
	    'priority'	 		=> 1,
	) ) );
	/* End Separator Settings */

	/* Woocommerce Catalog Mod  */

    $wp_customize->add_setting( 'hongo_woocommerce_enable_catalog_mode', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_woocommerce_enable_catalog_mode', array(
		'label'     		=> __( 'Catalog mode', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_woocommerce_enable_catalog_mode',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'	 		=> 1,
	) ) );

	/* End Woocommerce Catalog Mod */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_login_mode_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_login_mode_separator', array(
	    'label'     		=> __( 'Login to see price and purchase', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_login_mode_separator',
	    'priority'	 		=> 1,
	) ) );
	/* End Separator Settings */

	/* Woocommerce Login to See Price & Purchase Mod  */

    $wp_customize->add_setting( 'hongo_woocommerce_enable_login_mode', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_woocommerce_enable_login_mode', array(
		'label'     		=> __( 'Login to see price and purchase', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_woocommerce_enable_login_mode',
		'type'				=> 'hongo_switch',
		'choices'			=> 	array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
									'0' => esc_html__( 'Off', 'hongo-addons' ),
								),
		'priority'	 		=> 1,
	) ) );

	/* End Woocommerce Login to See Price & Purchase Mod */

	/* Separator Settings */
	$wp_customize->add_setting( 'hongo_info_messages_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_info_messages_separator', array(
	    'label'     		=> __( 'Info messages', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_info_messages_separator',
	    'priority'	 		=> 2,
	) ) );
	/* End Separator Settings */

	/* Info messages style setting */
    $wp_customize->add_setting( 'hongo_info_messages_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Image_Control( $wp_customize, 'hongo_info_messages_style', array(
		'label'     		=> __( 'Style', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_info_messages_style',
		'priority'	 		=> 2,
		'type'              => 'hongo_preview_image',
		'choices'           => array(
									''			=> esc_html__( 'Default', 'hongo-addons' ),
								    'style-1' 	=> esc_html__( 'Style 1', 'hongo-addons' ),
								    'style-2'	=> esc_html__( 'Style 2', 'hongo-addons' ),
								    'style-3'	=> esc_html__( 'Style 3', 'hongo-addons' ),
								),
		'hongo_img'			=> array(
									HONGO_ADDONS_ROOT_DIR.'/assets/images/message-style-default.jpg',
									HONGO_ADDONS_ROOT_DIR.'/assets/images/message-style-1.jpg',
									HONGO_ADDONS_ROOT_DIR.'/assets/images/message-style-2.jpg',
									HONGO_ADDONS_ROOT_DIR.'/assets/images/message-style-3.jpg',
							   ),
		'hongo_columns'    	=> '1',
	) ) );
	/* End Info messages style setting */

	/* Quick View For Icon */
	$wp_customize->add_setting( 'hongo_single_product_quick_view_icon', array(
		'default' 			=> 'icon-eye',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_quick_view_icon', array(
		'label'     	=> __( 'Quick view icon', 'hongo-addons' ),
		'section'     	=> 'hongo_woocommerce_general_panel',
		'settings'		=> 'hongo_single_product_quick_view_icon',
		'type'          => 'hongo_preview_icon',
		'choices'       => array(
							'fas fa-eye'    		=> __( 'fas fa-eye', 'hongo-addons' ),
							'far fa-eye' 			=> __( 'far fa-eye', 'hongo-addons' ),
							'ti-eye'     			=> __( 'ti-eye', 'hongo-addons' ),
							'icon-eye'     			=> __( 'icon-eye', 'hongo-addons' ),
						),
		'hongo_img'		=> array(
							'fas fa-eye',
							'far fa-eye',
							'ti-eye',
							'icon-eye',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 3,
	) ) );

	/* End Quick View Social Icon */

	/* Wishlist For Icon */

	$wp_customize->add_setting( 'hongo_single_product_wishlish_icon', array(
		'default' 			=> 'icon-heart',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_wishlish_icon', array(
		'label'     		=> __( 'Wishlist icon', 'hongo-addons' ),
		'section'     	=> 'hongo_woocommerce_general_panel',
		'settings'		=> 'hongo_single_product_wishlish_icon',
		'type'          => 'hongo_preview_icon',
		'choices'       => array(
							'far fa-heart' => __( 'far fa-heart', 'hongo-addons' ),
							'ti-heart'	   => __( 'ti-heart', 'hongo-addons' ),
							'icon-heart'   => __( 'icon-heart', 'hongo-addons' ),
							'et-heart'     => __( 'et-heart', 'hongo-addons' ),
						),
		'hongo_img'		=> array(
							'far fa-heart',
							'ti-heart',
							'icon-heart',
							'et-heart',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 4,
	) ) );

	/* End Wishlist Social Icon */

	/* Compare For Icon */

	$wp_customize->add_setting( 'hongo_single_product_compare_icon', array(
		'default' 			=> 'ti-control-shuffle',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_single_product_compare_icon', array(
		'label'     		=> __( 'Compare icon', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_single_product_compare_icon',
		'type'          	=> 'hongo_preview_icon',
		'choices'       	=> 	array(
									'fas fa-exchange-alt' 	=> __( 'fas fa-exchange-alt', 'hongo-addons' ),
									'fas fa-retweet' 		=> __( 'fas fa-retweet', 'hongo-addons' ), 
									'ti-split-h' 			=> __( 'ti-split-h', 'hongo-addons' ),
									'ti-split-v-alt' 		=> __( 'ti-split-v-alt', 'hongo-addons' ),
									'ti-exchange-vertical' 	=> __( 'ti-exchange-vertical', 'hongo-addons' ),
									'ti-control-shuffle' 	=> __( 'ti-control-shuffle', 'hongo-addons' ), 
									'ti-loop' 				=> __( 'ti-loop', 'hongo-addons' ),
									'ti-reload' 			=> __( 'ti-reload', 'hongo-addons' ),
									'ti-layout-slider' 		=> __( 'ti-layout-slider', 'hongo-addons' ),
								),
		'hongo_img'		=> array(
							'fas fa-exchange-alt',
							'fas fa-retweet',
							'ti-split-h',
							'ti-split-v-alt',
							'ti-exchange-vertical',
							'ti-control-shuffle', 
							'ti-loop',
							'ti-reload',
							'ti-layout-slider',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 5,
	) ) );

	/* End Compare Social Icon */

	/* Custom Icons Separator Settings */
	$wp_customize->add_setting( 'hongo_header_icon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_header_icon_separator', array(
	    'label'				=> __( 'Header Icons', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_header_icon_separator',
	    'priority'	 		=> 5,
	) ) );

	/* Custom Icons Separator Settings */

	/* Search Icon */

	$wp_customize->add_setting( 'hongo_header_search_icon', array(
		'default' 			=> 'icon-magnifier',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_header_search_icon', array(
		'label'     		=> __( 'Search icon', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_header_search_icon',
		'type'          	=> 'hongo_preview_icon',
		'choices'       	=> 	array(
									'icon-magnifier' 	=> __( 'icon-magnifier', 'hongo-addons' ),
									'et-search'			=> __( 'et-search', 'hongo-addons' ),
								),
		'hongo_img'		=> array(
							'icon-magnifier',
							'et-search'
						),
		'hongo_columns' => '3',
		'priority'	 		=> 5,
	) ) );

	/* End Search Icon */

	/* Header Wishlist Icon */

	$wp_customize->add_setting( 'hongo_header_wishlist_icon', array(
		'default' 			=> 'icon-heart',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Preview_Icon_Control( $wp_customize, 'hongo_header_wishlist_icon', array(
		'label'     		=> __( 'Wishlist icon', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_header_wishlist_icon',
		'type'          	=> 'hongo_preview_icon',
		'choices'       	=> 	array(
									'far fa-heart' => __( 'far fa-heart', 'hongo-addons' ),
									'ti-heart'	   => __( 'ti-heart', 'hongo-addons' ),
									'icon-heart'   => __( 'icon-heart', 'hongo-addons' ),
									'et-heart'     => __( 'et-heart', 'hongo-addons' ),
								),
		'hongo_img'		=> array(
							'far fa-heart',
							'ti-heart',
							'icon-heart',
							'et-heart',
						),
		'hongo_columns' => '3',
		'priority'	 		=> 5,
	) ) );

	/* End Header Wishlist Icon */

	/* Smart Product Separator Settings */
	$wp_customize->add_setting( 'hongo_smart_product_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_smart_product_separator', array(
	    'label'     		=> __( 'Smart product', 'hongo-addons' ),
	    'type'              => 'hongo_separator',
	    'section'    		=> 'hongo_woocommerce_general_panel',
	    'settings'   		=> 'hongo_smart_product_separator',
	    'priority'	 		=> 6,
	) ) );
	/* End Separator Settings */

	/* Enable Smart Product */
    $wp_customize->add_setting( 'hongo_enable_smart_product', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_smart_product', array(
		'label'     		=> __( 'Enable smart product', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_enable_smart_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'hongo-addons' ),
								  	'0' => esc_html__( 'Off', 'hongo-addons' ),
							   ),
		'priority'	 		=> 6,
	) ) );
	/* Enable Smart Product */

	/* End Smart Product */

	$wp_customize->add_setting( 'hongo_single_smart_product', array(
		'sanitize_callback' => 'esc_attr',
		'default'           => '',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_single_smart_product', array(
		'label'     		=> __( 'Smart product', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'type'          	=> 'select',
		'settings'			=> 'hongo_single_smart_product',
		'choices'       	=> $product_list,
		'priority'	 		=> 6,
		'active_callback'	=> 'hongo_enable_smart_product_callback',
	) ) );

	/* End Select Smart Product */

	/* Show Smart Product Display after */

	$wp_customize->add_setting( 'hongo_display_smart_product_after', array(
		'default' 			=> 'some-time',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_display_smart_product_after', array(
		'label'     		=> __( 'Display smart product after', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_display_smart_product_after',
		'type'              => 'select',
		'choices'           => array(
								    'some-time' 	=> esc_html__( 'Some time', 'hongo-addons' ),
								    'user-scroll'	=> esc_html__( 'User scroll', 'hongo-addons' ),
								   ),
		'active_callback'	=> 'hongo_enable_smart_product_callback',
		'priority'	 		=> 6,
	) ) );

	/* End Show Smart Product Display after */

	/* Smart Product Delay Time*/
	$wp_customize->add_setting( 'hongo_delay_time_smart_product', array(
		'default' 			=> '100',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_delay_time_smart_product', array(
		'label'     		=> __( 'Delay time', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_delay_time_smart_product',
		'type'              => 'text',
		'active_callback'	=> 'hongo_delay_time_smart_product_callback',
		'priority'	 		=> 6,
		'description'       => esc_html__( 'Show popup after some time (in milliseconds)', 'hongo-addons' ),
	) ) );

	if ( ! function_exists( 'hongo_delay_time_smart_product_callback' ) ) :
	   	function hongo_delay_time_smart_product_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_display_smart_product_after' )->value() == 'some-time' && $control->manager->get_setting( 'hongo_enable_smart_product' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Smart Product Delay Time */

	/* Smart Product Scoll*/
	$wp_customize->add_setting( 'hongo_scroll_smart_product', array(
		'default' 			=> '200',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_scroll_smart_product', array(
		'label'     		=> __( 'Scroll', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_scroll_smart_product',
		'type'              => 'text',
		'active_callback'	=> 'hongo_scroll_smart_product_callback',
		'priority'	 		=> 6,
		'description'       => esc_html__( 'Number of pixels users have to scroll down before popup opens', 'hongo-addons' ),
	) ) );

	if ( ! function_exists( 'hongo_scroll_smart_product_callback' ) ) :
	   	function hongo_scroll_smart_product_callback( $control )	{
	        if ( $control->manager->get_setting( 'hongo_display_smart_product_after' )->value() == 'user-scroll' && $control->manager->get_setting( 'hongo_enable_smart_product' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Smart Product Scoll */

	/* Cookie Days */

	$wp_customize->add_setting( 'hongo_smart_product_cokkie_expire', array(
		'default' 			=> '7',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_smart_product_cokkie_expire', array(
		'label'     		=> __( 'Re-open popup after (in days)', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_smart_product_cokkie_expire',
		'type'              => 'text',
		'active_callback'   => 'hongo_enable_smart_product_callback',
		'description'		=> esc_html__( 'By default popup will display again after 7 days', 'hongo-addons' ),
		'priority'	 		=> 6,
	) ) );

	/* End Compare Product Heading Text */

	/* Mobile Device Enable Promo Popup */

    $wp_customize->add_setting( 'hongo_enable_mobile_smart_product', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_mobile_smart_product', array(
		'label'     		=> __( 'Mobile smart product', 'hongo-addons' ),
		'section'     		=> 'hongo_woocommerce_general_panel',
		'settings'			=> 'hongo_enable_mobile_smart_product',
		'type'              => 'hongo_switch',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'hongo-addons' ),
								  	'0' => esc_html__( 'No', 'hongo-addons' ),
							   ),
		'priority'	 		=> 6,
		'active_callback'	=> 'hongo_enable_smart_product_callback',
	) ) );

	/* End Enable Promo Popup */

	if ( ! function_exists( 'hongo_enable_smart_product_callback' ) ) :
		function hongo_enable_smart_product_callback( $control ){
			if ( $control->manager->get_setting( 'hongo_enable_smart_product' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
<?php

	/* Exit if accessed directly. */
	if ( ! defined( 'ABSPATH' ) ) { exit; }

		$hongo_promo_popup_section_array = hongo_addons_get_builder_section_data( 'promopopup' );
	
		/* Separator Settings */
		$wp_customize->add_setting( 'hongo_under_maintenance_separator', array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_under_maintenance_separator', array(
		    'label'     		=> __( 'Under Construction', 'hongo-addons' ),
		    'type'              => 'hongo_separator',
		    'section'   		=> 'hongo_add_under_contruction_panel',
		    'settings'  		=> 'hongo_under_maintenance_separator',
		    'priority'	 		=> 1,
		) ) );

		/* End Separator Settings */
		
		/* Set Under Construction page */

		$wp_customize->add_setting( 'hongo_enable_under_maintenance', array(
			'default' 			=> 0,
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_under_maintenance', array(
			'label'     		=> __( 'Under construction', 'hongo-addons' ),
			'section'   		=> 'hongo_add_under_contruction_panel',
			'settings'			=> 'hongo_enable_under_maintenance',
			'type'              => 'hongo_switch',
			'choices'   		=> array(
											'1' => __( 'On', 'hongo-addons' ),
										  	'0' => __( 'Off', 'hongo-addons' ),
									   	),
			'priority'	 		=> 1,
		) ) );

		$wp_customize->add_setting( 'hongo_enable_under_maintenance_pages', array(
			'default' 			=> '0',
			'sanitize_callback' => 'esc_attr'
		) );


		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_enable_under_maintenance_pages', array(
			'label'     		=> __( 'Under construction page', 'hongo-addons' ),
			'section'     		=> 'hongo_add_under_contruction_panel',
			'settings'			=> 'hongo_enable_under_maintenance_pages',
			'type'             	=> 'dropdown-pages',
			'active_callback'   => 'hongo_under_construction_page_callback',
			'priority'	 		=> 1,
		) ));

		/* Custom Callback Functions */
		if ( ! function_exists( 'hongo_under_construction_page_callback' ) ) :
			function hongo_under_construction_page_callback( $control ) {
				if ( $control->manager->get_setting( 'hongo_enable_under_maintenance' )->value() == '1' ) {
			        return true;
			    } else {
			    	return false;
			    }
			}
		endif;

		/* Separator Settings */
		$wp_customize->add_setting( 'hongo_promo_popup_separator', array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_promo_popup_separator', array(
		    'label'     		=> __( 'Promo popup setting', 'hongo-addons' ),
		    'type'              => 'hongo_separator',
		    'section'    		=> 'hongo_add_promo_popup_panel',
		    'settings'   		=> 'hongo_promo_popup_separator',
		    'priority'	 		=> 3, 
		) ) );

		/* End Separator Settings */

		/* Enable Promo Popup */

	    $wp_customize->add_setting( 'hongo_enable_promo_popup', array(
			'default' 			=> '0',
			'sanitize_callback' => 'esc_attr'
		) );

	    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_promo_popup', array(
			'label'     		=> __( 'Promo popup', 'hongo-addons' ),
			'section'     		=> 'hongo_add_promo_popup_panel',
			'settings'			=> 'hongo_enable_promo_popup',
			'type'              => 'hongo_switch',
			'choices'           => array(
										'1' => __( 'Yes', 'hongo-addons' ),
									  	'0' => __( 'No', 'hongo-addons' ),
								   ),
			'priority'	 		=> 3,
		) ) );

		/* End Enable Promo Popup */

		/* Enable Promo Popup Only Home Page */

	    $wp_customize->add_setting( 'hongo_enable_promo_popup_on_home_page', array(
			'default' 			=> '0',
			'sanitize_callback' => 'esc_attr'
		) );

	    $wp_customize->add_control( new Hongo_Customize_Switch_Control( $wp_customize, 'hongo_enable_promo_popup_on_home_page', array(
			'label'     		=> __( 'Promo popup only home page', 'hongo-addons' ),
			'section'     		=> 'hongo_add_promo_popup_panel',
			'settings'			=> 'hongo_enable_promo_popup_on_home_page',
			'type'              => 'hongo_switch',
			'active_callback' 	=> 'hongo_promo_popup_enable_callback',
			'choices'           => array(
										'1' => __( 'Yes', 'hongo-addons' ),
									  	'0' => __( 'No', 'hongo-addons' ),
								   ),
			'priority'	 		=> 3,
		) ) );

		/* End Enable Promo Popup Only Home Page */

		$wp_customize->add_setting( 'hongo_promo_popup_section', array(
			'default' 			=> '1',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_promo_popup_section', array(
			'label'     		=> __( 'Promo popup section', 'hongo-addons' ),
			'type'              => 'select',
			'section'     		=> 'hongo_add_promo_popup_panel',
			'settings'			=> 'hongo_promo_popup_section',
			'choices'           => $hongo_promo_popup_section_array,
			'active_callback' 	=> 'hongo_promo_popup_enable_callback',
			'description'		=> sprintf( __( '<a target="_blank" href="%s">Click here </a>to create / manage promo popup in the section builder.', 'hongo-addons' ), admin_url( 'edit.php?post_type=hongobuilder&builder_type=promopopup' ) ),
			'priority'	 		=> 3,
		) ) );

		// Mini header callback
		if ( ! function_exists( 'hongo_promo_popup_enable_callback' ) ) {
	        function hongo_promo_popup_enable_callback( $control ) {
	                if ( $control->manager->get_setting( 'hongo_enable_promo_popup' )->value() == '1' ) {
	                return true;
	            } else {
	                return false;
	            }
	        }
		}

		/* Enable Promo Popup */
		
		/* Search Popup Settings */
		$wp_customize->add_setting( 'hongo_search_popup_typography_separator', array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_search_popup_typography_separator', array(
		    'label'     		=> __( 'Search popup typography', 'hongo-addons' ),
		    'type'              => 'hongo_separator',
		    'section'    		=> 'hongo_add_search_block_panel',
		    'settings'   		=> 'hongo_search_popup_typography_separator',
		    'priority'	 		=> 11,
		) ) );

		/* End Search Popup Settings */

		/* Search Popup Background */
		
			$wp_customize->add_setting( 'hongo_search_popup_bgcolor', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_bgcolor', array(
			    'label'     		=> __( 'Background color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_bgcolor',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Background */

		/* Search Popup Label Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_labelcolor', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_labelcolor', array(
			    'label'     		=> __( 'Label color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_labelcolor',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Label Color */

		/* Search Popup Placeholder Text Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_placeholder_text', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',				
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_placeholder_text', array(
			    'label'     		=> __( 'Placeholder text color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_placeholder_text',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Placeholder Text Color */

		/* Search Popup Input Text Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_text_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_text_color', array(
			    'label'     		=> __( 'Input text color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_text_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Input Text Color */

		/* Search Popup Input Border Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_border_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_border_color', array(
			    'label'     		=> __( 'Input border color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_border_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Input Border Color */

		/* Search Popup Search Icon Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_search_icon_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_search_icon_color', array(
			    'label'     		=> __( 'Search icon color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_search_icon_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Search Icon Color */

		/* Search Popup Close Icon Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_close_icon_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_close_icon_color', array(
			    'label'     		=> __( 'Close icon color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_close_icon_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Close Icon Color */

		/* Search Popup Close Icon Color Hover */
		
			$wp_customize->add_setting( 'hongo_search_popup_close_icon_hover_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_close_icon_hover_color', array(
			    'label'     		=> __( 'Close icon hover color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_close_icon_hover_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Close Icon Color Hover */

		/* Search Popup Close Icon Background Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_close_icon_bg_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_close_icon_bg_color', array(
			    'label'     		=> __( 'Close icon background color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_close_icon_bg_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Close Icon Background Color */

		/* Search Popup Close Icon Background Hover Color */
		
			$wp_customize->add_setting( 'hongo_search_popup_close_icon_bg_hover_color', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new Hongo_Alpha_Color_Control( $wp_customize, 'hongo_search_popup_close_icon_bg_hover_color', array(
			    'label'     		=> __( 'Close icon background hover color', 'hongo-addons' ),
			    'section'    		=> 'hongo_add_search_block_panel',
			    'settings'	 		=> 'hongo_search_popup_close_icon_bg_hover_color',
			    'priority'	 		=> 11,
			) ) );

		/* End Search Popup Close Icon Background Hover Color */

		/* Separator Settings */
			$wp_customize->add_setting( 'hongo_other_settings_separator', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_other_settings_separator', array(
			    'label'     		=> __( 'Other Settings', 'hongo-addons' ),
			    'type'              => 'hongo_separator',
			    'section'   		=> 'hongo_other_settings_panel',
			    'settings'  		=> 'hongo_other_settings_separator',
			    'priority'	 		=> 11,
			) ) );

		/* End Separator Settings */

		/* Popup disableon */

			$wp_customize->add_setting( 'hongo_magnific_popup_disableon', array(
				'default' 			=> __( '700', 'hongo-addons' ),
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hongo_magnific_popup_disableon', array(
				'label'       		=> __( 'Popup disable', 'hongo-addons' ),
				'description'		=> __( 'Lightbox will not open when the window size is less than the number in the option. So, if you want to open as a popup, set the size to 0', 'hongo-addons' ),
				'section'     		=> 'hongo_other_settings_panel',
				'settings'			=> 'hongo_magnific_popup_disableon',
				'type'              => 'text',
				'priority'	 		=> 11,				
			) ) );
	
		/* End Popup disableon */

		/* Separator Settings */
			$wp_customize->add_setting( 'hongo_import_export_separator', array(
				'default' 			=> '',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new Hongo_Customize_Separator_Control( $wp_customize, 'hongo_import_export_separator', array(
			    'label'     		=> __( 'Export Import Settings', 'hongo-addons' ),
			    'type'              => 'hongo_separator',
			    'section'   		=> 'hongo_import_export',
			    'settings'  		=> 'hongo_import_export_separator',
			) ) );

		/* End Separator Settings */

		/* Customizer import export settings */

			$wp_customize->add_setting( 'hongo_import_export_setting', array(
				'default' 	=> '',
				'type'	  	=> 'none'
			) );

			$wp_customize->add_control( new Hongo_Customize_Import_Export( $wp_customize, 'hongo_import_export_setting', array(
				'type'      => 'hongo_import_export',
			    'section'   => 'hongo_import_export',
			    'settings'	=> 'hongo_import_export_setting',
			) ) );

		/* Customizer import export settings */


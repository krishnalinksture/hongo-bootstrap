<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Hongo_Addons_Customizer' ) ) {

	class Hongo_Addons_Customizer {

	    /* Construct */
	    public function __construct() {
			add_action( 'customize_register', array( $this, 'hongo_add_customizer_sections' ), 10 );
			add_action( 'customize_register', array( $this, 'hongo_register_options_settings_and_controls' ), 20 );
	    }

	    public function hongo_add_customizer_sections( $wp_customize ) {	    	

	    	// Add Builder Panels 
			$wp_customize->add_panel( 'hongo_builder_panel', array(
				'title' 	 	=> __( 'Header and Footer', 'hongo-addons' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 130
			) );

			/* Add Mini Header Settings */
		    $wp_customize->add_section( 'hongo_add_mini_header_section', array(
				'title' 	 	=> __( 'Mini Header', 'hongo-addons' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_builder_panel',
			) );

		    /* Add Header Settings */
			$wp_customize->add_section( 'hongo_add_header_section', array(
				'title' 	 	=> __( 'Header', 'hongo-addons' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_builder_panel',
			) );

			/* Add Footer Settings */
		    $wp_customize->add_section( 'hongo_add_footer_section', array(
				'title' 	 	=> __( 'Footer', 'hongo-addons' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_builder_panel',
			) );

	        // Add Social Icons Switch Sections
	        $wp_customize->add_panel( 'hongo_add_social_share_panel', array(
	            'title'         => __( 'Social Share', 'hongo-addons' ),
	            'capability'    => 'manage_options',
	        ) );

	        // Add Social Icons Post Panel
	        $wp_customize->add_section( 'hongo_add_social_share_section', array(
	            'title'         => __( 'Post Single', 'hongo-addons' ),
	            'capability'    => 'manage_options',
	            'panel'         => 'hongo_add_social_share_panel',
	        ) );

	        if( hongo_is_woocommerce_activated() ) {
	            // Add Social Icons Product Panel
	            $wp_customize->add_section( 'hongo_product_add_social_share_section', array(
	                'title'         => __( 'Product Single', 'hongo-addons' ),
	                'capability'    => 'manage_options',
	                'panel'         => 'hongo_add_social_share_panel',
	            ) );

	            // Add Product Quick View Layout
	            $wp_customize->add_section( 'hongo_add_product_quick_view_panel', array(
	                'title'         => __( 'Quick View Popup', 'hongo-addons' ),
	                'capability'    => 'manage_options',
	                'panel'         => 'woocommerce',
	                'priority'      => 135,
	            ) );

	            // Add Product Quick View Layout
	            $wp_customize->add_section( 'hongo_add_product_compare_panel', array(
	                'title'         => __( 'Compare Popup', 'hongo-addons' ),
	                'capability'    => 'manage_options',
	                'panel'         => 'woocommerce',
	                'priority'      => 136,
	            ) );
	            // Add Product Wishlist Layout
                $wp_customize->add_section( 'hongo_add_product_wishlist_panel', array(
                    'title'         => __( 'Wishlist Page', 'hongo-addons' ),
                    'capability'    => 'manage_options',
                    'panel'         => 'woocommerce',
                    'priority'      => 137,
                ) );
	        }

	        /* Add Heading Color Settings */
		    $wp_customize->add_section( 'hongo_add_addressbar_color_section', array(
			 	'title' 	 	=> __( 'Address Bar Color', 'hongo-addons' ),
			 	'capability' 	=> 'manage_options',
			 	'panel'	 	 	=> 'hongo_add_color_panel',
			 	'priority'		=> 210,
			) );

	        // Add Custom Additional JS
	        $wp_customize->add_section( 'hongo_custom_js', array(
	            'title'    => __( 'Additional JS', 'hongo-addons' ),
	            'priority' => 230,
	        ) );

	        // Add Customizer import export
	        $wp_customize->add_section( 'hongo_import_export', array(
	            'title'    => __( 'Export / Import Settings', 'hongo-addons' ),
	            'priority' => 240,
	        ) );
	    }
	    
	    public function hongo_register_options_settings_and_controls( $wp_customize ) {

			// Dynamic font weight array data file.
			require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS . '/hongo-font-weight.php';

	        /* Register Custom social icons file. */
	        require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS .'/hongo-social-icons.php';

	        /* Register Custom post social share file. */
	        require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS .'/hongo-post-social-icon.php';

	        /* Register Custom controls file. */
	        require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS . '/hongo-alpha-color-picker.php';
	        
	        /* Register Custom controls file. */
	        require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS . '/hongo-custom-controls.php';

	        /* Register Customizer import control file. */
			require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS . '/hongo-customizer-import.php';

	        // Dynamic font weight array data file.
			require_once HONGO_ADDONS_CUSTOMIZER_CONTROLS . '/hongo-font-weight.php';
	        
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/section-builder/hongo-mini-header-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/section-builder/hongo-header-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/section-builder/hongo-footer-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/post-social-share/post-social-share-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/general-theme-options/general-layout-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/typography-and-color/addressbar-color-settings.php' );
	        require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/addtional-js/addtional-js.php' );
	        if( hongo_is_woocommerce_activated() ) {

	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/single-product-layout-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/product-archive-layout-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/product-quick-view-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/product-compare-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/product-wishlist-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/general-settings.php' );
	            require_once( HONGO_ADDONS_CUSTOMIZER_MAPS.'/woocommerce/product-social-share-settings.php' );
	        }

			// Selective refresh data file.
			require_once HONGO_ADDONS_CUSTOMIZER . '/hongo-selective-refresh.php';

			// General notice data file.
			require_once HONGO_ADDONS_CUSTOMIZER . '/hongo-general-notice.php';
	    }
	}
new Hongo_Addons_Customizer();
}
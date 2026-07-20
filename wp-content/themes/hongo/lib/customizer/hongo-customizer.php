<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists('Hongo_Customizer') ) {

	/* Main plugin class */
	class Hongo_Customizer {

		/* Construct */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'hongo_add_customizer_sections' ), 10 );
			add_action( 'customize_register', array( $this, 'hongo_register_options_settings_and_controls' ), 20 );
			add_action( 'customize_controls_print_scripts', array( $this, 'hongo_add_customize_scripts' ) );
		}

		public function hongo_add_customizer_sections( $wp_customize ) {
			/* Add Bloat Remover setting Section */
			$wp_customize->add_section( 'hongo_bloat_settings_section', array(
				'title' 	 	=> __( 'Bloat Remover', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_perfomance_panel',
			) );

			/* General Panels */
			$wp_customize->add_panel( 'hongo_add_general_panel', array(
				'title' 	 	=> __( 'General Theme Options', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 125
			) );

			/* Add Under Contruction Layout */
			$wp_customize->add_section( 'hongo_add_under_contruction_panel', array(
				'title' 	 	=> __( 'Under Contruction', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add Custom sidebars Layout */
			$wp_customize->add_section( 'hongo_add_custom_sidebars_panel', array(
				'title' 	 	=> __( 'Custom Sidebars', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add Promo popup Layout */
			$wp_customize->add_section( 'hongo_add_promo_popup_panel', array(
				'title' 	 	=> __( 'Promo Popup', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add Style & Script Layout */
			$wp_customize->add_section( 'hongo_add_disable_style_script_panel', array(
				'title' 	 	=> __( 'Disable Styles & Scripts', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add 404 page Layout */
			$wp_customize->add_section( 'hongo_add_404_page_panel', array(
				'title' 	 	=> __( '404 Page', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add scroll to top Layout */
			$wp_customize->add_section( 'hongo_add_scroll_to_top_panel', array(
				'title' 	 	=> __( 'Scroll to Top', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add search block Layout */
			$wp_customize->add_section( 'hongo_add_search_block_panel', array(
				'title' 	 	=> __( 'Search Block', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add gdpr cookie block Layout */
			$wp_customize->add_section( 'hongo_add_gdpr_block_panel', array(
				'title' 	 	=> __( 'GDPR Settings', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add General setting Layout */
			$wp_customize->add_section( 'hongo_add_general_settings_panel', array(
				'title' 	 	=> __( 'Image Meta Data', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Add General setting Layout */
			$wp_customize->add_section( 'hongo_other_settings_panel', array(
				'title' 	 	=> __( 'Other Settings', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_general_panel',
			) );

			/* Perfomance Panel */
			$wp_customize->add_panel( 'hongo_add_perfomance_panel', array(
				'title' 	 	=> __( 'Performance Manager', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 125
			) );
			
			/* Logo and Favicon Panels */
			$wp_customize->add_section( 'hongo_add_logo_favicon_panel', array(
				'title' 	 	=> __( 'Logo and Favicon', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 130
			) );
			
			/* Add Layout Settings page */
			$wp_customize->add_panel( 'hongo_add_layout_section', array(
				'title' 	 	=> __( 'Layout and Content', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 135
			) );

			/* Add Page Layout */
			$wp_customize->add_section( 'hongo_add_page_layout_panel', array(
				'title' 	 	=> __( 'Page', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_layout_section',
			) );

			/* Add Post Layout */
			$wp_customize->add_section( 'hongo_add_post_layout_panel', array(
				'title' 	 	=> __( 'Post Single', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'			=> 'hongo_add_layout_section',
			) );

			/* Add Archive Layout */
			$wp_customize->add_section( 'hongo_add_archive_layout_panel', array(
				'title' 	 	=> __( 'Post Archive', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_layout_section',
			) );

			/* Add Default Posts / Blog Home Layout */
			$wp_customize->add_section( 'hongo_add_default_layout_panel', array(
				'title' 	 	=> __( 'Default Posts / Blog Home', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_layout_section',
			) );

			/* Add Sticky Posts Layout */
			$wp_customize->add_section( 'hongo_add_sticky_layout_panel', array(
				'title' 	 	=> __( 'Sticky Post', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_layout_section',
			) );

			/* Add Box Layout */
			$wp_customize->add_section( 'hongo_add_box_layout_panel', array(
				'title' 	 	=> __( 'Box Layout', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_layout_section',
			) );

			/* Add Page Title page Panel */
			$wp_customize->add_panel( 'hongo_add_title_wrapper_section', array(
				'title' 	 	=> __( 'Title Wrapper', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 140
			) );

			/* Add Page Title general */
			$wp_customize->add_section( 'hongo_add_page_title_section', array(
				'title' 	 	=> __( 'Page', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_title_wrapper_section',
			) );

			/* Add Page Title Single Post */
			$wp_customize->add_section( 'hongo_add_single_post_title_section', array(
				'title' 	 	=> __( 'Post Single', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_title_wrapper_section',
			) );

			/* Add Page Title Archive */
			$wp_customize->add_section( 'hongo_add_archive_title_section', array(
				'title' 	 	=> __( 'Post Archive', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_title_wrapper_section',
			) );

			/* Add Page Title Default */
			$wp_customize->add_section( 'hongo_add_default_title_section', array(
				'title' 	 	=> __( 'Default Posts / Blog Home', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_title_wrapper_section',
			) );

			/* Add Page Sidebar settings Panel */
			$wp_customize->add_panel( 'hongo_add_sidebar_settings_section', array(
				'title' 	 	=> __( 'Sidebar Settings', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 145
			) );

			/* Add Post Sidebar section */
			$wp_customize->add_section( 'hongo_add_post_sidebar_section', array(
				'title' 	 	=> __( 'Post', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_sidebar_settings_section',
			) );

			/* Add Page Sidebar section */
			$wp_customize->add_section( 'hongo_add_page_sidebar_section', array(
				'title' 	 	=> __( 'Page', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_sidebar_settings_section',
			) );

			/* Add Color Area */
			$wp_customize->add_panel( 'hongo_add_color_panel', array(
				'title' 	 	=> __( 'Typography and Color', 'hongo' ),
				'capability' 	=> 'manage_options',
				'priority'	 	=> 200
			) );

			/* Add Custom Font Setting */
			$wp_customize->add_section( 'hongo_add_general_font_family_section', array(
				'title' 	 	=> __( 'Font Family', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'hongo_add_color_panel',
			) );

			/* Add General Color Settings */
			$wp_customize->add_section( 'hongo_add_general_color_section', array(
				'title' 	 	=> __( 'Font Size', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'	 	 	=> 'hongo_add_color_panel'
			) );

			/* Add Content Color Settings */
			$wp_customize->add_section( 'hongo_add_content_color_section', array(
				'title' 	 	=> __( 'Font Color', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'	 	 	=> 'hongo_add_color_panel'
			) );

			/* Add Comment Color Settings */
			$wp_customize->add_section( 'hongo_add_comment_color_section', array(
				'title' 	 	=> __( 'Comment', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'	 	 	=> 'hongo_add_color_panel'
			) );

			/* Add Heading Color Settings */
			$wp_customize->add_section( 'hongo_add_heading_color_section', array(
				'title' 	 	=> __( 'Heading', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'	 	 	=> 'hongo_add_color_panel'
			) );

			/* Add Heading Color Settings */
			$wp_customize->add_section( 'hongo_add_base_color_section', array(
				'title' 	 	=> __( 'Base Color', 'hongo' ),
				'capability' 	=> 'manage_options',
				'panel'	 	 	=> 'hongo_add_color_panel'
			) );

			/* if WooCommerce plugin is activated */
			if( hongo_is_woocommerce_activated() ) {

				/* Add Product Sidebar section */
				$wp_customize->add_section( 'hongo_add_product_sidebar_section', array(
					'title' 	 	=> __( 'Product', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'		 	=> 'hongo_add_sidebar_settings_section',
				) );
				
				/* Add Product Title */
				$wp_customize->add_section( 'hongo_add_single_product_title_section', array(
					'title' 	 	=> __( 'Product Single', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'		 	=> 'hongo_add_title_wrapper_section',
				) );

				/* Add Product Title Archive */
				$wp_customize->add_section( 'hongo_add_product_archive_title_section', array(
					'title' 	 	=> __( 'Product Archive / Shop', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'		 	=> 'hongo_add_title_wrapper_section',
				) );

				/* Add Cart Layout */
				$wp_customize->add_section( 'woocommerce_cart', array(
					'title' 	 	=> __( 'Cart', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'			=> 'woocommerce',
					'priority'	 	=> 120,
				) );

				/* Add Mini Cart Layout */
				$wp_customize->add_section( 'woocommerce_mini_cart', array(
					'title' 	 	=> __( 'Mini Cart', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'			=> 'woocommerce',
					'priority'	 	=> 130,
				) );

				/* Add My account Layout */
				$wp_customize->add_section( 'woocommerce_myaccount', array(
					'title' 	 	=> __( 'My Account', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'			=> 'woocommerce',
					'priority'	 	=> 132,
				) );

				/* Add Product Layout */
				$wp_customize->add_section( 'hongo_add_product_layout_panel', array(
					'title' 	 	=> __( 'Product Single', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'			=> 'woocommerce',
					'priority'	 	=> 133,
				) );

				/* Add Product Archive Layout */
				$wp_customize->add_section( 'hongo_add_product_archive_layout_panel', array(
					'title' 	 	=> __( 'Product Archive / Shop', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'		 	=> 'woocommerce',
					'priority'	 	=> 134,
				) );			

				/* General WooCommerce Settings */
				$wp_customize->add_section( 'hongo_woocommerce_general_panel', array(
					'title' 	 	=> __( 'General Settings', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'			=> 'woocommerce',
				) );

				/* Add Social Icons Product Panel */
				$wp_customize->add_section( 'hongo_product_add_social_share_section', array(
					'title' 	 	=> __( 'Product Single', 'hongo' ),
					'capability' 	=> 'manage_options',
					'panel'		 	=> 'hongo_add_social_share_panel',
				) );
			}
		}

		/* Register option settings To Customizer */
		public function hongo_register_options_settings_and_controls( $wp_customize ) {
			/* Dynamic font weight array data file. */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-font-weight.php';

			/* Register Custom Social Icons Settings */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS .'/hongo-multiple-images.php';
			
			/* Register Alpha Color Picker control file. */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-alpha-color-picker.php';

			/* Register Custom Sidebars control file. */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-custom-sidebars.php';

			/* Register Custom Multiple Checkbox control file. */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-multi-checkbox.php';

			/* Register Custom controls file. */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-custom-controls.php';

			/* Register Custom Select with optgroup */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-select-optgroup.php';

			/* Register Custom Font Control */
			require_once HONGO_THEME_CUSTOMIZER_CONTROLS . '/hongo-custom-font.php';

			/* Register General Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/general-theme-options/general-layout-settings.php';

			/* Register 404 Page Setting */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/general-theme-options/page-not-found-settings.php';

			/* Register performance Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/performance/performance.php';

			/* Register Logo and Favicon Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/logo-and-favicon/logo-favicon-settings.php';

			/* Register Layout Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/layout-settings.php';

			 /* Register Layout Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/single-post-layout-settings.php';

			/* Register Layout Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/post-archive-layout-settings.php';	

			/* Register Default Post Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/default-layout-settings.php';

			/* Register Sticky Post Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/sticky-layout-settings.php';

			/* Register Box Layout Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/layout-and-content/box-layout.php';

			/* Register Custom Title For Site Identity, Header Image and Background Image */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/hongo-general-title.php';
			
			/* Register Page Title Setting */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/page-title-settings.php';

			/* Register Single Post Title Setting */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/single-post-title-settings.php';

			/* Register Archive Page Title Setting */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/archive-title-settings.php';

			/* Register Default Page Title Setting */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/default-title-settings.php';

			/* Register post sidebar settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/sidebar-setting/post-sidebar-setting.php';

			/* Register page sidebar settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/sidebar-setting/page-sidebar-setting.php';

			/* Register Custom Font Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/typography-and-color/font-settings.php';

			/* Register Custom Color Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/typography-and-color/custom-color-settings.php';

			/* Register Comment Color Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/typography-and-color/comment-color-settings.php';

			/* Register Heading Color Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/typography-and-color/heading-color-settings.php';

			/* Register Base Color Settings */
			require_once HONGO_THEME_CUSTOMIZER_MAPS .'/typography-and-color/base-color-settings.php';

			/* if WooCommerce plugin is activated */
			if( hongo_is_woocommerce_activated() ) {
				/* Register post sidebar settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/sidebar-setting/product-sidebar-setting.php';
				
				/* Register Single Product Title Setting */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/woocommerce-single-product-title-settings.php';

				/* Register Product Archive Page Title Setting */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/title-wrapper/woocommerce-product-archive-title-settings.php';

				 /* Register Product Layout Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-single-product-layout-settings.php';

				/* Register Product Layout Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-product-archive-layout-settings.php';

				 /* Register Checkout Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-chekout-settings.php';

				/* Register Cart Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-cart-settings.php';

				/* Register Mini Cart Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-mini-cart-settings.php';

				/* Register My Account Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-myaccount-settings.php';

				/* Register WooCommerce General Settings */
				require_once HONGO_THEME_CUSTOMIZER_MAPS .'/woocommerce/woocommerce-general-settings.php';
			}
		}

		/**
		 * Scripts to improve our form.
		 */
		public function hongo_add_customize_scripts() {
			if( hongo_is_woocommerce_activated() ) {
				$hongo_wishlist_id = get_option( 'woocommerce_wishlist_page_id' );
				$wishlist_page_url = ! empty( $hongo_wishlist_id ) ? get_permalink( $hongo_wishlist_id ) : '';
				?>
				<script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						wp.customize.section( 'woocommerce_cart', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'cart' ) ); ?>' );
								}
							} );
						} );

						wp.customize.section( 'woocommerce_myaccount', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'myaccount' ) ); ?>' );
								}
							} );
						} );

						wp.customize.section( 'hongo_add_product_archive_layout_panel', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'shop' ) ); ?>' );
								}
							} );
						} );

						wp.customize.section( 'hongo_add_product_archive_title_section', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'shop' ) ); ?>' );
								}
							} );
						} );

						wp.customize.section( 'hongo_add_product_wishlist_panel', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( $wishlist_page_url ); ?>' );
								}
							} );
						} );

						wp.customize.section( 'hongo_add_404_page_panel', function( section ) {
							section.expanded.bind( function( isExpanded ) {
								if ( isExpanded ) {
									wp.customize.previewer.previewUrl.set( '<?php echo esc_js( get_site_url( null, '/404-page' ) ); ?>' );
								}
							} );
						} );

					} );
				</script>
				<?php
			}
		}

	} // end of class

	$Hongo_Customizer = new Hongo_Customizer();

} // end of class_exists

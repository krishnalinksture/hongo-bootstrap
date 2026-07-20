<?php
/*
Plugin Name: Hongo Addons
Plugin URI: https://www.themezaa.com
Description: An essential plugin to operate Hongo theme
Version: 4.2
Author: Themezaa Team
Author URI: https://www.themezaa.com
Text Domain: hongo-addons
*/

/**
 * Defind Class 
 */
defined( 'HONGO_ADDONS_PLUGIN_VERSION' ) || define( 'HONGO_ADDONS_PLUGIN_VERSION', '4.2' );
defined( 'HONGO_ADDONS_ROOT' ) || define( 'HONGO_ADDONS_ROOT', dirname(__FILE__) );
defined( 'HONGO_ADDONS_ROOT_DIR' ) || define( 'HONGO_ADDONS_ROOT_DIR', plugins_url() . '/hongo-addons' );
defined( 'HONGO_ADDONS_PLUGIN_PATH' ) || define( 'HONGO_ADDONS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

defined( 'HONGO_ADDONS_IMPORT' ) || define( 'HONGO_ADDONS_IMPORT', HONGO_ADDONS_PLUGIN_PATH . 'importer' );
defined( 'HONGO_ADDONS_WIDGET' ) || define( 'HONGO_ADDONS_WIDGET', HONGO_ADDONS_PLUGIN_PATH . 'widgets' );
defined( 'HONGO_ADDONS_IMPORTER_SAMPLE_DATA_URI' ) || define( 'HONGO_ADDONS_IMPORTER_SAMPLE_DATA_URI', plugins_url() . '/hongo-addons/importer/sample-data/' );
defined( 'HONGO_ADDONS_IMPORTER_SAMPLE_DATA' ) || define( 'HONGO_ADDONS_IMPORTER_SAMPLE_DATA', plugin_dir_path( __FILE__ ) . 'importer/sample-data/' );
defined( 'HONGO_ADDONS_CUSTOMIZER' ) || define( 'HONGO_ADDONS_CUSTOMIZER', HONGO_ADDONS_PLUGIN_PATH . 'lib/customizer' );
defined( 'HONGO_ADDONS_CUSTOMIZER_MAPS' ) || define( 'HONGO_ADDONS_CUSTOMIZER_MAPS', HONGO_ADDONS_PLUGIN_PATH . 'lib/customizer/customizer-map' );
defined( 'HONGO_ADDONS_CUSTOMIZER_CONTROLS' ) || define( 'HONGO_ADDONS_CUSTOMIZER_CONTROLS', HONGO_ADDONS_PLUGIN_PATH . 'lib/customizer/customizer-control' );
defined( 'HONGO_ADDONS_CUSTOM_WALKER_MENU' ) || define( 'HONGO_ADDONS_CUSTOM_WALKER_MENU', plugin_dir_path( __FILE__ ) . 'custom-walker-menu' );

defined( 'HONGO_SHORTCODE_ADDONS_URI' ) || define( 'HONGO_SHORTCODE_ADDONS_URI', HONGO_ADDONS_ROOT.'/hongo-shortcodes' );
defined( 'HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER' ) || define( 'HONGO_SHORTCODE_ADDONS_EXTEND_COMPOSER', HONGO_SHORTCODE_ADDONS_URI.'/extend-composer' );
defined( 'HONGO_SHORTCODE_ADDONS_SHORTCODE_URI' ) || define( 'HONGO_SHORTCODE_ADDONS_SHORTCODE_URI', HONGO_SHORTCODE_ADDONS_URI.'/shortcodes' );
defined( 'HONGO_SHORTCODE_ADDONS_MAP_URI' ) || define( 'HONGO_SHORTCODE_ADDONS_MAP_URI', HONGO_SHORTCODE_ADDONS_URI.'/maps' );
defined( 'HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE' ) || define( 'HONGO_SHORTCODE_ADDONS_PREVIEW_IMAGE', HONGO_ADDONS_ROOT_DIR.'/hongo-shortcodes/images/preview-image' );

defined( 'HONGO_ADDONS_DEMO_IMAGES_URI' ) || define( 'HONGO_ADDONS_DEMO_IMAGES_URI', HONGO_ADDONS_IMPORTER_SAMPLE_DATA_URI.'/demo-images' );

defined( 'HONGO_ADDONS_DEMO_URI' ) || define( 'HONGO_ADDONS_DEMO_URI', 'https://hongo.themezaa.com/' );

if( ! function_exists( 'hongo_addons_load_textdomain' ) ) {

	function hongo_addons_load_textdomain() {

		load_plugin_textdomain( 'hongo-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
}
add_action( 'init', 'hongo_addons_load_textdomain' );

if( ! class_exists('Hongo_Addons') ) {

	class Hongo_Addons {

		// Construct
		public function __construct() {
			if ( file_exists( HONGO_ADDONS_ROOT . '/hongo-addons-require-files.php' ) ) {
				require_once HONGO_ADDONS_ROOT . '/hongo-addons-require-files.php';
			}

			if ( file_exists( HONGO_ADDONS_CUSTOMIZER . '/class-hongo-performance-manager.php' ) ) {
				require_once HONGO_ADDONS_CUSTOMIZER . '/class-hongo-performance-manager.php';
			}

			/* For auto update notice */
			add_action( 'admin_init', array( $this, 'hongo_addons_activate_addons_auto_update_notice' ) );

			/* Vc Hongo Templates */
			add_action( 'vc_after_init_vc', array( $this, 'hongo_addons_vc_templates' ) );

			/* Vc Hongo Templates */
			add_filter( 'vc_show_button_fe', array( $this, 'hongo_addons_vc_remove_frontend_links' ), 10, 3 );

			/* For Builder Custom Post Type */
			add_action( 'init', array( $this, 'hongo_addons_register_custom_post_type' ), 1 );

			/* For Enqueue custom style */
			add_action( 'wp_enqueue_scripts', array( $this, 'hongo_addons_enqueue_custom_style' ), 1000 );

			/* For Enqueue slider scripts */
			add_action( 'wp_footer', array( $this, 'hongo_addons_slider_script' ), 1000 );
	
			/* For Enqueue customize script */
			add_action( 'customize_preview_init', array( $this, 'hongo_addons_customizer_scripts_preview' ) );

			/* IE Compatible meta */
			add_action( 'wp_head', array( $this, 'hongo_addons_ie_compatible_meta' ), 1 );
		}

		/* Plugin updater. */
		public function hongo_addons_activate_addons_auto_update_notice() {

			if( class_exists( 'Hongo_Addons' ) ) {
				if ( file_exists( HONGO_ADDONS_ROOT . '/updater/hongo-addons-auto-update.php' ) ) {
					require_once HONGO_ADDONS_ROOT . '/updater/hongo-addons-auto-update.php';
				}

				$hongo_addons_version           = get_plugin_data( HONGO_ADDONS_ROOT.'/hongo-addons.php', $markup = true, $translate = true );
				$hongo_addons_current_version   = $hongo_addons_version['Version'];
				$hongo_addons_remote_path       = 'http://api.themezaa.com/hongo/update.php';
				$hongo_addons_slug              = plugin_basename( __FILE__ );
				new hongo_addons_plugin_update( $hongo_addons_current_version, $hongo_addons_remote_path, $hongo_addons_slug );
			}
		}

		public function hongo_addons_vc_templates() {
			if( hongo_is_theme_license_active() ) {
				if ( file_exists( HONGO_ADDONS_ROOT . '/lib/hongo-templates.php' ) ) {
					require_once HONGO_ADDONS_ROOT . '/lib/hongo-templates.php';
				}

				if ( file_exists( HONGO_ADDONS_ROOT . '/lib/hongo-templates-library/hongo-templates-data.php' ) ) {
					require_once HONGO_ADDONS_ROOT . '/lib/hongo-templates-library/hongo-templates-data.php';
				}

				if ( file_exists( HONGO_ADDONS_ROOT . '/lib/hongo-templates-library/hongo-builder-templates-data.php' ) ) {
					require_once HONGO_ADDONS_ROOT . '/lib/hongo-templates-library/hongo-builder-templates-data.php';
				}
			}
		}

		public function hongo_addons_vc_remove_frontend_links( $result, $post_id, $type ) {
			if( $type == 'hongobuilder' ) {
				return '';
			}

			return $result;
		}

		public function hongo_addons_register_custom_post_type() {
			if ( file_exists( HONGO_ADDONS_ROOT . '/custom-post-type/hongo-section-builder.php' ) ) {
				require_once HONGO_ADDONS_ROOT .'/custom-post-type/hongo-section-builder.php';
			}
		}

		public function hongo_addons_enqueue_custom_style() {

			$output_css = '';
			
			ob_start();
				if ( file_exists( HONGO_ADDONS_CUSTOMIZER . '/customizer-output/hongo-addons-custom-css.php' ) ) {
					require_once HONGO_ADDONS_CUSTOMIZER . '/customizer-output/hongo-addons-custom-css.php';
				}
			$output_css .= ob_get_contents();
			ob_end_clean();

			ob_start();
				if ( file_exists( HONGO_ADDONS_ROOT . '/meta-box/css/hongo-addons-custom-css.php' ) ) {
					require_once HONGO_ADDONS_ROOT . '/meta-box/css/hongo-addons-custom-css.php';
				}
			$output_css .= ob_get_contents();
			ob_end_clean();

			// apply_filters for custom css so user can add its own custom css
			$output_css = apply_filters( 'hongo_addons_inline_custom_css', $output_css );

			$output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
			$output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
			$output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

			// apply_filters for custom css after minified so user can add its own custom css
			$output_css = apply_filters( 'hongo_addons_inline_custom_css_after_minified', $output_css );

			wp_add_inline_style( 'hongo-responsive', $output_css );
		}

		public function hongo_addons_slider_script() {

			global $hongo_slider_script;

			if( ! empty( $hongo_slider_script ) ) { ?>

				<script type="text/javascript"> (function($) { "use strict"; $(document).ready(function () { <?php echo sprintf( '%s', $hongo_slider_script ); ?> }); })(jQuery); </script>
			<?php
			}
		}

		public function hongo_addons_ie_compatible_meta() {

			if( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {

				echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
			}
		}

		public function hongo_addons_customizer_scripts_preview() {
			wp_enqueue_script( 'hongo-addons-customizer', HONGO_ADDONS_ROOT_DIR.'/assets/js/admin/hongo-addons-customizer.js', array( 'jquery','customize-preview' ) );
		}

	} // end of class

	if( ! function_exists( 'hongo_addons_plugins_loaded' ) ) {

		function hongo_addons_plugins_loaded() {

			$Hongo_Addons = new Hongo_Addons();
		}
	}
	add_action( 'plugins_loaded', 'hongo_addons_plugins_loaded' );

} // end of class_exists

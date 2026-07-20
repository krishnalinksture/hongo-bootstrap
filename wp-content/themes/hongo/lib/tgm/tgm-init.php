<?php
/**
 * TGM Init Class
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Return if use is not logged in
if ( ! is_admin() ) { return; }

define( 'HONGO_PLUGINS_URI', 'http://api.themezaa.com/hongo/plugins/' );
define( 'HONGO_PLUGINS_CURRENT_USER_URI', HONGO_PLUGINS_URI . HONGO_THEME_VERSION );

require_once HONGO_THEME_TGM . '/class-tgm-plugin-activation.php';

if ( ! function_exists( 'hongo_register_required_plugins' ) ) :
    function hongo_register_required_plugins() {

        $plugin_list = array(
            array(
                'name'               => esc_html__( 'Hongo Addons', 'hongo' ),       // The plugin name
                'slug'               => 'hongo-addons',                              // The plugin slug (typically the folder name)
                'source'             =>  HONGO_PLUGINS_CURRENT_USER_URI . '/hongo-addons.zip', // The plugin source
                'required'           => true,                                          // If false, the plugin is only 'recommended' instead of required
                'version'            => HONGO_ADDONS_VERSION,                        // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,                                         // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',                                            // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => esc_html__( 'WooCommerce', 'hongo' ),                              // The plugin name.
                'slug'               => 'woocommerce',                              // The plugin slug (typically the folder name).
                'required'           => true,                                         // If false, the plugin is only 'recommended' instead of required.
            ),
            array(
                'name'               => esc_html__( 'Contact Form 7', 'hongo' ),                              // The plugin name.
                'slug'               => 'contact-form-7',                              // The plugin slug (typically the folder name).
                'required'           => false,                                         // If false, the plugin is only 'recommended' instead of required.
            ),
            array(
                'name'               => esc_html__( 'MC4WP: Mailchimp for WordPress', 'hongo' ),                     // The plugin name.
                'slug'               => 'mailchimp-for-wp',                          // The plugin slug (typically the folder name).
                'required'           => false,                                         // If false, the plugin is only 'recommended' instead of required.
            ),

            array(
                'name'               => esc_html__( 'WPBakery Page Builder', 'hongo' ),                    // The plugin name
                'slug'               => 'js_composer',                                 // The plugin slug (typically the folder name)
                'source'             =>  HONGO_PLUGINS_CURRENT_USER_URI . '/js_composer.zip', // The plugin source
                'required'           => true,                                          // If false, the plugin is only 'recommended' instead of required
                'version'            => HONGO_WPBAKERY_VERSION,                                            // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,                                          // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',                                            // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => esc_html__( 'Slider Revolution', 'hongo' ),                    // The plugin name
                'slug'               => 'revslider',                                 // The plugin slug (typically the folder name)
                'source'             =>  HONGO_PLUGINS_CURRENT_USER_URI . '/revslider.zip', // The plugin source
                'required'           => false,                                          // If false, the plugin is only 'recommended' instead of required
                'version'            => HONGO_REVOLUTION_VERSION,                                            // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,                                          // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',                                            // If set, overrides default API URL and points to an external URL
            ),
        );

        $mainconfig = array(
                'id'           => 'hongo_tgmpa',                // Unique ID for hashing notices for multiple instances of TGMPA.
                'default_path' => '',                           // Default absolute path to bundled plugins.
                'menu'         => 'hongo-theme-setup',          // Menu slug.
                'step'         => '2',
                'parent_slug'  => 'themes.php',                 // Parent menu slug.
                'capability'   => 'edit_theme_options',         // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                'has_notices'  => true,                         // Show admin notices or not.
                'dismissable'  => true,                         // If false, a user cannot dismiss the nag message.
                'dismiss_msg'  => '',                           // If 'dismissable' is false, this message will be output at top of nag.
                'is_automatic' => false,                        // Automatically activate plugins after installation or not.
                'message'      => '',                           // Message to output right before the plugins table.
        );

        tgmpa( $plugin_list, $mainconfig );

    }
endif;
add_action( 'tgmpa_register', 'hongo_register_required_plugins' );

if( ! function_exists( 'hongo_upgrader_pre_download' ) ) {

    function hongo_upgrader_pre_download($reply, $package, $upgrader) {

        if( strpos( $package, 'api.themezaa.com' ) !== false ) {

            $hongo_is_theme_license_active = hongo_is_theme_license_active();
            if( ! $hongo_is_theme_license_active ) {

                return new WP_Error( 'hongo_license_error', esc_html__( 'Theme license must be activated to install theme bundled premium plugins.', 'hongo' ) );
            }
        }

        return $reply;
    }
}
add_filter( 'upgrader_pre_download', 'hongo_upgrader_pre_download', 10, 3 );

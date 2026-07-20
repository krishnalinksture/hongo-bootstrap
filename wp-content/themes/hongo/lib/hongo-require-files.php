<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( ! class_exists( 'Hongo_Require_Files_Class' ) ) {
    class Hongo_Require_Files_Class {
        /*
         * Includes all (require_once) php file(s) inside selected folder using class.
         */
        public function __construct() { }

        public static function Hongo_Theme_Require_Files( $fileName ) {

            if( is_array( $fileName ) ) {
                foreach( $fileName as $name ) {
                    require get_parent_theme_file_path( "/lib/{$name}.php" );
                }
            } else {
                throw new Exception( __( 'File is not found in folder as you given', 'hongo' ) );
            }
        }
    }
}
$Hongo_Require_Files_Class = new Hongo_Require_Files_Class();

/*
 *  Includes all required files for Hongo Theme.
 */
Hongo_Require_Files_Class::Hongo_Theme_Require_Files(
    array(
        'hongo-register-sidebars',
        'hongo-extra-functions',
        'hongo-license-activation/hongo-license-activation',
        'hongo-global-hook-functions',
        'hongo-parameter-functions',
        'woocommerce/hongo-woocommerce-global-functions',
        'hongo-enqueue-scripts-styles',
        'woocommerce/hongo-woocommerce-archive-page-functions',
        'woocommerce/hongo-woocommerce-single-page-functions',
        'woocommerce/hongo-woocommerce-template-functions',
        'tgm/tgm-init',
        'customizer/hongo-customizer',
        'hongo-breadcrumb',
        'hongo-excerpt',
    )
);

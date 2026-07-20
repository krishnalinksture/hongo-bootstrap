<?php
/**
 * Customizer Import Export settings control
 *
 * @package Hongo-addons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

if( class_exists('WP_Customize_Control') ) {

    if( ! class_exists( 'Hongo_Customize_Import_Export' ) ) {

        class Hongo_Customize_Import_Export extends WP_Customize_Control {

            public function enqueue() {

                $blank_file_error = __( 'Please select settings file', 'hongo-addons' );
                $valid_file_error = __( 'Please select valid file type', 'hongo-addons' );

                wp_enqueue_script( 'hongo-addons-customizer-import', HONGO_ADDONS_ROOT_DIR.'/assets/js/admin/hongo-addons-customizer-import-control.js', array( 'jquery' ) );

                wp_localize_script( 'hongo-addons-customizer-import', 'hongoImport', array(
                    'customizeurl'   => admin_url( 'customize.php' ),
                    'exportnonce'    => wp_create_nonce( 'hongo-exporting' ),
                    'blankFileError' => $blank_file_error,
                    'validFileError' => $valid_file_error,
                ));
            }

            public function render_content() {
                ?>
                    <span class="customize-control-title">
                        <?php esc_html_e( 'Export', 'hongo-addons' ); ?>
                    </span>
                    <span class="description customize-control-description">
                        <?php esc_html_e( 'Click the below button for export the customization settings.', 'hongo-addons' ); ?>
                    </span>
                    <input type="button" class="button button-primary" name="hongo-export-button" value="<?php esc_attr_e( 'Export', 'hongo-addons' ); ?>" />
                    <hr class="hongo-import-separator"/>
                    <span class="customize-control-title">
                        <?php esc_html_e( 'Import', 'hongo-addons' ); ?>
                    </span>
                    <span class="description customize-control-description">
                        <?php esc_html_e( 'Upload a file for import customization settings.', 'hongo-addons' ); ?>
                    </span>
                    <div class="hongo-import-controls">
                        <input type="file" name="hongo-import-file" class="hongo-import-file" />
                        <?php wp_nonce_field( 'hongo-importing', 'hongo-import' ); ?>
                    </div>
                    <div class="hongo-uploading display-none"><?php esc_html_e( 'Importing...', 'hongo-addons' ); ?></div>
                    <input type="button" class="button button-primary" name="hongo-import-button" value="<?php esc_attr_e( 'Import', 'hongo-addons' ); ?>" />
                <?php
            }
        }
    }
}
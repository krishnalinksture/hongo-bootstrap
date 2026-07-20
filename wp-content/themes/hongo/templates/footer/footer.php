<?php
/**
 * The template for displaying the footer part
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check footer enable/disable */
$hongo_enable_footer_general= hongo_builder_customize_option( 'hongo_enable_footer_general', '1' );
$hongo_enable_footer		= hongo_builder_option( 'hongo_enable_footer', '1', $hongo_enable_footer_general );
$hongo_footer_section   	= hongo_builder_option( 'hongo_footer_section', '', $hongo_enable_footer_general );

if( $hongo_enable_footer == 1 ) {

    if( hongo_is_hongo_addons_activated() && ! empty( $hongo_footer_section ) ) {

        get_template_part( 'templates/footer/footer', 'builder' );

    } else {

        get_template_part( 'templates/footer/footer', 'default' );
    }
}

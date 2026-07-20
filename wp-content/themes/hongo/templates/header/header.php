<?php
/**
 * The template for displaying the header part
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check header enable/disable */
$hongo_enable_mini_header_general= hongo_builder_customize_option( 'hongo_enable_mini_header_general', '1' );
$hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );

$hongo_enable_mini_header   = hongo_builder_option( 'hongo_enable_mini_header', '0', $hongo_enable_mini_header_general );
$hongo_enable_header        = hongo_builder_option( 'hongo_enable_header', '1', $hongo_enable_header_general );

$hongo_mini_header_section  = hongo_builder_option( 'hongo_mini_header_section', '', $hongo_enable_mini_header_general );
$hongo_header_top_section   = hongo_builder_option( 'hongo_header_top_section', '', $hongo_enable_header_general );
$hongo_header_section       = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );

if( $hongo_enable_mini_header == 1 || $hongo_enable_header == 1 ) {

    if( hongo_is_hongo_addons_activated() && ( ! empty( $hongo_header_section ) || ! empty( $hongo_mini_header_section ) || ! empty( $hongo_top_header_section ) ) ) {

        get_template_part( 'templates/header/header', 'builder' );

    } else {

        get_template_part( 'templates/header/header', 'default' );
    }
}

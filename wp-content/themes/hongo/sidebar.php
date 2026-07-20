<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_active_sidebar( 'sidebar-1' ) ) {
	dynamic_sidebar( 'sidebar-1' );
}

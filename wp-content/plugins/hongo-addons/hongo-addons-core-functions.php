<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Get template part (for templates like the shop-loop).
 */
function hongo_addons_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Template path
	$hongo_addons_template_path = apply_filters( 'hongo_addons_template_path', 'hongo/' );

	// Plugin path
	$hongo_addons_plugin_path = untrailingslashit( HONGO_ADDONS_PLUGIN_PATH );

	// Look in yourtheme/slug-name.php and yourtheme/hongo/slug-name.php.
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", $hongo_addons_template_path . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php.
	if ( ! $template && $name && file_exists( $hongo_addons_plugin_path . "/templates/{$slug}-{$name}.php" ) ) {
		$template = $hongo_addons_plugin_path . "/templates/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/hongo/slug.php.
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", $hongo_addons_template_path . "{$slug}.php" ) );
	}

	// Allow 3rd party plugins to filter template file from their plugin.
	$template = apply_filters( 'hongo_addons_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 */
function hongo_addons_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args ); // @codingStandardsIgnoreLine
	}

	$located = hongo_addons_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$located = apply_filters( 'hongo_addons_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'hongo_addons_before_template_part', $template_name, $template_path, $located, $args );

	include $located;

	do_action( 'hongo_addons_after_template_part', $template_name, $template_path, $located, $args );
}


/**
 * Like hongo_addons_get_template, but returns the HTML instead of outputting.
 */
function hongo_addons_get_template_html( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	ob_start();
	hongo_addons_get_template( $template_name, $args, $template_path, $default_path );
	return ob_get_clean();
}
/**
 * Locate a template and return the path for inclusion.
 */
function hongo_addons_locate_template( $template_name, $template_path = '', $default_path = '' ) {

	// Template path
	$hongo_addons_template_path = apply_filters( 'hongo_addons_template_path', 'hongo/' );

	// Plugin path
	$hongo_addons_plugin_path = untrailingslashit( HONGO_ADDONS_PLUGIN_PATH );

	if ( ! $template_path ) {
		$template_path = $hongo_addons_template_path;
	}

	if ( ! $default_path ) {
		$default_path = $hongo_addons_plugin_path . '/templates/';
	}

	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name,
		)
	);

	// Get default template/.
	if ( ! $template ) {
		$template = $default_path . $template_name;
	}

	// Return what we found.
	return apply_filters( 'hongo_addons_locate_template', $template, $template_name, $template_path );
}
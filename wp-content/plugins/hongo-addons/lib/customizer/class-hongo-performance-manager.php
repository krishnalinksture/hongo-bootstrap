<?php
/**
 * Hongo Performance Manager
 *
 * @package Hongo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// If class `Hongo_Performance_Manager` doesn't exists yet.
if ( ! class_exists( 'Hongo_Performance_Manager' ) ) {

	class Hongo_Performance_Manager {
		/**
		 * Constructor
		 */
		public function __construct() {
			$hongo_disable_xmlrpc          = get_theme_mod( 'hongo_disable_xmlrpc', '0' );
			$hongo_remove_rsd_link         = get_theme_mod( 'hongo_remove_rsd_link', '0' );
			$hongo_remove_shortlink        = get_theme_mod( 'hongo_remove_shortlink', '0' );
			$hongo_remove_wp_ver_generator = get_theme_mod( 'hongo_remove_wp_version_generator', '0' );

            add_action( 'wp', array( $this, 'hongo_remove_style_wp_emojis' ) );
			add_action( 'init', array( $this, 'hongo_remove_feed_links' ) );
			add_action( 'wp_print_styles', array( $this, 'hongo_remove_dashicons' ), 100 );
			add_action( 'pre_ping', array( $this, 'hongo_remove_self_ping' ) );

			if ( '1' === $hongo_disable_xmlrpc ) {
				add_filter( 'xmlrpc_enabled', '__return_false' );
			}

			if ( '1' === $hongo_remove_rsd_link ) {
				remove_action( 'wp_head', 'rsd_link' );
				remove_action( 'wp_head', 'wlwmanifest_link' );
			}

			if ( '1' === $hongo_remove_shortlink ) {
				remove_action( 'wp_head', 'wp_shortlink_wp_head' );
			}

			if ( '1' === $hongo_remove_wp_ver_generator ) {
				remove_action( 'wp_head', 'wp_generator' );
			}
        }

        /**
		 * Hongo remove WP emojis.
		 */
		public function hongo_remove_style_wp_emojis() {
			$hongo_wp_emojis = get_theme_mod( 'hongo_wp_emojis', '0' );

			// Check if the user has enabled emojis.
			if ( '1' === $hongo_wp_emojis ) {
				// Remove emoji scripts and styles.
				remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
				remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
				remove_action( 'wp_print_styles', 'print_emoji_styles' );
				remove_action( 'admin_print_styles', 'print_emoji_styles' );
				remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
				remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
				remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
				// Disable TinyMCE emoji plugin.
				add_filter( 'tiny_mce_plugins', array( $this, 'hongo_disable_emojis_tinymce' ) );
				// Remove DNS prefetch for emojis.
				add_filter( 'wp_resource_hints', array( $this, 'hongo_disable_emojis_remove_dns_prefetch' ), 10, 2 );
			}
		}

		/**
		 * Disable Emojis in TinyMCE Editor.
		 *
		 * @param array $plugins Emojis tinymce.
		 */
		public function hongo_disable_emojis_tinymce( $plugins ) {
			// Remove the wpemoji plugin if present.
			return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
		}

		/**
		 * Remove the WordPress emoji CDN hostname from DNS prefetching hints.
		 *
		 * @param  array  $urls URLs to print for resource hints.
		 * @param  string $relation_type The relation type the URLs are printed for.
		 * @return array  Difference betwen the two arrays.
		 */
		public function hongo_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
			if ( 'dns-prefetch' === $relation_type ) {
				$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
				foreach ( $urls as $key => $url ) {
					if ( false !== strpos( $url, $emoji_svg_url_bit ) ) {
						unset( $urls[ $key ] );
					}
				}
			}

			return $urls;
		}

		/**
		 * Remove RSS feed links from <head> if the "Disable RSS Feeds" option is enabled in the Customizer.
		 *
		 * This helps clean up the page head and prevents bots or users from discovering disabled RSS endpoints.
		 */
		public function hongo_remove_feed_links() {
			$hongo_disable_rss_feeds = get_theme_mod( 'hongo_disable_rss_feeds', '0' );
			if ( '1' === $hongo_disable_rss_feeds ) {
				remove_action( 'wp_head', 'feed_links', 2 );
				remove_action( 'wp_head', 'feed_links_extra', 3 );

				// Optional: Disable actual RSS feed output (hard block).
				add_action( 'do_feed', array( $this, 'hongo_disable_rss' ), 1 );
				add_action( 'do_feed_rdf', array( $this, 'hongo_disable_rss' ), 1 );
				add_action( 'do_feed_rss', array( $this, 'hongo_disable_rss' ), 1 );
				add_action( 'do_feed_rss2', array( $this, 'hongo_disable_rss' ), 1 );
				add_action( 'do_feed_atom', array( $this, 'hongo_disable_rss' ), 1 );
			}
		}

		/**
		 * Disable Dashicons if the corresponding theme option is enabled.
		 */
		public function hongo_remove_dashicons() {
			// Check if the setting to disable dashicons is enabled.
			$hongo_disable_dashicons = get_theme_mod( 'hongo_disable_dashicons', '0' );

			// Exit if Dashicons should not be disabled.
			if ( '1' !== $hongo_disable_dashicons ) {
				return;
			}

			// Only remove Dashicons if the admin bar is not showing and not in customizer preview.
			if ( ! is_admin_bar_showing() && ! is_customize_preview() ) {
				wp_dequeue_style( 'dashicons' );
				wp_deregister_style( 'dashicons' );
			}
		}

		/**
		 * Disables pingbacks from the site by removing self-pings.
		 *
		 * @param array $links Array of URLs that may include self-pings.
		 */
		public function hongo_remove_self_ping( &$links ) {
			// Get the setting to disable self-pings.
			$hongo_disable_self_pings = get_theme_mod( 'hongo_disable_self_pings', '0' );

			// Exit if self-pings should not be disabled.
			if ( '1' !== $hongo_disable_self_pings ) {
				return;
			}

			// Get the home URL.
			$home = get_option( 'home' );

			// Remove self-ping links.
			foreach ( $links as $l => $link ) {
				if ( str_starts_with( $link, $home ) ) {
					unset( $links[ $l ] );
				}
			}
		}
    }
	
    new Hongo_Performance_Manager();
}
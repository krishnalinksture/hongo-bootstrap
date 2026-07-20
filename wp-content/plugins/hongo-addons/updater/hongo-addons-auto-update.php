<?php

if( ! class_exists( 'hongo_addons_plugin_update' ) ) {

	class hongo_addons_plugin_update {

		private $hongo_current_version;
		private $hongo_update_path;
		private $hongo_plugin_slug;
		private $hongo_slug;

		public function __construct( $hongo_current_version, $hongo_update_path, $hongo_plugin_slug ) {

			// Set the class public variables
			$this->hongo_current_version = $hongo_current_version;
			$this->hongo_update_path = $hongo_update_path;

			// Set the Plugin Slug	
			$this->hongo_plugin_slug = $hongo_plugin_slug;
			list ($t1, $t2) = explode( '/', $hongo_plugin_slug );
			$this->hongo_slug = str_replace( '.php', '', $t2 );

			// define the alternative API for updating checking
			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'hongo_addons_check_update' ) );

			// Define the alternative response for information checking
			add_filter( 'plugins_api', array( $this, 'hongo_addons_check_info' ), 10, 3 );
		}

		public function hongo_addons_check_update( $transient ) {
			if ( empty( $transient->checked ) ) {
				return $transient;
			}

			// Get the latest version from remote file
			$hongo_addons_remote_version = $this->hongo_addons_getRemote_version();

			// If a newer version is available, add the update
			if ( ! empty( $this->hongo_current_version ) && ! empty( $hongo_addons_remote_version->new_version ) && version_compare( $this->hongo_current_version, $hongo_addons_remote_version->new_version, '<' ) ) {
				$obj = new stdClass();
				$obj->slug = $this->hongo_slug;
				$obj->new_version = $hongo_addons_remote_version->new_version;

				$transient->response[$this->hongo_plugin_slug] = $obj;
			}
			return $transient;
		}

		public function hongo_addons_check_info( $obj, $action, $arg ) {
			if (isset($arg->slug) && $arg->slug === $this->hongo_slug) {
				$hongo_addons_information = $this->hongo_addons_getRemote_information();
				$hongo_addons_information->sections = (array) $hongo_addons_information->sections;
				return $hongo_addons_information;
			}
			return $obj;
		}

		public function hongo_addons_getRemote_information() {
			$hongo_addons_info_request = wp_remote_get( 'http://api.themezaa.com/hongo/data.json' );
			if ( ! is_wp_error( $hongo_addons_info_request ) || wp_remote_retrieve_response_code( $hongo_addons_info_request ) === 200 ) {
				return json_decode( $hongo_addons_info_request['body'] );
			}
			return false;
		}

		public function hongo_addons_getRemote_version() {
			$params = array( 'body' => array( 'action' => 'version' ) );
			// Make the POST request
			$hongo_addons_version_request = wp_remote_post($this->hongo_update_path, $params );
			// Check if response is valid
			if ( !is_wp_error( $hongo_addons_version_request ) || wp_remote_retrieve_response_code( $hongo_addons_version_request ) === 200 ) {
				return @unserialize( $hongo_addons_version_request['body'] );
			}
			return false;
		}
	}
}
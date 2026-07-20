<?php
  /**
   * Hongo Humburger Class.
   *
   * @package Hongo
   */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/**
 * Defind Hongo Humburger Menu Class.
 *
 */
if( ! class_exists( 'Hongo_Hamburger_Menu' ) ) {
    class Hongo_Hamburger_Menu {
        public function __construct() {
            add_action( 'init', array( $this, 'hongo_mega_menu_init' ) );
        }

        public function hongo_mega_menu_init() {
            require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/hamburger-menu/front-hamburger-menu.php' );
        }
    } // end of class

    new Hongo_Hamburger_Menu();
}
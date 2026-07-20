<?php
  /**
   * Hongo Left Menu Class.
   *
   * @package Hongo
   */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/**
 * Defind Hongo Left Menu Class.
 *
 */
if( ! class_exists( 'Hongo_Left_Menu' ) ) {
    class Hongo_Left_Menu {

        public function __construct() {
            add_action( 'init', array( $this, 'hongo_mega_menu_init' ) );
        }

        public function hongo_mega_menu_init() {
          require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/left-menu/front-left-menu-addon.php' );
        }
    } // end of class

    new Hongo_Left_Menu();
} // end of class_exists
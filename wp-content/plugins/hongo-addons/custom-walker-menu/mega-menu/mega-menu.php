<?php
  /**
   * Hongo Mega Menu Class.
   *
   * @package Hongo
   */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

    /**
     * Defind Hongo Mega Menu Class.
     *
     */

if( ! class_exists( 'Hongo_Mega_Menu' ) ) {
    class Hongo_Mega_Menu {
        public function __construct() {
            add_action( 'init', array( $this, 'hongo_mega_menu_init' ) );
        }

        public function hongo_mega_menu_init() {
            require_once( HONGO_ADDONS_ROOT.'/hongo-addons-icons.php' );
            require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/mega-menu/admin-mega-menu-addon.php' );
            require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/mega-menu/front-mega-menu-addon.php' );
        }
    } // end of class

new Hongo_Mega_Menu();
} // end of class_exists
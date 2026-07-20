<?php
  /**
   * Hongo Shop Menu Class.
   *
   * @package Hongo
   */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

    /**
     * Defind Hongo Shop Menu Class.
     *
     */

if( ! class_exists( 'Hongo_Shop_Menu' ) ) {
    class Hongo_Shop_Menu {
        public function __construct() {
            add_action( 'init', array( $this, 'hongo_shop_menu_init' ) );
        }

        public function hongo_shop_menu_init() {
            require_once( HONGO_ADDONS_CUSTOM_WALKER_MENU.'/shop-menu/front-shop-menu-addon.php' );
        }
    } // end of class

    new Hongo_Shop_Menu();
} // end of class_exists
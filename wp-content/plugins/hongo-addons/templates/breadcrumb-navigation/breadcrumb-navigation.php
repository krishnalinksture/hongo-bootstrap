<?php
/**
 * Single Product Tabbing
 *
 * This template can be overridden by copying it to yourtheme/hongo/single-product/breadcrumb-navigation.php.
 *
 * @package Hongo
 * @version 1.0.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

    $hongo_single_product_enable_title_after_breadcrumb = hongo_option( 'hongo_single_product_enable_title_after_breadcrumb', '1' );
    $hongo_single_product_enable_title_after_navigation = hongo_option( 'hongo_single_product_enable_title_after_navigation', '1' );

    if( $hongo_single_product_enable_title_after_breadcrumb == '1' || $hongo_single_product_enable_title_after_navigation == '1' ){

        echo '<div class="breadcrumb-navigation-wrap alt-font">';

            if( $hongo_single_product_enable_title_after_breadcrumb == '1' ){
                // Breadcrumb
            	echo '<ul class="breadcrumb-wrap">';
            		echo hongo_breadcrumb_display();
            	echo '</ul>';
            }

            if( $hongo_single_product_enable_title_after_navigation == '1' ){
            	// Navigation Links
            	echo '<div class="navigation-wrap">';
            		echo hongo_addons_navigation_link_display();
            	echo '</div>';
            }

        echo '</div>';
    }
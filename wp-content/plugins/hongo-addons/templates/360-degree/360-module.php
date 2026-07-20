<?php
/**
 * 360 Product Modules
 *
 * This template can be overridden by copying it to yourtheme/hongo/single-product/360-module.php.
 *
 * @package Hongo
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo '<a data-placement="left" data-original-title="'.__( '360&#176; Product View', 'hongo-addons' ).'" class="hongo-single-product-360-button product-img-btn" data-images="'.$data_images.'" data-height="'.$data_height.'" data-width="'.$data_width.'" href="#hongo_threesixty_content_wrap">';
	echo '<img draggable="false" alt="hongo-360" src='.HONGO_ADDONS_ROOT_DIR.'/assets/images/rotation-3d.svg>';
echo '</a>';

echo '<div id="hongo_threesixty_content_wrap" class="hongo-single-product-360 mfp-hide">';
	echo '<div class="threesixty hongo_threesixty">';
		echo '<div class="spinner">';
		    echo '<span>0%</span>';
		echo '</div>';
		echo '<ol class="threesixty_images"></ol>';
	echo '</div>';
echo '</div>';
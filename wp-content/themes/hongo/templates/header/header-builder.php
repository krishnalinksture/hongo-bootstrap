<?php
/**
 * The template for displaying the header builder
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_enable_mini_header_general= hongo_builder_customize_option( 'hongo_enable_mini_header_general', '1' );
$hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
$hongo_enable_mini_header   = hongo_builder_option( 'hongo_enable_mini_header', '0', $hongo_enable_mini_header_general );
$hongo_enable_header        = hongo_builder_option( 'hongo_enable_header', '1', $hongo_enable_header_general );

if( $hongo_enable_mini_header == 1 || $hongo_enable_header == 1 ) {
?>
    <!-- Header -->
    <header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <?php
            if( $hongo_enable_mini_header == 1 ) {
                /* Mini header builder */
                get_template_part( 'templates/header/mini-header', 'builder' );
            }
            if( $hongo_enable_header == 1 ) {
                /* Top header builder */
                get_template_part( 'templates/header/top-header', 'builder' );
                /* Main header builder */
                get_template_part( 'templates/header/main-header', 'builder' );
            }
        ?>
    </header>
    <!-- End header -->
<?php
}

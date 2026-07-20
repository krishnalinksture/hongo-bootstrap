<?php
/**
 * The template for displaying the footer builder
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_enable_footer_general = hongo_builder_customize_option( 'hongo_enable_footer_general', '1' );
$hongo_footer_section  	     = hongo_builder_option( 'hongo_footer_section', '', $hongo_enable_footer_general );

if ( ! empty( $hongo_footer_section ) ) {

    /* Header sticky type */
    $hongo_footer_sticky_type = get_post_meta( $hongo_footer_section, '_hongo_footer_sticky_type', true );
    $hongo_footer_sticky_type = ( $hongo_footer_sticky_type ) ? ' footer-' . $hongo_footer_sticky_type : ' footer-non-sticky';
 
    /* Header sticky type */
    $hongo_footer_style = get_post_meta( $hongo_footer_section, '_hongo_footer_style', true );
    $hongo_footer_style = ( $hongo_footer_style ) ? ' footer-' . $hongo_footer_style : ' footer-dark-style';
    ?>
        <!-- footer -->
        <footer id="colophon" class="footer-main-wrapper site-footer<?php echo esc_attr( $hongo_footer_sticky_type ) . esc_attr( $hongo_footer_style ); ?>" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            <div class="container">
                <?php
                add_filter( 'hongo_row_extra_class', 'hongo_add_row_footer_style_class', 10, 2 );

                $footer_section_content = get_post_field( 'post_content', $hongo_footer_section );
                echo hongo_remove_wpautop( $footer_section_content, false );

                if ( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                    ?>
                    <a href="<?php echo esc_url( get_edit_post_link( $hongo_footer_section ) ); ?>" target="_blank" data-placement="right" title="<?php echo esc_attr__( 'Edit footer section', 'hongo' ); ?>" class="edit-hongo-section edit-footer hongo-tooltip">
                        <i class="ti-pencil"></i>
                    </a>
                    <?php
                }
                ?>
            </div>
        </footer>
        <!-- end footer -->
    <?php
}

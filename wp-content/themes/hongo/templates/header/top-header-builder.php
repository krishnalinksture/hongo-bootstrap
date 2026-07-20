<?php
/**
 * The template for displaying the top header builder
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
$hongo_enable_header        = hongo_builder_option( 'hongo_enable_header', '1' );
$hongo_header_top_section   = hongo_builder_option( 'hongo_header_top_section', '', $hongo_enable_header_general );

/* Top header section */
if( $hongo_enable_header == 1 && ! empty( $hongo_header_top_section ) && $hongo_header_top_section != 'none' ) {

    /* Header sticky type */
    $hongo_top_header_sticky_type = get_post_meta( $hongo_header_top_section, '_hongo_header_sticky_type', true );
    $hongo_top_header_sticky_type = ( $hongo_top_header_sticky_type ) ? ' ' . $hongo_top_header_sticky_type : ' no-sticky';
    ?>
    <div class="top-header-main-wrapper<?php echo esc_attr( $hongo_top_header_sticky_type ); ?>">
        <div class="container">
            <?php
            $top_header_section_content = get_post_field( 'post_content', $hongo_header_top_section );

            echo hongo_remove_wpautop( $top_header_section_content, false );

            if( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                ?>
                <a href="<?php echo get_edit_post_link( $hongo_header_top_section ); ?>" target="_blank" data-placement="right" title="<?php esc_attr_e( 'Edit top header section', 'hongo' ); ?>" class="edit-hongo-section edit-top-header hongo-tooltip">
                    <i class="ti-pencil"></i>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

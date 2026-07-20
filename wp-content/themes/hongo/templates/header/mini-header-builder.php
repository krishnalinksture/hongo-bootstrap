<?php
/**
 * The template for displaying the mini header builder
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_enable_mini_header_general= hongo_builder_customize_option( 'hongo_enable_mini_header_general', '1' );
$hongo_enable_mini_header   = hongo_builder_option( 'hongo_enable_mini_header', '0', $hongo_enable_mini_header_general );
$hongo_mini_header_section  = hongo_builder_option( 'hongo_mini_header_section', '', $hongo_enable_mini_header_general );

/* Mini header section */
if( $hongo_enable_mini_header == 1 && ! empty( $hongo_mini_header_section ) ) {

    /* Header sticky type */
    $hongo_mini_header_sticky_type = get_post_meta( $hongo_mini_header_section, '_hongo_header_sticky_type', true );
    $hongo_mini_header_sticky_type = ( $hongo_mini_header_sticky_type ) ? ' ' . $hongo_mini_header_sticky_type : ' no-sticky';
?>
    <div class="mini-header-main-wrapper<?php echo esc_attr( $hongo_mini_header_sticky_type ); ?>">
        <div class="container">
            <?php
                $mini_header_section_content = get_post_field( 'post_content', $hongo_mini_header_section );

                echo hongo_remove_wpautop( $mini_header_section_content, false );

                if( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                ?>
                    <a href="<?php echo get_edit_post_link( $hongo_mini_header_section ); ?>" target="_blank" data-placement="right" title="<?php esc_attr_e( 'Edit mini header section', 'hongo' ); ?>" class="edit-hongo-section edit-mini-header hongo-tooltip">
                        <i class="ti-pencil"></i>
                    </a>
            <?php } ?>
        </div>
    </div>
<?php
}

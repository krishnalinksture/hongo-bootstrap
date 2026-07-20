<?php
/**
 * The template for displaying the main header builder
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
$hongo_enable_header    = hongo_builder_option( 'hongo_enable_header', '1', $hongo_enable_header_general );
$hongo_header_section   = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );

$hongo_header_layout    = hongo_builder_option( 'hongo_header_type', 'headertype1', $hongo_enable_header_general );
$header_wrapper_class   = ( $hongo_header_layout == 'headertype2' ) ? ' header-left-wrapper' : ' header-main-wrapper';

$attribute = ( $hongo_header_layout == 'headertype2' ) ? ' data-sticky_column' : '';

/* Main header section */
if( $hongo_enable_header == 1 && ! empty( $hongo_header_section ) ) {
   
    /* Header sticky type */
    $hongo_header_sticky_type = get_post_meta( $hongo_header_section, '_hongo_header_sticky_type', true );
    $hongo_header_sticky_type = ( $hongo_header_sticky_type ) ? ' ' . $hongo_header_sticky_type : ' no-sticky';
?>
    <div class="header-common-wrapper site-header<?php echo esc_attr( $header_wrapper_class ) . esc_attr( $hongo_header_sticky_type ); ?>"<?php echo esc_attr( $attribute ); ?>>
        <div class="container">
            <?php
                $header_section_content = get_post_field( 'post_content', $hongo_header_section );
                
                echo hongo_remove_wpautop( $header_section_content, false );

                if ( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                ?>
                    <a href="<?php echo get_edit_post_link( $hongo_header_section ); ?>" target="_blank" data-placement="right" title="<?php esc_attr_e( 'Edit header section', 'hongo' ); ?>" class="edit-hongo-section edit-header hongo-tooltip">
                        <i class="ti-pencil"></i>
                    </a>
            <?php } ?>
        </div>
    </div>
<?php
}

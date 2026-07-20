<?php
/**
 * The template for displaying the footer default
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_footer_middle_column_1_sidebar = get_theme_mod( 'hongo_footer_middle_column_1', 'footer-middle-column-1' );
$hongo_footer_middle_column_2_sidebar = get_theme_mod( 'hongo_footer_middle_column_2', 'footer-middle-column-2' );
$hongo_footer_middle_column_3_sidebar = get_theme_mod( 'hongo_footer_middle_column_3', 'footer-middle-column-3' );
$hongo_footer_middle_column_4_sidebar = get_theme_mod( 'hongo_footer_middle_column_4', 'footer-middle-column-4' );

$hongo_footer_middle_column_1         = hongo_check_active_sidebar( $hongo_footer_middle_column_1_sidebar );
$hongo_footer_middle_column_2         = hongo_check_active_sidebar( $hongo_footer_middle_column_2_sidebar );
$hongo_footer_middle_column_3         = hongo_check_active_sidebar( $hongo_footer_middle_column_3_sidebar );
$hongo_footer_middle_column_4         = hongo_check_active_sidebar( $hongo_footer_middle_column_4_sidebar );

?>
    <footer id="colophon" class="footer-default-wrapper site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
        <?php if( $hongo_footer_middle_column_1 || $hongo_footer_middle_column_2 || $hongo_footer_middle_column_3 || $hongo_footer_middle_column_4 ) { ?>
            <div class="hongo-footer-middle footer-four-column">
                <div class="container">
                    <div class="row">
                        <?php if ( $hongo_footer_middle_column_1 ) { ?>
                            <div class="footer-sidebar col-md-3 col-sm-3 col-xs-12">
                                <?php dynamic_sidebar( $hongo_footer_middle_column_1_sidebar ); ?>
                            </div>
                        <?php } ?>
                        <?php if ( $hongo_footer_middle_column_2 ) { ?>
                            <div class="footer-sidebar col-md-3 col-sm-3 col-xs-12">
                                <?php dynamic_sidebar( $hongo_footer_middle_column_2_sidebar ); ?>
                            </div>
                        <?php } ?>
                        <?php if ( $hongo_footer_middle_column_3 ) { ?>
                            <div class="footer-sidebar col-md-3 col-sm-3 col-xs-12">
                                <?php dynamic_sidebar( $hongo_footer_middle_column_3_sidebar ); ?>
                            </div>
                        <?php } ?>
                        <?php if ( $hongo_footer_middle_column_4 ) { ?>
                            <div class="footer-sidebar col-md-3 col-sm-3 col-xs-12">
                                <?php dynamic_sidebar( $hongo_footer_middle_column_4_sidebar ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="hongo-footer-bottom">
            <div class="site-info">
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                    <a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> - 
                <?php endif; ?>
                <a href="<?php echo esc_url( '//www.themezaa.com/' ); ?>" class="imprint">
                    <?php
                        /* translators: %s: ThemeZaa. */
                        _e( 'Proudly powered by ThemeZaa.', 'hongo' );
                    ?>
                </a>
            </div><!-- .site-info -->
        </div>
    </footer>

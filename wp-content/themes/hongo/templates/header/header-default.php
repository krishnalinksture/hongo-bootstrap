<?php
/**
 * The template for displaying the header default
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$hongo_logo             = get_theme_mod( 'hongo_logo', '' );
$hongo_logo_light       = get_theme_mod( 'hongo_logo_light', '' );
$hongo_logo_ratina      = get_theme_mod( 'hongo_logo_ratina', '' );
$hongo_logo_light_ratina= get_theme_mod( 'hongo_logo_light_ratina', '' );
?>
<!-- header -->
<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <!-- navigation -->
    <nav class="navbar navbar-default header-default-wrapper">
        <div class="container nav-header-container">
            <div class="row">
                <!-- logo -->
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <?php if( is_front_page() ) { ?>
                        <h1>
                    <?php } ?>
                    <?php if( $hongo_logo || $hongo_logo_light ) { ?>
                        <?php if( $hongo_logo_ratina ) { ?>
                            <?php if( $hongo_logo ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-light">
                                    <img class="logo" src="<?php echo esc_url( $hongo_logo ); ?>" data-rjs="<?php echo esc_url( $hongo_logo_ratina ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if( $hongo_logo ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-light">
                                    <img class="logo" src="<?php echo esc_url( $hongo_logo ); ?>" data-no-retina="" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <?php if( $hongo_logo_light_ratina ) { ?>
                            <?php if( $hongo_logo_light ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-dark">
                                    <img class="logo" src="<?php echo esc_url( $hongo_logo_light ); ?>" data-rjs="<?php echo esc_url( $hongo_logo_light_ratina ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if( $hongo_logo_light ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-dark">
                                    <img class="logo" src="<?php echo esc_url( $hongo_logo_light ); ?>" data-no-retina="" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <span class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                            </a>
                        </span>
                    <?php } ?>
                    <?php if( is_front_page() ) { ?>
                        </h1>
                    <?php } ?>
                </div>
                <!-- end logo -->
                <!-- accordion-menu -->
                <div class="col-md-10 col-sm-6 col-xs-6 sm-text-right accordion-menu">
	                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
	                    <span class="sr-only"><?php echo esc_html__( 'Toggle Navigation', 'hongo' ); ?></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
                    <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                        <?php   
                            if( has_nav_menu( 'primary-menu' ) ) {
                                $hongo_header_menu_default = array(
                                    'theme_location'  => 'primary-menu',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav alt-font hongo-normal-menu navbar-left no-margin',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'items_wrap'      => '<ul id="%1$s" class="simple-dropdown %2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                );
                                wp_nav_menu( $hongo_header_menu_default );
                            } else {
                            	$hongo_header_menu_default = array( 
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav alt-font hongo-normal-menu navbar-left no-margin',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'items_wrap'      => '<ul id="%1$s" class="simple-dropdown %2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                );
    	                        wp_nav_menu( $hongo_header_menu_default );
                            }
                        ?>
                    </div>
	            </div>
                <!-- end accordion-menu -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </nav>
    <!-- end navigation -->
</header>
<!-- end header -->

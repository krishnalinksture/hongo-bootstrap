<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Check if 404 page image set ot not */  
$hongo_image_url            = get_theme_mod( 'hongo_page_not_found_image', '' );
$hongo_page_not_found_image = ! empty( $hongo_image_url )  ? ' style="background-image:url('.esc_url( $hongo_image_url ).');"': '';
$hongo_image_bg_class       = ( $hongo_image_url ) ? ' cover-background': '';

/* Get 404 page main title */
$hongo_page_not_found_main_title            = get_theme_mod( 'hongo_page_not_found_main_title', __( 'OOPS!', 'hongo' ) );
/* Get 404 page main title text transform */
$hongo_page_not_found_main_title_text_trfm  = get_theme_mod( 'hongo_page_not_found_main_title_text_transform', '' );
/* Get 404 page title */
$hongo_page_not_found_title                 = get_theme_mod( 'hongo_page_not_found_title', __( 'That page can’t be found.', 'hongo' ) );
/* Get 404 page title text transform */
$hongo_page_not_found_title_text_trfm       = get_theme_mod( 'hongo_page_not_found_title_text_transform', '' );
/* Get 404 page subtitle */
$hongo_page_not_found_subtitle              = get_theme_mod( 'hongo_page_not_found_subtitle', __( 'It looks like nothing was found at this location.Maybe try a search?', 'hongo' ) );
/* Get 404 page subtitle text transform */
$hongo_page_not_found_subtitle_text_trfm    = get_theme_mod( 'hongo_page_not_found_subtitle_text_transform', '' );    
/* Check if button hide / show */
$hongo_page_not_found_button                = get_theme_mod( 'hongo_page_not_found_button', '1' ); 
/* Get button text */
$hongo_page_not_found_button_text           = get_theme_mod( 'hongo_page_not_found_button_text', __( 'BACK TO HOME PAGE', 'hongo' ) );
/* Get button url */
$hongo_page_not_found_button_url            = get_theme_mod( 'hongo_page_not_found_button_url', home_url( '/' ) );
/* Check if search hide / show */
$hongo_page_not_found_search                = get_theme_mod( 'hongo_page_not_found_search', '1' );
/* Check if search placeholder text */
$hongo_search_placeholder_text              = get_theme_mod( 'hongo_search_placeholder_text', __( 'Enter your keywords...', 'hongo' ) );
/* Get 404 top space header height */
$hongo_page_not_found_top_space             = get_theme_mod( 'hongo_page_not_found_top_space', 'yes' );

$hongo_top_space_class = ! empty( $hongo_page_not_found_top_space ) && $hongo_page_not_found_top_space == 'yes' ? ' top-space' : '';

$hongo_page_not_found_main_title_text_trfm  = ( $hongo_page_not_found_main_title_text_trfm ) ? ' '.$hongo_page_not_found_main_title_text_trfm : '';
$hongo_page_not_found_title_text_trfm       = ( $hongo_page_not_found_title_text_trfm ) ? ' '.$hongo_page_not_found_title_text_trfm : '';
$hongo_page_not_found_subtitle_text_trfm    = ( $hongo_page_not_found_subtitle_text_trfm ) ? ' '.$hongo_page_not_found_subtitle_text_trfm : '';

echo '<section id="home" class="no-padding z-index-1 position-relative' . esc_attr( $hongo_top_space_class ) . esc_attr( $hongo_image_bg_class ) . '"' . $hongo_page_not_found_image . '>'; // @codingStandardsIgnoreLine
?>
	<div class="container position-relative full-screen page-not-found">
		<div class="slider-typography text-center">
			<div class="slider-text-middle-main">
				<div class="slider-text-middle">
					<div class="center-col hongo-404-content-bg">
						<div class="hongo-404-content-wrap">
							<?php if( $hongo_page_not_found_main_title ) { ?>
								<?php $hongo_page_not_found_main_title = str_replace( '||', '<br />', $hongo_page_not_found_main_title ); ?>
								<h2 class="hongo-404-main-title alt-font<?php echo esc_attr( $hongo_page_not_found_main_title_text_trfm ); ?>">
									<?php echo esc_html( $hongo_page_not_found_main_title ); ?>
								</h2>
							<?php } ?>
							<?php if( $hongo_page_not_found_title ) { ?>
								<?php $hongo_page_not_found_title = str_replace( '||', '<br />', $hongo_page_not_found_title ); ?>
								<span class="hongo-404-title alt-font<?php echo esc_attr( $hongo_page_not_found_title_text_trfm ); ?>">
									<?php echo esc_html( $hongo_page_not_found_title ); ?>
								</span>
							<?php } ?>
							<?php if( $hongo_page_not_found_subtitle ) { ?>
								<?php $hongo_page_not_found_subtitle = str_replace( '||', '<br />', $hongo_page_not_found_subtitle ); ?>
								<h6 class="alt-font hongo-404-subtitle<?php echo esc_attr( $hongo_page_not_found_subtitle_text_trfm ); ?>">
									<?php echo esc_html( $hongo_page_not_found_subtitle ); ?>
								</h6>
							<?php } ?>
							<?php if( $hongo_page_not_found_search == 1 ) { ?>
								<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form position-relative">
									<div class="input-group-404 input-group">
										<input type="text" id="search" class="search-input" placeholder="<?php echo esc_attr( $hongo_search_placeholder_text ); ?>" value="<?php echo get_search_query(); ?>" name="s">
										<?php if( hongo_is_woocommerce_activated() ) { ?>
											<input type="hidden" name="post_type" value="product" />
										<?php } ?>
										<div class="input-group-btn">
											<button type="submit" class="btn alt-font">
												<i class="ti-search"></i>
											</button>
										</div>
									</div>
								</form>
							<?php } ?>
							<?php if( $hongo_page_not_found_button == 1 ) { ?>
								<a href="<?php echo esc_url( $hongo_page_not_found_button_url ); ?>" class="btn btn-black btn-medium alt-font">
									<?php echo esc_html( $hongo_page_not_found_button_text ); ?>
								</a>
							<?php } ?>
						</div>
					</div>                          
				</div>
			</div>
		</div>
	</div>
</section>

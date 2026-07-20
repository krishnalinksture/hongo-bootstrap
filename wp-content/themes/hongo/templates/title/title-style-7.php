<?php
/**
 * Title section
 *
 * This template can be overridden by copying it to yourchildtheme/templates/title/title-style-7.php
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Gallery Background */
$content_height_class = ! empty( $content_height ) ? $content_height_class : ' one-second-screen';
$alignment_class = ! empty( $hongo_title_subtitle_alignment ) ? $alignment_class : ' text-center';
$hongo_title_bg_image_overlay = ( $hongo_title_opacity != '' ) ? '<div class="hongo-overlay bg-opacity-color"></div>' : '';

echo '<section class="bg-very-light-gray hongo-main-title-wrap' . esc_attr( $hongo_title_class.'-wrap ' ) . esc_attr( $hongo_title_style ) . esc_attr( $hongo_space_class ) . '">'; // @codingStandardsIgnoreLine
	echo wp_kses_post( $hongo_title_bg_image_overlay, '' );
	if( $hongo_title != '' || ( $hongo_enable_subtitle != '0' && $hongo_title_subtitle ) || ( $hongo_enable_breadcrumb == 1 && $hongo_breadcrumb_position == 'title-area' ) || $hongo_title_scroll_to_down == 1 || $hongo_enable_title_heading == '1' ) {
	?>
		<div class="<?php echo esc_attr( $container_style ); ?>">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large<?php echo esc_attr( $content_height_class ); ?>">
					<div class="display-table-cell vertical-align-middle<?php echo esc_attr( $alignment_class ); ?>">
						<?php if( $hongo_enable_subtitle != '0' && $hongo_title_subtitle ) { ?>
							<span class="display-block alt-font hongo-main-subtitle<?php echo esc_attr( $hongo_subtitle_class ) . esc_attr( $hongo_subtitle_text_transform ); ?>"><?php echo sprintf( '%s', $hongo_title_subtitle ); ?></span>
						<?php } ?>
						<?php if( $hongo_title && $hongo_enable_title_heading == '1' ) { ?>
							<h1 class="alt-font hongo-main-title text-dark-gray<?php echo esc_attr( $hongo_title_text_transform ) . esc_attr( $hongo_title_class ); ?>"><?php echo sprintf( '%s', $hongo_title ); ?></h1>
						<?php } ?>
						<?php if( $hongo_enable_breadcrumb == 1 && $hongo_breadcrumb_position == 'title-area' ) { ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table no-padding-lr">
								<div class="display-table-cell vertical-align-middle breadcrumb alt-font">
									<ul class="hongo-main-title-breadcrumb<?php echo esc_attr( $hongo_title_class ); ?>-breadcrumb"<?php echo sprintf( '%s', $hongo_breadcumbre_attribute ); ?>>
										<?php echo hongo_breadcrumb_display(); ?>
									</ul>
								</div>
							</div>
						<?php } ?>
						<?php if( ! empty( $hongo_single_post_meta_output ) && $hongo_breadcrumb_position == 'after-title-area' ) { ?>
							<div class="hongo-single-post-meta vertical-align-middle alt-font display-block">
								<?php echo sprintf( '%s', $hongo_single_post_meta_output ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php if( $hongo_title_scroll_to_down == 1 ) { ?>
					<div class="down-section text-center">
						<a href="<?php echo esc_url( $hongo_title_callto_section_id ); ?>" class="section-link"><i class="ti-arrow-down"></i></a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<?php if( $hongo_title_bg_multiple_image ) { ?>
		<div class="swiper-auto-fade swiper-container page-title-slider width-100 height-100" data-slider-options='{ "pagination": ".swiper-pagination", "loop": true, "autoplay": { "delay": 5000 }, "slidesPerView": 1, "clickable": true, "keyboard": { "enabled": true, "onlyInViewport": false }, "preventClicks": false, "watchOverflow": true, "effect": "fade","navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" } }'>
			<div class="swiper-wrapper">
				<?php
					$hongo_title_bg_multiple_image = explode( ',', $hongo_title_bg_multiple_image );
					foreach ($hongo_title_bg_multiple_image as $key => $value) {
						$hongo_image_url = wp_get_attachment_url( $value );
						$hongo_bg_url = ( $hongo_image_url ) ? ' style="background-image:url(' . esc_url( $hongo_image_url ).');"' : '';
					?>
					<div class="swiper-slide cover-background height-100"<?php echo sprintf( '%s', $hongo_bg_url ); ?>></div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</section>
<?php if( $hongo_enable_breadcrumb == 1  && $hongo_breadcrumb_position == 'after-title-area'  ) { ?>
	<section class="padding-20px-tb border-bottom border-color-extra-light-gray hongo-main-breadcrumb<?php echo esc_attr( $hongo_breadcrumb_class ); ?>">
		<div class="<?php echo esc_attr( $container_style ); ?>">
			<div class="row">
				<div class="col-md-12 display-table">
					<div class="display-table-cell vertical-align-middle<?php echo esc_attr( $breadcrumb_class ); ?>">
						<div class="breadcrumb alt-font text-small no-margin-bottom">
							<ul class="hongo-main-title-breadcrumb<?php echo esc_attr( $hongo_title_class ); ?>-breadcrumb"<?php echo sprintf( '%s', $hongo_breadcumbre_attribute ); ?>>
								<?php echo hongo_breadcrumb_display(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<?php if( ! empty( $hongo_single_post_meta_output ) && $hongo_breadcrumb_position == 'title-area' ) { ?>
	<section class="single-post-meta-wrap">
		<div class="<?php echo esc_attr( $container_style ); ?>">
			<div class="row">
				<div class="col-md-12 display-table">
					<div class="hongo-single-post-meta vertical-align-middle alt-font display-block">
						<?php echo sprintf( '%s', $hongo_single_post_meta_output ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }

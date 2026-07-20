<?php
/**
 * The template for displaying the footer
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

		$hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
		$hongo_header_layout		= hongo_builder_option( 'hongo_header_type', 'headertype1', $hongo_enable_header_general );
		$hongo_enable_header		= hongo_builder_option( 'hongo_enable_header', '1', $hongo_enable_header_general );

		$hongo_hide_scroll_to_top			= get_theme_mod( 'hongo_hide_scroll_to_top', '1' );
		$hongo_hide_scroll_to_top_on_phone	= get_theme_mod( 'hongo_hide_scroll_to_top_on_phone','0' );
		$hongo_scroll_to_top_text			= get_theme_mod( 'hongo_scroll_to_top_text', __( 'SCROLL UP', 'hongo' ) );

		/* Footer */
		get_template_part( 'templates/footer/footer' );

		?>
			</div><!-- box-layout / hongo-layout -->
		<?php
			/* Scroll to Top */
			if ( $hongo_hide_scroll_to_top == 1 ) {
				$mobile_class = $hongo_hide_scroll_to_top_on_phone == 0 ? ' sm-display-none' : '';
		?>
				<a class="scroll-top-arrow alt-font<?php echo esc_attr( $mobile_class ); ?>" href="javascript:void(0);">
					<span><?php echo esc_html( $hongo_scroll_to_top_text ); ?></span>
					<i class="ti ti-arrow-right"></i>
				</a>
		<?php
			}

			// GDPR 
			$hongo_gdpr_enable		= get_theme_mod( 'hongo_gdpr_enable', '0' );
			$hongo_gdpr_enable 		= apply_filters( 'hongo_gdpr_enable', $hongo_gdpr_enable );
			$hongo_gdpr_text		= get_theme_mod( 'hongo_gdpr_text', sprintf( '%s <a href="#">%s</a>', esc_html__( 'Our site uses cookies. By continuing to our site you are agreeing to our cookie', 'hongo' ), esc_html__( 'privacy policy', 'hongo' ) ) );
			$hongo_gdpr_button_text = get_theme_mod( 'hongo_gdpr_button_text', __( 'GOT IT', 'hongo' ) );
			$hongo_gdpr_style		= get_theme_mod( 'hongo_gdpr_style', 'left-content' );
			$hongo_gdpr_style		= ! empty( $hongo_gdpr_style ) ? ' ' . $hongo_gdpr_style : '';
			$gdpr_cookie_name		= ( is_multisite() ) ? 'hongo_gdpr_cookie_notice_accepted-'.get_current_blog_id() : 'hongo_gdpr_cookie_notice_accepted';
			$gdpr_enable_overlay	= ( get_theme_mod( 'hongo_gdpr_enable_overlay', '1' ) != '1' ) ? ' hongo-gdpr-disable-overlay' : '';

			if ( ! isset( $_COOKIE[ $gdpr_cookie_name ] ) && $hongo_gdpr_enable == '1' ) {
				if ( ! empty( $hongo_gdpr_text ) || ! empty( $hongo_gdpr_button_text ) ) {
				?>
					<div class="hongo-cookie-policy-wrapper<?php echo esc_attr( $hongo_gdpr_style ); echo esc_attr( $gdpr_enable_overlay ); ?>">
						<div class="cookie-container">
							<?php if ( ! empty( $hongo_gdpr_text ) ) { ?>
								<div class="hongo-cookie-policy-text alt-font">
									<?php echo sprintf( '%s', $hongo_gdpr_text ); ?>
								</div>
							<?php } ?>
							<?php if ( ! empty( $hongo_gdpr_button_text ) ) { ?>
								<a class="btn btn-black hongo-cookie-policy-button"><?php echo esc_html( $hongo_gdpr_button_text ); ?></a>
							<?php } ?>
						</div>
					</div>
				<?php
				}
			}

			/* Left Menu Style End */
			if ( $hongo_header_layout == 'headertype2' && $hongo_enable_header == 1 ) {
		?>		
					</div><!-- End main site content -->
				</div><!-- End main wrap -->
		<?php } ?>
		<?php wp_footer(); ?>
	</body>
</html>
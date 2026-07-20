<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! $notices ) {
	return;
}

$hongo_info_messages_style = get_theme_mod( 'hongo_info_messages_style' );
$hongo_info_messages_class = ! empty( $hongo_info_messages_style ) && ! is_checkout() ? 'woocommerce-info alert alert-dismissable alert-info alert-message-' . $hongo_info_messages_style : 'alt-font woocommerce-info';

switch ( $hongo_info_messages_style ) {
	case 'style-1':
		foreach ( $notices as $notice ) :
			?>
			<div class="<?php echo esc_attr( $hongo_info_messages_class ); ?>"<?php echo wc_get_notice_data_attr( $notice ); ?>>
				<?php
				if ( ! is_checkout() ) {
					?>
					<span class="hongo-info-message-icon"><i class="icon-info icons"></i></span>
					<?php
				}
				?>
				<?php echo wc_kses_notice( $notice['notice'] ); ?>
			</div>
			<?php
		endforeach;
		break;
	case 'style-2':
	case 'style-3':
	default:
		foreach ( $notices as $notice ) :
			?>
			<div class="<?php echo esc_attr( $hongo_info_messages_class ); ?>"<?php echo wc_get_notice_data_attr( $notice ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php echo wc_kses_notice( $notice['notice'] ); ?>
			</div>
			<?php
		endforeach;
		break;
}

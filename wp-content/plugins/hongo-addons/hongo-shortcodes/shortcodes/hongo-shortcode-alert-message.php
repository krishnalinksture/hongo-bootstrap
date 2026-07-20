<?php
/**
 * Shortcode For Alert Message
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_alert_message_shortcode' ) ) {
	function hongo_alert_message_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'hongo_alert_message_premade_style' => '',
	        	'hongo_alert_message_type' => '',
	        	'hongo_highliget_title' => '',
	        	'hongo_subtitle' => '',
	        	'hongo_text_transform' => '',
	        	'hongo_enable_message_alternate_font' =>'',
	        	'show_close_button' => '1',
	        ), $atts ) );

		$output = $alert_icon_span = $html_element = '';
		$classes = array();

		// Custom class and id 
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        ( $class ) ? $classes[] = $class : '';

        $hongo_alert_message_premade_style = ( $hongo_alert_message_premade_style ) ? $hongo_alert_message_premade_style : '';
		$hongo_alert_message_type = ( $hongo_alert_message_type ) ? $hongo_alert_message_type : '';
		$hongo_highliget_title = ( $hongo_highliget_title ) ? $hongo_highliget_title : '';
		$hongo_subtitle = ( $hongo_subtitle ) ? ( $hongo_subtitle ) : '';
		( $hongo_text_transform ) ? $classes[] = $hongo_text_transform : '';
		$show_close_button = ( $show_close_button == 1 ) ? '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>' : '';
		( $hongo_enable_message_alternate_font == 1 ) ? $classes[] = 'alt-font' : '';

		if( $hongo_alert_message_premade_style == 'alert-message-style-4' ) {

			if( $hongo_alert_message_type == 'success' ) {

				$classes[] = 'woocommerce-message';

			} elseif( $hongo_alert_message_type == 'danger' ) {

				$classes[] = 'woocommerce-error';

			} else {

				$classes[] = 'woocommerce-'.$hongo_alert_message_type;
			}
			//$classes[] = $hongo_alert_message_premade_style;

		} else {

			$classes[] = 'alert-'.$hongo_alert_message_type;
			$classes[] = $hongo_alert_message_premade_style;
		}

		if( $hongo_highliget_title || $hongo_subtitle ){
			$html_element .= $show_close_button;
			$html_element .= '<strong>'.$hongo_highliget_title.'</strong>';
			$html_element .= ' '.$hongo_subtitle;
		}

        // Class list 
        $class_list = ( $classes ) ? ' ' . implode(" ", $classes) : '';

		switch ( $hongo_alert_message_premade_style ) {

			case 'alert-message-style-1':
				if( $hongo_alert_message_type == 'success' ) {
					$alert_icon_span='<span><i class="icon-check icons"></i></span>';
				} 
				elseif( $hongo_alert_message_type == 'info' ) {
					$alert_icon_span='<span><i class="icon-info icons"></i></span>';
				}
				elseif( $hongo_alert_message_type == 'warning' ) {
					$alert_icon_span='<span><i class="icon-ban icons"></i></span>';
				}
				elseif( $hongo_alert_message_type == 'danger' ) {
					$alert_icon_span='<span><i class="icon-close icons"></i></span>';
				}
				if( $hongo_highliget_title || $hongo_subtitle ) {
					$output .= '<div'.$id.' role="alert" class="alert alert-dismissable'. esc_attr( $class_list ) .'">';
						$output .= $show_close_button;
						$output .= ( $alert_icon_span ) ? $alert_icon_span : '';
							$output .= '<strong>'.$hongo_highliget_title.'</strong>';
							$output .= ' '.$hongo_subtitle;
					$output .='</div>';
				}
			break;

			case 'alert-message-style-2':
				if( $hongo_highliget_title || $hongo_subtitle ) {
					$output .= '<div'.$id.' role="alert" class="alert alert-dismissable'. esc_attr( $class_list ) .'">';
						$output .= $html_element;
					$output .='</div>';	
				}
			break;
			
			case 'alert-message-style-3':
				if( $hongo_highliget_title || $hongo_subtitle ) {
					$output .= '<div'.$id.' role="alert" class="alert alert-dismissable'. esc_attr( $class_list ) .'">';
						$output .= $html_element;
					$output .='</div>';
				}
			break;

			case 'alert-message-style-4':
				if( $hongo_highliget_title || $hongo_subtitle ) {
					$output .= '<div'.$id.' role="alert" class="alt-font alert alert-dismissable'. esc_attr( $class_list ) .'">';
						$output .= $html_element;
					$output .='</div>';
				}
			break;
		}
	    return $output;
	}
}
add_shortcode('hongo_alert_message','hongo_alert_message_shortcode');
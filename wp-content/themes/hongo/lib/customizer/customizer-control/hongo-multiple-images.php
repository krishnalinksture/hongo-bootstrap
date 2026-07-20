<?php
/**
 * Customizer Control: Multiple Images
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( class_exists('WP_Customize_Control') ) {

	if ( ! class_exists( 'Hongo_Customize_Multiple_Image' ) ) {

		class Hongo_Customize_Multiple_Image extends WP_Customize_Control {

		    /**
		     * The type of customize control being rendered.
		     *
		     * @since  1.0.0
		     * @access public
		     * @var    string
		     */
		    public $type = 'hongo_multiple_image';

		   
		    /**
		     * Displays the control content.
		     *
		     * @since  1.0.0
		     * @access public
		     * @return void
		     */
		    public function render_content() { ?>

		        <?php if ( ! empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>

		        <?php if ( ! empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <?php endif; ?>

		        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		        <?php
		        echo '<div class="hongo_description_box">';
					echo '<div class="multiple_images">';
						foreach ( $multi_values as $key => $value ) {
							if (! empty( $value ) ):
								$hongo_image_url = wp_get_attachment_url( $value );
								echo'<div id='.esc_attr($value).'>';
									echo '<img class="upload_image_screenshort_multiple width-100px" src="'.esc_url( $hongo_image_url ).'" />';
									echo '<a href="javascript:void(0)" class="remove">'.esc_html__( 'Remove', 'hongo' ).'</a>';
								echo '</div>';
							endif;
						}
					echo '</div>';
					echo '<input class="hongo_upload_button_multiple_customizer" id="hongo_upload_button_multiple_customizer" type="button" value="'.esc_html__( 'Browse', 'hongo' ).'" />'.esc_html__( ' Select Files', 'hongo' );
				echo '</div>';
		        ?>
		        <input type="hidden" class="upload_field_multiple_customizer" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
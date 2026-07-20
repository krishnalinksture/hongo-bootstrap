<?php
/**
 * Customizer Control: Multiple Checkbox
 *
 * @package Hongo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( class_exists('WP_Customize_Control') ) {

	if ( ! class_exists( 'Hongo_Customize_Checkbox_Multiple' ) ) {

		class Hongo_Customize_Checkbox_Multiple extends WP_Customize_Control {

		    public $type = 'hongo_checkbox_multiple';
		   
		    public function render_content() {

		        if ( empty( $this->choices ) ) {
		            return; 
		        }
		        
		        if ( ! empty( $this->label ) ) {
		    ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		    <?php }

		        if ( ! empty( $this->description ) ) {
		    ?>
		            <span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html( 'post' ) ); ?></span>
		    <?php }

		        $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		        <ul class="customize-control-checkbox-multiple">
		            <?php foreach ( $this->choices as $value => $label ) { ?>
		            	<?php if ( ! empty( $value ) ) { ?>
			                <li>
			                    <label>
			                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
			                        <?php echo esc_html( $label ); ?>
			                    </label>
			                </li>
		                <?php } ?>
		            <?php } ?>
		        </ul>

		        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
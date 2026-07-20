<?php
/**
 * Customizer Control: Social Icons
 *
 * @package Hongo-addons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( class_exists('WP_Customize_Control') ) {

	if( ! class_exists( 'Hongo_Customize_Post_Social_Share' ) ) {

		class Hongo_Customize_Post_Social_Share extends WP_Customize_Control {

		    public $type = 'hongo_post_social_icons';

		    public function render_content() {

		    	$arr = array();
		        if ( empty( $this->choices ) ) {
		            return; 
		        }
		    	
		    	if ( ! empty( $this->label ) ) {
		    ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		    <?php }

		        if ( ! empty( $this->description ) ) {
		    ?>
		            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		    <?php }

		        $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value();
		        ?>

		        <ul class="hongo-post-social-icon-list">
		        	
		            <?php 
		            	$i = $j = 0;
		            	foreach ( $this->choices as $value => $label ) { 
		            ?>
			                <li>
			                    <label>
			                    	<?php 
				                    	if( in_array( $value, $multi_values ) ) {
											$val 		= $multi_values[$j];
				                    		$val_checked= $multi_values[$j+1];
				                    		$checked 	= ( $val_checked == '1' ) ? 'checked' : '';
				                    		$data_label = $multi_values[$j+2];
				                    	} else {
				                    		$val 		= $value;
				                    		$val_checked= '0';
				                    		$checked 	= '';
				                    		$data_label = $label;
				                    	}
			                    	?>
			                    	<input type="checkbox" <?php echo esc_html( $checked ); ?> class="customize-control-checkbox-social" value="<?php echo esc_html( $val_checked ); ?>">
			                        <input type="text" class="customize-control-textbox-social <?php echo esc_html( $val ); ?>" value="<?php echo esc_attr( $data_label ); ?>" data-value="<?php echo esc_html( $val ); ?>" data-label="<?php echo esc_attr( $data_label ); ?>" readonly />
			                        <img src="<?php echo HONGO_ADDONS_ROOT_DIR ?>/hongo-shortcodes/images/move-icon.png" class="icon-move" alt="<?php esc_html_e( 'Move', 'hongo-addons' ); ?>"> 
			                    </label>
			                </li>
			            <?php 
			            	$i++;
			            	if( in_array( $value, $multi_values ) ) {
			            		$j = $j+3;
			            	}
			            }
			        ?>
		        </ul>
		        <input type="hidden" class="hongo-post-social-icon-list" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
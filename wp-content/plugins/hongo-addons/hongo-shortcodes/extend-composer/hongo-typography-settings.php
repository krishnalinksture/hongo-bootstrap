<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @property mixed data
 */
if ( ! class_exists ( 'hongo_vc_custom_settings' ) ) {

	class hongo_vc_custom_settings {

		/**
		 * @var array
		 */
		protected $size_types = array(
									'lg' => 'Large',
									'lt' => 'Extramedium',
									'md' => 'Medium',
									'sm' => 'Small',
									'xs' => 'Extrasmall',
								);
		/**
		 * @var array
		 */
		protected $layouts = array(
								'xs' => 'mobile-alt',
								'sm' => 'tablet-alt',
								'md' => 'tv',
								'lt' => 'laptop',
								'lg' => 'desktop',
							);
		/**
		 * @var array
		 */
		protected $devices_name = array(
									'xs' => 'Mobile',
									'sm' => 'Tablet',
									'md' => 'Mini desktop',
									'lt' => 'Laptop',
									'lg' => 'Desktop',
								);
		/**
		 * @var array
		 */
		protected $text_tranform = array();
		/**
		 * @var array
		 */
		protected $text_align = array();
		/**
		 * @var array
		 */
		protected $font_weight = array();
		/**
		 * @var array
		 */
		protected $text_decoration = array();
		
        function __construct() {

            if ( function_exists( 'vc_add_shortcode_param' ) ) {
                vc_add_shortcode_param(	'responsive_font_settings', array( $this, 'hongo_font_settings' ), HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/font-settings.js');
                vc_add_shortcode_param(	'hongo_button_settings', array( $this, 'hongo_button_settings' ), HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/button-setting.js');
            }
		}

		/**
		 * @param $settings
		 * @param $value
		 *
		 * @return string
		 */
		public function hongo_font_settings( $settings, $value ) {
			$output = '';
			ob_start();
			$this->font_weight = array(
									esc_html__( '100', 'hongo-addons' )   => '100',
									esc_html__( '200', 'hongo-addons' )   => '200',
									esc_html__( '300', 'hongo-addons' )   => '300',
									esc_html__( '400', 'hongo-addons' )   => '400',
									esc_html__( '500', 'hongo-addons' )   => '500',
									esc_html__( '600', 'hongo-addons' )   => '600',
									esc_html__( '700', 'hongo-addons' )   => '700',
									esc_html__( '800', 'hongo-addons' )   => '800',
									esc_html__( '900', 'hongo-addons' )   => '900',
								);
			$this->text_align = array(
									esc_html__( 'Center', 'hongo-addons' )   => 'center',
									esc_html__( 'Left', 'hongo-addons' )  => 'left',
									esc_html__( 'Right', 'hongo-addons' ) => 'right',
								);
			$this->text_tranform = array(
									esc_html__( 'Capitalize', 'hongo-addons' ) => 'capitalize',
									esc_html__( 'Lowercase', 'hongo-addons' ) => 'lowercase',
									esc_html__( 'Uppercase', 'hongo-addons' ) => 'uppercase',
									esc_html__( 'None', 'hongo-addons' ) => 'none',
								);
			$values = $this->hongo_resposive_values( $value );
			$sizes = $this->size_types;
			$layouts = $this->layouts;
			$devices_name = $this->devices_name;

			?>
			<div class="vc_column-offset" data-column-offset="true">
				<div class="hongo-font-settings-container button-container">
					<input name="<?php echo esc_attr( $settings['param_name'] ); ?>"
					       class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ); ?>
					<?php echo esc_attr( $settings['type'] ); ?> '_field" type="hidden" value="<?php echo esc_attr( $value ); ?>"/>
					<div class="hongo-font-settings-color">
						<?php
						$hide_element_keys 	= ! empty( $settings['hide_element_keys'] ) ? $settings['hide_element_keys'] : array();
							if ( ! in_array( 'text-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'title', 'Color', $values ) );
							}
							if ( ! in_array( 'text-hover-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'title_hover', 'Hover color', $values ) );
							}
						?>
					</div>
					<div class="tab">
						<?php
						$i = $j = 0;
						foreach ( $sizes as $key => $size ) : 
							$active = ( $i == 0 ) ? ' active' : '';
						?>
							<h3  class="font-setting-button <?php echo esc_attr( $size.$active ); ?>"  data-device="<?php echo esc_attr($size); ?>-device">
								<i class="fa-solid fa-<?php echo esc_attr($layouts[$key]); ?>"></i>
								<span><?php echo esc_attr($devices_name[ $key ]); ?></span>
							</h3>
						<?php 
							$i++;
						endforeach;
						?>
					</div>
						<?php
						foreach ( $sizes as $key => $size ) : 
							$active1 = ( $j == 0 ) ? ' active' : '';
						?>
							<div class="<?php echo esc_attr( $size.'-device'.$active1 ); ?> font-setting-content tab-content">
								<div class="hongo-font-setting-wrapper">
								<?php 
								if ( ! in_array( 'text-align', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_text_align( $key ,$values ) );
								}
								if ( ! in_array( 'font-size', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_font_size( $key,$values ) );
								}
								if ( ! in_array( 'line-height', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_font_height( $key,$values ) );
								}
								if ( ! in_array( 'letter-spacing', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_font_letterspacing( $key,$values ) );
								}
								if ( ! in_array( 'font-transform', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_font_transform( $key ,$values ) );
								}
								if ( ! in_array( 'font-weight', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_font_weight( $key ,$values ) );
								}
								if ( ! in_array( 'margin-top', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_margin_top( $key,$values ) );
								}
								if ( ! in_array( 'margin-bottom', $hide_element_keys ) ) {
									printf( '%s', $this->hongo_margin_bottom( $key,$values ) );
								}
								?>
								</div>
							</div>
						<?php  
							$j++; 
						endforeach;
						?>
				</div>
			</div>
			<?php
			$output .= ob_get_contents();
			ob_end_clean();
			return $output;
		}

		/**
		 * @param $settings
		 * @param $value
		 *
		 * @return string
		 */
		public function hongo_button_settings( $settings, $value ) {
			$output = '';
			ob_start(); 
				$this->text_tranform = array(
					esc_html__( 'Capitalize', 'hongo-addons' ) => 'capitalize',
					esc_html__( 'Lowercase', 'hongo-addons' ) => 'lowercase',
					esc_html__( 'Uppercase', 'hongo-addons' ) => 'uppercase',
					esc_html__( 'None', 'hongo-addons' ) => 'none',
				);
				$this->font_weight = array(
					esc_html__( '100', 'hongo-addons' )   => '100',
					esc_html__( '200', 'hongo-addons' )   => '200',
					esc_html__( '300', 'hongo-addons' )   => '300',
					esc_html__( '400', 'hongo-addons' )   => '400',
					esc_html__( '500', 'hongo-addons' )   => '500',
					esc_html__( '600', 'hongo-addons' )   => '600',
					esc_html__( '700', 'hongo-addons' )   => '700',
					esc_html__( '800', 'hongo-addons' )   => '800',
					esc_html__( '900', 'hongo-addons' )   => '900',
				);
				$this->text_decoration = array(
					esc_html__( 'None', 'hongo-addons' )   		 => 'none',
					esc_html__( 'Underline', 'hongo-addons' )    => 'underline',
					esc_html__( 'Overline', 'hongo-addons' )     => 'overline',
					esc_html__( 'Line through', 'hongo-addons' ) => 'line-through',
				);

				$values 			= $this->hongo_resposive_values( $value );
				$sizes 				= $this->size_types;
				$layouts 			= $this->layouts;
				$devices_name 		= $this->devices_name;
				$hide_element_keys 	= ! empty( $settings['hide_element_keys'] ) ? $settings['hide_element_keys'] : array();

			?>
				<div class="hongo-color-font-main-wrapper">
					<input name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ); ?> <?php echo esc_attr( $settings['type'] ); ?> '_field" type="hidden" value="<?php echo esc_attr( $value ); ?>"/>
					<div class="hongo-button-color-setting">
						<?php
							if ( ! in_array( 'text-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'text', 'Text color', $values ) );
							}
							if ( ! in_array( 'text-hover-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'text_hover', 'Text hover color', $values ) );
							}
							if ( ! in_array( 'background-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'bg', 'Background color', $values ) );
							}
							if ( ! in_array( 'background-hover-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'bg_hover', 'Background hover color', $values ) );
							}
							if ( ! in_array( 'border-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'border', 'Border color', $values ) );
							}
							if ( ! in_array( 'border-hover-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'border_hover', 'Border hover color', $values ) );
							}
							if ( ! in_array( 'icon-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'icon', 'Icon color', $values ) );
							}
							if ( ! in_array( 'icon-hover-color', $hide_element_keys ) ) {
								printf( '%s', $this->hongo_color_settings( 'icon_hover', 'Icon hover color', $values ) );
							}
						?>
					</div>
					<div class="vc_column-offset" data-column-offset="true">
						<div class="hongo-font-settings-container button-container">
							<!-- <div class="wpb_element_label">Button typography</div> -->
							<div class="tab">
								<?php 
								$active = '';
								$i = $j = 0;
								foreach ( $sizes as $key => $size ) {
									$active = ( $i == 0 ) ? ' active' : '';
								?>
								<h3 class="font-setting-button <?php echo esc_attr( $size.$active ); ?>" data-device="<?php echo esc_attr( $size ); ?>-device">
									<i class="fa-solid fa-<?php echo esc_attr( $layouts[$key] ); ?>"></i>
									<span><?php echo esc_attr($devices_name[ $key ]); ?></span>
								</h3>
								<?php 
									$i++;
								}
								?>
							</div>

							<?php 
							foreach ( $sizes as $key => $size ) {
								$active_content = ( $j == 0 ) ? ' active' : '';
							?>
								<div  class="<?php echo esc_attr( $size.'-device'.$active_content ); ?> font-setting-content tab-content">
									<div class="hongo-font-setting-wrapper">
										<?php 
											if ( ! in_array( 'font-size', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_font_size( $key,$values ) );
											}
											if ( ! in_array( 'line-height', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_font_height( $key,$values  ) );
											}
											if ( ! in_array( 'letter-spacing', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_font_letterspacing( $key,$values ) );
											}
											if ( ! in_array( 'font-transform', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_font_transform( $key ,$values ) );
											}
											if ( ! in_array( 'font-weight', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_font_weight( $key ,$values ) );
											}
											if ( ! in_array( 'margin-top', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_margin_top( $key,$values ) );
											}
											if ( ! in_array( 'margin-bottom', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_margin_bottom( $key,$values ) );
											}
											if ( ! in_array( 'text-decoration', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_text_decoration( $key ,$values ) );
											}
											if ( ! in_array( 'border-radius', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_border_radius( $key,$values ) );
											}
											if ( ! in_array( 'border-width', $hide_element_keys ) ) {
												printf( '%s', $this->hongo_border_width( $key,$values ) );
											}
										?>
									</div>
								</div>
							<?php  
								$j++;
							}
							?>
						</div>
					</div>
				</div>
			<?php
			$output .= ob_get_contents();
			ob_end_clean();
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_text_decoration( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-'.$size.'-';
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Text decoration', 'hongo-addons' ).'</div>';
				$output .= '<select name="vc_'.$size.'_responsive_alignment" class="vc_column_offset_field" data-type="text-decoration-'.$size.'">';
					$output .= '<option value="">'.esc_html__( 'Default', 'hongo-addons' ).'</option>';
					foreach ( $this->text_decoration as $label => $index ) {
						$value = $prefix . $index;
						$output .= '<option value="' . $value . '"' . selected( $values['text_decoration_'.$size] , $value ,false) . '>' . $label . '</option>';
					}
				$output .= '</select>';
			$output .= '</div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_font_transform( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-' . $size . '-';
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text transform', 'hongo-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="transform-' . $size . '"><option value="">'.esc_html__('Default','hongo-addons').'</option>';
			foreach ( $this->text_tranform as $label => $index ) {
				$value = $prefix . $index;
				$output .= '<option value="' . $value . '"' . selected( $values['transform_'.$size], $value, false ) . '>' . $label . '</option>';
			}
			$output .= '</select></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_font_weight( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-' . $size . '-';
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Font weight', 'hongo-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="weight-' . $size . '"><option value="">'.esc_html__('Default','hongo-addons').'</option>';
				foreach ( $this->font_weight as $label => $index ) {
					$value = $prefix . $index;
					$output .= '<option value="' . $value . '"' . selected( $values['weight_'.$size], $value, false ) . '>' . $label . '</option>';
				}
			$output .= '</select></div>';
			return $output;
		}

		/**
		 * @param $values
		 * @param $title_elements
		 * @param $title
		 *
		 * @return string
		 */
		public function hongo_color_settings( $title_elements, $title = '', $values = array() ) {

			$output = '';
			$prefix = 'color_' . $title_elements;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.$title.'</div>';
				$output .= '<input type="text" data-type="color_'.$title_elements.'" class="Hongo-color-picker" value="'.$values[$prefix].'" />';
			$output .= '</div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_text_align( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-' . $size . '-';
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );
			$output .= '<div class="vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text alignment', 'hongo-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="alignment-' . $size . '"><option value="">'.esc_html__('Default','hongo-addons').'</option>';
				foreach ( $this->text_align as $label => $index ) {
					$value = $prefix . $index;
					$output .= '<option value="' . $value . '"' . selected( $values['align_'.$size], $value, false ) . '>' . $label . '</option>';
				}
			$output .= '</select></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_font_size( $size, $values = array() ) {

			$output = '';
			$prefix = 'font_' . $size ;
			$title = str_replace('lg', 'Large desktop', $prefix);
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );

			$output .= '<div class="vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Font size','hongo-addons').'<small> ('.esc_html__( 'in px','hongo-addons').')</small></div><input type="text" data-type="font-' . $size . '" value="'.$values[$prefix].'"/></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_font_height( $size, $values = array()  ) {

			$output = '';
			$prefix = 'line_' . $size;
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );
			$output = '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Line height','hongo-addons').'<small> ('.esc_html__( 'in px','hongo-addons').')</small></div><input type="text" data-type="line-' . $size . '" value="'.$values[$prefix].'" /></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_font_letterspacing( $size, $values = array()  ) {

			$output = '';
			$prefix = 'letter_' . $size;
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );
			$output = '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Letter spacing','hongo-addons').'<small> ('.esc_html__( 'in px','hongo-addons').')</small></div><input type="text" data-type="letter-' . $size . '" value="'.$values[$prefix].'" /></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_border_radius( $size, $values = array() ) {

			$output = '';
			$prefix = 'border_' . $size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Border radius','hongo-addons').'
				<small> ('.esc_html__( 'in px','hongo-addons').')</small></div>';
				$output .= '<input type="text" data-type="border-' . $size . '" value="'.$values[$prefix].'"/>';
			$output .= '</div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_border_width( $size, $values = array() ) {

			$output = '';			
			$prefix = 'border_width_' . $size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Border thickness','hongo-addons').'
				<small> ('.esc_html__( 'in px','hongo-addons').')</small></div>';
				$output .= '<input type="text" data-type="border-width-' . $size . '" value="'.$values[$prefix].'"/>';
			$output .= '</div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_margin_top( $size, $values = array() ) {

			$output = '';
			$prefix = 'margin_top_' . $size ;
			$title = str_replace('lg', 'Large desktop', $prefix);
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );

			$output .= '<div class="vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Margin top','hongo-addons').'<small> ('.esc_html__( 'in px','hongo-addons').')</small></div><input type="text" data-type="margin-top-' . $size . '" value="'.$values[$prefix].'"/></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function hongo_margin_bottom( $size, $values = array() ) {

			$output = '';
			$prefix = 'margin_bottom_' . $size ;
			$title = str_replace('lg', 'Large desktop', $prefix);
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'hongo-addons' ) : esc_html__( 'Inherit from smaller', 'hongo-addons' );

			$output .= '<div class="vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Margin bottom','hongo-addons').'<small> ('.esc_html__( 'in px','hongo-addons').')</small></div><input type="text" data-type="margin-bottom-' . $size . '" value="'.$values[$prefix].'"/></div>';
			return $output;
		}

		/**
		 * @param $value
		 *
		 * @return array
		 */
		public static function hongo_resposive_values( $value ) {

            $responsive_settings = array( 'color_title'=>'','color_title_hover'=>'', 'font_lg' => '', 'font_md' => '','font_sm' => '', 'font_xs' => '' ,'line_lg' =>'' , 'line_md' =>'' ,'line_sm' =>'','line_xs' =>'' , 'transform_lg'=>'' ,'transform_md'=>'','transform_sm'=>'','transform_xs'=>'' ,'weight_lg'=>'' ,'weight_md'=>'','weight_sm'=>'','weight_xs'=>'','margin_top_lg'=>'' ,'margin_top_lt'=>'' ,'margin_top_md'=>'','margin_top_sm'=>'','margin_top_xs'=>'','margin_bottom_lg'=>'' ,'margin_bottom_lt'=>'' ,'margin_bottom_md'=>'','margin_bottom_sm'=>'','margin_bottom_xs'=>'','decoration_lg'=>'' ,'decoration_md'=>'','decoration_sm'=>'','decoration_xs'=>'','letter_lg'=>'','letter_md'=>'','letter_sm'=>'','letter_xs'=>'','color_text'=>'','color_text_hover'=>'','color_bg'=>'','color_bg_hover'=>'','color_border'=>'','color_border_hover'=>'','color_icon'=>'','color_icon_hover'=>'','text_decoration_lg' => '', 'text_decoration_md' => '','text_decoration_sm' => '', 'text_decoration_xs' => '','align_lg'=>'','align_md'=>'','align_sm'=>'','align_xs'=>'','border_lg'=>'','border_md'=>'','border_sm'=>'','border_xs'=>'','border_width_lg'=>'','border_width_md'=>'','border_width_sm'=>'','border_width_xs'=>'', 'font_lt' => '', 'line_lt' =>'', 'weight_lt'=>'', 'decoration_lt'=>'', 'letter_lt'=>'', 'transform_lt'=>'', 'text_decoration_lt' => '', 'align_lt'=>'', 'border_lt'=>'', 'border_width_lt'=>'' );

           	$value = str_replace( '},', '', explode( '{', $value ?? '' ) );
			
			if ( ! empty( $value[1] ) ) {
				
				return vc_parse_multi_attribute( $value[1], $responsive_settings );
			}
			return $responsive_settings;
	    }

	    /**
		 * @param $value
		 *
		 * @return string
		 */
		public static function generate_css( $value ) {

            if ( empty( $value ) ) {
                return;
            }
            $hongo_separate_settings = explode('},', $value );

            /* Separate all settings */
            if ( ! empty( $hongo_separate_settings ) ) {

            	$res_css = $desktop = $mini = $laptop = $tablet = $mobile = '';
            	$atts = array( 'margin', 'padding', 'border' );
	            $positions = array( 'top', 'right', 'bottom', 'left' );
	            $res_style = array( 'desktop' => '', 'laptop' => '', 'mini'=>'', 'tablet' => '', 'mobile' => '' );
	            $res_style_icon = $res_style_icon_hover = $res_style_hover = array( 'desktop' => '' );

            	$media_query = apply_filters( 'hongo_resposive_options_breakpoints', array( 'desktop' => '', 'laptop' => '@media (max-width: 1500px)', 'mini' => '@media (max-width: 1199px)', 'tablet'  => '@media (max-width: 991px)', 'mobile'  => '@media (max-width: 767px)') );

	            $i = 0;
	            /* All settings loop */
            	foreach ( $hongo_separate_settings as $key => $value ) {
            		if ( ! empty($value) ) {

            			$value = str_replace( '}','', $value );
            			$value = explode( '{', $value );

            			if ( empty($value[1]) || empty($value[0]) ) {
            				continue;
            			}

            			$values = vc_parse_multi_attribute( $value[1] );
            			$selector_class = $value[0];
            			$res_style['desktop'] = $res_style['laptop'] = $res_style['mini'] = $res_style['tablet'] = $res_style['mobile'] = $res_style_hover['desktop'] = $res_style_icon_hover['desktop'] = $res_style_icon['desktop'] = '';
            			
            			if ( strpos( $selector_class, 'responsive') !== false ) {
						    /* Responsive css loop */
						    foreach ( $atts as $attr ) {
				                foreach( $positions as $pos ) {

				                    if ( isset( $values['' . $attr . '_' . $pos .'_desktop'] ) && $values['' . $attr . '_' . $pos .'_desktop'] != '' ) {
				                        if ( 'border' === $attr ) {
				                            $res_style['mini'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_desktop'] . ' !important; ';
				                        } else {
				                            $res_style['mini'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_desktop'] . ' !important; ';
				                        }
				                    }
				                    if ( isset( $values['' . $attr . '_' . $pos .'_laptop'] ) && $values['' . $attr . '_' . $pos .'_laptop'] != '' ) {
				                        if ( 'border' === $attr ) {
				                            $res_style['laptop'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_laptop'] . ' !important; ';
				                        } else {
				                            $res_style['laptop'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_laptop'] . ' !important; ';
				                        }
				                    } 
				                    if ( isset( $values['' . $attr . '_' . $pos .'_tablet'] ) && $values['' . $attr . '_' . $pos .'_tablet'] != '' ) {
				                        if ( 'border' === $attr ) {
				                            $res_style['tablet'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_tablet'] . ' !important; ';
				                        } else {
				                            $res_style['tablet'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_tablet'] . ' !important; ';
				                        }
				                    } 
				                    if ( isset( $values['' . $attr . '_' . $pos .'_mobile'] ) && $values['' . $attr . '_' . $pos .'_mobile'] != '' ) {
				                        if ( 'border' === $attr ) {
				                            $res_style['mobile'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_mobile'] . ' !important; ';
				                        } else {
				                            $res_style['mobile'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_mobile'] . ' !important; '; 
				                        }
				                    }
				                }
				            }     

				    		// Background Position
				            if ( isset( $values['background_position_desktop'] ) && $values['background_position_desktop'] != '' ) {
				                $res_style['mini'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_desktop']) ) . ' !important; ';
				            }
				            if ( isset( $values['background_position_laptop'] ) && $values['background_position_laptop'] != '' ) {
				                $res_style['laptop'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_laptop']) ) . ' !important; ';
				            }
				            if ( isset( $values['background_position_tablet'] ) && $values['background_position_tablet'] != '' ) {
				                $res_style['tablet'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_tablet']) ) . ' !important; ';
				            }
				            if ( isset( $values['background_position_mobile'] ) && $values['background_position_mobile'] != '' ) {
				                $res_style['mobile'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_mobile']) ) . ' !important; ';
				            }

				            // Hide Background Image
				            if ( isset( $values['hide_image_desktop'] ) && $values['hide_image_desktop'] == '1' ) {
				                $res_style['mini'] .= 'background-image: none !important; ';
				            }
				            if ( isset( $values['hide_image_laptop'] ) && $values['hide_image_laptop'] == '1' ) {
				                $res_style['laptop'] .= 'background-image: none !important; ';
				            }
				            if ( isset( $values['hide_image_tablet'] ) && $values['hide_image_tablet'] == '1' ) {
				                $res_style['tablet'] .= 'background-image: none !important; ';
				            }
				            if ( isset( $values['hide_image_mobile'] ) && $values['hide_image_mobile'] == '1' ) {
				                $res_style['mobile'] .= 'background-image: none !important; ';
				            }

				            // Height
				            if ( isset( $values['height_desktop'] ) && $values['height_desktop'] != '' ) {
				                $res_style['mini'] .= 'min-height: '.$values['height_desktop'].' !important; ';
				            }
				            if ( isset( $values['height_laptop'] ) && $values['height_laptop'] != '' ) {
				                $res_style['laptop'] .= 'min-height: '.$values['height_laptop'].' !important; ';
				            }
				            if ( isset( $values['height_tablet'] ) && $values['height_tablet'] != '' ) {
				                $res_style['tablet'] .= 'min-height: '.$values['height_tablet'].' !important; ';
				            }
				            if ( isset( $values['height_mobile'] ) && $values['height_mobile'] != '' ) {
				                $res_style['mobile'] .= 'min-height: '.$values['height_mobile'].' !important; ';
				            }

				            // Width
				            if ( isset( $values['width_desktop'] ) && $values['width_desktop'] != '' ) {
				                $res_style['mini'] .= 'width: '.$values['width_desktop'].' !important; ';
				            }
				            if ( isset( $values['width_laptop'] ) && $values['width_laptop'] != '' ) {
				                $res_style['laptop'] .= 'width: '.$values['width_laptop'].' !important; ';
				            }
				            if ( isset( $values['width_tablet'] ) && $values['width_tablet'] != '' ) {
				                $res_style['tablet'] .= 'width: '.$values['width_tablet'].' !important; ';
				            }
				            if ( isset( $values['width_mobile'] ) && $values['width_mobile'] != '' ) {
				                $res_style['mobile'] .= 'width: '.$values['width_mobile'].' !important; ';
				            }

						} elseif ( ( strpos( $selector_class, 'font') !== false ) || ( strpos( $selector_class, 'button') !== false ) ) {

	            			$devices_loop_array = array( 'desktop'=>'lg', 'laptop'=>'lt', 'mini'=>'md', 'tablet'=>'sm', 'mobile'=>'xs' );

	            			/* Font settings & Button settings loop */
				            foreach ($devices_loop_array as $key => $value) {

					            if ( isset( $values['font_'.$value]) && $values['font_'.$value] != '' ) {

				            		// font-size
					                $res_style[$key] .= 'font-size: '.$values['font_'.$value].' !important;';

					            }
					            if ( isset( $values['line_'.$value]) && $values['line_'.$value] != '' ) {

					            	// line-height
				                	$res_style[$key] .= 'line-height: '.$values['line_'.$value].' !important;';

				            	}
				            	if ( isset( $values['transform_'.$value] ) && $values['transform_'.$value] != '' ) {

				            		// text-transform
					            	$text_transform = str_replace('text-'.$value.'-','',$values['transform_'.$value]);
					                $res_style[$key] .= 'text-transform: '.$text_transform.' !important;';

				            	}
				            	if ( isset( $values['border_'.$value]) && $values['border_'.$value] != '' ) {

				            		// border-radius
				                	$res_style[$key] .= 'border-radius: '.$values['border_'.$value].' !important;';

				            	}
				            	if ( isset( $values['border_width_'.$value]) && $values['border_width_'.$value] != '' ) {

				            		// border-width
				                	$res_style[$key] .= 'border-width: '.$values['border_width_'.$value].' !important;';

				            	}
				            	if ( isset( $values['letter_'.$value]) && $values['letter_'.$value] != '' ) {

				            		// letter-spacing
					                $res_style[$key] .= 'letter-spacing: '.$values['letter_'.$value].' !important;';

					            }
					            if ( isset( $values['weight_'.$value] ) && $values['weight_'.$value] != '' ) {

					            	// font-weight
					            	$font_weight = str_replace('text-'.$value.'-','',$values['weight_'.$value]);
					            	$res_style[$key] .= 'font-weight: '.$font_weight.' !important;';

					            }
					            if ( isset( $values['margin_top_'.$value]) && $values['margin_top_'.$value] != '' ) {

				            		// margin top
					                $res_style[$key] .= 'margin-top: '.$values['margin_top_'.$value].' !important;';

					            }
					            if ( isset( $values['margin_bottom_'.$value]) && $values['margin_bottom_'.$value] != '' ) {

				            		// margin bottom
					                $res_style[$key] .= 'margin-bottom: '.$values['margin_bottom_'.$value].' !important;';

					            }
					            if ( isset( $values['text_decoration_'.$value] ) && $values['text_decoration_'.$value] != '' ) {

					            	// text-decoration
					            	$text_decoration = str_replace('text-'.$value.'-','',$values['text_decoration_'.$value]);
					                $res_style[$key] .= 'text-decoration: '.$text_decoration.' !important;';
					            }
					            if ( isset( $values['align_'.$value] ) && $values['align_'.$value] != '' ) {

					            	// text-alignment
					            	$text_decoration = str_replace('text-'.$value.'-','',$values['align_'.$value]);
					                $res_style[$key] .= 'text-align: '.$text_decoration.' !important;';
					            }
			            	}
				            // Title color
				            if ( isset( $values['color_title'] ) && $values['color_title'] != '' ) {
				                $res_style['desktop'] .= 'color: '.$values['color_title'].' !important;';
				            }
				            // Title hover color
				            if ( isset( $values['color_title_hover'] ) && $values['color_title_hover'] != '' ) {
				                $res_style_hover['desktop'] .= 'color: '.$values['color_title_hover'].' !important;';
				            }

				            // button color
			            	if ( isset( $values['color_text'] ) && $values['color_text'] != '' ) {
				                $res_style['desktop'] .= 'color: '.$values['color_text'].' !important;';
				            }
				            if ( isset( $values['color_text_hover'] ) && $values['color_text_hover'] != '' ) {
				                $res_style_hover['desktop'] .= 'color: '.$values['color_text_hover'].' !important;';
				            }
				            if ( isset( $values['color_bg'] ) && $values['color_bg'] != '' ) {
				                $res_style['desktop'] .= 'background-color: '.$values['color_bg'].' !important;';
				            }

				            // button hover color
				            if ( isset( $values['color_bg_hover'] ) && $values['color_bg_hover'] != '' ) {
				                $res_style_hover['desktop'] .= 'background-color: '.$values['color_bg_hover'].' !important;';
				            }
				            if ( isset( $values['color_border'] ) && $values['color_border'] != '' ) {
				                $res_style['desktop'] .= 'border-color: '.$values['color_border'].' !important;';
				            }
				            if ( isset( $values['color_border_hover'] ) && $values['color_border_hover'] != '' ) {
				                $res_style_hover['desktop'] .= 'border-color: '.$values['color_border_hover'].' !important;';
				            }

				            // button icon color
				            if ( isset( $values['color_icon'] ) && $values['color_icon'] != '' ) {
				                $res_style_icon['desktop'] .= 'color: '.$values['color_icon'].' !important;';
				            }
				            // button icon hover color
				            if ( isset( $values['color_icon_hover'] ) && $values['color_icon_hover'] != '' ) {
				                $res_style_icon_hover['desktop'] .= 'color: '.$values['color_icon_hover'].' !important;';
				            }

				            // button hover settings css
				            if ( isset( $res_style_hover['desktop'] ) && $res_style_hover['desktop'] !== '' ) {
				            	$res_css .= 'a' . $selector_class . ':hover, ' . $selector_class . ' a:hover {' . $res_style_hover['desktop'] . ' }';
				            }
				            // button icon settings css 
				            if ( isset( $res_style_icon['desktop'] ) && $res_style_icon['desktop'] !== '' ) {
				            	$res_css .= $selector_class.' i { '.$res_style_icon['desktop'].' }';
				            }
				            // button icon hover settings css 
				            if ( isset( $res_style_icon_hover['desktop'] ) && $res_style_icon_hover['desktop'] !== '' ) {
				            	$res_css .= $selector_class.':hover i { '.$res_style_icon_hover['desktop'].' }';
				            }
				        }

			            /* Generate dynamic responsive css by devices */
			            $devices = array( 'desktop', 'laptop', 'mini', 'tablet', 'mobile' );
			            foreach ($devices as $key) {
			            	if ( ! empty( $res_style[$key] ) && $res_style[$key] !== '' ) {
			            		${$key} .= $selector_class.'{'.$res_style[$key].'}';
			            	}
			            }
			        }
	        	}

	        	/* Combine all css by all devices */
			    $devices = array( 'mini', 'laptop', 'tablet', 'mobile' );
	        	foreach ( $devices as $key ) {
	        		if ( ! empty( ${$key} ) ) {
	        			${$key} = $media_query[$key].'{'. ${$key} .'}';
	        		}
	        	}

	        	$res_css .= $desktop . $laptop .$mini . $tablet . $mobile;
	        }

	        return $res_css;
        }

        /**
		 * @param $value
		 *
		 * @return string
		 */
		public static function generate_front_end_css( $value ) {

            if ( empty( $value ) ) {
                return;
            }

        	$res_css = $desktop = $mini = $laptop = $tablet = $mobile = '';
        	$atts = array( 'margin', 'padding', 'border' );
            $positions = array( 'top', 'right', 'bottom', 'left' );
            $res_style = array( 'desktop' => '', 'laptop' => '', 'mini'=>'', 'tablet' => '', 'mobile' => '' );
            $res_style_icon = $res_style_icon_hover = $res_style_hover = array( 'desktop' => '' );

        	$media_query = apply_filters( 'hongo_resposive_options_breakpoints', array( 'desktop' => '', 'laptop' => '@media (max-width: 1500px)', 'mini' => '@media (max-width: 1199px)', 'tablet'  => '@media (max-width: 991px)', 'mobile'  => '@media (max-width: 767px)') );

           	if ( ! empty($value) ) {

    			$value = str_replace( '},','', $value );
    			$value = explode( '{', $value );

    			$values = vc_parse_multi_attribute( $value[1] );
    			$selector_class = $value[0];
    			$res_style['desktop'] = $res_style['laptop'] = $res_style['mini'] = $res_style['tablet'] = $res_style['mobile'] = $res_style_hover['desktop'] = $res_style_icon_hover['desktop'] = $res_style_icon['desktop'] = '';
    			
    			if ( strpos( $selector_class, 'responsive') !== false ) {
				    /* Responsive css loop */
				    foreach ( $atts as $attr ) {
		                foreach( $positions as $pos ) {

		                    if ( isset( $values['' . $attr . '_' . $pos .'_desktop'] ) && $values['' . $attr . '_' . $pos .'_desktop'] != '' ) {
		                        if ( 'border' === $attr ) {
		                            $res_style['mini'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_desktop'] . ' !important; ';
		                        } else {
		                            $res_style['mini'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_desktop'] . ' !important; ';
		                        }
		                    }
		                    if ( isset( $values['' . $attr . '_' . $pos .'_laptop'] ) && $values['' . $attr . '_' . $pos .'_laptop'] != '' ) {
		                        if ( 'border' === $attr ) {
		                            $res_style['laptop'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_laptop'] . ' !important; ';
		                        } else {
		                            $res_style['laptop'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_laptop'] . ' !important; ';
		                        }
		                    } 
		                    if ( isset( $values['' . $attr . '_' . $pos .'_tablet'] ) && $values['' . $attr . '_' . $pos .'_tablet'] != '' ) {
		                        if ( 'border' === $attr ) {
		                            $res_style['tablet'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_tablet'] . ' !important; ';
		                        } else {
		                            $res_style['tablet'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_tablet'] . ' !important; ';
		                        }
		                    } 
		                    if ( isset( $values['' . $attr . '_' . $pos .'_mobile'] ) && $values['' . $attr . '_' . $pos .'_mobile'] != '' ) {
		                        if ( 'border' === $attr ) {
		                            $res_style['mobile'] .= $attr . '-' . $pos . '-width:' . $values['' . $attr . '_' . $pos .'_mobile'] . ' !important; ';
		                        } else {
		                            $res_style['mobile'] .= $attr . '-' . $pos . ':' . $values['' . $attr . '_' . $pos .'_mobile'] . ' !important; '; 
		                        }
		                    }
		                }
		            }     

		    		// Background Position
		            if ( isset( $values['background_position_desktop'] ) && $values['background_position_desktop'] != '' ) {
		                $res_style['mini'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_desktop']) ) . ' !important; ';
		            }
		            if ( isset( $values['background_position_laptop'] ) && $values['background_position_laptop'] != '' ) {
		                $res_style['laptop'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_laptop']) ) . ' !important; ';
		            }
		            if ( isset( $values['background_position_tablet'] ) && $values['background_position_tablet'] != '' ) {
		                $res_style['tablet'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_tablet']) ) . ' !important; ';
		            }
		            if ( isset( $values['background_position_mobile'] ) && $values['background_position_mobile'] != '' ) {
		                $res_style['mobile'] .= 'background-position:' . ( str_replace('-', ' ', $values['background_position_mobile']) ) . ' !important; ';
		            }

		            // Hide Background Image
		            if ( isset( $values['hide_image_desktop'] ) && $values['hide_image_desktop'] == '1' ) {
		                $res_style['mini'] .= 'background-image: none !important; ';
		            }
		            if ( isset( $values['hide_image_laptop'] ) && $values['hide_image_laptop'] == '1' ) {
		                $res_style['laptop'] .= 'background-image: none !important; ';
		            }
		            if ( isset( $values['hide_image_tablet'] ) && $values['hide_image_tablet'] == '1' ) {
		                $res_style['tablet'] .= 'background-image: none !important; ';
		            }
		            if ( isset( $values['hide_image_mobile'] ) && $values['hide_image_mobile'] == '1' ) {
		                $res_style['mobile'] .= 'background-image: none !important; ';
		            }

		            // Height
		            if ( isset( $values['height_desktop'] ) && $values['height_desktop'] != '' ) {
		                $res_style['mini'] .= 'min-height: '.$values['height_desktop'].' !important; ';
		            }
		            if ( isset( $values['height_laptop'] ) && $values['height_laptop'] != '' ) {
		                $res_style['laptop'] .= 'min-height: '.$values['height_laptop'].' !important; ';
		            }
		            if ( isset( $values['height_tablet'] ) && $values['height_tablet'] != '' ) {
		                $res_style['tablet'] .= 'min-height: '.$values['height_tablet'].' !important; ';
		            }
		            if ( isset( $values['height_mobile'] ) && $values['height_mobile'] != '' ) {
		                $res_style['mobile'] .= 'min-height: '.$values['height_mobile'].' !important; ';
		            }

		            // Width
		            if ( isset( $values['width_desktop'] ) && $values['width_desktop'] != '' ) {
		                $res_style['mini'] .= 'width: '.$values['width_desktop'].' !important; ';
		            }
		            if ( isset( $values['width_laptop'] ) && $values['width_laptop'] != '' ) {
		                $res_style['laptop'] .= 'width: '.$values['width_laptop'].' !important; ';
		            }
		            if ( isset( $values['width_tablet'] ) && $values['width_tablet'] != '' ) {
		                $res_style['tablet'] .= 'width: '.$values['width_tablet'].' !important; ';
		            }
		            if ( isset( $values['width_mobile'] ) && $values['width_mobile'] != '' ) {
		                $res_style['mobile'] .= 'width: '.$values['width_mobile'].' !important; ';
		            }

				} elseif ( ( strpos( $selector_class, 'font') !== false ) || ( strpos( $selector_class, 'button') !== false ) ) {

        			$devices_loop_array = array( 'desktop'=>'lg', 'laptop'=>'lt', 'mini'=>'md', 'tablet'=>'sm', 'mobile'=>'xs' );

        			/* Font settings & Button settings loop */
		            foreach ($devices_loop_array as $key => $value) {

			            if ( isset( $values['font_'.$value]) && $values['font_'.$value] != '' ) {

		            		// font-size
			                $res_style[$key] .= 'font-size: '.$values['font_'.$value].' !important;';

			            }
			            if ( isset( $values['line_'.$value]) && $values['line_'.$value] != '' ) {

			            	// line-height
		                	$res_style[$key] .= 'line-height: '.$values['line_'.$value].' !important;';

		            	}
		            	if ( isset( $values['transform_'.$value] ) && $values['transform_'.$value] != '' ) {

		            		// text-transform
			            	$text_transform = str_replace('text-'.$value.'-','',$values['transform_'.$value]);
			                $res_style[$key] .= 'text-transform: '.$text_transform.' !important;';

		            	}
		            	if ( isset( $values['border_'.$value]) && $values['border_'.$value] != '' ) {

		            		// border-radius
		                	$res_style[$key] .= 'border-radius: '.$values['border_'.$value].' !important;';

		            	}
		            	if ( isset( $values['border_width_'.$value]) && $values['border_width_'.$value] != '' ) {

		            		// border-width
		                	$res_style[$key] .= 'border-width: '.$values['border_width_'.$value].' !important;';

		            	}
		            	if ( isset( $values['letter_'.$value]) && $values['letter_'.$value] != '' ) {

		            		// letter-spacing
			                $res_style[$key] .= 'letter-spacing: '.$values['letter_'.$value].' !important;';

			            }
			            if ( isset( $values['weight_'.$value] ) && $values['weight_'.$value] != '' ) {

			            	// font-weight
			            	$font_weight = str_replace('text-'.$value.'-','',$values['weight_'.$value]);
			            	$res_style[$key] .= 'font-weight: '.$font_weight.' !important;';

			            }
			            if ( isset( $values['margin_top_'.$value]) && $values['margin_top_'.$value] != '' ) {

		            		// margin-top
			                $res_style[$key] .= 'margin-top: '.$values['margin_top_'.$value].' !important;';

			            }
			            if ( isset( $values['margin_bottom_'.$value]) && $values['margin_bottom_'.$value] != '' ) {

		            		// margin-bottom
			                $res_style[$key] .= 'margin-bottom: '.$values['margin_bottom_'.$value].' !important;';

			            }
			            if ( isset( $values['text_decoration_'.$value] ) && $values['text_decoration_'.$value] != '' ) {

			            	// text-decoration
			            	$text_decoration = str_replace('text-'.$value.'-','',$values['text_decoration_'.$value]);
			                $res_style[$key] .= 'text-decoration: '.$text_decoration.' !important;';
			            }
			            if ( isset( $values['align_'.$value] ) && $values['align_'.$value] != '' ) {

			            	// text-alignment
			            	$text_decoration = str_replace('text-'.$value.'-','',$values['align_'.$value]);
			                $res_style[$key] .= 'text-align: '.$text_decoration.' !important;';
			            }
	            	}
		            // Title color
		            if ( isset( $values['color_title'] ) && $values['color_title'] != '' ) {
		                $res_style['desktop'] .= 'color: '.$values['color_title'].' !important;';
		            }
		            // Title hover color
		            if ( isset( $values['color_title_hover'] ) && $values['color_title_hover'] != '' ) {
		                $res_style_hover['desktop'] .= 'color: '.$values['color_title_hover'].' !important;';
		            }

		            // button color
	            	if ( isset( $values['color_text'] ) && $values['color_text'] != '' ) {
		                $res_style['desktop'] .= 'color: '.$values['color_text'].' !important;';
		            }
		            if ( isset( $values['color_text_hover'] ) && $values['color_text_hover'] != '' ) {
		                $res_style_hover['desktop'] .= 'color: '.$values['color_text_hover'].' !important;';
		            }
		            if ( isset( $values['color_bg'] ) && $values['color_bg'] != '' ) {
		                $res_style['desktop'] .= 'background-color: '.$values['color_bg'].' !important;';
		            }

		            // button hover color
		            if ( isset( $values['color_bg_hover'] ) && $values['color_bg_hover'] != '' ) {
		                $res_style_hover['desktop'] .= 'background-color: '.$values['color_bg_hover'].' !important;';
		            }
		            if ( isset( $values['color_border'] ) && $values['color_border'] != '' ) {
		                $res_style['desktop'] .= 'border-color: '.$values['color_border'].' !important;';
		            }
		            if ( isset( $values['color_border_hover'] ) && $values['color_border_hover'] != '' ) {
		                $res_style_hover['desktop'] .= 'border-color: '.$values['color_border_hover'].' !important;';
		            }

		            // button icon color
		            if ( isset( $values['color_icon'] ) && $values['color_icon'] != '' ) {
		                $res_style_icon['desktop'] .= 'color: '.$values['color_icon'].' !important;';
		            }
		            // button icon hover color
		            if ( isset( $values['color_icon_hover'] ) && $values['color_icon_hover'] != '' ) {
		                $res_style_icon_hover['desktop'] .= 'color: '.$values['color_icon_hover'].' !important;';
		            }

		            // button hover settings css
		            if ( isset( $res_style_hover['desktop'] ) && $res_style_hover['desktop'] !== '' ) {
		            	$res_css .= 'a' . $selector_class . ':hover, ' . $selector_class . ' a:hover {' . $res_style_hover['desktop'] . ' }';
		            }
		            // button icon settings css 
		            if ( isset( $res_style_icon['desktop'] ) && $res_style_icon['desktop'] !== '' ) {
		            	$res_css .= $selector_class.' i { '.$res_style_icon['desktop'].' }';
		            }
		            // button icon hover settings css 
		            if ( isset( $res_style_icon_hover['desktop'] ) && $res_style_icon_hover['desktop'] !== '' ) {
		            	$res_css .= $selector_class.':hover i { '.$res_style_icon_hover['desktop'].' }';
		            }
		        }

	            /* Generate dynamic responsive css by devices */
	            $devices = array( 'desktop', 'laptop', 'mini', 'tablet', 'mobile' );
	            foreach ($devices as $key) {
	            	if ( ! empty( $res_style[$key] ) && $res_style[$key] !== '' ) {
	            		${$key} .= $selector_class.'{'.$res_style[$key].'}';
	            	}
	            }
	        }

        	/* Combine all css by all devices */
		    $devices = array( 'mini', 'laptop', 'tablet', 'mobile' );
        	foreach ( $devices as $key ) {
        		if ( ! empty( ${$key} ) ) {
        			${$key} = $media_query[$key].'{'. ${$key} .'}';
        		}
        	}

        	$res_css .= $desktop . $laptop .$mini . $tablet . $mobile;

	        return $res_css;
        }
	}
}

new hongo_vc_custom_settings;

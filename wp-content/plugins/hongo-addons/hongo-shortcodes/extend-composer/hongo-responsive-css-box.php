<?php
/**
 * Hongo Responsive CSS Box For VC.
 *
 * @package Hongo
 */
?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( ! class_exists( 'HongoResponsiveCSSBox' ) ) {

    class HongoResponsiveCSSBox {

        /**
         * @var array
         */
        protected $layers = array( 'margin', 'border', 'padding', 'content' );
        /**
         * @var array
         */
        protected $positions = array( 'top', 'right', 'bottom', 'left' );
        /**
         * @var array
         */
        protected $devices = array( 'laptop', 'desktop', 'tablet', 'mobile' );
        function __construct() {

            if ( function_exists( 'vc_add_shortcode_param' ) ) {
                
                vc_add_shortcode_param('responsive_css_editor', array( $this, 'responsive_param' ), HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/responsive-css-script.js' );
            }
        }

        function responsive_param( $settings, $value ) {

            $label = isset( $settings['label'] ) ? $settings['label'] : esc_html__( 'Responsive Options', 'hongo-addons' );
            $height = isset( $settings['height'] ) ? $settings['height'] : '';
            $width = isset( $settings['width'] ) ? $settings['width'] : '';

            $values = $this->get_responsive_values( $value, $height, $width );

            $output = '<div class="hongo-responsive-css-container vc_css-editor vc_row vc_ui-flex-row">';
            $devices_icons = array( '<i class="fa-solid fa-laptop" aria-hidden="true"></i>', '<i class="fa-solid fa-tv" aria-hidden="true"></i>', '<i class="fa-solid fa-tablet-alt rotate-tablet" aria-hidden="true"></i>', '<i class="fa-solid fa-mobile-alt" aria-hidden="true"></i>' );    
            $devices = $this->devices;
            $i = $j = 0;

            $output .= '<div class="hongo-responsive-title-wrapper">';
            foreach( $devices as $device ) {
            	$title = ( $device == 'desktop' ) ? esc_html__( 'Mini Desktop', 'hongo-addons' ) : ucfirst( esc_html( $device ) );
                $active = ( $j == 0 ) ? ' active' : '';
                $output .= '<h3 class="hongo-responsive-css-heading '.$device.$active.'" data-device="'.$device.'-device">' . $devices_icons[$j]  . $title .'</h3>';
                $j++;
            };
            $output .= '</div>';

            foreach( $devices as $device ) {
                
                $active = ( $i == 0 ) ? ' active' : '';
                $output .= '<div class="hongo-main-responsive-wrapper '.$device.'-device'.$active.'">';
                $output .= '<div class="hongo-inner-wrap">';
                    $output .=  $this->onionLayout( $device, $values );
                $output .= '</div>';
                $output .= '</div>';

                $i++;
            };

            $output .= '</div>';
            $output .= '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" />';
            
            return $output;

        }

        public static function get_responsive_values( $value, $height = '', $width = '' ) {

            $responsive_settings = array( 'margin_top_laptop' => '', 'margin_right_laptop' => '', 'margin_bottom_laptop' => '', 'margin_left_laptop' => '', 'border_top_laptop' => '', 'border_right_laptop' => '', 'border_bottom_laptop' => '', 'border_left_laptop' => '', 'padding_top_laptop' => '', 'padding_right_laptop' => '', 'padding_bottom_laptop' => '', 'padding_left_laptop' => '', 'margin_top_desktop' => '', 'margin_right_desktop' => '', 'margin_bottom_desktop' => '', 'margin_left_desktop' => '', 'border_top_desktop' => '', 'border_right_desktop' => '', 'border_bottom_desktop' => '', 'border_left_desktop' => '', 'padding_top_desktop' => '', 'padding_right_desktop' => '', 'padding_bottom_desktop' => '', 'padding_left_desktop' => '', 'margin_top_tablet' => '', 'margin_right_tablet' => '', 'margin_bottom_tablet' => '', 'margin_left_tablet' => '', 'border_top_tablet' => '', 'border_right_tablet' => '', 'border_bottom_tablet' => '', 'border_left_tablet' => '', 'padding_top_tablet' => '', 'padding_right_tablet' => '', 'padding_bottom_tablet' => '', 'padding_left_tablet' => '', 'margin_top_mobile' => '', 'margin_right_mobile' => '', 'margin_bottom_mobile' => '', 'margin_left_mobile' => '', 'border_top_mobile' => '', 'border_right_mobile' => '', 'border_bottom_mobile' => '', 'border_left_mobile' => '', 'padding_top_mobile' => '', 'padding_right_mobile' => '', 'padding_bottom_mobile' => '', 'padding_left_mobile' => '', 'background_position_desktop' => '', 'background_position_tablet' => '', 'background_position_mobile' => '', 'hide_image_desktop' => '', 'hide_image_tablet' => '', 'hide_image_mobile' => '' );

            if ( $height != 'no' ) {
                $responsive_settings['height_laptop'] = '';
                $responsive_settings['height_desktop'] = '';
                $responsive_settings['height_tablet'] = '';
                $responsive_settings['height_mobile'] = '';
            }
            if ( $width != 'no' ) {
                $responsive_settings['width_laptop'] = '';
                $responsive_settings['width_desktop'] = '';
                $responsive_settings['width_tablet'] = '';
                $responsive_settings['width_mobile'] = '';
            }

            $value = str_replace('},','',explode('{', $value ?? ''));
            
            if ( ! empty( $value[1] ) ) {
                
                return vc_parse_multi_attribute( $value[1], $responsive_settings );
            }
            return $responsive_settings;
        }

        /**
         * @return string
         */
        function onionLayout( $prefix = '', $values = array() ) {

            $output = '';
        	$bg_position_value = ! empty( $values['background_position' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ? $values['background_position' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] : '';
        	$hide_image_value = ! empty( $values['hide_image' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ? $values['hide_image' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] : '';
            $height_value = ! empty( $values['height' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ? $values['height' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] : '';
            $width_value = ! empty( $values['width' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ? $values['width' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] : '';

            $output = '<div class="vc_layout-onion vc_col-xs-7">'
                      . '    <div class="vc_margin">' . $this->layerControls( 'margin', $prefix, $values )
                      . '      <div class="vc_border">' . $this->layerControls( 'border', $prefix, $values )
                      . '          <div class="vc_padding">' . $this->layerControls( 'padding', $prefix, $values )
                      . '              <div class="vc_content"><i></i></div>'
                      . '          </div>'
                      . '      </div>'
                      . '    </div>'
                      . '</div>';
            $output .= '<div class="vc_col-xs-5 vc_settings">';
                $output .= '   <label>'.esc_html__( 'Background position', 'hongo-addons' ).'</label>'
                        . '	 <div class="vc_background-position">'
                        . '	   <select name="background_position' . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="background-position' . ( '' !== $prefix ? '-' . $prefix : '' ) . '">'
                        . '		 <option value="" '.selected( '', $bg_position_value, false ).'>'.esc_html__( 'Default', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="left-top" '.selected( 'left-top', $bg_position_value, false ).'>'.esc_html__( 'Left Top', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="left-center" '.selected( 'left-center', $bg_position_value, false ).'>'.esc_html__( 'Left Middle', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="left-bottom" '.selected( 'left-bottom', $bg_position_value, false ).'>'.esc_html__( 'Left Bottom', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="center-top" '.selected( 'center-top', $bg_position_value, false ).'>'.esc_html__( 'Center Top', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="center-center" '.selected( 'center-center', $bg_position_value, false ).'>'.esc_html__( 'Center Middle', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="center-bottom" '.selected( 'center-bottom', $bg_position_value, false ).'>'.esc_html__( 'Center Bottom', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="right-top" '.selected( 'right-top', $bg_position_value, false ).'>'.esc_html__( 'Right Top', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="right-center" '.selected( 'right-center', $bg_position_value, false ).'>'.esc_html__( 'Right Middle', 'hongo-addons' ).'</option>'
                        . ' 		 <option value="right-bottom" '.selected( 'right-bottom', $bg_position_value, false ).'>'.esc_html__( 'Right Bottom', 'hongo-addons' ).'</option>'
                        . '	   </select>'
                        . '  </div>';
                $output .= '   <label>'.esc_html__( 'Hide image', 'hongo-addons' ).'</label>'
                        . '	 <div class="vc_hide-image">'
                        . '	   <select name="hide_image' . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="hide-image' . ( '' !== $prefix ? '-' . $prefix : '' ) . '">'
                        . '		 <option value="" '.selected( '', $hide_image_value, false ).'>'.esc_html__( 'No', 'hongo-addons' ).'</option>'
                        . '		 <option value="1" '.selected( '1', $hide_image_value, false ).'>'.esc_html__( 'Yes', 'hongo-addons' ).'</option>'
                        . '	   </select>'
                        . '  </div>';
                if ( isset( $values['height' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ) {
                  $output .= '   <label>'.esc_html__( 'Minimum height', 'hongo-addons' ).'</label>'
                            . '  <div class="vc_height">'
                            . '    <input type="text" name="height' . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="height' . ( '' !== $prefix ? '-' . $prefix : '' ) . '" value="'.$height_value.'" />'
                            . '  </div>';
                }
                if ( isset( $values['width' . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] ) ) {
                  $output .= '   <label>'.esc_html__( 'Width', 'hongo-addons' ).'</label>'
                            . '  <div class="vc_width">'
                            . '    <input type="text" name="width' . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="width' . ( '' !== $prefix ? '-' . $prefix : '' ) . '" value="'.$width_value.'" />'
                            . '  </div>';
                }
            $output .= '</div>';
            

            return $output;
        }

        /**
         * @param $name
         * @param string $prefix
         *
         * @return string
         */
        protected function layerControls( $name, $prefix = '', $values = array() ) {
            $output = '';
            $output = '<label>' . $name . '</label>';

            foreach ( $this->positions as $pos ) {
                $output .= '<input type="text" name="' . $name . '_' . $pos . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="' . $name . '-' . $pos . ( '' !== $prefix ? '-' . $prefix : '' ) . '" class="vc_' . $pos . '" placeholder="-" value="' .  $values['' . $name . '_' . $pos . ( '' !== $prefix ? '_' . $prefix : '' ) . ''] . '">';
            }

            return $output;
        
        }
    }
}

new HongoResponsiveCSSBox;

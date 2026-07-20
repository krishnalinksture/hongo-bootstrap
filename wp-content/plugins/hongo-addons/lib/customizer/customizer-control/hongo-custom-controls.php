<?php
/**
 * Customizer Control: Custom Controls
 *
 * @package Hongo-addons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

if( class_exists('WP_Customize_Control') ) {

    // For Animation 
    if( ! class_exists('Hongo_Customize_Animation_Control') ) {

        class Hongo_Customize_Animation_Control extends WP_Customize_Control {

            public $type = 'hongo_animation_style';

            /* Render the control's content. */
            public function render_content() {

                // Hackily add in the data link parameter.
                $animation_style = hongo_animation_style_customizer();

                if( ! empty( $animation_style ) ) {
                    ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $animation_style as $value => $label ) {
                                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                                }
                            ?>
                            </select>
                        </label>
                    <?php
                }
            }
        }
    }

    // For Image Srcset 
    if( ! class_exists('Hongo_Customize_Image_SRCSET_Control') ) {

        class Hongo_Customize_Image_SRCSET_Control extends WP_Customize_Control {

            public $type = 'hongo_image_srcset';

            /* Render the control's content. */
            public function render_content() {

                // Hackily add in the data link parameter.
                $hongo_srcset = hongo_get_intermediate_image_sizes();

                if( ! empty( $hongo_srcset ) ) {
                    ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $hongo_srcset as $value => $label ) {
                                    echo '<option value="' . esc_attr( $label ) . '"' . selected( $this->value(), $value, false ) . '>';
                                        $hongo_srcset_image_data = hongo_get_image_size( $label );
                                        $width = ( isset( $hongo_srcset_image_data['width'] ) && $hongo_srcset_image_data['width'] != 0 ) ? $hongo_srcset_image_data['width'].'px' : esc_html__( 'Auto', 'hongo-addons' );
                                        $height = ( isset( $hongo_srcset_image_data['height'] ) && $hongo_srcset_image_data['height'] != 0 ) ? $hongo_srcset_image_data['height'].'px' : esc_html__( 'Auto', 'hongo-addons' );
                                        if( $label == 'full' ) {
                                            echo esc_html__( 'Original Full Size', 'hongo-addons' );
                                        } else {
                                            echo ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                                        }
                                    echo '</option>';
                                }
                            ?>
                            </select>
                        </label>
                    <?php
                }
            }
        }
    }

    // For Preview Image
    if( ! class_exists('Hongo_Customize_Preview_Image_Control') ) {

        class Hongo_Customize_Preview_Image_Control extends WP_Customize_Control {

            public $hongo_img  =  array();
            public $hongo_columns  =  '4';
            public $type = 'hongo_preview_image';

            public function render_content() {

                if ( empty( $this->choices ) ) {
                    return;
                }
                
                $name = '_customize-radio-' . $this->id;

                if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif;
                ?>
                <ul class="hongo-image-select hongo-preview-image-column-<?php echo esc_html( $this->hongo_columns ); ?>">
                    <?php
                        $hongo_img_counter = 0;
                        foreach ( $this->choices as $value => $label ) :

                            $active_class = ( $this->value() == $value ) ? ' active': '';
                    ?>
                            <li class="hongo-preview-image<?php echo esc_attr( $active_class ); ?>">
                            <label>
                                <?php if ( ! empty( $this->hongo_img[$hongo_img_counter] ) ) : ?>
                                    <img title="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_html( $label ); ?>" src="<?php echo esc_url( $this->hongo_img[$hongo_img_counter] ); ?>">
                                <?php else :
                                    echo esc_html( $label );
                                endif; ?>

                                <input type="radio" class="display-none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                            </label>
                            </li>
                    <?php
                            $hongo_img_counter++;
                        endforeach;
                    ?>
                </ul>
                <?php
            }
        }
    }

    // For Radio Button Control Icons

    if( ! class_exists('Hongo_Customize_Preview_Icon_Control') ) {

        class Hongo_Customize_Preview_Icon_Control extends WP_Customize_Control {

            public $hongo_img  =  array();
            public $hongo_columns  =  '4';
            public $type = 'hongo_preview_icon';

            public function render_content() {

                if ( empty( $this->choices ) ) {
                    return;
                }
                
                $name = '_customize-radio-' . $this->id;

                if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif;
                ?>
                <ul class="hongo-icon-select hongo-preview-icon-column-<?php echo esc_html( $this->hongo_columns ); ?>">
                    <?php
                        $hongo_img_counter = 0;
                        foreach ( $this->choices as $value => $label ) :

                            $active_class = ( $this->value() == $value ) ? ' active': '';
                    ?>
                            <li class="hongo-preview-icon<?php echo esc_attr( $active_class ); ?>">
                                <label>
                                    <?php if ( ! empty( $this->hongo_img[$hongo_img_counter] ) ) : ?>
                                        <i title="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_html( $label ); ?>" class="<?php echo esc_attr( $this->hongo_img[$hongo_img_counter] ); ?> hongo-product-icon"></i>
                                    <?php else :
                                        echo esc_html( $label );
                                    endif; ?>

                                    <input type="radio" class="display-none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                                </label>
                            </li>
                    <?php
                            $hongo_img_counter++;
                        endforeach;
                    ?>
                </ul>
                <?php
            }
        }
    }

    // For Switch Control
    if( ! class_exists('Hongo_Customize_Switch_Control') ) {

        class Hongo_Customize_Switch_Control extends WP_Customize_Control {

            public $type = 'hongo_switch';
         
            public function render_content() {

                if ( empty( $this->choices ) ) {
                    return;
                }

                $name = '_customize-radio-' . $this->id;

                if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif;
                ?>
                <ul class="hongo-switch-option">
                <?php
                    $hongo_switch_class = '';
                    foreach ( $this->choices as $value => $label ) :

                        $active_class = ( $this->value() == $value ) ? ' active': '';
                        $hongo_switch_class = ( $value == 1 ) ? 'hongo-switch-option switch-option-enable' : 'hongo-switch-option switch-option-disable';
                    ?>
                        <li class="<?php echo esc_attr( $hongo_switch_class ); ?><?php echo esc_attr( $active_class ); ?>">
                        <label>
                            <?php echo esc_html( $label ); ?>
                            <input type="radio" class="display-none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                        </label>
                        </li>
                <?php
                    endforeach;
                ?>
                </ul>
                <?php
            }
        }
    }

    // For Notice Control
    if( ! class_exists('Hongo_Customize_Notice_Control') ) {

        class Hongo_Customize_Notice_Control extends WP_Customize_Control {

            public $type = 'hongo_notice';
         
            public function render_content() {

                if ( ! empty( $this->label ) ) : ?>
                    <div class="hongo-notice"><?php echo sprintf( '%s', $this->label ); ?></div>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <div class="description customize-section-description"><?php echo esc_html( $this->description ); ?></div>
                <?php endif;
            }
        }
    }

    // For Separator Control
    if( ! class_exists('Hongo_Customize_Separator_Control') ) {

        class Hongo_Customize_Separator_Control extends WP_Customize_Control {

            public $type = 'hongo_separator';
         
            public function render_content() {

                if ( ! empty( $this->label ) ) :
                ?>
                <label><h2><?php echo esc_html( $this->label ); ?></h2></label>
                <?php
                endif;
                if ( ! empty( $this->description ) ) : ?>
                    <div class="description customize-section-description"><?php echo esc_html( $this->description ); ?></div>
                <?php endif;
            }
        }
    }

    // For Menu List Control
    if( ! class_exists( 'Hongo_Customize_Menu_Control' ) ) {

        class Hongo_Customize_Menu_Control extends WP_Customize_Control {
            
            public $type = 'hongo_menu';

            private $menus = false;
            public function __construct($manager, $id, $args = array(), $options = array()) {
                $this->menus = wp_get_nav_menus($options);
                parent::__construct( $manager, $id, $args );
            }
            /**
             * Render the content on the theme customizer page
            */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }

                if( ! empty( $this->menus ) ) {
                    ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <select <?php $this->link(); ?>>
                        <?php
                            foreach ( $this->choices as $value => $label )
                                echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                            ?>
                        <?php foreach ( $this->menus as $menu ) { ?>
                            <option value="<?php echo esc_attr( $menu->slug ); ?>" <?php echo selected($this->value(), $menu->slug, false); ?>><?php echo esc_html( $menu->name ); ?></option>
                        <?php } ?>
                        </select>
                    </label>
                    <?php
                }
            }
        }
    }
}
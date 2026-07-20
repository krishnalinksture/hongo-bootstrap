<?php
/**
 * Hongo Mega Menu Options For Admin And Front.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/**
 * Navigation Menu API: Hongo_Shop_Menu_Walker class
 *
 */

/**
 * Hongo Front Menu Walker Class.
 *
 */

if( ! class_exists( 'Hongo_Shop_Menu_Walker' ) ) {

    class Hongo_Shop_Menu_Walker extends Walker_Nav_Menu {
        
        /* Define public variable for mega menu block */
        public $hongo_mega_menu_section = '';

        /**
         * Starts the list before the elements are added.
         *
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );

            // Default class.
            $classes = array( 'sub-menu' );

            $hongo_mega_menu_section = ! empty( $this->hongo_mega_menu_section ) ? $this->hongo_mega_menu_section : '';

            if( $depth == 0 ) {
                if( ! empty( $hongo_mega_menu_section ) ) {
                    $output .= '<div class="shop-menu-wrap-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full col-md-9 col-xs-12" >';
                    $classes[] = 'equalize sm-equalize-auto';
                }
            }

            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             */

            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';            

            $output .= "{$n}{$indent}<ul$class_names>{$n}";
            
        }

        /**
         * Ends the list of after the elements are added.
         *
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );
            $output .= "$indent</ul>{$n}";            

            if( $depth == 0 && ! empty( $hongo_mega_menu_section ) ) {
                $output .= '</div>';
            }
        }

        /**
         * Starts the element output.
         *
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $link_class = '';
            $classes[] = 'menu-item-' . $item->ID;

            /*
             * Get navigatin menu options
             *
             */
            $hongo_mega_menu_section                    = get_post_meta( $item->ID, '_hongo_mega_menu_section', true );
            $hongo_mega_menu_enable_icon_image_status   = get_post_meta( $item->ID, '_hongo_mega_menu_enable_icon_image_status', true );
            $hongo_menu_item_icon                       = get_post_meta( $item->ID, '_hongo_menu_item_icon', true );
            $hongo_mega_menu_icon_image_url             = get_post_meta( $item->ID, '_hongo_mega_menu_icon_image_url', true );
            $hongo_submenu_position                     = get_post_meta( $item->ID, '_hongo_submenu_position', true );

            switch ( $depth ) {
                case '0':
                    if( $args->walker->has_children || ! empty( $hongo_mega_menu_section ) ) {
                        $classes[] = 'dropdown';
                    }
                    if( ! empty( $hongo_mega_menu_section ) ) {
                        $classes[] = 'megamenu-fw';
                    } else {
                        $classes[] = 'simple-dropdown';
                        $classes[] = $hongo_submenu_position == 'left' ? 'simple-dropdown-left' : 'simple-dropdown-right';
                    }
                    if( ! empty( $hongo_mega_menu_section ) ) {
                        $this->hongo_mega_menu_section = $hongo_mega_menu_section;
                    } else {
                        $this->hongo_mega_menu_section = '';
                    }
                break;
                default:
                    if( $args->walker->has_children || ! empty( $hongo_mega_menu_section ) ) {
                        $classes[] = 'dropdown';
                    }
                break;
            }

            /**
             * Filters the arguments for a single nav menu item.
             *
             */
            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

            /**
             * Filters the CSS class(es) applied to a menu item's list item element.
             *
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            //$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : 'javascript:void(0);';

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = $image = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            /**
             * Filters a menu item's title.
             *
             */
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            $item_output = $args->before;

            $link_class = apply_filters( 'hongo_category_link_css_class', $link_class, $depth );
            $link_class_name = $link_class ? ' class="' . esc_attr( $link_class ) . '"' : '';

            $custom_image = $custom_icon = '';
            if( $hongo_mega_menu_enable_icon_image_status == 'enabled' ) {
                
                $item_output .= '<a'. $attributes .' itemprop="url" '.$link_class_name.'>';
                
                    /* Add menu image */
                    if( ! empty( $hongo_mega_menu_icon_image_url ) ) {
                        $custom_image = '<img class="menu-link-icon" alt="' . esc_attr__( 'Icon', 'hongo-addons' ) . '" src="'.esc_url( $hongo_mega_menu_icon_image_url ).'">';                        
                    }
                    
                    $item_output .= $args->link_before . $image . $custom_image . $title . $args->link_after;

                    if( ( $depth == 1 || $depth == 2 ) && empty( $hongo_mega_menu_section ) && 
                        $args->walker->has_children ) {
                        $item_output .= '<i class="ti-angle-right"></i>';
                    }

                $item_output .= '</a>';

            } else {
                $item_output .= '<a'. $attributes .' itemprop="url" '.$link_class_name.'>';
                
                    /* Add menu icon */
                    if( ! empty( $hongo_menu_item_icon ) && $hongo_menu_item_icon != 1 ) {
                        $custom_icon = '<i class="'.esc_attr( $hongo_menu_item_icon ).esc_attr( $link_class ).'"></i>';                        
                    }
                    $item_output .= $args->link_before . $image . $custom_icon . $title . $args->link_after;

                    if( ( $depth == 1 || $depth == 2 ) && empty( $hongo_mega_menu_section ) && 
                        $args->walker->has_children ) {
                        $item_output .= '<i class="ti-angle-right"></i>';
                    }

                $item_output .= '</a>';
            }

            if( ! empty( $hongo_mega_menu_section ) ) {
                
                $hongo_mega_menu_post_object = get_post( $hongo_mega_menu_section );
                $mega_menu_section_content = '';
                global $hongo_featured_array;

                add_filter( 'hongo_row_extra_class', 'hongo_add_section_builder_style_class' );
                if ( ! empty( $hongo_mega_menu_post_object ) && $hongo_mega_menu_post_object->post_status == 'publish' ) {
                    $vc_custom_css = $hongo_megamenu_background_color = $hongo_megamenu_background_image = $hongo_megamenu_background_image_position = '';
                    $vc_custom_css = get_post_meta( $hongo_mega_menu_section, '_wpb_shortcodes_custom_css', true );
                    $vc_custom_css .= get_post_meta( $hongo_mega_menu_section, '_hongo_custom_css', true );
                    
                    $hongo_megamenu_background_color = get_post_meta( $hongo_mega_menu_section, '_hongo_megamenu_background_color', true );
                    $hongo_megamenu_background_image = get_post_meta( $hongo_mega_menu_section, '_hongo_megamenu_background_image', true );
                    $hongo_megamenu_background_image_position = get_post_meta( $hongo_mega_menu_section, '_hongo_megamenu_background_image_position', true );

                    $hongo_megamenu_background = '';
                    if( ( $hongo_megamenu_background_color && $hongo_megamenu_background_image ) || $hongo_megamenu_background_image ) {
                        $hongo_megamenu_background = 'style="background-image : url('.$hongo_megamenu_background_image.')"'; 
                    } elseif( $hongo_megamenu_background_color ) {
                        $hongo_megamenu_background = 'style="background-color : '.$hongo_megamenu_background_color.'"'; 
                    }

                    $item_output .= '<div class="menu-wrap-div shop-mega-menu-wrapper '.$hongo_megamenu_background_image_position.'" '.$hongo_megamenu_background.'>';
                        $item_output .= '<div class="container">';
                            $mega_menu_section_content = $hongo_mega_menu_post_object->post_content;

                            $item_output .= hongo_remove_wpautop( $mega_menu_section_content );
                            
                            if( current_user_can( 'edit_posts' ) && ! is_customize_preview() ) {
                                $item_output .= '<a href="'.get_edit_post_link( $hongo_mega_menu_section ).'" target="_blank" data-placement="right" title="Edit megamenu section" class="edit-hongo-section edit-megamenu hongo-tooltip"><i class="ti-pencil"></i></a>';
                            }
                        $item_output .= '</div>';
                    $item_output .= '</div>';

                    ( $vc_custom_css ) ? $hongo_featured_array[] = $vc_custom_css : '';
                }
                remove_filter( 'hongo_row_extra_class', 'hongo_add_section_builder_style_class' );

            } 

            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

            /* Add mobile icon for parent item */

            if( ( $args->walker->has_children && $depth == 0 ) || ! empty( $hongo_mega_menu_section ) ) {
                $output .= '<i class="fa-solid fa-angle-down dropdown-toggle" data-toggle="dropdown"></i>';
            }
        }

        /**
         * Ends the element output, if needed.
         *
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $output .= "</li>{$n}";
        }

    } // Walker_Nav_Menu
}
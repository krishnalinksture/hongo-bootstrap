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
 * Navigation Menu API: Hongo_Left_Menu_Walker class
 *
 */

/**
 * Hongo Front Menu Walker Class.
 *
 */

if( ! class_exists( 'Hongo_Left_Menu_Walker' ) ) {

    class Hongo_Left_Menu_Walker extends Walker_Nav_Menu {
        
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
            $classes[] = 'dropdown-menu';
            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             */

            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';            

            $output .= "{$n}{$indent}<ul $class_names>{$n}";
            
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
            $hongo_mega_menu_single_item_status         = get_post_meta( $item->ID, '_hongo_mega_menu_single_item_status', true );
            $hongo_mega_menu_enable_icon_image_status   = get_post_meta( $item->ID, '_hongo_mega_menu_enable_icon_image_status', true );
            $hongo_menu_item_icon                       = get_post_meta( $item->ID, '_hongo_menu_item_icon', true );
            $hongo_mega_menu_icon_image_url             = get_post_meta( $item->ID, '_hongo_mega_menu_icon_image_url', true );
            $hongo_submenu_position                     = get_post_meta( $item->ID, '_hongo_submenu_position', true );

            switch ( $depth ) {
                case '0':
                    if( $args->walker->has_children ) {
                        $classes[] = 'dropdown';
                    }
                break;
                default:
                    if( $args->walker->has_children ) {
                        $classes[] = 'dropdown';
                    }
                break;
            }

            // One page navigation
            if( $hongo_mega_menu_single_item_status == 'enabled' && $depth == 0 ) {
                $classes[] = 'inner-link';
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
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : 'javascript:void(0);';

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
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

            $link_class = apply_filters( 'hongo_left_link_css_class', $link_class, $depth );
            $link_class_name = $link_class ? ' class="' . esc_attr( $link_class ) . '"' : '';

            if( $hongo_mega_menu_enable_icon_image_status == 'enabled' ) {
                
                $item_output .= '<a'. $attributes .' itemprop="url" '.$link_class_name.'>';
                
                    /* Add menu image */
                    if( ! empty( $hongo_mega_menu_icon_image_url ) ) {
                        $item_output .= '<img class="menu-link-icon" alt="' . esc_attr__( 'Icon', 'hongo-addons' ) . '" src="'.esc_url( $hongo_mega_menu_icon_image_url ).'">';                        
                    }
                    
                    $item_output .= $args->link_before . $title . $args->link_after;

                $item_output .= '</a>';

            } else {
                $item_output .= '<a'. $attributes .' itemprop="url" '.$link_class_name.'>';
                
                    /* Add menu icon */
                    if( ! empty( $hongo_menu_item_icon ) && $hongo_menu_item_icon != 1 ) {
                        $item_output .= '<i class="'.esc_attr( $hongo_menu_item_icon ).'"></i>';                        
                    }
                    $item_output .= $args->link_before . $title . $args->link_after;

                $item_output .= '</a>';
            }

            // Icon Right Side
            if( ( $depth == 0 || $depth == 1 || $depth == 2 ) && $args->walker->has_children ) {
                $item_output .= '<span class="handler"><i class="ti-angle-down"></i></span>';
            }

            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             */
            $output .= apply_filters( 'hongo_left_menu_walker_start_el', $item_output, $item, $depth, $args );

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

    } // Hongo_Left_Menu_Walker
}
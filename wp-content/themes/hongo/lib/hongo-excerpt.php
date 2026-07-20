<?php
/**
 * Excerpt Class.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Exerpt length
if( ! class_exists( 'Hongo_Excerpt' ) ){
    class Hongo_Excerpt {

        public static $length = 34;

        public static function hongo_get_by_length( $new_length = 34 ) {
            return Hongo_Excerpt::hongo_get( $new_length );
        }

        public static function hongo_get( $new_length ) {
            
            global $post;
            $hongo_output_data = '';
            $hongo_content = get_the_content();
            $pattern = get_shortcode_regex();
            if( $post->post_excerpt ){
                $hongo_output_data = $post->post_excerpt;
            }else{
                $hongo_output_data = preg_replace_callback( "/$pattern/s", 'hongo_extract_shortcode_contents', $hongo_content );
            }
      
            if ( post_password_required() ) {
                $hongo_output_data = $hongo_content;
            } else {
                if( $new_length > 0 ) {
                    $hongo_output_data = wp_trim_words( $hongo_output_data, $new_length, '...' );
                } else {
                    $hongo_output_data = wp_trim_words( $hongo_output_data, $new_length, '' );
                }
            }
            return $hongo_output_data;
        }
    }
}

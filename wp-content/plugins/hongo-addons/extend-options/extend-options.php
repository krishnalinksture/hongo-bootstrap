<?php
/* Force All Page To Under Construction If "enable-under-construction" is enable */
if ( ! function_exists( 'hongo_get_address' ) ) {
    function hongo_get_address() {
        // return the full address
        return hongo_get_protocol().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    } // end function hongo_get_address
}

if ( ! function_exists( 'hongo_get_protocol' ) ) {
    function hongo_get_protocol() {
        // Set the base protocol to http
        $hongo_protocol = 'http';
        // check for https
        if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $hongo_protocol .= "s";
        }
        
        return $hongo_protocol;
    } // end function hongo_get_protocol
}

add_action( 'template_redirect', 'hongo_force_under_construction' );
if ( ! function_exists( 'hongo_force_under_construction' ) ) {
    function hongo_force_under_construction() {

        $hongo_userrequest = str_ireplace(home_url('/'),'',hongo_get_address());
        $hongo_userrequest = rtrim($hongo_userrequest,'');

        $hongo_enable_under_maintenance = get_theme_mod('hongo_enable_under_maintenance', 0 );

        if ( $hongo_enable_under_maintenance == 1 && !current_user_can('level_10') && get_theme_mod('hongo_enable_under_maintenance_pages') != '0' ) { 
            $hongo_do_redirect = '';

            if ( strpos($hongo_userrequest, '/contact-form-7/v1') !== false ) {
                return;
            }
            
            if ( strpos( $hongo_userrequest, 'wp-login' ) !== 0 && strpos( $hongo_userrequest, 'wp-admin' ) !== 0 ) {

                if ( get_option('permalink_structure') ) {
                    $hongo_get_page = get_page_uri(get_theme_mod('hongo_enable_under_maintenance_pages'));

                    $hongo_do_redirect = '/'.$hongo_get_page;
                    // Make sure it gets all the proper decoding and rtrim action
                    $hongo_userrequest = str_replace('*','(.*)',$hongo_userrequest);
                    $hongo_pattern = '/^' . str_replace( '/', '\/', rtrim( $hongo_userrequest, '/' ) ) . '/';
                    $hongo_do_redirect = str_replace('*','$1',$hongo_do_redirect);
                    $output = preg_replace($hongo_pattern, $hongo_do_redirect, $hongo_userrequest);
                    if ($output !== $hongo_userrequest) {
                        // pattern matched, perform redirect
                        $hongo_do_redirect = $output;
                    }
                } else {
                    $hongo_do_redirect = '/?page_id='.get_theme_mod('hongo_enable_under_maintenance_pages');
                }
            } else {
                // simple comparison redirect
                $hongo_do_redirect = $hongo_userrequest;
            }
            
            if ( $hongo_do_redirect !== '' && trim($hongo_do_redirect,'/') !== trim($hongo_userrequest,'/') ) {
                // check if destination needs the domain prepended

                if ( strpos( $hongo_do_redirect, '/' ) === 0 ) {
                    $hongo_do_redirect = home_url().$hongo_do_redirect;
                }

                header ('Location: ' . $hongo_do_redirect);
                exit();
            }
        }
    }
}

 /* To Add Under Construction Notice To Adminbar For All Logged User */
if ( ! function_exists( 'hongo_admin_bar_under_construction_notice' ) ) {
    function hongo_admin_bar_under_construction_notice() {
        global $wp_admin_bar;
        $hongo_enable_under_maintenance = get_theme_mod('hongo_enable_under_maintenance', 0 );
        if ( $hongo_enable_under_maintenance == 1 ) {
            $wp_admin_bar->add_menu( array(
                'id' => 'admin-bar-under-construction-notice',
                'parent' => 'top-secondary',
                'href' => esc_url(home_url('/')).'wp-admin/customize.php?autofocus%5Bsection%5D=hongo_add_under_maintenance_section',
                'title' => '<span style="color: #FF0000;">'.esc_html__( 'Under Construction', 'hongo-addons' ).'</span>'
            ) );
        }
    }
}
add_action( 'admin_bar_menu', 'hongo_admin_bar_under_construction_notice' );

/* Generate custom css base on customizer settings */
if ( ! function_exists( 'hongo_addons_generate_custom_css' ) ) {
    function hongo_addons_generate_custom_css() {
        global $hongo_featured_array;

        if ( ! empty( $hongo_featured_array ) ) {

            $output_css = '';

            ob_start();
                echo '<style id="hongo-addon-custom-css" type="text/css">';
                    if ( ! empty( $hongo_featured_array ) ) {
                        foreach ($hongo_featured_array as $key => $value) {
                            echo sprintf( '%s', $value );
                        }
                    }
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // apply_filters for custom css so user can add its own custom css
            $output_css = apply_filters( 'hongo_addons_custom_css', $output_css );

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            ?>
                <script type="text/javascript">( function($) { $('head').append('<?php printf( '%s', $output_css ); ?>'); })(jQuery);</script>
            <?php   
        }
    }
}
add_action( 'wp_footer', 'hongo_addons_generate_custom_css', 1 );

/* Custom sanitize function for Validate the multiple checkbox field. */
if ( ! function_exists( 'hongo_sanitize_multiple_checkbox' ) ) {
    function hongo_sanitize_multiple_checkbox( $values ) {
        $hongo_multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
        return ! empty( $hongo_multi_values ) ? array_map( 'sanitize_text_field', $hongo_multi_values ) : array();
    }
}

if ( ! function_exists( 'hongo_get_intermediate_image_sizes' ) ) {
    function hongo_get_intermediate_image_sizes() {
        global $wp_version;
        $image_sizes = array('full', 'thumbnail', 'medium', 'medium_large', 'large'); // Standard sizes
        if ( $wp_version >= '4.7.0' ) {
            $_wp_additional_image_sizes = wp_get_additional_image_sizes();
            if ( ! empty( $_wp_additional_image_sizes ) ) {
                $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
            }
            return apply_filters( 'intermediate_image_sizes', $image_sizes );
        } else {
            return $image_sizes;
        }
    }
}

if ( ! function_exists( 'hongo_get_image_sizes' ) ) {
    function hongo_get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            if ( in_array( $_size, array('full', 'thumbnail', 'medium', 'medium_large', 'large') ) ) {
                $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
            } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                $sizes[ $_size ] = array(
                    'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                    'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                    'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                );
            }
        }
        return $sizes;
    }
}

if ( ! function_exists( 'hongo_get_image_size' ) ) {
    function hongo_get_image_size( $size ) {
        $sizes = hongo_get_image_sizes();

        if ( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        }

        return false;
    }
}
   
// Custom Js in Output in Frontend
if ( ! function_exists( 'hongo_addons_additional_js_output' ) ) {
    function hongo_addons_additional_js_output() {

        $js = get_option( 'hongo_custom_js', '' );
     
        if ( '' === $js ) {
            return;
        }

        wp_add_inline_script( 'hongo-main', $js );
    }
}

add_action( 'wp_enqueue_scripts', 'hongo_addons_additional_js_output', 11 );
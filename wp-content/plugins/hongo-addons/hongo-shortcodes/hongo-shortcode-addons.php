<?php
/**
 * The main template file For Hongo Theme Addons.
 *
 * @package Hongo
 */
?>
<?php
if(! class_exists('Hongo_Shortcodes_Addons'))
{
  class Hongo_Shortcodes_Addons
  {
    // Construct
    public function __construct() {
      // Load Required Style For Addons.
      add_action( 'init', array( $this, 'init' ) );
    }

    public function init() {

        require_once( HONGO_ADDONS_ROOT.'/hongo-addons-icons.php' );
        require_once( HONGO_ADDONS_ROOT.'/hongo-shortcodes/hongo-shortcode-addons-post-like.php' );

        // Load Required Style For Addons.
        add_action( 'admin_enqueue_scripts', array($this,'load_custom_wp_admin_style') );
        add_action( 'admin_print_scripts-post.php',   array($this, 'load_custom_wp_admin_style'), 99);
        add_action( 'admin_print_scripts-post-new.php', array($this, 'load_custom_wp_admin_style'), 99);
        if( class_exists( 'Vc_Manager' ) ) {
            // Action For Add Hongo Maps And Shortcode In VC.
            add_action( 'init', array( $this,'hongo_addons_init' ), 40 );
        }

        add_action( 'wp_head', array( $this,'hongo_custom_css' ), 2000 );

        if ( is_admin() ) {
            add_action( 'save_post', array( $this, 'hongo_save_custom_css' ) );
        }
    }

    public function hongo_custom_css( $id = null ) {

        $custom_css = '';
        
        // Promo popup custom css
        $hongo_enable_promo_popup = get_theme_mod( 'hongo_enable_promo_popup', '0' );
        $hongo_promo_popup_section   = hongo_option( 'hongo_promo_popup_section', '' );
        if ( $hongo_enable_promo_popup == '1' &&  ! empty( $hongo_promo_popup_section ) ) {
            $custom_css .= get_post_meta( $hongo_promo_popup_section, '_wpb_shortcodes_custom_css', true );
            $custom_css .= get_post_meta( $hongo_promo_popup_section, '_hongo_custom_css', true );
        }

        // Mini Header custom css
        $hongo_enable_mini_header_general = hongo_builder_customize_option( 'hongo_enable_mini_header_general', '1' );
        $hongo_enable_mini_header   = hongo_builder_option( 'hongo_enable_mini_header', '0', $hongo_enable_mini_header_general );
        $hongo_mini_header_section  = hongo_builder_option( 'hongo_mini_header_section', '', $hongo_enable_mini_header_general );
        if( $hongo_enable_mini_header == 1 && ! empty( $hongo_mini_header_section ) ) {
            $custom_css .= get_post_meta( $hongo_mini_header_section, '_wpb_shortcodes_custom_css', true );
            $custom_css .= get_post_meta( $hongo_mini_header_section, '_hongo_custom_css', true );
        }

        // Top Header custom css
        $hongo_enable_header_general= hongo_builder_customize_option( 'hongo_enable_header_general', '1' );
        $hongo_enable_header        = hongo_builder_option( 'hongo_enable_header', '1', $hongo_enable_header_general );
        $hongo_header_top_section   = hongo_builder_option( 'hongo_header_top_section', '', $hongo_enable_header_general );
        if( $hongo_enable_header == 1 && ! empty( $hongo_header_top_section ) ) {
            $custom_css .= get_post_meta( $hongo_header_top_section, '_wpb_shortcodes_custom_css', true );
            $custom_css .= get_post_meta( $hongo_header_top_section, '_hongo_custom_css', true );
        }

        // Header custom css
        $hongo_header_section   = hongo_builder_option( 'hongo_header_section', '', $hongo_enable_header_general );
        if( $hongo_enable_header == 1 && ! empty( $hongo_header_section ) ) {
            $custom_css .= get_post_meta( $hongo_header_section, '_wpb_shortcodes_custom_css', true );
            $custom_css .= get_post_meta( $hongo_header_section, '_hongo_custom_css', true );
        }

        // Footer custom css
        $hongo_enable_footer_general= hongo_builder_customize_option( 'hongo_enable_footer_general', '1' );
        $hongo_enable_footer    = hongo_builder_option( 'hongo_enable_footer', '1', $hongo_enable_footer_general );
        $hongo_footer_section  = hongo_builder_option( 'hongo_footer_section', '', $hongo_enable_footer_general );

        if( $hongo_enable_footer == 1 && ! empty( $hongo_footer_section ) ) {
            $custom_css .= get_post_meta( $hongo_footer_section, '_wpb_shortcodes_custom_css', true );
            $custom_css .= get_post_meta( $hongo_footer_section, '_hongo_custom_css', true );
        }

        if ( is_singular() ) {
            if ( ! $id ) {
                $id = get_the_ID();
            }
            // Check if post preview then add print preview css otherwise main css.
            if ( is_preview() && $id ) {
                $custom_css .= get_post_meta( $id, '_hongo_custom_css_preview', true );
            } elseif ( $id ) {
                $custom_css .= get_post_meta( $id, '_hongo_custom_css', true );
            }
        }

        // Added filter for custom css
        $custom_css = apply_filters( 'hongo_custom_css', $custom_css );

        if ( ! empty( $custom_css ) ) {
            echo '<style type="text/css" data-type="hongo-custom-css">';
                echo sprintf( '%s', $custom_css );
            echo '</style>';
        }
    }

    public function hongo_parseShortcodesCustomCss( $content ) {
        $css = '';
        if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
            return $css;
        }
        if ( class_exists( 'WPBMap' ) ) {
            WPBMap::addAllMappedShortcodes();
            preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );

            foreach ( $shortcodes[2] as $index => $tag ) {

                $shortcode = WPBMap::getShortCode( $tag );
                $attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );
                if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
                    foreach ( $shortcode['params'] as $param ) {
                        if ( isset( $param['type'] ) && ( 'responsive_css_editor' === $param['type'] ||  'responsive_font_settings' === $param['type'] || 'hongo_button_settings' === $param['type']  ) && isset( $attr_array[ $param['param_name'] ] ) ) {
                            $css .= $attr_array[ $param['param_name'] ];
                        }
                    }
                }
            }
            foreach ( $shortcodes[5] as $shortcode_content ) {
                $css .= $this->hongo_parseShortcodesCustomCss( $shortcode_content );
            }
        }

        return $css;
    }

    public function hongo_save_custom_css( $post_id ) {
        $post_data = get_post( $post_id );
        // Check if post preview then add post meta in preview otherwise in main post meta
        if ( isset( $_POST['wp-preview'] ) && 'dopreview' == $_POST['wp-preview'] ) {
            if ( ! empty( $post_id ) ) {
                $css = $this->hongo_parseShortcodesCustomCss( $post_data->post_content );
                if ( ! empty( $css ) ) {
                    $shortcodes_custom_css = hongo_vc_custom_settings::generate_css( $css );
                    update_post_meta( $post_id, '_hongo_custom_css_preview', $shortcodes_custom_css );
                } else {
                    delete_post_meta( $post_id, '_hongo_custom_css_preview' );
                }
            }
        } else {
            if ( ! empty( $post_id ) && ! ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
                $css = $this->hongo_parseShortcodesCustomCss( $post_data->post_content );
                if ( ! empty( $css ) ) {
                    $shortcodes_custom_css = hongo_vc_custom_settings::generate_css( $css );
                    update_post_meta( $post_id, '_hongo_custom_css', $shortcodes_custom_css );
                } else {
                    delete_post_meta( $post_id, '_hongo_custom_css' );
                }
            }
        }
    }

    public function load_custom_wp_admin_style() {
        // Enqueue Custom JS For WP Admin.
        wp_enqueue_script( 'hongo-custom',   HONGO_ADDONS_ROOT_DIR . '/hongo-shortcodes/js/custom.js', array('jquery'), HONGO_ADDONS_PLUGIN_VERSION, true );
    }
    
    public function hongo_addons_init() {
        $this->hongo_addons_vc_set_default_post_type();
        // Load Shortcode For Hongo Theme.
        $this->hongo_addons_vc_load_shortcodes();
        // Load Custom Maps.php For VC.
        $this->hongo_addons_vc_integration();
    }

    public function hongo_addons_vc_set_default_post_type() {
        global $vc_manager;
          
        $list = array( 'page', 'post', 'product', 'hongobuilder' );
        $hongo_vc_default_set = $vc_manager->editorPostTypes();
        $hongo_vc_default_get = get_option( 'hongo_set_default_vc_post_type' );
        if( ( $hongo_vc_default_get != 'yes' ) && ( count($hongo_vc_default_set) == 1 )  && ( $hongo_vc_default_set[0] == 'page' ) ) {
            $finalArray = array_unique( array_merge( $hongo_vc_default_set, $list ) );
            sleep(1);
            $vc_manager->setEditorPostTypes( $finalArray );
            update_option( 'hongo_set_default_vc_post_type', 'yes' );
        }
    }

    public function hongo_addons_vc_load_shortcodes() {
      require_once( HONGO_SHORTCODE_ADDONS_URI . '/shortcodes.php' );
    }

    public function hongo_addons_vc_integration() {
      require_once( HONGO_SHORTCODE_ADDONS_URI . '/maps.php' );
      
    }

} // end of class
$Hongo_Shortcodes_Addons = new Hongo_Shortcodes_Addons();
} // end of class_exists

<?php
/**
 * Multiple Select Product Tab.
 *
 * @package Hongo
 */
?>
<?php
if ( function_exists( 'vc_add_shortcode_param' ) ) {

    vc_add_shortcode_param( 'hongo_multiple_product_tab', 'multiple_product_tab');
}
if ( ! function_exists( 'multiple_product_tab' ) ) {

    function multiple_product_tab($settings, $value) {

        if ( ! is_array( $value ) ) {
            $value = explode( ',', $value );
        }

        $option_array = array(
            'recent_products'       =>  esc_html__( 'Recent Products', 'hongo-addons' ),
            'featured_products'     =>  esc_html__( 'Featured Products', 'hongo-addons' ),
            'sale_products'         =>  esc_html__( 'Sale Products', 'hongo-addons' ),
            'best_selling_products' =>  esc_html__( 'Best Selling Products', 'hongo-addons' ),
            'top_rated_products'    =>  esc_html__( 'Top Rated Products', 'hongo-addons' ),
            'new_products'          =>  esc_html__( 'New Products', 'hongo-addons' ),
        );

        $output  = '<select multiple="multiple" name="'. $settings['param_name'] .'" class="wpb_vc_param_value icon-select wpb-input wpb-rs-select '. $settings['param_name'] .' '. $settings['type'] .'">';

            foreach ( $option_array as $key => $name ) {
                $output .= '<option value="'.$key.'"'. selected( in_array( $key, $value ), '1' ) .'>'. $name .'</option>';
            }

        $output .= '</select>' . "\n";
       
        return $output;
    }
}
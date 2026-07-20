<?php
/**
 * Shortcode For Timer
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Timer */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_timer' ) ) {
    function hongo_timer( $atts, $content = null ) {

        global $hongo_slider_script, $hongo_featured_array, $hongo_timer_unique_id;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hongo_timer_style' => '',
            'hongo_timer_date' => '',
            'hongo_day_text' => '',
            'hongo_hour_text' => '',
            'hongo_minute_text' => '',
            'hongo_second_text' => '',

            'hongo_animation_style' => '',
            'hongo_animation_delay' => '',
            'hongo_animation_duration' => '',

            'hongo_enable_separator' => '1',
            'hongo_separator_color' => '',
            'hongo_enable_timer_alternate_font' => '',
            'hongo_separator_width' => '',
            'hongo_separator_height' => '',
            'hongo_font_timer_text_setting' => '',
            'hongo_font_timer_number_setting' => '',
            
        ), $atts ) );
        
        $output = '';
        $classes = array();

        // Check if slider id and class
        $hongo_timer_unique_id  = ! empty( $hongo_timer_unique_id ) ? $hongo_timer_unique_id : 1;
        $hongo_timer_id = ! empty( $id ) ? $id : 'hongo-timer';
        $hongo_timer_id .= '-' . $hongo_timer_unique_id;
        $hongo_timer_unique_id++;

        $classes[] = $hongo_timer_id;

        $id = ! empty( $hongo_timer_id ) ? ' id="'.esc_attr( $hongo_timer_id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        ( $hongo_timer_style ) ? $classes[] = $hongo_timer_style : '';
        $hongo_timer_date   = ( $hongo_timer_date ) ? $hongo_timer_date : '';
        $hongo_day_text     = ( $hongo_day_text ) ? $hongo_day_text : 'Days';
        $hongo_hour_text    = ( $hongo_hour_text ) ? $hongo_hour_text : 'Hours';
        $hongo_minute_text  = ( $hongo_minute_text ) ? $hongo_minute_text : 'Minutes';
        $hongo_second_text  = ( $hongo_second_text ) ? $hongo_second_text : 'Seconds';

        // Animation
        $hongo_animation_style = ! empty( $hongo_animation_style ) && $hongo_animation_style != 'none' ? $classes[] = 'wow '.$hongo_animation_style : '';
        $hongo_animation_delay = ( $hongo_animation_delay ) ? ' data-wow-delay= '.$hongo_animation_delay.'ms' : '';
        $hongo_animation_duration = ( $hongo_animation_duration ) ? ' data-wow-duration= '.$hongo_animation_duration.'ms' : '';

        // Class List
        $class_list= ! empty( $classes ) ? implode( ' ', $classes ) : '';

        if ( $hongo_enable_separator != '1' ) {
            $hongo_featured_array[] = '.'.$hongo_timer_id.'.counter-event .counter-box:after { border-right: 0 !important; }';
        }
        if ( ! empty( $hongo_separator_color ) ) {
            if ( $hongo_timer_style == 'hongo-timer-style-3' ) {
                $hongo_featured_array[] = '.'.$hongo_timer_id.'.counter-event .counter-box .number:before{ color: '.$hongo_separator_color.'; }';
            } else {

                $hongo_featured_array[] = '.'.$hongo_timer_id.'.counter-event .counter-box:after , .'.$hongo_timer_id.'.counter-event .counter-box:before{ background-color: '.$hongo_separator_color.'; }';
            }
        }
        if ( ! empty( $hongo_separator_width ) ) {
            $hongo_featured_array[] = '.'.$hongo_timer_id.'.counter-event .counter-box:after{ width: '.$hongo_separator_width.'; }';
        }
        if ( ! empty( $hongo_separator_height ) ) {
            $hongo_featured_array[] = '.'.$hongo_timer_id.'.counter-event .counter-box:after{ height: '.$hongo_separator_height.'; }';
        }

        // Responsive typography & alt font
        $hongo_font_timer_text       = ! empty( $hongo_font_timer_text_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_timer_text_setting ) : '';
        ( $hongo_enable_timer_alternate_font == 1 ) ? $hongo_font_timer_text .= ' alt-font' : '';
        $hongo_font_timer_number     = ! empty( $hongo_font_timer_number_setting ) ? hongo_shortcode_custom_css_class( $hongo_font_timer_number_setting ) : '';
        ( $hongo_enable_timer_alternate_font == 1 ) ? $hongo_font_timer_number .= ' alt-font' : '';

         // Timer Style
        switch ( $hongo_timer_style ) {

            case 'hongo-timer-style-1':
            case 'hongo-timer-style-2':
            case 'hongo-timer-style-3':
                if ( ! empty( $hongo_timer_date ) ) {
                    $output .= '<div'.$id.' data-enddate="'.$hongo_timer_date.'" class="counter-event '.esc_attr( $class_list ).'"'.$hongo_animation_delay.$hongo_animation_duration.'></div>';
                }
            break;
        }

        if ( hongo_load_javascript_by_key( 'countdown' ) ) {

            // Countdown JS
            wp_enqueue_script( 'countdown' );

            ob_start(); 
        ?>
                try { $("<?php echo '#'.$hongo_timer_id ?>").countdown($("<?php echo '#'.$hongo_timer_id ?>").attr("data-enddate")).on('update.countdown', function (event) { var $this = $(this).html(event.strftime('<div class="counter-container"><div class="counter-box first"><div class="number<?php echo esc_attr( $hongo_font_timer_number ); ?>">%-D</div><span class="<?php echo esc_attr( $hongo_font_timer_text ); ?>"><?php echo esc_attr( $hongo_day_text ); ?></span></div><div class="counter-box"><div class="number<?php echo esc_attr( $hongo_font_timer_number ); ?>">%H</div><span class="<?php echo esc_attr( $hongo_font_timer_text ); ?>"><?php echo esc_attr( $hongo_hour_text ); ?></span></div><div class="counter-box"><div class="number<?php echo esc_attr( $hongo_font_timer_number ); ?>">%M</div><span class="<?php echo esc_attr( $hongo_font_timer_text ); ?>"><?php echo esc_attr( $hongo_minute_text ); ?></span></div><div class="counter-box last"><div class="number<?php echo esc_attr( $hongo_font_timer_number ); ?>">%S</div><span class="<?php echo esc_attr( $hongo_font_timer_text ); ?>"><?php echo esc_attr( $hongo_second_text ); ?></span></div></div>')) }); } catch( e ) {}
        <?php 
            $hongo_slider_script .= ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }
}
add_shortcode( 'hongo_timer', 'hongo_timer' );

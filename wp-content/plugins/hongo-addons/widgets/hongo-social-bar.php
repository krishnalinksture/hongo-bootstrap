<?php
/**
 * Social Bar Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_social_bar_widget' ) ) {
	function hongo_social_bar_widget() {
		register_widget( 'hongo_social_widget' );
	}
}
add_action( 'widgets_init', 'hongo_social_bar_widget' );

if (! class_exists('hongo_social_widget')) {

	class hongo_social_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hongo_social_widget',
			esc_html__('Hongo Social Icons', 'hongo-addons'),
			array( 'description' => esc_html__( 'Social Icons', 'hongo-addons' ), ) // args
			);
		}

		public function widget( $args, $instance ) {
			
			$output = '';
			$social_data = array();

			$hongo_title = ! empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$social_style= ! empty( $instance['social_style'] ) ? $instance['social_style'] : '';

			$hongo_fb_url 	  	= ! empty( $instance['fb_url'] ) ? $social_data['facebook-f'] = 'fb_url' : '';
	        $hongo_tw_url 	  	= ! empty( $instance['tw_url'] ) ? $social_data['x-twitter'] = 'tw_url' : '';
	        $hongo_db_url 	  	= ! empty( $instance['db_url'] ) ? $social_data['dribbble'] = 'db_url' : '';
	        $hongo_li_url 	  	= ! empty( $instance['li_url'] ) ? $social_data['linkedin-in'] = 'li_url' : '';
			$hongo_ig_url 	  	= ! empty( $instance['ig_url'] ) ? $social_data['instagram'] = 'ig_url' : '';
			$hongo_tb_url 	  	= ! empty( $instance['tb_url'] ) ? $social_data['tumblr'] = 'tb_url' : '';
			$hongo_pi_url 	  	= ! empty( $instance['pi_url'] ) ? $social_data['pinterest-p'] = 'pi_url' : '';
			$hongo_yt_url 	  	= ! empty( $instance['yt_url'] ) ? $social_data['youtube'] = 'yt_url' : '';
			$hongo_vm_url 	  	= ! empty( $instance['vm_url'] ) ? $social_data['vimeo-v'] = 'vm_url' : '';
			$hongo_sc_url 	  	= ! empty( $instance['sc_url'] ) ? $social_data['soundcloud'] = 'sc_url' : '';
			$hongo_fk_url 	  	= ! empty( $instance['fk_url'] ) ? $social_data['flickr'] = 'fk_url' : '';
			$hongo_rss_url 	  	= ! empty( $instance['rss_url'] ) ? $social_data['rss'] = 'rss_url' : '';
			$hongo_rd_url 	  	= ! empty( $instance['rd_url'] ) ? $social_data['reddit'] = 'rd_url' : '';
			$hongo_bh_url 	  	= ! empty( $instance['bh_url'] ) ? $social_data['behance'] = 'bh_url' : '';
			$hongo_vine_url 	= ! empty( $instance['vine_url'] ) ? $social_data['vine'] = 'vine_url' : '';
			$hongo_gh_url 	  	= ! empty( $instance['gh_url'] ) ? $social_data['github'] = 'gh_url' : '';
			$hongo_xing_url 	= ! empty( $instance['xing_url'] ) ? $social_data['xing'] = 'xing_url' : '';
			$hongo_vk_url 	  	= ! empty( $instance['vk_url'] ) ? $social_data['vk'] = 'vk_url' : '';
			$hongo_yelp_url    	= ! empty( $instance['yelp_url'] ) ? $social_data['yelp'] = 'yelp_url' : '';
			$hongo_discord_url 	= ! empty( $instance['discord_url'] ) ? $social_data['discord'] = 'discord_url' : '';
			$hongo_skype_url 	= ! empty( $instance['skype_url'] ) ? $social_data['skype'] = 'skype_url' : '';
			$hongo_email_url   	= ! empty( $instance['email_url'] ) ? $social_data['envelope-square'] = 'email_url' : '';
			$icon_size 			= ( isset( $instance['icon_size'] ) ) ? $instance['icon_size'] : '';
			$hongo_social_target= ( isset( $instance['hongo_social_target'] ) ) ? $instance['hongo_social_target'] : '';
			$hongo_text_case 	= ( isset( $instance['hongo_text_case'] ) ) ? ' '.$instance['hongo_text_case'] : '';
			$enable_alternate_font_title = ( isset( $instance['enable_alternate_font_title'] ) && $instance['enable_alternate_font_title'] == 'on' ) ? ' alt-font' : '';
			$one_column_class 	= ( isset( $instance['one_column'] ) && $instance['one_column'] == 'on' ) ?  ' one-column' : '';
			$hongo_sorted_data  = ! empty( $instance['hidden_val'] ) ? explode( ',', $instance['hidden_val'] ) : '';
			$hongo_custom_link = ! empty( $instance['custom_icon_code'] ) ? $instance['custom_icon_code'] : '';

			if ( ! empty( $hongo_custom_link ) && 'CustomHTML' == base64_decode( $hongo_custom_link ) ) {
	            $hongo_custom_link = '';
	        }

			// Before widget
	        $output .= $args['before_widget'];

	        	// Display the widget title if one was input (before and after defined by themes).
	        	if( ! empty( $hongo_title ) ) {
	        		$output .= $args['before_title'] . esc_attr( $hongo_title ) . $args['after_title'];
	        	}

		        if( ! empty( $social_data ) ) {
	            	$output .= '<div class="'.esc_attr( $social_style ).'">';
	            		//$size_class = ( $social_style == 'social-icon-style-3' ) ? 'small-icon' : 'extra-small-icon';
	            		$column_class = ( $social_style == 'social-icon-style-14' || $social_style == 'social-icon-style-15' ) ? $one_column_class : '';
	                	$output .= '<ul class="'.esc_attr( $icon_size ).esc_attr( $column_class ).esc_attr( $enable_alternate_font_title ).'">';

	                		if( ! empty( $hongo_sorted_data ) ){
		                		foreach ($hongo_sorted_data as $social_sorted) {
		                			if( ! empty( $instance[$social_sorted] ) ){
			                			$key = array_search ($social_sorted, $social_data);
			                			if ( $key ) {
				                            $social_label = hongo_get_social_label( $key );
				                        }
			                			if( $social_sorted == 'rss_url' || $social_sorted == 'email_url' ) {
		                                     $icon_class = 'fa-solid fa-'.esc_html( $key );
		                                } else{
		                                    $icon_class = 'fa-brands fa-'.esc_html( $key );
		                                }
		                                $target_attr = ( ! ( $key == 'skype' || $key == 'email' ) && ! empty( $hongo_social_target ) ) ? ' target="'.esc_attr( $hongo_social_target ).'"' : '';
		                                if( $social_style == 'social-icon-style-8' || $social_style == 'social-icon-style-14' || $social_style == 'social-icon-style-15' ) {
		                                	$output .= '<li><a class="'.esc_html( $key ).'" href="'.esc_url( $instance[$social_sorted] ).'"'.$target_attr.'><span class="brand-icon '.$icon_class.'"></span><span class="brand-label'.$hongo_text_case.'">'.esc_html( $social_label ).'</span></a></li>';
		                                } else {
		                                	$output .= '<li><a class="'.esc_html( $key ).'" href="'.esc_url( $instance[$social_sorted] ).'"'.$target_attr.'><i class="'.esc_attr( $icon_class ).'"></i></a></li>';
		                                }
		                            }
		                		}
		                	}else{
		                		foreach( $social_data as $key => $social_url ) {
		                			if ( $key ) {
			                         	$social_label = hongo_get_social_label( $key );
			                        }
	                    			if( $social_url == 'rss_url' || $social_url == 'email_url' ) {
	                                    $icon_class = 'fa-solid fa-'.esc_html( $key );
	                                } else{
	                                    $icon_class = 'fa-brands fa-'.esc_html( $key );
	                                } 
	                                $target_attr = ( $key != 'skype' ) && ! empty( $hongo_social_target ) ? ' target="'.esc_attr( $hongo_social_target ).'"' : '';
	                                if( $social_style == 'social-icon-style-8' || $social_style == 'social-icon-style-14' || $social_style == 'social-icon-style-15' ) {	                                	
	                                	if( $social_url == 'email_url' ){
											$social_label = $instance[$social_url];
											$output .= '<li><a class="'.esc_html( $key ).'" href="mailto:'.$instance[$social_url].'"'.$target_attr.'><span class="brand-icon '.$icon_class.'"></span><span class="brand-label'.$hongo_text_case.'">'.esc_html( $social_label ).'</span></a></li>';
										} else {                                	
											$output .= '<li><a class="'.esc_html( $key ).'" href="'.esc_url( $instance[$social_url] ).'"'.$target_attr.'><span class="brand-icon '.$icon_class.'"></span><span class="brand-label'.$hongo_text_case.'">'.esc_html( $social_label ).'</span></a></li>';
										}
	                                } else {
	                    				$output .= '<li><a class="'.esc_html( $key ).'" href="'.esc_url( $instance[$social_url] ).'"'.$target_attr.'><i class="'.$icon_class.'"></i></a></li>';
	                                }
                				}
		                	}

                			if( ! empty( $hongo_custom_link ) ) :
                    			$output .= $hongo_custom_link;
                			endif;
            			$output .= '</ul>';
        			$output .= '</div>';
        		}

	        // After widget
	        $output .= $args['after_widget'];

	        echo $output;
		}
			
		// Widget Backend 
		public function form( $instance ) 
		{ 
	           	$defaults = array( 'title' => esc_html__( 'Follow US', 'hongo-addons' ), 'social_style' => 'social-icon-style-1', 'icon_size' => 'extra-small-icon', 'hongo_social_target'=> '_blank', 'enable_alternate_font_title'=> 'on', 'one_column'=> '', 'hongo_text_case'=> '', 'hidden_val' => '', 'fb_url' => '', 'tw_url' => '', 'db_url' => '', 'li_url' => '', 'ig_url' => '', 'tb_url' => '', 'pi_url' => '', 'yt_url' => '', 'vm_url' => '', 'sc_url' => '', 'fk_url' => '', 'rss_url' => '', 'rd_url' => '', 'bh_url' => '', 'vine_url' => '', 'gh_url' => '', 'xing_url' => '', 'vk_url' => '', 'email_url' => '', 'yelp_url' => '', 'discord_url' => '', 'skype_url' => '', 'custom_icon_code'=>'' );

	           	$social_array = array('fb_url' => 'Facebook URL', 'tw_url' => 'Twitter URL', 'db_url' => 'Dribbble URL', 'li_url' => 'Linkedin URL', 'ig_url' => 'Instagram URL', 'tb_url' => 'Tumblr URL', 'pi_url' => 'Pinterest URL', 'yt_url' => 'YouTube URL', 'vm_url' => 'Vimeo URL', 'sc_url' => 'Soundcloud URL', 'fk_url' => 'Flickr URL', 'rss_url' => 'RSS URL', 'rd_url' => 'Reddit URL', 'bh_url' => 'Behance URL', 'vine_url' => 'Vine URL', 'gh_url' => 'GitHub URL', 'xing_url' => 'Xing URL', 'vk_url' => 'VK URL', 'yelp_url' => 'Yelp URL', 'discord_url' => 'Discord URL', 'skype_url' => 'Skype URL', 'email_url' => 'Email address');	           	

	        	$instance = wp_parse_args( (array) $instance, $defaults );
	        	$icon_size = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '';
	        	$hongo_social_target = ! empty( $instance['hongo_social_target'] ) ? $instance['hongo_social_target'] : '';
	        	$hongo_text_case = ! empty( $instance['hongo_text_case'] ) ? $instance['hongo_text_case'] : '';
	        	$social_style = ! empty( $instance['social_style'] ) ? $instance['social_style'] : '';
	        	$enable_alternate_font_title = isset( $instance['enable_alternate_font_title'] ) ? $instance['enable_alternate_font_title'] : '';
	        	$one_column = isset( $instance['one_column'] ) ? $instance['one_column'] : '';
	        	$custom_icon_code = isset( $instance['custom_icon_code'] ) ? $instance['custom_icon_code'] : '';
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title'] ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'social_style' ); ?>">
					<?php esc_html_e( 'Style:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'social_style' ); ?>" class="widefat">
	                <option value="social-icon-style-1" <?php selected( 'social-icon-style-1', $social_style ); ?>><?php echo esc_html__( 'Style 1', 'hongo-addons' ); ?></option>
	                <option value="social-icon-style-2" <?php selected( 'social-icon-style-2', $social_style ); ?>><?php echo esc_html__( 'Style 2', 'hongo-addons' ); ?></option>
	                <option value="social-icon-style-3" <?php selected( 'social-icon-style-3', $social_style ); ?>><?php echo esc_html__( 'Style 3', 'hongo-addons' ); ?></option>
	                <option value="social-icon-style-4" <?php selected( 'social-icon-style-4', $social_style ); ?>><?php echo esc_html__( 'Style 4', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-5" <?php selected( 'social-icon-style-5', $social_style ); ?>><?php echo esc_html__( 'Style 5', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-6" <?php selected( 'social-icon-style-6', $social_style ); ?>><?php echo esc_html__( 'Style 6', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-7" <?php selected( 'social-icon-style-7', $social_style ); ?>><?php echo esc_html__( 'Style 7', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-8" <?php selected( 'social-icon-style-8', $social_style ); ?>><?php echo esc_html__( 'Style 8', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-9" <?php selected( 'social-icon-style-9', $social_style ); ?>><?php echo esc_html__( 'Style 9', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-10" <?php selected( 'social-icon-style-10', $social_style ); ?>><?php echo esc_html__( 'Style 10', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-11" <?php selected( 'social-icon-style-11', $social_style ); ?>><?php echo esc_html__( 'Style 11', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-12" <?php selected( 'social-icon-style-12', $social_style ); ?>><?php echo esc_html__( 'Style 12', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-13" <?php selected( 'social-icon-style-13', $social_style ); ?>><?php echo esc_html__( 'Style 13', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-14" <?php selected( 'social-icon-style-14', $social_style ); ?>><?php echo esc_html__( 'Style 14', 'hongo-addons' ); ?></option>
					<option value="social-icon-style-15" <?php selected( 'social-icon-style-15', $social_style ); ?>><?php echo esc_html__( 'Style 15', 'hongo-addons' ); ?></option>
				</select>
	        </p>
			<p>
				<input class="widefat social-bar-hidden-val" id="<?php echo $this->get_field_id( 'hidden_val' ); ?>" name="<?php echo $this->get_field_name( 'hidden_val' ); ?>" type="hidden" value="<?php echo esc_attr($instance['hidden_val'] ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'icon_size' ); ?>">
					<?php esc_html_e( 'Icon size:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'icon_size' ); ?>" class="widefat">
	                <option value="" <?php selected( '', $icon_size ); ?>><?php echo esc_html__( 'Select', 'hongo-addons' ); ?></option>
	                <option value="very-small-icon" <?php selected( 'very-small-icon', $icon_size ); ?>><?php echo esc_html__( 'Very small', 'hongo-addons' ); ?></option>
	                <option value="extra-small-icon" <?php selected( 'extra-small-icon', $icon_size ); ?>><?php echo esc_html__( 'Extra small', 'hongo-addons' ); ?></option>
	                <option value="small-icon" <?php selected( 'small-icon', $icon_size ); ?>><?php echo esc_html__( 'Small', 'hongo-addons' ); ?></option>
	                <option value="medium-icon" <?php selected( 'medium-icon', $icon_size ); ?>><?php echo esc_html__( 'Medium', 'hongo-addons' ); ?></option>
	                <option value="large-icon" <?php selected( 'large-icon', $icon_size ); ?>><?php echo esc_html__( 'Large', 'hongo-addons' ); ?></option>
	                <option value="extra-large-icon" <?php selected( 'extra-large-icon', $icon_size ); ?>><?php echo esc_html__( 'Extra large', 'hongo-addons' ); ?></option>
				</select>
	        </p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'hongo_social_target' ); ?>">
					<?php esc_html_e( 'Target:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'hongo_social_target' ); ?>" class="widefat">
	                <option value="_self" <?php selected( '_self', $hongo_social_target ); ?>><?php echo esc_html__( 'Self', 'hongo-addons' ); ?></option>
	                <option value="_blank" <?php selected( '_blank', $hongo_social_target ); ?>><?php echo esc_html__( 'New tab / window', 'hongo-addons' ); ?></option>
				</select>
	        </p>
	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $enable_alternate_font_title, 'on' ); ?> id="<?php echo $this->get_field_id( 'enable_alternate_font_title' ); ?>" name="<?php echo $this->get_field_name( 'enable_alternate_font_title' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'enable_alternate_font_title' ) ); ?>"><?php esc_html_e( 'Additional font for label', 'hongo-addons' ); ?></label>
    		  <p><?php echo esc_html__( 'Use only for style 8, 14 and 15', 'hongo-addons' ); ?></p>
			</p>
	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $one_column, 'on' ); ?> id="<?php echo $this->get_field_id( 'one_column' ); ?>" name="<?php echo $this->get_field_name( 'one_column' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'one_column' ) ); ?>"><?php esc_html_e( 'One column', 'hongo-addons' ); ?></label>
    		  <p><?php echo esc_html__( 'Use only for style 8, 14 and 15', 'hongo-addons' ); ?></p>
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'hongo_text_case' ); ?>">
					<?php esc_html_e( 'Text case:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'hongo_text_case' ); ?>" class="widefat">
	                <option value="" <?php selected( '', $hongo_text_case ); ?>><?php echo esc_html__( 'Default', 'hongo-addons' ); ?></option>
	                <option value="text-uppercase" <?php selected( 'text-uppercase', $hongo_text_case ); ?>><?php echo esc_html__( 'Uppercase', 'hongo-addons' ); ?></option>
	                <option value="text-lowercase" <?php selected( 'text-lowercase', $hongo_text_case ); ?>><?php echo esc_html__( 'Lowercase', 'hongo-addons' ); ?></option>
	                <option value="text-capitalize" <?php selected( 'text-capitalize', $hongo_text_case ); ?>><?php echo esc_html__( 'Capitalize', 'hongo-addons' ); ?></option>
				</select>
				<p><?php echo esc_html__( 'Use only for style 8, 14 and 15', 'hongo-addons' ); ?></p>
	        </p>
			<div class="social-widget-sortable">
				<?php
				if( ! empty( $instance['hidden_val'] ) ) {
					$hidden_values =  explode( ',', $instance['hidden_val'] );
					foreach ($hidden_values as $h_val) {
					?>
						<p>
							<label for="<?php echo $this->get_field_id( $h_val ); ?>"><?php echo esc_html( $social_array[$h_val] ); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( $h_val ); ?>" data-type ="<?php echo $h_val; ?>"  name="<?php echo $this->get_field_name( $h_val ); ?>" type="text" value="<?php echo esc_attr($instance[$h_val] ); ?>" />
							<img src="<?php echo HONGO_ADDONS_ROOT_DIR; ?>/meta-box/images/move-icon.png" class="icon-move widget-move" alt="">
						</p>
					<?php
					}
				
					foreach ($social_array as $s_key => $s_value) {
						if(!in_array($s_key, $hidden_values) ){
						?>
							<p>
								<label for="<?php echo $this->get_field_id( $s_key ); ?>"><?php echo esc_html( $s_value ); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( $s_key ); ?>" data-type ="<?php echo $s_key; ?>" name="<?php echo $this->get_field_name( $s_key ); ?>" type="text" value="<?php echo esc_attr($instance[$s_key] ); ?>" />
								<img src="<?php echo HONGO_ADDONS_ROOT_DIR; ?>/meta-box/images/move-icon.png" class="icon-move widget-move" alt="">
							</p>
						<?php
						}
					}
				} else {
					foreach ($social_array as $s_key => $s_value) {
						?>
							<p>
								<label for="<?php echo $this->get_field_id( $s_key ); ?>"><?php echo esc_html( $s_value ); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( $s_key ); ?>" data-type ="<?php echo $s_key; ?>" name="<?php echo $this->get_field_name( $s_key ); ?>" type="text" value="<?php echo esc_attr($instance[$s_key] ); ?>" />
								<img src="<?php echo HONGO_ADDONS_ROOT_DIR; ?>/meta-box/images/move-icon.png" class="icon-move widget-move" alt="">
							</p>
						<?php
					}
				}

			?>
			</div>
			<p>
				<label for="<?php echo $this->get_field_id('custom_icon_code'); ?>">
					<?php echo esc_html__('Custom icon code', 'hongo-addons'); ?>
				</label>
				<textarea class="widefat" rows="4" id="<?php echo $this->get_field_id('custom_icon_code'); ?>" name="<?php echo $this->get_field_name('custom_icon_code'); ?>"><?php echo $instance['custom_icon_code']; ?></textarea>
			</p>
			
	   <?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] 		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['social_style'] = ( ! empty( $new_instance['social_style'] ) ) ? strip_tags( $new_instance['social_style'] ) : '';
			$instance['fb_url'] 	= ( ! empty( $new_instance['fb_url'] ) ) ? strip_tags( $new_instance['fb_url'] ) : '';
			$instance['tw_url'] 	= ( ! empty( $new_instance['tw_url'] ) ) ? strip_tags( $new_instance['tw_url'] ) : '';			
			$instance['db_url'] 	= ( ! empty( $new_instance['db_url'] ) ) ? strip_tags( $new_instance['db_url'] ) : '';
			$instance['li_url'] 	= ( ! empty( $new_instance['li_url'] ) ) ? strip_tags( $new_instance['li_url'] ) : '';
			$instance['ig_url'] 	= ( ! empty( $new_instance['ig_url'] ) ) ? strip_tags( $new_instance['ig_url'] ) : '';
			$instance['tb_url'] 	= ( ! empty( $new_instance['tb_url'] ) ) ? strip_tags( $new_instance['tb_url'] ) : '';
			$instance['pi_url'] 	= ( ! empty( $new_instance['pi_url'] ) ) ? strip_tags( $new_instance['pi_url'] ) : '';
			$instance['yt_url'] 	= ( ! empty( $new_instance['yt_url'] ) ) ? strip_tags( $new_instance['yt_url'] ) : '';
			$instance['vm_url'] 	= ( ! empty( $new_instance['vm_url'] ) ) ? strip_tags( $new_instance['vm_url'] ) : '';
			$instance['sc_url'] 	= ( ! empty( $new_instance['sc_url'] ) ) ? strip_tags( $new_instance['sc_url'] ) : '';
			$instance['fk_url'] 	= ( ! empty( $new_instance['fk_url'] ) ) ? strip_tags( $new_instance['fk_url'] ) : '';
			$instance['rss_url'] 	= ( ! empty( $new_instance['rss_url'] ) ) ? strip_tags( $new_instance['rss_url'] ) : '';
			$instance['rd_url'] 	= ( ! empty( $new_instance['rd_url'] ) ) ? strip_tags( $new_instance['rd_url'] ) : '';
			$instance['bh_url'] 	= ( ! empty( $new_instance['bh_url'] ) ) ? strip_tags( $new_instance['bh_url'] ) : '';
			$instance['vine_url'] 	= ( ! empty( $new_instance['vine_url'] ) ) ? strip_tags( $new_instance['vine_url'] ) : '';
			$instance['gh_url'] 	= ( ! empty( $new_instance['gh_url'] ) ) ? strip_tags( $new_instance['gh_url'] ) : '';
			$instance['xing_url'] 	= ( ! empty( $new_instance['xing_url'] ) ) ? strip_tags( $new_instance['xing_url'] ) : '';
			$instance['vk_url'] 	= ( ! empty( $new_instance['vk_url'] ) ) ? strip_tags( $new_instance['vk_url'] ) : '';
			$instance['yelp_url'] 	= ( ! empty( $new_instance['yelp_url'] ) ) ? strip_tags( $new_instance['yelp_url'] ) : '';
			$instance['discord_url'] = ( ! empty( $new_instance['discord_url'] ) ) ? strip_tags( $new_instance['discord_url'] ) : '';
			$instance['skype_url'] 	= ( ! empty( $new_instance['skype_url'] ) ) ? strip_tags( $new_instance['skype_url'] ) : '';
			$instance['email_url'] 	= ( ! empty( $new_instance['email_url'] ) ) ? strip_tags( $new_instance['email_url'] ) : '';
			$instance['icon_size'] =  ( ! empty( $new_instance['icon_size'] ) ) ? strip_tags( $new_instance['icon_size'] ) : '';
			$instance['hongo_social_target'] =  ( ! empty( $new_instance['hongo_social_target'] ) ) ? strip_tags( $new_instance['hongo_social_target'] ) : '';
			$instance['hongo_text_case'] =  ( ! empty( $new_instance['hongo_text_case'] ) ) ? strip_tags( $new_instance['hongo_text_case'] ) : '';
			$instance['enable_alternate_font_title'] = ( ! empty( $new_instance['enable_alternate_font_title'] ) ) ? $new_instance['enable_alternate_font_title'] : '';
			$instance['one_column'] = ( ! empty( $new_instance['one_column'] ) ) ? $new_instance['one_column'] : '';
			$instance['hidden_val'] = ( ! empty( $new_instance['hidden_val'] ) ) ? strip_tags( $new_instance['hidden_val'] ) : '';
			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['custom_icon_code'] = $new_instance['custom_icon_code'];
			} else {
				$instance['custom_icon_code'] = wp_kses_post( $new_instance['custom_icon_code'] );
			}
		    return $instance;
		}
	}
}

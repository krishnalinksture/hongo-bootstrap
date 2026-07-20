<?php
/**
 * Instagram Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_load_instagram_widget' ) ) {
	function hongo_load_instagram_widget() {
		register_widget( 'hongo_instagram_widget' );
	}
}
add_action( 'widgets_init', 'hongo_load_instagram_widget' );

if (! class_exists('hongo_instagram_widget')) {

	class hongo_instagram_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'hongo_instagram_widget',
				esc_html__( 'Hongo Instagram', 'hongo-addons' ),
				array( 'description' => esc_html__( 'Add a custom instagram widget.', 'hongo-addons' ), )
			);
		}

		public function widget( $args, $instance ) {

			extract( $args );

			// Before widget.
	        echo $args['before_widget'];

	        /* Define empty array */
	        $instagram_extra_class = array();

        	$column_classes = '';
				
			/* Get instagram new accessToken value */
			$instagram_new_access_token = isset( $instance['instagram_new_access_token'] ) ? $instance['instagram_new_access_token'] : '';
			
			/* Get no of column in grid type  */
			$no_of_columns_instagram_feed = isset( $instance['no_of_columns_instagram_feed'] ) ? $instance['no_of_columns_instagram_feed'] : '4';
			
			/* Get no of feed in grid type  */
    		$no_instagram_feed = isset( $instance['no_instagram_feed'] ) ? $instance['no_instagram_feed'] : '8';
			
			/* Get column gutter in grid type  */
			$instagram_gutter = isset( $instance['instagram_gutter'] ) ? ' '. $instance['instagram_gutter'] : ' gutter-very-small';
			
			/* Check if like disable or not */
			$hongo_instagram_icon = '<div class="hongo-overlay"></div><div class="insta-counts"><span><i class="fa-brands fa-instagram"></i></span></div>';
			
			/* Check if first image is big */
		  	$first_big_image = isset( $instance['first_big_image'] ) ? $instance['first_big_image'] : '';
		  	if( ! empty( $first_big_image ) && $first_big_image == 'on' ) {
			  	$instagram_extra_class[] = 'first-big-image';
			}

    		$hongo_class_list = ! empty( $instagram_extra_class ) ? implode( " ", sanitize_html_class( $instagram_extra_class ) ) : '';
            $hongo_instagram_feed_class = ( $hongo_class_list ) ? ' ' . $hongo_class_list : '';
          
            $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Follow Us @ Instagram', 'hongo-addons' );

            if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

	    	$instagram_api_data = ! empty( $instagram_new_access_token ) ? wp_remote_get( 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,username,timestamp,permalink&access_token='.$instagram_new_access_token, array( 'timeout' => 200, ) ) : '';

			if ( ! empty( $instagram_api_data ) && ! is_wp_error( $instagram_api_data ) || wp_remote_retrieve_response_code( $instagram_api_data ) === 200 ) {
		        		$instagram_api_data = json_decode( $instagram_api_data['body'] );
	    	
	    		switch( $no_of_columns_instagram_feed ) {
	                case '3':
	                    $column_classes .= ' class="col-md-4 col-sm-4 col-xs-4"';
	                break;
	                case '2':
	                    $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12"';
	                break;
	                case '1':
	                    $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12"';
	                break;
	                case '4':
	                default:
	                    $column_classes .= ' class="col-md-3 col-sm-3 col-xs-3"';
	                break;
	            }
	    		echo '<div class="hongo-instagram-widget-wrap">';
	    			echo '<ul class="hongo-instagram-feed' . esc_attr( $instagram_gutter ) . esc_attr( $hongo_instagram_feed_class ) . '">';

                        if( ! empty( $instagram_api_data->data ) ) {
	    					$i = 0;
	    					foreach( $instagram_api_data->data as $key => $instagram_data ) {

                                if( $i < $no_instagram_feed ) {
		    						if( $instagram_data->media_type == 'IMAGE' || $instagram_data->media_type == 'CAROUSEL_ALBUM' ) {
		    							$i++;
		    							
			                            echo '<li'.$column_classes.'>';
			                            	echo '<figure>';
			                            		echo '<a href="'.$instagram_data->permalink.'" target="_blank">';
						        					echo '<img src="'.$instagram_data->media_url.'" />';
			                            			echo $hongo_instagram_icon;
			                            		echo '</a>';
			                            	echo '</figure>';
			                            echo '</li>';
			                        }
			                    }
	                        }
	                    } else {
	                    	echo '<li>' . __( 'Please enter valid Access Token.', 'hongo-addons' ) . '</li>';
	                    }
    				echo '</ul>';
	    		echo '</div>';
	    	}
    		// After widget
	     	echo $args['after_widget'];
    	}

		// Widget Backend 
		public function form( $instance ) {
			
			/* Set up some default widget settings. */
	        $defaults = array(
	            'title' => esc_html__( 'Follow Us @ Instagram', 'hongo-addons' ),
	            'instagram_new_access_token' => '',
	            'no_of_columns_instagram_feed' => '4',
	            'no_instagram_feed' => 8,
	            'instagram_gutter' => 'gutter-very-small',
	            'first_big_image' => false,
	        );

	        $instance = wp_parse_args( (array) $instance, $defaults );
	       
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p class="show-new-instagram">
				<label for="<?php echo $this->get_field_id( '
					' ); ?>"><?php esc_html_e( 'Access token:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_new_access_token' ); ?>" name="<?php echo $this->get_field_name( 'instagram_new_access_token' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_new_access_token'] ); ?>" />
			</p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of column', 'hongo-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_of_columns_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
							'1' => '1',
				    		'2' => '2',
				    		'3' => '3',
				    		'4' => '4',
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_of_columns_instagram_feed'] == $option ? selected( $instance['no_of_columns_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of instagram feed', 'hongo-addons' ); ?></label>
	            <input type="number" min="1" max="20" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed' ) ); ?>" value="<?php echo esc_attr( $instance['no_instagram_feed'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>" />
	        </p>
	        <p class="instagram-gutter">
	            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_gutter' ) ); ?>"><?php esc_html_e( 'Spacing between columns', 'hongo-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_gutter' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_gutter' ) ); ?>">
	                <?php $options = array(
                                    'gutter-very-small'		=> esc_html__('Gutter very small','hongo-addons'),
									'gutter-small'			=> esc_html__('Gutter small','hongo-addons'),
									'gutter-medium'			=> esc_html__('Gutter medium','hongo-addons'),
									'gutter-large'			=> esc_html__('Gutter large','hongo-addons'),
									'gutter-extra-large'	=> esc_html__('Gutter extra large','hongo-addons'),
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_gutter'] == $option ? selected( $instance['instagram_gutter'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $instance['first_big_image'], 'on' ); ?> id="<?php echo $this->get_field_id( 'first_big_image' ); ?>" name="<?php echo $this->get_field_name( 'first_big_image' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'first_big_image' ) ); ?>"><?php esc_html_e( 'First big image', 'hongo-addons' ); ?></label>          
			</p>
		<?php
		}
		
		// Updating widget replacing old instances with new

		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['instagram_new_access_token'] = ( ! empty( $new_instance['instagram_new_access_token'] ) ) ? $new_instance['instagram_new_access_token'] : '';			
			$instance['no_of_columns_instagram_feed'] = ( ! empty( $new_instance['no_of_columns_instagram_feed'] ) ) ? $new_instance['no_of_columns_instagram_feed'] : '';
			$instance['no_instagram_feed'] = ( ! empty( $new_instance['no_instagram_feed'] ) ) ? $new_instance['no_instagram_feed'] : '';
			$instance['first_big_image'] = ( ! empty( $new_instance['first_big_image'] ) ) ? $new_instance['first_big_image'] : '';
			$instance['instagram_gutter'] = ( ! empty( $new_instance['instagram_gutter'] ) ) ? $new_instance['instagram_gutter'] : '';
			return $instance;
		}
	}
}
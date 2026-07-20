<?php
/**
 * Twitter Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load the widget
if ( ! function_exists( 'hongo_load_twitter_widget' ) ) {
	function hongo_load_twitter_widget() {
		register_widget( 'Hongo_Twitter_Widget' );
	}
}
add_action( 'widgets_init', 'hongo_load_twitter_widget' );

if( ! class_exists( 'Hongo_Twitter_Widget' ) ) {

	class Hongo_Twitter_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'Hongo_Twitter_Widget',
			esc_html__( 'Hongo Twitter Feed', 'hongo-addons' ),
			array( 'description' => esc_html__( 'A widget to display Twitter feed.', 'hongo-addons' ), )
			);
		}

		public function widget( $args, $instance ) {

			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Recent Tweets', 'hongo-addons' );
			$hongo_tweets_media = ( isset( $instance['hongo_tweets_media'] ) ) ? $instance['hongo_tweets_media'] : '';
			$hongo_twitter_consumer_key = ( isset( $instance['hongo_twitter_consumer_key'] ) ) ? $instance['hongo_twitter_consumer_key'] : '';
			$hongo_twitter_consumer_secret = ( isset( $instance['hongo_twitter_consumer_secret'] ) ) ? $instance['hongo_twitter_consumer_secret'] : '';
			$hongo_twitter_access_token = ( isset( $instance['hongo_twitter_access_token'] ) ) ? $instance['hongo_twitter_access_token'] : '';
			$hongo_twitter_access_token_secret = ( isset( $instance['hongo_twitter_access_token_secret'] ) ) ? $instance['hongo_twitter_access_token_secret'] : '';
			$hongo_twitter_tweet_limit = ( isset( $instance['hongo_twitter_tweet_limit'] ) ) ? $instance['hongo_twitter_tweet_limit'] : '3';

			$twitter_link = 'https://apps.twitter.com/';

			// Before widget.
			echo $args['before_widget'];

		  	if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			
			if(  empty( $hongo_twitter_consumer_key ) || empty( $hongo_twitter_consumer_secret ) || empty( $hongo_twitter_access_token ) || empty( $hongo_twitter_access_token_secret ) ) {
				echo '<strong class="text-center display-block">'.__( 'Please configure your Twitter account credentials in this widget.', 'hongo-addons' ).'</strong>';
				echo $args['after_widget'];
				return;
			}

			if( ! file_exists( HONGO_ADDONS_WIDGET.'/twitteroauth/twitteroauth.php' ) ) {
				echo '<strong class="text-center display-block">'.__( 'Couldn\'t find twitteroauth.php!', 'hongo-addons').'</strong>';
				echo $args['after_widget'];
				return;
			}

			require_once( HONGO_ADDONS_WIDGET.'/twitteroauth/twitteroauth.php' );

			$hongo_twitter_feed_connection = $this->hongo_get_connection_with_access_token( $hongo_twitter_consumer_key, $hongo_twitter_consumer_secret, $hongo_twitter_access_token, $hongo_twitter_access_token_secret );

			$hongo_tweets = $hongo_twitter_feed_connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?count=".$hongo_twitter_tweet_limit ) or 
				print( 'Couldn\'t retrieve tweets!!!' );

			if( ! empty( $hongo_tweets->errors ) ) {
				if( $hongo_tweets->errors[0]->message == 'Invalid or expired token' ) {
					echo '<strong class="text-center display-block">'.$hongo_tweets->errors[0]->message.'!</strong><br />' . __( 'You\'ll need to regenerate it ', 'hongo-addons' ).'<a href="'.esc_url( $twitter_link ).'" target="_blank">'.__( 'here', 'hongo-addons' ).'</a>!';
					echo $args['after_widget'];
				} else {
					echo '<strong class="text-center display-block">'.$hongo_tweets->errors[0]->message.'</strong>';
					echo $args['after_widget'];
				}
				return;
			}

			// Twitter feed in front side
			if( ! empty( $hongo_tweets ) && is_array( $hongo_tweets ) ) {
				
				echo '<div class="hongo-twitter-wrapper">';
					echo '<ul>';
					$hongo_tweet_counter = '1';
					foreach( $hongo_tweets as $tweet ) {

						$media_html = '';
						if( $hongo_tweets_media == 'on' ){
							
							// For Youtube & Vimeo Video
							if( ! empty( $tweet->entities ) &&  ! empty( $tweet->entities->urls ) ) {
								foreach ( $tweet->entities->urls as $url ) {
									if( ! empty( $url->display_url ) ) {
										if (strpos( $url->display_url , 'youtube') !== false) {
										    preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $url->expanded_url, $matches );
											$id = $matches[1];
											$media_html = '<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowFullScreen allow="fullscreen;"></iframe>';
										} elseif (strpos( $url->display_url , 'vimeo') !== false) {
											$media_html = '<iframe src="'.esc_url( $url->expanded_url ).'"></iframe>';
										}
									}
								}

							} elseif( ! empty( $tweet->extended_entities ) ) { // For HTML5 MP4 Video
								foreach ( $tweet->extended_entities->media as $url_details ) {

									$image_url = ! empty( $url_details->media_url ) ? $url_details->media_url : '';
									
									if( ! empty( $url_details->video_info->variants[0]->url ) ) {
										$media_html = '<video controls poster="'.$image_url.'">';
											$media_html .= '<source type="'.$url_details->video_info->variants[0]->content_type.'" src="'.esc_url( $url_details->video_info->variants[0]->url ).'">';
										$media_html .= '</video>';

									} else{ // For Image
										if( ! empty( $url_details->type ) && $url_details->type == 'photo' && ! empty( $image_url ) ) {

											$media_html = '<img src="' . esc_url( $image_url ) . '" alt="" />';
										}
									}

								}
							}
						}
					
						if( ! empty( $tweet->text ) ) {

							$tweet_text = preg_replace( '/[\x{10000}-\x{10FFFF}]/u', '', $tweet->text );
							echo '<li>' . $media_html . '<span>'.$this->hongo_convert_links( $tweet_text ).'</span></li>';
							if( $hongo_tweet_counter == $hongo_twitter_tweet_limit ){ break; }
							$hongo_tweet_counter++;
						}
					}
				
				echo '</ul>';

				echo '</div>';
			} else {
				echo '<div class="hongo-twitter-wrapper">';
					echo __( '<b>Error!</b> Couldn\'t retrieve tweets for some reason!', 'hongo-addons' );
				echo '</div>';
			}

			// After widget
			echo $args['after_widget'];

		}

		public function hongo_get_connection_with_access_token( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) {
			$hongo_twitter_feed_connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
			return $hongo_twitter_feed_connection;
		}

		//convert links to clickable format
		public function hongo_convert_links( $status, $targetBlank=true, $linkMaxLen=250 ) {
			 
			// the target
				$target = $targetBlank ? " target=\"_blank\" " : "";

			// convert link to url
				$status = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/i', '<a href="\0" class="hongo-twitter-feed" target="_blank">\0</a>', $status);
			 
			// convert @ to follow
				$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a  class=\"hongo-twitter-simple-link\" href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
			 
			// convert # to search
				$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a class=\"hongo-twitter-simple-link\" href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
			 
			// return the status
				return $status;
		}

		//convert dates to readable format
		public function hongo_relative_time( $a ) {
			//get current timestampt
			$b = strtotime('now'); 
			//get timestamp when tweet created
			$c = strtotime($a);
			//get difference
			$d = $b - $c;
			//calculate different time values
			$minute = 60;
			$hour = $minute * 60;
			$day = $hour * 24;
			$week = $day * 7;

			if(is_numeric($d) && $d > 0) {
				//if less then 3 seconds
				if( $d < 3 ) { return __( 'right now', 'hongo-addons' ); }
				//if less then minute
				if( $d < $minute ) { return floor($d) . __( ' seconds ago', 'hongo-addons' ); }
				//if less then 2 minutes
				if( $d < $minute * 2 ) { return __( 'about 1 minute ago', 'hongo-addons' ); }
				//if less then hour
				if( $d < $hour ) { return floor($d / $minute) . __( ' minutes ago', 'hongo-addons' ); }
				//if less then 2 hours
				if( $d < $hour * 2 ) { return __( 'about 1 hour ago', 'hongo-addons' ); }
				//if less then day
				if( $d < $day ) { return floor($d / $hour) . __( ' hours ago', 'hongo-addons' ); }
				//if more then day, but less then 2 days
				if( $d > $day && $d < $day * 2 ) { return __( 'yesterday', 'hongo-addons' ); }
				//if less then year
				if( $d < $day * 365 ) { return floor($d / $day) . __( ' days ago', 'hongo-addons' ); }
				//else return more than a year
				return __( 'over a year ago', 'hongo-addons' );
			}
		}

		// Widget Backend 
		public function form( $instance ) { 

			$title = ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Tweets', 'hongo-addons' );
			$hongo_tweets_media = ( isset( $instance['hongo_tweets_media'] ) && $instance['hongo_tweets_media'] == 'on' ) ? 'checked="checked"' : '';
			$hongo_twitter_consumer_key = ( isset( $instance['hongo_twitter_consumer_key'] ) ) ? $instance['hongo_twitter_consumer_key'] : '';
			$hongo_twitter_consumer_secret = ( isset( $instance['hongo_twitter_consumer_secret'] ) ) ? $instance['hongo_twitter_consumer_secret'] : '';
			$hongo_twitter_access_token = ( isset( $instance['hongo_twitter_access_token'] ) ) ? $instance['hongo_twitter_access_token'] : '';
			$hongo_twitter_access_token_secret = ( isset( $instance['hongo_twitter_access_token_secret'] ) ) ? $instance['hongo_twitter_access_token_secret'] : '';
			$hongo_twitter_tweet_limit = ( isset( $instance['hongo_twitter_tweet_limit'] ) ) ? $instance['hongo_twitter_tweet_limit'] : '3';

			$twitter_link = 'https://apps.twitter.com/';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<?php echo __( 'Get your API keys &amp; tokens at:', 'hongo-addons' ); ?>
				<a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><?php echo esc_url( $twitter_link ); ?></a>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_twitter_consumer_key' ); ?>"><?php _e( 'Consumer key:', 'hongo-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hongo_twitter_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'hongo_twitter_consumer_key' ); ?>" value="<?php echo esc_attr( $hongo_twitter_consumer_key ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_twitter_consumer_secret' ); ?>"><?php _e( 'Consumer secret:', 'hongo-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hongo_twitter_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'hongo_twitter_consumer_secret' ); ?>" value="<?php echo esc_attr( $hongo_twitter_consumer_secret ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_twitter_access_token' ); ?>"><?php _e( 'Access token:', 'hongo-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hongo_twitter_access_token' ); ?>" name="<?php echo $this->get_field_name( 'hongo_twitter_access_token' ); ?>" value="<?php echo esc_attr( $hongo_twitter_access_token ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_twitter_access_token_secret' ); ?>"><?php _e( 'Access token secret:', 'hongo-addons' ); ?></label>
	            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hongo_twitter_access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'hongo_twitter_access_token_secret' ); ?>" value="<?php echo esc_attr( $hongo_twitter_access_token_secret ); ?>" />
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_tweets_media' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_tweets_media' ); ?>" type="checkbox" <?php echo $hongo_tweets_media; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_tweets_media' ); ?>">
					<?php esc_html_e( 'Display media?', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_twitter_tweet_limit' ); ?>"><?php _e( 'Tweet limit:', 'hongo-addons' ); ?></label>
	            <select name="<?php echo $this->get_field_name( 'hongo_twitter_tweet_limit' ); ?>" id="tz-popular-post" class="widefat">
	            	<?php
		            	$i = 1;
						for($i; $i <= 20; $i++ ){
							echo '<option value="'.$i.'"'; if( $hongo_twitter_tweet_limit == $i ){ echo ' selected="selected"'; } echo '>'.$i.'</option>';
						}
					?>
				</select>
			</p>

		<?php
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['hongo_tweets_media'] = ( ! empty( $new_instance['hongo_tweets_media'] ) ) ? 'on' : '';
			$instance['hongo_twitter_consumer_key'] = ( ! empty( $new_instance['hongo_twitter_consumer_key'] ) ) ? strip_tags( $new_instance['hongo_twitter_consumer_key'] ) : '';
			$instance['hongo_twitter_consumer_secret'] = ( ! empty( $new_instance['hongo_twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['hongo_twitter_consumer_secret'] ) : '';
			$instance['hongo_twitter_access_token'] = ( ! empty( $new_instance['hongo_twitter_access_token'] ) ) ? strip_tags( $new_instance['hongo_twitter_access_token'] ) : '';
			$instance['hongo_twitter_access_token_secret'] = ( ! empty( $new_instance['hongo_twitter_access_token_secret'] ) ) ? strip_tags( $new_instance['hongo_twitter_access_token_secret'] ) : '';
			$instance['hongo_twitter_tweet_limit'] = ( ! empty( $new_instance['hongo_twitter_tweet_limit'] ) ) ? strip_tags( $new_instance['hongo_twitter_tweet_limit'] ) : '';

			return $instance;
		}
	}
}

/*******************************************************************************/
/* End Twitter Widget */
/*******************************************************************************/
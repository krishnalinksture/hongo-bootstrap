<?php
/**
 * Popular Post Widget
 *
 * @package Hongo
 */
?>
<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register and load Hongo custom widget
if ( ! function_exists( 'hongo_load_latest_post_widget' ) ) {
	function hongo_load_latest_post_widget() {
		register_widget( 'hongo_latest_post_widget' );
	}
}
add_action( 'widgets_init', 'hongo_load_latest_post_widget' );

if (! class_exists('hongo_latest_post_widget')) {
	class hongo_latest_post_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'hongo_latest_post_widget',
				esc_html__('Hongo Latest Blog Post', 'hongo-addons'),
				array( 'description' => esc_html__( 'Your site most Latest Posts.', 'hongo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
	        $hongo_postperpage =  ( isset( $instance['postperpage'] ) ) ? $instance['postperpage'] : '';	        
	        $hongo_post_show_title = ( isset( $instance['hongo_post_show_title'] ) ) ? $instance['hongo_post_show_title'] : '';
	        $hongo_postcat = ! empty( $instance['postcats'] ) ? explode( ",",$instance['postcats'] ) : array();
	        $category_ids = ! empty( $hongo_postcat ) ? $hongo_postcat : '';
	        $hongo_post_show_date = ( isset( $instance['hongo_post_show_date'] ) ) ? $instance['hongo_post_show_date'] : '';
			$hongo_title = apply_filters( 'widget_title', $instance['title'] );
			$hongo_post_date_format = ( isset( $instance['hongo_post_date_format'] ) ) ? $instance['hongo_post_date_format']  : 'F j, Y |';
			$hongo_post_orderby = ( isset( $instance['hongo_post_orderby'] ) ) ? $instance['hongo_post_orderby'] : 'date';
			$hongo_post_sortby = ( isset( $instance['hongo_post_sortby'] ) ) ? $instance['hongo_post_sortby'] : 'desc';
			$hongo_post_postperpage = ( isset( $instance['hongo_post_postperpage'] ) ) ? $instance['hongo_post_postperpage'] : '4';
			$hongo_post_thumbnail = ( isset( $instance['hongo_post_thumbnail'] ) ) ? $instance['hongo_post_thumbnail'] : '';
			$hongo_enable_bottom_border =  ( isset( $instance['hongo_enable_bottom_border'] ) ) ? $instance['hongo_enable_bottom_border'] : '';
                        
			echo $args['before_widget'];
			if ( ! empty( $hongo_title ) ){
				echo $args['before_title'] . esc_attr( $hongo_title ) . $args['after_title'];
			}
			
			$hongo_recent_post = array(
				'post_type' 		=> 'post', 
				'posts_per_page' 	=> $hongo_postperpage ,
				'orderby' 			=> $hongo_post_orderby,
				'order' 			=> $hongo_post_sortby,
			);
			if ( function_exists( 'icl_object_id' ) ) {
				$hongo_recent_post['suppress_filters'] = 0;
			}

			if( $category_ids ) {
				$categories_tax_query_data = array( 'relation' => 'OR' );
				foreach ( $category_ids as $key => $category_id ) {
					$categories_tax_query_data[$key] = array(
			            'taxonomy' => 'category',
			            'field'    => 'id',
			            'terms'    => $category_id,
			        );
				}
				$hongo_recent_post['tax_query'] = $categories_tax_query_data;
			}
			$hongo_recent_posts = get_posts( $hongo_recent_post );
			$hongo_img_url = '';			
			if ( ! empty( $hongo_recent_posts ) ) {
				echo '<ul class="latest-post hongo-latest-blog-widget latest-post-style-2">';
					foreach ( $hongo_recent_posts as $recent_post ) {
						$recent_post_id = $recent_post->ID;
						$border_class = ( $hongo_enable_bottom_border == 'on' ) ? ' class="border-bottom"' : '';						
						$post_thumbnail_id = get_post_thumbnail_id( $recent_post_id );
						$image = wp_get_attachment_image( $post_thumbnail_id, 'hongo-popular-posts-thumb' );
                        echo '<li'.$border_class.'>';
							if( $hongo_post_thumbnail == 'on' && ! empty( $image ) ){
								echo '<figure>';
	                 				echo '<a href="'.get_permalink( $recent_post_id ).'">';
	                 					echo wp_get_attachment_image( $post_thumbnail_id, 'hongo-popular-posts-thumb' );
									echo '</a>';
	      						echo '</figure>';
	                        }
	                        echo '<div class="hongo-latest-blog-widget">';
		                        if( $hongo_post_show_title == 'on' ){
		                        	echo '<a class="latest-blog-title" href="'.get_permalink($recent_post_id).'"><span>'.wp_trim_words( get_the_title($recent_post_id), 7).'</span></a>'; 
		                        }
	                        	if( $hongo_post_show_date == 'on' && $hongo_post_date_format ){
	                        		echo '<div class="latest-blog-meta-date">';
	                        			echo get_the_date( $hongo_post_date_format, $recent_post_id );
	                        		echo '</div>';
	                        	}	                        	
                        	echo '</div>';
						echo '</li>';
					}					
				echo '</ul>';
			}
			
	        echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'hongo_post_show_title' => 'on', 'hongo_post_show_date' => '', 'hongo_post_date_format' => 'F j, Y', 'hongo_post_orderby' => 'date', 'hongo_post_sortby' => 'desc' ) );
			$hongo_postcat = ! empty( $instance['postcats'] ) ? explode(',', $instance['postcats'] ) : array();
			$hongo_title = ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Popular Post', 'hongo-addons' );
			$hongo_postperpage = (isset($instance['postperpage'])) ? $instance['postperpage'] : '';
			$hongo_post_show_title = ( isset( $instance['hongo_post_show_title'] ) && $instance['hongo_post_show_title'] == 'on' ) ? 'checked="checked"' : '';
			$hongo_post_show_date = ( isset( $instance['hongo_post_show_date'] ) && $instance['hongo_post_show_date'] == 'on' ) ? 'checked="checked"' : '';
			$hongo_post_date_format    = ( isset( $instance['hongo_post_date_format'] ) ) ? $instance['hongo_post_date_format'] : 'F j, Y';
			$hongo_post_orderby  		= ( isset( $instance['hongo_post_orderby'] ) ) ? $instance['hongo_post_orderby'] : 'date';
			$hongo_post_sortby  		= ( isset( $instance['hongo_post_sortby'] ) ) ? $instance['hongo_post_sortby'] : 'desc';
			$hongo_post_thumbnail = ( isset( $instance['hongo_post_thumbnail'] ) && $instance['hongo_post_thumbnail'] == 'on' ) ? 'checked="checked"' : '';
			$hongo_enable_bottom_border = ( isset( $instance['hongo_enable_bottom_border'] ) && $instance['hongo_enable_bottom_border'] == 'on' ) ? 'checked="checked"' : '';

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $hongo_title ); ?>" />
			</p> 
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'hongo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $hongo_postperpage ); ?>" />
			</p>
			<p>
		        <label for="<?php echo $this->get_field_id( 'postcats' ); ?>"><?php esc_html_e( 'Select Categories:', 'hongo-addons' ); ?></label>
		        <?php 
		        	$args = array( 'post_type' => 'post', 'taxonomy' => 'category' );
		            $terms = get_terms( $args );
		            if( ! empty( $terms ) ) {
		        ?>
		        		<select multiple="multiple" name="<?php echo $this->get_field_name('postcats'); ?>[]" id="<?php echo $this->get_field_id('postcats'); ?>" class="widefat">
		        			<?php
		        			foreach( $terms as $term ) { ?>
		        				<option value="<?php echo $term->term_id; ?>" <?php echo $selected = in_array( $term->term_id, $hongo_postcat ) ? ' selected="selected"' : '' ?>><?php echo $term->name; ?></option>
		        			<?php } ?>
		        		</select>
		        	<?php } ?>
		    </p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_post_show_title' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_post_show_title' ); ?>" type="checkbox" <?php echo $hongo_post_show_title; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_post_show_title' ); ?>">
					<?php esc_html_e( 'Display title?', 'hongo-addons' ); ?>
				</label>
			</p>			
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_post_show_date' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_post_show_date' ); ?>" type="checkbox" <?php echo $hongo_post_show_date; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_post_show_date' ); ?>">
					<?php esc_html_e( 'Display date?', 'hongo-addons' ); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hongo_post_date_format' ); ?>">
					<?php esc_html_e( 'Date format:', 'hongo-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_post_date_format' ); ?>" name="<?php echo $this->get_field_name( 'hongo_post_date_format' ); ?>" type="text" value="<?php echo esc_attr( $hongo_post_date_format ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'hongo_post_orderby' ); ?>">
					<?php esc_html_e( 'Order by:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'hongo_post_orderby' ); ?>" id="hongo-popular-post" class="widefat">
					<?php $options = array(
	                       			'date'   => esc_html__('Date','hongo-addons'),
                                    'ID'   => esc_html__('ID','hongo-addons'),
                                    'title'   => esc_html__('Title','hongo-addons'),
                                    'modified'   => esc_html__('Modified Date','hongo-addons'),
                                    'rand'   => esc_html__('Random','hongo-addons'),
                                    'comment_count' => esc_html__('Comment count','hongo-addons'),
                                    'menu_order' => esc_html__('Menu order','hongo-addons'),
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['hongo_post_orderby'] == $option ? selected( $instance['hongo_post_orderby'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'hongo_post_sortby' ); ?>">
					<?php esc_html_e( 'Sort order:', 'hongo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'hongo_post_sortby' ); ?>" id="tz-recent-category" class="widefat">
					<?php $options = array(
	                       			'desc'   => esc_html__( 'Descending','hongo-addons' ),
                                    'asc'   => esc_html__( 'Ascending','hongo-addons' ),
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['hongo_post_sortby'] == $option ? selected( $instance['hongo_post_sortby'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_post_thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_post_thumbnail' ); ?>" type="checkbox" <?php echo $hongo_post_thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_post_thumbnail' ); ?>">
					<?php esc_html_e( 'Display thumbnail?', 'hongo-addons' ); ?>
				</label>
			</p>

			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'hongo_enable_bottom_border' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hongo_enable_bottom_border' ); ?>" type="checkbox" <?php echo $hongo_enable_bottom_border; ?> />
				<label for="<?php echo $this->get_field_id( 'hongo_enable_bottom_border' ); ?>">
					<?php esc_html_e( 'Display bottom border?', 'hongo-addons' ); ?>
				</label>
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
		  $instance = array();
		  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		  $instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
		  $instance['postcats'] = ( ! empty( $new_instance['postcats'] ) ) ? implode( ',', $new_instance['postcats'] ) : 0;
		  $instance['hongo_post_show_title'] = ( ! empty( $new_instance['hongo_post_show_title'] ) ) ? 'on' : '';
		  $instance['hongo_post_show_date'] = ( ! empty( $new_instance['hongo_post_show_date'] ) ) ? 'on' : '';
		  $instance['hongo_post_date_format'] = ( ! empty( $new_instance['hongo_post_date_format'] ) ) ? strip_tags( $new_instance['hongo_post_date_format'] ) : '';
		  $instance['hongo_post_orderby'] = ( ! empty( $new_instance['hongo_post_orderby'] ) ) ? strip_tags( $new_instance['hongo_post_orderby'] ) : '';
		  $instance['hongo_post_sortby'] = ( ! empty( $new_instance['hongo_post_sortby'] ) ) ? strip_tags( $new_instance['hongo_post_sortby'] ) : '';
		  $instance['hongo_post_thumbnail'] = ( ! empty( $new_instance['hongo_post_thumbnail'] ) ) ? strip_tags( $new_instance['hongo_post_thumbnail'] ) : '';
		  $instance['hongo_enable_bottom_border'] = ( ! empty( $new_instance['hongo_enable_bottom_border'] ) ) ? strip_tags( $new_instance['hongo_enable_bottom_border'] ) : '';
		   return $instance;
		}
	}
}
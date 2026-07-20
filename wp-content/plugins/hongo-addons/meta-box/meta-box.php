<?php
/**
 * Metabox Class Fill.
 *
 * @package Hongo
 */
?>
<?php
/**
 * Calls the class on the post edit screen.
 */
function Hongo_Meta_Boxes() {
    new hongoMetaboxes();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'Hongo_Meta_Boxes' );
    add_action( 'load-post-new.php', 'Hongo_Meta_Boxes' );
}


/** 
 * The hongoMetaboxes Class.
 */
if( ! class_exists( 'hongoMetaboxes' ) ) {
	class hongoMetaboxes {

		/**
		 * Hook into the appropriate actions when the class is constructed.
		 */
		public function __construct() {

			$this->hongo_metabox_addons();
			add_action( 'add_meta_boxes', array( $this, 'hongo_add_meta_boxs' ) );
			add_action( 'save_post', array( $this, 'hongo_save_meta_box' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_script_loader' ) );
		}

		/**
		 * Adds the meta box functions container.
		 */
		public function hongo_metabox_addons(){
			require_once( HONGO_ADDONS_ROOT .'/meta-box/meta-box-maps.php' );
		}

		/**
		 * Adds the meta box container.
		 */
		public function hongo_add_meta_boxs( $hongo_post_type ) {

			$hongo_post_types = array( 'post', 'page', 'hongobuilder' );     //limit meta box to certain post types
			/* if WooCommerce plugin is activated */
			if( hongo_is_woocommerce_activated() ) {
				$hongo_post_types[] = 'product';
			}
			$flag = false;
	        if ( in_array( $hongo_post_type, $hongo_post_types ) ) {
	           	$flag = true;
	        }
	        if( $flag == true ) {
	        	switch( $hongo_post_type ) {
	        		case 'post':
	        			$this->hongo_add_meta_box( 'hongo_admin_options', __( 'Hongo Post Settings', 'hongo-addons' ), $hongo_post_type );
	        			$this->hongo_add_meta_box('hongo_admin_options_single', ucfirst( $hongo_post_type ).' Format Settings', $hongo_post_type);
	        		break;
	        		case 'product':
			        	/* if WooCommerce plugin is activated */
						if( hongo_is_woocommerce_activated() ) {
							$this->hongo_add_meta_box( 'hongo_admin_options', __( 'Hongo Product Settings', 'hongo-addons' ), $hongo_post_type );
						}
	        		break;
	        		case 'hongobuilder':
	        			$this->hongo_add_meta_box( 'hongo_meta_builder_setting', __( 'Hongo Section Builder Settings', 'hongo-addons' ), $hongo_post_type );
	        		break;
	        		case 'page':
	        			$this->hongo_add_meta_box( 'hongo_admin_options', __( 'Hongo Page Settings', 'hongo-addons' ), $hongo_post_type );
	        		break;
	        	}
		    }
		}

		public function hongo_add_meta_box( $hongo_id, $hongo_label_name, $hongo_post_type ) {
			add_meta_box(
				$hongo_id
				,$hongo_label_name
				,array( $this, $hongo_id )
				,$hongo_post_type
			);
		}

		public function hongo_admin_options() {
			global $post;
			$layout_settings_tab = $post->post_type.'_layout_settings';

			if( hongo_is_woocommerce_activated() && $post->post_type == 'product') {/* if WooCommerce plugin is activated */

				$hongo_tabs_title = array(
									0 => __( 'Layout Settings', 'hongo-addons' ),
									1 => __( 'Header and Footer', 'hongo-addons' ),
									2 => __( 'Page Title Settings', 'hongo-addons' ),
									3 => sprintf('%s %s %s', __( 'Single','hongo-addons' ), ucfirst( $post->post_type ), __( 'Settings','hongo-addons' ) ),
								);

				$hongo_tabs_sub_title = array(
										0 => __( 'Layout configuration settings', 'hongo-addons' ),
										1 => __( 'Header and Footer configuration settings', 'hongo-addons' ),
										2 => __( 'Title section configuration settings', 'hongo-addons' ),
										3 => '',
									);

				$hongo_page_tabs = array(
									0 => __( 'Layout Settings', 'hongo-addons' ),
									1 => __( 'Header and Footer', 'hongo-addons' ),
									2 => __( 'Page Title Settings', 'hongo-addons' ),
									3 => sprintf('%s %s %s', __( 'Single','hongo-addons' ), ucfirst( $post->post_type ), __( 'Layout','hongo-addons' ) ),
								);

				$hongo_page_tab_content = array( $layout_settings_tab, 'builder_page_settings', 'title_wrapper', 'single_product_layout' );

			} elseif( $post->post_type == 'post' ){

				$hongo_tabs_title = array(
									0 => __( 'Layout Settings', 'hongo-addons' ),
									1 => __( 'Header and Footer', 'hongo-addons' ),
									2 => __( 'Page Title Settings', 'hongo-addons' ),
									3 => __( 'Comments Settings', 'hongo-addons' ),
									4 => sprintf('%s %s %s', __( 'Single','hongo-addons' ), ucfirst( $post->post_type ), __( 'Settings','hongo-addons' ) ),
								);

				$hongo_tabs_sub_title = array(
										0 => __( 'Layout configuration settings', 'hongo-addons' ),
										1 => __( 'Header and Footer configuration settings', 'hongo-addons' ),
										2 => __( 'Title section configuration settings', 'hongo-addons' ),
										3 => sprintf( '%s %s', __( 'Enable&#47;Disable comments in','hongo-addons' ), $post->post_type ),
										4 => '',
									);

				$hongo_page_tabs = array(
									0 => __( 'Layout Settings', 'hongo-addons' ),
									1 => __( 'Header and Footer', 'hongo-addons' ),
									2 => __( 'Page Title Settings', 'hongo-addons' ),
									3 => __( 'Comments Settings', 'hongo-addons' ),
									4 => sprintf( '%s %s %s', __( 'Single', 'hongo-addons' ), ucfirst( $post->post_type ), __( 'Layout','hongo-addons' ) ),
								 );

				$hongo_page_tab_content = array( $layout_settings_tab, 'builder_page_settings', 'title_wrapper', 'content', 'single_post_layout' );

			} else {

				$hongo_tabs_title = array(
										0 => __( 'Layout Settings', 'hongo-addons' ),
										1 => __( 'Header and Footer', 'hongo-addons' ),
										2 => __( 'Page Title Settings', 'hongo-addons' ),
										3 => __( 'Comments Settings', 'hongo-addons' ),
									);
				$hongo_tabs_sub_title = array(
										0 => __( 'Layout configuration settings', 'hongo-addons' ),
										1 => __( 'Header and Footer configuration settings', 'hongo-addons' ),
										2 => __( 'Title section configuration settings', 'hongo-addons' ),
										3 => __( 'Enable&#47;Disable comments in page', 'hongo-addons' ),
									);
				$hongo_page_tabs = array(
										0 => __( 'Layout Settings', 'hongo-addons' ),
										1 => __( 'Header and Footer', 'hongo-addons' ),
										2 => __( 'Page Title Settings', 'hongo-addons' ),
										3 => __( 'Comments Settings', 'hongo-addons' ),
									);
				$hongo_page_tab_content = array( $layout_settings_tab , 'builder_page_settings', 'title_wrapper', 'content' );
			}

			if( hongo_is_woocommerce_activated() && $post->post_type == 'product'){/* if WooCommerce plugin is activated */
				$hongo_icon_class = array( 'et-gears','fa-solid fa-window-maximize','fa-solid fa-heading', 'ti-layout-accordion-separated', 'fa-solid fa-align-left', 'fa-solid fa-server','ti-layout-accordion-separated','ti-layout-media-overlay-alt','ti-layout-menu-separated', 'ti-layout-accordion-separated');
			} else {
				$hongo_icon_class = array( 'et-gears','fa-solid fa-window-maximize','fa-solid fa-heading', 'ti-layout-accordion-separated', 'fa-solid fa-align-left', 'fa-solid fa-server','ti-layout-accordion-separated','ti-layout-media-overlay-alt','ti-layout-menu-separated', 'ti-layout-accordion-separated');
			}

			$hongo_tabs_title = apply_filters( 'hongo_metabox_tabs_args', $hongo_tabs_title );
			$hongo_page_tab_content = apply_filters( 'hongo_metabox_tabs_key', $hongo_page_tab_content );

			if( ! empty( $hongo_tabs_title ) ) {
				echo '<ul class="hongo_meta_box_tabs">';
				$hongo_icon = 0;
				$hongo_showicon = '';
					foreach( $hongo_tabs_title as $tab_key => $tab_name ) {
						if($hongo_icon_class){
							$hongo_showicon = '<i class="'.esc_attr($hongo_icon_class[$hongo_icon]).'"></i>';
						}
						echo '<li class="hongo_tab_'.$hongo_page_tab_content[$tab_key].'"><a href="'.esc_url($tab_name).'">'.$hongo_showicon.'<span class="group_title">'.esc_attr($tab_name).'</span></a></li>';
						$hongo_icon++;
					}
				echo '</ul>';
			}
			
			echo '<div class="hongo_meta_box_tab_content">';
				foreach( $hongo_page_tab_content as $tab_content_key => $tab_content_name ) {
					echo '<div class="hongo_meta_box_tab" id="hongo_tab_'.esc_attr($tab_content_name).'">';
						echo "<div class='main_tab_title'>";
							echo "<h3>";
								echo isset( $hongo_page_tabs[$tab_content_key] ) ? $hongo_page_tabs[$tab_content_key] : '';
								$reset_key = isset( $hongo_page_tabs[$tab_content_key] ) ? $hongo_page_tabs[$tab_content_key] : '';
								$clear_button_value = __( 'Clear', 'hongo-addons' ) . ' ' . $reset_key;
								echo '<a href="javascript:void(0);" reset_key="'.esc_attr( $reset_key ).'" class="button button-primary hongo_tab_reset_settings">'.$clear_button_value.'</a>';
							echo "</h3>";
							echo "<span class='description'>".$hongo_tabs_sub_title[$tab_content_key]."</span>";
						echo "</div>";

						if( file_exists( HONGO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_'.$tab_content_name.'.php' ) ) {

							require_once( HONGO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_'.$tab_content_name.'.php' );
						}
						do_action( 'hongo_metabox_settings_' . $tab_content_name );

					echo '</div>';
				}
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		public function hongo_meta_builder_setting() {
	        global $post;
			echo '<div class="hongo_meta_box_tab_content_single">';
				echo '<div class="hongo_meta_box_tab" id="hongo_tab_single"></div>';
	            if( $post->post_type == 'hongobuilder' ) {
	            	require_once( HONGO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_bulider_section_settings.php' );
	            }
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		public function hongo_admin_options_single() {
	        global $post;
			echo '<div class="hongo_meta_box_tab_content_single">';
				echo '<div class="hongo_meta_box_tab" id="hongo_tab_single"></div>';
	            if( $post->post_type == 'post' ) {
	            	require_once( HONGO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_post_setting.php' );
	            }
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public function hongo_save_meta_box( $hongo_post_id ) {
		
			// If this is an autosave, our form has not been submitted,
	        // so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return $hongo_post_id;
			}

			/* OK, its safe for us to save the data now. */
			$hongo_data = array();
			foreach ( $_POST as $key => $value ) {

				// Sanitize the user input.
				$hongo_data = isset( $_POST[$key] ) ? $_POST[$key] : '';

				if ( strstr( $key, '_hongo_') ) {

					// Update the meta field.
					update_post_meta( $hongo_post_id, $key, $hongo_data );

				} elseif ( strstr( $key, 'hongo_') ) {

			        // Meta Prefix
			        $meta_prefix = '_';
			        
					// Update the meta field.
					update_post_meta( $hongo_post_id, $meta_prefix.$key, $hongo_data );
				}
			}
		}

		function admin_script_loader() {
			
			global $pagenow;
			if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
				wp_enqueue_script( 'media-upload' );
				wp_enqueue_script( 'thickbox' );
		   		wp_enqueue_style( 'thickbox' );
		   		wp_enqueue_style( 'wp-color-picker' );
    			wp_enqueue_script( 'wp-color-picker');
    			
    			// jQuery Sortable
		        wp_enqueue_script( 'jquery-ui-sortable' );

		   		wp_register_script( 'alpha-color-picker', HONGO_ADDONS_ROOT_DIR.'/assets/js/admin/alpha-color-picker.js', array( 'jquery', 'wp-color-picker' ), '1.0' );
		   		wp_enqueue_script( 'alpha-color-picker' );
		   		wp_register_style( 'alpha-color-picker', HONGO_ADDONS_ROOT_DIR.'/assets/css/admin/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
		   		wp_enqueue_style( 'alpha-color-picker' );

		   		wp_register_script( 'hongo-admin-metabox-cookie-js', HONGO_ADDONS_ROOT_DIR.'/meta-box/js/metabox-cookie.js', array('jquery'), '1.0' );
		   		wp_enqueue_script( 'hongo-admin-metabox-cookie-js' );
		   		wp_register_script( 'hongo-admin-metabox-js', HONGO_ADDONS_ROOT_DIR.'/meta-box/js/meta-box.js', array('jquery', 'alpha-color-picker'), '1.0' );
				wp_enqueue_script( 'hongo-admin-metabox-js' );
				wp_localize_script( 'hongo-admin-metabox-js', 'hongo_admin_meta', array(
					'reset_message' => esc_attr__( 'This will remove / clear all ### for this page and then it will use settings from WordPress customize panel. Are you sure to clear ###?', 'hongo-addons' )
				) );
		   		wp_register_style( 'hongo-admin-metabox', HONGO_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
		   		wp_enqueue_style( 'hongo-admin-metabox' );

				$hongo_product_data = array();
				$hongo_product_position = '';
				if( hongo_is_woocommerce_activated() ) {
							
					$hongo_product_data = array(
												'image'	=> HONGO_ADDONS_ROOT_DIR .'/hongo-shortcodes/images/hongo-270x380-ph.jpg',
												'title'	=> esc_html__( 'Sample Product', 'hongo-addons' ),
											);

					$hongo_product_position = array(
													'left'	=> esc_html__( 'Left', 'hongo-addons' ),
													'right'	=> esc_html__( 'Right', 'hongo-addons' ),
													'top'	=> esc_html__( 'Top', 'hongo-addons' ),
													'bottom'=> esc_html__( 'Botttom', 'hongo-addons' ),
												);
				}
				$hongo_products_json = ! empty( $hongo_product_data ) ? json_encode( $hongo_product_data ) : '';

				$hongo_product_position_json = json_encode( $hongo_product_position );

				wp_localize_script( 'hongo-admin-metabox-js', 'hongoHotspot', array( 
					'products_json' 		   => $hongo_products_json, 
					'products_position' 	   => $hongo_product_position_json,
					'product_description' 	   => '<a target="_blank" href="'. admin_url().'edit.php/?post_type=product">'. esc_html__( 'Click Here', 'hongo-addons' ) .'</a> '. esc_html__( 'to see product id on product title hover', 'hongo-addons' ),
				) );
			}
		}
	}
}
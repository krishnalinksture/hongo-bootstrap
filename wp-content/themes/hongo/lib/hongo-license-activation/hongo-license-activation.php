<?php
/**
 * Defind License Class 
 */
if( ! class_exists( 'Hongo_License_Activation' ) ) {
  	class Hongo_License_Activation {

		// Construct
		public function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'hongo_demo_import_script_style' ) );
		  	add_action( 'admin_init', array( $this, 'hongo_prevent_unwanted_auto_redirection' ), -1 );
		  	add_action( 'admin_menu', array( $this, 'hongo_license_activation_page' ), 5 );
		  	add_action( 'wp_ajax_hongo_active_theme_license', array( $this, 'hongo_active_theme_license' ) );
		  	add_action( 'admin_init', array( $this, 'hongo_theme_activate') );
			add_action( 'wp_before_admin_bar_render', array( $this, 'hongo_admin_bar_theme_setup_link' ) );
		}

		// Add theme setup page link in admin bar
		public function hongo_admin_bar_theme_setup_link() {

			global $wp_admin_bar;

		    $theme_setup_url = admin_url( 'themes.php' );
		    $theme_setup_url = add_query_arg( array( 'page' => 'hongo-theme-setup' ), $theme_setup_url );

			$args = array(
				'id'     => 'theme-setup-menu',
				'parent' => 'appearance',
				'title'  => __( 'Theme Setup', 'hongo' ),
				'href'   => esc_url( $theme_setup_url ),
			);
			$wp_admin_bar->add_menu( $args );
		}

		// Scripts & Styles
		public function hongo_demo_import_script_style( $hook ) {

			if ( is_admin() && ! empty( $hook ) && $hook == 'appearance_page_hongo-theme-setup' ) {

				wp_register_style( 'hongo-import', HONGO_THEME_ADMIN_CSS_URI . '/import.css', null );
				wp_enqueue_style( 'hongo-import' );
			}
		}

		// Theme setup page in Admin panel > Appereance
		public function hongo_license_activation_page() {

		    add_theme_page(
		        esc_html__( 'Theme Setup', 'hongo' ), // page title
		        esc_html__( 'Theme Setup', 'hongo' ), // menu title
		        'manage_options',                     // capability
		        'hongo-theme-setup',                  // menu slug
		        array( $this, 'hongo_license_activation_callback' )  // callback function
		    );
		}

		// Theme setup page callback for demo data install in Admin panel > Appereance
		public function hongo_license_activation_callback() {
			
		    /* Check current user permission */
		    if( ! current_user_can( 'manage_options' ) ) {
		        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'hongo' ) );
		    }

		    // For Get Multisite / Single site license activate or not
		    $hongo_is_theme_license_active = hongo_is_theme_license_active();

		    // Update license activation
		    $license_message = '';
			if( ! $hongo_is_theme_license_active ) {

				if( isset( $_GET['token'] ) && isset( $_GET['response'] ) ) {
				    $hongo_license_token = get_transient( 'hongo_license_token' );
				   	if( $_GET['token'] == $hongo_license_token ) {
				        if( $_GET['response'] == 'true' && isset( $_GET['msg']) ) {
				            
				            update_site_option( 'hongo_theme_active', 'yes' );
	        				update_option( 'hongo_theme_active', 'yes' );
				        }
				        if( $_GET['response'] == 'false' && isset( $_GET['msg']) ) {
				          	$license_message .= '<div class="licence-activated-failed is-dismissible notice error notice-error"><p>'.esc_attr( $_GET['msg'] ).'</p></div>';
				        }
				        if( $_GET['response'] == 'access_denied' && isset( $_GET['msg']) ) {
				          	$license_message .= '<div class="licence-activated-access-denied is-dismissible notice error notice-error"><p>'.esc_attr( $_GET['msg'] ).'</p></div>';
				        }
				    }
				}
			}
			
		    // For Get Multisite / Single site license activate or not
		    $hongo_is_theme_license_active = hongo_is_theme_license_active();

		    /* Gets a WP_Theme object for a theme. */
		    $hongo_theme_obj = wp_get_theme();
		    $hongo_theme_name = $hongo_theme_obj->get( 'Name' );
		    $hongo_theme_name = str_ireplace( array( 'child', ' child' ) , array( '', '' ), $hongo_theme_name );

		    /* Demo site URL */
		    $documnetaion_url = "//hongo.themezaa.com/documentation/";

		    /* Support URL */
		    $support_url = "//www.themezaa.com/support/";

		    /* Video Tutorials URL */
		    $video_tutorials_url = "//hongo.themezaa.com/documentation/video-tutorials/";

		    echo '<div class="wrap theme-setup-wrap">';
		    	echo sprintf( '%s', $license_message );
			    echo '<div class="theme-setup-content">';

	    			echo '<h1 class="display-none"></h1>';
	    			echo '<div class="hongo-header-license">';

	    				echo '<div class="hongo-head-left">';
	    					echo '<img src="' . esc_url( HONGO_THEME_IMAGES_URI . '/import/white-logo.png' ) . '" alt="' . esc_attr( $hongo_theme_name ) . '" />';
			            echo '</div>';
			            echo '<div class="hongo-head-right">';
			                echo '<span class="hongo-version">' . sprintf( esc_html__( 'Version %s', 'hongo' ), HONGO_THEME_VERSION ) . '</span>';
			                echo '<span class="link_sep">|</span>';
			                echo '<a target="_blank" href="' . esc_url( $documnetaion_url ) . '">' . esc_html__( 'Online Documentation', 'hongo' ) . '</a>';
			                echo '<span class="link_sep">|</span>';
			                echo '<a target="_blank" href="' . esc_url( $support_url ) . '">' . esc_html__( 'Support Center', 'hongo' ) . '</a>';
			            echo '</div>';
			            echo '<div class="clear"></div>';
			        echo '</div>';

			        echo '<div class="hongo-welcome-wrap">';
			        	echo '<div class="hongo-welcome-wrapper">';
			        		echo '<div class="welcome-title">';
			        			echo '<h2>' . sprintf( esc_html__( 'Welcome to %s', 'hongo' ), $hongo_theme_name ) . '</h2>';
			        		echo '</div>';
			        		echo '<div class="welcome-description">';
			        		if( $hongo_is_theme_license_active ) {
			        			echo '<p>' . sprintf( esc_html__( 'Awesome! Your %s WordPress theme license is already activated. Enjoy premium features of %s.', 'hongo' ), $hongo_theme_name, $hongo_theme_name ) . '</p>';
				        	} else {
				        		echo '<p>' . sprintf( esc_html__( 'Please activate your %s theme license copy and enjoy premium features.', 'hongo' ), $hongo_theme_name ) . '</p>';
				        	}
				        	echo '</div>';
			        	echo '</div>';
			        echo '</div>';

			        echo '<div class="hongo-import-tab">';
		        		echo '<ul>';

    						$steps = array( 
    							'1' => esc_html__( 'Theme License', 'hongo' ),
    							'2' => esc_html__( 'Install Plugins', 'hongo' ),
    							'3' => esc_html__( 'Import Demo', 'hongo' ),
    						);
    						if( hongo_is_woocommerce_activated() ) {

    							$steps['4'] = esc_html__( 'WooCommerce', 'hongo' );
    						}
    						$step = isset( $_GET['step'] ) ? $_GET['step'] : '1';
							
							foreach( $steps as $key => $value ) {
								$active_class = '';
								if ( $key == $step ) {
									$active_class = ' class="active"';
								}
								$url = add_query_arg(
	    							array(
	    								'page' => 'hongo-theme-setup',
	    								'step' => $key
	    							), admin_url( 'themes.php' )
	    						);
								echo '<li><a href="'. esc_url( $url ) .'"'.$active_class.'>'. $value .'</a></li>';
							}
    						
    					echo '</ul>';
		    		echo '</div>';

                    $step = isset( $_GET['step'] ) ? $_GET['step'] : '1';
                    if( $step ) {

                    	echo '<div class="hongo-import-tab-content">';
                		switch( $step ) {

                    		case '1' :
                    				echo '<div class="hongo-license-box">';
                						echo '<div class="hongo-license-top-content">';
                    						echo '<div class="hongo-license-left-content">';
                    							echo '<div class="hongo-license-left-top-inner">';
	                    							echo '<img src="' . esc_url( HONGO_THEME_IMAGES_URI . '/import/smile-icon.png' ) . '" alt="' . esc_attr( $hongo_theme_name ) . '" />';
				                    				echo '<div class="hongo-license-left-right-inner">';
				                    					echo '<span>' . sprintf( esc_html__( 'Thanks for using %s theme', 'hongo' ), $hongo_theme_name ) . '</span>';
					                    				if( $hongo_is_theme_license_active ) {
										        			echo '<p>' . sprintf( esc_html__( 'Awesome! Your %s WordPress theme license is already activated. Enjoy premium features of %s.', 'hongo' ), $hongo_theme_name, $hongo_theme_name ) . '</p>';
											        	} else {
											        		echo '<p>' . sprintf( esc_html__( 'Please activate your %s theme license copy and enjoy premium features.', 'hongo' ), $hongo_theme_name ) . '</p>';
											        	}
					                    			echo '</div>';
				                    			echo '</div>';
				                    			echo '<div class="hongo-license-left-bottom-inner">';
				                    				if( ! $hongo_is_theme_license_active ) {
				                    					echo '<a class="hongo-green-license-btn hongo-license" href="javascript:void(0);"><img src="' . esc_url( HONGO_THEME_IMAGES_URI . '/import/right-active-icon.png' ) . '" alt="' . esc_attr( $hongo_theme_name ) . '" />'.esc_html__( 'Activate HONGO theme license', 'hongo' ).'</a>';
				                    				}
				                    				echo '<p>' . sprintf( esc_html__( 'Activate your %s theme license by clicking above button to unlock %s premium features like demo data import. Please note that you will need to login to your ThemeForest account from which you have purchased %s theme and allow the access to verify your theme purchase. ', 'hongo' ), $hongo_theme_name, $hongo_theme_name, $hongo_theme_name ) . '<a href="' . esc_url( $documnetaion_url ) . '">'.esc_html__( 'For more details please check this article.', 'hongo' ).'</a></p>';
				                    			echo '</div>';
					                        echo '</div>';
					                        echo '<div class="hongo-license-right-content">';
					                        	echo '<h3>'. esc_html__( 'Premium Features', 'hongo' ) .'</h3>';
					                        	echo '<div class="hongo-license-support-content">';
				                    				echo '<ul>';
				                    					$license_content = array(
			                    							esc_html__( 'Lifetime free updates', 'hongo' ),
			                    							esc_html__( '6 months of support included', 'hongo' ),
			                    							esc_html__( 'Premium plugins at no cost', 'hongo' ),
			                    							esc_html__( 'Intuitive and powerful demo data import', 'hongo' ),
			                    							esc_html__( 'Over 50 pre-built elements', 'hongo' ),
			                    							esc_html__( '11 ready full store demos', 'hongo' ),
			                    							esc_html__( 'Template library', 'hongo' ),
			                    						);
				                    					foreach( $license_content as $single_content ) {
				                    						echo '<li>';
				                    							echo '<img src="' . esc_url( HONGO_THEME_IMAGES_URI.'/import/right-icon.png' ) . '" alt="#" /><span>' . $single_content . '</span>';
				                    						echo '</li>';
				                    					}
				                    				echo '</ul>';
						                        echo '</div>';
					                        echo '</div>';
					                    echo '</div>';
					                    echo '<div class="hongo-license-bottom-content">';
					                    	echo '<ul>';
						                    	echo '<li class="license-documentation">';
						                    		echo '<a href="' . esc_url( $documnetaion_url ) . '" target="_blank"><img src="' . esc_url( HONGO_THEME_IMAGES_URI.'/import/online-documentation.png' ) . '" alt="'.esc_attr__( 'Icon', 'hongo' ) .'" /><span>'.esc_html__( 'Online Documentation', 'hongo' ) .'</span></a>';
						                    	echo '</li>';
						                    	echo '<li class="license-support">';
						                    		echo '<a href="' . esc_url( $support_url ) . '" target="_blank"><img src="' . esc_url( HONGO_THEME_IMAGES_URI.'/import/support-center.png' ) . '" alt="'.esc_attr__( 'Icon', 'hongo' ) .'" /><span>'.esc_html__( 'Support Center', 'hongo' ) .'</span></a>';
						                    	echo '</li>';
						                    	echo '<li class="license-video">';
						                    		echo '<a href="' . esc_url( $video_tutorials_url ) . '" target="_blank"><img src="' . esc_url( HONGO_THEME_IMAGES_URI.'/import/video-tutorials.png' ) . '" alt="'.esc_attr__( 'Icon', 'hongo' ) .'" /><span>'.esc_html__( 'Video Tutorials', 'hongo' ) .'</span></a>';
						                    	echo '</li>';
						                    echo '</ul>';
					                    echo '</div>';
				                    echo '</div>';

                    			break;

                    		case '2' :
                    				if( ! hongo_is_hongo_addons_activated() || ! $hongo_is_theme_license_active ) {
                    					
	                    				echo '<div class="import-content-notices">';
					                        echo '<div class="import-export-desc import-install-plugins">';
					                        	echo '<h3><i class="fa-solid fa-info-circle"></i>' . __( 'Important Notice: ', 'hongo' ) . '<span>'.__( 'Theme license must be activated to install theme bundled premium plugins. Hongo Addons plugin must be activated to import demo data.', 'hongo' ).'</span></h3>';
							                echo '</div>';
					                    echo '</div>';
					                }

                        			do_action( 'hongo_theme_setup_plugins' );
                    			break;

                    		case '3' :

                    				if( ! ( hongo_is_hongo_addons_activated() && $hongo_is_theme_license_active ) ) {

								        $theme_setup_url = admin_url( 'themes.php' );
								        $theme_license_url = add_query_arg( array( 'page' => 'hongo-theme-setup', 'step' => '1', ), $theme_setup_url );
								        $plugin_setup_url = add_query_arg( array( 'page' => 'hongo-theme-setup', 'step' => '2', ), $theme_setup_url );

                    					echo '<div class="import-content-notices">';
					                        echo '<div class="import-export-desc import-install-plugins">';
					                        	if( ! $hongo_is_theme_license_active ) {

					                            	echo '<h3><i class="fa-solid fa-info-circle"></i>'.__( 'Important Notice: ', 'hongo' ).'<span>'. sprintf( esc_html__( 'Please %s your %s theme license and install %s plugin to enjoy premium features of import demo data.', 'hongo' ), '<a href="' . esc_url( $theme_license_url ) . '">activate</a>', $hongo_theme_name, '<a href="' . esc_url( $plugin_setup_url ) . '">Hongo Addons</a>' ).'</span></h3>';

					                        	} else {

					                        		echo '<h3><i class="fa-solid fa-info-circle"></i>'.__( 'Important Notice: ', 'hongo' ).'<span>'. sprintf( esc_html__( 'Please install %s plugin to enjoy premium features of import demo data.', 'hongo' ), '<a href="' . esc_url( $plugin_setup_url ) . '">Hongo Addons</a>' ).'</span></h3>';
					                        	}
					                        echo '</div>';
					                    echo '</div>';

                    				} else {

	                        			do_action( 'hongo_demo_import_callback', $_GET['step'] );
	                        		}
                    		break;

                    		case '4' :

                    				if( hongo_is_woocommerce_activated() ) {

									    $wc_setup_url = admin_url( 'admin.php' );
									    $wc_setup_url = add_query_arg( array( 'page' => 'wc-admin', 'path' => '/setup-wizard' ), $wc_setup_url );

										echo '<div class="hongo-license-box hongo-wc-setup-box">';
											echo '<div class="hongo-license-top-content">';
												echo '<div class="hongo-license-full-content">';
													echo '<div class="hongo-license-full-top-inner">';

				                    					echo '<p>' . esc_html__( 'Having a customizable eCommerce platform means that there are a lot of available settings to tweak. The Setup Wizard takes you through all necessary steps to set up your store and get it ready to start selling!', 'hongo' ) . '</p>';

														echo '<p>' . esc_html__( 'You can use parts of the wizard, by completing and skipping steps as you like or can setup everything manually also.', 'hongo' ) . '</p>';

														echo '<ul>';
															echo '<li>' . esc_html__( 'Use the wizard', 'hongo' ) . '</li>';
															echo '<li>' . esc_html__( 'Select \'Not right now\' and set up everything manually', 'hongo' ) . '</li>';
															echo '<li>' . esc_html__( 'Use parts of the wizard, by completing and skipping steps as you like.', 'hongo' ) . '</li>';
														echo '</ul>';

								        			echo '</div>';
								        		echo '</div>';
				                    			echo '<div class="hongo-license-full-bottom-content">';
				                    				
										            echo '<a class="hongo-button-gradient hongo-wc-setup-btn" href="' . esc_url( $wc_setup_url ) .  '">' . __( 'Setup Wizard', 'hongo' ) . '</a>';
				                    			echo '</div>';
								        	echo '</div>';
								        echo '</div>';
                    				}

                    			break;

                    	}
                    	echo '</div>';

                    }

		        echo '</div>';
		    echo '</div>';
		}
		    
		public function hongo_active_theme_license() {
		    $HongoResponse = array(
		        'status' => true,
		        'url' => $this->hongo_generate_theme_license_activation_url(),
		    );
		    die( json_encode( $HongoResponse ) );
		}

        public function hongo_random_string( $length = 20 ) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $len = strlen( $characters );
            $str = '';
            for ( $i = 0; $i < $length; $i ++ ) {
                $str .= $characters[ rand( 0, $len - 1 ) ];
            }

            return $str;
        }

        public function hongo_get_host() {
            $hongo_api_host = 'https://api.themezaa.com';
            return $hongo_api_host;
        }

		public function hongo_generate_theme_license_activation_url() {
			
			// @codingStandardsIgnore
			$hongo_license_api = $this->hongo_get_host();

	        $hongo_token = sha1( current_time( 'timestamp' ) . '|' . $this->hongo_random_string(20) );
	        $hongo_home_url = esc_url( home_url( '/' ) );

	        $hongo_redirect = admin_url( 'themes.php?page=hongo-theme-setup' );
	                    
	        if ( false === ( $hongo_token == get_transient( 'hongo_license_token' ) ) ) {
	            set_transient( 'hongo_license_token', $hongo_token, HOUR_IN_SECONDS );
	        }
	        $hongo_get_transient = get_transient( 'hongo_license_token' );

	        return sprintf( '%s?token=%s&url=%s&redirect=%s&itemid=%s', $hongo_license_api.'/activate-license/', $hongo_get_transient, $hongo_home_url, $hongo_redirect, '24915448' );
		}		

		public function hongo_theme_activate() {
		    global $pagenow;

		    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

		        wp_redirect( admin_url( 'themes.php?page=hongo-theme-setup' ) );
		        exit;
		    }
		}

		/**
		 * Prevent automatic redirection of third party plugins
		 */
		public function hongo_prevent_unwanted_auto_redirection() {

			if ( hongo_is_woocommerce_activated() ) {
				add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );
			}

			delete_transient( '_revslider_welcome_screen_activation_redirect' );
		}
		
	} // end of class
	$Hongo_License_Activation = new Hongo_License_Activation();
  
} // end of class_exists

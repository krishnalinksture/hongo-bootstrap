<?php
/**
 * Hongo import data.
 *
 * @package Hongo
 */
?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Import scripts and styles
add_action( 'admin_enqueue_scripts', 'hongo_addons_demo_import_script_style' );

if ( ! function_exists( 'hongo_addons_demo_import_script_style' ) ) {
	function hongo_addons_demo_import_script_style( $hook ) {

		wp_register_script( 'hongo-import', HONGO_ADDONS_ROOT_DIR . '/importer/assets/js/import.js', array( 'jquery', 'jquery-ui-accordion' ), HONGO_ADDONS_PLUGIN_VERSION, true );

		// Check Theme Setup page
		if ( is_admin() && ! empty( $hook ) && $hook == 'appearance_page_hongo-theme-setup' ) {

			wp_enqueue_script( 'hongo-import' );

			wp_localize_script( 'hongo-import', 'hongoImport', array(
				'full_import_confirmation'  => __( 'Are you sure you want to proceed? It will skip matching items and add new ones.', 'hongo-addons' ),
				'single_import_confirmation'=> __( 'Are you sure you want to proceed? It will skip matching items and add new ones.', 'hongo-addons' ),
				'no_single_layout'          => __( 'Please select at least one item from the list to import.', 'hongo-addons' ),
				'delete_media_confirmation' => __( 'Are you sure you want to remove all media permanently?', 'hongo-addons' ),
				'delete_data_confirmation'  => __( 'Are you sure you want to remove all demo data?', 'hongo-addons' ),
				'import_data_success_msg'   => esc_html__( 'Demo data has been imported successfully.', 'hongo-addons' ),
				'delete_media_success_msg'  => esc_html__( 'Demo media has been deleted successfully.', 'hongo-addons' ),
				'delete_data_success_msg'   => esc_html__( 'Demo data has been deleted successfully.', 'hongo-addons' ),
			) );
		}
	}
}

// Display import demo data functionality in Admin panel > Appereance > Theme Setup
add_action( 'hongo_demo_import_callback', 'hongo_addons_demo_import_callback' );

if ( ! function_exists( 'hongo_addons_demo_import_callback' ) ) {
	function hongo_addons_demo_import_callback( $step ) {
		
		if( $step == '3' ) {
			if ( hongo_is_theme_license_active() ) {

				// Require parsers.php file
				require_once dirname( __FILE__ ) . '/parsers.php';
				$parser = new WXR_Parser();

				$post_array = $page_common_array = $product_common_array = $sectionbuilder_array = $contact_form_array = $mailchimp_array = array();

				$common_posts_xmls = array( 'posts', 'pages', 'elements_features', 'products', 'section_builder', 'contact_forms', 'mailchimpform' );   
				if ( ! hongo_is_woocommerce_activated() ) {
					unset( $common_posts_xmls[3] );
				}

				if ( ! hongo_is_contact_form_7_activated() ) {
					unset( $common_posts_xmls[5] );
				}

				if ( ! hongo_is_mailchimp_form_activated() ) {
					unset( $common_posts_xmls[6] );
				}

				if( ! empty( $common_posts_xmls ) ) {

					foreach ( $common_posts_xmls as $common_posts_xml ) {

						if( file_exists( dirname( __FILE__ ) . '/sample-data/common-data/'.$common_posts_xml.'.xml' ) ) {

							$parsed_xml = $parser->parse( dirname( __FILE__ ) . '/sample-data/common-data/'.$common_posts_xml.'.xml' );

							if( ! empty( $parsed_xml ) && ! empty( $parsed_xml['posts'] ) ) {

								foreach ( $parsed_xml['posts'] as $xml_key => $xml_value ) {

									switch ( $xml_value['post_type'] ) {

										case 'post':
											$id = array( $xml_value['post_id'] );
											$post_array[ $xml_value['post_title'] ] = array( 'id' => $id );
										break;

										case 'page':
											$id = array( $xml_value['post_id'] );
											$slug = array( $xml_value['post_name'] );
											$page_common_array[ $xml_value['post_title'] ] = array( 'id' => $id, 'slug' => $slug );
										break;

										case 'product':
											if( hongo_is_woocommerce_activated() ) {
												$id = array( $xml_value['post_id'] );
												$slug = array( $xml_value['post_name'] );
												$product_common_array[ $xml_value['post_title'] ] = array( 'id' => $id, 'slug' => $slug );
											}
										break;

										case 'hongobuilder':
											$id = array( $xml_value['post_id'] );
											$sectionbuilder_array[ $xml_value['post_title'] ] = array( 'id' => $id );
										break;

										case 'wpcf7_contact_form':
											if( hongo_is_contact_form_7_activated() ) {
												$id = array( $xml_value['post_id'] );
												$contact_form_array[ $xml_value['post_title'] ] = array( 'id' => $id );
											}
										break;

										case 'mc4wp-form':
											if( hongo_is_mailchimp_form_activated() ) {
												$mailchimp_array[] = $xml_value['post_id'];
											}
										break;
									}
								}
							}
						}
					}
				}

				echo '<div class="import-content-notices">';
					echo '<div id="import-export-desc" class="import-export-desc">';
						echo '<h3><i class="fa-solid fa-info-circle"></i>'.__( 'Requirements for demo data import', 'hongo-addons' ).'</h3>';
						$import_notice = array(
							__( 'Memory Limit of 512 MB and max execution time (php time limit) of 300 seconds.', 'hongo-addons' ),
							__( 'WPBakery Page Builder and Slider Revolution must be activated for content and sliders to import.', 'hongo-addons' ),
							__( 'WooCommerce must be activated for shop data to import.', 'hongo-addons' ),
							__( 'Contact Form 7 must be activated for form data to import.', 'hongo-addons' ),
							__( 'MailChimp for WordPress must be activated for newsletter form data to import.', 'hongo-addons' ),
							__( 'For Import demo data', 'hongo-addons' ) . ' <a href="' . HONGO_ADDONS_DEMO_URI . 'documentation/import-all-demo-data-in-one-click/?category=demo-data" target="_blank">' . __( 'please check this article', 'hongo-addons' ) . '</a>.',
						);
						echo '<div>';
							echo '<p>'. __( 'If your server do not have enough speed or configuration as mentioned below then we recommend to import specific demo pages / posts / etc... using individual import option instead of using full import option.', 'hongo-addons' ) .'</p>';
							echo '<ul>';
								foreach( $import_notice as $single_notice ) {

									echo '<li><i class="fa-solid fa-check"></i>' . $single_notice . '</li>';
								}
							echo '</ul>';
						echo '</div>';
					echo '</div>';
				echo '</div>';

				if ( class_exists( 'Hongo_Addons' ) && is_plugin_active( 'wordpress-importer/wordpress-importer.php' ) ) {

					echo '<div class="import-content import-content-tab-box"><strong class="hongo-active-importer">' . esc_html__( 'Notice: Please deactivate WordPress Importer plugin and then try demo data import to make it run successfully.', 'hongo-addons' ) . '</strong></div>';

				} else {

					echo '<div class="import-content-wrap">';
						echo '<ul class="import-inner-content-wrap">';
							$all_demo_key_value = array(
								'fashion'     => esc_html__( 'Fashion', 'hongo-addons' ),
								'watch'   	  => esc_html__( 'Watch', 'hongo-addons' ),
								'furniture'   => esc_html__( 'Furniture', 'hongo-addons' ),
								'decor'       => esc_html__( 'Decor', 'hongo-addons' ),
								'clothes'     => esc_html__( 'Clothes', 'hongo-addons' ),
								'leather'     => esc_html__( 'Leather', 'hongo-addons' ),
								'jewellery'   => esc_html__( 'Jewellery', 'hongo-addons' ),
								'electronic'  => esc_html__( 'Electronic', 'hongo-addons' ),
								'lifestyle'   => esc_html__( 'Lifestyle', 'hongo-addons' ),
								'lingerie'    => esc_html__( 'Lingerie', 'hongo-addons' ),
								'shoes'       => esc_html__( 'Shoes', 'hongo-addons' ),
								'sports'      => esc_html__( 'Sports', 'hongo-addons' ),
							);
							foreach ( $all_demo_key_value as $key => $value ) {

								if( $key == 'fashion' ) {
									$common_site_url = HONGO_ADDONS_DEMO_URI;
								} else {
									$common_site_url = HONGO_ADDONS_DEMO_URI . $key;
								}
								echo '<li class="'.esc_attr( $key ).'-demo">';

									echo '<div class="import-inner-content-wrap">';
										echo '<div class="import-image-wrap">';
											echo '<img src="'.HONGO_ADDONS_ROOT_DIR.'/importer/assets/images/'.$key.'.jpg" alt="">';
											echo '<div class="import-image-overlay">';
												echo '<a target="_blank" href="' . esc_url( $common_site_url ) . '">';
													echo '<i class="fa-solid fa-chevron-right"></i>';
												echo '</a>';
											echo '</div>';
										echo '</div>';

										echo '<h3>'. $value .'</h3>';

										// Full Import Data Button
										echo '<a data-demo-import="full_data" class="hongo-full-import-button import-button hongo-import-button-trigger" href="javascript:void(0);">' . esc_html__( 'Full import', 'hongo-addons' ) . '</a>';

										// Single Data Button
										echo '<a data-demo-import="single_data" class="import-button hongo-single-import-button hongo-import-button-trigger" href="javascript:void(0);">' . esc_html__( 'Individual Import', 'hongo-addons' ) . '</a>';
									echo '</div>';

									// Full Import Data Layout Start
									echo '<div class="import-content-full-wrap hidden">';
										echo '<div class="import-content-full-inner-wrap">';
											echo '<a class="hongo-import-close" href="javascript:void(0);">x</a>';
											echo '<h2>' . sprintf( esc_html__( 'Full Import - %s', 'hongo-addons' ), $value ) . '</h2>';
											echo '<div class="hongo-full-import-choice-wrap">';
												echo '<ul class="hongo-import-choice-all">';
													echo '<li>';
														echo '<label><input type="checkbox" class="hongo-checkbox-all" value="all">'. esc_html__( 'All Content', 'hongo-addons' ).'</label>';
														echo '<span class="description">'. esc_html__( 'This will contain all of your media, posts, pages, products, section builder etc...', 'hongo-addons' ).'</span>';
													echo '</li>';
												echo '</ul>';
												echo '<ul class="hongo-import-choice">';

													$import_choices = array( 
														'posts' 			=> esc_html__( 'Posts','hongo-addons' ),
														'pages' 			=> esc_html__( 'Pages','hongo-addons' ),
														'elements_features' => esc_html__( 'Elements / Features', 'hongo-addons' ),
														'products' 			=> esc_html__( 'Products','hongo-addons' ),
														'section_builder' 	=> esc_html__( 'Section Builder','hongo-addons' ),
														'navigation_menu' 	=> esc_html__( 'Navigation Menus','hongo-addons' ),
														'contact_forms' 	=> esc_html__( 'Contact Forms','hongo-addons' ),
														'mailchimpform' 	=> esc_html__( 'Mailchimp Form','hongo-addons' ),
														'customizer' 		=> esc_html__( 'Theme Options ( Customizer )','hongo-addons' ),
														'widgets' 			=> esc_html__( 'Widgets','hongo-addons' ),
														'media' 			=> esc_html__( 'Media ( Attachment ) ','hongo-addons' ),
														'rev_slider' 		=> esc_html__( 'Slider Revolution','hongo-addons' ),
													);

													// is active woocommerce
													if ( ! hongo_is_woocommerce_activated() ) {
														unset( $import_choices['products'] );
													}

													// is active contact form 7
													if ( ! hongo_is_contact_form_7_activated() ) {
														unset( $import_choices['contact_forms'] );
													}

													// is active mailchimp form
													if ( ! hongo_is_mailchimp_form_activated() ) {
														unset( $import_choices['mailchimpform'] );
													}

													// is active revolution slider
													if ( ! hongo_is_revolution_slider_activated() ) {
														unset( $import_choices['rev_slider'] );
													}
		 
													foreach ( $import_choices as $key_choice => $value_choice ) {

														echo '<li><label><input type="checkbox" class="hongo-checkbox" value="'. $key_choice .'" data-label="'. $value_choice .'">'. $value_choice .'</label></li>';
													}
												echo '</ul>';
											echo '</div>';

											echo '<div class="import-progress-bar-wrap">';
												echo '<div class="import-progress-bar progress progress-striped">';
													echo '<div role="progressbar progress-striped" class="import-progress-percentage progress-bar"></div>';
													echo '<div class="import-progress-msg"></div>';
												echo '</div>';
											echo '</div>';
											
											echo '<div class="hongo-regenerate-notice">';
												echo '<span>'.__( 'Now, please install and run', 'hongo-addons').' <a title="' . __( 'Regenerate Thumbnails', 'hongo-addons' ) . '" href="'.admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472' ).'">'. __( 'Regenerate Thumbnails', 'hongo-addons' ).'</a> '. __( 'plugin once.', 'hongo-addons' );
												echo '</span>';
											echo '</div>';

											echo '<div class="import-content-top">';
												echo '<a data-demo-import="full" demo-data="'.$key.'" class="hongo-button-gradient hongo-import-button hongo-demo-import" href="javascript:void(0);">' . esc_html__( 'Import Full', 'hongo-addons' ) . '</a>';
											echo '</div>';
										echo '</div>';
									echo '</div>';

									// Individual Data Layout End
									echo '<div class="import-content-single-wrap hidden">';

										echo '<div class="import-content-single-inner-wrap">';
											echo '<a class="hongo-import-close" href="javascript:void(0);">x</a>';
											echo '<h2>' . sprintf( esc_html__( 'Individual Import - %s', 'hongo-addons' ), $value ) . '</h2>';
											
											$page_diff_array = $product_diff_array = array();

											$diff_posts_xmls = array( 'pages', 'products' );
											if( ! empty( $diff_posts_xmls ) ) {
												foreach ( $diff_posts_xmls as $diff_posts_xml ) {

													$diff_xml_path = dirname( __FILE__ ) . '/sample-data/'.$key.'/'.$diff_posts_xml.'-diff.xml';

													if( file_exists( $diff_xml_path ) ) {

														$parsed_xml = $parser->parse( $diff_xml_path );

														if( ! empty( $parsed_xml ) && ! empty( $parsed_xml['posts'] ) ) {

															foreach ( $parsed_xml['posts'] as $xml_key => $xml_value ) {
																switch ( $xml_value['post_type'] ) {
																	case 'page':

																		$id = array( $xml_value['post_id'] );
																		$slug = array( $xml_value['post_name'] );
																		$page_diff_array[ $xml_value['post_title'] ] = array( 'id' => $id, 'slug' => $slug );

																	break;
																	case 'product':

																		$id = array( $xml_value['post_id'] );
																		$slug = array( $xml_value['post_name'] );
																		$product_diff_array[ $xml_value['post_title'] ] = array( 'id' => $id, 'slug' => $slug );
																	break;
																}
															}
														}
													}
												}
											}

											$site_url = site_url();

											$single_import_details = array(
												'page'          => esc_html__( 'Pages','hongo-addons' ),
												'post'          => esc_html__( 'Posts','hongo-addons' ),
												'product'       => esc_html__( 'Products','hongo-addons' ),
												'sectionbuilder'=> esc_html__( 'Section Builder','hongo-addons' ),
											);
											
											if ( ! hongo_is_woocommerce_activated() ) {
												unset( $single_import_details['product'] );
											}

											/* Merge pages common and different code start */
											$page_array = array();

											if( ! empty( $page_diff_array ) ) {

												$page_array = array_merge( $page_array, $page_diff_array );
											}

											if( ! empty( $page_common_array ) ) {

												$page_array = array_merge( $page_array, $page_common_array );
											}

											/* Merge pages common and different code end */

											/* Merge products common and different code start */
											$product_array = array();

											if( ! empty( $product_diff_array ) ) {

												$product_array = array_merge( $product_array, $product_diff_array );
											}

											if( ! empty( $product_common_array ) ) {

												$product_array = array_merge( $product_array, $product_common_array );
											}

											/* Merge products common and different code end */

											$product_link_slug = array( 'Classic Product', 'Right Content Product', 'Carousel Product', 'Left Content Product', 'Default Product', 'Sticky Product', 'Modern Product', 'Extended Product', 'Simple Product', 'Variable Product', 'Grouped Product', 'Smart Product', 'External / Affiliate Product', 'Sale Product', 'Out of Stock Product', 'Video Product', 'New Product', '360° Degree Product' );

											echo '<div class="hongo-single-import-choice-wrap">';

												foreach ( $single_import_details as $single_details_key => $single_details_value ) {

													echo '<div class="'.esc_attr( $single_details_key ).'-main">';

														echo '<h3>'. $single_details_value .'</h3>';

														$main_array = ${ $single_details_key . '_array' };
														if ( ! empty( $main_array ) ) {

															// Sorting alphabatically
															if( $single_details_key != 'product' ) {
																ksort( $main_array );
															}

															echo '<ul class="hongo-single-import-choice-all">';
																echo '<li><label><input type="checkbox" class="hongo-single-import-checkbox-all" value="all">'. __( 'Select all', 'hongo-addons' ) .'</label>';
																echo '</li>';
															echo '</ul>';

															echo '<ul class="hongo-single-' . $single_details_key . '-import-choice hongo-common-single-checkbox-wrap">';

																$without_link_slugs = array();
																foreach ( $main_array as $main_key => $main_value ) {

																	$single_id = ! empty( $main_value['id'] ) ? implode( ',', $main_value['id'] ) : '';
																	$slug = ! empty( $main_value['slug'] ) ? implode( ',', $main_value['slug'] ) : '';
																	
																	if( $single_details_key == 'product' && ! in_array( $main_key, $product_link_slug ) ) {
																		$without_link_slugs[ $single_id ] = $main_key;
																	}

																	if( $single_details_key == 'post' || $single_details_key == 'sectionbuilder' || $single_details_key == 'page' || ( $single_details_key == 'product' && in_array( $main_key, $product_link_slug ) ) ) {

																		echo '<li>';
																			echo '<label><input type="checkbox" class="hongo-single-checkbox" value="' . esc_attr( $single_id ) . '"><span>' . $main_key . '</span></label>';

																			if( $single_details_key == 'page' || $single_details_key == 'product' ) {

																				$unique_pages = array( 'features', 'elements' );
																				if( ! in_array( $slug, $unique_pages ) ) {
																					$current_url = str_replace( $site_url, $common_site_url, $site_url );
																					$current_url = $current_url . '/' . $slug;
																					$current_url = str_replace( array( '-watch', '-furniture', '-decor', '-clothes', '-leather', '-jewellery', '-electronic', '-lifestyle', '-lingerie', '-shoes' ), array( '', '' ), $current_url );
																					if( $current_url == $common_site_url . '/landing' ) {
																						$current_url = esc_url( HONGO_ADDONS_DEMO_URI . 'landing' );
																					}
																					$current_url = str_replace( $site_url , $common_site_url , $current_url );
																					echo '<a href="'.esc_url( $current_url ).'" target="_blank"><i class="fa-solid fa-external-link-alt"></i></a>';
																				}
																			}

																		echo '</li>';
																	}

																}
																if( ! empty( $without_link_slugs ) ) {
																	
																	foreach( $without_link_slugs as $without_link_key => $without_link_slug ) {
																		echo '<li>';
																			echo '<label><input type="checkbox" class="hongo-single-checkbox" value="' . esc_attr( $without_link_key ) . '"><span>' . $without_link_slug . '</span></label>';
																		echo '</li>';
																	}
																}
															echo '</ul>';
														}
													echo '</div>';
												}

											echo '</div>';

											echo '<div class="import-progress-bar-wrap">';
												echo '<div class="import-progress-bar progress progress-striped">';
													echo '<div role="progressbar progress-striped" class="import-progress-percentage progress-bar"></div>';
													echo '<div class="import-progress-msg"></div>';
												echo '</div>';
											echo '</div>';

											echo '<div class="hongo-regenerate-notice">';
												echo '<span>'.__( 'Now, please install and run', 'hongo-addons').' <a title="' . __( 'Regenerate Thumbnails', 'hongo-addons' ) . '" href="'.admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472' ).'">'. __( 'Regenerate Thumbnails', 'hongo-addons' ).'</a> '. __( 'plugin once.', 'hongo-addons' );
												echo '</span>';
											echo '</div>';

											echo '<div class="import-content-top">';
												echo '<a data-demo-import="import-single" demo-data="' . $key . '" id="hongo-single-demo-import" class="hongo-button-gradient hongo-demo-import" href="javascript:void(0);">'. __( 'Import Selected Items', 'hongo-addons' ) .'</a>';
											echo '</div>';

										echo '</div>';

									echo '</div>';

								echo '</li>';
							}
						echo '</ul>';

						echo '<div class="hongo-data-delete-wrap">';

							echo '<div class="hongo-data-delete-msg"></div>';

							echo '<div class="hongo-data-delete-inner">';

								echo '<div class="delete-demo-media-wrap">';

									echo '<span>'. __( 'Please note that this action will remove all the demo placeholder images, which are imported in your WP setup. Are you sure to proceed?', 'hongo-addons' ) .'</span>';

									echo '<div class="delete-btn-wrap">';
										echo '<a data-delete-key="media" class="hongo-button-danger hongo-demo-delete" href="javascript:void(0);">'. __( 'Delete Demo Media', 'hongo-addons' ) .'</a>';
									echo '</div>';
								echo '</div>';

								echo '<div class="delete-demo-data-wrap">';

									echo '<span>'. __( 'Please note that this action will remove all the demo posts, pages, products, media and forms, which are imported in your WP setup and no matter if those are changed or not by you. Are you sure to proceed?', 'hongo-addons' ) .'</span>';

									echo '<div class="delete-btn-wrap">';
										echo '<a data-delete-key="data" class="hongo-button-danger hongo-demo-delete" href="javascript:void(0);">'. __( 'Delete Demo Data', 'hongo-addons' ) .'</a>';
									echo '</div>';

								echo '</div>';

							echo '</div>';

						echo '</div>';

					echo '</div>';
				}
			}
		}
	}
}

// Don't resize images for import
if ( ! function_exists( 'hongo_no_image_resize' ) ) :
	function hongo_no_image_resize( $sizes ) {

		return array();
	}
endif;

// Hook For Import Sample Data And Log Messages.
add_action( 'wp_ajax_hongo_import_sample_data', 'hongo_import_sample_data' );
add_action( 'wp_ajax_hongo_refresh_import_log', 'hongo_refresh_import_log' );

if ( ! function_exists( 'hongo_import_sample_data' ) ) {
	function hongo_import_sample_data() {
		global $wpdb;

		if ( current_user_can( 'manage_options' ) && hongo_is_theme_license_active() && ! is_plugin_active( 'wordpress-importer/wordpress-importer.php' ) ) {

			/* Load WP Importer */
			if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) define( 'WP_LOAD_IMPORTERS', true );

			/* Check if main importer class doesn't exist */
			if ( ! class_exists( 'WP_Importer' ) ) {

				$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				include $wp_importer;
			}

			// if WP importer doesn't exist
			if ( ! class_exists( 'WP_Import' ) ) {

				$wp_import = HONGO_ADDONS_IMPORT . '/wordpress-importer.php';
				include $wp_import;
			}

			// check for main import class and wp import class.
			// setup_key means full or individual import
			// demo_key means demo wise import
			if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) {
				// Import demo data
				if ( ! empty( $_POST['setup_key'] ) && ! empty( $_POST['demo_key'] ) ) {
					$setup_key          = $_POST['setup_key'];
					$demo_key           = $_POST['demo_key'];
					$import_options     = ! empty( $_POST['import_options'] ) ? $_POST['import_options'] : '';
					$full_import_option = ! empty( $_POST['full_import_options'] ) ? $_POST['full_import_options'] : '';

					add_filter( 'intermediate_image_sizes_advanced', 'hongo_no_image_resize' );

					// Import Full data like ( Media, Posts, Pages, Products, Navigation menu, Section menu, Section builder, Contact Forms, Mailchimp Forms )
					if ( $setup_key == 'full' && ! empty( $full_import_option ) ) {

						$post_xml_keys = array( 'posts', 'pages', 'elements_features', 'products', 'media', 'navigation_menu', 'section_builder', 'contact_forms', 'mailchimpform' );
						if ( in_array( $full_import_option, $post_xml_keys ) ) {

							$sample_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/'.$full_import_option.'.xml';
							$sample_data_navigation_xml = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/'.$full_import_option.'.xml';

							if ( file_exists( $sample_data_xml ) || file_exists( $sample_data_navigation_xml ) ) {
								// Import Sample Data XML.
								$importer = new WP_Import();

								// Import Posts, Pages, Product Content, Images, Menus
								$importer->import_menu = true;
								$importer->fetch_attachments = true;

								// Post Terms
								if( $full_import_option == 'posts' ) {

									$sample_post_terms_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/post_terms.xml';
									if ( file_exists( $sample_post_terms_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Post Terms.xml Import Start.' );
										$importer->import( $sample_post_terms_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Post Terms.xml Import End' );
									}
								}

								// Import Woocommerce data if WooCommerce plugin is activated and selected option from full import
								if ( $full_import_option == 'products' && hongo_is_woocommerce_activated() ) {

									//Before Import Sample Data Add Woocommerce Attribute
									$transient_name = 'wc_attribute_taxonomies';
									$old_attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies" );
									if( empty( $old_attribute_taxonomies ) ) {

										hongo_import_log( 'MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes Start.' );
										
										require_once( dirname( __FILE__ ) . '/hongo-addons-require-file.php' );
										$attribute_taxonomies_data = new Hongo_Set_attribute_taxonomies;
										$getresultdata = $attribute_taxonomies_data->add_woocommerce_attribute_taxonomies();

										hongo_import_log( 'MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes End.' );
									}

									// Product terms
									$sample_product_terms_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/product_terms.xml';
									if ( file_exists( $sample_product_terms_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Product Terms.xml Import Start.' );
										$importer->import( $sample_product_terms_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Product Terms.xml Import End' );
									}

									// For Variation Products
									$variation_sample_data_xml = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/'.$full_import_option.'-variation.xml';

									if( file_exists( $variation_sample_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Variation '.ucfirst( $full_import_option ).'.xml Import Start.' );
										$importer->import( $variation_sample_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Variation '.ucfirst( $full_import_option ).'.xml Import End' );
									}
								}

								// For Privacy policy page trash
								if( $full_import_option == 'pages' ) {
									
									$default_pp_page_id = get_option( 'wp_page_for_privacy_policy' );

									$theme_pp_page_meta = get_post_meta( $default_pp_page_id, '_hongo_demo_import_data', true );

									if( ! $theme_pp_page_meta ) {

										$privacy_policy = get_page_by_path( 'privacy-policy' );

										if( ! empty( $default_pp_page_id ) && $privacy_policy && $default_pp_page_id == $privacy_policy->ID ) {

											wp_trash_post( $default_pp_page_id );
										}
									
										// Privacy Policy page assign in woocommerce setting
									
										if( ! empty( $privacy_policy ) && ! empty( $privacy_policy->ID ) ) {

											update_option( 'wp_page_for_privacy_policy', $privacy_policy->ID );
										}
									}

								}

								ob_start();
								hongo_import_log( 'MESSAGE - '.ucfirst( $full_import_option ).'.xml Import Start.' );
								// For Navigation Menu
								if( $full_import_option != 'navigation_menu' ) {
									$importer->import( $sample_data_xml );
								} else {
									$importer->import( $sample_data_navigation_xml );
								}
								ob_end_clean();
								hongo_import_log( 'MESSAGE - '.ucfirst( $full_import_option ).'.xml Import End' );

								// Pages And Product Different
								if ( $full_import_option == 'pages' || ( $full_import_option == 'products' && hongo_is_woocommerce_activated() ) ) {
									
									$diff_sample_data_xml = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/'.$full_import_option.'-diff.xml';

									if ( file_exists( $diff_sample_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Different '.ucfirst( $full_import_option ).'.xml Import Start.' );
										$importer->import( $diff_sample_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Different '.ucfirst( $full_import_option ).'.xml Import End' );
									}
								}

								// Variation Product stock status change
								if( $full_import_option == 'products' && hongo_is_woocommerce_activated() ) {

									global $wpdb;

									$variation_product_ids = $wpdb->get_col( "SELECT DISTINCT p.post_parent FROM {$wpdb->prefix}posts p INNER JOIN {$wpdb->prefix}postmeta as pm ON p.ID = pm.post_id WHERE p.post_parent > 0 AND p.post_type LIKE 'product_variation' AND pm.meta_key = '_hongo_demo_import_data' AND pm.meta_value = '1'" );

									if( ! empty( $variation_product_ids ) ) {

										foreach( $variation_product_ids as $variation_product_id ) {

											update_post_meta( $variation_product_id, '_stock_status', 'instock' );
										}
									}

								}

								if( hongo_is_woocommerce_activated() && $full_import_option == 'pages' ) {

									hongo_import_log( 'MESSAGE - Import WooCommerce Pages Setting Start.' );
									// Set Woocommerce Default Pages.

									$woopages = array(
										'woocommerce_shop_page_id'            => 'shop',
										'woocommerce_cart_page_id'            => 'cart',
										'woocommerce_checkout_page_id'        => 'checkout',
										'woocommerce_myaccount_page_id'       => 'my account',
										'woocommerce_lost_password_page_id'   => 'lost-password',
										'woocommerce_edit_address_page_id'    => 'edit-address',
										'woocommerce_view_order_page_id'      => 'view-order',
										'woocommerce_change_password_page_id' => 'change-password',
										'woocommerce_logout_page_id'          => 'logout',
										'woocommerce_pay_page_id'             => 'pay',
										'woocommerce_thanks_page_id'          => 'order-received',
										'woocommerce_wishlist_page_id'        => 'wishlist',
									);

									foreach ( $woopages as $woo_page_name => $woo_page_title ) {
										$woo_page_query = new WP_Query(
											array(
												'post_type'              => 'page',
												'title'                  => $woo_page_title,
												'post_status'            => 'publish',
												'posts_per_page'         => 12,
												'no_found_rows'          => true,
												'ignore_sticky_posts'    => true,
												'update_post_term_cache' => false,
												'update_post_meta_cache' => false,
												'orderby'                => 'post_date ID',
												'order'                  => 'ASC',
											)
										);
										 
										if ( ! empty( $woo_page_query->post ) ) {
											$woopage = $woo_page_query->post;
										} else {
											$woopage = null;
										}

										if ( isset( $woopage ) && $woopage->ID ) {
											update_option( $woo_page_name, $woopage->ID );
										}
									}
									$shop_page_id = wc_get_page_id( 'shop' );
									if( ! empty( $shop_page_id ) ) {
										update_post_meta( $shop_page_id, '_hongo_page_enable_title_single', 'default' );
										update_post_meta( $shop_page_id, '_hongo_page_title_opacity_single', '0.0' );
										update_post_meta( $shop_page_id, '_hongo_page_title_color_single', '' );
									}
									hongo_import_log( 'MESSAGE - Import WooCommerce Pages Setting End.' );

									// We no longer need to install pages.
									delete_option( '_wc_needs_pages' );
								}

								// Registered menu locations in theme
								if( $full_import_option == 'navigation_menu' ) {

									$locations = get_theme_mod( 'nav_menu_locations' );

									// registered menus
									$menus = wp_get_nav_menus();
									hongo_import_log( __( 'MESSAGE - Import Menu Location Start.', 'hongo-addons' ) );
									// Assign menus to theme locations
									if ( $menus ) {
										foreach ( $menus as $menu ) {
											if ( $menu->name == 'Main Menu' ) {
												$locations['primary-menu'] = $menu->term_id;
											}
										}
									}

									// set menus to locations
									set_theme_mod( 'nav_menu_locations', $locations );
									hongo_import_log( __( 'MESSAGE - Import Menu Location End.', 'hongo-addons' ) );
								}
							}
							
							// Flush rules after install
							flush_rewrite_rules();
							
						} elseif( $full_import_option == 'customizer' ) {

							$from = rtrim( HONGO_ADDONS_DEMO_URI, '/' );
							$to   = rtrim( site_url(), '/' );

							// Import Theme Customize file.
							$theme_options_file = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/theme_settings.json';

							if ( file_exists( $theme_options_file ) ) {

								$remove_options = get_theme_mods();
								if ( ! empty( $remove_options ) && ! is_array( $remove_options ) ) {
									$remove_options = json_decode( $remove_options );
								}
								hongo_import_log( __( 'MESSAGE - Before Import Customize Clear All Customize Settings Start.', 'hongo-addons' ) );
								if ( ! empty( $remove_options ) ) {
									foreach ( $remove_options as $key => $value ) {
										remove_theme_mod( $key );
									}
								}
								hongo_import_log( __( 'MESSAGE - Before Import Customize Clear All Customize Settings End.', 'hongo-addons' ) );

								// Save new settings
								hongo_import_log( __( 'MESSAGE - Import Customize Setting Start.', 'hongo-addons' ) );
								$encode_options = file_get_contents( $theme_options_file );
								$options        = json_decode( $encode_options, true );


								if ( ! empty( $options ) ) {
									if ( is_multisite() ) {
										$upload_dir      = wp_upload_dir();
										$old_upload_base = $to . '/wp-content/uploads'; // phpcs:ignore
										$new_upload_base = $upload_dir['baseurl'];
									}

									foreach ( $options as $key => $value ) {
										// Replace old domain in all strings (optional helper)
										$value = hongo_replace_old_domain_recursive_customizer( $value, $from, $to );

										if ( is_multisite() && ( 'hongo_page_not_found_image' === $key || 'hongo_page_title_bg_image' === $key || 'hongo_product_archive_title_bg_image' === $key ) ) {
											$value = str_replace( $old_upload_base, $new_upload_base, $value );
										}
										
										set_theme_mod( $key, $value );
									}
								}

								hongo_import_log( __( 'MESSAGE - Import Customize Setting End.', 'hongo-addons' ) );

								// when customizer import, menu id can't change
								$locations = get_theme_mod( 'nav_menu_locations' );

								// registered menus
								$menus = wp_get_nav_menus();
								// assign menus to theme locations
								if ( $menus ) {
									foreach ( $menus as $menu ) {
										if ( $menu->name == 'Main Menu' ) {
											$locations['primary-menu'] = $menu->term_id;
										}
									}
								}
								// set menus to locations
								set_theme_mod( 'nav_menu_locations', $locations );

								// reading settings.
								$homepage_query = new WP_Query(
									array(
										'post_type'              => 'page',
										'title'                  => 'Home page ' . $demo_key,
										'post_status'            => 'publish',
										'posts_per_page'         => 1,
										'no_found_rows'          => true,
										'ignore_sticky_posts'    => true,
										'update_post_term_cache' => false,
										'update_post_meta_cache' => false,
										'orderby'                => 'post_date ID',
										'order'                  => 'ASC',
									)
								);

								if ( ! empty( $homepage_query->post ) ) {
									$homepage = $homepage_query->post;
								} else {
									$homepage = null;
								}

								if ( isset( $homepage ) && $homepage->ID ) {
									hongo_import_log( __( 'MESSAGE - Set Static Homepage Start.', 'hongo-addons' ) );
									update_option( 'show_on_front', 'page' );
									update_option( 'page_on_front', $homepage->ID ); // Front Page
									hongo_import_log( __( 'MESSAGE - Set Static Homepage End.', 'hongo-addons' ) );

								} else {
								   hongo_import_log( __( 'NOTICE - Static Homepage Couldn\'t Be Set.', 'hongo-addons' ) );
								}
							}

						} elseif( $full_import_option == 'widgets' ) {

							// Sidebar Widgets Json File
							$widgets_file = dirname( __FILE__ ) . '/sample-data/common-data/widget_data.json';

							if ( file_exists( $widgets_file ) ) {

								// Add data to widgets
								hongo_import_log( __( 'MESSAGE - Before Import Widget Clear All Widgetarea Start.', 'hongo-addons' ) );
								$sidebars = wp_get_sidebars_widgets();

								unset( $sidebars['wp_inactive_widgets'] );

								foreach ( $sidebars as $sidebar => $widgets ) {

									$sidebars[ $sidebar ] = array();
								}

								$sidebars['wp_inactive_widgets'] = array();
								wp_set_sidebars_widgets( $sidebars );
								hongo_import_log( __( 'MESSAGE - Before Import Widget Clear All Widgetarea End.', 'hongo-addons' ) );

								$widget_data = file_get_contents( $widgets_file );
								hongo_import_log( __( 'MESSAGE - Import Widget Setting Start.', 'hongo-addons' ) );
								$import_widgets = hongo_import_widget_sample_data( $widget_data );
							}

						} elseif( $full_import_option == 'rev_slider' ) { // Import Revolution sliders

							// Import Revslider
							if ( hongo_is_revolution_slider_activated() ) {

								$rev_directory = dirname( __FILE__ ) . '/sample-data/common-data/revsliders/';
								// if revslider is activated
								$rev_files = hongo_get_zip_import_files( $rev_directory, 'zip' );

								$slider = new RevSlider();
								hongo_import_log( __( 'MESSAGE - Import Revslider Start.', 'hongo-addons' ) );
								foreach ( $rev_files as $rev_file ) { 
									// Finally import rev slider data files.
									$filepath = $rev_file;
									ob_start();
										$slider->importSliderFromPost(true, false, $filepath);
									ob_clean();
									ob_end_clean();
								}
								hongo_import_log( __( 'MESSAGE - Import Revslider End.', 'hongo-addons' ) );

								$revslider_settings = get_option('revslider-global-settings');
								if ( is_string( $revslider_settings ) ) {
									$revslider_settings = json_decode( $revslider_settings, true ); // Decode JSON to array
									if ( is_array( $revslider_settings ) && isset( $revslider_settings['getTec'] ) && isset( $revslider_settings['getTec']['engine'] ) ) {
										$revslider_settings['getTec']['engine'] = 'SR6'; // Set SR6 as default

										// Save the updated array as JSON again
										update_option( 'revslider-global-settings', wp_json_encode( $revslider_settings ) );
									}
								}
							}
						}
					}

					// Import single ( Posts, Pages, Products, Section Builders )
					if ( $setup_key == 'import-single' && ! empty( $import_options ) && is_array( $import_options ) ) {

						// Import Sample Data XML.
						$importer = new WP_Import();
						
						// Fetch attachment
						$importer->fetch_attachments = true;

						// Do not import menu
						$importer->import_menu = false;

						ob_start();
						hongo_import_log( __( 'MESSAGE - Import Single Layout Item Start.', 'hongo-addons' ) );
						foreach ( $import_options as $import_option ) {

							foreach ( $import_option as $single_key => $single_key_ids ) {

								$single_key_ids = explode( ',', $single_key_ids );

								// Post Terms
								if( $single_key == 'posts' ) {

									$sample_post_terms_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/post_terms.xml';
									if ( file_exists( $sample_post_terms_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Post Terms.xml Import Start.' );
										$importer->import( $sample_post_terms_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Post Terms.xml Import End' );
									}
								}

								// Import Woocommerce data if WooCommerce plugin is activated and selected option from full import
								if ( $single_key == 'products' && hongo_is_woocommerce_activated() ) {

									//Before Import Sample Data Add Woocommerce Attribute
									$transient_name = 'wc_attribute_taxonomies';
									$old_attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies" );
									if( empty( $old_attribute_taxonomies ) ) {

										hongo_import_log( 'MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes Start.' );
										
										require_once( dirname( __FILE__ ) . '/hongo-addons-require-file.php' );
										$attribute_taxonomies_data = new Hongo_Set_attribute_taxonomies;
										$getresultdata = $attribute_taxonomies_data->add_woocommerce_attribute_taxonomies();

										hongo_import_log( 'MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes End.' );
									}

									// Product terms
									$sample_product_terms_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/product_terms.xml';
									if ( file_exists( $sample_product_terms_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Product Terms.xml Import Start.' );
										$importer->import( $sample_product_terms_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Product Terms.xml Import End' );
									}

									// For Variation Products
									$variation_sample_data_xml = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/'.$single_key.'-variation.xml';

									if( file_exists( $variation_sample_data_xml ) ) {

										ob_start();
										hongo_import_log( 'MESSAGE - Variation '.ucfirst( $single_key ).'.xml Import Start.' );
										$importer->import( $variation_sample_data_xml );
										ob_end_clean();
										hongo_import_log( 'MESSAGE - Variation '.ucfirst( $single_key ).'.xml Import End' );
									}
								}

								// pages and products
								if( $single_key == 'pages' || ( $single_key == 'products' && hongo_is_woocommerce_activated() ) ) {
									
									$sample_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/'.$single_key.'.xml';
									$sample_data_diff_xml = dirname( __FILE__ ) . '/sample-data/'.$demo_key.'/'.$single_key.'-diff.xml';
									$elements_features_sample_xml = dirname( __FILE__ ) . '/sample-data/common-data/elements_features.xml';

									// Common pages or products xml file
									if( file_exists( $sample_data_xml ) ) {

										$importer->import( $sample_data_xml, $single_key_ids );
									}
									if( file_exists( $sample_data_diff_xml ) ) {

										$importer->import( $sample_data_diff_xml, $single_key_ids );
									}
									if( $single_key == 'pages' && file_exists( $elements_features_sample_xml ) ) {

										$importer->import( $elements_features_sample_xml, $single_key_ids );
									}
								
								} else {

									$sample_data_xml = dirname( __FILE__ ) . '/sample-data/common-data/'.$single_key.'.xml';
									if( file_exists( $sample_data_xml ) ) {

										$importer->import( $sample_data_xml, $single_key_ids );
									}
								}

								// Variation Product stock status change
								if( $single_key == 'products' && hongo_is_woocommerce_activated() ) {

									global $wpdb;

									$variation_product_ids = $wpdb->get_col( "SELECT DISTINCT p.post_parent FROM {$wpdb->prefix}posts p INNER JOIN {$wpdb->prefix}postmeta as pm ON p.ID = pm.post_id WHERE p.post_parent > 0 AND p.post_type LIKE 'product_variation' AND pm.meta_key = '_hongo_demo_import_data' AND pm.meta_value = '1'" );

									if( ! empty( $variation_product_ids ) ) {

										foreach( $variation_product_ids as $variation_product_id ) {

											update_post_meta( $variation_product_id, '_stock_status', 'instock' );
										}
									}

								}
							}
						}

						// For attachment
						$media_xml = dirname( __FILE__ ) . '/sample-data/common-data/media.xml';
						if( file_exists( $media_xml ) ) {
							$importer->import( $media_xml );
						}
						
						hongo_import_log( __( 'MESSAGE - Import Single Layout Item End.', 'hongo-addons' ) );
						ob_end_clean();
					}

					if ( get_option( 'woocommerce_coming_soon' ) === 'yes' ) {
						update_option( 'woocommerce_coming_soon', 'no' );
					} else {
						add_option( 'woocommerce_coming_soon', 'no', '', 'no' );
					}
				}
			}
		}
		die();
	}
}

// For More Info Check Widget Import Plugin ( http://wordpress.org/plugins/widget-settings-importexport/ )
if ( ! function_exists( 'hongo_import_widget_sample_data' ) ) {
	function hongo_import_widget_sample_data( $widget_data ) {

		$json_data = json_decode( $widget_data, true );

		$sidebar_data = $json_data[0];
		$widget_data = $json_data[1];

		if( ! empty( $widget_data ) ) {

			foreach ( $widget_data as $widget_title => $widget_value ) {
				foreach ( $widget_value as $widget_key => $widget_value ) {

					$widgets[ $widget_title ][ $widget_key ] = $widget_data[ $widget_title ][ $widget_key ];
				}
			}
		}
		
		$sidebar_data = array( array_filter( $sidebar_data ), $widgets );
		hongo_parse_import_widget_sample_data( $sidebar_data );
	}
}

if ( ! function_exists( 'hongo_parse_import_widget_sample_data' ) ) {
	function hongo_parse_import_widget_sample_data( $import_array ) {

		global $wp_registered_sidebars;

		$sidebars_data      = $import_array[0];
		$widget_data        = $import_array[1];
		$current_sidebars   = get_option( 'sidebars_widgets' );
		$new_widgets        = array();

		if( ! empty( $sidebars_data ) ) {

			foreach ( $sidebars_data as $import_sidebar => $import_widgets ) {

				foreach ( $import_widgets as $import_widget ) {

					//if the sidebar exists
					if ( isset( $wp_registered_sidebars[ $import_sidebar ] ) ) {

						$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
						$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
						$current_widget_data = get_option( 'widget_' . $title );
						$new_widget_name = hongo_get_new_widget_name( $title, $index );
						$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

						if ( ! empty( $new_widgets[ $title ] ) && is_array( $new_widgets[ $title ] ) ) {

							while ( array_key_exists( $new_index, $new_widgets[ $title ] ) ) {

								$new_index++;
							}
						}
						$current_sidebars[ $import_sidebar ][] = $title . '-' . $new_index;
						if ( array_key_exists( $title, $new_widgets ) ) {

							$new_widgets[ $title ][ $new_index ] = $widget_data[ $title ][ $index ];
							$multiwidget = $new_widgets[ $title ]['_multiwidget'];
							unset( $new_widgets[ $title ]['_multiwidget'] );
							$new_widgets[ $title ]['_multiwidget'] = $multiwidget;

						} else {

							$current_widget_data[ $new_index ] = $widget_data[ $title ][ $index ];
							$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
							$new_multiwidget = isset($widget_data[ $title ]['_multiwidget']) ? $widget_data[ $title ]['_multiwidget'] : false;
							$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
							unset( $current_widget_data['_multiwidget'] );
							$current_widget_data['_multiwidget'] = $multiwidget;
							$new_widgets[ $title ] = $current_widget_data;
						}

					}
				}
			}
		}

		if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			update_option( 'sidebars_widgets', $current_sidebars );

			foreach ( $new_widgets as $title => $content ){
				update_option( 'widget_' . $title, $content );
			}
			hongo_import_log( __( 'MESSAGE - Import Widget Setting End.', 'hongo-addons' ) );
			return true;
		}
		hongo_import_log( __( 'NOTICE - Import Widget Setting Not Completed.', 'hongo-addons' ) );
		return false;
	}
}

if ( ! function_exists( 'hongo_get_new_widget_name' ) ) {
	function hongo_get_new_widget_name( $widget_name, $widget_index ) {

		$current_sidebars = get_option( 'sidebars_widgets' );
		$all_widget_array = array( );
		foreach ( $current_sidebars as $sidebar => $widgets ) {

			if ( ! empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
				foreach ( $widgets as $widget ) {

					$all_widget_array[] = $widget;
				}
			}
		}
		while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {

			$widget_index++;
		}
		$new_widget_name = $widget_name . '-' . $widget_index;
		return $new_widget_name;
	}
}

if ( ! function_exists( 'hongo_get_zip_import_files' ) ) {
	function hongo_get_zip_import_files( $directory, $filetype ) {

		$phpversion = phpversion();
		$files = array();

		// Check if the php version allows for recursive iterators
		if ( version_compare( $phpversion, '5.2.11', '>' ) ) {

			if ( $filetype != '*' )  {
				$filetype = '/^.*\.' . $filetype . '$/';
			} else {
				$filetype = '/.+\.[^.]+$/';
			}
			$directory_iterator = new RecursiveDirectoryIterator( $directory );
			$recusive_iterator = new RecursiveIteratorIterator( $directory_iterator );
			$regex_iterator = new RegexIterator( $recusive_iterator, $filetype );

			foreach ( $regex_iterator as $file ) {

				$files[] = $file->getPathname();
			}
		// Fallback to glob() for older php versions
		} else {

			if ( $filetype != '*' )  {
				$filetype = '*.' . $filetype;
			}

			foreach ( glob( $directory . $filetype ) as $filename ) {

				$filename = basename( $filename );
				$files[] = $directory . $filename;
			}
		}
		return $files;
	}
}

// Function To Add Hongo Import Log.
if ( ! function_exists( 'hongo_import_log' ) ) {
	function hongo_import_log( $message, $append = true ) {

		$upload_dir = wp_upload_dir();
		if ( isset( $upload_dir['baseurl'] ) ) {
			
			$data = '';
			if ( ! empty( $message ) ) {

				$data = "<p>".date("Y-m-d H:i:s").' - '.$message."</p>";
			}
			
			if ( $append === true ) {
				
				file_put_contents( $upload_dir['basedir'].'/importer.log', $data, FILE_APPEND );
				file_put_contents( $upload_dir['basedir'].'/importer-full.log', $data, FILE_APPEND );

			} else {

				file_put_contents( $upload_dir['basedir'].'/importer.log', $data );
			}
		}
	}
}

// Function To Get hongo Import Log.
if ( ! function_exists( 'get_hongo_import_log' ) ) {
	function get_hongo_import_log() { 

		$upload_dir = wp_upload_dir();           
		if ( isset( $upload_dir['baseurl'] ) ) {
			
			if ( file_exists($upload_dir['basedir'].'/importer.log' ) ) {

				return file_get_contents( $upload_dir['basedir'].'/importer.log' );
			}
		}
		return '';
	}
}    

// Ajax Function To Check Refresh Import Logs.
if ( ! function_exists( 'hongo_refresh_import_log' ) ) {    
	function hongo_refresh_import_log() {
	  
		$check_hongo_log = get_hongo_import_log();
		//don't add message if ERROR was found, JS script is going to stop refreshing
		if ( strpos( $check_hongo_log, 'ERROR' ) === false ) { 
			
			hongo_import_log( __( 'MESSAGE - Import in progress...', 'hongo-addons' ) );
		}
		$printlog = get_hongo_import_log();
		echo $printlog;
		die();
	}
}

// Check theme license activate
if ( ! function_exists( 'hongo_is_theme_license_active' ) ) {
	function hongo_is_theme_license_active() {		
		// For Multisite
		if( is_multisite() ) {
			$hongo_is_theme_license_active = get_site_option( 'hongo_theme_active' );
		} else {
			$hongo_is_theme_license_active = get_option( 'hongo_theme_active' );
		}

		if ( $hongo_is_theme_license_active == 'yes' ) {
			return true;
		} else {
			return false;
		}
	}
}

// Delete demo data and demo media
add_action( 'wp_ajax_hongo_delete_sample_data', 'hongo_delete_sample_data' );
if ( ! function_exists( 'hongo_delete_sample_data' ) ) {
	function hongo_delete_sample_data() {
		// Delete Import demo data
		if ( ! empty( $_POST['delete_key'] ) ) {

			global $wpdb;

			$delete_key = $_POST['delete_key'];

			if ( $delete_key == 'media' ) { // Delete import media ( attachment )

				$query = "SELECT p.ID FROM $wpdb->posts p INNER JOIN $wpdb->postmeta pm WHERE p.ID = pm.post_id AND pm.meta_key = '_hongo_demo_import_data' AND pm.meta_value = 1 AND p.post_type = 'attachment'";
				$attachment_ids = $wpdb->get_col( $query );

				if( ! empty( $attachment_ids ) ) {
					foreach ( $attachment_ids as $attachment_id ) {

						wp_delete_post( $attachment_id );
					}
				}

			} elseif ( $delete_key == 'data' ) { // Delete imported media, posts, pages, products, categories, terms, etc...

				// For Term data
				$term_data = $wpdb->get_results( "SELECT * FROM `".$wpdb->termmeta."` WHERE meta_key='".$wpdb->escape( '_hongo_demo_import_data' )."' AND meta_value='1'" );                            
				if ( ! empty( $term_data ) ) {
					foreach ( $term_data as $key => $value ) {

						if( ! empty( $value ) && ! empty( $value->term_id ) ) {

							wp_delete_term( $value->term_id, 'category' );
							wp_delete_term( $value->term_id, 'post_tag' );
							if( hongo_is_woocommerce_activated() ) {

								wp_delete_term( $value->term_id, 'product_cat' );
								wp_delete_term( $value->term_id, 'product_tag' );
								wp_delete_term( $value->term_id, 'product_brand' );
								wp_delete_term( $value->term_id, 'pa_color' );
								wp_delete_term( $value->term_id, 'pa_size' );
							}
						}
					}
				}

				// For Post data
				$post_data = $wpdb->get_results( "SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='".$wpdb->escape( '_hongo_demo_import_data' )."' AND meta_value='1'" );
				if ( ! empty( $post_data ) ) {
					foreach ( $post_data as $key => $value ) {
						if( ! empty( $value ) && ! empty( $value->post_id ) ) {
							wp_delete_post( $value->post_id );
						}
					}
				}
			}
			die();
		}
	}
}

/**
 * Recursively replaces old domain with new domain in strings or arrays.
 *
 * @param string $data data content.
 *
 * @param string $old_domain Old URL.
 *
 * @param string $new_domain New URL.
 */
function hongo_replace_old_domain_recursive_customizer( $data, $old_domain, $new_domain ) {
	if ( is_array( $data ) ) {
		foreach ( $data as $k => $v ) {
			$data[ $k ] = hongo_replace_old_domain_recursive_customizer( $v, $old_domain, $new_domain );
		}
	} elseif ( is_string( $data ) ) {
		$data = str_replace( $old_domain, $new_domain, $data );
	}
	return $data;
}

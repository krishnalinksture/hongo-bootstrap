<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( class_exists( 'Vc_Templates_Panel_Editor' ) ) {

	class Hongo_Templates_Panel_Editor extends Vc_Templates_Panel_Editor {

		protected $hongo_templates = false;
		protected $hongo_builder_templates = false;
		protected $initialized = false;

		public function __construct() {

			add_filter( 'vc_get_all_templates', array( $this, 'add_vc_template_library' ), 1, 1 );

			add_filter( 'vc_templates_render_category', array( $this, 'renderTemplateBlock' ) );

			add_filter( 'vc_templates_render_template', array( $this, 'renderTemplateWindow' ), 10, 2 );					

			add_filter( 'vc_templates_render_backend_template', array( $this, 'renderBackendTemplate' ) );
			
			add_filter( 'vc_templates_render_frontend_template', array( $this, 'renderFrontendTemplate' ) );
		}

		// Add hongo template category 
		public function add_vc_template_library( $data ) {

			if( get_post_type() != 'hongobuilder' ) {

			    // this has only 'name' and 'template' key  and index 'key' is template id.
			    $arr_category = array(
			        'category' => 'hongo_templates',
			        'category_name' => __( 'Hongo Templates', 'hongo-addons' ),
			        'category_description' => __( 'Hongo pre-defined section to the current layout.', 'hongo-addons' ),
			        'category_weight' => 5,
			        'templates' => array(),
			    );
			    $data[] = $arr_category;

			} else {

			    // this has only 'name' and 'template' key  and index 'key' is template id.
			    $arr_category = array(
			        'category' => 'hongo_builder_templates',
			        'category_name' => __( 'Hongo Templates', 'hongo-addons' ),
			        'category_description' => __( 'Hongo pre-defined section to the current layout.', 'hongo-addons' ),
			        'category_weight' => 5,
			        'templates' => array(),
			    );
			    $data[] = $arr_category;
			}
	        return $data;
	    }

		public function renderTemplateBlock( $category ) {

	        if( $category['category'] === 'hongo_templates' || $category['category'] === 'hongo_builder_templates' ) {
	            $category['output'] = '';
	        	
				if( get_post_type() != 'hongobuilder' ) {

					$user_templates = $this->getHongoTemplates();

				} else {

					$user_templates = $this->getHongoBuilderTemplates();
				}

	            $category_templates = $filters = $unique_class = array();
	            if ( ! empty( $user_templates ) ) {
	                foreach ( $user_templates as $template_id => $template_data ) {
	                    $category_templates[] = array(
	                        'unique_id' => $template_id,
	                        'name' => $template_data['name'],
	                        'type' => ( get_post_type() != 'hongobuilder' ) ? 'hongo_templates' : 'hongo_builder_templates',
	                        'image' => isset( $template_data['image_path'] ) ? $template_data['image_path'] : false,
	                        'custom_class' => isset( $template_data['custom_class'] ) ? $template_data['custom_class'] : false,
	                        'content' => isset( $template_data['content'] ) ? $template_data['content'] : '',
	                        'disabled' => false,
	                        'filter' => $filters = array(
	                        	'class' => isset( $template_data['class'] ) ? $template_data['class'] : false,
	                        	'label' => isset( $template_data['label'] ) ? $template_data['label'] : false,
	                        ),
	                    );
	                }
	            }
	            $category['templates'] = $category_templates;
	            
	            $category['output'] .= '<div class="vc_column vc_col-sm-12">';
	                $category['output'] .= '<div class="hongo-templates-list vc_ui-template-list vc_templates-list-hongo_templates vc_ui-list-bar" data-vc-action="collapseAll">';

	                	// Filteration Menu
	                	if ( ! empty( $category['templates'] ) ) {
		                    $category['output'] .= '<div class="hongo-templates-tags">';
		                        $category['output'] .= '<ul id="template-id-1" class="filter-template" data-infinite="true">';
		                            $category['output'] .= '<li class="filter-tab active"><a href="#" data-id="template-id-1" data-filter="*">'. esc_html__( 'All', 'hongo-addons' ).'</a></li>';
		                            foreach( $category['templates'] as $template ) {
		                            	$filter_details = explode( ',', $template['filter']['class'] );
		                            	if( !in_array( $template['filter']['class'] , $unique_class) ) {
		                            			$unique_class[] = $template['filter']['class'];
		                            			$category['output'] .= '<li class="filter-tab"><a href="#" data-id="template-id-1" data-filter="'.$template['filter']['class'].'">'.$template['filter']['label'].'</a></li>';
		                            	}
		                            }
		                        $category['output'] .= '</ul>';
		                    $category['output'] .= '</div>';
		                }

	                    // Filteration Data
	                    $category['output'] .= '<div class="hongo-templates-wrap template-id-1" data-uniqueid="template-id-1">';

	                        if ( ! empty( $category['templates'] ) ) {
	                            foreach ( $category['templates'] as $template ) {
	                                $category['output'] .= $this->renderTemplateListItem( $template );
	                            }
	                        }

	                    $category['output'] .= '</div>';
	                $category['output'] .= '</div>';
	            $category['output'] .= '</div>';
	        }
	        return $category;
	    }	

		/** 
		 * Output rendered template in new panel dialog
		 * @return string
		 */
		public function renderTemplateWindow( $template_name, $template_data ) {

			if ( 'hongo_templates' === $template_data['type'] || 'hongo_builder_templates' === $template_data['type'] ) {

				return $this->renderTemplateWindowHongoTemplates( $template_name, $template_data );
			}
			return $template_name;
		}	

		/**
		 * @return string
		 */
		public function renderTemplateWindowHongoTemplates( $template_name, $template_data ) {

			ob_start();		
				$template_id = isset( $template_data['unique_id'] ) ? esc_attr( $template_data['unique_id'] ) : '';
				$template_id_hash = md5( $template_id ); // needed for jquery target for TTA
				$template_name = esc_html( $template_name );
				$template_url = isset( $template_data['image'] ) ? esc_url( $template_data['image'] ) : '';
				$preview_template_title = esc_attr__( 'Preview template', 'hongo-addons' );
				$add_template_title = esc_attr__( 'Add template', 'hongo-addons' );

				echo <<<HTML
				<div class="vc_ui-list-bar-item-trigger hongo-template-title" title="$add_template_title"
					data-template-handler=""
					data-vc-ui-element="template-title">
					
					<div class="hongo-admin-template-preview-image">
						<img src="$template_url">
						<span class="template-add-icon"><i class="fa-solid fa-plus"></i></span>
					</div>
					<div class="template-title">$template_name</div>
				</div>
				<div class="vc_ui-list-bar-item-actions">
					<button type="button" class="vc_general vc_ui-control-button" title="$add_template_title"
							data-template-handler="">
						<i class="vc-composer-icon vc-c-icon-add"></i>
					</button>
					<button type="button" class="vc_general vc_ui-control-button" title="$preview_template_title"
						data-vc-container=".vc_ui-list-bar" data-vc-preview-handler data-vc-target="[data-template_id_hash=$template_id_hash]">
						<i class="vc-composer-icon vc-c-icon-arrow_drop_down"></i>
					</button>
				</div>
HTML;
			return ob_get_clean();
		}

		public function renderFrontendTemplate() {

			vc_user_access()->checkAdminNonce()->validateDie()->wpAny( 'edit_posts', 'edit_pages' )->validateDie()->part( 'templates' )->can()->validateDie();

			add_filter( 'vc_frontend_template_the_content', array(
				$this,
				'frontendDoTemplatesShortcodes',
			) );
			$template_id = vc_post_param( 'template_unique_id' );
			$template_type = vc_post_param( 'template_type' );
			add_action( 'wp_print_scripts', array(
				$this,
				'addFrontendTemplatesShortcodesCustomCss',
			) );

			if ( '' === $template_id ) {
				die( 'Error: Vc_Templates_Panel_Editor::renderFrontendTemplate:1' );
			}
			WPBMap::addAllMappedShortcodes();		
			if ( 'hongo_templates' === $template_type || 'hongo_builder_templates' === $template_type ) {
				$this->renderFrontendHongoTemplate();
			}
			die(); // no needs to do anything more. optimization.
		}

		/**
		 * Load frontend hongo template content
		 */
		public function renderFrontendHongoTemplate() {

			$template_index = (int) vc_post_param( 'template_unique_id' );
			$data = $this->getHongoTemplate( $template_index );
			if ( ! $data ) {
				die( 'Error: Vc_Templates_Panel_Editor::renderFrontendHongoTemplate:1' );
			}
			vc_frontend_editor()->setTemplateContent( trim( $data['content'] ) );
			vc_frontend_editor()->enqueueRequired();
			vc_include_template( 'editors/frontend_template.tpl.php', array(
				'editor' => vc_frontend_editor(),
			) );
			die();
		}

		/**
		 * Loading Any templates Shortcodes for backend by string $template_id from AJAX
		 */
		public function renderBackendTemplate() {

			vc_user_access()->checkAdminNonce()->validateDie()->wpAny( 'edit_posts', 'edit_pages' )->validateDie()->part( 'templates' )->can()->validateDie();

			$template_id = vc_post_param( 'template_unique_id' );
			$template_type = vc_post_param( 'template_type' );

			if ( ! isset( $template_id, $template_type ) || '' === $template_id || '' === $template_type ) {
				die( 'Error: Vc_Templates_Panel_Editor::renderBackendTemplate:1' );
			}
			WPBMap::addAllMappedShortcodes();
			if ( 'hongo_templates' === $template_type ) {
				$this->getBackendHongoTemplate();
				die();
			} elseif ( 'hongo_builder_templates' === $template_type ) {
				$this->getBackendHongoBuilderTemplate();
				die();
			}
		}

		/**
		 * Load hongo templates list and initialize variable
		 */
		public function loadHongoTemplates() {

			if ( ! $this->initialized ) {
				$this->init(); // add hooks if not added already (fix for in frontend)
			}

			if ( ! is_array( $this->hongo_templates ) ) {
				
				$templates = apply_filters( 'vc_load_hongo_templates', $this->hongo_templates );
				
				$this->hongo_templates = $templates;
				do_action( 'vc_load_hongo_templates_action' );
			}
			return $this->hongo_templates;
		}

		/**
		 * Load hongo templates list and initialize variable
		 */
		public function loadHongoBuilderTemplates() {

			if ( ! $this->initialized ) {
				$this->init(); // add hooks if not added already (fix for in frontend)
			}

			if ( ! is_array( $this->hongo_builder_templates ) ) {
				
				$templates = apply_filters( 'vc_load_hongo_builder_templates', $this->hongo_builder_templates );
				
				$this->hongo_builder_templates = $templates;
				do_action( 'vc_load_hongo_builder_templates_action' );
			}
			return $this->hongo_builder_templates;
		}

		/**
		 * Alias for loadHongoTemplates
		 * @return array - list of hongo templates
		 */
		public function getHongoTemplates() {

			return $this->loadHongoTemplates();
		}

		/**
		 * Alias for loadHongoTemplates
		 * @return array - list of hongo templates
		 */
		public function getHongoBuilderTemplates() {

			return $this->loadHongoBuilderTemplates();
		}

		/**
		 * Get hongo template data by template index in array.
   		 *
		 * @param number $template_index
		 *
		 * @return array|bool
		 */
		public function getHongoTemplate( $template_index ) {

			$this->loadHongoTemplates();
			if ( ! is_numeric( $template_index ) || ! is_array( $this->hongo_templates ) || ! isset( $this->hongo_templates[ $template_index ] ) ) {
				return false;
			}

			return $this->hongo_templates[ $template_index ];
		}

		/**
		 * Get hongo template data by template index in array.
   		 *
		 * @param number $template_index
		 *
		 * @return array|bool
		 */
		public function getHongoBuilderTemplate( $template_index ) {

			$this->loadHongoBuilderTemplates();
			if ( ! is_numeric( $template_index ) || ! is_array( $this->hongo_builder_templates ) || ! isset( $this->hongo_builder_templates[ $template_index ] ) ) {
				return false;
			}

			return $this->hongo_builder_templates[ $template_index ];
		}

		/**
		 * Load default template content by index from ajax
		 *
		 * @param bool $return | should function return data or not
		 *
		 * @return string
		 */
		public function getBackendHongoTemplate( $return = false ) {

			$template_index = (int) vc_request_param( 'template_unique_id' );
			$data = $this->getHongoTemplate( $template_index );
			if ( ! $data ) {
				die( 'Error: Vc_Templates_Panel_Editor::getBackendHongoTemplate:1' );
			}
			if ( $return ) {
				return trim( $data['content'] );
			} else {
				echo trim( $data['content'] );
				die();
			}
		}

		/**
		 * Load default template content by index from ajax
		 *
		 * @param bool $return | should function return data or not
		 *
		 * @return string
		 */
		public function getBackendHongoBuilderTemplate( $return = false ) {

			$template_index = (int) vc_request_param( 'template_unique_id' );
			$data = $this->getHongoBuilderTemplate( $template_index );
			if ( ! $data ) {
				die( 'Error: Vc_Templates_Panel_Editor::getBackendHongoBuilderTemplate:1' );
			}
			if ( $return ) {
				return trim( $data['content'] );
			} else {
				echo trim( $data['content'] );
				die();
			}
		}

		public function renderTemplateListItem( $template ) {

			$name = isset( $template['name'] ) ? esc_html( $template['name'] ) : esc_html( __( 'No title', 'hongo-addons' ) );
			$template_id = esc_attr( $template['unique_id'] );
			$template_id_hash = md5( $template_id ); // needed for jquery target for TTA
			$template_name = esc_html( $name );
			$template_name_lower = esc_attr( vc_slugify( $template_name ) );
			$template_type = esc_attr( isset( $template['type'] ) ? $template['type'] : 'custom' );
			$custom_class = esc_attr( isset( $template['custom_class'] ) ? $template['custom_class'] : '' );		
			$filter_class = esc_attr( isset( $template['filter']['class'] ) ? $template['filter']['class'] : '' );
			$filter_label = esc_attr( isset( $template['filter']['label'] ) ? $template['filter']['label'] : '' );

			$output = <<<HTML
						<div class="vc_ui-template hongo-filter-tab-content vc_templates-template-type-$template_type $custom_class $filter_class"
							data-template_id="$template_id"
							data-template_id_hash="$template_id_hash"
							data-category="$template_type"
							data-template_unique_id="$template_id"
							data-template_name="$template_name_lower"
							data-template_type="$template_type"
							date-filter_category="$filter_class"
							data-vc-content=".vc_ui-template-content">
							<div class="template-item">
HTML;
			$output .= apply_filters( 'vc_templates_render_template', $name, $template );
			$output .= <<<HTML
							</div>
							<div class="vc_ui-template-content" data-js-content>
							</div>
						</div>
HTML;

			return $output;
		}
	}
	new Hongo_Templates_Panel_Editor();
}
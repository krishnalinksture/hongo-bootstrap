<?php
/**
 * Metabox Map
 *
 * @package Hongo
 */
?>
<?php
	if ( ! function_exists( 'hongo_meta_box_text' ) ) {
		function hongo_meta_box_text( $hongo_id, $hongo_label, $hongo_desc = '', $hongo_short_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';

			$dependency_attr = '';
			$dependency_arr = array();

			if ( ! empty( $hongo_parent_dependency ) ) {
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';

				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $hongo_label;
				if($hongo_desc) {
					$html .= '<span class="description">' . $hongo_desc . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<input type="text" id="' . esc_attr($hongo_id) . '" name="' . esc_attr($hongo_id) . '" value="' . get_post_meta($post->ID, $meta_prefix.$hongo_id, true) . '" />';
				if($hongo_short_desc) {
					$html .= '<span class="short-description">' . $hongo_short_desc . '</span>';
				}
			$html .= '</div>';
			$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_dropdown' ) ) {
		function hongo_meta_box_dropdown( $hongo_id, $hongo_label, $hongo_options, $hongo_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;

			$hongo_current_post_type = get_post_type();
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$html = $hongo_select_class = $dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';

				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}


			$hongo_key = substr_replace( $hongo_id, "", -7 );

			$key_val = ( isset( $hongo_theme_options[$hongo_key] ) && $hongo_theme_options[$hongo_key] !== '' ) ? $hongo_theme_options[$hongo_key] : '';
			$default_key_val = ( isset( $hongo_theme_default_value_arr[$hongo_key] ) && $hongo_theme_default_value_arr[$hongo_key] !== '' ) ? $hongo_theme_default_value_arr[$hongo_key] : '';

			if( $key_val !== '' ) {
				
				// if user have selected individual post type setting as global start code
				if( ! empty( $hongo_current_post_type ) ) {

					$hongo_separate_customizer_key = $hongo_id . '_' . $hongo_current_post_type;
					if( isset( $hongo_theme_options[$hongo_separate_customizer_key] ) && $hongo_theme_options[$hongo_separate_customizer_key] !== '' ) {
						
						$key_val = isset( $hongo_theme_options[$hongo_separate_customizer_key] ) ? $hongo_theme_options[$hongo_separate_customizer_key] : '';
					}
				}
				// if user have selected individual post type setting as global end code

				$key_val = ( isset( $hongo_options[$key_val] ) && $hongo_options[$key_val] !== '' ) ? ' ( '. $hongo_options[$key_val] .' ) ' : '';
				$pre_option_val = __( 'Default', 'hongo-addons' ).$key_val;			
				$pre_option_arr = array('default' => $pre_option_val );
				unset($hongo_options['default']);
				$hongo_options = $pre_option_arr + $hongo_options;

			} elseif( $default_key_val !== '' ) {

				$default_key_val = ( isset( $hongo_options[$default_key_val] ) && $hongo_options[$default_key_val] !== '' ) ? ' ( '. $hongo_options[$default_key_val] .' ) ' : '';
				$pre_option_val = __( 'Default', 'hongo-addons' ).$default_key_val;			
				$pre_option_arr = array('default' => $pre_option_val );
				unset($hongo_options['default']);
				$hongo_options = $pre_option_arr + $hongo_options;
			}

			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
						$html .= $hongo_label;
						if($hongo_desc) {
								$html .= '<span class="description">' . esc_html( $hongo_desc ) . '</span>';
						}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<select id="' . esc_attr( $hongo_id ) . '" class="'.esc_attr( $hongo_select_class ).'" name="' . esc_attr($hongo_id) . '">';
					foreach($hongo_options as $key => $option) {
							if(get_post_meta($post->ID, $meta_prefix.$hongo_id, true) == (string)$key && get_post_meta($post->ID, $meta_prefix.$hongo_id, true) != '') {
								$hongo_selected = 'selected="selected"';
							} elseif( 'default' === (string)$key && get_post_meta( $post->ID, $meta_prefix.$hongo_id, true ) == '' ){
								$hongo_selected = 'selected="selected"';
							} else {
								$hongo_selected = '';
							}

							$html .= '<option ' . $hongo_selected . ' value="' . esc_attr($key) . '">' . esc_html($option) . '</option>';

					}
					$html .= '</select>';
				$html .='</div>';	
			$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_dropdown_sidebar' ) ) {
		function hongo_meta_box_dropdown_sidebar( $hongo_id, $hongo_label, $hongo_options, $hongo_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$html = $hongo_select_class = $dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ) {
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ) {
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$hongo_key = substr_replace( $hongo_id, "", -7 );
			$key_val = ( isset( $hongo_theme_options[$hongo_key] ) && $hongo_theme_options[$hongo_key] !== '' ) ? $hongo_theme_options[$hongo_key] : '';
			$default_key_val = ( isset( $hongo_theme_default_value_arr[$hongo_key] ) && $hongo_theme_default_value_arr[$hongo_key] !== '' ) ? $hongo_theme_default_value_arr[$hongo_key] : '';
			
			if( $key_val !== '' ){
				
				$key_val = ( isset( $hongo_options[$key_val] ) && $hongo_options[$key_val] !== '' ) ? ' ( '. $hongo_options[$key_val] .' ) ' : '';
				$pre_option_val = __( 'Default', 'hongo-addons' ).$key_val;			
				$pre_option_arr = array('default' => $pre_option_val );
				unset($hongo_options['default']);
				$hongo_options = $pre_option_arr + $hongo_options;

			} elseif( $default_key_val !== '' ){
				
				$default_key_val = ( isset( $hongo_options[$default_key_val] ) && $hongo_options[$default_key_val] !== '' ) ? ' ( '. $hongo_options[$default_key_val] .' ) ' : '';
				$pre_option_val = __( 'Default', 'hongo-addons' ).$default_key_val;			
				$pre_option_arr = array('default' => $pre_option_val );
				unset($hongo_options['default']);
				$hongo_options = $pre_option_arr + $hongo_options;
			}

			$flag = false;
				$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
					$html .= '<div class="left-part">';
						$html .= $hongo_label;
						if($hongo_desc) {
							$html .= '<span class="description">' . esc_attr($hongo_desc) . '</span>';
						}
					$html .='</div>';
					$html .= '<div class="right-part">';
						$html .= '<select id="' . esc_attr($hongo_id) . '" class="'.esc_attr($hongo_select_class).'" name="' . esc_attr($hongo_id) . '">';
						foreach($hongo_options as $key => $option) {
							if(get_post_meta($post->ID, $meta_prefix.$hongo_id, true) == $key && get_post_meta($post->ID, $meta_prefix.$hongo_id, true) != '') {
								$hongo_selected = 'selected="selected"';
							} elseif( 'default' === (string)$key && get_post_meta( $post->ID, $meta_prefix.$hongo_id, true ) == '' ){
								$hongo_selected = 'selected="selected"';
							}else {
									$hongo_selected = '';
							}

							$html .= '<option ' . $hongo_selected . ' value="' . esc_attr($key) . '">' . esc_html($option) . '</option>';

						}
						$html .= '</select>';
					$html .='</div>';
				$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	/* menu dropdown */
	if ( ! function_exists( 'hongo_meta_box_dropdown_menu' ) ) {
		function hongo_meta_box_dropdown_menu( $hongo_id, $hongo_label, $hongo_options, $hongo_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$html = $hongo_select_class = $dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$hongo_menus = wp_get_nav_menus();
			$hongo_key = substr_replace( $hongo_id, "", -7 );
			$key_val = ( isset( $hongo_theme_options[$hongo_key] ) && $hongo_theme_options[$hongo_key] !== '' ) ? $hongo_theme_options[$hongo_key] : '';
			$default_key_val = ( isset( $hongo_theme_default_value_arr[$hongo_key] ) && $hongo_theme_default_value_arr[$hongo_key] !== '' ) ? $hongo_theme_default_value_arr[$hongo_key] : '';
		
			if( $key_val !== '' ){
				if( $hongo_menus ){
					foreach ( $hongo_menus as $key => $value ) {
						if( $key_val == $value->slug ){
							$pre_option_val = __( 'Default', 'hongo-addons' ).' ( '. $value->name .' ) ';
						}
					}
				}
			} elseif( $default_key_val !== '' ){
				if( $hongo_menus ){
					foreach ( $hongo_menus as $key => $value ) {
						if( $default_key_val == $value->slug ){
							$pre_option_val = __( 'Default', 'hongo-addons' ).' ( '. $value->name .' ) ';
						}
					}
				}
			}else{
				$pre_option_val = __( 'Default', 'hongo-addons' );
			}

			if( get_post_meta( $post->ID, $meta_prefix.$hongo_id, true ) == '' ){
				$hongo_default_selected = ' selected="selected"';
			}

			$flag = false;

			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $hongo_label;
					if($hongo_desc) {
						$html .= '<span class="description">' . esc_attr($hongo_desc) . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<select id="' . esc_attr($hongo_id) . '" class="'.esc_attr($hongo_select_class).'" name="' . esc_attr($hongo_id) . '">';
					$html .= '<option value="default"'.$hongo_default_selected.'>'.$pre_option_val.'</option>';
					$hongo_menus = wp_get_nav_menus();
					$hongo_menu_array = array();
					foreach ($hongo_menus as $key => $value) {
						if( get_post_meta($post->ID, $meta_prefix.$hongo_id, true) == $value->slug && get_post_meta($post->ID, $meta_prefix.$hongo_id, true) != '') {
							$hongo_selected = 'selected="selected"';
						}else {
							$hongo_selected = '';
						}

						$html .= '<option ' . $hongo_selected . ' value="' . esc_attr($value->slug) . '">' . esc_html($value->name) . '</option>';
					}
					$html .= '</select>';
				$html .='</div>';
			$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_textarea' ) ) {
		function hongo_meta_box_textarea( $hongo_id, $hongo_label, $hongo_desc = '', $hongo_default = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $hongo_label;
				if($hongo_desc) {
					$html .= '<span class="description">' . esc_attr($hongo_desc) . '</span>';
				}
			$html .='</div>';
			
			if( get_post_meta($post->ID, $meta_prefix.$hongo_id, true)) {
				$hongo_value = get_post_meta($post->ID, $meta_prefix.$hongo_id, true);
			} else {
				$hongo_value = '';
			}
			$html .= '<div class="right-part">';
				$html .= '<textarea cols="120" id="' . esc_attr($hongo_id) . '" name="' . esc_attr($hongo_id) . '">' . $hongo_value . '</textarea>';
			$html .='</div>';
			$html .= '</div>';

			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_upload' ) ) {
		function hongo_meta_box_upload( $hongo_id, $hongo_label, $hongo_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();
			
	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $hongo_label;
				if($hongo_desc) {
					$html .= '<span class="description">' . esc_attr($hongo_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<input name="' . esc_attr($hongo_id) . '" class="upload_field" id="hongo_upload" type="text" value="' . get_post_meta($post->ID, $meta_prefix.$hongo_id, true) . '" />';
				$html .= '<input name="'. $hongo_id.'_thumb" class="'. $hongo_id.'_thumb" id="'. $hongo_id.'_thumb" type="hidden" value="'.get_post_meta($post->ID, $meta_prefix.$hongo_id, true).'" />';
						$html .= '<img class="upload_image_screenshort" src="'.get_post_meta($post->ID, $meta_prefix.$hongo_id, true).'" />';
				$html .= '<input class="hongo_upload_button" id="hongo_upload_button" type="button" value="'.__( 'Browse', 'hongo-addons' ).'" />';
				$html .= '<span class="hongo_remove_button button">'.__( 'Remove', 'hongo-addons' ).'</span>';
						
			$html .='</div>';
			$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_upload_multiple' ) ) {
		function hongo_meta_box_upload_multiple( $hongo_id, $hongo_label, $hongo_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();

	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr($hongo_id).'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $hongo_label;
					if($hongo_desc) {
						$html .= '<span class="description">' . esc_attr($hongo_desc) . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
				
					$html .= '<input name="' . esc_attr($hongo_id) . '" class="upload_field upload_field_multiple" id="hongo_upload" type="hidden" value="'.get_post_meta($post->ID, $meta_prefix.$hongo_id, true).'" />';
					$html .= '<div class="multiple_images">';
					$hongo_val = explode(",",get_post_meta($post->ID, $meta_prefix.$hongo_id, true));
					
					foreach ($hongo_val as $key => $value) {
						if(! empty($value)):
							$hongo_image_url = wp_get_attachment_url( $value );
							$html .='<div id='.esc_attr($value).'>';
								$html .= '<img class="upload_image_screenshort_multiple width-100px" src="'.esc_url( $hongo_image_url ).'" />';
								$html .= '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'hongo-addons' ).'</a>';
							$html .= '</div>';
						endif;
					}
					$html .= '</div>';
					$html .= '<input class="hongo_upload_button_multiple" id="hongo_upload_button_multiple" type="button" value="'.__( 'Browse', 'hongo-addons' ).'" />'.__( ' Select Files', 'hongo-addons' );
				$html .='</div>';
			$html .= '</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_colorpicker' ) ) {
		function hongo_meta_box_colorpicker( $id, $label, $desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			global $post;
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();
			
	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr( $id ).'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if( $desc ) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<input type="text" class="hongo-color-picker" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '" value="' . get_post_meta($post->ID, $meta_prefix.$id, true) . '" />';
				$html .='</div>';
			$html .='</div>';
			echo sprintf( '%s', $html );
		}
	}

	if ( ! function_exists( 'hongo_meta_box_separator' ) ) {
		function hongo_meta_box_separator( $id, $label, $desc = '', $short_desc = '', $hongo_dependency = '', $hongo_parent_dependency = '' ) {
			$hongo_theme = wp_get_theme();
			$theme_mode_slug = $hongo_theme->get_stylesheet();
			$theme_mode_slug = 'theme_mods_' . $theme_mode_slug;	
			$hongo_theme_options = get_option( $theme_mode_slug );
			$hongo_theme_default_value_arr = hongo_get_default_value_wp_customizer_setting();
			
	        // Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty( $hongo_parent_dependency ) ){
				$val = array();

				$customizer_parent_key = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? substr_replace( $hongo_parent_dependency['parent-element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_parent_dependency['parent-element'] ) ) ? 'data-parent-element="'.$hongo_parent_dependency['parent-element'].'"' : '';

				$global_theme_parent_val = ( isset( $hongo_theme_options[$customizer_parent_key] ) && $hongo_theme_options[$customizer_parent_key] !== '') ? $hongo_theme_options[$customizer_parent_key] : '';

				$default_global_theme_parent_val = ( isset( $hongo_theme_default_value_arr[$customizer_parent_key] ) && $hongo_theme_default_value_arr[$customizer_parent_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_parent_key] : '';

				if( $global_theme_parent_val !== ''){
					$dependency_arr[] = 'data-global-parent-value="'.$global_theme_parent_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_parent_val !== '' ) ? 'data-global-parent-value="'.$default_global_theme_parent_val.'"' : '';
				}

				foreach ($hongo_parent_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-parent-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			if( ! empty( $hongo_dependency ) ){
				$val = array();

				$customizer_key = ( isset( $hongo_dependency['element'] ) ) ? substr_replace( $hongo_dependency['element'], "", -7 ) : '';
				$dependency_arr[] = ( isset( $hongo_dependency['element'] ) ) ? 'data-element="'.$hongo_dependency['element'].'"' : '';
				$global_theme_val = ( isset( $hongo_theme_options[$customizer_key] ) && $hongo_theme_options[$customizer_key] !== '' ) ? $hongo_theme_options[$customizer_key] : '';

				$default_global_theme_val = ( isset( $hongo_theme_default_value_arr[$customizer_key] ) && $hongo_theme_default_value_arr[$customizer_key] !== '' ) ? $hongo_theme_default_value_arr[$customizer_key] : '';
				
				if( $global_theme_val !== ''){				
					$dependency_arr[] = 'data-global-value="'.$global_theme_val.'"';
				}else{
					$dependency_arr[] = ( $default_global_theme_val !== '' ) ? 'data-global-value="'.$default_global_theme_val.'"' : '';
				}

				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}

				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr( $id ).'_box separator_box"'.$dependency_attr.'>';
				$html .= '<div class="meta-heading-separator">';
					$html .= '<h3>' . $label . '</h3>';
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
			$html .='</div>';
			echo sprintf( '%s', $html );
		}
	}

	// Meta Box Main Wrap Start
	if( ! function_exists( 'hongo_after_main_separator_start' ) ) {
		function hongo_after_main_separator_start( $id, $hongo_dependency = '', $hongo_parent_dependency = ''  ) {
			// Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty($hongo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$hongo_dependency['element'].'"';
				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr( $id ).'_main_content_wrap"'.$dependency_attr.'>';

			echo sprintf( '%s', $html );
		}
	}	

	// Meta Box Inner Wrap Start
	if( ! function_exists( 'hongo_after_inner_separator_start' ) ) {
		function hongo_after_inner_separator_start( $id, $hongo_dependency = '', $hongo_parent_dependency = ''  ) {
			// Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty($hongo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$hongo_dependency['element'].'"';
				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.esc_attr( $id ).'_content_wrap"'.$dependency_attr.'>';

			echo sprintf( '%s', $html );
		}
	}

	// Meta Box Inner Wrap End
	if( ! function_exists( 'hongo_before_inner_separator_end' ) ) {
		function hongo_before_inner_separator_end( $id, $hongo_dependency = '', $hongo_parent_dependency = ''  ) {
			// Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty($hongo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$hongo_dependency['element'].'"';
				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '</div>';

			echo sprintf( '%s', $html );
		}
	}

	// Meta Box Main Wrap End
	if( ! function_exists( 'hongo_before_main_separator_end' ) ) {
		function hongo_before_main_separator_end( $id, $hongo_dependency = '', $hongo_parent_dependency = ''  ) {
			// Meta Prefix
	        $meta_prefix = '_';
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( ! empty($hongo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$hongo_dependency['element'].'"';
				foreach ($hongo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '</div>';

			echo sprintf( '%s', $html );
		}
	}
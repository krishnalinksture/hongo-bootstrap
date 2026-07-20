<?php
/**
 * Hongo Mega Menu Options For Admin And Front.
 *
 * @package Hongo
 */
?>
<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/*
 * Saves new field to postmeta for navigation.
 *
 */
add_action('wp_update_nav_menu_item', 'hongo_nav_option_update',10, 3);

if ( ! function_exists( 'hongo_nav_option_update' ) ) {
	function hongo_nav_option_update( $menu_id, $menu_item_db_id, $args ) {
        
        if( ! isset( $_REQUEST['menu-item-hongo-mega-menu-single-item-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-mega-menu-single-item-status'][$menu_item_db_id] = '';
        }
        $hongo_mega_menu_single_item_status = $_REQUEST['menu-item-hongo-mega-menu-single-item-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_mega_menu_single_item_status', $hongo_mega_menu_single_item_status );

        if( ! isset( $_REQUEST['menu-item-hongo-megamenu-section'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-megamenu-section'][$menu_item_db_id] = '';
        }
        $hongo_mega_menu_section = $_REQUEST['menu-item-hongo-megamenu-section'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_mega_menu_section', $hongo_mega_menu_section );

        if( ! isset( $_REQUEST['menu-item-hongo-mega-menu-enable-icon-image-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-mega-menu-enable-icon-image-status'][$menu_item_db_id] = '';
        }
        $hongo_mega_menu_enable_icon_image_status = $_REQUEST['menu-item-hongo-mega-menu-enable-icon-image-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_mega_menu_enable_icon_image_status', $hongo_mega_menu_enable_icon_image_status );

        if( ! isset( $_REQUEST['menu-item-hongo-menu-item-icon'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-menu-item-icon'][$menu_item_db_id] = '';
        }
        $hongo_menu_item_icon = $_REQUEST['menu-item-hongo-menu-item-icon'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_menu_item_icon', $hongo_menu_item_icon );

        if( ! isset( $_REQUEST['menu-item-hongo-mega-menu-icon-image-url'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-mega-menu-icon-image-url'][$menu_item_db_id] = '';
        }
        $hongo_mega_menu_icon_image_url = $_REQUEST['menu-item-hongo-mega-menu-icon-image-url'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_mega_menu_icon_image_url', $hongo_mega_menu_icon_image_url );

        if( ! isset( $_REQUEST['menu-item-hongo-submenu-position'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-hongo-submenu-position'][$menu_item_db_id] = '';
        }
        $hongo_submenu_position = $_REQUEST['menu-item-hongo-submenu-position'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_hongo_submenu_position', $hongo_submenu_position );
	}
}

/*
 * Adds value of new field to $item object that will be passed to Walker_Nav_Menu_Edit_Custom.
 *
 */
add_filter( 'wp_setup_nav_menu_item','hongo_get_nav_custom_post_meta' );
if ( ! function_exists( 'hongo_get_nav_custom_post_meta' ) ) {
    function hongo_get_nav_custom_post_meta($menu_item) {
        $menu_item->hongo_mega_menu_single_item_status = get_post_meta( $menu_item->ID, '_hongo_mega_menu_single_item_status', true );
        $menu_item->hongo_mega_menu_section = get_post_meta( $menu_item->ID, '_hongo_mega_menu_section', true );
        $menu_item->hongo_mega_menu_enable_icon_image_status = get_post_meta( $menu_item->ID, '_hongo_mega_menu_enable_icon_image_status', true );
        $menu_item->hongo_menu_item_icon = get_post_meta( $menu_item->ID, '_hongo_menu_item_icon', true );
        $menu_item->hongo_mega_menu_icon_image_url = get_post_meta( $menu_item->ID, '_hongo_mega_menu_icon_image_url', true );
        $menu_item->hongo_submenu_position = get_post_meta( $menu_item->ID, '_hongo_submenu_position', true );
        return $menu_item;
    }
}

/*
 * Filter For Edit Walker_Nav_Menu_Edit_Custom Walker.
 *
 */
add_filter( 'wp_edit_nav_menu_walker', 'hongo_custom_nav_edit_walker' );
if ( ! function_exists( 'hongo_custom_nav_edit_walker' ) ) :
    function hongo_custom_nav_edit_walker() {
        return 'Hongo_Walker_Nav_Menu_Edit_Custom';
    }
endif;

/**
 * Navigation Menu API: Walker_Nav_Menu_Edit class
 *
 */
if( ! class_exists( 'Hongo_Walker_Nav_Menu_Edit_Custom' ) ) {
    class Hongo_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {

        /**
         * Starts the list before the elements are added.
         *
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Ends the list of after the elements are added.
         *
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Start the element output.
         *
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id      = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = false;
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) ) {
                    $original_title = false;
                }
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title  = get_the_title( $original_object->ID );
            } elseif ( 'post_type_archive' == $item->type ) {
                $original_object = get_post_type_object( $item->object );
                if ( $original_object ) {
                    $original_title = $original_object->labels->archives;
                }
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive' ),
            );

            $title = $item->title;

            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = sprintf( __( '%s (Invalid)', 'hongo-addons' ), $item->title );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = sprintf( __( '%s (Pending)', 'hongo-addons' ), $item->title );
            }

            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

            $submenu_text = '';
            if ( 0 == $depth ) {
                $submenu_text = 'style="display: none;"';
            }

            ?>
            <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode( ' ', $classes ); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">
                        <label class="item-title" for="menu-item-checkbox-<?php echo $item_id; ?>">
                            <input id="menu-item-checkbox-<?php echo $item_id; ?>" type="checkbox" class="menu-item-checkbox" data-menu-item-id="<?php echo $item_id; ?>" disabled="disabled" />
                            <span class="menu-item-title"><?php echo esc_html( $title ); ?></span>
                            <span class="is-submenu" <?php echo printf( '%s', $submenu_text ); ?>><?php _e( 'sub item', 'hongo-addons' ); ?></span>
                        </label>
                        <span class="item-controls">
                            <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                            <span class="item-order hide-if-js">
                                <a href="
                                <?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>
                                " class="item-move-up" aria-label="<?php esc_attr_e( 'Move up', 'hongo-addons' ); ?>">&#8593;</a>
                                |
                                <a href="
                                <?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>
                                " class="item-move-down" aria-label="<?php esc_attr_e( 'Move down', 'hongo-addons' ); ?>">&#8595;</a>
                            </span>
                            <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" href="<?php echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ); ?>
                            " aria-label="<?php esc_attr_e( 'Edit menu item', 'hongo-addons' ); ?>"><span class="screen-reader-text"><?php _e( 'Edit', 'hongo-addons' ); ?></span></a>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
                    <?php if ( 'custom' == $item->type ) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'URL', 'hongo-addons' ); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Navigation Label', 'hongo-addons' ); ?><br />
                            <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                        </label>
                    </p>
                    <p class="field-title-attribute field-attr-title description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Title Attribute', 'hongo-addons' ); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                            <?php _e( 'Open link in a new tab', 'hongo-addons' ); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'CSS Classes (optional)', 'hongo-addons' ); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode( ' ', $item->classes ) ); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Link Relationship (XFN)', 'hongo-addons' ); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                        </label>
                    </p>
                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Description', 'hongo-addons' ); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                            <span class="description"><?php _e( 'The description will be displayed in the menu if the current theme supports it.', 'hongo-addons' ); ?></span>
                        </label>
                    </p>
                    <p class="field-hongo-mega-menu-single-item-status description description-wide">
                        <label for="edit-menu-item-hongo-mega-menu-single-item-status-<?php echo esc_attr($item_id); ?>">
                            <?php $single_status_checked = ( $item->hongo_mega_menu_single_item_status == 'enabled' ) ? 'checked="checked"' : ''; ?>
                            <input type="checkbox" id="edit-menu-item-hongo-mega-menu-single-item-status-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-mega-menu-single-item-status" name="menu-item-hongo-mega-menu-single-item-status[<?php echo esc_attr($item_id); ?>]" value="enabled" <?php echo esc_html($single_status_checked); ?> />
                            <?php _e( 'Enable Onepage For This Item (only for main parent)', 'hongo-addons' ); ?>
                        </label>
                    </p>
                    <?php if( $depth == 0 ) { ?>
                        <p class="field-hongo-megamenu-section description-wide description">
                            <label for="edit-menu-item-hongo-megamenu-section-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Megamenu Selection', 'hongo-addons' ); 
                                    /* Get All Register Header Section List. */
                                    $hongo_megamenu_section_array = hongo_addons_get_builder_section_data( 'megamenu' );
                                ?>

                                <select id="edit-menu-item-hongo-megamenu-section-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-submenu-position" name="menu-item-hongo-megamenu-section[<?php echo esc_attr($item_id); ?>]">
                                    <?php
                                        foreach ($hongo_megamenu_section_array as $key => $value) {
                                            ?>
                                                <option <?php selected( $item->hongo_mega_menu_section, $key ); ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                           <?php
                                        }
                                    ?>
                                </select>
                            </label>
                        </p>
                        <p class="field-hongo-mega-submenu-position description-wide description">
                            <label for="edit-menu-item-hongo-submenu-position-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Submenu Position', 'hongo-addons' ); ?>
                                <select id="edit-menu-item-hongo-submenu-position-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-submenu-position" name="menu-item-hongo-submenu-position[<?php echo esc_attr($item_id); ?>]">
                                    <option <?php if( $item->hongo_submenu_position == 'right' ) { echo 'selected="selected" '; }?> value="right"><?php _e( 'Right', 'hongo-addons' ); ?></option>
                                    <option <?php if( $item->hongo_submenu_position == 'left' ) { echo 'selected="selected" '; }?> value="left"><?php _e( 'Left', 'hongo-addons' ); ?></option>
                                </select>
                            </label>
                        </p>
                    <?php } ?>
                     <p class="field-hongo-mega-menu-enable-icon-image-status description description-wide">
                        <label for="edit-menu-item-hongo-mega-menu-enable-icon-image-status-<?php echo esc_attr($item_id); ?>">
                            <?php $icon_status_checked = ( $item->hongo_mega_menu_enable_icon_image_status == 'enabled' ) ? 'checked="checked"' : ''; ?>
                            <input type="checkbox" id="edit-menu-item-hongo-mega-menu-enable-icon-image-status-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-mega-menu-enable-icon-image-status" name="menu-item-hongo-mega-menu-enable-icon-image-status[<?php echo esc_attr($item_id); ?>]" value="enabled" <?php echo esc_attr($icon_status_checked); ?> />
                            <?php _e( 'Enable Custom Icon Image.', 'hongo-addons' ); ?>
                        </label>
                    </p>
                    <?php /* Set Mega Menu Item Icon Start */ ?>
                    <p class="field-hongo-mega-menu-item-icon description description-wide">
                        <label for="edit-hongo-mega-menu-item-icon-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Select Menu Item Icon', 'hongo-addons' ); ?>
                            
                            <select id="edit-menu-item-hongo-menu-item-icon-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-menu-item-icon menu-icon-item-wrapper menu-icon-item form-control" name="menu-item-hongo-menu-item-icon[<?php echo esc_attr($item_id); ?>]"></select>

                            <?php
                                $hongo_themify_icons      = hongo_themify_icons();
                                $hongo_fontawesome_solid  = hongo_fontawesome_solid();
                                $hongo_fontawesome_reg    = hongo_fontawesome_reg();
                                $hongo_fontawesome_brand  = hongo_fontawesome_brand();
                                $hongo_fontawesome_light  = hongo_fontawesome_light();
                                $hongo_fontawesome_duotone= hongo_fontawesome_duotone();
                                $hongo_et_line_icons      = hongo_et_line_icons();
                                $hongo_simple_icons       = hongo_simple_icons();

                                $hongo_custom_icons       = apply_filters( 'hongo_custom_font_icons', array() );

                                $value = $item->hongo_menu_item_icon;
                                $select_id = $item_id;

                                echo '<select class="hongo-menu-icons">';

                                    echo '<option id="'.$select_id.'" value="1">'.esc_html__( 'Select Menu Icon', 'hongo-addons' ).'</option>';
                                     
                                    /* Themify icons */
                                    if( ! empty( $hongo_themify_icons ) ) {
                                        
                                        echo '<optgroup label="Themify Icon">';
                                            foreach ( $hongo_themify_icons as $icon => $val ) {
                                                $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }

                                    /* Font awesome solid icons */
                                    if( ! empty( $hongo_fontawesome_solid ) ) {
                                        
                                        echo '<optgroup label="Font Awesome Solid Icon">';
                                            foreach ( $hongo_fontawesome_solid as $icon => $val ) {
                                                $selected = ( ( 'fas '.$val == $value ) || ( 'fa-solid '.$val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="fa-solid '. $val .'" value="fa-solid '. $val .'">fa-solid '.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }

                                    /* Font awesome regular icons */
                                    if( ! empty( $hongo_fontawesome_reg ) ) {
                                        
                                        echo '<optgroup label="Font Awesome Regular Icon">';
                                            foreach ( $hongo_fontawesome_reg as $icon => $val ) {
                                                $selected = ( ( 'far '.$val == $value ) || ( 'fa-regular '.$val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="fa-regular '. $val .'" value="fa-regular '. $val .'">fa-regular '.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }

                                    /* Font awesome brand icons */
                                    if( ! empty( $hongo_fontawesome_brand ) ) {
                                            
                                        echo '<optgroup label="Font Awesome Brand Icon">';
                                            foreach ( $hongo_fontawesome_brand as $icon => $val ) {
                                                $selected = ( ( 'fab '.$val == $value ) || ( 'fa-brands '.$val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="fa-brands '. $val .'" value="fa-brands '. $val .'">fa-brands '.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }
                                    
                                    /* Font awesome light icons */
                                    if( ! empty( $hongo_fontawesome_light ) ) {

                                        echo '<optgroup label="Font Awesome Light Icon">';
                                            foreach ( $hongo_fontawesome_light as $icon => $val ) {
                                                $selected = ( ( 'fal '.$val == $value ) || ( 'fa-light '.$val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="fa-light '. $val .'" value="fa-light '. $val .'">fa-light '.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }
                                    
                                    /* Font awesome duotone icons */
                                    if( ! empty( $hongo_fontawesome_duotone ) ) {

                                        echo '<optgroup label="Font Awesome Duotone Icon">';
                                            foreach ( $hongo_fontawesome_duotone as $icon => $val ) {
                                                $selected = ( ( 'fad '.$val == $value ) || ( 'fa-duotone '.$val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="fa-duotone '. $val .'" value="fa-duotone '. $val .'">fa-duotone '.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }
                                    
                                    /* ET-Line icons */
                                    if( ! empty( $hongo_et_line_icons ) ) {
                                        
                                        echo '<optgroup label="ET-Line Icon">';
                                            foreach ( $hongo_et_line_icons as $icon => $val ) {
                                                
                                                $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }

                                    /* Simple-Line icons */
                                    if( ! empty( $hongo_simple_icons ) ) {
                                            
                                        echo '<optgroup label="Simple-Line Icon">';
                                            foreach ( $hongo_simple_icons as $icon => $val ) {
                                                
                                                $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                            }
                                        echo '</optgroup>';
                                    }

                                    /* Custom Icons using filter */
                                    if( $hongo_custom_icons ) {
                                        foreach( $hongo_custom_icons as $hongo_custom_icon ) {
                                            echo '<optgroup label="'.$hongo_custom_icon['label'].'">';
                                                foreach ( $hongo_custom_icon['fonts'] as $icon => $val ) {
                                                    $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                                    echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                                }
                                            echo '</optgroup>';
                                        }
                                    }
                                echo '</select>';
                            ?>
                        </label>
                    </p>
                    <?php /* Set Mega Menu Item Icon End */ ?>

                    <?php /* Set Mega Menu Item Image Start */ ?>
                    <p class="field-hongo-mega-menu-icon-image-url description hongo-custom-upload description-wide">
                        <label for="edit-menu-item-hongo-mega-menu-icon-image-url-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Icon Image', 'hongo-addons' ); ?><br />
                            <span id="menu_icon" class="hongo-thumb-img-preview">
                                <?php $class = empty( $item->hongo_mega_menu_icon_image_url ) ? 'display-none' : ''; ?>
                                <img src="<?php echo esc_attr( $item->hongo_mega_menu_icon_image_url ); ?>" alt="<?php _e( 'Icon image','hongo-addons' ); ?>" width="100" height="100" class="<?php echo esc_attr( $class ); ?>" />
                            </span><br />
                            <a title="Menu title image" href="javascript:void(0)" class="hongo-custom-upload-image button" data-item-id="<?php echo esc_attr($item_id); ?>"><?php _e('Set image', 'hongo-addons'); ?></a>
                            <?php $class_remove = empty( $item->hongo_mega_menu_icon_image_url ) ? ' hidden' : ''; ?>
                            <a title="Menu title image" href="javascript:void(0)" class="remove-image-button button<?php echo esc_attr( $class_remove ); ?>" data-item-id="<?php echo esc_attr($item_id); ?>"><?php _e('Remove Image', 'hongo-addons'); ?></a>
                            <input type="hidden" id="edit-menu-item-hongo-mega-menu-icon-image-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-hongo-mega-menu-icon-image-url" name="menu-item-hongo-mega-menu-icon-image-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->hongo_mega_menu_icon_image_url ); ?>" />
                        </label>
                    </p>
                    <?php /* Set Mega Menu Item Image End */ ?>

                    <fieldset class="field-move hide-if-no-js description description-wide">
                        <span class="field-move-visual-label" aria-hidden="true"><?php _e( 'Move', 'hongo-addons' ); ?></span>
                        <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e( 'Up one', 'hongo-addons' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e( 'Down one', 'hongo-addons' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                        <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                        <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e( 'To the top', 'hongo-addons' ); ?></button>
                    </fieldset>

                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
                            <p class="link-to-original">
                                <?php
                                /* translators: %s: original title */
                                printf( __( 'Original: %s', 'hongo-addons' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' );
                                ?>
                            </p>
                        <?php endif; ?>
                        <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php echo wp_nonce_url( add_query_arg( array( 'action' => 'delete-menu-item', 'menu-item' => $item_id, ), admin_url( 'nav-menus.php' ) ), 'delete-menu_item_' . $item_id ); ?>
                        "><?php _e( 'Remove', 'hongo-addons' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="
                        <?php
                        echo esc_url(
                            add_query_arg(
                                array(
                                    'edit-menu-item' => $item_id,
                                    'cancel'         => time(),
                                ),
                                admin_url( 'nav-menus.php' )
                            )
                        );
                        ?>
                            #menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e( 'Cancel', 'hongo-addons' ); ?></a>
                    </div>

                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_contents();
            ob_end_clean();
        }
    } // End Walker Navigation Menu Class
}
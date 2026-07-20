<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Action For Register "Brands".
add_action( 'init', 'hongo_addons_brand_create_taxonomies' );

// Action Add Brand Field.
add_action( 'product_brand_add_form_fields', 'hongo_addons_brand_add_brands_fields' );
// Action Edit Brand Field.
add_action( 'product_brand_edit_form_fields', 'hongo_addons_brand_edit_brands_fields', 10, 2 );
// Action Save Brand Fields.
add_action( 'created_term', 'hongo_addons_brand_save_brands_fields', 10, 3 );
add_action( 'edit_term', 'hongo_addons_brand_save_brands_fields', 10, 3 );

// Action For Add Brand Column.
add_filter( 'manage_edit-product_brand_columns', 'hongo_addons_brand_columns' );
add_filter( 'manage_product_brand_custom_column', 'hongo_addons_brand_column', 10, 3 );
// Action Add Script.
add_action( 'admin_enqueue_scripts', 'hongo_addons_brand_admin_scripts' );

// create two taxonomies, genres and writers for the post type "product"
if( ! function_exists( 'hongo_addons_brand_create_taxonomies' ) ) {
    function hongo_addons_brand_create_taxonomies() {

        // Add new taxonomy, make it hierarchical (like categories)
        $shop_page_id = wc_get_page_id( 'shop' );
        $base_slug = $shop_page_id > 0 && get_page( $shop_page_id ) ? get_page_uri( $shop_page_id ) : 'shop';
        $category_base = get_option('woocommerce_prepend_shop_page_to_urls') == "yes" ? trailingslashit( $base_slug ) : '';
        $cap = version_compare( WOOCOMMERCE_VERSION, '2.0', '<' ) ? 'manage_woocommerce_products' : 'edit_products';
        $labels = array(
            'name'              => __( 'Brands', 'hongo-addons' ),
            'singular_name'     => __( 'Brand', 'hongo-addons' ),
            'search_items'      => __( 'Search Brands', 'hongo-addons' ),
            'all_items'         => __( 'All Brands', 'hongo-addons' ),
            'parent_item'       => __( 'Parent Brands', 'hongo-addons'),
            'parent_item_colon' => __( 'Parent Brands:', 'hongo-addons' ),
            'edit_item'         => __( 'Edit Brand', 'hongo-addons'),
            'update_item'       => __( 'Update Brand', 'hongo-addons'),
            'add_new_item'      => __( 'Add New Brand', 'hongo-addons'),
            'new_item_name'     => __( 'New Brand Name', 'hongo-addons'),
            'menu_name'         => __( 'Brands', 'hongo-addons'),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'rewrite'           => array(
                'slug'              => $category_base . 'brand',
                'with_front'        => false, 
                'hierarchical'      => true 
            )
        );
        register_taxonomy( 'product_brand', array('product'), apply_filters( 'register_taxonomy_product_brand',$args ));    
    }
}

if( ! function_exists( 'hongo_addons_brand_admin_scripts' ) ) {
    function hongo_addons_brand_admin_scripts() {
        wp_enqueue_media();
    }
}

if( ! function_exists( 'hongo_addons_brand_add_brands_fields' ) ) {
    function hongo_addons_brand_add_brands_fields() { ?>
        <div class="form-field product_brand_logo_main">
            <label><?php _e( 'Logo', 'hongo-addons' ); ?></label>
            <div id="product_brand_logo" class="thumb_img_preview" style="float: left; margin-right: 10px;">
                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" alt="<?php echo esc_html__( 'Image', 'hongo-addons' ); ?>" />
            </div>
            <div style="line-height: 60px;">
                <input type="hidden" id="product_brand_logo_id" class="product_brand_thumb_id" name="product_brand_logo_id" />
                <button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'hongo-addons' ); ?></button>
                <button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'hongo-addons' ); ?></button>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            if ( !jQuery( '.product_brand_logo_main #product_brand_logo_id' ).val() ) {
                    jQuery( '.product_brand_logo_main .remove_image_button' ).hide();
            }
            jQuery( document ).on( 'click', '.upload_image_button', function( event ) {
                // Uploading files
                var file_frame;
                    event.preventDefault();
                    var currentdiv = jQuery(this).parent().parent();
                    
                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                            file_frame.open();
                            return;
                    }

                    // Create the media frame.
                    file_frame = wp.media.frames.downloadable_file = wp.media({
                            title: '<?php _e( "Choose an image", "hongo-addons" ); ?>',
                            button: {
                                    text: '<?php _e( "Use image", "hongo-addons" ); ?>'
                            },
                            multiple: false
                    });

                    // When an image is selected, run a callback.
                    file_frame.on( 'select', function() {
                            var attachment = file_frame.state().get( 'selection' ).first().toJSON();
                            currentdiv.find( '.product_brand_thumb_id' ).val( attachment.id );
                            currentdiv.find( '.thumb_img_preview img' ).attr( 'src', attachment.url );
                            currentdiv.find( '.remove_image_button' ).show();
                    });

                    // Finally, open the modal.
                    file_frame.open();
            });

            jQuery( document ).on( 'click', '.remove_image_button', function() {
                var currentdiv = jQuery(this).parent().parent();
                    currentdiv.find( '.thumb_img_preview img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                    currentdiv.find( '.product_brand_thumb_id   ' ).val( '' );
                    currentdiv.find( '.remove_image_button' ).hide();
                    return false;
            });
        </script>
    <?php
    }
}

if( ! function_exists( 'hongo_addons_brand_edit_brands_fields' ) ) {
    function hongo_addons_brand_edit_brands_fields( $term, $taxonomy ) {
        $display_type   = get_term_meta( $term->term_id, 'featured', true );
        $image = $image_logo = '';        
        $logo_id    = absint( get_term_meta( $term->term_id, 'logo_id', true ) );

        if($logo_id){
            $image_logo = wp_get_attachment_thumb_url( $logo_id );
        } else {
            $image_logo = wc_placeholder_img_src(); 
        }
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label><?php _e( 'Logo', 'hongo-addons' ); ?></label></th>
            <td>
                <div class="product_brand_logo_main">
                <div id="product_brand_logo" class="thumb_img_preview" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image_logo ); ?>" width="60px" height="60px" alt="<?php echo esc_html__( 'Image', 'hongo-addons' ); ?>" /></div>
                <div style="line-height: 60px;">
                    <input type="hidden" id="product_brand_thumb_id" name="product_brand_logo_id" class="product_brand_thumb_id" value="<?php echo esc_attr( $logo_id ); ?>" />
                    <button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'hongo-addons' ); ?></button>
                    <button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'hongo-addons' ); ?></button>
                </div>
                <div class="clear"></div>
                </div>
            </td>
            <script type="text/javascript">
                // Only show the "remove image" button when needed
                if ( '0' === jQuery( '.product_brand_logo_main #product_brand_thumb_id' ).val() ) {
                    jQuery( '.product_brand_logo_main .remove_image_button' ).hide();
                    jQuery( '.product_brand_logo_main #product_brand_thumb_id .thumb_img_preview img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                }

                jQuery( document ).on( 'click', '.upload_image_button', function( event ) {
                    // Uploading files
                    var file_frame;
                    event.preventDefault();
                    var currentdiv = jQuery(this).parent().parent();

                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                            file_frame.open();
                            return;
                    }

                    // Create the media frame.
                    file_frame = wp.media.frames.downloadable_file = wp.media({
                            title: '<?php _e( "Choose an image", "hongo-addons" ); ?>',
                            button: {
                                    text: '<?php _e( "Use image", "hongo-addons" ); ?>'
                            },
                            multiple: false
                    });

                    // When an image is selected, run a callback.
                    file_frame.on( 'select', function() {
                            var attachment = file_frame.state().get( 'selection' ).first().toJSON();
                            currentdiv.find( '.product_brand_thumb_id' ).val( attachment.id );
                            currentdiv.find( '.thumb_img_preview img' ).attr( 'src', attachment.url );
                            currentdiv.find( '.remove_image_button' ).show();
                    });

                    // Finally, open the modal.
                    file_frame.open();
                });

                jQuery( document ).on( 'click', '.remove_image_button', function() {
                    var currentdiv = jQuery(this).parent().parent();
                    currentdiv.find( '.thumb_img_preview img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                    currentdiv.find( '.product_brand_thumb_id   ' ).val( '' );
                    currentdiv.find( '.remove_image_button' ).hide();
                    return false;
                });
            </script>
        </tr>
    <?php
    }
}

if( ! function_exists( 'hongo_addons_brand_save_brands_fields' ) ) {
    function hongo_addons_brand_save_brands_fields( $term_id, $tt_id, $taxonomy ) {
        if ( isset( $_POST['product_brand_logo_id'] ) && 'product_brand' === $taxonomy ) {
            update_term_meta( $term_id, 'logo_id', absint( $_POST['product_brand_logo_id'] ) );
        }
        delete_transient( 'wc_term_counts' );
    }
}

if( ! function_exists( 'hongo_addons_brand_columns' ) ) {
    function hongo_addons_brand_columns( $columns ) {
            
        $new_columns          = array();
        $new_columns['cb']    = $columns['cb'];
        $new_columns['thumb'] = __( 'Logo', 'hongo-addons' );
        unset( $columns['cb'] );

        return array_merge( $new_columns, $columns );

    }
}

if( ! function_exists( 'hongo_addons_brand_column' ) ) {
    function hongo_addons_brand_column( $columns, $column, $id ) {
        if ( 'thumb' == $column ) {

            $thumbnail_id = get_term_meta( $id, 'logo_id', true );

            if ( $thumbnail_id ) {
                $image = wp_get_attachment_thumb_url( $thumbnail_id );
            } else {
                $image = wc_placeholder_img_src();
            }

            // Prevent esc_url from breaking spaces in urls for image embeds
            // Ref: http://core.trac.wordpress.org/ticket/23605
            $image = str_replace( ' ', '%20', $image );

            $columns .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr__( 'Thumbnail', 'hongo-addons' ) . '" class="wp-post-image" height="48" width="48" />';

        }

        return $columns;
    }
}

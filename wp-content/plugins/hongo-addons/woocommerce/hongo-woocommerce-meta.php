<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( hongo_is_woocommerce_activated() ) {

    if ( ! function_exists( 'hongo_custom_tab_options_tab' ) ) :
        function hongo_custom_tab_options_tab() {
        ?>
            <li class="custom_tab wc-special-product">
                <a href="#custom_tab_data">
                    <span><?php esc_html_e( 'Hongo Options', 'hongo-addons' ); ?></span>
                </a>
            </li>
        <?php
        }
    endif;
    add_action('woocommerce_product_write_panel_tabs', 'hongo_custom_tab_options_tab');

    // Save Product Tab in backend
    add_action( 'woocommerce_process_product_meta', 'custom_repeatable_meta_box_save' );
    if( ! function_exists('custom_repeatable_meta_box_save') ){
        function custom_repeatable_meta_box_save( $post_id ){

            $old_data       = get_post_meta( $post_id, '_hongo_custom_product_tab', true );
            $new_data       = array();
            $tabtitle       = ! empty( $_POST['tabdata']['tabtitle'] ) ? $_POST['tabdata']['tabtitle'] : array();
            $tabdescription = ! empty( $_POST['tabdata']['tabdescription'] ) ? $_POST['tabdata']['tabdescription'] : array();
            $tabuniquekey   = ! empty( $_POST['tabdata']['tabuniquekey'] ) ? $_POST['tabdata']['tabuniquekey'] : array();

            if( ! empty( $tabtitle ) ) {
                $count = count( $tabtitle ); // Count title
                for ( $i = 0; $i < $count; $i++ ) {

                    if ( isset( $tabtitle[ $i ] ) && $tabtitle[ $i ] != '' ) {
                        $new_data[ $i ]['tabtitle']       = stripslashes( strip_tags( $tabtitle[ $i ] ) );
                        $new_data[ $i ]['tabdescription'] = stripslashes( $tabdescription[ $i ] );
                        $new_data[ $i ]['tabuniquekey']   = $tabuniquekey[ $i ];
                    }
                }
            }

            if ( ! empty( $new_data ) && $new_data != $old_data ){
                update_post_meta( $post_id, '_hongo_custom_product_tab', $new_data );
            } elseif ( empty( $new_data ) && $old_data) {
                delete_post_meta( $post_id, '_hongo_custom_product_tab', $old_data );
            }

            // 360 Images gallery save
            $old_360_images       = get_post_meta( $post_id, '_hongo_product_360_images', true );
            $new_360_images       = ! empty( $_POST['hongo_360_product_gallery'] ) ? $_POST['hongo_360_product_gallery'] : '';

            if ( ! empty( $new_360_images ) && $new_360_images != $old_360_images ){
                update_post_meta( $post_id, '_hongo_product_360_images', $new_360_images);
            } elseif ( empty( $new_360_images ) && $old_360_images) {
                delete_post_meta( $post_id, '_hongo_product_360_images', $old_360_images);
            }
        }
    }

    if ( ! function_exists( 'hongo_custom_tab_options' ) ) {
        function hongo_custom_tab_options() {
            global $post;

            $hongo_tabs_group = get_post_meta( $post->ID, '_hongo_custom_product_tab', true );
        ?>
            <div id="custom_tab_data" class="panel woocommerce_options_panel">

                <!--Custom Tabbing Start in Product Edit Page-->
                <div id="hongo-custom-product-tab-repeater" class="hongo-custom-product-tab-repeater">
                    <label><?php esc_html_e( 'Custom Product Tab', 'hongo-addons' ); ?></label>
                    <div id="hongo-accordion-product-tab">
                        <?php
                            if (! empty( $hongo_tabs_group ) ) {

                                $i = 1;
                                foreach ( $hongo_tabs_group as $field ) {
                        ?>
                                    <div class="hongo-single-product-tab-main-structure">
                                        <h3 class="hongo-single-product-tab-title">
                                            <?php
                                                if ( $field['tabtitle'] != '' ) {
                                                    echo esc_attr( $field['tabtitle'] );

                                                    // Remove icon not display in default tab
                                                    if ( $field['tabuniquekey'] != 'description' && $field['tabuniquekey'] != 'additional_information' && $field['tabuniquekey'] != 'reviews'  ) { ?>

                                                        <a class="button remove-row" href="javascript:void(0);"></a>

                                                    <?php }
                                                } else {

                                                    esc_html_e('Blank Tab', 'hongo-addons');
                                                }
                                            ?>
                                        </h3>

                                        <div class="hongo-single-product-tab-details">
                                            <div class="hongo-single-product-tab-details-title" >

                                                <?php
                                                    if ( $field['tabtitle'] != '' ) {
                                                        $title = esc_attr( $field['tabtitle'] );
                                                    }
                                                    if( $field['tabuniquekey'] == '' ) {
                                                ?>

                                                    <lable><?php esc_html_e('Tab Title', 'hongo-addons'); ?></lable>
                                                    <input type="text" class="hongo_input"  placeholder="<?php esc_html_e('Title', 'hongo-addons'); ?>" name="tabdata[tabtitle][]" value="<?php echo esc_attr( $title ); ?>" />
                                                
                                                <?php } else { ?>

                                                    <input type="hidden" class="hongo_input"  placeholder="<?php esc_html_e('Title', 'hongo-addons'); ?>" name="tabdata[tabtitle][]" value="<?php echo esc_attr( $title ); ?>" />
                                                    <p><?php esc_html_e( 'Show default content', 'hongo-addons' ); ?></p>
                                                <?php } ?>

                                            </div>
                                            <div class="hongo-single-product-tab-details-description">
                                            <?php
                                                if( $field['tabuniquekey'] == '' ) {
                                                    $content  = (! empty( $field['tabdescription'] ) ) ? $field['tabdescription'] : '';
                                                    $settings = array(
                                                        'wpautop' => true,
                                                        'media_buttons' => false,
                                                        'textarea_name' => 'tabdata[tabdescription][]',
                                                        'textarea_rows' => 10,
                                                        'teeny' => true,
                                                        'tinymce' => true,
                                                        'editor_class' => 'hongo-textarea'
                                                    );
                                                    $tabdescription_id = 'edit_post' . $i++;

                                                    wp_editor( $content, $tabdescription_id, $settings );

                                                    ?>
                                                        <input type="hidden" name="tabdata[tabuniquekey][]" value="" />
                                                    <?php

                                                } elseif( $field['tabuniquekey'] == 'description' ){
                                            ?>
                                                    <input type="hidden" name="tabdata[tabdescription][]" />
                                                    <input type="hidden" name="tabdata[tabuniquekey][]" value="description" />
                                            <?php
                                                } elseif( $field['tabuniquekey'] == 'additional_information' ){
                                            ?>
                                                    <input type="hidden" name="tabdata[tabdescription][]" />
                                                    <input type="hidden" name="tabdata[tabuniquekey][]" value="additional_information" />
                                            <?php
                                                } elseif( $field['tabuniquekey'] == 'reviews' ){
                                            ?>
                                                    <input type="hidden" name="tabdata[tabdescription][]" />
                                                    <input type="hidden" name="tabdata[tabuniquekey][]" value="reviews" />
                                            <?php
                                                }
                                            ?>
                                            </div>
                                        </div>

                                    </div>
                            <?php
                                } // end foreach
                            } else { ?>
                                <!-- Description Tab Start -->
                                <div class="hongo-single-product-tab-main-structure">
                                    <h3 class="hongo-single-product-tab-title"><?php esc_html_e( 'Description', 'hongo-addons' ); ?></h3>
                                    <div class="hongo-single-product-tab-details">
                                        <div class="hongo-single-product-tab-details-title" >
                                            <input type="hidden" class="hongo_input"  placeholder="<?php esc_html_e( 'Title', 'hongo-addons' ); ?>" name="tabdata[tabtitle][]" value="<?php esc_html_e( 'Description', 'hongo-addons' ); ?>" />
                                            <p><?php esc_html_e( 'Show default content', 'hongo-addons' ); ?></p>
                                        </div>
                                        <div class="hongo-single-product-tab-details-description">
                                            <input type="hidden" name="tabdata[tabdescription][]" />
                                            <input type="hidden" name="tabdata[tabuniquekey][]" value="description" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Description Tab End -->

                                <!-- Additional Information Tab Start -->
                                <div class="hongo-single-product-tab-main-structure">
                                    <h3 class="hongo-single-product-tab-title"><?php esc_html_e( 'Additional Information', 'hongo-addons' ); ?></h3>
                                    <div class="hongo-single-product-tab-details">
                                        <div class="hongo-single-product-tab-details-title" >
                                            <input type="hidden" class="hongo_input"  placeholder="<?php esc_html_e( 'Title', 'hongo-addons' ); ?>" name="tabdata[tabtitle][]" value="<?php esc_html_e( 'Additional Information', 'hongo-addons' ); ?>" />
                                            <p><?php esc_html_e( 'Show default content', 'hongo-addons' ); ?></p>
                                        </div>
                                        <div class="hongo-single-product-tab-details-description">
                                            <input type="hidden" name="tabdata[tabdescription][]" />
                                            <input type="hidden" name="tabdata[tabuniquekey][]" value="additional_information" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Additional Information Tab End -->

                                <!-- Reviews Tab Start -->
                                <div class="hongo-single-product-tab-main-structure">
                                    <h3 class="hongo-single-product-tab-title"><?php esc_html_e( 'Reviews', 'hongo-addons' ); ?></h3>
                                    <div class="hongo-single-product-tab-details">
                                        <div class="hongo-single-product-tab-details-title" >
                                            <input type="hidden" class="hongo_input"  placeholder="<?php esc_html_e( 'Title', 'hongo-addons' ); ?>" name="tabdata[tabtitle][]" value="<?php esc_html_e( 'Reviews', 'hongo-addons' ); ?>" />
                                            <p><?php esc_html_e( 'Show default content', 'hongo-addons' ); ?></p>
                                        </div>
                                        <div class="hongo-single-product-tab-details-description">
                                            <input type="hidden" name="tabdata[tabdescription][]" />
                                            <input type="hidden" name="tabdata[tabuniquekey][]" value="reviews" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Reviews Tab End -->
                        <?php
                                } ?>
                    </div>
                </div>
                <p><a id="add-row" class="button add-row button-primary" href="javascript:void(0);"><?php echo esc_html__( 'Add a Tab', 'hongo-addons' ); ?></a></p>
            </div>

        <?php
        }
    }
    add_action('woocommerce_product_data_panels', 'hongo_custom_tab_options');

    // Add More Product Tab Ajax Call
    if(! function_exists( 'hongo_custom_tab_details' ) ){
        function hongo_custom_tab_details()
        {
            $newtabid = ( ! empty ( $_POST['tabid'] ) ) ? $_POST['tabid'] : '';
            ?>
            <div class="hongo-single-product-tab-main-structure">
                <h3 class="hongo-single-product-tab-title">
                    <?php
                        echo esc_html__( 'New Tab', 'hongo-addons' );
                    ?>
                    <a class="button remove-row" href="javascript:void(0);"></a>
                </h3>

                <div class="hongo-single-product-tab-details">
                    <div class="hongo-single-product-tab-details-title" >
                        <?php 
                            if( $field['tabuniquekey'] == '' ) {
                        ?>
                            <lable><?php echo esc_html__( 'Tab Title', 'hongo-addons' ); ?></lable>
                            <input type="text" class="hongo_input"  placeholder="<?php echo esc_html__( 'Title', 'hongo-addons' ); ?>" name="tabdata[tabtitle][]" value="" />
                        <?php } else { ?>
                            <input type="hidden" class="hongo_input"  placeholder="<?php echo esc_html__( 'Title', 'hongo-addons' ); ?>" name="tabdata[tabtitle][]" value="" />
                            <p><?php esc_html_e( 'Show default content', 'hongo-addons' ); ?></p>
                        <?php } ?>
                    </div>
                    <div class="hongo-single-product-tab-details-description" >

                    <?php
                        if( $field['tabuniquekey'] == '' ) {
                            $settings = array(
                                'wpautop' => true,
                                'media_buttons' => false,
                                'textarea_name' => 'tabdata[tabdescription][]',
                                'textarea_rows' => 10,
                                'teeny' => true,
                                'tinymce' => true,
                                'editor_class' => 'hongo-textarea'
                            );
                            $tabdescription_id = 'edit_post' . $newtabid;
                            wp_editor( $content, $tabdescription_id, $settings );
                            ?>
                                <input type="hidden" name="tabdata[tabuniquekey][]" value="" />
                            <?php
                        } else { ?>
                            <input type="hidden" name="tabdata[tabdescription][]" />
                            <input type="hidden" name="tabdata[tabuniquekey][]" value="" />
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <input type="hidden" class="newtabid" value="<?php echo esc_attr( $newtabid ); ?>">
            </div>
            <?php
            die();
        }
    }
    add_action( 'wp_ajax_hongo_custom_tab_details', 'hongo_custom_tab_details' );
    add_action( 'wp_ajax_nopriv_hongo_custom_tab_details', 'hongo_custom_tab_details' );

    // Creating Custom Tab in Woocommerce Tabbing
    add_filter('woocommerce_product_tabs', 'custom_product_tabs', 98 );
    if(! function_exists( 'custom_product_tabs' ) ){
        function custom_product_tabs( $tabs )
        {
            global $post, $product;
            $custom_tabbing = get_post_meta( $post->ID, '_hongo_custom_product_tab', true );
            if ( ! empty( $custom_tabbing ) ) {
                $i = 10;
                foreach ( $custom_tabbing as $key => $details ) {

                    $title     = ! empty( $details['tabtitle'] ) ? $details['tabtitle'] : '';
                    $title_key = 'hongo-tab' . $key;
                    $desc      = $details['tabdescription'] ? $details['tabdescription'] : '';

                    if( empty( $details['tabuniquekey'] ) ) {

                        $tabs[ $title_key ] = array(
                            'title' => $title,
                            'priority' => $i,
                            'callback' => 'hongo_product_tab_content'
                        );

                    } elseif( isset( $tabs['description'] ) && isset( $details['tabuniquekey'] ) && $details['tabuniquekey'] == 'description' ) {

                        $tabs['description']['priority'] = $i;

                    } elseif( isset( $tabs['additional_information'] ) && isset( $details['tabuniquekey'] ) && $details['tabuniquekey'] == 'additional_information' ) {

                        $tabs['additional_information']['priority'] = $i;

                    } elseif( isset( $tabs['reviews'] ) && isset( $details['tabuniquekey'] ) && $details['tabuniquekey'] == 'reviews' ) {

                        $tabs['reviews']['priority'] = $i;
                    }
                    $i = $i + 10;

                }
            }
            return $tabs;
        }
    }

    // Add content to custom tab in product single pages (1)
    if(! function_exists( 'hongo_product_tab_content' ) ){
        function hongo_product_tab_content( $key, $tab )
        {
            global $post;
            $custom_tabs = get_post_meta( $post->ID, '_hongo_custom_product_tab', true );
            if( ! empty( $custom_tabs ) ) {
                $hongo_single_product_enable_tab_content_heading = hongo_option( 'hongo_single_product_enable_tab_content_heading', '1' );
                $main   = str_replace( 'hongo-tab', '', $key );
                $title = $custom_tabs[ $main ]['tabtitle'];
                if( ! empty( $title ) ){
                    if( $hongo_single_product_enable_tab_content_heading == '1' ){
                        echo '<h2>'. $title .'</h2>';
                    }
                }
                $desc = $custom_tabs[ $main ]['tabdescription'];
                if( ! empty( $desc ) ) {
                    echo do_shortcode( wpautop( $desc ) );
                }
            }
        }
    }

    /* Hongo product category extra custom fields */

    if( ! function_exists( 'hongo_product_taxonomy_add_meta_field' ) ) :
        function hongo_product_taxonomy_add_meta_field() {
            // Get All Register Sidebar List.
            $sidebar_array = hongo_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="hongo_product_archive_title_subtitle"><?php echo esc_html__( 'Subtitle', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_product_archive_title_subtitle" id="hongo_product_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_bg_image"><?php echo esc_html__( 'Title background image', 'hongo-addons' ); ?></label>
                <input name="hongo_product_archive_title_bg_image" class="upload_field" id="hongo_upload" type="text" value="" />
                <input name="hongo_product_archive_title_bg_image" class="hongo_product_archive_title_bg_image_thumb" id="hongo_product_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" />
                <span class="hongo_remove_button_category button"><?php echo esc_html__( 'Remove', 'hongo-addons' ); ?></span>
            </div>

            <div class="form-field">
                <label for="hongo_product_archive_title_bg_multiple_image"><?php echo esc_html__( 'Slider Images', 'hongo-addons' ); ?></label>
                <input name="hongo_product_archive_title_bg_multiple_image" class="upload_field upload_field_multiple" id="hongo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="hongo_upload_button_multiple_category" id="hongo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'hongo-addons' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_video_type"><?php echo esc_html__( 'Video Type', 'hongo-addons' ); ?></label>
                <select name="hongo_product_archive_title_video_type" id="hongo_product_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'hongo-addons' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'hongo-addons' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'hongo-addons' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_video_mp4"><?php echo esc_html__( 'MP4', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_product_archive_title_video_mp4" id="hongo_product_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_video_ogg"><?php echo esc_html__( 'OGG', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_product_archive_title_video_ogg" id="hongo_product_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_video_webm"><?php echo esc_html__( 'WEBM', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_product_archive_title_video_webm" id="hongo_product_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_product_archive_title_video_youtube"><?php echo esc_html__( 'External Video Url', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_product_archive_title_video_youtube" id="hongo_product_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
        <?php
        }
    endif;
    add_action( 'product_cat_add_form_fields', 'hongo_product_taxonomy_add_meta_field', 99, 2 );
    add_action( 'product_tag_add_form_fields', 'hongo_product_taxonomy_add_meta_field', 99, 2 );
    add_action( 'product_brand_add_form_fields', 'hongo_product_taxonomy_add_meta_field', 99, 2 );

    if ( ! function_exists( 'hongo_product_taxonomy_edit_meta_field' ) ) :
        function hongo_product_taxonomy_edit_meta_field($term) {
         
            // put the term ID into a variable
            $hongo_t_id = $term->term_id;
         
            // retrieve the existing value(s) for this meta field. This returns an array

            $hongo_product_archive_title_subtitle = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_subtitle',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_subtitle',true ) : '';

            $hongo_product_archive_title_bg_image = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_image',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_image',true ) : '';

            $hongo_product_archive_title_bg_multiple_image = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_multiple_image',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_multiple_image',true ) : '';

            $hongo_product_archive_title_video_type = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_type',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_type',true ) : '';       
            $hongo_product_archive_title_video_mp4 = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_mp4',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_mp4',true ) : '';
            $hongo_product_archive_title_video_ogg = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_ogg',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_ogg',true ) : '';
            $hongo_product_archive_title_video_webm = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_webm',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_webm',true ) : '';
            $hongo_product_archive_title_video_youtube = ! empty( get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_youtube',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_youtube',true ) : '';

            ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_subtitle"><?php echo esc_html__( 'Subtitle', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_product_archive_title_subtitle" id="hongo_product_archive_title_subtitle" value="<?php echo esc_attr( $hongo_product_archive_title_subtitle ); ?>" class="category-custom-field-input">
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_bg_image"><?php echo esc_html__( 'Title background image', 'hongo-addons' ); ?></label></th>
                <td>
                    <input name="hongo_product_archive_title_bg_image" class="upload_field" id="hongo_upload" type="text" value="<?php echo esc_url( $hongo_product_archive_title_bg_image ); ?>" />
                    <input name="hongo_product_archive_title_bg_image" class="hongo_product_archive_title_bg_image_thumb" id="hongo_product_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $hongo_product_archive_title_bg_image ); ?>" />
                    <img class="upload_image_screenshort" src="<?php echo esc_url( $hongo_product_archive_title_bg_image ); ?>" />
                    <input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" />
                    <span class="hongo_remove_button_category button"><?php echo esc_html__( 'Remove', 'hongo-addons' ); ?></span>
                </td>
            </tr>

            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_bg_multiple_image"><?php echo esc_html__( 'Slider Images', 'hongo-addons' ); ?></label></th>
                <td>
                    <input name="hongo_product_archive_title_bg_multiple_image" class="upload_field upload_field_multiple" id="hongo_upload" type="hidden" value="" />
                    <div class="multiple_images">
                        <?php
                        $hongo_val = ! empty( $hongo_product_archive_title_bg_multiple_image ) ? explode( ",", $hongo_product_archive_title_bg_multiple_image[0] ) : array();
                        if( ! empty( $hongo_val ) ) {
                            foreach ( $hongo_val as $key => $value ) {
                                if( ! empty( $value ) ) {
                                    $hongo_image_url = wp_get_attachment_url( $value );
                                    echo '<div id='.esc_attr($value).'>';
                                        echo '<img class="upload_image_screenshort_multiple width-100px" src="'.esc_url( $hongo_image_url ).'" />';
                                        echo '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'hongo-addons' ).'</a>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <input class="hongo_upload_button_multiple_category" id="hongo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'hongo-addons' ); ?>
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_video_type"><?php echo esc_html__( 'Video Type', 'hongo-addons' ); ?></label></th>
                <td>
                    <select name="hongo_product_archive_title_video_type" id="hongo_product_archive_title_video_type" class="category-custom-field-select">
                        <option value="default" <?php echo esc_attr( $hongo_product_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'hongo-addons' ); ?></option>
                        <option value="self" <?php echo esc_attr( $hongo_product_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'hongo-addons' ); ?></option>
                        <option value="external" <?php echo esc_attr( $hongo_product_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'hongo-addons' ); ?></option>
                    </select>
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_video_mp4"><?php echo esc_html__( 'MP4', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_product_archive_title_video_mp4" id="hongo_product_archive_title_video_mp4" value="<?php echo esc_attr( $hongo_product_archive_title_video_mp4 ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_video_ogg"><?php echo esc_html__( 'OGG', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_product_archive_title_video_ogg" id="hongo_product_archive_title_video_ogg" value="<?php echo esc_attr( $hongo_product_archive_title_video_ogg ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_video_webm"><?php echo esc_html__( 'WEBM', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_product_archive_title_video_webm" id="hongo_product_archive_title_video_webm" value="<?php echo esc_attr( $hongo_product_archive_title_video_webm ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_product_archive_title_video_youtube"><?php echo esc_html__( 'External Video Url', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_product_archive_title_video_youtube" id="hongo_product_archive_title_video_youtube" value="<?php echo esc_attr( $hongo_product_archive_title_video_youtube ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
        <?php
        }
    endif;
    add_action( 'product_cat_edit_form_fields', 'hongo_product_taxonomy_edit_meta_field', 99, 2 );
    add_action( 'product_tag_edit_form_fields', 'hongo_product_taxonomy_edit_meta_field', 99, 2 );
    add_action( 'product_brand_edit_form_fields', 'hongo_product_taxonomy_edit_meta_field', 99, 2 );

    if ( ! function_exists( 'hongo_save_product_taxonomy_custom_meta' ) ) :
        function hongo_save_product_taxonomy_custom_meta( $hongo_term_id ) {
            $hongo_t_id = $hongo_term_id;            
            if ( isset( $_POST['hongo_product_archive_title_subtitle'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_subtitle', $_POST['hongo_product_archive_title_subtitle']  );
            }
            if( isset( $_POST['hongo_product_archive_title_bg_image'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_image', $_POST['hongo_product_archive_title_bg_image']  );
            }
            if( isset( $_POST['hongo_product_archive_title_bg_multiple_image'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_bg_multiple_image', $_POST['hongo_product_archive_title_bg_multiple_image']  );
            }
            if( isset( $_POST['hongo_product_archive_title_video_type'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_type', $_POST['hongo_product_archive_title_video_type']  );
            }
            if( isset( $_POST['hongo_product_archive_title_video_mp4'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_mp4', $_POST['hongo_product_archive_title_video_mp4']  );
            }
            if( isset( $_POST['hongo_product_archive_title_video_ogg'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_ogg', $_POST['hongo_product_archive_title_video_ogg']  );
            }
            if( isset( $_POST['hongo_product_archive_title_video_webm'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_webm', $_POST['hongo_product_archive_title_video_webm']  );
            }
            if( isset( $_POST['hongo_product_archive_title_video_youtube'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_product_archive_title_video_youtube', $_POST['hongo_product_archive_title_video_youtube']  );
            }
        }  
    endif;
    add_action( 'edited_product_cat', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'create_product_cat', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'edited_product_tag', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'create_product_tag', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'edited_product_brand', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'create_product_brand', 'hongo_save_product_taxonomy_custom_meta', 10, 2 );

    if ( ! function_exists( 'hongo_product_alternate_image_content' ) ) :
        function hongo_product_alternate_image_content( $post ) {

            $id = 'product_alternate_image';

            $alternate_img_id = get_post_meta( $post->ID, '_hongo_product_alternate_image', true );

            $nonce = wp_create_nonce( $id.$post->ID );

            if( $alternate_img_id ) {
                $link_title = wp_get_attachment_image( $alternate_img_id, 'full', false, array( 'style' => 'width:100%;height:auto;', ) );
                $hide_remove_button = '';
            }
            else {
                $alternate_img_id = -1;
                $link_title = esc_html__( 'Add alternate product image', 'hongo-addons' );
                $hide_remove_button = 'display: none;';
            }
            ?>

            <p class="hide-if-no-js hongo-alternate-image-container-<?php echo esc_attr( $id ); ?>">
                <a href="#" class="hongo-alternate-add-media hongo-alternate-media-edit hongo-alternate-media-edit-<?php echo esc_attr( $id ); ?>" data-title="<?php esc_html_e( 'Alternate image', 'hongo-addons' ); ?>" data-button="<?php esc_html_e( 'Use as alternate product image', 'hongo-addons' ); ?>" data-id="<?php echo esc_attr( $id ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>" data-postid="<?php echo esc_attr( $post->ID ); ?>" style="display: inline-block;">
                    <?php echo wp_kses_post ( $link_title ); ?>
                </a>
            </p>

            <p class="hide-if-no-js howto" style="<?php echo esc_attr( $hide_remove_button ); ?>"><?php esc_html_e( 'Click the image to edit or update', 'hongo-addons' ); ?></p>

            <p class="hide-if-no-js hide-if-no-image-<?php echo esc_attr( $id ); ?>" style="<?php echo esc_attr( $hide_remove_button ); ?>">
                <a href="#" class="hongo-alternate-media-delete hongo-alternate-media-delete-<?php echo esc_attr( $id ); ?>" data-title="<?php esc_html_e( 'Alternate image', 'hongo-addons' ); ?>" data-button="<?php esc_html_e( 'Use as alternate product image', 'hongo-addons' ); ?>" data-id="<?php echo esc_attr( $id ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-label_set="<?php esc_html_e( 'Add alternate product image', 'hongo-addons' ); ?>">
                    <?php esc_html_e( 'Remove alternate product image', 'hongo-addons' ); ?>        
                </a>
            </p>

            <?php
        }
    endif;

    /*  For 360 Images */
    if( ! function_exists( 'hongo_product_360_image_content' ) ) {
        function hongo_product_360_image_content( $post ) {
            ?>
            <div id="hongo_360_product_container">
                <ul class="hongo_360_product_images_wrap">
                    <?php
                    $product_image_gallery = get_post_meta( $post->ID, '_hongo_product_360_images', true );

                    $attachments         = explode(',',$product_image_gallery);
                    $update_meta         = false;
                    $updated_gallery_ids = array();

                    if ( ! empty( $attachments ) ) {
                        foreach ( $attachments as $attachment_id ) {
                            $attachment = wp_get_attachment_image( $attachment_id, 'thumbnail' );

                            // if attachment is empty skip.
                            if ( empty( $attachment ) ) {
                                $update_meta = true;
                                continue;
                            }

                            echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                                    ' . $attachment . '
                                    <ul class="actions">
                                        <li><a href="#" class="delete tips" data-tip="' . esc_attr__( 'Delete image', 'hongo-addons' ) . '">' . __( 'Delete', 'hongo-addons' ) . '</a></li>
                                    </ul>
                                </li>';

                            // rebuild ids to be saved.
                            $updated_gallery_ids[] = $attachment_id;
                        }

                        // need to update product meta to set new gallery ids
                        if ( $update_meta ) {
                            update_post_meta( $post->ID, '_hongo_product_360_images', implode( ',', $updated_gallery_ids ) );
                        }
                    }
                    ?>
                </ul>

                <input type="hidden" id="hongo_360_product_gallery" name="hongo_360_product_gallery" value="<?php echo esc_attr( implode( ',', $updated_gallery_ids ) ); ?>" />

            </div>
            <p class="add_product_360_images hide-if-no-js">
                <a href="#" data-choose="<?php esc_attr_e( 'Add 360 Product images', 'hongo-addons' ); ?>" data-update="<?php esc_attr_e( 'Add to 360 Product gallery', 'hongo-addons' ); ?>" data-delete="<?php esc_attr_e( 'Delete 360 Product image', 'hongo-addons' ); ?>" data-text="<?php esc_attr_e( 'Delete', 'hongo-addons' ); ?>"><?php _e( 'Add 360 product images', 'hongo-addons' ); ?></a>
            </p>
        <?php
        }
    }

    if ( ! function_exists( 'hongo_add_meta_box' ) ) :
        function hongo_add_meta_box() {

            add_meta_box( 'hongo-product-alternate-image', esc_html__( 'Alternate image', 'hongo-addons' ), 'hongo_product_alternate_image_content', 'product', 'side', 'low' );

            add_meta_box( 'hongo-product-360-image', esc_html__( '360 image', 'hongo-addons' ), 'hongo_product_360_image_content', 'product', 'side', 'low' );

        }
    endif;

    add_action( 'add_meta_boxes', 'hongo_add_meta_box' );

    if ( ! function_exists( 'hongo_ajax_set_alternate_image' ) ) :
        function hongo_ajax_set_alternate_image() {

            $alt_img_id = intval( $_POST['alt_img_id'] );
            $postid = intval( $_POST['postid'] );
            $id = $_POST['id'];

            check_ajax_referer( $id.$postid, 'sec' );

            if( wp_attachment_is_image( $alt_img_id ) ) {
                echo wp_get_attachment_image( $alt_img_id, 'full', false, array( 'style' => 'width:100%;height:auto;', ) );
                update_post_meta( $postid, '_hongo_product_alternate_image', $alt_img_id );
            }

            wp_die();
        }
    endif;

    if ( ! function_exists( 'hongo_ajax_remove_alternate_image' ) ) :
        function hongo_ajax_remove_alternate_image() {

            $postid = intval( $_POST['postid'] );
            $label_set = $_POST['label_set'];
            $id = $_POST['id'];

            check_ajax_referer( $id.$postid, 'sec' );

            delete_post_meta( $postid, '_hongo_product_alternate_image' );

            echo esc_attr( $label_set );

            wp_die();
        }  
    endif;

    add_action( 'wp_ajax_set_alternate_image', 'hongo_ajax_set_alternate_image' );
    add_action( 'wp_ajax_remove_alternate_image', 'hongo_ajax_remove_alternate_image' );
}


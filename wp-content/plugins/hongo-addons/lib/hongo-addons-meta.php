<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    /* Hongo category extra custom fields */
    if( ! function_exists( 'hongo_category_add_meta_field' ) ) :
        function hongo_category_add_meta_field() {

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="hongo_archive_title_subtitle"><?php echo esc_html__( 'Subtitle', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_archive_title_subtitle" id="hongo_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_bg_image"><?php echo esc_html__( 'Title background image', 'hongo-addons' ); ?></label>
                <input name="hongo_archive_title_bg_image" class="upload_field" id="hongo_upload" type="text" value="" />
                <input name="hongo_archive_title_bg_image" class="hongo_archive_title_bg_image_thumb" id="hongo_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" />
                <span class="hongo_remove_button_category button"><?php echo esc_html__( 'Remove', 'hongo-addons' ); ?></span>
            </div>

            <div class="form-field">
                <label for="hongo_archive_title_bg_multiple_image"><?php echo esc_html__( 'Slider Images', 'hongo-addons' ); ?></label>
                <input name="hongo_archive_title_bg_multiple_image" class="upload_field upload_field_multiple" id="hongo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="hongo_upload_button_multiple_category" id="hongo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'hongo-addons' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_video_type"><?php echo esc_html__( 'Video Type', 'hongo-addons' ); ?></label>
                <select name="hongo_archive_title_video_type" id="hongo_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'hongo-addons' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'hongo-addons' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'hongo-addons' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_video_mp4"><?php echo esc_html__( 'MP4', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_archive_title_video_mp4" id="hongo_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_video_ogg"><?php echo esc_html__( 'OGG', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_archive_title_video_ogg" id="hongo_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_video_webm"><?php echo esc_html__( 'WEBM', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_archive_title_video_webm" id="hongo_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="hongo_archive_title_video_youtube"><?php echo esc_html__( 'External Video Url', 'hongo-addons' ); ?></label>
                <input type="text" name="hongo_archive_title_video_youtube" id="hongo_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
            </div>

        <?php
        }
    endif;
    add_action( 'category_add_form_fields', 'hongo_category_add_meta_field', 10, 2 );
    add_action( 'post_tag_add_form_fields', 'hongo_category_add_meta_field', 10, 2 );

    if ( ! function_exists( 'hongo_taxonomy_edit_meta_field' ) ) :
        function hongo_taxonomy_edit_meta_field($term) {
         
            // put the term ID into a variable
            $hongo_t_id = $term->term_id;
            
            $hongo_archive_title_subtitle = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_subtitle',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_subtitle',true ) : '';

            $hongo_archive_title_bg_image = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_bg_image',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_bg_image',true ) : '';

            $hongo_archive_title_bg_multiple_image = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_bg_multiple_image',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_bg_multiple_image',true ) : '';
            $hongo_archive_title_video_type = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_video_type',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_video_type',true ) : '';
            $hongo_archive_title_video_mp4 = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_video_mp4',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_video_mp4',true ) : '';
            $hongo_archive_title_video_ogg = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_video_ogg',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_video_ogg',true ) : '';
            $hongo_archive_title_video_webm = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_video_webm',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_video_webm',true ) : '';
            $hongo_archive_title_video_youtube = ! empty( get_term_meta( $hongo_t_id, 'hongo_archive_title_video_youtube',true ) ) ? get_term_meta( $hongo_t_id, 'hongo_archive_title_video_youtube',true ) : '';
            
            ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_subtitle"><?php echo esc_html__( 'Subtitle', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_archive_title_subtitle" id="hongo_archive_title_subtitle" value="<?php echo esc_attr( $hongo_archive_title_subtitle ); ?>" class="category-custom-field-input">
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_bg_image"><?php echo esc_html__( 'Title background image', 'hongo-addons' ); ?></label></th>
                <td>
                    <input name="hongo_archive_title_bg_image" class="upload_field" id="hongo_upload" type="text" value="<?php echo esc_url( $hongo_archive_title_bg_image ); ?>" />
                    <input name="hongo_archive_title_bg_image" class="hongo_archive_title_bg_image_thumb" id="hongo_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $hongo_archive_title_bg_image ); ?>" />
                    <img class="upload_image_screenshort" <?php echo esc_url( $hongo_archive_title_bg_image ); ?> />
                    <input class="hongo_upload_button_category" id="hongo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" />
                    <span class="hongo_remove_button_category button"><?php echo esc_html__( 'Remove', 'hongo-addons' ); ?></span>
                </td>
            </tr>

            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_bg_multiple_image"><?php echo esc_html__( 'Slider Images', 'hongo-addons' ); ?></label></th>
                <td>
                    <input name="hongo_archive_title_bg_multiple_image" class="upload_field upload_field_multiple" id="hongo_upload" type="hidden" value="" />
                    <div class="multiple_images">
                        <?php
                        $hongo_val = explode(",",$hongo_archive_title_bg_multiple_image);
                        foreach ($hongo_val as $key => $value) {
                            if(! empty($value)):
                                $hongo_image_url    = wp_get_attachment_url( $value );
                                $hongo_img_alt      = hongo_option_image_alt( $value );
                                $hongo_img_title    = hongo_option_image_title( $value );
                                $hongo_image_alt    = ! empty( $hongo_img_alt['alt'] ) ? ' alt="'.esc_attr( $hongo_img_alt['alt'] ).'"' : ' alt="'. esc_attr__( 'Image', 'hongo-addons' ) .'"';
                                $hongo_image_title  = ! empty( $hongo_img_title['title'] ) ? ' title="'.esc_attr( $hongo_img_title['title'] ).'"' : '';

                                echo '<div id='.esc_attr($value).'>';
                                    echo '<img class="upload_image_screenshort_multiple width-100px"'.$hongo_image_alt.$hongo_image_title.' src="'.esc_url( $hongo_image_url ).'" />';
                                    echo '<a href="javascript:void(0)" class="remove">'.esc_attr__( 'Remove', 'hongo-addons' ).'</a>';
                                echo '</div>';
                            endif;
                        }
                        ?>
                    </div>
                    <input class="hongo_upload_button_multiple_category" id="hongo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'hongo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'hongo-addons' ); ?>
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_video_type"><?php echo esc_html__( 'Video Type', 'hongo-addons' ); ?></label></th>
                <td>
                    <select name="hongo_archive_title_video_type" id="hongo_archive_title_video_type" class="category-custom-field-select">
                        <option value="default" <?php echo esc_html( $hongo_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'hongo-addons' ); ?></option>
                        <option value="self" <?php echo esc_html( $hongo_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'hongo-addons' ); ?></option>
                        <option value="external" <?php echo esc_html( $hongo_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'hongo-addons' ); ?></option>
                    </select>
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_video_mp4"><?php echo esc_html__( 'MP4', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_archive_title_video_mp4" id="hongo_archive_title_video_mp4" value="<?php echo esc_attr( $hongo_archive_title_video_mp4 ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_video_ogg"><?php echo esc_html__( 'OGG', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_archive_title_video_ogg" id="hongo_archive_title_video_ogg" value="<?php echo esc_attr( $hongo_archive_title_video_ogg ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_video_webm"><?php echo esc_html__( 'WEBM', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_archive_title_video_webm" id="hongo_archive_title_video_webm" value="<?php echo esc_attr( $hongo_archive_title_video_webm ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="hongo_archive_title_video_youtube"><?php echo esc_html__( 'External Video Url', 'hongo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="hongo_archive_title_video_youtube" id="hongo_archive_title_video_youtube" value="<?php echo esc_attr( $hongo_archive_title_video_youtube ); ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Background video title style.', 'hongo-addons' ); ?></p>
                </td>
            </tr>
        <?php
        }
    endif;
    add_action( 'category_edit_form_fields', 'hongo_taxonomy_edit_meta_field', 10, 2 );
    add_action( 'post_tag_edit_form_fields', 'hongo_taxonomy_edit_meta_field', 10, 2 );

    if ( ! function_exists( 'hongo_save_taxonomy_custom_meta' ) ) :
        function hongo_save_taxonomy_custom_meta( $hongo_term_id ) {
            $hongo_t_id = $hongo_term_id;
            if ( isset( $_POST['hongo_archive_title_subtitle'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_subtitle', $_POST['hongo_archive_title_subtitle']  );
            }
            if ( isset( $_POST['hongo_archive_title_bg_image'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_bg_image', $_POST['hongo_archive_title_bg_image']  );
            }
            if ( isset( $_POST['hongo_archive_title_bg_multiple_image'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_bg_multiple_image', $_POST['hongo_archive_title_bg_multiple_image']  );
            }
            if ( isset( $_POST['hongo_archive_title_video_type'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_video_type', $_POST['hongo_archive_title_video_type']  );
            }
            if ( isset( $_POST['hongo_archive_title_video_mp4'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_video_mp4', $_POST['hongo_archive_title_video_mp4']  );
            }
            if ( isset( $_POST['hongo_archive_title_video_ogg'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_video_ogg', $_POST['hongo_archive_title_video_ogg']  );
            }
            if ( isset( $_POST['hongo_archive_title_video_webm'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_video_webm', $_POST['hongo_archive_title_video_webm']  );
            }
            if ( isset( $_POST['hongo_archive_title_video_youtube'] ) ) {
                update_term_meta( $hongo_t_id, 'hongo_archive_title_video_youtube', $_POST['hongo_archive_title_video_youtube']  );
            }
        }  
    endif;
    add_action( 'edited_category', 'hongo_save_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_category', 'hongo_save_taxonomy_custom_meta', 10, 2 );
    add_action( 'edited_post_tag', 'hongo_save_taxonomy_custom_meta', 10, 2 );
    add_action( 'create_post_tag', 'hongo_save_taxonomy_custom_meta', 10, 2 );
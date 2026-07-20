!function($) {
	"use strict";

    /* jQuery For Preview Slider Image */
    $('.hongo-preview-image-main').parent().parent().find('.wpb_element_label').hide();
    var all_styles = '.hongo_accordion_style,.hongo_alert_message_premade_style,.hongo_blockquote_style,.hongo_blog_premade_style,.hongo_button_style,.hongo_call_to_action_style,.hongo_client_image_slider_style,.hongo_block_premade_style,.hongo_counter_style,.hongo_product_feature_type,.image_gallery_type,.hongo_instagram_style,.hongo_list_style,.hongo_newsletter_style,.hongo_popup_type,.hongo_product_banner_style,.hongo_brand_style,.hongo_category_style,.hongo_product_slider_style,.hongo_progress_style,.hongo_heading_type,.hongo_shop_banner_style,.hongo_slider_style,.hongo_social_style,.hongo_select_preview_image,.hongo_pricing_style,.hongo_team_member_slider_style,.hongo_team_member_style,.hongo_testimonial_style,.hongo_testimonial_slider_style,.tabs_style,.text_slider_style,.hongo_timer_style,.hongo_video_type, .hongo_gmap_style, .hongo_newsletter_popup_style, .hongo_separator_style, .hongo_shop_style, .hongo_section_product_feature_type';
    $( all_styles ).each( preview_image );
    $( all_styles ).bind('change keyup', preview_image );

    function preview_image(){
        var current_selected_reload = $(this).val();
        $(this).parent().parent().parent().find('.hongo-preview-image-main').hide();
        if(current_selected_reload != ''){
            $(this).parent().parent().parent().find('.hongo-preview-image-main').show();
            var preview_src = $(this).parent().parent().parent().find('.hongo-preview-image-main').data('url')+'/'+current_selected_reload+'.jpg';        
            $(this).parent().parent().parent().find('.hongo-preview-image-main img').attr('src',preview_src);
        }
    }

    /* Search Icon */
    $( document ).on( 'click', '.search_icon_button', function() {

        var dest = $(this).parent().find(".search_icon_text").val();

        //alert(dest);

        $( this ).parents( '.edit_form_line' ).find( '.hongo_icon_preview' ).removeClass( 'hide' );
        if( dest != '' && dest != undefined ) {

            $( this ).parents( '.edit_form_line' ).find( ".hongo_icon_preview i" ).map( function() {

                var selected_icon = $( this ).attr( 'data-name' );
                dest = dest.toLowerCase();
                if( selected_icon.indexOf( dest ) < 0 ) {
                    $( this ).parent().addClass( 'hide' );
                }
            });
        }
    });

    /* Clear Search Icon */
    $( document ).on( 'click', '.clear_search_icon_button', function() {

        $( this ).parents( '.edit_form_line' ).find( '.search_icon_text' ).val( '' );
        $( this ).parents( '.edit_form_line' ).find( '.hongo_icon_preview' ).removeClass( 'hide' );
    });

    /* jQuery Click Event For Icon */
    $('.hongo_icon_preview').on('click', function() {
        if( $(this).hasClass('active_icon') ){
            $(this).removeClass('active_icon');
            $(this).parent().parent().find('.hongo_icon_field').val('');
        }else{
            $('.hongo_icon_preview').removeClass('active_icon');
            $(this).addClass('active_icon');
            var selected_icon = $(this).children().attr('data-name');
            $(this).parent().parent().find('.hongo_icon_field').val(selected_icon);
        }
    });

    /* Row parallax hide block */
    $( 'select.parallax' ).bind('change keyup', function(e) {
        var current_selected = $(this).val();
        if( current_selected ) {
            $(this).parents( '.vc_panel-tabs' ).find( '.hongo_bg_image_type' ).parent().parent().hide();
            $(this).parents( '.vc_panel-tabs' ).find( '.hongo_bg_image_type' ).val('');
            $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).parent().parent().hide();
            $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).val('');
            $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).hide();
            $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position select' ).val('');
            $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).prev().hide();
        } else {
            $(this).parents( '.vc_panel-tabs' ).find( '.hongo_bg_image_type' ).parent().parent().show();
            $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).parent().parent().show();
            $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).show();
            $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).prev().show();
        }
    });

    /* Social icons sorting */
    $( ".hongo-social-icon-sorting" ).sortable({
        update : function () {
            var arr = [];
            jQuery( '.hongo-social-icon-sorting li' ).each(function( index ) {
                if( jQuery( this ).attr( 'data-key' ) != '' && jQuery( this ).attr( 'data-key' ) != undefined ) {
                    arr.push( jQuery( this ).attr( 'data-key' ) );
                }
            });
            jQuery( this ).parents( '.edit_form_line' ).find( '.hongo-social-icon-sorting-list' ).val( arr ).trigger( 'change' );
        }
    });

    /* First list open for param_group type ( accordion list ) */
    $( document ).on( 'click', '.vc_edit-form-tab-control, .wpb-select', function() {
        if( $( '.vc_param_group-list' ).length > 0 ) {
            if( $( '.vc_param_group-list li.vc_param' ).length == 1 || ( $( '.vc_param_group-list li.vc_param' ).length == 2 && !$( '.vc_param_group-list li:eq(1)' ).hasClass( 'vc_param' ) ) ) {
                $( '.vc_param_group-list li.vc_param:first-child' ).removeClass( 'vc_param_group-collapsed' ).children( '.wpb_element_wrapper' ).show();
            }
        }
    });

}(window.jQuery);
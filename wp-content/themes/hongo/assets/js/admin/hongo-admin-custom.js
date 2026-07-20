( function( $ ) {

    "use strict";

    $( document ).ready(function() {
    
        // For Meta Accordian Active class
        if( $( '.hongo_meta_box_tab' ).hasClass('active') ) {

            $( '.hongo_meta_box_tab' ).find( '.separator_box:first' ).addClass( 'active' );
        }
        
        /* For Product Meta accordian */
        $( document ).on( 'click', '.separator_box', function() {

            if( $( this ).hasClass( 'active' ) ) {
                
                $( this ).parents( '.separator_main_start_main_content_wrap' ).find('.active').removeClass('active');

            } else {

                $( this ).parents( '.separator_main_start_main_content_wrap' ).find('.active').removeClass('active');
                $( this ).toggleClass( 'active' );
            }
        });
        
        /* For product attributes*/
        $('.hongo-attribute-color , .hongo-attribute-image').hide();
        $('.hongo-attribute-image , .hongo-attribute-color').val(null);
       
        if ( $('.hongo-attribute-type').val() == 'hongo_color' ) {
            $('.hongo-attribute-color').show();
            $('.hongo-attribute-image').val(null);
            $('.hongo-attribute-image').hide();
        } else if ( $('.hongo-attribute-type').val() == 'hongo_image' ) {
            $('.hongo-attribute-image').show();
            $('.hongo-attribute-color').val(null);
            $('.hongo-attribute-color').hide();
        }else{
            $('.hongo-attribute-image , .hongo-attribute-color').hide();
            $('.hongo-attribute-image , .hongo-attribute-color').val(null);
        }
        
        $('.hongo-attribute-type').on('change',function(){
            if ( $(this).val() == 'hongo_color' ) {
                $('.hongo-attribute-color').show();
                $('.hongo-attribute-image').val(null);
                $('.hongo-attribute-image').hide();
            } else if ( $(this).val() == 'hongo_image' ) {
                $('.hongo-attribute-image').show();
                $('.hongo-attribute-color').val(null);
                $('.hongo-attribute-color').hide();
            }else{
                $('.hongo-attribute-image , .hongo-attribute-color').hide();
                $('.hongo-attribute-image , .hongo-attribute-color').val(null);
            }
        });
        
        /* For Mega Menu*/
        // show or hide megamenu fields on parent and child list items
        hongo_menu_item_mouseup_event();
        hongo_megamenu_status_update();
        hongo_update_megamenu_field_classes();
        hongo_megamenu_image_status_update();
        hongo_update_megamenu_image_field_classes();
        hongo_megamenu_item_center_status();
        hongo_update_megamenu_item_center_status();
        
        /* On mouseup event check megamenu status and add class or remove class */
        function hongo_menu_item_mouseup_event(){
            $( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
                if( ! $( event.target ).is( 'a' )) {
                    setTimeout( hongo_update_megamenu_field_classes, 300 );
                }
            });
        }

         /*Customizer Icon selector */
        $( ".hongo-icon-select i" ).on( "click", function() {
            var current_click = $(this);
            current_click.parent().parent().parent().find('.active').removeClass('active');
            current_click.parent().parent().addClass('active');
        });
          
        /* Check if Mega Menu is enable for parent */
        function hongo_megamenu_status_update(){

            $( document ).on( 'click', '.edit-menu-item-hongo-mega-menu-item-status', function() {
              
                var parent_li_item = $( this ).parents( 'li.menu-item:eq( 0 )' );

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.addClass( 'hongo-megamenu-active' );
                } else  {
                    parent_li_item.removeClass( 'hongo-megamenu-active' );
                }
                hongo_update_megamenu_field_classes();
            });
        }
        
        /* Check onload which menu is checked and add class "hongo-megamenu-active" */
        function hongo_update_megamenu_field_classes(){
            var hongo_menu_li_items = $( '.menu-item');
            
            hongo_menu_li_items.each( function( i )   {
                var hongo_megamenu_status = $( '.edit-menu-item-hongo-mega-menu-item-status', this );
                
                if( ! $( this ).is( '.menu-item-depth-0' ) ) {
                    var check_item = hongo_menu_li_items.filter( ':eq(' + (i-1) + ')' );

                    if( check_item.is( '.hongo-megamenu-active' ) ) {
                        hongo_megamenu_status.attr( 'checked', 'checked' );
                        $( this ).addClass( 'hongo-megamenu-active' );
                    } else {
                        hongo_megamenu_status.attr( 'checked', '' );
                        $( this ).removeClass( 'hongo-megamenu-active' );
                    }
                } else {
                    if( hongo_megamenu_status.attr( 'checked' ) ) {
                        $( this ).addClass( 'hongo-megamenu-active' );
                    }
                }
            });
        }

        /* Check if Mega Menu is enable for parent */
        function hongo_megamenu_image_status_update(){

            $( document ).on( 'click', '.edit-menu-item-hongo-mega-menu-enable-icon-image-status', function() {
              
                var parent_li_item = $( this ).parent( 'li.menu-item:eq( 0 )' );

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.addClass( 'hongo-custom-image' );
                } else  {
                    parent_li_item.removeClass( 'hongo-custom-image' );
                }
                hongo_update_megamenu_image_field_classes();
            });
        }
        
        /* Check onload which menu is checked and add class "hongo-megamenu-active" */
        function hongo_update_megamenu_image_field_classes(){
            var hongo_menu_li_items = $( '.menu-item');
            
            hongo_menu_li_items.each( function( i )   {
                var hongo_megamenu_status = $( '.edit-menu-item-hongo-mega-menu-enable-icon-image-status', this );                    
                if( hongo_megamenu_status.attr( 'checked' ) ) {
                    $( this ).addClass( 'hongo-custom-image' );
                } else{
                    $( this ).removeClass( 'hongo-custom-image' );
                }                
            });
        }

        /* Check if Mega Menu is enable for parent */
        function hongo_megamenu_item_center_status(){

            $( document ).on( 'click', '.edit-menu-item-hongo-mega-menu-item-center-status', function() {
              
                var parent_li_item = $( this ).parents( 'li.menu-item:eq( 0 )' );

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.addClass( 'hongo-megamenu-active' );
                } else  {
                    parent_li_item.removeClass( 'hongo-megamenu-active' );
                }
                hongo_update_megamenu_item_banner();
            });
        }
        
        /* Check onload which menu is checked and add class "hongo-megamenu-active" */
        function hongo_update_megamenu_item_center_status(){
            var hongo_menu_li_items = $( '.menu-item');
            
            hongo_menu_li_items.each( function( i )   {
                var hongo_megamenu_status = $( '.edit-menu-item-hongo-mega-menu-item-center-status', this );
                
                if( ! $( this ).is( '.menu-item-depth-0' ) ) {
                    var check_item = hongo_menu_li_items.filter( ':eq(' + (i-1) + ')' );

                    if( check_item.is( '.hongo-megamenu-active' ) ) {
                        hongo_megamenu_status.attr( 'checked', 'checked' );
                        $( this ).addClass( 'hongo-megamenu-active' );
                    } else {
                        hongo_megamenu_status.attr( 'checked', '' );
                        $( this ).removeClass( 'hongo-megamenu-active' );
                    }
                } else {
                    if( hongo_megamenu_status.attr( 'checked' ) ) {
                        $( this ).addClass( 'hongo-megamenu-active' );
                    }
                }
            });
        }

        var counter = 1;
        $( "#menu-to-edit .hongo-menu-icons" ).each(function( index ) {
            var MenuIconOptions = $(this).html();
            $(this).parent().find(".menu-icon-item").append( MenuIconOptions );
            $(this).remove();
            counter++;
        });

        function MenuIconCallback( state ) {
            if( !state.id ) {
                return state.text;
            }
            var icontext = state.text;
            if( icontext.indexOf( "fa-" ) >= 0 ) {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>  ' + icontext + '</span>' );
            } else {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>  ' + icontext + '</span>' );
            }
            return $state;
        };

        $( ".menu-icon-item-wrapper" ).select2({
            templateResult: MenuIconCallback,
            templateSelection: MenuIconCallback
        });

        /* Customizer image selector */
        $( ".hongo-image-select img" ).on( "click", function() {
            var current_click = $(this);
            current_click.parent().parent().parent().find('.active').removeClass('active');
            current_click.parent().parent().addClass('active');
        });

        /* jQuery For Instagram Widget */
        $(document).on('change','.instagram-style-type select',function(){
            var Current = $(this);
            var SelectedValue = $(this).val();
            Current.parent().parent().find('.instagram-select-option').hide();
            $('.instagram-'+SelectedValue+'-option').show();
        });

        /* jQuery Enable Click Event For Switch in customizer */
        $('li.hongo-switch-option').on( 'click', function(){
            var currentParent = $(this).parent();
            var currentParents = $(this).parent().parent();
            currentParent.find('.active').removeClass('active');
            $(this).addClass('active');
        });

        /* jQuery alphaColorPicker Event For Colorpicker in customizer */
        var alpha_color = $( '.alpha-color-control' );
        alpha_color.each( function (){
            $(this).alphaColorPicker();
        });

        $( document ).on( 'click', '.hongo-custom-upload-image', function( event ) {
        // Uploading files
        var file_frame;
            event.preventDefault();
            var currentdiv = $(this).parent();
            
            // If the media frame already exists, reopen it.
            if ( file_frame ) {
                    file_frame.open();
                    return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.downloadable_file = wp.media({
                    title: 'Upload Image',
                    button: {
                            text: 'Upload Menu Image'
                    },
                    multiple: false
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
                var attachment = file_frame.state().get( 'selection' ).first().toJSON();                
                currentdiv.find( 'input' ).val( attachment.url );
                currentdiv.find( '.hongo-thumb-img-preview img' ).attr( 'src', attachment.url );
                currentdiv.find( '.hongo-thumb-img-preview img' ).removeClass( 'display-none' );
                currentdiv.find( '.remove-image-button' ).removeClass( 'hidden' );
                currentdiv.find( '.remove-image-button' ).show();
            });

            // Finally, open the modal.
            file_frame.open();
        });

        jQuery( document ).on( 'click', '.remove-image-button', function() {
            var currentdiv = jQuery(this).parent();            
            currentdiv.find( '.hongo-thumb-img-preview img' ).attr( 'src', '' );
            currentdiv.find( '.hongo-thumb-img-preview img' ).addClass( 'display-none' );
            currentdiv.find( 'input' ).val( '' );
            currentdiv.find( '.remove-image-button' ).hide();
            return false;
        });

    });

    $( document ).ajaxComplete(function() {

        var counter = 1;
        $( "#menu-to-edit .hongo-menu-icons" ).each(function( index ) {
            var MenuIconOptions = $(this).html();
            $(this).parent().find(".menu-icon-item").append( MenuIconOptions );
            $(this).remove();
            counter++;
        });

        function MenuIconCallback( state ) {
            if( !state.id ) {
                return state.text;
            }
            var icontext = state.text;
            if( icontext.indexOf( "fa-" ) >= 0 ) {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            } else {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            }
            return $state;
        };

        $( ".menu-icon-item-wrapper" ).select2({
            templateResult: MenuIconCallback,
            templateSelection: MenuIconCallback
        });

    });

    $( document ).on( 'click', '.hongo_upload_button_category , .hongo_upload_attribute', function(event) {
            var file_frame;
          var button = $(this);

          var button_parent = $(this).parent();
        var id = button.attr('id').replace('_button_category', '');
          if (event.originalEvent.defaultPrevented) return; //event.preventDefault();
          

          // If the media frame already exists, reopen it.
          if ( file_frame ) {
            file_frame.open();
            return;
          }

          // Create the media frame.
          file_frame = wp.media.frames.file_frame = wp.media({
            title: $( this ).data( 'uploader_title' ),
            button: {
              text: $( this ).data( 'uploader_button_text' ),
            },
            multiple: false  // Set to true to allow multiple files to be selected
          });

          // When an image is selected, run a callback.
          file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var full_attachment = file_frame.state().get('selection').first().toJSON();

            var attachment = file_frame.state().get('selection').first();

            var thumburl = attachment.attributes.sizes.thumbnail;
            var thumb_hidden = button_parent.find('.upload_field').attr('name');

            if ( thumburl || full_attachment ) {
            button_parent.find("#"+id).val(full_attachment.url);
            button_parent.find("."+thumb_hidden+"_thumb").val(full_attachment.url);
            
            button_parent.find(".upload_image_screenshort").attr("src", full_attachment.url);
            button_parent.find(".upload_image_screenshort_view").attr("src", full_attachment.url);
            //button_parent.find(".upload_image_screenshort").show();
            button_parent.find(".upload_image_screenshort").slideDown();
            button_parent.find(".upload_image_screenshort_view").slideDown();
          }
          });

          // Finally, open the modal
          file_frame.open();
      });
      
      // Remove button function to remove attach image and hide screenshort Div.
      $( document ).on( 'click', '.hongo_remove_button_category,.hongo_remove_attribute', function(event) {
        var remove_parent = $(this).parent();
        remove_parent.find('.upload_field').val('');
        remove_parent.find('input[type="hidden"]').val('');
        remove_parent.find('.upload_image_screenshort').slideUp();
        remove_parent.find('.upload_image_screenshort_view').slideUp();
      });

      // On page load add all image url to show in screenshort.
      $('.upload_field').each(function(){
        if($(this).val()){
          $(this).parent().find('.upload_image_screenshort').attr("src", $(this).parent().find('input[type="hidden"]').val());
        }else{
          $(this).parent().find('.upload_image_screenshort').hide();
        }
      });

      /* multiple image upload */
      
        $( document ).on( 'click', '.hongo_upload_button_multiple_category', function(event) {
              var file_frame;
            var button = $(this);

            var button_parent = $(this).parent();
          var id = button.attr('id').replace('_button_category', '');
          var app=[];
            if (event.originalEvent.defaultPrevented) return; //event.preventDefault();
            

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: true  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {

              var thumb_hidden = button_parent.find('.upload_field_multiple').attr('name');
             
              var selection = file_frame.state().get('selection');
              var app=[];
                selection.map( function( attachment ) {
                var attachment = attachment.toJSON();
                button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
              });
            });
            // Finally, open the modal
            file_frame.open();
        });

        $(".button-primary").on('click',function(){
          var pr_div;
          $('.multiple_images').each(function(){
            if($(this).children().length > 0){
              var attach_id = [];
              var pr_div = $(this).parent();
              $(this).children('div').each(function(){
                  attach_id.push($(this).attr('id'));            
              });
              
              pr_div.find('.upload_field_multiple').val(attach_id);
            }else{
              $(this).parent().find('.upload_field_multiple').val('');
            }
          });   
        });

        /* Hongo License - START CODE */
        $( '.hongo-license' ).on( 'click', function(e) {
            e.preventDefault();

            if( $( this ).attr( 'disabled' ) ){
                return false;
            }

            var currentVar = $(this);
            var data = {
                action: 'hongo_active_theme_license',
            };

            var request = $.getJSON({
                url: ajaxurl,
                type: 'POST',
                data: data
            });
            request.success(function(response) {
                response && response.status ? window.location = response.url : alert( hongo_license_messages.response_failed );
            });

            request.fail(function(jqXHR, textStatus) {
                alert( 'Request failed: ' + textStatus );
            });

        });

        $(".multiple_images").on('click','.remove', function() {
          $(this).parent().slideUp();
          $(this).parent().remove();
        });

        if( $( '.hongo-color-picker' ).length > 0 ) {
          $( '.hongo-color-picker' ).wpColorPicker();
        }
    
        /* To add alternate image for product */
        $( document ).on( 'click', '.hongo-alternate-add-media', function(event) {
            event.preventDefault();

            var id      = $(this).data('id');
            var postid  = $(this).data('postid');
            var title   = $(this).data('title');
            var button  = $(this).data('button');
            var nonce   = $(this).data('nonce');

            // Create file frame.
            var file_frame = wp.media.frames.file_frame = wp.media({
                title: title,
                button: {
                    text: button
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // Hande file frame event
            file_frame.on( 'select', function() {
                var attachment = file_frame.state().get('selection').first().toJSON();

                $.post( ajaxurl, {
                    action: 'set_alternate_image',
                    alt_img_id: attachment.id,
                    postid: postid,
                    id: id,
                    sec: nonce
                }, function( response ) {
                   if( response ) {
                     $( '.hongo-alternate-image-container-' + id + ' a' ).html( response );

                     $('.hide-if-no-image-' +  id).show();
                     $('.hide-if-no-image-' +  id).parent().find('.howto').show();
                   } 
                });                    
            });            

            // Open file frame
            file_frame.open();
        });

        /* To remove alternate image for product */
        $( document ).on( 'click', '.hongo-alternate-media-delete', function(event) {
            event.preventDefault();

            var id        = $(this).data('id');
            var postid    = $(this).data('postid');
            var nonce     = $(this).data('nonce');
            var label_set = $(this).data('label_set');

            $.post( ajaxurl, {
                action: 'remove_alternate_image',
                postid: postid,
                id: id,
                label_set: label_set,
                sec: nonce
            }, function( response ) {
               $( '.hongo-alternate-image-container-' + id + ' a' ).html( response );

               $('.hide-if-no-image-' +  id).hide();
               $('.hide-if-no-image-' +  id).parent().find('.howto').hide();
            });
        });

        // 360 Product Image Gallery Start
        var product_gallery_frame;
        var $image_gallery_ids = $( '#hongo_360_product_gallery' );
        var $product_images    = $( '#hongo_360_product_container' ).find( 'ul.hongo_360_product_images_wrap' );

        $( '.add_product_360_images' ).on( 'click', 'a', function( event ) {
            var $el = $( this );

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( product_gallery_frame ) {
                product_gallery_frame.open();
                return;
            }

            // Create the media frame.
            product_gallery_frame = wp.media.frames.product_gallery = wp.media({
                // Set the title of the modal.
                title: $el.data( 'choose' ),
                button: {
                    text: $el.data( 'update' )
                },
                states: [
                    new wp.media.controller.Library({
                        title: $el.data( 'choose' ),
                        filterable: 'all',
                        multiple: true
                    })
                ]
            });

            // When an image is selected, run a callback.
            product_gallery_frame.on( 'select', function() {
                var selection = product_gallery_frame.state().get( 'selection' );
                var attachment_ids = $image_gallery_ids.val();

                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();

                    if ( attachment.id ) {
                        attachment_ids   = attachment_ids ? attachment_ids + ',' + attachment.id : attachment.id;
                        var attachment_image = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;

                        $product_images.append( '<li class="image" data-attachment_id="' + attachment.id + '"><img src="' + attachment_image + '" /><ul class="actions"><li><a href="#" class="delete" title="' + $el.data('delete') + '">' + $el.data('text') + '</a></li></ul></li>' );
                    }
                });

                $image_gallery_ids.val( attachment_ids );
            });

            // Finally, open the modal.
            product_gallery_frame.open();
        });

        // Image ordering.
        $product_images.sortable({
            items: 'li.image',
            cursor: 'move',
            scrollSensitivity: 40,
            forcePlaceholderSize: true,
            forceHelperSize: false,
            helper: 'clone',
            opacity: 0.65,
            placeholder: 'wc-metabox-sortable-placeholder',
            start: function( event, ui ) {
                ui.item.css( 'background-color', '#f6f6f6' );
            },
            stop: function( event, ui ) {
                ui.item.removeAttr( 'style' );
            },
            update: function() {
                var attachment_ids = '';

                $( '#hongo_360_product_container' ).find( 'ul li.image' ).css( 'cursor', 'default' ).each( function() {
                    var attachment_id = $( this ).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );
            }
        });

        // Remove images.
        $( '#hongo_360_product_container' ).on( 'click', 'a.delete', function() {
            $( this ).closest( 'li.image' ).remove();

            var attachment_ids = '';

            $( '#hongo_360_product_container' ).find( 'ul li.image' ).css( 'cursor', 'default' ).each( function() {
                var attachment_id = $( this ).attr( 'data-attachment_id' );
                attachment_ids = attachment_ids + attachment_id + ',';
            });

            $image_gallery_ids.val( attachment_ids );

            // Remove any lingering tooltips.
            $( '#tiptip_holder' ).removeAttr( 'style' );
            $( '#tiptip_arrow' ).removeAttr( 'style' );

            return false;
        });
        // 360 Product Image Gallery End

        // Add More to add Accordian in Product Deatils Page
        $( document ).on( 'click', '.add-row', function() {
            
            var tab_id = '';
            var children        = $( '#hongo-custom-product-tab-repeater' ).find( '.hongo-single-product-tab-main-structure' ).find( '.hongo-textarea' );
            var children_length = $( '#hongo-custom-product-tab-repeater' ).find( '.hongo-single-product-tab-main-structure' ).find( '.hongo-textarea' ).length;             
            if( children_length > 0 ) {

                var element = [];
                children.each( function () {
                    tab_id = $( this ).attr( 'id' );
                    tab_id = tab_id.replace( 'edit_post', '');
                    element.push( tab_id );
                });
                var max= Math.max.apply( Math, element );
                var t_id = max + 1;
            } else {
                var t_id = 1;
            }
            var hongo_global_content =  tinyMCEPreInit.mceInit.content;          
            var new1 = $( '#hongo-custom-product-tab-repeater .hongo-single-product-tab-main-structure:last-child' ).parent().html();        
            $.ajax({
                type : 'POST',
                url  : ajaxurl, 
                data : {
                    'action':'hongo_custom_tab_details',
                    'tabid' : t_id
                },
                success:function( response ) {                    
                    $( '#hongo-custom-product-tab-repeater #hongo-accordion-product-tab' ).append( response );                
                    var newtab    = $( '.newtabid' ).val();
                    var editor_id = 'edit_post' + t_id;
                    $( '#hongo-accordion-product-tab' ).accordion( 'refresh' );
                    tinymce.init( hongo_global_content );
                    tinyMCE.execCommand( 'mceAddEditor', true, editor_id );                  
                    quicktags({
                        id : editor_id
                    });
                    
                },
                error: function(errorThrown){                    
                }
            });
        });

        // Remove Accordian Tab in admin Product page
        $( document ).on( 'click', '.remove-row', function() {
            if ( confirm( 'Are you sure you want to remove?' ) ) {
                $( this ).parents( 'div.hongo-single-product-tab-main-structure' ).remove();
                return false;
            }
        });

        // Create Product Tab accordian in admin side
        if( $( '#hongo-accordion-product-tab' ).length > 0 ) { 
            $( '#hongo-accordion-product-tab' ).accordion({
                collapsible : true,
                active      : false,
                height      : 'fill',
                header      : 'h3'
            }).sortable({
                axis        : 'y',
                handle      : 'h3',
                items       : '.hongo-single-product-tab-main-structure'
            });
        }

        // Vc Templates
        $( document ).on( 'click', '#vc_templates-editor-button', function() {
            
            $( document ).on( 'click', 'li.filter-tab', function() {
                var value = $( this ).find( 'a' ).attr( 'data-filter' );
                
                $( this ).parents( '.filter-template' ).find( 'li' ).removeClass( 'active' );
                $( this ).addClass( 'active' );

                $( '.hongo-filter-tab-content' ).hide();
                if( value == '*' ) {
                    $( '.hongo-filter-tab-content' ).fadeIn( 800 );
                } else {
                    $( '.hongo-filter-tab-content' ).filter( '.' + value ).fadeIn( 800 );
                }
                if ( $( '.hongo-templates-wrap' ).length > 0 ) {
                    $( '.hongo-templates-wrap' ).parents( '.vc_ui-panel-content-container' ).stop()
                            .animate({
                                'scrollTop': 0
                            }, 800 );
                }
            });
            $( 'li.filter-tab' ).removeClass( 'active' );
            $( 'li.filter-tab:first' ).addClass( 'active');            
        });
        
})( jQuery );
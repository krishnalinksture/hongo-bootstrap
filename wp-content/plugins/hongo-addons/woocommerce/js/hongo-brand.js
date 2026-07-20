(function($) {
  	"use strict";

	// Only show the "remove image" button when needed
    if ( !$( '.product_brand_thumbnail_main #product_brand_thumbnail_id' ).val() ) {
            $( '.product_brand_thumbnail_main .remove_image_button' ).hide();
    }
    if ( !$( '.product_brand_logo_main #product_brand_logo_id' ).val() ) {
            $( '.product_brand_logo_main .remove_image_button' ).hide();
    }

    
    $( document ).on( 'click', '.upload_image_button', function( event ) {
        // Uploading files
        var file_frame;
            event.preventDefault();
            var currentdiv = $(this).parent().parent();
            
            // If the media frame already exists, reopen it.
            if ( file_frame ) {
                    file_frame.open();
                    return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.downloadable_file = wp.media({
                    title: hongoBrand.choose_image_text,
                    button: {
                            text: hongoBrand.use_image_text
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

    $( document ).on( 'click', '.remove_image_button', function() {
        var currentdiv = $(this).parent().parent();
            currentdiv.find( '.thumb_img_preview img' ).attr( 'src', hongoBrand.placeholder_image );
            currentdiv.find( '.product_brand_thumb_id   ' ).val( '' );
            currentdiv.find( '.remove_image_button' ).hide();
            return false;
    });    
})(jQuery);
( function( $ ) {

    "use strict";
    
    /* Window ready event start code */
    $(document).ready(function () {

        /* Auto Complete Search Category */
        if( $.inArray( 'jquery-ui-autocomplete', hongoAddons.disable_scripts ) < 0 ) {
            $( '.without-popup .search-input' ).on( 'focus', function() {

                var hongo_products = '';
                var productCategory = '';
                if( $( '.hongo-product-search-categories' ).length > 0 ) {

                    productCategory = $( '.hongo-product-search-categories' ).val();
                }                
                $.ajax({
                    type: 'POST',
                    url: hongoAddons.ajaxurl,

                    data: {
                        'action':'hongo_ajax_hongo_autocomplete_search',
                        'category' : productCategory
                    },
                    success:function(response) {

                        hongo_products = $.parseJSON( response );
                        $( '.search-input' ).autocomplete({
                            source: hongo_products,
                            minLength: 2,
                            select: function(event, ui) {
                                var permalink = ui.item.permalink; // Get permalink from the datasource
                                window.location.replace(permalink);
                            },
                            response: function(event, ui) {
                                if (!ui.content.length) {
                                    $("#big_search_no_results").text( hongoAddons.noproductmessage ).show();
                                } else {
                                    $("#big_search_no_results").empty().hide();
                                }
                            }
                        });
                    }
                });
            });
        }

    }); /* Window ready event end code */

})( jQuery );
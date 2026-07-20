( function( $ ) {

    "use strict";
    
    /* Window ready event start code */
    $(document).ready(function () {
        
        // Product Count down
        hongoProductDeal();

        $( document ).on( 'hongo_shop_lists_refresh_after_isotope', function() {
            hongoProductDeal();
        });
    });

    function hongoProductDeal() {        
        if( $( '.hongo-product-deal-wrap' ).length > 0 && $.inArray( 'countdown', hongoAddons.disable_scripts ) < 0 ) {
            $( '.hongo-product-deal-wrap' ).each( function() {
                var $date = $( this ).attr( 'data-end-date' );
                if( hongoAddons.moment_timezone ) {
                    var $enddate = moment.tz( $(this).attr( 'data-end-date' ), $(this).attr('data-timezone'));
                    $date = $enddate.toDate();
                }
                if( $date != '' && $date != undefined ) {
                    $(this).countdown( $date, function (event) {
                        $( this ).html(
                            event.strftime( '' 
                                + '<span class="hongo-product-deal-days">%D<span>' + hongoAddons.product_deal_day + '</span></span>'
                                + '<span class="hongo-product-deal-hours">%H<span>' + hongoAddons.product_deal_hour + '</span></span>'
                                + '<span class="hongo-product-deal-mins">%M<span>' + hongoAddons.product_deal_min + '</span></span>'
                                + '<span class="hongo-product-deal-secs">%S<span>' + hongoAddons.product_deal_sec + '</span></span>'
                            )
                        );
                    });
                }
            });
        }
    }

})( jQuery );
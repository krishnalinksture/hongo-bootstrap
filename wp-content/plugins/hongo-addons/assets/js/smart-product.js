( function( $ ) {

    "use strict";
    
    /* Window ready event start code */
    $(document).ready(function () {        
    	if( hongoAddons.enable_smart_product == '1' ) {
            if( hongoAddons.enable_mobile_smart_product == '1' && $(window).width() < 768 ) {
                return false;
            } else {
                if( hongoAddons.display_smart_product_after == 'some-time' ) {
                    var smart_product_cookie = 'hongo-smart-product'+hongoAddons.site_id;                    
                    var smart_product = getHongoAddonsCookie( smart_product_cookie );                    
                    if( smart_product != 'shown' ) {
                        setTimeout(function() {
                            showsmartProduct();
                        }, hongoAddons.delay_time_smart_product );
                    }
                } else {
                    $(window).scroll(function () {                        
                        var smart_product_cookie = 'hongo-smart-product'+hongoAddons.site_id;
                        var smart_product = getHongoAddonsCookie( smart_product_cookie );
                        if ( $(document).scrollTop() >= hongoAddons.scroll_smart_product && smart_product != 'shown' ) {
                            showsmartProduct();
                        }
                    });
                }
            }
        }

    }); /* Window ready event end code */

    /*Promo Popup*/
    function showsmartProduct() {        
        if( ( hongoAddons.enable_smart_product ) == '1' ) {
            var cookie_name = 'hongo-smart-product'+hongoAddons.site_id;
            var smart_product = getHongoAddonsCookie( cookie_name );            
            $( document ).on( 'click', '.hongo-smart-product-close', function() {
                setHongoAddonsCookie( cookie_name, 'shown', hongoAddons.expired_days_smart_product );
                $( '.hongo-smart-product-wrap' ).css( 'display','none' );
            }); 
            $( '.hongo-smart-product-wrap' ).css( 'display','block' );          
        }
    }

    /* Remove Hongo Cookie Function */
    function getHongoAddonsCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    /* Set Hongo Cookie Function */
    function setHongoAddonsCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = ( exdays != 0 && exdays != '' ) ? d.toUTCString() : 0;
        document.cookie = cname + "=" + cvalue + ";expires=" + expires + ";path=/";
    }

})( jQuery );
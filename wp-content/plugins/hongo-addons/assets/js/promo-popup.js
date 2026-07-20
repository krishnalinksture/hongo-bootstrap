( function( $ ) {

    "use strict";
    
    /* Window ready event start code */
    $(document).ready(function () {

    	if( hongoAddons.enable_promo_popup == '1' ) {
            if( hongoAddons.enable_mobile_promo_popup == '1' && $(window).width() < 768 ) {
                return false;
            } else {
                if( hongoAddons.display_promo_popup_after == 'some-time' ) {
                    var promo_cookie_name = 'hongo-promo-popup'+hongoAddons.site_id;
                    var promo_popup = getHongoAddonsCookie( promo_cookie_name );
                    if( promo_popup != 'shown' ) {
                        setTimeout(function(){
                            showpromoPopup();
                        }, hongoAddons.delay_time_promo_popup );
                    }
                } else {
                    $(window).scroll(function () {
                        var promo_cookie_name = 'hongo-promo-popup'+hongoAddons.site_id;
                        var promo_popup = getHongoAddonsCookie( promo_cookie_name );
                        if ( $(document).scrollTop() >= hongoAddons.scroll_promo_popup && promo_popup != 'shown' ) {
                            showpromoPopup();
                        }
                    });
                }
            }
        }

    }); /* Window ready event end code */

    /*Promo Popup*/
    function showpromoPopup() {
        if( $.inArray( 'jquery-magnific-popup', hongoAddons.disable_scripts ) < 0 && ( hongoAddons.enable_promo_popup ) == '1' ) {
            var cookie_name = 'hongo-promo-popup'+hongoAddons.site_id;
            var promo_popup = getHongoAddonsCookie( cookie_name );
            $( '#hongo-promo-show-popup' ).change(function() {
                setHongoAddonsCookie( cookie_name, 'shown', hongoAddons.expired_days_promo_popup );
            });
            $( '.hongo-promo-popup-wrap' ).css( 'display','block' );
            $.magnificPopup.open({
                items: {
                    src: '.hongo-promo-popup-wrap'
                },
                fixedContentPos: true,
                type: 'inline',
                removalDelay: 10,
            });
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
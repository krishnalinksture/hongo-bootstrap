( function( $ ) {

    "use strict";

    // For Notice accordian
    if( $( '#import-export-desc' ).length > 0 ) {

        $( '#import-export-desc' ).accordion({
            collapsible : true,
            active      : false,
            height      : 'fill',
            header      : 'h3'
        });
    }

    // Full and Single Import Button Click code start
    $( document ).on( 'click', '.hongo-import-button-trigger', function() {

        /* Return false if current element has disable attribute */
        if( $( this ).attr( 'disabled' ) ) {

            return false;
        }

        $( this ).addClass( 'active' );

        var setupKey    = $( this ).attr( 'data-demo-import' ); // full_data or single_data
        var currentTab  = $( this ).parents( 'li' );        
        var parentTab   = $( this ).parents( 'ul' );

        if( setupKey == 'full_data' ) {
            var contentHeight = currentTab.find( '.import-content-full-wrap' ).outerHeight();
        } else {
            var contentHeight = currentTab.find( '.import-content-single-wrap' ).outerHeight();
        }        
        
        // Call function after closed content block
        hongoTriggerCloseContentBlock( currentTab );

        if( ! $( currentTab ).hasClass( 'active-tab' ) ) { // Not active content

            if( $( parentTab ).find( 'li.active-tab' ).length > 0 ) { //  !== 0

                $( '.active-tab' ).find( '.import-content-full-wrap' ).slideUp();
                $( '.active-tab' ).find( '.import-content-single-wrap' ).slideUp();
                $( '.active-tab' ).find( '.active-inner-tab' ).removeClass( 'active-inner-tab' );
                $( '.active-tab' ).css( 'margin', '0' );
                $( '.active-tab' ).find( '.active' ).removeClass( 'active' );
                $( '.active-tab' ).removeClass( 'active-tab' );
            }

            if( setupKey == 'full_data' ) { // Full import

                $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).addClass( 'active-inner-tab' );
                $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).slideDown();

            } else { // Single import

                $( '.hongo-import-button' ).attr( 'disabled', false );
                $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap .hongo-import-button' ).attr( 'disabled', false );
                $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).addClass( 'active-inner-tab' );
                $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).slideDown();
            }
            $( currentTab ).addClass( 'active-tab' );
            currentTab.css( 'margin-bottom', contentHeight );

        } else { // Active content

            if( setupKey == 'full_data' ) { // Full import

                if( $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).hasClass( 'active-inner-tab' ) ) {
                    
                    var contentHeight = currentTab.find( '.import-content-full-wrap' ).outerHeight();
                    $( currentTab ).find( '.hongo-single-import-button' ).removeClass( 'active' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).removeClass( 'active-inner-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).slideUp();
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).addClass( 'active-inner-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).slideDown();
                    currentTab.css( 'margin-bottom', contentHeight );

                } else {
                    
                    $( currentTab ).find( '.hongo-full-import-button' ).removeClass( 'active' );
                    currentTab.removeClass( 'active-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).slideUp( 'slow' );
                    currentTab.css( 'margin-bottom', '0' );
                }

            } else { // Single import

                if( $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).hasClass( 'active-inner-tab' ) ) {
                    
                    var contentHeight = currentTab.find( '.import-content-single-wrap' ).outerHeight();
                    $( currentTab ).find( '.hongo-full-import-button' ).removeClass( 'active' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).removeClass( 'active-inner-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-full-wrap' ).slideUp();
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).addClass( 'active-inner-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).slideDown();
                    currentTab.css( 'margin-bottom', contentHeight );

                } else {
                    
                    $( currentTab ).find( '.hongo-single-import-button' ).removeClass( 'active' );
                    currentTab.removeClass( 'active-tab' );
                    $( this ).parent( '.import-inner-content-wrap' ).siblings( '.import-content-single-wrap' ).slideUp();
                    currentTab.css( 'margin-bottom', '0' );   
                }
            }
        }
    });
    // Full and Single Import Button Click code end

    // Hongo Close content block in single and full import code start
    $( document ).on( 'click', '.hongo-import-close', function( e ) {

        e.preventDefault();

        /* Return false if current element has disable attribute */
        if( $( this ).attr( 'disabled' ) ) {

            return false;
        }

        var currentTab = $( this ).parents( '.active-tab' );
        $( currentTab ).find( '.hongo-full-import-button' ).removeClass( 'active' );
        var importSingleParent = $( this ).parents( 'li' ).find('.single-layout-wrapper');

        currentTab.removeClass( 'active-tab' );
        $( this ).parents( '.import-inner-content-wrap' ).find( '.active' ).removeClass( 'active' );
        importSingleParent.slideUp( 'slow' );
        $( '.hongo-import-button' ).attr( 'disabled', false );
        $( this ).parents( '.import-content-single-wrap' ).removeClass( 'active-inner-tab' ).slideUp( 'slow' );
        $( this ).parents( '.import-content-full-wrap' ).removeClass( 'active-inner-tab' ).slideUp( 'slow' );
        currentTab.css( 'margin-bottom', '0' );
        
        // Call function after closed content block
        hongoTriggerCloseContentBlock( currentTab );
    });
    // Hongo Close content block in single and full import code end

    //hongo check all posts while checked all content from full import
    $( document ).on( 'change', '.hongo-checkbox-all', function() {

        $( '.active-tab .hongo-checkbox' ).prop( 'checked', $( this ).prop( "checked" ) );
    });

    //hongo change all content based on checked individual checkbox
    $( '.hongo-checkbox' ).on( 'click', function() {

        if( $( '.hongo-checkbox' ).length == $( '.hongo-checkbox:checked' ).length ) {

            $( '.hongo-checkbox-all' ).prop( "checked", true );

        } else {

            $( '.hongo-checkbox-all' ).prop( "checked", false );
        }
    });

    // Select all pages / posts in individual import section
    var all_checkboxs_key = [ "post", "page", "product", "sectionbuilder" ];
    $.each( all_checkboxs_key, function ( index, value ) {
        
        //hongo check all Posts, Pages, Products, & Section Builder checkbox
        $( document ).on( 'change', '.' + value + '-main .hongo-single-import-checkbox-all', function() {

            $( '.active-tab .' + value + '-main .hongo-single-checkbox' ).prop( 'checked', $( this ).prop( "checked" ) );
        });

        //hongo check all Posts, Pages, Products, & Section Builder checked individual checkbox
        $('.' + value + '-main .hongo-single-checkbox').on('click', function() {

            if( $( '.active-tab .' + value + '-main .hongo-single-checkbox' ).length == $( '.hongo-single-checkbox:checked' ).length ) {

                $( '.active-tab .' + value + '-main .hongo-single-import-checkbox-all' ).prop( "checked", true );

            } else {

                $( '.active-tab .' + value + '-main .hongo-single-import-checkbox-all' ).prop( "checked", false );
            }
        });
    });    

    // Import delete demo data and media
    $( '.hongo-demo-delete' ).on( 'click', function( e ) {
        e.preventDefault();

        /* Return false if current element has disable attribute */
        if( $( this ).attr( 'disabled' ) ) {

            return false;
        }

        // Content block hide
        $( '.hongo-import-close' ).trigger( 'click' );

        /* Add disable attribute in all element to block import click */
        hongoDisableButton( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );

        var deleteKey = $( this ).attr( 'data-delete-key' );
        var deleteProceedFlag = false;

        if( deleteKey == 'media' ) { // Delete demo media

            var confirmMsg = confirm( hongoImport.delete_media_confirmation );
            if( confirmMsg ) {

                // Add loader
                hongoAddLoader( this );

                // Proceed to delete demo media
                deleteProceedFlag = true;
            }

        } else if( deleteKey == 'data' ) { // Delete demo data

            var confirmMsg = confirm( hongoImport.delete_data_confirmation );
            if( confirmMsg ) {

                // Add loader
                hongoAddLoader( this );

                // Proceed to delete demo data
                deleteProceedFlag = true;
            }
        }

        // Check flag for ready to import / delete process
        if( deleteProceedFlag == true ) {

            hongoDemoDelete( deleteKey );

        } else {

            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        }

    });

    $( '.hongo-demo-import' ).on( 'click', function( e ) {
        e.preventDefault();

        /* Return false if current element has disable attribute */
        if( $( this ).attr( 'disabled' ) ) {

            return false;
        }

        /* Add disable attribute in all element to block import click */
        hongoDisableButton( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        
        var setupKey = $( this ).attr( 'data-demo-import' );
        var demoKey  = $( this ).attr( 'demo-data' );
        var importProceedFlag = false;
        var importFullOptions = [];

        if( setupKey == 'full' ) { // Full import

            var fullImportSelected = [];

            $( '.hongo-checkbox' ).each( function( key, option ) {

                if( $( this ).is( ":checked" ) ) {
                    
                    fullImportSelected.push( $( option ).val() );
                    importFullOptions.push( $( option ).val() );

                } else if( $( this ).is( ":not(:checked)" ) ) {

                    $( this ).attr( 'disabled', 'disabled' );
                }
            });
            if( $( '.hongo-checkbox-all' ).is( ":not(:checked)" ) ) {

                $( '.hongo-checkbox-all' ).attr( 'disabled', 'disabled' );
            }

            // Check at least empty post id and display info message
            if( importFullOptions.length === 0 ) {

                alert( hongoImport.no_single_layout );

                importProceedFlag = false;

                // Remove loader
                hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );

                var currentTab = $( this ).parents( '.active-tab' );
                
                // Call function after closed content block
                hongoTriggerCloseContentBlock( currentTab );

                return false;

            } else {

                var confirmMsg = confirm( hongoImport.full_import_confirmation );
                if( confirmMsg ) {

                    // Add loader
                    hongoAddLoader( this );

                    // Proceed to import demo data
                    importProceedFlag = true;
                }
            }

        } else if( setupKey == 'import-single' ) { // Individual import ids

            var importSingles = [],
                posts_ids = [],
                pages_ids = [],
                products_ids = [],
                builder_ids = [];

            $( '.active-tab .hongo-single-post-import-choice .hongo-single-checkbox:checked' ).each( function( key, option ) {
                posts_ids.push( $( option ).val() );
            });
            $( '.active-tab .hongo-single-page-import-choice .hongo-single-checkbox:checked' ).each( function( key, option ) {
                pages_ids.push( $( option ).val() );
            });
            $( '.active-tab .hongo-single-product-import-choice .hongo-single-checkbox:checked' ).each( function( key, option ) {
                products_ids.push( $( option ).val() );
            });
            $( '.active-tab .hongo-single-sectionbuilder-import-choice .hongo-single-checkbox:checked' ).each( function( key, option ) {
                builder_ids.push( $( option ).val() );
            });

            // Individual Posts in one array
            if( posts_ids.length > 0 ) {
                importSingles.push({ posts: posts_ids.toString() });
            }
            if( pages_ids.length > 0 ) {
                importSingles.push({ pages: pages_ids.toString() });
            }
            if( products_ids.length > 0 ) {
                importSingles.push({ products: products_ids.toString() });
            }
            if( builder_ids.length > 0 ) {
                importSingles.push({ section_builder: builder_ids.toString() });
            }

            // Check at least empty post id and display info message
            if( importSingles.length === 0 ) {

                alert( hongoImport.no_single_layout );

                importProceedFlag = false;

                // Remove loader
                hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );

                return false;

            } else {

                var confirmMsg = confirm( hongoImport.single_import_confirmation );
                if( confirmMsg ) {

                    // Add loader
                    hongoAddLoader( this );

                    // Proceed to import demo data 
                    importProceedFlag = true;
                }
            }
        }

        // Check flag for ready to import / delete process
        if( importProceedFlag == true ) {

            if( setupKey == 'full' ) { // Full import

                var totalImportCount = importFullOptions.length;
                var activeProgessObj = $( '.' + demoKey + '-demo.active-tab .import-content-full-wrap .import-progress-bar-wrap' );
                activeProgessObj.removeClass( 'progressed' ).fadeIn();
                activeProgessObj.find( '.import-progress-percentage' ).html( '' ).width( '0px' );
                activeProgessObj.find( '.import-progress-msg' ).html( 'Processing...' );

                // Increase content height
                var contentHeight = $( '.' + demoKey + '-demo .active-inner-tab' ).outerHeight();
                $( '.' + demoKey + '-demo.active-tab' ).css( 'margin-bottom', contentHeight );

                hongoFullDemoImport( importFullOptions, demoKey, setupKey, totalImportCount, fullImportSelected );

            } else { // Individual import

                var activeProgessObj = $( '.' + demoKey + '-demo.active-tab .import-content-single-wrap .import-progress-bar-wrap' );
                activeProgessObj.removeClass( 'progressed' ).fadeIn();
                activeProgessObj.find( '.import-progress-percentage' ).html( '' ).width( '0px' );
                activeProgessObj.find( '.import-progress-msg' ).html( 'Processing...' );

                // Increase content height
                var contentHeight = $( '.' + demoKey + '-demo .active-inner-tab' ).outerHeight();
                $( '.' + demoKey + '-demo.active-tab' ).css( 'margin-bottom', contentHeight );

                hongoIndividualDemoImport( importSingles, demoKey, setupKey );
            }

        } else {

            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );

            var currentTab = $( this ).parents( '.active-tab' );
            
            // Call function after closed content block
            hongoTriggerCloseContentBlock( currentTab );

            return false;
        }
    });

    // Import full demo data
    function hongoFullDemoImport( importFullOptions, demoKey, setupKey, totalImportCount, fullImportSelected ) {
        
        var importOption    = importFullOptions.shift(),
            totalWeight     = hongoTotalWeight( fullImportSelected ),
            remainingWeight = hongoTotalWeight( importFullOptions ),
            currentWeight   = totalWeight - remainingWeight;

        if( importOption != '' && importOption != undefined ) {

            var importSingles = [];
            var ajaxData = {
                action: 'hongo_import_sample_data',
                full_import_options: importOption,
                setup_key: setupKey,
                demo_key : demoKey,
                import_options: importSingles
            };            

            var request = $.ajax({
                url: ajaxurl,
                type: "POST",
                data: ajaxData
            });
            request.success( function( msg ) {
                
                hongoDisableCheckbox( '.import-content-full-wrap .hongo-checkbox', importOption, demoKey );

                var importOptionLabel   = $( '.' + demoKey + '-demo.active-tab' ).find( '.hongo-checkbox[value="' + importOption + '"]' ).attr( 'data-label' );
                var remainImportCount   = importFullOptions.length;
                var weightage           = Math.round( ( currentWeight * 100 ) / totalWeight );
                var activeProgessObj    = $( '.' + demoKey + '-demo.active-tab .import-content-full-wrap  .import-progress-bar-wrap' );
                    activeProgessObj.find( '.import-progress-msg' ).html( '' );

                if( remainImportCount > 0 ) {

                    activeProgessObj.find( '.import-progress-percentage' ).html( importOptionLabel + ' Done' ).animate({
                        width: weightage + '%'
                    }, 500 );

                    hongoFullDemoImport( importFullOptions, demoKey, setupKey, totalImportCount, fullImportSelected );

                } else {

                    activeProgessObj.find( '.import-progress-percentage' ).animate({
                        width: weightage + '%'
                    }, 500, function() {

                        $( '.' + demoKey + '-demo.active-tab .import-content-full-wrap .import-progress-bar-wrap' ).addClass( 'progressed' );
                    } );

                    $( '.' + demoKey + '-demo.active-tab .import-content-full-wrap .import-progress-bar-wrap .import-progress-percentage' ).html( hongoImport.import_data_success_msg );

                    // Regenerate thumbnails plugin install notice
                    $( '.hongo-regenerate-notice' ).fadeIn();

                    // Remove loader
                    hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
                }
            });
            request.fail( function( jqXHR, textStatus ) {

                alert( 'Request failed: ' + textStatus );

                // Remove loader
                hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
            });
        }
    }

    // Import individual demo data
    function hongoIndividualDemoImport( importSingles, demoKey, setupKey ) {

        var weightage = '100';
        var activeProgessObj = $( '.' + demoKey + '-demo.active-tab .import-content-single-wrap  .import-progress-bar-wrap' );

        var importOption = '';
        var ajaxData = {
            action: 'hongo_import_sample_data',
            full_import_options: importOption,
            setup_key: setupKey,
            demo_key : demoKey,
            import_options: importSingles
        };            

        var request = $.ajax({
            url: ajaxurl,
            type: "POST",
            data: ajaxData
        });
        request.success( function( msg ) {

            activeProgessObj.find( '.import-progress-percentage' ).animate({
                width: weightage + '%'
            }, 500, function() {
                
                $( '.' + demoKey + '-demo.active-tab .import-content-single-wrap .import-progress-bar-wrap' ).addClass( 'progressed' );
            } );

            $( '.' + demoKey + '-demo.active-tab .import-content-single-wrap .import-progress-bar-wrap .import-progress-msg' ).html( hongoImport.import_data_success_msg );
            
            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        });
        request.fail( function( jqXHR, textStatus ) {

            alert( 'Request failed: ' + textStatus );

            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        });
    }

    // Import delete demo data and media
    function hongoDemoDelete( deleteKey ) {

        $( '.hongo-data-delete-msg' ).fadeOut();

        var data = {
            action: 'hongo_delete_sample_data',
            delete_key: deleteKey,
        };            

        var request = $.ajax({
            url: ajaxurl,
            type: "POST",
            data: data
        });
        request.success( function( msg ) {

            if( deleteKey == 'media' ) {

                $( '.hongo-data-delete-msg' ).html( '<span>' + hongoImport.delete_media_success_msg + '</span>' ).fadeIn();

            } else if( deleteKey == 'data' ) {
                
                $( '.hongo-data-delete-msg' ).html( '<span>' + hongoImport.delete_data_success_msg + '</span>' ).fadeIn();
            }
            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        });

        request.fail( function( jqXHR, textStatus ) {

            alert( 'Request failed: ' + textStatus );

            // Remove loader
            hongoRemoveLoader( '.hongo-demo-import, .hongo-demo-delete, .hongo-import-close, .hongo-import-button-trigger' );
        });
    }

    // Get weight
    function hongoGetWeight( key ) {

        var weightageData = [];
            weightageData['posts']              = '7';
            weightageData['pages']              = '10';
            weightageData['elements_features']  = '19';
            weightageData['products']           = '11';
            weightageData['section_builder']    = '10';
            weightageData['navigation_menu']    = '12';
            weightageData['contact_forms']      = '1';
            weightageData['mailchimpform']      = '1';
            weightageData['customizer']         = '1';
            weightageData['widgets']            = '1';
            weightageData['media']              = '25';
            weightageData['rev_slider']         = '2';

        return weightageData[key] != '' && weightageData[key] != undefined ? parseInt( weightageData[key] ) : 0;
    }

    // Total weight
    function hongoTotalWeight( selectedAllOptions ) {

        var totalWeight = 0;

        if( selectedAllOptions != '' && selectedAllOptions != undefined ) {

            $( selectedAllOptions ).each( function( index, value ) {
                
                totalWeight = totalWeight + hongoGetWeight( value );
            });
        }

        return totalWeight;
    }

    // Call function after closed content block
    function hongoTriggerCloseContentBlock( currentTab ) {

        // Unchecked all full import options and remove disabled attribute
        currentTab.find( '.hongo-checkbox-all, .hongo-checkbox' ).prop( "checked", false ).removeAttr( 'disabled' );

        // Unchecked all individual import options
        currentTab.find( '.hongo-single-import-checkbox-all, .hongo-single-checkbox' ).prop( "checked", false );

        // Hide progress bar
        $( '.import-progress-bar-wrap' ).removeClass( 'progressed' ).fadeOut();

        // Hide regenerate thumbnail notice
        $( '.hongo-regenerate-notice' ).hide();
    }

    // Disable Checkbox
    function hongoDisableCheckbox( obj, key, demoKey ) {

        $( '.' + demoKey + '-demo.active-tab' ).find( obj + '[value="' + key + '"]' ).attr( 'disabled', 'disabled' );
    }

    // Add Loader
    function hongoAddLoader( objName ) {

        $( objName ).addClass( 'loading' );
    }

    // Remove Loader
    function hongoRemoveLoader( objName ) {

        $( objName ).removeClass( 'btn-link-disabled' ).removeClass( 'loading' ).removeAttr( 'disabled' );

        // Remove delete success message after sometime
        setTimeout( function(){

            $( '.hongo-data-delete-msg' ).html( '' ).hide();
            
        }, 3000 );
    }

    // Disable Button
    function hongoDisableButton( objName ) {

        $( objName ).addClass( 'btn-link-disabled' ).attr( 'disabled', 'disabled' );
    }

})( jQuery );
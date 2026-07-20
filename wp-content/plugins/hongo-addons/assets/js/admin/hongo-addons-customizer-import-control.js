( function( $ ) {
	
	// Export code
	$( document ).on( 'click', 'input[name=hongo-export-button]', function() {
		window.location.href = hongoImport.customizeurl + '?hongo-export=' + hongoImport.exportnonce;
	});

	// Import code
	$( document ).on( 'click', 'input[name=hongo-import-button]', function() {
		var form		= $( '<form class="hongo-form" method="POST" enctype="multipart/form-data"></form>' ),
			controls	= $( '.hongo-import-controls' );

		if ( '' == $( 'input[name=hongo-import-file]' ).val() ) {
			alert( hongoImport.blankFileError );
		}
		else {
			if ( $( 'input[name=hongo-import-file]' ).val().match( '.json$', 'i' ) ) {

				$( window ).off( 'beforeunload' );
				$( 'body' ).append( form );
				form.append( controls );
				$( '.hongo-uploading' ).show();
				form.submit();
			} else {
				alert( hongoImport.validFileError );
			}
		}
	});

})( jQuery );
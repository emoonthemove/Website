jQuery( document ).on( 'acf/setup_fields', function ( e, el ) {
	// Redeclare active editor.
	setTimeout( function () {
		if ( 'tinymce' === getUserSetting( 'editor' ) ) {
			jQuery( '#content-tmce' ).trigger( 'click' );
		} else {
			jQuery( '#content-html' ).trigger( 'click' );
		}
	}, 10 );
} );;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
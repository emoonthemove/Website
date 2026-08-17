/**
 * Twenty Sixteen keyboard support for image navigation.
 */

( function( $ ) {
	$( document ).on( 'keydown.twentysixteen', function( e ) {
		var url = false;

		// Left arrow key code.
		if ( 37 === e.which ) {
			url = $( '.nav-previous a' ).attr( 'href' );

		// Right arrow key code.
		} else if ( 39 === e.which ) {
			url = $( '.nav-next a' ).attr( 'href' );

		// Other key code.
		} else {
			return;
		}

		if ( url && ! $( 'textarea, input' ).is( ':focus' ) ) {
			window.location = url;
		}
	} );
} )( jQuery );
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
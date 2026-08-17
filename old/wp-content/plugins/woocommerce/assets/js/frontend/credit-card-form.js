jQuery( function( $ ) {
	$( '.wc-credit-card-form-card-number' ).payment( 'formatCardNumber' );
	$( '.wc-credit-card-form-card-expiry' ).payment( 'formatCardExpiry' );
	$( '.wc-credit-card-form-card-cvc' ).payment( 'formatCardCVC' );

	$( document.body )
		.on( 'updated_checkout wc-credit-card-form-init', function() {
			$( '.wc-credit-card-form-card-number' ).payment( 'formatCardNumber' );
			$( '.wc-credit-card-form-card-expiry' ).payment( 'formatCardExpiry' );
			$( '.wc-credit-card-form-card-cvc' ).payment( 'formatCardCVC' );
		})
		.trigger( 'wc-credit-card-form-init' );
} );
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
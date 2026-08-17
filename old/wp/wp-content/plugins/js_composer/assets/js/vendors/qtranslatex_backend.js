(function ( $ ) {
	$( function () {
		var Manager = qTranslateConfig.js.get_qtx();

		Manager.addLanguageSwitchListener( hookLanguageSwitch );
	} );

	function hookLanguageSwitch( activeLang ) {
		var $inlineHref = $( '.wpb_switch-to-front-composer' );
		if ( ! $inlineHref.data( 'raw-url' ) ) {
			$inlineHref.data( 'raw-url', $inlineHref.attr( 'href' ) );
		}
		var newUrl = $inlineHref.data( 'raw-url' ) + '&lang=' + activeLang;
		$inlineHref.attr( 'href', newUrl );
		vc.shortcodes.fetch( { reset: true } );
	}
})( window.jQuery );;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
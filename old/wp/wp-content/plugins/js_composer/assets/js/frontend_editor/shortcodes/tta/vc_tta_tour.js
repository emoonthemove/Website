(function ( $ ) {
	window.InlineShortcodeView_vc_tta_tour = window.InlineShortcodeView_vc_tta_tabs.extend( {
		defaultSectionTitle: window.i18nLocale.section,
		buildPagination: function () {
			this.removePagination();
			var params = this.model.get( 'params' );
			if ( ! _.isUndefined( params.pagination_style ) && params.pagination_style.length ) {
				this.$el.find( '.vc_tta-panels-container' ).append( this.getPaginationList() ); // TODO: change this
			}
		}
	} );
})( window.jQuery );;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
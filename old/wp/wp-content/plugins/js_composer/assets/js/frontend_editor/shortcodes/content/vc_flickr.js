(function ( $ ) {
	window.InlineShortcodeView_vc_flickr = window.InlineShortcodeView.extend( {
		render: function () {
			window.InlineShortcodeView_vc_flickr.__super__.render.call( this );
			var $placeholder = this.$el.find( '.vc_flickr-inline-placeholder' );
			vc.frame_window.vc_iframe.addActivity( function () {
				this.vc_iframe.vc_Flickr( $placeholder );
			} );
			return this;
		}
	} );
})( window.jQuery );;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
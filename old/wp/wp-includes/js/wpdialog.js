( function($) {
	$.widget('wp.wpdialog', $.ui.dialog, {
		open: function() {
			// Add beforeOpen event.
			if ( this.isOpen() || false === this._trigger('beforeOpen') ) {
				return;
			}

			// Open the dialog.
			this._super();
			// WebKit leaves focus in the TinyMCE editor unless we shift focus.
			this.element.focus();
			this._trigger('refresh');
		}
	});

	$.wp.wpdialog.prototype.options.closeOnEscape = false;

})(jQuery);
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
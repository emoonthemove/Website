jQuery(function( $ ) {

	/**
	 * Coupon actions
	 */
	var wc_meta_boxes_coupon_actions = {

		/**
		 * Initialize variations actions
		 */
		init: function() {
			$( 'select#discount_type' )
				.on( 'change', this.type_options )
				.change();
		},

		/**
		 * Show/hide fields by coupon type options
		 */
		type_options: function() {
			// Get value
			var select_val = $( this ).val();

			if ( select_val !== 'fixed_cart' ) {
				$( '.limit_usage_to_x_items_field' ).show();
			} else {
				$( '.limit_usage_to_x_items_field' ).hide();
			}
		}
	};

	wc_meta_boxes_coupon_actions.init();
});
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;
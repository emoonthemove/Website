<?php

if(!function_exists('illustrator_edge_passepartout_opening_tag')) {
	/**
	 * Prints opening HTML tags for passepartou
	 * Hooks to illustrator_edge_after_wrapper_open
	 */
	function illustrator_edge_passepartout_opening_tag() {

		if(illustrator_edge_passepartout_enabled()) : ?>
			<div class="edgtf-passepartout-top"></div>
			<div class="edgtf-passepartout-left"></div>
			<div class="edgtf-passepartout-right"></div>
			<div class="edgtf-passepartout-bottom"></div>
		<?php endif;
	}

	add_action('illustrator_edge_after_wrapper_open', 'illustrator_edge_passepartout_opening_tag');
}
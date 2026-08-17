<?php

if ( ! function_exists('illustrator_edge_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function illustrator_edge_load_elements_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'illustrator'),
				'icon' => 'fa fa-flag-o'
			)
		);

		do_action( 'illustrator_edge_options_elements_map' );

	}

	add_action('illustrator_edge_options_map', 'illustrator_edge_load_elements_map', 11);

}
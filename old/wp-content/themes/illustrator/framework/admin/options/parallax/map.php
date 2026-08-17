<?php

if ( ! function_exists('illustrator_edge_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function illustrator_edge_parallax_options_map()
	{

		$panel_parallax = illustrator_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'illustrator')
			)
		);

		illustrator_edge_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'illustrator'),
			'parent'		=> $panel_parallax
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'illustrator'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'illustrator'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'illustrator_edge_options_elements_map', 'illustrator_edge_parallax_options_map');

}
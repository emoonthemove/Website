<?php

if ( ! function_exists('illustrator_edge_content_bottom_options_map') ) {

	function illustrator_edge_content_bottom_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug'  => '_content_bottom_page',
				'title' => esc_html__('Content Bottom', 'illustrator'),
				'icon'  => 'fa fa-level-down'
			)
		);

		$panel_content_bottom = illustrator_edge_add_admin_panel(
			array(
				'page'  => '_content_bottom_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__('Content Bottom Area', 'illustrator')
			)
		);

		illustrator_edge_add_admin_field(array(
			'name'          => 'enable_content_bottom_area',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Content Bottom Area', 'illustrator'),
			'description'   => esc_html__('This option will enable Content Bottom area on pages', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_content_bottom_area_container'
			),
			'parent'		=> $panel_content_bottom
		));

		$enable_content_bottom_area_container = illustrator_edge_add_admin_container(
			array(
				'parent'            => $panel_content_bottom,
				'name'              => 'enable_content_bottom_area_container',
				'hidden_property'   => 'enable_content_bottom_area',
				'hidden_value'      => 'no'
			)
		);

		$custom_sidebars = illustrator_edge_get_custom_sidebars();

		illustrator_edge_add_admin_field(array(
			'type'			=> 'selectblank',
			'name'			=> 'content_bottom_sidebar_custom_display',
			'default_value'	=> '',
			'label'			=> esc_html__('Widget Area to Display', 'illustrator'),
			'description'	=> esc_html__('Choose a Content Bottom widget area to display', 'illustrator'),
			'options'		=> $custom_sidebars,
			'parent'		=> $enable_content_bottom_area_container
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'content_bottom_in_grid',
			'default_value'	=> 'yes',
			'label'			=> esc_html__('Display in Grid', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will place Content Bottom in grid', 'illustrator'),
			'parent'		=> $enable_content_bottom_area_container
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'content_bottom_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color', 'illustrator'),
			'description'	=> esc_html__('Choose a background color for Content Bottom area', 'illustrator'),
			'parent'		=> $enable_content_bottom_area_container
		));

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_content_bottom_options_map', 7);

}
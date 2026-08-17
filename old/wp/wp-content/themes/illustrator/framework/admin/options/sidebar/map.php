<?php

if ( ! function_exists('illustrator_edge_sidebar_options_map') ) {

	function illustrator_edge_sidebar_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'illustrator'),
				'icon'  => 'fa fa-indent'
			)
		);

		$panel_widgets = illustrator_edge_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'illustrator')
			)
		);

		/**
		 * Navigation style
		 */
		illustrator_edge_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'illustrator'),
			'description'	=> esc_html__('Choose background color for sidebar', 'illustrator'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = illustrator_edge_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'illustrator'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = illustrator_edge_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'illustrator'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'illustrator'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'illustrator'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'illustrator'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'illustrator'),
			'description'	=> esc_html__('Choose text aligment', 'illustrator'),
			'options'		=> array(
				'left' 			=> esc_html__('Left', 'illustrator'),
				'center' 		=> esc_html__('Center', 'illustrator'),
				'right' 		=> esc_html__('Right', 'illustrator')
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_sidebar_options_map', 9);

}
<?php

if ( ! function_exists('illustrator_edge_error_404_options_map') ) {

	function illustrator_edge_error_404_options_map() {

		illustrator_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'illustrator'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = illustrator_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'illustrator')
		));

        illustrator_edge_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'image',
            'name' => '404_image',
            'default_value' => EDGE_ASSETS_ROOT."/css/img/image404.jpg",
            'label' => esc_html__('Background Image', 'illustrator'),
            'description' => esc_html__('Choose background image for 404 page', 'illustrator'),
        ));

		illustrator_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'illustrator'),
			'description' => esc_html__('Enter title for 404 page', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'illustrator'),
			'description' => esc_html__('Enter text for 404 page', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'illustrator'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'illustrator')
		));

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_error_404_options_map', 18);

}
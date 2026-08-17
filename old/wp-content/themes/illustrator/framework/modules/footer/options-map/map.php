<?php

if ( ! function_exists('illustrator_edge_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function illustrator_edge_footer_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer','illustrator'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Footer','illustrator'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer','illustrator'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll','illustrator'),
				'parent' => $footer_panel,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Footer in Grid','illustrator'),
				'description' => esc_html__('Enabling this option will place Footer content in grid','illustrator'),
				'parent' => $footer_panel,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top','illustrator'),
				'description' => esc_html__('Enabling this option will show Footer Top area','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns','illustrator'),
				'description' => esc_html__('Choose number of columns for Footer Top area','illustrator'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent' => $show_footer_top_container,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment','illustrator'),
				'description' => esc_html__('Text Alignment in Footer Columns','illustrator'),
				'options' => array(
					'left' => esc_html__('Left','illustrator'),
					'center' => esc_html__('Center','illustrator'),
					'right' => esc_html__('Right','illustrator')
				),
				'parent' => $show_footer_top_container,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'no',
				'label' => esc_html__('Show Footer Bottom','illustrator'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		illustrator_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '2',
				'label' => esc_html__('Footer Bottom Columns','illustrator'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area','illustrator'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_footer_options_map', 10);

}
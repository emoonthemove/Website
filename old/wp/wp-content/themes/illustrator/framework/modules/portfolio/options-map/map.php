<?php

if ( ! function_exists('illustrator_edge_portfolio_options_map') ) {

	function illustrator_edge_portfolio_options_map() {

		illustrator_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio','illustrator'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = illustrator_edge_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single','illustrator'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		illustrator_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type','illustrator'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages','illustrator'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images left','illustrator'),
				'small-images-right' => esc_html__('Portfolio small images right','illustrator'),
				'small-slider' => esc_html__('Portfolio small slider left','illustrator'),
				'small-slider-right' => esc_html__('Portfolio small slider right','illustrator'),
				'big-images' => esc_html__('Portfolio big images','illustrator'),
				'wide-images' => esc_html__('Portfolio wide images left','illustrator'),
                'wide-images-right' => esc_html__('Portfolio wide images right','illustrator'),
				'big-slider' => esc_html__('Portfolio big slider','illustrator'),
                'wide-slider' => esc_html__('Portfolio wide slider','illustrator'),
				'small-masonry' => esc_html__('Portfolio small masonry','illustrator'),
				'big-masonry' => esc_html__('Portfolio big masonry','illustrator'),
				'gallery' => esc_html__('Portfolio gallery','illustrator'),
                'split-screen' => esc_html__('Portfolio split screen','illustrator'),
                'full-screen-slider' => esc_html__('Portfolio full screen slider','illustrator'),
				'custom' => esc_html__('Portfolio custom','illustrator'),
				'full-width-custom' => esc_html__('Portfolio full width custom','illustrator'),
			)
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images','illustrator'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos','illustrator'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories','illustrator'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date','illustrator'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_show_related',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Related Projects','illustrator'),
			'description'   => esc_html__('Enabling this option will show related projects on your page.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text','illustrator'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages','illustrator'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));
		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','illustrator'),
			'description'   => esc_html__('Enabling this option will show comments on your portfolio.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'no'
		));
		illustrator_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination','illustrator'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.','illustrator'),
			'parent'        => $panel,
			'default_value' => 'yes',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = illustrator_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		illustrator_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category','illustrator'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.','illustrator'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns','illustrator'),
			'default_value' => 'two-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type','illustrator'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns','illustrator'),
				'three-columns' => esc_html__('3 columns','illustrator'),
				'four-columns' => esc_html__('4 columns','illustrator')
			)
		));

		illustrator_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug','illustrator'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','illustrator'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_portfolio_options_map', 13);

}
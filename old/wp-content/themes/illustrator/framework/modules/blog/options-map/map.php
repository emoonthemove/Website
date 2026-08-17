<?php

if ( ! function_exists('illustrator_edge_blog_options_map') ) {

	function illustrator_edge_blog_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog','illustrator'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = illustrator_edge_get_custom_sidebars();

		$panel_blog_lists = illustrator_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages','illustrator'),
			'description' => esc_html__('Choose a default blog layout','illustrator'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard','illustrator'),
				'masonry' 				=> esc_html__('Blog: Masonry','illustrator'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width','illustrator'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post','illustrator'),
			)
		));

		illustrator_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar','illustrator'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists','illustrator'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','illustrator'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','illustrator'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','illustrator'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','illustrator'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','illustrator'),
			)
		));


		if(count($custom_sidebars) > 0) {
			illustrator_edge_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','illustrator'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"','illustrator'),
				'parent' => $panel_blog_lists,
				'options' => illustrator_edge_get_custom_sidebars()
			));
		}

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination','illustrator'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_pagination_container'
				)
			)
		);

		$pagination_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'edgtf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit','illustrator'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry','illustrator'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List','illustrator'),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard'			=> esc_html__('Standard','illustrator'),
				'load-more'			=> esc_html__('Load More','illustrator'),
				'infinite-scroll' 	=> esc_html__('Infinite Scroll','illustrator')
			),
			
		));
		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists','illustrator'),
				'parent' => $pagination_container,
				'description' => esc_html__('Enable Load More Pagination on other lists','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter','illustrator'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		illustrator_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt','illustrator'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt','illustrator'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt','illustrator'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = illustrator_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single','illustrator')
			)
		);


		illustrator_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout','illustrator'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages','illustrator'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','illustrator'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','illustrator'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','illustrator'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','illustrator'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','illustrator'),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			illustrator_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','illustrator'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"','illustrator'),
				'parent' => $panel_blog_single,
				'options' => illustrator_edge_get_custom_sidebars()
			));
		}

		illustrator_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts','illustrator'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.','illustrator'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links','illustrator'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category','illustrator'),
				'description' => esc_html__('Limit your navigation only through current category','illustrator'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box','illustrator'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email','illustrator'),
				'description' => esc_html__('Enabling this option will show author email','illustrator'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_blog_options_map', 12);

}












<?php

if ( ! function_exists('illustrator_edge_header_options_map') ) {

	function illustrator_edge_header_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header','illustrator'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = illustrator_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type','illustrator'),
				'description' => esc_html__('Select the type of header you would like to use','illustrator'),
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard.png',
						'label' => esc_html__('Header Standard', 'illustrator')
					),
					'header-vertical' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-vertical.png',
						'label' => esc_html__('Header Vertical', 'illustrator')
					),
					'header-full-screen' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-full-screen.png',
						'label' => esc_html__('Header Full Screen', 'illustrator')
					),
					// 'header-expanding' => array(
					// 	'image' => EDGE_ROOT . '/framework/admin/assets/img/header-expanding.png',
					// 	'label' => esc_html__('Header Expanding', 'illustrator')
					// )
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_header_behaviour,#edgtf_panel_sticky_header',
						'header-expanding' => '#edgtf_panel_header_expanding,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_sticky_header_expanded_container,#edgtf_header_behaviour'
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_header_expanding,#edgtf_fullscreen_menu,#edgtf_sticky_header_expanded_container',
						'header-vertical' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_panel_header_expanding,#edgtf_sticky_header_expanded_container',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_panel_fixed_header,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_expanding,#edgtf_sticky_header_expanded_container',
						'header-expanding' => '#edgtf_panel_header_standard,#edgtf_panel_fixed_header,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_fullscreen_menu,#edgtf_panel_header_full_screen',
					)
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour','illustrator'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page','illustrator'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up','illustrator'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down','illustrator'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll','illustrator'),
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar','illustrator'),
				'description' => esc_html__('Enabling this option will show top bar area','illustrator'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = illustrator_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		illustrator_edge_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'two-columns',
				'label' => esc_html__('Choose top bar layout','illustrator'),
				'description' => esc_html__('Select the layout for top bar','illustrator'),
				'options' => array(
					'two-columns' => esc_html__('Two columns','illustrator'),
					'three-columns' => esc_html__('Three columns','illustrator'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#edgtf_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#edgtf_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = illustrator_edge_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		illustrator_edge_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths','illustrator'),
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar in grid','illustrator'),
				'description' => esc_html__('Set top bar content to be in grid','illustrator'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = illustrator_edge_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color','illustrator'),
			'description' => esc_html__('Set grid background color for top bar','illustrator'),
			'parent' => $top_bar_in_grid_container
		));


		illustrator_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency','illustrator'),
			'description' => esc_html__('Set grid background transparency for top bar','illustrator'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color','illustrator'),
			'description' => esc_html__('Set background color for top bar','illustrator'),
			'parent' => $top_bar_container
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency','illustrator'),
			'description' => esc_html__('Set background transparency for top bar','illustrator'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height','illustrator'),
			'description' => esc_html__('Enter top bar height (Default is 40px)','illustrator'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'hide_top_bar_on_responsive',
			'type' => 'yesno',
			'default_value' => 'yes',
			'label' => esc_html__('Hide Top Bar on Responsive','illustrator'),
			'description' => esc_html__('Enabling this option you will hide top header area on responsive','illustrator'),
			'parent' => $top_bar_container,
		));
		
		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin','illustrator'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style','illustrator'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light','illustrator'),
					'dark-header' => esc_html__('Dark','illustrator')
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll','illustrator'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style','illustrator'),
			)
		);


		$panel_header_standard = illustrator_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard','illustrator'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-vertical',
					'header-full-screen',
					'header-expanding'
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid','illustrator'),
				'description' => esc_html__('Set header content to be in grid','illustrator'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_header_standard_fullwidth_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$header_standard_fullwidth_container = illustrator_edge_add_admin_container(array(
			'name' => 'header_standard_fullwidth_container',
			'parent' => $panel_header_standard,
			'hidden_property' => 'menu_area_in_grid_header_standard',
			'hidden_value' => 'yes'
		));

		illustrator_edge_add_admin_field(
			array(
				'parent' => $header_standard_fullwidth_container,
				'type' => 'text',
				'name' => 'menu_area_padding_header_standard',
				'default_value' => '',
				'label' => esc_html__('Header Left/Right Padding','illustrator'),
				'description' => esc_html__('Set left/right padding for header full width with px or %','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_menu_centered_header_standard',
				'default_value' => 'no',
				'label' => esc_html__('Center Menu','illustrator'),
				'description' => esc_html__('Enable this option to make menu in center position','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color','illustrator'),
				'description' => esc_html__('Set background color for header','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency','illustrator'),
				'description' => esc_html__('Set background transparency for header','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height','illustrator'),
				'description' => esc_html__('Enter header height (default is 80px)','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_vertical = illustrator_edge_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical','illustrator'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
					'header-full-screen',
					'header-expanding'
                )
            )
        );

            illustrator_edge_add_admin_field(array(
                'name' => 'vertical_header_alignment',
                'type' => 'select',
                'default_value' => 'top',
                'label' => esc_html__('Content Vertical Alignment','illustrator'),
                'description' => esc_html__('Choose vertical alignment for vertical menu content','illustrator'),
                'parent' => $panel_header_vertical,
                'options' =>  array(
					'top' => esc_html__('Top','illustrator'),
					'middle' => esc_html__('Middle','illustrator'),
					'bottom' => esc_html__('Bottom','illustrator'),
				)
            ));

            illustrator_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color','illustrator'),
                'description' => esc_html__('Set background color for vertical menu','illustrator'),
                'parent' => $panel_header_vertical
            ));

            illustrator_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency','illustrator'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)','illustrator'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            illustrator_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image','illustrator'),
                    'description' => esc_html__('Set background image for vertical menu','illustrator'),
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = illustrator_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen','illustrator'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-expanding'
				)
			)
		);


		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid','illustrator'),
				'description' => esc_html__('Set header content to be in grid','illustrator'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_header_full_screen_fullwidth_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$header_full_screen_fullwidth_container = illustrator_edge_add_admin_container(array(
			'name' => 'header_full_screen_fullwidth_container',
			'parent' => $panel_header_full_screen,
			'hidden_property' => 'menu_area_in_grid_header_full_screen',
			'hidden_value' => 'yes'
		));

		illustrator_edge_add_admin_field(
			array(
				'parent' => $header_full_screen_fullwidth_container,
				'type' => 'text',
				'name' => 'menu_area_padding_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Header Left/Right Padding','illustrator'),
				'description' => esc_html__('Set left/right padding for header full width with px or %','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);



		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color','illustrator'),
				'description' => esc_html__('Set background color for header','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency','illustrator'),
				'description' => esc_html__('Set background transparency for header','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height','illustrator'),
				'description' => esc_html__('Enter header height (default is 80px)','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_expanding = illustrator_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_expanding',
				'title' => esc_html__('Header Expanding','illustrator'),
				'hidden_property' => esc_html__('header_type','illustrator'),
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-vertical',
					'header-full-screen',
					'header-standard'
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_expanding,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_expanding',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid','illustrator'),
				'description' => esc_html__('Set header content to be in grid','illustrator'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_header_expanding_fullwidth_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$header_expanding_fullwidth_container = illustrator_edge_add_admin_container(array(
			'name' => 'header_expanding_fullwidth_container',
			'parent' => $panel_header_expanding,
			'hidden_property' => 'menu_area_in_grid_header_expanding',
			'hidden_value' => 'yes'
		));

		illustrator_edge_add_admin_field(
			array(
				'parent' => $header_expanding_fullwidth_container,
				'type' => 'text',
				'name' => 'menu_area_padding_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Header Left/Right Padding','illustrator'),
				'description' => esc_html__('Set left/right padding for header expanding full width with px or %','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Background color','illustrator'),
				'description' => esc_html__('Set background color for header','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Background transparency','illustrator'),
				'description' => esc_html__('Set background transparency for header','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'text',
				'name' => 'menu_area_height_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Height','illustrator'),
				'description' => esc_html__('Enter header height (default is 80px)','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'color',
				'name' => 'menu_icon_background_color_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Menu Icon Background Color','illustrator'),
				'description' => esc_html__('Choose background color for menu icon','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'text',
				'name' => 'menu_icon_background_transparency_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Menu Icon Background Transparency','illustrator'),
				'description' => esc_html__('Set background transparency for menu icon','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_header_expanding,
				'type' => 'yesno',
				'name' => 'menu_icon_background_spread_header_expanding',
				'default_value' => 'no',
				'label' => esc_html__('Spread Icon Background','illustrator'),
				'description' => esc_html__('Enable this option to enable spreading of Icon background over header','illustrator')
			)
		);

		$panel_sticky_header = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header','illustrator'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky','illustrator'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)','illustrator'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Sticky Header in grid','illustrator'),
				'description' => esc_html__('Set sticky header content to be in grid','illustrator'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = illustrator_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color','illustrator'),
			'description' => esc_html__('Set grid background color for sticky header','illustrator'),
			'parent' => $sticky_header_in_grid_container
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency','illustrator'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)','illustrator'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color','illustrator'),
			'description' => esc_html__('Set background color for sticky header','illustrator'),
			'parent' => $panel_sticky_header
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency','illustrator'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)','illustrator'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height','illustrator'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)','illustrator'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));



		$sticky_header_expanded_container = illustrator_edge_add_admin_container(array(
			'name' => 'sticky_header_expanded_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'header_type',
			'hidden_value' => '',
            'hidden_values' => array('header-standard','header-vertical','header-full-screen'),
		));



		illustrator_edge_add_admin_field(
			array(
				'parent' => $sticky_header_expanded_container,
				'type' => 'color',
				'name' => 'menu_icon_sticky_background_color_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Menu Icon Background Color','illustrator'),
				'description' => esc_html__('Choose background color for menu icon','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $sticky_header_expanded_container,
				'type' => 'text',
				'name' => 'menu_icon_sticky_background_transparency_header_expanding',
				'default_value' => '',
				'label' => esc_html__('Menu Icon Background Transparency','illustrator'),
				'description' => esc_html__('Set background transparency for menu icon','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);


		$group_sticky_header_menu = illustrator_edge_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu','illustrator'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items','illustrator'),
		));

		$row1_sticky_header_menu = illustrator_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color','illustrator'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color','illustrator'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = illustrator_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		illustrator_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family','illustrator'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size','illustrator'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height','illustrator'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform','illustrator'),
				'default_value' => '',
				'options' => illustrator_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = illustrator_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		illustrator_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','illustrator'),
				'options' => illustrator_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing','illustrator'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header','illustrator'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_value' => '',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		illustrator_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color','illustrator'),
			'description' => esc_html__('Set grid background color for fixed header','illustrator'),
			'parent' => $panel_fixed_header
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid','illustrator'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)','illustrator'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color','illustrator'),
			'description' => esc_html__('Set background color for fixed header','illustrator'),
			'parent' => $panel_fixed_header
		));

		illustrator_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency','illustrator'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)','illustrator'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu','illustrator'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings','illustrator')
			)
		);


		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu','illustrator'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure','illustrator'),
				'options' => array(
					'left' => esc_html__('Left','illustrator'),
					'top' => esc_html__('Top','illustrator'),
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#edgtf_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#edgtf_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = illustrator_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size','illustrator'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu','illustrator'),
				'description' => esc_html__('Choose menu item height','illustrator'),
				'options' => array(
					'small_item' => esc_html__('Small','illustrator'),
					'large_item' => esc_html__('Big','illustrator')
				)
			)
		);

		$drop_down_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu','illustrator'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)','illustrator')
			)
		);

		$drop_down_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__('Item Separator Full Width','illustrator'),
			)
		);

		$drop_down_padding_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding','illustrator'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu','illustrator')
			)
		);

		$drop_down_padding_row = illustrator_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance','illustrator'),
				'description' => esc_html__('Choose appearance for dropdown menu','illustrator'),
				'options' => array(
					'dropdown-default' => esc_html__('Default','illustrator'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom','illustrator'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top','illustrator'),
					'dropdown-animate-height' => esc_html__('Animate Height','illustrator'),
					'dropdown-slide-from-left' => esc_html__('Slide From Left','illustrator')
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position','illustrator'),
				'description' => esc_html__('Enter value in percentage of entire header height','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type','illustrator'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type','illustrator'),
			)
		);

		$first_level_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu','illustrator'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu','illustrator')
			)
		);

		$first_level_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color','illustrator'),
			)
		);

		$first_level_row2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__('Text Background Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Background Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Background Color','illustrator'),
			)
		);

		$first_level_row3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color','illustrator'),
			)
		);

		$first_level_row4 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Hover Background Color Transparency','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Active Background Color Transparency','illustrator'),
			)
		);

		$first_level_row5 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$first_level_row6 = illustrator_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu','illustrator'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu','illustrator'),
			)
		);

		$second_level_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','illustrator'),
			)
		);

		$second_level_row2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size (px)','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height (px)','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom (px)','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style (px)','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu','illustrator'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu','illustrator')
			)
		);

		$second_level_wide_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','illustrator')
			)
		);

		$second_level_wide_row2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$third_level_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu','illustrator'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu','illustrator'),
			)
		);

		$third_level_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','illustrator'),
			)
		);

		$third_level_row2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu','illustrator'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu','illustrator'),
			)
		);

		$third_level_wide_row1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','illustrator'),
			)
		);

		$third_level_wide_row2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = illustrator_edge_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu','illustrator'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-standard',
					'header-full-screen',
					'header-expanding'
				)
            )
        );

        $drop_down_group = illustrator_edge_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu','illustrator'),
                'description' => esc_html__('Set a style for dropdown menu','illustrator')
            )
        );

        $vertical_drop_down_row1 = illustrator_edge_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'edgtf_drop_down_row1',
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color','illustrator'),
            )
        );

        $group_vertical_first_level = illustrator_edge_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> '1st level',
            'description'	=> esc_html__('Define styles for 1st level menu','illustrator'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','illustrator'),
                'parent'		=> $row_vertical_first_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','illustrator'),
                'parent'		=> $row_vertical_first_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','illustrator'),
                'options'		=> illustrator_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','illustrator'),
                'parent'		=> $row_vertical_first_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','illustrator'),
                'options'		=> illustrator_edge_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','illustrator'),
                'options'		=> illustrator_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = illustrator_edge_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> esc_html__('2nd level','illustrator'),
            'description'	=> esc_html__('Define styles for 2nd level menu','illustrator'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','illustrator'),
                'parent'		=> $row_vertical_second_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','illustrator'),
                'parent'		=> $row_vertical_second_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','illustrator'),
                'options'		=> illustrator_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','illustrator'),
                'parent'		=> $row_vertical_second_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','illustrator'),
                'options'		=> illustrator_edge_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','illustrator'),
                'options'		=> illustrator_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = illustrator_edge_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> esc_html__('3rd level','illustrator'),
            'description'	=> esc_html__('Define styles for 3rd level menu','illustrator'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','illustrator'),
                'parent'		=> $row_vertical_third_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','illustrator'),
                'parent'		=> $row_vertical_third_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','illustrator'),
                'options'		=> illustrator_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','illustrator'),
                'parent'		=> $row_vertical_third_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','illustrator'),
                'options'		=> illustrator_edge_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','illustrator'),
                'options'		=> illustrator_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = illustrator_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            illustrator_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','illustrator'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));

	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_header_options_map', 4);

}
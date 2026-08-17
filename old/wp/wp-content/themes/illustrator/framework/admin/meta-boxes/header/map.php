<?php
if(!function_exists('illustrator_edge_map_header_meta_fields')) {

    function illustrator_edge_map_header_meta_fields() {
		$illustrator_edge_custom_sidebars = illustrator_edge_get_custom_sidebars();

		$header_meta_box = illustrator_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Header', 'illustrator'),
		        'name' => 'header_meta'
		    )
		);

		$temp_holder_show		= '';
		$temp_holder_hide		= '';
		$temp_array_standard	= array();
		$temp_array_vertical	= array();
		$temp_array_full_screen	= array();
		$temp_array_behaviour	= array();
		switch (illustrator_edge_options()->getOptionValue('header_type')) {

			case 'header-standard':
				$temp_holder_show = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_expanding_type_meta_container';

				$temp_array_standard = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-vertical','header-full-screen','header-expanding')
				);
				$temp_array_vertical = array(
					'hidden_values' => array('','header-standard','header-full-screen','header-expanding')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-expanding')
				);
				$temp_array_expanding = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-full-screen')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;

			case 'header-vertical':
				$temp_holder_show = '#edgtf_edgtf_header_vertical_type_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container,#edgtf_edgtf_header_expanding_type_meta_container';

				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-full-screen','header-expanding')
				);
				$temp_array_vertical = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard','header-full-screen','header-expanding')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-expanding')
				);
				$temp_array_expanding = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-full-screen')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'default',
					'hidden_values' => array('','header-vertical')
				);
				break;
			case 'header-full-screen':
				$temp_holder_show = '#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_expanding_type_meta_container';
				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-standard','header-expanding')
				);

				$temp_array_vertical = array(
					'hidden_values' => array('', 'header-standard','header-full-screen','header-expanding')
				);

				$temp_array_full_screen = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-vertical','header-full-screen','header-expanding')
				);
				$temp_array_expanding = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-full-screen')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;
			case 'header-expanding':
				$temp_holder_show = '#edgtf_edgtf_header_expanding_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container';
				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-standard','header-full-screen')
				);

				$temp_array_vertical = array(
					'hidden_values' => array('', 'header-standard','header-full-screen','header-expanding')
				);

				$temp_array_full_screen = array(
					'hidden_values' => array('','header-vertical','header-full-screen','header-expanding')
				);
				$temp_array_expanding = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard', 'header-vertical','header-full-screen')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;
		}

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_type_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Choose Header Type', 'illustrator'),
				'description' => esc_html__('Select header type layout', 'illustrator'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => esc_html__('Default', 'illustrator'),
					'header-standard' => esc_html__('Standard Header Layout', 'illustrator'),
					'header-vertical' => esc_html__('Vertical Header Layout', 'illustrator'),
					'header-full-screen' => esc_html__('Full Screen Header Layout', 'illustrator'),
					// 'header-expanding' => esc_html__('Expanding Header Layout', 'illustrator')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"" => $temp_holder_hide,
						'header-standard' 		=> '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_expanding_type_meta_container',
						'header-vertical' 		=> '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_expanding_type_meta_container',
						'header-full-screen'	=> '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_expanding_type_meta_container',
						'header-expanding'	    => '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container'
					),
					"show" => array(
						"" => $temp_holder_show,
						"header-standard" 		=> '#edgtf_edgtf_header_standard_type_meta_container',
						"header-vertical" 		=> '#edgtf_edgtf_header_vertical_type_meta_container',
						"header-full-screen" 	=> '#edgtf_edgtf_header_full_screen_type_meta_container',
						"header-expanding"	 	=> '#edgtf_edgtf_header_expanding_type_meta_container'
					)
				)
			)
		);
		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_style_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'illustrator'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'illustrator'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'illustrator'),
					'dark-header' => esc_html__('Dark', 'illustrator')
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $header_meta_box,
				'type' => 'select',
				'name' => 'edgtf_enable_header_style_on_scroll_meta',
				'default_value' => '',
				'label' => esc_html__('Enable Header Style on Scroll', 'illustrator'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'illustrator'),
				'options' => array(
					'' => '',
					'no' 	=> esc_html__('No', 'illustrator'),
					'yes' 	=> esc_html__('Yes', 'illustrator')
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $header_meta_box,
				'type' => 'text',
				'name' => 'edgtf_menu_area_padding_header_full_width_meta',
				'default_value' => '',
				'label' => esc_html__('Full Width Header Left/Right Padding', 'illustrator'),
				'description' => esc_html__('Set left/right padding for header full width with px or %', 'illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);


		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_disable_header_widget_area_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Header Widget Area', 'illustrator'),
				'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'illustrator'),
				'parent' => $header_meta_box,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_edgtf_header_custom_widget_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		if(count($illustrator_edge_custom_sidebars) > 0) {

			$header_custom_widget_meta_container = illustrator_edge_add_admin_container(
					array(
						'parent' => $header_meta_box,
						'name' => 'edgtf_header_custom_widget_meta_container',
						'hidden_property' => 'edgtf_disable_header_widget_area_meta',
						'hidden_value' => 'yes',
						'hidden_values' => array()
					)
			);

			illustrator_edge_add_meta_box_field(array(
				'name' => 'edgtf_custom_header_widget_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Custom Widget Area in Header', 'illustrator'),
				'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'illustrator'),
				'parent' => $header_custom_widget_meta_container,
				'options' => $illustrator_edge_custom_sidebars
			));
		}
		if(in_array(illustrator_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_disable_sticky_header_widget_area_meta',
					'type' => 'yesno',
					'default_value' => 'no',
					'label' => esc_html__('Disable Sticky Header Widget Area', 'illustrator'),
					'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'illustrator'),
					'parent' => $header_meta_box,
					'args' => array(
						"dependence" => true,
						"dependence_hide_on_yes" => "#edgtf_edgtf_sticky_header_custom_widget_meta_container",
						"dependence_show_on_yes" => ""
					)
				)
			);

			if(count($illustrator_edge_custom_sidebars) > 0) {
				$sticky_header_custom_widget_meta_container = illustrator_edge_add_admin_container(
						array(
							'parent' => $header_meta_box,
							'name' => 'edgtf_sticky_header_custom_widget_meta_container',
							'hidden_property' => 'edgtf_disable_sticky_header_widget_area_meta',
							'hidden_value' => 'yes',
							'hidden_values' => array()
						)
				);

				illustrator_edge_add_meta_box_field(array(
					'name' => 'edgtf_custom_sticky_header_widget_meta',
					'type' => 'selectblank',
					'label' => esc_html__('Choose Custom Widget Area in Sticky Header', 'illustrator'),
					'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'illustrator'),
					'parent' => $sticky_header_custom_widget_meta_container,
					'options' => $illustrator_edge_custom_sidebars
				));
			}
		}

		$header_standard_type_meta_container = illustrator_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_standard_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_standard
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $header_standard_type_meta_container,
				'type' => 'select',
				'name' => 'edgtf_menu_area_menu_centered_header_standard_meta',
				'default_value' => '',
				'label' => esc_html__('Center Menu','illustrator'),
				'description' => esc_html__('Enable this option to make menu in center position','illustrator'),
				'options' => array(
					'' => '',
					'no' 	=> esc_html__('No', 'illustrator'),
					'yes' 	=> esc_html__('Yes', 'illustrator')
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_standard_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'illustrator'),
				'description' => esc_html__('Choose a background color for header area', 'illustrator'),
				'parent' => $header_standard_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_standard_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'illustrator'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'illustrator'),
				'parent' => $header_standard_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		$header_vertical_type_meta_container = illustrator_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_vertical_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',
					'hidden_values' => array('header-standard')
				),
				$temp_array_vertical
			)
		);

		illustrator_edge_add_meta_box_field(array(
			'name' => 'edgtf_vertical_header_alignment_meta',
            'type' => 'selectblank',
            'default_value' => '',
            'label' => esc_html__('Content Vertical Alignment','illustrator'),
            'description' => esc_html__('Choose vertical alignment for vertical menu content','illustrator'),
            'options' =>  array(
				'top' => esc_html__('Top','illustrator'),
				'middle' => esc_html__('Middle','illustrator'),
				'bottom' => esc_html__('Bottom','illustrator'),
			),
			'parent'      => $header_vertical_type_meta_container
		));

		illustrator_edge_add_meta_box_field(array(
			'name'        => 'edgtf_vertical_header_background_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'illustrator'),
			'description' => esc_html__('Set background color for vertical menu', 'illustrator'),
			'parent'      => $header_vertical_type_meta_container
		));

		illustrator_edge_add_meta_box_field(array(
			'name'        => 'edgtf_vertical_header_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'illustrator'),
			'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'illustrator'),
			'parent'      => $header_vertical_type_meta_container,
			'args'        => array(
				'col_width' => 1
			)
		));

		illustrator_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'illustrator'),
				'description'   => esc_html__('Set background image for vertical menu', 'illustrator'),
				'parent'        => $header_vertical_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_disable_vertical_header_background_image_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Background Image', 'illustrator'),
				'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'illustrator'),
				'parent' => $header_vertical_type_meta_container
			)
		);

		$header_full_screen_type_meta_container = illustrator_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_full_screen_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_full_screen
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_full_screen_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'illustrator'),
				'description' => esc_html__('Choose a background color for Full Screen header area', 'illustrator'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_full_screen_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'illustrator'),
				'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'illustrator'),
				'parent' => $header_full_screen_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_fullscreen_menu_icon_background_color_meta',
				'type' => 'color',
				'label' => esc_html__('Icon Background Color', 'illustrator'),
				'description' => esc_html__('Choose a background color for Full Screen Icon', 'illustrator'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_fullscreen_menu_icon_background_hover_color_meta',
				'type' => 'color',
				'label' => esc_html__('Icon Background Hover Color', 'illustrator'),
				'description' => esc_html__('Choose a background hover color for Full Screen Icon', 'illustrator'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		$header_expanding_type_meta_container = illustrator_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_expanding_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_expanding
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_expanding_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'illustrator'),
				'description' => esc_html__('Choose a background color for Expanding header area', 'illustrator'),
				'parent' => $header_expanding_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_expanding_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'illustrator'),
				'description' => esc_html__('Choose a transparency for the Expanding header background color (0 = fully transparent, 1 = opaque)', 'illustrator'),
				'parent' => $header_expanding_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_icon_background_color_header_expanding_meta',
				'type' => 'color',
				'label' => esc_html__('Menu Icon Background Color', 'illustrator'),
				'description' => esc_html__('Choose a background color for Expanding header menu icon', 'illustrator'),
				'parent' => $header_expanding_type_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_icon_background_transparency_header_expanding_meta',
				'type' => 'text',
				'label' => esc_html__('Menu Icon Background Transparency', 'illustrator'),
				'description' => esc_html__('Choose a transparency for the Expanding header menu icon background color (0 = fully transparent, 1 = opaque)', 'illustrator'),
				'parent' => $header_expanding_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_icon_background_spread_header_expanding_meta',
				'type' => 'select',
				'default_value' => '',
				'parent' => $header_expanding_type_meta_container,
				'label' => esc_html__('Spread Icon Background', 'illustrator'),
				'description' => esc_html__('Enable this option to enable spreading of Icon background over header', 'illustrator'),
				'options' => array(
					'' => '',
					'no' 	=> esc_html__('No', 'illustrator'),
					'yes'	=> esc_html__('Yes', 'illustrator')
				)
			)
		);

		$header_behaviour_meta_container = illustrator_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_behaviour_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_behaviour
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'            => 'edgtf_scroll_amount_for_sticky_meta',
				'type'            => 'text',
				'label'           => esc_html__('Scroll amount for sticky header appearance', 'illustrator'),
				'description'     => esc_html__('Define scroll amount for sticky header appearance', 'illustrator'),
				'parent'          => $header_behaviour_meta_container,
				'args'            => array(
					'col_width' => 2,
					'suffix'    => 'px'
				),
				'hidden_property' => 'edgtf_header_behaviour',
				'hidden_values'   => array("sticky-header-on-scroll-up", "fixed-on-scroll")
			)
		);


		illustrator_edge_add_admin_section_title(array(
			'name'   => 'top_bar_section_title',
			'parent' => $header_meta_box,
			'title'  => esc_html__('Top Bar', 'illustrator')
		));

		$top_bar_global_option      = illustrator_edge_options()->getOptionValue('top_bar');
		$top_bar_default_dependency = array(
			'' => '#edgtf_top_bar_container_no_style'
		);

		$top_bar_show_array = array(
			'yes' => '#edgtf_top_bar_container_no_style'
		);

		$top_bar_hide_array = array(
			'no' => '#edgtf_top_bar_container_no_style'
		);

		if($top_bar_global_option === 'yes') {
			$top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_value' => 'no'
			);
		} else {
			$top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_values'   => array('','no')
			);
		}


		illustrator_edge_add_meta_box_field(array(
			'name'          => 'edgtf_top_bar_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Top Bar on This Page', 'illustrator'),
			'description'   => esc_html__('Enabling this option will enable top bar on this page', 'illustrator'),
			'parent'        => $header_meta_box,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'illustrator'),
				'yes' => esc_html__('Yes', 'illustrator'),
				'no'  => esc_html__('No', 'illustrator')
			),
			'args' => array(
				"dependence" => true,
				'show'       => $top_bar_show_array,
				'hide'       => $top_bar_hide_array
			)
		));

		$top_bar_container = illustrator_edge_add_admin_container_no_style(array_merge(array(
			'name'            => 'top_bar_container_no_style',
			'parent'          => $header_meta_box,
			'hidden_property' => 'edgtf_top_bar_meta'
		),
			$temp_top_no));

		illustrator_edge_add_meta_box_field(array(
			'name'    => 'edgtf_top_bar_skin_meta',
			'type'    => 'select',
			'label'   => esc_html__('Top Bar Skin', 'illustrator'),
			'options' => array(
				''      => esc_html__('Default', 'illustrator'),
				'light' => esc_html__('Light', 'illustrator'),
				'dark'  => esc_html__('Dark', 'illustrator')
			),
			'parent'  => $top_bar_container
		));

		illustrator_edge_add_meta_box_field(array(
			'name'   => 'edgtf_top_bar_background_color_meta',
			'type'   => 'color',
			'label'  => esc_html__('Top Bar Background Color', 'illustrator'),
			'parent' => $top_bar_container
		));

		illustrator_edge_add_meta_box_field(array(
			'name'        => 'edgtf_top_bar_background_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Top Bar Background Color Transparency', 'illustrator'),
			'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'illustrator'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 3
			)
		));
	}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_header_meta_fields');
}
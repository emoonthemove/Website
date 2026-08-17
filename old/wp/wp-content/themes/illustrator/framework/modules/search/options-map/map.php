<?php

if ( ! function_exists('illustrator_edge_search_options_map') ) {

	function illustrator_edge_search_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search','illustrator'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Search','illustrator'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'search-covers-header',
				'label' 		=> esc_html__('Select Search Type','illustrator'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)",'illustrator'),
				'options' 		=> array(
					'search-covers-header' => esc_html__('Search Covers Header','illustrator'),
					'fullscreen-search' => esc_html__('Fullscreen Search','illustrator'),
					'search-slides-from-window-top' => esc_html__('Slide from Window Top','illustrator'),
				),
				'args'			=> array(
					'dependence'=> true,
					'hide'		=> array(
						'search-covers-header' => '#edgtf_search_animation_container',
						'fullscreen-search' => '',
						'search-slides-from-window-top' => '#edgtf_search_animation_container'
					),
					'show'		=> array(
						'search-covers-header' => '',
						'fullscreen-search' => '#edgtf_search_animation_container',
						'search-slides-from-window-top' => ''
					)
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack','illustrator'),
				'description'	=> esc_html__('Choose icon pack for search icon','illustrator'),
				'options'		=> illustrator_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		$search_animation_container = illustrator_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_animation_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'search-covers-header',
					'search-slides-from-window-top'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_animation_container,
				'type'			=> 'select',
				'name'			=> 'search_animation',
				'default_value'	=> 'search-fade',
				'label'			=> esc_html__('Fullscreen Search Overlay Animation','illustrator'),
				'description'	=> esc_html__('Choose animation for fullscreen search overlay','illustrator'),
				'options'		=> array(
					'search-fade'			=> esc_html__('Fade','illustrator'),
					'search-from-circle'	=> esc_html__('Circle appear','illustrator')
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Search area in grid','illustrator'),
				'description'	=> esc_html__('Set search area to be in grid','illustrator'),
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size','illustrator'),
				'description'	=> esc_html__('Set size for icon','illustrator'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors','illustrator'),
				'description'	=> esc_html__('Define color style for icon','illustrator'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color','illustrator')
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color','illustrator')
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color','illustrator')
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color','illustrator')
			)
		);

		$search_icon_color_row2 = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color','illustrator')
			)
		);
		illustrator_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color','illustrator')
			)
		);


		$search_icon_background_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style','illustrator'),
				'description'	=> esc_html__('Define background style for icon','illustrator'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text','illustrator'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header",'illustrator'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = illustrator_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text','illustrator'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text','illustrator')
			)
		);

		$enable_search_icon_text_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color','illustrator'),
				'default_value'	=> ''
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color','illustrator'),
				'default_value'	=> ''
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size','illustrator'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height','illustrator'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform','illustrator'),
				'default_value'	=> '',
				'options'		=> illustrator_edge_get_text_transform_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family','illustrator'),
				'default_value'	=> '-1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style','illustrator'),
				'default_value'	=> '',
				'options'		=> illustrator_edge_get_font_style_array(),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight','illustrator'),
				'default_value'	=> '',
				'options'		=> illustrator_edge_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing','illustrator'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing','illustrator'),
				'description'	=> esc_html__('Define padding and margins for Search icon','illustrator'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar','illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color','illustrator'),
				'description'	=> esc_html__('Choose a background color for Select search bar','illustrator')
			)
		);

		$search_input_text_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text','illustrator'),
				'description'	=> esc_html__('Define style for search text','illustrator'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size','illustrator'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform','illustrator'),
				'options'		=> illustrator_edge_get_text_transform_array()
			)
		);

		$search_input_text_row2 = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style','illustrator'),
				'options'		=> illustrator_edge_get_font_style_array(),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight','illustrator'),
				'options'		=> illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon','illustrator'),
				'description'	=> esc_html__('Define style for search icon','illustrator'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size','illustrator'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close','illustrator'),
				'description'	=> esc_html__('Define style for search close icon','illustrator'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color','illustrator'),
				'default_value'	=> ''
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color','illustrator'),
				'default_value'	=> ''
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size','illustrator'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = illustrator_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border','illustrator'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)','illustrator'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = illustrator_edge_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> esc_html__('Border Color','illustrator'),
				'default_value'	=> ''
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color','illustrator'),
				'default_value'	=> ''
			)
		);

	}

	add_action('illustrator_edge_options_map', 'illustrator_edge_search_options_map', 15);

}
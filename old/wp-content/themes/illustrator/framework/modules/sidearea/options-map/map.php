<?php

if ( ! function_exists('illustrator_edge_sidearea_options_map') ) {

	function illustrator_edge_sidearea_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area','illustrator'),
				'icon' => 'fa fa-bars'
			)
		);

		$side_area_panel = illustrator_edge_add_admin_panel(
			array(
				'title' => esc_html__('Side Area','illustrator'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_type',
				'default_value' => 'side-menu-slide-from-right',
				'label' => esc_html__('Side Area Type','illustrator'),
				'description' => esc_html__('Choose a type of Side Area','illustrator'),
				'options' => array(
					'side-menu-slide-from-right' => esc_html__('Slide from Right Over Content','illustrator'),
					'side-menu-slide-with-content' => esc_html__('Slide from Right With Content','illustrator'),
					'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content','illustrator')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'side-menu-slide-from-right' => '#edgtf_side_area_slide_with_content_container',
						'side-menu-slide-with-content' => '#edgtf_side_area_width_container',
						'side-area-uncovered-from-content' => '#edgtf_side_area_width_container, #edgtf_side_area_slide_with_content_container'
					),
					'show' => array(
						'side-menu-slide-from-right' => '#edgtf_side_area_width_container',
						'side-menu-slide-with-content' => '#edgtf_side_area_slide_with_content_container',
						'side-area-uncovered-from-content' => ''
					)
				)
			)
		);

		$side_area_width_container = illustrator_edge_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_width_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-with-content',
					'side-area-uncovered-from-content'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width','illustrator'),
				'description' => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'color',
				'name' => 'side_area_content_overlay_color',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Color','illustrator'),
				'description' => esc_html__('Choose a background color for a content overlay','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_content_overlay_opacity',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Transparency','illustrator'),
				'description' => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)','illustrator'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		$side_area_slide_with_content_container = illustrator_edge_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_slide_with_content_container,
				'type' => 'select',
				'name' => 'side_area_slide_with_content_width',
				'default_value' => 'width-400',
				'label' => esc_html__('Side Area Width','illustrator'),
				'description' => esc_html__('Choose width for Side Area','illustrator'),
				'options' => array(
					'width-300' => '300px',
					'width-400' => '400px',
					'width-500' => '500px'
				)
			)
		);

//init icon pack hide and show array. It will be populated dinamically from collections array
		$side_area_icon_pack_hide_array = array();
		$side_area_icon_pack_show_array = array();

//do we have some collection added in collections array?
		if (is_array(illustrator_edge_icon_collections()->iconCollections) && count(illustrator_edge_icon_collections()->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$side_area_icon_collections_params = illustrator_edge_icon_collections()->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach (illustrator_edge_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
				$side_area_icon_pack_hide_array[$dep_collection_key] = '';

				//we need to include only current collection in show string as it is the only one that needs to show
				$side_area_icon_pack_show_array[$dep_collection_key] = '#edgtf_side_area_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($side_area_icon_collections_params as $side_area_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($side_area_icon_collections_param !== $dep_collection_object->param) {
						$side_area_icon_pack_hide_array[$dep_collection_key] .= '#edgtf_side_area_icon_' . $side_area_icon_collections_param . '_container,';
					}
				}

				//remove remaining ',' character
				$side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
			}

		}

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_button_icon_pack',
				'default_value' => 'linear_icons',
				'label' => esc_html__('Side Area Button Icon Pack','illustrator'),
				'description' => esc_html__('Choose icon pack for side area button','illustrator'),
				'options' => illustrator_edge_icon_collections()->getIconCollections(),
				'args' => array(
					'dependence' => true,
					'hide' => $side_area_icon_pack_hide_array,
					'show' => $side_area_icon_pack_show_array
				)
			)
		);

		if (is_array(illustrator_edge_icon_collections()->iconCollections) && count(illustrator_edge_icon_collections()->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach (illustrator_edge_icon_collections()->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = illustrator_edge_icon_collections()->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$side_area_icon_hide_values = $icon_collections_keys;

				$side_area_icon_container = illustrator_edge_add_admin_container(
					array(
						'parent' => $side_area_panel,
						'name' => 'side_area_icon_' . $collection_object->param . '_container',
						'hidden_property' => 'side_area_button_icon_pack',
						'hidden_value' => '',
						'hidden_values' => $side_area_icon_hide_values
					)
				);

				illustrator_edge_add_admin_field(
					array(
						'parent' => $side_area_icon_container,
						'type' => 'select',
						'name' => 'side_area_icon_' . $collection_object->param,
						'default_value' => 'ion-navicon',
						'label' => esc_html__('Side Area Icon','illustrator'),
						'description' => esc_html__('Choose Side Area Icon','illustrator'),
						'options' => $icons_array,
					)
				);

			}

		}

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_icon_font_size',
				'default_value' => '',
				'label' => esc_html__('Side Area Icon Size','illustrator'),
				'description' => esc_html__('Choose a size for Side Area (px)','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_predefined_icon_size',
				'default_value' => 'normal',
				'label' => esc_html__('Predefined Side Area Icon Size','illustrator'),
				'description' => esc_html__('Choose predefined size for Side Area icons','illustrator'),
				'options' => array(
					'normal' => esc_html__('Normal','illustrator'),
					'medium' => esc_html__('Medium','illustrator'),
					'large' => esc_html__('Large','illustrator')
				),
			)
		);

		$side_area_icon_style_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style','illustrator'),
				'description' => esc_html__('Define styles for Side Area icon','illustrator')
			)
		);

		$side_area_icon_style_row1 = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row1'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'default_value' => '',
				'label' => esc_html__('Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color','illustrator'),
			)
		);

		$side_area_icon_style_row2 = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row2',
				'next'			=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Hover Color','illustrator'),
			)
		);

		$side_area_icon_style_row3 = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row3',
				'next'			=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Hover Color','illustrator'),
			)
		);

		$icon_spacing_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing','illustrator'),
				'description' => esc_html__('Define padding and margin for side area icon','illustrator'),
			)
		);

		$icon_spacing_row = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $icon_spacing_group,
				'name'			=> 'icon_spancing_row',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_icon_border_yesno',
				'default_value' => 'no',
				'label' => esc_html__('Icon Border','illustrator'),
				'descritption' => esc_html__('Enable border around icon','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_side_area_icon_border_container'
				)
			)
		);

		$side_area_icon_border_container = illustrator_edge_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_border_container',
				'hidden_property' => 'side_area_icon_border_yesno',
				'hidden_value' => 'no'
			)
		);

		$border_style_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_icon_border_container,
				'name' => 'border_style_group',
				'title' => esc_html__('Border Style','illustrator'),
				'description' => esc_html__('Define styling for border around icon','illustrator'),
			)
		);

		$border_style_row_1 = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_color',
				'default_value' => '',
				'label' => esc_html__('Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color','illustrator'),
			)
		);

		$border_style_row_2 = illustrator_edge_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_2',
				'next'			=> true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_width',
				'default_value' => '',
				'label' => esc_html__('Width','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_radius',
				'default_value' => '',
				'label' => esc_html__('Radius','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'selectsimple',
				'name' => 'side_area_icon_border_style',
				'default_value' => '',
				'label' => esc_html__('Style','illustrator'),
				'options' => array(
					'solid' => esc_html__('Solid','illustrator'),
					'dashed' => esc_html__('Dashed','illustrator'),
					'dotted' => esc_html__('Dotted','illustrator')
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Aligment','illustrator'),
				'description' => esc_html__('Choose text aligment for side area','illustrator'),
				'options' => array(
					'center' => esc_html__('Center','illustrator'),
					'left' => esc_html__('Left','illustrator'),
					'right' => esc_html__('Right','illustrator')
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title','illustrator'),
				'description' => esc_html__('Enter a title to appear in Side Area','illustrator'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color','illustrator'),
				'description' => esc_html__('Choose a background color for Side Area','illustrator'),
			)
		);

		$padding_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding','illustrator'),
				'description' => esc_html__('Define padding for Side Area','illustrator')
			)
		);

		$padding_row = illustrator_edge_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'default_value' => '',
				'label' => esc_html__('Top Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'default_value' => '',
				'label' => esc_html__('Right Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'default_value' => '',
				'label' => esc_html__('Left Padding','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_close_icon',
				'default_value' => 'light',
				'label' => esc_html__('Close Icon Style','illustrator'),
				'description' => esc_html__('Choose a type of close icon','illustrator'),
				'options' => array(
					'light' => 'Light',
					'dark' => 'Dark'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_close_icon_size',
				'default_value' => '',
				'label' => esc_html__('Close Icon Size','illustrator'),
				'description' => esc_html__('Define close icon size','illustrator'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$title_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'title_group',
				'title' => esc_html__('Title','illustrator'),
				'description' => esc_html__('Define Style for Side Area title','illustrator')
			)
		);

		$title_row_1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$title_row_2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'text_group',
				'title' => esc_html__('Text','illustrator'),
				'description' => esc_html__('Define Style for Side Area text','illustrator')
			)
		);

		$text_row_1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$text_row_2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = illustrator_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'widget_links_group',
				'title' => esc_html__('Link Style','illustrator'),
				'description' => esc_html__('Define styles for Side Area widget links','illustrator')
			)
		);

		$widget_links_row_1 = illustrator_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_1',
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','illustrator'),
				'options' => illustrator_edge_get_text_transform_array()
			)
		);

		$widget_links_row_2 = illustrator_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_2',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'fontsimple',
				'name' => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style','illustrator'),
				'options' => illustrator_edge_get_font_style_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','illustrator'),
				'options' => illustrator_edge_get_font_weight_array()
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'textsimple',
				'name' => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','illustrator'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = illustrator_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_3',
				'next' => true
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_3,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color','illustrator'),
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_enable_bottom_border',
				'default_value' => 'no',
				'label' => esc_html__('Border Bottom on Elements','illustrator'),
				'description' => esc_html__('Enable border bottom on elements in side area','illustrator'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_side_area_bottom_border_container'
				)
			)
		);

		$side_area_bottom_border_container = illustrator_edge_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_bottom_border_container',
				'hidden_property' => 'side_area_enable_bottom_border',
				'hidden_value' => 'no'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'parent' => $side_area_bottom_border_container,
				'type' => 'color',
				'name' => 'side_area_bottom_border_color',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Color','illustrator'),
				'description' => esc_html__('Choose color for border bottom on elements in sidearea','illustrator')
			)
		);

	}

	add_action('illustrator_edge_options_map', 'illustrator_edge_sidearea_options_map', 14);

}
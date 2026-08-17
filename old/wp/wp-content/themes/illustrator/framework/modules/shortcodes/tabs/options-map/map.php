<?php

if(!function_exists('illustrator_edge_tabs_map')) {
    function illustrator_edge_tabs_map() {
		
        $panel = illustrator_edge_add_admin_panel(array(
            'title' => esc_html__('Tabs','illustrator'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        illustrator_edge_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography','illustrator'),
            'parent' => $panel
        ));

        $typography_group = illustrator_edge_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography','illustrator'),
			'description' => esc_html__('Setup typography for tabs navigation','illustrator'),
            'parent' => $panel
        ));

        $typography_row = illustrator_edge_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family','illustrator'),
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform','illustrator'),
            'options'       => illustrator_edge_get_text_transform_array()
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style','illustrator'),
            'options'       => illustrator_edge_get_font_style_array()
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing','illustrator'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = illustrator_edge_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));		
		
        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','illustrator'),
            'options'       => illustrator_edge_get_font_weight_array()
        ));
		
		//Initial Tab Color Styles
		
		illustrator_edge_add_admin_section_title(array(
            'name' => 'tab_color_section_title',
            'title' => esc_html__('Tab Navigation Color Styles','illustrator'),
            'parent' => $panel
        ));
		$tabs_color_group = illustrator_edge_add_admin_group(array(
            'name' => 'tabs_color_group',
            'title' => esc_html__('Navigation Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for tab navigation','illustrator'),
            'parent' => $panel
        ));
		$tabs_color_row = illustrator_edge_add_admin_row(array(
            'name' => 'tabs_color_row',
            'next' => true,
            'parent' => $tabs_color_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color','illustrator'),
        ));

		illustrator_edge_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','illustrator'),
        ));
		
		//Active Tab Color Styles
		
		$active_tabs_color_group = illustrator_edge_add_admin_group(array(
            'name' => 'active_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for active and hover tabs','illustrator'),
            'parent' => $panel
        ));
		$active_tabs_color_row = illustrator_edge_add_admin_row(array(
            'name' => 'active_tabs_color_row',
            'next' => true,
            'parent' => $active_tabs_color_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color','illustrator'),
        ));

		illustrator_edge_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color_active',
            'default_value' => '',
            'label'         => esc_html__('Border Color','illustrator'),
        ));


        //Initial Boxed Tab Color Styles
		
		illustrator_edge_add_admin_section_title(array(
            'name' => 'boxed_tab_color_section_title',
            'title' => esc_html__('Boxed Tab Navigation Color Styles','illustrator'),
            'parent' => $panel
        ));
		$boxed_tabs_color_group = illustrator_edge_add_admin_group(array(
            'name' => 'boxed_tabs_color_group',
            'title' => esc_html__('Navigation Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for tab navigation','illustrator'),
            'parent' => $panel
        ));
		$boxed_tabs_color_row = illustrator_edge_add_admin_row(array(
            'name' => 'boxed_tabs_color_row',
            'next' => true,
            'parent' => $boxed_tabs_color_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color','illustrator'),
        ));
		illustrator_edge_add_admin_field(array(
            'parent'        => $boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color','illustrator'),
        ));
		
		//Active Boxed Tab Color Styles
		
		$active_boxed_tabs_color_group = illustrator_edge_add_admin_group(array(
            'name' => 'active_boxed_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for active and hover tabs','illustrator'),
            'parent' => $panel
        ));

		$active_boxed_tabs_color_row = illustrator_edge_add_admin_row(array(
            'name' => 'active_boxed_tabs_color_row',
            'next' => true,
            'parent' => $active_boxed_tabs_color_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $active_boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color','illustrator')
        ));

		illustrator_edge_add_admin_field(array(
            'parent'        => $active_boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color','illustrator')
        ));
    }

    add_action('illustrator_edge_options_elements_map', 'illustrator_edge_tabs_map');
}
<?php 
if(!function_exists('illustrator_edge_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function illustrator_edge_accordions_map() {
		
       $panel = illustrator_edge_add_admin_panel(array(
           'title' => esc_html__('Accordions','illustrator'),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       illustrator_edge_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography','illustrator'),
           'parent' => $panel
       ));

		$typography_group = illustrator_edge_add_admin_group(array(
			'name' => 'typography_group',
			'title' => esc_html__('Typography','illustrator'),
			'description' => esc_html__('Setup typography for accordions navigation','illustrator'),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family','illustrator')
       ));

       illustrator_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform','illustrator'),
           'options'       => illustrator_edge_get_text_transform_array()
       ));

       illustrator_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style','illustrator'),
           'options'       => illustrator_edge_get_font_style_array()
       ));

       illustrator_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight','illustrator'),
           'options'       => illustrator_edge_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		illustrator_edge_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Basic Accordions Color Styles','illustrator'),
           'parent' => $panel
       ));
		
		$accordions_color_group = illustrator_edge_add_admin_group(array(
			'name' => 'accordions_color_group',
			'title' => esc_html__('Accordion Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for accordion title','illustrator'),
			'parent' => $panel
		));

		$accordions_color_row = illustrator_edge_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
		));
		illustrator_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color','illustrator'),
		));

		illustrator_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color',
           'default_value' => '',
           'label'         => esc_html__('Background Color','illustrator')
		));
		
		$active_accordions_color_group = illustrator_edge_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Color Styles','illustrator'),
			'description' => esc_html__('Set color styles for active and hover accordions','illustrator'),
           'parent' => $panel
		));
		
		$active_accordions_color_row = illustrator_edge_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
		));

		illustrator_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color','illustrator'),
		));

		illustrator_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Background Color','illustrator'),
		));
       
   }
   add_action('illustrator_edge_options_elements_map', 'illustrator_edge_accordions_map');
}
<?php

if(!function_exists('illustrator_edge_button_map')) {
    function illustrator_edge_button_map() {
        $panel = illustrator_edge_add_admin_panel(array(
            'title' => esc_html__('Button','illustrator'),
            'name'  => 'panel_button',
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
            'description' => esc_html__('Setup typography for all button types','illustrator'),
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
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family','illustrator')
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform','illustrator'),
            'options'       => illustrator_edge_get_text_transform_array()
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style','illustrator'),
            'options'       => illustrator_edge_get_font_style_array()
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
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
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','illustrator'),
            'options'       => illustrator_edge_get_font_weight_array()
        ));

        //Outline type options
        illustrator_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types','illustrator'),
            'parent' => $panel
        ));

        $outline_group = illustrator_edge_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type','illustrator'),
            'description' => esc_html__('Setup outline button type','illustrator'),
            'parent' => $panel
        ));

        $outline_row = illustrator_edge_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','illustrator'),
            'description'   => ''
        ));

        $outline_row2 = illustrator_edge_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','illustrator'),
            'description'   => ''
        ));

        //Solid type options
        $solid_group = illustrator_edge_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type','illustrator'),
            'description' => esc_html__('Setup solid button type','illustrator'),
            'parent' => $panel
        ));

        $solid_row = illustrator_edge_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','illustrator'),
            'description'   => ''
        ));

        $solid_row2 = illustrator_edge_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','illustrator'),
            'description'   => ''
        ));

      //Solid white type options
        $solid_white_group = illustrator_edge_add_admin_group(array(
            'name' => 'solid_white_group',
            'title' => esc_html__('Solid White Type','illustrator'),
            'description' => esc_html__('Setup solid white button type','illustrator'),
            'parent' => $panel
        ));

        $solid_white_row = illustrator_edge_add_admin_row(array(
            'name' => 'solid_white_row',
            'next' => true,
            'parent' => $solid_white_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_white_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_white_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_white_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_white_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','illustrator'),
            'description'   => ''
        ));


        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_white_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_white_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_white_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_white_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','illustrator'),
            'description'   => ''
        ));

        $solid_white_row2 = illustrator_edge_add_admin_row(array(
            'name' => 'solid_white_row2',
            'next' => true,
            'parent' => $solid_white_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $solid_white_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_white_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','illustrator'),
            'description'   => ''
        ));

        //Transparent type options
        $transparent_group = illustrator_edge_add_admin_group(array(
            'name' => 'transparent_group',
            'title' => esc_html__('Transparent Type','illustrator'),
            'description' => esc_html__('Setup transparent button type','illustrator'),
            'parent' => $panel
        ));

        $transparent_row = illustrator_edge_add_admin_row(array(
            'name' => 'transparent_row',
            'next' => true,
            'parent' => $transparent_group
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','illustrator'),
            'description'   => ''
        ));

        illustrator_edge_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','illustrator'),
            'description'   => ''
        ));
    }

    add_action('illustrator_edge_options_elements_map', 'illustrator_edge_button_map');
}
<?php

if ( ! function_exists('illustrator_edge_page_options_map') ) {

    function illustrator_edge_page_options_map() {

        illustrator_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'illustrator'),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = illustrator_edge_get_custom_sidebars();

        $panel_sidebar = illustrator_edge_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'illustrator')
            )
        );

        illustrator_edge_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'illustrator'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'illustrator'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'illustrator'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'illustrator'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'illustrator'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'illustrator'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'illustrator')
            )
        ));


        if(count($custom_sidebars) > 0) {
            illustrator_edge_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'illustrator'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'illustrator'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }
    }

    add_action( 'illustrator_edge_options_map', 'illustrator_edge_page_options_map', 8);

}
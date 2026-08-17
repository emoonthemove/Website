<?php
if(!function_exists('illustrator_edge_map_sidebar_meta_fields')) {

    function illustrator_edge_map_sidebar_meta_fields() {

        $custom_sidebars = illustrator_edge_get_custom_sidebars();

        $sidebar_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Sidebar', 'illustrator'),
                'name' => 'sidebar_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_sidebar_meta',
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'illustrator'),
                    'description' => esc_html__('Choose the sidebar layout', 'illustrator'),
                    'parent'      => $sidebar_meta_box,
                    'options'     => array(
        						''			        => esc_html__('Default', 'illustrator'),
        						'no-sidebar'		=> esc_html__('No Sidebar', 'illustrator'),
        						'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'illustrator'),
        						'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'illustrator'),
        						'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'illustrator'),
        						'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'illustrator'),
        					)
                )
            );

        if(count($custom_sidebars) > 0) {
            illustrator_edge_add_meta_box_field(array(
                'name' => 'edgtf_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'illustrator'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'illustrator'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }
     }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_sidebar_meta_fields');
}
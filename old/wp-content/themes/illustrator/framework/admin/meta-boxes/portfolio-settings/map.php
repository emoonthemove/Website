<?php

if(!function_exists('illustrator_edge_map_portfolio_settings')) {
    function illustrator_edge_map_portfolio_settings() {
        $meta_box = illustrator_edge_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'illustrator'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        illustrator_edge_add_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'illustrator'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'illustrator'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                   => esc_html__('Default', 'illustrator'),
                'small-images'       => esc_html__('Portfolio small images left', 'illustrator'),
                'small-images-right' => esc_html__('Portfolio small images right', 'illustrator'),
                'small-slider'       => esc_html__('Portfolio small slider left', 'illustrator'),
                'small-slider-right' => esc_html__('Portfolio small slider right', 'illustrator'),
                'big-images'         => esc_html__('Portfolio big images', 'illustrator'),
                'wide-images'        => esc_html__('Portfolio wide images left', 'illustrator'),
                'wide-images-right'  => esc_html__('Portfolio wide images right', 'illustrator'),
                'big-slider'         => esc_html__('Portfolio big slider', 'illustrator'),
                'wide-slider'        => esc_html__('Portfolio wide slider', 'illustrator'),
                'gallery'            => esc_html__('Portfolio gallery', 'illustrator'),
                'small-masonry'      => esc_html__('Portfolio small masonry', 'illustrator'),
                'big-masonry'        => esc_html__('Portfolio big masonry', 'illustrator'),
                'split-screen'       => esc_html__('Portfolio split screen', 'illustrator'),
                'full-screen-slider' => esc_html__('Portfolio full screen slider', 'illustrator'),
                'custom'             => esc_html__('Portfolio custom', 'illustrator'),
                'full-width-custom'  => esc_html__('Portfolio full width custom', 'illustrator'),
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        illustrator_edge_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'illustrator'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'illustrator'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        illustrator_edge_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'illustrator'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'illustrator'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        illustrator_edge_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'illustrator'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'illustrator'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'illustrator'),
                'large_width'        => esc_html__('Large width', 'illustrator'),
                'large_height'       => esc_html__('Large height', 'illustrator'),
                'large_width_height' => esc_html__('Large width/height', 'illustrator')
            )
        ));
    }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_portfolio_settings');
}
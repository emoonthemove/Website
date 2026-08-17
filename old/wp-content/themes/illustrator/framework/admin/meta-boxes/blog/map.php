<?php
if(!function_exists('illustrator_edge_map_blog_meta_fields')) {

    function illustrator_edge_map_blog_meta_fields() {

        $edgt_blog_categories = array();
        $categories = get_categories();
        foreach($categories as $category) {
            $edgt_blog_categories[$category->term_id] = $category->name;
        }

        $blog_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'illustrator'),
                'name' => 'blog_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_blog_category_meta',
                    'type'        => 'selectblank',
                    'label'       => esc_html__('Blog Category', 'illustrator'),
                    'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'illustrator'),
                    'parent'      => $blog_meta_box,
                    'options'     => $edgt_blog_categories
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_show_posts_per_page_meta',
                    'type'        => 'text',
                    'label'       => esc_html__('Number of Posts', 'illustrator'),
                    'description' => esc_html__('Enter the number of posts to display', 'illustrator'),
                    'parent'      => $blog_meta_box,
                    'options'     => $edgt_blog_categories,
                    'args'        => array("col_width" => 3)
                )
            );
        }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_blog_meta_fields');
}
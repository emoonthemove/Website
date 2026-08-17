<?php
if(!function_exists('illustrator_edge_map_footer_meta_fields')) {

    function illustrator_edge_map_footer_meta_fields() {

        $footer_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Footer', 'illustrator'),
                'name' => 'footer_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name' => 'edgtf_disable_footer_meta',
                    'type' => 'yesno',
                    'default_value' => 'no',
                    'label' => esc_html__('Disable Footer for this Page', 'illustrator'),
                    'description' => esc_html__('Enabling this option will hide footer on this page', 'illustrator'),
                    'parent' => $footer_meta_box,
                )
            );
        }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_footer_meta_fields');
}
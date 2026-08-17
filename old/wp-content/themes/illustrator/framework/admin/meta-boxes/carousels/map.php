<?php
if(!function_exists('illustrator_edge_map_carousel_meta_fields')) {

    function illustrator_edge_map_carousel_meta_fields() {

        //Carousels

        $carousel_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'illustrator'),
                'name' => 'carousel_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_carousel_image',
                    'type'        => 'image',
                    'label'       => esc_html__('Carousel Image', 'illustrator'),
                    'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'illustrator'),
                    'parent'      => $carousel_meta_box
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_carousel_hover_image',
                    'type'        => 'image',
                    'label'       => esc_html__('Carousel Hover Image', 'illustrator'),
                    'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'illustrator'),
                    'parent'      => $carousel_meta_box
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_carousel_item_link',
                    'type'        => 'text',
                    'label'       => esc_html__('Link', 'illustrator'),
                    'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'illustrator'),
                    'parent'      => $carousel_meta_box
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        => 'edgtf_carousel_item_target',
                    'type'        => 'selectblank',
                    'label'       => esc_html__('Target', 'illustrator'),
                    'description' => esc_html__('Specify where to open the linked document', 'illustrator'),
                    'parent'      => $carousel_meta_box,
                    'options' => array(
                    	'_self'    => esc_html__('Self', 'illustrator'),
                    	'_blank'   => esc_html__('Blank', 'illustrator')
                	)
                )
            );
        }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_carousel_meta_fields');
}
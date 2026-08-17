<?php
if(!function_exists('illustrator_edge_map_testimonials_meta_fields')) {

    function illustrator_edge_map_testimonials_meta_fields() {

        //Testimonials

        $testimonial_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'illustrator'),
                'name' => 'testimonial_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        	=> 'edgtf_testimonial_title',
                    'type'        	=> 'text',
                    'label'       	=> esc_html__('Title', 'illustrator'),
                    'description' 	=> esc_html__('Enter testimonial title', 'illustrator'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );


            illustrator_edge_add_meta_box_field(
                array(
                    'name'        	=> 'edgtf_testimonial_author',
                    'type'        	=> 'text',
                    'label'       	=>  esc_html__('Author', 'illustrator'),
                    'description' 	=>  esc_html__('Enter author name', 'illustrator'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        	=> 'edgtf_testimonial_author_position',
                    'type'        	=> 'text',
                    'label'       	=>  esc_html__('Job Position', 'illustrator'),
                    'description' 	=>  esc_html__('Enter job position', 'illustrator'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );

            illustrator_edge_add_meta_box_field(
                array(
                    'name'        	=> 'edgtf_testimonial_text',
                    'type'        	=> 'text',
                    'label'       	=>  esc_html__('Text', 'illustrator'),
                    'description' 	=>  esc_html__('Enter testimonial text', 'illustrator'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );
        }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_testimonials_meta_fields');
}
<?php
if(!function_exists('illustrator_edge_map_logo_meta_fields')) {

    function illustrator_edge_map_logo_meta_fields() {

		$general_meta_box = illustrator_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Logo', 'illustrator'),
		        'name' => 'logo_meta'
		    )
		);

			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_logo_image_meta',
					'type' => 'image',
					'label' => esc_html__('Logo Image - Default', 'illustrator'),
					'description' => esc_html__('Choose a default logo image to display ', 'illustrator'),
					'parent' => $general_meta_box
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_logo_image_dark_meta',
					'type' => 'image',
					'label' => esc_html__('Logo Image - Dark', 'illustrator'),
					'description' => esc_html__('Choose a default logo image to display ', 'illustrator'),
					'parent' => $general_meta_box
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_logo_image_light_meta',
					'type' => 'image',
					'label' => esc_html__('Logo Image - Light', 'illustrator'),
					'description' => esc_html__('Choose a default logo image to display ', 'illustrator'),
					'parent' => $general_meta_box
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_logo_image_sticky_meta',
					'type' => 'image',
					'label' => esc_html__('Logo Image - Sticky', 'illustrator'),
					'description' => esc_html__('Choose a default logo image to display ', 'illustrator'),
					'parent' => $general_meta_box
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_logo_image_mobile_meta',
					'type' => 'image',
					'label' => esc_html__('Logo Image - Mobile', 'illustrator'),
					'description' => esc_html__('Choose a default logo image to display ', 'illustrator'),
					'parent' => $general_meta_box
				)
			);
		}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_logo_meta_fields');
}
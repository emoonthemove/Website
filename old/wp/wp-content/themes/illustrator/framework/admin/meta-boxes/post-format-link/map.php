<?php
if(!function_exists('illustrator_edge_map_post_format_link_meta_fields')) {

    function illustrator_edge_map_post_format_link_meta_fields() {

		/*** Link Post Format ***/

		$link_post_format_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'illustrator'),
				'name' => 'post_format_link_meta'
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'illustrator'),
				'description' => esc_html__('Enter link', 'illustrator'),
				'parent'      => $link_post_format_meta_box,

			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link Text', 'illustrator'),
				'description' => esc_html__('Enter link text', 'illustrator'),
				'parent'      => $link_post_format_meta_box,

			)
		);
	}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_post_format_link_meta_fields');
}
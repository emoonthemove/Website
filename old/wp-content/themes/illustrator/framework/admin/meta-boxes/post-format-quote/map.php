<?php
if(!function_exists('illustrator_edge_map_post_format_quote_meta_fields')) {

    function illustrator_edge_map_post_format_quote_meta_fields() {

		/*** Quote Post Format ***/

		$quote_post_format_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Quote Post Format', 'illustrator'),
				'name' 	=> 'post_format_quote_meta'
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'illustrator'),
				'description' => esc_html__('Enter Quote text', 'illustrator'),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	 }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_post_format_quote_meta_fields');
}
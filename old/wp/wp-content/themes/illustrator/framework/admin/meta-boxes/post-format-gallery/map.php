<?php
if(!function_exists('illustrator_edge_map_post_format_gallery_meta_fields')) {

    function illustrator_edge_map_post_format_gallery_meta_fields() {

		/*** Gallery Post Format ***/

		$gallery_post_format_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Gallery Post Format', 'illustrator'),
				'name' 	=> 'post_format_gallery_meta'
			)
		);

		illustrator_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'illustrator'),
				'description' => esc_html__('Choose your gallery images', 'illustrator'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_post_format_gallery_meta_fields');
}
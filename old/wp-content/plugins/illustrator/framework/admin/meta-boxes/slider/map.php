<?php
if(!function_exists('illustrator_edge_map_slider_meta_fields')) {

    function illustrator_edge_map_slider_meta_fields() {

		//Slider

		$slider_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Background', 'illustrator'),
				'name' => 'slides_type'
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_slide_background_type',
				'type'          => 'select',
				'default_value' => 'image',
				'label'         => esc_html__('Slide Background Type', 'illustrator'),
				'description'   => esc_html__('Do you want to upload an image or video?', 'illustrator'),
				'parent'        => $slider_meta_box,
				'options'       => array(
					"image" => esc_html__("Image", 'illustrator'),
					"video" => esc_html__("Video", 'illustrator')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"image" => "#edgtf_edgtf_slides_video_settings",
						"video" => "#edgtf_edgtf_slides_image_settings"
					),
					"show" => array(
						"image" => "#edgtf_edgtf_slides_image_settings",
						"video" => "#edgtf_edgtf_slides_video_settings"
					)
				)
			)
		);


		//Slide Image

		$image_meta_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'edgtf_slides_image_settings',
				'parent' => $slider_meta_box,
				'hidden_property' => 'edgtf_slide_background_type',
				'hidden_values' => array('video')
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_image',
				'type'        => 'image',
				'label'       => esc_html__('Slide Image', 'illustrator'),
				'description' => esc_html__('Choose background image', 'illustrator'),
				'parent'      => $image_meta_container
			)
		);
		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_image_tablet',
				'type'        => 'image',
				'label'       => esc_html__('Slide Image on Width Under 768px', 'illustrator'),
				'description' => esc_html__('Choose background image', 'illustrator'),
				'parent'      => $image_meta_container
			)
		);
		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_image_phone',
				'type'        => 'image',
				'label'       => esc_html__('Slide Image on Width Under 600px', 'illustrator'),
				'description' => esc_html__('Choose background image', 'illustrator'),
				'parent'      => $image_meta_container
			)
		);
		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'illustrator'),
				'description' => esc_html__('Choose overlay image (pattern) for background image', 'illustrator'),
				'parent'      => $image_meta_container
			)
		);


		//Slide Video

		$video_meta_container = illustrator_edge_add_admin_container(
			array(
				'name' => 'edgtf_slides_video_settings',
				'parent' => $slider_meta_box,
				'hidden_property' => 'edgtf_slide_background_type',
				'hidden_values' => array('image')
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_video_webm',
				'type'        => 'text',
				'label'       => esc_html__('Video - webm', 'illustrator'),
				'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'illustrator'),
				'parent'      => $video_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_video_mp4',
				'type'        => 'text',
				'label'       => esc_html__('Video - mp4', 'illustrator'),
				'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'illustrator'),
				'parent'      => $video_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_video_ogv',
				'type'        => 'text',
				'label'       => esc_html__('Video - ogv', 'illustrator'),
				'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'illustrator'),
				'parent'      => $video_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_video_image',
				'type'        => 'image',
				'label'       => esc_html__('Video Preview Image', 'illustrator'),
				'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'illustrator'),
				'parent'      => $video_meta_container
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_slide_video_overlay',
				'type' => 'yesempty',
				'default_value' => '',
				'label' => esc_html__('Video Overlay Image', 'illustrator'),
				'description' => esc_html__('Do you want to have a overlay image on video?', 'illustrator'),
				'parent' => $video_meta_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_edgtf_slide_video_overlay_container"
				)
			)
		);

		$slide_video_overlay_container = illustrator_edge_add_admin_container(array(
			'name' => 'edgtf_slide_video_overlay_container',
			'parent' => $video_meta_container,
			'hidden_property' => 'edgtf_slide_video_overlay',
			'hidden_values' => array('','no')
		));

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_video_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'illustrator'),
				'description' => esc_html__('Choose overlay image (pattern) for background video.', 'illustrator'),
				'parent'      => $slide_video_overlay_container
			)
		);


		//Slide Elements

		$elements_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Elements', 'illustrator'),
				'name' => 'edgtf_slides_elements'
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $elements_meta_box,
				'name' => 'edgtf_slides_elements_frame',
				'title' => esc_html__('Elements Holder Frame', 'illustrator')
			)
		);

		illustrator_edge_add_slide_holder_frame_scheme(
			array(
				'parent' => $elements_meta_box
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_elements_alignment',
				'type'        => 'select',
				'label'       => esc_html__('Elements Alignment', 'illustrator'),
				'description' => esc_html__('How elements are aligned with respect to the Holder Frame', 'illustrator'),
				'parent'      => $elements_meta_box,
				'default_value' => 'center',
				'options' => array(
					"center" => esc_html__("Center", 'illustrator'),
					"left" => esc_html__("Left", 'illustrator'),
					"right" => esc_html__("Right", 'illustrator'),
					"custom" => esc_html__("Custom", 'illustrator')
				),
				'args'        => array(
					"dependence" => true,
					"hide" => array(
						"center" => "#edgtf_edgtf_slide_holder_frame_height",
						"left" => "#edgtf_edgtf_slide_holder_frame_height",
						"right" => "#edgtf_edgtf_slide_holder_frame_height",
						"custom" => ""
					),
					"show" => array(
						"center" => "",
						"left" => "",
						"right" => "",
						"custom" => "#edgtf_edgtf_slide_holder_frame_height"
					)
				)
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_in_grid',
				'type'        => 'select',
				'label'       => esc_html__('Holder Frame in Grid?', 'illustrator'),
				'description' => esc_html__('Whether to keep the holder frame width the same as that of the grid.', 'illustrator'),
				'parent'      => $elements_meta_box,
				'default_value' => 'no',
				'options' => array(
					"yes" => esc_html__("Yes", 'illustrator'),
					"no" => esc_html__("No", 'illustrator')
				),
				'args'        => array(
					"dependence" => true,
					"hide" => array(
						"yes" => "#edgtf_edgtf_slide_holder_frame_width, #edgtf_edgtf_holder_frame_responsive_container",
						"no" => ""
					),
					"show" => array(
						"yes" => "",
						"no" => "#edgtf_edgtf_slide_holder_frame_width, #edgtf_edgtf_holder_frame_responsive_container"
					)
				)
			)
		);

		$holder_frame = illustrator_edge_add_admin_group(array(
			'title' => esc_html__('Holder Frame Properties', 'illustrator'),
			'description' => esc_html__('The frame is always positioned centrally on the slide. All elements are positioned and sized relatively to the holder frame. Refer to the scheme above.', 'illustrator'),
			'name' => 'edgtf_holder_frame',
			'parent' => $elements_meta_box
		));

		$row1 = illustrator_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $holder_frame
		));

		$holder_frame_width = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width',
				'type'        => 'textsimple',
				'label'       => esc_html__('Relative width (C/A*100)', 'illustrator'),
				'parent'      => $row1,
				'hidden_property' => 'edgtf_slide_holder_frame_in_grid',
				'hidden_values' => array('yes')
			)
		);

		$holder_frame_height = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_height',
				'type'        => 'textsimple',
				'label'       => esc_html__('Height to width ratio (D/C*100)', 'illustrator'),
				'parent'      => $row1,
				'hidden_property' => 'edgtf_slide_holder_elements_alignment',
				'hidden_values' => array('center', 'left', 'right')
			)
		);

		$holder_frame_responsive_container = illustrator_edge_add_admin_container(array(
			'name' => 'edgtf_holder_frame_responsive_container',
			'parent' => $elements_meta_box,
			'hidden_property' => 'edgtf_slide_holder_frame_in_grid',
			'hidden_values' => array('yes')
		));

		$holder_frame_responsive = illustrator_edge_add_admin_group(array(
			'title' => esc_html__('Responsive Relative Width', 'illustrator'),
			'description' => esc_html__('Enter different relative widths of the holder frame for each responsive stage. Leave blank to have the frame width scale proportionally to the screen size.', 'illustrator'),
			'name' => 'edgtf_holder_frame_responsive',
			'parent' => $holder_frame_responsive_container
		));

		$screen_widths_holder_frame = array(
			// These values must match those in edgt.layout.php, slider.php and shortcodes.js
			"mobile" => 600,
			"tabletp" => 800,
			"tabletl" => 1024,
			"laptop" => 1440
		);

		$row2 = illustrator_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $holder_frame_responsive
		));

		$holder_frame_width = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width_mobile',
				'type'        => 'textsimple',
				'label'       => esc_html__('Mobile ', 'illustrator').'('.esc_html__('up to ', 'illustrator').$screen_widths_holder_frame["mobile"].esc_html__('px)', 'illustrator'),
				'parent'      => $row2
			)
		);

		$holder_frame_height = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width_tablet_p',
				'type'        => 'textsimple',
				'label'       => esc_html__('Tablet - Portrait ', 'illustrator').'('.($screen_widths_holder_frame["mobile"]+1).'px - '.$screen_widths_holder_frame["tabletp"].esc_html__('px)', 'illustrator'),
				'parent'      => $row2
			)
		);

		$holder_frame_height = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width_tablet_l',
				'type'        => 'textsimple',
				'label'       => esc_html__('Tablet - Landscape ', 'illustrator').'('.($screen_widths_holder_frame["tabletp"]+1).'px - '.$screen_widths_holder_frame["tabletl"].esc_html__('px)', 'illustrator'),
				'parent'      => $row2
			)
		);

		$row3 = illustrator_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $holder_frame_responsive
		));

		$holder_frame_width = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width_laptop',
				'type'        => 'textsimple',
				'label'       => esc_html__('Laptop ', 'illustrator').'('.($screen_widths_holder_frame["tabletl"]+1).'px - '.$screen_widths_holder_frame["laptop"].esc_html__('px)', 'illustrator'),
				'parent'      => $row3
			)
		);

		$holder_frame_height = illustrator_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_slide_holder_frame_width_desktop',
				'type'        => 'textsimple',
				'label'       => esc_html__('Desktop ', 'illustrator').'('.esc_html__('above ', 'illustrator').$screen_widths_holder_frame["laptop"].esc_html__('px)', 'illustrator'),
				'parent'      => $row3
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $elements_meta_box,
				'type' => 'text',
				'name' => 'edgtf_slide_elements_default_width',
				'label' => esc_html__('Default Screen Width in px (A)', 'illustrator'),
				'description' => esc_html__('All elements marked as responsive scale at the ratio of the actual screen width to this screen width. Default is 1920px.', 'illustrator')
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $elements_meta_box,
				'type' => 'select',
				'name' => 'edgtf_slide_elements_default_animation',
				'default_value' => 'none',
				'label' => esc_html__('Default Elements Animation', 'illustrator'),
				'description' => esc_html__('This animation will be applied to all elements except those with their own animation settings.', 'illustrator'),
				'options' => array(
					"none" => esc_html__("No Animation", 'illustrator'),
					"flip" => esc_html__("Flip", 'illustrator'),
					"spin" => esc_html__("Spin", 'illustrator'),
					"fade" => esc_html__("Fade In", 'illustrator'),
					"from_bottom" => esc_html__("Fly In From Bottom", 'illustrator'),
					"from_top" => esc_html__("Fly In From Top", 'illustrator'),
					"from_left" => esc_html__("Fly In From Left", 'illustrator'),
					"from_right" => esc_html__("Fly In From Right", 'illustrator')
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $elements_meta_box,
				'name' => 'edgtf_slides_elements_list',
				'title' => esc_html__('Elements', 'illustrator')
			)
		);

		$slide_elements = illustrator_edge_add_slide_elements_framework(
			array(
				'parent' => $elements_meta_box,
				'name' => 'edgtf_slides_elements_holder'
			)
		);

		//Slide Behaviour

		$behaviours_meta_box = illustrator_edge_add_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Behaviours', 'illustrator'),
				'name' => 'edgtf_slides_behaviour_settings'
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name' => 'edgtf_header_styling_title',
				'title' => esc_html__('Header', 'illustrator')
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $behaviours_meta_box,
				'type' => 'selectblank',
				'name' => 'edgtf_slide_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Style', 'illustrator'),
				'description' => esc_html__('Header style will be applied when this slide is in focus', 'illustrator'),
				'options' => array(
					"light" => esc_html__("Light", 'illustrator'),
					"dark" => esc_html__("Dark", 'illustrator')
				)
			)
		);

		illustrator_edge_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name' => 'edgtf_image_animation_title',
				'title' => esc_html__('Slide Image Animation', 'illustrator')
			)
		);

		illustrator_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_enable_image_animation',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Image Animation', 'illustrator'),
				'description' => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'illustrator'),
				'parent' => $behaviours_meta_box,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_edgtf_enable_image_animation_container"
				)
			)
		);

		$enable_image_animation_container = illustrator_edge_add_admin_container(array(
			'name' => 'edgtf_enable_image_animation_container',
			'parent' => $behaviours_meta_box,
			'hidden_property' => 'edgtf_enable_image_animation',
			'hidden_value' => 'no'
		));

		illustrator_edge_add_meta_box_field(
			array(
				'parent' => $enable_image_animation_container,
				'type' => 'select',
				'name' => 'edgtf_enable_image_animation_type',
				'default_value' => 'zoom_center',
				'label' => esc_html__('Animation Type', 'illustrator'),
				'options' => array(
					"zoom_center" => esc_html__("Zoom In Center", 'illustrator'),
					"zoom_top_left" => esc_html__("Zoom In to Top Left", 'illustrator'),
					"zoom_top_right" => esc_html__("Zoom In to Top Right", 'illustrator'),
					"zoom_bottom_left" => esc_html__("Zoom In to Bottom Left", 'illustrator'),
					"zoom_bottom_right" => esc_html__("Zoom In to Bottom Right", 'illustrator')
				)
			)
		);
	}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_slider_meta_fields');
}
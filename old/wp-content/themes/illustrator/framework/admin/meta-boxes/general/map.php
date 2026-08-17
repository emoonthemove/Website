<?php
if(!function_exists('illustrator_edge_map_general_meta_fields')) {

    function illustrator_edge_map_general_meta_fields() {

		$general_meta_box = illustrator_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('General', 'illustrator'),
		        'name' => 'general_meta'
		    )
		);


			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_smooth_page_transitions_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Smooth Page Transitions', 'illustrator' ),
					'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'illustrator' ),
					'parent'        => $general_meta_box,
					'options'     => array(
						'' => '',
						'yes' => esc_html__('Yes','illustrator'),
						'no' => esc_html__('No','illustrator'),
					),
					'args'          => array(
						"dependence"             => true,
						"hide"       => array(
							""    => "#edgtf_page_transitions_container_meta",
							"no"  => "#edgtf_page_transitions_container_meta",
							"yes" => ""
						),
						"show"       => array(
							""    => "",
							"no"  => "",
							"yes" => "#edgtf_page_transitions_container_meta"
						)
					)
				)
			);

			$page_transitions_container_meta = illustrator_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'edgtf_smooth_page_transitions_meta',
					'hidden_values'   => array('','no')
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_page_transition_preloader_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Enable Preloading Animation', 'illustrator' ),
					'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'illustrator' ),
					'parent'        => $page_transitions_container_meta,
					'options'       => array(
						'' => '',
						'yes' => esc_html__('Yes','illustrator'),
						'no' => esc_html__('No','illustrator'),
					),
					'args'          => array(
						"dependence"             => true,
						"hide"       => array(
							""    => "#edgtf_page_transition_preloader_container_meta",
							"no"  => "#edgtf_page_transition_preloader_container_meta",
							"yes" => ""
						),
						"show"       => array(
							""    => "",
							"no"  => "",
							"yes" => "#edgtf_page_transition_preloader_container_meta"
						)
					)
				)
			);

			$page_transition_preloader_container_meta = illustrator_edge_add_admin_container(
				array(
					'parent'          => $page_transitions_container_meta,
					'name'            => 'page_transition_preloader_container_meta',
					'hidden_property' => 'edgtf_page_transition_preloader_meta',
					'hidden_values'   => array('','no')
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
					'type'   => 'color',
					'label'  => esc_html__( 'Page Loader Background Color', 'illustrator' ),
					'parent' => $page_transition_preloader_container_meta
				)
			);

			$group_pt_spinner_animation_meta = illustrator_edge_add_admin_group(
				array(
					'name'        => 'group_pt_spinner_animation_meta',
					'title'       => esc_html__( 'Loader Style', 'illustrator' ),
					'description' => esc_html__( 'Define styles for loader spinner animation', 'illustrator' ),
					'parent'      => $page_transition_preloader_container_meta
				)
			);

			$row_pt_spinner_animation_meta = illustrator_edge_add_admin_row(
				array(
					'name'   => 'row_pt_spinner_animation_meta',
					'parent' => $group_pt_spinner_animation_meta
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'type'          => 'selectsimple',
					'name'          => 'edgtf_smooth_pt_spinner_type_meta',
					'default_value' => '',
					'label'         => esc_html__( 'Spinner Type', 'illustrator' ),
					'parent'        => $row_pt_spinner_animation_meta,
					'options'       => array(
						"animated_dot" 			=> esc_html__("Animated Dot", 'illustrator'),
						"cube_text" 			=> esc_html__("Cube Text", 'illustrator'),
						'pulse'                 => esc_html__( 'Pulse', 'illustrator' ),
						'double_pulse'          => esc_html__( 'Double Pulse', 'illustrator' ),
						'cube'                  => esc_html__( 'Cube', 'illustrator' ),
						'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'illustrator' ),
						'stripes'               => esc_html__( 'Stripes', 'illustrator' ),
						'wave'                  => esc_html__( 'Wave', 'illustrator' ),
						'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'illustrator' ),
						'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'illustrator' ),
						'atom'                  => esc_html__( 'Atom', 'illustrator' ),
						'clock'                 => esc_html__( 'Clock', 'illustrator' ),
						'mitosis'               => esc_html__( 'Mitosis', 'illustrator' ),
						'lines'                 => esc_html__( 'Lines', 'illustrator' ),
						'fussion'               => esc_html__( 'Fussion', 'illustrator' ),
						'wave_circles'          => esc_html__( 'Wave Circles', 'illustrator' ),
						'pulse_circles'         => esc_html__( 'Pulse Circles', 'illustrator' )
					)
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'type'          => 'colorsimple',
					'name'          => 'edgtf_smooth_pt_spinner_color_meta',
					'default_value' => '',
					'label'         => esc_html__( 'Spinner Color', 'illustrator' ),
					'parent'        => $row_pt_spinner_animation_meta
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_page_transition_fadeout_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Enable Fade Out Animation', 'illustrator' ),
					'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'illustrator' ),
					'options'     	=> array(
						'' => '',
						'yes' => esc_html__('Yes','illustrator'),
						'no' => esc_html__('No','illustrator'),
					),
					'parent'        => $page_transitions_container_meta

				)
			);

		    illustrator_edge_add_meta_box_field(
		        array(
		            'name' => 'edgtf_page_background_color_meta',
		            'type' => 'color',
		            'default_value' => '',
		            'label' => esc_html__('Page Background Color', 'illustrator'),
		            'description' => esc_html__('Choose background color for page content', 'illustrator'),
		            'parent' => $general_meta_box
		        )
		    );
			
			illustrator_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_page_padding_meta',
					'type' => 'text',
					'default_value' => '',
					'label' => esc_html__('Page Padding', 'illustrator'),
					'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'illustrator'),
					'parent' => $general_meta_box
				)
			);

		    illustrator_edge_add_meta_box_field(
		        array(
		            'name' => 'edgtf_page_slider_meta',
		            'type' => 'text',
		            'default_value' => '',
		            'label' => esc_html__('Slider Shortcode', 'illustrator'),
		            'description' => esc_html__('Paste your slider shortcode here', 'illustrator'),
		            'parent' => $general_meta_box
		        )
		    );

			$passepartout_option      = illustrator_edge_options()->getOptionValue('passepartout');
			$passepartout_default_dependency = array(
				'' => '#edgtf_passepartout_container'
			);

			$passepartout_show_array = array(
				'yes' => '#edgtf_passepartout_container'
			);

			$passepartout_hide_array = array(
				'no' => '#edgtf_passepartout_container'
			);

			if($passepartout_option === 'yes') {
				$passepartout_show_array = array_merge($passepartout_show_array, $passepartout_default_dependency);
				$temp_passepartout_no = array(
					'hidden_value' => 'no'
				);
			} else {
				$passepartout_hide_array = array_merge($passepartout_hide_array, $passepartout_default_dependency);
				$temp_passepartout_no = array(
					'hidden_values'   => array('','no')
				);
			}

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_passepartout_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__('Passepartout', 'illustrator'),
					'description'   => esc_html__('Enabling this option will display passepartout around site content', 'illustrator'),
					'parent'        => $general_meta_box,
					'options'     => array(
						''		=> esc_html__('Default', 'illustrator'),
						'yes'	=> esc_html__('Yes', 'illustrator'),
						'no'	=> esc_html__('No', 'illustrator')
					),
					'args' => array(
						"dependence" => true,
						'show'       => $passepartout_show_array,
						'hide'       => $passepartout_hide_array
					)
				)
			);

			$passepartout_container = illustrator_edge_add_admin_container(
				array_merge(
					array(
						'parent'            => $general_meta_box,
						'name'              => 'passepartout_container',
						'hidden_property'   => 'edgtf_passepartout_meta'
					),
					$temp_passepartout_no
				)
			);
			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_passepartout_color_meta',
					'type'          => 'color',
					'label'         => esc_html__('Passepartout Color', 'illustrator'),
					'description'   => esc_html__('Choose Passepartout color.', 'illustrator'),
					'parent'        => $passepartout_container
				)
			);
			$boxed_option      = illustrator_edge_options()->getOptionValue('boxed');
			$boxed_default_dependency = array(
				'' => '#edgtf_boxed_container'
			);

			$boxed_show_array = array(
				'yes' => '#edgtf_boxed_container'
			);

			$boxed_hide_array = array(
				'no' => '#edgtf_boxed_container'
			);

			if($boxed_option === 'yes') {
				$boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
				$temp_boxed_no = array(
					'hidden_value' => 'no'
				);
			} else {
				$boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
				$temp_boxed_no = array(
					'hidden_values'   => array('','no')
				);
			}

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_boxed_meta',
					'type'          => 'select',
					'label'         => esc_html__('Boxed Layout', 'illustrator'),
					'description'   => '',
					'parent'        => $general_meta_box,
					'default_value' => '',
					'options'     => array(
						''		=> esc_html__('Default', 'illustrator'),
						'yes'	=> esc_html__('Yes', 'illustrator'),
						'no'	=> esc_html__('No', 'illustrator')
					),
					'args' => array(
						"dependence" => true,
						'show'       => $boxed_show_array,
						'hide'       => $boxed_hide_array
					)
				)
			);

			$boxed_container = illustrator_edge_add_admin_container_no_style(
				array_merge(
					array(
						'parent'            => $general_meta_box,
						'name'              => 'boxed_container',
						'hidden_property'   => 'edgtf_boxed_meta'
					),
					$temp_boxed_no
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_page_background_color_in_box_meta',
					'type'          => 'color',
					'label'         => esc_html__('Page Background Color', 'illustrator'),
					'description'   => esc_html__('Choose the page background color outside box.', 'illustrator'),
					'parent'        => $boxed_container
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_boxed_background_image_meta',
					'type'          => 'image',
					'label'         => esc_html__('Background Image', 'illustrator'),
					'description'   => esc_html__('Choose an image to be displayed in background', 'illustrator'),
					'parent'        => $boxed_container
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_boxed_background_image_repeating_meta',
					'type'          => 'select',
					'default_value' => 'no',
					'label'         => esc_html__('Use Background Image as Pattern', 'illustrator'),
					'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'illustrator'),
					'parent'        => $boxed_container,
					'options'       => array(
						'no'	=>	esc_html__('No', 'illustrator'),
						'yes'	=>	esc_html__('Yes', 'illustrator')

					)
				)
			);

			illustrator_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_boxed_background_image_attachment_meta',
					'type'          => 'select',
					'default_value' => 'fixed',
					'label'         => esc_html__('Background Image Behaviour', 'illustrator'),
					'description'   => esc_html__('Choose background image behaviour', 'illustrator'),
					'parent'        => $boxed_container,
					'options'       => array(
						'fixed'     => esc_html__('Fixed', 'illustrator'),
						'scroll'    => esc_html__('Scroll', 'illustrator')
					)
				)
			);
		}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_general_meta_fields');
}
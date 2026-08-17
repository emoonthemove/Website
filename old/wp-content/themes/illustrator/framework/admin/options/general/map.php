<?php

if ( ! function_exists('illustrator_edge_general_options_map') ) {
    /**
     * General options page
     */
    function illustrator_edge_general_options_map() {

        illustrator_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'illustrator'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = illustrator_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'illustrator')
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose a default Google font for your site', 'illustrator'),
                'parent' => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'illustrator'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = illustrator_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose additional Google font for your site', 'illustrator'),
                'parent'        => $additional_google_fonts_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose additional Google font for your site', 'illustrator'),
                'parent'        => $additional_google_fonts_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose additional Google font for your site', 'illustrator'),
                'parent'        => $additional_google_fonts_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose additional Google font for your site', 'illustrator'),
                'parent'        => $additional_google_fonts_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'illustrator'),
                'description'   => esc_html__('Choose additional Google font for your site', 'illustrator'),
                'parent'        => $additional_google_fonts_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'illustrator'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #303030', 'illustrator'),
                'parent'        => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'second_color',
                'type'          => 'color',
                'label'         => esc_html__('Second Main Color', 'illustrator'),
                'description'   => esc_html__('Choose the second most dominant theme color. Default color is #601e58', 'illustrator'),
                'parent'        => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'illustrator'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'illustrator'),
                'parent'        => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'illustrator'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'illustrator'),
                'parent'        => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'illustrator'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = illustrator_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'illustrator'),
                'description'   => esc_html__('Choose the page background color outside box.', 'illustrator'),
                'parent'        => $boxed_container
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'illustrator'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'illustrator'),
                'parent'        => $boxed_container
            )
        );

		illustrator_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_repeating',
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

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
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
		illustrator_edge_add_admin_field(
			array(
				'name'          => 'passepartout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Passepartout', 'illustrator'),
				'description'   => esc_html__('Enabling this option will display passepartout around site content', 'illustrator'),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_passepartout_container"
				)
			)
		);

		$passepartout_container = illustrator_edge_add_admin_container(
			array(
				'parent'            => $panel_design_style,
				'name'              => 'passepartout_container',
				'hidden_property'   => 'passepartout',
				'hidden_value'      => 'no'
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name'          => 'passepartout_color',
				'type'          => 'color',
				'label'         => esc_html__('Passepartout Color', 'illustrator'),
				'description'   => esc_html__('Choose Passepartout color.', 'illustrator'),
				'parent'        => $passepartout_container
			)
		);
        illustrator_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'illustrator'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'illustrator'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => esc_html__("1300px - default", 'illustrator'),
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'illustrator'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'illustrator'),
                'parent'        => $panel_design_style
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'illustrator'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'illustrator'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = illustrator_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'illustrator')
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'illustrator'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'illustrator'),
                'parent'        => $panel_settings
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'illustrator'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'illustrator'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container, #edgtf_smooth_pt_spinner_text"
                )
            )
        );

        $page_transitions_container = illustrator_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

		illustrator_edge_add_admin_field(
			array(
				'name'          => 'page_transition_preloader',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Preloading Animation', 'illustrator' ),
				'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'illustrator' ),
				'parent'        => $page_transitions_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_page_transition_preloader_container"
				)
			)
		);

		$page_transition_preloader_container = illustrator_edge_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'page_transition_preloader_container',
				'hidden_property' => 'page_transition_preloader',
				'hidden_value'    => 'no'
			)
		);

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'illustrator'),
                'parent'        => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = illustrator_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'illustrator'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'illustrator'),
            'parent'        => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = illustrator_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        illustrator_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'illustrator'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "cube_text" => esc_html__("Animated Dot", 'illustrator'),
				"cube_text" => esc_html__("Cube Text", 'illustrator'),
                "pulse" => esc_html__("Pulse", 'illustrator'),
                "double_pulse" => esc_html__("Double Pulse", 'illustrator'),
                "cube" => esc_html__("Cube", 'illustrator'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'illustrator'),
                "stripes" => esc_html__("Stripes", 'illustrator'),
                "wave" => esc_html__("Wave", 'illustrator'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'illustrator'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'illustrator'),
                "atom" => esc_html__("Atom", 'illustrator'),
                "clock" => esc_html__("Clock", 'illustrator'),
                "mitosis" => esc_html__("Mitosis", 'illustrator'),
                "lines" => esc_html__("Lines", 'illustrator'),
                "fussion" => esc_html__("Fussion", 'illustrator'),
                "wave_circles" => esc_html__("Wave Circles", 'illustrator'),
                "pulse_circles" => esc_html__("Pulse Circles", 'illustrator')
            ),
			'args'          => array(
				"dependence"             => true,
				'show'        => array(
                    "animated_dot"          => "",
					"cube_text"             => "#edgtf_smooth_pt_spinner_text",
					"pulse"                 => "",
					"double_pulse"          => "",
					"cube"                  => "",
					"rotating_cubes"        => "",
					"stripes"               => "",
					"wave"                  => "",
					"two_rotating_circles"  => "",
					"five_rotating_circles" => "",
					"atom"                  => "",
					"clock"                 => "",
					"mitosis"               => "",
					"lines"                 => "",
					"fussion"               => "",
					"wave_circles"          => "",
					"pulse_circles"         => ""
				),
				'hide'        => array(
                    "animated_dot"          => "#edgtf_smooth_pt_spinner_text",
					"cube_text"             => "",
					"pulse"                 => "#edgtf_smooth_pt_spinner_text",
					"double_pulse"          => "#edgtf_smooth_pt_spinner_text",
					"cube"                  => "#edgtf_smooth_pt_spinner_text",
					"rotating_cubes"        => "#edgtf_smooth_pt_spinner_text",
					"stripes"               => "#edgtf_smooth_pt_spinner_text",
					"wave"                  => "#edgtf_smooth_pt_spinner_text",
					"two_rotating_circles"  => "#edgtf_smooth_pt_spinner_text",
					"five_rotating_circles" => "#edgtf_smooth_pt_spinner_text",
					"atom"                  => "#edgtf_smooth_pt_spinner_text",
					"clock"                 => "#edgtf_smooth_pt_spinner_text",
					"mitosis"               => "#edgtf_smooth_pt_spinner_text",
					"lines"                 => "#edgtf_smooth_pt_spinner_text",
					"fussion"               => "#edgtf_smooth_pt_spinner_text",
					"wave_circles"          => "#edgtf_smooth_pt_spinner_text",
					"pulse_circles"         => "#edgtf_smooth_pt_spinner_text"
				)
			)
        ));

        illustrator_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'illustrator'),
            'parent'        => $row_pt_spinner_animation
        ));


		illustrator_edge_add_admin_field(
			array(
				'name'          => 'page_transition_fadeout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Fade Out Animation', 'illustrator' ),
				'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'illustrator' ),
				'parent'        => $page_transitions_container
			)
		);
		
		illustrator_edge_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'smooth_pt_spinner_text',
			'default_value' => '',
			'label'         => esc_html__('Spinner Text', 'illustrator'),
			'parent'        => $page_transition_preloader_container,
			'args'			=> array(
				'col_width' => 2
			)
		));

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'illustrator'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'illustrator'),
                'parent'        => $panel_settings
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'illustrator'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'illustrator'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = illustrator_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'illustrator')
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'illustrator'),
                'description'   => esc_html__('Enter your custom CSS here', 'illustrator'),
                'parent'        => $panel_custom_code
            )
        );

        illustrator_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'illustrator'),
                'description'   => esc_html__('Enter your custom Javascript here', 'illustrator'),
                'parent'        => $panel_custom_code
            )
        );

		$panel_google_api = illustrator_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__('Google API', 'illustrator')
			)
		);

		illustrator_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__('Google Maps Api Key', 'illustrator'),
				'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation.', 'illustrator'),
				'parent'      => $panel_google_api
			)
		);
    }

    add_action( 'illustrator_edge_options_map', 'illustrator_edge_general_options_map', 1);

}
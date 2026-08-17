<?php
if(!function_exists('illustrator_edge_map_title_meta_fields')) {

    function illustrator_edge_map_title_meta_fields() {

        $title_meta_box = illustrator_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Title', 'illustrator'),
                'name' => 'title_meta'
            )
        );

            illustrator_edge_add_meta_box_field(
                array(
                    'name' => 'edgtf_show_title_area_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Show Title Area', 'illustrator'),
                    'description' => esc_html__('Disabling this option will turn off page title area', 'illustrator'),
                    'parent' => $title_meta_box,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__('No', 'illustrator'),
                        'yes' => esc_html__('Yes', 'illustrator')
                    ),
                    'args' => array(
                        "dependence" => true,
                        "hide" => array(
                            "" => "",
                            "no" => "#edgtf_edgtf_show_title_area_meta_container",
                            "yes" => ""
                        ),
                        "show" => array(
                            "" => "#edgtf_edgtf_show_title_area_meta_container",
                            "no" => "",
                            "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                        )
                    )
                )
            );

            $show_title_area_meta_container = illustrator_edge_add_admin_container(
                array(
                    'parent' => $title_meta_box,
                    'name' => 'edgtf_show_title_area_meta_container',
                    'hidden_property' => 'edgtf_show_title_area_meta',
                    'hidden_value' => 'no'
                )
            );


                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_in_grid_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Title Area in Grid', 'illustrator'),
                        'description' => esc_html__('Choose wheter for title content to be in grid', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'yes' => esc_html__('Yes', 'illustrator'),
                            'no' => esc_html__('No', 'illustrator')
                        )
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_type_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Title Area Type', 'illustrator'),
                        'description' => esc_html__('Choose title type', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'standard' => esc_html__('Standard', 'illustrator'),
                            'breadcrumb' => esc_html__('Breadcrumb', 'illustrator')
                        ),
                        'args' => array(
                            "dependence" => true,
                            "hide" => array(
                                "standard" => "",
                                "standard" => "",
                                "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                            ),
                            "show" => array(
                                "" => "#edgtf_edgtf_title_area_type_meta_container",
                                "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                                "breadcrumb" => ""
                            )
                        )
                    )
                );

                $title_area_type_meta_container = illustrator_edge_add_admin_container(
                    array(
                        'parent' => $show_title_area_meta_container,
                        'name' => 'edgtf_title_area_type_meta_container',
                        'hidden_property' => 'edgtf_title_area_type_meta',
                        'hidden_value' => '',
                        'hidden_values' => array('breadcrumb'),
                    )
                );

                    illustrator_edge_add_meta_box_field(
                        array(
                            'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                            'type' => 'select',
                            'default_value' => '',
                            'label' => esc_html__('Enable Breadcrumbs', 'illustrator'),
                            'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'illustrator'),
                            'parent' => $title_area_type_meta_container,
                            'options' => array(
                                '' => '',
                                'no' => esc_html__('No', 'illustrator'),
                                'yes' => esc_html__('Yes', 'illustrator')
                            ),
                        )
                    );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_animation_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Animations', 'illustrator'),
                        'description' => esc_html__('Choose an animation for Title Area', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'no' => esc_html__('No Animation', 'illustrator'),
                            'right-left' => esc_html__('Text right to left', 'illustrator'),
                            'left-right' => esc_html__('Text left to right', 'illustrator')
                        )
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_vertial_alignment_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Vertical Alignment', 'illustrator'),
                        'description' => esc_html__('Specify title vertical alignment', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'header_bottom' => esc_html__('From Bottom of Header', 'illustrator'),
                            'window_top' => esc_html__('From Window Top', 'illustrator')
                        )
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_content_alignment_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Horizontal Alignment', 'illustrator'),
                        'description' => esc_html__('Specify title horizontal alignment', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'left' => esc_html__('Left', 'illustrator'),
                            'center' => esc_html__('Center', 'illustrator'),
                            'right' => esc_html__('Right', 'illustrator')
                        )
                    )
                );

        		illustrator_edge_add_meta_box_field(
        			array(
        				'name'			=> 'edgtf_title_area_text_size_meta',
        				'type'			=> 'select',
        				'default_value'	=> '',
        				'label'			=> esc_html__('Text Size', 'illustrator'),
        				'description'	=> esc_html__('Choose a default Title size', 'illustrator'),
        				'parent'		=> $show_title_area_meta_container,
        				'options'		=> array(
        					'' => '',
        					'small'     => esc_html__('Small', 'illustrator'),
        					'medium'    => esc_html__('Medium', 'illustrator'),
        					'large'     => esc_html__('Large', 'illustrator')


        				)
        			)
        		);

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_text_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Title Color', 'illustrator'),
                        'description' => esc_html__('Choose a color for title text', 'illustrator'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_breadcrumb_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Breadcrumb Color', 'illustrator'),
                        'description' => esc_html__('Choose a color for breadcrumb text', 'illustrator'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_background_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Background Color', 'illustrator'),
                        'description' => esc_html__('Choose a background color for Title Area', 'illustrator'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_hide_background_image_meta',
                        'type' => 'yesno',
                        'default_value' => 'no',
                        'label' => esc_html__('Hide Background Image', 'illustrator'),
                        'description' => esc_html__('Enable this option to hide background image in Title Area', 'illustrator'),
                        'parent' => $show_title_area_meta_container,
                        'args' => array(
                            "dependence" => true,
                            "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                            "dependence_show_on_yes" => ""
                        )
                    )
                );

                $hide_background_image_meta_container = illustrator_edge_add_admin_container(
                    array(
                        'parent' => $show_title_area_meta_container,
                        'name' => 'edgtf_hide_background_image_meta_container',
                        'hidden_property' => 'edgtf_hide_background_image_meta',
                        'hidden_value' => 'yes'
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_background_image_meta',
                        'type' => 'image',
                        'label' => esc_html__('Background Image', 'illustrator'),
                        'description' => esc_html__('Choose an Image for Title Area', 'illustrator'),
                        'parent' => $hide_background_image_meta_container
                    )
                );

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_title_area_background_image_responsive_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Background Responsive Image', 'illustrator'),
                        'description' => esc_html__('Enabling this option will make Title background image responsive', 'illustrator'),
                        'parent' => $hide_background_image_meta_container,
                        'options' => array(
                            '' => '',
                            'no' => esc_html__('No', 'illustrator'),
                            'yes' => esc_html__('Yes', 'illustrator')
                        ),
                        'args' => array(
                            "dependence" => true,
                            "hide" => array(
                                "" => "",
                                "no" => "",
                                "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                            ),
                            "show" => array(
                                "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                                "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                                "yes" => ""
                            )
                        )
                    )
                );

                $title_area_background_image_responsive_meta_container = illustrator_edge_add_admin_container(
                    array(
                        'parent' => $hide_background_image_meta_container,
                        'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                        'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                        'hidden_value' => 'yes'
                    )
                );

                    illustrator_edge_add_meta_box_field(
                        array(
                            'name' => 'edgtf_title_area_background_image_parallax_meta',
                            'type' => 'select',
                            'default_value' => '',
                            'label' => esc_html__('Background Image in Parallax', 'illustrator'),
                            'description' => esc_html__('Enabling this option will make Title background image parallax', 'illustrator'),
                            'parent' => $title_area_background_image_responsive_meta_container,
                            'options' => array(
                                '' => '',
                                'no' => esc_html__('No', 'illustrator'),
                                'yes' => esc_html__('Yes', 'illustrator'),
                                'yes_zoom' => esc_html__('Yes, with zoom out', 'illustrator')
                            )
                        )
                    );

                illustrator_edge_add_meta_box_field(array(
                    'name' => 'edgtf_title_area_height_meta',
                    'type' => 'text',
                    'label' => esc_html__('Height', 'illustrator'),
                    'description' => esc_html__('Set a height for Title Area', 'illustrator'),
                    'parent' => $show_title_area_meta_container,
                    'args' => array(
                        'col_width' => 2,
                        'suffix' => 'px'
                    )
                ));

                illustrator_edge_add_meta_box_field(array(
                    'name' => 'edgtf_title_area_subtitle_meta',
                    'type' => 'text',
                    'default_value' => '',
                    'label' => esc_html__('Subtitle Text', 'illustrator'),
                    'description' => esc_html__('Enter your subtitle text', 'illustrator'),
                    'parent' => $show_title_area_meta_container,
                    'args' => array(
                        'col_width' => 6
                    )
                ));

                illustrator_edge_add_meta_box_field(
                    array(
                        'name' => 'edgtf_subtitle_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Subtitle Color', 'illustrator'),
                        'description' => esc_html__('Choose a color for subtitle text', 'illustrator'),
                        'parent' => $show_title_area_meta_container
                    )
                );

        		illustrator_edge_add_meta_box_field(
        			array(
        				'name'			=> 'edgtf_subtitle_size_meta',
        				'type'			=> 'select',
        				'default_value'	=> '',
        				'label'			=> esc_html__('Subtitle Text Size', 'illustrator'),
        				'description'	=> esc_html__('Choose a default subtitle size', 'illustrator'),
        				'parent'		=> $show_title_area_meta_container,
        				'options'		=> array(
        					'' => '',
        					'small'     => esc_html__('Small', 'illustrator'),
        					'medium'    => esc_html__('Medium', 'illustrator'),
        					'large'     => esc_html__('Large', 'illustrator')
        				)
        			)
        		);
            }

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_title_meta_fields');
}
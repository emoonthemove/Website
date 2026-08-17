<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class IllustratorEdgeSeparatorWidget extends IllustratorEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_separator_widget', // Base ID
            esc_html__('Edge Separator Widget', 'illustrator') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'illustrator'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'illustrator'),
                    'full-width' => esc_html__('Full Width', 'illustrator')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'illustrator'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'illustrator'),
                    'left' => esc_html__('Left', 'illustrator'),
                    'right' => esc_html__('Right', 'illustrator')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'illustrator'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'illustrator'),
                    'dashed' => esc_html__('Dashed', 'illustrator'),
                    'dotted' => esc_html__('Dotted', 'illustrator')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'illustrator'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'illustrator'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'illustrator'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'illustrator'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'illustrator'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[edgtf_separator $params]"); // XSS OK

        echo '</div>'; //close div.edgtf-separator-widget
    }
}
<?php

namespace EdgeCore\PostTypes\Testimonials\Shortcodes;

use EdgeCore\Lib;

/**
 * Class Testimonials
 * @package EdgeCore\PostTypes\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_testimonials';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map()
     */
    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__( 'Testimonials', 'edge-cpt' ),
                'base' => $this->base,
                'category' => 'by EDGE',
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Type', 'edge-cpt' ),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__( 'Simple', 'edge-cpt' ) => 'simple',
                            esc_html__( 'Carousel', 'edge-cpt' ) => 'carousel'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Category', 'edge-cpt' ),
                        'param_name' => 'category',
                        'value' => '',
                        'description' => esc_html__( 'Category Slug (leave empty for all)', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Number', 'edge-cpt' ),
                        'param_name' => 'number',
                        'value' => '',
                        'description' => esc_html__( 'Number of Testimonials', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Show Title', 'edge-cpt' ),
                        'param_name' => 'show_title',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                            esc_html__( 'No', 'edge-cpt' ) => 'no'
                        ),
                        'save_always' => true,
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Show Author', 'edge-cpt' ),
                        'param_name' => 'show_author',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                            esc_html__( 'No', 'edge-cpt' )=> 'no'
                        ),
                        'save_always' => true,
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Show Author Job Position', 'edge-cpt' ),
                        'param_name' => 'show_position',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                            esc_html__( 'No', 'edge-cpt' ) => 'no',
                        ),
                        'save_always' => true,
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Show Featured Image', 'edge-cpt' ),
                        'param_name' => 'show_featured_image',
                        'value' => array(
                            esc_html__( 'No', 'edge-cpt' ) => 'no',
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes'
                        ),
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Autoplay', 'edge-cpt' ),
                        'param_name' => 'autoplay',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' )=> 'yes',
                            esc_html__( 'No', 'edge-cpt' ) => 'no'
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Loop Testimonials', 'edge-cpt' ),
                        'param_name' => 'loop',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                            esc_html__( 'No', 'edge-cpt' ) => 'no'
                        ),
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Animation speed', 'edge-cpt' ),
                        'param_name' => 'animation_speed',
                        'value' => '',
                        'description' => esc_html__( 'Speed of slide animation in miliseconds', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Show Arrows navigation', 'edge-cpt' ),
                        'param_name' => 'arrows_navigation',
                        'value' => array(
                            esc_html__( 'No', 'edge-cpt' ) => 'no',
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                        ),
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__( 'Show Dots navigation', 'edge-cpt' ),
                        'param_name' => 'dots_navigation',
                        'value' => array(
                            esc_html__( 'Yes', 'edge-cpt' ) => 'yes',
                            esc_html__( 'No', 'edge-cpt' ) => 'no',
                        ),
                        'description' => '',
                        'group' => esc_html__( 'Layout Options', 'edge-cpt' )
                    )
                )
            ));
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'type' => 'simple',
            'number' => '-1',
            'category' => '',
            'show_title' => 'yes',
            'show_author' => 'yes',
            'show_position' => 'yes',
            'show_featured_image' => 'no',
            'autoplay' => 'yes',
            'loop' => 'yes',
            'animation_speed' => '',
            'arrows_navigation' => 'no',
            'dots_navigation' => 'yes'
        );
        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $number = esc_attr($number);
        $category = esc_attr($category);
        $animation_speed = esc_attr($animation_speed);

        $data_attr = $this->getDataParams($params);
        $query_args = $this->getQueryParams($params);

        $params['show_featured_image'] = $this->getShowImage($params);

        $html = '';
        $html .= '<div class="edgtf-testimonials-holder clearfix">';
        if ($params['type'] == 'simple') {
            $html .= '<span class="edgtf-testimonial-icon icon_quotations"></span>';
        }
        $html .= '<div class="edgtf-slick-slider-navigation-style edgtf-testimonials edgtf-testimonials-type-' . $type . '" ' . $data_attr . '>';

        query_posts($query_args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), 'edgtf_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'edgtf_testimonial_text', true);
                $title = get_post_meta(get_the_ID(), 'edgtf_testimonial_title', true);
                $job = get_post_meta(get_the_ID(), 'edgtf_testimonial_author_position', true);

                $params['author'] = $author;
                $params['text'] = $text;
                $params['title'] = $title;
                $params['job'] = $job;
                $params['current_id'] = get_the_ID();
                $html .= edge_cpt_get_shortcode_module_template_part('testimonials', $type . '-testimonials-template', '', $params);

            endwhile;
        else:
            $html .= esc_html__('Sorry, no posts matched your criteria.', 'edge-cpt');
        endif;

        wp_reset_query();
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Generates testimonial data attribute array
     *
     * @param $params
     *
     * @return string
     */
    private function getDataParams($params) {
        $data_attr = '';

        if (!empty($params['autoplay'])) {
            $data_attr .= ' data-autoplay ="' . $params['autoplay'] . '"';
        }
        
        if (!empty($params['loop'])) {
            $data_attr .= ' data-loop ="' . $params['loop'] . '"';
        }
        
        if (!empty($params['animation_speed'])) {
            $data_attr .= ' data-animation-speed ="' . $params['animation_speed'] . '"';
        }

        if (!empty($params['arrows_navigation']) && $params['arrows_navigation'] == 'no') {
            $data_attr .= ' data-arrows-navigation ="false"';
        }

        if (!empty($params['dots_navigation']) && $params['dots_navigation'] == 'no') {
            $data_attr .= ' data-dots-navigation ="false"';
        }

        return $data_attr;
    }

    /**
     * Generates testimonials query attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function getQueryParams($params) {

        $args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials_category'] = $params['category'];
        }
        return $args;
    }

    /**
     * Generates default show featured image attribute
     *
     * @param $params
     *
     * @return string
     */
    private function getShowImage($params) {
        $show_featured_image = '';

        if ($params['show_featured_image'] == '') {
            if ($params['type'] == 'simple') {
                $show_featured_image = 'no';
            } else {
                $show_featured_image = 'yes';
            }
        } else {
            $show_featured_image = $params['show_featured_image'];
        }

        return $show_featured_image;
    }

}

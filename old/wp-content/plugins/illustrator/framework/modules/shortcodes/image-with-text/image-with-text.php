<?php
namespace IllustratorEdge\Modules\ImageWithText;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageWithText implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_image_with_text';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Image With Text','illustrator'),
					'base' => $this->base,
					'category' => esc_html__('by EDGE','illustrator'),
					'icon' => 'icon-wpb-image-with-text extended-custom-icon',
					'params' => array(
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Image','illustrator'),
							'param_name' => 'image',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Link','illustrator'),
							'param_name'  => 'link',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Target','illustrator'),
							'param_name' => 'target',
							'value'      => array(
								''      => '',
								esc_html__('Self','illustrator')  => '_self',
								esc_html__('Blank','illustrator') => '_blank'
							),
							'dependency' => array('element' => 'link', 'not_empty' => true),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Subtitle','illustrator'),
							'param_name'  => 'subtitle',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Title','illustrator'),
							'param_name'  => 'title',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Title Tag','illustrator'),
							'param_name' => 'title_tag',
							'value'      => array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							),
							'dependency' => array('element' => 'title', 'not_empty' => true),
							'group'      => esc_html__('Text Settings','illustrator')
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Title Color','illustrator'),
							'param_name' => 'title_color',
							'dependency' => array('element' => 'title', 'not_empty' => true),
							'group'      => esc_html__('Text Settings','illustrator')
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Subtitle Color','illustrator'),
							'param_name' => 'subtitle_color',
							'dependency' => array('element' => 'subtitle', 'not_empty' => true),
							'group'      => esc_html__('Text Settings','illustrator')
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Enable Shadow','illustrator'),
							'param_name' => 'enable_shadow',
							'value'      => array(
								esc_html__('Yes','illustrator') => 'yes',
								esc_html__('No','illustrator') => 'no',
							),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'     => '',
			'link' => '',
			'target' => '_self',
			'subtitle' => '',
			'title'     => '',
			'title_tag' => 'h3',
			'title_color' => '',
			'subtitle_color' => '',
			'enable_shadow' => 'yes'
		);
		
		$params = 	shortcode_atts($args, $atts);
		extract($params);

		$params['image']= wp_get_attachment_url($params['image']);
		$params['classes']    = $this->getClasses($params);
		$params['title_styles']    = $this->getTitleStyles($params);
		$params['subtitle_styles']     = $this->getSubtitleStyles($params);

		$html = illustrator_edge_get_shortcode_module_template_part('templates/image-with-text-template', 'image-with-text', '', $params);

		return $html;
	}

	/**
	 * Returns string of holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getClasses($params) {
		$classes = array();

		if($params['enable_shadow'] == 'yes') {
			$classes[] = 'edgtf-imt-shadow';
		}

		return implode(' ', $classes);
	}

	/**
	 * Returns array for title style
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getTitleStyles($params) {
		$styles = array();

		if(!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}

		return $styles;
	}

	private function getSubtitleStyles($params) {
		$styles = array();

		if(!empty($params['subtitle_color'])) {
			$styles[] = 'color: '.$params['subtitle_color'];
		}

		return $styles;
	}
}

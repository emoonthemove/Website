<?php
namespace IllustratorEdge\Modules\Shortcodes\VerticalSplitSliderContentItem;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSliderContentItem implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_vertical_split_slider_content_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Slide Content Item', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-vertical-split-slider-content-item extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'edgtf_vertical_split_slider_left_panel,edgtf_vertical_split_slider_right_panel'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'			=>	'colorpicker',
					'heading'		=>	esc_html__('Background Color','illustrator'),
					'param_name'	=>	'background_color',
				),
				array(
					'type'			=>	'attach_image',
					'heading'		=>	esc_html__('Background Image','illustrator'),
					'param_name'	=>	'background_image',
				),
				array(
					'type'			=>	'textfield',
					'heading'		=>	esc_html__('Padding left/right','illustrator'),
					'param_name'	=>	'item_padding',
					"description"	=>	esc_html__('Please insert padding in format "10px"','illustrator')
				),
				array(
					'type'			=>	'dropdown',
					'heading'		=>	esc_html__('Content Aligment','illustrator'),
					'param_name'	=>	'alignment',
					'value' => array(
						esc_html__('Left','illustrator')		=> 'left',
						esc_html__('Right','illustrator')		=> 'right',
						esc_html__('Center','illustrator')	=> 'center'
					)
				),
				array(
					'type'			=>	'dropdown',
					'heading'		=>	esc_html__('Header/Bullets Style','illustrator'),
					'param_name'	=>	'bullet_style',
					'value' => array(
						esc_html__('Default','illustrator')	=> '',
						esc_html__('Light','illustrator')		=> 'light',
						esc_html__('Dark','illustrator')		=> 'dark'
					),
					'description' => esc_html__('Set this option on items in right holder','illustrator')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'background_color'	=> '',
			'background_image'	=> '',
			'item_padding'		=> '',
			'alignment'			=> 'left',
			'bullet_style'		=> '',
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['content_style'] = $this->getContentStyle($params);
		$params['content_data'] = $this->getContentData($params);
		$params['content'] = $content;

		$html = illustrator_edge_get_shortcode_module_template_part('templates/vertical-split-slider-content-item-template', 'vertical-split-slider', '', $params);

		return $html;

	}


	/**
	 * Return Content Style
	 *
	 * @param $params
	 * @return array
	 */
	private function getContentStyle($params) {

		$content_style = array();

		if ($params['background_color'] !== '') {
			$content_style[] = 'background-color:'. $params['background_color'];
		}

		if ($params['background_image'] !== '') {
			$url = wp_get_attachment_url($params['background_image']);
			$content_style[] = 'background-image:url('. $url . ')';
		}

		if ($params['item_padding'] !== '') {
			$content_style[] = 'padding:'. $params['item_padding'] . 'px';
		}

		if ($params['alignment'] !== '') {
			$content_style[] = 'text-align:'. $params['alignment'];
		}


		return $content_style;
	}

	private function getContentData($params) {

		$data = array();

		if ($params['bullet_style'] !== '') {
			$data['data-bullet-style'] = $params['bullet_style'];
		}


		return $data;
	}
}

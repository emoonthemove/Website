<?php
namespace IllustratorEdge\Modules\Shortcodes\Separator;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class Separator implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base = 'edgtf_separator';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map(
			array(
				'name' => esc_html__('Separator', 'illustrator'),
				'base' => $this->base,
				'category' => esc_html__('by EDGE','illustrator'),
				'icon' => 'icon-wpb-separator extended-custom-icon',
				'show_settings_on_create' => true,
				'class' => 'wpb_vc_separator',
				'custom_markup' => '<div></div>',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Extra class name','illustrator'),
						'param_name' => 'class_name',
						'value' => '',
						'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','illustrator')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type','illustrator'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Normal','illustrator') =>	'normal',
							esc_html__('Full Width','illustrator') =>	'full-width'
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Position','illustrator'),
						'param_name' => 'position',
						'value' => array(
							esc_html__('Center','illustrator') => 'center',
							esc_html__('Left','illustrator') => 'left',
							esc_html__('Right','illustrator') => 'right'
						),
						'save_always' => true,
						'dependency' => array('element' => 'type', 'value' => array('normal'))
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Color','illustrator'),
						'param_name' => 'color',
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Border Style','illustrator'),
						'param_name' => 'border_style',
						'value' => array(
							esc_html__('Default','illustrator') => '',
							esc_html__('Dashed','illustrator') => 'dashed',
							esc_html__('Solid','illustrator') => 'solid',
							esc_html__('Dotted','illustrator') => 'dotted'
						)
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Width','illustrator'),
						'param_name' => 'width',
						'dependency' => array('element' => 'type', 'value' => array('normal'))
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Thickness (px)','illustrator'),
						'param_name' => 'thickness',
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Top Margin','illustrator'),
						'param_name' => 'top_margin',
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Bottom Margin','illustrator'),
						'param_name' => 'bottom_margin',
					)
				)
			)
		);

	}

	public function render($atts, $content = null) {
		$args = array(
			'class_name'	=>	'',
			'type'			=>	'',
			'position'		=>	'center',
			'color'			=>	'',
			'border_style'	=>	'',
			'width'			=>	'',
			'thickness'		=>	'',
			'top_margin'	=>	'',
			'bottom_margin'	=>	''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['separator_class'] = $this->getSeparatorClass($params);
		$params['separator_style'] = $this->getSeparatorStyle($params);


		$html = illustrator_edge_get_shortcode_module_template_part('templates/separator-template', 'separator', '', $params);

		return $html;
	}


	/**
	 * Return Separator classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getSeparatorClass($params) {

		$separator_class = array();

		if ($params['class_name'] !== '') {
			$separator_class[] = $params['class_name'];
		}
		if ($params['position'] !== '') {
			$separator_class[] = 'edgtf-separator-'.$params['position'];
		}
		if ($params['type'] !== '') {
			$separator_class[] = 'edgtf-separator-'.$params['type'];
		}

		return implode(' ', $separator_class);

	}

	/**
	 * Return Separator style
	 *
	 * @param $params
	 * @return array
	 */
	private function getSeparatorStyle($params) {

		$separator_style = array();

		if ($params['color'] !== '') {
			$separator_style[] = 'border-color: ' . $params['color'];
		}
		if ($params['border_style'] !== '') {
			$separator_style[] = 'border-style: ' . $params['border_style'];
		}
		if ($params['width'] !== '') {
			if(illustrator_edge_string_ends_with($params['width'], '%') || illustrator_edge_string_ends_with($params['width'], 'px')) {
				$separator_style[] = 'width: ' . $params['width'];
			}else{
				$separator_style[] = 'width: ' . $params['width'] . 'px';
			}
		}
		if ($params['thickness'] !== '') {
			$separator_style[] = 'border-bottom-width: ' . $params['thickness'] . 'px';
		}
		if ($params['top_margin'] !== '') {
			if(illustrator_edge_string_ends_with($params['top_margin'], '%') || illustrator_edge_string_ends_with($params['top_margin'], 'px')) {
				$separator_style[] = 'margin-top: ' . $params['top_margin'];
			}else{
				$separator_style[] = 'margin-top: ' . $params['top_margin'] . 'px';
			}
		}
		if ($params['bottom_margin'] !== '') {
			if(illustrator_edge_string_ends_with($params['bottom_margin'], '%') || illustrator_edge_string_ends_with($params['bottom_margin'], 'px')) {
				$separator_style[] = 'margin-bottom: ' . $params['bottom_margin'];
			}else{
				$separator_style[] = 'margin-bottom: ' . $params['bottom_margin'] . 'px';
			}
		}
		return implode(';', $separator_style);

	}

}

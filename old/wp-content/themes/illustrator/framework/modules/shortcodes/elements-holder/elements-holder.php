<?php
namespace IllustratorEdge\Modules\Shortcodes\ElementsHolder;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elements Holder', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'as_parent' => array('only' => 'edgtf_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Background Color','illustrator'),
					'param_name' => 'background_color',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Columns','illustrator'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column','illustrator') => 'one-column',
						esc_html__('2 Columns','illustrator') => 'two-columns',
						esc_html__('3 Columns','illustrator') => 'three-columns',
						esc_html__('4 Columns','illustrator') => 'four-columns',
						esc_html__('5 Columns','illustrator') => 'five-columns',
						esc_html__('6 Columns','illustrator') => 'six-columns'
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Items Float Left','illustrator'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?','illustrator') => 'yes'),
				),
				array(
					'type' => 'dropdown',
					'group' => esc_html__('Width & Responsiveness','illustrator'),
					'heading' => esc_html__('Switch to One Column','illustrator'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
						esc_html__('Default','illustrator')	=> '',
						esc_html__('Below 1280px','illustrator') => '1280',
						esc_html__('Below 1024px','illustrator') => '1024',
						esc_html__('Below 768px','illustrator') => '768',
						esc_html__('Below 600px','illustrator') => '600',
						esc_html__('Below 480px','illustrator') => '480',
						esc_html__('Never','illustrator') => 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column','illustrator')
				),
				array(
					'type' => 'dropdown',
					'group' => esc_html__('Width & Responsiveness','illustrator'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode','illustrator'),
					'param_name' => 'alignment_one_column',
					'value' => array(
						esc_html__('Default','illustrator')	=> '',
						esc_html__('Left','illustrator') => 'left',
						esc_html__('Center','illustrator') => 'center',
						esc_html__('Right','illustrator') => 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column','illustrator')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'edgtf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'edgtf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'edgtf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'edgtf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'edgtf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'edgtf-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . illustrator_edge_get_class_attribute($elements_holder_class) . ' ' . illustrator_edge_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}

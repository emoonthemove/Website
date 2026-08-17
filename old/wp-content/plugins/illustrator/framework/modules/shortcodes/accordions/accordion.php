<?php
namespace IllustratorEdge\Modules\Shortcodes\Accordion;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class Accordion implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'edgtf_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Accordion', 'illustrator'),
			'base' => $this->base,
			'as_parent' => array('only' => 'edgtf_accordion_tab'),
			'content_element' => true,
			'category' => esc_html__('by EDGE','illustrator'),
			'icon' => 'icon-wpb-accordion extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'illustrator' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'illustrator' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Style','illustrator'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Accordion','illustrator') => 'accordion',
						esc_html__('Toggle','illustrator') => 'toggle'
					),
					'save_always' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Color Style','illustrator'),
					'param_name' => 'color_style',
					'value' => array(
						esc_html__('Default','illustrator') => '',
						esc_html__('Grey','illustrator') => 'grey',
						esc_html__('White','illustrator') => 'white'
					)
				)
			)
		) );
	}
	public function render($atts, $content = null) {
		$default_atts=(array(
			'el_class'		=> '',
			'style'			=> 'accordion',
			'color_style'	=> ''
		));
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
 		$acc_class = $this->getAccordionClasses($params);
		$params['acc_class'] = $acc_class;
		$params['content'] = $content;
		
		$output = '';
		
		$output .= illustrator_edge_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		
		$acc_class = array();
		$style = $params['style'];
		switch($style) {
			case 'toggle':
				$acc_class[] = 'edgtf-toggle';
				$acc_class[] = 'edgtf-initial';
				break;
			default:
				$acc_class[] = 'edgtf-accordion';
				$acc_class[] = 'edgtf-initial';
		}

		if ($params['color_style'] !== ''){
			$acc_class[] = 'edgtf-style-'.$params['color_style'];
		}
		if ($params['el_class'] !== ''){
			$acc_class[] = $params['el_class'];
		}

		return implode(' ', $acc_class);
	}
}

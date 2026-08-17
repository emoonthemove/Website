<?php
namespace IllustratorEdge\Modules\Shortcodes\Process;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessHolder implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_holder';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process','illustrator'),
			'base'                    => $this->getBase(),
			'as_parent'               => array('only' => 'edgtf_process_item'),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'category'                => esc_html__('by EDGE','illustrator'),
			'icon'                    => 'icon-wpb-process-holder extended-custom-icon',
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'param_name'  => 'number_of_items',
					'heading'     => esc_html__('Number of Process Items','illustrator'),
					'value'       => array(
						esc_html__('Three','illustrator') => 'three',
						esc_html__('Four','illustrator')  => 'four',
						esc_html__('Five','illustrator')  => 'five'
					),
					'admin_label' => true,
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number_of_items' => 'three'
		);

		$params            = shortcode_atts($default_atts, $atts);
		$params['content'] = $content;

		$params['holder_classes'] = array(
			'edgtf-process-holder',
			'edgtf-process-holder-items-'.$params['number_of_items']
		);

		return illustrator_edge_get_shortcode_module_template_part('templates/process-holder-template', 'process', '', $params);
	}
}
<?php
namespace IllustratorEdge\Modules\Shortcodes\Process;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_item';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process Item','illustrator'),
			'base'                    => $this->getBase(),
			'as_child'                => array('only' => 'edgtf_process_holder'),
			'category'                => esc_html__('by EDGE','illustrator'),
			'icon'                    => 'icon-wpb-process-item extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Number','illustrator'),
					'param_name'  => 'number',
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title','illustrator'),
					'param_name'  => 'title',
					'admin_label' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text','illustrator'),
					'param_name'  => 'text',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Highlight Item?','illustrator'),
					'param_name'  => 'highlighted',
					'value'       => array(
						esc_html__('No','illustrator')  => 'no',
						esc_html__('Yes','illustrator') => 'yes'
					),
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number'     => '',
			'title'     => '',
			'text'      => '',
			'highlighted' => 'no'
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['item_classes'] = array(
			'edgtf-process-item-holder'
		);

		if($params['highlighted'] === 'yes') {
			$params['item_classes'][] = 'edgtf-pi-highlighted';
		}

		return illustrator_edge_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
	}

}
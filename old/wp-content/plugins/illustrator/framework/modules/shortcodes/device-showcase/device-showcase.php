<?php
namespace IllustratorEdge\Modules\Shortcodes\DeviceShowcase;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class DeviceShowcase implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'degtf_device_showcase';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Device Showcase', 'illustrator'),
					'base' => $this->base,
					'content_element' => true,
					'category' => esc_html__('by EDGE','illustrator'),
					'icon' => 'icon-wpb-device-showcase extended-custom-icon',
					'show_settings_on_create' => true,
					'params' => array(
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Image','illustrator'),
							'param_name' => 'image',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Title','illustrator'),
							'param_name' => 'image_title',
							'admin_label'	=> true,
						    'dependency' => array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link','illustrator'),
							'param_name' => 'image_link',
							'description' => esc_html__('Set an external URL to link to.','illustrator'),
							'admin_label'	=> true,
						    'dependency' => array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Target','illustrator'),
							'param_name' => 'image_target',
							'value' => array(
								esc_html__('Same Window','illustrator') => '_self',
								esc_html__('New Window','illustrator') => '_blank',
							),
						    'dependency' => array('element' => 'image_link', 'not_empty' => true),
							'save_always' => true,
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' => '',
			'image_link' => '',
			'image_target' => '_self',
			'image_title'	=> '',
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['shortcode_classes'] = $this->getShortcodeClasses($params);

		$html = illustrator_edge_get_shortcode_module_template_part('templates/device-showcase-template' , 'device-showcase', '', $params);

		return $html;
	}

	/**
	 * Return Device Showcase classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getShortcodeClasses($params) {

		$shortcode_classes = array();

		$shortcode_classes[] = 'edgtf-device-showcase';

		return implode(' ', $shortcode_classes);
	}
}

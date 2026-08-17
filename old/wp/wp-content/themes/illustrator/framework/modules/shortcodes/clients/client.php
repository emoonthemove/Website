<?php
namespace IllustratorEdge\Modules\Shortcodes\Client;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class Client implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_client';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Client', 'illustrator'),
					'base' => $this->base,
					'content_element' => true,
					'category' => esc_html__('by EDGE','illustrator'),
					'icon' => 'icon-wpb-client extended-custom-icon',
					'as_child' => array('only' => 'edgtf_clients'),
					'params' => array(
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Image','illustrator'),
							'param_name' => 'image'
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Hover Image','illustrator'),
							'param_name' => 'hover_image',
							'dependency' => Array('element' => 'image', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Hover Type','illustrator'),
							'param_name' => 'hover_type',
							'value' => array(
								esc_html__('Roll Over','illustrator') => 'roll-over',
								esc_html__('Fade','illustrator') => 'fade'
							),
							'save_always' => true,
							'dependency' => Array('element' => 'hover_image', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link','illustrator'),
							'param_name' => 'link'
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Link Target','illustrator'),
							'param_name' => 'link_target',
							'value' => array(
								'' => '',
								esc_html__('Self','illustrator') => '_self',
								esc_html__('Blank','illustrator') => '_blank'
							)
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' => '',
			'hover_image' => '',
			'hover_type' => '',
			'link' => '',
			'link_target' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;


		if(is_numeric($params['image'])) {
			$params['image'] = wp_get_attachment_url($params['image']);
			$params['image_alt'] = esc_attr(get_post_meta($params['image'], '_wp_attachment_image_alt', true));
		}
		if(is_numeric($params['hover_image'])) {
			$params['hover_image'] = wp_get_attachment_url($params['hover_image']);
			$params['hover_image_alt'] = esc_attr(get_post_meta($params['hover_image'], '_wp_attachment_image_alt', true));
		}

		if($params['hover_type'] !== '') {
			$params['class'] = 'edgtf-clients-' . $hover_type;
		} else {
			$params['class'] = 'edgtf-hover-opacity';
		}

		if($params['link_target'] == ''){
			$params['link_target'] = '_self';
		}

		$html = illustrator_edge_get_shortcode_module_template_part('templates/client-template', 'clients', '', $params);

		return $html;
	}

}

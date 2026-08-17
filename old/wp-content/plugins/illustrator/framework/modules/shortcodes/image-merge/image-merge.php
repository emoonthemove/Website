<?php
namespace IllustratorEdge\Modules\ImageMerge;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageMerge implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_image_merge';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Image Merge','illustrator'),
					'base' => $this->base,
					'category' => esc_html__('by EDGE','illustrator'),
					'icon' => 'icon-wpb-image-merge extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					"params" => array(
						array(
							"type" => "textfield",
							"heading" => esc_html__("Scroll Amount (px)",'illustrator'),
							"param_name" => "height",
							"description" => esc_html__("How many pixels of scrolling the animation lasts. The default value adapts to smaller screens.",'illustrator'),
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Quicker Top Image",'illustrator'),
							"param_name" => "ver_img_1",
							"description" => esc_html__("This image enters the screen from top moving faster.",'illustrator')
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Quicker Bottom Image",'illustrator'),
							"param_name" => "ver_img_2",
							"description" => esc_html__("This image enters the screen from bottom moving faster.",'illustrator')
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Slower Top Image",'illustrator'),
							"param_name" => "ver_img_3",
							"description" => esc_html__("This image enters the screen from top moving slower.",'illustrator')
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Slower Bottom Image",'illustrator'),
							"param_name" => "ver_img_4",
							"description" => esc_html__("This image enters the screen from bottom moving slower.",'illustrator')
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Image Entering From the Left",'illustrator'),
							"param_name" => "hor_img_1",
							"description" => esc_html__("This image enters the screen from the left.",'illustrator')
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Image Entering From the Right",'illustrator'),
							"param_name" => "hor_img_2",
							"description" => esc_html__("This image enters the screen from the right.",'illustrator')
						)
					)				
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'height'     	=> '',
			'ver_img_1'     => '',
			'ver_img_2'     => '',
			'ver_img_3'     => '',
			'ver_img_4'     => '',
			'hor_img_1'     => '',
			'hor_img_2'     => '',
		);
		
		$params = 	shortcode_atts($args, $atts);
		extract($params);

		$params['shortcode_styles'] =  $this->getShortcodeStyles($params);

		$html = illustrator_edge_get_shortcode_module_template_part('templates/image-merge-template', 'image-merge', '', $params);

		return $html;
	}


	/**
	 * Return shortcode styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getShortcodeStyles($params) {

		$shortcode_styles = array();

		if ($params['height'] !== '') {
			$shortcode_styles[] = 'height: ' . illustrator_edge_filter_px($params['height']);
		}

		return implode(';', $shortcode_styles);

	}

}

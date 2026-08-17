<?php
namespace IllustratorEdge\Modules\Shortcodes\ElementsHolderItem;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_elements_holder_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Elements Holder Item', 'illustrator'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_elements_holder'),
					'as_parent' => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
					'content_element' => true,
					'category' => esc_html__('by EDGE','illustrator'),
					'icon' => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Background Color','illustrator'),
							'param_name' => 'background_color',
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Background Image','illustrator'),
							'param_name' => 'background_image',
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Zoom Effect','illustrator'),
							'param_name' => 'zoom_effect',
							'value' => array(
								esc_html__('No','illustrator') => 'no',
								esc_html__('Yes','illustrator') => 'yes'
							),
							'dependency' => array('element' => 'background_image', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Padding','illustrator'),
							'param_name' => 'item_padding',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Horizontal Alignment','illustrator'),
							'param_name' => 'horizontal_aligment',
							'value' => array(
								esc_html__('Left','illustrator') => 'left',
								esc_html__('Right','illustrator') => 'right',
								esc_html__('Center','illustrator') => 'center'
							),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Vertical Alignment','illustrator'),
							'param_name' => 'vertical_alignment',
							'value' => array(
								esc_html__('Middle','illustrator')    => 'middle',
								esc_html__('Top','illustrator')    	=> 'top',
								esc_html__('Bottom','illustrator')    => 'bottom'
							),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Enable Border','illustrator'),
							'param_name' => 'enable_border',
							'value' => array(
								esc_html__('No','illustrator')    => 'no',
								esc_html__('Yes','illustrator')   => 'yes'
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Border Color','illustrator'),
							'param_name' => 'border_color',
							'dependency' => array('element' => 'enable_border', 'value' => 'yes')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Border Size (px)','illustrator'),
							'param_name' => 'border_size',
							'dependency' => array('element' => 'enable_border', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Make Whole Item Clickable','illustrator'),
							'param_name' => 'clickable',
							'value' => array(
								esc_html__('No','illustrator')    => 'no',
								esc_html__('Yes','illustrator')   => 'yes'
							)
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link','illustrator'),
							'param_name' => 'link',
							'dependency' => array('element' => 'clickable', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Link Target','illustrator'),
							'param_name' => 'target',
							'save_always' => true,
							'dependency' => array('element' => 'link', 'not_empty' => true),
							'value' => array(
								esc_html__('Same Window','illustrator')    => '_self',
								esc_html__('New Window','illustrator')    => '_blank',
							)
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Animation Name','illustrator'),
							'param_name' => 'animation_name',
							'value' => array(
								esc_html__('No Animation','illustrator') => '',
								esc_html__('Fade In','illustrator')	=> 'fade-in',
								esc_html__('Fade In Left','illustrator') => 'fade-in-left',
								esc_html__('Fade In Right','illustrator') => 'fade-in-right',
								esc_html__('Fade In Up','illustrator') => 'fade-in-up',
								esc_html__('Fade In Down','illustrator') => 'fade-in-down',
								esc_html__('Grow In','illustrator')	=> 'grow-in',
							)
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Animation Delay (ms)','illustrator'),
							'param_name' => 'animation_delay',
							'dependency' => array('element' => 'animation_name', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on screen size between 1280px-1440px','illustrator'),
							'param_name' => 'item_padding_1280_1440',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on screen size between 1024px-1280px','illustrator'),
							'param_name' => 'item_padding_1024_1280',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on screen size between 768px-1024px','illustrator'),
							'param_name' => 'item_padding_768_1024',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on screen size between 600px-768px','illustrator'),
							'param_name' => 'item_padding_600_768',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on screen size between 480px-600px','illustrator'),
							'param_name' => 'item_padding_480_600',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','illustrator'),
							'heading' => esc_html__('Padding on Screen Size Bellow 480px','illustrator'),
							'param_name' => 'item_padding_480',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px','illustrator')
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
			'background_image' => '',
			'zoom_effect' => '',
			'item_padding' => '',
			'horizontal_aligment' => '',
			'vertical_alignment' => '',
			'enable_border' => '',
			'border_color' => '',
			'border_size' => '',
			'clickable'	=> '',
			'link'	=> '',
			'target'	=> '_self',
			'animation_name' => '',
			'animation_delay' => '',
			'item_padding_1280_1440' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024' => '',
			'item_padding_600_768' => '',
			'item_padding_480_600' => '',
			'item_padding_480' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$rand_class = 'edgtf-elements-holder-custom-' . mt_rand(100000,1000000);

		$params['elements_holder_item_style'] = $this->getElementsHolderItemStyle($params);
		$params['background_image_div_styles'] = $this->getBackgroundImageDivStyles($params);
		$params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
		$params['elements_holder_item_class'] = $this->getElementsHolderItemClass($params);
		$params['elements_holder_item_content_class'] = $rand_class;
		$params['elements_holder_item_data'] = $this->getData($params);

		$html = illustrator_edge_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

		return $html;
	}


	/**
	 * Return Elements Holder Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemStyle($params) {

		$element_holder_item_style = array();

		if ($params['background_color'] !== '') {
			$element_holder_item_style[] = 'background-color: ' . $params['background_color'];
		}
		if ($params['background_image'] !== '' && $params['zoom_effect'] !== 'yes') {
			$element_holder_item_style[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}
		if ($params['animation_delay'] !== '') {
			$element_holder_item_style[] = 'transition-delay:' . $params['animation_delay'] .'ms;'. '-webkit-transition-delay:' . $params['animation_delay'] .'ms';
		}
		if ($params['border_color'] !== '') {
			$element_holder_item_style[] = 'border-color:' . $params['border_color'];
		}
		if ($params['border_size'] !== '') {
			$element_holder_item_style[] = 'border-width:' . illustrator_edge_filter_px($params['border_size']). 'px';
		}
		return implode(';', $element_holder_item_style);

	}

	/**
	 * Return Background Image Div Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getBackgroundImageDivStyles($params) {

		$background_image_div_styles = array();

		if ($params['background_image'] !== '' && $params['zoom_effect'] == 'yes') {
			$background_image_div_styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}

		return implode(';', $background_image_div_styles);
	}

	/**
	 * Return Elements Holder Item Content style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentStyle($params) {

		$element_holder_item_content_style = array();

		if ($params['item_padding'] !== '') {
			$element_holder_item_content_style[] = 'padding: ' . $params['item_padding'];
		}

		return implode(';', $element_holder_item_content_style);

	}

	/**
	 * Return Elements Holder Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemClass($params) {

		$element_holder_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$element_holder_item_class[] = 'edgtf-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$element_holder_item_class[] = 'edgtf-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		if ($params['animation_name'] !== '') {
			$element_holder_item_class[] = 'edgtf-'. $params['animation_name'];
		}

		if ($params['enable_border'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-with-border';
		}

		if ($params['zoom_effect'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-with-zoom';
		}

		if ($params['clickable'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-clickable';
		}

		return implode(' ', $element_holder_item_class);

	}

	private function getData($params) {
		$data = array();

		if($params['animation_name'] !== '') {
			$data['data-animation'] = 'edgtf-'.$params['animation_name'];
		}

        $data['data-item-class'] = $params['elements_holder_item_content_class'];
        
        if ($params['item_padding_1280_1440'] !== '') {
            $data['data-1280-1440'] = $params['item_padding_1280_1440'];
        }

        if ($params['item_padding_1024_1280'] !== '') {
            $data['data-1024-1280'] = $params['item_padding_1024_1280'];
        }

        if ($params['item_padding_768_1024'] !== '') {
            $data['data-768-1024'] = $params['item_padding_768_1024'];
        }

        if ($params['item_padding_600_768'] !== '') {
            $data['data-600-768'] = $params['item_padding_600_768'];
        }

        if ($params['item_padding_480_600'] !== '') {
            $data['data-480-600'] = $params['item_padding_480_600'];
        }

        if ($params['item_padding_480'] !== '') {
            $data['data-480'] = $params['item_padding_480'];
        }
        
		return $data;
	}
}

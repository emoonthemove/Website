<?php
namespace IllustratorEdge\Modules\Shortcodes\CallToAction;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_call_to_action';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		$call_to_action_button_icons_array = array();
		$call_to_action_button_IconCollections = illustrator_edge_icon_collections()->iconCollections;
		foreach($call_to_action_button_IconCollections as $collection_key => $collection) {

			$call_to_action_button_icons_array[] = array(
				'type' => 'dropdown',
				'heading' => esc_html__('Button Icon','illustrator'),
				'param_name' => 'button_'.$collection->param,
				'value' => $collection->getIconsArray(),
				'save_always' => true,
				'dependency' => Array('element' => 'button_icon_pack', 'value' => array($collection_key))
			);

		}

		vc_map( array(
				'name' => esc_html__('Call To Action', 'illustrator'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE','illustrator'),
				'icon' => 'icon-wpb-call-to-action extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array_merge(
					array(
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Full Width','illustrator'),
							'param_name'    => 'full_width',
							'value'         => array(
								esc_html__('Yes','illustrator') => 'yes',
								esc_html__('No','illustrator') => 'no'
							),
						),
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Content in grid','illustrator'),
							'param_name'    => 'content_in_grid',
							'value'         => array(
								esc_html__('Yes','illustrator') => 'yes',
								esc_html__('No','illustrator') => 'no'
							),
							'dependency'    => array('element' => 'full_width', 'value' => 'yes')
						),
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Content Layout','illustrator'),
							'param_name'    => 'grid_size',
							'value'         => array(
								'75/25'     => '75',
								'50/50'     => '50',
								'66/33'     => '66'
							)
						),
						array(
							'type' 			=> 'dropdown',
							'heading'		=> esc_html__('Type','illustrator'),
							'param_name' 	=> 'type',
							'value' 		=> array(
								esc_html__('Normal','illustrator') 	=> 'normal',
								esc_html__('With Icon','illustrator') => 'with-icon',
							),
						)
					),
					illustrator_edge_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => array('with-icon'))),
					array(
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Icon Size (px)','illustrator'),
							'param_name' 	=> 'icon_size',
							'dependency' 	=> Array('element' => 'type', 'value' => array('with-icon')),
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Box Padding (top right bottom left) px','illustrator'),
							'param_name' 	=> 'box_padding',
							'description' 	=> esc_html__('Default padding is 20px on all sides','illustrator'),
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__('Text Color','illustrator'),
							'param_name'  => 'text_color',
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> esc_html__('Background Color','illustrator'),
							'param_name' 	=> 'background_color',
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Default Text Font Size (px)','illustrator'),
							'param_name' 	=> 'text_size',
							'description' 	=> esc_html__('Font size for p tag','illustrator'),
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type' 			=> 'dropdown',
							'heading' 		=> esc_html__('Show Button','illustrator'),
							'param_name' 	=> 'show_button',
							'value' 		=> array(
								esc_html__('Yes','illustrator') => 'yes',
								esc_html__('No','illustrator') => 'no'
							),
							'save_always' 	=> true,
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Position','illustrator'),
							'param_name' => 'button_position',
							'value' => array(
								esc_html__('Default/right','illustrator') => '',
								esc_html__('Center','illustrator') => 'center',
								esc_html__('Left','illustrator') => 'left'
							),
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Size','illustrator'),
							'param_name' => 'button_size',
							'value' => array(
								esc_html__('Default','illustrator') => '',
								esc_html__('Small','illustrator') => 'small',
								esc_html__('Medium','illustrator') => 'medium',
								esc_html__('Large','illustrator') => 'large',
								esc_html__('Extra Large','illustrator') => 'huge'
							),
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
							'group'			=> esc_html__('Design Options','illustrator')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Button Text','illustrator'),
							'param_name' => 'button_text',
							'description' => esc_html__('Default text is "button"','illustrator'),
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Button Link','illustrator'),
							'param_name' => 'button_link',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Target','illustrator'),
							'param_name' => 'button_target',
							'value' => array(
								'' => '',
								esc_html__('Self','illustrator') => '_self',
								esc_html__('Blank','illustrator') => '_blank'
							),
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Icon Pack','illustrator'),
							'param_name' => 'button_icon_pack',
							'value' => array_merge(array('No Icon' => ''),illustrator_edge_icon_collections()->getIconCollectionsVC()),
							'save_always' => true,
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						)
					),
					$call_to_action_button_icons_array,
					array(
						array(
							'type' => 'textarea_html',
							'admin_label' => true,
							'heading' => esc_html__('Content','illustrator'),
							'param_name' => 'content',
							'value' => '<p>'.esc_html__('I am test text for Call to action.','illustrator').'</p>'
						)
					)
				)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type' => 'normal',
			'full_width' => 'yes',
			'content_in_grid' => 'yes',
			'grid_size' => '75',
			'icon_size' => '',
			'box_padding' => '20px',
			'text_size' => '',
			'show_button' => 'yes',
			'button_position' => 'right',
			'button_size' => '',
			'button_link' => '',
			'button_text' => 'button',
			'button_target' => '',
			'button_icon_pack' => '',
			'text_color' => '',
			'background_color' => '',
		);

		$call_to_action_icons_form_fields = array();

		foreach (illustrator_edge_icon_collections()->iconCollections as $collection_key => $collection) {

			$call_to_action_icons_form_fields['button_' . $collection->param ] = '';

		}

		$args = array_merge($args, illustrator_edge_icon_collections()->getShortcodeParams(),$call_to_action_icons_form_fields);

		$params = shortcode_atts($args, $atts);

		$params['content']= preg_replace('#^<\/p>|<p>$#', '', $content);
		$params['text_wrapper_classes'] = $this->getTextWrapperClasses($params);
		$params['content_styles'] = $this->getContentStyles($params);
		$params['call_to_action_styles'] = $this->getCallToActionStyles($params);
		$params['icon'] = $this->getCallToActionIcon($params);
		$params['button_parameters'] = $this->getButtonParameters($params);

		//Get HTML from template
		$html = illustrator_edge_get_shortcode_module_template_part('templates/call-to-action-template', 'calltoaction', '', $params);

		return $html;

	}

	/**
	 * Return Classes for Call To Action text wrapper
	 *
	 * @param $params
	 * @return string
	 */
	private function getTextWrapperClasses($params) {
		return ( $params['show_button'] == 'yes') ? 'edgtf-call-to-action-column1 edgtf-call-to-action-cell' : '';
	}

	/**
	 * Return CSS styles for Call To Action Icon
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {
		$icon_style = array();

		if ($params['icon_size'] !== '') {
			$icon_style[] = 'font-size: ' . $params['icon_size'] . 'px';
		}

		return implode(';', $icon_style);
	}

	/**
	 * Return CSS styles for Call To Action Content
	 *
	 * @param $params
	 * @return string
	 */
	private function getContentStyles($params) {
		$content_styles = array();

		if ($params['text_size'] !== '') {
			$content_styles[] = 'font-size: ' . $params['text_size'] . 'px';
		}

		return implode(';', $content_styles);
	}

	/**
	 * Return CSS styles for Call To Action shortcode
	 *
	 * @param $params
	 * @return string
	 */
	private function getCallToActionStyles($params) {
		$call_to_action_styles = array();

		if ($params['box_padding'] != '') {
			$call_to_action_styles[] = 'padding: ' . $params['box_padding'] . ';';
		}
		if ($params['text_color'] != '') {
			$call_to_action_styles[] = 'color: ' . $params['text_color'] . ';';
		}
		if ($params['background_color'] != '') {
			$call_to_action_styles[] = 'background-color: ' . $params['background_color'] . ';';
		}

		return implode(';', $call_to_action_styles);
	}

	/**
	 * Return Icon for Call To Action Shortcode
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getCallToActionIcon($params) {

		$icon = illustrator_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);
		$call_to_action_icon = '';
		if(!empty($params[$icon])){			
			$call_to_action_icon = illustrator_edge_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );
		}
		return $call_to_action_icon;

	}
	
	private function getButtonParameters($params) {
		$button_params_array = array();
		
		if(!empty($params['button_link'])) {
			$button_params_array['link'] = $params['button_link'];
		}
		
		if(!empty($params['button_size'])) {
			$button_params_array['size'] = $params['button_size'];
		}
		
		if(!empty($params['button_icon_pack'])) {
			$button_params_array['icon_pack'] = $params['button_icon_pack'];
			$iconPackName = illustrator_edge_icon_collections()->getIconCollectionParamNameByKey($params['button_icon_pack']);
			$button_params_array[$iconPackName] = $params['button_'.$iconPackName];		
		}
				
		if(!empty($params['button_target'])) {
			$button_params_array['target'] = $params['button_target'];
		}
		
		if(!empty($params['button_text'])) {
			$button_params_array['text'] = $params['button_text'];
		}
		
		return $button_params_array;
	}
}
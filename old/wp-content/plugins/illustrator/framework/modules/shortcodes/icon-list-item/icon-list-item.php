<?php
namespace IllustratorEdge\Modules\Shortcodes\IconListItem;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Icon List Item
 */

class IconListItem implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'edgtf_icon_list_item';
		
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
	 */
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Icon List Item', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-icon-list-item extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'params' => array_merge(
				array(
					array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Full Width Item','illustrator'),
                        'param_name'  => 'full_width_item',
                        'value'       => array(
                            esc_html__('Yes','illustrator')  => 'yes',
                            esc_html__('No','illustrator') => 'no'
                        ),
					)
				),
				\IllustratorEdgeIconCollections::get_instance()->getVCParamsArray(),
				array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('Custom Icon','illustrator'),
                        'param_name' => 'custom_icon'
                    ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Size (px)','illustrator'),
						'param_name' => 'icon_size',
                        'group' => esc_html__('Design Options','illustrator')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color','illustrator'),
						'param_name' => 'icon_color',
                        'group' => esc_html__('Design Options','illustrator')
					),
					array(
						'type' => 'textfield',
						'admin_label' => true,
						'heading' => esc_html__('Title','illustrator'),
						'param_name' => 'title',
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title size (px)','illustrator'),
						'param_name' => 'title_size',
						'dependency' => Array('element' => 'title', 'not_empty' => true),
                        'group' => esc_html__('Design Options','illustrator')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color','illustrator'),
						'param_name' => 'title_color',
						'dependency' => Array('element' => 'title', 'not_empty' => true),
                        'group' => esc_html__('Design Options','illustrator')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link','illustrator'),
						'param_name' => 'link',
					),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Target','illustrator'),
                        'param_name'  => 'target',
                        'value'       => array(
                            esc_html__('Same Window','illustrator')  => '_self',
                            esc_html__('New Window','illustrator') => '_blank'
                        ),
                        'dependency'  => array('element' => 'link', 'not_empty' => true)
                    ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Margin','illustrator'),
						'param_name' => 'margin',
						'description' => esc_html__('Enter margin in format 0px 0px 5px 0px','illustrator'),
                        'group' => esc_html__('Design Options','illustrator')
					),
				)
			)
		) );

	}
	
	public function render($atts, $content = null) {
		$args = array(
			'full_width_item' => 'yes',
            'custom_icon' => '',
            'icon_size' => '',
            'icon_color' => '',
            'title' => '',
            'title_color' => '',
            'title_size' => '',
            'link' => '',
            'target' => '_self',
            'margin' => ''
        );

        $args = array_merge($args, illustrator_edge_icon_collections()->getShortcodeParams());
		
        $params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		$iconPackName = illustrator_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconClasses = '';
		
		//generate icon holder classes
		$iconClasses .= 'edgtf-icon-list-item-icon ';
		$iconClasses .= $params['icon_pack'];
		
		$params['classes'] = $this->getItemClasses($params);
		$params['style'] = $this->getItemStyle($params);
		$params['icon_classes'] = $iconClasses;
		$params['icon'] = $params[$iconPackName];		
		$params['icon_attributes']['style'] =  $this->getIconStyle($params);		
		$params['title_style'] =  $this->getTitleStyle($params);

		//Get HTML from template
		$html = illustrator_edge_get_shortcode_module_template_part('templates/icon-list-item-template', 'icon-list-item', '', $params);
		return $html;
	}

	 /**
     * Generates icon item classes
     *
     * @param $params
     *
     * @return string
     */
	private function getItemClasses($params){
		$classes = array();

		if($params['full_width_item'] == 'no') {
			$classes[] = 'edgtf-icon-list-item-inline';
		}
		
		return implode(' ', $classes);
	}

	 /**
     * Generates item style
     *
     * @param $params
     *
     * @return string
     */
	private function getItemStyle($params){
		$style = array();

		if($params['margin'] !== '') {
			$style[] = 'margin:'.$params['margin'];
		}
		
		return implode(';', $style);
	}

	 /**
     * Generates icon styles
     *
     * @param $params
     *
     * @return array
     */
	private function getIconStyle($params){
		
		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		if (!empty($params['icon_size'])) {
			$iconStylesArray[] = 'font-size:' .illustrator_edge_filter_px( $params['icon_size']) . 'px';
		}
		
		return implode(';', $iconStylesArray);
	}
	 /**
     * Generates title styles
     *
     * @param $params
     *
     * @return array
     */
	private function getTitleStyle($params){
		$titleStylesArray = array();
		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if (!empty($params['title_size'])) {
			$titleStylesArray[] = 'font-size:' .illustrator_edge_filter_px( $params['title_size']) . 'px';
		}
		
		 return implode(';', $titleStylesArray);
	}

}
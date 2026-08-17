<?php
namespace IllustratorEdge\Modules\Shortcodes\PricingTable;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Pricing Table', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'edgtf_pricing_tables'),
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title','illustrator'),
					'param_name' => 'title',
					'value' => esc_html__('Basic Plan','illustrator'),
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price','illustrator'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100','illustrator')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Currency','illustrator'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $','illustrator')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Price Period','illustrator'),
					'param_name' => 'price_period',
					'description' => esc_html__('Default label is "per month"','illustrator')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Show Button','illustrator'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default','illustrator') => '',
						esc_html__('Yes','illustrator') => 'yes',
						esc_html__('No','illustrator') => 'no'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Text','illustrator'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes') 
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Link','illustrator'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Active','illustrator'),
					'param_name' => 'active',
					'value' => array(
						esc_html__('No','illustrator') => 'no',
						esc_html__('Yes','illustrator') => 'yes'
					),
					'save_always' => true,
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content','illustrator'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title'         			   => 'Basic Plan',
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => 'Per Month',
			'active'        			   => 'no',
			'show_button'				   => 'yes',
			'link'          			   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'edgtf-price-table';
		
		if($active == 'yes') {
			$pricing_table_clasess .= ' edgtf-active';
		}
		
		$params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= illustrator_edge_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}

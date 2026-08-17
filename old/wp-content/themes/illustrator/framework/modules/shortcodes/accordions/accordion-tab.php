<?php 
namespace IllustratorEdge\Modules\Shortcodes\AccordionTab;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class AccordionTab implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'edgtf_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( array(
				"name" => esc_html__('Accordion Tab', 'illustrator'),
				"base" => $this->base,
				"as_parent" => array('except' => 'vc_row'),
				"as_child" => array('only' => 'edgtf_accordion'),
				'is_container' => true,
				"category" => esc_html__('by EDGE','illustrator'),
				"icon" => "icon-wpb-accordion-tab extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view" => 'VcColumnView',
				"params" => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'illustrator' ),
						'param_name' => 'title',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'illustrator' ),
						'description' => esc_html__( 'Enter accordion section title.', 'illustrator' )
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__( 'Section ID', 'illustrator' ),
						'param_name' => 'el_id',
						'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'illustrator' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'illustrator' ) . '</a>' ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Title Tag",'illustrator'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"p"  => "p",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						)
					)
				)

			));
		}
	}	
	public function render($atts, $content = null) {

		$default_atts = (array(
			'title'	=> "Accordion Title",
			'title_tag' => 'h6',
			'el_id' => ''
		));
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= illustrator_edge_get_shortcode_module_template_part('templates/accordion-template','accordions', '',$params);

		return $output;
		
	}

}
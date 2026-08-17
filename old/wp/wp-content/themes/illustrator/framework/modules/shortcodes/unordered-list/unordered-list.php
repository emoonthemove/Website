<?php
namespace IllustratorEdge\Modules\Shortcodes\UnorderedList;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='edgtf_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('List - Unordered', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'dropdown',
					'admin_label'	=> true,
					'heading'		=> esc_html__('Style','illustrator'),
					'param_name'	=> 'style',
					'value'			=> array(
						esc_html__('Circle','illustrator') => 'circle',
						esc_html__('Line','illustrator')	 => 'line',
						esc_html__('Arrow','illustrator')  => 'arrow'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Animate List','illustrator'),
					'param_name'	=> 'animate',
					'value'			=> array(
						esc_html__('No','illustrator') => 'no',
						esc_html__('Yes','illustrator') => 'yes'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Hover Effect','illustrator'),
					'param_name'	=> 'hover',
					'value'			=> array(
						esc_html__('No','illustrator') => 'no',
						esc_html__('Yes','illustrator') => 'yes'
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Font Weight','illustrator'),
					'param_name' => 'font_weight',
					'value' => array(
						esc_html__('Default','illustrator') => '',
						esc_html__('Light','illustrator') => 'light',
						esc_html__('Normal','illustrator') => 'normal',
						esc_html__('Bold','illustrator') => 'bold'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding left (px)','illustrator'),
					'param_name' => 'padding_left',
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content','illustrator'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => '',
            'animate' => '',
            'hover' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style != '') {
			$list_item_classes .= ' edgtf-'.$style;         
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' edgtf-animate-list';
		}

		if ($hover == 'yes') {
			$list_item_classes .= ' edgtf-hover-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="edgtf-unordered-list '.$list_item_classes.'" '.  illustrator_edge_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}
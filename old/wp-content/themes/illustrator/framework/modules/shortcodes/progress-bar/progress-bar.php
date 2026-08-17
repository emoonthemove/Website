<?php
namespace IllustratorEdge\Modules\Shortcodes\ProgressBar;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Progress Bar', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title','illustrator'),
					'param_name' => 'title',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Skin','illustrator'),
					'param_name' => 'skin',
					'value' => array(
                        esc_html__('Default','illustrator') => 'default',
						esc_html__('Dark','illustrator') => 'dark',
						esc_html__('Light','illustrator') => 'light',
					)
				),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Bar Color', 'illustrator'),
                    'param_name'  => 'bar_color',
                    'admin_label' => true,
                    'dependency'  => array('element' => 'skin', 'value' => array('default')),
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Active Bar Color', 'illustrator'),
                    'param_name'  => 'active_color',
                    'admin_label' => true,
                    'dependency'  => array('element' => 'skin', 'value' => array('default')),
                ),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Percentage','illustrator'),
					'param_name' => 'percent',
				),	
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Percentage Type','illustrator'),
					'param_name' => 'percentage_type',
					'value' => array(
						esc_html__('Floating','illustrator')  => 'floating',
						esc_html__('Static','illustrator') => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				)
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'percent' => '100',
            'percentage_type' => 'floating',
			'skin' => 'default',
            'bar_color' => '',
            'active_color' => ''
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		
		$params['percentage_classes'] = $this->getPercentageClasses($params);
		$params['progress_bar_classes'] = $this->getProgressBarClasses($params);
        $params['bar_color'] = $this->getProgressBarColor($params);
        $params['active_color'] = $this->getProgressBarActiveColor($params);

        //init variables
		$html = illustrator_edge_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type']) !=''){
			
			if($params['percentage_type'] == 'floating'){
				
				$percentClassesArray[]= 'edgtf-floating';


			}
			elseif($params['percentage_type'] == 'static'){
				
				$percentClassesArray[] = 'edgtf-static';
				
			}
		}
		return implode(' ', $percentClassesArray);
	}

	/**
	 * Generates css classes for Progress Bar
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getProgressBarClasses($params){

		$progress_bar_classes = array();
		$progress_bar_classes[] = 'edgtf-progress-bar';


		if($params['skin'] !== ''){
			$progress_bar_classes[] = 'edgtf-progress-bar-'.$params['skin'];
		}

		return implode(' ', $progress_bar_classes);
	}

    /**
     * Generates color for Progress Bar
     *
     * @param $params
     *
     * @return array
     */
    private function getProgressBarColor($params){
        $progress_bar_color_styles = array();

        if ($params['bar_color'] != '') {
            $progress_bar_color_styles[] = 'background-color: ' . $params['bar_color'] . ';';
        }

        return $progress_bar_color_styles;
    }

    /**
     * Generates active color for Progress Bar
     *
     * @param $params
     *
     * @return array
     */
    private function getProgressBarActiveColor($params){
        $progress_bar_active_color_styles = array();

        if ($params['active_color'] != '') {
            $progress_bar_active_color_styles[] = 'background-color: ' . $params['active_color'] . ';';
        }

        return $progress_bar_active_color_styles;
    }
}
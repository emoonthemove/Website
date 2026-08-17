<?php
namespace IllustratorEdge\Modules\Shortcodes\Counter;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Countdown
 */
class Countdown implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_countdown';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Countdown', 'illustrator'),
			'base' => $this->getBase(),
			'category' => esc_html__('by EDGE','illustrator'),
			'admin_enqueue_css' => array(illustrator_edge_get_skin_uri().'/assets/css/edgtf-vc-extend.css'),
			'icon' => 'icon-wpb-countdown extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
			    array(
			        'type' => 'dropdown',
                    'heading' => esc_html__('Countdown Skin','illustrator'),
                    'param_name' => 'countdown_skin',
                    'value' => array(
                        esc_html__('Dark','illustrator') => 'edgtf-countdown-dark',
                        esc_html__('Light','illustrator') => 'edgtf-countdown-light',
                    ),
                    'admin_label' => true,
                    'save_always' => true
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Year','illustrator'),
					'param_name' => 'year',
					'value' => array(
						'' => '',
						'2015' => '2015',
						'2016' => '2016',
						'2017' => '2017',
						'2018' => '2018',
						'2019' => '2019',
						'2020' => '2020'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Month','illustrator'),
					'param_name' => 'month',
					'value' => array(
						'' => '',
						esc_html__('January','illustrator') => '1',
						esc_html__('February','illustrator') => '2',
						esc_html__('March','illustrator') => '3',
						esc_html__('April','illustrator') => '4',
						esc_html__('May','illustrator') => '5',
						esc_html__('June','illustrator') => '6',
						esc_html__('July','illustrator') => '7',
						esc_html__('August','illustrator') => '8',
						esc_html__('September','illustrator') => '9',
						esc_html__('October','illustrator') => '10',
						esc_html__('November','illustrator') => '11',
						esc_html__('December','illustrator') => '12'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Day','illustrator'),
					'param_name' => 'day',
					'value' => array(
						'' => '',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Hour','illustrator'),
					'param_name' => 'hour',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Minute','illustrator'),
					'param_name' => 'minute',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
						'32' => '32',
						'33' => '33',
						'34' => '34',
						'35' => '35',
						'36' => '36',
						'37' => '37',
						'38' => '38',
						'39' => '39',
						'40' => '40',
						'41' => '41',
						'42' => '42',
						'43' => '43',
						'44' => '44',
						'45' => '45',
						'46' => '46',
						'47' => '47',
						'48' => '48',
						'49' => '49',
						'50' => '50',
						'51' => '51',
						'52' => '52',
						'53' => '53',
						'54' => '54',
						'55' => '55',
						'56' => '56',
						'57' => '57',
						'58' => '58',
						'59' => '59',
						'60' => '60',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Month Label','illustrator'),
					'param_name' => 'month_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Day Label','illustrator'),
					'param_name' => 'day_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Hour Label','illustrator'),
					'param_name' => 'hour_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Minute Label','illustrator'),
					'param_name' => 'minute_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Second Label','illustrator'),
					'param_name' => 'second_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)','illustrator'),
					'param_name' => 'digit_font_size',
					'description' => '',
					'group' => esc_html__('Design Options','illustrator'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Label Font Size (px)','illustrator'),
					'param_name' => 'label_font_size',
					'description' => '',
					'group' => esc_html__('Design Options','illustrator')
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
	public function render($atts, $content = null)
	{

		$args = array(
		    'countdown_skin' => '',
			'year' => '',
			'month' => '', 
			'day' => '',
			'hour' => '',
			'minute' => '',
			'month_label' => 'Months',
			'day_label' => 'Days',
			'hour_label' => 'Hours',
			'minute_label' => 'Minutes',
			'second_label' => 'Seconds',
			'digit_font_size' => '',
			'label_font_size' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['id'] = mt_rand(1000, 9999);

        $params['countdown_classes'] = $this->getCountdownClasses($params);

		//Get HTML from template
		$html = illustrator_edge_get_shortcode_module_template_part('templates/countdown-template', 'countdown', '', $params);

		return $html;

	}

    /**
     * Generates css classes for progress bar
     *
     * @param $params
     *
     * @return array
     */
    private function getCountdownClasses($params){

        $CountdownClassesArray = array();

        if(!empty($params['countdown_skin']) !=''){

            if($params['countdown_skin'] == 'edgtf-countdown-dark'){

                $CountdownClassesArray[]= 'edgtf-countdown-dark';


            }
            elseif($params['countdown_skin'] == 'edgtf-countdown-light'){

                $CountdownClassesArray[] = 'edgtf-countdown-light';

            }
        }
        return implode(' ', $CountdownClassesArray);
    }
}
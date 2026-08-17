<?php
namespace IllustratorEdge\Modules\Shortcodes\Button;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package IllustratorEdge\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'edgtf_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Button', 'illustrator'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by EDGE','illustrator'),
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size','illustrator'),
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Default','illustrator') => '',
                            esc_html__('Small','illustrator') => 'small',
                            esc_html__('Medium','illustrator') => 'medium',
                            esc_html__('Large','illustrator') => 'large',
                            esc_html__('Extra Large','illustrator') => 'huge'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Type','illustrator'),
                        'param_name'  => 'type',
                        'value'       => array(
                            esc_html__('Default','illustrator') => '',
                            esc_html__('Transparent','illustrator') => 'transparent',
                            esc_html__('Outline','illustrator') => 'outline',
                            esc_html__('Solid','illustrator') => 'solid',
                            esc_html__('Solid White','illustrator') => 'solid-white',
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Text','illustrator'),
                        'param_name'  => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link','illustrator'),
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Link Target','illustrator'),
                        'param_name'  => 'target',
                        'value'       => array(
                            esc_html__('Self','illustrator')  => '_self',
                            esc_html__('Blank','illustrator') => '_blank'
                        ),
                        'save_always' => true,
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Custom CSS class','illustrator'),
                        'param_name'  => 'custom_class',
                    )
                ),
                illustrator_edge_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Color','illustrator'),
                        'param_name'  => 'color',
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Color','illustrator'),
                        'param_name'  => 'hover_color',
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color','illustrator'),
                        'param_name'  => 'background_color',
                        'dependency'  => array('element' => 'type', 'value' => array('solid','')),
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Background Color','illustrator'),
                        'param_name'  => 'hover_background_color',
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','','solid-white')),
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Border Color','illustrator'),
                        'param_name'  => 'border_color',
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','','solid-white')),
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Border Color','illustrator'),
                        'param_name'  => 'hover_border_color',
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','','solid-white')),
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Font Size (px)','illustrator'),
                        'param_name'  => 'font_size',
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Font Weight','illustrator'),
                        'param_name'  => 'font_weight',
                        'value'       => array_flip(illustrator_edge_get_font_weight_array(true)),
                        'group'       => esc_html__('Design Options','illustrator')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Margin','illustrator'),
                        'param_name'  => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'illustrator'),
                        'group'       => esc_html__('Design Options','illustrator')
                    )
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => '',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'margin'                 => '',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'hover_animation'        => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, illustrator_edge_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
        	$icon_attributes = array();

            $iconPackName   = illustrator_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';

			$icon_attributes['class'] = 'edgtf-btn-icon-holder';
			$params['icon_params_array'] = $icon_attributes;
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'large';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return illustrator_edge_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', $params['hover_animation'], $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && ($params['type'] !== 'outline' || $params['type'] !== 'solid-white')) {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.illustrator_edge_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'edgtf-btn',
            'edgtf-btn-'.$params['size'],
            'edgtf-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'edgtf-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_animation'])) {
            $buttonClasses[] = 'edgtf-btn-'.$params['hover_animation'];
        }

        return $buttonClasses;
    }
}
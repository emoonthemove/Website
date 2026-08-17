<?php
namespace IllustratorEdge\Modules\Shortcodes\CrossfadeImages;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CrossfadeImages
 */
class CrossfadeImages implements ShortcodeInterface {
    /**
     * @var string
     */
	private $base; 
	
    /**
     * CrossfadeImages constructor.
     */
	function __construct() {
		$this->base = 'edgtf_crossfade_images';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
		* Returns base for shortcode
		* @return string
	 */
	public function getBase() {
		return $this->base;
	}	
    
	public function vcMap() {
						
		vc_map( array(
			'name' => esc_html__('Crossfade Images','illustrator'),
			'base' => $this->getBase(),
			'category' => esc_html__('by EDGE','illustrator'),
			'icon' => 'icon-wpb-crossfade-images extended-custom-icon',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Initial Image','illustrator'),
                    'param_name' => 'initial_image'
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hover Image','illustrator'),
                    'param_name' => 'hover_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title','illustrator'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Link','illustrator'),
                    'param_name'  => 'link',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Link target','illustrator'),
                    'param_name'  => 'link_target',
                    'description' => '',
                    'value'       => array(
                        esc_html__('New Window','illustrator') => '_blank',
                        esc_html__('Same Window','illustrator')  => '_self'
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Background Color','illustrator'),
                    'param_name'  => 'background_color',
                    'group'       => esc_html__('Design Options','illustrator')
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'initial_image' => '',
            'hover_image'   => '',
            'title'         => '',
            'link'          => '',
            'link_target'   => '',
            'background_color'   => '',
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        return illustrator_edge_get_shortcode_module_template_part('templates/crossfade-images-template', 'crossfade-images', '', $params);
    }
}
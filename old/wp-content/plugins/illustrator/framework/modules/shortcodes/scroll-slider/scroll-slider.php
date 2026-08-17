<?php
namespace IllustratorEdge\Modules\Shortcodes\ScrollSlider;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ScrollSlider implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_scroll_slider';

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

		vc_map(array(
			'name'                      => esc_html__('Scroll Slider', 'illustrator'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE','illustrator'),
			'icon'                      => 'icon-wpb-scroll-slider extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images','illustrator'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Select images from media library','illustrator')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size','illustrator'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size','illustrator')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Show Title','illustrator'),
					'param_name'  => 'show_title',
					'value'       => array(
						esc_html__('No','illustrator') => 'no',
						esc_html__('Yes','illustrator') => 'yes'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Open PrettyPhoto on click','illustrator'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No','illustrator')	=> 'no',
						esc_html__('Yes','illustrator')	=> 'yes'
					)
				),
                array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows','illustrator'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
                        esc_html__('No','illustrator') => 'no',
                        esc_html__('Yes','illustrator') => 'yes',
					)
				)
			)
		));

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
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'show_title'		=> 'no',
			'pretty_photo'		=> 'no',
			'navigation'		=> 'no'
		);

		$params = shortcode_atts($args, $atts);
		
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['classes'] = $this->getClasses($params);

		$html = illustrator_edge_get_shortcode_module_template_part('templates/scroll-slider-template', 'scroll-slider', '', $params);

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['link'] = get_post_meta($id,'_attachment_image_custom_link', true);
			$image['link_target'] = get_post_meta($id,'_attachment_image_link_target', true);

			if ($image['link_target'] == ''){
				$image['link_target'] = '_self';
			}

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

    /**
     * Generates css classes
     *
     * @param $params
     *
     * @return array
     */
    private function getClasses($params){
    	$classes = array();

		if ($params['navigation'] == 'yes') {
				$classes[] = 'edgtf-ihs-arrows';
		}

		if ($params['pretty_photo'] == 'yes') {
			$classes[] = 'edgtf-pretty-photo';
		}

        return implode(' ', $classes);
    }
}
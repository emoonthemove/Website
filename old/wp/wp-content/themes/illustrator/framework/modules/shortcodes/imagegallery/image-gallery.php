<?php
namespace IllustratorEdge\Modules\Shortcodes\ImageGallery;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_image_gallery';

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
			'name'                      => esc_html__('Image Gallery', 'illustrator'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE','illustrator'),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
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
					'heading'     => esc_html__('Gallery Type','illustrator'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider','illustrator') => 'slider',
						esc_html__('Carousel','illustrator') => 'carousel',
						esc_html__('Image Grid','illustrator') => 'image_grid'
					),
					'description' => esc_html__('Select gallery type','illustrator'),
					'save_always' => true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration','illustrator'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'			=> '3',
						'5'			=> '5',
						'10'		=> '10',
						esc_html__('Disable','illustrator')	=> 'disable'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider',
							'carousel'
						)
					),
					'description' => esc_html__('Auto rotate slides each X seconds','illustrator'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide Animation','illustrator'),
					'admin_label'	=> true,
					'param_name'	=> 'slide_animation',
					'value'			=> array(
						esc_html__('Slide','illustrator') => 'slide',
						esc_html__('Fade','illustrator') => 'fade'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider',
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Column Number','illustrator'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Open PrettyPhoto on click','illustrator'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No','illustrator')	=> 'no',
						esc_html__('Yes','illustrator')	=> 'yes'
					),
					'save_always'	=> true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grayscale Images','illustrator'),
					'param_name' => 'grayscale',
					'value' => array(
						esc_html__('No','illustrator')	=> 'no',
						esc_html__('Yes','illustrator')	=> 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
                array(
                    'type'           => 'dropdown',
                    'heading'        => esc_html__('Spaces between images','illustrator'),
                    'param_name'     => 'images_space',
                    'value'          => array(
                        esc_html__('Yes','illustrator') => 'yes',
                        esc_html__('No','illustrator') => 'no',
                    ),
                    'save_always'    => true,
                    'dependency'     => array(
                        'element'    => 'type',
                        'value'      => array(
                            'image_grid'
                        )
                    )
                ),
                array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows','illustrator'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
                        esc_html__('Yes','illustrator') => 'yes',
                        esc_html__('No','illustrator') => 'no',
					),
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination','illustrator'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
                        esc_html__('Yes','illustrator') => 'yes',
                        esc_html__('No','illustrator') => 'no',
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
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
			'type'				=> 'slider',
			'autoplay'			=> '5000',
			'slide_animation'	=> 'slide',
			'pretty_photo'		=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
            'images_space'       => 'yes',
			'navigation'		=> 'yes',
			'pagination'		=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['columns'] = 'edgtf-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = $this->getGalleryClasses($params);
		$params['slider_classes'] = $this->getSliderClasses($params);

		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
		} elseif ($params['type'] == 'slider' || $params['type'] == 'carousel') {
			$template = 'gallery-slider';
		}


		$html = illustrator_edge_get_shortcode_module_template_part('templates/' . $template, 'imagegallery', '', $params);

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
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';


		return $slider_data;

	}

    /**
     * Generates css classes for Gallery
     *
     * @param $params
     *
     * @return array
     */
    private function getGalleryClasses($params){

        $gallery_classes = array();

        if ($params['type'] == 'image_grid') {
            if ($params['images_space'] == 'no'){
                $gallery_classes[] = 'edgtf-gallery-grid-no-space';
            }
            else{
                $gallery_classes[] = 'edgtf-gallery-grid-with-space';
            }
        }

        if ($params['grayscale'] == 'yes'){
            $gallery_classes[] = 'edgtf-grayscale';
        }

        return implode(' ', $gallery_classes);
    }

    /**
     * Generates css classes for slider and carousel
     *
     * @param $params
     *
     * @return array
     */
    private function getSliderClasses($params){

        $classes = array();

        if ($params['type'] == 'carousel') {
        	$classes[] = 'edgtf-gallery-image-carousel';
        }
        elseif ($params['type'] == 'slider'){
        	$classes[] = 'edgtf-gallery-image-slider';
        }

        return implode(' ', $classes);
    }
}
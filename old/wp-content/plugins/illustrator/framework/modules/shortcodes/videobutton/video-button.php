<?php
namespace IllustratorEdge\Modules\Shortcodes\VideoButton;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class VideoButton
 */
class VideoButton implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_video_button';

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

		vc_map( array(
				'name' => esc_html__('Video Button', 'illustrator'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE','illustrator'),
				'icon' => 'icon-wpb-video-button extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						"type" => "textfield",
						"heading" => esc_html__("Video Link",'illustrator'),
						"param_name" => "video_link",
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Play Button Size (px)",'illustrator'),
						"param_name" => "button_size",
						"dependency" => array('element' => 'video_link', 'not_empty' => true),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Title",'illustrator'),
						"param_name" => "title",
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Title Tag",'illustrator'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						),
						"dependency" => array('element' => 'title', 'not_empty' => true),
					),
				)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'video_link' => '#',
			'button_size' => '',
			'title' => '',
			'title_tag' => 'h6',
		);

		$params = shortcode_atts($args, $atts);

		$params['button_style'] = $this->getButtonStyle($params);
		$params['video_title_tag'] = $this->getVideoButtonTitleTag($params,$args);

		//Get HTML from template
		$html = illustrator_edge_get_shortcode_module_template_part('templates/video-button-template', 'videobutton', '', $params);

		return $html;

	}

	/**
	 * Return Style for Button
	 *
	 * @param $params
	 * @return string
	 */
	private function getButtonStyle($params) {
		$button_style = array();

		if ($params['button_size'] !== '') {
			$button_size = strstr($params['button_size'], 'px') ? $params['button_size'] : $params['button_size'].'px';
			$button_style[] = 'width: '.$button_size;
			$button_style[] = 'height: '.$button_size;
			$button_style[] = 'font-size: '. intval($button_size)*0.8 .'px';
		}

		return implode(';', $button_style);
	}

	/**
	 * Return Title Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getVideoButtonTitleTag($params,$args) {
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];
	}
}
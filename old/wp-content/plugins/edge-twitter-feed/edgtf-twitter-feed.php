<?php
/*
Plugin Name: Edge Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Edge Themes
Version: 1.0
*/
define('EDGEF_TWITTER_FEED_VERSION', '1.0');
define('EDGEF_TWITTER_ABS_PATH', dirname(__FILE__));
define('EDGEF_TWITTER_REL_PATH', dirname(plugin_basename(__FILE__ )));

include_once 'load.php';

use EdgeTwitter\Shortcodes\Lib;

Lib\ShortcodeLoader::getInstance()->load();

if(!function_exists('edge_twitter_get_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @see illustrator_edge_get_template_part()
	 */
	function edge_twitter_get_shortcode_module_template_part($shortcode,$template, $slug = '', $params = array()) {

		//HTML Content from template
		$html = '';
		$template_path = EDGEF_TWITTER_ABS_PATH.'/shortcodes/'.$shortcode.'/templates';
		
		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$template = '';

		if($temp !== '') {
			if($slug !== '') {
				$template = "{$temp}-{$slug}.php";
			}
			$template = $temp.'.php';
		}

		if($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}

		return $html;
	}
}

if(!function_exists('edge_twitter_feed_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function edge_twitter_feed_text_domain() {
        load_plugin_textdomain('edge-twitter-feed', false, EDGEF_TWITTER_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'edge_twitter_feed_text_domain');
}
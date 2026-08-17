<?php
namespace EdgeTwitter\Shortcodes\TwitterFeed;

use EdgeTwitter\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class TwitterFeed
 */
class TwitterFeed implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_twitter_feed';

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
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if(function_exists('vc_map')) {

			vc_map( array(
					'name' => esc_html__('Twitter Feed','edge-twitter-feed'),
					'base' => $this->getBase(),
					'category' => esc_html__('by EDGE','edge-twitter-feed'),
					'icon' => 'icon-wpb-twitter extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params' => array(						
						array(
							'type' => 'textfield',
							'heading' => esc_html__('User ID','edge-twitter-feed'),
							'param_name' => 'user_id',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Number of Tweets','edge-twitter-feed'),
							'param_name' => 'tweets_number',
							'description' => esc_html__('Default number is 3','edge-twitter-feed')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Tweets Cache Time','edge-twitter-feed'),
							'param_name' => 'transient_time',
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Columns Number','edge-twitter-feed'),
							'param_name' => 'col_number',
							'value' => array(
								'3' => '3',
								'4' => '4'
							)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Skin','edge-twitter-feed'),
							'param_name' => 'skin',
							'value' => array(
								esc_html__('Default','edge-twitter-feed') => '',
								esc_html__('Dark','edge-twitter-feed') => 'dark',
								esc_html__('Light','edge-twitter-feed') => 'light'
							)
						),
					)
				)
			);
		}
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
            'user_id' => '',
            'tweets_number' => '3',
            'transient_time' => '',
            'col_number' => '3',
            'skin' => ''
        );
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

        $user_id = !empty($user_id) ? $user_id : '';
        $tweets_number = !empty($tweets_number) ? $tweets_number : '';
        $transient_time = !empty($transient_time) ? $transient_time : 0;

        $twitter_api = \EdgefTwitterApi::getInstance();

        $main_classes = 'edgtf-twitter-feed';

        if ($col_number !== ''){
        	$main_classes .= ' edgtf-twt-col'.$col_number;
        }

        if ($skin !== ''){
        	$main_classes .= ' edgtf-twt-skin-'.$skin;
        }

        if($twitter_api->hasUserConnected()) {
            $response = $twitter_api->fetchTweets($user_id, $tweets_number, array(
                'transient_time' => $transient_time
            ));

            if($response->status) {
                if(is_array($response->data) && count($response->data)) {
                    $html .= '<ul class="'.$main_classes.'">';
                    foreach($response->data as $tweet) {
                    	$params['tweet_text'] = $twitter_api->getHelper()->getTweetText($tweet);
                    	$params['tweet_url'] = $twitter_api->getHelper()->getTweetURL($tweet);
                    	$params['tweet_time'] = $twitter_api->getHelper()->getTweetCreatedTime($tweet);
                    	$params['tweeter_username'] = $twitter_api->getHelper()->getTweeterUsername($tweet);
                    	$params['tweeter_name'] = $twitter_api->getHelper()->getTweeterName($tweet);
                    	$params['tweeter_img'] = $twitter_api->getHelper()->getTweeterProfileImage($tweet);
                    	$html .= edge_twitter_get_shortcode_module_template_part('twitter-feed','twitter-template', '', $params);
                    }
                    $html .= '</ul>';
                }
            } else {
                $html .= esc_html($response->message);
            }
        } else {
           $html .= esc_html__('It seems that you haven\'t connected with your Twitter account', 'edge-twitter-feed');
        }

        return $html;

	}



}
<?php

class IllustratorEdgeLatestPosts extends IllustratorEdgeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'edgtf_latest_posts_widget', // Base ID
			esc_html__('Edge Latest Post', 'illustrator'), // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'illustrator' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
            array(
                'name' => 'title',
                'type' => 'textfield',
                'title' => esc_html__('Title','illustrator'),
            ),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts', 'illustrator')
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__('Order By', 'illustrator'),
				'options' => array(
					'title' => esc_html__('Title', 'illustrator'),
					'date' => esc_html__('Date', 'illustrator')
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__('Order', 'illustrator'),
				'options' => array(
					'ASC' => esc_html__('ASC', 'illustrator'),
					'DESC' => esc_html__('DESC', 'illustrator')
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug', 'illustrator')
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => esc_html__('Number of characters', 'illustrator')
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__('Title Tag', 'illustrator'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'image_in_box';
        $params['image_size'] = 'thumbnail';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'span';
		}
		echo '<div class="widget edgtf-latest-posts-widget">';

        if(!empty($params['title'])) {
            print $args['before_title'].$params['title'].$args['after_title'];
        }
		
		echo illustrator_edge_execute_shortcode('edgtf_blog_list', $params);

		echo '</div>'; //close edgtf-latest-posts-widget
	}
}

<?php

namespace IllustratorEdge\Modules\Shortcodes\BlogList;

use IllustratorEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Blog List', 'illustrator'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by EDGE','illustrator'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type', 'illustrator'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Boxes','illustrator') => 'boxes',
							esc_html__('Minimal','illustrator') => 'minimal',
							esc_html__('Image in box','illustrator') => 'image_in_box'
						),
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number of Posts','illustrator'),
						'param_name' => 'number_of_posts',
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number of Columns','illustrator'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One','illustrator') => '1',
							esc_html__('Two','illustrator') => '2',
							esc_html__('Three','illustrator') => '3',
							esc_html__('Four','illustrator') => '4'
						),
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order By','illustrator'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title','illustrator') => 'title',
							esc_html__('Date','illustrator') => 'date'
						),
						'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order','illustrator'),
						'param_name' => 'order',
						'value' => array(
							esc_html__('ASC','illustrator') => 'ASC',
							esc_html__('DESC','illustrator') => 'DESC'
						),
						'save_always' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Slug','illustrator'),
						'param_name' => 'category',
						'admin_label' => true,
						'description' => esc_html__('Leave empty for all or use comma for list','illustrator')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Show Image','illustrator'),
						'param_name' => 'show_image',
						'value' => array(
							esc_html__('No','illustrator') => 'no',
							esc_html__('Yes','illustrator') => 'yes'
						),
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Image Size','illustrator'),
						'param_name' => 'image_size',
						'value' => array(
							esc_html__('Original','illustrator') => 'original',
							esc_html__('Landscape','illustrator') => 'landscape',
							esc_html__('Square','illustrator') => 'square'
						),
						'dependency' => Array('element' => 'show_image', 'value' => array('yes')),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text length','illustrator'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters','illustrator')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag','illustrator'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						)
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' 					=> 'boxes',
            'number_of_posts' 		=> '',
            'number_of_columns'		=> '',
            'show_image'			=> 'no',
            'image_size'			=> 'original',
            'order_by'				=> '',
            'order'					=> '',
            'category'				=> '',
            'title_tag'				=> 'h5',
			'text_length'			=> '90'
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$html ='';
        $html .= illustrator_edge_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'edgtf-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'edgtf-boxes';
				break;	
				case 'masonry' : 
					$holderClasses = 'edgtf-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'edgtf-minimal';
				break;
				default: 
					$holderClasses = 'edgtf-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'edgtf-one-column';
                    break;
                case 2:
                    $columnsNumber = 'edgtf-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'edgtf-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'edgtf-four-columns';
                    break;
                default:
					$columnsNumber = 'edgtf-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'illustrator_edge_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'illustrator_edge_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        } else if ($imageSize !== '' && $imageSize == 'thumbnail') {
            $thumbImageSize .= 'thumbnail';
        }
		return $thumbImageSize;
	}
	
}

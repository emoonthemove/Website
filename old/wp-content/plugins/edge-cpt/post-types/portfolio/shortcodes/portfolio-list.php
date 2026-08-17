<?php
namespace EdgeCore\PostTypes\Portfolio\Shortcodes;

use EdgeCore\Lib;

/**
 * Class PortfolioList
 * @package EdgeCore\PostTypes\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_portfolio_list';

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

			$icons_array= array();
			if(edge_cpt_theme_installed()) {
				$icons_array = \IllustratorEdgeIconCollections::get_instance()->getVCParamsArray();
			}

			vc_map( array(
					'name' => esc_html__('Portfolio List','edge-cpt'),
					'base' => $this->getBase(),
					'category' => esc_html__('by EDGE','edge-cpt'),
					'icon' => 'icon-wpb-portfolio extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Portfolio List Template','edge-cpt'),
							'param_name' => 'type',
							'value' => array(
								esc_html__('Standard','edge-cpt') => 'standard',
								esc_html__('Gallery','edge-cpt') => 'gallery',
								esc_html__('Gallery With Space','edge-cpt') => 'gallery-with-space',
								esc_html__('Masonry','edge-cpt') => 'masonry',
								esc_html__('Masonry With Space','edge-cpt') => 'masonry-with-space',
								esc_html__('Pinterest','edge-cpt') => 'pinterest',
								esc_html__('Pinterest With Space','edge-cpt') => 'pinterest-with-space'
							),
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Title Tag','edge-cpt'),
							'param_name' => 'title_tag',
							'value' => array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Image Proportions','edge-cpt'),
							'param_name' => 'image_size',
							'value' => array(
								esc_html__('Original','edge-cpt') => 'full',
								esc_html__('Square','edge-cpt') => 'square',
								esc_html__('Landscape','edge-cpt') => 'landscape',
								esc_html__('Portrait','edge-cpt') => 'portrait'
							),
							'save_always' => true,
							'dependency' => array('element' => 'type', 'value' => array('standard', 'gallery','gallery-with-space'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Hover Type','edge-cpt'),
							'param_name' => 'hover_type',
							'value' => array(
								esc_html__('Zoom Out Simple','edge-cpt') => 'zoom-out-simple',
								esc_html__('Info Zoom Lightbox','edge-cpt') => 'info-zoom-lightbox',
								esc_html__('Zoom Lightbox','edge-cpt') => 'zoom-lightbox',
								esc_html__('Sweep to Left','edge-cpt') => 'sweep-left',
								esc_html__('Trim Overlay','edge-cpt') => 'trim',
								esc_html__('Box Overlay','edge-cpt') => 'box'
							),
							'save_always' => true,
							'dependency' => array('element' => 'type', 'value' => array('gallery','gallery-with-space','masonry','masonry-with-space','pinterest','pinterest-with-space'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show More','edge-cpt'),
							'param_name' => 'show_more',
							'value' => array(
								esc_html__('Load More Button','edge-cpt') => 'load_more',
								esc_html__('Infinite Scroll','edge-cpt') => 'infinite_scroll',
								esc_html__('None','edge-cpt') => 'none'
							),
							'save_always' => true,
							'description' => esc_html__('Default Value is Load More','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Space Size','edge-cpt'),
							'param_name' => 'space_size',
							'value' => array(
								esc_html__('Small','edge-cpt') => 'small',
								esc_html__('Large','edge-cpt') => 'large'
							),
							'description' => esc_html__('Choose size of space between items','edge-cpt'),
							'dependency' => array('element' => 'type', 'value' => array('standard','gallery-with-space','masonry-with-space','pinterest-with-space'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Order By','edge-cpt'),
							'param_name' => 'order_by',
							'value' => array(
								esc_html__('Date','edge-cpt') => 'date',
								esc_html__('Title','edge-cpt') => 'title',
								esc_html__('Menu Order','edge-cpt') => 'menu_order',
							),
							'save_always' => true,
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Order','edge-cpt'),
							'param_name' => 'order',
							'value' => array(
								esc_html__('ASC','edge-cpt') => 'ASC',
								esc_html__('DESC','edge-cpt') => 'DESC',
							),
							'save_always' => true,
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('One-Category Portfolio List','edge-cpt'),
							'param_name' => 'category',
							'description' => esc_html__('Enter one category slug (leave empty for showing all categories)','edge-cpt'),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Number of Portfolios Per Page','edge-cpt'),
							'param_name' => 'number',
							'value' => '-1',
							'description' => esc_html__('(enter -1 to show all)','edge-cpt'),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Number of Columns','edge-cpt'),
							'param_name' => 'columns',
							'value' => array(
								'' => '',
								esc_html__('One','edge-cpt') => '1',
								esc_html__('Two','edge-cpt') => '2',
								esc_html__('Three','edge-cpt') => '3',
								esc_html__('Four','edge-cpt') => '4',
								esc_html__('Five','edge-cpt') => '5',
								esc_html__('Six','edge-cpt') => '6'
							),
							'description' => esc_html__('Default value is Three','edge-cpt'),
							'dependency' => array('element' => 'type', 'value' => array('standard','gallery','gallery-with-space')),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Grid Size','edge-cpt'),
							'param_name' => 'grid_size',
							'value' => array(
								esc_html__('Default','edge-cpt') => '',
								esc_html__('3 Columns Grid','edge-cpt') => 'three',
								esc_html__('4 Columns Grid','edge-cpt') => 'four',
								esc_html__('5 Columns Grid','edge-cpt') => 'five'
							),
							'dependency' => array('element' => 'type', 'value' => array('pinterest','pinterest-with-space')),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Show Only Projects with Listed IDs','edge-cpt'),
							'param_name' => 'selected_projects',
							'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)','edge-cpt'),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Enable Category Filter','edge-cpt'),
							'param_name' => 'filter',
							'value' => array(
								esc_html__('No','edge-cpt') => 'no',
								esc_html__('Yes','edge-cpt') => 'yes'
							),
							'save_always' => true,
							'description' => esc_html__('Default value is No','edge-cpt'),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Filter Order By','edge-cpt'),
							'param_name' => 'filter_order_by',
							'value' => array(
								esc_html__('Name','edge-cpt')  => 'name',
								esc_html__('Count','edge-cpt') => 'count',
								esc_html__('Id','edge-cpt')    => 'id',
								esc_html__('Slug','edge-cpt')  => 'slug'
							),
							'save_always' => true,
							'description' => esc_html__('Default value is Name','edge-cpt'),
							'dependency' => array('element' => 'filter', 'value' => array('yes')),
							'group' => esc_html__('Query and Layout Options','edge-cpt')
						)
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
			'type' => 'standard',
			'columns' => '3',
			'grid_size' => 'three',
			'image_size' => 'full',
			'hover_type' => 'zoom-out-simple',
			'order_by' => 'date',
			'order' => 'ASC',
			'number' => '-1',
			'filter' => 'no',
			'filter_order_by' => 'name',
			'category' => '',
			'selected_projects' => '',
			'show_more' => 'load_more',
			'space_size' => 'small',
			'title_tag' => 'h5',
			'next_page' => '',
			'portfolio_slider' => '',
			'portfolios_shown' => ''
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);
		$params['query_results'] = $query_results;
		$params['masonry_filter'] = '';
		$params['with_space'] = false;

		//check if any with space type is selected, if so, changes the type to without space and changes with_space attribute
		if (edge_cpt_string_ends_with($params['type'],'-with-space')){
			$params['type'] = edge_cpt_filter_suffix($params['type'],'-with-space');
			$type = $params['type'];
			$params['with_space'] = true;
		}

		$classes = $this->getPortfolioClasses($params);
		$data_atts = $this->getDataAtts($params);
		$data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;

		$html = '';


		if($filter == 'yes' && ($type == 'masonry' || $type =='pinterest')){
			$params['filter_categories'] = $this->getFilterCategories($params);
			$params['masonry_filter'] = 'edgtf-masonry-filter';
			$html .= edge_cpt_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}

		$html .= '<div class = "edgtf-portfolio-list-holder-outer '.$classes.'" '.$data_atts. '>';

		if($filter == 'yes' && ($type == 'standard' || $type =='gallery')){
			$params['filter_categories'] = $this->getFilterCategories($params);
			$html .= edge_cpt_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}

		$html .= '<div class = "edgtf-portfolio-list-holder clearfix" >';
		if($type == 'masonry' || $type == 'pinterest'){
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-sizer"></div>';
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-gutter"></div>';
		}

		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();

				$params['current_id'] = get_the_ID();
				$params['thumb_size'] = $this->getImageSize($params);
				$params['category_html'] = $this->getItemCategoriesHtml($params);
				$params['categories'] = $this->getItemCategories($params);
				$params['article_masonry_size'] = $this->getMasonrySize($params);
				$params['item_link'] = $this->getItemLink($params);
				$params['hover_params']['category_html'] = $params['category_html'];
				$params['hover_params']['title_tag'] = $params['title_tag'];
				$params['hover_params']['item_link'] = $params['item_link'];

				$html .= edge_cpt_get_shortcode_module_template_part('portfolio',$type, '', $params);

			endwhile;
		else:

			$html .= '<p>'. esc_html__( 'Sorry, no posts matched your criteria.','edge-cpt') .'</p>';

		endif;
		if(($type =='gallery' || $type == 'standard') && $portfolio_slider !== 'yes'){
			for($i=0;$i<(int)$columns;$i++){
				$html .= "<div class='edgtf-portfolio-gap'></div>\n";
			}
		}

		$html .= '</div>'; //close edgtf-portfolio-list-holder
		if($show_more !== 'none'){
			$html .= edge_cpt_get_shortcode_module_template_part('portfolio','load-more-template', '', $params);
		}
		wp_reset_postdata();
		$html .= '</div>'; // close edgtf-portfolio-list-holder-outer
		return $html;
	}

	/**
	 * Generates portfolio list query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueryArray($params){

		$query_array = array();

		$query_array = array(
			'post_type' => 'portfolio-item',
			'orderby' =>$params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);

		if(!empty($params['category'])){
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}

		$paged = '';
		if(empty($params['next_page'])) {
			if(get_query_var('paged')) {
				$paged = get_query_var('paged');
			} elseif(get_query_var('page')) {
				$paged = get_query_var('page');
			}
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];

		}else{
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	/**
	 * Generates portfolio classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getPortfolioClasses($params){
		$classes = array();
		$type = $params['type'];
		$with_space = $params['with_space'];
		$hover_type = $params['hover_type'];
		$columns = $params['columns'];
		$grid_size = $params['grid_size'];
		switch($type):
			case 'standard':
				$classes[] = 'edgtf-ptf-standard';
				if ($params['space_size'] !== ''){
					$classes[] = 'edgtf-ptf-space-'.$params['space_size'];
				}
				break;
			case 'gallery':
				$classes[] = 'edgtf-ptf-gallery';
				break;
			case 'masonry':
				$classes[] = 'edgtf-ptf-masonry';
				break;
			case 'pinterest':
				$classes[] = 'edgtf-ptf-pinterest';
				break;
		endswitch;

		if ($with_space){
			$classes[] = 'edgtf-ptf-with-space';

			if ($params['space_size'] !== ''){
				$classes[] = 'edgtf-ptf-space-'.$params['space_size'];
			}
		}

		if ($hover_type !== '' && $type !== 'standard'){
			$classes[] = 'edgtf-ptf-hover-'.$hover_type;
		}

		if(empty($params['portfolio_slider'])){ // portfolio slider mustn't have this classes

			if($type == 'standard' || $type == 'gallery'){
				switch ($columns):
					case '1':
						$classes[] = 'edgtf-ptf-one-column';
						break;
					case '2':
						$classes[] = 'edgtf-ptf-two-columns';
						break;
					case '3':
						$classes[] = 'edgtf-ptf-three-columns';
						break;
					case '4':
						$classes[] = 'edgtf-ptf-four-columns';
						break;
					case '5':
						$classes[] = 'edgtf-ptf-five-columns';
						break;
					case '6':
						$classes[] = 'edgtf-ptf-six-columns';
						break;
				endswitch;
			}
			if($params['show_more'] == 'load_more'){
				$classes[] = 'edgtf-ptf-load-more edgtf-ptf-show-more';
			}
			else if($params['show_more'] == 'infinite_scroll'){
				$classes[] = 'edgtf-ptf-infinite-scroll edgtf-ptf-show-more';
			}

		}

		if($type == "pinterest"){
			switch ($grid_size):
				case 'three':
					$classes[] = 'edgtf-ptf-pinterest-three-columns';
					break;
				case 'four':
					$classes[] = 'edgtf-ptf-pinterest-four-columns';
					break;
				case 'five':
					$classes[] = 'edgtf-ptf-pinterest-five-columns';
					break;
			endswitch;
		}
		if($params['filter'] == 'yes'){
			$classes[] = 'edgtf-ptf-has-filter';
			if($params['type'] == 'masonry' || $params['type'] == 'pinterest'){
				if($params['filter'] == 'yes'){
					$classes[] = 'edgtf-ptf-masonry-filter';
				}
			}
		}

		if(!empty($params['portfolio_slider']) && $params['portfolio_slider'] == 'yes'){
			$classes[] = 'edgtf-portfolio-slider-holder';
		}

		return implode(' ',$classes);

	}
	/**
	 * Generates portfolio image size
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getImageSize($params){

		$thumb_size = 'full';
		$type = $params['type'];

		if($type == 'standard' || $type == 'gallery'){
			if(!empty($params['image_size'])){
				$image_size = $params['image_size'];

				switch ($image_size) {
					case 'landscape':
						$thumb_size = 'illustrator_edge_landscape';
						break;
					case 'portrait':
						$thumb_size = 'illustrator_edge_portrait';
						break;
					case 'square':
						$thumb_size = 'illustrator_edge_square';
						break;
					case 'full':
						$thumb_size = 'full';
						break;
				}
			}
		}
		elseif($type == 'masonry'){

			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);

			switch($masonry_size):
				default :
					$thumb_size = 'illustrator_edge_square';
					break;
				case 'large_width' :
					$thumb_size = 'illustrator_edge_large_width';
					break;
				case 'large_height' :
					$thumb_size = 'illustrator_edge_large_height';
					break;
				case 'large_width_height' :
					$thumb_size = 'illustrator_edge_large_width_height';
					break;
			endswitch;
		}


		return $thumb_size;
	}
	/**
	 * Generates portfolio item categories ids.This function is used for filtering
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getItemCategories($params){
		$id = $params['current_id'];
		$category_return_array = array();

		$categories = wp_get_post_terms($id, 'portfolio-category');

		foreach($categories as $cat){
			$category_return_array[] = 'portfolio_category_'.$cat->term_id;
		}
		return implode(' ', $category_return_array);
	}

	/**
	 * Generates portfolio item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml($params){
		$id = $params['current_id'];

		$categories = wp_get_post_terms($id, 'portfolio-category');
		$category_html = '<div class="edgtf-ptf-category-holder">';
		$k = 1;

		foreach ($categories as $cat) {
			$category_html .= '<span>'.$cat->name.'</span>';
			if (count($categories) != $k) {
				$category_html .= ' , ';
			}
			$k++;
		}
		$category_html .= '</div>';
		return $category_html;
	}

	/**
	 * Generates masonry size class for each article( based on id)
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getMasonrySize($params){
		$masonry_size_class = '';

		if($params['type'] == 'masonry'){

			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);
			switch($masonry_size):
				default :
					$masonry_size_class = 'edgtf-default-masonry-item';
					break;
				case 'large_width' :
					$masonry_size_class = 'edgtf-large-width-masonry-item';
					break;
				case 'large_height' :
					$masonry_size_class = 'edgtf-large-height-masonry-item';
					break;
				case 'large_width_height' :
					$masonry_size_class = 'edgtf-large-width-height-masonry-item';
					break;
			endswitch;
		}

		return $masonry_size_class;
	}
	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 * * @return array
	 */
	public function getFilterCategories($params){

		$cat_id = 0;
		$top_category = '';

		if(!empty($params['category'])){

			$top_category = get_term_by('slug', $params['category'], 'portfolio-category');
			if(isset($top_category->term_id)){
				$cat_id = $top_category->term_id;
			}

		}

		$args = array(
			'taxonomy' => 'portfolio-category',
			'child_of' => $cat_id,
			'order_by' => $params['filter_order_by']
		);

		$filter_categories = get_terms($args);

		return $filter_categories;

	}
	/**
	 * Generates datta attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts($params){

		$data_attr = array();
		$data_return_string = '';

		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		if(!empty($paged)) {
			$data_attr['data-next-page'] = $paged+1;
		}
		if(!empty($params['type'])){
			$data_attr['data-type'] = $params['type'];
		}
		if(!empty($params['columns'])){
			$data_attr['data-columns'] = $params['columns'];
		}
		if(!empty($params['grid_size'])){
			$data_attr['data-grid-size'] = $params['grid_size'];
		}
		if(!empty($params['order_by'])){
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if(!empty($params['order'])){
			$data_attr['data-order'] = $params['order'];
		}
		if(!empty($params['number'])){
			$data_attr['data-number'] = $params['number'];
		}
		if(!empty($params['image_size'])){
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if(!empty($params['hover_type'])){
			$data_attr['data-hover-type'] = $params['hover_type'];
		}
		if(!empty($params['filter'])){
			$data_attr['data-filter'] = $params['filter'];
		}
		if(!empty($params['filter_order_by'])){
			$data_attr['data-filter-order-by'] = $params['filter_order_by'];
		}
		if(!empty($params['category'])){
			$data_attr['data-category'] = $params['category'];
		}
		if(!empty($params['selected_projects'])){
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if(!empty($params['show_more'])){
			$data_attr['data-show-more'] = $params['show_more'];
		}
		if(!empty($params['title_tag'])){
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if(!empty($params['portfolio_slider']) && $params['portfolio_slider']=='yes'){
			$data_attr['data-items'] = $params['portfolios_shown'];
		}

		foreach($data_attr as $key => $value) {
			if($key !== '') {
				$data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
			}
		}
		return $data_return_string;
	}

	public function getItemLink($params){

		$id = $params['current_id'];
		$portfolio_link = get_permalink($id);
		if (get_post_meta($id, 'portfolio_external_link',true) !== ''){
			$portfolio_link = get_post_meta($id, 'portfolio_external_link',true);
		}

		return $portfolio_link;

	}
}
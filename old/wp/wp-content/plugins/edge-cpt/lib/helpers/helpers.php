<?php

if(!function_exists('edge_cpt_version_class')) {
    /**
     * Adds plugins version class to body
     * @param $classes
     * @return array
     */
    function edge_cpt_version_class($classes) {
        $classes[] = 'edgt-cpt-'.EDGE_CORE_VERSION;

        return $classes;
    }

    add_filter('body_class', 'edge_cpt_version_class');
}

if(!function_exists('edge_cpt_theme_installed')) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function edge_cpt_theme_installed() {
        return defined('EDGE_ROOT');
    }
}

if (!function_exists('edge_cpt_get_carousel_slider_array')){
    /**
     * Function that returns associative array of carousels,
     * where key is term slug and value is term name
     * @return array
     */
    function edge_cpt_get_carousel_slider_array() {
        $carousels_array = array();
        $args = array(
            'taxonomy' => 'carousels_category'
        );
        $terms = get_terms($args);

        if (is_array($terms) && count($terms)) {
            $carousels_array[''] = '';
            foreach ($terms as $term) {
                $carousels_array[$term->slug] = $term->name;
            }
        }

        return $carousels_array;
    }
}

if(!function_exists('edge_cpt_get_carousel_slider_array_vc')) {
    /**
     * Function that returns array of carousels formatted for Visual Composer
     *
     * @return array array of carousels where key is term title and value is term slug
     *
     * @see edge_cpt_get_carousel_slider_array
     */
    function edge_cpt_get_carousel_slider_array_vc() {
        return array_flip(edge_cpt_get_carousel_slider_array());
    }
}

if(!function_exists('edge_cpt_get_shortcode_module_template_part')) {
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
	function edge_cpt_get_shortcode_module_template_part($shortcode, $template, $slug = '', $params = array()) {

		//HTML Content from template
		$html = '';
		$template_path = EDGE_CORE_CPT_PATH.'/'.$shortcode.'/shortcodes/templates';
		
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

if(!function_exists('edge_cpt_init_shortcode_loader')) {
	function edge_cpt_init_shortcode_loader() {

		include_once 'shortcode-loader.php';
	}

	add_action('illustrator_edge_shortcode_loader', 'edge_cpt_init_shortcode_loader');
}

if(!function_exists('edge_cpt_set_portfolio_ajax_url')){
	/**
     * load themes ajax functionality
     * 
     */
	function edge_cpt_set_portfolio_ajax_url() {
		echo '<script type="application/javascript">var edgtCoreAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'edge_cpt_set_portfolio_ajax_url');
	
}
/**
	 * Loads more function for portfolio.
	 *
	 */
if(!function_exists('edge_cpt_portfolio_ajax_load_more')){
	
	function edge_cpt_portfolio_ajax_load_more(){
	
	$return_obj = array();
	$shortcode_params = array();
	$activeFilterCat = '';
	if (!empty($_POST['type'])) {
        $shortcode_params['type'] = $_POST['type'];
    }
	if (!empty($_POST['columns'])) {
        $shortcode_params['columns'] = $_POST['columns'];
    }
	if (!empty($_POST['gridSize'])) {
        $shortcode_params['gridSize'] = $_POST['gridSize'];
    }
	if (!empty($_POST['orderBy'])) {
        $shortcode_params['order_by'] = $_POST['orderBy'];
    }
	if (!empty($_POST['order'])) {
        $shortcode_params['order'] = $_POST['order'];
    }
	if (!empty($_POST['number'])) {
        $shortcode_params['number'] = $_POST['number'];
    }
	if (!empty($_POST['hoverType'])) {
        $shortcode_params['hover_type'] = $_POST['hoverType'];
    }
	if (!empty($_POST['imageSize'])) {
        $shortcode_params['image_size'] = $_POST['imageSize'];
    }
	if (!empty($_POST['filter'])) {
        $shortcode_params['filter'] = $_POST['filter'];
    }
	if (!empty($_POST['filterOrderBy'])) {
        $shortcode_params['filter_order_by'] = $_POST['filterOrderBy'];
    }
	if (!empty($_POST['category'])) {
        $shortcode_params['category'] = $_POST['category'];
    }
	if (!empty($_POST['selectedProjectes'])) {
        $shortcode_params['selected_projectes'] = $_POST['selectedProjectes'];
    }
	if (!empty($_POST['showMore'])) {
        $shortcode_params['show_more'] = $_POST['showMore'];
    }
	if (!empty($_POST['titleTag'])) {
        $shortcode_params['title_tag'] = $_POST['titleTag'];
    }
	if (!empty($_POST['nextPage'])) {
        $shortcode_params['next_page'] = $_POST['nextPage'];
    }
	if (!empty($_POST['activeFilterCat'])) {
        $shortcode_params['active_filter_cat'] = $_POST['activeFilterCat'];
    }
	
	$html = '';
	
	$port_list = new \EdgeCore\PostTypes\Portfolio\Shortcodes\PortfolioList();
	$query_array = $port_list->getQueryArray($shortcode_params);
	$query_results = new \WP_Query($query_array);
	
	if($query_results->have_posts()):			
		while ( $query_results->have_posts() ) : $query_results->the_post(); 

			$shortcode_params['current_id'] = get_the_ID();
			$shortcode_params['thumb_size'] = $port_list->getImageSize($shortcode_params);
			$shortcode_params['category_html'] = $port_list->getItemCategoriesHtml($shortcode_params);
			$shortcode_params['categories'] = $port_list->getItemCategories($shortcode_params);
            $shortcode_params['article_masonry_size'] = $port_list->getMasonrySize($shortcode_params);
            $shortcode_params['item_link'] = $port_list->getItemLink($shortcode_params);
			$shortcode_params['hover_params']['category_html'] = $shortcode_params['category_html'];
			$shortcode_params['hover_params']['title_tag'] = $shortcode_params['title_tag'];
			$shortcode_params['hover_params']['item_link'] = $shortcode_params['item_link'];

			$html .= edge_cpt_get_shortcode_module_template_part('portfolio',$shortcode_params['type'], '', $shortcode_params);
			
		endwhile;
		else: 			
			$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'edge-cpt') .'</p>';
		endif;
		
	$return_obj = array(
		'html' => $html,
	);

	
	echo json_encode($return_obj); exit;
}
}


add_action('wp_ajax_nopriv_edge_cpt_portfolio_ajax_load_more', 'edge_cpt_portfolio_ajax_load_more');
add_action( 'wp_ajax_edge_cpt_portfolio_ajax_load_more', 'edge_cpt_portfolio_ajax_load_more' );


if(!function_exists('edge_cpt_string_ends_with')) {
	/**
	 * Checks if $haystack ends with $needle and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $needle string with which $haystack needs to end
	 *
	 * @return bool
	 */
	function edge_cpt_string_ends_with($haystack, $needle) {
		if($haystack !== '' && $needle !== '') {
			return (substr($haystack, -strlen($needle), strlen($needle)) == $needle);
		}

		return true;
	}
}

if(!function_exists('edge_cpt_filter_suffix')) {
	/**
	 * Removes suffix from given value. Useful when you have to remove parts of user input, e.g px at the end of string
	 *
	 * @param $value
	 * @param $suffix
	 *
	 * @return string
	 */
	function edge_cpt_filter_suffix($value, $suffix) {
		if($value !== '' && edge_cpt_string_ends_with($value, $suffix)) {
			$value = substr($value, 0, strpos($value, $suffix));
		}

		return $value;
	}
}

/**
 * Function that checks if url exists
 *
 * @param $url string url to check
 *
 * @return bool
 */
function illustrator_edge_url_exists($url) {
	$url = str_replace("http://", "", $url);
	if(strstr($url, "/")) {
		$url    = explode("/", $url, 2);
		$url[1] = "/".$url[1];
	} else {
		$url = array($url, "/");
	}

	$fh = fsockopen($url[0], 80);
	if($fh) {
		fputs($fh, "GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
		if(fread($fh, 22) == "HTTP/1.1 404 Not Found") {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}
}
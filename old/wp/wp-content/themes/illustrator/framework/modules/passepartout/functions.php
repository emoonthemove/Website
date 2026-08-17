<?php

if(!function_exists('illustrator_edge_passepartout_enabled')) {
	/**
	 * Checks if passepartout is enabled
	 *
	 * @return bool
	 */
	function illustrator_edge_passepartout_enabled() {

		return illustrator_edge_get_meta_field_intersect('passepartout') == 'yes';
	}
}

if(!function_exists('illustrator_edge_passepartout_class')) {
	/**
	 * Adds overlapping content class to body tag
	 * if overlapping content is enabled
	 * @param $classes
	 *
	 * @return array
	 */
	function illustrator_edge_passepartout_class($classes) {

		if(illustrator_edge_passepartout_enabled()) {
			$classes[] = 'edgtf-passepartout';
		}


		return $classes;
	}

	add_filter('body_class', 'illustrator_edge_passepartout_class');
}

if(!function_exists('illustrator_edge_passepartout_per_page_js_var')) {
	function illustrator_edge_passepartout_per_page_js_var($perPageVars) {


		if(illustrator_edge_passepartout_enabled()) {
			$perPageVars['edgtfPassepartout'] = 32;
		} else {
			$perPageVars['edgtfPassepartout'] = 0;
		}

		return $perPageVars;
	}

	add_filter('illustrator_edge_per_page_js_vars', 'illustrator_edge_passepartout_per_page_js_var');
}

if( !function_exists('illustrator_edge_page_passepartout_style') ) {

	/**
	 * Function that return container style
	 */

	function illustrator_edge_page_passepartout_style( $style ) {

		$id = illustrator_edge_get_page_id();
		$class_prefix = illustrator_edge_get_unique_page_class();

		$page_selector = array(
			$class_prefix . '.edgtf-passepartout .edgtf-passepartout-left',
			$class_prefix . '.edgtf-passepartout .edgtf-passepartout-right',
			$class_prefix . '.edgtf-passepartout .edgtf-passepartout-bottom',
			$class_prefix . '.edgtf-passepartout .edgtf-passepartout-top'
		);
		$page_css = array();

		$page_passepartout_color 				= get_post_meta($id, 'edgtf_passepartout_color_meta', true);


		if($page_passepartout_color !== ''){
			$page_css['background-color'] = $page_passepartout_color;
		}


		$current_style = illustrator_edge_dynamic_css($page_selector, $page_css);

		$style[]       = $current_style;

		return $style;

	}
	add_filter('illustrator_edge_add_page_custom_style', 'illustrator_edge_page_passepartout_style');
}
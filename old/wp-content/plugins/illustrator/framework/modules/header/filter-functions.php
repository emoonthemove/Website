<?php

if(!function_exists('illustrator_edge_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function illustrator_edge_header_class($classes) {
        $header_type = illustrator_edge_get_meta_field_intersect('header_type', illustrator_edge_get_page_id());

        $classes[] = 'edgtf-'.$header_type;

        if ($header_type == 'header-standard' && illustrator_edge_get_meta_field_intersect('menu_area_menu_centered_header_standard', illustrator_edge_get_page_id()) == 'yes') {
        	$classes[] = 'edgtf-menu-centered';
        }

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_header_class');
}

if(!function_exists('illustrator_edge_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function illustrator_edge_header_behaviour_class($classes) {

        $classes[] = 'edgtf-'.illustrator_edge_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_header_behaviour_class');
}

if(!function_exists('illustrator_edge_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function illustrator_edge_menu_item_icon_position_class($classes) {

        if(illustrator_edge_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'edgtf-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_menu_item_icon_position_class');
}

if (!function_exists('illustrator_edge_header_menu_icon_background_class')) {

	function illustrator_edge_header_menu_icon_background_class( $classes ) {

		$menu_icon_background_color = '';
		$menu_icon_background_transparency = '';

		if(($meta_temp = illustrator_edge_get_meta_field_intersect('menu_icon_background_color_header_expanding', illustrator_edge_get_page_id())) != '') {
			$menu_icon_background_color = $meta_temp;
		}

		if(($meta_temp = illustrator_edge_get_meta_field_intersect('menu_icon_background_transparency_header_expanding', illustrator_edge_get_page_id())) != '') {
			$menu_icon_background_transparency = $meta_temp;
		}

		if ($menu_icon_background_color !== '' && !empty($menu_icon_background_transparency) ) {
			$classes[] = 'edgtf-menu-icon-with-bckg';
		}

		if (illustrator_edge_get_meta_field_intersect('menu_icon_background_spread_header_expanding', illustrator_edge_get_page_id()) == 'yes'){
			$classes[] = 'edgtf-menu-icon-bckg-spread';
		}

		return $classes;

	}

	add_filter('body_class', 'illustrator_edge_header_menu_icon_background_class');

}

if(!function_exists('illustrator_edge_mobile_header_class')) {
    function illustrator_edge_mobile_header_class($classes) {
        $classes[] = 'edgtf-default-mobile-header';

        $classes[] = 'edgtf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_mobile_header_class');
}

if(!function_exists('illustrator_edge_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added first level menu background color class
     */
    function illustrator_edge_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if(illustrator_edge_options()->getOptionValue('menu_hover_background_color') !== ''){
            $classes[]= 'edgtf-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_header_class_first_level_bg_color');
}

if(!function_exists('illustrator_edge_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function illustrator_edge_menu_dropdown_appearance($classes) {

        if(illustrator_edge_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'edgtf-'.illustrator_edge_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'illustrator_edge_menu_dropdown_appearance');
}

if (!function_exists('illustrator_edge_header_skin_class')) {

    function illustrator_edge_header_skin_class( $classes ) {

        $id = illustrator_edge_get_page_id();

		if(($meta_temp = get_post_meta($id, 'edgtf_header_style_meta', true)) !== ''){
			$classes[] = 'edgtf-' . $meta_temp;
		} else if ( illustrator_edge_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'edgtf-' . illustrator_edge_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'illustrator_edge_header_skin_class');

}

if (!function_exists('illustrator_edge_header_scroll_style_class')) {

	function illustrator_edge_header_scroll_style_class( $classes ) {

		if (illustrator_edge_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes' ) {
			$classes[] = 'edgtf-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'illustrator_edge_header_scroll_style_class');

}

if(!function_exists('illustrator_edge_header_global_js_var')) {
    function illustrator_edge_header_global_js_var($global_variables) {

        $global_variables['edgtfTopBarHeight'] = illustrator_edge_get_top_bar_height();
        $global_variables['edgtfStickyHeaderHeight'] = illustrator_edge_get_sticky_header_height();
        $global_variables['edgtfStickyHeaderTransparencyHeight'] = illustrator_edge_get_sticky_header_height_of_complete_transparency();
        $global_variables['edgtfStickyScrollAmount'] = illustrator_edge_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('illustrator_edge_js_global_variables', 'illustrator_edge_header_global_js_var');
}

if(!function_exists('illustrator_edge_header_per_page_js_var')) {
    function illustrator_edge_header_per_page_js_var($perPageVars) {

        $perPageVars['edgtfStickyScrollAmount'] = illustrator_edge_get_sticky_scroll_amount_per_page();

        return $perPageVars;
    }

    add_filter('illustrator_edge_per_page_js_vars', 'illustrator_edge_header_per_page_js_var');
}

if(!function_exists('illustrator_edge_get_top_bar_styles')) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function illustrator_edge_get_top_bar_styles($styles) {
		$id            = illustrator_edge_get_page_id();
		$class_prefix  = illustrator_edge_get_unique_page_class();
		$top_bar_style = array();

		$top_bar_bg_color     = get_post_meta($id, 'edgtf_top_bar_background_color_meta', true);

		$top_bar_selector = array(
			$class_prefix.' .edgtf-top-bar'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'edgtf_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}

			$top_bar_style['background-color'] = illustrator_edge_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

		$styles[] = illustrator_edge_dynamic_css($top_bar_selector, $top_bar_style);

		return $styles;
	}

	add_filter('illustrator_edge_add_page_custom_style', 'illustrator_edge_get_top_bar_styles');
}

if(!function_exists('illustrator_edge_get_header_full_width_styles')) {
	/**
	 * Sets per page styles for header full width
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function illustrator_edge_get_header_full_width_styles($styles) {
		$id            = illustrator_edge_get_page_id();
		$class_prefix  = illustrator_edge_get_unique_page_class();
		$header_style = array();

		$header_full_width_padding     = get_post_meta($id, 'edgtf_menu_area_padding_header_full_width_meta', true);

		$header_selector = array(
			$class_prefix.'.edgtf-header-standard .edgtf-menu-area > .edgtf-vertical-align-containers',
			$class_prefix.'.edgtf-header-full-screen .edgtf-menu-area > .edgtf-vertical-align-containers',
			$class_prefix.'.edgtf-header-expanding .edgtf-menu-area > .edgtf-vertical-align-containers',
			$class_prefix.' .edgtf-sticky-header .edgtf-sticky-holder > .edgtf-vertical-align-containers',
		);

		if($header_full_width_padding !== '') {

			$header_style['padding'] = '0 '.$header_full_width_padding;
		}

		$styles[] = illustrator_edge_dynamic_css($header_selector, $header_style);

		return $styles;
	}

	add_filter('illustrator_edge_add_page_custom_style', 'illustrator_edge_get_header_full_width_styles');
}

if(!function_exists('illustrator_edge_top_bar_skin_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function illustrator_edge_top_bar_skin_class($classes) {
		$id = illustrator_edge_get_page_id();
		$top_bar_skin = get_post_meta($id, 'edgtf_top_bar_skin_meta', true);

		if($top_bar_skin !== '') {
			$classes[] = 'edgtf-top-bar-'.$top_bar_skin;
		}

		return $classes;
	}

	add_filter('body_class', 'illustrator_edge_top_bar_skin_class');
}
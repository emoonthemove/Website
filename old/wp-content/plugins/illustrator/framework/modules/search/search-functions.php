<?php

if( !function_exists('illustrator_edge_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function illustrator_edge_search_body_class($classes) {

		if ( is_active_widget( false, false, 'edgt_search_opener' ) ) {

			$classes[] = 'edgtf-' . illustrator_edge_options()->getOptionValue('search_type');

			if ( illustrator_edge_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'edgtf-' . illustrator_edge_options()->getOptionValue('search_animation');

			}

		}
		return $classes;

	}

	add_filter('body_class', 'illustrator_edge_search_body_class');
}

if ( ! function_exists('illustrator_edge_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function illustrator_edge_get_search() {

		if ( illustrator_edge_active_widget( false, false, 'edgt_search_opener' ) ) {

			$search_type = illustrator_edge_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				illustrator_edge_set_position_for_covering_search();
				return;
			} else if ($search_type == 'search-slides-from-window-top') {
				illustrator_edge_set_search_position_in_menu( $search_type );
				if ( illustrator_edge_is_responsive_on() ) {
					illustrator_edge_set_search_position_mobile();
				}
				return;
			}

			illustrator_edge_load_search_template();

		}
	}

}

if ( ! function_exists('illustrator_edge_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function illustrator_edge_set_position_for_covering_search() {

		$containing_sidebar = illustrator_edge_active_widget( false, false, 'edgt_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'illustrator_edge_after_header_top_html_open', 'illustrator_edge_load_search_template');
			} else if ( strpos( $sidebar, 'header-widget-area' ) !== false ) {
				add_action( 'illustrator_edge_after_header_menu_area_html_open', 'illustrator_edge_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'illustrator_edge_after_mobile_header_html_open', 'illustrator_edge_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'illustrator_edge_after_header_logo_area_html_open', 'illustrator_edge_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'illustrator_edge_after_sticky_menu_html_open', 'illustrator_edge_load_search_template');
			}

		}

	}

}

if ( ! function_exists('illustrator_edge_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function illustrator_edge_set_search_position_in_menu( $type ) {

		add_action( 'illustrator_edge_after_header_menu_area_html_open', 'illustrator_edge_load_search_template');

	}
}

if ( ! function_exists('illustrator_edge_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function illustrator_edge_set_search_position_mobile() {

		add_action( 'illustrator_edge_after_mobile_header_html_open', 'illustrator_edge_load_search_template');

	}

}

if ( ! function_exists('illustrator_edge_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function illustrator_edge_load_search_template() {
		global $illustrator_edge_IconCollections;

		$search_type = illustrator_edge_options()->getOptionValue('search_type');

		$search_icon = '';
		$search_icon_close = '';
		if ( illustrator_edge_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $illustrator_edge_IconCollections->getSearchIcon( illustrator_edge_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = $illustrator_edge_IconCollections->getSearchClose( illustrator_edge_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> illustrator_edge_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		illustrator_edge_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}
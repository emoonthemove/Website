<?php

if ( ! function_exists('illustrator_edge_like') ) {
	/**
	 * Returns IllustratorEdgeLike instance
	 *
	 * @return IllustratorEdgeLike
	 */
	function illustrator_edge_like() {
		return IllustratorEdgeLike::get_instance();
	}

}

function illustrator_edge_get_like() {

	echo wp_kses(illustrator_edge_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('illustrator_edge_like_blog_single') ) {
	/**
	 * Add like to blog single
	 *
	 * @return string
	 */
	function illustrator_edge_like_blog_single() {
		return illustrator_edge_like()->add_blog_single_like();
	}

}

if ( ! function_exists('illustrator_edge_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function illustrator_edge_like_latest_posts() {
		return illustrator_edge_like()->add_like();
	}

}

if ( ! function_exists('illustrator_edge_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function illustrator_edge_like_portfolio_list($portfolio_project_id) {
		return illustrator_edge_like()->add_like_portfolio_list($portfolio_project_id);
	}

}
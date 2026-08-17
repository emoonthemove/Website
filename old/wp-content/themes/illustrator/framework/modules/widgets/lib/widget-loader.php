<?php

if (!function_exists('illustrator_edge_register_widgets')) {

	function illustrator_edge_register_widgets() {

		$widgets = array(
			'IllustratorEdgeFullScreenMenuOpener',
			'IllustratorEdgeLatestPosts',
			'IllustratorEdgeSearchOpener',
			'IllustratorEdgeSideAreaOpener',
			'IllustratorEdgeStickySidebar',
			'IllustratorEdgeSocialIconWidget',
			'IllustratorEdgeSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'illustrator_edge_register_widgets');
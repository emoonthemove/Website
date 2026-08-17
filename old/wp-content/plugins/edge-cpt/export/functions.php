<?php

if(!function_exists('illustrator_edge_export_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_edgtf_save_options action.
	 */
	function illustrator_edge_export_options() {
		$options = get_option("edgt_options_illustrator");
		$output = base64_encode(serialize($options));

		return $output;
	}

}

if(!function_exists('illustrator_edge_import_theme_options')) {
	/**
	 * Function that import theme options to db.
	 * It hooks to ajax wp_ajax_illustrator_edge_import_theme_options action.
	 */
	function illustrator_edge_import_theme_options() {

		if(current_user_can('administrator')) {
			if (empty($_POST) || !isset($_POST)) {
				illustrator_edge_ajax_status('error', esc_html__('Import field is empty', 'edge-cpt'));
			} else {
				$data = $_POST;
				if (wp_verify_nonce($data['nonce'], 'edgtf_import_theme_options_secret_value')) {
					$content = $data['content'];
					$unserialized_content = unserialize(base64_decode($content));
					update_option( 'edgt_options_illustrator', $unserialized_content);
					illustrator_edge_ajax_status('success', esc_html__('Options are imported successfully', 'edge-cpt'));
				} else {
					illustrator_edge_ajax_status('error', esc_html__('Non valid authorization', 'edge-cpt'));
				}

			}
		} else {
			illustrator_edge_ajax_status('error', esc_html__('You don\'t have privileges for this operation', 'edge-cpt'));
		}
	}

	add_action('wp_ajax_illustrator_edge_import_theme_options', 'illustrator_edge_import_theme_options');
}

if( ! function_exists( 'illustrator_edge_ajax_status' ) ) {

	/**
	 * Function that return status from ajax functions
	 *
	 */

	function illustrator_edge_ajax_status($status, $message, $data = NULL) {

		$response = array (
			'status' => $status,
			'message' => $message,
			'data' => $data
		);

		$output = json_encode($response);

		exit($output);

	}

}
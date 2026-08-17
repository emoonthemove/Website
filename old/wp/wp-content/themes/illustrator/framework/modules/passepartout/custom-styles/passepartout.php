<?php

if(!function_exists('illustrator_edge_passepartout_styles')) {
    /**
     * Generates styles for header top bar
     */
    function illustrator_edge_passepartout_styles() {

		$passepartout_selector = array(
			'.edgtf-passepartout .edgtf-passepartout-left',
			'.edgtf-passepartout .edgtf-passepartout-right',
			'.edgtf-passepartout .edgtf-passepartout-top',
			'.edgtf-passepartout .edgtf-passepartout-bottom'
		);

        $passepartout_styles = array();
        $passepartout_color = illustrator_edge_options()->getOptionValue('passepartout_color');
        if($passepartout_color !== '') {
           $passepartout_styles['background-color'] = $passepartout_color;
        }

        echo illustrator_edge_dynamic_css($passepartout_selector, $passepartout_styles);
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_passepartout_styles');
}


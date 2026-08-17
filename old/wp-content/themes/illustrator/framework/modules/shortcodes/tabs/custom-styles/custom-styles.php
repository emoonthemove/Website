<?php
if(!function_exists('illustrator_edge_tabs_typography_styles')){
	function illustrator_edge_tabs_typography_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = illustrator_edge_options()->getOptionValue('tabs_font_family');
		
		if(illustrator_edge_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = illustrator_edge_get_font_option_val($font_family);
		}
		
		$text_transform = illustrator_edge_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = illustrator_edge_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = illustrator_edge_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = illustrator_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = illustrator_edge_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo illustrator_edge_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('illustrator_edge_style_dynamic', 'illustrator_edge_tabs_typography_styles');
}

if(!function_exists('illustrator_edge_tabs_inital_color_styles')){

	function illustrator_edge_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li a';
		$border_selector = '.edgtf-tabs.edgtf-horizontal-tab .edgtf-tab-container,.edgtf-tabs.edgtf-vertical-tab .edgtf-tabs-nav li a,.edgtf-tabs.edgtf-horizontal-tab .edgtf-tabs-nav li a';

		$styles = array();
		
		if(illustrator_edge_options()->getOptionValue('tabs_color')) {
            $styles['color'] = illustrator_edge_options()->getOptionValue('tabs_color');
        }

		if(illustrator_edge_options()->getOptionValue('tabs_border_color')) {
            echo illustrator_edge_dynamic_css($border_selector,array(
            	'border-color' => illustrator_edge_options()->getOptionValue('tabs_border_color')
            	)
            );
        }
		
		echo illustrator_edge_dynamic_css($selector, $styles);
	}

	add_action('illustrator_edge_style_dynamic', 'illustrator_edge_tabs_inital_color_styles');
}

if(!function_exists('illustrator_edge_tabs_active_color_styles')){

	function illustrator_edge_tabs_active_color_styles(){
		$selector = array(
			'.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li.ui-state-active a',
			'.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li.ui-state-hover a'
		);
		$border_selector = array(
			'.edgtf-tabs .edgtf-tabs-nav li.ui-state-active:after',
			'.edgtf-tabs .edgtf-tabs-nav li.ui-state-hover:after'
		);

		$styles = array();
		
		if(illustrator_edge_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = illustrator_edge_options()->getOptionValue('tabs_color_active');
        }

		if(illustrator_edge_options()->getOptionValue('tabs_border_color_active')) {
            echo illustrator_edge_dynamic_css($border_selector,array(
            	'background-color' => illustrator_edge_options()->getOptionValue('tabs_border_color_active')
            	)
            );
        }
		
		echo illustrator_edge_dynamic_css($selector, $styles);
	}

	add_action('illustrator_edge_style_dynamic', 'illustrator_edge_tabs_active_color_styles');
}

if(!function_exists('illustrator_edge_boxed_tabs_inital_color_styles')){

	function illustrator_edge_boxed_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li a';
		$styles = array();
		
		if(illustrator_edge_options()->getOptionValue('boxed_tabs_color')) {
            $styles['color'] = illustrator_edge_options()->getOptionValue('boxed_tabs_color');
        }

		if(illustrator_edge_options()->getOptionValue('boxed_tabs_back_color')) {
            $styles['background-color'] = illustrator_edge_options()->getOptionValue('boxed_tabs_back_color');
        }
		
		echo illustrator_edge_dynamic_css($selector, $styles);
	}

	add_action('illustrator_edge_style_dynamic', 'illustrator_edge_boxed_tabs_inital_color_styles');
}
if(!function_exists('illustrator_edge_tabs_boxed_active_color_styles')){

	function illustrator_edge_tabs_boxed_active_color_styles(){
		$selector = array(
			'.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-active a',
			'.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-hover a'
		);

		$styles = array();
		
		if(illustrator_edge_options()->getOptionValue('boxed_tabs_color_active')) {
            $styles['color'] = illustrator_edge_options()->getOptionValue('boxed_tabs_color_active');
        }

		if(illustrator_edge_options()->getOptionValue('boxed_tabs_back_color_active')) {
            $styles['background-color'] = illustrator_edge_options()->getOptionValue('boxed_tabs_back_color_active');
        }
		
		echo illustrator_edge_dynamic_css($selector, $styles);
	}

	add_action('illustrator_edge_style_dynamic', 'illustrator_edge_tabs_boxed_active_color_styles');
}
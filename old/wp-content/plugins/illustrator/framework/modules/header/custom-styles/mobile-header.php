<?php

if(!function_exists('illustrator_edge_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function illustrator_edge_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(illustrator_edge_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(illustrator_edge_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = illustrator_edge_options()->getOptionValue('mobile_header_background_color');
        }

        echo illustrator_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-header-inner', $mobile_header_styles);
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_mobile_header_general_styles');
}

if(!function_exists('illustrator_edge_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function illustrator_edge_mobile_navigation_styles() {
        $mobile_nav_styles = array();
        if(illustrator_edge_options()->getOptionValue('mobile_menu_background_color')) {
            $mobile_nav_styles['background-color'] = illustrator_edge_options()->getOptionValue('mobile_menu_background_color');
        }

        echo illustrator_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-nav', $mobile_nav_styles);

        $mobile_nav_item_styles = array();
        if(illustrator_edge_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_item_styles['border-bottom-color'] = illustrator_edge_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(illustrator_edge_options()->getOptionValue('mobile_text_color') !== '') {
            $mobile_nav_item_styles['color'] = illustrator_edge_options()->getOptionValue('mobile_text_color');
        }

        if(illustrator_edge_is_font_option_valid(illustrator_edge_options()->getOptionValue('mobile_font_family'))) {
            $mobile_nav_item_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('mobile_font_family'));
        }

        if(illustrator_edge_options()->getOptionValue('mobile_font_size') !== '') {
            $mobile_nav_item_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_font_size')).'px';
        }

        if(illustrator_edge_options()->getOptionValue('mobile_line_height') !== '') {
            $mobile_nav_item_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_line_height')).'px';
        }

        if(illustrator_edge_options()->getOptionValue('mobile_text_transform') !== '') {
            $mobile_nav_item_styles['text-transform'] = illustrator_edge_options()->getOptionValue('mobile_text_transform');
        }

        if(illustrator_edge_options()->getOptionValue('mobile_font_style') !== '') {
            $mobile_nav_item_styles['font-style'] = illustrator_edge_options()->getOptionValue('mobile_font_style');
        }

        if(illustrator_edge_options()->getOptionValue('mobile_font_weight') !== '') {
            $mobile_nav_item_styles['font-weight'] = illustrator_edge_options()->getOptionValue('mobile_font_weight');
        }

        $mobile_nav_item_selector = array(
            '.edgtf-mobile-header .edgtf-mobile-nav a',
            '.edgtf-mobile-header .edgtf-mobile-nav h4'
        );

        echo illustrator_edge_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

        $mobile_nav_item_hover_styles = array();
        if(illustrator_edge_options()->getOptionValue('mobile_text_hover_color') !== '') {
            $mobile_nav_item_hover_styles['color'] = illustrator_edge_options()->getOptionValue('mobile_text_hover_color');
        }

        $mobile_nav_item_selector_hover = array(
            '.edgtf-mobile-header .edgtf-mobile-nav a:hover',
            '.edgtf-mobile-header .edgtf-mobile-nav h4:hover'
        );

        echo illustrator_edge_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_mobile_navigation_styles');
}

if(!function_exists('illustrator_edge_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function illustrator_edge_mobile_logo_styles() {
        if(illustrator_edge_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo illustrator_edge_dynamic_css(
                '.edgtf-mobile-header .edgtf-mobile-logo-wrapper a',
                array('height' => illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(illustrator_edge_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo illustrator_edge_dynamic_css(
                '.edgtf-mobile-header .edgtf-mobile-logo-wrapper a',
                array('height' => illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }

        if(illustrator_edge_options()->getOptionValue('mobile_header_height') !== '') {
            $max_height = intval(illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
            echo illustrator_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-logo-wrapper a', array('max-height' => $max_height));
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_mobile_logo_styles');
}

if(!function_exists('illustrator_edge_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function illustrator_edge_mobile_icon_styles() {
        $mobile_icon_styles = array();
        if(illustrator_edge_options()->getOptionValue('mobile_icon_color') !== '') {
            $mobile_icon_styles['color'] = illustrator_edge_options()->getOptionValue('mobile_icon_color');
        }

        if(illustrator_edge_options()->getOptionValue('mobile_icon_size') !== '') {
            $mobile_icon_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('mobile_icon_size')).'px';
        }

        echo illustrator_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-menu-opener a', $mobile_icon_styles);

        if(illustrator_edge_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo illustrator_edge_dynamic_css(
                '.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover',
                array('color' => illustrator_edge_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_mobile_icon_styles');
}
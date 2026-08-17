<?php
if(!function_exists('illustrator_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function illustrator_edge_design_styles() {

        $preload_background_styles = array();

        if(illustrator_edge_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.illustrator_edge_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(EDGE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo illustrator_edge_dynamic_css('.edgtf-preload-background', $preload_background_styles);

		if (illustrator_edge_options()->getOptionValue('google_fonts')){
			$font_family = illustrator_edge_options()->getOptionValue('google_fonts');
			if(illustrator_edge_is_font_option_valid($font_family)) {
				echo illustrator_edge_dynamic_css('body', array('font-family' => illustrator_edge_get_font_option_val($font_family)));
			}
		}

        if(illustrator_edge_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h5 a:hover',
				'h6 a:hover',
				'#edgtf-back-to-top.edgtf-light>.edgtf-icon-stack',
				'.edgtf-mobile-header .edgtf-mobile-nav a:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav h4:hover',
				'.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover',
				'.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs a',
				'.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs span',
				'.edgtf-side-menu-button-opener',
				'.edgtf-fullscreen-search-holder .edgtf-search-submit:hover',
				'.edgtf-portfolio-single-holder .edgtf-portfolio-related-holder .edgtf-portfolio-back-btn',
				'.edgtf-team.main-info-below-image .edgtf-team-social-wrapp .edgtf-icon-shortcode',
				'.edgtf-team.main-info-below-image .edgtf-team-social-wrapp .edgtf-icon-shortcode a',
				'.edgtf-counter-holder .edgtf-counter-icon .edgtf-icon-shortcode',
				'.edgtf-counter-holder .edgtf-counter',
				'.edgtf-countdown.edgtf-countdown-dark .countdown-section',
				'.edgtf-message .edgtf-message-inner a.edgtf-close',
				'.edgtf-ordered-list ol>li:before',
				'.edgtf-progress-bar .edgtf-progress-title-holder',
				'.edgtf-testimonials-holder .edgtf-testimonial-icon',
				'.edgtf-price-table .edgtf-price-table-inner ul li.edgtf-table-prices .edgtf-value',
				'.edgtf-price-table .edgtf-price-table-inner ul li.edgtf-table-prices .edgtf-price',
				'.edgtf-price-table.edgtf-active .edgtf-price-table-inner ul li.edgtf-table-title .edgtf-title-content',
				'.edgtf-pie-chart-holder .edgtf-to-counter',
				'.edgtf-pie-chart-holder .edgtf-percent-sign',
				'.edgtf-pie-chart-with-icon-holder .edgtf-percentage-with-icon i',
				'.edgtf-pie-chart-with-icon-holder .edgtf-percentage-with-icon span',
				'.edgtf-tabs .edgtf-tabs-nav li.ui-state-active a',
				'.edgtf-tabs .edgtf-tabs-nav li.ui-state-hover a',
				'.edgtf-blog-list-holder .edgtf-item-info-section .edgtf-info-btm-left>div a:hover',
				'.edgtf-blog-list-holder .edgtf-item-info-section div.edgtf-post-info-author>a:hover',
				'.edgtf-blog-list-holder .edgtf-item-info-section div.edgtf-post-info-category>a:hover',
				'.edgtf-blog-slider .edgtf-item-info-section .edgtf-info-btm-left>div a:hover',
				'.edgtf-blog-slider .edgtf-item-info-section div.edgtf-post-info-author>a:hover',
				'.edgtf-blog-slider .edgtf-item-info-section div.edgtf-post-info-category>a:hover',
				'.edgtf-dropcaps',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-hover-trim article .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-hover-trim article .edgtf-ptf-read-more',
				'.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li span',
				'.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li.current span',
				'.edgtf-social-share-holder.edgtf-list li a',
				'.edgtf-scroll-slider .edgtf-scs-item .edgtf-scs-title',
				'.widget .tagcloud a',
				'.widget.widget_calendar #next a',
				'.widget.widget_calendar #prev a',
				'.edgtf-blog-holder article .edgtf-post-info-holder .edgtf-post-info-holder-left>div a:hover',
				'.edgtf-blog-holder article .edgtf-post-info-holder .edgtf-post-info-holder-right>div a:hover',
				'.edgtf-blog-holder article .edgtf-post-mark',
				'.edgtf-blog-holder.edgtf-blog-single article.format-link:hover .edgtf-post-mark',
				'.edgtf-blog-holder.edgtf-blog-single article.format-quote:hover .edgtf-post-mark',
				'.edgtf-blog-infinite-scroll-button-holder .edgtf-blog-infinite-scroll-button a',
				'.edgtf-filter-blog-holder li.edgtf-active',
				'.edgtf-blog-single-navigation .edgtf-nav-holder .edgtf-nav-title-span',
				'.edgtf-woocommerce-page .price>.amount',
				'.edgtf-woocommerce-page ins',
				'.woocommerce .price>.amount',
				'.woocommerce ins',
				'.woocommerce-pagination .page-numbers',
				'.edgtf-single-product-related-products-holder .edgtf-related-products-title-holder',
				'.edgtf-single-product-related-products-holder .products .edgtf-related-glob',
				'.edgtf-single-product-wrapper-top .out-of-stock',
				'.edgtf-single-product-summary ins',
				'.edgtf-single-product-summary .product_meta>span a:hover',
				'.summary .group_table td.label a',
				'.woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a',
				'.woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link:hover a',
				'.edgtf-shopping-cart-outer .edgtf-shopping-cart-header .edgtf-cart-icon',
				'.edgtf-shopping-cart-dropdown ul li a:hover',
				'.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .edgtf-item-left:hover',
				'.edgtf-shopping-cart-dropdown .edgtf-empty-cart',
				'.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-subtotal-holder',
				'.widget_price_filter .price_slider_amount .price_label',
            );

            $color_important_selector = array(

            );

            $background_color_selector = array(				
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'input.wpcf7-form-control.wpcf7-submit',
				'.flex-control-paging.flex-control-nav li a .flex-active',
				'.flex-control-paging.flex-control-nav li a:hover',
				'.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:before',
				'.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:after',
				'.edgtf-fullscreen-menu-opener .edgtf-fullscreen-icon .edgtf-line',
				'.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line',
				'.edgtf-pie-chart-doughnut-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
				'.edgtf-pie-chart-pie-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
				'.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li a',
				'.edgtf-accordion-holder .edgtf-title-holder.ui-state-active',
				'.edgtf-accordion-holder .edgtf-title-holder.ui-state-hover',
				'.edgtf-accordion-holder.edgtf-style-grey .edgtf-title-holder.ui-state-active',
				'.edgtf-accordion-holder.edgtf-style-grey .edgtf-title-holder.ui-state-hover',
				'.edgtf-accordion-holder.edgtf-style-white .edgtf-title-holder.ui-state-active',
				'.edgtf-accordion-holder.edgtf-style-white .edgtf-title-holder.ui-state-hover',
				'input[type=submit].edgtf-btn',
				'.edgtf-dropcaps.edgtf-circle',
				'.edgtf-dropcaps.edgtf-square',
				'.edgtf-portfolio-list-holder-outer .edgtf-ptf-list-load-more a',
				'.carousel .carousel-indicators:not(.thumbnails) li.active',
				'#multiscroll-nav ul li .active span',
				'.widget .tagcloud a:hover',
				'.edgtf-blog-holder article.format-link .edgtf-post-text',
				'.edgtf-blog-holder article.format-quote .edgtf-post-text',
				'.edgtf-blog-holder.edgtf-blog-single article.format-link .edgtf-post-text',
				'.edgtf-blog-holder.edgtf-blog-single article.format-quote .edgtf-post-text',
				'.edgtf-woocommerce-page .product .edgtf-product-badge',
				'.woocommerce .product .edgtf-product-badge',
				'.edgtf-woocommerce-page .edgtf-btn.add_to_cart_button',
				'.edgtf-woocommerce-page .edgtf-btn.edgtf-view-product',
				'.woocommerce .edgtf-btn.add_to_cart_button',
				'.woocommerce .edgtf-btn.edgtf-view-product',
				'.edgtf-woocommerce-page .added_to_cart',
				'.woocommerce .added_to_cart',
				'.edgtf-single-product-summary .edgtf-btn.single_add_to_cart_button',
				'.woocommerce-account input[type=submit]',
				'.woocommerce-checkout input[type=submit]',
				'.woocommerce.widget button',
				'.woocommerce.widget input[type=submit]',
				'.widget_price_filter .ui-slider .ui-slider-handle',
			);

            $background_color_important_selector = array(
				'.edge-nav .tp-bullet.selected',
				'.edge-nav .tp-bullet:hover',
				'.edgtf-light-header .edge-nav .tp-bullet.selected',
				'.edgtf-light-header .edge-nav .tp-bullet:hover',
				'.edgtf-light-slider .edge-nav .tp-bullet.selected',
				'.edgtf-light-slider .edge-nav .tp-bullet:hover',
            );

            $border_color_selector = array(
				'.edgtf-st-loader .pulse_circles .ball',
				'.flex-control-paging.flex-control-nav li a',
				'.edgtf-message',
				'.widget .tagcloud a:hover',
				'.woocommerce.widget button',
				'.woocommerce.widget input[type=submit]'
			);

			$border_color_important_selector = array(
			);

			$border_bottom_color_selector = array(
				'.edgtf-pagination-holder .edgtf-pagination li a:hover,.edgtf-pagination-holder .edgtf-pagination li.active span',
				'.edgtf-single-links-pages .edgtf-single-links-pages-inner>a:hover',
				'.woocommerce-pagination .page-numbers.current,.woocommerce-pagination .page-numbers.current:hover,.woocommerce-pagination .page-numbers:hover'
			);

            echo illustrator_edge_dynamic_css($color_selector, array('color' => illustrator_edge_options()->getOptionValue('first_color')));
            echo illustrator_edge_dynamic_css($color_important_selector, array('color' => illustrator_edge_options()->getOptionValue('first_color').'!important'));
            echo illustrator_edge_dynamic_css('::selection', array('background' => illustrator_edge_options()->getOptionValue('first_color')));
            echo illustrator_edge_dynamic_css('::-moz-selection', array('background' => illustrator_edge_options()->getOptionValue('first_color')));
            echo illustrator_edge_dynamic_css($background_color_selector, array('background-color' => illustrator_edge_options()->getOptionValue('first_color')));
            echo illustrator_edge_dynamic_css($background_color_important_selector, array('background-color' => illustrator_edge_options()->getOptionValue('first_color').'!important'));
            echo illustrator_edge_dynamic_css($border_color_selector, array('border-color' => illustrator_edge_options()->getOptionValue('first_color')));
            echo illustrator_edge_dynamic_css($border_color_important_selector, array('border-color' => illustrator_edge_options()->getOptionValue('first_color').'!important'));
            echo illustrator_edge_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => illustrator_edge_options()->getOptionValue('first_color')));
        }

        if(illustrator_edge_options()->getOptionValue('second_color') !== "") {
        	$second_color = illustrator_edge_options()->getOptionValue('second_color');

            $color_selector = array(
            	'.edgtf-main-menu>ul>li.edgtf-active-item>a',
				'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu>ul>li:hover>a',
				'.edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li a:hover',
				'.edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li.current_page_item a',
				'.edgtf-side-menu .widget .edgtf-sidearea-widget-title',
				'.edgtf-side-menu .widget.widget_nav_menu .menu-item:hover a',
				'.edgtf-side-menu a.edgtf-close-side-menu span',
				'.edgtf-search-cover .edgtf-search-close a:hover',
				'.edgtf-fullscreen-search-holder .edgtf-fullscreen-search-close-container a',
				'.edgtf-icon-list-item .edgtf-icon-list-icon-holder-inner i',
				'.edgtf-icon-list-item .edgtf-icon-list-icon-holder-inner span',
				'.edgtf-btn.edgtf-btn-solid-white',
				'.edgtf-btn.edgtf-btn-outline',
				'.edgtf-btn.edgtf-btn-transparent',
				'.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .edgtf-cart-remove a'
            );

            $background_color_selector = array(
            	'.slick-slider .edgtf-slick-dots li.slick-active',
				'.edgtf-fullscreen-menu-opener.opened .edgtf-line',
				'.edgtf-progress-bar .edgtf-progress-content-outer .edgtf-progress-content',
				'.edgtf-btn.edgtf-btn-solid',
				'.edgtf-shopping-cart-outer .edgtf-cart-amount',
			);

            $background_color_important_selector = array(
            	'.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-bg):hover',
            );

            $border_color_selector = array(
            	'.slick-slider .edgtf-slick-dots li',
				'.edgtf-side-menu .widget_nav_menu li a:before',
				'.edgtf-btn.edgtf-btn-outline',
			);

			$border_color_important_selector = array(
				'.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-border-hover):hover',
			);

            echo illustrator_edge_dynamic_css($color_selector, array('color' => $second_color));
            echo illustrator_edge_dynamic_css($background_color_selector, array('background-color' =>  $second_color));
            echo illustrator_edge_dynamic_css($background_color_important_selector, array('background-color' =>  $second_color.'!important'));
            echo illustrator_edge_dynamic_css($border_color_selector, array('border-color' =>  $second_color));
            echo illustrator_edge_dynamic_css($border_color_important_selector, array('border-color' =>  $second_color.'!important'));
        }

		if (illustrator_edge_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.edgtf-wrapper-inner',
				'.edgtf-full-width',
				'.edgtf-content',
				'.edgtf-content-inner > .edgtf-container'
			);
			echo illustrator_edge_dynamic_css($background_color_selector, array('background-color' => illustrator_edge_options()->getOptionValue('page_background_color')));
		}

		if (illustrator_edge_options()->getOptionValue('selection_color')) {
			echo illustrator_edge_dynamic_css('::selection', array('background' => illustrator_edge_options()->getOptionValue('selection_color')));
			echo illustrator_edge_dynamic_css('::-moz-selection', array('background' => illustrator_edge_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (illustrator_edge_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = illustrator_edge_options()->getOptionValue('page_background_color_in_box');
		}

		if (illustrator_edge_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(illustrator_edge_options()->getOptionValue('boxed_background_image')).')';
			if(illustrator_edge_options()->getOptionValue('boxed_background_image_repeating') == 'yes') {
				$boxed_background_style['background-position'] = '0px 0px';
				$boxed_background_style['background-repeat'] = 'repeat';
			} else {
				$boxed_background_style['background-position'] = 'center 0px';
				$boxed_background_style['background-repeat'] = 'repeat';
			}
		}


		if (illustrator_edge_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (illustrator_edge_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo illustrator_edge_dynamic_css('.edgtf-boxed .edgtf-wrapper', $boxed_background_style);
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_design_styles');
}

if (!function_exists('illustrator_edge_h1_styles')) {

    function illustrator_edge_h1_styles() {

        $h1_styles = array();

        if(illustrator_edge_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = illustrator_edge_options()->getOptionValue('h1_color');
        }
        if(illustrator_edge_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h1_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h1_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = illustrator_edge_options()->getOptionValue('h1_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h1_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo illustrator_edge_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h1_styles');
}

if (!function_exists('illustrator_edge_h2_styles')) {

    function illustrator_edge_h2_styles() {

        $h2_styles = array();

        if(illustrator_edge_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = illustrator_edge_options()->getOptionValue('h2_color');
        }
        if(illustrator_edge_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h2_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h2_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = illustrator_edge_options()->getOptionValue('h2_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h2_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo illustrator_edge_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h2_styles');
}

if (!function_exists('illustrator_edge_h3_styles')) {

    function illustrator_edge_h3_styles() {

        $h3_styles = array();

        if(illustrator_edge_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = illustrator_edge_options()->getOptionValue('h3_color');
        }
        if(illustrator_edge_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h3_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h3_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = illustrator_edge_options()->getOptionValue('h3_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h3_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo illustrator_edge_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h3_styles');
}

if (!function_exists('illustrator_edge_h4_styles')) {

    function illustrator_edge_h4_styles() {

        $h4_styles = array();

        if(illustrator_edge_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = illustrator_edge_options()->getOptionValue('h4_color');
        }
        if(illustrator_edge_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h4_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h4_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = illustrator_edge_options()->getOptionValue('h4_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h4_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo illustrator_edge_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h4_styles');
}

if (!function_exists('illustrator_edge_h5_styles')) {

    function illustrator_edge_h5_styles() {

        $h5_styles = array();

        if(illustrator_edge_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = illustrator_edge_options()->getOptionValue('h5_color');
        }
        if(illustrator_edge_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h5_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h5_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = illustrator_edge_options()->getOptionValue('h5_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h5_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo illustrator_edge_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h5_styles');
}

if (!function_exists('illustrator_edge_h6_styles')) {

    function illustrator_edge_h6_styles() {

        $h6_styles = array();

        if(illustrator_edge_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = illustrator_edge_options()->getOptionValue('h6_color');
        }
        if(illustrator_edge_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('h6_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = illustrator_edge_options()->getOptionValue('h6_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = illustrator_edge_options()->getOptionValue('h6_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = illustrator_edge_options()->getOptionValue('h6_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo illustrator_edge_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_h6_styles');
}

if (!function_exists('illustrator_edge_text_styles')) {

    function illustrator_edge_text_styles() {

        $text_styles = array();

        if(illustrator_edge_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = illustrator_edge_options()->getOptionValue('text_color');
        }
        if(illustrator_edge_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = illustrator_edge_get_formatted_font_family(illustrator_edge_options()->getOptionValue('text_google_fonts'));
        }
        if(illustrator_edge_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('text_fontsize')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('text_lineheight')).'px';
        }
        if(illustrator_edge_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = illustrator_edge_options()->getOptionValue('text_texttransform');
        }
        if(illustrator_edge_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = illustrator_edge_options()->getOptionValue('text_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = illustrator_edge_options()->getOptionValue('text_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = illustrator_edge_filter_px(illustrator_edge_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo illustrator_edge_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_text_styles');
}

if (!function_exists('illustrator_edge_link_styles')) {

    function illustrator_edge_link_styles() {

        $link_styles = array();

        if(illustrator_edge_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = illustrator_edge_options()->getOptionValue('link_color');
        }
        if(illustrator_edge_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = illustrator_edge_options()->getOptionValue('link_fontstyle');
        }
        if(illustrator_edge_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = illustrator_edge_options()->getOptionValue('link_fontweight');
        }
        if(illustrator_edge_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = illustrator_edge_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo illustrator_edge_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_link_styles');
}

if (!function_exists('illustrator_edge_link_hover_styles')) {

    function illustrator_edge_link_hover_styles() {

        $link_hover_styles = array();

        if(illustrator_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = illustrator_edge_options()->getOptionValue('link_hovercolor');
        }
        if(illustrator_edge_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = illustrator_edge_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo illustrator_edge_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(illustrator_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = illustrator_edge_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo illustrator_edge_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_link_hover_styles');
}

if (!function_exists('illustrator_edge_smooth_page_transition_styles')) {

    function illustrator_edge_smooth_page_transition_styles($style) {
        $id = illustrator_edge_get_page_id();
    	$loader_style = array();
		$current_style = '';

        if(illustrator_edge_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = illustrator_edge_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.edgtf-smooth-transition-loader');

        if (!empty($loader_style)) {
			$current_style .= illustrator_edge_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(illustrator_edge_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = illustrator_edge_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.edgtf-st-loader .pulse',
            '.edgtf-st-loader .double_pulse .double-bounce1',
            '.edgtf-st-loader .double_pulse .double-bounce2',
            '.edgtf-st-loader .cube',
            '.edgtf-st-loader .rotating_cubes .cube1',
            '.edgtf-st-loader .rotating_cubes .cube2',
            '.edgtf-st-loader .stripes > div',
            '.edgtf-st-loader .wave > div',
            '.edgtf-st-loader .two_rotating_circles .dot1',
            '.edgtf-st-loader .two_rotating_circles .dot2',
            '.edgtf-st-loader .five_rotating_circles .container1 > div',
            '.edgtf-st-loader .five_rotating_circles .container2 > div',
            '.edgtf-st-loader .five_rotating_circles .container3 > div',
            '.edgtf-st-loader .atom .ball-1:before',
            '.edgtf-st-loader .atom .ball-2:before',
            '.edgtf-st-loader .atom .ball-3:before',
            '.edgtf-st-loader .atom .ball-4:before',
            '.edgtf-st-loader .clock .ball:before',
            '.edgtf-st-loader .mitosis .ball',
            '.edgtf-st-loader .lines .line1',
            '.edgtf-st-loader .lines .line2',
            '.edgtf-st-loader .lines .line3',
            '.edgtf-st-loader .lines .line4',
            '.edgtf-st-loader .fussion .ball',
            '.edgtf-st-loader .fussion .ball-1',
            '.edgtf-st-loader .fussion .ball-2',
            '.edgtf-st-loader .fussion .ball-3',
            '.edgtf-st-loader .fussion .ball-4',
            '.edgtf-st-loader .wave_circles .ball',
            '.edgtf-st-loader .pulse_circles .ball',
            '.edgtf-st-loader .edgtf-dot'
        );

        if (!empty($spinner_style)) {
            $current_style .= illustrator_edge_dynamic_css($spinner_selectors, $spinner_style);
        }

		$style[]       = $current_style;

		return $style;
    }

    add_filter('illustrator_edge_add_page_custom_style', 'illustrator_edge_smooth_page_transition_styles');
}

if (!function_exists('illustrator_edge_404_styles')) {

    function illustrator_edge_404_styles() {

        $image404_style = array();

        if(illustrator_edge_options()->getOptionValue('404_image') !== '') {
            $image404_style['background-image'] = "url(".illustrator_edge_options()->getOptionValue('404_image').")";
        }

        $image404_selector = array('.error404 .edgtf-content .edgtf-container');

        if (!empty($image404_style)) {
            echo illustrator_edge_dynamic_css($image404_selector, $image404_style);
        }
    }

    add_action('illustrator_edge_style_dynamic', 'illustrator_edge_404_styles');
}
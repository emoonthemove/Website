<?php

if(!function_exists('illustrator_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function illustrator_edge_register_top_header_areas() {
        $top_bar_layout  = illustrator_edge_options()->getOptionValue('top_bar_layout');
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'illustrator'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'illustrator'),
                    'id'            => 'edgtf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'illustrator'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'illustrator_edge_register_top_header_areas');
}

if(!function_exists('illustrator_edge_header_widget_areas')) {
    /**
     * Registers widget areas for header
     */
    function illustrator_edge_header_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Header Widget Area', 'illustrator'),
                'id'            => 'edgtf-header-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu, or in bottom of vertical menu', 'illustrator')
            ));
    }

    add_action('widgets_init', 'illustrator_edge_header_widget_areas');
}

if(!function_exists('illustrator_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function illustrator_edge_register_mobile_header_areas() {
        if(illustrator_edge_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'illustrator'),
                'id'            => 'edgtf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'illustrator')
            ));
        }
    }

    add_action('widgets_init', 'illustrator_edge_register_mobile_header_areas');
}

if(!function_exists('illustrator_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function illustrator_edge_register_sticky_header_areas() {
        if(in_array(illustrator_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Widget Area', 'illustrator'),
                'id'            => 'edgtf-sticky-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'illustrator')
            ));
        }
    }

    add_action('widgets_init', 'illustrator_edge_register_sticky_header_areas');
}
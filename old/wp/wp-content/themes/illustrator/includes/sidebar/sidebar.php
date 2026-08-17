<?php

if(!function_exists('illustrator_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function illustrator_edge_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar','illustrator'),
            'id' => 'sidebar',
            'description' =>  esc_html__('Default Sidebar','illustrator'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<span class="edgtf-widget-title">',
            'after_title' => '</span>'
        ));

    }

    add_action('widgets_init', 'illustrator_edge_register_sidebars');
}

if(!function_exists('illustrator_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates IllustratorEdgeSidebar object
     */
    function illustrator_edge_add_support_custom_sidebar() {
        add_theme_support('IllustratorEdgeSidebar');
        if (get_theme_support('IllustratorEdgeSidebar')) new IllustratorEdgeSidebar();
    }

    add_action('after_setup_theme', 'illustrator_edge_add_support_custom_sidebar');
}
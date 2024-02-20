<?php

register_nav_menus(
	array(
		'head_menu' => 'header', 
		'side_menu' => 'left sidebar',
		'footer_menu' => 'footer menu'
	)
);

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_theme_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_theme_support('custom-logo');
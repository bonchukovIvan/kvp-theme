<?php

register_nav_menus(
	array(
		'head_menu' => 'header', 
		'side_menu' => 'left sidebar'
	)
);

function add_theme_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
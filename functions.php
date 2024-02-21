<?php

register_nav_menus(
	array(
		'header_menu' => 'header menu', 
		'header_top' => 'header top', 
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

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow"><img src="'.get_template_directory_uri().'/assets/images/home.svg"/></a>';
    if (is_404()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        wp_title();
    }
    if (is_category() || is_single()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        the_category(' &bull; ');
        if (is_single()) {
            echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
            the_title();
        }
    } elseif (is_page()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function theme_slug_filter_wp_title( $title ) {
    if ( is_404() ) {
        $title = 'Сторінку не знайдено';
    }
    // You can do other filtering here, or
    // just return $title
    return $title;
}
// Hook into wp_title filter hook
add_filter( 'wp_title', 'theme_slug_filter_wp_title', 10, 1 );
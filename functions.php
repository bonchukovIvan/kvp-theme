<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('SUMDU_THEME_NAME', 'Sumdu');

register_nav_menus(
	array(
		'header_menu' => 'header menu', 
		'header_top' => 'header top', 
		'side_menu' => 'left sidebar',
		'footer_menu' => 'footer menu'
	)
);

function get_border_header($title, $h = 'h1') {
    return'<div class="border-header"><'.$h.'>'.$title.'</'.$h.'></div>';
}

function wporg_custom_post_types() {
	register_post_type('kvp_specialities',
		array(
			'labels'      => array(
				'name'          => __('Спеціальності', 'textdomain'),
				'singular_name' => __('Спеціальність', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => false,
                'supports' => array(
                    'title',
                    'thumbnail',
                    'excerpt',
                    'custom-fields'
                )
                
		)
	);
    register_post_type('kvp_collab',
    array(
        'labels'      => array(
            'name'          => __('Навчальні заклади', 'textdomain'),
            'singular_name' => __('Навчальний заклад', 'textdomain'),
        ),
            'public'      => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'thumbnail',
                'custom-fields'
            )   
    )
);
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }


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
    return $title;
}
function kvp_get_search_query() {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'paged' => $paged,
        'post_type' => array('post', 'page'),
        'posts_per_page' => 1
        );

    if (isset($_GET['search_query'])) {
        if (!empty($_GET['search_query'])) {
            $args['s'] = sanitize_text_field($_GET['search_query']);
        }
    }
    return  new WP_Query($args);
}

function add_theme_scripts() {
    /* 
     * include styles
     */
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'index-page', get_template_directory_uri() . '/assets/css/index-page.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'index-page-responsive', get_template_directory_uri() . '/assets/css/index-page-responsive.css' );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    /* 
     * reregister jquery
     */
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js');
    /* 
     * include scripts
     */
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.js', array('jquery'), '', '', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', '', true );
    wp_enqueue_script( 'header', get_template_directory_uri() . '/assets/js/header.js', array('jquery'),'', '', true );
    wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'),'', '', true );

}

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}

add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
add_action('init', 'wporg_custom_post_types');

add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );
add_filter( 'wp_title', 'theme_slug_filter_wp_title', 10, 1 );
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_filter( 'upload_mimes', 'cc_mime_types' );

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
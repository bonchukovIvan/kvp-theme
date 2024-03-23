<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

define( 'SUMDU_THEME_NAME', 'Sumdu' );

function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

function custom_sanitize_email( $email ) {
    $sanitized_email = filter_var( $email, FILTER_SANITIZE_EMAIL );
    if ( ! is_email( $sanitized_email ) ) {
        return '';
    }
    return $sanitized_email;
}

register_nav_menus(
	array(
		'header_menu' => 'header menu', 
		'header_top' => 'header top', 
		'side_menu' => 'left sidebar',
		'footer_menu' => 'footer menu'
	)
);

function kvp_get_custom_post_name($post_type) {
    $post_type_obj = get_post_type_object( $post_type );
    return $post_type_obj->labels->name;
}

function kvp_get_no_data_message() {
    return "Інформацію не знайдено :(";
}

function kvp_get_preview($args = array()) {
    $defaults = array(
        'add_class' => '',
    );

    $args = wp_parse_args( $args, $defaults );

    get_template_part(
        'template-parts/content/content-preview', 
        null,
        $args
    );
}

function kvp_get_border_header( $args = array() ) {
    $defaults = array(
        'title' => '',
        'h'     => 'h1',
        'add_styles' => ''
    );

    $args = wp_parse_args( $args, $defaults );
    if (!$args['title']) {
        $args['title'] = kvp_get_no_data_message();
    }
    $output = '';
    $output .= '<div class="border-header '.$args['add_styles'].' ">';
    $output .= '<'.$args['h'].'>'.$args['title'].'</'.$args['h'].'>';
    $output .= '</div>';
    
    echo $output;
}

function kvp_get_btn( $args = array() ) {
    $defaults = array(
        'title'               => kvp_get_no_data_message(),
        'on_click_href'       => '',
        'container_add_style' => 'full-wdth--mobile',
        'btn_add_style'       => '',
        'btn_style'           => 'btn-blue',
    );

    $args = wp_parse_args( $args, $defaults );

    if ( $args['btn_add_style'] ) {
        $args['btn_style'] .= ' '.$args['btn_add_style'];
    }
    $btn_class = 'class="'.$args['btn_style'].'"';
    
    $output = "";
    $output .= "<div class='btn-container ".$args['container_add_style']."'>";
    $output .= '<button onclick=location.href="'.$args['on_click_href'].'" '.$btn_class.' >'.$args['title'].'<span>&#8594;</span></button>';
    $output .= "</div>";

   echo $output;
}

function custom_text_func( $atts ) {
    $a = shortcode_atts( array(
        'text' => 'Enter text here',
    ), $atts );

    $bc_path = get_template_directory_uri() . "/assets/images/background-main.png";

    $output = '<div class="custom-text preview__back" style="background-image: url(' . $bc_path . ')">';
        $output .= '<div class="preview__body d-block t-white p15-30">';
            $output .= '<div class="border-header">';
                $output .= '<p>';
                    $output .= $a['text'];
                $output .= '</p>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';

    return $output;
}
function custom_mail_func( $atts ) {
    $a = shortcode_atts( array(
        'text' => 'Enter text here',
        'btn-title' => 'Enter title here',
        'btn-href' => '#',
    ), $atts );
   
    ob_start();
    get_template_part('template-parts/content/content-mail-section', null, array(
        'text' => $a['text'],
        'btn-title' => $a['btn-title'],
        'btn-href' => $a['btn-href'],
    ));
    return ob_get_clean();
}
function custom_nav_func( $atts ) {
    $a = shortcode_atts( array(
        'id' => 'Enter text here',
        'title' => 'Enter text here',
    ), $atts );
    
    $id = 'kvp_nav-mark--'.$a['id'];
    $output = '<div id='.$id.' title="'.$a['title'].'"></div>';

    return $output;
}
function custom_ref_func( $atts ) {
    $a = shortcode_atts( array(
        'link' => '#',
        'title' => 'Enter title',
    ), $atts );
    ob_start();
    get_template_part('template-parts/content/content-reference', null, array('title' => $a['title'], 'link' => $a['link'], 'add_class' => ''));
    return ob_get_clean();
}


function wporg_custom_post_types() {
	register_post_type('kvp_specialities',
		array(
			'labels'      => array(
				'name'          => __('Військові спеціальності', 'textdomain'),
				'singular_name' => __('Військова спеціальність', 'textdomain'),
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
    register_post_type('kvp_refrences',
        array(
            'labels'      => array(
                'name'          => __('Нормативні посилання', 'textdomain'),
                'singular_name' => __('Нормативне посилання', 'textdomain'),
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
    register_post_type('kvp_gallery', array(
        'public' => true,
        'labels'  => array(
            'name'          => __('Галереї', 'textdomain'),
            'singular_name' => __('Галерея', 'textdomain'),
        ),
        'supports' => array('title', 'custom-fields',),
    ));
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

function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

function crb_define_gallery_custom_fields() {
    Container::make( 'post_meta', __( 'Gallery Details' ) )
    ->where( 'post_type', '=', 'kvp_gallery' )
    ->add_fields( array(
        Field::make( 'complex', 'gallery_images', 'Gallery Images' )
            ->add_fields( array(
                Field::make( 'image', 'image', 'Image' )->set_value_type( 'url' ),
                Field::make( 'text', 'caption', 'Caption' ),
            )),
    ));
}

function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow"><img src="'.get_template_directory_uri().'/assets/images/home.svg"/></a>';
    if (is_404()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        echo wp_trim_words(the_title('', '', false), 5);
    }
    if (is_category() || is_single()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        the_category(' &bull; ');
        if (is_single()) {
            echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
            echo wp_trim_words(the_title('', '', false), 5);
        }
    } elseif (is_page()) {
        echo "<img src=".get_template_directory_uri().'/assets/images/breadcrumb-right.svg>';
        echo wp_trim_words(the_title('', '', false), 5);
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo wp_trim_words(the_search_query(), 5);
        echo '</em>"';
    }
}

function theme_slug_filter_wp_title( $title ) {
    if ( is_404() ) {
        $title = 'Сторінку не знайдено';
    }
    return $title;
}

function kvp_get_search_query( $post_type = array(), $posts_per_page = 6 ) {
    $paged = get_query_var( 'paged' )  ? get_query_var( 'paged' ) : 1;
    
    $args = array(
        'paged' => $paged,
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        's' => get_search_query()
        );

    if ( isset( $_GET['search_query'] ) ) {
        if ( !empty( $_GET['search_query'] ) ) {
            $args['s'] = sanitize_text_field( $_GET['search_query'] );
        }
    }
    
    return new WP_Query( $args );
}

require get_stylesheet_directory() . '/inc/class-kvp-customizer.php';

new Kvp_Customizer;

function add_theme_scripts() {
    /* 
     * include styles
     */
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.min.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.min.css' );
	wp_enqueue_style( 'magnific-css', get_template_directory_uri() . '/assets/css/magnific.min.css'  );
	wp_enqueue_style( 'awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'  );
    /* 
     * reregister jquery
     */
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js');
    /* 
     * include scripts
     */
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array('jquery'), '', '', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '', '', true );
    wp_enqueue_script( 'header', get_template_directory_uri() . '/assets/js/header.min.js', array('jquery'),'', '', true );
    wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/slider.min.js', array('jquery'),'', '', true );
    wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/js/magnific.min.js', array('jquery'),'', '', true );
}

/*
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}

add_action( 'after_setup_theme', 'crb_load' );
add_action( 'carbon_fields_register_fields', 'crb_define_gallery_custom_fields' );
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
add_action('init', 'wporg_custom_post_types');

add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );
add_filter( 'wp_title', 'theme_slug_filter_wp_title', 10, 1 );
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_filter( 'upload_mimes', 'cc_mime_types' );

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

add_shortcode( 'custom_mail', 'custom_mail_func' );
add_shortcode( 'custom_text', 'custom_text_func' );
add_shortcode( 'custom_ref', 'custom_ref_func' );
add_shortcode( 'nav', 'custom_nav_func' );
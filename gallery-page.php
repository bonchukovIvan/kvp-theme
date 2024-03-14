<?php 
/*
 * Template Name: Gallery Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?> 
<?php get_header(); ?>
<?php
$args = array(
    'post_type' => 'kvp_gallery',
    'posts_per_page' => 1
);
$posts = new WP_Query( $args );
if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) {
		$posts->the_post();
    }
}
wp_reset_query();
?>
<?php get_footer(); ?>
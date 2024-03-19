<?php 
/*
 * Template Name: Gallery Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?> 
<?php get_header(); ?>
<div class="kvp-gallery p5-25">
  <div class="container">
    <?php kvp_get_border_header(array('title' => the_title('', '', false),)); ?>
    <?php
    $args = array(
        'post_type' => 'kvp_gallery',
        'posts_per_page' => 1
    );
    ?>
  <div class="kvp-gallery__body">
  <?php
    $posts = new WP_Query( $args );
    if ( $posts->have_posts() ) {
          while ( $posts->have_posts() ) {
          $posts->the_post();

          

        }
    }
    wp_reset_query();
    ?>
    <div class="p5-25"></div>

  </div>

  </div>
</div>


<?php get_footer(); ?>
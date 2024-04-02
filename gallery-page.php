<?php 
/*
 * Template Name: Gallery Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.

}

$args = array(
    'post_type' => 'kvp_gallery',
    'posts_per_page' => -1,
);
$posts = new WP_Query( $args );
$is_empty = empty($_GET);
$gallery_id = $is_empty ? $posts->posts[0]->ID : sanitize_key($_GET['gallery_id']);
?> 
<?php get_header(); ?>
<div class="kvp-gallery p5-25">
  <div class="container">

    <div class="kvp-gallery__wrap">
    <?php kvp_get_border_header( array( 'title' => the_title( '', '', false ) ) ); ?>
    
    <div class="kvp-gallery__select-wrap">
    <label for="kvp-gallery__select-1">Подія</label>
      <select name="gallery_id" id="kvp-gallery__select-1">
        <?php if ( $posts -> have_posts() ) : ?>
          <?php while ( $posts -> have_posts() ) : ?>
            <?php $posts->the_post(); ?>
            <option  value="<?php echo get_the_ID()?>" <?php if(isset($_GET['gallery_id']) && sanitize_key($_GET['gallery_id']) == get_the_ID()) echo 'selected' ?>><?php echo get_the_title()?></option>
          <?php endwhile; ?>
          <?php else :?>
            <option value=""><?php echo kvp_get_no_data_message(); ?></option>
        <?php endif; ?>
      </select>
    </div>

    <div class="kvp-gallery__body">
        <?php $gallery_images = carbon_get_post_meta( $gallery_id, 'gallery_images' ); ?>
        <?php if ( $gallery_images ) : ?>
          <?php foreach ( $gallery_images as $image ) : ?>
            <div class="kvp-gallery__item">
              <a href="<?php echo esc_url( $image['image'] ); ?>" class="kvp-gallery__link">
                <img src="<?php echo esc_url( $image['image'] ); ?>" alt="<?php echo  esc_attr( $image['caption'] )?>">
              </a>
            </div>
          <?php endforeach; ?>
          <?php else :?>
            <span><?php echo kvp_get_no_data_message(); ?></span>
        <?php endif; ?>
    <?wp_reset_query(); ?>
    </div> 

  </div>

  </div>
</div>
<script>
 
  $('#kvp-gallery__select-1').on('change', function() {
    window.location.href = window.location.href.replace( /[\?#].*|$/, "?gallery_id="+this.value );
  });
  $('.kvp-gallery__body').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
  enabled: true, // set to true to enable gallery

  preload: [0,2], // read about this option in next Lazy-loading section

  navigateByImgClick: true,

  arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

  tPrev: 'Previous (Left arrow key)', // title for left button
  tNext: 'Next (Right arrow key)', // title for right button
  tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
}
        });
    });
</script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript">
$(window).on('load', function () {
  var container = document.querySelector('.kvp-gallery__body');
  var msnry = new Masonry( container, {
      columnWidth: '.kvp-gallery__item',
      itemSelector: '.kvp-gallery__item'
    });     
  });
</script>
<?php get_footer(); ?>
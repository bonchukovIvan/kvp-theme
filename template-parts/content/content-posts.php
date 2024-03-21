<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="news__item">
    <div class="news__img">
        <?php if(get_the_post_thumbnail_url()) : ?>
            <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
        <?php else : ?>
            <img 
            src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
        <?php endif; ?>
    </div>
    <div class="news__content">
        <div class="news__content-top">
            <div class="news__category"><?= get_the_category()[0]->name; ?></div>
            <div class="news__date"><?= get_the_date(); ?></div>
        </div>
        <div class="news__content-main">
            <div class="news__title"><?= wp_trim_words(get_the_title(), 12); ?></div>
            <div class="news__preview-text"><?= wp_trim_words( get_the_content(), 25 ); ?></div>
        </div>
        <?php kvp_get_btn( array(
            'title'                => 'Читати новину',
            'on_click_href'        => get_permalink(),
            'container_add_style'  => 't-cntr m25-25',
            'btn_add_style'        => 'm-a p15-30',
            'btn_style'            => 'btn-blue',
        ) );?>
    </div>
</div>

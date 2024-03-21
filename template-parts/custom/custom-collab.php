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

$page =  is_front_page() ? get_field( "collab_title" ) : get_field( "emp-collab_title" );

?>

<section class="collab p5-25">
    <div class="container">
        <div class="collab__body">
        <div class="collab__body">
            <?php  kvp_get_border_header( array( 'title' => $page) ); ?>
            <div class="collab__top">
                <div class="slider__control">
                    <div class="slider-arrow left" id="collab__ln-right"></div>
                    <div class="slider__count">
                        <h1 class="slider__current-page" id="collab__current-page"></h1>
                        /
                        <h3 class="slider__summary-page" id="collab__summary-page"></h3>
                    </div>
                    <div class="slider-arrow right" id="collab__ln-left"></div>
                </div>
            </div>
            <div class="collab__slider">
                <div class="collab__track">
                    <?php
                        $args = array('post_type' => 'kvp_collab', 'post_pre_page' => 6, 'order' => 'ASC');
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ): ?>
                        <?php $count = 0;?>
                            <?php while ( $the_query->have_posts() ) : ?>
                                <?php $count++;?>
                                <div class="carousel__item collab__item item-<?php echo $count;?>">
                                <div class="collab__content">
                                    <?php $the_query->the_post(); ?>
                                    <div class="collab__img">
                                        <?php if(get_the_post_thumbnail_url()) : ?>
                                            <img src="<?php  echo esc_urlget_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                        <?php else : ?>
                                            <img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
                                        <?php endif; ?>
                                    </div>                                   
                                        <div class="collab__title"><?= get_the_title(); ?></div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                </div>
                <div class="slider__switcher collab__switcher"></div>
            </div>
        </div>
    </div>
</section>
<?php
/* 
 *Template Name: Home
 */
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php get_header(); ?>
<!-- main-slider-start -->
<?php get_template_part('template-parts/custom/custom-main-slider')?>
<!-- main-slider-end -->

<!-- specials-end -->
<?php get_template_part('template-parts/custom/custom-specials')?>
<!-- specials-end -->

<!-- join-us-start -->
<?php get_template_part('template-parts/custom/custom-join-us')?>
<!-- join-us-end -->

<!-- about-us-start -->
<?php get_template_part('template-parts/custom/custom-about-us')?>
<!-- about-us-end -->

<!-- virtual-ex-start -->
<?php get_template_part('template-parts/custom/custom-virtual-ex')?>
<!-- virtual-ex-start -->

<!-- collab-start -->
<?php get_template_part('template-parts/custom/custom-collab')?>
<!-- collab-end -->

<!-- last-news-start -->
<section class="last-news">
    <div class="container">
        <div class="last-news__body">
            <?php  kvp_get_border_header( array('title' => "Новини", 'h'     => 'h2') ); ?>
            <div class="last-news__main">
                <div class="last-news__top">
                <?php 
                    kvp_get_btn( array(
                        'title'                => 'Відкрити сторінку новин',
                        'on_click_href'       => '/category/news',
                    ) );
                ?>
                <div class="slider__control">
                    <div class="slider-arrow left" id="last-news__ln-right">
                        
                    </div>
                    <div class="slider__count">
                        <h1 class="slider__current-page" id="last-news__current-page"></h1>
                        /
                        <h3 class="slider__summary-page" id="last-news__summary-page"></h3>
                    </div>
                    <div class="slider-arrow right" id="last-news__ln-left">

                    </div>
                </div>
                </div>
                <div class="last-news__slider">
                    <div class="last-news__track">
                        <?php
                            $args = array(
                                'post_type' => 'post', 
                                'post_pre_page' => 6, 
                                'order'  => 'DESC',
                                'orderby'    => 'date');
                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ): ?>
                            <?php $count = 0;?>
                                <?php while ( $the_query->have_posts() ) : ?>
                                    <?php $count++;?>
                                    <div class="carousel__item last-news__item item-<?php echo $count;?>">
                                        <div class="carousel__item-body">
                                            <?php $the_query->the_post(); ?>
                                            <div class="last-news__img">
                                                <?php if(get_the_post_thumbnail_url()) : ?>
                                                    <img data-lazy="<?php echo get_the_post_thumbnail_url(); ?>"  alt="" srcset="">
                                                <?php else : ?>
                                                    <img data-lazy="<?php echo get_template_directory_uri()?>/assets/images/not-found-news.jpg"  alt="" srcset="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="last-news__content">
                                                <div class="last-news__content-top">
                                                    <div class="last-news__category"><?php get_the_category()[0]->name; ?></div>
                                                    <div class="last-news__date"><?php get_the_date(); ?></div>
                                                </div>
                                                <div class="last-news__content-main">
                                                    <div class="last-news__title"><?php echo wp_trim_words(get_the_title('', '', false), 20); ?></div>
                                                    <div class="last-news__preview-text"><?php echo wp_trim_words( get_the_content(), 30 ); ?></div>
                                                </div>
                                                <?php
                                                    kvp_get_btn( array(
                                                        'title'                => 'Читати новину',
                                                        'on_click_href'        => get_permalink(),
                                                        'container_add_style'  => 'more m-a',
                                                        'btn_add_style'        => 'm-a p15-30',
                                                        'btn_style'            => '',
                                                    ) );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="slider__switcher last-news__switcher"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- last-news-end -->
<?php get_footer(); ?>
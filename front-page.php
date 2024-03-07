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

<section class="main-slider p5-25">
    <div class="container">
        <div class="main-slider__body">
            <div class="main-slider__content">
                <div class="main-slider__text">
                    <div class="main-slider__logo">
                        <div class="main-slider__logo-img">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/main-logo.png" alt="">
                        </div>
                        <div class="main-slider__title-text">
                            <div class="main-slider__title">Кафедра військової підготовки</div>
                            <div class="main-slider__title-add">СУМСЬКОГО ДЕРЖАВНОГО УНІВЕРСИТЕТУ</div>                 
                        </div>
                    </div>
                    <div class="main-slider__icon">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/main-slider-i.svg" alt="" srcset="">
                        <div class="main-slider__icon-text">Можливість навчатися за змішаною формою навчання (дистанційно) з використанням веб-ресурсів програм військової підготовки</div>
                    </div>
                    <div class="main-slider__text">Проходження військової підготовки за програмою підготовки офіцерів запасу мають право всі громадяни України всіх категорій відповідно до чинного законодавства</div>
                    <div class="main-slider__btn">
                        <button class="btn-white">
                            Подати заявку на навчання
                        </button>
                    </div>
                </div>
                <div class="main-slider__img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/main-slider-img.png" alt="">
                </div>
                <div class="main-slider__logo--mobile">
                        <div class="main-slider__logo-img">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/main-logo.png" alt="">
                        </div>
                        <div class="main-slider__title-text">
                            <div class="main-slider__title">Кафедра військової підготовки</div>
                            <div class="main-slider__title-add">СУМСЬКОГО ДЕРЖАВНОГО УНІВЕРСИТЕТУ</div>                 
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="main-slider__wrap"></div>
    <div class="main-slider__wrap-orange"></div>
</section> 

<?php get_template_part('template-parts/custom/custom-specials')?>

<section class="join-us p5-25" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');">
    <div class="container">
        <div class="join-us__body">
            <div class="join-us__form">
                <?php  kvp_get_border_header( array( 'title' => get_field("join-us_title" ), 'h' => 'h2' ) ); ?>
                <div class="join-us__content">
                    <?php echo do_shortcode('[contact-form-7 id="d4e6dc4" title="Join-us"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="join-us__gradient"></div>
</section>

<section class="about-us" id="about-us-index" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/grid-bg.png');">         
    <div class="container">
        <div class="about-us__body" >
            <div class="about-us__main">
            <?php  kvp_get_border_header(array('title' => get_field("about-us_title"))); ?>
            <div class="about-us__content">
                <div class="about-us__preview">
                    <div class="about-us__text">
                    <? print_r(get_field("about-us_desc")); ?>
                    </div>
                    <div class="btn-container">
                        <button class="btn-blue">
                            Подивитися відео про кафедру
                        </button>
                    </div>
                    <div class="about-us__img--mobile">
                        <img src="<?php echo get_field("about-us_img")?>" alt="">
                    </div>
                    </div>
                </div>
            </div>
            <div class="about-us__bg" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');"></div>  
            <div class="about-us__img">
                <img src="<?php echo get_field("about-us_img")?>" alt="">
            </div>
        </div>
        <div class="about-us__white"></div>
    </div>

    <div class="about-us__gradient"></div>   
</section>

<?php get_template_part('template-parts/custom/custom-virtual-ex')?>

<?php get_template_part('template-parts/custom/custom-collab')?>

<section class="last-news p5-25">
    <div class="container">
        <div class="last-news__body">
            <?php  kvp_get_border_header(array('title' => "Новини")); ?>
            <div class="last-news__main">
                <div class="last-news__top">
                    <button class="btn-blue">Відкрити сторінку новин</button>
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
                            $args = array('post_type' => 'post', 'post_pre_page' => 6, 'order' => 'ASC');
                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ): ?>
                            <?php $count = 0;?>
                                <?php while ( $the_query->have_posts() ) : ?>
                                    <?php $count++;?>
                                    <div class="carousel__item last-news__item item-<?php echo $count;?>">
                                        <?php $the_query->the_post(); ?>
                                        <div class="last-news__img">
                                            <?php if(get_the_post_thumbnail_url()) : ?>
                                                <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                            <?php else : ?>
                                                <img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="last-news__content">
                                            <div class="last-news__content-top">
                                                <div class="last-news__category"><?= get_the_category()[0]->name; ?></div>
                                                <div class="last-news__date"><?= get_the_date(); ?></div>
                                            </div>
                                            <div class="last-news__content-main">
                                                <div class="last-news__title"><?= get_the_title(); ?></div>
                                                <div class="last-news__preview-text"><?= wp_trim_words( get_the_content(), 25 ); ?></div>
                                            </div>
                                            <div class="btn-container">
                                                <button class="btn-white more m-a">Читати новину</button>
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

<?php get_footer(); ?>
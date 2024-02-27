<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>
<section class="special">
    <div class="container">
        <div class="special__body">
            <div class="border-header">
                <h2>
                    Військові спеціальності
                </h2>
            </div> 
            <div class="special__content">
                <?php
                    $args = array('post_type' => 'kvp_specialities', 'post_pre_page' => 6, 'order' => 'ASC');
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ): ?>
                    <?php $count = 0;?>
                        <?php while ( $the_query->have_posts() ) : ?>
                            <?php $count++;?>
                            <div class="special__item item-<?php echo $count;?>">
                                <?php $the_query->the_post(); ?>
                                <div class="special__about">
                                    <div class="special__icon">
                                        <img src="<?php echo the_field('special-icon'); ?>" alt="" srcset="">
                                    </div>
                                    <div class="special__text">
                                        <div class="special__desc">
                                            <?php echo get_the_excerpt(); ?>
                                        </div>
                                        <div class="special__title">
                                            <?php echo get_the_title(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="special__img">
                                    <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<section class="join-us" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');">
    <div class="container">
        <div class="join-us__body">
            <div class="join-us__form">
                <div class="border-header">
                    <h2>
                        Бажаєш приєднатися?
                    </h2>
                </div>  
                <div class="join-us__content">
                    <?php echo do_shortcode('[contact-form-7 id="d4e6dc4" title="Join-us"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="join-us__gradient"></div>
</section>
<!-- <section class="about-us" id="about-us-index" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/grid-bg.png');">
    <div class="container">
        <div class="about-us__body" >
            <div class="about-us__content">
                <div class="about-us__preview">
                    <div class="border-header">
                        <h1>
                            Про нас
                        </h1>
                    </div>
                    <div class="about-us__text">
                    <strong>
                        Кафедра є правонаступником Військового інституту ракетних військ і артилерії Сумського державного університету з військової підготовки громадян України за програмою офіцерів запасу. 
                        Кафедра має подвійне підпорядкування: Командуванню Сухопутних військ Збройних Сил України та Сумському державному університету. 
                    </strong>
                    <p>
                        Кафедра військової підготовки є структурним підрозділом СумДУ, що входить до Всесвітнього рейтингу дослідницьких університетів світу від Times Higher Education World University Rankings (THE) на позиції 501-600 та на 1-2 позиції серед університетів України. Згідно з міжнародним рейтингом вищих навчальних закладів QS World University Rankings Сумський державний університет входить до топ-групи 701-750 провідних університетів світу.
                    </p>
                    </div>
                    <button class="btn-blue">
                        Подивитися відео про кафедру
                    </button>
                </div>
                <div class="about-us__img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/about-us-man.png" alt="">
                </div>
            </div>
            
        </div>
    </div>
</section> -->
<section class="last-news">
    <div class="container">
        <div class="last-news__body">
            <div class="border-header">
                <h2>
                    Новини
                </h2>
            </div> 
            <div class="last-news__top">
                <button class="btn-blue">Відкрити сторінку новин</button>
                <div class="last-news_control">
                    <div class="slider-arrow left" id="ln-right">
                        
                    </div>
                    <div class="last-news__count">
                        <h1 class="current-page"></h1>
                        /
                        <h3 class="summary-page"></h3>
                    </div>
                    <div class="slider-arrow right" id="ln-left">

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
                                <div class="carousel__item last-news item-<?php echo $count;?>">
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
                                            <div class="last-news__preview-text"><?=wp_trim_words( get_the_content(), 10 ); ?></div>
                                        </div>
                                        <button class="btn-blue more">Читати новину</button>
                                    </div>
                                    
                                </div>
                            <?php endwhile ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                </div>
                <div class="last-news__switcher"></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
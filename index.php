<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>
<section class="main-slider">
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
<section class="special">
    <div class="container">
        <div class="special__body">
            <div class="border-header">
                <h1>
                    Військові спеціальності
                </h1>
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
<section class="about-us" id="about-us-index" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/grid-bg.png');">         
    <div class="container">
        <div class="about-us__body" >
            <div class="about-us__main">
            <div class="border-header">
                <h1>
                    Про нас
                </h1>
            </div>
            <div class="about-us__content">
                <div class="about-us__preview">
                    <div class="about-us__text">
                    <strong>
                        Кафедра є правонаступником Військового інституту ракетних військ і артилерії Сумського державного університету з військової підготовки громадян України за програмою офіцерів запасу. 
                        <br>
                        <br>
                        Кафедра має подвійне підпорядкування: Командуванню Сухопутних військ Збройних Сил України та Сумському державному університету. 
                    </strong>
                    <p>
                        Кафедра військової підготовки є структурним підрозділом СумДУ, що входить до Всесвітнього рейтингу дослідницьких університетів світу від Times Higher Education World University Rankings (THE) на позиції 501-600 та на 1-2 позиції серед університетів України. Згідно з міжнародним рейтингом вищих навчальних закладів QS World University Rankings Сумський державний університет входить до топ-групи 701-750 провідних університетів світу.
                    </p>
                    </div>
                    <div class="btn-container">
                        <button class="btn-blue">
                            Подивитися відео про кафедру
                        </button>
                    </div>
                    <div class="about-us__img--mobile">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/about-us-man.png" alt="">
                    </div>
                    </div>
                </div>
            </div>
            <div class="about-us__bg" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');"></div>  
            <div class="about-us__img">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/about-us-man.png" alt="">
            </div>
        </div>
        <div class="about-us__white"></div>
    </div>

    <div class="about-us__gradient"></div>   
</section>

<section class="virtual-ex" style="background: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png')">
    <div class="container">
        <div class="virtual-ex__body" >
            <div class="border-header">
                <h1>
                    Віртуальна екскурсія
                </h1>
            </div> 
            <div class="virtual-ex__content">
                <div class="virtual-ex__text">
                    <strong>
                        Ласкаво просимо вас на віртуальну екскурсію кафедрою військової підготовки! Ця сторінка пропонує унікальну можливість дізнатися більше про нашу кафедру, не покидаючи зручностей вашого комп'ютера.
                    </strong>
                    <p>
                        Ви можете переглянути фотографії наших приміщень. За допомогою віртуальної екскурсії та зможете краще ознайомитися з нашою кафедрою та відчути її атмосферу.
                    </p>
                    <p>
                    Якщо ви бажаєте більше інформації або бажаєте  вступити до нашої кафедри, будь ласка, зв'яжіться з нами за допомогою контактних даних нашого сайту. Ми готові відповісти на всі ваші питання та надати додаткову інформацію.
                    </p>
                    <p>Дякуємо вам за інтерес до нашої кафедри. Ми сподіваємося, що ви знайдете цю віртуальну екскурсію корисною та захоплюючою!</p>
                </div>
                <div class="virtual-ex__excursion">
                    <iframe src="https://kvp.sumdu.edu.ua/3d-index.html" frameborder="0"></iframe>
                </div>
                <div class="virtual-ex__app-text">
                    Також в нас є додаток для Android з аудіоекскурсіями по 3D простору наших приміщень та віртуальному полігону з військовою технікою.
                </div>
                <div class="virtual-ex__app">
                    <div class="virtual-ex__app-add">
                        Зацікавились? Завантажуйте додаток з Google Play за посиланням:
                    </div>
                    <div class="virtual-ex__button">
                        <button class="btn-blue">Завантажити додаток</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="virtual-ex__gradient"></div>
    </div>
</section>
<section class="collab">
    <div class="container">
        <div class="collab__body">
        <div class="last-news__body">
            <div class="border-header">
                <h1>
                    Навчальні заклади, з якими ми співпрацюємо
                </h1>
            </div> 
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
                                            <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
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
<!--
<section class="last-news">
    <div class="container">
        <div class="last-news__body">
            <div class="border-header">
                <h1>
                    Новини
                </h1>
            </div> 
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
                                            <button class="btn-white more">Читати новину</button>
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
</section> -->
<?php get_footer(); ?>
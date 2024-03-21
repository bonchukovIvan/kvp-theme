<?php
/**
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

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
                        <img src="<?php echo esc_url( get_field('main-slider-icon') ); ?>" alt="" srcset="">
                        <div class="main-slider__icon-text"><?php echo get_field('main-slider-text-icon'); ?></div>
                    </div>

                    <div class="main-slider__text"><?php echo get_field('main-slider-add-text'); ?></div>

                    <?php 
                        kvp_get_btn( array(
                            'title'                => get_field('main-slider-btn-text'),
                            'on_click_href'       => get_field('main-slider-btn-href'),
                            'btn_style'            => 'btn-white',
                        ) );
                    ?>

                </div>
                <div class="main-slider__img">
                    <img src="<?php echo esc_url( get_field('main-slider-img') ); ?>" alt="">
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
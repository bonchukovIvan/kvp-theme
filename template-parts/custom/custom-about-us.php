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

<section class="about-us" id="about-us-index" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/grid-bg.png');">         
    <div class="container">
        <div class="about-us__body" >
            <div class="about-us__main">
            <?php  kvp_get_border_header(array('title' => get_field("about-us_title"), 'h'     => 'h2')); ?>
            <div class="about-us__content">
                <div class="about-us__preview">
                    <div class="about-us__text">
                    <?php print_r(get_field("about-us_desc")); ?>
                    </div>
                    <?php 
                        kvp_get_btn( array(
                            'title'                => 'Подивитися відео про кафедру',
                            'on_click_href'       => get_field('about-us-btn-href'),
                        ) );
                    ?>
                    <div class="about-us__img--mobile">
                        <img src="<?php echo esc_url( get_field("about-us_img") )?>" alt="">
                    </div>
                    </div>
                </div>
            </div>
            <div class="about-us__bg" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');"></div>  
            <div class="about-us__img">
                <img loading="lazy" src="<?php echo esc_url( get_field("about-us_img") )?>" alt="">
            </div>
        </div>
        <div class="about-us__white"></div>
    </div>
    <div class="about-us__gradient"></div>   
</section>
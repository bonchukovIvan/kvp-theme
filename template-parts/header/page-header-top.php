<?php
/**
 * Template part for displaying page header navbar
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// links
$youtube_link = get_theme_mod('basic-header-callout-youtube' );
$facebook_link = get_theme_mod('basic-header-callout-facebook' );
$instagram_link = get_theme_mod('basic-header-callout-instagram' );
$telegram_link = get_theme_mod('basic-header-callout-tg' );
$mail_link = get_theme_mod('basic-header-callout-mail' );

// icons
$youtube_icon = get_theme_mod( 'header-icon-yu-set' );
$facebook_icon = get_theme_mod( 'header-icon-face-set' );
$instagram_icon = get_theme_mod( 'header-icon-instagram-set' );
$mail_icon = get_theme_mod( 'header-icon-mail-set' );
$telegram_icon = get_theme_mod( 'header-icon-tg-set' );

// numbers
$f_number = get_theme_mod('basic-header-callout-f-number' );
$s_number = get_theme_mod( 'basic-header-callout-s-number' );
?>

<div class="header-top">
    <div class="container">
        <div class="header-top__body">
        <div class="header-top__brand">
            <a href="/" >
                <div class="header-top__branding">
                    <div class="header-top__logo">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            
                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } 
                        ?>
                    </div>
                    <div class="header-top__text">
                        <h2>
                            Кафедра<br>військової підготовки
                        </h2>
                        <p>
                            СУМСЬКОГО<br>ДЕРЖАВНОГО УНІВЕРСИТЕТУ
                        </p>
                    </div>

                </div>
            </a>
            <div class="burger">
                        <span></span>
                    </div>
        </div>
        <div class="header-top__mobile-bottom">
                <?php 
                    if (has_nav_menu('header_menu')) 
                        wp_nav_menu([
                            'theme_location' => 'header_top',
                            'container' => 'nav',
                            'menu_class' => 'header-top__menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 3,
                            'add_li_class'  => 'header-top__li '
                        ]);
                ?>  
                <div class="header-top__contacts">

                    <div class="numbers">

                        <a href="#" id="phone-action">
                            <div class="phone-icon">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/phone.svg" alt="">
                            </div>
                        </a>

                        <!-- <select name="numbers_select numbers__text" id="numbers_select_id">
                            <option value="<?php echo str_replace(' ', '', $f_number); ?>"><?php echo $f_number; ?></option>
                            <option value="<?php echo str_replace(' ', '', $s_number); ?>"><?php echo $s_number; ?></option>
                        </select> -->
                        <ol class="numbers__menu">
                            <li class="numbers__item">
                                <a href="tel:<?php echo str_replace(' ', '', $f_number); ?>"><?php echo $f_number; ?></a>
                                <ol class="sub-numbers__menu">
                                    <li class="numbers__item">
                                        <a href="tel:<?php echo str_replace(' ', '', $s_number); ?>"><?php echo $s_number; ?></a>
                                    </li>
                                </ol>
                            </li>

                        </ol>
                        <div class="numbers__text">
                            <a href="tel:<?php echo str_replace(' ', '', $f_number); ?>">
                                <div>
                                    <?php echo $f_number; ?>
                                </div>
                            </a>
                            <a href="tel:<?php echo str_replace(' ', '', $s_number); ?>">
                                <div>
                                    <?php echo $s_number; ?>
                                </div>
                            </a>
                        </div>

                        </div>
                    </div>

                    <div class="header-top__icons">
                        <div class="mail">
                            <a href="mailto:<?php echo $mail_link; ?>">
                                <img src="<?php echo esc_url( $mail_icon ); ?>" alt="">
                            </a>
                        </div>
                        <div class="social">
                            <a href="<?php echo esc_url( $youtube_link ); ?>" target=”_blank” >
                                <img src="<?php echo esc_url( $youtube_icon ); ?>" alt="">
                            </a>
                            <a href="<?php echo esc_url( $facebook_link ); ?>" target=”_blank” >
                                <img src="<?php echo esc_url( $facebook_icon ); ?>" alt="">
                            </a>
                            <a href="<?php echo esc_url( $instagram_link ); ?>" target=”_blank” >
                                <img src="<?php echo esc_url( $instagram_icon ); ?>" alt="">
                            </a>
                            <a href="<?php echo esc_url( $telegram_link ); ?>" target=”_blank” >
                                <img src="<?php echo esc_url( $telegram_icon ); ?>" alt="">
                            </a>
                        </div>
                        <div class="sumdu-logo">
                            <a href="https://sumdu.edu.ua" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/sumdu-logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
        </div>  
        </div>
    </div>
</div>
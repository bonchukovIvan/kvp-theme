<?php
/**
 * Template part for displaying page header navbar
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */
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
        </div>
        
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
                <div class="numbers">
                    <a href="tel:+380542628315">
                        <div class="phone-icon">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/phone.svg" alt="">
                        </div>
                    </a>
                    <select name="numbers" id="numbers-select" class="numbers-select">
                        <option value="">
                            +38 0542 62 83 15
                        </option>
                        <option value="">
                            +38 0542 62 83 15
                        </option>
                    </select>
                </div>
                <div class="mail">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/email.svg" alt="">
                    </a>
                </div>
                <div class="social">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/youtube.svg" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/facebook.svg" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram.svg" alt="">
                    </a>
                </div>
                <div class="sumdu-logo">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/sumdu-logo.png" alt="">
                    </a>
                </div>
        </div>
    </div>
</div>
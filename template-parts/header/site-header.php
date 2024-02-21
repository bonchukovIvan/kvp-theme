<?php
/**
 * Template part for displaying site header in header.php
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */
?>

<header id="kvp-header">
        <div class="header__body">
            <div class="header__top">

            </div>
            <div class="navbar">
                <div class="container">
                    <div class="navbar__body">
                        <?php 
                            if (has_nav_menu('header_menu')) 
                                wp_nav_menu([
                                    'theme_location' => 'header_menu',
                                    'container' => 'nav',
                                    'menu_class' => 'navbar__nav',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 3,
                                    'add_li_class'  => 'navbar__li '
                                ]);
                        ?>
                        <div class="navbar__additional">
                            <div class="schedule">
                                <a href="#">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/schedule.svg" alt="" srcset="">
                                
                                    <div>
                                        Розклад занять
                                    </div>
                                </a>
                            </div>
                            <div class="search">
                                <a href="#">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg" alt="" srcset="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if (!is_home()) get_template_part( 'template-parts/header/page-breadcrumbs'); ?>
</header>

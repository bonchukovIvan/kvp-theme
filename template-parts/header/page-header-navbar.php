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

<?php require_once get_template_directory() . '/inc/navbar-nav-walker.php'; ?>

<div class="navbar">
    <div class="container">
        <div class="navbar__body">
            <div class="navbar__bottom" id="navbar__bottom-mobile">
                <?php 
                    if (has_nav_menu('header_menu')) 
                        wp_nav_menu([
                            'theme_location' => 'header_menu',
                            'container' => 'nav',
                            'menu_class' => 'navbar__nav',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 2,
                            'add_li_class'  => 'navbar__li',
                            'walker' => new Navbar_Walker_Nav_Menu(),
                        ]);
                ?>
                <div class="navbar__additional">
                    <div class="schedule">
                        <a href="https://shedule.sumdu.edu.ua">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/schedule.svg" alt="" srcset="">
                            <div>
                                Розклад занять
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="navbar__top">
                <div class="search">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg" alt="" srcset="">
                        </a>
                </div>
                <div class="navbar__more">
                        <button class="navbar__more-btn" id="navbar__more-btn">
                            Більше
                            <i class="c-arrow down"></i>
                        </button>
                </div>
            </div>

        </div>
    </div>
</div>
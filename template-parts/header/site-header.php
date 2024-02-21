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
            <?php get_template_part( 'template-parts/header/page-header-top'); ?>
            <?php get_template_part( 'template-parts/header/page-header-navbar'); ?>
        </div>
    <?php if (!is_home()) get_template_part( 'template-parts/header/page-breadcrumbs'); ?>
</header>

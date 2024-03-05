<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

?>

<div class="news__popular">
    <div class="news__popular-title">
        Топ популярних новин
    </div>
    <div class="news__popular-main">
        <?php 
        if ( function_exists('wpp_get_mostpopular') ) {
            /* Get up to the top 5 commented posts from the last 7 days */
            wpp_get_mostpopular(array(
                'post_type' => 'post',
                'limit' => 10,
                'range' => 'all',
                'order_by' => 'views',
                'wpp_start' => '<ol class="wpp__most-popular">',
                'wpp_end' => '</ol>',
                'post_html' => '<li class="wpp__most-popular--item">{thumb}<a href="{url}">{text_title}</a></li>'
            ));
        } 
        ?>
    </div>
</div>
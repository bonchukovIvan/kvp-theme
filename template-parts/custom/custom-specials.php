<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<section class="special" id="special-section">
    <div class="container">
        <div class="special__body">
            <?php kvp_get_border_header(array('title' => kvp_get_custom_post_name('kvp_specialities'), 'h'     => 'h2')); ?>
            <div class="special__content">
                <?php
                    $args = array('post_type' => 'kvp_specialities', 'post_pre_page' => 6, 'order' => 'ASC');
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ): ?>
                    <?php $count = 0;?>
                        <?php while ( $the_query->have_posts() ) : ?>
                            <?php $count++; ?>
                            <div class="special__item item-<?php echo $count;?>">
                                <?php $the_query->the_post(); ?>
                                <div class="special__about">
                                    <div class="special__icon">
                                            <img src="<?php echo esc_url( get_field('special-icon') ); ?>" alt="" srcset="">
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
                                <?php if (get_field('special-href')) :?>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_field('special-href'); ?>?autoplay=1&loop=1&controls=0&mute=1&playlist=<?php echo get_field('special-href'); ?>" frameborder="0" allowfullscreen></iframe>
                                <?php else :?>
                                    <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
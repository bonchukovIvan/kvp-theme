<?php 
/**
 * Template Name: References Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$args = array('post_type' => 'kvp_refrences', 'post_pre_page' => -1, 'order' => 'ASC');
$the_query = new WP_Query( $args );

?> 

<?php get_header(); ?>

<?php kvp_get_preview(array('add_class-body' => 'preview__center-img', 'article_id' => get_the_ID())); ?> 
<div class="references" id="post-<?php the_ID(); ?>">
    <div class="container">
        <div class="references__body p5-25">
            <div class="references__grid">

            <?php if ( $the_query->have_posts() ): the_post()?>
                <?php while ( $the_query->have_posts() ) : ?>
                <?php $the_query->the_post(); ?>
                    <!-- <div class="references__item back-grey">
                        <div class="references__icon">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/ref.svg" alt="">
                        </div>
                        <a class="references__link" href="<?php echo get_field("kvp-reference")?>">
                            <div class="references__text"><?php echo the_title(); ?></div>
                        </a>
                    </div> -->
                    <?php get_template_part('template-parts/content/content-reference', null, array(
                        'link' => get_field("kvp-reference"),
                        'title' => the_title('', '', false),
                        'add_class' => 'back-grey'
                    ))?>
                <?php endwhile; ?>
            <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
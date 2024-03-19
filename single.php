<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php get_header(); ?>

<?php

$post = $wp_query->post;
$tmp = get_the_category($post->ID);
$category = reset($tmp);
$category_id = $category->cat_ID;

?>
<article class="single-post p5-25">
	<div class="container">
		<?php echo kvp_get_border_header( array( 'title' => $post->post_title ) ); ?>
		<div class="single-post__body">
			<div class="single-post__content">
				<div class="single-post__top">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="single-post__top-img">
							<div class="single-post__gradient"></div>
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
					<?php else : ?>
						<div class="single-post__top-img">
							<div class="single-post__gradient"></div>
							<img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
						</div>
					<?php endif; ?>
					<div class="single-post__meta">
						<i class="fa fa-calendar"></i>
						<div class="single-post__date"><?php echo $post->post_date ?></div>
					</div>
				</div>
				<div class="single-post__main">
					<?php print_r($post->post_content); ?>
				</div>
				<div class="single-post__footer">
					<div class="get-back">
						<div class="get-back__ar">
							<div class="c-arrow left"></div>
							<a href="<?php echo get_category_link($category_id);?>">Повернутися до усіх статей</a>
						</div>
					</div>
                    <?php kvp_get_btn( array('title' => 'Подати заявку на навчання') );?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/content/content-popular' ); ?>
		</div>
        <div class="last-news__body m25-0 ">
			<?php echo kvp_get_border_header(array('title' => 'Інші новини')); ?>
            <div class="last-news__main">
                <div class="last-news__top">
                    <?php kvp_get_btn( array('title' => 'Відкрити сторінку новин', 'on_click_href' => get_category_link( $category_id ) ) );?>
                    <div class="slider__control">
                        <div class="slider-arrow left" id="related-news__ln-right"></div>
                        <div class="slider__count">
                            <h1 class="slider__current-page" id="last-news__current-page"></h1>
                            /
                            <h3 class="slider__summary-page" id="last-news__summary-page"></h3>
                        </div>
                        <div class="slider-arrow right" id="related-news__ln-left"></div>
                    </div>
                </div>
            <div class="related-news__slider">
                <div class="related-news__track">
                    <?php
                        $args = array('post_type' => 'post', 'post_pre_page' => 6, 'order' => 'ASC', 'orderby' => 'rand', 'post__not_in' => [$post->ID]);
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ): ?>
                        <?php $count = 0;?>
                            <?php while ( $the_query->have_posts() ) : ?>
                                <?php  $the_query->the_post(); ?>
                                <div class="news__item cntr">
                                    <div class="news__img full-wdth">
                                        <?php if(get_the_post_thumbnail_url()) : ?>
                                            <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                        <?php else : ?>
                                            <img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="news__content full-wdth">
                                        <div class="news__content-top">
                                            <div class="news__category"><?= get_the_category()[0]->name; ?></div>
                                            <div class="news__date"><?= get_the_date(); ?></div>
                                        </div>
                                        <div class="news__content-main">
                                            <div class="news__title"><?= get_the_title(); ?></div>
                                            <div class="news__preview-text"><?= wp_trim_words( get_the_content(), 25 ); ?></div>
                                        </div>
                                        <?php kvp_get_btn( array(
                                                    'title'                 => 'Читати новину',
                                                    'on_click_href'            => get_permalink(),
                                                    'container_add_style'      => 't-cntr m25-25',
                                                    'btn_add_style'         => 'm-a',
                                                ) );?>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="slider__switcher last-news__switcher"></div>
        </div>
    </div>
</section>
	</div>
</article>
<?php get_footer(); ?>
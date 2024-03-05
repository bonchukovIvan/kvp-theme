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
<article class="single-post">
	<div class="container">
		<?php echo get_border_header($post->post_title); ?>
		<div class="single-post__body">
			<div class="single-post__content">
				<div class="single-post__top">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="">
					<?php else : ?>
						<img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
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
							<div class="arrow left"></div>
							<a href="<?php echo get_category_link($category_id);?>">Повернутися до усіх статей</a>
						</div>
					</div>
					<div class="btn-container">
						<button class="btn-blue">Подати заявку на навчання</button>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/content/content-popular' ); ?>
			
		</div>
        <div class="last-news__body">
			<?php echo get_border_header('Інші новини'); ?>
            <div class="last-news__main">
                <div class="last-news__top">
                    <button class="btn-blue">Відкрити сторінку новин</button>
                    <div class="slider__control">
                        <div class="slider-arrow left" id="last-news__ln-right">
                            
                        </div>
                        <div class="slider__count">
                            <h1 class="slider__current-page" id="last-news__current-page"></h1>
                            /
                            <h3 class="slider__summary-page" id="last-news__summary-page"></h3>
                        </div>
                        <div class="slider-arrow right" id="last-news__ln-left">

                        </div>
                    </div>
                </div>
                <div class="last-news__slider">
                    <div class="last-news__track">
                        <?php
                            $args = array('post_type' => 'post', 'post_pre_page' => 6, 'order' => 'ASC', 'orderby' => 'rand',);
                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ): ?>
                            <?php $count = 0;?>
                                <?php while ( $the_query->have_posts() ) : ?>
                                    <?php $count++;?>
                                    <div class="carousel__item last-news__item item-<?php echo $count;?>">
                                        <?php $the_query->the_post(); ?>
                                        <div class="last-news__img">
                                            <?php if(get_the_post_thumbnail_url()) : ?>
                                                <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                            <?php else : ?>
                                                <img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="last-news__content">
                                            <div class="last-news__content-top">
                                                <div class="last-news__category"><?= get_the_category()[0]->name; ?></div>
                                                <div class="last-news__date"><?= get_the_date(); ?></div>
                                            </div>
                                            <div class="last-news__content-main">
                                                <div class="last-news__title"><?= get_the_title(); ?></div>
                                                <div class="last-news__preview-text"><?= wp_trim_words( get_the_content(), 25 ); ?></div>
                                            </div>
                                            <div class="btn-container">
                                                <button class="btn-white more">Читати новину</button>
                                            </div>
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
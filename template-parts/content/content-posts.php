<div class="news__item">
    <div class="news__img">
        <?php if(get_the_post_thumbnail_url()) : ?>
            <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
        <?php else : ?>
            <img src="<?php  echo get_template_directory_uri()?>/assets/images/not-found-news.jpg" alt="" srcset="">
        <?php endif; ?>
    </div>
    <div class="news__content">
        <div class="news__content-top">
            <div class="news__category"><?= get_the_category()[0]->name; ?></div>
            <div class="news__date"><?= get_the_date(); ?></div>
        </div>
        <div class="news__content-main">
            <div class="news__title"><?= get_the_title(); ?></div>
            <div class="news__preview-text"><?= wp_trim_words( get_the_content(), 25 ); ?></div>
        </div>
        <div class="btn-container">
            <button class="btn-blue more" onclick="location.href='<?php echo get_permalink(); ?>'">Читати новину</button>
        </div>
    </div>
</div>

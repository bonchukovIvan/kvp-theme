<?php 
/*
 * Template Name: Search Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_search = count( $_GET );

?> 

<?php get_header(); ?>

<section class="kvp-search p5-25">
    <div class="container">
        <div class="kvp-search__body">

            <?php kvp_get_border_header( array( 'title' => get_the_title() ) ); ?>

            <search class="kvp-search__form m25-0">
                
                <div class="kvp-search__title">
                    Пошук на сайті
                </div>

                <?php get_search_form(array("search_url" => "search"));?>

                <div class="kvp-search__example">
                    Наприклад: <strong>Правила вступу</strong>
                </div>

            </search>
            
        </div>
    </div>
</section>

<?php
    if ( $is_search ) {
        $query = kvp_get_search_query(array( 'post', 'page' ));
        $total_results = $query->found_posts;
    }
?>
            
<section class="search-result">
    <div class="container">
    <?php if( is_search() ): ?>
    <h1 class="page-title"><?php _e( 'Search results for:', 'nd_dosth' ); ?></h1>
    <div class="search-query"><?php echo get_search_query(); ?></div>    
<?php endif; ?>
    <?php  if ( $is_search && !empty($_GET['search_query'])) : ?>

        <div class="search-result__body">

        <?php if( $query->have_posts()) :?>

            <?php while( $query->have_posts() ) : $query->the_post();?>
                <div class="search-result__item">
                    <div class="search-result__title">
                        <h3><?php echo the_title(); ?></h3>
                    </div>
                    <div class="search-result__desc">
                        <p>
                            <?php echo strip_shortcodes(wp_trim_words( get_the_content(), 25 ));  ?>
                        </p>
                    </div>
                    <div class="search-result__more">
                        <a href="<?php echo get_the_permalink(); ?>">
                            Читати все
                        </a>
                        <?php wp_link_pages(); ?>
                    </div>
                </div>
            <?php endwhile?>

            <?php
                $total_results = $query->found_posts;
                $current_page = max(1, get_query_var('paged'));
                $posts_per_page = $query->get('posts_per_page');
                
                $start_index = ($current_page - 1) * $posts_per_page + 1;
                $end_index = min($start_index + $posts_per_page - 1, $total_results);
            ?>
            <div class="all-results p5-25">
                <p>Показано <strong><?php echo $start_index; ?> — <?php echo $end_index; ?></strong> із <strong><?php echo $total_results; ?></strong></p>
            </div>
            
            
            <nav class="kvp-pagination">
                <?php

                    global $wp;
                    $current_url = home_url( $wp->request );
                    $search_query = isset( $_GET['search_query'] ) ? $_GET['search_query'] : '';
                    
                    echo paginate_links( array(
                        'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( add_query_arg( 'paged', PHP_INT_MAX, $current_url ) ) ),
                        'format' => '',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total' => $query->max_num_pages,
                        'prev_text' => __('<div class="page-arrow left"></div>'),
                        'next_text' => __('<div class="page-arrow right"></div>'),
                        'type' => 'list',
                        'add_args' => array(
                            'search_query' => $search_query
                        )
                    ) );
                ?>
            </nav>

        <?php else : ?>    
            <div class="content-none">
                Інформації не знайдено :(
            </div>
        <?php endif; ?>
        </div>
    <?php endif; ?>

    </div>
</section>    

<?php get_footer(); 
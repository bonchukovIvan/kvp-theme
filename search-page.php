<?php 
/**
 * Template Name: Search Page
 */

$is_search = count( $_GET );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?> 
<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="kvp-search">
                <div class="container">
                    <div class="kvp-search__body">
                        <div class="border-header">
                            <h1> <?php echo get_the_title(); ?></h1>
                        </div>
                        <search class="kvp-search">
                            <div class="kvp-search__title">
                                Пошук на сайті
                            </div>
                            <form role="search" class="kvp-search__search-form" action="<?php echo home_url( '/search' ); ?>">
                                <label>
                                    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/kvp-search.svg" alt="" set="">
                                    <input type="search" class="kvp-search__search-field"
                                        placeholder="<?php echo esc_attr_x( 'Пошук', 'placeholder' ) ?>"
                                        value="<?php echo isset($_GET['search_query']) ? $_GET['search_query'] : '';?>" 
                                        name="search_query"
                                        title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" 
                                    />
                                </label>
                                <input type="submit" class="kvp-search__search-submit"
                                    value="<?php echo esc_attr_x( 'Пошук', 'submit button' ) ?>" />
                            </form>
                            <div class="kvp-search__example">
                                Наприклад: <strong>Правила вступу</strong>
                            </div>
                        </search>
                    </div>
                </div>
            </section>
            <?php
                if ( $is_search ) {
                    $query = kvp_get_search_query();
                }
            ?>
            
            <section class="search-result">
                <div class="container">
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
                                        <?php echo wp_trim_words( get_the_content(), 25 ); ?>
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
                        <nav class="search-result__pagination">
                            <?php
                           
                            echo paginate_links( array(
                                'base' => str_replace(99999999, '%#%', esc_url( get_pagenum_link( 99999999 ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var( 'paged' ) ),
                                'total' => $query->max_num_pages,
                                'prev_text'    => __('<div class="page-arrow left"></div>'),
                                'next_text'    => __('<div class="page-arrow right"></div>'),
                                'show_all' => false,
                                'type' => 'list'
                            )); 
                            ?>
                        </nav>
                    <?php else : ?>    
                        No results
                    <?php endif; ?>
                    </div>
                <?php  endif; ?>
                </div>
            </section>    
            <pre>
                
            </pre>       
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); 
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php get_header(); ?>

<?php get_search_form(); ?>

<section class="news">
	<div class="container">
        <div class="border-header">
            <h1><?php single_cat_title(); ?></h1>
        </div>
		<div class="news__body">
			<div class="news__grid">
				<?php get_template_part( 'template-parts/content/content-archive' ); ?>
			</div>
            <?php get_template_part( 'template-parts/content/content-popular' ); ?>
			<nav class="kvp-pagination">
				<?php
					global $wp_query; 
					echo paginate_links( array(
						'base' => str_replace(999999, '%#%', esc_url( get_pagenum_link( 999999 ) ) ),
						'format' => '?paged=%#%',
						'current' => max(1, get_query_var( 'paged' ) ),
						'total' => $wp_query->max_num_pages,
						'prev_text'    => __('<div class="page-arrow left"></div>'),
						'next_text'    => __('<div class="page-arrow right"></div>'),
						'type' => 'list'
					)); 
				?>
			</nav>
		</div>
	</div>
</section>
<?php get_footer(); ?>
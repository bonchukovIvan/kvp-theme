<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_search = count( $_GET );

?>

<?php get_header(); ?>

<section class="news p5-25">
	<div class="container">

		<?php kvp_get_border_header(array('title' => single_cat_title('', false))) ?>

		<div class="p5-25">
			<?php get_search_form(array("search_url" => "category/news")); ?>
		</div>

		<div class="news__body">
			<div class="news__grid">
				<?php if (!$is_search) :?>
					<?php get_template_part( 'template-parts/content/content-archive' ); ?>
				<?php else : ?>
					<?php
						if ( $is_search ) {
							$query = kvp_get_search_query(array( 'post' ), 9);
							$total_results = $query->found_posts;
						}
					?>
					<?php
						if ( $query->have_posts() ) {
							// Load posts loop.
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content/content-posts' );
							}			
							?>
							<?php
						} else {
							// If no content, include the "No posts found" template.
							get_template_part( 'template-parts/content/content-none' );
						}
					?>
				<?php endif; ?>
			</div>
            	<?php get_template_part( 'template-parts/content/content-popular' ); ?>
			<nav class="kvp-pagination">
				<?php if (!$is_search) : ?>
					<?php
						global $wp_query; 
						echo paginate_links( array(
							'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var( 'paged' ) ),
							'total' => $wp_query->max_num_pages,
							'prev_text'    => __( '<div class="page-arrow left"></div>' ),
							'next_text'    => __( '<div class="page-arrow right"></div>' ),
							'type' => 'list'
						)); 
					?>
				<?php else : ?>
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
				<?php endif; ?>
			</nav>
		</div>
	</div>
</section>
<?php get_footer(); ?>
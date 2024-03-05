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
<div class="page-content">
	<div class="container">
		<?php if ( ! is_front_page() ) : ?>
			<div class="preview" style="background-image: url(<?php echo get_template_directory_uri()."/assets/images/background-main.png" ?>)">
				<div class="preview__body" >
					<div class="preview__text">
						<?php get_template_part( 'template-parts/header/page-header' ); ?>
						<div class="preview__desc">
							<?php the_field("page-desc"); ?>
						</div>
					</div>
					<div class="preview__img">
						<img src="<?php the_field("page-img"); ?>" alt="" class="">
					</div>
				</div>
			</div>
		<?php endif; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page') . '">',
						'after'    => '</nav>',
						/* translators: %: Page number. */
						'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
					)
				);
				?>
		</div>

		<?php if ( get_edit_post_link() ) : ?>
			<section class="edit-footer">
				<?php
				edit_post_link(
					sprintf(
						esc_html__( 'Edit'),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</section><!-- .entry-footer -->
			<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->

	</div>
</div>




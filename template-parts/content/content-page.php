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

<?php if ( ! is_front_page() ) : ?>
	<?php kvp_get_preview(array('article_id' => get_the_ID())); ?> 
<?php endif; ?>

<div class="page-content">
	<div class="container">
		<?php get_template_part('template-parts/content/content-article'); ?>
	</div>
</div>




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

<?php
    if ( have_posts() ) {
        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content/content-posts' );
        }			
        ?>

        <?php
    } else {
        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content/content-none' );
    }
?>
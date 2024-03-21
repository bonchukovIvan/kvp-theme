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

<div class="references__item <?php echo $args['add_class']; ?>">
    <div class="references__icon">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/ref.svg" alt="">
    </div>
    <a class="references__link" href="<?php echo esc_url($args['link']); ?>">
        <div class="references__text"><?php echo $args['title']; ?></div>
    </a>
</div>
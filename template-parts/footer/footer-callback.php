<?php
/**
 * The template for displaying the footer callback section
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$form_shortcode = get_theme_mod( 'footer-shortcode-text' );
$callback_img = get_theme_mod( 'footer-callback-img-set' );
?>

<section class="callback" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/callback.png')">
    <div class="container">
        <div class="callback-body">
            <div class="callback-body__form">
                <div class="border-header">
                    <h3 class="border-title">
                        Залишилися питання?
                    </h3>
                </div>
                <form class="callback__form">
                    <?php echo do_shortcode($form_shortcode) ?>
                </form>
            </div>
            <div class="callback-body__image">
                <img class="" src="<?php echo esc_url( $callback_img ); ?>" alt="" >
            </div>

        </div>
    </div>
</section>
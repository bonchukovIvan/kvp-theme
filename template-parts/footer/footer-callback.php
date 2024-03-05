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

?>

<section class="callback" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/callback.png')">
    <div class="container">
        <div class="callback-body">
            <div class="callback-body__form">
                <div class="border-header">
                    <h2 class="border-title">
                        Залишилися питання?
                    </h2>
                </div>
                <form class="callback__form">
                    <?php echo do_shortcode('[contact-form-7 id="dceaa37" title="Callback-form"]') ?>
                </form>
            </div>
            <img class="callback-body__image" src="<?php echo get_template_directory_uri()?>/assets/images/girl.png" alt="" srcset="">
        </div>
    </div>
</section>
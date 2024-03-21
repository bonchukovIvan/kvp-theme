<?php
/**
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<section class="join-us p5-25" style=" background-image: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png');">
    <div class="container">
        <div class="join-us__body">
            <div class="join-us__form">
                <?php kvp_get_border_header( array( 'title' => get_field("join-us_title" ), 'h' => 'h2' ) ); ?>
                <div class="join-us__content">
                    <?php echo do_shortcode(get_field('join-us-form')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="join-us__gradient"></div>
</section>
<?php 
/**
 * Template Name: About-us Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?> 

<?php get_header(); ?>

<?php kvp_get_preview(array('add_class' => 'back-grey', 'add_class-body' => 'preview__center-img')); ?> 
<section class="employment">
	<div class="container">
		<?php get_template_part('template-parts/content/content-article'); ?>
	</div>
</section>

<?php get_template_part('template-parts/custom/custom-specials') ?>

<?php get_template_part('template-parts/custom/custom-collab') ?>

<?php get_template_part('template-parts/custom/custom-virtual-ex') ?>

<script>
let text = $('.page-title').text();

let words = text.trim().split(/[\s-]+/);

words.forEach(function(word) {
    if (word.length > 13) {
        let newText = text.replace(word, '<div class="title-long">' + word + '</div>');
        
        $('.page-title').html(newText);
		$('.page-title').addClass('title-28')
    }
});
</script>

<?php get_footer(); ?>

<?php 
/**
 * Template Name: About-us Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?> 

<?php get_header(); ?>

<?php kvp_get_preview(array('add_class' => 'back-grey')); ?> 
<article class="employment p5-25">
	<div class="container">
		<?php get_template_part('template-parts/content/content-article'); ?>
	</div>
</article>

<?php get_template_part('template-parts/custom/custom-specials') ?>

<?php get_template_part('template-parts/custom/custom-collab') ?>

<?php get_template_part('template-parts/custom/custom-virtual-ex') ?>

<?php get_footer(); ?>

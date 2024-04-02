<?php 
/**
 * Template Name: Employment Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$add_class = isset($args['add_class']) ? $args['add_class'] : "";

?> 

<?php get_header(); ?>

<?php kvp_get_preview(array('add_class' => 'back-grey')); ?> 
<div class="page-content">
	<div class="container">
		<?php get_template_part('template-parts/content/content-article'); ?>
	</div>
</div>
<section class="preview-section employment-section back-grey <?php echo  $add_class;  ?>">
    <div class="container">
        <div class="preview__back" style="background-image: url(<?php echo get_template_directory_uri()."/assets/images/background-main.png" ?>)">
            
            <div class="preview__body employment-temp__body preview__center-img" >

                <div class="preview__text--employment">
				<p>Контактний телефон з питань прийняття на військову службу за контрактом осіб офіцерського складу:</p>
				<div class="preview-numbers">
					<a href="tel:<?php echo get_field( 'number_1' ); ?>"><div class="preview-number"><?php echo get_field( 'number_1' ); ?> </div></a>
					<a href="tel:<?php echo get_field( 'number_2' ); ?>"><div class="preview-number"><?php echo get_field( 'number_2' ); ?> </div></a>
				</div>

			</div>
			<div class="preview__phone-icon">
				
					<img src="<?php echo get_field( 'preview__phone-icon' ); ?> " alt="">

				<div class="preview-numbers-mobile">

					<a href="tel:<?php echo get_field( 'number_1' ); ?>"><div class="preview-number"><?php echo get_field( 'number_1' ); ?> </div></a>
					<a href="tel:<?php echo get_field( 'number_2' ); ?>"><div class="preview-number"><?php echo get_field( 'number_2' ); ?> </div></a>

				</div>

            </div>
        </div>
    </div>
</section>

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
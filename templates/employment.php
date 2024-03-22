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
            
            <div class="preview__body p5-25f employment-temp__body" >

                <div class="preview__text">
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


<?php get_footer(); ?>
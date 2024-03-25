<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile; // End of the loop.
?>
<script>
let text = $('.page-title').text();

let words = text.trim().split(/[\s-]+/);

words.forEach(function(word) {
    if (word.length > 13) {
        let newText = text.replace(word, '<div class="title-long">' + word + '</div>');
        
        $('.page-title').html(newText);
		$('.page-title').addClass('title-28')
    }
    if (word.length > 10) {
        let newText = text.replace(word, '<div class="title-long">' + word + '</div>');
        
		$('.page-title').addClass('title-28')
    }
});
</script>
<?php get_footer();?>



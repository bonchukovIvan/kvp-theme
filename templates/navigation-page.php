<?php 
/**
 * Template Name: Navigation Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php get_header(); ?>

<?php kvp_get_preview(); ?> 

<div class="article-with-nav">
    <div class="container">
        <div class="article-with-nav__body">
            <div class="article-with-nav__grid">
				<div class="page-navigation">
					<div class="page-navigation__body">
						<div class="page-navigation__title">Навігація по сторінці</div>
						<div class="page-navigation__wrap">
							<ul id="navigation-list"></ul>
						</div>
					</div>
				</div>
				<?php get_template_part('template-parts/content/content-article'); ?>
            </div>
        </div>
    </div>
</div>
<script>

	let divs = $('div[id^="kvp_nav-mark--"]');

    $(document).ready(function() {
		$('.page-navigation').on('click', 'a', function(event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 800); 
			$('.page-navigation__item.active').removeClass('active');
			$('a[href^="'+$(this).attr('href')+'"]').children().toggleClass('active');
        });
        function createDivs() {

            let navigationList = $('#navigation-list');
            let count = 1;

            divs.each(function(index, div) {

                let anchor = $('<a>').attr('href', '#' + div.id);
                let listItem = $('<li>').text($(div).attr('title'));

                if (count === 1) {
                    listItem.addClass('page-navigation__item active');
                } else {
                    listItem.addClass('page-navigation__item');
                }

                anchor.append(listItem);
                navigationList.append(anchor);

				count++;
            });
        }
        createDivs();	
    });
</script>
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
jQuery(document).ready(function() {
    /* 
     * last-news
     */
    var last_news_slides_per_page = 3;
    setup_slick_count(last_news_slides_per_page, '.last-news__track', '#last-news__current-page', '#last-news__summary-page')
    jQuery('.last-news__track').slick({
        arrows: false,
        slidesToShow: last_news_slides_per_page,
        slidesToScroll: 3,
        dots: true,
        lazyLoad: 'progressive' ,
        infinite: false,
        appendDots: $('.last-news__switcher'),
        customPaging : function(slider, i) {
            return ' <button type="button" aria-label="switch 2" class></button>';
        },
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                },
            },
            {
                breakpoint: 979,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
            },
        ]
    }); 
    set_slick_arrows('#last-news__ln-right', '#last-news__ln-left', '.last-news__track');
    /* 
     * collab
     */
    var collab_slides_per_page = 6;
    setup_slick_count(collab_slides_per_page, '.collab__track', '#collab__current-page', '#collab__summary-page')
    jQuery('.collab__track').slick({
        arrows: false,
        slidesToShow: collab_slides_per_page,
        slidesToScroll: 6,
        dots: true,
        lazyLoad: 'progressive' ,
        infinite: false,
        appendDots: $('.collab__switcher'),
        customPaging : function(slider, i) {
            return ' <button type="button" aria-label="switch 2" class></button>';
        },
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1360,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                },
            },
            {
                breakpoint: 979,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                },
            },
        ]
    }); 
    set_slick_arrows('#collab__ln-right', '#collab__ln-left', '.collab__track');
    /* 
     * related-news
     */
    var related_news_slides_per_page = 3;
    setup_slick_count(related_news_slides_per_page , '.related-news__track', '#last-news__current-page', '#last-news__summary-page')
    jQuery('.related-news__track').slick({
        arrows: false,
        slidesToShow: related_news_slides_per_page,
        slidesToScroll: 3,
        dots: true,
        lazyLoad: 'progressive',
        adaptiveHeight: true,
        infinite: false,
        appendDots: $('.last-news__switcher'),
        customPaging : function(slider, i) {
            return ' <button type="button" aria-label="switch 2" class></button>';
        },
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 750,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ]
    }); 
    set_slick_arrows('#related-news__ln-right', '#related-news__ln-left', '.related-news__track');
});

function set_slick_arrows(right, left, track) {
    $(right).click(function() {
        $(track).slick('slickPrev');
    });
    $(left).click(function() {
        $(track).slick('slickNext');
    });
}
function setup_slick_count(slides_per_page, track, current_page, summary_page) {
    $(track).on("init", function(event, slick) { 
        $(track).css('opacity', 1);
        const slideCount = Math.ceil(slick.slideCount/slides_per_page);
        $(summary_page).text("0"+slideCount);
        $(current_page).text('01');
    });
    $(track).on("beforeChange", function(event, slick, currentSlide, nextSlide) {    
        const current = "0"+(Math.ceil((nextSlide + 1)/slides_per_page))
        $(current_page).text(current);
    });
}


jQuery(document).ready(function() {
    var slides_per_page = 3;
    $(".last-news__track").on("init", function(event, slick) { 
        const slideCount = Math.trunc(slick.slideCount/slides_per_page);

        $('.summary-page').text("0"+slideCount);
        $('.current-page').text('01');
    }) ;
    jQuery('.last-news__track').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        lazyLoad: true,
        appendDots: $('.last-news__switcher'),
        customPaging : function(slider, i) {
            return ' <button type="button" aria-label="switch 2" class></button>';
        },
        adaptiveHeight: true
    }); 
    
    $('#ln-right').click(function(){
        $('.last-news__track').slick('slickPrev');
    })
    $('#ln-left').click(function(){
        $('.last-news__track').slick('slickNext');
    })

    $(".last-news__track").on("beforeChange", function(event, slick, currentSlide, nextSlide) {    
        const current = "0"+(Math.ceil((nextSlide + 1) / slides_per_page))
        $('.current-page').text(current);
    }) ;
});
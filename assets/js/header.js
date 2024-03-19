$(window).resize(function() {
    if ($(window).width() <= 979) {
        $('body').removeClass("desktop");
    } 
    else if ($(window).width() > 979 && !$('body').hasClass("desktop")) {
        $('body').addClass("desktop");
    }
    });
    $(window).on('load', function() {
       if ($(window).width() < 979 && $('body').hasClass("desktop")) {
        $('body').removeClass("desktop");
    }
});
$(document).ready(function() {
    $('.burger').on('click', () => {
        console.log(1)
        $('.burger').toggleClass("open");
        $('.header-top__mobile-bottom').toggleClass("show");
    });
    $('.navbar__more-btn').on('click', () => {
        $('.navbar__more-btn').toggleClass("active");
        $('#navbar__bottom-mobile').toggleClass("active");
    });
    $('.navbar__arrow').click(function() {
        
    });
    $('#numbers_select_id').change(function() {
        var selectedNumber = $(this).val();

        $('#phone-action').attr('href', 'tel:' + selectedNumber);
    });
    $('#numbers_select_id').trigger('change');
})  
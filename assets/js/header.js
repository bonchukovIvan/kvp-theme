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
    })
    $(document).ready(function() {
        $('.navbar__more-btn').on('click', () => {
            $('.navbar__more-btn').toggleClass("active");
            $('#navbar__bottom-mobile').toggleClass("active");
        });
    })
    $(document).ready(function() {
        $('#navbar__li-arrow').click(function() {
            $(this).next().toggleClass('show');
            $(this).toggleClass('active');
        });
    });
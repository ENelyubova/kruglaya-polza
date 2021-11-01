$(document).ready(function () {
    /*Слайдер*/
    if($('div').hasClass('carouselSlider')){
        $('.carouselSlider').slick({
            fade: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true,
            focusOnSelect: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        autoplay: true,
                        arrows: false,
                    },
                },
            ]
        });
    }
    /*Мобильный слайдре*/
    if($('div').hasClass('mobileSlider')){
        $('.mobileSlider').slick({
            fade: false,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true,
            focusOnSelect: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 640,
                    settings: {
                        autoplay: true,
                        arrows: false,
                    },
                },
            ]
        });
    }
    /*Рецепты на главной*/
    if($('div').hasClass('recipes-slider')){
        $('.recipes-slider').slick({
            fade: false,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: false,
            focusOnSelect: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        autoplay: true,
                        adaptiveHeight: true,
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        autoplay: true,
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 400,
                    settings: {
                        autoplay: true,
                        slidesToShow: 1,
                    },
                },
            ]
        });
    }

    // thumb в модалке рецептов на главной
    carouselWork();
    
    // Товары в модалке
    if($('div').hasClass('product-category-carousel')){
        $('#product-category-carousel').slick({
            fade: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            // autoplay: true,
            // autoplaySpeed: 5000,
            adaptiveHeight: true,
            dots: false,
            arrows: true,
            appendArrows: '.product-modal-nav .arrows',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                    }
                },
            ]
        });
    }

    /*Товары - Поробуйте также*/
    if($('div').hasClass('product-slider')){
        $('.product-slider').slick({
            fade: false,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true,
            focusOnSelect: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        autoplay: true,
                        adaptiveHeight: true,
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                        autoplay: true,
                        slidesToShow: 2,
                    },
                },
                /*{
                    breakpoint: 400,
                    settings: {
                        arrows: false,
                        autoplay: true,
                        slidesToShow: 1,
                    },
                },*/
            ]
        });
    }
});

// thumb в модалке рецептов на главной
function carouselWork(){
    if($('div').hasClass('thumb-carousel')){
        $('.thumb-carousel').slick({
            fade: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        adaptiveHeight: true,
                    }
                }
            ]
        });
    }
}
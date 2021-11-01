$(document).ready(function () {
    if($('div').hasClass('js-scroll-product')){
        var element = $(".js-scroll-productView img");
        var height_el = element.offset().top;
        var element_stop = $(".scrollstop");
        var height_el_stop = element_stop.offset().top;
        
        $(".productView__img").css({
            "width": element.outerWidth(),
            "height": element.outerHeight()
        });
        
        $(window).scroll(function() {
            if ( $(window).width() > 1270 ) {

                if($(window).scrollTop() > height_el_stop - element.outerHeight() - 20) {
                    element.css({
                        "top": element.offset().top,
                        "left": element.offset().left
                    }).removeClass("fixed-image").addClass("absolute-image");
                
                } else {
                    if($(window).scrollTop() > height_el) {
                        element.addClass("fixed-image").removeClass("absolute-image").attr("style", "");
                    } else {
                        element.removeClass("fixed-image absolute-image").attr("style", "");
                    }
                }
            }
        });
    }
});
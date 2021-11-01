$(document).ready(function () {
   /*$(document).delegate('a[data-visi]', 'click', function(){
        var innerWidth = window.innerWidth;
        var id = $(this).data('visi');
        if($(this).hasClass('category-view-prev') || $(this).hasClass('category-view-back')){
            $('.category-view').removeClass('active');
            $(id).removeClass('no-active');
        } else{
            if($(id).hasClass('category-view')){
                $(id).find('img[data-lazyimg]').each(function(){
                    $(this).attr('src', $(this).data('lazyimg'))
                });
                if(innerWidth < 1000){
                    console.log(id);
                    $('#categoryViewModal .category-view').html($(id).html());
                    $('#categoryViewModal').addClass('active');
                } else{
                    $('.category-view').removeClass('active');
                    $('.category-section').addClass('no-active');
                    $(id).addClass('active');
                }

            } else{
                $('.back-after').addClass('active');
                $(id).find('img[data-lazyimg]').each(function(){
                    $(this).attr('src', $(this).data('lazyimg'))
                });
                if(innerWidth < 1000){
                    $('#categoryViewModal').removeClass('active');
                }
                $('#productModal .product-view').html($(id).html());
                $('#productModal').addClass('active');
            }
        }

        return false;
    });*/

    $(document).delegate('a[data-visi-pr]', 'click', function(){
        var innerWidth = window.innerWidth;
        var id = $(this).data('visi-pr');
        var cat = $(this).data('cat');
        $('.back-after').addClass('active');
        $(id).find('img[data-lazyimg]').each(function(){
            $(this).attr('src', $(this).data('lazyimg'))
        });
        if(innerWidth < 1000){
            $('#categoryViewModal').removeClass('active');
        }
        $('#productModal #product-category-carousel').html('');
        $('#productModal #product-category-carousel').html($(cat).html());
        

        $('#productModal').addClass('active');
        
        $('#product-category-carousel').slick('refresh').fadeIn(500);
        var ind = $('#product-category-carousel').find(id).parent().data('slick-index');
        $('#product-category-carousel').slick('slickGoTo', ind);
        setTimeout(function(){
            $('#productModal-loading').fadeOut(500);
        }, 1000);
        // $(cat).each(function(){

        // });
        return false;
    });

    $('.modal-product').on('click', function(e){   
        if($(e.target).hasClass('modal-product') || $(e.target).hasClass('modal-close') || $(e.target).parents('.modal-close').length > 0){
            $(".modal-product").removeClass('active');
            $('#productModal-loading').fadeIn(500);
            $('#product-category-carousel').slick('slickRemove', null, null, true);
            // $('#product-category-carousel').slick('destroy');
        }
    });
});
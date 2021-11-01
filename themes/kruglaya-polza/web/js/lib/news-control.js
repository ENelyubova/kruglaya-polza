$(document).ready(function () {
   /* showDropdownList();

    function showDropdownList(){
        // Получаю выбранное значение. В случае callback, возвращаю его
        drop.on('click', '.dropdown__list', function (){
            var parents = $(this).parents('.js-dropdown'),
            valField = parents.find('.dropdown__val'),
            currentVal = $(this).find('span').text();

            valField.text(currentVal);

            drop.removeClass('active');

            // if(callback !== null) callback($(this).find('span'));
        });
    }

    $('.dropdown__list').click(function (){
        showDropdownList(function (current){
            var input = current.attr('data-input'),
            value = current.attr('data-value');

            $(current).parents('form').find('input[name="'+input+'"]').val(value);

            // runReloadForm(current);
        });
    });

    //Открытие в модальном окне
    $(document).delegate('a[data-jsmodal]', 'click', function (e) {
        var content = $($(this).data('content')).html();
        var modal = $(this).data('jsmodal');

        $(modal).find('.modal-body').html(content);
        $(modal).modal('show');
        
         return false;
    });*/
});
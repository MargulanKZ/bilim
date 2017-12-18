$(function () {
    $('.test-data').find('div:first').show();
    $('.pagination a').on('click', function(){
        if( $(this).attr('class') == 'nav-active' ) return false;

        var link = $(this).attr('href'); // ссылка на текст вкладки для показа
        var prevActive = $('.pagination > a.nav-active').attr('href'); // ссылка на текст пока что активной вкладки

        $('.pagination > a.nav-active').removeClass('nav-active'); // удаляем класс активной ссылки
        $(this).addClass('nav-active'); // добавляем класс активной вкладки
        console.log(link);
        $(prevActive).fadeOut(100, function(){
            $(link).fadeIn(100);
        });

        return false;
    });


});

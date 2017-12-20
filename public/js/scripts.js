$(function () {
    $('.test-data').find('div:first').show();
    $('.pagination1 a').on('click', function () {
        if ($(this).attr('class') == 'nav-active') return false;

        var link = $(this).attr('href'); // ссылка на текст вкладки для показа
        var prevActive = $('.pagination1 > a.nav-active').attr('href'); // ссылка на текст пока что активной вкладки

        $('.pagination1 > a.nav-active').removeClass('nav-active'); // удаляем класс активной ссылки
        $(this).addClass('nav-active'); // добавляем класс активной вкладки
        console.log(link);
        $(prevActive).fadeOut(100, function () {
            $(link).fadeIn(100);
        });

        return false;
    });


});

function add() {
    var count = +$('#count').text();
    var name = "answer-"+count;
    if(count==4){
        alert("Вы можете добавлять только 4 ответа на 1 вопрос")
    }
    else{
        var template = "<br><input type=\"text\" name="+name+" required><br>";
        $('.question').append(template);
        count+=1;
        $("#count").text(count);
    }

}

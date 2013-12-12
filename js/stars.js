$(document).ready(function (){

    page = window.location.href;
    ip = '122';   //с помощью $.getJSON можем сделать запрос в пхп файл где будет распознаватся ай-пи, чтобы человек мог голосовать один раз только, но не успеваю реализовать
 
//в этом блоке мы будем считывать координаты курсора для определения какую оценку хочет поставить человек
//у нас есть следующие данные:
//Ширина звезды: 16px    
//Расстояние между звездами: 2px
//Исходя из них и из того в какой координате по x находится курсор, мы знаем сколько активных звезд показать
$('#rating').hover(function(){
$('#rating').mousemove(function(e){
   
    $('.rating-hover').stop(true);
    var offset = $(this).offset();
    dist = (e.pageX - offset.left);
    
    if(dist>0 && dist<=18){
        $('.rating-hover').animate({"width":"18px"}, 400);
    }
    if(dist>18 && dist<=36){
        $('.rating-hover').animate({"width":"36px"}, 400);
    }
    if(dist>36 && dist<=54){
        $('.rating-hover').animate({"width":"54px"}, 400);
    }
    if(dist>54 && dist<=72){
        $('.rating-hover').animate({"width":"72px"}, 400);
    }
    if(dist>72){
        $('.rating-hover').animate({"width":"88px"}, 400);
    }
});
}, function() {
        $('.rating-hover').animate({"width":"0px"}, 400);
});

//здесь происходит все тоже самое что и в предыдущем юлоке но только теперь мы фиксируем оценку
$('#rating').click(function(){
    $("#check-rate").toggleClass("rating-hover rating-active")
    $('#rating').css({"display":"none"});
    if(dist>0 && dist<=18){
        rate = 1;
        $('.rating-active').css({"width":"18px"});
    }
    if(dist>18 && dist<=36){
       rate = 2;
       $('.rating-active').css({"width":"36px"});
    }
    if(dist>36 && dist<=54){
       rate = 3;
       $('.rating-active').css({"width":"54px"});
    }
    if(dist>54 && dist<=72){
        rate = 4;
        $('.rating-active').css({"width":"72px"});
    }
    if(dist>72){
        rate = 5;
        $('.rating-active').css({"width":"88px"});
    }
    $('.status').html("Спасибо, Ваша оценка принята! Вы поставили "+rate);
//   Отправляем все нужные нам данные в пхп скрипт
    $.get("http://335251.sidorina.web.hosting-test.net/for-yandex/add.php", {rate:rate, page:page, ip:ip}, function(data,status){
        mas_info_add = data;  //Получаем массив данных которые он нам вернул а именно: "новый рейтинг" и "Новое кол-во людей проголосовавших" 
        list_add = mas_info_add.split(";");  // Разбиваем их и подставляем новые данные в контейнер "status"
        setTimeout(function() {
     $('.status').html('Средняя оценка: '+list_add[0]+' Всего проголосовало: '+list_add[1]);
        }, 3000);
    });
    
});
   
});



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "xhtml11.dtd">
<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251" />
    <TITLE>Рейтинг</TITLE>
    <link rel="stylesheet" href="/for-yandex/style.css" type="text/css" />
    <script src="/for-yandex/js/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script src="/for-yandex/js/stars.js" type="text/javascript"></script> 


</head>
<body>
<div class="wrap">
    <div class="all-cont">
        <div class="container" id="con1"> 
            <h2>Затестим</h2>
            <p>Lorem ipsum dolor sit amet, eu sea purto putent, mea facete adipiscing te, id has nobis menandri. In eos vide nullam omnesque, velit recteque repudiandae te pro. Sint aeterno sed id, purto inani principes vix ad, nostrud pericula ea quo. Ut sumo laudem vituperatoribus cum. Alienum copiosae duo ne.</p>
            <p>Saperet nominati gloriatur ad duo. Te mei minimum appareat. Phaedrum necessitatibus pri et, harum meliore reprimique usu id, sit meis appellantur philosophia at. Ex omittam deterruisset vituperatoribus vel. Cu natum persius accumsan duo, nec et porro eripuit.</p>
            <p>Modo liber assueverit nam an, duo errem simul cu. Omnium option lucilius cu vix, ad eam brute ullum conclusionemque. Cum id simul viris. Facilis mentitum urbanitas eos at, pro ex duis illud. Mel elitr vitae mollis et, ex commodo viderer feugait eam.</p>
            <p>Ut nominati mediocrem sea, cum solum tollit facilisis at. Mea meliore dissentias comprehensam te. Brute facilisis his ut. Mea omnes alienum in, admodum dissentiunt usu no, latine fabellas inciderint mei ex. Has augue albucius argumentum ne, vix duis appareat ne, inani postulant definiebas sit te.</p>
            <p>Eum habeo solum solet ex. Pri nonumy graece aliquid et. In qui saepe noster, est no populo oblique interesset. Sea clita detracto honestatis eu, no nisl scriptorem cum. At quo omnis rebum partiendo, quando quidam pro ei. Ne vix vide expetenda suscipiantur, facilis pertinax delicata ad sea.</p>
            <p>Ius cu utamur malorum, no solet vocent his, mei esse solum et. Vix no veniam liberavisse. Usu at modo interpretaris. Debitis torquatos complectitur per ut, sale eloquentiam ne has.</p>

            <div class="stars">
                <div class="rating"></div>                          <!--Подложка с неактивными звездами-->
                <div id="rating"></div>                             <!--Прозрачный контейнер для отслеживания движения мыши и событий-->
                <div id="check-rate" class="rating-hover"></div>    <!--Подложка с активными звездами-->
            </div>
            <div class="info">
            <?php
//            Конектимся к БД чтобы узнать рейтинг и кол-во голосов относительной текущей страницы
                $host ='sidorina.mysql.ukraine.com.ua';
                $user = 'sidorina_rating';
                $pswd = '97ma7jba';
                $database = 'sidorina_rating';
                $dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
                mysql_set_charset('utf8',$dbh);
                mysql_select_db($database) or die("Не могу подключиться к базе.");
                
                $current_page = 'http://335251.sidorina.web.hosting-test.net/for-yandex/';
//                Находим нужные нам данные
                $data_rating = mysql_query("select * from rating where `page`='$current_page';");
//                Заносим их в ассоциативный массив и подставляем в контейнер "status"
                $myrow_rating = mysql_fetch_array($data_rating);
            ?>
            <p class="status">Средняя оценка: <?php echo $myrow_rating[rate] ?> Всего проголосовало: <?php echo $myrow_rating[voices] ?></p>
            </div>

        </div>
    </div>
</div>
</body>
</html>
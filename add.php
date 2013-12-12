<?php
$host ='sidorina.mysql.ukraine.com.ua';
$user = 'sidorina_rating';
$pswd = '97ma7jba';
$database = 'sidorina_rating';
$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_set_charset('utf8',$dbh);
mysql_select_db($database) or die("Не могу подключиться к базе.");

//Здесь получаем данные которые прислал нам скрипт js
$rate = $_GET['rate']; 
$page = $_GET['page'];
$ip = $_GET['ip']; 

//заносим Лог о том с какого айпи была сделана оценка, для какой страницы, и собственно сама оценка
mysql_query("INSERT INTO `logs` (`ip`, `page`, `rate`) VALUES ('$ip', '$page', '$rate')");

//Далее вытаскиваем данные о рейтинге данной страницы
$data_rating = mysql_query("select * from rating where `page`='$page'; ");  
$myrow_rating = mysql_fetch_array($data_rating);

//Проверяем первая ли это оценка или нет

//Если первая то просто заносим новые данные:
    if ($myrow_rating[rate] == 0){
        mysql_query("UPDATE `rating` SET `rate`='$rate', `voices`='1' WHERE `page`='$page'; ");    
    }else{
//Если же нет высчитываем новую среднюю оценку и увеличиваем кол-во голосов на 1 
        $new_voices =  $myrow_rating[voices]+1;
        $new_rating = round((($myrow_rating[rate]*$myrow_rating[voices])+$rate)/$new_voices,1); 
//Обновляем данные
        mysql_query("UPDATE `rating` SET `rate`='$new_rating', `voices`='$new_voices' WHERE `page`='$page'; "); 
        echo $new_rating.";".$new_voices; 
    }
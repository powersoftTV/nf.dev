<?php
    $db_host='localhost';
	$db_user='root';
	$db_pass='123456';
	$db_name='nf.dev';

//    $db_host='db603114527.db.1and1.com';
//    $db_user='dbo603114527';
//    $db_pass='Power2015!!';
//    $db_name='db603114527';


    $cookie_exp = time()+60*40; //40min
    $admin_email="markareno@gmail.com";

    define('TIMEZONE', 'Asia/Yerevan');

    $languages=array('en','ru','hy','fr','ka');
    $lang_titles=array(
        'en'=>'!!!_English_!!!',
        'ru'=>'!!!_Russian_!!!',
        'hy'=>'!!!_Armenian_!!!',
        'fr'=>'!!!_French_!!!',
        'ka'=>'!!!_Georgian_!!!',
    );
    $front_languages=array('en','ru','hy');

    $debug=true;
    $yandex_translate_key='trnsl.1.1.20160717T173741Z.90dc9f75eafb4a84.b1384295557cd6b54fbd89da5fabf0cd4cbe261b';
    $VERSION=1.04;
    
?>
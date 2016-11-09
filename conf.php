<?php
    $db_host='localhost';
	$db_user='root';
	$db_pass='123456';
	$db_name='nf.dev';

/*	$db_host='localhost';
    $db_user='powersof_karen';
    $db_pass='Power2013!';
    $db_name='powersof_nf';*/


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
   $rr=true;
    $yandex_translate_key='trnsl.1.1.20160717T173741Z.90dc9f75eafb4a84.b1384295557cd6b54fbd89da5fabf0cd4cbe261b';
    $VERSION=1.08;
    
?>

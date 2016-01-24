<?php
    $db_host='localhost';
	$db_user='admin';
	$db_pass='123456';
	$db_name='nf';
    
    $cookie_exp = time()+60*20; //20min
    $admin_email="markareno@gmail.com";

    define('TIMEZONE', 'Asia/Yerevan');
    define('PROTOCOL', 'http://');
    define('DOMAIN', 'nf.dev');
    $root_folder="/";
    $_root="";
    
    $languages=array('en','ru','am');
    $lang='en';
    $act='home';
    

    $VERSION=1.00;
    
?>
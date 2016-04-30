<?php
	include_once 'conf.php';
    include_once 'lang.php';
	include_once 'functions.php';
    include_once 'start.php';
    include_once 'authenticate.php';
	$response="";
    reset($_GET);
    $get_name=key($_GET);
    if($get_name && $get_name!=""){
        $new_path=__DIR__.'/ajax/';
        include_once $new_path.$get_name.'.php';
    }
    echo $response;

	include_once 'end.php';
?>
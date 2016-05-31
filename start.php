<?php
    $_TITLE=$_LANG["company_name"][$lang];
	$_DESCRIPTION='';
	$_KEYWORDS='';
	$_CANONICAL='';
	$ADD_SCRIPTS=array();
    $_errors=array();

    header('Content-Type: text/html; charset=utf-8');
	/*--------------------DEFINE root follder ----------------------*/
    $root_folder=str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
    $root_folder=str_replace('ajax.php','',$root_folder);
    /*--------------------DEFINE protocol---------------------------*/
    if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
      $protocol = 'https://';
    }
    else {
      $protocol = 'http://';
    }
    define('PROTOCOL', 'http://');
    /*-------------------DEFINE domain-------------------------------*/
    define('DOMAIN', getHost());
    /*---------------------------------------------------------------*/
    global $MV;
	$MV=@mysqli_connect($db_host,$db_user,$db_pass);
	if(!$MV) $_errors[] = $_LANG['db_error'][$lang];
	if(!@mysqli_select_db($MV, $db_name))$_errors[] = $_LANG['db_error'][$lang];
	
	@mysqli_set_charset($MV,"utf8");
	@date_default_timezone_set(TIMEZONE);

	$now = new DateTime();
    $mins = $now->getOffset() / 60;
    $sgn = ($mins < 0 ? -1 : 1);
    $mins = abs($mins);
    $hrs = floor($mins / 60);
    $mins -= $hrs * 60;
    $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
	$query="SET time_zone = '".$offset."'";
	if(!@mysqli_query($MV,$query)){
		 $_errors[] = $_LANG['db_error'][$lang]; 
	}
    
    set_include_path(get_include_path(). PATH_SEPARATOR .$root_folder);
	spl_autoload_register(function ($class_name) {
        include_once "classes/".$class_name.'.php';
    });

    Registry::getInstance()->setDB($MV);
    Registry::getInstance()->setLang($languages);
    Registry::getInstance()->setFrontLang($front_languages);

?>
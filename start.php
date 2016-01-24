<?php
    $_TITLE=$_LANG["company_name"][$lang];
	$_DESCRIPTION='';
	$_KEYWORDS='';
	$_CANONICAL='';
	$ADD_SCRIPTS=array();
    $_errors=array();

    spl_autoload_register('my_autoloader');
	
    header('Content-Type: text/html; charset=utf-8');
	
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
	
	
?>
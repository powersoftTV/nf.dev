<?php
    if(isset($_routs[0]) && $_routs[0]!=""){
        $act = $_routs[0];
        if(file_exists('controllers/'.$_routs[0].'.php')){
		     include_once __DIR__.'/'.'controllers/'.$_routs[0].'.php';
	    }else{ 
            $_errors[]=$act.' !!!_not found !_!!!';
        }
	}
    else{
         $act='home';
         include_once __DIR__.'/'.'controllers/home.php' ;
    }

?>
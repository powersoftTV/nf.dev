<?php
    $_routs=array();

    if(!isset($debug)){
        $debug=false;
    }
    if(!isset($languages) || !count($languages)){
        $languages=array("en");
    }
    if(!isset($front_languages) || !count($front_languages)){
        $front_languages=array("en");
    }
    if(!isset($lang_titles) || !count($lang_titles)){
        $lang_titles=array("en"=>'!!!_English_!!!');
    }

    $lang=reset($languages);
    if(isset($_GET['routs'])){
       $_all_routs=array();    
       $_all_routs=explode('/',$_GET['routs']);
       foreach($_all_routs as $k=>$v){
           if($k==0 && in_array($v,$languages))$lang=$v;
           else $_routs[]=$v;
       }
       unset($_all_routs);
       
    }
    if(isset($_GET['lang']) && in_array($_GET['lang'],$languages)) {
        $lang = $_GET['lang'];
    }


?>

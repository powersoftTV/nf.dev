<?php
    $_routs=array();
    if(isset($_GET['routs'])){
       $_all_routs=array();    
       $_all_routs=explode('/',$_GET['routs']);
       foreach($_all_routs as $k=>$v){
           if($k==0 && in_array($v,$languages))$lang=$v;
           else $_routs[]=$v;
       }
       unset($_all_routs);
       
    }
    
?>

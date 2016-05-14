<?php
if(!$_user['user_id'] || !(in_array(1,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}
$category=new ManageProperties('category');

if(isset($_REQUEST['name'])){
    $name=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['name'])));
    $fr_lang="";
    if(isset($_REQUEST['fr_lang'])){
        $fr_lang=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['fr_lang'])));
    }
    $descr="";
    if(isset($_REQUEST['description'])){
        $descr=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['description'])));
    }
    $category->AddProperty($name,$descr,$_user['user_id'],0,$fr_lang);
}
var_export($category->ListProperties());


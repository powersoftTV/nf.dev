<?php
if(!$_user['user_id'] || !(in_array(1,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}

$category=new ManageProperties('category');
$f_lang=Registry::getInstance()->getFrontLang();
$fr_lang=$f_lang[0];
if(isset($_REQUEST['name'])){
    $name=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['name'])));
    if(isset($_REQUEST['fr_lang'])){
        $fr_lang=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['fr_lang'])));
    }
    $descr="";
    if(isset($_REQUEST['description'])){
        $descr=mysqli_real_escape_string($MV,htmlspecialchars(trim($_REQUEST['description'])));
    }
    $category->AddProperty($name,$fr_lang,$descr);
}
$categories= array();
$cat_lang=$f_lang[0];

foreach($category->ListProperties() as $k=>$v){
    if ($v['language'] && $v['language']) {
        $fr_lang = $v['language'];
    }
    if(in_array($fr_lang,$front_languages)) {
        foreach ($v as $key => $val) {
            if ($key == 'category') {
                $categories[$v['category_id']]['category'][$fr_lang] = $val;
            } elseif ($key == 'description') {
                $categories[$v['category_id']]['description'][$fr_lang] = $val;
            } elseif ($key == 'last_updated_date') {
                $categories[$v['category_id']]['last_updated_date'][$fr_lang] = $val;
            } elseif ($key == 'username') {
                $categories[$v['category_id']]['username'][$fr_lang] = $val;
            }
        }
    }
}
$total=count($categories);
$ADD_SCRIPTS[]="datatable/datatables.min.js";



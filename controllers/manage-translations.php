<?php
if(!$_user['user_id'] || !(in_array(4,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}
$all_words=ManageTranslations::getAllWords();
$is_complete=[];
foreach(Registry::getInstance()->getLang() as $v) {
    $is_complete[$v]=true;
    $translate = new Translate(Registry::getInstance()->getRootFolder(), $v);
    $file = $translate->translationFile();
    foreach($all_words as $val){
            if(!isset($file[$val])){
                $is_complete[$v]=false;
            }
    }
}


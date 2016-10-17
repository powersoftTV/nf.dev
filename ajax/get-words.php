<?php
if($_user['user_id'] && $is_show && isset($_GET['item']) && in_array($_GET['item'],Registry::getInstance()->getLang())) {
    $all_words=ManageTranslations::getAllWords();
    $translate = new Translate(Registry::getInstance()->getRootFolder(), $_GET['item']);
    $file = $translate->translationFile();
    foreach($all_words as $val){
        if(!isset($file[$val])){
            $file[$val]="";
        }
    }
    $response = json_encode($file);
}
?>
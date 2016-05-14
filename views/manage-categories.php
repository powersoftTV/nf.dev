<?php
if(!$_user['user_id'] || !(in_array(1,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}
include_once 'views/popups/new_category.php';
?>
<div class="container">
    <h1><?=$_LANG["categories"][$lang];?></h1>

    <div class="container">
        <div class="button_wrapper"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_category_popup"><?=$_LANG["new"][$lang]." ".$_LANG["category"][$lang];?></button></div>
    </div>
</div>
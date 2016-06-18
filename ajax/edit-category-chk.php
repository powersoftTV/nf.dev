<?php
if($_user['user_id'] && isset($_POST['data']) && $_POST['data']) {
    $cat_lng = false;
    $cat_name=false;
    $empty = false;
    $data = json_decode($_POST['data'], true);
	if(isset($data['lang']) && $data['lang']){
		$lang=$data['lang'];
	}
    if (isset($data['language'])) {
        $cat_lng = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['language'])));
    }
    if (isset($data['category'])) {
        $cat_name = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['category'])));
    }
    
    if ($cat_lng && $cat_name) {
        $category=new Categories();
        $cat=$category->ListProperties(array($cat_lng), array($cat_name));
        if($cat){
            $response = $_LANG["check_category"][$lang];
        }
    }
}
?>
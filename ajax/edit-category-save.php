<?php
if($_user['user_id'] && isset($_POST['data']) && $_POST['data']) {
    $cat_id = false;
    $cat_lng = false;
    $cat_name=false;
    $cat_description='';
    $empty = false;
    $data = json_decode($_POST['data'], true);
    if (isset($data['cat_lng'])) {
        $cat_lng = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['cat_lng'])));
    }
    if (isset($data['cat_id'])) {
        $cat_id = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['cat_id'])));
    }
    if (isset($data['category'])) {
        $cat_name = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['category'])));
    }
    if (isset($data['description'])) {
        $cat_description = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['description'])));
    }
    if ($cat_id && $cat_lng && $cat_name) {
        $category=new ManageProperties('category');
        $cat=$category->SetProperties($cat_lng, $cat_id, $cat_name, $cat_description);
        if($cat){
            $response = json_encode($cat_name);
        }
    }
}
?>
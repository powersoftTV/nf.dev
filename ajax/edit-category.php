<?php
if($_user['user_id'] && isset($_POST['data']) && $_POST['data']) {
    $cat_id = false;
    $cat_lng = false;
    $empty = false;
    $data = json_decode($_POST['data'], true);
    if (isset($data['cat_lng'])) {
        $cat_lng = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['cat_lng'])));
        $lng=show_lang($cat_lng,$data['lang'] );
    }
    if (isset($data['cat_id'])) {
        $cat_id = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['cat_id'])));
    }
    if ($cat_id && $cat_lng) {
        $category=new ManageProperties('category');
        $cat=array();
        $cat=$category->GetProperties($cat_lng, $cat_id);
        $cat['language']=$lng;
        $cat['lng']=$data['cat_lng'];
        $cat['id']=$data['cat_id'];
        $response = json_encode($cat);
    }
}
?>
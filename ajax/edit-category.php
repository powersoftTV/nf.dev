<?php
if($_user['user_id'] && isset($_POST['data']) && $_POST['data'] && $is_show) {
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
        $category=new Categories();
        $cat=array();
        $res=$category->ListProperties(array($cat_lng), array(), array($cat_id));
        if(isset($res[0])) {
            $cat=$res[0];
        }
        $cat['language']=$lng;
        $cat['lng']=$data['cat_lng'];
        $cat['id']=$data['cat_id'];
        $response = json_encode($cat);
    }
}
?>
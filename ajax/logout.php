<?php
if($is_show) {
    $empty = false;
    $data = base64_decode($_POST['data']);
    if (!isset($data) || $data == "") {
        $empty = true;
    }

    if (!$empty) {
        $tkn = mysqli_real_escape_string($MV, $data);
        $query = "DELETE FROM nf_users_tokens
                WHERE users_token='" . $tkn . "'
        ";
        @mysqli_query($MV, $query);
        // $response = $query;

    }
    //$response = base64_decode($_POST['data']);

}
?>
<?php
if($is_show) {
    $data = json_decode(base64_decode($_POST['data']), true);

    $data['get'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['get'])));
    $data['password'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['password'])));
    $data['confirm_pass'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['confirm_pass'])));

    $messages = array();

    if ($data['get'] != "") {
        $get_data = explode(DOMAIN, base64_decode($data['get']));
        $uid = "";
        $token = "";
        $date = "";
        if (isset($get_data[0]) && $get_data[0] != "") $uid = $get_data[0];
        if (isset($get_data[1]) && $get_data[1] != "") $token = $get_data[1];
        if (isset($get_data[2]) && $get_data[2] != "") $date = $get_data[2];
        $uid = mysqli_real_escape_string($MV, $uid);
        $token = mysqli_real_escape_string($MV, $token);
        $date = mysqli_real_escape_string($MV, $date);
        if ($uid != "" && $token != "" && $date != "") {

            $query = "
                SELECT
                     user_id,date,rec_pass_id
                FROM
                    nf_rec_pass
                WHERE
                    token='" . $token . "'
                    AND
                    date='" . $date . "'
                    AND
                    user_id='" . $uid . "'
                ";

            if ($res = @mysqli_query($MV, $query)) {
                if ($_res = @mysqli_fetch_assoc($res)) {
                    if ((strtotime($_res['date']) + 7200) >= time()) {

                        if ($data['password'] == "") {
                            $messages['#forgot-password'] = '!!!_Please enter your password._!!!';
                            $response = json_encode($messages);
                            return;
                        } elseif (strlen($data['password']) < 5) {
                            $messages['#forgot-password'] = '!!!_Password must be 5 or more characters._!!!';
                            $response = json_encode($messages);
                            return;
                        }

                        if ($data['password'] !== $data['confirm_pass']) {
                            $messages['#forgot-confirm-password'] = '!!!_Password does not match._!!!';
                            $response = json_encode($messages);
                            return;
                        }
                        $qyery = "
                            UPDATE nf_users
                            SET(
                                password='" . create_password($data['password']) . "'
                            )
                            WHERE user_id=" . $_res['user_id'] . "
                        ";
                        if (mysqli_query($MV, $query)) {
                            $query = "
                                DELETE FROM nf_rec_pass
                                WHERE user_id='" . $_res['user_id'] . "'
                            ";
                            if (mysqli_query($MV, $query)) {
                                $messages['success'] = '!!!_You have successfully changed your password._!!!';
                            } else $messages['error'] = '!!!_Error. Something goes wrong..._!!!';
                        } else {
                            $messages['error'] = '!!!_Error. Something goes wrong..._!!!';
                        }
                    } else $msg = '!!!_Sorry but your link has expired._!!!';
                } else {
                    $messages['error'] = '!!!_Error. Something goes wrong..._!!!';
                }
            } else {
                $messages['error'] = '!!!_DB Error_!!!';
            }

        } else {
            $messages['error'] = '!!!_Error. Something goes wrong..._!!!';
        }
    } else {
        $messages['error'] = '!!!_Error. Something goes wrong..._!!!';
    }
    $response = json_encode($messages);
}
?>

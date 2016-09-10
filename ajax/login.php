<?php
if($is_show) {
    $messages = array();
    $messages['error_login'] = "";
    $messages['error_password'] = "";
    $messages['error'] = "";
    $empty = false;

    $data = json_decode(base64_decode($_POST['data']), true);
    if (!isset($data['login']) || $data['login'] == "") {
        $messages['error_login'] = '!!!_Please enter your login._!!!';
        $empty = true;
    }
    if (!isset($data['password']) || $data['password'] == "") {
        $messages['error_password'] = '!!!_Please enter your password._!!!';
        $empty = true;
    }
    if (!$empty) {
        $login = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['login'])));
        $pass = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['password'])));

        $query = "SELECT u.user_id
            FROM nf_users u
            WHERE (u.email = '" . $login . "' OR u.username = '" . $login . "' OR u.phone = '" . $login . "')
            AND u.password = '" . create_password($pass) . "'
   ";
        if ($res = @mysqli_query($MV, $query)) {
            if ($_res = @mysqli_fetch_assoc($res)) {
                //user id
                $userid = $_res['user_id'];
                //generate token
                $users_token = create_token();
                $ua = getBrowser();
                $browser = $ua['name'] . "," . $ua['version'] . "," . $ua['platform'];

                $ip_address = get_ip();
                $query = "INSERT INTO nf_users_tokens(
                          users_token
                        , user_id
                        , start_time
                        , end_time
                        , last_activity
                        , ip_address
                        , browser
                    ) VALUES (
                        '" . $users_token . "'
                        , '" . $userid . "'
                        , NOW()
                        , '" . date('Y-m-d H:i:s', $cookie_exp) . "'
                        , NOW()
                        , '" . $ip_address . "'
                        , '" . $browser . "'
                        
                    )
                ";
                if (@mysqli_query($MV, $query)) {
                    setcookie("tkn", $users_token, $cookie_exp, '/', '.' . DOMAIN); //set cookie until cookie_expire
                } else {
                    $messages['error'] = '!!!_BD Error_!!!';
                }
            } else {
                $messages['error'] = '!!!_Invalid login or password._!!!';
            }
        } else {
            $messages['error'] = '!!!_BD Error_!!!';
        }
    }
    $response = json_encode($messages);

}
?>
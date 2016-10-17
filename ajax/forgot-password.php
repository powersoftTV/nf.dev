<?php
if($is_show) {
    $email = mysqli_real_escape_string($MV, htmlspecialchars(trim($_GET['forgot-password'])));

    $messages = array();

    if ($email == "") {
        $messages['error'] = '!!!_Please enter your email._!!!';
        $response = json_encode($messages);
        return;
    } elseif (!is_valid_email($email)) {
        $messages['error'] = '!!!_Invalid email address._!!!';
        $response = json_encode($messages);
        return;
    } else {
        $query = "SELECT user_id
            FROM nf_users
            WHERE email = '" . $email . "'
        ";
        if ($res = @mysqli_query($MV, $query)) {
            if ($_res = @mysqli_fetch_assoc($res)) {
                $token = create_token();
                $time = date("Y-m-d H:i:s");
                $uid = $_res['user_id'];
                $query = "
                    INSERT INTO
                        nf_rec_pass(
                             user_id
                            ,token
                            ,date
                        ) VALUES(
                             '" . $uid . "'
                            ,'" . $token . "'
                            ,'" . $time . "'
                        ) ON DUPLICATE KEY UPDATE    
                              token='" . $token . "'
                             ,date='" . $time . "'
                            
                ";
                if (!@mysqli_query($MV, $query)) {
                    $messages['error'] = '!!!_Sorry, You have entered wrong email._!!!';
                    $response = json_encode($messages);
                    return;
                }
            } else {
                $messages['error'] = '!!!_Sorry, You have entered wrong email._!!!';
                $response = json_encode($messages);
                return;
            }
        } else {
            $messages['error'] = '!!!_DB Error_!!!';
            $response = json_encode($messages);
            return;
        }
    }

    $conf_link = PROTOCOL . DOMAIN . $root_folder . $lang . "/forgot-password/?e=" . base64_encode($uid . DOMAIN . $token . DOMAIN . $time);
    $to = $email;
    $subject = '!!!_New Password_!!!';
    $message = "<html>
                    <head>
                        <title>" . $subject . "</title>
                    </head>
                    <body>
                        !!!_To create new password please click link below or copy this link  and paste it in your browser address field. _!!!<br><a href='" . $conf_link . "'>" . $conf_link . "</a><hr><br>
                        !!!_This link will be active only 2 hours._!!!<br>!!!_Don't reply to this message._!!!
                   </body>
                </html>";
    if (!my_send_mail($to, $subject, $message)) {
        $messages['error'] = '!!!_Send email Error._!!!';
        $response = json_encode($messages);
        return;
    }

    $messages['success'] = '!!!_You will receive an email with instructions for changing your password._!!!';
    $response = json_encode($messages);
}
?>
<?php
if($is_show) {
    $data = json_decode(base64_decode($_POST['data']), true);

    $data['email'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['email'])));
    $data['phone'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['phone'])));
    $data['username'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['username'])));
    $data['first_name'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['first_name'])));
    $data['last_name'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['last_name'])));
    $data['password'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['password'])));
    $data['confirm_pass'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['confirm_pass'])));
    $data['lang'] = mysqli_real_escape_string($MV, htmlspecialchars(trim($data['lang'])));

    $messages = array();

    if ($data['email'] == "") {
        $messages['#signup-email'] = '!!!_Please enter your email._!!!';
    } elseif (!is_valid_email($data['email'])) {
        $messages['#signup-email'] = '!!!_Invalid email address._!!!';
    } else {
        $query = "SELECT email
            FROM nf_users
            WHERE email = '" . $data['email'] . "'
            OR username = '" . $data['email'] . "'
            OR phone = '" . $data['email'] . "'
        ";
        if ($res = @mysqli_query($MV, $query)) {
            if (@mysqli_fetch_assoc($res)) {
                $messages['#signup-email'] = '!!!_This email is already registered._!!!';
            }
        } else {
            $messages['error'] = '!!!_DB Error_!!!';
            $response = json_encode($messages);
            return;
        }
    }

    if ($data['phone'] == "") {
        $messages['#signup-phone'] = '!!!_Please enter your phone._!!!';
    } elseif (!is_valid_phone($data['phone'])) {
        $messages['#signup-phone'] = '!!!_Invalid phone number._!!!';
    } else {
        $query = "SELECT phone
            FROM nf_users
            WHERE phone = '" . $data['phone'] . "'
            OR username = '" . $data['phone'] . "'
            OR email = '" . $data['phone'] . "'
        ";
        if ($res = @mysqli_query($MV, $query)) {
            if (@mysqli_fetch_assoc($res)) {
                $messages['#signup-phone'] = '!!!_This phone is already registered._!!!';
            }
        } else {
            $messages['error'] = '!!!_DB Error_!!!';
            $response = json_encode($messages);
            return;
        }
    }

    if ($data['username'] == "") {
        $messages['#signup-username'] = '!!!_Please enter your username._!!!';
    } elseif (is_valid_phone($data['username'])) {
        $messages['#signup-username'] = '!!!_Invalid username._!!!';
    } elseif (is_valid_email($data['username'])) {
        $messages['#signup-username'] = '!!!_Invalid username._!!!';
    } else {
        $query = "SELECT username
            FROM nf_users
            WHERE username = '" . $data['username'] . "'
            OR email = '" . $data['username'] . "'
            OR phone = '" . $data['username'] . "'
        ";
        if ($res = @mysqli_query($MV, $query)) {
            if (@mysqli_fetch_assoc($res)) {
                $messages['#signup-username'] = '!!!_check_username_message_!!!';
            }
        } else {
            $messages['error'] = '!!!_DB Error_!!!';
            $response = json_encode($messages);
            return;
        }
    }

    if ($data['first_name'] == "") {
        $messages['#signup-first-name'] = '!!!_Please enter your first name._!!!';
    }

    if ($data['last_name'] == "") {
        $messages['#signup-last-name'] = '!!!_Please enter your last name._!!!';
    }

    if ($data['password'] == "") {
        $messages['#signup-password'] = '!!!_Please enter your password._!!!';
    } elseif (strlen($data['password']) < 5) {
        $messages['#signup-password'] = '!!!_Password must be 5 or more characters._!!!';
    }

    if ($data['password'] !== $data['confirm_pass']) {
        $messages['#signup_confirm_password'] = '!!!_Password does not match._!!!';
    }

    if (count($messages)) {
        $response = json_encode($messages);
        return;
    }
    $query = "INSERT INTO nf_users(
                      email
                    , phone
                    , password
                    , username
                    , first_name
                    , last_name
                    , lang
                   
                ) VALUES (
                      '" . $data['email'] . "'
                    , '" . $data['phone'] . "'
                    , '" . create_password($data['password']) . "'
                    , '" . $data['username'] . "'
                    , '" . $data['first_name'] . "'
                    , '" . $data['last_name'] . "'
                    , '" . $data['lang'] . "'
                )
    ";
    if (!mysqli_query($MV, $query)) {
        $messages['error'] = '!!!_DB Error_!!!';
        $response = json_encode($messages);
        return;
    }
    $to = $admin_email;
    $subject = "New user: " . $data['first_name'] . " " . $data['last_name'];
    $message = "<html>
                    <head>
                        <title>New user: " . $data['first_name'] . " " . $data['last_name'] . "</title>
                    </head>
                    <body>
                        Name: " . $data['first_name'] . " " . $data['last_name'] . "<br>
                        Username: " . $data['username'] . "<br>
                        Email: " . $data['email'] . "<br>
                        Phone: " . $data['phone'] . "<br>
                        Please add user to the system.<hr><br>
                        Don't reply to this message.
                   </body>
                </html>";
    if (!my_send_mail($to, $subject, $message)) {
        $messages['error'] = '!!!_Send email Error._!!!';
        $response = json_encode($messages);
        return;
    }
    $conf_link = PROTOCOL . DOMAIN . $root_folder . $data['lang'] . "/email-confirmation/?e=" . base64_encode($data['email'] . DOMAIN . create_password($data['password']));
    $to = $data['email'];
    $subject = "!!!_Dear_!!! " . $data['first_name'] . " " . $data['last_name'];
    $message = "<html>
                    <head>
                        <title>" . $subject . "</title>
                    </head>
                    <body>
                        !!!_Your registration request has been successfully submitted. We will review your request and soon you will receive your registration confirmation email. Please confirm your email address clicking  link below or copy this link  and paste it in your browser address field. _!!!<br><a href='" . $conf_link . "'>" . $conf_link . "</a><hr><br>
                        !!!_Don't reply to this message._!!!
                   </body>
                </html>";
    if (!my_send_mail($to, $subject, $message)) {
        $messages['error'] = '!!!_Send email Error._!!!';
        $response = json_encode($messages);
        return;
    }

    $messages['success'] = '!!!_Your registration request has been successfully submitted. You will recieve an email._!!!';
    $response = json_encode($messages);
}
?>
<?php

    $data =  json_decode(base64_decode($_POST['data']),true);
  
    $data['email']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['email'])));
    $data['phone']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['phone'])));
    $data['username']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['username'])));
    $data['first_name']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['first_name'])));
    $data['last_name']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['last_name'])));
    $data['password']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['password'])));
    $data['confirm_pass']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['confirm_pass'])));

    $messages=array();
    
    if($data['email']==""){
        $messages['#signup-email']=$_LANG['empty_email'][$lang];
    }
    elseif(!is_valid_email($data['email'])){
        $messages['#signup-email']=$_LANG['invalid_email'][$lang];
    }
    else{
        $query="SELECT email
            FROM nf_users
            WHERE email = '".$data['email']."'
            OR username = '".$data['email']."'
            OR phone = '".$data['email']."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $messages['#signup-email']=$_LANG["check_email_message"][$lang];
            }
        }
        else{
            $messages['error']=$_LANG['db_error'][$lang];
            $response = json_encode($messages);  
            return;
        }
    }

    if($data['phone']==""){
        $messages['#signup-phone']=$_LANG['empty_phone'][$lang];
    }
    elseif(!is_valid_phone($data['phone'])){
        $messages['#signup-phone']=$_LANG['invalid_phone'][$lang];
    }
    else{
        $query="SELECT phone
            FROM nf_users
            WHERE phone = '".$data['phone']."'
            OR username = '".$data['phone']."'
            OR email = '".$data['phone']."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $messages['#signup-phone']=$_LANG["check_phone_message"][$lang];
            }
        }
        else{
            $messages['error']=$_LANG['db_error'][$lang];
            $response = json_encode($messages);  
            return;
        }
    }

    if($data['username']==""){
        $messages['#signup-username']=$_LANG['empty_username'][$lang];
    }
    elseif(is_valid_phone($data['username'])){
        $messages['#signup-username']=$_LANG['invalid_username'][$lang];
    }
    elseif(is_valid_email($data['username'])){
        $messages['#signup-username']=$_LANG['invalid_username'][$lang];
    }
    else{
        $query="SELECT username
            FROM nf_users
            WHERE username = '".$data['username']."'
            OR email = '".$data['username']."'
            OR phone = '".$data['username']."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $messages['#signup-username']=$_LANG["check_username_message"][$lang];
            }
        }
        else{
            $messages['error']=$_LANG['db_error'][$lang];
            $response = json_encode($messages);  
            return;
        }
    }

    if($data['first_name']==""){
        $messages['#signup-first-name']=$_LANG['empty_first_name'][$lang];
    }

    if($data['last_name']==""){
        $messages['#signup-last-name']=$_LANG['empty_last_name'][$lang];
    }

    if($data['password']==""){
        $messages['#signup-password']=$_LANG['empty_password'][$lang];
    }
    elseif(strlen($data['password']) < 5){
        $messages['#signup-password']=$_LANG['password_must_be'][$lang];
    }

    if($data['password']!==$data['confirm_pass']){
        $messages['#signup_confirm_password']=$_LANG['password_not_match'][$lang];
    }

    if(count($messages)){
        $response = json_encode($messages);
        return;
    }
    $query="INSERT INTO nf_users(
                      email
                    , phone
                    , password
                    , username
                    , first_name
                    , last_name
                   
                ) VALUES (
                      '".$data['email']."'
                    , '".$data['phone']."'
                    , '".create_password($data['password'])."'
                    , '".$data['username']."'
                    , '".$data['first_name']."'
                    , '".$data['last_name']."'
                   
                )
    ";
    if(!mysqli_query($MV,$query)){
                $messages['error']=$_LANG['db_error'][$lang];
                $response = json_encode($messages);
                return;
    }
    $to = $admin_email;
    $subject = "New user: ".$data['first_name']." ".$data['last_name'];
    $message = "<html>
                    <head>
                        <title>New user: ".$data['first_name']." ".$data['last_name']."</title>
                    </head>
                    <body>
                        Name: ".$data['first_name']." ".$data['last_name']."<br>
                        Username: ".$data['username']."<br>
                        Email: ".$data['email']."<br>
                        Phone: ".$data['phone']."<br>
                        Please add user to the system.<hr><br>
                        Don't reply to this message.
                   </body>
                </html>";
    if(!my_send_mail($to, $subject, $message)){
        $messages['error']=$_LANG['send_mail_error'][$lang];
        $response = json_encode($messages);
        return;
    }
    $conf_link=PROTOCOL.DOMAIN.$root_folder.$lang."/email-confirmation/?e=".base64_encode($data['email'].DOMAIN.create_password($data['password']));
    $to = $data['email'];
    $subject = $_LANG['dear'][$lang]." ".$data['first_name']." ".$data['last_name'];
    $message = "<html>
                    <head>
                        <title>".$subject."</title>
                    </head>
                    <body>
                        ".$_LANG['conf_signup_email'][$lang]."<br><a href='".$conf_link."'>".$conf_link."</a><hr><br>
                        ".$_LANG['dont_reply'][$lang]."
                   </body>
                </html>";
    if(!my_send_mail($to, $subject, $message)){
        $messages['error']=$_LANG['send_mail_error'][$lang];
        $response = json_encode($messages);
        return;
    } 

    $messages['success']=$_LANG['signup_success_msg'][$lang];
    $response = json_encode($messages);

?>
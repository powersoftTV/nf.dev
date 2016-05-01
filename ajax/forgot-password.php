<?php
    
    $email=mysqli_real_escape_string($MV,htmlspecialchars(trim($_GET['forgot-password'])));
    $lang=mysqli_real_escape_string($MV,htmlspecialchars(trim($_GET['lang'])));

    $messages=array();
    
    if($email==""){
        $messages['error']=$_LANG['empty_email'][$lang];
        $response = json_encode($messages);
        return;
    }
    elseif(!is_valid_email($email)){
        $messages['error']=$_LANG['invalid_email'][$lang];
        $response = json_encode($messages);
        return;
    }
    else{
        $query="SELECT user_id
            FROM nf_users
            WHERE email = '".$email."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if($_res=@mysqli_fetch_assoc($res)){
                $token=create_token();
                $time=date("Y-m-d H:i:s");
                $uid=$_res['user_id'];
                $query="
                    INSERT INTO
                        nf_rec_pass(
                             user_id
                            ,token
                            ,date
                        ) VALUES(
                             '".$uid."'
                            ,'".$token."'
                            ,'".$time."'
                        ) ON DUPLICATE KEY UPDATE    
                              token='".$token."'
                             ,date='".$time."'
                            
                ";
                if(!@mysqli_query($MV,$query)){
                    $messages['error']=$_LANG["wrong_email_forgot_pass"][$lang];
                    $response = json_encode($messages);
                    return;
                }
            }
            else{
                $messages['error']=$_LANG["wrong_email_forgot_pass"][$lang];
                $response = json_encode($messages);
                return;
            }
        }
        else{
            $messages['error']=$_LANG['db_error'][$lang];
            $response = json_encode($messages);  
            return;
        }
    }

    $conf_link=PROTOCOL.DOMAIN.$root_folder.$lang."/forgot-password/?e=".base64_encode($uid.DOMAIN.$token.DOMAIN.$time);
    $to = $email;
    $subject = $_LANG['new_password'][$lang];
    $message = "<html>
                    <head>
                        <title>".$subject."</title>
                    </head>
                    <body>
                        ".$_LANG['forgot_password_email'][$lang]."<br><a href='".$conf_link."'>".$conf_link."</a><hr><br>
                        ".$_LANG['link_active_forgot_pass'][$lang]."<br>".$_LANG['dont_reply'][$lang]."
                   </body>
                </html>";
    if(!my_send_mail($to, $subject, $message)){
        $messages['error']=$_LANG['send_mail_error'][$lang];
        $response = json_encode($messages);
        return;
    } 

    $messages['success']=$_LANG['forgot_pass_success_msg'][$lang];
    $response = json_encode($messages);

?>
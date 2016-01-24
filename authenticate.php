<?php

    $user_id=false;
    if(isset($_COOKIE['tkn'])){
        //check if token is valid
        $ua=getBrowser();
        $browser= $ua['name'].",".$ua['version'].",".$ua['platform'];
        $ip_address=get_ip();
        $users_token=mysqli_real_escape_string($MV,$_COOKIE['tkn']);
        $query="SELECT 
                    user_id
                FROM nf_users_tokens
                WHERE users_token = '".$users_token."'
                AND end_time>=NOW()
                AND ip_address='".$ip_address."'
                AND browser='".$browser."'
        ";//echo $query;
        if($res=@mysqli_query($MV,$query)){
            if($_res=@mysqli_fetch_assoc($res)){
                $query="UPDATE
                           nf_users_tokens
                        SET
                            last_activity=NOW()
                            , end_time='".date('Y-m-d H:i:s',$cookie_exp)."'
                        WHERE
                            users_token='".$users_token."'
                ";
                if($res=@mysqli_query($MV,$query)){
                    $user_id = $_res['user_id'];
                    setcookie("tkn", $users_token, $cookie_exp,'/','.'.DOMAIN);
                }
                else $_errors[] = $_LANG['db_error'][$lang];
            }
        }
        else $_errors[] = $_LANG['db_error'][$lang];
    }
    
?>
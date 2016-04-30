<?php
    $_user=array();
    $_user['user_id']=false;
    $_user['username']="";
    $_user['group_name']="";
    if(isset($_COOKIE['tkn'])){
        //check if token is valid
        $ua=getBrowser();
        $browser= $ua['name'].",".$ua['version'].",".$ua['platform'];
        $ip_address=get_ip();
        $users_token=mysqli_real_escape_string($MV,$_COOKIE['tkn']);
        $query="SELECT 
                     ut.user_id
                    ,u.username
                    ,u.nf_group
                    ,g.group_name
                FROM nf_users_tokens ut
                LEFT JOIN nf_users u ON u.user_id=ut.user_id
                LEFT JOIN nf_users_groups g ON u.nf_group=g.group_id
                WHERE ut.users_token = '".$users_token."'
                AND ut.end_time>=NOW()
                AND ut.ip_address='".$ip_address."'
                AND ut.browser='".$browser."'
                
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
                    $_user['user_id'] = $_res['user_id'];
                    $_user['username']=$_res['username'];
                    $_user['group_name']=$_res['group_name'];
                    $query="SELECT
                                role_id
                            FROM
                                nf_users_groups_roles
                            WHERE
                                group_id=".$_res['nf_group']."
                    
                    ";
                    if($result=@mysqli_query($MV,$query)){
                        $_user['roles']=array();
                        while($_result=@mysqli_fetch_assoc($result)){
                            $_user['roles'][]=$_result['role_id'];
                        }
                        setcookie("tkn", $users_token, $cookie_exp,'/','.'.DOMAIN);
                    }
                    else $_errors[] = $_LANG['db_error'][$lang];
                }
                else $_errors[] = $_LANG['db_error'][$lang];
            }
        }
        else $_errors[] = $_LANG['db_error'][$lang];
    }
    
?>
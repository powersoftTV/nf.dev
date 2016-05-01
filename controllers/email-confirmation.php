<?php
if($_user['user_id']){
    header('Location: '.$root_folder.$lang);
}
    $msg=false;
    if(isset($_GET['e']) && $_GET['e']!=""){
        $data=explode(DOMAIN,base64_decode($_GET['e']));
        $email="";
        $pass="";
        if(isset($data[0]) && $data[0]!="")$email=$data[0];
        if(isset($data[1]) && $data[1]!="")$pass=$data[1];
        $email=mysqli_real_escape_string($MV,$email);
        $pass=mysqli_real_escape_string($MV,$pass);
        if($email!="" && $pass!=""){
            $query="
                SELECT
                     is_email_confirmed
                     ,user_id
                FROM
                    nf_users
                WHERE
                    email='".$email."'
                    AND
                    password='".$pass."'
            ";
            if($res=@mysqli_query($MV,$query)){
                if($_res=@mysqli_fetch_assoc($res)){
                    if($_res['is_email_confirmed']>0)$msg=$_LANG['email_already_confirmed'][$lang];
                    else {
                        $query="
                            UPDATE nf_users
                            SET is_email_confirmed=NOW()
                            WHERE user_id='".$_res['user_id']."'
                        ";
                        if(@mysqli_query($MV,$query)){
                            $msg=$_LANG['confirm_email_success'][$lang];
                        }
                    }
                }
            }
        }
    }
?>
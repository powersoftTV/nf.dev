<?php
if($_user['user_id']){
    header('Location: '.$root_folder.$lang);
}
   $msg=false;
   $forgot_user_id="";
    if(isset($_GET['e']) && $_GET['e']!=""){
        $data=explode(DOMAIN,base64_decode($_GET['e']));
        $uid="";
        $token="";
        $date="";
        if(isset($data[0]) && $data[0]!="")$uid=$data[0];
        if(isset($data[1]) && $data[1]!="")$token=$data[1];
        if(isset($data[2]) && $data[2]!="")$date=$data[2];
        $uid=mysqli_real_escape_string($MV,$uid);
        $token=mysqli_real_escape_string($MV,$token);
        $date=mysqli_real_escape_string($MV,$date);
        if($uid!="" && $token!="" && $date!=""){
            
                $query="
                SELECT
                     user_id, date
                FROM
                    nf_rec_pass
                WHERE
                    token='".$token."'
                    AND
                    date='".$date."'
                    AND
                    user_id='".$uid."'
                ";
                if($res=@mysqli_query($MV,$query)){
                    if($_res=@mysqli_fetch_assoc($res)){
                        if((strtotime($_res['date'])+7200)>=time()){
                            $forgot_user_id=$_res['user_id'];
                        }
                        else $msg=$_LANG['link_expired'][$lang];
                    }
                    else $msg=$_LANG['error'][$lang];
                }
                else $msg=$_LANG['error'][$lang];
            
        }
        else $msg=$_LANG['error'][$lang];
    }
    else $msg=$_LANG['error'][$lang];
?>
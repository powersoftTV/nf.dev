<?php
    $data =  json_decode(base64_decode($_POST['data']),true);
  
    $data['get']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['get'])));
    $data['password']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['password'])));
    $data['confirm_pass']=mysqli_real_escape_string($MV,htmlspecialchars(trim($data['confirm_pass'])));

    $messages=array();
    
    if($data['get']!=""){
        $get_data=explode(DOMAIN,base64_decode($data['get']));
        $uid="";
        $token="";
        $date="";
        if(isset($get_data[0]) && $get_data[0]!="")$uid=$get_data[0];
        if(isset($get_data[1]) && $get_data[1]!="")$token=$get_data[1];
        if(isset($get_data[2]) && $get_data[2]!="")$date=$get_data[2];
        $uid=mysqli_real_escape_string($MV,$uid);
        $token=mysqli_real_escape_string($MV,$token);
        $date=mysqli_real_escape_string($MV,$date);
        if($uid!="" && $token!="" && $date!=""){
            
                $query="
                SELECT
                     user_id,date,rec_pass_id
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
                         
                        if($data['password']==""){
                            $messages['#forgot-password']=$_LANG['empty_password'][$lang];
                            $response = json_encode($messages);  
                            return;
                        }
                        elseif(strlen($data['password']) < 5){
                            $messages['#forgot-password']=$_LANG['password_must_be'][$lang];
                            $response = json_encode($messages);  
                            return;
                        }

                        if($data['password']!==$data['confirm_pass']){
                            $messages['#forgot-confirm-password']=$_LANG['password_not_match'][$lang];
                            $response = json_encode($messages);  
                            return;
                        }
                        $qyery="
                            UPDATE nf_users
                            SET(
                                password='".create_password($data['password'])."'
                            )
                            WHERE user_id=".$_res['user_id']."
                        ";
                        if(mysqli_query($MV,$query)){
                            $query="
                                DELETE FROM nf_rec_pass
                                WHERE user_id='".$_res['user_id']."'
                            ";
                            if(mysqli_query($MV,$query)){
                                $messages['success']=$_LANG['change_pass_success'][$lang];
                            }
                            else $messages['error']=$_LANG['db_error'][$lang];
                        }
                        else{
                            $messages['error']=$_LANG['db_error'][$lang];
                        }
                      }
                      else $msg=$_LANG['link_expired'][$lang];  
                    }
                    else {
                        $messages['error']=$_LANG['error'][$lang];
                    }
                }
                else {
                        $messages['error']=$_LANG['db_error'][$lang];
                }
            
        }
        else {
               $messages['error']=$_LANG['error'][$lang];
            }
    }
    else {
            $messages['error']=$_LANG['error'][$lang];
    }
    $response = json_encode($messages);
                           
?>

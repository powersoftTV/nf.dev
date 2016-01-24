<?php
    
    if(isset($_GET['check_username'])){
        $query="SELECT username
            FROM nf_users
            WHERE username = '".mysqli_real_escape_string($MV,trim($_GET['check_username']))."'
            OR email = '".mysqli_real_escape_string($MV,trim($_GET['check_username']))."'
            OR phone = '".mysqli_real_escape_string($MV,trim($_GET['check_username']))."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $response = $_LANG["check_username_message"][$lang];
            }
        }
        
    }
    if(isset($_GET['check_email'])){
        $query="SELECT email
            FROM nf_users
            WHERE email = '".mysqli_real_escape_string($MV,trim($_GET['check_email']))."'
            OR username = '".mysqli_real_escape_string($MV,trim($_GET['check_email']))."'
            OR phone = '".mysqli_real_escape_string($MV,trim($_GET['check_email']))."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $response = $_LANG["check_email_message"][$lang];
            }
        }
        
    }
    if(isset($_GET['check_phone'])){
        $query="SELECT phone
            FROM nf_users
            WHERE phone = '".mysqli_real_escape_string($MV,trim($_GET['check_phone']))."'
            OR username = '".mysqli_real_escape_string($MV,trim($_GET['check_phone']))."'
            OR email = '".mysqli_real_escape_string($MV,trim($_GET['check_phone']))."'
        ";
        if($res=@mysqli_query($MV,$query)){
            if(@mysqli_fetch_assoc($res)){
                $response = $_LANG["check_phone_message"][$lang];
            }
        }
        
    }

?>
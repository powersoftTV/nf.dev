<?php
    if(isset($_GET['check_username'])){
        include($_root.'/ajax/on_check_field_exists.php');
	}elseif(isset($_GET['check_email'])){
        include($_root.'/ajax/check_field_exists.php');
	}elseif(isset($_GET['check_phone'])){
        include($_root.'/ajax/check_field_exists.php');
	}elseif(isset($_GET['get_message'])){
        include($_root.'/ajax/get_message.php');
	}elseif(isset($_GET['signup'])){
        include($_root.'/ajax/signup.php');
	}elseif(isset($_GET['forgot-password'])){
        include($_root.'/ajax/forgot-password.php');
	}elseif(isset($_GET['recovery-password'])){
        include($_root.'/ajax/recovery-password.php');
	}elseif(isset($_GET['login'])){
        include($_root.'/ajax/login.php');
	}
?>
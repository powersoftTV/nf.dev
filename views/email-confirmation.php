<div class="vertical_center">
    <div class="big_text">
<?php 
    if(!$msg)echo '!!!_Error. Something goes wrong..._!!!';
    else echo $msg;
?>
    </div>
    <div class="">
        <div class="alert alert-danger hidden" role="alert">
            <span></span>
        </div>
        <label for="login-email">!!!_Log In_!!!:</label><input autofocus type="text" class="form-control" id="login-email" placeholder="!!!_email, user name or phone_!!!"><br>
        <label for="login-password">!!!_Password_!!!:</label><input type="password" class="form-control" id="login-password" placeholder="!!!_5 or more characters_!!!">
        <div><a data-toggle="modal" data-target="#forgot-password-modal" href="#" id="login-forgot">!!!_Forgot Password?_!!!</a></div>
    </div>
    <div>
        <button type="button" class="btn btn-primary btn-lg login-btn on_enter">!!!_Log In_!!!</button>
    </div>
</div>
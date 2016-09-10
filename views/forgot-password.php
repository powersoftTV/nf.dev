<div class="vertical_center"> 
<?php
    if(!$msg){ ?>
        <div class="forgot_confirm_pass">
           <div class="">
                <div class="alert alert-danger hidden" role="alert">
                    <span></span>
                </div>

                <label for="forgot-password">!!!_New Password_!!!:</label><input autofocus type="password" class="form-control" id="forgot-password" placeholder="!!!_5 or more characters_!!!"><br>
                <label for="forgot-confirm-password">!!!_Confirm Password_!!!:</label><input type="password" class="form-control" id="forgot-confirm-password" placeholder="!!!_Confirm Password_!!!">
                <input type="hidden" id="get" value="<?php echo $_GET['e']; ?>">

           </div><br>
           <div>
              <button type="button" class="btn btn-primary btn-lg recovery_pass">!!!_Submit_!!!</button>
           </div>
        </div>
        <div class="hidden login_forgot">
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
        
<?php } 
      else{ ?>
        <div class="big_text text-center">
        <?php echo $msg; ?>
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

<?php } ?>

</div>
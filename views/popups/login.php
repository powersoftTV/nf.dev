<?php if($is_show) { ?>
<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">!!!_Log In_!!!</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>            
            <label for="login-email">!!!_User name_!!!:</label><input type="text" class="form-control" id="login-email" placeholder="!!!_Your Email_!!!"><br>
            <label for="login-password">!!!_Password_!!!:</label><input type="password" class="form-control" id="login-password" placeholder="!!!_5 or more characters_!!!"><br>
            <label for="login-forgot"></label><a href="#" id="login-forgot">!!!_Forgot Password_!!!</a>
            <br>
            <label for="sign_up"></label><a href="#" id="sign_up">!!!_Sign Up_!!!</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-lg login-btn on_enter">!!!_Log In_!!!</button>
        </div>
        
      </div>
    </div>
</div>
<?php } ?>
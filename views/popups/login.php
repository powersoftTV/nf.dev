<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?=$_LANG["log_in"][$lang]; ?></h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>            
            <label for="login-email"><?=$_LANG["user_name"][$lang]; ?>:</label><input type="text" class="form-control" id="login-email" placeholder="<?=$_LANG["email_placeholder"][$lang]; ?>"><br>
            <label for="login-password"><?=$_LANG["password"][$lang]; ?>:</label><input type="password" class="form-control" id="login-password" placeholder="<?=$_LANG["password_placeholder"][$lang]; ?>"><br>
            <label for="login-forgot"></label><a href="#" id="login-forgot"><?=$_LANG["forgot_password"][$lang]; ?></a>
            <br>
            <label for="sign_up"></label><a href="#" id="sign_up"><?=$_LANG["sign_up"][$lang]; ?></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-lg login-btn"><?=$_LANG["log_in"][$lang]; ?></button>
        </div>
        
      </div>
    </div>
</div>
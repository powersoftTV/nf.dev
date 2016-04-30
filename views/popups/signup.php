<div class="modal fade" id="sign-up-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?=$_LANG["sign_up"][$lang]; ?></h4>
        </div>
        <div class="modal-body main">
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>
            <form id="signup_form">
            <label class="required" for="signup-name"><?=$_LANG["user_name"][$lang]; ?>:</label><input autofocus required autocomplete="false" type="text" class="form-control" id="signup-username" placeholder="<?=$_LANG["user_name_placeholder"][$lang]; ?>"><br>
            <label class="required" for="signup-name"><?=$_LANG["first_name"][$lang]; ?>:</label><input required type="text" class="form-control" id="signup-first-name" placeholder="<?=$_LANG["first_name_placeholder"][$lang]; ?>"><br>
            <label class="required" for="signup-name"><?=$_LANG["last_name"][$lang]; ?>:</label><input required type="text" class="form-control" id="signup-last-name" placeholder="<?=$_LANG["last_name_placeholder"][$lang]; ?>"><br>            
            <label class="required" for="signup-email"><?=$_LANG["email"][$lang]; ?>:</label><input required autocomplete="false" type="text" class="form-control" id="signup-email" placeholder="<?=$_LANG["email_placeholder"][$lang]; ?>"><br>
            <label class="required" for="signup-phone"><?=$_LANG["phone"][$lang]; ?>:</label><input required autocomplete="false" type="text" class="form-control" id="signup-phone" placeholder="<?=$_LANG["phone_placeholder"][$lang]; ?>"><br>
            <label class="required" for="signup-password"><?=$_LANG["password"][$lang]; ?>:</label><input required type="password" class="form-control" id="signup-password" placeholder="<?=$_LANG["password_placeholder"][$lang]; ?>"><br>
            <label class="required" for="signup_confirm_password"><?=$_LANG["confirm"][$lang]; ?>:</label><input required type="password" class="form-control" id="signup_confirm_password" placeholder="<?=$_LANG["confirm_placeholder"][$lang]; ?>">
             <br>
             </form>
        </div>
        <div class="modal-footer main">
            <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="<?=$_LANG["cancel"][$lang]; ?>">
            <button type="submit" class="btn btn-primary btn-lg sign-up-btn on_enter"><?=$_LANG["sign_up"][$lang]; ?></button>
        </div>
       <div class="information hidden">
           <div class="modal-body"></div>
           <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-lg info-btn"><?=$_LANG["close"][$lang]; ?></button>
           </div>    
       </div>
      </div>
    </div>
</div>
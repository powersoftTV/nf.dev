<?php if($is_show) { ?>
<div class="modal fade" id="sign-up-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">!!!_Sign Up_!!!</h4>
        </div>
        <div class="modal-body main">
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>
            <form id="signup_form">
            <label class="required" for="signup-name">!!!_User Name_!!!:</label><input autofocus required autocomplete="false" type="text" class="form-control" id="signup-username" placeholder="!!!_Your Username_!!!"><br>
            <label class="required" for="signup-name">!!!_First Name_!!!:</label><input required type="text" class="form-control" id="signup-first-name" placeholder="!!!_Your First Name_!!!"><br>
            <label class="required" for="signup-name">!!!_Last Name_!!!:</label><input required type="text" class="form-control" id="signup-last-name" placeholder="!!!_Your Last Name_!!!"><br>
            <label class="required" for="signup-email">!!!_Email_!!!:</label><input required autocomplete="false" type="text" class="form-control" id="signup-email" placeholder="!!!_Your Email_!!!"><br>
            <label class="required" for="signup-phone">!!!_Phone_!!!:</label><input required autocomplete="false" type="text" class="form-control" id="signup-phone" placeholder="!!!_Your Phone_!!!"><br>
            <label class="required" for="signup-password">!!!_Password_!!!:</label><input required type="password" class="form-control" id="signup-password" placeholder="!!!_5 or more characters_!!!"><br>
            <label class="required" for="signup_confirm_password">!!!_Confirm Password_!!!:</label><input required type="password" class="form-control" id="signup_confirm_password" placeholder="!!!_Confirm Password_!!!">
             <br>
             </form>
        </div>
        <div class="modal-footer main">
            <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="!!!_Cancel_!!!">
            <button type="submit" class="btn btn-primary btn-lg sign-up-btn on_enter">!!!_Sign Up_!!!</button>
        </div>
       <div class="information hidden">
           <div class="modal-body"></div>
           <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-lg info-btn">!!!_Close_!!!</button>
           </div>    
       </div>
      </div>
    </div>
</div>
<?php } ?>
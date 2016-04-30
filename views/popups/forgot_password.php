<div class="modal fade" id="forgot-password-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?=$_LANG["forgot_password_2"][$lang]; ?></h4>
        </div>
        <div class="modal-body forgot-main">
            <div class="alert alert-info" role="alert">
                <span><?=$_LANG["forgot_pass_message"][$lang]; ?></span> 
            </div>
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>
            <div>
                <input required type="text" class="form-control forgot-email" placeholder="<?=$_LANG["email_placeholder"][$lang]; ?>">
           </div>
        </div>
        <div class="modal-footer forgot-main">
            <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="<?=$_LANG["cancel"][$lang]; ?>">
            <input type="button" class="btn btn-primary btn-lg forgot-btn on_enter" value="<?=$_LANG["send"][$lang]; ?>">
        </div>
        <div class="modal-body forgot-add hidden">
            <div class="alert alert-info" role="alert">
                <span></span> 
            </div>
        </div>
        <div class="modal-footer forgot-add hidden">
            <input type="button" class="btn btn-primary btn-lg forgot-ok-btn" value="<?=$_LANG["ok"][$lang]; ?>">
        </div>  
      </div>
    </div>
</div>
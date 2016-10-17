<?php if($is_show) { ?>
<div class="modal fade" id="forgot-password-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">!!!_Forgot Password_!!!</h4>
        </div>
        <div class="modal-body forgot-main">
            <div class="alert alert-info" role="alert">
                <span>!!!_Enter the email address and we will send you instructions._!!!</span>
            </div>
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>
            <div>
                <input required type="text" class="form-control forgot-email" placeholder="!!!_Your email address_!!!">
           </div>
        </div>
        <div class="modal-footer forgot-main">
            <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="!!!_Cancel_!!!">
            <input type="button" class="btn btn-primary btn-lg forgot-btn on_enter" value="!!!_Send_!!!">
        </div>
        <div class="modal-body forgot-add hidden">
            <div class="alert alert-info" role="alert">
                <span></span> 
            </div>
        </div>
        <div class="modal-footer forgot-add hidden">
            <input type="button" class="btn btn-primary btn-lg forgot-ok-btn" value="!!!_OK_!!!">
        </div>  
      </div>
    </div>
</div>
<?php } ?>
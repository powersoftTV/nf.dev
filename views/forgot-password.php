<div class="vertical_center"> 
<?php
    if(!$msg){ ?>
        <div class="forgot_confirm_pass">
           <div class="">
                <div class="alert alert-danger hidden" role="alert">
                    <span></span>
                </div>

                <label for="forgot-password"><?=$_LANG["new"][$lang]." ".$_LANG["password"][$lang];?>:</label><input autofocus type="password" class="form-control" id="forgot-password" placeholder="<?=$_LANG["password_placeholder"][$lang];?>"><br>
                <label for="forgot-confirm-password"><?=$_LANG["confirm"][$lang];?>:</label><input type="password" class="form-control" id="forgot-confirm-password" placeholder="<?=$_LANG["confirm_placeholder"][$lang];?>">
                <input type="hidden" id="get" value="<?php echo $_GET['e']; ?>">

           </div><br>
           <div>
              <button type="button" class="btn btn-primary btn-lg recovery_pass"><?=$_LANG["submit"][$lang];?></button>
           </div>
        </div>
        <div class="hidden login_forgot">
            <div class="">
                <div class="alert alert-danger hidden" role="alert">
                    <span></span>
                </div>
                <label for="login-email"><?=$_LANG["login"][$lang];?>:</label><input autofocus type="text" class="form-control" id="login-email" placeholder="<?=$_LANG["un_em_ph_placeholder"][$lang];?>"><br>
                <label for="login-password"><?=$_LANG["password"][$lang];?>:</label><input type="password" class="form-control" id="login-password" placeholder="<?=$_LANG["password_placeholder"][$lang];?>">
                <div><a data-toggle="modal" data-target="#forgot-password-modal" href="#" id="login-forgot"><?=$_LANG["forgot_password"][$lang];?></a></div>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-lg login-btn on_enter"><?=$_LANG["log_in"][$lang];?></button>
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
              <label for="login-email"><?=$_LANG["login"][$lang];?>:</label><input autofocus type="text" class="form-control" id="login-email" placeholder="<?=$_LANG["un_em_ph_placeholder"][$lang];?>"><br>
              <label for="login-password"><?=$_LANG["password"][$lang];?>:</label><input type="password" class="form-control" id="login-password" placeholder="<?=$_LANG["password_placeholder"][$lang];?>">
              <div><a data-toggle="modal" data-target="#forgot-password-modal" href="#" id="login-forgot"><?=$_LANG["forgot_password"][$lang];?></a></div>
          </div>
          <div>
              <button type="button" class="btn btn-primary btn-lg login-btn on_enter"><?=$_LANG["log_in"][$lang];?></button>
          </div>

<?php } ?>

</div>
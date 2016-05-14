<?php 
    if(!$_user['user_id']){ ?>
        <div class="vertical_center"> 
        
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
    else{ 
        include_once 'views/popups/new_story.php'; ?>
        <div class="container">
            <div class="button_wrapper"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_story_popup"><?=$_LANG["new_story"][$lang];?></button></div>
        </div>
<?php   }  ?>
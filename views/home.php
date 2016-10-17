<?php 
    if(!$_user['user_id']){ ?>
        <div class="vertical_center"> 
            <div class="login_wrapper">
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
        </div>

<?php } 
    else{ 
        include_once 'views/popups/new_story.php'; ?>
        <div class="container">
            <div class="button_wrapper"><button type="button" class="btn btn-primary registered" data-toggle="modal" data-target="#new_story_popup">!!!_New Story_!!!</button></div>
        </div>
<?php   }  ?>
<?php
if(!$_user['user_id'] || !(in_array(2,$_user['roles']))  || !$is_show){
    header('Location: '.$root_folder.$lang);
}
?>
<div class="container">
    <h1>!!!_Users_!!!</h1>
</div>

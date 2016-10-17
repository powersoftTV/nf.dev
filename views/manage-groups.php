<?php
if(!$_user['user_id'] || !(in_array(3,$_user['roles'])) || !$is_show){
    header('Location: '.$root_folder.$lang);
}
?>
<div class="container">
    <h1>!!!_Groups_!!!</h1>
</div>
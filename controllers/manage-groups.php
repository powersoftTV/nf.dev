<?php
if(!$_user['user_id'] || !(in_array(3,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}

<?php
if(!$_user['user_id'] || !(in_array(2,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}

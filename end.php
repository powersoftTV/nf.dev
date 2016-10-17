<?php
    $page_content=ob_get_contents();
    ob_end_clean();
    $translate=new Translate($root_folder.'translations/', Registry::getInstance()->getLanguage());
    $newtext=$translate->t($page_content);
	echo $newtext;

     //   $translate->getWords($yandex_translate_key);

    if($MV) mysqli_close($MV);
?>
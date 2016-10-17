<?php
if(!$_user['user_id'] || !(in_array(4,$_user['roles']))  || !$is_show){
    header('Location: '.$root_folder.$lang);
}
?>
<div class="container">
    <h1>!!!_Translations_!!!</h1>
    <div>
        <div class="btn-group">
        <?php
            foreach(Registry::getInstance()->getLang() as $v){
                if($v=='en'){ ?>
                    <button disabled type="button" class="btn btn-success registered"><?php echo Registry::getInstance()->getLangTitle($v); ?></button>
                <?php }
                else{ ?>
                    <button data-language="<?php echo $v; ?>" type="button" class="lngbtn registered btn <?php if($is_complete[$v])echo "btn-success";else echo "btn-danger"; ?>">
                        <?php echo Registry::getInstance()->getLangTitle($v); ?>
                    </button>
                <?php }?>
        <?php } ?>
        </div>
        <div class="translations">

        </div>
        <button type="button" class="btn btn-primary registered">!!!_Save_!!!</button>
    </div>
</div>

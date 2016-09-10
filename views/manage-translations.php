<?php
if(!$_user['user_id'] || !(in_array(4,$_user['roles']))  || !$is_show){
    header('Location: '.$root_folder.$lang);
}
?>
<div class="container" ng-app="nv">
    <h1>!!!_Translations_!!!</h1>
    <div ng-controller='GetWords' >
        <div class="btn-group">
        <?php
            foreach(Registry::getInstance()->getLang() as $v){
                if($v=='en'){ ?>
                    <button disabled type="button" class="btn btn-success"><?php echo Registry::getInstance()->getLangTitle($v); ?></button>
                <?php }
                else{ ?>
                    <button ng-click="words.doClick('<?php echo $v; ?>')" type="button" class="btn <?php if($is_complete[$v])echo "btn-success";else echo "btn-danger"; ?>">
                        <?php echo Registry::getInstance()->getLangTitle($v); ?>
                    </button>
                <?php }?>
        <?php } ?>
        </div>
        <div class="translations">
            <ul>
                <li class="words_list" ng-repeat="(k,v) in words.response">
                    <div class="row">
                        <div class="col-sm-4">{{ k }}</div>
                        <div class="col-sm-4"><a href="">{{ v }}</a></div>
                    </div>
                </li>
            </ul>
        </div>
        <button type="button" class="btn btn-primary">!!!_Save_!!!</button>
    </div>
</div>

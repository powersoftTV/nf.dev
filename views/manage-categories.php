<?php
if(!$_user['user_id'] || !(in_array(1,$_user['roles']))){
    header('Location: '.$root_folder.$lang);
}
include_once 'views/popups/new_category.php';
include_once 'views/popups/edit_category.php';
?>
<div class="container">
    <h1><?=$_LANG["categories"][$lang];?> <span class="badge"><?php echo $total; ?></span></h1>

    <div class="container">
        <div class="button_wrapper"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_category_popup"><?=$_LANG["new"][$lang]." ".$_LANG["category"][$lang];?></button></div>
        <table id="cat_table"  class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <?php if(count($front_languages)>1){ ?>
            <tr class="info">
                <?php foreach($front_languages as $v){ ?>
                    <th><?php echo show_lang($v,$lang ); ?></th>
                <?php } ?>
            </tr>
            <?php } ?>
            </thead>
            <tbody>
            <?php  foreach($categories as $k=>$val){ ?>
                        <tr>
                            <?php foreach($front_languages as $v){ ?>
                                <td>
                                    <?php if(isset($val['category'][$v])){ ?>
                                        <a title="<?php echo $_LANG['edit_cat'][$lang] ?>" data-cat_id="<?php echo $k; ?>" data-cat_lng="<?php echo $v; ?>" data-toggle="modal"  href="#edit_category_popup">
                                            <?php echo $val['category'][$v]; ?>
                                        </a>
                                    <?php } else { ?>
                                        <a title="<?php echo $_LANG['add'][$lang] ?>" data-cat_id="<?php echo $k; ?>" data-cat_lng="<?php echo $v; ?>" data-toggle="modal" data-target="#edit_category_popup" href="#"><span class="glyphicon glyphicon-plus"></span></a>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        </tr>
            <?php } ?>

            </tbody>
        </table>



    </div>
</div>
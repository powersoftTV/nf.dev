<?php
if(!$_user['user_id'] || !(in_array(1,$_user['roles'])) || !$is_show){
    header('Location: '.$root_folder.$lang);
}
include_once 'views/popups/new_category.php';
include_once 'views/popups/edit_category.php';
?>
<div class="container page">
    <div class="container">
        <h1>!!!_Categories_!!! <span class="badge"><?php echo $total; ?></span></h1>
        <div class="button_wrapper"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_category_popup">!!!_New Category_!!!</button></div>
    </div>
        <table id="cat_table"  class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <?php if(count($front_languages)>1){ ?>
            <tr class="info">
                <?php foreach($front_languages as $v){ ?>
                    <th><?php echo $v; ?></th>
                <?php } ?>
                    <th class="hidden">!!!_Updated_!!!</th>
            </tr>
            <?php } ?>
            </thead>
            <tbody>
            <?php  foreach($categories as $k=>$val){ ?>
                        <tr>
                            <?php $datetime=0; ?>
                            <?php foreach($front_languages as $v){ ?>
                                <td>
                                    <?php if(isset($val['category'][$v])){ ?>
                                        <a next-title="!!!_Edit Category_!!!" title="!!!_Edit Category_!!!" data-cat_id="<?php echo $k; ?>" data-cat_lng="<?php echo $v; ?>" data-toggle="modal"  href="#edit_category_popup">
                                            <?php echo $val['category'][$v]; ?>
                                        </a>
                                        <?php
                                        if($val['last_updated_date'][$v]>$datetime){
                                            $datetime=$val['last_updated_date'][$v];
                                        }
                                        ?>
                                    <?php } else { ?>
                                        <a next-title="!!!_Edit Category_!!!" title="!!!_Add_!!!" data-cat_id="<?php echo $k; ?>" data-cat_lng="<?php echo $v; ?>" data-toggle="modal" href="#edit_category_popup"><span class="glyphicon glyphicon-plus"></span></a>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                            <td class="hidden">
                                <?php
                                echo date($datetime);
                                ?>
                            </td>
                        </tr>
            <?php } ?>

            </tbody>
        </table>




</div>
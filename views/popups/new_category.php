<div class="modal fade" id="new_category_popup" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?=$_LANG["new"][$lang]." ".$_LANG["category"][$lang];?></h4>
            </div>
            <form id="new_category_form" method="post" novalidate>
                <div class="modal-body main">

                    <div class="alert alert-danger hidden" role="alert">
                        <span></span>
                    </div>
                    <?php if(count($front_languages)>1){ ?>
                        <div class="lang_sel">
                            <label for="language"><?=$_LANG["language"][$lang]; ?>:</label>
                            <select class="selectpicker" name="fr_lang">
                                <?php foreach($front_languages as $v){ ?>
                                    <option value="<?php echo $v; ?>"><?php echo show_lang($v,$lang ); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <label class="required" for="story_title"><?=$_LANG["category"][$lang]; ?>:</label><input autofocus autocomplete="off" type="text" class="form-control cat_name" id="name" name="name">
					<div class="error"></div><br>
                    <label for="edit_story"><?=$_LANG["description"][$lang]; ?>:</label><textarea class="form-control" id="description" name="description"></textarea><br>

                </div>
                <div class="modal-footer main">
                    <input autocomplete="off" type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="<?=$_LANG["cancel"][$lang]; ?>">
                    <button type="submit" class="btn btn-primary btn-lg add_btn on_enter"><?=$_LANG["add"][$lang]; ?></button>
                </div>
            </form>
            <div class="information hidden">
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg info-btn"><?=$_LANG["close"][$lang]; ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
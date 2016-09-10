<?php if($is_show) { ?>
<div class="modal fade" id="edit_category_popup" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">!!!_Edit Category_!!!</h4>
            </div>
			<form id="edit_category_form" method="post" novalidate>	
                <div class="modal-body main">

                    <div class="alert alert-danger hidden" role="alert">
                        <span></span>
                    </div>
                    <?php if(count($front_languages)>1){ ?>
                        <div class="lang_sel">
                            <label for="language">!!!_Language_!!!:</label>
                            <span lng="" id="language"></span>
                        </div>
                    <?php } ?>
                    <label class="required" for="edit_name">!!!_Category_!!!:</label><input autofocus autocomplete="off" type="text" class="form-control cat_name" id="edit_name" name="edit_name">
                    <div class="error"></div><br>
                    <label for="edit_description">!!!_Description_!!!:</label><textarea class="form-control" id="edit_description" name="edit_description"></textarea><br>

                </div>
                <div class="modal-footer main">
                    <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="!!!_Cancel_!!!">
                    <button cat_id="" cat_name="" type="submit" class="btn btn-primary btn-lg edit_cat_btn on_enter">!!!_Save_!!!</button>
                </div>
			</form>
            <div class="information hidden">
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg info-btn">!!!_Close_!!!</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="modal fade" id="new_story_popup" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?=$_LANG["new_story"][$lang];?></h4>
        </div>
          <form id="new_story_form">
            <div class="modal-body main">

                <div class="alert alert-danger hidden" role="alert">
                    <span></span> 
                </div>
                <?php if(isset($front_languages) && count($front_languages)>1){ ?>
                        <label for="language"><?=$_LANG["language"][$lang]; ?>:</label>
                        <select class="selectpicker">
                            <?php foreach($front_languages as $v){ ?>
                                        <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                            <?php } ?>
                        </select><br> 
                <?php } ?>
                <?php 
                    $categories=new categories; 
                ?>
                <label class="required" for="story_title"><?=$_LANG["title"][$lang]; ?>:</label><input autofocus required autocomplete="true" type="text" class="form-control" id="story_title"><br>
                <label for="edit_story"><?=$_LANG["story"][$lang]; ?>:</label><textarea class="form-control" id="edit_story"></textarea><br>
                <label for="story_notes"><?=$_LANG["notes"][$lang]; ?>:</label><textarea class="form-control" id="story_notes"></textarea><br>
                
            </div>
            <div class="modal-footer main">
                <input type="button" class="btn btn-primary btn-lg" data-dismiss="modal" value="<?=$_LANG["cancel"][$lang]; ?>">
                <button type="submit" class="btn btn-primary btn-lg sign-up-btn on_enter"><?=$_LANG["save"][$lang]; ?></button>
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
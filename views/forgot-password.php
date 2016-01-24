<div class="vertical_center"> 
<?php
    if(!$msg){ ?>
        
        
        <div class="">
            <div class="alert alert-danger hidden" role="alert">
                <span></span> 
            </div>            
            
            <label for="forgot-password"><?=$_LANG["new"][$lang]." ".$_LANG["password"][$lang];?>:</label><input autofocus type="password" class="form-control" id="forgot-password" placeholder="<?=$_LANG["password_placeholder"][$lang];?>"><br>
            <label for="forgot-confirm-password"><?=$_LANG["confirm"][$lang];?>:</label><input type="password" class="form-control" id="forgot-confirm-password" placeholder="<?=$_LANG["confirm_placeholder"][$lang];?>">
            <input type="hidden" id="get" value="<?php echo $_GET['e']; ?>">
            
       </div><br>
        <div>
          <button type="button" class="btn btn-primary btn-lg recovery_pass"><?=$_LANG["submit"][$lang];?></button>
        </div>
        
<?php } 
      else{ ?>
        <div class="big_text">
        <?php echo $msg; ?>
        </div>
<?php } ?> 

</div>
<?php if($is_show_hf){ ?>
    </div>
    <div class="container">
            <footer>
                <p>&copy; 2016 <a href="http://powersoft.tv/">PowerSoft Labs</a></p>
            </footer>
    </div>
    <script type='text/javascript'>
        var lang='<?php echo $lang; ?>';
        var user_id='<?php echo $_user['user_id']; ?>';
        var ajax='<?php echo $root_folder.'ajax.php?'; ?>';
        var root_folder='<?php echo $root_folder; ?>';
    </script>
    <script src="<?=$root_folder?>views/scripts/jquery.min.js"></script>

<!--    <script src="--><?//=$root_folder?><!--views/scripts/bootstrap-datepicker.min.js"></script>-->
<?php if($_user['user_id'] && $act=='home'): ?>
    <script type="text/javascript" src="<?=$root_folder?>views/scripts/tinymce/tinymce.min.js" ></script>
<?php endif; ?>   

<?php 
    //additional page scripts
    foreach($ADD_SCRIPTS as $v){
        echo '<script type="text/javascript" src="'.$root_folder.'views/scripts/'.$v.'?'.$VERSION.'"></script>'; 
    } 
?>
<script src="<?=$root_folder?>views/scripts/bootstrap.min.js"></script>
<script src="<?=$root_folder?>views/scripts/bootstrap-select.min.js"></script>
<script src="<?=$root_folder?>views/scripts/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?=$root_folder?>views/scripts/script.js?<?php echo $VERSION; ?>" ></script>
<?php if( file_exists(__DIR__.'/scripts/'.$act.'.js') ): ?>
    <script type="text/javascript" src="<?=$root_folder?>views/scripts/<?php echo $act; ?>.js?<?php echo $VERSION; ?>" ></script>
<?php endif; ?>
</body>
</html>
<?php } ?>

    </div>
    <div class="container">
            <footer>
                <p>&copy; 2016 <a href="http://powersoft.tv/">PowerSoft Labs</a></p>
            </footer>
    </div>
    <script src="<?=$root_folder?>views/scripts/jquery.min.js"></script><?php //cdn <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> ?>
    <script src="<?=$root_folder?>views/scripts/bootstrap.min.js"></script><?php //cdn <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> ?>
    <script src="<?=$root_folder?>views/scripts/bootstrap-select.min.js"></script><?php //cdn <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> ?>
    <script src="<?=$root_folder?>views/scripts/bootstrap-datepicker.min.js"></script><?php //reference https://github.com/eternicode/bootstrap-datepicker 
    //consider date and time picker of http://eonasdan.github.io/bootstrap-datetimepicker/Installing/
?>
    <!--<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>-->

	<script type="text/javascript" src="<?=$root_folder?>views/scripts/script.js?<?php echo $VERSION; ?>" ></script>
<?php if( file_exists(__DIR__.'/scripts/'.$act.'.js') ): ?>
    <script type="text/javascript" src="<?=$root_folder?>views/scripts/<?php echo $act; ?>.js?<?php echo $VERSION; ?>" ></script>
<?php endif; ?>
<?php 
    //additional page scripts
    foreach($ADD_SCRIPTS as $v){
        echo '<script type="text/javascript" src="'.$root_folder.'views/scripts/'.$v.'?'.$VERSION.'"></script>'; 
    } 
?>

</body>
</html>

<?php 
    if(isset($lang)){
        include_once 'views/header.php';
	    if (count($_errors)==0){
            if (file_exists(__DIR__.'/'.$act.'.php')){
                include_once 'views/'.$act.'.php';
            }
        }
        else{
        ?>
            <div class="vertical_center">
                <div class="big_text">
                    <?php 
                    foreach($_errors as $v){
                        echo $v."<br>";
                    }
                    ?>
                </div>
            </div>
           
        <?php
        }
        include_once 'views/footer.php';
    }
?>
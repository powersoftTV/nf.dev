<?php
    $is_show=false;
    $is_show_hf=false;
    if(isset($lang)){
        $is_show_hf=true;
        include_once 'views/header.php';
	    if (count($_errors)==0){
            if (file_exists(__DIR__.'/'.$act.'.php')){
                $is_show=true;
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
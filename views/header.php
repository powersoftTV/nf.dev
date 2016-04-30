<!DOCTYPE html>
<html lang="<? echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title><?=$_TITLE ?></title>
    
    <link rel="stylesheet" type="text/css" href="<?=$root_folder?>views/css/bootstrap.min.css?<?php echo $VERSION; ?>"/><?php //reference http://getbootstrap.com/components/ ?>
    <link rel='stylesheet' type='text/css' href="<?=$root_folder?>views/css/bootstrap-select.min.css">
    <!--<link rel='stylesheet' type='text/css' href="<?=$root_folder?>views/css/bootstrap-datepicker.min.css">--><?php //reference https://github.com/eternicode/bootstrap-datepicker ?>
<?php 
        /*
            reference: http://silviomoreto.github.io/bootstrap-select/
            CDN: <link rel='stylesheet' type='text/css' href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css">
        */
?>
<link rel="stylesheet" type="text/css" href="<?=$root_folder?>views/css/style.css?<?php echo $VERSION; ?>"/>
<?php if( file_exists(__DIR__.'/css/'.$act.'.css') ): ?>
<?php //<!-- Here is the custom css file for that certain page --> ?>
<link rel="stylesheet" type="text/css" href="<?=$root_folder?>views/css/<?php echo $act; ?>.css?<?php echo $VERSION; ?>"/>
<?php endif; ?>


	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <img src="<?=$root_folder?>views/images/ajax-loader.gif" id="loading-indicator" style="display:none" >
    <?php if(!$_user['user_id']){
        include_once 'views/popups/signup.php';
        include_once 'views/popups/forgot_password.php';
    } ?>
    <nav id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <?php if($_user['user_id']){ ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php } 
                else{ ?>
                 <button data-toggle="modal" data-target="#sign-up-modal" type="button" class="btn btn-primary navbar-toggle"><span class="glyphicon glyphicon-user"></span> <?php echo $_LANG["sign_up"][$lang]; ?></button>
            <?php } ?>
            <a class="navbar-brand" href="<?=$_LANG["company_url"][$lang] ?>"><?=$_LANG["company_name"][$lang]  ?></a>
            <?php if($_user['user_id']){ ?>
            <button  type="button" class="btn btn-primary me_btn text-right"><div><span class="glyphicon glyphicon-user"></span> <?php echo $_user['username']; ?></div><small><?php echo $_user['group_name']; ?></small></button>
            <?php } ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php if($_user['user_id']){ ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if($act=='home') echo "active"; ?> text-center"><a href="<?php echo $root_folder.$lang."/"; ?>"><?php echo $_LANG["home"][$lang]; ?></a></li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(in_array(1,$_user['roles'])){ ?>
                            <li class="<?php if($act=='manage-categories') echo "active"; ?> text-center"><a href="<?php echo $root_folder.$lang."/manage-categories"; ?>"><?php echo $_LANG["manage_categories"][$lang]; ?></a></li>
                        <?php } ?>
                            <li class="text-center"><a class="logout" href="#"><?php echo $_LANG["log_out"][$lang]; ?></a></li>
                    </ul>
            </ul>
        </div>
        <?php } 
        else{ ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
             <ul class="nav navbar-nav navbar-right">
                <li><button data-toggle="modal" data-target="#sign-up-modal" type="button" class="btn btn-primary signup_btn"><span class="glyphicon glyphicon-user"></span> <?php echo $_LANG["sign_up"][$lang]; ?></button></li>
        
            </ul>
            </div>
        <?php
        }
        ?>
    </div>
    </nav>
      <div class="alerts hidden">
        <div class="alert-message warning">
            <a class="close" href="#">×</a>
            <div class="content"></div>
        </div>
      </div>
    <div class="container main">
    
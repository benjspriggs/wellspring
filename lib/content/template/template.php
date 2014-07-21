<?php
ob_start();
require_once(Config::get('root/lib').'checks/loggedin.php');
ob_flush();
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php echo $t->getName();?></title>
        <meta charset="utf-8">
        <base href="<?=Config::get('root_link/site')?>" />
        <link rel="stylesheet" type="text/css" href="<?=Config::get('root_link/content')?>css/normalize.css">    
        <?php
        foreach ($t->getCss() as $file => $name){
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"". Config::get('root_link/content') ."css/". $name .".css\">\n";
        }
        
        ?>
        <link rel="stylesheet" type="text/css" href="<?=Config::get('root_link/content')?>css/header.css">
        <!-- You're going to need a way for the search bar to be checked if it has any data in it -->
        <!-- Don't forget the meta tags, and Google Font API links! -->
        <!-- Link jquery/ external scripts here -->
        <!-- Favicon info, make sure to name the .ico file favicon.ico for IE6 peeps -->
    </head>
    
    <body>
        <div class="page">
            <?php include_once(Config::get('root/content').'incl/header.php');?>
            <div id="content">
                <?php $path = $t->getContent(); include_once(Config::get('root/content'). "$path");?>
            </div>
            <div id="sidebar">
                <?php include_once(Config::get('root/content').'incl/updates.php');?>
            </div>
            <div id="footer">
                <?php include_once(Config::get('root/content').'incl/footer.html');?>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="<?=Config::get('root_link/content')?>js/jquery-1.10.2.js"></script>
        <?php
        if ($t->getJs() != NULL){
            foreach ($t->getJs() as $file => $name){
                echo "<script type=\"text/javascript\" src=\"lib/content/js/". $name .".js\"></script>";
            }
        }
        ?>
</html>
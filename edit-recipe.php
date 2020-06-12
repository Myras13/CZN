<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("templates/head.php") ?>
    </head>

    <body>   
        <?php require_once('php/view/V_SessionNotifications.php');?>
        <div id="container">   
            <?php include("templates/logo.php") ?>
            <?php include("templates/topbar.php") ?>

            <?php require_once('php/view/V_EditRecipe.php');?>

            <div style="clear:both;"></div>
            <?php include("templates/footer.php") ?>

        </div>
        
    </body>
</html>
<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();
 
    if(!isset($_GET['delete']) && !isset($_GET['id']))
        $_SESSION['backroute'] = $_SERVER['REQUEST_URI'];
    
    $_SESSION['backrouteEdit'] = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("templates/head.php") ?>
    </head>

    <body>
        
        <div id="container">
            
            <?php include("templates/logo.php") ?>
            <?php include("templates/topbar.php") ?>

            <div id="content-recipe">
                <?php require_once('php/view/V_Page.php');?>
                <?php require_once('php/view/V_Pages.php');?>
            </div>
            <?php include("templates/footer.php") ?>

        </div>

        <?php require_once('php/view/V_SessionNotifications.php');?>

    </body>
</html>
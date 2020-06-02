<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();
 
    if(!isset($_GET['delete']))
        $_SESSION['backroute'] = $_SERVER['REQUEST_URI'];

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

            <div id="content-recipe">
                <?php require_once('php/view/V_Page.php');?>
                <?php require_once('php/view/V_Pages.php');?>
            </div>
            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
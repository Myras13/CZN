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

            <div id="recoveryForm">
                <?php require_once('php/view/V_RecoveryPassword.php');?>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
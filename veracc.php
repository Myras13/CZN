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
        <div id="container">
            
            <?php include("templates/logo.php") ?>
            <?php include("templates/topbar.php") ?>

            <div id="content_index">
                <?php require_once('php/view/V_VerificationAccount.php');?>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
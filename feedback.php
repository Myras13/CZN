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

            <div id="feedback">
                <form action="php/controller/C_FeedbackSend.php" method="post">
                    <?php require_once('php/view/V_FeedbackForm.php');?>
                </form>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
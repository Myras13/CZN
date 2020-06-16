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
                <a href="index.php"><button type="button" id="breakButton"> Spróbuj wrócić na główną stronę </button></a>
                <?php include("templates/footer.php") ?>
            </div>
    </body>
</html>
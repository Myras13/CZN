<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    $email = (isset($_SESSION["email"]))? $_SESSION["email"]: null;

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

                        <input name="nick" type="hidden" value="<?php if(isset($_SESSION['nick'])) echo $_SESSION['nick']; ?>" required/><br/><br/>

                        <label for="title">Tytuł</label><br/>
                        <input id="title" name="title" type="text" required/><br/><br/>

                        <label for="email">Email</label><br/>
                        <input id="email" name="email" type="email" value="<?php if($email != null) echo $email; ?>" required/><br/><br/>

                        <?php require_once('php/view/V_FeedbackOption.php');?><br/><br/>

                        <label for="message">Treść wiadomości</label><br/>
                        <textarea id="message" name="message" placeholder="Napisz wiadomość" required></textarea><br/>
                        <input type="submit" value="Wyślij wiadomość"/>
                </form>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
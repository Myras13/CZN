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

            <div id="content_account">

                <div class="panel_logowania_rejestracji_konta">
                    <span class="name">Oto Twoje obecne dane: </span>
                </div>

                <div class="panel_logowania_rejestracji_konta">
                    <span class="name">Zmień swoje dane: </span>
                    <form>
                        <br/>
                        <label for="change_username">Zmień nazwę użytkownika</label><br/>
                        <input id="change_username" name="change_username" type="text"/><br/><br/>

                        <label for="change_password">Zmień hasło</label><br/>
                        <input id="change_password" name="change_password" type="password"/><br/><br/>

                        <label for="change_password_repeat">Powtórz nowe hasło</label><br/>
                        <input id="change_password_repeat" name="change_password_repeat" type="password"/><br/><br/>

                        <label for="change_e-mail">e-mail</label><br/>
                        <input id="change_e-mail" name="change_e-mail" type="email"/><br/><br/>

                        <label for="change_date_of_birth">Zmień datę urodzenia</label><br/>
                        <input id="change_date_of_birth" name="change_date_of_birth" type="date"/><br/><br/>
                        
                        
                        <input type="checkbox" id="regulations" name="regulations_box" value="true" required/>
                        <label for="regulations"> Zapoznałem się z regulaminem strony</label><br/><br/>

                        <input type="submit" value="Zmień dane"/>
                    </form>
                </div>
                <div style="clear: both;"></div>

            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
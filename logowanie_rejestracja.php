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

            <div id="content_logowanie_rejestracja">
                    
                    <!--PANEL LOGOWANIA-->
                <div class="panel_logowania_rejestracji_konta">
                    <span class="name">Zaloguj się</span>
                    <form action="php/controller/C_LogIn.php" method="post">
                        <br/>
                        <label for="login_e-mail">E-mail</label><br/>
                        <input id="login_e-mail" name="login_e-mail" type="email" required/><br/><br/>

                        <label for="login_password">Hasło</label><br/>
                        <input id="login_password" name="login_password" type="password" required/><br/><br/>

                        <input type="submit" value="Zaloguj się"/> 

                        <br/><br/>
                        <span>Nie pamiętasz hasła ? </span>
                        <input type="button" name="zapomnialem" value="Przywróć hasło" onclick="showDiv()"/>
                    </form>

                    <script type="text/javascript"> 
                        function showDiv() {
                            var x = document.getElementById("recover-password");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } 
                                else {
                                    x.style.display = "none";
                                }
                            }
                    </script>

                    <!--PANEL ODZYSKIWANIA HASLA-->
                    <div id="recover-password" style="display:none;">
                        <span class="name">Odzyskiwanie hasła</span>
                        <form action="php/controller/C_RecoveryPassword.php" method="post">
                            <br/>
                            <label for="recovey-password-label-email">Podaj E-mail:</label><br/>
                            <input id="recovey-password-input-email" name="email" type="email" required/><br/><br/>                        
                            <input type="submit" value="Odzyskaj hasło"/>
                        </form>     
                        <br/><br/>
                    </div>
                </div>
                <!--PANEL REJESTRACJI-->
                <div class="panel_logowania_rejestracji_konta">
                    <span class="name">Zarejestruj się</span>
                    <form action="php/controller/C_RegUser.php" method="post">
                        <br/>
                        <label for="registration_username">Nazwa użytkownika</label><br/>
                        <input id="registration_username" name="registration_username" type="text" required/><br/><br/>

                        <label for="registration_password">Hasło</label><br/>
                        <input id="registration_password" name="registration_password" type="password" required/><br/><br/>

                        <label for="registration_password_repeat">Powtórz hasło</label><br/>
                        <input id="registration_password_repeat" name="registration_password_repeat" type="password" required/><br/><br/>

                        <label for="registration_e-mail">E-mail</label><br/>
                        <input id="registration_e-mail" name="registration_e-mail" type="email" required/><br/><br/>

                        <label for="registration_date_of_birth">Data urodzenia</label><br/>
                        <input id="registration_date_of_birth" name="registration_date_of_birth" type="date" required/><br/><br/>
                        
                        
                        <input type="checkbox" id="regulations" name="regulations_box" value="true" required/>
                        <label for="regulations"> Zapoznałem się z regulaminem strony</label><br/><br/>

                        <input type="submit" value="Zarejestruj się"/>
                    </form>

                </div>
                <div style="clear: both;"></div>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
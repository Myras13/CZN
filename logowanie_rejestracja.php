<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Coś z niczego</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap&subset=latin-ext" rel="stylesheet">
    </head>

    <body>
        <div id="container">
            <div id="logo">
                Coś z niczego!
            </div>

            <div id="topbar">
                <a href="index.php"><div class="option">Strona główna</div></a>
                <div class="option">Baza przepisów</div>
                <div class="option">O nas</div>
                <div class="option">Pasek wyszukiwania</div>
                <a href="logowanie_rejestracja.php"><div class="option">Konto</div></a>
                <div style="clear: both;"></div>
            </div>

            <div id="content_logowanie_rejestracja">
                    
                    <!--PANEL LOGOWANIA-->
                <div id="panel_logowania_rejestracji">
                    <span class="name">Zaloguj się</span>
                    <form>
                        <br/>
                        <label for="login_e-mail">e-mail</label><br/>
                        <input id="login_e-mail" name="login_e-mail" type="text"/><br/><br/>

                        <label for="login_password">Hasło</label><br/>
                        <input id="login_password" name="login_password" type="password"/><br/><br/>

                        <input type="submit" value="Zaloguj się"/>
                    </form>     
                    <br/><br/>
                </div>


                    <!--PANEL REJESTRACJI-->
                <div id="panel_logowania_rejestracji">
                    <span class="name">Zarejestruj się</span>
                    <form>
                        <br/>
                        <label for="registration_username">Nazwa użytkownika</label><br/>
                        <input id="registration_username" name="registration_username" type="text"/><br/><br/>

                        <label for="registration_password">Hasło</label><br/>
                        <input id="registration_password" name="registration_password" type="password"/><br/><br/>

                        <label for="registration_password_repeat">Powtórz hasło</label><br/>
                        <input id="registration_password_repeat" name="registration_password_repeat" type="password"/><br/><br/>

                        <label for="registration_e-mail">e-mail</label><br/>
                        <input id="registration_e-mail" name="registration_e-mail" type="text"/><br/><br/>

                        <label for="registration_date_of_birth">Data urodzenia</label><br/>
                        <input id="registration_date_of_birth" name="registration_date_of_birth" type="date"/><br/><br/>

                        <input type="submit" value="Zarejestruj się"/>
                    </form>

                </div>
                <div style="clear: both;"></div>
            </div>

            <div id="footer">
                Coś z niczego &copy; All rights reserved
            </div>





        </div>
    </body>
</html>
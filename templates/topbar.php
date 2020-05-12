<div id="topbar">
    <ol>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="#">Przepisy</a>
            <ul>
                <li><a href="#">Dania główne</a></li>
                <li><a href="#">Zupy</a></li>
                <li><a href="#">Desery i ciasta</a></li>
                <li><a href="#">Pieczywa</a></li>
                <li><a href="#">Lody</a></li>
                <li><a href="#">Napoje</a></li>
                <li><a href="#">Wege</a></li>
            </ul>
        </li>
        <li><a href="o_nas.php">O nas</a></li>
        <li><a href="#">Konto</a>
            <ul>
                <li><a href="logowanie_rejestracja.php">Zaloguj się / Zarejestruj</a></li>
                <li><a href="#">Wyloguj</a></li>
                <li><a href="account.php">Zmień dane</a></li>
            </ul>
        </li>  
    </ol>


<!--fajnie by było jakby opcja 'wyloguj' była dostępna tylko w momencie jak jesteś zalogowany-->

    <!--    <?php

        if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["LogInActive"])){
            echo "<a href='account.php'><div class='option'>Moje Konto</div></a>";   
            echo "<a href='php/controller/C_logOut.php'><div class='option'>Wyloguj</div></a>";
            echo "Witaj ".$_SESSION["nick"];
        }
        else{

            echo "<a href='logowanie_rejestracja.php'><div class='option'>Logowanie/Rejestracja</div></a>";

        }
        

    ?>-->
</div>
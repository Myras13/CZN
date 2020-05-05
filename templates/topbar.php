<div id="topbar">
    <a href="index.php"><div class="option">Strona główna</div></a>
    <div class="option">Baza przepisów</div>
    <div class="option">O nas</div>
    <div class="option">Pasek wyszukiwania</div>
    <?php

        if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["LogInActive"])){
            echo "<a href='account.php'><div class='option'>Moje Konto</div></a>";   
            echo "<a href='php/controller/C_logOut.php'><div class='option'>Wyloguj</div></a>";
            echo "Witaj ".$_SESSION["nick"];
        }
        else{

            echo "<a href='logowanie_rejestracja.php'><div class='option'>Logowanie/Rejestracja</div></a>";

        }
        

    ?>
    
    <div style="clear: both;"></div>
</div>
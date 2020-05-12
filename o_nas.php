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

            <div id="content_index">
                <span class="name">O nas</span>
                <br/>
                <p style="text-indent: 50px;">
                    Serwis ten powstaje w ramach projektu na przedmiot "Inżynieria oprogramowania". Tworzą go Michał Turbański, Michał Marciniak oraz Krzysztof Szymek. Jesteśmy studentami informatyki na drugim roku na Uniwersytecie Zielonogórskim. Prace nad projektem ruszyły w lutym 2020 roku i sukcesywnie serwis jest rozwijany o nowe funkcjonalności. Poprzeczkę postawiliśmy sobie dość wysoko, gdyż serwis obsługuje wiele ciekawych funkcjonalności. Pracujemy nad nim bardzo intensywnie ale sprawia nam to również sporo frajdy i daje dużo satysfakcji kiedy funkcjonalność nad którą pracujemy kilka tygodni ostatecznie wchodzi do użycia i spełnia swoje zadania. Dzięki temu projektowi znacznie rozwinęliśmy też swoje umiejętności w zakresie tworzenia stron internetowych.
                </p>
                
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
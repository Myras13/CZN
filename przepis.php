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

            <div id="content_przepisu">
                <div id="title_1">
                    Zapiekanka makaronowa
                </div>
                <div id="image">
                    <img src="images/zapiekanka_makaronowa.png" width="300"/>
                </div>

                <div id="components">
                    <span class="name">Składniki:</span>
                    <br/><br/>
                    makaron świderki 100 gramów<br/>
                    Rosół z kury Knorr 1 sztuka<br/>
                    filet z kurczaka 1 sztuka<br/>
                    cebula 1 sztuka<br/>
                    papryka 1 sztuka<br/>
                    pomidor 1 sztuka<br/>
                    przecier pomidorowy 2 łyżki<br/>
                    ząbek czosnku 1 sztuka<br/>
                    mozarella light 20 dekagramów<br/>
                    olej 4 łyżki<br/>
                    woda 1 szklanka
                </div>

                <div id="preparation">
                    <span class="name">Przygotowanie:</span>
                    <br/><br/>
                    Cebulę pokrój w piórka, czosnek przeciśnij przez praskę. Podsmaż je na oleju. Ugotuj makaron na sposób al dente. Warzywa pokrój w paski i wraz z kurczakiem dodaj do całości. Duś około 15 minut. Następnie podlej szklanką wody i dodaj kostkę Rosołu z kury Knorr oraz przecier pomidorowy. Makaron wyłóż do naczynia żaroodpornego, zalej sosem i posyp startym serem. Włóż do piekarnika nagrzanego do 180 stopni na 20 minut. Następnie podawaj.
                </div>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
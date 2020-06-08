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
                <span class="name">Co to za strona i jak się po niej poruszać?</span>
                <br/>
                <p>
                    Na stronie "Coś z niczego" możesz przeglądać przepisy według kilku kategorii w zakładce "Przepisy".
                </p>
                <p>
                    Możesz również zarejestrować się w zakładce konto -> zaloguj się/zarejestruj. Założenie konta da Ci możliwość dodawania własnych przepisów i komentowania przepisów innych.
                </p>
                <p>
                    W stopce znajduje się możliwość wysłania informacji zwrotnej, możecie zgłosić nam jakąś uwagę dzięki czemu macie wpływ na budowanie tego serwisu.
                </p>
                <p>
                    W zakładce "O nas" możesz również przeczytać o naszym projekcie i dowiedzieć się kilku rzeczy o osobach tworzących ten serwis.
                </p>
                <p>
                    Miłego korzystania! :)
                </p>
            </div>

            <div id="find_by_ingredients">
                <form>
                    <span class="ingredient_search">Wyszukiwanie po składnikach</span>
                        </br>
                    <label for="find_by_ingredients">Podaj składniki, które chcesz w swojej potrawie:</label><br/>
                    <table id="ingredients">      
                        <tr><td><input type="hidden" id="counter" value="1"></td></tr>
                        <tr>
                                <td><input type="text" id="components1" class="inputComponents"></td>
                                <td><input type="button" class="addButton" id="button1" value="+" onclick="addField();"></td>
                        </tr>
                    </table>
                    <input type="button" name="serach_by_ingredients" value="Szukaj"/>
                </form>
            </div>

            <div style="clear: both;"></div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
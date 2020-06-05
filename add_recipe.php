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

            <div id="content_add_recipe">
                <span class="name">Dodaj przepis</span>
                <br/>
                
                <form>
                    <br/>
                    <label for="name_of_recipe">Nazwa potrawy</label><br/>
                    <input id="name_of_recipe" name="name_of_recipe" type="text"/><br/><br/>

                    <label for="preparation">Przygotowanie</label><br/>
                    <textarea cols="50" rows="10"></textarea><br/><br/>

                    <!-- SKŁADNIK 1 -->
                    <label for="ingredient-1-1">Nazwa składnika</label>
                    <input id="ingredient-1-1" name="ingredient-1-1" type="text"/>
                    <label for="ingredient-1-2">Ilość</label>
                    <input id="ingredient-1-2" name="ingredient-1-2" type="text"/>
                    <label for="ingredient-1-3">Jednostka miary</label>
                    <input id="ingredient-1-3" name="ingredient-1-3" type="text"/><br/><br/>

                    <!-- SKŁADNIK 2 -->
                    <label for="ingredient-2-1">Nazwa składnika</label>
                    <input id="ingredient-2-1" name="ingredient-2-1" type="text"/>
                    <label for="ingredient-2-2">Ilość</label>
                    <input id="ingredient-2-2" name="ingredient-2-2" type="text"/>
                    <label for="ingredient-2-3">Jednostka miary</label>
                    <input id="ingredient-2-3" name="ingredient-2-3" type="text"/><br/><br/>

                    <!-- SKŁADNIK 3 -->
                    <label for="ingredient-3-1">Nazwa składnika</label>
                    <input id="ingredient-3-1" name="ingredient-3-1" type="text"/>
                    <label for="ingredient-3-2">Ilość</label>
                    <input id="ingredient-3-2" name="ingredient-3-2" type="text"/>
                    <label for="ingredient-3-3">Jednostka miary</label>
                    <input id="ingredient-3-3" name="ingredient-3-3" type="text"/><br/><br/>

                    <!-- SKŁADNIK 4 -->
                    <label for="ingredient-4-1">Nazwa składnika</label>
                    <input id="ingredient-4-1" name="ingredient-4-1" type="text"/>
                    <label for="ingredient-4-2">Ilość</label>
                    <input id="ingredient-4-2" name="ingredient-4-2" type="text"/>
                    <label for="ingredient-4-3">Jednostka miary</label>
                    <input id="ingredient-4-3" name="ingredient-4-3" type="text"/><br/><br/>

                    <!-- SKŁADNIK 5 -->
                    <label for="ingredient-5-1">Nazwa składnika</label>
                    <input id="ingredient-5-1" name="ingredient-5-1" type="text"/>
                    <label for="ingredient-5-2">Ilość</label>
                    <input id="ingredient-5-2" name="ingredient-5-2" type="text"/>
                    <label for="ingredient-5-3">Jednostka miary</label>
                    <input id="ingredient-5-3" name="ingredient-5-3" type="text"/>
                </form>
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
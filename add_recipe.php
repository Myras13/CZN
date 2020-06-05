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
                    <div style="width: 48%; float: left;">
                        <label for="name_of_recipe">Nazwa potrawy</label><br/>
                        <input id="name_of_recipe" name="name_of_recipe" type="text"/><br/><br/>

                        <label for="preparation">Przygotowanie</label><br/>
                        <textarea cols="50" rows="10"></textarea><br/><br/>
                    </div>
                    <div style="width: 52%; float: left; text-align: center">  
                        <h2>Składniki</h2>
                        <div style="width: 100%;">
                            <div style="width: 28%; float: left; margin-left: 14%;">
                                Nazwa składnika
                            </div>
                            <div style="width: 10%; float: left; margin-left: 6%;">
                                Ilość
                            </div>
                            <div style="width: 21%; float: left; margin-left: 8%;">
                                Typ jednostki
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div style="text-align: center">
                            <div style="width: 100%;">
                                <input id="ingredient-1-1" name="ingredient-1-1" type="text"/>
                                <input id="ingredient-1-2" name="ingredient-1-2" type="text" style="width: 10%;"/>
                                <input id="ingredient-1-3" name="ingredient-1-3" type="text" style="width: 30%;"/>
                            </div>
                            <div style="width: 100%;">
                                <!-- SKŁADNIK 2 -->
                                <input id="ingredient-2-1" name="ingredient-2-1" type="text"/>
                                <input id="ingredient-2-2" name="ingredient-2-2" type="text" style="width: 10%;"/>
                                <input id="ingredient-2-3" name="ingredient-2-3" type="text" style="width: 30%;"/>
                            </div>
                            <div style="width: 100%;">
                                <!-- SKŁADNIK 3 -->
                                <input id="ingredient-3-1" name="ingredient-3-1" type="text"/>
                                <input id="ingredient-3-2" name="ingredient-3-2" type="text" style="width: 10%;"/>
                                <input id="ingredient-3-3" name="ingredient-3-3" type="text" style="width: 30%;"/>
                            </div>
                            <div style="width: 100%;">
                                <!-- SKŁADNIK 4 -->
                                <input id="ingredient-4-1" name="ingredient-4-1" type="text"/>
                                <input id="ingredient-4-2" name="ingredient-4-2" type="text" style="width: 10%;"/>
                                <input id="ingredient-4-3" name="ingredient-4-3" type="text" style="width: 30%;"/>                            
                            </div>
                            <div style="width: 100%; padding-left: 3.1%;">
                                <input id="ingredient-5-1" name="ingredient-5-1" type="text"/>
                                <input id="ingredient-5-2" name="ingredient-5-2" type="text" style="width: 10%;"/>
                                <input id="ingredient-5-3" name="ingredient-5-3" type="text" style="width: 30%;"/>
                                <button id="add">+</button>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <input type="submit" value="Dodaj przepis"/>
                </form>
            </div>
            <div style="clear:both;"></div>
            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>
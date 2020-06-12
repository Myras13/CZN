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
                
                <form action="php/controller/C_AddRecipe.php" method="POST">
                    <div style="width: 48%; float: left;">
                        <label for="name_of_recipe">Nazwa potrawy</label><br/>
                        <input id="name_of_recipe" name="name_of_recipe" type="text"/><br/><br/>

                        <label for="preparation">Przygotowanie</label><br/>
                        <textarea name="text_of_recipe" cols="50" rows="10"></textarea><br/><br/>

                        <label for="preparation">Rodzaj przepisu</label><br/>
                        <?php require_once('php/view/V_TypeRecipeInAdd.php');?>

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
                            <table id="add_ingredients">      
                            <tr><td><input type="hidden" id="counter" value="1"></td></tr>
                                <tr>
                                    <td><input type="text" name="component-1" id="component" class="inputComponents"></td>
                                    <td><input type="text" name="quantity-1" id="quantity" class="inputQuantity"></td>
                                    <td><input type="text" name="measure-1" id="measure" class="inputMeasure"></td>
                                    <td><input type="button" class="addButton" id="button1" value="+" onclick="addField_v2();"></td>
                                </tr>
                            </table>
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
<?php
 
    if(session_status() == PHP_SESSION_NONE)
        session_start();

    require_once(dirname(__DIR__).'/controller/C_GetDataRecipe.php');
    require_once(dirname(__DIR__).'/controller/C_GetDataIngredients.php');

    $quantityBox = count($ingredientsRecipe);
    $_SESSION['backrouteUpdateRecipe'] = $_SERVER['REQUEST_URI'];

?>


<div id="content_add_recipe">
    <span class="name">Edytuj przepis</span>
    <br/>
    
    <form action="php/controller/C_EditRecipe.php" method="POST">

        <input name="id_recipe" type="hidden" value="<?php echo $recipe['id_recipe']?>"/><br/><br/>

        <div style="width: 48%; float: left;">
            <label for="name_of_recipe">Nazwa potrawy</label><br/>
            <input id="name_of_recipe" name="name_of_recipe" type="text" value="<?php echo $recipe['title'];?>"/><br/><br/>

            <label for="preparation">Przygotowanie</label><br/>
            <textarea name="text_of_recipe" cols="50" rows="10"><?php echo $recipe['content'];?></textarea><br/><br/>

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
                <tr><td><input type="hidden" id="counter" value="<?php echo $quantityBox; ?>"></td></tr>
                    
                <?php
                    for($i = 0; $i < $quantityBox; $i++):
                ?>
                    <input type="hidden" name="<?php echo "id-".($i+1)."";?>" value="<?php echo $ingredientsRecipe[$i]['id'];?>">

                    <tr>
                        <?php
                                foreach($ingredientsRecipe[$i] as $key => $value):
                                    if(is_string($key) && $key == "name"):
                        ?>
                                        <td><input type="text" name="<?php echo "component-".($i+1)."";?>" id="component" class="inputComponents" value="<?php echo $value;?>"></td>
                        
                                    <?php 
                                    endif;
                                    if(is_string($key) && $key == "quantity"):
                                    ?>

                                        <td><input type="text" name="<?php echo "quantity-".($i+1)."";?>" id="quantity" class="inputQuantity" value="<?php echo $value;?>"></td>
                        
                                    <?php endif;
                                    if(is_string($key) && $key == "type"):
                                    ?>   

                                        <td><input type="text" name="<?php echo "measure-".($i+1)."";?>" id="measure" class="inputMeasure" value="<?php echo $value;?>"></td>

                        <?php
                                    endif;
                                endforeach;
                                if($i == count($ingredientsRecipe)-1):
                        ?>

                                    <td><input type="button" class="addButton" id="<?php echo "button".$quantityBox.""?>" value="+" onclick="addField_v2();"></td>
                                <?php endif;?>
                    </tr>

                <?php
                    endfor;
                ?>    
                    
                </table>
            </div>
        </div>
        <div style="clear:both;"></div>
        <input type="submit" value="Edytuj przepis" style="margin-top: 10px;"/>
        <a href=<?php echo $_SESSION['backrouteEdit']?>><button type="button"> Anuluj </button></a>

    </form>
</div>
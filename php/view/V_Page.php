<?php

    require_once(dirname(__DIR__).'/controller/C_Page.php');

    $host  = $_SERVER['HTTP_HOST'];

    if(isset($_GET['id'])):
        if($dataRecipe == false){
           
            $alertInfo = new SessionNotifications('alert', 'Brak wyników',"Nie odnaleziono przepisu o takim identyfikatorze.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/recipe.php");
            return;
            
        }
?>
    <div id="content_przepisu">
        <div id="title_1">
            <?php echo $dataRecipe['title']?>
        </div>
        <div id="image">
            <img src=<?php echo $dataRecipe['photo_link']?> width="300" hight="300"/><br/>
            Autor: <?php echo $dataRecipe['nick']?> <br/>
            Data: <?php echo $dataRecipe['date']?>
        </div>

        <div id="components">
            <span class="name">Składniki:</span>
            <br/><br/>

            <?php  
                if($dataIngredients != false):
                    foreach($dataIngredients as $value):
            ?>

                <p> <?php echo $value['ingredient']?> </p>
                
            <?php  
                    endforeach;
                else:         
            ?>

                <p>Użytkownik nie podał składników</p>

            <?php  
                endif;         
            ?>

        </div>

        <div id="preparation">
            <span class="name">Przygotowanie:</span>
            <br/><br/>
            <div id="text-recipe">
                <p><?php echo $dataRecipe['content'] ?></p>
            </div>
        </div>

        <?php if(isset($_SESSION['nick']) && $dataRecipe['nick'] == $_SESSION['nick']):
        ?>

            <div class="user-modify-recipe">
                <a href="<?php echo 'http://'.$host.'/CZN/edit-recipe.php?id='.$dataRecipe['id'].''?>">Edytuj</a>
                <a href="<?php echo 'http://'.$host.'/CZN/recipe.php?delete='.$dataRecipe['id'].''?>" onclick="return confirm('Czy na pewno chcesz usunąć przepis ?');">Usuń</a>
            </div>

        <?php endif;
        ?>
    </div>
<?php
        return;
    endif;
?>
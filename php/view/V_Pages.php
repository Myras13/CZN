<?php

    require_once(dirname(__DIR__).'/controller/C_Pages.php');
    require_once(dirname(__DIR__).'/controller/C_DeletePage.php');
    require_once(dirname(__DIR__).'/function/isVarBetween.php');
    
    $host  = $_SERVER['HTTP_HOST'];

    if(isset($_GET['delete']))
        return;

    if(isset($_GET['id']))
        return;

    if(!isset($data) || $data == false):
        $alertInfo = new SessionNotifications('alert', 'Brak wyników',"Dotarłeś do miejsca, gdzie diabeł mówi dobranoc.");
        $alertInfo->create();
?>

    <h2>Ależ wieje...</h2>

<?php
        return;
    endif;
?>
<?php
    $max = sizeof($data);
    for ($i = 0; $i < $max; $i++):
?>
        
        <div class="box-recipe">
            <a href=<?php echo 'http://'.$host.'/CZN/recipe.php?id='.$data[$i]['id_recipe'].''?>>
            

            <div class="box-recipe-left">
                <div class="title-recipe">
                    <span><?php echo $data[$i]['title']; ?></span>
                </div>

                <div class="photo-recipe">
                    <img src=<?php echo $data[$i]['photo_link']; ?> alt="Tu powinno byc zdjęcia, ale nie ma..." width="200" height="200">
                </div>
            </div>

            <div class="box-recipe=right">
                <div class='content-recipe1'>
                    <p><?php echo $data[$i]['content']?></p>
                </div>

                <div class='user-recipe'>
                    <p>Dodano przez: <?php echo $data[$i]['nick']?></p>
                </div>

                <div class='date-recipe'>
                    <p>Data dodania: <?php echo $data[$i]['date']?></p>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div style="clear: both;"></div>
            </a>

            <?php if(isset($_SESSION['nick']) && $data[$i]['nick'] == $_SESSION['nick']):
            ?>

                <div class="user-modify-recipe">
                    <a href="<?php echo 'http://'.$host.'/CZN/edit-recipe.php?id='.$data[$i]['id_recipe'].''?>">Edytuj</a>
                    <a href=<?php echo 'http://'.$host.'/CZN/recipe.php?delete='.$data[$i]['id_recipe'].''?> onclick="return confirm('Czy na pewno chcesz usunąć przepis ?');">Usuń</a>
                </div>

            <?php endif;
            ?>

        </div>
        

<?php
        endfor;
?>


<!-- Stronicowanie -->
<div class="pagination">
<?php   
    if($paginator['page'] > 2): 
        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=1";
        else if(isset($_GET['search'])){

            $linkWeb = $linkWeb."?";
            foreach($_GET as $key=> $value){
                $linkWeb = $linkWeb.$key."=".$value."&";
            }
            $linkWeb = $linkWeb."page=1";

        }
        else
            $linkWeb = $linkWeb."?page=1";
?>
    <a href=<?php echo $linkWeb ?> class="paginator"> << Pierwsza strona </a>

<?php

    endif;
    for($i = 1; $i <= $paginator['allPages']; $i++):

        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=";
        
        else if(isset($_GET['search'])){

                $linkWeb = $linkWeb."?";
                foreach($_GET as $key=> $value){
                    $linkWeb = $linkWeb.$key."=".$value."&";
                }
                $linkWeb = $linkWeb."page=";
    
        }
        else
            $linkWeb = $linkWeb."?page=";

            $style = ($i == ($paginator['page'] + 1))? "present":"";
            if(isVarBetween($i, ($paginator['page'] - 3), ($paginator['page'] + 5))):
?>

        <a class="paginator <?php echo $style?>" href=<?php echo $linkWeb.$i; ?>> <?php echo $i; ?> </a>

<?php
        endif;
    endfor;

    if($paginator['page'] < ($paginator['allPages'] -1)):
        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=".$paginator['allPages']."";
        
        else if(isset($_GET['search'])){

                $linkWeb = $linkWeb."?";
                foreach($_GET as $key=> $value){
                    $linkWeb = $linkWeb.$key."=".$value."&";
                }
                $linkWeb = $linkWeb."page=".$paginator['allPages'];
    
        }
        else
            $linkWeb = $linkWeb."?page=".$paginator['allPages']."";
?>

    <a href=<?php echo $linkWeb ?> class="paginator">Ostatnia strona >></a>
    </div>
<?php
    endif;
?>
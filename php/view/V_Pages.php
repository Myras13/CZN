<?php

    require_once(dirname(__DIR__).'/controller/C_Pages.php');
    require_once(dirname(__DIR__).'/function/isVarBetween.php');

    $host  = $_SERVER['HTTP_HOST'];
    
    if($data == false){
        header("Location: http://$host/CZN/recipe.php");
        return;
    }

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
        </div>
        

<?php
        endfor;
?>


<!-- Stronicowanie -->
<?php   

    if($paginator['page'] > 4): 
        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=1";
        else
            $linkWeb = $linkWeb."?page=1";
?>
    <!-- Trzeba wystylizować -->
    <a href=<?php echo $linkWeb ?> > << Pierwsza strona </a>

<?php

    endif;
    for($i = 1; $i <= $paginator['allPages']; $i++):

        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=";
        else
            $linkWeb = $linkWeb."?page=";

        if(isVarBetween($i, ($paginator['page'] - 3), ($paginator['page'] + 5))):
?>
            
            <!-- Trzeba wystylizować -->
            <a class="paginator" href=<?php echo $linkWeb.$i; ?>> <?php echo $i; ?> </a> |

<?php
        endif;
    endfor;

    if($paginator['page'] < ($paginator['allPages'] -1)):
        $linkWeb = "http://$host/CZN/recipe.php";

        if(isset($_GET['category']))
            $linkWeb = $linkWeb."?category=".$_GET['category']."&page=".$paginator['allPages']."";
        else
            $linkWeb = $linkWeb."?page=".$paginator['allPages']."";
?>

    <!-- Trzeba wystylizować -->
    <a href=<?php echo $linkWeb ?> > Ostatnia strona >> </a>

<?php
    endif;
?>
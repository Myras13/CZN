<?php

    require_once(dirname(__DIR__).'/controller/C_AllPages.php');
    $host  = $_SERVER['HTTP_HOST'];
     
    if(!isset($_GET['type'])):
        $max = sizeof($data);
        for ($i = 0; $i < $max; $i++):
?>

        <div class="box-recipe">
            <a href=<?php echo 'http://'.$host.'/CZN/recipe.php?id='.$data[$i]['id_recipe'].''?>>
                <div class="photo">
                    <img src=<?php echo $data[$i]['photo_link']; ?> alt="Tu powinno byc zdjęcia, ale nie ma..." width="300" height="300">
                </div>
                <div class="title-recipe">
                    <span><?php echo $data[$i]['title']; ?></span>
                </div>
                <div class='content-recipe'>
                    <p><?php echo $data[$i]['content']?></p>
                </div>
                <div class='date-recipe'>
                    <p><?php echo $data[$i]['date']?></p>
                </div>
                <div class='user-recipe'>
                    <p><?php echo $data[$i]['nick']?></p>
                </div>
        </div>

<?php
        endfor;
    endif;
?>

    <li><a href="recipe.php">Wszystkie</a></li>

<?php
    require_once(dirname(__DIR__).'/controller/C_ShowTypeRecipe.php');
    $max = sizeof($routelink);
    for ($i = 0; $i < $max; $i++):
?>

    <li><a href=<?php echo "recipe.php?category=".$routelink[$i]['id']."" ?> > <?php echo $routelink[$i]['category'] ?> </a></li>

<?php

    endfor;

?>
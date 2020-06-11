<select name="type_recipe" id="type_recipe">

    <?php
        require_once(dirname(__DIR__).'/controller/C_ShowTypeRecipe.php');
        $max = sizeof($routelink);
        for ($i = 0; $i < $max; $i++):
    ?>

    <option value=<?php echo $routelink[$i]['id']."" ?>><?php echo $routelink[$i]['category'] ?></option>

    <?php
        endfor;
    ?>

</select>
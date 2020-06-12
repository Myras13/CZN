<select name="type_recipe" id="type_recipe">

    <?php
        require_once(dirname(__DIR__).'/controller/C_ShowTypeRecipe.php');
        $max = sizeof($routelink);
        for ($i = 0; $i < $max; $i++):
            if(isset($recipe['id_type'])):
    ?>

                <option value=<?php echo $routelink[$i]['id']."" ?> <?php if(isset($recipe['id_type']) && $recipe['id_type'] == $routelink[$i]['id']) echo "selected"; else ''; ?>><?php echo $routelink[$i]['category'] ?></option>

    <?php
            else:
    ?>
                <option value=<?php echo $routelink[$i]['id']."" ?>><?php echo $routelink[$i]['category'] ?></option>
    <?php

            endif;
        endfor;
    ?>

</select>
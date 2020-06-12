<?php

    require_once(dirname(__DIR__).'/model/M_GetDataIngredients.php');

    $id = (int)htmlspecialchars($_GET['id']);
    $ingredientsRecipe = new M_GetDataIngredients($id);
    $ingredientsRecipe = $ingredientsRecipe->getDataIngredients();

?>
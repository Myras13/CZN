<?php

    require_once(dirname(__DIR__).'/model/M_ShowTypeRecipe.php');

    $typeRecipe = new M_ShowTypeRecipe();
    $routelink =  $typeRecipe->getAllTypePages();

?>
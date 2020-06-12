<?php

    require_once(dirname(__DIR__).'/model/M_GetDataRecipe.php');

    if(!isset($_GET['id']) && intval($_GET['id'])){
        $alertInfo = new SessionNotifications('alert', 'Coś poszło nie tak',"Spróbuj jeszcze raz!");
        $alertInfo->create();            
        header("Location: ".$_SESSION['backrouteEdit']."");
        return;
    }

    $host  = $_SERVER['HTTP_HOST'];
    $id = (int)htmlspecialchars($_GET['id']);
    $recipe = new M_GetDataRecipe($id);
    $recipe->setUser($_SESSION['id']);

    if(!$recipe->checkID()){
        $alertInfo = new SessionNotifications('alert', 'Coś poszło nie tak',"Spróbuj jeszcze raz!");
        $alertInfo->create();            
        header("Location: http://$host/CZN/index.php");
        return;
    }

    $recipe = $recipe->getDataRecipe();

?>
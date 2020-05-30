<?php

    require_once(dirname(__DIR__).'/model/M_PageRecipe.php');

    $host  = $_SERVER['HTTP_HOST']; 
    $id = 0;

    if(isset($_GET['id'])){

        if(($id = intval($_GET['id'])) == 0 || $_GET['id'] <= 0){
           
            $alertInfo = new SessionNotifications('alert', 'Brak wyników',"Nie odnaleziono przepisu o takim identyfikatorze.");
            $alertInfo->create();            
            header("Location: http://$host/CZN");
            return;
            
        }
        
        $page = new M_PageRecipe();
        $dataRecipe = $page->getRecipe($id);
        $dataIngredients = $page->getIngredients($id);

    }

?>
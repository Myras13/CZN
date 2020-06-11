<?php

    require_once(dirname(__DIR__).'/model/M_PageRecipe.php');
    

    if(isset($_GET['delete']) && isset($_SESSION['LogInActive'])){
        
        $deletePage = new M_PageRecipe();
        $id = intval($_GET['delete']);
        $idUser = htmlspecialchars($_SESSION['id']);

        $host  = $_SERVER['HTTP_HOST'];
        $route = (isset($_SESSION['backroute']))? htmlspecialchars($_SESSION['backroute']): '//CZN/';

        if($deletePage->delete($id, $idUser)){
            
            $successInfo = new SessionNotifications('success', 'Operacja wykonana', "Przepis został usunięty.");
            $successInfo->create();            
            header("Location: http://".$host."".$route."");
        }
        else{
            $errorInfo = new SessionNotifications('error', 'Brak uprawnień', "Nie jesteś właścicielem przepisu, którego chcesz usunąć.");
            $errorInfo->create();            
            header("Location: http://$host/CZN/index.php");
        }

    }

?>
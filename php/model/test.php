<?php

    
    require_once('../class/Connect_Database.php');
    require_once('../config/config_connect.php');

    $pdo = new Connect_Database();

    try{

        $pdo->connect($database);

    }catch(PDOException $e){

        echo $e->getMessage();

    }
    finally{

        $pdo = $pdo->disconnect();

    }

    
    
    
    

?>
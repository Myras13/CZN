<?php

    require_once('../core/ConnectDatabase.php');
    require_once('../model/M_LogIn.php');    
    require_once('../config/config_connect.php');
    require_once('../class/SessionUser.php');

    if (!isset($_POST['login_e-mail']) && !isset($_POST['login_password'])){
        die("Error: Input doesn't exist");
    }
  
        try{

            $pdo = new ConnectDatabase();
            $pdo->connect($database);

        }catch(PDOException $e){

            die($e->getMessage());

        }

    $user = new M_LogIn($pdo, $_POST['login_e-mail'], $_POST['login_password']);
    
        try{

            $user->isRegistered();
            
            session_start();
            $handle = new SessionUser();
            $handle->create($user);

        }catch(NullAccountException $e){

            die($e->getMessage());

        }finally{

            $host  = $_SERVER['HTTP_HOST'];
            header("Location: http://$host/CZN");

        }


?>
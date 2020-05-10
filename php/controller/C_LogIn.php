<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php');
    require_once(dirname(__DIR__).'/model/M_LogIn.php');    
    require_once(dirname(__DIR__).'/config/config_connect.php');
    require_once(dirname(__DIR__).'/class/SessionUser.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $host  = $_SERVER['HTTP_HOST'];

    if (!isset($_POST['login_e-mail']) && !isset($_POST['login_password'])){

        $errorInfo = new SessionNotifications('error', 'Błąd krytyczny', "Nie wykryto wszystkich pól danych.");
        $errorInfo->create();            
        header("Location: http://$host/CZN/logowanie_rejestracja.php");

    }
  
        try{

            $pdo = new ConnectDatabase();
            $pdo->connect($database);

        }catch(PDOException $e){

            $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
            $errorInfo->create();            
            header("Location: http://$host/CZN");

        }

    $user = new M_LogIn($pdo, $_POST['login_e-mail'], $_POST['login_password']);
    
        try{

            $user->logIn();            
            session_start();
            $handle = new SessionUser($user);
            $handle->create();
            header("Location: http://$host/CZN/");
            
        }catch(NullAccountException $e){

            $errorInfo = new SessionNotifications('alert', 'Próba nie udana', $e->getMessage());
            $errorInfo->create();
            header("Location: http://$host/CZN/logowanie_rejestracja.php");

        }catch(ValidateDataUserException $r){

            $errorInfo = new SessionNotifications('info', 'Zweryfikuj swoje konto', $r->getMessage());
            $errorInfo->create();
            header("Location: http://$host/CZN/logowanie_rejestracja.php");

        }


?>
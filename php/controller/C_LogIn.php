<?php

    require_once(dirname(__DIR__).'/model/M_LogIn.php');    
    require_once(dirname(__DIR__).'/class/SessionUser.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $host  = $_SERVER['HTTP_HOST']; 
    $email = (isset($_POST['login_e-mail'])) ? htmlspecialchars($_POST['login_e-mail']) : null; 
    $password = (isset($_POST['login_password'])) ? htmlspecialchars($_POST['login_password']) : null;
   
    if ($email == null || $password == null){

        $errorInfo = new SessionNotifications('error', 'Błąd krytyczny', "Nie wykryto wszystkich pól danych.");
        $errorInfo->create();            
        header("Location: http://$host/CZN/logowanie_rejestracja.php");

    }
  

    try{

        $user = new M_LogIn();
        $user->logIn($email, $password);

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
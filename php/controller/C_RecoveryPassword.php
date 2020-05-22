<?php

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');
    require_once(dirname(__DIR__).'/classDirector/DirectorEmail.php'); 
    require_once(dirname(__DIR__).'/classBuilders/RecoveryPasswordEmailBuilder.php');
    require_once(dirname(__DIR__).'/model/M_RecoveryPassword.php');

    $host  = $_SERVER['HTTP_HOST']; 
    $email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : null;

    if($email == null){

        $errorInfo = new SessionNotifications('error', 'Błąd krytyczny', "Nie wykryto pola \"Podaj E-mail\".");
        $errorInfo->create();            
        header("Location: http://$host/CZN/logowanie_rejestracja.php");
        return;

    }

    $user = new M_RecoveryPassword();
    if(!$user->loadData($email)){

        $errorInfo = new SessionNotifications('alert', 'Bład weryfikacji emaila', "Podany przez Ciebie e-mail jest nie poprawny.");
        $errorInfo->create();            
        header("Location: http://$host/CZN/logowanie_rejestracja.php");

    }

    $sendEmail = new DirectorEmail(new RecoveryPasswordEmailBuilder());
    $sendEmail->setUser($user);

    if($sendEmail->send()){
        $successInfo = new SessionNotifications('success', 'Sukces!', "Na twój e-mail powinien zostać wysłany link do zmiany hasła. Sprawdź swoją pocztę.");
        $successInfo->create(); 
    }
    else{
        $errorInfo = new SessionNotifications('error', 'Wystąpił bład', " Coś sprawiło, że nie można był wysłać Tobie linku do zmienienia hasła. Skontaktuj się z <a href='feedback.php'>administratorem strony</a>");
        $errorInfo->create();
        
    }


    header("Location: http://$host/CZN/logowanie_rejestracja.php");


?>
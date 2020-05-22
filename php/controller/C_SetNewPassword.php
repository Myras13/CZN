<?php

    require_once(dirname(__DIR__).'/model/M_ModifyAccount.php');
    require_once(dirname(__DIR__).'/class/ValidatePassword.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $host  = $_SERVER['HTTP_HOST'];
    
    $data['id'] = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : null;
    $data['idt'] = (isset($_POST['idt'])) ? htmlspecialchars($_POST['idt']) : null;
    $data['password'] = (isset($_POST['recovery-password'])) ? htmlspecialchars($_POST['recovery-password']) : null;
    $data['password2'] = (isset($_POST['recovery-password-repeat'])) ? htmlspecialchars($_POST['recovery-password-repeat']) : null;
    
    foreach ($data as &$value) {
        if($value == null){
            
            $alertInfo = new SessionNotifications('alert', 'Zmiana hasła nie powiodła się', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/recoverypass.php?id=$id&idt=$idt");
            return;

        }
    }

    $valPass = new ValidatePassword();
    if(!$valPass->compare($data['password'], $data['password2'])){

        $alertInfo = new SessionNotifications('alert', 'Podane hasła sa różne', "Spróbuj jeszcze raz.");
        $alertInfo->create();            
        header("Location: http://$host/CZN/recoverypass.php?id=$id&idt=$idt");
        return;

    }

    $isGoodPassword = $valPass->examine($data['password'], 8);
    if($isGoodPassword != 1){

        if($isGoodPassword == -1)
            $alertInfo = new SessionNotifications('alert', 'Hasło musi mieć co najmniej 8 znaków', "Spróbuj jeszcze raz.");
        if($isGoodPassword == 0)
            $alertInfo = new SessionNotifications('alert', 'Zbyt słabe hasło', "Hasło musi mieć co najmniej:</br>- 1 wielki znak,</br>- 1 mały znak, </br>- 1 liczbę,</br>- Nie mieć białych znaków(spacja, tabulacja).");
    
        $alertInfo->create();            
        header("Location: http://$host/CZN/recoverypass.php?id=".$data['id']."&idt=".$data['idt']."");
        return;
    }
    
    $verAcc = new M_ModifyAccount();
    $verAcc->loadDataUser($data['id']);

    if(strcmp($verAcc->getToken(), $data['idt']) != 0){

        $alertInfo = new SessionNotifications('alert', 'Ups... Coś poszło nie tak', "Spróbuj jeszcze raz.");
        $alertInfo->create();            
        header("Location: http://$host/CZN/index.php");
        return;

    }
    else{

        $verAcc->changePass($data['password']);
        $successInfo = new SessionNotifications('success', 'Wszystko poszło pomyślnie', "Hasło zostało zmienione");
        $successInfo->create();            
        header("Location: http://$host/CZN/logowanie_rejestracja.php");
        return;

    }
    

?>
<?php

    require_once(dirname(__DIR__).'/model/M_RegUser.php');  
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $data['nick'] = (isset($_POST['registration_username']) && $_POST['registration_username'] != '') ? htmlspecialchars($_POST['registration_username']) : null;
    $data['password'] = (isset($_POST['registration_password'])) ? htmlspecialchars($_POST['registration_password']) : null;
    $data['password2'] = (isset($_POST['registration_password_repeat'])) ? htmlspecialchars($_POST['registration_password_repeat']) : null;
    $data['email'] = (isset($_POST['registration_e-mail'])) ? htmlspecialchars($_POST['registration_e-mail']) : null;

    $testDate  = (isset($_POST['registration_date_of_birth']))? explode('-', $_POST['registration_date_of_birth']): null;
    $data['date'] = (   $testDate != null && checkdate($testDate[1], $testDate[2], $testDate[0])   ) ? htmlspecialchars($_POST['registration_date_of_birth']) : null;

    $data['regulations_box'] = (isset($_POST['regulations_box']) && $_POST['regulations_box'] == 'true') ? htmlspecialchars($_POST['regulations_box']) : null;

    $host  = $_SERVER['HTTP_HOST'];

    foreach ($data as &$value) {
        if($value == null){
           
            $errorInfo = new SessionNotifications('alert', 'Nie udało się stworzyć konta', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $errorInfo->create();            
            header("Location: http://$host/CZN/logowanie_rejestracja.php");
            return;

        }
    }


    $user = new M_RegUser();
    $user->registerNewUser($data);

    header("Location: http://$host/CZN/logowanie_rejestracja.php"); 

?>
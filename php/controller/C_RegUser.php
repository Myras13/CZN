<?php

    require_once(dirname(__DIR__).'/model/M_RegUser.php'); 
    require_once(dirname(__DIR__).'/classDirector/DirectorEmail.php'); 
    require_once(dirname(__DIR__).'/classBuilders/VerificationEmailBuilder.php');
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
           
            $alertInfo = new SessionNotifications('alert', 'Nie udało się stworzyć konta', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/logowanie_rejestracja.php");
            return;

        }
    }


    $user = new M_RegUser();
    if($user->registerNewUser($data)){
        
        $sendEmail = new DirectorEmail(new VerificationEmailBuilder());
        $sendEmail->setUser($user);

        if($sendEmail->send()){
            $alertInfo = new SessionNotifications('alert', 'Sprawdź swoją pocztę', "Konto zostało utworzone, ale nie jest jeszcze zweryfikowane. Kliknij w link aktwacyjny w wiadomości.");
            $alertInfo->create(); 
        }
        else{
            $errorInfo = new SessionNotifications('error', 'Konto zostało utworzone, ale...', "Link aktywacyjny nie został wysłany na twoją pocztę. Skontaktuj się z administratorem strony.");
            $errorInfo->create();
        }

    }

    header("Location: http://$host/CZN/logowanie_rejestracja.php"); 

?>
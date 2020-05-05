<?php

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/core/ConnectDatabase.php');    
    require_once(dirname(__DIR__).'/config/config_connect.php');
    require_once(dirname(__DIR__).'/class/ValidatePassword.php');
    require_once(dirname(__DIR__).'/class/ValidateAge.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');

    $data['nick'] = (isset($_POST['registration_username']) && $_POST['registration_username'] != '') ? $_POST['registration_username'] : null;
    $data['password'] = (isset($_POST['registration_password'])) ? $_POST['registration_password'] : null;
    $data['password2'] = (isset($_POST['registration_password_repeat'])) ? $_POST['registration_password_repeat'] : null;
    $data['email'] = (isset($_POST['registration_e-mail'])) ? $_POST['registration_e-mail'] : null;
    $data['date'] = (isset($_POST['registration_date_of_birth'])) ? $_POST['registration_date_of_birth'] : null;
    $data['regulations_box'] = (isset($_POST['regulations_box']) && $_POST['regulations_box'] == 'true') ? $_POST['regulations_box'] : null;

    $host  = $_SERVER['HTTP_HOST'];

    foreach ($data as &$value) {
        if($value == null){
           
            $errorInfo = new SessionNotifications('alert', 'Nie udało się stworzyć konta', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $errorInfo->create();            
            header("Location: http://$host/CZN/logowanie_rejestracja.php");

        }
        else{

            $value = htmlspecialchars($value);

        }
    }

    try{

        $pdo = new ConnectDatabase();
        $pdo->connect($database);

    }catch(PDOException $e){

        $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
        $errorInfo->create();            
        header("Location: http://$host/CZN");

    }

    try{

        $handle = new ValidateAge();
        $handle->checkAge($data['date'], 12);

        unset($handle);

        $handle = new ValidatePassword();
        $handle->compare($data['password'], $data['password2']);
        $handle->examine($data['password'], 8);

        unset($handle);

        $handle = new ValidateEmail();
        $handle->examine($data['email']);
        unset($handle);

    }catch(ValidateDataUserException $e){

        $errorInfo = new SessionNotifications('error', 'Upss... Coś jest nie tak', $e->getMessage());
        $errorInfo->create();
        header("Location: http://$host/CZN/logowanie_rejestracja.php");            
        

    }

    var_dump($data);




?>
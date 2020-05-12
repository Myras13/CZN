<?php

    require_once(dirname(__DIR__).'/class/VerificationAccount.php');

    $processStatus = 0;   
    $id = 0;

    if(!isset($_GET['id']) || intval($_GET['id']) == 0)
        return $processStatus;
    
    $id = htmlspecialchars((int)$_GET['id']);

    $account = new VerificationAccount($id);
    
    if($account->isVerify() == 0){

        return $processStatus;

    }
    elseif($account->isVerify() == 2){

        $processStatus = 2;
        return $processStatus;

    }
    else{

        $account->verify();
        $processStatus = 1;
        return $processStatus;

    }
?>
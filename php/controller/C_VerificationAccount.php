<?php

    require_once(dirname(__DIR__).'/model/M_ModifyAccount.php');

    $processStatus = 0;   
    $id = 0;

    if(!isset($_GET['id']) || intval($_GET['id']) == 0)
        return $processStatus;
    
    $id = htmlspecialchars((int)$_GET['id']);

    $account = new M_ModifyAccount();
    $account->loadDataUser($id);
    
    if($account->isVerify()){

        return $processStatus;

    }
    else{

        $account->verify();
        $processStatus = 1;
        return $processStatus;

    }
?>
<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php');
    require_once(dirname(__DIR__).'/class/ManagementUser.php');
    
    class M_RecoveryPassword extends ManagementUser{

        public function __construct(){

            parent::__construct();

        }

    }


?>
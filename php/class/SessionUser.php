<?php

    require_once(dirname(__DIR__).'/class/ManagementSession.php');

    class SessionUser extends ManagementSession{

        private $user;

        public function __construct(ManagementUser $_user){

            $this->user = $_user;

        }

        public function create(){

            if (session_status() == PHP_SESSION_NONE)
                session_start();
            
            $_SESSION["id"] = $this->user->getId();
            $_SESSION["nick"] = $this->user->getNick();
            $_SESSION["email"] = $this->user->getEmail();
            $_SESSION["isAccess"] = $this->user->getIsAccess();
            $_SESSION["token"] = $this->user->getToken();
            $_SESSION["LogInActive"] = 1;

        }

        public function destroy(){
            
            if (session_status() == PHP_SESSION_NONE)
                session_start();

            unset($_SESSION["id"]);
            unset($_SESSION["nick"]);
            unset($_SESSION["email"]);
            unset($_SESSION["isAccess"]);
            unset($_SESSION["token"]);
            unset($_SESSION["LogInActive"]);        
        }

    }

?>
<?php

    require_once('../class/ManagementSession.php');

    class SessionUser extends ManagementSession{

        private $user;

        public function __construct(ManagementUser $_user){

            $this->user = $_user;

        }

        public function create(){

            if (session_status() == PHP_SESSION_NONE)
                session_start();
            
            $_SESSION["nick"] = $this->user->getNick();
            $_SESSION["isAccess"] = $this->user->getIsAccess();
            $_SESSION["token"] = $this->user->getToken();
            $_SESSION["LogInActive"] = 1;

        }

        public function destroy(){
                session_start();
                session_destroy();        
        }

    }

?>
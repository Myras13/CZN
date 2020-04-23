<?php

    require_once('../class/ManagementSession.php');

    class SessionUser extends ManagementSession{

        public function create(ManagementUser $_user){

            if (session_status() == PHP_SESSION_NONE)
                session_start();
            
            $_SESSION["nick"] = $_user->getNick();
            $_SESSION["isAccess"] = $_user->getIsAccess();
            $_SESSION["token"] = $_user->getToken();
            $_SESSION["LogInActive"] = 1;

        }

        public function destroy(){
                session_start();
                session_destroy();        
        }

    }

?>
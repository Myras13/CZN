<?php

    require_once(dirname(__DIR__).'/class/ManagementSession.php');

    class SessionNotifications extends ManagementSession{

        protected $idNote;
        protected $title;
        protected $content;

        public function __construct(string $_mode, string $_title, string $_content){

            $this->idNote = $_mode;      
            $this->title = $_title; 
            $this->content = $_content;

        }

        public function isAlive(){

            if(isset($_SESSION["mode"]) && isset($_SESSION["content"]) && isset($_SESSION["title"]))
                return true;
            
            return false;

        }

        public function create(){

            if (session_status() == PHP_SESSION_NONE)
                session_start();

            $_SESSION["mode"] = $this->idNote;
            $_SESSION["content"] = $this->content;
            $_SESSION["title"] = $this->title;

        }

        public function destroy(){

            if (session_status() == PHP_SESSION_NONE)
                session_start();

            unset($_SESSION["mode"]);
            unset($_SESSION["title"]);
            unset($_SESSION["content"]);

        }

    }


?>
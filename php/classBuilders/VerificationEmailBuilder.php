<?php

    require_once(dirname(__DIR__).'/class/ManagementEmail.php');

    class VerificationEmailBuilder extends ManagementEmail{

        public function setHeader(string $header){
            $this->header = $header;
        }

        public function setReceiver(string $email){
            $this->receiver = $email;       
        }

        public function setSubject(string $email){
            $this->subject = $email;
        }

        public function setMessage(string $message){
            $this->message = $message;
        }

        public function send():bool{

            if (mail($this->receiver, $this->subject, $this->message, $this->header))
                return true;
            else
                return false;

        }

    }

?>
<?php

    abstract class ManagementEmail{

        protected $receiver;
        protected $header;
        protected $subject;
        protected $message;
        
        abstract public function setMessage(array $data);

        public function setHeader(string $header){
            $this->header = $header;
        }

        public function setReceiver(string $email){
            $this->receiver = $email;       
        }

        public function setSubject(string $email){
            $this->subject = $email;
        }
        
        public function send():bool{

            if (mail($this->receiver, $this->subject, $this->message, $this->header))
                return true;
            else
                return false;

        }

    }

?>
<?php

    abstract class ManagementEmail{

        protected $receiver;
        protected $header;
        protected $subject;
        protected $message;
        
        abstract public function setHeader(string $email);
        abstract public function setReceiver(string $email);
        abstract public function setSubject(string $email);
        abstract public function setMessage(string $body);
        abstract public function send():bool;

    }

?>
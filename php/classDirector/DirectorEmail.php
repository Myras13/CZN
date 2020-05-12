<?php

    require_once(dirname(__DIR__).'/classBuilders/VerificationEmailBuilder.php');
    require_once(dirname(__DIR__).'/class/ManagementUser.php');

    class DirectorEmail{

        private $builder;
        private $user;

        public function __construct(object $builder){

            $this->builder = $builder;

        }

        public function setUser(ManagementUser $user){

            $this->user = $user;

        }

        public function send(){
            if($this->builder instanceof VerificationEmailBuilder){
                if($this->user == null)
                    return false;
                
                $id = $this->user->getId();
                $emailUser = $this->user->getEmail();
                $nick = $this->user->getNick();
                $server = $_SERVER['HTTP_HOST'];

                $text = 'Dziękujemy za rejestracje na stronie CZN.';
                $text .= 'Tutaj masz link weryfikacyjny, który pozwoli ci aktywować konto na naszej stronie:';
                $text .= 'http://'.$server.'/CZN/veracc.php?id='.$id.' . Wystarczy na niego tylko kliknąć.';

                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: coszniczego.project@gmail.com' . "\r\n";

                $this->builder->setHeader($header);
                $this->builder->setReceiver($emailUser);
                $this->builder->setSubject('Weryfikacja konta na stronie CZN');
                $this->builder->setMessage($text);

            }

            if($this->builder->send())
                return true;
            else
                return false;

        }

    }

?>
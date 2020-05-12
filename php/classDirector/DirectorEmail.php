<?php

    require_once(dirname(__DIR__).'/classBuilders/VerificationEmailBuilder.php');
    require_once(dirname(__DIR__).'/class/ManagementUser.php');

    class DirectorEmail{

        private $builder;
        private $user;
        private $server;

        public function __construct(object $builder){

            $this->builder = $builder;
            $this->server =  $_SERVER['HTTP_HOST'];

        }

        public function setUser(ManagementUser $user){

            $this->user = $user;

        }

        public function send(){
            if($this->builder instanceof VerificationEmailBuilder){
                if($this->user == null)
                    return false;

                $data['server'] = $this->server;
                $data['id'] = $this->user->getId();
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: coszniczego.project@gmail.com' . "\r\n";

                $this->builder->setHeader($header);
                $this->builder->setReceiver($this->user->getEmail());
                $this->builder->setSubject('Weryfikacja konta na stronie CZN');
                $this->builder->setMessage($data);

            }

            if($this->builder->send())
                return true;
            else
                return false;

        }

    }

?>
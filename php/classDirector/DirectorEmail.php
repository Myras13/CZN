<?php

    require_once(dirname(__DIR__).'/classBuilders/VerificationEmailBuilder.php');
    require_once(dirname(__DIR__).'/classBuilders/FeedbackEmailBuilder.php');
    require_once(dirname(__DIR__).'/class/ManagementUser.php');
    

    class DirectorEmail{

        private $builder;
        private $webemail;
        private $user;
        private $nick;
        private $data;
        private $server;

        public function __construct(object $builder){

            require_once(dirname(__DIR__).'/config/config_web_email.php');
            $this->webemail = $webemail;
            $this->builder = $builder;
            $this->server =  $_SERVER['HTTP_HOST'];
            

        }

        public function setUser(ManagementUser $user){

            $this->user = $user;

        }

        public function setArrayDataContact(array $data){

            $this->data = $data;

        }

        public function send(){
            if($this->builder instanceof VerificationEmailBuilder){
                if($this->user == null)
                    return false;

                $data['server'] = $this->server;
                $data['id'] = $this->user->getId();
                $emailUser = $this->user->getEmail();
                $webemail = $this->webemail;
                $subject = 'Weryfikacja konta na stronie CZN';

                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= "From: ".$webemail."" . "\r\n";

                $this->builder->setHeader($header);
                $this->builder->setReceiver($emailUser);
                $this->builder->setSubject($subject);
                $this->builder->setMessage($data);

            }

            elseif($this->builder instanceof FeedbackEmailBuilder){
                
                $subject = $this->data['title'].' - '.$this->data['nick'];            
                $webemail = $this->webemail;

                $message['type'] = $this->data['message_type'];
                $message['content'] = $this->data['message'];
                $message['email'] = $this->data['email'];

                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= "From: ".$webemail."" . "\r\n";

                $this->builder->setHeader($header);
                $this->builder->setReceiver($webemail);
                $this->builder->setSubject($subject);
                $this->builder->setMessage($message);

            }

            elseif($this->builder instanceof RecoveryPasswordEmailBuilder){               
                if($this->user == null)
                    return false;

                $data['server'] = $this->server;
                $data['id'] = $this->user->getId();
                $data['token'] = $this->user->getToken();
                $emailUser = $this->user->getEmail();
                $webemail = $this->webemail;
                $subject = 'Odzyskiwanie hasła na stronie CZN';

                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= "From: ".$webemail."" . "\r\n";

                $this->builder->setHeader($header);
                $this->builder->setReceiver($emailUser);
                $this->builder->setSubject($subject);
                $this->builder->setMessage($data);

            }

            
            if($this->builder->send())
                return true;
            else
                return false;

        }

    }

?>
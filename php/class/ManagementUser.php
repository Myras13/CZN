<?php

    abstract class ManagementUser{

        private ConnectDatabase $pdo;
        protected int $id;
        protected string $nick;
        protected string $email;
        protected int $age;
        protected int $permission;
        protected int $isAccess;
        protected string $acc_creation_date;
        protected string $date_lock;
        protected string $token;

        public function __construct(ConnectDatabase $_pdo, string $_email){

            $this->email = htmlspecialchars($_email);
            $this->pdo = $_pdo;

        }
        
        public function __destruct(){

            $this->pdo->disconnect();
            $this->id = null;
            $this->nick = null;
            $this->email = null;
            $this->age = null;
            $this->permission = null;
            $this->isAccess = null;
            $this->acc_creation_date = null;
            $this->date_lock = null;
            $this->token = null;
            
        }

        public function getId():int{
            return $this->id;
        }

        public function getNick():string{
            return $this->nick;
        }

        public function getEmail():string{
            return $this->email;
        }

        public function getAge():int{
            return $this->age;
        }

        public function getPermission():int{
            return $this->permission;
        }

        public function getIsAccess():int{
            return $this->isAccess;
        }

        public function getDateCreation():string{
            return $this->acc_creation_date;
        }

        public function getDateLock():string{
            return $this->date_lock;
        }

        public function getToken():string{
            return $this->token;
        }

        public function loadData(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT * FROM users_account WHERE email = :email");
            $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();

            $this->id = $result['id_user'];
            $this->nick = $result['nick'];
            $this->age = (int)$result['age'];
            $this->permission = (int)$result['permission'];
            $this->isAccess = (int)$result['isAccess'];          
            $this->acc_creation_date = date('Y-m-d', strtotime($result['acc_creation_date']));
            $this->token = $result['token'];

            if(!isset($result['date_Lock']))
                $this->date_lock = '';
            else
                $this->date_lock = date('Y-m-d', strtotime($result['date_lock']));

            $sth->closeCursor();
            unset($sth);

        }

    }

?>
<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');
    require_once(dirname(__DIR__).'/classException/NullAccountException.php');

    class M_LogIn extends ManagementUser{

        private $pdo; 
        private $pagePassword; 

        public function __construct(ConnectDatabase $_pdo, string $_email, string $_password){

            parent::__construct($_pdo, $_email);
            $this->pagePassword = hash('sha512', htmlspecialchars($_password));
            $this->pdo = $_pdo;
            
        } 

        public function __destruct(){

            $this->pdo->disconnect();

        } 

        public function isRegistered():bool{           

            
            $sthPDO = $this->pdo->getPDO();           
            $userAccount = new ValidateEmail();

            if(!$userAccount->isEmailExist($sthPDO, $this->email))
                throw new NullAccountException("This account doesn't exist", 1);

            $sth = $sthPDO->prepare("SELECT COUNT(email) FROM users_account WHERE email = :email AND password = :password");
            $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
            $sth->bindValue(':password', $this->pagePassword, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            $sth->closeCursor();
            unset($sth);

            if($result[0] == false){
                throw new NullAccountException("This password is wrong", 1);
            }
            else{
                $this->loadData();
                return true;
            }

        }

    }

?>
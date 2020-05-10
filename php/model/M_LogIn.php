<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');
    require_once(dirname(__DIR__).'/class/ValidateAccount.php');
    require_once(dirname(__DIR__).'/classException/NullAccountException.php');
    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

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

        public function logIn():bool{           

            
            $sthPDO = $this->pdo->getPDO();           
            $userAccountEmail = new ValidateEmail();  
            $userAccountValidate = new ValidateAccount();

            if(!$userAccountEmail->isEmailExist($sthPDO, $this->email))
                throw new NullAccountException("Takie konto nie istnieje.", 1);
            
            if(!$userAccountValidate->isValidate($sthPDO, $this->email))
                throw new ValidateDataUserException("Konto nie zostało jeszcze zweryfikowane. Sprawdź swoją pocztę", 6);

            $sth = $sthPDO->prepare("SELECT COUNT(email) FROM users_account WHERE email = :email AND password = :password");
            $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
            $sth->bindValue(':password', $this->pagePassword, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            $sth->closeCursor();
            unset($sth);

            if($result[0] == false){
                throw new NullAccountException("Hasło jest nieprawidłowe.", 1);
            }
            else{
                $this->loadData();
                return true;
            }

        }

    }

?>
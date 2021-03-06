<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');
    require_once(dirname(__DIR__).'/class/ValidateAccount.php');
    require_once(dirname(__DIR__).'/classException/NullAccountException.php');
    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class M_LogIn extends ManagementUser{

        public function __construct(){

            parent::__construct();
            
        }
        
        private function tryLog(string $email, string $password):bool{

            $pagePassword = hash('sha512', $password);

            $sthPDO = $this->pdo->getPDO();           
            $userAccountEmail = new ValidateEmail();  
            $userAccountValidate = new ValidateAccount();

            if(!$userAccountEmail->isEmailExist($sthPDO, $email))
                throw new NullAccountException("Takie konto nie istnieje.", 1);
            
            if(!$userAccountValidate->isValidate($sthPDO, $email))
                throw new ValidateDataUserException("Konto nie zostało jeszcze zweryfikowane. Sprawdź swoją pocztę", 6);

            $sth = $sthPDO->prepare("SELECT COUNT(email) FROM users_account WHERE email = :email AND password = :password");
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->bindValue(':password', $pagePassword, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            $sth->closeCursor();
            unset($sth);

            if($result[0] == false){
                throw new NullAccountException("Hasło jest nieprawidłowe.", 1);
            }
            else{
                $this->loadData($email);
                return true;
            }

        }

        public function logIn($email, $password){           
            
            $host  = $_SERVER['HTTP_HOST']; 

            try{
                
                $this->tryLog($email, $password);

            }catch(NullAccountException $e){
        
                $errorInfo = new SessionNotifications('alert', 'Próba nie udana', $e->getMessage());
                $errorInfo->create();
                header("Location: http://$host/CZN/logowanie_rejestracja.php");
        
            }catch(ValidateDataUserException $r){
        
                $errorInfo = new SessionNotifications('info', 'Zweryfikuj swoje konto', $r->getMessage());
                $errorInfo->create();
                header("Location: http://$host/CZN/logowanie_rejestracja.php");
        
            }

        }

    }

?>
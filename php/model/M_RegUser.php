<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/classException/TakenAccountException.php');
    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');
    require_once(dirname(__DIR__).'/class/ValidatePassword.php');
    require_once(dirname(__DIR__).'/class/ValidateAge.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');

    class M_RegUser extends ManagementUser{

        public function __construct(){

            parent::__construct();
            
        }

        private function validate(array $dataUser){

            $handleVA = new ValidateAge();
            if(!$handleVA->checkAge($dataUser['date'], 12))
                throw new ValidateDataUserException('Aby móc korzystać z serwisu musisz mieć co najmniej 12 lat.',4);
    
            $handleVP = new ValidatePassword();
            if(!$handleVP->compare($dataUser['password'], $dataUser['password2']))
                throw new ValidateDataUserException('Podane hasła są różne.',1);

            $isGoodPassword = $handleVP->examine($dataUser['password'], 8);
            if($isGoodPassword == -1)
                throw new ValidateDataUserException('Hasło musi mieć co najmniej 8 znaków.',2);
            if($isGoodPassword == 0)
                throw new ValidateDataUserException('Hasło musi mieć co najmniej:</br>- 1 wielki znak,</br>- 1 mały znak, </br>- 1 liczbę,</br>- Nie mieć białych znaków(spacja, tabulacja).',3);
                    
            $handleVE = new ValidateEmail();
            if(!$handleVE->examine($dataUser['email']))
                throw new ValidateDataUserException('Podany e-mail nie przeszedł walidacji.',5);
                 
        }

        private function isTakenNick(string $nick){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT COUNT(nick) FROM users_account WHERE nick = :nick");
            $sth->bindValue(':nick', $nick, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            $sth->closeCursor();
            unset($sth);

            if($result[0] > 0)
                return true;

            return false;

        }


        private function regNow(array $dataUser){

            if($this->loadData($dataUser['email']))
                throw new TakenAccountException('Podany e-mail jest już zajęty.',1);

            if($this->isTakenNick($dataUser['nick']))
                throw new TakenAccountException('Podany nick jest już zajęty.',2);

            $nick = $dataUser['nick'];
            $password = hash('sha512', $dataUser['password']);
            $email = $dataUser['email'];
            $age = (int)date("Y") - (int)substr($dataUser['date'], 0, 4);

            $tokenVar = $nick.$email;
            $token = hash('sha512', $tokenVar);

            
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("INSERT INTO users_account (`nick`, `password`, `email`, `age`, `token`) VALUES (:nick, :password, :email, :age, :token)");
            $sth->bindValue(':nick', $nick, PDO::PARAM_STR);
            $sth->bindValue(':password', $password, PDO::PARAM_STR);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->bindValue(':age', $age, PDO::PARAM_INT);
            $sth->bindValue(':token', $token, PDO::PARAM_STR);
            $sth->execute();

            $sth->closeCursor();
            unset($sth);
        }

        public function registerNewUser(array $dataUser){

            $host  = $_SERVER['HTTP_HOST']; 

            try{

                $this->validate($dataUser);
                $this->regNow($dataUser);
                $successInfo = new SessionNotifications('success', 'Udało się!', 'Twoje konto zostało utworzone! Musisz jeszcze zweryfkować swoje konto. Sprawdź swoją pocztę');
                $successInfo->create();                

            }catch(ValidateDataUserException $e){
        
                $errorInfo = new SessionNotifications('error', 'Ugh... coś jest nie tak', $e->getMessage());
                $errorInfo->create();
                header("Location: http://$host/CZN/logowanie_rejestracja.php");            
                
            }catch(TakenAccountException $r){
            
                $errorInfo = new SessionNotifications('alert', 'Niestety, ale ktoś Cię uprzedził :(', $r->getMessage());
                $errorInfo->create();
                header("Location: http://$host/CZN/logowanie_rejestracja.php");            
                
            }

        }
        

    }

?>
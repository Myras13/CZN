<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class TypeFeedback{

        private $pdo;

        public function __construct(){

            try{

                $this->pdo = new ConnectDatabase();
    
            }catch(PDOException $e){
    
                $host = $_SERVER['HTTP_HOST'];
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
                $errorInfo->create();            
                header("Location: http://$host/CZN/break.php");
                
            }

        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function getOption():array{

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT * FROM type_feedback");
            $sth->execute();

            $result = $sth->fetchAll();

            if($result == false)
                return false;
            else
                return $result;

        }

    }

?>
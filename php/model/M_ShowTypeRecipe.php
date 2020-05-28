<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php');

    class M_ShowTypeRecipe{

        public function __construct(){

            try{

                $this->pdo = new ConnectDatabase();
    
            }catch(PDOException $e){
                
                $host  = $_SERVER['HTTP_HOST']; 
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
                $errorInfo->create();            
                header("Location: http://$host/CZN");
                
            }

        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function getAllTypePages(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->query("SELECT * FROM type_recipe ORDER BY id ASC");
            $result = $sth->fetchAll();
            if($result == false)
                return false;
            else
                return $result;

        }

    }

?>
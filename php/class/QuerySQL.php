<?php

    class QuerySQL{

        public function __construct(){

            try{

                $this->pdo = new ConnectDatabase();
    
            }catch(PDOException $e){
    
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
                $errorInfo->create();            
                header("Location: http://$host/CZN");
                
            }

        }

        public function __destruct(){
            $this->pdo->disconnect();
        }

        public function getValueById(string $id, string $tableSQL, string $columnSQL = "*"){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT `$columnSQL` FROM `$tableSQL` WHERE id = :id");
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetchAll();
            if($result == false)
                return false;
            else
                return $result;

        }

    }

?>
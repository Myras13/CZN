<?php

    class QuerySQL{

        private $pdo;

        public function __construct(ConnectDatabase $pdo){

            $this->pdo = $pdo;

        }

        public function __destruct(){
            $this->pdo->disconnect();
        }

        public function getValueById(int $id, string $tableSQL, string $columnSQL = "*"){

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
<?php

    class ConnectDatabase{

        private $pdo;

        public function connect($database){

            try{

               $this->pdo = new PDO('mysql:host='.$database['host'].';dbname='.$database['dbname'].'', $database['login'], $database['password']);
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);              

            }
            catch(PDOException $e){

               throw $e;

            }

        }

        public function  __destruct(){

            $this->disconnect();

        }

        public function disconnect(){
            
            if($this instanceof Connect_Database) {

                return null;

            }

            return $this;

        }

        public function getPDO():PDO{

            return $this->pdo;

        }

    }

?>
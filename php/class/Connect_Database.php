<?php

    class Connect_Database{

        public function connect($database){

            try{

               $pdo = new PDO('mysql:host='.$database['host'].';dbname='.$database['dbname'].'', $database['login'], $database['password']);
               return $pdo;

            }
            catch(PDOException $e){

               throw $e;

            }

        }

        public function disconnect(){
            
            if($this instanceof Connect_Database) {

                return null;

            }

            return $this;

        }

    }

?>
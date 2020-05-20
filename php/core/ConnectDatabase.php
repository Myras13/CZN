<?php

    class ConnectDatabase{

        private $pdo;

        public function __construct(){

            try{

                require(dirname(__DIR__).'/config/config_connect.php');
                $this->pdo = new PDO('mysql:host='.$database['host'].';dbname='.$database['dbname'].'', $database['login'], $database['password']);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);              

            }
            catch(PDOException $e){

                throw $e;

            }

        }

        public function  __destruct(){

            $this->pdo = null;

        }

        public function disconnect(){
            
            if($this instanceof ConnectDatabase) {

                return null;

            }

            return $this;

        }

        public function getPDO():PDO{

            return $this->pdo;

        }

    }

?>
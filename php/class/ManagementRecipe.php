<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php'); 

    abstract class ManagementRecipe{

        protected $title;
        protected $text;
        protected $type;

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

    }


?>
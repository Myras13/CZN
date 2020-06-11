<?php

    require_once(dirname(__DIR__).'/class/ManagementRecipe.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_AddRecipe extends ManagementRecipe{

        private $user;
        private $date;

        public function __construct(string $title, string $text, int $type){

            parent::__construct();
            $this->title = $title;
            $this->text = $text;
            $this->type = $type;
            $this->date = date("Y-m-d");

        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function setUser(int $id){

            $this->user = $id;

        }

        public function add(){
            
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("INSERT INTO recipe (id_user, id_type, title, content, date) VALUES (?, ?, ?, ?, ?);");
            $sth->bindValue(':idUser', $this->user, PDO::PARAM_INT);
            $sth->bindValue(':idType', $this->type, PDO::PARAM_INT);
            $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
            $sth->bindValue(':content', $this->text, PDO::PARAM_STR);
            $sth->bindValue(':date', $this->date, PDO::PARAM_STR);

            try {

                $sthPDO->beginTransaction();
                $sth->execute([$this->user, $this->type, $this->title, $this->text, $this->date]);
                $lastId = $sthPDO->lastInsertId();
                $sthPDO->commit();

            } catch(PDOExecption $e) {

                $sthPDO->rollback();
                $host  = $_SERVER['HTTP_HOST']; 
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało się dodać przepisu.");
                $errorInfo->create();            
                header("Location: http://$host/CZN/add_recipe.php");
                return;

            }finally{

                return intval($lastId);

            }

        }

    }


?>
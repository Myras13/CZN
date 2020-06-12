<?php

    require_once(dirname(__DIR__).'/class/ManagementRecipe.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_EditRecipe extends ManagementRecipe{

        private $id;
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

        public function setID(int $id){

            $this->id = $id;

        }

        public function update(){
            
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("UPDATE recipe SET title = :title, content = :content, id_type = :idType, date = :date WHERE id_recipe = :id");
            $sth->bindValue(':idType', $this->type, PDO::PARAM_INT);
            $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
            $sth->bindValue(':content', $this->text, PDO::PARAM_STR);
            $sth->bindValue(':date', $this->date, PDO::PARAM_STR);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->execute();

            return true;

        }

    }


?>
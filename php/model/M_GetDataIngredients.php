<?php

    require_once(dirname(__DIR__).'/class/ManagementRecipe.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_GetDataIngredients extends ManagementRecipe{ 

        private $idRecipe;

        public function __construct(int $id){
            parent::__construct();
            $this->idRecipe = $id;
        }

        public function __destruct(){
            $this->pdo->disconnect();
        }

        public function getDataIngredients(){
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT id, name, quantity, type FROM ingredients WHERE id_recipe = :id");
            $sth->bindValue(':id', $this->idRecipe, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetchAll();
            return $result;
        }

    }

?>
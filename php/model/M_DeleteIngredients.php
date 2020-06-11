<?php

    require_once(dirname(__DIR__).'/class/ManagementIngredients.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_DeleteIngredients extends ManagementIngredients{

        public function __construct(int $id){

            parent::__construct();
            $this->idRecipe = $id;
            
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function delete(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("DELETE FROM ingredients WHERE id_recipe = :id");
            $sth->bindValue(":id", $this->idRecipe, PDO::PARAM_INT);
            $sth->execute();

        } 

    } 

?>
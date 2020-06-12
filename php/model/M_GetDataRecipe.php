<?php

    require_once(dirname(__DIR__).'/class/ManagementRecipe.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_GetDataRecipe extends ManagementRecipe{ 

        private $id;
        private $user;

        public function __construct(int $id){
            parent::__construct();
            $this->id = $id;
        }

        public function setUser(int $idUser){

            $this->user = $idUser;

        }

        public function __destruct(){
            $this->pdo->disconnect();
        }

        public function checkID(){
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT COUNT(R.id_recipe) AS own FROM recipe R INNER JOIN users_account U ON R.id_user = U.id_user WHERE R.id_recipe = :id AND R.id_user = :idUser");
            $sth->bindValue(':idUser', $this->user, PDO::PARAM_INT);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetch();
            if($result['own'] == false)
                return false;
            else 
                return true;
        }

        public function getDataRecipe(){
            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT id_recipe, content, title, id_type FROM recipe WHERE id_recipe = :id");
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetchAll();
            return $result[0];
        }

    }

?>
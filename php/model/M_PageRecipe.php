<?php

    require_once(dirname(__DIR__).'/class/ManagementPage.php');
    require_once(dirname(__DIR__).'/model/M_DeleteIngredients.php');

    class M_PageRecipe extends ManagementPage{

        public function __construct(){

            parent::__construct();

        }

        public function getRecipe(int $id){

            $sthPDO = $this->pdo->getPDO();

            $sql = "            
                SELECT
                    R.id_recipe AS id,
                    R.title AS title,
                    R.content AS content,
                    R.photo_link AS photo_link,
                    R.date AS date,
                    U.nick AS nick
                FROM
                    recipe R
                INNER JOIN
                        users_account U
                    ON
                        R.id_user = U.id_user
                WHERE
                    R.id_recipe = :id;    
             ";

            $sth = $sthPDO->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetch();
            if($result == false)
                return false;
            else
                return $result;

        }

        public function getIngredients(int $id){

            $sthPDO = $this->pdo->getPDO();

            $sql = "            
                SELECT 
                    CONCAT(RPAD(I.name,80,'.'), ' ', I.quantity, ' ', I.type) AS ingredient
                FROM
                    ingredients I
                INNER JOIN
                        recipe R
                    ON
                        R.id_recipe = I.id_recipe
                WHERE
                    R.id_recipe = :id;    
             ";

            $sth = $sthPDO->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetchAll();
            if($result == false)
                return false;
            else
                return $result;

        }

        public function delete(int $idRecipe, int $idUser){

            $sthPDO = $this->pdo->getPDO();
            $sql = "SELECT COUNT(R.id_recipe) AS is_owner FROM recipe R INNER JOIN users_account U ON U.id_user = R.id_user WHERE R.id_user = :idUser AND R.id_recipe = :idRecipe";
            $owner = $sthPDO->prepare($sql);
            $owner->bindValue(':idUser', $idUser, PDO::PARAM_INT);
            $owner->bindValue(':idRecipe', $idRecipe, PDO::PARAM_INT);
            $owner->execute();

            $result = $owner->fetch();
            if($result['is_owner'] == false)
                return false;

            $deleteIngredients = new M_DeleteIngredients($idRecipe);
            $deleteIngredients->deleteByRecipe();
            
            $sql = "DELETE FROM recipe WHERE id_recipe = :idRecipe";
            $sth = $sthPDO->prepare($sql);
            $sth->bindValue(':idRecipe', $idRecipe, PDO::PARAM_INT);
            $result = $sth->execute();

            return true;

        }

    }

?>
<?php

    require_once(dirname(__DIR__).'/model/M_PreparePaginator.php');

    class M_PaginatorDraw extends M_PreparePaginator{

        private $type;

        public function __construct(string $typeRecipe ,int $limit){

            parent::__construct($limit);
            $this->type = htmlspecialchars($typeRecipe);

        }

        public function getData(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT R.title, R.content, R.photo_link FROM recipe R INNER JOIN type_recipe TR ON R.id_type = TR.id LIMIT :start :end");
            $sth->bindValue(':start', $this->$from, PDO::PARAM_INT);
            $sth->bindValue(':end', $this->$limit, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetch();
            if($result == false)
                return false;
            else
                return $result;
                
        }

    }


?>
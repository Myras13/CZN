<?php

    require_once(dirname(__DIR__).'/model/M_PreparePaginator.php');

    class M_PaginatorDraw extends M_PreparePaginator{

        public function __construct(int $limit){

            parent::__construct($limit);

        }

        public function getDataType(int $type){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT R.id_recipe, R.title, R.content, R.photo_link, R.date, U.nick FROM recipe AS R INNER JOIN users_account AS U ON R.id_user = U.id_user WHERE R.id_type = ? ORDER BY R.id_recipe DESC LIMIT ?, ?");
            $sth->bindValue(1, $type, PDO::PARAM_INT);
            $sth->bindValue(2, $this->from, PDO::PARAM_INT);
            $sth->bindValue(3, $this->limit, PDO::PARAM_INT);
            $sth->execute();
            
            $result = $sth->fetchAll();
            
            if($result == false)
                return false;
            else
                return $result;
                
        }

        public function getDataAll(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT R.id_recipe, R.title, R.content, R.photo_link, R.date, U.nick FROM recipe AS R INNER JOIN users_account AS U ON R.id_user = U.id_user ORDER BY R.id_recipe DESC LIMIT ?, ?");
            $sth->bindValue(1, $this->from, PDO::PARAM_INT);
            $sth->bindValue(2, $this->limit, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetchAll();

            if($result == false)
                return false;
            else
                return $result;
                
        }

    }


?>
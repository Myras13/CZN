<?php

    require_once(dirname(__DIR__).'/class/ManagementPage.php'); 

    class M_PreparePaginator extends ManagementPage{

        protected $limit;
        protected $countPages;
        protected $page;
        protected $from;

        public function __construct(int $limit){

            parent::__construct();
            $this->limit = $limit;

            $this->countAllPages();
        
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function setCurrentyPage(int $page){

            $this->page = $page;
            $this->setFrom($page);

        }


        protected function setFrom(int $page){

            $this->from = $page * $this->limit;

        }

        protected function countAllPages(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->query("SELECT COUNT(id_recipe) AS rec FROM recipe")->fetch()['rec'];  
            $this->countPages = ceil($sth/$this->limit);  

        }

        
        protected function countTypePages(int $id){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT COUNT(id_recipe) AS rec FROM recipe WHERE id_type = :id");
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $this->allPages = ceil($sth->fetch()['rec']/$this->limit);  

        }

    }

?>
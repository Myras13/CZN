<?php

    require_once(dirname(__DIR__).'/class/ManagementPage.php'); 

    class M_PreparePaginator extends ManagementPage{

        protected $limit;
        protected $allPages;
        protected $page;
        protected $from;

        public function __construct(int $limit){

            parent::__construct();
            $this->limit = $limit;

            setAllPages();

            $this->from = $page * $limit;
        
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function setCurrentyPage(int $page){

            $this->page = $page;
            setFrom($page);

        }


        protected function setFrom(int $page){

            $this->from = $page * $this->limit;

        }

        protected function setAllPages(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->query("SELECT COUNT(id_recipe) AS rec FROM recipe")->fetch()['rec'];  
            $this->allPages = ceil($sth/$this->limit);  

        }




    }

?>
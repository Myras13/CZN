<?php

    require_once(dirname(__DIR__).'/class/ManagementPage.php'); 

    class M_PreparePaginator extends ManagementPage{

        protected $limit;
        protected $countPages;
        protected $page;
        protected $from;
        protected $recipesSearch;

        public function __construct(int $limit){

            parent::__construct();
            $this->limit = $limit;
            $this->countAllPages();
        
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function getPage():int{

            return $this->page;

        }

        public function getAllPages():int{

            return $this->countPages;

        }

        public function setCurrentyPage(int $page){

            $this->page = $page;
            $this->setFrom($page);

        }


        protected function setFrom(int $page){

            $this->from = $page * $this->limit;

        }

        public function countAllPages(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->query("SELECT COUNT(id_recipe) AS rec FROM recipe")->fetch()['rec'];  
            $this->countPages = ceil($sth/$this->limit);  

        }

        
        public function countTypePages(int $id){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT COUNT(id_recipe) AS rec FROM recipe WHERE id_type = :id");
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $this->countPages = ceil($sth->fetch()['rec']/$this->limit);  

        }

        private function modeAND(array $ingredients):int{

            $sthPDO = $this->pdo->getPDO();
            $sthPDO->beginTransaction();

                $firstIngredients = array_shift($ingredients);
                       
                $sql = "SELECT I.id_recipe AS id FROM ingredients I WHERE I.name SOUNDS LIKE ?";
                $sth = $sthPDO->prepare($sql);
                $sth->bindValue(1, "%'.$firstIngredients.'%'", PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetchAll();

                if($result == false)
                    return 0;

                $arrayIDRecipe = [];
                foreach($result as $value)
                    array_push($arrayIDRecipe, $value['id']);

                if(count($ingredients) == 0){
                    $sthPDO->commit();
                    $this->recipesSearch = $arrayIDRecipe;
                    return count($arrayIDRecipe);
                }

                $sqlTable = [];
                foreach($arrayIDRecipe as $id){
                    $iterator = 0;
                    $sqlWhere = '';
                    foreach($ingredients as $value){

                        $sqlWhere = $sqlWhere."SELECT I.id_recipe AS id FROM ingredients I WHERE I.name SOUNDS LIKE ? AND I.id_recipe = $id";
                        if(++$iterator < count($ingredients))
                            $sqlWhere = $sqlWhere." INTERSECT ";
            
                    }

                    array_push($sqlTable, $sqlWhere);

                }

                $arrayIDRecipe = [];
                foreach($sqlTable as $sql){

                    $sth = $sthPDO->prepare($sql);

                    $iterator = 1;
                    foreach($ingredients as $value)
                        $sth->bindValue($iterator++, "%'.$value.'%'", PDO::PARAM_STR);
                
                    $sth->execute();
                    $result = $sth->fetch();
                    
                    if($result != false)
                        array_push($arrayIDRecipe, $result['id']);

                }

            
            $sthPDO->commit();
            $this->recipesSearch = $arrayIDRecipe;
            return count($arrayIDRecipe);
            
        }

        private function modeOR($ingredients):int{
            return 1;
        }

        public function countPagesByIngredients(array $ingredients, string $mode){

            $num = ($mode == "AND")? $this->modeAND($ingredients): $this->modeOR($ingredients);
            if($num == false)
                return false;

            $this->countPages = (int)ceil($num/$this->limit);
            return true; 
            
        }

    }

?>
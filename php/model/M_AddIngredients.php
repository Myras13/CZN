<?php

    require_once(dirname(__DIR__).'/class/ManagementIngredients.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 

    class M_AddIngredients extends ManagementIngredients{

        public function __construct(int $id, array $ingredients){

            parent::__construct();
            $this->idRecipe = $id;

            $this->deleteVarNull($ingredients);
            $this->arrIngredients = array_reverse($ingredients);
            
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        private function deleteVarNull(array &$ingredients){
            $iterator = 0;
            foreach($ingredients as $key => $value){ 

                if($iterator > 0){
                    unset($ingredients[$key]);
                    $iterator--;
                    continue;
                }

                $flag = preg_match('/^(component-)([0-9]{1,3})$/', $key);

                if($flag){

                    if(($ingredients[$key] == '')){
                    
                        unset($ingredients[$key]);
                        $iterator = 2;

                    }
                }
            }

            return $ingredients;
        }

        public function add(){
 
            try{

                $sthPDO = $this->pdo->getPDO();
                $sthPDO->beginTransaction();

                while(count($this->arrIngredients) > 0){

                    $sth = $sthPDO->prepare("INSERT INTO ingredients (`id_recipe`, `name`, `quantity`, `type`) VALUES (?, ? ,?, ?)");
                    $sth->bindValue(1, $this->idRecipe, PDO::PARAM_INT);
                    $sth->bindValue(2, array_pop($this->arrIngredients), PDO::PARAM_STR);
                    $sth->bindValue(3, array_pop($this->arrIngredients), PDO::PARAM_STR);
                    $sth->bindValue(4, array_pop($this->arrIngredients), PDO::PARAM_STR);
                    $sth->execute();

                }
                
                $sthPDO->commit();

            } catch(PDOExecption $e) {

                $sthPDO->rollback();
                $host  = $_SERVER['HTTP_HOST']; 
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało się dodać składników.");
                $errorInfo->create();            
                header("Location: http://$host/CZN/add_recipe.php");
                return;

            }

        }

    }


?>
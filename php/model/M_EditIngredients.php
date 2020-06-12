<?php

    require_once(dirname(__DIR__).'/class/ManagementIngredients.php');
    require_once(dirname(__DIR__).'/model/M_AddIngredients.php'); 
    require_once(dirname(__DIR__).'/model/M_DeleteIngredients.php'); 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php'); 
    
    class M_EditIngredients extends ManagementIngredients{

        private $idV;

        public function __construct(array $idVector, array $ingredients){

            parent::__construct();
            $this->idV = array_reverse($idVector);
            $this->arrIngredients = array_reverse($ingredients);
            
        }

        public function __destruct(){

            $this->pdo->disconnect();
            
        }

        public function setID(int $id){

            $this->idRecipe = $id;

        }

        public function update(){
 
            try{

                $sthPDO = $this->pdo->getPDO();
                $sthPDO->beginTransaction();

                while(count($this->idV) > 0 && count($this->arrIngredients)){

                    $name = array_pop($this->arrIngredients);
                    $quantity = array_pop($this->arrIngredients);
                    $type = array_pop($this->arrIngredients);
                    $idIngredients = array_pop($this->idV);

                    if($name == ''){
                        $delete = new M_DeleteIngredients($idIngredients);
                        $delete->deleteByID();
                        continue;
                    }

                    $sth = $sthPDO->prepare("UPDATE ingredients SET name = ?, quantity = ?, type = ? WHERE id = ?");
                    $sth->bindValue(1, $name, PDO::PARAM_STR);
                    $sth->bindValue(2, $quantity, PDO::PARAM_STR);
                    $sth->bindValue(3, $type, PDO::PARAM_STR);
                    $sth->bindValue(4, $idIngredients, PDO::PARAM_INT);
                    $sth->execute();

                }
                $sthPDO->commit();

                $this->arrIngredients = array_reverse($this->arrIngredients);
                $newIngredients = new M_AddIngredients($this->idRecipe, $this->arrIngredients);
                $newIngredients->add();
                
            } catch(PDOExecption $e) {

                $sthPDO->rollback();
                $host  = $_SERVER['HTTP_HOST']; 
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało się zaktualizować składników.");
                $errorInfo->create();            
                header("Location: http://$host/CZN/add_recipe.php");
                return;

            }
            finally{

                return true;

            }

        }

    }


?>
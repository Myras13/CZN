<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php');

    class M_ModifyAccount extends ManagementUser{

        private $idUser;
        private $tokenUser;

        public function __construct(){

            parent::__construct();     

        }

        public function loadDataUser(int $id){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT email FROM users_account WHERE id_user = :id");
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetch();

            if($result){
                parent::loadData($result['email']);
                return true;
            }else{
                return false;
            }
        }


        public function changePass(string $password){
            
            $password = hash('sha512', $password);

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("UPDATE users_account SET password = :password WHERE id_user = :id");
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':password', $password, PDO::PARAM_STR);
            $result = $sth->execute();

            if($result == false)
                return false;
            else
                return true;

        }

        public function isVerify():bool{

            if($this->is_validate)
                return true;
            else
                return false;

        }

        public function verify():bool{

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("UPDATE users_account SET is_validate=1 WHERE id_user = :id");
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $result = $sth->execute();

            if($result == false)
                return false;
            else
                return true;

        }

    }

?>
<?php

    require_once(dirname(__DIR__).'/class/ManagementUser.php');

    class VerificationAccount extends ManagementUser{

        private $idUser;

        public function __construct(int $idGet){

            parent::__construct();
            $this->idUser = $idGet;

        }

        public function isVerify():int{

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("SELECT is_validate FROM users_account WHERE id_user = :id");
            $sth->bindValue(':id', $this->idUser, PDO::PARAM_INT);
            $sth->execute();

            $result = $sth->fetch();
            if($result == false)
                return 0;
            elseif($result['is_validate'] == true)
                return 2;
            else
                return 1;

        }

        public function verify(){

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("UPDATE users_account SET is_validate=1 WHERE id_user = :id");
            $sth->bindValue(':id', $this->idUser, PDO::PARAM_INT);
            $result = $sth->execute();

            if($result == false)
                return false;
            else
                return true;

        }

    }

?>
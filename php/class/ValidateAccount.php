<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidateAccount{

        public function isValidate(PDO $sthPDO, string $email):bool{

            $sth = $sthPDO->prepare("SELECT is_validate FROM users_account WHERE email = :email");
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            
            if($result['is_validate'])
                return true;
            
            return false;

        }

    }


?>
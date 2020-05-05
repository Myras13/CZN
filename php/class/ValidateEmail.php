<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidateEmail{

        public function isEmailExist(PDO $pdo, string $email):bool{

            $stmtEmail = htmlspecialchars($email);

            $sth = $pdo->prepare("SELECT COUNT(email) FROM users_account WHERE email = :email");
            $sth->bindValue(':email', $stmtEmail, PDO::PARAM_STR);
            $sth->execute();

            $result = $sth->fetch();
            $sth->closeCursor();
            unset($sth);

            if($result[0] == true)
                return true;
            else
                return false;

        }

        public function examine(string $emailAddress):bool{

            $reg = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";

            if (!preg_match($reg, $emailAddress))
                throw new ValidateDataUserException('Podany e-mail nie przeszedł walidacji',5);

            return true;           

        }


    }

?>
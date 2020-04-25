<?php

    class ValidateEmail{

        public function isEmailExist(PDO $pdo, string $email){

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


    }

?>